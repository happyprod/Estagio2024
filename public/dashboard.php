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
    include('../src/Views/Partials/Menu.php');
  ?>


  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Home</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Home</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
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
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="./assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
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
                        <img src="./assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
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
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
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
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>



    <div class="w-80 mx-auto text-center"> <!-- Centralizando a div principal -->
      <nav class="navbar navbar-expand-sm bg-transparent shadow-none">
        <div class="container-fluid w-10">
          <a class="nav-link" href="#">
            Feed
          </a>
        </div>

        <div class="container-fluid w-10">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Artistas
          </a>
          <div class="dropdown-menu w-100 bg-gray-100 shadow-lg mx-auto" aria-labelledby="dropdownMenuButton">
            <div class="row">
              <div class="col-4">
                <a class="dropdown-item" href="#">
                  <svg style="width: 25px; height: 27.2px;" width=\'24\' height=\'24\' viewBox=\'0 0 24 24\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\'>
                    <rect width=\'24\' height=\'24\' stroke=\'none\' fill=\'#000000\' opacity=\'0\' />
                    <g transform="matrix(0.42 0 0 0.42 12 12)">
                      <g transform="matrix(1 0 0 1 0 0)">
                        <polygon style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(66,165,245); fill-rule: nonzero; opacity: 1;" points="5.62,-21 9.05,-15.69 15.37,-15.38 15.69,-9.06 21,-5.63 18.12,0 21,5.62 15.69,9.05 15.38,15.37 9.06,15.69 5.63,21 0,18.12 -5.62,21 -9.05,15.69 -15.37,15.38 -15.69,9.06 -21,5.63 -18.12,0 -21,-5.62 -15.69,-9.05 -15.38,-15.37 -9.06,-15.69 -5.63,-21 0,-18.12 " />
                      </g>
                      <g transform="matrix(1 0 0 1 -0.01 0.51)">
                        <polygon style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" points="-2.6,6.74 -9.09,0.25 -6.97,-1.87 -2.56,2.53 7,-6.74 9.09,-4.59 " />
                      </g>
                    </g>
                  </svg>
                  Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
              <div class="col-4">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
              <div class="col-4">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid w-10">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Promotores
          </a>
          <div class="dropdown-menu w-100 shadow-lg mx-auto" aria-labelledby="dropdownMenuButton">
            <div class="row">
              <div class="col-4">
                <a class="dropdown-item" href="#">
                  <svg style="width: 25px; height: 27.2px;" width=\'24\' height=\'24\' viewBox=\'0 0 24 24\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\'>
                    <rect width=\'24\' height=\'24\' stroke=\'none\' fill=\'#000000\' opacity=\'0\' />
                    <g transform="matrix(0.42 0 0 0.42 12 12)">
                      <g transform="matrix(1 0 0 1 0 0)">
                        <polygon style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(66,165,245); fill-rule: nonzero; opacity: 1;" points="5.62,-21 9.05,-15.69 15.37,-15.38 15.69,-9.06 21,-5.63 18.12,0 21,5.62 15.69,9.05 15.38,15.37 9.06,15.69 5.63,21 0,18.12 -5.62,21 -9.05,15.69 -15.37,15.38 -15.69,9.06 -21,5.63 -18.12,0 -21,-5.62 -15.69,-9.05 -15.38,-15.37 -9.06,-15.69 -5.63,-21 0,-18.12 " />
                      </g>
                      <g transform="matrix(1 0 0 1 -0.01 0.51)">
                        <polygon style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" points="-2.6,6.74 -9.09,0.25 -6.97,-1.87 -2.56,2.53 7,-6.74 9.09,-4.59 " />
                      </g>
                    </g>
                  </svg>
                  Action</a>
                <a class="dropdown-item" href="#">ola action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
              <div class="col-4">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
              <div class="col-4">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
        </div>

      </nav>
    </div>


    <div class="border-top my-1 w-80  mx-auto"></div>



    <div class="w-90 container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
                    <h5 class="font-weight-bolder mb-0">
                      $53,000
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Users</p>
                    <h5 class="font-weight-bolder mb-0">
                      2,300
                      <span class="text-success text-sm font-weight-bolder">+3%</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">New Clients</p>
                    <h5 class="font-weight-bolder mb-0">
                      +3,462
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales</p>
                    <h5 class="font-weight-bolder mb-0">
                      $103,430
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">

      </div>
    </div>

    <!-- End Navbar -->

    <!-- 
    
      cartaz na frente de tudo

      <div class="container-fluid mt-0 py-1 d-flex align-items-center justify-content-center">
      <div class="page-header min-height-200 border-radius-xl mt-4 w-75" onclick="location.href = 'www.yoursite.com';"
        style="background-image: url('https://m.media-amazon.com/images/S/stores-image-uploads-na-prod/8/AmazonStores/ATVPDKIKX0DER/2e7765f0786eaef115dfdb9f3838002a.w3000.h600.jpg'); background-position-y: 50%; background-size: 100% 100%;">
      </div>
    </div>
    -->

    <!--
    <div class="row mx-auto" style="width: 100%; ">
      <div class="col-md-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner" style="width: 430%; height: 30vw;">
            <div class="carousel-item active">
              <img src="./img/background3-login.jpg" class="d-block w-100"
                style="width: 100%; height: auto; /* Manter a proporção da imagem */" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./img/background-login.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./img/login_background.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
    </div>
