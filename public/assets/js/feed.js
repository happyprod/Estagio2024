let offset = 0;
const limit = 2;

function loadProjects() {
    $('#loader').show();
    $.get('../src/Handlers/get_projects.php', { offset: offset }, function (data) {
        const projects = JSON.parse(data);
        if (projects.length > 0) {
            projects.forEach(project => {
                const local = project.local;
                const link = local
                    ? `- <a target="_blank" href="https://www.google.pt/maps/search/${local}.php">${local}</a>`
                    : ``;


                var flag = '';

                if (project.imageNum === 1) {
                    flag = ' d-none'; // Hide buttons if only one image
                }
                // Supondo que `project` seja um objeto de projeto que contém a propriedade `p_like`
                flag2 = project.p_like;




                $('#projects-container').append(`
                    <div class="p-3 shadow bg-white mx-auto justify-content-center mt-4" style="width: 550px; border-radius: 2.5%;">
                        <div class="card card-blog card-plain">
                        <div class="me-auto w-100" style="margin-bottom: 0.85em;">
                            <div class="row">
                                <div class="col-2">
                                    <img src="${project.picture}" style="width: 50px; height: 50px; object-fit: cover; background-position-y: 50%;" class="rounded-circle img-fluid">
                                </div>    
                                <div class="col-10" style="margin-top: 0px; text-align: left; padding: 0; margin: 0;">
                                    <a href="utilizadores/${project.user_id}.php">
                                        <h6 class="title mb-0" style="font-size: 14px;">@${project.id_name}</h6>
                                    </a>
                                    <p class="text-muted mb-0 text-sm" style="font-size: 11px; margin: 0;">
                                        <strong> ${project.name} </strong>
                                        ${link}
                                    </p>
                                </div>
                            </div>    
                        </div>
                            <div class="position-relative">
                                <div class="w-100 d-block shadow-sm border-radius-xl" style="border-radius: 5%;">


                                    <!-- Main Carousel -->
                                    <div id="carousell${offset + projects.indexOf(project) + 1}" class="carousel slide border-radius-xl w-100 h-100" data-interval="false">
                                    <div class="carousel-inner w-100 h-100">';
                                    ${project.image}
                                    </div>

                                    <button class="carousel-control-prev ${flag}" type="button" data-bs-target="#carousell${offset + projects.indexOf(project) + 1}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                    </button>

                                    <button class="carousel-control-next ${flag}" type="button" data-bs-target="#carousell${offset + projects.indexOf(project) + 1}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                    </button>    
                                    </div>
                                </div>
                            </div>
                            <div class="w-100 text-bottom text-left ms-1 mt-2">
                                <button onclick="guardarProjectLike2(${project.id}, this)" style="border: 0px; background-color: white !important;">
                                    ${flag2}
                                </button>

                                <button class="${project.comments_count == 0 ? 'd-none ' : ''}" data-bs-toggle="modal" onclick="updateDataProjetos(${project.id}, ${offset + projects.indexOf(project) + 1})" data-bs-target="#modal-default${offset + projects.indexOf(project) + 1}" style="border: 0px; background-color: white !important;">
                                    <i class="bi bi-chat-left-text" style="font-size: 24px;"></i>
                                </button>
                            </div>
                            <div class="${project.likes_count == 0 ? 'd-none ' : ''}me-auto mt-2 ms-2" style="height: 20px;">
                                <p class="mb-4 text-sm" style="height: 30px;"><strong id="fGostos${project.id}">${project.likes_count}</strong> Gostos</p>
                            </div>

                            <div class="d-inline text-left ms-2">
                                <a href="utilizadores/${project.user_id}.php">  
                                    <h6 class="title text-justify mb-0" style="font-size: 15px; width: 97%; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">@${project.id_name}</a> <p class="mb-4 text-sm d-inline" style="height: 30px;">${project.description}</p></h6>        
                                    <h6 class="${project.comments_count == 0 ? 'd-none ' : ''} title text-justify mb-0" style="font-size: 14px;">${project.comments_count} comentários</h6>                        
                            </div>
                            <div class="card-body px-1 pb-0">
                            <button class="w-100" style="border: 0px; background-color: white !important;" data-bs-toggle="modal" onclick="updateDataProjetos(${project.id}, ${offset + projects.indexOf(project) + 1})" data-bs-target="#modal-default${offset + projects.indexOf(project) + 1}">
                                <h6 class="title mb-0" style="font-size: 14px;">Ver Mais</h6>
                            </button>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="w-100">
                                            <div class="modal fade" id="modal-default${offset + projects.indexOf(project) + 1}" tabindex="-1" role="dialog" aria-labelledby="modal-default${offset + projects.indexOf(project) + 1}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                <div class="modal-content">

                                    <div class="modal-body p-0" style="height: 550px;" id="projectContainer${offset + projects.indexOf(project) + 1}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                            
                `);

            });
            offset += limit;
        }
        $('#loader').hide();
    });
}


// Carrega os projetos iniciais
loadProjects();

// Detecta quando o usuário rola até o fim da página
$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
        loadProjects();
    }
});

function sucesso(mensagem) {
    toastr.options.timeOut = 10000; // 10 segundos
    toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
    toastr.success(mensagem);
}


