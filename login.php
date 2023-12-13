<?php
session_start();
include('conexao.php');

if (isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] === true) {
    if (isset($_SESSION['id_usuario'])) {
        if (isset($_POST['email'])) {
            $_SESSION['email'] = $_POST['email'];
        }

        $sqlItensCarrinho = "SELECT itens_carrinho.*, produtos.nome_produto, produtos.imagem1, produtos.preco
        FROM itens_carrinho
        JOIN produtos ON itens_carrinho.id_produto = produtos.id_produto WHERE id_usuario = {$_SESSION['id_usuario']} and status = 'Aberto'";
        $resultItensCarrinho = $conn->query($sqlItensCarrinho);
        $produtosCarrinho = array();
        while ($row = $resultItensCarrinho->fetch_assoc()) {
            $produtosCarrinho[] = $row;
        }

        $sqlTotal = "SELECT COUNT(*) as total FROM itens_carrinho WHERE id_usuario = {$_SESSION['id_usuario']} and status = 'Aberto'";
        $resultTotal = $conn->query($sqlTotal);
        if ($resultTotal) {
            $row = $resultTotal->fetch_assoc();
            $totalCarrinho = $row['total'];
        } else {
            // Trate erros na execução da consulta
            $totalCarrinho = 0; // ou algum valor padrão
        }

        $totalGeral = 0;

    } else {
        echo "Usuário não está logado";
    }
} else {
    if (!isset($_SESSION['sessao_temporaria'])) {
        $_SESSION['sessao_temporaria'] = intval(uniqid('', true));
    }

    if (isset($_POST['email'])) {
        $_SESSION['email'] = $_POST['email'];
    }

    $sqlItensCarrinho = "SELECT itens_carrinho.*, produtos.nome_produto, produtos.imagem1, produtos.preco
    FROM itens_carrinho
    JOIN produtos ON itens_carrinho.id_produto = produtos.id_produto WHERE id_usuario = '{$_SESSION['sessao_temporaria']}'";
    $resultItensCarrinho = $conn->query($sqlItensCarrinho);
    $produtosCarrinho = array();
    while ($row = $resultItensCarrinho->fetch_assoc()) {
        $produtosCarrinho[] = $row;
    }

    $sqlTotal = "SELECT COUNT(*) as total FROM itens_carrinho WHERE id_usuario = '{$_SESSION['sessao_temporaria']}'";
    $resultTotal = $conn->query($sqlTotal);

    if ($resultTotal) {
        $row = $resultTotal->fetch_assoc();
        $totalCarrinho = $row['total'];
    } else {
        // Trate erros na execução da consulta
        $totalCarrinho = 0; // ou algum valor padrão
    }

    $totalGeral = 0;
}

$mensagemSucesso = "";
$mensagemErro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha_digitada = $_POST['senha'];

    $consultar_usuario_query = "SELECT * FROM usuarios WHERE email=?";
    $stmt = $conn->prepare($consultar_usuario_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();

    if ($usuario && $senha_digitada === $usuario['senha']) {
        $_SESSION['usuario_logado'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        header("Location: index.php");
        exit();
    } else {
        $mensagemErro = "Credenciais inválidas. Por favor, tente novamente.";
    }
}
    
include 'login.html.php';