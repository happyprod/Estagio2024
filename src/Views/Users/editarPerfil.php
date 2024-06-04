<?php
// Caminho completo para o arquivo atual
$filePath = __DIR__; // Use __DIR__ para obter o diretório atual do script

// Obter o nome da última pasta no caminho do diretório
$lastDirectoryName = basename($filePath);




// Configurações da base de dados
$db_host = 'localhost'; // Host do banco de dados
$db_name = 'concertpulse'; // Nome do banco de dados
$db_user = 'root'; // Usuário do banco de dados
$db_pass = ''; // Senha do banco de dados

// Tenta estabelecer a conexão com o banco de dados usando o PDO
try {
    // Cria uma nova instância da classe PDO para estabelecer a conexão com o banco de dados
    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);

    // Configuração do PDO para lançar exceções em caso de erros, facilitando a detecção e tratamento de problemas na conexão
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    // Se ocorrer uma exceção durante a conexão, encerra o script exibindo uma mensagem de erro
    exit('Falha ao conectar ao banco de dados!');
}


// Prepara uma consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o email corresponde ao email do perfil do usuário do Google
$stmt = $pdo->prepare('SELECT * FROM accounts WHERE url = ?');

// Executa a consulta SQL, substituindo o marcador de posição '?' pelo valor do endereço de e-mail do perfil do usuário do Google
$stmt->execute([$lastDirectoryName]);

// Obtém o resultado da consulta
$result = $stmt->fetch(); // Retorna a primeira linha do resultado como um array associativo


if ($result) {
    // O ID retornado pela consulta
    $id = $result['id'];
} else {
}



// Conexão com o banco de dados (substitua com suas credenciais)
$db_host = "localhost";
$db_name = "concertpulse";
$db_user = "root";
$db_pass = "";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


$name = "";
$image_url = "";
$location = "";
$type = "";

$shows = 0;
$follows = 0;
$rating = 0;
$valor = 0;





