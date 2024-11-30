<?php
session_start();
include('../db.php');

// Lógica para listar os usuários
$sql = "SELECT * FROM usuarios";
$result = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow"> <!-- Desabilita o index e o follow -->
    <title>Painel Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Painel de Administração</h1>
        <a href="../logout.php">Sair</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Classe</th>
                <th>Ouro</th>
                <th>Ações</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['classe']; ?></td>
                    <td><?php echo $row['ouro']; ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="delete_user.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza?');">Deletar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
