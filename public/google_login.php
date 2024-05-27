<?php
session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
        $email = $_POST['email'];

        $servername = "localhost";
        $database = "yazaki_p1";
        $username = "root";
        $password = "";

        $link = mysqli_connect($servername, $username, $password, $database);
        if (isset($_POST['email'])) {

            $query = "SELECT id_user, email FROM login WHERE email = '$email'";
            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) == 1) {
                // credenciais de login válidas
                $row = mysqli_fetch_assoc($result);
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['email'] = $row['email'];
                    
                    if (isset($_POST['checkbox']))
                    {
                        // Set cookies 1 mes
                        setcookie("email", $email, time() + (60 * 60 * 24 * 30));
                    } else {
                        setcookie("email", $email, time() + (3600 * 24));
                    }
                    
            } else {
                // credenciais de login inválidas
                echo "Nome de email ou senha inválidos";
            }
        } 
    }

?>