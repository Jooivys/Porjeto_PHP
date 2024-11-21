<?php

include_once("config.inc.php");

$nome = $_REQUEST['nome'];
$senha = $_REQUEST['senha'];

$sql = "SELECT * FROM players WHERE nome='$nome' AND senha='$senha'";

$query = mysqli_query($conexao, $sql);

if ($query = mysqli_query($conexao, $sql)) {
    echo "<h3> Login realizado com sucesso </h3>";
} else {
    echo "<h3> Erro ao se logar </h3>";
}

mysqli_close($conexao);
