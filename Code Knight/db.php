<?php
$conexao = mysqli_connect("localhost", "root", "", "codeknight");

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

