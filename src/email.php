<?php
require '../vendor/autoload.php';
require '../config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor de email
            $mail->isSMTP();
            $mail->Host = EMAIL_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = EMAIL_USERNAME; // Substituir pelo seu email real
            $mail->Password = EMAIL_PASSWORD; // Substituir pela sua pp real
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom(EMAIL_FROM, 'Concert Pulse'); // Substituir pelo seu email real
            $mail->addAddress('a.rcalado29147@aeestarreja.pt'); // Destinatário

            // Conteúdo do email
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Redefinição da Palavra-Passe';
            $link_redefinicao = "http://localhost/Estagio2024/redefinirpp.html?token=$token";
            $mail->Body = '
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                margin: 0;
                                padding: 20px;
                                color: #333;
                            }
                            .container {
                                max-width: 600px;
                                margin: auto;
                                background: #f8f8f8;
                                padding: 20px;
                                border-radius: 8px;
                                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                            }
                            .btn {
                                display: inline-block;
                                padding: 10px 20px;
                                color: #fff !important;
                                background-color: #007bff;
                                border-radius: 5px;
                                text-decoration: none !important;
                                font-weight: bold;
                            }

                            .footer {
                                margin-top: 20px;
                                font-size: 0.9em;
                                text-align: center;
                                color: #666;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h2>Redefinição de Palavra-Passe</h2>
                            <p>Recebemos um pedido para redefinir a sua palavra-passe. Se não foi você que pediu, por favor ignore este e-mail. Caso contrário, clique no botão abaixo para prosseguir:</p>
                            <a href="' . $link_redefinicao . '" class="btn">Redefinir Palavra-Passe</a>
                            <div class="footer">
                                <p>Se tiver problemas ao clicar no botão, copie e cole o seguinte link no seu navegador:</p>
                                <p><a href="' . $link_redefinicao . '">' . $link_redefinicao . '</a></p>
                            </div>
                        </div>
                    </body>
                    </html>
                    ';

            $mail->send();
            header("Location: ../../pedidoredefinirpp.html?notification=success");
        } catch (Exception $e) {
            // Tratamento de falha no envio
            echo 'Erro ao enviar email: ' . $e->getMessage();
        }

?>