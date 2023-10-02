<?php
session_start();
$host = "localhost";

$host = "localhost";
$user = "root";
$password = "";
$database = "saepdb";


$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
}

$login = $_SESSION['login'];

function listaatividades()
{
    global $conn, $login;
    $sql = "SELECT numero, funcionario, nome as atividade FROM atividades";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Erro de consulta:" . mysqli_error($conn));
    }
    $atividades = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $atividades[] = $row;
    }
    return $atividades;
}

$atividades = listaatividades()


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1>Bem-vindo, <?php echo $login ?></h1>
    <a href="index.php"> Sair</a>

    <a href="cadastroatividades.php"> Cadastrar</a>

    <h2>Listagem de atividades</h2>
    <table>
        <tr>
            <th>Número da atividade</th>
            <th>Funcionário</th>
            <th>Atividade</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($atividades as $atividade) : ?>
            <tr>
                <td><?php echo $atividade['numero']; ?></td>
                <td><?php echo $atividade['funcionario']; ?></td>
                <td><?php echo $atividade['atividade']; ?></td>


                <td><button onclick="excluirAtividades (<?php echo $atividade['numero']; ?>)">Excluir</button></td>
                <td><a href="visualizaratividade.php?numero=<?php echo $atividade['numero']; ?>" Visualizar </a></td>

            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>