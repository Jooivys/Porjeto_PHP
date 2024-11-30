<?php
session_start();
include('db.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// Lógica da batalha (rolagem de dados entre o jogador e o inimigo)
$user_roll = rand(1, 6);  // O usuário rola um dado de 6 faces
$enemy_roll = rand(1, 6);  // O inimigo rola um dado de 6 faces

// Definir qual tipo de inimigo vai aparecer e a imagem correspondente aleatoriamente
$inimigos = [
    ['nome' => 'Goblin', 'imagem' => 'images/goblin.png'],
    ['nome' => 'Orc', 'imagem' => 'images/orc.png'],
    ['nome' => 'Dragão', 'imagem' => 'images/dragao.png']
];
$inimigo_selecionado = $inimigos[array_rand($inimigos)];
$inimigo = $inimigo_selecionado['nome'];
$inimigo_image = $inimigo_selecionado['imagem'];


// Verifica o vencedor
if ($user_roll > $enemy_roll) {
    $resultado = 'ganhou';
    $ouro_ganho = 10;  // Ganha 10 de ouro em caso de vitória
} elseif ($user_roll < $enemy_roll) {
    $resultado = 'perdeu';
    $ouro_ganho = 0;  // Não ganha ouro em caso de derrota
} else {
    $resultado = 'empatou';
    $ouro_ganho = 0;  // Em caso de empate, não há ganho de ouro
}

// Atualiza o ouro na sessão
$_SESSION['ouro'] += $ouro_ganho;

// Pega as imagens das classes (assumindo que as imagens estão na pasta "images/")
$user_class = $_SESSION['classe'];  // Classe do usuário
$user_image = "images/{$user_class}.png";  // Caminho para a imagem da classe do usuário
// $inimigo_image = "images/inimigo.png";  // Caminho para a imagem do inimigo

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batalha</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Batalha Finalizada</h1>

        <!-- Resultado da batalha -->
        <p>Você <?php echo $resultado == 'ganhou' ? 'ganhou' : ($resultado == 'perdeu' ? 'perdeu' : 'empatou'); ?>!</p>
        <p>Ouro Atual: <?php echo $_SESSION['ouro']; ?></p>

        <!-- Exibindo o número rolado por cada jogador -->
        <p><strong>Você rolou:</strong> <?php echo $user_roll; ?></p>
        <p><strong>Inimigo rolou:</strong> <?php echo $enemy_roll; ?></p>

        <!-- Imagem do Usuário -->
        <div class="imagem-classe">
            <h3>Sua Classe: <?php echo $user_class; ?></h3>
            <img src="<?php echo $user_image; ?>" alt="<?php echo $user_class; ?>" class="imagem-personagem">
        </div>

        <!-- Imagem do Inimigo -->
        <div class="imagem-inimigo">
            <h3>Inimigo: <?php echo $inimigo; ?></h3>
            <img src="<?php echo $inimigo_image; ?>" alt="<?php echo $inimigo; ?>" class="imagem-personagem">
        </div>

        <!-- Link para o perfil -->
        <a href="perfil.php">Ir para o Perfil</a>
    </div>
</body>

</html>