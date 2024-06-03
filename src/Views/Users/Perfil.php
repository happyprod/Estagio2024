<?php
require_once __DIR__ . '/../../../vendor/autoload.php'; // Certifique-se de que o autoload do Composer está incluído

use App\Helpers\Database;

$db = Database::connect();

// Caminho completo para o arquivo atual
$filePath = __DIR__; // Use __DIR__ para obter o diretório atual do script

// Obter o nome da última pasta no caminho do diretório
$lastDirectoryName = basename($filePath);

// Prepara uma consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o url corresponde ao nome do último diretório
$stmt = $db->prepare('SELECT * FROM accounts WHERE url = ?');



echo $lastDirectoryName;
// Executa a consulta SQL, substituindo o marcador de posição '?' pelo valor de $lastDirectoryName
$stmt->execute([$lastDirectoryName]);

// Obtém o resultado da consulta
$result = $stmt->fetch(PDO::FETCH_ASSOC); // Retorna a primeira linha do resultado como um array associativo

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

// Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
$sql_infos = "SELECT * FROM accounts WHERE id = ?";
$stmt_infos = $db->prepare($sql_infos);
$stmt_infos->execute([$id]);
$row_infos = $stmt_infos->fetch(PDO::FETCH_ASSOC);

if ($row_infos) {
    $sobre = $row_infos["about"];
    $nome = $row_infos["name"];
    $email = $row_infos["email"];
    $numero = $row_infos["number"];
    $localizacao = $row_infos["location"];
    $facebook = $row_infos["facebook"];
    $type_utilizador = $row_infos["type"];
    $fotodeperfil = $row_infos["picture"];
    $fotodecapa = $row_infos["picture_background"];
} else {
    // Tratar o caso onde não há informações adicionais encontradas
    die("No additional account information found for the given ID.");
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <title>
        ConcertPulse Artist
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show bg-gray-100">

<?php include ('../Layouts/Menu.php'); ?>

<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100 py-3">

        <!-- End Navbar -->
        <div class="container-fluid mt-5 py-1">
            <div class="page-header min-height-300 border-radius-xl mt-4" <?php
            if ($fotodecapa == null) {
                echo 'style="background-image: url(\'../../assets/img/curved-images/curved0.jpg\'); background-position-y: 50%;"';
            } else {
                echo 'style="background-image: url(\'../../utilizador/' . $id . '/' . $fotodecapa . ' \'); background-position-y: 50%; "';
            }
            ?>>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
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
                                echo 'src="../../utilizador/' . $id . '/' . $fotodeperfil . '"';
                            } else {
                                echo 'src="' . $fotodeperfil . '"';
                            }
                            ?>
                                alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                <?php echo $nome; ?>
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                <?php echo $type_utilizador; ?>
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
                                    <a href="./editarperfil.php">
                                       <button type="button" class="btn btn-primary btn-sm me-4" style="margin-top: 1em;" >
                                       <i class="fas fa-user-edit text-sm me-2" data-bs-toggle="tooltip"></i>
                                       Editar Perfil</button>
                                    </a>
                                    ';

                                } else {
                                    echo '<li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1" href="javascript:;" role="tab" aria-selected="false">
                            <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44"
                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>document</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(154.000000, 300.000000)">
                                                <path class="color-background"
                                                    d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                    opacity="0.603585379"></path>
                                                <path class="color-background"
                                                    d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <span class="ms-1">Contactar</span>
                        </a>
                    </li>
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


        <?php include ('PerfilEstatisticas.php'); ?>


            <?php

            $facebook_url = $facebook;

            // Verificar se o URL não começa com 'http://' ou 'https://', e adicioná-lo se necessário
            if (!preg_match("~^(?:f|ht)tps?://~i", $facebook_url)) {
                $facebook_url = 'http://' . $facebook_url;
            }


            $instagram = $row_infos["instagram"];

            $instagram_url = $instagram;

            // Verificar se o URL não começa com 'http://' ou 'https://', e adicioná-lo se necessário
            if (!preg_match("~^(?:f|ht)tps?://~i", $instagram_url)) {
                $instagram_url = 'http://' . $instagram_url;
            }



            $twitter = $row_infos["twitter"];

            $twitter_url = $twitter;

            // Verificar se o URL não começa com 'http://' ou 'https://', e adicioná-lo se necessário
            if (!preg_match("~^(?:f|ht)tps?://~i", $twitter_url)) {
                $twitter_url = 'http://' . $twitter_url;
            }
            
            ?>

            <?php include ('PerfilSobre.php'); ?>

            <?php include ('PerfilAvaliacoes.php'); ?>

            <?php include ('PerfilProjetos.php'); ?>
            
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
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-4">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.
                </p>

                <hr class="horizontal dark my-sm-4">
                <div class="w-100 text-center">
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script src="../../assets/js/perfil.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>

</body>

</html>