$sql_infos = "SELECT * FROM accounts WHERE id = ?";
$stmt_infos = $conn->prepare($sql_infos);
$stmt_infos->bind_param("i", $id);
$stmt_infos->execute();
$result_infos = $stmt_infos->get_result();
$row_infos = $result_infos->fetch_assoc();
$sobre = $row_infos["about"];
$nome = $row_infos["name"];
$email = $row_infos["email"];
$numero = $row_infos["number"];
$localizacao = $row_infos["location"];
$facebook = $row_infos["facebook"];
$type_utilizador = $row_infos["type"];
$fotodeperfil = $row_infos["picture"];
$fotodecapa = $row_infos["picture_background"];



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="../../public/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../public/img/logo.png">

    <title>
        ConcertPulse Artist
    </title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="../../public/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../public/assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../public/assets/css/nucleo-svg.css" rel="stylesheet" />


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Incluir Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="../../public/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


    <script>
        // Variável para contar o número de usuários na lista
        var numUsuarios = 0;

        $(function() {
            // Selecione todas as listas com a classe .sortable-list e inicialize o sortable para cada uma
            $(".sortable-list").each(function(index) {
                $(this).sortable({
                    items: "> div:not(.fixed-item)", // Somente itens que não têm a classe .fixed-item são ordenáveis
                    update: function(event, ui) {
                        var order = $(this).sortable('toArray', {
                            attribute: 'data-id'
                        });
                        console.log("Lista " + (index + 1) + ":", order);
                    }
                });
            });

            $(".sortable-list").disableSelection();
        });

        // Função para remover um nome da lista
        function removerNome(button, event) {
            console.log('Função removerNome foi chamada.');
            console.log('Evento:', event);

            // Impedir o comportamento padrão do evento (envio do formulário)
            event.preventDefault();

            // Código para remover o item da lista
            var listItem = $(button).closest('li');
            listItem.remove();

            numUsuarios--;

            if (numUsuarios == 0) {

                var boxcomnomes = document.getElementById('boxcomnomes');

                console.log('teste', numUsuarios)
                boxcomnomes.classList.add('d-none');
            }
        }
    </script>



    <script>
        var projetos = [];
        var gostos = [];
        var comentarios = [];
        var contador;

        function selectCard(cardId, containerSelecionado) {
            var cards = document.getElementsByClassName('card-button');
            var totalImages = 9;

            var cardbotao = cardId + '-' + containerSelecionado;
            var selectedCard = document.getElementById(cardbotao);
            var divdoscomentarios;
            var divdosgostos;

            console.log('containerSelecionado', containerSelecionado);

            console.log('ate aqui chegou!');

            // Verificando se o elemento foi encontrado
            if (selectedCard) {
                selecao = selectedCard.id;
                selecao = cardId.replace("cardButton", "");
                if (selecao <= 3) {
                    projetos[containerSelecionado] = selecao;
                } else if (selecao <= 6) {
                    gostos[containerSelecionado] = selecao;
                } else {
                    comentarios[containerSelecionado] = selecao;
                }

                if (projetos[containerSelecionado] == 2 && gostos[containerSelecionado] == 4) {
                    gostos[containerSelecionado] = 5;
                }


                if (projetos[containerSelecionado] == 2 && comentarios[containerSelecionado] == 7) {
                    comentarios[containerSelecionado] = 8;
                }
            }

            // Remove 'active' class from all cards
            for (var i = 0; i < cards.length; i++) {
                cards[i].classList.remove('active');
            }

            // Add 'active' class to the selected card
            if (selectedCard) {
                selectedCard.classList.add('active');
            }

            // Reset filter for all images
            for (var i = 1; i <= totalImages; i++) {
                var image = document.getElementById("image" + i + "-" + containerSelecionado);
                if (image) {
                    image.style.filter = "invert(0)";
                }


                var titulo = 'title' + i + '-' + containerSelecionado;
                var tituloname = document.getElementById(titulo);

                if (tituloname) {
                    if (cardbotao != titulo) {
                        console.log('titulo: ' + titulo);
                        tituloname.style.color = "black";
                    }
                }
            }

            if (projetos[containerSelecionado] == 3) {
                divdosgostos = 'DivGostos' + [containerSelecionado];
                divdoscomentarios = 'DivComentarios' + [containerSelecionado];

                document.getElementById(divdosgostos).classList.add('d-none');
                document.getElementById(divdoscomentarios).classList.add('d-none');
            } else {
                divdosgostos = 'DivGostos' + [containerSelecionado];
                divdoscomentarios = 'DivComentarios' + [containerSelecionado];

                document.getElementById(divdosgostos).classList.remove('d-none');
                document.getElementById(divdoscomentarios).classList.remove('d-none');
            }


            var cardbotao1 = cardId + "-" + containerSelecionado;

            console.log("asdasdasdasdasdasdasd", cardbotao);

            for (k = 1; k <= 9; k++) {
                console.log('cardButton' + k + '-' + containerSelecionado);
                if (cardbotao == 'cardButton' + k + '-' + containerSelecionado) {
                    cardbotao1 = 'image' + k + '-' + containerSelecionado;
                    cardtitulo = 'title' + k + '-' + containerSelecionado;

                    document.getElementById(cardtitulo).style.color = "white";
                    document.getElementById(cardbotao1).style.filter = "invert(1)";

                }
            }


        }

        function showLikes(contador) {

            var elementId = 'rightPaneContent' + contador;

            var divId = 'DivGostos' + contador;
            var divId2 = 'DivProjeto' + contador;
            var divId3 = 'DivComentarios' + contador;

            var div = document.getElementById(divId);
            var divprojects = document.getElementById(divId2);
            var divcoments = document.getElementById(divId3);

            if (div) {
                console.log('Div found: ', divId);
                console.log('Div found: ', divId2);
                console.log('Div found: ', divId3);


                var label = div.querySelector('label');
                console.log('Label found: ', label);

                var label2 = divprojects.querySelector('label');
                console.log('Label found projetos: ', label2);

                var label3 = divcoments.querySelector('label');
                console.log('Label found comentarios: ', label3);


                // Modificar a label como desejado
                if (label) {
                    label.style.backgroundColor = "rgba(0, 123, 255, 0.1)";

                    // Modificar a borda da div
                    label.style.borderColor = "#007bff";


                    label2.style.backgroundColor = "white";
                    label2.style.borderColor = "rgba(187, 187, 187, 0.5)";

                    label3.style.backgroundColor = "white";
                    label3.style.borderColor = "rgba(187, 187, 187, 0.5)";


                }

            } else {
                console.log('Div not found: ', divId);
            }


            document.getElementById(elementId).innerHTML = `
            <div style="transition: 1s linear;">
                <div id="cardButton4-${contador}" class="card card-button m-2 ${gostos[contador] == 4 ? "active" : ""} ${projetos[contador] == 2 ? "d-none" : ""}" onclick="selectCard('cardButton4', ${contador})" style="height: 80px; transition: height 0.3s ease;">
                    <div class="card-body d-flex align-items-center" style="height: 80px;">
                        <img id="image4-${contador}" ${gostos[contador] == 4 ? "style='filter: invert(1);'" : ""}  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEQklEQVR4nO2Za4hVVRTHf46a10TElF4aDSkEJQhK0EtChaZMP6QQZjXR44NCH4Sgh5QJ9kAhJMoHfZhR0CBHJImiEose1lCWWr6gIsVKSzN6UOo4c2Nd/ic2l3P22eec63iF84fDMHP++7/3OnvttdZeAyVKlChRABcC84B1wE7gN+AM8DLnCSrAIuB3oBrz9ABX0uS4AvjSWfQBYDEwA7gaeE1/Pwl8CCwABtFkGA18p4X+BMyK4YwDPgJ+cYzdCgyhidClhe0FRgXwZ8lgG/MK/YwWYAqwUi50RGdhPtAH/A20ZtCbJDezILAceBs4DPwB/AlcfzaMGC+/jjvAffr5Ug7dVxM0q8BnwFRgcKOMmKivZOIngFXAbGAycNSZOM8XnKqxvwJ3aa4J2pFI92vgmqJGjNB2m+AbOtT1RkaRyFwvKy7SeHNRF+Z2TwN79P5bYHgBO2o5wYQ+BS6IeT9ArmU7lRd9euJgeWmH1vB4gTnYJZFpHs5fQC8wNId+Rfr/eDi3i7ObnBgInAL+TUlc2zTRLTnmmKKxX3k4Q1QR9OTNOQP0pS3e+/BMgai1XmOXpPCOiHcZOXFUBznufER4X5M8mUN/pca+6+G0yH2NN5KCGbvNw4kmyRNVrtLYHwPcbycF8IVEHvJwolIjS1aP0Kaxn3g4CwPOUSp6JTLMw1kjzhbgkgzaVkR2a+xTHt5QJznauc2FgxK40cMZrexrvNUZtLdozJ4U379JvB8ogOVO5h7r4U0Qb3+G0H5cO27VQxIu19ymvYwCsLi9WUIPp0SWKEReF6B7W+ABbhfvzZTIGYQ7JLY9hfeCeB+k1F2DnLPxWIrmNvHm0gBUnCrX7h5JGOnwng8w+FBKELnHKSh97pcJ0RZ/Hsjb5OFsEse6LATwHqWBuEGiduf2YZ54GzycqAlxd4rWhkBeJkyX6DspvAfE6/RwOsUxrg8dAUEmc+SKSpW1geHakmRaAk0Lp0vEs6vEpRQ85A8qN1RVU12bwLUo9YgaCVX1spIwU5wzGtPiSbQHxbVO5VLllWBcDDwHHHNKg290R48ztt25xdnzYsAcKxz+DmmYVj2sbH/L4Z7S2bEEnAjrVjyrtk40sFthsD4Ztco1XGN/Bu4lHO1OEq1Ka1lC8Xkz8DpwWtxeufnwuF342GnvbE7I0ON0WHvqjL0/4YumoaKx3XX94U7NVY8x2s2TTkOw1a17tjv3ArO+HgN1EzztbHFHgrvlhWl1SLuquRYnnKHxTqG6O+p93ac/HFcjOs6ILme3Os5yR71Vc0SNv41aQz1GqCL+P0S/p1+eSBBeqvfWNJtD/2GO06iz4BOH+Xpv1+3aTkTh9UTME/WdbqX/0ebsjO+p9dX2BRAtYpwrdAWsr1Y6DVblGvd8L+Kd59CQ2VqDffBcqDiZuhmenpwhvpYE9zaBAVUnZzTsXwwlSpQoUYJG4D8zfL5hqU0xoAAAAABJRU5ErkJggg==">
                        <div class="ms-4">
                            <h5 class="card-title mb-1" id="title4-${contador}" style="margin-bottom: 0.25em; ${gostos[contador] == 4 ? "color: white;" : ""}">Publico</h5>
                            <p class="card-text description">Qualquer pessoa pode ver...</p>
                        </div>
                    </div>
                </div>

                    <div id="cardButton5-${contador}" class="card card-button m-2 ${gostos[contador] == 5 ? "active" : ""}" onclick="selectCard('cardButton5', ${contador})">
                        <div class="card-body d-flex align-items-center" style="height: 80px;">
                            <img id="image5-${contador}" ${gostos[contador] == 5 ? "style='filter: invert(1);'" : ""} src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD1klEQVR4nO2ZW4hVZRTHf2UmTaijOZqXQRON8vZgF8UbgqIiJqgYpuaLL6EpGARB0IsEgkWKIT54Q0VFFO8OGKigMhghhHdMbZRUEmOscRyo3LHkv2FxnLPPvsmc5PxgP5xvr//a33V96/sOVKhQocLzzsvAXGAbUA/8BvwD3ANOAEuAVyhzpgI3gaDEcxYYD7SjDJmnnreKXgQ+B94HegEvAa8DHwJXXIMuAyMoIwYCzarcyhI93RdYBfwi+7+AYZQJG1Wp3QnX0h7p6igDXtRCDjQySagGHkj7Jm3McDff07BTeltjbco0VWR/Sv1X0i+njZmnimxNqf9C+hVF1tFMrb0LCgwWVM4DX2tq5sYsVcQWbhqWS28j4xms6Rq1H10HPgFezaEdjJXTUyn1W6Vf6Mpsz7nj1t4i4G1VuAoYB/zsGvQT8FrWhtTK2e8p9WGvv+PK1qnsJNCxiK6TNthLst1BDoTh942EOuv5x5r37d26aJQ/G4VS9JL+X6APGWjvpsFHCbVzpbvnGjLcpTlx2SeNrdfUTJSTcxruJFQrAgXy48P5kQR+vpVmGRmYLieHU+oPS29+wgzafh9M4GO1NEvJQD85uZ9iRDoDf0hvyaQxWr/PpJhas8nIcRcKLYrFoa/THHPlXVX2QHlcHG6nzPWeotal5XF7ZY7srxY03s4uTXpnm2Ip3pLt3y5gZOLLhKnKdtkvLigfo3LrmJoYfroD16QxbWb6K5Y/irGfmG2LTpQ9ikRB2wzjckqaCeTEFjk8UMLuoOw2t/KutzqkWUflUoxQ51mn9CQneroFHEVoU+zDm52NTZ1idHd2mzLUO7KSWWw66CrJbBZE2C2QTb00ZdcQ42PZ/BhhUy+b+eTMkIQNGRphUxXDV6DHbHOjVgedQLcqUWyQ3a9uR4+qaNr3iegCfOZ21/oYPWRXpqdlf1eXebaje/rovaX0xWhMmE20yrvAeuCh65mjaljczLfOZbrvuXcvAN/p3aEYYXyNNIkbEFYg0MHoB+CDBLlRiNkPKEgiF+uiIdDeMCpCP1KpSaCT4tI4FxJ2cluriodD/k1OF2s1OlP40b2lG5RSTAcanK5Zo9nq/lPt0oAW3XzEnUJxksc/3eja9Jyh5DEu7dSgOmUF4Z2y+W51LjZoauXFEjfC+3K6zB4C7HUd82n4YpIKmwrmc1aGaXQf67onbxbJd4sax64iF2hZWecizrPie33D1vaTOB/oAJMntxNc+aRlkL5hf/892X2DHJ9u+kjefoOI54Z9cEpBeMv6hJFkcs5+gyJPg9pQoUKFCvx/+A8kSpPCW6utKAAAAABJRU5ErkJggg==">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title5-${contador}" ${gostos[contador] == 5 ? "style='color: white;'" : ""}>Apenas Seguidores</h5>
                                <p class="card-text description">Apenas quem lhe segue pode ver...</p>
                            </div>
                        </div>
                    </div>

                    <div id="cardButton6-${contador}" class="card card-button m-2 ${gostos[contador] == 6 ? "active" : ""}" onclick="selectCard('cardButton6', ${contador})">
                        <div class="card-body d-flex align-items-center" style="height: 75px;">
                            <img id="image6-${contador}" ${gostos[contador] == 6 ? "style='filter: invert(1);'" : ""} src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEBElEQVR4nO2azW+UVRTGfw11OoYizgDiQhNZEoyyFpeNQhojuEPLToIbPlLZomz4sLBq0oS/Q20IEDVNULAgtiz4ELqxwIIPFyqtTWuGnPC8yUmd6XvfO3dmiuFJbvpxzz333HvPPfecZwae4/+LKrAdOAGMAjeAP4A5Nfv9uvpM5kOgwjJBGdgFnAX+BWoF2wJwBhgAejqxgBeBz4F7zqh/gO+BQzqZjdrxF9Qq+p/1fQH8oDHZ+LvAoDanLegHppwBl4BPgdURul4GdgOXnb7bwDZaCNupU27CX4D3EurfCvzq9I+04nReleE2wWNgL7Ai9SQ81bkfmHGnvT6V8g067pqizpu0Hm8BNzXnLdnQFNY5hePAWtqHCnBec0/JK6JQdu70E7CS9mMlcNG5WdSdOeXcyR67IijL138G/lYzg/ZFvBdrnFdYACgcYrOLXfROvA5cXeIRnABei7gzMxpv0S34scveCYtORU8iW8SkNqRXrd/1TUSczAF3+YNc7KB7J1ZETjYp4xdjVROb1K0NqGmeJVF2aUfMYzeusbb7jbBdMnZnimKbxt7JO9EBFyFi8JfG1zsNfyom82eE/i4XST9eSvCchCx3ikF2oVPJ1cMejT1dt1chdkEZaUwC2K6FVFTfzDeyc4eUfxc5QbsWYhjT+A+og5PqtHoiFCXgq0V1SdFmdcgx6QrFYY0dqtc5qk4rQUNxvIkFLG5HC8ybec839Tp/U6dVcaG4qzHvEI8t7mRCsUljjBf4Dx6ps0he1ayvx+pZK/n79Trn1Fl6BhbS43iCtiykX6/wdE4dnnQhD9VpaXMo8gyYdjK/N6GnkWs9SHXZ8wzwbMtUE3oKXfZvI8JvngF9TqavCT2Nwu/XSz2IRp6FIsSAVDLBD2KWXhsDGIoQA6zcvZBAT3CKUnFJozGAyzX8Vl3S+FIjoTNSuLsFBqTS85lkLaVqiE8kZFxskRTF0oxYvCsd9t6EFFZXJL8zr9TNjHs/QPGxhEnjkQLsznQIeTEo4SsB5ENJi8kWH9PuaBF5GUW3SI2a+LFclB3XayTbcsGgbLpZhErK2IoZkWOdxmZgNpbdGXE7UCT/So11IuXMluEYBWXRQhkH1QkSu1cPak0/e5rZjRtSNK6/24Uq8KPmvp3iA58N7mjNzd6mPXfilua0rPyNVIrXOzebEfdq4TA1uhWdZp07vZJ6krILADURyqk+fe3SYzfp9A+3+rP3re7Ya+Ji90R+i6Gq3ClLO2pypZSfFueezgG9ypkBc0qvv1Ths0lhu6S2Rh8afSSZMccTZGnHvk59A6JHrPhplQBF05N5ZbE7O7WAelitQmdIDOB1ERrZl2rs92sqT4ck27CeeA6ecTwBhN3E7TcZQfQAAAAASUVORK5CYII=">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title6-${contador}" ${gostos[contador] == 6 ? "style='color: white;'" : ""}>Apenas Eu</h5>
                                <p class="card-text description">Ninguém exceto você pode ver...</p>
                            </div>
                        </div>
                    </div>
            </div>
            `;
        }


        function showComments(contador) {
            var elementId = 'rightPaneContent' + contador;


            var divId = 'DivGostos' + contador;
            var divId2 = 'DivProjeto' + contador;
            var divId3 = 'DivComentarios' + contador;

            var div = document.getElementById(divId);
            var divprojects = document.getElementById(divId2);
            var divcoments = document.getElementById(divId3);

            if (divcoments) {
                console.log('Div found: ', divId);
                console.log('Div found: ', divId2);
                console.log('Div found: ', divId3);

                var label = divcoments.querySelector('label');
                console.log('Label found comentarios: ', label);

                var label2 = div.querySelector('label');
                console.log('Label found: ', label2);

                var label3 = divprojects.querySelector('label');
                console.log('Label found projetos: ', label3);

                // Modificar a label como desejado
                if (label) {
                    label.style.backgroundColor = "rgba(0, 123, 255, 0.1)";
                    label.style.borderColor = "#007bff";

                    label2.style.backgroundColor = "white";
                    label2.style.borderColor = "rgba(187, 187, 187, 0.5)";

                    label3.style.backgroundColor = "white";
                    label3.style.borderColor = "rgba(187, 187, 187, 0.5)";
                }
            } else {
                console.log('Div not found: ', divId3);
            }



            document.getElementById(elementId).innerHTML = `
                <div style="transition: 1s linear;">
                    <div id="cardButton7-${contador}" class="card card-button m-2 ${comentarios[contador] == 7 ? "active" : ""} ${projetos[contador] == 2 ? "d-none" : ""}" onclick="selectCard('cardButton7', ${contador})" style="height: 80px;">
                        <div class="card-body d-flex align-items-center" style="padding-top: 12px;">
                            <img id="image7-${contador}" ${comentarios[contador] == 7 ? "style='filter: invert(1);'" : ""} src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEQklEQVR4nO2Za4hVVRTHf46a10TElF4aDSkEJQhK0EtChaZMP6QQZjXR44NCH4Sgh5QJ9kAhJMoHfZhR0CBHJImiEose1lCWWr6gIsVKSzN6UOo4c2Nd/ic2l3P22eec63iF84fDMHP++7/3OnvttdZeAyVKlChRABcC84B1wE7gN+AM8DLnCSrAIuB3oBrz9ABX0uS4AvjSWfQBYDEwA7gaeE1/Pwl8CCwABtFkGA18p4X+BMyK4YwDPgJ+cYzdCgyhidClhe0FRgXwZ8lgG/MK/YwWYAqwUi50RGdhPtAH/A20ZtCbJDezILAceBs4DPwB/AlcfzaMGC+/jjvAffr5Ug7dVxM0q8BnwFRgcKOMmKivZOIngFXAbGAycNSZOM8XnKqxvwJ3aa4J2pFI92vgmqJGjNB2m+AbOtT1RkaRyFwvKy7SeHNRF+Z2TwN79P5bYHgBO2o5wYQ+BS6IeT9ArmU7lRd9euJgeWmH1vB4gTnYJZFpHs5fQC8wNId+Rfr/eDi3i7ObnBgInAL+TUlc2zTRLTnmmKKxX3k4Q1QR9OTNOQP0pS3e+/BMgai1XmOXpPCOiHcZOXFUBznufER4X5M8mUN/pca+6+G0yH2NN5KCGbvNw4kmyRNVrtLYHwPcbycF8IVEHvJwolIjS1aP0Kaxn3g4CwPOUSp6JTLMw1kjzhbgkgzaVkR2a+xTHt5QJznauc2FgxK40cMZrexrvNUZtLdozJ4U379JvB8ogOVO5h7r4U0Qb3+G0H5cO27VQxIu19ymvYwCsLi9WUIPp0SWKEReF6B7W+ABbhfvzZTIGYQ7JLY9hfeCeB+k1F2DnLPxWIrmNvHm0gBUnCrX7h5JGOnwng8w+FBKELnHKSh97pcJ0RZ/Hsjb5OFsEse6LATwHqWBuEGiduf2YZ54GzycqAlxd4rWhkBeJkyX6DspvAfE6/RwOsUxrg8dAUEmc+SKSpW1geHakmRaAk0Lp0vEs6vEpRQ85A8qN1RVU12bwLUo9YgaCVX1spIwU5wzGtPiSbQHxbVO5VLllWBcDDwHHHNKg290R48ztt25xdnzYsAcKxz+DmmYVj2sbH/L4Z7S2bEEnAjrVjyrtk40sFthsD4Ztco1XGN/Bu4lHO1OEq1Ka1lC8Xkz8DpwWtxeufnwuF342GnvbE7I0ON0WHvqjL0/4YumoaKx3XX94U7NVY8x2s2TTkOw1a17tjv3ArO+HgN1EzztbHFHgrvlhWl1SLuquRYnnKHxTqG6O+p93ac/HFcjOs6ILme3Os5yR71Vc0SNv41aQz1GqCL+P0S/p1+eSBBeqvfWNJtD/2GO06iz4BOH+Xpv1+3aTkTh9UTME/WdbqX/0ebsjO+p9dX2BRAtYpwrdAWsr1Y6DVblGvd8L+Kd59CQ2VqDffBcqDiZuhmenpwhvpYE9zaBAVUnZzTsXwwlSpQoUYJG4D8zfL5hqU0xoAAAAABJRU5ErkJggg==">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title7-${contador}" style="margin-bottom: 0.25em; ${comentarios[contador] == 7 ? "color: white;" : ""}">Publico</h5>
                                <p class="card-text description">Qualquer pessoa pode ver...</p>
                            </div>
                        </div>
                    </div>

                    <div id="cardButton8-${contador}" class="card card-button m-2 ${comentarios[contador] == 8 ? "active" : ""}" onclick="selectCard('cardButton8', ${contador})">
                        <div class="card-body d-flex align-items-center" style="height: 80px;">
                            <img id="image8-${contador}" ${comentarios[contador] == 8 ? "style='filter: invert(1);'" : ""} src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD1klEQVR4nO2ZW4hVZRTHf2UmTaijOZqXQRON8vZgF8UbgqIiJqgYpuaLL6EpGARB0IsEgkWKIT54Q0VFFO8OGKigMhghhHdMbZRUEmOscRyo3LHkv2FxnLPPvsmc5PxgP5xvr//a33V96/sOVKhQocLzzsvAXGAbUA/8BvwD3ANOAEuAVyhzpgI3gaDEcxYYD7SjDJmnnreKXgQ+B94HegEvAa8DHwJXXIMuAyMoIwYCzarcyhI93RdYBfwi+7+AYZQJG1Wp3QnX0h7p6igDXtRCDjQySagGHkj7Jm3McDff07BTeltjbco0VWR/Sv1X0i+njZmnimxNqf9C+hVF1tFMrb0LCgwWVM4DX2tq5sYsVcQWbhqWS28j4xms6Rq1H10HPgFezaEdjJXTUyn1W6Vf6Mpsz7nj1t4i4G1VuAoYB/zsGvQT8FrWhtTK2e8p9WGvv+PK1qnsJNCxiK6TNthLst1BDoTh942EOuv5x5r37d26aJQ/G4VS9JL+X6APGWjvpsFHCbVzpbvnGjLcpTlx2SeNrdfUTJSTcxruJFQrAgXy48P5kQR+vpVmGRmYLieHU+oPS29+wgzafh9M4GO1NEvJQD85uZ9iRDoDf0hvyaQxWr/PpJhas8nIcRcKLYrFoa/THHPlXVX2QHlcHG6nzPWeotal5XF7ZY7srxY03s4uTXpnm2Ip3pLt3y5gZOLLhKnKdtkvLigfo3LrmJoYfroD16QxbWb6K5Y/irGfmG2LTpQ9ikRB2wzjckqaCeTEFjk8UMLuoOw2t/KutzqkWUflUoxQ51mn9CQneroFHEVoU+zDm52NTZ1idHd2mzLUO7KSWWw66CrJbBZE2C2QTb00ZdcQ42PZ/BhhUy+b+eTMkIQNGRphUxXDV6DHbHOjVgedQLcqUWyQ3a9uR4+qaNr3iegCfOZ21/oYPWRXpqdlf1eXebaje/rovaX0xWhMmE20yrvAeuCh65mjaljczLfOZbrvuXcvAN/p3aEYYXyNNIkbEFYg0MHoB+CDBLlRiNkPKEgiF+uiIdDeMCpCP1KpSaCT4tI4FxJ2cluriodD/k1OF2s1OlP40b2lG5RSTAcanK5Zo9nq/lPt0oAW3XzEnUJxksc/3eja9Jyh5DEu7dSgOmUF4Z2y+W51LjZoauXFEjfC+3K6zB4C7HUd82n4YpIKmwrmc1aGaXQf67onbxbJd4sax64iF2hZWecizrPie33D1vaTOB/oAJMntxNc+aRlkL5hf/892X2DHJ9u+kjefoOI54Z9cEpBeMv6hJFkcs5+gyJPg9pQoUKFCvx/+A8kSpPCW6utKAAAAABJRU5ErkJggg==">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title8-${contador}"  ${comentarios[contador] == 8 ? "style='color: white;'" : ""}>Apenas Seguidores</h5>
                                <p class="card-text description">Apenas quem lhe segue pode ver...</p>
                            </div>
                        </div>
                    </div>

                    <div id="cardButton9-${contador}" class="card card-button m-2 ${comentarios[contador] == 9 ? "active" : ""}" onclick="selectCard('cardButton9', ${contador})">
                        <div class="card-body d-flex align-items-center" style="height: 75px;">
                            <img id="image9-${contador}" ${comentarios[contador] == 9 ? "style='filter: invert(1);'" : ""} src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEBElEQVR4nO2azW+UVRTGfw11OoYizgDiQhNZEoyyFpeNQhojuEPLToIbPlLZomz4sLBq0oS/Q20IEDVNULAgtiz4ELqxwIIPFyqtTWuGnPC8yUmd6XvfO3dmiuFJbvpxzz333HvPPfecZwae4/+LKrAdOAGMAjeAP4A5Nfv9uvpM5kOgwjJBGdgFnAX+BWoF2wJwBhgAejqxgBeBz4F7zqh/gO+BQzqZjdrxF9Qq+p/1fQH8oDHZ+LvAoDanLegHppwBl4BPgdURul4GdgOXnb7bwDZaCNupU27CX4D3EurfCvzq9I+04nReleE2wWNgL7Ai9SQ81bkfmHGnvT6V8g067pqizpu0Hm8BNzXnLdnQFNY5hePAWtqHCnBec0/JK6JQdu70E7CS9mMlcNG5WdSdOeXcyR67IijL138G/lYzg/ZFvBdrnFdYACgcYrOLXfROvA5cXeIRnABei7gzMxpv0S34scveCYtORU8iW8SkNqRXrd/1TUSczAF3+YNc7KB7J1ZETjYp4xdjVROb1K0NqGmeJVF2aUfMYzeusbb7jbBdMnZnimKbxt7JO9EBFyFi8JfG1zsNfyom82eE/i4XST9eSvCchCx3ikF2oVPJ1cMejT1dt1chdkEZaUwC2K6FVFTfzDeyc4eUfxc5QbsWYhjT+A+og5PqtHoiFCXgq0V1SdFmdcgx6QrFYY0dqtc5qk4rQUNxvIkFLG5HC8ybec839Tp/U6dVcaG4qzHvEI8t7mRCsUljjBf4Dx6ps0he1ayvx+pZK/n79Trn1Fl6BhbS43iCtiykX6/wdE4dnnQhD9VpaXMo8gyYdjK/N6GnkWs9SHXZ8wzwbMtUE3oKXfZvI8JvngF9TqavCT2Nwu/XSz2IRp6FIsSAVDLBD2KWXhsDGIoQA6zcvZBAT3CKUnFJozGAyzX8Vl3S+FIjoTNSuLsFBqTS85lkLaVqiE8kZFxskRTF0oxYvCsd9t6EFFZXJL8zr9TNjHs/QPGxhEnjkQLsznQIeTEo4SsB5ENJi8kWH9PuaBF5GUW3SI2a+LFclB3XayTbcsGgbLpZhErK2IoZkWOdxmZgNpbdGXE7UCT/So11IuXMluEYBWXRQhkH1QkSu1cPak0/e5rZjRtSNK6/24Uq8KPmvp3iA58N7mjNzd6mPXfilua0rPyNVIrXOzebEfdq4TA1uhWdZp07vZJ6krILADURyqk+fe3SYzfp9A+3+rP3re7Ya+Ji90R+i6Gq3ClLO2pypZSfFueezgG9ypkBc0qvv1Ths0lhu6S2Rh8afSSZMccTZGnHvk59A6JHrPhplQBF05N5ZbE7O7WAelitQmdIDOB1ERrZl2rs92sqT4ck27CeeA6ecTwBhN3E7TcZQfQAAAAASUVORK5CYII=">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title9-${contador}"  ${comentarios[contador] == 9 ? "style='color: white;'" : ""}>Apenas Eu</h5>
                                <p class="card-text description">Ninguém exceto você pode ver...</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        function showProject(contador) {
            var elementId = 'rightPaneContent' + contador;


            var divId = 'DivGostos' + contador;
            var divId2 = 'DivProjeto' + contador;
            var divId3 = 'DivComentarios' + contador;

            var div = document.getElementById(divId);
            var divprojects = document.getElementById(divId2);
            var divcoments = document.getElementById(divId3);

            if (divprojects) {
                console.log('Div found: ', divId);
                console.log('Div found: ', divId2);
                console.log('Div found: ', divId3);

                var label = divprojects.querySelector('label');
                console.log('Label found projetos: ', label);

                var label2 = div.querySelector('label');
                console.log('Label found: ', label2);

                var label3 = divcoments.querySelector('label');
                console.log('Label found comentarios: ', label3);

                // Modificar a label como desejado
                if (label) {
                    label.style.backgroundColor = "rgba(0, 123, 255, 0.1)";
                    label.style.borderColor = "#007bff";

                    label2.style.backgroundColor = "white";
                    label2.style.borderColor = "rgba(187, 187, 187, 0.5)";

                    label3.style.backgroundColor = "white";
                    label3.style.borderColor = "rgba(187, 187, 187, 0.5)";
                }
            } else {
                console.log('Div not found: ', divId2);
            }



            console.log(contador);
            console.log('esta aqui:', elementId);
            document.getElementById(elementId).innerHTML = `
                <div style="transition: 1s linear;">
                    <div id="cardButton1-${contador}" class="card card-button m-2 ${projetos[contador] == 1 ? "active" : ""}"  onclick="selectCard('cardButton1', ${contador})" style="height: 80px;">
                        <div class="card-body d-flex align-items-center" style="padding-top: 12px;">
                            <img ${projetos[contador] == 1 ? "style='filter: invert(1);'" : ""} id="image1-${contador}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEQklEQVR4nO2Za4hVVRTHf46a10TElF4aDSkEJQhK0EtChaZMP6QQZjXR44NCH4Sgh5QJ9kAhJMoHfZhR0CBHJImiEose1lCWWr6gIsVKSzN6UOo4c2Nd/ic2l3P22eec63iF84fDMHP++7/3OnvttdZeAyVKlChRABcC84B1wE7gN+AM8DLnCSrAIuB3oBrz9ABX0uS4AvjSWfQBYDEwA7gaeE1/Pwl8CCwABtFkGA18p4X+BMyK4YwDPgJ+cYzdCgyhidClhe0FRgXwZ8lgG/MK/YwWYAqwUi50RGdhPtAH/A20ZtCbJDezILAceBs4DPwB/AlcfzaMGC+/jjvAffr5Ug7dVxM0q8BnwFRgcKOMmKivZOIngFXAbGAycNSZOM8XnKqxvwJ3aa4J2pFI92vgmqJGjNB2m+AbOtT1RkaRyFwvKy7SeHNRF+Z2TwN79P5bYHgBO2o5wYQ+BS6IeT9ArmU7lRd9euJgeWmH1vB4gTnYJZFpHs5fQC8wNId+Rfr/eDi3i7ObnBgInAL+TUlc2zTRLTnmmKKxX3k4Q1QR9OTNOQP0pS3e+/BMgai1XmOXpPCOiHcZOXFUBznufER4X5M8mUN/pca+6+G0yH2NN5KCGbvNw4kmyRNVrtLYHwPcbycF8IVEHvJwolIjS1aP0Kaxn3g4CwPOUSp6JTLMw1kjzhbgkgzaVkR2a+xTHt5QJznauc2FgxK40cMZrexrvNUZtLdozJ4U379JvB8ogOVO5h7r4U0Qb3+G0H5cO27VQxIu19ymvYwCsLi9WUIPp0SWKEReF6B7W+ABbhfvzZTIGYQ7JLY9hfeCeB+k1F2DnLPxWIrmNvHm0gBUnCrX7h5JGOnwng8w+FBKELnHKSh97pcJ0RZ/Hsjb5OFsEse6LATwHqWBuEGiduf2YZ54GzycqAlxd4rWhkBeJkyX6DspvAfE6/RwOsUxrg8dAUEmc+SKSpW1geHakmRaAk0Lp0vEs6vEpRQ85A8qN1RVU12bwLUo9YgaCVX1spIwU5wzGtPiSbQHxbVO5VLllWBcDDwHHHNKg290R48ztt25xdnzYsAcKxz+DmmYVj2sbH/L4Z7S2bEEnAjrVjyrtk40sFthsD4Ztco1XGN/Bu4lHO1OEq1Ka1lC8Xkz8DpwWtxeufnwuF342GnvbE7I0ON0WHvqjL0/4YumoaKx3XX94U7NVY8x2s2TTkOw1a17tjv3ArO+HgN1EzztbHFHgrvlhWl1SLuquRYnnKHxTqG6O+p93ac/HFcjOs6ILme3Os5yR71Vc0SNv41aQz1GqCL+P0S/p1+eSBBeqvfWNJtD/2GO06iz4BOH+Xpv1+3aTkTh9UTME/WdbqX/0ebsjO+p9dX2BRAtYpwrdAWsr1Y6DVblGvd8L+Kd59CQ2VqDffBcqDiZuhmenpwhvpYE9zaBAVUnZzTsXwwlSpQoUYJG4D8zfL5hqU0xoAAAAABJRU5ErkJggg==">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title1-${contador}" style="margin-bottom: 0.25em; ${projetos[contador] == 1 ? "color: white;" : ""}">Publico</h5>
                                <p class="card-text description">Qualquer pessoa pode ver...</p>
                            </div>
                        </div>
                    </div>

                    <div id="cardButton2-${contador}" class="card card-button m-2 ${projetos[contador] == 2 ? "active" : ""}" onclick="selectCard('cardButton2', ${contador})">
                        <div class="card-body d-flex align-items-center" style="height: 80px;">
                            <img ${projetos[contador] == 2 ? "style='filter: invert(1);'" : ""} id="image2-${contador}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD1klEQVR4nO2ZW4hVZRTHf2UmTaijOZqXQRON8vZgF8UbgqIiJqgYpuaLL6EpGARB0IsEgkWKIT54Q0VFFO8OGKigMhghhHdMbZRUEmOscRyo3LHkv2FxnLPPvsmc5PxgP5xvr//a33V96/sOVKhQocLzzsvAXGAbUA/8BvwD3ANOAEuAVyhzpgI3gaDEcxYYD7SjDJmnnreKXgQ+B94HegEvAa8DHwJXXIMuAyMoIwYCzarcyhI93RdYBfwi+7+AYZQJG1Wp3QnX0h7p6igDXtRCDjQySagGHkj7Jm3McDff07BTeltjbco0VWR/Sv1X0i+njZmnimxNqf9C+hVF1tFMrb0LCgwWVM4DX2tq5sYsVcQWbhqWS28j4xms6Rq1H10HPgFezaEdjJXTUyn1W6Vf6Mpsz7nj1t4i4G1VuAoYB/zsGvQT8FrWhtTK2e8p9WGvv+PK1qnsJNCxiK6TNthLst1BDoTh942EOuv5x5r37d26aJQ/G4VS9JL+X6APGWjvpsFHCbVzpbvnGjLcpTlx2SeNrdfUTJSTcxruJFQrAgXy48P5kQR+vpVmGRmYLieHU+oPS29+wgzafh9M4GO1NEvJQD85uZ9iRDoDf0hvyaQxWr/PpJhas8nIcRcKLYrFoa/THHPlXVX2QHlcHG6nzPWeotal5XF7ZY7srxY03s4uTXpnm2Ip3pLt3y5gZOLLhKnKdtkvLigfo3LrmJoYfroD16QxbWb6K5Y/irGfmG2LTpQ9ikRB2wzjckqaCeTEFjk8UMLuoOw2t/KutzqkWUflUoxQ51mn9CQneroFHEVoU+zDm52NTZ1idHd2mzLUO7KSWWw66CrJbBZE2C2QTb00ZdcQ42PZ/BhhUy+b+eTMkIQNGRphUxXDV6DHbHOjVgedQLcqUWyQ3a9uR4+qaNr3iegCfOZ21/oYPWRXpqdlf1eXebaje/rovaX0xWhMmE20yrvAeuCh65mjaljczLfOZbrvuXcvAN/p3aEYYXyNNIkbEFYg0MHoB+CDBLlRiNkPKEgiF+uiIdDeMCpCP1KpSaCT4tI4FxJ2cluriodD/k1OF2s1OlP40b2lG5RSTAcanK5Zo9nq/lPt0oAW3XzEnUJxksc/3eja9Jyh5DEu7dSgOmUF4Z2y+W51LjZoauXFEjfC+3K6zB4C7HUd82n4YpIKmwrmc1aGaXQf67onbxbJd4sax64iF2hZWecizrPie33D1vaTOB/oAJMntxNc+aRlkL5hf/892X2DHJ9u+kjefoOI54Z9cEpBeMv6hJFkcs5+gyJPg9pQoUKFCvx/+A8kSpPCW6utKAAAAABJRU5ErkJggg==">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title2-${contador}"  ${projetos[contador] == 2 ? "style='color: white;'" : ""}>Apenas Seguidores</h5>
                                <p class="card-text description">Apenas quem lhe segue pode ver...</p>
                            </div>
                        </div>
                    </div>

                    <div id="cardButton3-${contador}" class="card card-button m-2 ${projetos[contador] == 3 ? "active" : ""}" onclick="selectCard('cardButton3', ${contador})">
                        <div class="card-body d-flex align-items-center" style="height: 75px;">
                            <img ${projetos[contador] == 3 ? "style='filter: invert(1);'" : ""}  id="image3-${contador}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEBElEQVR4nO2azW+UVRTGfw11OoYizgDiQhNZEoyyFpeNQhojuEPLToIbPlLZomz4sLBq0oS/Q20IEDVNULAgtiz4ELqxwIIPFyqtTWuGnPC8yUmd6XvfO3dmiuFJbvpxzz333HvPPfecZwae4/+LKrAdOAGMAjeAP4A5Nfv9uvpM5kOgwjJBGdgFnAX+BWoF2wJwBhgAejqxgBeBz4F7zqh/gO+BQzqZjdrxF9Qq+p/1fQH8oDHZ+LvAoDanLegHppwBl4BPgdURul4GdgOXnb7bwDZaCNupU27CX4D3EurfCvzq9I+04nReleE2wWNgL7Ai9SQ81bkfmHGnvT6V8g067pqizpu0Hm8BNzXnLdnQFNY5hePAWtqHCnBec0/JK6JQdu70E7CS9mMlcNG5WdSdOeXcyR67IijL138G/lYzg/ZFvBdrnFdYACgcYrOLXfROvA5cXeIRnABei7gzMxpv0S34scveCYtORU8iW8SkNqRXrd/1TUSczAF3+YNc7KB7J1ZETjYp4xdjVROb1K0NqGmeJVF2aUfMYzeusbb7jbBdMnZnimKbxt7JO9EBFyFi8JfG1zsNfyom82eE/i4XST9eSvCchCx3ikF2oVPJ1cMejT1dt1chdkEZaUwC2K6FVFTfzDeyc4eUfxc5QbsWYhjT+A+og5PqtHoiFCXgq0V1SdFmdcgx6QrFYY0dqtc5qk4rQUNxvIkFLG5HC8ybec839Tp/U6dVcaG4qzHvEI8t7mRCsUljjBf4Dx6ps0he1ayvx+pZK/n79Trn1Fl6BhbS43iCtiykX6/wdE4dnnQhD9VpaXMo8gyYdjK/N6GnkWs9SHXZ8wzwbMtUE3oKXfZvI8JvngF9TqavCT2Nwu/XSz2IRp6FIsSAVDLBD2KWXhsDGIoQA6zcvZBAT3CKUnFJozGAyzX8Vl3S+FIjoTNSuLsFBqTS85lkLaVqiE8kZFxskRTF0oxYvCsd9t6EFFZXJL8zr9TNjHs/QPGxhEnjkQLsznQIeTEo4SsB5ENJi8kWH9PuaBF5GUW3SI2a+LFclB3XayTbcsGgbLpZhErK2IoZkWOdxmZgNpbdGXE7UCT/So11IuXMluEYBWXRQhkH1QkSu1cPak0/e5rZjRtSNK6/24Uq8KPmvp3iA58N7mjNzd6mPXfilua0rPyNVIrXOzebEfdq4TA1uhWdZp07vZJ6krILADURyqk+fe3SYzfp9A+3+rP3re7Ya+Ji90R+i6Gq3ClLO2pypZSfFueezgG9ypkBc0qvv1Ths0lhu6S2Rh8afSSZMccTZGnHvk59A6JHrPhplQBF05N5ZbE7O7WAelitQmdIDOB1ERrZl2rs92sqT4ck27CeeA6ecTwBhN3E7TcZQfQAAAAASUVORK5CYII=">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title3-${contador}"  ${projetos[contador] == 3 ? "style='color: white;'" : ""}>Apenas Eu</h5>
                                <p class="card-text description">Ninguém exceto você pode ver...</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }
    </script>


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