-->




    <!-- Swiper -->
    <div class="swiper mySwiper h-50  w-90">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="me-auto">Artistas Populares</h3>
        <a href="" class="me-4 text-end">See more</a>
      </div>

      <div class="swiper-wrapper">
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



        // Query para buscar os dados dos artistas
        $sql = "SELECT * FROM accounts WHERE identity = 1";
        $result = $conn->query($sql);

        $i = 1;

        $name = "";
        $image_url = "";
        $location = "";
        $type = "";

        $shows = 0;
        $follows = 0;
        $rating = 0;
        $valor = 0.0;

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $user_id = $row['id']; // Obtém o id_user do usuário atual do loop principal

            // Get account details
            $sql_details = "SELECT name, picture, location, type, verified FROM accounts WHERE id = ?";
            $stmt_details = $conn->prepare($sql_details);
            $stmt_details->bind_param("i", $user_id);
            $stmt_details->execute();
            $result_details = $stmt_details->get_result();

            if ($result_details->num_rows > 0) {
              $row_details = $result_details->fetch_assoc();
              $name = $row_details["name"];
              $image_url = $row_details["picture"];
              $location = $row_details["location"];
              $type = $row_details["type"];
              $verified = $row_details["verified"];

              // Get shows count
              $sql_shows = "SELECT COUNT(*) as shows FROM projects WHERE id_founder = ?";
              $stmt_shows = $conn->prepare($sql_shows);
              $stmt_shows->bind_param("i", $id);
              $stmt_shows->execute();
              $result_shows = $stmt_shows->get_result();
              $row_shows = $result_shows->fetch_assoc();
              $shows = $row_shows["shows"];

              // Get follows count
              $sql_follows = "SELECT COUNT(*) as follows FROM follows WHERE id_user = ?";
              $stmt_follows = $conn->prepare($sql_follows);
              $stmt_follows->bind_param("i", $user_id);
              $stmt_follows->execute();
              $result_follows = $stmt_follows->get_result();
              $row_follows = $result_follows->fetch_assoc();
              $follows = $row_follows["follows"];

              // Get ratings count
              $sql_ratings = "SELECT COUNT(*) as ratings FROM rating WHERE id_receive = ?";
              $stmt_ratings = $conn->prepare($sql_ratings);
              $stmt_ratings->bind_param("i", $user_id);
              $stmt_ratings->execute();
              $result_ratings = $stmt_ratings->get_result();
              $row_ratings = $result_ratings->fetch_assoc();
              $rating = $row_ratings["ratings"];

              // Get average rating
              $sql_avg_rating = "SELECT AVG(stars) as avg_stars FROM rating WHERE id_receive = ?";
              $stmt_avg_rating = $conn->prepare($sql_avg_rating);
              $stmt_avg_rating->bind_param("i", $user_id);
              $stmt_avg_rating->execute();
              $result_avg_rating = $stmt_avg_rating->get_result();
              $row_avg_rating = $result_avg_rating->fetch_assoc();
              $valor = $row_avg_rating["avg_stars"];


              echo '
        <div class="swiper-slide">
          <div class="selected-card card bg-transparent">
            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1 bg-transparent">';
              $session_id = $_SESSION['user_id'];

              if ($session_id == $user_id) {
              } else {
                echo ' <label class="ui-bookmark position-absolute text-white p-2 specific-svg">
              <input type="checkbox" onclick="sendUserId(' . $user_id . ')" id="meuCheckbox" class="my-checkbox"';



                // Verificar se o registro já existe na tabela 'saved' para o usuário atual
                $sql_check = "SELECT * FROM saved WHERE id_user = ? AND id_saved = ?";
                $stmt_check = $conn->prepare($sql_check);
                $stmt_check->bind_param("ii", $session_id, $user_id);
                $stmt_check->execute();
                $result_check = $stmt_check->get_result();

                if ($result_check->num_rows > 0) {
                  echo 'checked="checked">';
                } else {
                  echo '>';
                }
                echo '
                <div class="bookmark p-2"
                  style="margin-top: 0.3em; margin-left: 10.2em; opacity: 80%; width:42px; height:42px; border-radius:40%; background-color:rgba(0, 0, 0, 1);">
                  <svg viewBox="0 0 32 32">
                    <g>
                      <path
                        d="M27 4v27a1 1 0 0 1-1.625.781L16 24.281l-9.375 7.5A1 1 0 0 1 5 31V4a4 4 0 0 1 4-4h14a4 4 0 0 1 4 4z">
                      </path>
                    </g>
                  </svg>
                </div>';
              }
              echo ' </label>
              <img src="' . $image_url . '" class="img-fluid border-radius-lg" style="width: 188px; height: 188px;">
            </div>
            <span href="javascript:;" class="card-title h5 d-flex text-darker justify-content-center mb-0"
              style="margin-top: 0.45em; margin-left: 1.4em;">
              ';

              if ($verified == "true") {
                echo '<button type="button" class="btn-tooltip border-0 ps-0" id="tooltipButton' . $i . '"
                onclick="location.href = \'www.yoursite.com\';"
                style="background-color: rgba(0, 0, 0, 0); color: #495057; font-family: Arial, Helvetica, sans-serif;">
                ' . $name . ' 
                <svg class="ms-0" style="margin-top: -0.15em;" width=\'24\' height=\'24\' viewBox=\'0 0 24 24\'
                  xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\'>
                  <rect width=\'24\' height=\'24\' stroke=\'none\' fill=\'#000000\' opacity=\'0\' />
                  <g transform="matrix(0.42 0 0 0.42 12 12)">
                    <g transform="matrix(1 0 0 1 0 0)">
                      <polygon
                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(66,165,245); fill-rule: nonzero; opacity: 1;"
                        points="5.62,-21 9.05,-15.69 15.37,-15.38 15.69,-9.06 21,-5.63 18.12,0 21,5.62 15.69,9.05 15.38,15.37 9.06,15.69 5.63,21 0,18.12 -5.62,21 -9.05,15.69 -15.37,15.38 -15.69,9.06 -21,5.63 -18.12,0 -21,-5.62 -15.69,-9.05 -15.38,-15.37 -9.06,-15.69 -5.63,-21 0,-18.12 " />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.01 0.51)">
                      <polygon
                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                        points="-2.6,6.74 -9.09,0.25 -6.97,-1.87 -2.56,2.53 7,-6.74 9.09,-4.59 " />
                    </g>
                  </g>
                </svg>
              </button>';
              } else {
                echo '
                
                <button type="button" class="btn-tooltip border-0 ps-0" id="tooltipButton' . $i . '"
                onclick="location.href = \'www.yoursite.com\';"
                style="background-color: rgba(0, 0, 0, 0); color: #495057; font-family: Arial, Helvetica, sans-serif; margin-left: -1.4em">
                ' . $name . '
              </button>';
              }
              echo '
              <!-- Div para exibir a tooltip -->
              <div class="custom-tooltip' . $i . ' text-sm text-center" id="customTooltip' . $i . '">
                <img src="' . $image_url . '" class="img-fluid border-radius-lg mt-2 mb-1"
                  style="width: 50px; height: 50px; border-radius: 50%;">
                <a href="yourwebsite.com">
                  ';

              if ($verified == "true") {
                echo '<h5 class="mb-0 ms-3 text-md"> ' . $name . '
                  <svg class="ms-0" style="margin-top: -0.15em;" width=\'24\' height=\'24\' viewBox=\'0 0 24 24\'
                  xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\'>
                  <rect width=\'24\' height=\'24\' stroke=\'none\' fill=\'#000000\' opacity=\'0\' />
                  <g transform="matrix(0.42 0 0 0.42 12 12)">
                    <g transform="matrix(1 0 0 1 0 0)">
                      <polygon
                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(66,165,245); fill-rule: nonzero; opacity: 1;"
                        points="5.62,-21 9.05,-15.69 15.37,-15.38 15.69,-9.06 21,-5.63 18.12,0 21,5.62 15.69,9.05 15.38,15.37 9.06,15.69 5.63,21 0,18.12 -5.62,21 -9.05,15.69 -15.37,15.38 -15.69,9.06 -21,5.63 -18.12,0 -21,-5.62 -15.69,-9.05 -15.38,-15.37 -9.06,-15.69 -5.63,-21 0,-18.12 " />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.01 0.51)">
                      <polygon
                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                        points="-2.6,6.74 -9.09,0.25 -6.97,-1.87 -2.56,2.53 7,-6.74 9.09,-4.59 " />
                    </g>
                  </g>
                </svg></h5>';
              } else {
                echo '<h5 class="mb-0 text-md"> ' . $name . '</h5>';
              }
              echo '
                </a>
                <h6 class="text-sm">' . $location . '</h6>
                <div class="d-flex justify-content-between w-100 mt-3">
                  <div class="d-flex flex-column align-items-center w-50 text-center">
                    <h5 class="mb-0 text-lg">' . $shows . '</h5>
                    <h5 class="text-sm mt-1 text-lg">Shows</h5>
                  </div>
                  <div class="separator"></div>
                  <div class="d-flex flex-column align-items-center w-50">
                    <h5 class="mb-0">' . $follows . '</h5>
                    <h5 class="text-sm mt-1 text-md">Follows</h5>
                  </div>
                </div>
              </div>
            </span>
            <div class="author align-items-center d-flex justify-content-center mb-0">
              <div class="name">
                <p class="text-sm"> ' . $type . '</p>
              </div>
            </div>
            <div class="text-xs justify-content-center d-flex" style="margin-top: -0.5em;">
