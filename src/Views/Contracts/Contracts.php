<?php
require_once __DIR__ . '/../../../vendor/autoload.php'; // Certifique-se de que o autoload do Composer está incluído

use App\Controllers\ContractsController;
use App\Models\Contracts;
use App\Helpers\Database;

$db = Database::connect();


// Cria instâncias do modelo e do controlador
$model = new Contracts($db);
$controller = new ContractsController($model);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./img/logo.png">
    
    <title>
        Concert Pulse
    </title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Adicione o script do jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />


    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show bg-gray-100">

    <?php
    include('../src/Views/Layouts/Menu.php');
    ?>


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        <div class="modal fade" id="assuntoContract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body text-justify">
                        <p id="assuntoModal">Preciso de um artista para o meu evento.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="avaliarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content" id="avaliarModalBody">
                    <!-- dados responsivos -->
                </div>
            </div>
        </div>

        <div class="row w-100  mt-4">

            <div class="col-12">
                <div class="card mb-4">
                    <div class="nav-wrapper mt-3 mb-3 border-radius-lg bg-white position-relative w-80 mx-auto end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-white" role="tablist">
                            <li class="nav-item border-radius-lg shadow-xs mx-3" onclick="updateContracts(1)" style="background-color: rgb(233, 233, 233, 0.25);">
                                <a class="nav-link text-dark opacity-9 mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#profile-tabs-simple" role="tab" aria-controls="profile" aria-selected="true">
                                    Propostas Recebidas
                                </a>
                            </li>
                            <li class="nav-item border-radius-lg shadow-xs mx-3" onclick="updateContracts(2)" style="background-color: rgb(233, 233, 233, 0.25);">
                                <a class="nav-link mb-0 opacity-9 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard" aria-selected="false">
                                    Propostas Aceites
                                </a>
                            </li>
                            <li class="nav-item border-radius-lg shadow-xs mx-3" onclick="updateContracts(3)" style="background-color: rgb(233, 233, 233, 0.25);">
                                <a class="nav-link mb-0 opacity-9 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard" aria-selected="false">
                                    Propostas Enviadas
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div id="novasTable">
                        <!-- conteudo dinamico -->
                    </div>
                </div>
            </div>
        </div>

    </main>




    <!--   Core JS Files   -->
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./assets/js/contracts.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>