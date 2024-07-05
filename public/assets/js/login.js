function erro(mensagem) {
  toastr.options.timeOut = 5000; // 10 segundos
  toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
  toastr.error(mensagem);
}

function enviar() {
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;

  console.log('Email:', email);
  console.log('Password:', password);

  $.ajax({
    type: "POST",
    url: "../src/Handlers/login.php",
    data: {
      email: email,
      password: password
    },
    success: function (result) {
      console.log('Requisição AJAX bem-sucedida');
      if (result == 1) {
        window.location.href = "home.php";
      } else {
        erro('Dados incorretos');
      }

    },
    error: function (xhr, status, error) {
      console.error('Erro na requisição AJAX:', error);
    }
  });
}
