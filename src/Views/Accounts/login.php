<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../public/assets/img/apple-icon.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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

  <script src="./assets/js/login.js"></script>

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Incluir Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>


  <!-- CSS Files -->
  <link id="pagestyle" href="../public/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />

  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
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
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6 d-flex flex-column mx-auto" id="register_form">
              <div class="card card-plain mt-7 mb-6">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-center text-info text-gradient" style="font-size: 2.25em;">Login</h3>
                </div>
                <div class="card-body">

                  <label>Identificação @</label>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Identificação" aria-label="Email" id="email" name="email" aria-describedby="email-addon">
                  </div>
                  <label>Palavra-passe</label>
                  <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="password" aria-label="password" name="password" aria-describedby="password-addon">
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Lembrar</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" onclick="enviar()" class="btn bg-gradient-info w-100 mt-4 mb-0">Login</button>
                  </div>

                </div>

                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Ainda não tem conta?
                    <a href="register.php" class="text-info text-gradient font-weight-bold" id="login_change">Criar uma...</a>
                  </p>

                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('./img/login_background.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
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
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->

  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>

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