    <?php
        class inserir {
            public function insere() {
                echo $_SERVER['PHP_SELF'];
            }
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') { // aqui é onde vai decorrer a chamada se houver um *request* POST
            $product = new inserir;
        }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/login.css">
    </head>
    <body>

        <?php
            $link = substr($_SERVER['PHP_SELF'],20);    

            $servername = "localhost";
            $database = "yazaki_p1";
            $username = "root";
            $password = "";

            $conn = mysqli_connect($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Conexão falhada: " . $conn->connect_error);
            }

            $flag = 0;
            $sql = "SELECT * FROM login WHERE link = '$link'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) { 
                while($row = mysqli_fetch_assoc($result)) {
                   $email = $row["email"];
                }
            }

            $senha = $_POST['senha'];

            if ($flag == 0)
            {
                $sql = "UPDATE login SET senha='$senha' WHERE email='$email';";
                mysqli_query($conn, $sql);
            }
        ?>

        <div class="gif">
            <a href="./index.php"><img src="./img/gif/camiao1.gif"></a>
        </div>

        <form method="POST" class="container" autocomplete="off">

        <div class="login">
            <h1>Login</h1>
        </div>

        <div>
            <p>Digite a nova password</p>
            <input placeholder="Seja criativo"  type="password" size="35" maxlength="256" class="email" name="senha1" required>
        </div>

        <div>
            <p>Repita a nova password</p>
            <input placeholder="Para termos a certeza" type="password" size="35" maxlength="30" class="password" name="senha2" required>
        </div>

            <input type="submit" value="Login" class="button-submit" name="button-submit" id="button-submit">
        </form>

    </body>
</html>