function updateDataProjetos(var1, var2) {
    var elementsWithDataId;
    $.ajax({
        url: '../src/Handlers/getProjetosFeed.php',
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
            url: '../src/Handlers/guardarComentarioLike.php',
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
            url: '../src/Handlers/guardarComentarioLike.php',
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
    // Obtém o elemento que mostra o número de gostos
    var likesElement = document.getElementById('Projeto-' + id_projeto);
    var fGostos = document.getElementById('fGostos' + id_projeto);
    console.log(fGostos);

    // Verifica se o elemento de gostos existe
    if (likesElement) {
        var currentLikes = parseInt(likesElement.innerText.split(' ')[0]); // Obtém o número atual de gostos
    } else {
        console.warn('Elemento likes não encontrado para o id_projeto:', id_projeto);
    }

    // Seleciona o ícone dentro do botão
    var icon = button.querySelector('i');

    // Inicializa a variável newLikes
    var newLikes;

    // Verifica a classe atual do ícone para determinar se é um like ou um dislike
    if (icon.classList.contains('text-secondary')) {
        newLikes = currentLikes - 1;

        // Atualiza o valor do input hidden fGostos se existir
        if (fGostos) {
            fGostos.textContent = newLikes;
        }

        // Faz uma requisição AJAX para atualizar o like no servidor
        $.ajax({
            url: '../src/Handlers/guardarProjetoLike.php',
            method: 'GET',
            data: { var1: id_projeto, var2: 1 }, // Passa variáveis na requisição
            success: function (data) {
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.error('Erro ao obter dados:', error);
            }
        });
    } else {
        newLikes = currentLikes + 1;

        // Atualiza o valor do input hidden fGostos se existir
        if (fGostos) {
            fGostos.textContent = newLikes;
        }

        // Faz uma requisição AJAX para atualizar o like no servidor
        $.ajax({
            url: '../src/Handlers/guardarProjetoLike.php',
            method: 'GET',
            data: { var1: id_projeto, var2: 2 }, // Passa variáveis na requisição
            success: function (data) {
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.error('Erro ao obter dados:', error);
            }
        });
    }

    // Atualiza o texto do elemento likesElement com o novo número de gostos
    if (likesElement) {
        likesElement.innerText = newLikes + ' Gostos';
    }
    // Atualiza o valor do input hidden fGostos se existir
    if (fGostos) {
        fGostos.value = newLikes;
    }

    // Aqui você pode adicionar qualquer lógica adicional, como enviar o novo número de gostos para o servidor
}




function guardarProjectLike2(id_projeto, button) {
    // Obtém o elemento que mostra o número de gostos
    var fGostos = document.getElementById('fGostos' + id_projeto);

    // Seleciona o ícone dentro do botão
    var icon = button.querySelector('i');

    // Inicializa a variável newLikes
    var newLikes;

    // Verifica a classe atual do ícone para determinar se é um like ou um dislike
    if (icon.classList.contains('ni-favourite-28')) {
        newLikes = parseInt(fGostos.textContent) - 1;

        // Atualiza o valor do input hidden fGostos se existir
        if (fGostos) {
            fGostos.textContent = newLikes;
        }

        // Atualiza a classe e o estilo do ícone
        icon.className = 'bi bi-heart';
        icon.style.fontSize = '24px';

        // Faz uma requisição AJAX para atualizar o like no servidor
        $.ajax({
            url: '../src/Handlers/guardarProjetoLike.php',
            method: 'GET',
            data: { var1: id_projeto, var2: 1 }, // Passa variáveis na requisição
            success: function (data) {
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.error('Erro ao obter dados:', error);
            }
        });
    } else {
        newLikes = parseInt(fGostos.textContent) + 1;

        // Atualiza o valor do input hidden fGostos se existir
        if (fGostos) {
            fGostos.textContent = newLikes;
        }

        // Atualiza a classe e o estilo do ícone
        icon.className = 'ni ni-favourite-28 text-primary mt-2';
        icon.style.fontSize = '22px';

        // Faz uma requisição AJAX para atualizar o like no servidor
        $.ajax({
            url: '../src/Handlers/guardarProjetoLike.php',
            method: 'GET',
            data: { var1: id_projeto, var2: 2 }, // Passa variáveis na requisição
            success: function (data) {
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.error('Erro ao obter dados:', error);
            }
        });
    }
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
                    url: '../src/Handlers/guardarComentarios.php',
                    method: 'GET',
                    data: { var1: p_id, var2: text, var3: resposta }, // Passando variáveis na requisição
                    success: function (data) {
                        updateDataProjetos(p_id, p_id);
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
                    url: '../src/Handlers/guardarComentarios.php',
                    method: 'GET',
                    data: { var1: p_id, var2: text }, // Passando variáveis na requisição
                    success: function (data) {
                        updateDataProjetos(p_id, p_id);
                        console.log(data);
                    },
                    error: function (xhr, status, error) {
                        console.error('Erro ao obter dados:', error);
                    }
                });
            }

            console.log(text, resposta, respostaName);
            chat.value = '';
            updateDataProjetos(p_id, chatid);
            sucesso('Comentado com sucesso');
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




function follow(element) {
    var elementId = element.id;
    // Usa uma expressão regular para extrair o número do id
    var idUtilizador = elementId.match(/\d+/)[0];

    console.log(idUtilizador); // Mostra o valor de count no console (para verificar)

    var img = element.querySelector('img');
    img.classList.add('hidden');

    setTimeout(function () {
        if (img.src.includes('remover-amigo.png')) {
            $.ajax({
                url: '../src/Handlers/guardarFollow.php',
                method: 'GET',
                data: { var1: idUtilizador, var2: 1 }, // Passando variáveis na requisição
                success: function (data) {
                    img.src = 'img/adicionar-amigo.png';
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.error('Erro ao obter dados:', error);
                }
            });
        } else {
            $.ajax({
                url: '../src/Handlers/guardarFollow.php',
                method: 'GET',
                data: { var1: idUtilizador, var2: 2 }, // Passando variáveis na requisição
                success: function (data) {
                    img.src = 'img/remover-amigo.png';
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.error('Erro ao obter dados:', error);
                }
            });
        }
        img.classList.remove('hidden');
    }, 500); // O tempo deve corresponder ao tempo de transição em CSS
}
