<?php
// Inicia a sessão
session_start();

// Destrói todas as variáveis da sessão
session_unset();

// Destroi a sessão atual
session_destroy();

// Redireciona o usuário para a página inicial ou de login
header('Location: index.php');
exit;
