function enviar() {
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;
  var checkbox = document.getElementById('rememberMe');
  var remember = checkbox.checked ? 1 : 0;

  console.log('Email:', email);
  console.log('Password:', password);
  console.log('Remember:', remember);

  $.ajax({
    type: "POST",
    url: "../src/Handlers/login.php",
    data: {
      email: email,
      password: password,
      remember: remember
    },
    success: function (result) {
      console.log('Requisição AJAX bem-sucedida');
      if (result == 1) {
        window.location.href = "home.php";
      } else {
        window.location.href = "login.php";
      }
    },
    error: function (xhr, status, error) {
      console.error('Erro na requisição AJAX:', error);
    }
  });
}
