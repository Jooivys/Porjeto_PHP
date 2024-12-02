<?php
session_start();
include('../db.php');

$id = $_GET['id'];

// Recuperar os dados do usuário
$sql = "SELECT * FROM usuarios WHERE id = $id";
$result = mysqli_query($conexao, $sql);
$user = mysqli_fetch_assoc($result);

// Atualizar os dados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $classe = $_POST['classe'];
    $ouro = $_POST['ouro'];

    $sql = "UPDATE usuarios SET classe = '$classe', ouro = $ouro WHERE id = $id";
    if (mysqli_query($conexao, $sql)) {
        header('Location: index.php');
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conexao);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="editstyle.css">
</head>
<body>
    <div class="container">
        <h1>Editar Usuário</h1>
        <!-- Mensagem de Sucesso ou Erro (se necessário) -->
        <?php if (isset($mensagem_sucesso)) { ?>
            <div class="alert alert-success"><?php echo $mensagem_sucesso; ?></div>
        <?php } elseif (isset($mensagem_erro)) { ?>
            <div class="alert alert-error"><?php echo $mensagem_erro; ?></div>
        <?php } ?>

        <form method="POST">
            <!-- Campo para Classe -->
            <label for="classe">Classe:</label>
            <select name="classe" id="classe">
                <option value="Cavaleiro" <?php echo $user['classe'] == 'Cavaleiro' ? 'selected' : ''; ?>>Cavaleiro</option>
                <option value="Arqueiro" <?php echo $user['classe'] == 'Arqueiro' ? 'selected' : ''; ?>>Arqueiro</option>
                <option value="Mago" <?php echo $user['classe'] == 'Mago' ? 'selected' : ''; ?>>Mago</option>
            </select>

            <!-- Campo para Ouro -->
            <label for="ouro">Ouro:</label>
            <input type="number" id="ouro" name="ouro" value="<?php echo $user['ouro']; ?>" required>

            <!-- Botões -->
            <button type="submit">Salvar</button>
            <a class="back-link" href="admin.php">Voltar</a>
        </form>
    </div>
</body>
</html>