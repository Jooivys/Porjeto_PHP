<?php
session_start();
include('db.php');

// Lidar com o login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Verifica se o usuário existe
    $sql = "SELECT * FROM usuarios WHERE nome = '$nome'";
    $result = mysqli_query($conexao, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($senha, $user['senha'])) {
        // Salva os dados do usuário na sessão
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['classe'] = $user['classe'];
        $_SESSION['user_id'] = $user['id'];  // Aqui é onde definimos o ID do usuário
        $_SESSION['ouro'] = 0;  // Inicia o ouro na sessão como 0
        header('Location: perfil.php'); // Se tudo estiver certo, vai para a pagina de perfil
    } else {
        echo "Login ou senha incorretos!";
    }
}

// Lidar com o cadastro
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $classe = $_POST['classe'];

    // Verifica se o nome de usuário já existe
    $sql = "SELECT * FROM usuarios WHERE nome = '$nome'";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Nome de usuário já existe!";
    } else {
        // Cadastra o novo usuário no banco de dados
        $sql = "INSERT INTO usuarios (nome, senha, classe) VALUES ('$nome', '$senha', '$classe')";
        if (mysqli_query($conexao, $sql)) {
            echo "Cadastro realizado com sucesso! Agora você pode fazer login.";
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conexao);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <title>Login e Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit" name="login">Login</button>
        </form>

        <h2>Cadastrar</h2>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <select name="classe" required>
                <option value="Cavaleiro">Cavaleiro</option>
                <option value="Arqueiro">Arqueiro</option>
                <option value="Mago">Mago</option>
            </select>
            <button type="submit" name="cadastrar">Cadastrar</button>
        </form>
    </div>
</body>

</html>