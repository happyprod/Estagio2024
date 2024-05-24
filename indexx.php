<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
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

  <!-- Adicione o script do jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Demo styles -->
  <style>
    html,
    body {
      position: relative;
      height: 100%;
      margin: 0;
      padding: 0;
    }

    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
    }

    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      width: 100%;
      height: auto;
      border-radius: 10px;
      /* Adicione borda arredondada para a imagem */
    }

    .swiper-slide .card-title {
      margin-top: 15px;
      font-size: 18px;
    }
  </style>
</head>

<body>
  <!-- Swiper 
<div class="swiper mySwiper h-50">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="selected-card card ms-4 bg-transparent">
          <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1 bg-transparent">
            <label class="ui-bookmark position-absolute text-white p-2 specific-svg">
              <input type="checkbox">
              <div class="bookmark p-2"
                style="margin-top: 0.3em; margin-left: 10.2em; opacity: 80%; width:42px; height:42px; border-radius:40%; background-color:rgba(0, 0, 0, 1);">
                <svg viewBox="0 0 32 32">
                  <g>
                    <path
                      d="M27 4v27a1 1 0 0 1-1.625.781L16 24.281l-9.375 7.5A1 1 0 0 1 5 31V4a4 4 0 0 1 4-4h14a4 4 0 0 1 4 4z">
                    </path>
                  </g>
                </svg>
              </div>
            </label>
            <img src="https://via.placeholder.com/150" class="img-fluid border-radius-lg">
          </div>
          <span href="javascript:;" class="card-title h5 d-flex text-darker justify-content-center mb-0"
            style="margin-top: 0.45em; margin-left: 1.4em;">
            <button type="button" class="btn-tooltip border-0 ps-0" id="tooltipButton"
              onclick="location.href = 'www.yoursite.com';"
              style="background-color: rgba(0, 0, 0, 0); color: #495057; font-family: Arial, Helvetica, sans-serif;">
              Post Malone
              <svg class="ms-0" style="margin-top: -0.15em;" width='24' height='24' viewBox='0 0 24 24'
                xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />
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
            </button>
            <div class="custom-tooltip text-sm text-center" id="customTooltip">
              <img src="https://via.placeholder.com/50" class="img-fluid border-radius-lg mt-2 mb-1"
                style="width: 50px; height: 50px; border-radius: 50%;">
              <a href="yourwebsite.com">
                <h5 class="mb-0 text-md">Post Malone</h5>
              </a>
              <h6 class="text-sm">New York</h6>
              <div class="d-flex justify-content-between w-100 mt-3">
                <div class="d-flex flex-column align-items-center w-50 text-center">
                  <h5 class="mb-0 text-lg">192</h5>
                  <h5 class="text-sm mt-1 text-lg">Shows</h5>
                </div>
                <div class="separator"></div>
                <div class="d-flex flex-column align-items-center w-50">
                  <h5 class="mb-0">2k</h5>
                  <h5 class="text-sm mt-1 text-md">Follows</h5>
                </div>
              </div>
            </div>
          </span>
          <div class="author align-items-center d-flex justify-content-center mb-0">
            <div class="name">
              <p class="text-sm">Singer</p>
            </div>
          </div>
          <div class="text-xs justify-content-center d-flex" style="margin-top: -0.5em;">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
          </div>
          <p class="text-xs text-center mt-1 mb-0">(392)</p>
        </div>
      </div>



      <div class="swiper-slide">
        <div class="selected-card card ms-4 bg-transparent">
          <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1 bg-transparent">
            <label class="ui-bookmark position-absolute text-white p-2 specific-svg">
              <input type="checkbox">
              <div class="bookmark p-2"
                style="margin-top: 0.3em; margin-left: 10.2em; opacity: 80%; width:42px; height:42px; border-radius:40%; background-color:rgba(0, 0, 0, 1);">
                <svg viewBox="0 0 32 32">
                  <g>
                    <path
                      d="M27 4v27a1 1 0 0 1-1.625.781L16 24.281l-9.375 7.5A1 1 0 0 1 5 31V4a4 4 0 0 1 4-4h14a4 4 0 0 1 4 4z">
                    </path>
                  </g>
                </svg>
              </div>
            </label>
            <img src="https://via.placeholder.com/150" class="img-fluid border-radius-lg">
          </div>
          <span href="javascript:;" class="card-title h5 d-flex text-darker justify-content-center mb-0"
            style="margin-top: 0.45em; margin-left: 1.4em;">
            <button type="button" class="btn-tooltip border-0 ps-0" id="tooltipButton2"
              onclick="location.href = 'www.yoursite.com';"
              style="background-color: rgba(0, 0, 0, 0); color: #495057; font-family: Arial, Helvetica, sans-serif;">
              Post Malone
              <svg class="ms-0" style="margin-top: -0.15em;" width='24' height='24' viewBox='0 0 24 24'
                xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />
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
            </button>
            <div class="custom-tooltip text-sm text-center" id="customTooltip2">
              <img src="https://via.placeholder.com/50" class="img-fluid border-radius-lg mt-2 mb-1"
                style="width: 50px; height: 50px; border-radius: 50%;">
              <a href="yourwebsite.com">
                <h5 class="mb-0 text-md">Post Malone</h5>
              </a>
              <h6 class="text-sm">New York</h6>
              <div class="d-flex justify-content-between w-100 mt-3">
                <div class="d-flex flex-column align-items-center w-50 text-center">
                  <h5 class="mb-0 text-lg">192</h5>
                  <h5 class="text-sm mt-1 text-lg">Shows</h5>
                </div>
                <div class="separator"></div>
                <div class="d-flex flex-column align-items-center w-50">
                  <h5 class="mb-0">2k</h5>
                  <h5 class="text-sm mt-1 text-md">Follows</h5>
                </div>
              </div>
            </div>
          </span>
          <div class="author align-items-center d-flex justify-content-center mb-0">
            <div class="name">
              <p class="text-sm">Singer</p>
            </div>
          </div>
          <div class="text-xs justify-content-center d-flex" style="margin-top: -0.5em;">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
          </div>
          <p class="text-xs text-center mt-1 mb-0">(392)</p>
        </div>
      </div>
      <div class="swiper-slide">Slide 3</div>
      <div class="swiper-slide">Slide 4</div>
      <div class="swiper-slide">Slide 5</div>
      <div class="swiper-slide">Slide 6</div>
      <div class="swiper-slide">Slide 7</div>
      <div class="swiper-slide">Slide 8</div>
      <div class="swiper-slide">Slide 9</div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  -->

  <!-- Swiper -->
  <div class="swiper mySwiper h-50">
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
      $sql = "SELECT * FROM accounts";
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
                $sql_shows = "SELECT COUNT(*) as shows FROM shows WHERE id_artist = ?";
                $stmt_shows = $conn->prepare($sql_shows);
                $stmt_shows->bind_param("i", $user_id);
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
          <div class="selected-card card ms-4 bg-transparent">
            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1 bg-transparent">
              <label class="ui-bookmark position-absolute text-white p-2 specific-svg">
                <input type="checkbox">
                <div class="bookmark p-2"
                  style="margin-top: 0.3em; margin-left: 10.2em; opacity: 80%; width:42px; height:42px; border-radius:40%; background-color:rgba(0, 0, 0, 1);">
                  <svg viewBox="0 0 32 32">
                    <g>
                      <path
                        d="M27 4v27a1 1 0 0 1-1.625.781L16 24.281l-9.375 7.5A1 1 0 0 1 5 31V4a4 4 0 0 1 4-4h14a4 4 0 0 1 4 4z">
                      </path>
                    </g>
                  </svg>
                </div>
              </label>
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

                  if ($verified == "true")
                  {
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



  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 6,
      spaceBetween: 10,
      grabCursor: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        1920: {
          slidesPerView: 8,
        },
        1650: {
          slidesPerView: 7,
        },
        1366: {
          slidesPerView: 5,
        },
        1024: {
          slidesPerView: 5,
        },
        768: {
          slidesPerView: 3,
        },
        576: {
          slidesPerView: 3,
      }
      }
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

</body>

</html>