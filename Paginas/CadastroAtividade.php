<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "saepdb";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
}

if(!isset($_SESSION['login'])){
    header("Location: index.php");
    exit();
}

$login = $_SESSION['login'];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $atividade_nome = $_POST['nome'];
    $atividade_funcionario = $_POST['funcionario'];
    $atividade_detalhes = $_POST['detalhes'];

    $sql = "INSERT INTO atividades (nome, funcionario, detalhes) VALUES (' $atividade_nome', '$atividade_funcionario', '$atividade_detalhes')";
    

    if (mysqli_query($conn, $sql)){
        header("Location: inicio.php");
    } else {
        echo ("Erro ao cadastrar atividade".mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de atividade</title>
</head>

<body>
<form action="" method="post">
Nome da atividade: <input type="text" name="nome"> <br>
Funcionário: <input type="text" name="funcionario"><br>
Detalhes: <input type="text" name="detalhes"><br>
<input type="submit" value="Cadastrar">
</form>

</body>

</html>