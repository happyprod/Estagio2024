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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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

<body class="g-sidenav-show  bg-gray-100">

    <?php
    session_start();
    ?>

    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="./concertpulsetickets.php">
                <img src="./img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Concert Pulse Ticket's</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto h-100 " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="./pages/sign-in.html">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>document</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(154.000000, 300.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
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
                    <a class="nav-link" href="../pages/profile.html">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center ni ni-cart">
                        </div>
                        <span class="nav-link-text ms-1">Carrinho</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./verificacao.html">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="20px" viewBox="0 0 40 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>spaceship</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
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
                        <span class="nav-link-text ms-1">Verification</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
                <div class="full-background"
                    style="background-image: url('./assets/img/curved-images/white-curved.jpg')"></div>
            </div>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Home</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Home</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 ms-9" id="navbar">
                    <div class="d-flex justify-content-center"> <!-- Utilizando flexbox para centralizar -->
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control" style="width: 300px;"
                                    placeholder="Type here...">
                                <!-- Define a largura desejada para o input (exemplo: 300px) -->
                            </div>
                        </div>
                    </div>


                    <ul class="navbar-nav  justify-content-end">


                        <?php

                        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {

                        } else {
                            echo '
                            <li class="nav-item d-flex align-items-center ms-12">
                                <a href="./logintickets.php" class="nav-link text-body font-weight-bold px-0">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Logout</span>
                                </a>
                            </li>
                            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </a>
                            </li>
                        ';
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </nav>

        <div class="border-top my-1 w-80  mx-auto"></div>


        <!-- End Navbar -->
        <div class="container-fluid mt-0 py-1 d-flex align-items-center justify-content-center">
            <div class="page-header min-height-200 border-radius-xl mt-4 w-75"
                onclick="location.href = 'www.yoursite.com';"
                style="background-image: url('https://m.media-amazon.com/images/S/stores-image-uploads-na-prod/8/AmazonStores/ATVPDKIKX0DER/2e7765f0786eaef115dfdb9f3838002a.w3000.h600.jpg'); background-position-y: 50%; background-size: 100% 100%;">
            </div>
        </div>

        <div class="container">
        <div class="row">
        <?php


        // Conexão com o banco de dados (substitua com suas credenciais)
        $db_host = "localhost";
        $db_name = "concertpulse";
        $db_user = "root";
        $db_pass = "";

        // Estabelecer a conexão com o banco de dados
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        // Verificar se a conexão foi bem-sucedida
        if ($conn->connect_error) {
            die("Erro de conexão com o banco de dados: " . $conn->connect_error);
        }

        // Consulta SQL para selecionar todos os registros da tabela "shows"
        $sql_infos = "SELECT * FROM shows";
        $stmt_infos = $conn->prepare($sql_infos);

        // Verificar se a preparação da consulta foi bem-sucedida
        if ($stmt_infos === false) {
            die("Erro na preparação da consulta: " . $conn->error);
        }

        $count = 0;


        // Executar a consulta
        $stmt_infos->execute();

        // Obter o resultado da consulta
        $result_infos = $stmt_infos->get_result();

        // Verificar se a consulta retornou algum resultado
        if ($result_infos->num_rows > 0) {
            // Array para armazenar todos os registros
            $registros = array();

            // Iterar sobre cada linha de resultado
            while ($row_infos = $result_infos->fetch_assoc()) {
                // Adicionar o registro atual ao array de registros
                $registros[] = $row_infos;
            }

            // Agora $registros contém todos os registros da tabela "shows"
            // Você pode percorrer $registros para acessar cada registro
            foreach ($registros as $registro) {
                $sinopse = $registro["sinopse"];
                $descricao = $registro["descricao"];
                $cartaz = $registro["cartaz"];
                $titulo = $registro["titulo"];
                $localizacao = $registro["localizacao"];
                $preco = $registro["preco"];
                $id_cartaz = $registro["id"];


                if ($count % 3 == 0)
                {
                    echo '
                    </div>
                    </div>
                    <div class="container">
            <div class="row">  
                    ';
                }

                echo ' 
                
                <div class="col-lg-4">
                    <div class="w-100 mb-5 mt-5">
                        <div class="card">
                            <div class="col-lg-12 ms-auto text-center mt-3">
                                <div class="border-radius-lg h-100">
                                    <div
                                        class="position-relative d-flex align-items-center justify-content-center h-100">
                                        <img class="w-100 position-relative rounded z-index-2 pt-1" style="width: 310px; height: 225px;"
                                        src="./img/cartaz/' . $cartaz . '" alt="' . $titulo . ' Cartaz">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="d-flex flex-column h-100">
                                    <p class="mb-1 pt-2 text-bold">' . $localizacao . '</p>
                                    <h5 class="font-weight-bolder">'  . $titulo . '</h5>
                                    <p class="mb-5" style="height: 78px;">' . $sinopse .  '</p>
                                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                        href="./cartazes/'. $id_cartaz .'.php">
                                        Ver Mais
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                ';



                $count++;
            }
        } else {
            echo "Nenhum registro encontrado na tabela 'shows'.";
        }

        // Fechar a instrução e a conexão
        $stmt_infos->close();
        $conn->close();




        ?>

    </main>


    <!--   Core JS Files   -->
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                    maxBarThickness: 6
                },],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            display: false
                        },
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#cb0c9f",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                },
                {
                    label: "Websites",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#3A416F",
                    borderWidth: 3,
                    backgroundColor: gradientStroke2,
                    fill: true,
                    data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                    maxBarThickness: 6
                },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

    </script>

    <script>
        // Quando o documento estiver carregado...
        $(document).ready(function () {
            var tooltipTimer;

            // Exibir a tooltip quando o mouse passar sobre o botão
            $('#tooltipButton').mouseenter(function () {
                clearTimeout(tooltipTimer);
                $('#customTooltip').css({
                    'display': 'block',
                });
            });

            // Manter a tooltip visível mesmo quando o mouse sair do botão
            $('#customTooltip').mouseenter(function () {
                clearTimeout(tooltipTimer);
            });

            // Esconder a tooltip quando o mouse sair tanto do botão quanto da própria tooltip
            $('#tooltipButton, #customTooltip').mouseleave(function () {
                tooltipTimer = setTimeout(function () {
                    // Aplica a animação de desaparecer
                    $('#customTooltip').css('animation', 'fadeOut 0.5s ease forwards');
                    // Esconde a tooltip após a animação
                    setTimeout(function () {
                        $('#customTooltip').css('display', 'none');
                        // Remove a animação para que ela possa ser reaplicada na próxima vez que a tooltip aparecer
                        $('#customTooltip').css('animation', '');
                    }, 500); // Tempo correspondente à duração da animação (0.5s)
                }, 500);
            });

        });
    </script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var copy = document.querySelector(".logos-slide").cloneNode(true);
        document.querySelector(".logos").appendChild(copy);

        document.addEventListener("DOMContentLoaded", function () {
            const logosContainer = document.querySelector(".logos");
            const logosSlide = document.querySelector(".logos-slide");
            const logos = logosSlide.querySelectorAll("img");
            const logoWidth = logos[0].offsetWidth; // Largura de cada logo
            const slideDuration = 10; // Duração da animação em segundos
            const pauseBetweenLoops = 1; // Pausa entre loops em segundos

            // Configuração inicial do carrossel
            let currentIndex = 0;
            let slideInterval = null;

            function startCarousel() {
                slideInterval = setInterval(() => {
                    currentIndex++;
                    const offset = -currentIndex * logoWidth;
                    logosSlide.style.transform = `translateX(${offset}px)`;

                    // Verifica se atingiu o final dos logos
                    if (currentIndex >= logos.length) {
                        // Pausa breve antes de reiniciar o carrossel
                        setTimeout(() => {
                            logosSlide.style.transition = "none"; // Desativa a transição para reiniciar suavemente
                            currentIndex = 0;
                            logosSlide.style.transform = `translateX(0)`;
                            setTimeout(() => {
                                logosSlide.style.transition = `transform ${slideDuration}s linear`;
                            }, 100);
                        }, pauseBetweenLoops * 1000);
                    }
                }, (slideDuration + pauseBetweenLoops) * 1000);
            }

            startCarousel();
        });

    </script>


    <!-- Initialize Swiper -->
    <script>

        var swiper = new Swiper(".mySwiper", {
            // Defina a quantidade de slides visíveis para diferentes resoluções
            slidesPerView: 1, // Padrão para resoluções maiores
            breakpoints: {

                1920: {
                    slidesPerView: 7,
                },

                1650: {
                    slidesPerView: 6,
                },

                1366: {
                    slidesPerView: 4,
                },
                // Configuração para resoluções menores, como tablets
                1024: {
                    slidesPerView: 4,
                },
                // Configuração para resoluções ainda menores, como smartphones
                768: {
                    slidesPerView: 3,
                },
                // Configuração para resoluções muito pequenas, como smartphones em modo paisagem
                576: {
                    slidesPerView: 2,
                },

                390: {
                    slidesPerView: 1,
                }
            },
            centeredSlides: false,
            spaceBetween: 10,
            grabCursor: true,
            /* pagination: {
               el: ".swiper-pagination",
               clickable: true,
             },*/
        });

    </script>



    <?php
    for ($i = 1; $i < 10; $i++) {
        echo "<script>
    // Quando o documento estiver carregado...
    $(document).ready(function () {
      var tooltipTimer" . $i . ";

      // Exibir a tooltip quando o mouse passar sobre o botão
      $('#tooltipButton" . $i . "').mouseenter(function () {
        clearTimeout(tooltipTimer" . $i . ");
        $('#customTooltip" . $i . "').css({
          'display': 'block',
        });
      });

      // Manter a tooltip visível mesmo quando o mouse sair do botão
      $('#customTooltip" . $i . "').mouseenter(function () {
        clearTimeout(tooltipTimer" . $i . ");
      });

      // Esconder a tooltip quando o mouse sair tanto do botão quanto da própria tooltip
      $('#tooltipButton" . $i . ", #customTooltip" . $i . "').mouseleave(function () {
        tooltipTimer" . $i . " = setTimeout(function () {
          // Aplica a animação de desaparecer
          $('#customTooltip" . $i . "').css('animation', 'fadeOut 0.5s ease forwards');
          // Esconde a tooltip após a animação
          setTimeout(function () {
            $('#customTooltip" . $i . "').css('display', 'none');
            // Remove a animação para que ela possa ser reaplicada na próxima vez que a tooltip aparecer
            $('#customTooltip" . $i . "').css('animation', '');
          }, 500); // Tempo correspondente à duração da animação (0.5s)
        }, 500);
      });

    });

  </script>
";
    }
    ?>

    <script>
        function sendUserId(user_id) {
            $.ajax({
                type: "POST",
                url: "bookmark.php",
                data: { user_id: user_id }, // Envia o user_id para o PHP
                success: function (result) {
                    $("#result").text(result); // Exibe o resultado retornado pelo PHP
                }
            });
        }
    </script>


    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>