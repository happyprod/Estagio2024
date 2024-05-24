<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
        $email = $_POST['email'];
        $fotop = $_POST['picture'];
        $nome = $_POST['name'];

        $servername = "localhost";
        $database = "yazaki_p1";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Conexão falhada: " . $conn->connect_error);
        }

        $flag = 0;
        $sql = "SELECT * FROM login WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                if ($row["email"] == $email) {
                    $flag = 1;
                    
                    header("Location: register.php");
                }
            }
        }


        if ($flag == 0)
        {
            mkdir(__DIR__.'/utilizador/' . $email . '/', 0777, true);
            $sql = "INSERT INTO login (id_user, email, senha, fotop, nome) VALUES (null, '$email', 'email', '$fotop', '$nome')";
            mysqli_query($conn, $sql);
        }
    }
?>