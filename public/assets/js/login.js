$(document).ready(function() {
  $('#loginForm').submit(function(event) {
    event.preventDefault(); // Evita o envio padrão do formulário

    var email = $('#email').val();
    var password = $('#password').val();

    $.ajax({
      url: '../src/Handlers/LoginArtistsProcess.php',
      type: 'POST',
      data: {
        email: email,
        password: password
      },
      success: function(response) {
        if (response.success) {
          // Redirecionar para a página de dashboard em caso de sucesso
          window.location.href = 'home.php';
        } else {
          // Exibir mensagem de erro usando Toastr
          erro(response.message);
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Tratamento de erros da requisição
        console.error('Erro: ' + textStatus, errorThrown);
        // Exibir mensagem de erro genérica
        erro('Ocorreu um erro durante o login. Por favor, tente novamente.');
      }
    });
  });

  // Função para exibir mensagens de erro com Toastr
  function erro(mensagem) {
    toastr.options.timeOut = 4000; // 4 segundos
    toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
    toastr.error(mensagem);
  }
});
