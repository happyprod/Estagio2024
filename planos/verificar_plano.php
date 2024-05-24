<?php

    if(!isset($_SESSION)){
        session_start();
    }

    $email = $_SESSION['email'];


    $servername = "localhost";
    $database = "yazaki_p1";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);



    $query = "SELECT email, datalimite FROM login WHERE email = '$email'";
    $result = mysqli_query($conn, $query);


    while ($row = mysqli_fetch_assoc($result)) {
        $data = date("d-m-y");
        $datalimite = $row['datalimite'];

        if ($data > $datalimite)
        {
            $sql = "UPDATE login SET datalimite='', ativacao_data='' WHERE email='$email'";
            mysqli_query($conn, $sql);
        }
    }

?>