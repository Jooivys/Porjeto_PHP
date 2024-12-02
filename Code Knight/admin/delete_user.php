<?php
session_start();
include('../db.php');

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = $id";
if (mysqli_query($conexao, $sql)) {
    header('Location: index.php');
} else {
    echo "Erro ao deletar: " . mysqli_error($conexao);
}

