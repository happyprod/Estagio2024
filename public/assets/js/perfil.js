$(document).ready(function () {
    // Função para verificar e ajustar o texto conforme necessário
    $('.comentario').each(function () {
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

function alterarperfilon() {
    var minhaDiv = document.getElementById('perfil');
    if (minhaDiv) {
        minhaDiv.classList.add('d-none'); // Adiciona a classe d-none do Bootstrap
    }

    var perfilDiv = document.getElementById('editar');
    if (perfilDiv) {
        perfilDiv.classList.remove('d-none'); // Remove a classe d-none para mostrar o perfil
    }

    var opcao = document.getElementById('perfil_opcao');
    if (opcao) {
        opcao.classList.remove('active');
    }

    var opcao2 = document.getElementById('editar_opcao');
    if (opcao2) {
        opcao2.classList.add('active');
    }

    var opcao_submenu = document.getElementById('opcao1_submenu');
    if (opcao_submenu) {
        opcao_submenu.classList.add('active');
    }


}


function mostrarPerfil() {
    var perfilDiv = document.getElementById('perfil');
    if (perfilDiv) {
        perfilDiv.classList.remove('d-none'); // Remove a classe d-none para mostrar o perfil
    }

    var minhaDiv = document.getElementById('editar');
    if (minhaDiv) {
        minhaDiv.classList.add('d-none'); // Adiciona a classe d-none do Bootstrap
        minhaDiv.style.add
    }

    var opcao = document.getElementById('perfil_opcao');
    if (opcao) {
        opcao.classList.add('active');
    }

    var opcao2 = document.getElementById('editar_opcao');
    if (opcao2) {
        opcao2.classList.remove('active');
    }

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