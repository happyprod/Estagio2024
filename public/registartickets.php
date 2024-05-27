<?php

$user_email = $_POST["email"];
$user_password = $_POST["password"];

if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    $servername = "localhost";
    $database = "concertpulse";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexão falhada: " . $conn->connect_error);
    }

    $flag = 0;
    $sql = "SELECT * FROM accounts WHERE email = '$user_email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["email"] == $user_email) {
                $flag = 1;
                header("Location: register.php");
            }
        }
    }


    if ($flag == 0) {
        mkdir(__DIR__ . '/utilizador/' . $user_email . '/', 0777, true);
        $diretorio = "./img/foto/default.jpg";

        // Extrai o nome de usuário antes do '@'
        $username = explode('@', $user_email)[0];

        $currentDateTime = date('Y-m-d H:i:s');

        $sql = "INSERT INTO accounts (name, email, password, picture, registered, method, function) VALUES ('$username', '$user_email', '$user_password', '$diretorio', '$currentDateTime', 'form', 3)";
        mysqli_query($conn, $sql);

        header("Location: logintickets.php");
    }

} else {
    header("Location: logintickets.php");
}
?>