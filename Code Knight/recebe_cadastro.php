<?php

include_once("config.inc.php");

$nome = $_REQUEST['nome'];
$senha = $_REQUEST['senha'];
$classe = $_REQUEST['classe'];

$sql = "INSERT INTO players
    (nome,senha,classe) 
    VALUES('$nome','$senha','$classe')";

$query = mysqli_query($conexao, $sql);

if ($query) {
    echo "<h3> Mensagem enviada com sucesso</h3>";
} else {
    echo "<h3>Erro ao enviar mensagem</h3>";
}

mysqli_close($conexao);
