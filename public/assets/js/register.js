$(document).ready(function() {
    $('#loginForm').submit(function(event) {
      event.preventDefault(); // Evita o envio padrão do formulário

      var email = $('#email').val();
      var password = $('#password').val();

      $.ajax({
        url: '../src/Handlers/RegisterArtistsProcess.php',
        type: 'POST',
        data: {
          email: email,
          password: password
        },
        success: function(response) {
          // Tratamento da resposta do servidor
          // Exemplo: redirecionar para uma nova página em caso de sucesso
          if (response.success) {
            window.location.href = 'dashboard.php';
          } else {
            // Mostrar mensagem de erro
            alert(response.message);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Tratamento de erros da requisição
          console.error('Erro: ' + textStatus, errorThrown);
          alert('Ocorreu um erro durante o login. Por favor, tente novamente.');
        }
      });
    });
  });
