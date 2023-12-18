<?php
session_start();
include('conexao.php');

if (isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] === true) {
    $id_usuario = $_SESSION['id_usuario'];
} else {
    $id_usuario = $_SESSION['sessao_temporaria'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_produto = $_POST['id_produto'];

    $id_produto = filter_var($id_produto, FILTER_VALIDATE_INT);

    if ($id_produto === false) {
        http_response_code(400);
        echo 'ID do produto inválido';
        exit;
    }

    // Certifique-se de verificar o ID do usuário no DELETE também
    $sql = "DELETE FROM itens_carrinho WHERE id_produto = $id_produto AND id_usuario = '$id_usuario'";
    $result = $conn->query($sql);

    if ($result) {
        echo 'Produto removido do carrinho com sucesso!';
    } else {
        http_response_code(500);
        echo 'Erro ao remover o produto do carrinho.';
    }
} else {
    http_response_code(403);
    echo 'Acesso proibido';
}

// Fechar a conexão com o banco de dados
$conn->close();
