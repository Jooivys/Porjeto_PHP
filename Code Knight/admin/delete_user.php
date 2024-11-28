<?php
session_start();
include('db.php');
include('verifica_admin.php');

verificaAdmin();

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = $id";
if (mysqli_query($conexao, $sql)) {
    header('Location: admin.php');
} else {
    echo "Erro ao deletar: " . mysqli_error($conexao);
}
?>
