function enviar() {
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;
  var checkbox = document.getElementById('rememberMe');
  var remember = checkbox.checked ? 1 : 0;

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
      // Faça algo com o resultado retornado, se necessário
    },
    error: function (xhr, status, error) {
      console.error('Erro na requisição AJAX:', error);
      // Trate o erro de acordo com suas necessidades
    }
  });
}