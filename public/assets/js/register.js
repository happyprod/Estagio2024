$(document).ready(function () {
  $('#loginForm').submit(function (event) {
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
      success: function (response) {
        // Tratamento da resposta do servidor
        // Exemplo: redirecionar para uma nova página em caso de sucesso
        if (response.success) {
          window.location.href = 'dashboard.php';
        } else {
          // Mostrar mensagem de erro
          alert(response.message);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // Tratamento de erros da requisição
        console.error('Erro: ' + textStatus, errorThrown);
        alert('Ocorreu um erro durante o login. Por favor, tente novamente.');
      }
    });
  });
});


function initAutocomplete() {
  var input = document.getElementById('autocomplete');

  var autocomplete = new google.maps.places.Autocomplete(input, options);

  autocomplete.addListener('place_changed', function () {
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      console.log("No details available for input: '" + place.name + "'");
      return;
    }
    console.log(place);
  });
}
document.addEventListener('DOMContentLoaded', initAutocomplete);


document.addEventListener('DOMContentLoaded', function () {
  // Seleciona todos os botões de opção
  const opcoes = document.querySelectorAll('.opcao');

  // Adiciona um event listener para cada botão de opção
  opcoes.forEach(function (opcao) {
    opcao.addEventListener('click', function () {
      // Remove a classe 'btn-selected' de todas as opções
      opcoes.forEach(function (op) {
        op.classList.remove('btn-selected');
      });

      // Adiciona a classe 'btn-selected' à opção clicada
      this.classList.add('btn-selected');
    });
  });
});
