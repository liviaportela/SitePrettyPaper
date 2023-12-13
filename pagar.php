<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] === true) {
    if (isset($_SESSION['id_usuario'])) {
        if (isset($_POST['email'])) {
            $_SESSION['email'] = $_POST['email'];
        }

        $sqlItensCarrinho = "SELECT itens_carrinho.*, produtos.nome_produto, produtos.imagem1, produtos.preco
        FROM itens_carrinho
        JOIN produtos ON itens_carrinho.id_produto = produtos.id_produto WHERE id_usuario = {$_SESSION['id_usuario']}";
        $resultItensCarrinho = $conn->query($sqlItensCarrinho);
        $produtosCarrinho = array();
        while ($row = $resultItensCarrinho->fetch_assoc()) {
            $produtosCarrinho[] = $row;
        }

        $sqlTotal = "SELECT COUNT(*) as total FROM itens_carrinho WHERE id_usuario = {$_SESSION['id_usuario']}";
        $resultTotal = $conn->query($sqlTotal);
        if ($resultTotal) {
            $row = $resultTotal->fetch_assoc();
            $totalCarrinho = $row['total'];
        } else {
            // Trate erros na execução da consulta
            $totalCarrinho = 0; // ou algum valor padrão
        }

        $totalGeral = 0;

        function atualizarStatusProdutos($idUsuario, $conn) {
            $sqlUpdateStatus = "UPDATE itens_carrinho SET status = 'Fechado' WHERE id_usuario = $idUsuario";
            
            if ($conn->query($sqlUpdateStatus) === TRUE) {
                return true;
            } else {
                error_log("Erro SQL: " . $conn->error);
                return false;
            }
        }
        
        if (isset($_POST['realizar_pagamento'])) {
            // Lógica para atualizar o status dos produtos no banco de dados
            $statusAtualizado = atualizarStatusProdutos($_SESSION['id_usuario'], $conn);
        
            if ($statusAtualizado) {
                header("Location: perfil.php");
                exit();
            } else {
                echo "Erro ao processar o pagamento. Por favor, tente novamente.";
            }
        }

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
        $totalCarrinho = 0;
    }

    $totalGeral = 0;
}

include("pagar.html.php");