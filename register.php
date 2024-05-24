<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/register.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>

<body>

    <div class="gif">
        <a href="./index.php"><img src="./img/gif/camiao1.gif"></a>
    </div>

    <form action="./register_user.php" method="POST" class="container" autocomplete="off">

        <div class="register">
            <h1>Sign up</h1>
        </div>

        <div>
            <p>Email</p>
            <input placeholder="Digite o seu Email" type="text" size="35" maxlength="256" class="email" name="email"
                pattern="[a-z0-9._%+-]{1,}@[a-z0-9.-]{2,}\.[a-z]{2,}" required>
        </div>

        <div>
            <p>Senha</p>
            <input placeholder="Digite a sua Password" type="password" size="35" maxlength="30" class="password"
                name="senha" required>
        </div>


        <input type="submit" value="Registar" class="button-submit" name="button-submit" id="button-submit">

        <div class="login">
            <p>Já tem uma conta?<a href="./login.php">Faça login</a></p>
        </div>


        <div class="container">
            <hr>
            <div id="buttonDiv"></div>

            <p id="fullName"></p>
            <p id="sub"></p>
            <p id="given_name"></p>
            <p id="family_name"></p>
            <p id="email"></p>
            <p id="verifiedEmail"></p>
            <img id="picture" />
        </div>
    </form>

    <!-- Inclusão dos scripts -->
<script src="./jwt-decode.js"></script>
<script src="./js/google_register.js"></script>
</body>


</html>