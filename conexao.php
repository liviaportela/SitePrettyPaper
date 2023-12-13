<?php 
$servername = "localhost";
$username = "id21602232_root";
$password = "Llm0|07smoFlgm/";
$dbname = "id21602232_db_prettypaper";

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}