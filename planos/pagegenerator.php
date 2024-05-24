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



    $data = date("d/m/y");
    $datalimite = date('d/m/y', strtotime('+1 month'));
    $sql = "UPDATE login SET datalimite='$datalimite', ativacao_data='$data' WHERE email='$email';";
            
    mysqli_query($conn, $sql);


    header('Location: ../index.php');
            
?>