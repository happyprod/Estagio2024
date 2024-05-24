<?php
// Simulação de busca de novos dados no servidor
$novoConteudo = "Novos dados carregados em " . date('H:i:s');

// Retorna o novo conteúdo
echo $novoConteudo;
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<div>
    <p>olasdasdasdas</p>
</div>

    <div id="conteudoDiv">

    </div>

    <button id="atualizarBtn">Atualizar</button>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Função para atualizar a div com novos dados
            function atualizarDiv() {
                $.ajax({
                    url: 'atualizar_conteudo.php', // URL para o script PHP que retorna os novos dados
                    type: 'GET', // Método de requisição (GET ou POST)
                    success: function (response) {
                        // Atualiza o conteúdo da div com os dados recebidos do servidor
                        $('#conteudoDiv').html(response);
                    },
                    error: function () {
                        alert('Erro ao carregar os novos dados.'); // Trata erros, se houver
                    }
                });
            }

            // Chama a função para atualizar a div quando o botão for clicado
            $('#atualizarBtn').click(function () {
                atualizarDiv(); // Chama a função para atualizar a div
            });

            // Chama a função automaticamente ao carregar a página (opcional)
            atualizarDiv();
        });
    </script>



    <script src="" async defer></script>
</body>

</html>