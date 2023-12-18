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
$mensagemErroRepetido = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    $verificaUsuario = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conn->query($verificaUsuario);

    if ($resultado->num_rows > 0) {
        $mensagemErroRepetido = "Este usuário já está cadastrado.";
    } else {
        $sql = "INSERT INTO usuarios (email, senha, nome, telefone, cpf, rg, cep, logradouro, numero, bairro, cidade, uf) VALUES ('$email', '$senha', '$nome', '$telefone', '$cpf', '$rg', '$cep', '$logradouro', '$numero', '$bairro', '$cidade', '$uf')";

        if ($conn->query($sql) === TRUE) {
            $id_usuario_cadastrado = $conn->insert_id;

            if (isset($_SESSION['sessao_temporaria']) && $id_usuario_cadastrado) {
                $id_usuario_temporario = $_SESSION['sessao_temporaria'];

                $sqlUpdate = "UPDATE itens_carrinho SET id_usuario = $id_usuario_cadastrado WHERE id_usuario = '$id_usuario_temporario'";
                $conn->query($sqlUpdate);

                unset($_SESSION['sessao_temporaria']);
            }

            $_SESSION['usuario_logado'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['id_usuario'] = $id_usuario_cadastrado;

            header("Location: index.php");
            exit();
        } else {
            $mensagemErro = "Erro ao cadastrar: " . $conn->error;
        }
    }
} else {
    $mensagemErro = "Todos os campos do formulário devem ser preenchidos.";
}

$conn->close();

include 'cadastro.html.php';