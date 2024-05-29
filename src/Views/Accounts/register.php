<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo BASE_LOGO; ?>">
  <title>
    Login
  </title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARtHqWhhONSQVfBMlIV4SMerzDmSTDf4o&libraries=places"></script>

  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

  <style>
    .RegisterModal1 .modal-content {
      text-align: center;
      max-width: 1000px;
      margin: auto;
    }

    .RegisterModal1 .modal-body .btn {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-bottom: 15px;
      text-align: center;
      height: 350px;
      /* Altura dos botões */
      padding: 20px;
      /* Adiciona um pouco de margem interna */
    }

    .RegisterModal1 img {
      height: 100px;
      margin-bottom: 10px;
    }

    .RegisterModal1 .btn-selected {
      background-color: #1E90FF;
      /* Reduzindo a opacidade do azul */
      border: none;
      /* Mudando a cor da borda para #1E90FF */
      color: #fff;
      box-shadow: 0px 5px 15px #1E90FF;
      /* Adicionando uma sombra com a cor #1E90FF */
    }

    .RegisterModal1 .btn-selected h5 {
      color: white;
    }

    .RegisterModal1 .btn-selected img {
      filter: invert(100%);
    }

    @media (min-width: 576px) {
      .RegisterModal1 .modal-body .btn {
        height: 300px;
      }
    }

    @media (min-width: 768px) {
      .RegisterModal1 .modal-body .btn {
        height: 270px;
      }
    }

    @media (min-width: 992px) {
      .RegisterModal1 .modal-body .btn {
        height: 250px;
      }
    }

    .RegisterModal1 .btn-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .RegisterModal1 .opcao:hover img {
      filter: invert(100%);
    }

    .RegisterModal1 .opcao:hover h5 {
      color: white;
    }

    .RegisterModal1 .opcao:hover p {
      color: white;
    }

    .RegisterModal1 .opcao:hover {
      background-color: #6c757d;
    }

    .RegisterModal1 h5 {
      font-size: 1.25rem;
      text-transform: none;
    }

    .RegisterModal1 p {
      font-size: 1rem;
      text-transform: none;
    }
  </style>
</head>

<body class="">
  <div class="position-sticky z-index-sticky top-0 d-flex justify-content-center align-items-center h-100 w-100">
    <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute ps-3 my-3 py-2 start-15 end-15 d-flex justify-content-center">
      <div class="p-2 ms-2">
        <a class="navbar-brand font-weight-bolder ms-lg-0" href="<?php echo BASE_URL; ?>">
          ConcertPulse Artist's
        </a>
      </div>
    </nav>
  </div>

  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="w-60">
          <div>
            <div class="col-xl-8 col-lg-5 col-md-6 d-flex flex-column mx-auto" id="register_form">
              <div class="card card-plain mt-7 mb-6">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-center text-info text-gradient" style="font-size: 2.25em;">Registar</h3>
                </div>
                <div class="card-body">

                  <form id="loginForm" role="form" method="POST" autocomplete="off">

                    <div class="row">
                      <div class="col-6">
                        <label for="tipo">Tipo</label>
                        <div class="mb-3">
                          <input type="text" class="form-control" data-toggle="modal" data-target="#freelancerModal" placeholder="Tipo" id="tipo" name="tipo" aria-describedby="tipo-addon">
                        </div>
                      </div>
                      <div class="col-6">
                        <label for="email">Email</label>
                        <div class="mb-3">
                          <input type="email" class="form-control" placeholder="Email" id="email" name="email" aria-describedby="email-addon">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">

                        <label for="name">Nome</label>
                        <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Nome" id="name" name="name" aria-describedby="name-addon">
                        </div>
                      </div>
                      <div class="col-6">
                        <label for="password">Palavra-passe</label>
                        <div class="mb-3">
                          <input type="password" class="form-control" placeholder="Password" id="password" aria-label="Password" name="password" aria-describedby="password-addon">
                        </div>
                      </div>

                    </div>
                    <label for="localizacao">Localização</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Localização" id="autocomplete" name="localizacao" aria-describedby="localizacao-addon">
                    </div>


                    <div class="RegisterModal1"></div>
                    <div class="text-center">
                      <button type="button" class="btn bg-gradient-info w-100 mt-4 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Registar
                      </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade RegisterModal1" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Que tipo és?</h4>
                            <button type="button" class="btn-close text-dark" style="font-size: 2em; margin-top: -0.8em;" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4">
                                <button type="button" class="w-100 btn opcao btn-outline-secondary">
                                  <div class="btn-content">
                                    <img src="./img/promotor.png" alt="Promotor">
                                    <h5 id="1">Promotor</h5>
                                    <p>Organiza eventos musicais.</p>
                                  </div>
                                </button>
                              </div>
                              <div class="col-md-4">
                                <button type="button" class="btn opcao w-100 btn-outline-secondary">
                                  <div class="btn-content">
                                    <img src="./img/artist.png" alt="Artista">
                                    <h5>Artista</h5>
                                    <p>Dj/Cantor/Banda…</p>
                                  </div>
                                </button>
                              </div>
                              <div class="col-md-4">
                                <button type="button" class="w-100 opcao btn btn-outline-secondary">
                                  <div class="btn-content">
                                    <img src="./img/booking agent.png" alt="Agentes de Booking">
                                    <h5>Agentes de Booking</h5>
                                    <p>Negocia contratos e datas de shows para artistas.</p>
                                  </div>
                                </button>
                              </div>
                              <div class="col-md-6">
                                <button type="button" class="btn opcao btn-outline-secondary">
                                  <div class="btn-content">
                                    <img src="./img/Booking Agency.png" alt="Agencia de Booking">
                                    <h5>Agencia de Booking</h5>
                                    <p>Representa artistas na negociação de oportunidades de trabalho.</p>
                                  </div>
                                </button>
                              </div>
                              <div class="col-md-6">
                                <button type="button" class="btn opcao w-100 btn-outline-secondary">
                                  <div class="btn-content">
                                    <img src="./img/festival.png" alt="Festival">
                                    <h5>Evento</h5>
                                    <p>Evento com apresentações artísticas e musicais.</p>
                                  </div>
                                </button>
                              </div>
                            </div>
                          </div>
                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success" data-dismiss="modal">Continuar</button>
                          </div>

                        </div>
                      </div>
                    </div>
                    </>
                </div>

                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Já tem uma conta?
                    <a href="loginartists.php" class="text-info text-gradient font-weight-bold" id="login_change">Entrar...</a>
                  </p>

                  <a class="btn btn-dark w-90 h-30" href="../src/google-oauth.php" role="button">
                    <i class="fab fa-google fa-lg me-2"></i>Continue with Google
                  </a>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top me-auto h-100 z-index-0 ms-n6" style="background-image:url('./img/login_background.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- START FOOTER -->
  <footer class="footer py-5">
    <div class="container d-flex justify-content-center mx-auto">
      <div class="row">
        <div class=" mb-2  d-flex justify-content-center">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            About Us
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Products
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Pricing
          </a>
        </div>
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="https://www.instagram.com/happyprod19/" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="https://www.twitter.com/happyprod19/" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="https://www.tiktok.com/@happyprod19" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-tiktok"></span>
          </a>
        </div>
      </div>
    </div>
    </div>
  </footer>
  <!-- END FOOTER -->

  <!-- Core JS Files -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/register.js"></script>

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
  <script src="./assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>