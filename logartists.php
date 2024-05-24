<?php
    session_start();

    $servername = "localhost";
    $database = "concertpulse";
    $username = "root";
    $password = "";

    // Conexão com o banco de dados
    $link = mysqli_connect($servername, $username, $password, $database);

    // Verifica se o formulário foi submetido
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST["email"];
        $senha = $_POST["password"]; // Corrigido para 'senha'

        // Prepara a consulta SQL (usar consultas preparadas é mais seguro)
        $query = "SELECT id, email FROM accounts WHERE email = ? AND password = ?";
        $stmt = mysqli_prepare($link, $query);

        // Vincula os parâmetros e executa a consulta
        mysqli_stmt_bind_param($stmt, 'ss', $email, $senha);
        mysqli_stmt_execute($stmt);

        // Obtém o resultado da consulta
        $result = mysqli_stmt_get_result($stmt);

        // Verifica se encontrou exatamente um registro
        if (mysqli_num_rows($result) == 1) {
            // credenciais de login válidas
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id']; // Corrigido para 'user_id'

            // Verifica se o checkbox foi marcado
            if (isset($_POST['checkbox'])) {
                // Define um cookie com duração de 1 mês (30 dias)
                setcookie("email", $email, time() + (60 * 60 * 24 * 30)); 
            } else {
                // Define um cookie com duração de 1 dia
                setcookie("email", $email, time() + (3600 * 24));
            }

            // Redireciona para a página inicial
            header('Location: dashboard.php');
            exit(); // Termina o script após redirecionamento
        } else {
            // credenciais de login inválidas
            echo "Nome de email ou senha inválidos";
        }
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($link);
?>
