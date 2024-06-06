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



let map; // Variável global para armazenar o objeto do mapa

function initMap() {
    const autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('endereco'), {
        types: ['geocode']
    }
    );

    autocomplete.addListener('place_changed', function () {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            console.log("Endereço não encontrado.");
            return;
        }

        // Mostrar o mapa com a localização selecionada
        exibirMapa(place.geometry.location);
    });
}



function exibirMapa(location) {
    if (!map) {
        // Criar um novo mapa se ainda não existir
        map = new google.maps.Map(document.getElementById('mapa'), {
            center: location,
            zoom: 15,
            mapTypeId: 'satellite', // Definir o tipo de mapa para satélite
            streetViewControl: false // Desabilitar o controle do Street View
        });
    } else {
        // Atualizar o centro do mapa para a nova localização
        map.setCenter(location);
    }

    // Adicionar um marcador no mapa
    new google.maps.Marker({
        position: location,
        map: map
    });
}


function loadGoogleMapsScript() {
    const script = document.createElement('script');
    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyARtHqWhhONSQVfBMlIV4SMerzDmSTDf4o&libraries=places&callback=initMap';
    script.defer = true;
    script.async = true;
    document.head.appendChild(script);
}


// Carregar a API do Google Maps quando a página for totalmente carregada
window.onload = loadGoogleMapsScript;



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


function guardarimagens() {
    // Coloque aqui o código que deseja executar quando o botão for clicado
    console.log("Botão 'Confirmar' clicado!");
    // Por exemplo, você pode fechar a modal se necessário

    // Função para mostrar a mensagem de sucesso
    alteradocomsucesso();
}

function guardarprivacidade() {
    // Coloque aqui o código que deseja executar quando o botão for clicado
    console.log("Botão 'Confirmar' clicado!");
    // Por exemplo, você pode fechar a modal se necessário

    // Função para mostrar a mensagem de sucesso
    alteradocomsucesso();
}



$(document).ready(function () {
    $('#email').on('input', function () {
        var id_name = $(this).val().trim();

        // Limpar o datalist antes de atualizar com novas opções
        $('#emails').empty();

        // Enviar requisição AJAX apenas se o campo não estiver vazio
        if (id_name !== '') {
            $.ajax({
                url: '../../public/pesquisar.php',
                type: 'POST',
                data: {
                    id_name: id_name
                },
                success: function (response) {
                    console.log('Resposta do servidor:', response);

                    try {
                        // Tentar converter response para JSON se necessário
                        if (typeof response === 'string') {
                            response = JSON.parse(response);
                        }

                        if (Array.isArray(response)) {
                            $('#emails').empty(); // Limpar opções anteriores

                            response.forEach(function (item) {
                                var option = $('<option value="' + item.id_name + '">' + item.name + '</option>');
                                $('#emails').append(option);
                            });
                        } else {
                            console.error('Resposta não é um array:', response);
                        }
                    } catch (error) {
                        console.error('Erro ao manipular JSON:', error);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Erro na requisição AJAX:', error);
                }
            });
        }
    });

    // Evento quando uma opção do datalist é selecionada
    $('#email').on('change', function () {
        var selectedIdName = $(this).val().trim();
        adicionarNome(selectedIdName); // Adicionar o id_name à lista
        $(this).val(''); // Limpar o campo de texto
    });

    // Evento quando o botão "Adicionar" é clicado
    $('#btnAdicionar').on('click', function () {
        var selectedIdName = $('#email').val().trim();
        adicionarNome(selectedIdName); // Adicionar o id_name à lista
        $('#email').val(''); // Limpar o campo de texto
    });

    // Função para adicionar o id_name à lista
    function adicionarNome(id_name) {

        id_name = id_name.toLowerCase();

        if (id_name === '') {
            return; // Não adiciona se o id_name estiver vazio
        }

        // Verifica se o id_name já está na lista
        if ($('#listaNomes').find('li').filter(function () {
            return $(this).find('p').text().trim() === id_name;
        }).length > 0) {
            erro('Conta já inserida!');
            return;
        }

        // Limitar o número máximo de usuários na lista
        if ($('#listaNomes').children().length >= 10) {
            erro('Limite máximo de 10 utilizadores atingido!');
            return;
        }

        // Verifica se o id_name existe na base de dados
        $.ajax({
            url: '../../public/verificar_email.php', // Caminho para o arquivo PHP
            type: 'POST',
            data: {
                id_name: id_name
            },
            success: function (response) {
                if (typeof response === 'string') {
                    response = JSON.parse(response);
                }

                if (response.status === 'valid') {
                    // Criar e adicionar um novo item à lista de nomes com os dados do usuário
                    var listItem = `
                    <li class="list-group-item pt-0 pb-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <img src="${response.picture}" alt="" class="avatar rounded-circle my-auto" style="width: 45px; height: 45px;">
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 text-sm">${response.name}</h6>
                                <p class="mb-0 text-muted text-xs">${id_name}</p>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <button class="btn btn-md my-auto btn-danger" onclick="removerNome(this, event)">Remover</button>
                            </div>
                        </div>
                    </li>
                `;

                    // Adicionar o novo item à lista apenas se não existir na lista
                    if ($('#listaNomes').find('li').filter(function () {
                        return $(this).find('p').text().trim() === id_name;
                    }).length === 0) {
                        $('#listaNomes').append(listItem);
                        numUsuarios++;
                        var boxcomnomes = document.getElementById('boxcomnomes');
                        boxcomnomes.classList.remove('d-none');
                    } else {
                        erro('Conta já inserida!');
                    }
                } else {
                    erro('Conta inserida não existe!');
                }
            },
            error: function (xhr, status, error) {
                console.error('Erro na verificação de id_name:', error);
            }
        });
    }

});


function updateData(var1, var2) {
    $.ajax({
        url: '../../src/Handlers/getEditarImagens.php',
        method: 'GET',
        data: { var1: var1, var2: var2 }, // Passando variáveis na requisição
        success: function(data){
            $('#imageContainer' + var1).html(data);

        },
        error: function(xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}
