<?php

    session_start();
    $email = $_COOKIE['email'];


    $name = $_POST["name"];
    $descricao = $_POST["description"];
    $foto = $_POST["profile-pic"];

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

            if ($name != "")
            {
                $sql = "UPDATE login SET nome='$name' WHERE email='$email'";

                if (mysqli_query($conn, $sql)) {
                    echo "Linha atualizada com sucesso.";
                } else {
                    echo "Erro ao atualizar linha: " . mysqli_error($conn);
                }
            }

            if ($descricao != "")
            {
                $sql = "UPDATE login SET descricao='$descricao' WHERE email='$email'";

                if (mysqli_query($conn, $sql)) {
                    echo "Linha atualizada com sucesso.";
                } else {
                    echo "Erro ao atualizar linha: " . mysqli_error($conn);
                }
            }

            /*
            if ($foto != "")
            {
                $sql = "UPDATE login SET nome='$name' WHERE email='$email'";

                if (mysqli_query($conn, $sql)) {
                    echo "Linha atualizada com sucesso.";
                } else {
                    echo "Erro ao atualizar linha: " . mysqli_error($conn);
                }
            }
            */
        }

    } else {
        echo "<script>alert('Senha atual incorreta!');</script>";
        header('Location: ../perfil.php');
    }



?>