';

              // Loop para gerar as estrelas
              for ($j = 1; $j <= 5; $j++) {
                if ($j <= $valor) {
                  // Se $i for menor ou igual ao valor, adicione a classe 'checked'
                  echo '<span class="fa fa-star checked"></span>';
                } else {
                  // Caso contrário, adicione apenas a classe 'fa-star' sem 'checked'
                  echo '<span class="fa fa-star"></span>';
                }
              }

              echo '           </div>
            <p class="text-xs text-center mt-1 mb-0">(' . $rating . ')</p>
          </div>
        </div>
  ';
              $i = $i + 1;
            }
          }
        } else {
          echo "Nenhum resultado encontrado";
        }

        $conn->close();
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>




    <div class="w-80 mb-5 mt-5 d-flex justify-content-center mx-auto">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-lg-7">
              <div class="d-flex flex-column h-100">
                <p class="mb-1 pt-2 text-bold">Concert Pulse Artist's</p>
                <h5 class="font-weight-bolder">Quem somos?</h5>
                <p class="mb-5"> Na seção ConcertPulse Artists, os artistas têm a chance de se destacar. <br> Aqui, eles podem criar perfis detalhados exibindo suas habilidades, experiências passadas e amostras de trabalhos anteriores. </p>
                <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Read More
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
              <img class="w-100 position-relative z-index-2 pt-4" src="./img/logo.png" alt="rocket">
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Swiper -->
    <div class="swiper mySwiper h-50 w-90">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="me-auto">Promotores Populares</h3>
        <a href="" class="me-4 text-end">See more</a>
      </div>

      <div class="swiper-wrapper">
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



        // Query para buscar os dados dos promotores
        $sql = "SELECT * FROM accounts WHERE identity = 2";
        $result = $conn->query($sql);

        $i = 1;

        $name = "";
        $image_url = "";
        $location = "";
        $type = "";

        $shows = 0;
        $follows = 0;
        $rating = 0;
        $valor = 0.0;

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $user_id = $row['id']; // Obtém o id_user do usuário atual do loop principal

            // Get account details
            $sql_details = "SELECT name, picture, location, type, verified FROM accounts WHERE id = ?";
            $stmt_details = $conn->prepare($sql_details);
            $stmt_details->bind_param("i", $user_id);
            $stmt_details->execute();
            $result_details = $stmt_details->get_result();

            if ($result_details->num_rows > 0) {
              $row_details = $result_details->fetch_assoc();
              $name = $row_details["name"];
              $image_url = $row_details["picture"];
              $location = $row_details["location"];
              $type = $row_details["type"];
              $verified = $row_details["verified"];

              // Get shows count
              $sql_shows = "SELECT COUNT(*) as shows FROM projects WHERE id_founder = ?";
              $stmt_shows = $conn->prepare($sql_shows);
              $stmt_shows->bind_param("i", $id);
              $stmt_shows->execute();
              $result_shows = $stmt_shows->get_result();
              $row_shows = $result_shows->fetch_assoc();
              $shows = $row_shows["shows"];

              // Get follows count
              $sql_follows = "SELECT COUNT(*) as follows FROM follows WHERE id_followed = ?";
              $stmt_follows = $conn->prepare($sql_follows);
              $stmt_follows->bind_param("i", $user_id);
              $stmt_follows->execute();
              $result_follows = $stmt_follows->get_result();
              $row_follows = $result_follows->fetch_assoc();
              $follows = $row_follows["follows"];

              // Get ratings count
              $sql_ratings = "SELECT COUNT(*) as ratings FROM rating WHERE id_receive = ?";
              $stmt_ratings = $conn->prepare($sql_ratings);
              $stmt_ratings->bind_param("i", $user_id);
              $stmt_ratings->execute();
              $result_ratings = $stmt_ratings->get_result();
              $row_ratings = $result_ratings->fetch_assoc();
              $rating = $row_ratings["ratings"];

              // Get average rating
              $sql_avg_rating = "SELECT AVG(stars) as avg_stars FROM rating WHERE id_receive = ?";
              $stmt_avg_rating = $conn->prepare($sql_avg_rating);
              $stmt_avg_rating->bind_param("i", $user_id);
              $stmt_avg_rating->execute();
              $result_avg_rating = $stmt_avg_rating->get_result();
              $row_avg_rating = $result_avg_rating->fetch_assoc();
              $valor = $row_avg_rating["avg_stars"];


              echo '
        <div class="swiper-slide">
          <div class="selected-card card bg-transparent">
            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1 bg-transparent">';
              $session_id = $_SESSION['user_id'];

              if ($session_id == $user_id) {
              } else {
                echo ' <label class="ui-bookmark position-absolute text-white p-2 specific-svg">
              <input type="checkbox" onclick="sendUserId(' . $user_id . ')" id="meuCheckbox" class="my-checkbox"';



                // Verificar se o registro já existe na tabela 'saved' para o usuário atual
                $sql_check = "SELECT * FROM saved WHERE id_user = ? AND id_saved = ?";
                $stmt_check = $conn->prepare($sql_check);
                $stmt_check->bind_param("ii", $session_id, $user_id);
                $stmt_check->execute();
                $result_check = $stmt_check->get_result();

                if ($result_check->num_rows > 0) {
                  echo 'checked="checked">';
                } else {
                  echo '>';
                }
                echo '
                <div class="bookmark p-2"
                  style="margin-top: 0.3em; margin-left: 10.2em; opacity: 80%; width:42px; height:42px; border-radius:40%; background-color:rgba(0, 0, 0, 1);">
                  <svg viewBox="0 0 32 32">
                    <g>
                      <path
                        d="M27 4v27a1 1 0 0 1-1.625.781L16 24.281l-9.375 7.5A1 1 0 0 1 5 31V4a4 4 0 0 1 4-4h14a4 4 0 0 1 4 4z">
                      </path>
                    </g>
                  </svg>
                </div>';
              }
              echo ' </label>
              <img src="' . $image_url . '" class="img-fluid border-radius-lg" style="width: 188px; height: 188px;">
            </div>
            <span href="javascript:;" class="card-title h5 d-flex text-darker justify-content-center mb-0"
              style="margin-top: 0.45em; margin-left: 1.4em;">
              ';

              if ($verified == "true") {
                echo '<button type="button" class="btn-tooltip border-0 ps-0" id="tooltipButton' . $i . '"
                onclick="location.href = \'www.yoursite.com\';"
                style="background-color: rgba(0, 0, 0, 0); color: #495057; font-family: Arial, Helvetica, sans-serif;">
                ' . $name . ' 
                <svg class="ms-0" style="margin-top: -0.15em;" width=\'24\' height=\'24\' viewBox=\'0 0 24 24\'
                  xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\'>
                  <rect width=\'24\' height=\'24\' stroke=\'none\' fill=\'#000000\' opacity=\'0\' />
                  <g transform="matrix(0.42 0 0 0.42 12 12)">
                    <g transform="matrix(1 0 0 1 0 0)">
                      <polygon
                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(66,165,245); fill-rule: nonzero; opacity: 1;"
                        points="5.62,-21 9.05,-15.69 15.37,-15.38 15.69,-9.06 21,-5.63 18.12,0 21,5.62 15.69,9.05 15.38,15.37 9.06,15.69 5.63,21 0,18.12 -5.62,21 -9.05,15.69 -15.37,15.38 -15.69,9.06 -21,5.63 -18.12,0 -21,-5.62 -15.69,-9.05 -15.38,-15.37 -9.06,-15.69 -5.63,-21 0,-18.12 " />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.01 0.51)">
                      <polygon
                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                        points="-2.6,6.74 -9.09,0.25 -6.97,-1.87 -2.56,2.53 7,-6.74 9.09,-4.59 " />
                    </g>
                  </g>
                </svg>
              </button>';
              } else {
                echo '
                
                <button type="button" class="btn-tooltip border-0 ps-0" id="tooltipButton' . $i . '"
                onclick="location.href = \'www.yoursite.com\';"
                style="background-color: rgba(0, 0, 0, 0); color: #495057; font-family: Arial, Helvetica, sans-serif; margin-left: -1.4em">
                ' . $name . '
              </button>';
              }
              echo '
              <!-- Div para exibir a tooltip -->
              <div class="custom-tooltip' . $i . ' text-sm text-center" id="customTooltip' . $i . '">
                <img src="' . $image_url . '" class="img-fluid border-radius-lg mt-2 mb-1"
                  style="width: 50px; height: 50px; border-radius: 50%;">
                <a href="yourwebsite.com">
                  ';

              if ($verified == "true") {
                echo '<h5 class="mb-0 ms-3 text-md"> ' . $name . '
                  <svg class="ms-0" style="margin-top: -0.15em;" width=\'24\' height=\'24\' viewBox=\'0 0 24 24\'
                  xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\'>
                  <rect width=\'24\' height=\'24\' stroke=\'none\' fill=\'#000000\' opacity=\'0\' />
                  <g transform="matrix(0.42 0 0 0.42 12 12)">
                    <g transform="matrix(1 0 0 1 0 0)">
                      <polygon
                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(66,165,245); fill-rule: nonzero; opacity: 1;"
                        points="5.62,-21 9.05,-15.69 15.37,-15.38 15.69,-9.06 21,-5.63 18.12,0 21,5.62 15.69,9.05 15.38,15.37 9.06,15.69 5.63,21 0,18.12 -5.62,21 -9.05,15.69 -15.37,15.38 -15.69,9.06 -21,5.63 -18.12,0 -21,-5.62 -15.69,-9.05 -15.38,-15.37 -9.06,-15.69 -5.63,-21 0,-18.12 " />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.01 0.51)">
                      <polygon
                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                        points="-2.6,6.74 -9.09,0.25 -6.97,-1.87 -2.56,2.53 7,-6.74 9.09,-4.59 " />
                    </g>
                  </g>
                </svg></h5>';
              } else {
                echo '<h5 class="mb-0 text-md"> ' . $name . '</h5>';
              }
              echo '
                </a>
                <h6 class="text-sm">' . $location . '</h6>
                <div class="d-flex justify-content-between w-100 mt-3">
                  <div class="d-flex flex-column align-items-center w-50 text-center">
                    <h5 class="mb-0 text-lg">' . $shows . '</h5>
                    <h5 class="text-sm mt-1 text-lg">Shows</h5>
                  </div>
                  <div class="separator"></div>
                  <div class="d-flex flex-column align-items-center w-50">
                    <h5 class="mb-0">' . $follows . '</h5>
                    <h5 class="text-sm mt-1 text-md">Follows</h5>
                  </div>
                </div>
              </div>
            </span>
            <div class="author align-items-center d-flex justify-content-center mb-0">
              <div class="name">
                <p class="text-sm"> ' . $type . '</p>
              </div>
            </div>
            <div class="text-xs justify-content-center d-flex" style="margin-top: -0.5em;">
