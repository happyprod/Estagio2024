<?php
require_once __DIR__ . '/../../../vendor/autoload.php'; // Certifique-se de que o autoload do Composer está incluído


use App\Controllers\ChatController;
use App\Models\Message;
use App\Helpers\Database;


$db = Database::connect();
?>
<!DOCTYPE HTML>
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
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/chat.css" />
  <link rel="stylesheet" href="assets/core/css/chat.css" />
</head>

<body class="g-sidenav-show bg-gray-100 overflow-hidden">



  <div class="main-wrapper" style="height: 100vh;">

    <div class="row">

      <?php
      include('../src/Views/Layouts/Menu.php');
      ?>
    </div>

    <div class="ms-12 h-100">
      <div class="container" style="width: 95%; height: 100%;">
        <div class="page-content" style="height: 100%;">
          <div class="container" style="height: 100%;">
            <div class="row" style="height: 100%;">
              <div class="col-md-4 col-12 card-stacked" style="padding-right: 0px;">
                <div class="card shadow-line mb-3 chat" style="border-bottom-right-radius: 0px;">
                  <div class="chat-search ps-3 pe-3">
                    <div class="input-group">
                      <input type="text" id="searchChat" oninput="searchChat()" class="form-control rounded-lg" style="box-shadow: 0 0 0 0 !important; border: 0 none !important; outline: 0 !important;" placeholder="Procurar uma conversa">
                    </div>
                  </div>
                  <div class="archived-messages d-flex p-3" style="cursor: auto;">
                    <div class="w-100">
                      <div class="d-flex ps-0">
                        <div class="d-flex flex-row mt-1">
                          <p class="margin-auto fw-400 text-dark-75">Recentes</p>
                        </div>
                        <div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="chat-user-panel">
                    <div id="chat-options" class="pb-3 d-flex flex-column navigation-mobile pagination-scrool chat-user-scroll">
                      <!-- conteudo dinamico -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 col-12 card-stacked" style="padding-left: 0px;">
                <div class="card shadow-line mb-3 chat chat-panel">
                  <div id="chat-box" class="h-100">

                    <div class="d-flex flex-column align-items-center justify-content-center h-100 w-100 my-auto mx-auto">
                      <img src="./img/chat.png" style="width: 250px; height: 250px;" alt="">
                      <h6 class="mt-3">As tuas mensagens</h6>
                      <p class="text-center">Envia mensagens privadas para um colega de equipa</p>
                    </div>

                    <!-- conteudo dinamico -->
                  </div>
                  <div id="mensagemInput" class="chat-search d-none ps-3 pe-3">
                    <div class="input-group">
                      <input type="text" id="message" class="form-control" style="border-top-right-radius: 0rem !important; border-bottom-right-radius: 0px !important; box-shadow: 0 0 0 0 !important; border: 0 none !important; outline: 0 !important;" placeholder="Escreva uma mensagem">
                      <div class="input-group-append prepend-white">
                        <span onclick="sendMessage()" id="send" class="input-group-text ps-2 pe-2" style="padding-bottom: 8px; padding-top: 8px;">
                          <i class="fs-19 bi bi-cursor ml-2 mr-2"></i>
                          <div class="chat-upload">
                            <div class="d-flex flex-column">
                              <div class="p-2">
                                <button type="button" class="btn btn-danger btn-md btn-icon btn-circle btn-blushing">
                                  <i class="fs-15 bi bi-card-image"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </span>
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
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/chat.js"></script>
</body>

</html>