</head>

<body class="g-sidenav-show bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="../../public/dashboard.php">
                <img src="../../public/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Concert Pulse Artist's</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto h-100 " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../public/dashboard.php">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>document</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(154.000000, 300.000000)">
                                                <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                                </path>
                                                <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./pages/profile.html">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>

                <?php
                // Conexão com o banco de dados (substitua com suas credenciais)
                $db_host = "localhost";
                $db_name = "concertpulse";
                $db_user = "root";
                $db_pass = "";

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                if ($conn->connect_error) {
                    die("Erro de conexão: " . $conn->connect_error);
                }

                $iddoutilizador = $_SESSION['user_id'];

                // Query para buscar os dados dos artistas
                $sql = "SELECT function FROM accounts WHERE id = $iddoutilizador";
                $result = $conn->query($sql);


                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        if ($row['function'] == 2) {
                            echo '
              
              <li class="nav-item">
          <a class="nav-link" href="../../public/registarevento.php">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="20px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>spaceship</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(4.000000, 301.000000)">
                        <path class="color-background"
                          d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z">
                        </path>
                        <path class="color-background opacity-6"
                          d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z">
                        </path>
                        <path class="color-background opacity-6"
                          d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z">
                        </path>
                        <path class="color-background opacity-6"
                          d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z">
                        </path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Registar Evento</span>
          </a>
        </li>
              
              ';
                        }
                    }
                }

                ?>

            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
                <div class="full-background" style="background-image: url('../../public/assets/img/curved-images/white-curved.jpg')"></div>
            </div>
        </div>
    </aside>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100 py-3">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="text-dark opacity-5" href="javascript:;">Perfil</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Editar Perfil</li>
                    </ol>
                    <h6 class="text-dark font-weight-bolder ms-2" id="nomepag"></h6>
                </nav>
                <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                    </div>
                                </a>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer text-dark h5"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../../public/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../../public/assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark me-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer h5 text-dark"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- End Navbar -->
        <div class="container-fluid w-90" style="margin-top: 9.5em;">
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-lg-12 col-md-12 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0 ms-5">
                            <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active" href="javascript:mostrarSobre();" role="tab" id="sobre_nav">
                                        <i class="fas fa-user-edit text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Sobre"></i>
                                        <span class="ms-1">Sobre</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1" href="javascript:mostrarAgenda();" id="agenda_nav" role="tab">
                                        <i class="ni ni-calendar-grid-58 text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Agenda"></i>
                                        <span class="ms-1">Agenda</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1" id="projetos_nav" href="javascript:mostrarProjetos();" role="tab" aria-selected="false">
                                        <i class="ni ni-book-bookmark text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Projetos"></i>
                                        <span class="ms-1">Projetos</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1" id="perfil_nav" href="javascript:mostrarPerfil();" role="tab" aria-selected="false">
                                        <i class="ni ni-circle-08" data-bs-toggle="tooltip" data-bs-placement="top" title="Foto de Perfil/Capa"></i>
                                        <span class="ms-1">Foto de Perfil/Capa</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid py-4 editar w-90">

            <div class="form-group" id="ver_sobre">
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <div class="card h-100 p-3">
                            <label for="example-text-input" class="col-auto col-form-label">Nome</label>
                            <input class="form-control mb-4" type="text" value="John Snow" id="alterar_nome">

                            <label for="example-text-input" class="col-auto col-form-label">Numero</label>
                            <input class="form-control mb-4" type="text" value="913 123 123" id="alterar_numero">

                            <label for="example-text-input" class="col-auto col-form-label">Email</label>
                            <input class="form-control mb-4" type="text" value="utilizador@gmail.com" id="alterar_email">

                            <label for="example-text-input" class="col-auto col-form-label">País</label>
                            <input class="form-control mb-4" type="text" value="Amadora" id="alterar_localizacao">


                            <label for="example-text-input" class="col-auto col-form-label">Descrição</label>
                            <textarea class="form-control" id="alterar_sobre" rows="3" style="height: 22.5em; overflow-y: scroll; resize: none;"></textarea>

                            <div class="row mt-2">
                                <div class="col-6 col-xl-6">
                                    <p><strong>Caracteres:</strong> <span id="contador_caracteres">0</span></p>
                                </div>
                                <div class="col-6 col-xl-6">
                                    <p><strong>Palavras:</strong> <span id="contador_palavras">0</span></p>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="container-fluid col-6 col-xl-6">
                        <div class="col-6 col-xl-12">
                            <div class="card p-3">

                                <div class="row align-items-center">
                                    <label for="example-text-input" class="col-auto col-form-label">Linked In</label>
                                    <div class="col">
                                        <div class="form-check form-switch float-end">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        </div>
                                    </div>
                                </div>

                                <input class="form-control mb-4" type="text" value="utilizador@gmail.com" id="alterar_linkedin">

                                <div class="row align-items-center">
                                    <label for="example-text-input" class="col-auto col-form-label">Spotify</label>
                                    <div class="col">
                                        <div class="form-check form-switch float-end">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        </div>
                                    </div>
                                </div>
                                <input class="form-control mb-4" type="text" value="utilizador@gmail.com" id="alterar_tiktok">



                                <div class="row align-items-center">
                                    <label for="example-text-input" class="col-auto col-form-label">Youtube</label>
                                    <div class="col">
                                        <div class="form-check form-switch float-end">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        </div>
                                    </div>
                                </div>
                                <input class="form-control mb-4" type="text" value="utilizador@gmail.com" id="alterar_tiktok">


                                <div class="row align-items-center">
                                    <label for="example-text-input" class="col-auto col-form-label">Tiktok</label>
                                    <div class="col">
                                        <div class="form-check form-switch float-end">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        </div>
                                    </div>
                                </div>
                                <input class="form-control mb-4" type="text" value="utilizador@gmail.com" id="alterar_tiktok">



                                <div class="row align-items-center">
                                    <label for="example-text-input" class="col-auto col-form-label">Instagram</label>
                                    <div class="col">
                                        <div class="form-check form-switch float-end">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        </div>
                                    </div>
                                </div>
                                <input class="form-control mb-4" type="text" value="utilizador@gmail.com" id="alterar_instagram">


                                <div class="row align-items-center">
                                    <label for="example-text-input" class="col-auto col-form-label">Twitter</label>
                                    <div class="col">
                                        <div class="form-check form-switch float-end">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        </div>
                                    </div>
                                </div>
                                <input class="form-control mb-4" type="text" value="913 123 123" id="alterar_twitter">



                                <div class="row align-items-center">
                                    <label for="example-text-input" class="col-auto col-form-label">Facebook</label>
                                    <div class="col">
                                        <div class="form-check form-switch float-end">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        </div>
                                    </div>
                                </div>
                                <input class="form-control mb-4" type="text" value="John Snow" id="alterar_facebook">


                                <div class="row align-items-center">
                                    <label for="example-text-input" class="col-auto col-form-label">Blog Pessoal</label>
                                    <div class="col">
                                        <div class="form-check form-switch float-end">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        </div>
                                    </div>
                                </div>
                                <input class="form-control mb-4" type="text" value="utilizador@gmail.com" id="alterar_blog">


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="d-none" id="ver_agenda">

            </div>
        </div>




        <div class="d-none w-90 mx-auto" id="ver_perfil">
            <div class="row mt-4">
                <div class="col-12 col-xl-7">
                    <?php
                    if ($fotodecapa == null) {
                        echo '<img src="../../public/assets/img/curved-images/curved0.jpg" class="w-100 border-radius-lg img-fluid shadow-sm"';
                    } else {
                        echo '<img src="./' . $fotodecapa . '" class="w-100 border-radius-lg img-fluid shadow-sm"';
                    }
                    ?>>

                    <button type="button" class="btn bg-gradient-primary mt-3 w-100">Alterar foto de
                        capa</button>
                </div>


                <div class="col-12 col-xl-1">
                </div>

                <div class="col-12 col-xl-4">
                    <div class="position-relative">
                        <img <?php

                                // Obtém a extensão do arquivo em letras minúsculas
                                $extension = strtolower(pathinfo($fotodeperfil, PATHINFO_EXTENSION));

                                // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
                                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

                                // Verifica se a extensão está na lista de extensões permitidas
                                if (in_array($extension, $allowed_extensions)) {
                                    $google_image = false;
                                } else {
                                    $google_image = true;
                                }


                                if ($google_image == false) {
                                    echo 'src="../../public/utilizador/' . $id . '/' . $fotodeperfil . '"';
                                } else {
                                    echo 'src="' . $fotodeperfil . '"';
                                }
                                ?> alt="profile_image" class="w-100 border-radius-lg img-fluid shadow-sm">
                    </div>

                    <button type="button" class="btn bg-gradient-primary mt-3 w-100">Alterar foto de Perfil
                    </button>
                </div>
            </div>
        </div>












        <div class="col-12 mt-4 d-none" id="ver_projetos">
            <div class="card mb-4">
                <div class="card-body p-3">

                    <div class="row">



                        <?php

                        $count = 1;

                        // Consulta SQL para obter os dados desejados
                        $sql = "SELECT * FROM projects WHERE id_founder = $id";

                        $result = mysqli_query($conn, $sql);

                        // Verifica se a consulta retornou resultados
                        if (mysqli_num_rows($result) > 0) {
                            // Exibindo os dados encontrados
                            while ($row = mysqli_fetch_assoc($result)) {

                                $p_id = $row["id"];
                                $p_nome = $row["nome"];
                                $p_imagem = $row["imagem"];
                                $p_sinopse = $row["sinopse"];
                                $p_descricao = $row["descricao"];
                                $p_local = $row["local"];
                                $p_data = $row["data"];


                                // Texto original com quebras de linha
                                $texto_original2 = $p_descricao;

                                // Substituir \n por <br>
                                $texto_formatado2 = nl2br(htmlspecialchars($texto_original2)); // Use nl2br para manter as quebras de linha e htmlspecialchars para escapar caracteres especiais HTML


                                // Consulta SQL para obter os dados desejados
                                $sql2 = "SELECT * FROM projects_images WHERE id_project = $p_id ORDER BY ordem";
                                $result2 = mysqli_query($conn, $sql2);

                                $totalRows = mysqli_num_rows($result2);

                                echo '<script> console.log(' . $p_id . '); </script>';

                                echo '
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                        
                                    <div class="card card-blog card-plain">
                                        <div class="position-relative">
                                            <a class="d-block shadow-xl border-radius-xl">
                                                <img src="' . $p_imagem . '" alt="img-blur-shadow"
                                                    class="img-fluid shadow rounded-sm border-radius-xl w-100" style="height: 12.5vw;">
                                            </a>
                                        </div>
                                        <div class="card-body px-1 pb-0">
                                            <p class="text-gradient text-dark mb-2 text-sm">' . $p_local . '</p>
                                                <h5>
                                                    ' . $p_nome . '
                                                </h5>
                                                <p class="mb-4 text-sm" style="height: 63px;">
                                                ' . $p_sinopse . '
                                            </p>

                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="w-100">

                                                        <div class="col-md-12">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-outline-primary btn-sm w-100 d-flex justify-content-center text-center mb-0" data-bs-toggle="modal"
                                                            data-bs-target="#menu' . $count . '">
                                                            Alterar Projeto
                                                        </button>

                                                        
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="menu' . $count . '" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">' . $p_nome . ' - Alterar</h5>
                                                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <!-- Button trigger modal -->
                                                                                <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100"
                                                                                    data-bs-toggle="modal" onclick="alterarImageContainer(imageContainer' . $count . ')" data-bs-target="#alterarimagens' . $count . '">
                                                                                    Alterar Imagens
                                                                                </button>
                                                                            </div>

                                                                            <div class="col-6">
                                                                                <!-- Button trigger modal -->
                                                                                <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100"
                                                                                    data-bs-toggle="modal" data-bs-target="#exampleModalMessage3">
                                                                                    Alterar Informações
                                                                                </button>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">

                                                                            <div class="col-6">
                                                                                <!-- Button trigger modal -->
                                                                                <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100"
                                                                                    data-bs-toggle="modal" data-bs-target="#exampleModalMessage2">
                                                                                    Ver Estatisticas
                                                                                </button>
                                                                            </div>

                                                                            <div class="col-6">
                                                                                <!-- Button trigger modal -->
                                                                                <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100" data-bs-toggle="modal" onclick="showProject(' . $count . ')" data-bs-target="#splitModal' . $count . '">
                                                                                    Privacidade
                                                                                </button>
                                                                            </div>

                                                                            <div class="row d-flex justify-content-center mx-auto">
                                                                                <!-- Button trigger modal -->
                                                                                <button type="button" class="btn bg-gradient-danger btn-block mb-3 w-100"
                                                                                    data-bs-toggle="modal" data-bs-target="#exampleModalMessage3">
                                                                                    Apagar Projeto
                                                                                </button>
                                                                            </div>

                                                                            <div class="modal-footer" style="height: 4em;">
                                                                                <button type="button" class="btn bg-gradient-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalMessage2" data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Nome do asd - Alterar</h5>
                                                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    
                                                                    <div class="modal-body">

                                                                    <div class="card mb-3">
  <div class="card-body p-3">
    <div class="chart">
      <canvas id="line-chart" class="chart-canvas" height="300px"></canvas>
    </div>
  </div>
</div>
                                                        
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn bg-gradient-secondary btn-block"
                                                                            data-bs-toggle="modal" data-bs-target="#exampleModalMessage1">
                                                                            Close
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <!-- Modal -->
                                                        <div class="modal fade" id="splitModal' . $count . '" tabindex="-1" data-target="privacidade' . $count . '" aria-labelledby="splitModalLabel" data-bs-keyboard="false" data-bs-backdrop="static" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">' . $p_nome . ' - Privacidade </h5>
                                                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>


                                <div class="modal-body" style="padding: 0px;">
                                    <div class="modalcompletoprivacidade">
                                        <div class="row h-100">
                                            <div class="col-4">
                                                <div class="left-pane w-100 h-100 mx-auto">
                                                    <div class="radio-input">
                                                        <div id="DivProjeto' . $count . '" onclick="showProject(' . $count . ')">
                                                            <input type="radio" id="value-1" name="value-radio" value="value-3">
                                                            <label for="value-1">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABsUlEQVR4nO2YMUvDQBTHf4rYRaWzfgHBCn4FNycVByfdBaud3B0FP4KCs7uD7iLtoNZJVweVdhHUxcUnB6/lCE2a2ti7hPvDg0vukbzf+ydHchDkr0rAHlAHvjTMeAeYICeaA5qAxMQ1UCYHTjS14EdgDZjWWAeedO4KGMNj7VsQvbpetmBW8VgNLdI4EacNzTnHY31qkeZRitNMwvvjS9Ad9JHrQiWAROS64xIcich1xyU4EpHrjkueHDka4v5egUgCjDcg70A7Ze6BryAvwBIwD7z2yW0Diz6C3AOz1nUqQCsFRCXijFOQS+tjdBlYSICJQnTmD12DnFq/yFvAtxbXCyYOQiyYkYP8WF00qum5Xp0378xD5Pjtj+5nCmK6vq35xo2TmLyWdt5oPMEJcQHyAaxo7hRw0Se/nZETkjXImeaZFeou5c2NA5tDOiH/8WgdA88ZFCWuQVwGAQT3LkihHSnpJnbD2sQ246rO5QbkNiEpaS6Nm1lI0oIM1Y2igIgHgesCAggRRzq78XkP6kUBqRYFZHKAz26fY+B/CF+jK+PMLnCT0wUgKCgoKIiR6xep8tEcHYPuTwAAAABJRU5ErkJggg==" alt="Ícone Projeto">
                                                                Projeto
                                                            </label>
                                                        </div>

                                                        <div id="DivGostos' . $count . '" onclick="showLikes(' . $count . ')">
                                                            <input type="radio" id="value-2" name="value-radio" value="value-2">
                                                            <label for="value-2">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC3UlEQVR4nO2azUtUYRTGfwR1py81NA2iEipoU7tqWVBoQZFL003rQFKJVu1aqSVFQbQKXPQHVFO5dRESrctRIUr7IK2W+VG+8cIRZLpz575fdy7iAw8Mzp3nPY/vO+eec+7ABtYvdgEdwBBQBCaAn8CiUL9+L+/pay4BDeQEEdANjAJ/AGVI/ZmXQJdoZY6tQD/w2SL4SpwFeoFCVibOA9MeDZRzCmgPaUBv/b2ABso5IjvvFS3A2wxNKOEboNmXiVbZblUjTkoMTtgtaVTVmNPAHlsThRodJ5VwzKxS9MMcBK/KeN8mxaqcsi2tCb19pRwErCpwKu1Nsz8HwaoqvJZmN2ZzEKiqwplqX/zuHASpUvJykpFRC8HfwB3gOLAdqJdaaSzm2jF5r16uPQEMAwsW675I6idMS3Fd/R6toLcJ6AP+Cvvkb3E4BnwxXHsZqIsT6zAUWpL/aDVcFVbDSQnOJIaLcUK3DUUe4x8jhjEMxokUDUXOBjDSbhjD0ziRSUORxgBGmgxj0AXtf5g3FNkSwEhkGMNcnMiiocihAEYOG8aw4MOITqe+cd2HkR+GIjrvb/NoYgfwzTCG73FCNhXvTY9Gblmsrwd+zulXyQ3slAcTZyxuhqpS+h2yENL8CuxzMHHQImMq4YCPEqW82dlrYeIA8MFh3Qtxog2W89tVlgzHNkeAjw7rLVUqGjVeOQgrOSKnU5g4B/xyXOt50gJdjuKruf1Kwho3HHdeCTuzanV1s7V5jfZO4Ikn7U9pSqReT4tpvgb2S9/ic4LfQwoUPM965yxbWZVQ8Uah+oKsuGLTBz3IQeCqjHexQCSDY5UTjrv0QE05eqzQgiNaLdpgnyxJKeMFzTU6ZuPysCnIw9CVjEw8Cv3svS3wUZsINGqKRSSj/RmPBnTZ0VOrX0BEMhUvWnZ4y1LFdgYaL1mhTmaxeoz5TPrp+TU/qtGv30l7OiBNkS4kN7Au8Q+VNlCnUHu31AAAAABJRU5ErkJggg==" alt="Ícone Contagem de Gostos">
                                                                Contagem de Gostos
                                                            </label>
                                                        </div>

                                                        <div id="DivComentarios' . $count . '" onclick="showComments(' . $count . ')">
                                                            <input type="radio" id="value-3" name="value-radio" value="value-3">
                                                            <label for="value-3">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACL0lEQVR4nO2ZT0sVYRTGf2UIgUEZKJnQIvsAgpVb/QgS4ndwr3RbZf4p3BgVfQMFLRHvyp3fQEt3RX8o6IbmptRrmyMDZxEXbnNm5tyZ98I88Gwu3HOe8877nvPMO1CiRAkPXASGgQrwFtgHjoC/yiP97Q3wELiv/ykc/cAC8B2QhPwGzAM3ixB+HXgNnKUQ3sg68Arozkv8BHDoILyRB8B4K4Vf0lWXFvOl5nLFZaCag3hRbmpOF3QA6zmKF2XV60nksW2kCV94HFgpmA/Siu/WzlB0AYfatttq60jWrdTvNKS8WE86sRdiAkZ+phM/dKqP+l/OuSRtM87bdOGPKzE5v1oN4LDhkVZa8AQeGfLeswSzBCqK05YCipi6YuSapYD9AIRKE763FPDLEOgDsAg8deKixozLGw3WWFj6/238ccc4D2Jxagg0EHIBNeMWmtGu4MEnwEevLbTX7od4JQCh0oSrlgKmAxAqWQbZoCGQ1cxZTJok4JClgAtqnLzMXJxJEyPNZg7tMB5mzmrSxMDZBItGj3Ee5MU60EdCfApAuCifJxU/EIBoUf4EriUtYDIA4aIcIwU2AxAuwFIa8VHn+B2A+Graq8WRAMRvZLncfRZAx+kgA3YKEl5Le2AbcWJM+FkHTFbhp7rqV3HCdpNEf7Q7Tf7zRtYLPAa+pPQ2s8ANnHEL2AKOgV09E6MG7xO52ClgWV88fujqnulFwTu9Foks8d1QPrOWKEGb4xws8HXGpqFIIgAAAABJRU5ErkJggg==" alt="Ícone Gostos">
                                                                Comentarios
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-8" style="padding-left: 0px;">
                                                <div class="right-pane w-100 h-100 mx-auto" style="padding-left: 0px;" id="rightPaneContent' . $count . '">
                                                    <!-- Conteúdo dinâmico será carregado aqui -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                                                                        <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#menu' . $count . '" onclick="guardarprivacidade()">Confirmar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalMessage3" data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Alterar Informações</h5>
                                                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body ">
                          

                                <form action="">

                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Nome do evento</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tomorrowland" required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="row" style="height: 2em;">
                                                    <div class="col-10">
                                                        <div class="form-group">
                                                            <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Identificação do
                                                                Evento</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-2">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                    <input type="text" class="form-control" placeholder="TomorrowlandOfficial" aria-label="TomorrowlandOfficial" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="title" style="font-size: 16px;" for="exampleFormControlTextarea1">Descrição</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 295px;"></textarea>
                                    </div>


                                    <div class="row" style="margin-top: 2em;">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <label class="title" style="font-size: 16px;" for="exampleFormControlTextarea1">Data</label>
                                                    </div>

                                                    <div class="col-2">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input class="form-control" type="date" value="2018-11-23" id="example-date-input">
                                            </div>
                                        </div>

                                        <div class="col-6">

                                            <div class="form-group">
                                                <div class="row" style="height: 2.1em;">
                                                    <div class="col-10">
                                                        <div class="form-group">
                                                            <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Empresa de Booking</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-2">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                    <input type="text" class="form-control" placeholder="TomorrowlandOfficial" aria-label="TomorrowlandOfficial" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- promotores envolvidos, uma caixa de texto onde sera possivel escrever o @ do promotor e em baixo será possivel ver as pessoas com um @ semelhante, caso nao exista será exibido alguma mensagem de erro-->

                                    <!-- Localização -->


                                    <div class="border-top mt-4 w-85 mx-auto" style="opacity: 50%; margin-bottom: 2.2em;">
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <div class="">
                                                <div class="row" style="height: 2.1em;">

                                                    <div class="col-10">
                                                        <div class="form-group">
                                                            <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Localização</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-2">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="text" id="endereco" class="form-control mb-1" placeholder="Digite o endereço...">
                                                <div id="mapa" class="mt-3 rounded" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="row" style="height: 1.975em;">

                                                <div class="col-10">
                                                    <div class="form-group">
                                                        <label class="title" style="font-size: 16px;" for="exampleFormControlInput1">Colaboradores</label>
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="input-group mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                    <input type="text" class="form-control" placeholder="Promotor/Organizador" aria-label="Promotor/Organizador" aria-describedby="button-addon2" id="email" name="email" style="border-radius: 0em !important;" list="emails">
                                                    <datalist id="emails"></datalist>
                                                    <button class="btn btn-outline-primary mb-0" type="button" id="btnAdicionar">Adicionar</button>
                                                </div>

                                            </div>


                                            <div class="row d-none" id="boxcomnomes">
                                                <div class="col-xl-12 mb-3 mb-lg-5">
                                                    <div class="card">
                                                        <div id="listaNomes" class="overflow-auto p-3" style="max-height: 300px;">
                                                            <!-- Lista de nomes e emails adicionados -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </form>



                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                                                                        <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#menu' . $count . '" onclick="guardarimagens()">Confirmar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>





                                                    <div class="modal fade" id="alterarimagens' . $count . '" data-bs-backdrop="static" data-bs-keyboard="false"
                                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">

                                                        <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">' . $p_nome . ' - Alterar Imagens</h5>
                                                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>

                                                        <div class="modal-body">


                                                        <div class="row sortable-list" id="imageContainer' . $count . '">';


                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        $pi_imagem = $row2["image"];
                                        $ordem = $row2['ordem'];
                                        echo '
                                                    <div class="col-4 mb-3 imageContainer' . $count . '" data-id="' . $ordem . '">
                                                        <a class="delete-image" data-id="' . $ordem . '">
                                                            <i class="position-absolute mt-2 p-1 bg-danger rounded-circle" style="opacity: 77.5%; margin-left: 12.5em;">
                                                                <svg style="width: 2em; height: 2em; color: white;" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 32 32">
                                                                    <path d="M 15 4 C 14.476563 4 13.941406 4.183594 13.5625 4.5625 C 13.183594 4.941406 13 5.476563 13 6 L 13 7 L 7 7 L 7 9 L 8 9 L 8 25 C 8 26.644531 9.355469 28 11 28 L 23 28 C 24.644531 28 26 26.644531 26 25 L 26 9 L 27 9 L 27 7 L 21 7 L 21 6 C 21 5.476563 20.816406 4.941406 20.4375 4.5625 C 20.058594 4.183594 19.523438 4 19 4 Z M 15 6 L 19 6 L 19 7 L 15 7 Z M 10 9 L 24 9 L 24 25 C 24 25.554688 23.554688 26 23 26 L 11 26 C 10.445313 26 10 25.554688 10 25 Z M 12 12 L 12 23 L 14 23 L 14 12 Z M 16 12 L 16 23 L 18 23 L 18 12 Z M 20 12 L 20 23 L 22 23 L 22 12 Z" fill="rgb(255, 255, 255)"></path>
                                                                </svg>
                                                            </i>
                                                        </a>
                                                        <img src="' . $pi_imagem . '" class="ui-state-default d-block rounded" style="width:240px; height: 180px;" alt="...">
                                                    </div>';
                                    }
                                }

                                echo '
        
                                                        <div class="col-4 mb-3 fixed-item" id="fixedItem" style="width:263px; height: 180px;">
                                                                <label for="fileInput" class="w-100 h-100">
                                                                    <div class="card card-plain w-100 h-100 border">
                                                                        <div class="card-body d-flex flex-column justify-content-center text-center" style="width:100%; height: 100%;" >
                                                                            <i class="fa fa-plus text-secondary mb-3" aria-hidden="true"></i>
                                                                            <h5 class=" text-secondary"> Adicionar Imagem </h5>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            <input id="fileInput" type="file" style="display: none;">
                                                        </div>
                                
                                

                                                        </div>

                                                        <div class="row">
                                                            <div class="mx-auto">

                                                            
                                                            <div class="row">
                                                            ';

                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        $pi_imagem = $row2["image"];

                                        echo '
                                                                        <div class="col-4">
                                                                            <div class="image-container">
                                                                                <img src="' . $pi_imagem . '" class="d-block rounded" style="margin-bottom: 4em; width: 100%; height: 100%;" alt="...">
                                                                            </div>
                                                                        </div>
                                                                    ';
                                    }
                                }

                                echo '
                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                                                            <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#exampleModalMessage1" onclick="guardarimagens()">Confirmar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                                                
                                        ';


                                if ($count % 4 == 0) {
                                    echo '<span class="w-100 mt-5"></span>';
                                }

                                echo '<script> console.log(' . $count . '); </script>';

                                $count++;
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="fixed-plugin">

        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>

        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Configurations</h5>
                    <p>See your dashboard options</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-4">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop
                    view.
                </p>

                <hr class="horizontal dark my-sm-4">
                <div class="w-100 text-center">
                </div>
            </div>
        </div>
    </div>


    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="../../public/assets/js/core/popper.min.js"></script>
    <script src="../../public/assets/js/core/bootstrap.min.js"></script>
    <script src="../../public/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../public/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../public/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>


    <script>
        let map; // Variável global para armazenar o objeto do mapa

        function initMap() {
            const autocomplete = new google.maps.places.Autocomplete(
                document.getElementById('endereco'), {
                    types: ['geocode']
                }
            );

            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                if (!place.geometry) {
                    console.log("Endereço não encontrado.");
                    return;
                }

                // Mostrar o mapa com a localização selecionada
                exibirMapa(place.geometry.location);
            });
        }

        function exibirMapa(location) {
            if (!map) {
                // Criar um novo mapa se ainda não existir
                map = new google.maps.Map(document.getElementById('mapa'), {
                    center: location,
                    zoom: 15,
                    mapTypeId: 'satellite', // Definir o tipo de mapa para satélite
                    streetViewControl: false // Desabilitar o controle do Street View
                });
            } else {
                // Atualizar o centro do mapa para a nova localização
                map.setCenter(location);
            }

            // Adicionar um marcador no mapa
            new google.maps.Marker({
                position: location,
                map: map
            });
        }

        function loadGoogleMapsScript() {
            const script = document.createElement('script');
            script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyARtHqWhhONSQVfBMlIV4SMerzDmSTDf4o&libraries=places&callback=initMap';
            script.defer = true;
            script.async = true;
            document.head.appendChild(script);
        }

        // Carregar a API do Google Maps quando a página for totalmente carregada
        window.onload = loadGoogleMapsScript;
    </script>

    <script>
        function alteradocomsucesso() {
            toastr.options.timeOut = 10000; // 10 segundos
            toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
            toastr.success('Alterado com sucesso');
        }

        function erro(mensagem) {
            toastr.options.timeOut = 10000; // 10 segundos
            toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
            toastr.error(mensagem);
        }

        function guardarimagens() {
            // Coloque aqui o código que deseja executar quando o botão for clicado
            console.log("Botão 'Confirmar' clicado!");
            // Por exemplo, você pode fechar a modal se necessário

            // Função para mostrar a mensagem de sucesso
            alteradocomsucesso();
        }

        function guardarprivacidade() {
            // Coloque aqui o código que deseja executar quando o botão for clicado
            console.log("Botão 'Confirmar' clicado!");
            // Por exemplo, você pode fechar a modal se necessário

            // Função para mostrar a mensagem de sucesso
            alteradocomsucesso();
        }
    </script>

    <script>
        $(document).ready(function() {
            // Função para verificar e ajustar o texto conforme necessário
            $('.comentario').each(function() {
                var max_width = $(this).width(); // Largura do elemento <p>
                var text_width = $(this)[0].scrollWidth; // Largura real do texto dentro do elemento

                // Verifica se o texto excede a largura do elemento
                if (text_width > max_width) {
                    // O texto excede a largura - ajusta adicionando "..."
                    var text = $(this).text();
                    while ($(this)[0].scrollWidth > max_width) {
                        text = text.slice(0, -1); // Remove um caractere por vez até caber
                        $(this).text(text + '...');
                    }
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var headerDiv = document.getElementById('headerDiv');
            var overlay = document.getElementById('overlay');
            var imageUpload = document.getElementById('imageUpload');

            // Adicionar evento de clique no texto "Alterar Imagem"
            overlay.addEventListener('click', function() {
                imageUpload.click(); // Quando o texto é clicado, aciona o clique no input de arquivo
            });

            // Adicionar evento de seleção de arquivo
            imageUpload.addEventListener('change', function() {
                var file = imageUpload.files[0]; // Obter o arquivo selecionado pelo usuário

                if (file) {
                    var reader = new FileReader();

                    // Callback executado quando a imagem é carregada
                    reader.onload = function(e) {
                        // Atualizar o background-image da div com a imagem carregada
                        headerDiv.style.backgroundImage = 'url(' + e.target.result + ')';
                    };

                    // Ler o conteúdo do arquivo como URL de dados
                    reader.readAsDataURL(file);
                }
            });

            // Adicionar evento de mouseover para mostrar a sobreposição
            headerDiv.addEventListener('mouseover', function() {
                overlay.style.opacity = 1; // Torna a sobreposição visível
            });

            // Adicionar evento de mouseout para ocultar a sobreposição
            headerDiv.addEventListener('mouseout', function() {
                overlay.style.opacity = 0; // Torna a sobreposição invisível novamente
            });
        });
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sobre_nav = document.getElementById('sobre_nav');
            sobre_nav.classList.remove('px-0');
            sobre_nav.classList.add('px-4');
        });



        function mostrarAgenda() {
            var sobre = document.getElementById('ver_sobre');
            var projetos = document.getElementById('ver_projetos');
            var agenda = document.getElementById('ver_agenda');
            var perfil = document.getElementById('ver_perfil');
            var sobre_nav = document.getElementById('sobre_nav');
            var perfil_nav = document.getElementById('perfil_nav');
            var agenda_nav = document.getElementById('agenda_nav');
            var projetos_nav = document.getElementById('projetos_nav');

            console.log(sobre, projetos, agenda, perfil); // Verifique se os elementos foram corretamente obtidos

            perfil.classList.add('d-none');
            perfil_nav.classList.remove('active');

            agenda.classList.remove('d-none');
            agenda_nav.classList.add('active');

            sobre.classList.add('d-none');
            sobre_nav.classList.remove('active');

            projetos.classList.add('d-none');
            projetos_nav.classList.remove('active');

            document.getElementById('nomepag').text.add('Agenda');
        }



        function mostrarSobre() {
            var sobre = document.getElementById('ver_sobre');
            var projetos = document.getElementById('ver_projetos');
            var agenda = document.getElementById('ver_agenda');
            var perfil = document.getElementById('ver_perfil');
            var sobre_nav = document.getElementById('sobre_nav');
            var perfil_nav = document.getElementById('perfil_nav');
            var agenda_nav = document.getElementById('agenda_nav');
            var projetos_nav = document.getElementById('projetos_nav');

            console.log(sobre, projetos, agenda, perfil, 'aaaaaaaaaaaaaaaa'); // Verifique se os elementos foram corretamente obtidos


            perfil.classList.add('d-none');
            perfil_nav.classList.remove('active');

            agenda.classList.add('d-none');
            agenda_nav.classList.remove('active');

            sobre.classList.remove('d-none');
            sobre_nav.classList.add('active');

            projetos.classList.add('d-none');
            projetos_nav.classList.remove('active');

            document.getElementById('nomepag').text.add('Sobre');
        }


        function mostrarProjetos() {
            var sobre = document.getElementById('ver_sobre');
            var projetos = document.getElementById('ver_projetos');
            var agenda = document.getElementById('ver_agenda');
            var perfil = document.getElementById('ver_perfil');
            var sobre_nav = document.getElementById('sobre_nav');
            var perfil_nav = document.getElementById('perfil_nav');
            var agenda_nav = document.getElementById('agenda_nav');
            var projetos_nav = document.getElementById('projetos_nav');

            console.log(sobre, projetos, agenda, perfil); // Verifique se os elementos foram corretamente obtidos

            perfil.classList.add('d-none');
            perfil_nav.classList.remove('active');

            agenda.classList.add('d-none');
            agenda_nav.classList.remove('active');

            sobre.classList.add('d-none');
            sobre_nav.classList.remove('active');

            projetos.classList.remove('d-none');
            projetos_nav.classList.add('active');

            document.getElementById('nomepag').text.add('Projetos');
        }

        function mostrarPerfil() {
            var sobre = document.getElementById('ver_sobre');
            var projetos = document.getElementById('ver_projetos');
            var agenda = document.getElementById('ver_agenda');
            var perfil = document.getElementById('ver_perfil');
            var sobre_nav = document.getElementById('sobre_nav');
            var perfil_nav = document.getElementById('perfil_nav');
            var agenda_nav = document.getElementById('agenda_nav');
            var projetos_nav = document.getElementById('projetos_nav');

            console.log(sobre, projetos, agenda, perfil); // Verifique se os elementos foram corretamente obtidos

            perfil.classList.remove('d-none');
            perfil_nav.classList.add('active');

            agenda.classList.add('d-none');
            agenda_nav.classList.remove('active');

            sobre.classList.add('d-none');
            sobre_nav.classList.remove('active');

            projetos.classList.add('d-none');
            projetos_nav.classList.remove('active');

            document.getElementById('nomepag').text.add('Sobre');
        }
    </script>



    <script>
        function mostrarTextoCompleto() {
            var divTexto = document.getElementById('textoDiv');
            var btnVerMais = document.getElementById('verMaisBtn');

            // Remover a limitação de altura para mostrar todo o texto
            divTexto.style.maxHeight = 'none';

            // Ocultar o botão "ver mais" após expandir o texto
            btnVerMais.style.display = 'none';
        }

        // Verificar se o texto na div ultrapassa a altura máxima
        var divTexto = document.getElementById('textoDiv');
        var btnVerMais = document.getElementById('verMaisBtn');

        if (divTexto.scrollHeight > divTexto.clientHeight) {
            // Mostrar o botão "ver mais" se o texto estiver cortado
            btnVerMais.style.display = 'block';
        }
    </script>

    <script>
        var imageContainer = "ola";
        var id_entrada;

        // Adiciona o ouvinte de evento quando o documento HTML é carregado
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('fileInput');
            fileInput.addEventListener('change', handleFileInputChange);
        });

        function handleFileInputChange() {
            const files = this.files;
            if (files.length > 0) {
                let lastDataId = 0;
                const existingDivs = document.querySelectorAll(`#${id_entrada} div[data-id]`);

                existingDivs.forEach(div => {
                    const dataId = parseInt(div.getAttribute('data-id'));
                    if (!isNaN(dataId) && dataId > lastDataId) {
                        lastDataId = dataId;
                    }
                });

                Array.from(files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imageUrl = e.target.result;
                        const newId = lastDataId + index + 1; // Incrementar o último data-id
                        displayImageBeforeFixedItem(imageUrl, newId);
                    };
                    reader.readAsDataURL(file);
                });
            }
        }

        function alterarImageContainer(novothis) {
            const fileInput = document.getElementById('fileInput');
            imageContainer = document.getElementById(novothis.id);
            console.log('mudou: ', imageContainer);

            const fixedItem = document.getElementById('fixedItem');

            console.log('Image Container: ', imageContainer);
            console.log("Novo This: ", novothis)
            console.log("Novo This id: ", novothis.id);

            id_entrada = imageContainer.id;
            console.log("fffffffffffff", id_entrada);

        }

        function displayImageBeforeFixedItem(imageUrl, newId) {
            const div = document.createElement('div');
            div.classList.add('col-4', 'mb-3', 'ui-sortable-handle');
            div.setAttribute('data-id', newId);
            div.innerHTML = `
        <a class="delete-image" data-id="${newId}">
            <i class="position-absolute mt-2 p-1 bg-danger rounded-circle" style="opacity: 77.5%; margin-left: 12.5em;">
                <svg style="width: 2em; height: 2em; color: white;" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 32 32">
                    <path d="M 15 4 C 14.476563 4 13.941406 4.183594 13.5625 4.5625 C 13.183594 4.941406 13 5.476563 13 6 L 13 7 L 7 7 L 7 9 L 8 9 L 8 25 C 8 26.644531 9.355469 28 11 28 L 23 28 C 24.644531 28 26 26.644531 26 25 L 26 9 L 27 9 L 27 7 L 21 7 L 21 6 C 21 5.476563 20.816406 4.941406 20.4375 4.5625 C 20.058594 4.183594 19.523438 4 19 4 Z M 15 6 L 19 6 L 19 7 L 15 7 Z M 10 9 L 24 9 L 24 25 C 24 25.554688 23.554688 26 23 26 L 11 26 C 10.445313 26 10 25.554688 10 25 Z M 12 12 L 12 23 L 14 23 L 14 12 Z M 16 12 L 16 23 L 18 23 L 18 12 Z M 20 12 L 20 23 L 22 23 L 22 12 Z" fill="rgb(255, 255, 255)"></path>
                </svg>
            </i>
        </a>
        <img src="${imageUrl}" class="ui-state-default d-block rounded" style="width:100%; height: 100%;" alt="...">
    `;

            document.getElementById(id_entrada).prepend(div);


            // Add delete event
            div.querySelector('.delete-image').addEventListener('click', function(e) {
                e.preventDefault();
                const dataId = this.getAttribute('data-id');
                const elementToDelete = document.querySelector(`[data-id="${dataId}"]`);
                if (elementToDelete) {
                    elementToDelete.remove();
                }
            });
        }


        function setupDeleteLinks() {
            // Selecionar todos os elementos com a classe delete-image
            const deleteLinks = document.querySelectorAll('.delete-image');
            console.log(deleteLinks);

            // Iterar sobre cada link de exclusão e adicionar o manipulador de evento
            deleteLinks.forEach(deleteLink => {
                deleteLink.addEventListener('click', function(e) {
                    e.preventDefault(); // Evitar o comportamento padrão do link

                    const dataId = this.getAttribute('data-id'); // Obter o atributo data-id do link clicado
                    console.log(dataId);

                    console.log("asdasdasdasdasdas", id_entrada);
                    const divToDelete = document.querySelector(`#${id_entrada} [data-id="${dataId}"]`); // Encontrar a div correspondente
                    console.log(divToDelete);

                    if (divToDelete) {
                        divToDelete.remove(); // Remover a div correspondente se encontrada
                        console.log(`Elemento com data-id ${dataId} removido`);
                        dataId = 0;
                    } else {
                        console.log(`Elemento com data-id ${dataId} não encontrado`);
                    }
                });
            });
        }

        // Chamar a função setupDeleteLinks assim que o documento HTML estiver carregado
        document.addEventListener('DOMContentLoaded', () => {
            setupDeleteLinks();
        });
    </script>


    <script>
        // Selecionar o elemento textarea pelo ID
        const textarea = document.getElementById('alterar_sobre');

        // Selecionar os elementos de contagem de caracteres e palavras
        const contadorCaracteres = document.getElementById('contador_caracteres');
        const contadorPalavras = document.getElementById('contador_palavras');

        // Adicionar um ouvinte de eventos de entrada (input) ao textarea
        textarea.addEventListener('input', () => {
            // Obter o conteúdo atual do textarea
            const texto = textarea.value;

            // Contar o número de caracteres (incluindo espaços em branco)
            const numeroCaracteres = texto.length;
            contadorCaracteres.textContent = numeroCaracteres;

            // Contar o número de palavras
            const palavras = texto.match(/\S+/g); // Expressão regular para encontrar palavras (sequências de caracteres não espaços em branco)
            const numeroPalavras = palavras ? palavras.length : 0;
            contadorPalavras.textContent = numeroPalavras;
        });
    </script>





    <script>
        $(document).ready(function() {
            $('#email').on('input', function() {
                var id_name = $(this).val().trim();

                // Limpar o datalist antes de atualizar com novas opções
                $('#emails').empty();

                // Enviar requisição AJAX apenas se o campo não estiver vazio
                if (id_name !== '') {
                    $.ajax({
                        url: '../../public/pesquisar.php',
                        type: 'POST',
                        data: {
                            id_name: id_name
                        },
                        success: function(response) {
                            console.log('Resposta do servidor:', response);

                            try {
                                // Tentar converter response para JSON se necessário
                                if (typeof response === 'string') {
                                    response = JSON.parse(response);
                                }

                                if (Array.isArray(response)) {
                                    $('#emails').empty(); // Limpar opções anteriores

                                    response.forEach(function(item) {
                                        var option = $('<option value="' + item.id_name + '">' + item.name + '</option>');
                                        $('#emails').append(option);
                                    });
                                } else {
                                    console.error('Resposta não é um array:', response);
                                }
                            } catch (error) {
                                console.error('Erro ao manipular JSON:', error);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Erro na requisição AJAX:', error);
                        }
                    });
                }
            });

            // Evento quando uma opção do datalist é selecionada
            $('#email').on('change', function() {
                var selectedIdName = $(this).val().trim();
                adicionarNome(selectedIdName); // Adicionar o id_name à lista
                $(this).val(''); // Limpar o campo de texto
            });

            // Evento quando o botão "Adicionar" é clicado
            $('#btnAdicionar').on('click', function() {
                var selectedIdName = $('#email').val().trim();
                adicionarNome(selectedIdName); // Adicionar o id_name à lista
                $('#email').val(''); // Limpar o campo de texto
            });

            // Função para adicionar o id_name à lista
            function adicionarNome(id_name) {

                id_name = id_name.toLowerCase();

                if (id_name === '') {
                    return; // Não adiciona se o id_name estiver vazio
                }

                // Verifica se o id_name já está na lista
                if ($('#listaNomes').find('li').filter(function() {
                        return $(this).find('p').text().trim() === id_name;
                    }).length > 0) {
                    erro('Conta já inserida!');
                    return;
                }

                // Limitar o número máximo de usuários na lista
                if ($('#listaNomes').children().length >= 10) {
                    erro('Limite máximo de 10 utilizadores atingido!');
                    return;
                }

                // Verifica se o id_name existe na base de dados
                $.ajax({
                    url: '../../public/verificar_email.php', // Caminho para o arquivo PHP
                    type: 'POST',
                    data: {
                        id_name: id_name
                    },
                    success: function(response) {
                        if (typeof response === 'string') {
                            response = JSON.parse(response);
                        }

                        if (response.status === 'valid') {
                            // Criar e adicionar um novo item à lista de nomes com os dados do usuário
                            var listItem = `
                            <li class="list-group-item pt-0 pb-3">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <img src="${response.picture}" alt="" class="avatar rounded-circle my-auto" style="width: 45px; height: 45px;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 text-sm">${response.name}</h6>
                                        <p class="mb-0 text-muted text-xs">${id_name}</p>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <button class="btn btn-md my-auto btn-danger" onclick="removerNome(this, event)">Remover</button>
                                    </div>
                                </div>
                            </li>
                        `;

                            // Adicionar o novo item à lista apenas se não existir na lista
                            if ($('#listaNomes').find('li').filter(function() {
                                    return $(this).find('p').text().trim() === id_name;
                                }).length === 0) {
                                $('#listaNomes').append(listItem);
                                numUsuarios++;
                                var boxcomnomes = document.getElementById('boxcomnomes');
                                boxcomnomes.classList.remove('d-none');
                            } else {
                                erro('Conta já inserida!');
                            }
                        } else {
                            erro('Conta inserida não existe!');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Erro na verificação de id_name:', error);
                    }
                });
            }

        });
    </script>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script type="module" src="https://unpkg.com/@googlemaps/extended-component-library@0.6"></script>
    <script src="../../public/assets/js/plugins/chartjs.min.js"></script>




</body>

</html>