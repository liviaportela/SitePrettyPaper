<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] === true) {
    if (isset($_POST['email'])) {
        $_SESSION['email'] = $_POST['email'];
    }
} else {
    echo "Usuário não está logado";
}

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
$produtos = array();
while ($row = $result->fetch_assoc()) {
    $produtos[] = $row;
}

$sqlItensCarrinho = "SELECT itens_carrinho.*, produtos.nome_produto, produtos.imagem1, produtos.preco
FROM itens_carrinho
JOIN produtos ON itens_carrinho.id_produto = produtos.id_produto where id_usuario = {$_SESSION['id_usuario']} and status = 'Aberto'";
$resultItensCarrinho = $conn->query($sqlItensCarrinho);
$produtosCarrinho = array();
while ($row = $resultItensCarrinho->fetch_assoc()) {
    $produtosCarrinho[] = $row;
}

$sqlHistorico = "SELECT itens_carrinho.*, produtos.nome_produto, produtos.imagem1, produtos.preco
FROM itens_carrinho
JOIN produtos ON itens_carrinho.id_produto = produtos.id_produto where status='Fechado' and id_usuario = {$_SESSION['id_usuario']}";
$resultHistorico = $conn->query($sqlHistorico);
$produtosHistorico = array();
while ($row = $resultHistorico->fetch_assoc()) {
    $produtosHistorico[] = $row;
}

$sqlTotal = "SELECT COUNT(*) as total FROM itens_carrinho where id_usuario = {$_SESSION['id_usuario']} and status = 'Aberto'";
    $resultTotal = $conn->query($sqlTotal);

    if ($resultTotal) {
        $row = $resultTotal->fetch_assoc();
        $totalCarrinho = $row['total'];
    } else {
        $totalCarrinho = 0; // ou algum valor padrão
    }

$totalGeral = 0;

include 'perfil.html.php';