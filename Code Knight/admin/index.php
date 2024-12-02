<?php
session_start();
include('../db.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

// Verifica se o usuário é administrador
$user_id = $_SESSION['user_id'];
$sql = "SELECT is_admin FROM usuarios WHERE id = $user_id";
$result = mysqli_query($conexao, $sql);
$user = mysqli_fetch_assoc($result);

if (!$user || $user['is_admin'] != 1) {
    // Mostra mensagem de acesso negado
    echo "<!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Acesso Negado</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #222;
                color: #fff;
                text-align: center;
                padding: 50px;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #333;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            }
            h1 {
                color: #f44336; /* Vermelho */
            }
            p {
                margin: 20px 0;
            }
            a {
                color: #4caf50; /* Verde */
                text-decoration: none;
                font-weight: bold;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>ACESSO NEGADO</h1>
            <p>Você não tem permissão para acessar esta página.</p>
            <a href='../index.php'>Voltar para a Página Inicial</a>
        </div>
    </body>
    </html>";
    exit;
}

// Lógica para listar os usuários
$sql = "SELECT * FROM usuarios";
$result = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
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
