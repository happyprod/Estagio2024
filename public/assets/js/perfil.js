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


var map, autocomplete;

function initMap() {
    const mapaDiv = document.getElementById('mapa');
    map = new google.maps.Map(mapaDiv, {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 15,
        mapTypeId: 'satellite', // Definir o tipo de mapa para satélite
        streetViewControl: false // Desabilitar o controle do Street View
    });

    // Inicializar o Autocomplete
    const inputEndereco = document.getElementById('endereco');
    autocomplete = new google.maps.places.Autocomplete(inputEndereco);
    autocomplete.bindTo('bounds', map);

    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            // Caso o usuário tenha inserido um lugar sem selecionar uma sugestão
            erro("Por favor, selecione um lugar das sugeridas.");
            return;
        }
        exibirMapa(place.geometry.location);
    });

    geocodeAddress(); // Geocodificar o endereço inicial
}

function geocodeAddress() {
    const address = document.getElementById('endereco').value;
    if (address) {
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status === 'OK') {
                exibirMapa(results[0].geometry.location);
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
}

function exibirMapa(location) {
    if (map) {
        // Atualizar o centro do mapa para a nova localização
        map.setCenter(location);

        // Adicionar um marcador no mapa
        new google.maps.Marker({
            position: location,
            map: map
        });
    } else {
        console.error('O mapa não foi inicializado corretamente.');
    }
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

function updateDataInfo(var1, var2, var3) {
    $.ajax({
        url: '../../src/Handlers/getAlterarInfo.php',
        method: 'GET',
        data: { var1: var1, var2: var2, var3: var3 }, // Passando variáveis na requisição
        success: function (data) {
            $('#alterarInfo' + var1).html(data);

            // Verificar se a div do mapa foi atualizada
            if (document.getElementById('mapa')) {
                loadGoogleMapsScript();
            }
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}



function alteradocomsucesso() {
    toastr.options.timeOut = 10000; // 10 segundos
    toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
    toastr.success('Alterado com sucesso');
}

function sucesso(mensagem) {
    toastr.options.timeOut = 10000; // 10 segundos
    toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
    toastr.success(mensagem);
}

function erro(mensagem) {
    toastr.options.timeOut = 10000; // 10 segundos
    toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
    toastr.error(mensagem);
}

function guardarprivacidade() {
    // Coloque aqui o código que deseja executar quando o botão for clicado
    console.log("Botão 'Confirmar' clicado!");
    // Por exemplo, você pode fechar a modal se necessário

    // Função para mostrar a mensagem de sucesso
    alteradocomsucesso();
}

function colaboradoresComplete() {
    var id_name = $('#email').val().trim();

    // Limpar o datalist antes de atualizar com novas opções
    $('#emails').empty();

    // Enviar requisição AJAX apenas se o campo não estiver vazio
    if (id_name !== '') {
        $.ajax({
            url: '../../src/Handlers/colaboradoresComplete.php',
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
                            var option = $('<option>').val(item.id_name).text(item.name);
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
}

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
                                <img src="${response.picture}" alt="" class="avatar rounded-circle img-fluid my-auto" style="object-fit: cover; width: 45px; height: 45px;">
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 text-sm">${response.name}</h6>
                                <p class="mb-0 text-muted text-xs" id="idNameUser">${id_name}</p>
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

function bookingComplete() {
    var id_name = $('#bookinginput').val().trim();

    // Clear the datalist before updating with new options
    $('#bookinginputs').empty();

    // Send AJAX request only if the field is not empty
    if (id_name !== '') {
        $.ajax({
            url: '../../src/Handlers/bookingComplete.php',
            type: 'POST',
            data: { id_name: id_name },
            success: function (response) {
                console.log('Resposta do servidor:', response);

                try {
                    // Try to parse response to JSON if necessary
                    if (typeof response === 'string') {
                        response = JSON.parse(response);
                    }

                    if (Array.isArray(response)) {
                        response.forEach(function (item) {
                            var option = $('<option>').val(item.id_name).text(item.name);
                            $('#bookinginputs').append(option);
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
}

function EventosComplete() {
    var id_name = $('#eventoInput').val().trim();

    // Clear the datalist before updating with new options
    $('#eventoInputs').empty();

    // Send AJAX request only if the field is not empty
    if (id_name !== '') {
        $.ajax({
            url: '../../src/Handlers/eventosComplete.php',
            type: 'POST',
            data: { id_name: id_name },
            success: function (response) {
                console.log('Resposta do servidor:', response);

                try {
                    // Try to parse response to JSON if necessary
                    if (typeof response === 'string') {
                        response = JSON.parse(response);
                    }

                    if (Array.isArray(response)) {
                        response.forEach(function (item) {
                            var option = $('<option>').val(item.id_name).text(item.name);
                            $('#eventoInputs').append(option);
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
}

function updateData(var1, var2, var3) {
    var elementsWithDataId;
    $.ajax({
        url: '../../src/Handlers/getEditarImagens.php',
        method: 'GET',
        data: { var1: var1, var2: var2, var3: var3 }, // Passando variáveis na requisição
        success: function (data) {
            $('#imageContainer' + var1).html(data);

        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}


function follow(var1) {
    var elementsWithDataId;
    $.ajax({
        url: '../../src/Handlers/Follow.php',
        method: 'GET',
        data: { var1: var1 }, // Passando variáveis na requisição
        success: function (data) {
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}

function updateDataProjetos(var1, var2) {
    var elementsWithDataId;
    $.ajax({
        url: '../../src/Handlers/getProjetos.php',
        method: 'GET',
        data: { var1: var1, var2: var2 }, // Passando variáveis na requisição
        success: function (data) {
            $('#projectContainer' + var2).html(data);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}

function guardarSobre(id_projeto) {
    var nomeEvento = document.getElementById("exampleFormControlInput1")?.value || '';
    var identificacaoEvento = document.getElementById("eventoInput")?.value || '';
    var descricao = document.getElementById("exampleFormControlTextarea1")?.value || '';
    var data = document.getElementById("example-date-input")?.value || '';
    var empresaBooking = document.getElementById("bookinginput")?.value || '';
    var localizacao = document.getElementById("endereco")?.value || '';

    var switchEvento = document.getElementById("switchEvento")?.checked || false;
    var switchData = document.getElementById("switchData")?.checked || false;
    var switchBooking = document.getElementById("switchBooking")?.checked || false;
    var switchLocal = document.getElementById("switchLocal")?.checked || false;
    var switchCollabs = document.getElementById("switchCollabs")?.checked || false;

    var arrayC_idName = [];
    var elementosC_idName = document.querySelectorAll('#idNameUser');
    elementosC_idName.forEach(function (elemento) {
        arrayC_idName.push(elemento.textContent.trim());
    });

    var xhr = new XMLHttpRequest();
    var url = "../../src/Handlers/guardarEvento.php";
    var params = "nomeEvento=" + encodeURIComponent(nomeEvento) +
        "&identificacaoEvento=" + encodeURIComponent(identificacaoEvento) +
        "&descricao=" + encodeURIComponent(descricao) +
        "&data=" + encodeURIComponent(data) +
        "&empresaBooking=" + encodeURIComponent(empresaBooking) +
        "&localizacao=" + encodeURIComponent(localizacao) +
        "&switchEvento=" + encodeURIComponent(switchEvento) +
        "&switchData=" + encodeURIComponent(switchData) +
        "&switchBooking=" + encodeURIComponent(switchBooking) +
        "&switchLocal=" + encodeURIComponent(switchLocal) +
        "&id_projeto=" + encodeURIComponent(id_projeto) +
        "&switchCollabs=" + encodeURIComponent(switchCollabs) +
        "&arrayC_idName=" + encodeURIComponent(JSON.stringify(arrayC_idName));

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                if (xhr.responseText == 'Evento') {
                    erro("Evento ou booking não existe.");
                } else if (xhr.responseText == 'Data') {
                    erro("Data não suportada!");
                }
            } else {
                console.error("Erro na requisição: " + xhr.status);
            }
        }
    };
    xhr.send(params);
}


function toggleText(element) {
    // Encontra os elementos dentro do contêiner do botão clicado
    var container = element.closest('.text-container');
    var shortText = container.querySelector('.short-text');
    var moreText = container.querySelector('.more-text');

    // Se o texto curto está visível, mostra o texto completo e oculta o curto
    if (shortText.classList.contains('d-none')) {
        shortText.classList.remove('d-none');
        moreText.classList.add('d-none');

        // Altera o texto do botão de volta para "ver mais"
        element.textContent = 'Ver mais';
    } else {
        // Se o texto curto está oculto, mostra o texto curto e oculta o completo
        shortText.classList.add('d-none');
        moreText.classList.remove('d-none');

        // Altera o texto do botão para "ver menos"
        element.textContent = 'Ver menos';
    }
}

function toggleColorLike(button) {
    // Seleciona o ícone dentro do botão
    var icon = button.querySelector('i');

    // Verifica a classe atual do ícone
    if (icon.classList.contains('text-secondary')) {
        // Se atualmente é text-secondary, troca para text-primary
        icon.classList.remove('text-secondary');
        icon.classList.add('text-primary');
    } else {
        // Se não, troca para text-secondary
        icon.classList.remove('text-primary');
        icon.classList.add('text-secondary');
    }
}

function guardarLike(id_comentario, button) {
    // Supondo que você tenha uma maneira de obter o novo número de gostos
    var likesElement = document.getElementById('likes-' + id_comentario);
    var currentLikes = parseInt(likesElement.innerText.split(' ')[0]); // Obtém o número atual de gostos
    // Seleciona o ícone dentro do botão
    var icon = button.querySelector('i');

    // Verifica a classe atual do ícone
    if (icon.classList.contains('text-secondary')) {
        var newLikes = currentLikes - 1;

        $.ajax({
            url: '../../src/Handlers/guardarComentarioLike.php',
            method: 'GET',
            data: { var1: id_comentario, var2: 1 }, // Passando variáveis na requisição
            success: function (data) {
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.error('Erro ao obter dados:', error);
            }
        });
    } else {
        var newLikes = currentLikes + 1;

        $.ajax({
            url: '../../src/Handlers/guardarComentarioLike.php',
            method: 'GET',
            data: { var1: id_comentario, var2: 2 }, // Passando variáveis na requisição
            success: function (data) {
                console.log(data);
    
            },
            error: function (xhr, status, error) {
                console.error('Erro ao obter dados:', error);
            }
        });
    }

    // Atualiza o texto do botão
    likesElement.innerText = newLikes + ' Gostos';

    // Aqui você pode adicionar qualquer lógica adicional, como enviar o novo número de gostos para o servidor
}


function guardarProjectLike(id_projeto, button) {
    // Supondo que você tenha uma maneira de obter o novo número de gostos
    var likesElement = document.getElementById('Projeto-' + id_projeto);
    var currentLikes = parseInt(likesElement.innerText.split(' ')[0]); // Obtém o número atual de gostos
    // Seleciona o ícone dentro do botão
    var icon = button.querySelector('i');

    // Verifica a classe atual do ícone
    if (icon.classList.contains('text-secondary')) {
        var newLikes = currentLikes - 1;

        $.ajax({
            url: '../../src/Handlers/guardarProjetoLike.php',
            method: 'GET',
            data: { var1: id_projeto, var2: 1 }, // Passando variáveis na requisição
            success: function (data) {
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.error('Erro ao obter dados:', error);
            }
        });
    } else {
        var newLikes = currentLikes + 1;

        $.ajax({
            url: '../../src/Handlers/guardarProjetoLike.php',
            method: 'GET',
            data: { var1: id_projeto, var2: 2 }, // Passando variáveis na requisição
            success: function (data) {
                console.log(data);
    
            },
            error: function (xhr, status, error) {
                console.error('Erro ao obter dados:', error);
            }
        });
    }

    // Atualiza o texto do botão
    likesElement.innerText = newLikes + ' Gostos';

    // Aqui você pode adicionar qualquer lógica adicional, como enviar o novo número de gostos para o servidor
}




function guardarProjectLike2(id_projeto, button) {
    // Seleciona o ícone dentro do botão
    var icon = button.querySelector('i');

    // Verifica a classe atual do ícone
    if (icon.classList.contains('text-secondary')) {
        $.ajax({
            url: '../../src/Handlers/guardarProjetoLike.php',
            method: 'GET',
            data: { var1: id_projeto, var2: 1 }, // Passando variáveis na requisição
            success: function (data) {
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.error('Erro ao obter dados:', error);
            }
        });
    } else {

        $.ajax({
            url: '../../src/Handlers/guardarProjetoLike.php',
            method: 'GET',
            data: { var1: id_projeto, var2: 2 }, // Passando variáveis na requisição
            success: function (data) {
                console.log(data);
    
            },
            error: function (xhr, status, error) {
                console.error('Erro ao obter dados:', error);
            }
        });
    }

    // Aqui você pode adicionar qualquer lógica adicional, como enviar o novo número de gostos para o servidor
}


function guardarLikeProjeto(projeto_id, button) {
    // Supondo que você tenha uma maneira de obter o novo número de gostos
    var likesElement = document.getElementById('Projeto-' + projeto_id);
    var currentLikes = parseInt(likesElement.innerText.split(' ')[0]); // Obtém o número atual de gostos
    // Seleciona o ícone dentro do botão
    var icon = button.querySelector('i');

    // Verifica a classe atual do ícone
    if (icon.classList.contains('text-secondary')) {
        var newLikes = currentLikes - 1;
    } else {
        var newLikes = currentLikes + 1;
    }

    // Atualiza o texto do botão
    likesElement.innerText = newLikes + ' Gostos';

    // Aqui você pode adicionar qualquer lógica adicional, como enviar o novo número de gostos para o servidor
}

function toggleResponses(containerId) {
    var container = document.getElementById(containerId);
    if (container.style.display === 'none') {
        container.style.display = 'block';
        // Alterar texto para "Esconder Respostas" após mostrar
        container.previousElementSibling.querySelector('p').innerText = "Esconder Respostas";
    } else {
        container.style.display = 'none';
        // Alterar texto para "Mostrar Respostas" após esconder
        container.previousElementSibling.querySelector('p').innerText = "Mostrar Respostas";
    }
}



var resposta;
var respostaName;

function CommentReply(id, name, chatid) {
    resposta = id;
    var chat = document.getElementById('chat' + chatid);
    console.log(id, name);
    if (chat) {
        chat.value = name + ' ';
        respostaName = name;
    }
}

function CommentSend(chatid, p_id) {
    var chat = document.getElementById('chat' + chatid);

    if (chat) {
        var text = chat.value;

        if (text != '') {
            // Verifica se o texto começa com "respostaName" e a resposta não é igual a 0
            if (text.startsWith(respostaName)) {
                //executar para parent message
                text = text.replace(respostaName, '').trim();

                $.ajax({
                    url: '../../src/Handlers/guardarComentarios.php',
                    method: 'GET',
                    data: { var1: p_id, var2: text, var3: resposta }, // Passando variáveis na requisição
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (xhr, status, error) {
                        console.error('Erro ao obter dados:', error);
                    }
                });

            } else {
                resposta = 0;

                console.log(p_id, text);
                $.ajax({
                    url: '../../src/Handlers/guardarComentarios.php',
                    method: 'GET',
                    data: { var1: p_id, var2: text }, // Passando variáveis na requisição
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (xhr, status, error) {
                        console.error('Erro ao obter dados:', error);
                    }
                });
            }

            console.log(text, resposta, respostaName);
            chat.value = '';
            sucesso('Comentado com sucesso');
            updateDataProjetos(p_id, chatid);
        } else {
            erro('Não pode estar vazio...');
        }
    }
}

function alterarElementos(count) {
    // Referência aos elementos
    const divComentarios = document.getElementById('divComentarios' + count);
    const divDescricao = document.getElementById('divDescricao' + count);
    const separator = document.getElementById('separator' + count);
    const pDescricao = document.getElementById('pDescricao' + count);
    const alterarElementos = document.getElementById('alterarElementos' + count);
    const collabs = document.getElementById('collabs' + count);
    // Verifica se os elementos estão no estado inicial ou alterado
    const isAlterado = divComentarios.classList.contains('d-none');

    if (isAlterado) {
        // Reverter para o estado inicial
        divComentarios.classList.remove('d-none');
        divDescricao.classList.remove('overflow-auto');
        divDescricao.style.height = '';
        separator.classList.remove('d-none');
        collabs.classList.add('d-none');
        pDescricao.style.height = '40px';
        pDescricao.style.overflow = 'hidden';
        pDescricao.style.textOverflow = 'ellipsis';
        pDescricao.style.display = '-webkit-box';
        pDescricao.style.webkitLineClamp = '2';
        pDescricao.style.webkitBoxOrient = 'vertical';
        alterarElementos.innerHTML = 'Ver Mais';
    } else {
        // Aplicar as alterações
        divComentarios.classList.add('d-none');
        divDescricao.classList.add('overflow-auto');
        divDescricao.style.height = '280px';
        separator.classList.add('d-none');
        pDescricao.style.height = 'auto';
        pDescricao.style.textOverflow = 'unset';
        pDescricao.style.display = 'block';
        collabs.classList.remove('d-none');
        pDescricao.style.webkitLineClamp = 'unset';
        pDescricao.style.webkitBoxOrient = 'unset';
        alterarElementos.innerHTML = 'Ver Menos';
    }
}


