<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/register.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.4.0/dist/email.min.js"></script>
    </head>
    <body>
        
        <div class="gif">
            <a  href="./index.php"><img src="./img/gif/camiao1.gif"></a>
        </div>

        <form  id="form" method="POST" class="container" autocomplete="off">
            
            <div class="register">
                <h1>Recuperar conta</h1>
            </div>
        
            <div>
                <p>Digite o email da conta</p>
                <input placeholder="Digite o seu Email"  type="text" size="35" maxlength="256" class="email" name="email" id="email" required>
            </div>
            
            <input type="submit" value="Registar" class="button-submit" name="button-submit" id="button-submit">
            
            <div class="login">
                <p>Voltar para o<a href="./login.php">login</a></p>
            </div>
        
            
            <div id="buttonDiv"></div> 
        </form>


        <?php
            $numero_de_bytes = 32;

            $restultado_bytes = random_bytes($numero_de_bytes);
            $resultado_final = bin2hex($restultado_bytes);
            $arquivo = fopen("recuperar_passwords/" . $resultado_final . '.php', 'w');

            fclose($arquivo);

            $link = 'localhost/Yazaki Projeto - 1/recuperar_passwords/' . $resultado_final . '.php';

            echo $link;
        ?>

        <script>
            // Conectar á API
            (function() {
                emailjs.init("aPqbtlvNXwRoWuk-2");
            })();

            // Faça o envio da mensagem usando o EmailJS
            function sendMessage(link, email) {
                emailjs.send("service_xcyducf","template_0a9ql97",{
                    "link": link,
                    "email": email
                }).then(function() {
                console.log("Mensagem enviada com sucesso!");
                }, function(error) {
                console.log("Erro ao enviar mensagem: " + error);
                });
            }

            // Manipula o envio do formulário
            function handleFormSubmit(event) {
                // Previne o envio do formulário
                event.preventDefault();

                // Obtém os valores de assunto e corpo da mensagem do formulário
                var link = "<?php echo $link;?>";
                var email = document.getElementById("email").value;

                // Envia a mensagem
                sendMessage(link, email);
            }

            // Adiciona um manipulador de evento de envio de formulário
            function addFormEventHandler() {
                var form = document.getElementById("form");
                form.addEventListener("submit", handleFormSubmit);
            }

            // Executa a função quando a página é carregada
            window.addEventListener("load", addFormEventHandler);
        </script>
    </body>
</html>