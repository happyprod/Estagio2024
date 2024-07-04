<?php
require_once __DIR__ . '/../../../vendor/autoload.php'; // Certifique-se de que o autoload do Composer está incluído

use App\Controllers\UserController;
use App\Models\User;
use App\Helpers\Database;
use App\Helpers\ValidationHelper;

$db = Database::connect();


// Cria instâncias do modelo e do controlador
$model = new User($db);
$controller = new UserController($model);
$helper = new ValidationHelper();


$filePath = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


// Obter o nome da última pasta no caminho do diretório
$lastDirectoryName = basename($filePath);

// Remover extensão .php
$lastDirectoryName = rtrim($lastDirectoryName, ".php");


$result = $controller->getAccountByDirectory($lastDirectoryName);

if ($result) {
    $id = $result['id'];
} else {
    // Tratar o caso onde não há resultados correspondentes
    die("No account found for the given URL.");
}

// Inicializa as variáveis
$name = "";
$image_url = "";
$location = "";
$type = "";

$shows = 0;
$follows = 0;
$rating = 0;
$valor = 0;


$row_infos = $controller->getAccountById($id);

if ($row_infos) {
    $sobre = $row_infos["about"];
    $nome = $row_infos["name"];
    $email = $row_infos["email"];
    $numero = $row_infos["number"];
    $localizacao = $row_infos["location"];
    $type_utilizador = $row_infos["type"];
    $fotodeperfil = $row_infos["picture"];
    $fotodecapa = $row_infos["picture_background"];
    $identidadeRow = $row_infos["identity"];
    $id_name_user = $row_infos["id_name"];
} else {
    // Tratar o caso onde não há informações adicionais encontradas
    die("No additional account information found for the given ID.");
}
$identidade = $identidadeRow;

if ($identidade == 1) {
    $identidade = "Promotor";
} else if ($identidade == 2) {
    $identidade = "Artista";
} else if ($identidade == 3) {
    $identidade = "Agente de Booking";
} else if ($identidade == 4) {
    $identidade = "Agencia de booking";
} else {
    $identidade = "Evento";
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../public/assets/img/apple-icon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="../../public/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />

    <script src="../../public/assets/js/perfilLoad.js"></script>
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show bg-gray-100">

    <?php
    include('../src/Views/Layouts/Menu.php'); ?>

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100 py-3">

        <div class="modal fade" id="contract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 12px; padding-top: 12px;">
                        <h5 class="modal-title" id="exampleModalLabel">Enviar Proposta</h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>Qual é o assunto?</h6>
                        <input type="text" class="form-control" id="assuntoContract" placeholder="Escreve o assunto principal do contrato">

                        <div class="form-group mt-4 mb-4">
                            <h6>Envie a sua proposta em PDF</h6>
                            <input type="file" class="form-control" id="pdfFile" name="pdfFile" accept="application/pdf" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn bg-gradient-success" data-bs-dismiss="modal" onclick="sendContract(<?php echo $id; ?>)">Enviar</button>
                    </div>
                </div>
            </div>
        </div>

        <?php

        $verificar_chat = $controller->verificarChat($id);
        if (!$verificar_chat == true) {
            echo '<!-- Modal -->
                <div class="modal fade" id="contactUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Primeiro assunto da conversa</h5>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <textarea class="form-control" id="TXTmessage" rows="3" placeholder="Escreva aqui o primeiro assunto da conversa." style="height: 22.5em; overflow-y: scroll; resize: none;"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn bg-gradient-success" onclick="sendFirstComment(' . $id . ')">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>';
        }
        ?>

        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="page-header min-height-300 img-fluid border-radius-xl mt-4" <?php
                                                                                    if ($fotodecapa == null) {
                                                                                        echo 'style="background-image: url(\'../../public/assets/img/curved-images/curved0.jpg\'); background-position-y: 50%;"';
                                                                                    } else {
                                                                                        echo 'style="background-image: url(\'http://localhost/Estagio2024/public/users/' . $id . '/' . $fotodecapa . ' \'); object-fit: cover; background-position-y: 50%; "';
                                                                                    }
                                                                                    ?>>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
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
                                        echo 'src="http://localhost/Estagio2024/public/users/' . $id . '/' . $fotodeperfil . '"';
                                    } else {
                                        echo 'src="' . $fotodeperfil . '"';
                                    }
                                    ?> alt="profile_image" style="height: 80px; width: 80px; object-fit: cover;" class="border-radius-lg img-fluid shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                <?php echo '@' . $id_name_user; ?>
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                <?php
                                if ($identidadeRow == 2) {
                                    echo $identidade . ' - ' . $type_utilizador;
                                } else {
                                    echo $identidade;
                                }

                                ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 d-flex justify-content-end ms-auto mt-2">
                        <div class="nav-wrapper position-relative">
                            <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">

                                <?php

                                $session_id = $_SESSION['user_id'];

                                if ($session_id == $id) {
                                    echo '
                                    <a href="http://localhost/Estagio2024/public/editarPerfil.php">
                                       <button type="button" class="btn btn-primary btn-sm me-4" style="margin-top: 1em;" >
                                       <i class="fas fa-user-edit text-sm me-2" data-bs-toggle="tooltip"></i>
                                       Editar Perfil</button>
                                    </a>
                                    ';
                                } else {
                                    echo '
                                    <button type="button"';

                                    $verificar_chat = $controller->verificarChat($id);
                                    if ($verificar_chat == true) {
                                        echo 'onclick="redirectChat()"';
                                    }
                                    echo 'data-bs-toggle="modal" data-bs-target="#contactUser" class="btn btn-primary btn-sm me-4" style="margin-top: 1em; padding-left: 20px;" >
                                                    <i class="ni ni-email-83 me-2" style="font-size: 12px;"></i>
                                                Contactar</button>
';
                                }


                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4 perfil" id="perfil">



            <?php include('PerfilEstatisticas.php'); ?>


            <?php
            include('../src/Views/Users/PerfilSobre.php');
            include('../src/Views/Users/PerfilAvaliacoes.php');
            include('../src/Views/Users/PerfilProjetos.php');
            ?>


        </div>
    </div>


    </div>
    </div>


    <!--   Core JS Files   -->
    <script src="../../public/assets/js/core/popper.min.js"></script>
    <script src="../../public/assets/js/core/bootstrap.min.js"></script>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script type="module" src="https://unpkg.com/@googlemaps/extended-component-library@0.6"></script>
    <script src="../../public/assets/js/plugins/chartjs.min.js"></script>
    <script src="../../public/assets/js/perfil.js"></script>




</body>

</html>