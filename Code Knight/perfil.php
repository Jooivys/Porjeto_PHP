<?php
session_start();
include('db.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// Pega as informações do usuário
$username = $_SESSION['nome'];
$class = $_SESSION['classe'];
$ouro = $_SESSION['ouro'];  // Ouro do usuário

// Define a imagem da classe
$user_image = "images/{$class}.png";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="login">
    <div class="container">
        <h1>Bem-vindo, <?php echo $username; ?>!</h1>
        <p>Classe: <?php echo $class; ?></p>
        <!-- Adiciona a imagem da classe -->
        <div class="imagem-container">
            <img src="<?php echo $user_image; ?>" alt="<?php echo $class; ?>" class="imagem-personagem">
        </div>
        <p>Ouro: <?php echo $ouro; ?></p>

        <!-- Links -->
        <a href="batalha.php">Lutar contra inimigo</a>
        <a href="logout.php">DESISTO!!!</a>
    </div>
</body>

</html>