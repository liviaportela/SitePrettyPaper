<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_produto = $_POST['id_produto'];
    $quantidade = $_POST['quantidade'];

    $id_produto = filter_var($id_produto, FILTER_VALIDATE_INT);
    $quantidade = filter_var($quantidade, FILTER_VALIDATE_INT);

    if ($id_produto === false || $quantidade === false || $quantidade <= 0) {
        http_response_code(400);
        echo 'Dados inválidos';
        exit;
    }

    if (isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] === true) {
        // Usuário autenticado
        $id_usuario = $_SESSION['id_usuario'];
    } else {
        // Usuário não autenticado, use a sessão temporária
        $id_usuario = $_SESSION['sessao_temporaria'];
    }

    // Verifique se o produto já está no carrinho
    $sqlVerifica = "SELECT * FROM itens_carrinho WHERE id_produto = $id_produto AND id_usuario = '$id_usuario'";
    $resultVerifica = $conn->query($sqlVerifica);

    if ($resultVerifica->num_rows > 0) {
        $sqlUpdate = "UPDATE itens_carrinho SET quantidade = quantidade + $quantidade WHERE id_produto = $id_produto AND id_usuario = '$id_usuario'";
        $conn->query($sqlUpdate);
        echo 'Quantidade do produto atualizada no carrinho.';
    } else {
        // Insira o novo produto no carrinho
        $sqlInsert = "INSERT INTO itens_carrinho (id_produto, quantidade, status, id_usuario) VALUES ($id_produto, $quantidade, 'Aberto', '$id_usuario')";
        if ($conn->query($sqlInsert)) {
            echo 'Produto adicionado ao carrinho com sucesso!';
        } else {
            http_response_code(500);
            echo 'Erro ao adicionar o produto ao carrinho.';
        }
    }
} else {
    http_response_code(403);
    echo 'Acesso proibido';
}

$conn->close();
?>
