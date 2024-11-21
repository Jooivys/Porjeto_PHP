<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo PHP</title>
</head>
<body>
<h1> TELA DE LOGIN </h1>
<form action="?pg=recebe_login" method="post">
    Nome: <input type="text" name="nome"><br>
    Senha: <input type="password" name="senha"><br>
    <input type="submit" value="Login">

<h1> TELA DE CADASTRO </h1>
<form action="?pg=recebe_cadastro" method="post">
    Nome: <input type="text" name="nome"><br>
    Senha: <input type="password" name="senha"><br>
    Classe:
    <select name="classe">
        <option value="Cavaleiro">Cavaleiro</option>
        <option value="Arqueiro">Arqueiro</option>
        <option value="Mago">Mago</option>
    </select><br>
    <input type="submit" value="Registrar">
</form>
</body>
</html>



