$(document).ready(function () {
  let selectedType = '';

  $('#RegisterForm').submit(function (event) {
      event.preventDefault(); // Evita o envio padrão do formulário

      var email = $('#email').val();
      var password = $('#password').val();
      var identity = $('#identity').val();
      var location = $('#autocomplete').val();
      var name = $('#name').val();

      $.ajax({
          url: '../src/Handlers/RegisterArtistsProcess.php',
          type: 'POST',
          data: {
              email: email,
              password: password,
              identity: identity,
              location: location,
              name: name,
              selectedType: selectedType
          },
          success: function (response) {
              // Tratamento da resposta do servidor
              if (response.success) {
                  window.location.href = 'home.php';
              } else {
                  // Mostrar mensagem de erro usando Toastr
                  erro(response.message);
              }
          },
          error: function (jqXHR, textStatus, errorThrown) {
              // Tratamento de erros da requisição
              console.error('Erro: ' + textStatus, errorThrown);
              erro('Ocorreu um erro durante o registro. Por favor, tente novamente.');
          }
      });
  });

  // Função para exibir mensagens de erro com Toastr
  function erro(mensagem) {
      toastr.options.timeOut = 4000; // 4 segundos
      toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
      toastr.error(mensagem);
  }

  // Seleciona todos os botões de opção
  const opcoes = document.querySelectorAll('.opcao');

  // Adiciona um event listener para cada botão de opção
  opcoes.forEach(function (opcao) {
      opcao.addEventListener('click', function () {
          // Remove a classe 'btn-selected' e 'no-hover' de todas as opções
          opcoes.forEach(function (op) {
              op.classList.remove('btn-selected', 'no-hover');
          });

          // Adiciona a classe 'btn-selected' e 'no-hover' à opção clicada
          this.classList.add('btn-selected', 'no-hover');

          // Atualiza a variável selectedType com o data-type da opção clicada
          selectedType = this.getAttribute('data-type');
          console.log('Opção selecionada:', selectedType);
      });
  });

  // Função para inicializar o autocomplete do Google Maps
  function initAutocomplete() {
      var input = document.getElementById('autocomplete');
      var options = {
          types: ['geocode']
      };

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

  // Chama initAutocomplete após a página carregar completamente
  google.maps.event.addDomListener(window, 'load', initAutocomplete);
});



function verificaModal() {
  // Verifica se há campos obrigatórios não preenchidos
  var camposPreenchidos = true;
  $('input[required]').each(function () {
      if ($(this).val() === '') {
          camposPreenchidos = false;
          return false; // Para a verificação assim que encontrar um campo vazio
      }
  });

  // Se todos os campos obrigatórios estiverem preenchidos, e o email e identity não existem na base de dados, abre o modal
  if (camposPreenchidos && !emailExiste && !identityExiste) {
      $('#exampleModal').modal('show');
  }
}

var emailExiste = false; // Variável para verificar se o email existe na base de dados
var identityExiste = false; // Variável para verificar se o identity existe na base de dados

function verifica_email(e) {
  e.preventDefault();

  var email = $('#email').val();

  $.ajax({
      url: '../src/Handlers/verifica_email.php',
      type: 'POST',
      data: { email: email },
      success: function (response) {
          if (response.error) {
              // Email já existe na base de dados
              // Exibir mensagem de erro
              emailExiste = true;
          } else {
              // Email não existe na base de dados
              // Continuar com o registro
              emailExiste = false;
              verificaModal(); // Chamar a função para verificar se deve abrir o modal
          }
      }
  });
  return emailExiste;
}

function verifica_identity(e) {
  e.preventDefault();

  var identity = $('#identity').val();

  $.ajax({
      url: '../src/Handlers/verifica_identity.php',
      type: 'POST',
      data: { identity: identity },
      success: function (response) {
          if (response.error) {
              // Identity já existe na base de dados
              // Exibir mensagem de erro
              identityExiste = true;
          } else {
              // Identity não existe na base de dados
              // Continuar com o registro
              identityExiste = false;
              verificaModal(); // Chamar a função para verificar se deve abrir o modal
          }
      }
  });
  return identityExiste;
}
