function alteradocomsucesso() {
    toastr.options.timeOut = 10000; // 10 segundos
    toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
    toastr.success('Alterado com sucesso');
}

function erro(mensagem) {
    toastr.options.timeOut = 10000; // 10 segundos
    toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
    toastr.error(mensagem);
}

$(document).ready(function() {
    // Função para verificar e ajustar o texto conforme necessário
    $('.comentario').each(function() {
        var max_width = $(this).width(); // Largura do elemento <p>
        var text_width = $(this)[0].scrollWidth; // Largura real do texto dentro do elemento

        // Verifica se o texto excede a largura do elemento
        if (text_width > max_width) {
            // O texto excede a largura - ajusta adicionando "..."
            var text = $(this).text();
            while ($(this)[0].scrollWidth > max_width) {
                text = text.slice(0, -1); // Remove um caractere por vez até caber
                $(this).text(text + '...');
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var headerDiv = document.getElementById('headerDiv');
    var overlay = document.getElementById('overlay');
    var imageUpload = document.getElementById('imageUpload');

    // Adicionar evento de clique no texto "Alterar Imagem"
    overlay.addEventListener('click', function() {
        imageUpload.click(); // Quando o texto é clicado, aciona o clique no input de arquivo
    });

    // Adicionar evento de seleção de arquivo
    imageUpload.addEventListener('change', function() {
        var file = imageUpload.files[0]; // Obter o arquivo selecionado pelo usuário

        if (file) {
            var reader = new FileReader();

            // Callback executado quando a imagem é carregada
            reader.onload = function(e) {
                // Atualizar o background-image da div com a imagem carregada
                headerDiv.style.backgroundImage = 'url(' + e.target.result + ')';
            };

            // Ler o conteúdo do arquivo como URL de dados
            reader.readAsDataURL(file);
        }
    });

    // Adicionar evento de mouseover para mostrar a sobreposição
    headerDiv.addEventListener('mouseover', function() {
        overlay.style.opacity = 1; // Torna a sobreposição visível
    });

    // Adicionar evento de mouseout para ocultar a sobreposição
    headerDiv.addEventListener('mouseout', function() {
        overlay.style.opacity = 0; // Torna a sobreposição invisível novamente
    });
});


document.addEventListener('DOMContentLoaded', function() {
    var sobre_nav = document.getElementById('sobre_nav');
    sobre_nav.classList.remove('px-0');
    sobre_nav.classList.add('px-4');
});

function mostrarSobre() {
    var sobre = document.getElementById('ver_sobre');
    var projetos = document.getElementById('ver_projetos');
    var sobre_nav = document.getElementById('sobre_nav');
    var projetos_nav = document.getElementById('projetos_nav');

    console.log(sobre, projetos, 'aaaaaaaaaaaaaaaa'); // Verifique se os elementos foram corretamente obtidos

    sobre.classList.remove('d-none');
    sobre_nav.classList.add('active');

    projetos.classList.add('d-none');
    projetos_nav.classList.remove('active');

}


function mostrarProjetos() {
    var sobre = document.getElementById('ver_sobre');
    var projetos = document.getElementById('ver_projetos');
    var sobre_nav = document.getElementById('sobre_nav');
    var projetos_nav = document.getElementById('projetos_nav');

    console.log(sobre, projetos); // Verifique se os elementos foram corretamente obtidos

    sobre.classList.add('d-none');
    sobre_nav.classList.remove('active');

    projetos.classList.remove('d-none');
    projetos_nav.classList.add('active');

}

function mostrarTextoCompleto() {
    var divTexto = document.getElementById('textoDiv');
    var btnVerMais = document.getElementById('verMaisBtn');

    // Remover a limitação de altura para mostrar todo o texto
    divTexto.style.maxHeight = 'none';

    // Ocultar o botão "ver mais" após expandir o texto
    btnVerMais.style.display = 'none';
}

// Verificar se o texto na div ultrapassa a altura máxima
var divTexto = document.getElementById('textoDiv');
var btnVerMais = document.getElementById('verMaisBtn');

if (divTexto.scrollHeight > divTexto.clientHeight) {
    // Mostrar o botão "ver mais" se o texto estiver cortado
    btnVerMais.style.display = 'block';
}





document.getElementById('change-cover-photo').addEventListener('click', function() {
    document.getElementById('file-input').click();
    document.getElementById('file-input').onchange = function(event) {
        let file = event.target.files[0];
        uploadPhoto(file, 'cover');
    };
});

document.getElementById('change-profile-photo').addEventListener('click', function() {
    document.getElementById('file-input').click();
    document.getElementById('file-input').onchange = function(event) {
        let file = event.target.files[0];
        uploadPhoto(file, 'profile');
    };
});



window.onload = function() {
    // Quando a página estiver completamente carregada, esconde o spinner
    var spinnerContainer = document.querySelector('.spinner-container');
    spinnerContainer.style.display = 'none';
};


function displaySelectedImage(event, imageId) {
    const selectedFile = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(event) {
        const imgElement = document.getElementById(imageId);
        imgElement.src = event.target.result;
    }

    reader.readAsDataURL(selectedFile);
}

function uploadCoverImage() {
    document.getElementById('coverFileInput').click();
}

function uploadProfileImage() {
    document.getElementById('profileFileInput').click();
}



function guardarEditarPerfil()
{
    console.log('updatestats');
    $.ajax({
        url: '../../src/Handlers/getEditarSobre.php',
        method: 'GET',
        data: { var1: var1}, // Passando variáveis na requisição
        success: function (data) {
            $('#alterarEstatisticas' + var1).html(data);
            console.log(data);
            console.log('updasdasdasdas');
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}