<?php
require_once __DIR__ . '/../../../vendor/autoload.php'; // Certifique-se de que o autoload do Composer está incluído

use App\Controllers\SearchController;
use App\Models\Search;
use App\Helpers\Database;

$db = Database::connect();


// Cria instâncias do modelo e do controlador
$model = new Search($db);
$controller = new SearchController($model);

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

    <!-- Incluir Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


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
        <div class="w-90 mx-auto my-3">
            <div class="input-group mb-3">
                <input type="search" class="form-control" id="searchBar" placeholder="Digite a identificação do utilizador..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-primary mb-0" type="button" onclick="pesquisarSend()">Pesquisar</button>
            </div>
        </div>

        <div class="container mt-4" style="width:97.5%;">
            <div class="row" id="userShow">

            <?php 

                $result = $controller->getAccounts();

                if ($result)
                {
                    foreach ($result as $row) {
                        $acc_id = $row["id"];
                        $acc_type = $row["identity"];
                        $acc_local = $row["location"];
                        $acc_idName = $row["id_name"];
                        $acc_name = $row["name"];
                        $acc_picture = $row["picture"];


                        if ($acc_type == 1) {
                            $acc_type = "Promotor";
                        } else if ($acc_type == 2) {
                            $acc_type = "Artista";
                        } else if ($acc_type == 3) {
                            $acc_type = "Agente de Booking";
                        } else if ($acc_type == 4) {
                            $acc_type = "Agencia de booking";
                        } else {
                            $acc_type = "Evento";
                        }

                        echo '
                            <div class="col-6 col-md-4 col-lg-3 mb-4">
                                <div class="card profile-card">
                                    <img src="http://localhost/ConcertPulse/public/users/' . $acc_id . '/' . $acc_picture . '" class="card-img-top" alt="Imagem do Perfil">
                                    <div class="card-body">
                                        <h5 class="card-title">@' . $acc_idName . '</h5>
                                        <p class="my-1 ms-1 mt-3 p-0 text-sm text-center" style="height: 20px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                                            <strong>Nome: </strong> ' . $acc_name . '<br>
                                        </p>
                                        <p class="my-1 ms-1 p-0 text-sm text-center" style="height: 20px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                                            <strong>Função: </strong>' . $acc_type . '<br>
                                        </p>
                                        <p class="my-1 ms-1 p-0 mb-3 text-sm text-center" style="height: 20px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                                            <strong>Localização: </strong><a href="https://www.google.pt/maps/place/' . $acc_local . '" target="_BLANK"> ' . $acc_local . '</a>
                                        </p>
                                        <a href="utilizadores/' . $acc_id . '.php" class="btn btn-primary">Ver Perfil</a>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                }

            ?>
                
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
    <script src="./assets/js/pesquisar.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>