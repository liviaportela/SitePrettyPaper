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

$aux = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['valorFrete'])) {
    $valorFrete = floatval($_POST['valorFrete']);

    // Agora você pode usar $valorFrete como desejar
    echo "Valor do Frete no PHP: R$ " . $valorFrete;
} else {
    $valorFrete = floatval($aux);
    // Trate a situação onde o formulário não foi enviado via POST
   
}
 
// print_r($produtosCarrinho);
// print_r($total);

//echo '<pre>';
//var_dump($produtosCarrinho);
//echo '<pre>';
//$conn->close();

include 'carrinho.html.php';