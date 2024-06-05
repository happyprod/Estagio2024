<?php
require_once __DIR__ . '/../../../vendor/autoload.php'; // Certifique-se de que o autoload do Composer está incluído

use App\Helpers\Database;

$db = Database::connect();


$id = $_SESSION['user_id'];


$name = "";
$image_url = "";
$location = "";
$type = "";

$shows = 0;
$follows = 0;
$rating = 0;
$valor = 0;





$sql_infos = "SELECT * FROM accounts WHERE id = ?";
$stmt_infos = $db->prepare($sql_infos);
$stmt_infos->execute([$id]);
$row_infos = $stmt_infos->fetch(PDO::FETCH_ASSOC);

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

    <link rel="apple-touch-icon" sizes="76x76" href="../public/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../public/img/logo.png">

    <title>
        ConcertPulse Artist
    </title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="../public/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../public/assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../public/assets/css/nucleo-svg.css" rel="stylesheet" />


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Incluir Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="../public/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


    <script src="../public/assets/js/editarPerfilLoad.js"></script>


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

</head>

<body class="g-sidenav-show bg-gray-100">

    <?php include('../src/Views/Layouts/Menu.php'); ?>

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100 py-3">
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

            <?php include('../src/Views/Users/editarPerfilSobre.php'); ?>

        </div>




        <?php 
            include('../src/Views/Users/editarPerfilPerfil.php'); 
        ?>


    </div>


    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="../public/assets/js/core/popper.min.js"></script>
    <script src="../public/assets/js/core/bootstrap.min.js"></script>
    <script src="../public/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../public/assets/js/plugins/smooth-scrollbar.min.js"></script>
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
    <script src="../public/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <script src="../public/assets/js/editarPerfil.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script type="module" src="https://unpkg.com/@googlemaps/extended-component-library@0.6"></script>
    <script src="../public/assets/js/plugins/chartjs.min.js"></script>




</body>

</html>