';

              // Loop para gerar as estrelas
              for ($j = 1; $j <= 5; $j++) {
                if ($j <= $valor) {
                  // Se $i for menor ou igual ao valor, adicione a classe 'checked'
                  echo '<span class="fa fa-star checked"></span>';
                } else {
                  // Caso contrário, adicione apenas a classe 'fa-star' sem 'checked'
                  echo '<span class="fa fa-star"></span>';
                }
              }

              echo '           </div>
            <p class="text-xs text-center mt-1 mb-0">(' . $rating . ')</p>
          </div>
        </div>
  ';
              $i = $i + 1;
            }
          }
        } else {
          echo "Nenhum resultado encontrado";
        }

        $conn->close();
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>



    <h5 class="w-90 mt-6 ms-3 text-center">Trusted by:</h5>
    <div class="border-top my-1 w-90  mx-auto"></div>

    <div class="logos w-90 d-flex justify-content-center mx-auto">
      <div class="logos-slide">
        <a href="">
          <img src="./img/brands/agribrands-logo-512.png" />
        </a>

        <a href="">
          <img src="./img/brands/american-brands-logo-512.png" />
        </a>

        <a href="">
          <img src="./img/brands/brands-of-the-world-logo-512.png" />
        </a>

        <a href="">
          <img src="./img/brands/brandstudio-logo-logo-512.png" />
        </a>

        <a href="">
          <img src="./img/brands/faire-logo-512.png" />
        </a>

        <a href="">
          <img src="./img/brands/first-brands-logo-512.png" />
        </a>

        <a href="">
          <img src="./img/brands/furniture-brands-logo-512.png" />
        </a>

        <a href="">
          <img src="./img/brands/observe-ai-logo-512.png" />
        </a>

        <a href="">
          <img src="./img/brands/sunline-brands-logo-512.png" />
        </a>
      </div>
    </div>
    <div class="border-top my-1 w-90  mx-auto"></div>














    <div class="w-80 mb-5 mt-5 d-flex justify-content-center mx-auto">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-lg-7">
              <div class="d-flex flex-column h-90 p-go-to-feed">
                <h2 class="">Feed</h2>
                <p class="mb-5 text-justified">Esteja sempre a par de todas as novidades das pessoas que estão no seu
                  radar. <br> Sempre que alguém que você siga publicar algo novo como um show ou uma publicação normal
                  seja o primeiro a ver!</p>
              </div>

              <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                Ver mais
                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
              </a>
            </div>
            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
              <div class="position-relative d-flex align-items-center justify-content-center h-100">
                <img class="w-100 position-relative z-index-2 rounded" src="./img/feed.jpg" style="width:50px; height: 270px;" alt="rocket">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


























  </main>

  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
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
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free
          Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
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
        }, ],
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
    $(document).ready(function() {
      var tooltipTimer;

      // Exibir a tooltip quando o mouse passar sobre o botão
      $('#tooltipButton').mouseenter(function() {
        clearTimeout(tooltipTimer);
        $('#customTooltip').css({
          'display': 'block',
        });
      });

      // Manter a tooltip visível mesmo quando o mouse sair do botão
      $('#customTooltip').mouseenter(function() {
        clearTimeout(tooltipTimer);
      });

      // Esconder a tooltip quando o mouse sair tanto do botão quanto da própria tooltip
      $('#tooltipButton, #customTooltip').mouseleave(function() {
        tooltipTimer = setTimeout(function() {
          // Aplica a animação de desaparecer
          $('#customTooltip').css('animation', 'fadeOut 0.5s ease forwards');
          // Esconde a tooltip após a animação
          setTimeout(function() {
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

    document.addEventListener("DOMContentLoaded", function() {
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
        data: {
          user_id: user_id
        }, // Envia o user_id para o PHP
        success: function(result) {
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