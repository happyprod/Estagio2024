<?php
require_once __DIR__ . '/../../../vendor/autoload.php'; // Certifique-se de que o autoload do Composer está incluído

use App\Controllers\HomeController;
use App\Models\Home;
use App\Helpers\Database;

$db = Database::connect();


// Cria instâncias do modelo e do controlador
$model = new Home($db);
$controller = new HomeController($model);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
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
        <!-- Navbar -->


        <div class="row" style="margin-right: 0px; margin-left: 0px;">

            <div class="col-8">
                <div class="w-100 mx-auto"> <!-- Centralizando a div principal -->
                    <div id="projects-container">

                    </div>
                    <div class="border-top my-1 w-90  mx-auto"></div>
                </div>
            </div>

            <div class="col-4">
                <div class="ms-auto me-4 mt-4 border-radius-lg h-100" style="width: 272px;">

                    <div class="p-3 shadow bg-white mx-auto border-radius-lg justify-content-center mt-4">

                        <h6>Contas Sugeridas</h6>

                        <?php
                        $controller->getSugestions();
                        ?>

                    </div>



                    <div class="p-3 shadow bg-white mx-auto border-radius-lg justify-content-center mt-4">
                        <h6>Contas Populares</h6>

                        <?php
                        $controller->getPopulars();
                        ?>
                    </div>

                </div>
            </div>

        </div>
        
        <div id="loader">Carregando...</div>

    </main>



    <!--   Core JS Files   -->
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./assets/js/feed.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>