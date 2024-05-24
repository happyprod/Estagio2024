<?php

    session_start();
    $email = $_COOKIE['email'];


    $pass1 = $_POST["current-password"];
    $pass2 = $_POST["new-password"];
    $pass3 = $_POST["confirm-password"];

    $servername = "localhost";
    $database = "yazaki_p1";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexão falhada: " . $conn->connect_error);
    }


    $sql = "SELECT senha FROM login WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            if ($pass1 == $row["senha"] || $pass1 == '') {

                if ($pass2 == $pass3) {

                    $sql2 = "UPDATE login SET senha='$pass2' WHERE email='$email';";

                    if (mysqli_query($conn, $sql2)) {
                        header('Location: ../perfil.php');
                    } else {
                        echo "Erro ao atualizar linha: " . mysqli_error($conn);
                    }
                }
            }
        }

    } else {
        echo "<script>alert('Senha atual incorreta!');</script>";
        header('Location: ../perfil.php');
    }



?>