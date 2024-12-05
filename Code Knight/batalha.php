<?php
session_start();
include('db.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// Lógica da batalha (rolagem de dados entre o jogador e o inimigo)
$user_roll = mt_rand(1, 6);  // Gera números mais aleatórios para o jogador
$enemy_roll = mt_rand(1, 6);  // Gera números mais aleatórios para o inimigo

// Definir qual tipo de inimigo vai aparecer e a imagem correspondente aleatoriamente
$inimigos = [
    ['nome' => 'Programador PHP SÊNIOR FULL SATCK', 'imagem' => 'images/phpSenior.png'],
    ['nome' => 'Desenvolvedor PHP JÚNIOR', 'imagem' => 'images/phpJunior.png'],
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

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batalha</title>
    <link rel="stylesheet" href="batalha.css">
</head>

<body class="<?php echo $resultado; ?>">
    <div class="container">
        <h1>Batalha Finalizada</h1>

        <!-- Resultado da batalha -->
        <p>Você <?php echo $resultado == 'ganhou' ? 'ganhou!' : ($resultado == 'perdeu' ? 'perdeu!' : 'empatou!'); ?></p>
        <p>Ouro Atual: <?php echo $_SESSION['ouro']; ?></p>

        <!-- Exibindo os números rolados -->
        <p><strong>Você rolou:</strong> <?php echo $user_roll; ?></p>
        <p><strong>Inimigo rolou:</strong> <?php echo $enemy_roll; ?></p>

        <div class="battle-images">
            <!-- Imagem do Usuário -->
            <div class="user-section">
                <h3><?php echo $_SESSION['classe']; ?></h3>
                <img src="<?php echo $user_image; ?>" alt="Sua Classe">
            </div>

            <!-- GIF "VS" -->
            <div class="vs-section">
                <img src="images/vs.gif" alt="Versus" class="vs-image">
            </div>

            <!-- Imagem do Inimigo -->
            <div class="enemy-section">
                <h3><?php echo $inimigo; ?></h3>
                <img src="<?php echo $inimigo_image; ?>" alt="Inimigo">
            </div>
        </div>

        <a href="perfil.php">Ir para o Perfil</a>
    </div>
</body>

</html>