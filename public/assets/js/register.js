// Seleciona todos os botões de opção
var opcoes = document.querySelectorAll('.opcao');
let selectedType = '';
let identificacao;
let email;
let nome;
let password;
let localizacao;

$(document).ready(function () {


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


// Função para exibir mensagens de erro com Toastr
function erro(mensagem) {
    toastr.options.timeOut = 4000; // 4 segundos
    toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
    toastr.error(mensagem);
}

// Função para validar o formato do email
function validarEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

// Função para verificar se o nome contém apenas números
function nomeSoTemNumeros(nome) {
    const re = /^\d+$/;
    return re.test(nome);
}

function validarSenha(password) {
    // Critérios de validação:
    // 1. Mínimo de 8 caracteres
    // 2. Pelo menos um número
    // 3. Pelo menos um caractere especial (incluindo o ponto)
    const re = /^(?=.*\d)(?=.*[@$!%*?&.]).{8,}$/;
    return re.test(password);
}

function verificaModal() {

    identificacao = document.getElementById('identity').value.trim();
    email = document.getElementById('email').value.trim();
    nome = document.getElementById('name').value.trim();
    password = document.getElementById('password').value.trim();
    localizacao = document.getElementById('autocomplete').value.trim();

    if (!identificacao || !email || !nome || !password || !localizacao) {
        erro('Por favor, preencha todos os campos.');
        return;
    }

    if (!validarEmail(email)) {
        erro('Por favor, insira um email válido.');
        return;
    }

    if (nomeSoTemNumeros(nome)) {
        erro('O nome não pode conter apenas números.');
        return;
    }

    if (!validarSenha(password)) {
        erro("A senha deve ter pelo menos 8 caracteres, incluindo pelo menos um número e um caractere especial.");
        return;
    }

    $('#exampleModal').modal('show');
}

function submitForm()
{
    
  
    console.log('Email:', email);
    console.log('Password:', password);
    console.log('nome:', nome);
    console.log('identificacao:', identificacao);
    console.log('localizacao:', localizacao);
    console.log('selectedType:', selectedType);
  
    $.ajax({
      type: "POST",
      url: "../src/Handlers/register.php",
      data: {
        identificacao: identificacao,
        email: email,
        nome: nome,
        password: password,
        localizacao: localizacao,
        selectedType: selectedType
      },
      success: function (result) {
        if (result == 1)
            {
          window.location.href = "login.php";
        } else if (result == 2){
            erro('Email já existe!');
        } else if (result == 3) {
            erro('Identificação já em uso!');
        } else if (result == 4) {
            erro("Diretório criado com sucesso em $diretorio");
        } else if (result == 5) {
            erro("Erro ao criar diretório");
        } else if (result == 6) {
            erro('ja existe');
        }
      },
      error: function (xhr, status, error) {
        console.error('Erro na requisição AJAX:', error);
      }
    });
}

document.getElementById('olho').addEventListener('mousedown', function () {
    document.getElementById('password').type = 'text';
});

document.getElementById('olho').addEventListener('mouseup', function () {
    document.getElementById('password').type = 'password';
});

// Para que o password não fique exposto apos mover a imagem.
document.getElementById('olho').addEventListener('mousemove', function () {
    document.getElementById('password').type = 'password';
});