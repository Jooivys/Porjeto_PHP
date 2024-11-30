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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Usuário</h1>
        <form method="POST">
            <label>Classe:</label>
            <select name="classe">
                <option value="Cavaleiro" <?php echo $user['classe'] == 'Cavaleiro' ? 'selected' : ''; ?>>Cavaleiro</option>
                <option value="Arqueiro" <?php echo $user['classe'] == 'Arqueiro' ? 'selected' : ''; ?>>Arqueiro</option>
                <option value="Mago" <?php echo $user['classe'] == 'Mago' ? 'selected' : ''; ?>>Mago</option>
            </select>
            <br>
            <label>Ouro:</label>
            <input type="number" name="ouro" value="<?php echo $user['ouro']; ?>" required>
            <br>
            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>
