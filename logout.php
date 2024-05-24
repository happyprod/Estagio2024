<?php
    error_reporting(0);

    session_start();

    // Remove todas as variáveis de sessão
    session_unset();

    $_SESSION['loggedin'] = FALSE;   // Indica que o usuário está autenticado
    unset($_SESSION['user_id']);  

    // Destrói a sessão
    session_destroy();

    
    // Redireciona para a página de login
    header("Location: index.php");
?>
