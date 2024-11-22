<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo PHP</title>

    <script>
        /* Funçao em que, caso o primeiro form seja preenchido, 
        o required do segundo nao é mais obrigatorio 
        preenchcer, e vice-versa*/
        function verificarFormulario() {

            const form1Inputs = document.querySelectorAll("#form1 input");
            const form2Inputs = document.querySelectorAll("#form2 input");

            let form1Preenchido = Array.from(form1Inputs).some(input => input.value.trim() !== "");
            let form2Preenchido = Array.from(form2Inputs).some(input => input.value.trim() !== "");

            form1Inputs.forEach(input => input.required = !form2Preenchido);
            form2Inputs.forEach(input => input.required = !form1Preenchido);
        }
    </script>
</head>

<body>
    <h1> TELA DE LOGIN </h1>
    <form id="form1" oninput="verificarFormulario()" action="?pg=recebe_login" method="post">
        Nome: <input type="text" name="nome" required><br>
        Senha: <input type="password" name="senha" required><br>
        <input type="submit" value="Login">
    </form>

    <h1> TELA DE CADASTRO </h1>
    <form id="form2" oninput="verificarFormulario()" action="?pg=recebe_cadastro" method="post">
        Nome: <input type="text" name="nome" required><br>
        Senha: <input type="password" name="senha" required><br>
        Classe:
        <select required name="classe">
            <option value="Cavaleiro">Cavaleiro</option>
            <option value="Arqueiro">Arqueiro</option>
            <option value="Mago">Mago</option>
        </select><br>
        <input type="submit" value="Registrar">
    </form>
</body>

</html>