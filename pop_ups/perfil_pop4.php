<?php

    session_start();

    $email = $_COOKIE['email'];


    $pass = $_POST["passatual"];

    $servername = "localhost";
    $database = "yazaki_p1";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexão falhada: " . $conn->connect_error);
    }


    $sql = "SELECT ativacao_data, datalimite, senha FROM login WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            if ($pass == $row["senha"])
            {

                $sql = "DELETE FROM login WHERE email = '$email'";
                
                unset($_SESSION["email"]);

                if (mysqli_query($conn, $sql)) {
                    header("Location: ../index.php");
                } else {
                    echo "Erro ao atualizar linha: " . mysqli_error($conn);
                    header('Location: ../index.php');
                }
            }
            
        }

    } else {
        echo "<script>alert('Senha atual incorreta!');</script>";
        header('Location: ../perfil.php');
    }



?>