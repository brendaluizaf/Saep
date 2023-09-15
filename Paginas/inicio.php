<?
$host = "localhost";
$user = "root";
$password = "";
$database = "saepdb";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
}
session_start();
if (isset($_SESSION['login'])) {
    header("location: index.php");
    exit();
}

$login = $_SESSION['login'];

function listadeatividades()
{
    return [
        ['numero' => 1, 'nome' => 'Atividade1'],
        ['numero' => 2, 'nome' => 'Atividade2'],
        ['numero' => 3, 'nome' => 'Atividade3']
    ];
}

$atividades = listadeatividades()

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>

<body>
    <h1>Bem-vindo, <? echo $login ?></h1>
    <A href="index.php">Sair</A>

    <a href="cadastro_atividades.php">Acessar</a>

    <h2>lista de atividades</h2>
    <table>
        <tr>
        <tr>Numero de atividades</tr>
        <tr>Nome da atividade</tr>
        <th></th>
        <th></th>
        </tr>
        <? foreach ($atividades as $atividade) : ?>
            <tr>
                <td><? echo $atividade['numero']; ?></td>
                <td><? echo $atividade['nome']; ?></td>
                <td><button onclick="excluirAtividade (<? echo $atividade['numero']; ?>)">Excluir</button></td>
                <td><button onclick="visualizarAtividade (<? echo $atividade['numero']; ?>)">Visualizar</button></td>
            </tr>
        <? endforeach; ?>
    </table>
</body>

</html>