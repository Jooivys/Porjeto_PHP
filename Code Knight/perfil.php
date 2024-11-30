<?php
session_start();
include('db.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['nome'];
$class = $_SESSION['classe'];
$ouro = $_SESSION['ouro'];  // Pega o ouro da sessão

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?php echo $username; ?>!</h1>
        <p>Classe: <?php echo $class; ?></p>
        <p>Ouro: <?php echo $ouro; ?></p>
        <a href="batalha.php">Lutar contra inimigo</a>
    </div>
</body>
</html>