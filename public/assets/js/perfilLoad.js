
$lastImageCount = 0;
var elementsWithDataId;
// Variável para contar o número de usuários na lista
var numUsuarios = 0;
$(function () {
    // Selecione todas as listas com a classe .sortable-list e inicialize o sortable para cada uma
    $(".sortable-list").each(function (index) {

        $(this).sortable({
            items: "> div:not(.fixed-item)", // Somente itens que não têm a classe .fixed-item são ordenáveis
            update: function (event, ui) {
                var order = $(this).sortable('toArray', {
                    attribute: 'data-id'
                });
                console.log("Lista " + (index + 1) + ":", order);
            }
        });
    });

    $(".sortable-list").disableSelection();
});

function guardarImagens(index) {

    console.log(index);
    var order = [];

    // Seleciona todos os elementos dentro da div com id="imageContainer + numero" que têm a classe "imageContainer"
    const imageContainers = document.querySelectorAll('#imageContainer' + index + ' .imageContainer');
//é so meter imageContainer11 nas div das imagens


    // Itera sobre cada elemento encontrado
    imageContainers.forEach(container => {
        // Encontra a tag <img> dentro do container atual
        const imgElement = container.querySelector('img');

        // Verifica se encontrou a tag <img>
        if (imgElement) {
            // Obtém o valor do atributo src e data-id
            const imgSrc = imgElement.getAttribute('src');
            const dataId = imgElement.getAttribute('data-id');

            // Cria um objeto com os valores encontrados e adiciona ao array
            order.push({
                imgSrc: imgSrc,
                dataId: dataId
            });
        }
    });

    // Verificar os dados antes de enviar
    console.log("Dados a serem enviados:", order);

    // Enviar os dados para o handler PHP usando AJAX
    $.ajax({
        url: '../../src/Handlers/guardarEditarImagens.php', // URL do seu manipulador PHP
        method: 'POST',
        data: { order: order, index: index },
        success: function (response) {
            if (response == 'erro') {
                erro("Ocorreu um erro!");
            } else {
                alteradocomsucesso("Alterado com sucesso");
            }


            console.log("Dados enviados com sucesso:", response);
        },
        error: function (xhr, status, error) {
            console.error("Erro ao enviar dados:", error);
        }
    });
}

// Função para remover um nome da lista
function removerNome(button, event) {
    console.log('Função removerNome foi chamada.');
    console.log('Evento:', event);

    // Impedir o comportamento padrão do evento (envio do formulário)
    event.preventDefault();

    // Código para remover o item da lista
    var listItem = $(button).closest('li');
    listItem.remove();

    numUsuarios--;

    if (numUsuarios == 0) {

        var boxcomnomes = document.getElementById('boxcomnomes');

        console.log('teste', numUsuarios)
    }
}


var projetos = [];
var gostos = [];
var comentarios = [];
var contador;

function inserirPrivacyProject(escolha, selectedContainer) {
    projetos[selectedContainer] = escolha;
}

function inserirPrivacyLikes(escolha, selectedContainer) {
    gostos[selectedContainer] = escolha;
}

function inserirPrivacyComments(escolha, selectedContainer) {
    comentarios[selectedContainer] = escolha;
}

function selectCard(cardId, containerSelecionado) {
    var cards = document.getElementsByClassName('card-button');
    var totalImages = 9;

    var cardbotao = cardId + '-' + containerSelecionado;
    var selectedCard = document.getElementById(cardbotao);
    var divdoscomentarios;
    var divdosgostos;

    console.log('containerSelecionado', containerSelecionado);

    console.log('ate aqui chegou!');

    // Verificando se o elemento foi encontrado
    if (selectedCard) {
        selecao = selectedCard.id;
        selecao = cardId.replace("cardButton", "");
        if (selecao <= 3) {
            projetos[containerSelecionado] = selecao;
        } else if (selecao <= 6) {
            gostos[containerSelecionado] = selecao;
        } else {
            comentarios[containerSelecionado] = selecao;
        }

        if (projetos[containerSelecionado] == 2 && gostos[containerSelecionado] == 4) {
            gostos[containerSelecionado] = 5;
        }


        if (projetos[containerSelecionado] == 2 && comentarios[containerSelecionado] == 7) {
            comentarios[containerSelecionado] = 8;
        }
    }

    // Remove 'active' class from all cards
    for (var i = 0; i < cards.length; i++) {
        cards[i].classList.remove('active');
    }

    // Add 'active' class to the selected card
    if (selectedCard) {
        selectedCard.classList.add('active');
    }

    // Reset filter for all images
    for (var i = 1; i <= totalImages; i++) {
        var image = document.getElementById("image" + i + "-" + containerSelecionado);
        if (image) {
            image.style.filter = "invert(0)";
        }


        var titulo = 'title' + i + '-' + containerSelecionado;
        var tituloname = document.getElementById(titulo);

        if (tituloname) {
            if (cardbotao != titulo) {
                console.log('titulo: ' + titulo);
                tituloname.style.color = "black";
            }
        }
    }

    if (projetos[containerSelecionado] == 3) {
        divdosgostos = 'DivGostos' + [containerSelecionado];
        divdoscomentarios = 'DivComentarios' + [containerSelecionado];

        document.getElementById(divdosgostos).classList.add('d-none');
        document.getElementById(divdoscomentarios).classList.add('d-none');
    } else {
        divdosgostos = 'DivGostos' + [containerSelecionado];
        divdoscomentarios = 'DivComentarios' + [containerSelecionado];

        document.getElementById(divdosgostos).classList.remove('d-none');
        document.getElementById(divdoscomentarios).classList.remove('d-none');
    }


    var cardbotao1 = cardId + "-" + containerSelecionado;

    console.log("asdasdasdasdasdasdasd", cardbotao);

    for (k = 1; k <= 9; k++) {
        console.log('cardButton' + k + '-' + containerSelecionado);
        if (cardbotao == 'cardButton' + k + '-' + containerSelecionado) {
            cardbotao1 = 'image' + k + '-' + containerSelecionado;
            cardtitulo = 'title' + k + '-' + containerSelecionado;

            document.getElementById(cardtitulo).style.color = "white";
            document.getElementById(cardbotao1).style.filter = "invert(1)";

        }
    }


}

function showLikes(contador) {

    var elementId = 'rightPaneContent' + contador;

    var divId = 'DivGostos' + contador;
    var divId2 = 'DivProjeto' + contador;
    var divId3 = 'DivComentarios' + contador;

    var div = document.getElementById(divId);
    var divprojects = document.getElementById(divId2);
    var divcoments = document.getElementById(divId3);

    if (div) {
        console.log('Div found: ', divId);
        console.log('Div found: ', divId2);
        console.log('Div found: ', divId3);


        var label = div.querySelector('label');
        console.log('Label found: ', label);

        var label2 = divprojects.querySelector('label');
        console.log('Label found projetos: ', label2);

        var label3 = divcoments.querySelector('label');
        console.log('Label found comentarios: ', label3);


        // Modificar a label como desejado
        if (label) {
            label.style.backgroundColor = "rgba(0, 123, 255, 0.1)";

            // Modificar a borda da div
            label.style.borderColor = "#007bff";


            label2.style.backgroundColor = "white";
            label2.style.borderColor = "rgba(187, 187, 187, 0.5)";

            label3.style.backgroundColor = "white";
            label3.style.borderColor = "rgba(187, 187, 187, 0.5)";


        }

    } else {
        console.log('Div not found: ', divId);
    }


    document.getElementById(elementId).innerHTML = `
            <div style="transition: 1s linear;">
                <div id="cardButton4-${contador}" class="card card-button m-2 ${gostos[contador] == 4 ? "active" : ""} ${projetos[contador] == 2 ? "d-none" : ""}" onclick="selectCard('cardButton4', ${contador})" style="height: 80px; transition: height 0.3s ease;">
                    <div class="card-body d-flex align-items-center" style="height: 80px;">
                        <img id="image4-${contador}" ${gostos[contador] == 4 ? "style='filter: invert(1);'" : ""}  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEQklEQVR4nO2Za4hVVRTHf46a10TElF4aDSkEJQhK0EtChaZMP6QQZjXR44NCH4Sgh5QJ9kAhJMoHfZhR0CBHJImiEose1lCWWr6gIsVKSzN6UOo4c2Nd/ic2l3P22eec63iF84fDMHP++7/3OnvttdZeAyVKlChRABcC84B1wE7gN+AM8DLnCSrAIuB3oBrz9ABX0uS4AvjSWfQBYDEwA7gaeE1/Pwl8CCwABtFkGA18p4X+BMyK4YwDPgJ+cYzdCgyhidClhe0FRgXwZ8lgG/MK/YwWYAqwUi50RGdhPtAH/A20ZtCbJDezILAceBs4DPwB/AlcfzaMGC+/jjvAffr5Ug7dVxM0q8BnwFRgcKOMmKivZOIngFXAbGAycNSZOM8XnKqxvwJ3aa4J2pFI92vgmqJGjNB2m+AbOtT1RkaRyFwvKy7SeHNRF+Z2TwN79P5bYHgBO2o5wYQ+BS6IeT9ArmU7lRd9euJgeWmH1vB4gTnYJZFpHs5fQC8wNId+Rfr/eDi3i7ObnBgInAL+TUlc2zTRLTnmmKKxX3k4Q1QR9OTNOQP0pS3e+/BMgai1XmOXpPCOiHcZOXFUBznufER4X5M8mUN/pca+6+G0yH2NN5KCGbvNw4kmyRNVrtLYHwPcbycF8IVEHvJwolIjS1aP0Kaxn3g4CwPOUSp6JTLMw1kjzhbgkgzaVkR2a+xTHt5QJznauc2FgxK40cMZrexrvNUZtLdozJ4U379JvB8ogOVO5h7r4U0Qb3+G0H5cO27VQxIu19ymvYwCsLi9WUIPp0SWKEReF6B7W+ABbhfvzZTIGYQ7JLY9hfeCeB+k1F2DnLPxWIrmNvHm0gBUnCrX7h5JGOnwng8w+FBKELnHKSh97pcJ0RZ/Hsjb5OFsEse6LATwHqWBuEGiduf2YZ54GzycqAlxd4rWhkBeJkyX6DspvAfE6/RwOsUxrg8dAUEmc+SKSpW1geHakmRaAk0Lp0vEs6vEpRQ85A8qN1RVU12bwLUo9YgaCVX1spIwU5wzGtPiSbQHxbVO5VLllWBcDDwHHHNKg290R48ztt25xdnzYsAcKxz+DmmYVj2sbH/L4Z7S2bEEnAjrVjyrtk40sFthsD4Ztco1XGN/Bu4lHO1OEq1Ka1lC8Xkz8DpwWtxeufnwuF342GnvbE7I0ON0WHvqjL0/4YumoaKx3XX94U7NVY8x2s2TTkOw1a17tjv3ArO+HgN1EzztbHFHgrvlhWl1SLuquRYnnKHxTqG6O+p93ac/HFcjOs6ILme3Os5yR71Vc0SNv41aQz1GqCL+P0S/p1+eSBBeqvfWNJtD/2GO06iz4BOH+Xpv1+3aTkTh9UTME/WdbqX/0ebsjO+p9dX2BRAtYpwrdAWsr1Y6DVblGvd8L+Kd59CQ2VqDffBcqDiZuhmenpwhvpYE9zaBAVUnZzTsXwwlSpQoUYJG4D8zfL5hqU0xoAAAAABJRU5ErkJggg==">
                        <div class="ms-4">
                            <h5 class="card-title mb-1" id="title4-${contador}" style="margin-bottom: 0.25em; ${gostos[contador] == 4 ? "color: white;" : ""}">Publico</h5>
                            <p class="card-text description">Qualquer pessoa pode ver...</p>
                        </div>
                    </div>
                </div>

                    <div id="cardButton5-${contador}" class="card card-button m-2 ${gostos[contador] == 5 ? "active" : ""}" onclick="selectCard('cardButton5', ${contador})">
                        <div class="card-body d-flex align-items-center" style="height: 80px;">
                            <img id="image5-${contador}" ${gostos[contador] == 5 ? "style='filter: invert(1);'" : ""} src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD1klEQVR4nO2ZW4hVZRTHf2UmTaijOZqXQRON8vZgF8UbgqIiJqgYpuaLL6EpGARB0IsEgkWKIT54Q0VFFO8OGKigMhghhHdMbZRUEmOscRyo3LHkv2FxnLPPvsmc5PxgP5xvr//a33V96/sOVKhQocLzzsvAXGAbUA/8BvwD3ANOAEuAVyhzpgI3gaDEcxYYD7SjDJmnnreKXgQ+B94HegEvAa8DHwJXXIMuAyMoIwYCzarcyhI93RdYBfwi+7+AYZQJG1Wp3QnX0h7p6igDXtRCDjQySagGHkj7Jm3McDff07BTeltjbco0VWR/Sv1X0i+njZmnimxNqf9C+hVF1tFMrb0LCgwWVM4DX2tq5sYsVcQWbhqWS28j4xms6Rq1H10HPgFezaEdjJXTUyn1W6Vf6Mpsz7nj1t4i4G1VuAoYB/zsGvQT8FrWhtTK2e8p9WGvv+PK1qnsJNCxiK6TNthLst1BDoTh942EOuv5x5r37d26aJQ/G4VS9JL+X6APGWjvpsFHCbVzpbvnGjLcpTlx2SeNrdfUTJSTcxruJFQrAgXy48P5kQR+vpVmGRmYLieHU+oPS29+wgzafh9M4GO1NEvJQD85uZ9iRDoDf0hvyaQxWr/PpJhas8nIcRcKLYrFoa/THHPlXVX2QHlcHG6nzPWeotal5XF7ZY7srxY03s4uTXpnm2Ip3pLt3y5gZOLLhKnKdtkvLigfo3LrmJoYfroD16QxbWb6K5Y/irGfmG2LTpQ9ikRB2wzjckqaCeTEFjk8UMLuoOw2t/KutzqkWUflUoxQ51mn9CQneroFHEVoU+zDm52NTZ1idHd2mzLUO7KSWWw66CrJbBZE2C2QTb00ZdcQ42PZ/BhhUy+b+eTMkIQNGRphUxXDV6DHbHOjVgedQLcqUWyQ3a9uR4+qaNr3iegCfOZ21/oYPWRXpqdlf1eXebaje/rovaX0xWhMmE20yrvAeuCh65mjaljczLfOZbrvuXcvAN/p3aEYYXyNNIkbEFYg0MHoB+CDBLlRiNkPKEgiF+uiIdDeMCpCP1KpSaCT4tI4FxJ2cluriodD/k1OF2s1OlP40b2lG5RSTAcanK5Zo9nq/lPt0oAW3XzEnUJxksc/3eja9Jyh5DEu7dSgOmUF4Z2y+W51LjZoauXFEjfC+3K6zB4C7HUd82n4YpIKmwrmc1aGaXQf67onbxbJd4sax64iF2hZWecizrPie33D1vaTOB/oAJMntxNc+aRlkL5hf/892X2DHJ9u+kjefoOI54Z9cEpBeMv6hJFkcs5+gyJPg9pQoUKFCvx/+A8kSpPCW6utKAAAAABJRU5ErkJggg==">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title5-${contador}" ${gostos[contador] == 5 ? "style='color: white;'" : ""}>Apenas Seguidores</h5>
                                <p class="card-text description">Apenas quem lhe segue pode ver...</p>
                            </div>
                        </div>
                    </div>

                    <div id="cardButton6-${contador}" class="card card-button m-2 ${gostos[contador] == 6 ? "active" : ""}" onclick="selectCard('cardButton6', ${contador})">
                        <div class="card-body d-flex align-items-center" style="height: 75px;">
                            <img id="image6-${contador}" ${gostos[contador] == 6 ? "style='filter: invert(1);'" : ""} src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEBElEQVR4nO2azW+UVRTGfw11OoYizgDiQhNZEoyyFpeNQhojuEPLToIbPlLZomz4sLBq0oS/Q20IEDVNULAgtiz4ELqxwIIPFyqtTWuGnPC8yUmd6XvfO3dmiuFJbvpxzz333HvPPfecZwae4/+LKrAdOAGMAjeAP4A5Nfv9uvpM5kOgwjJBGdgFnAX+BWoF2wJwBhgAejqxgBeBz4F7zqh/gO+BQzqZjdrxF9Qq+p/1fQH8oDHZ+LvAoDanLegHppwBl4BPgdURul4GdgOXnb7bwDZaCNupU27CX4D3EurfCvzq9I+04nReleE2wWNgL7Ai9SQ81bkfmHGnvT6V8g067pqizpu0Hm8BNzXnLdnQFNY5hePAWtqHCnBec0/JK6JQdu70E7CS9mMlcNG5WdSdOeXcyR67IijL138G/lYzg/ZFvBdrnFdYACgcYrOLXfROvA5cXeIRnABei7gzMxpv0S34scveCYtORU8iW8SkNqRXrd/1TUSczAF3+YNc7KB7J1ZETjYp4xdjVROb1K0NqGmeJVF2aUfMYzeusbb7jbBdMnZnimKbxt7JO9EBFyFi8JfG1zsNfyom82eE/i4XST9eSvCchCx3ikF2oVPJ1cMejT1dt1chdkEZaUwC2K6FVFTfzDeyc4eUfxc5QbsWYhjT+A+og5PqtHoiFCXgq0V1SdFmdcgx6QrFYY0dqtc5qk4rQUNxvIkFLG5HC8ybec839Tp/U6dVcaG4qzHvEI8t7mRCsUljjBf4Dx6ps0he1ayvx+pZK/n79Trn1Fl6BhbS43iCtiykX6/wdE4dnnQhD9VpaXMo8gyYdjK/N6GnkWs9SHXZ8wzwbMtUE3oKXfZvI8JvngF9TqavCT2Nwu/XSz2IRp6FIsSAVDLBD2KWXhsDGIoQA6zcvZBAT3CKUnFJozGAyzX8Vl3S+FIjoTNSuLsFBqTS85lkLaVqiE8kZFxskRTF0oxYvCsd9t6EFFZXJL8zr9TNjHs/QPGxhEnjkQLsznQIeTEo4SsB5ENJi8kWH9PuaBF5GUW3SI2a+LFclB3XayTbcsGgbLpZhErK2IoZkWOdxmZgNpbdGXE7UCT/So11IuXMluEYBWXRQhkH1QkSu1cPak0/e5rZjRtSNK6/24Uq8KPmvp3iA58N7mjNzd6mPXfilua0rPyNVIrXOzebEfdq4TA1uhWdZp07vZJ6krILADURyqk+fe3SYzfp9A+3+rP3re7Ya+Ji90R+i6Gq3ClLO2pypZSfFueezgG9ypkBc0qvv1Ths0lhu6S2Rh8afSSZMccTZGnHvk59A6JHrPhplQBF05N5ZbE7O7WAelitQmdIDOB1ERrZl2rs92sqT4ck27CeeA6ecTwBhN3E7TcZQfQAAAAASUVORK5CYII=">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title6-${contador}" ${gostos[contador] == 6 ? "style='color: white;'" : ""}>Apenas Eu</h5>
                                <p class="card-text description">Ninguém exceto você pode ver...</p>
                            </div>
                        </div>
                    </div>
            </div>
            `;
}

function showComments(contador) {
    var elementId = 'rightPaneContent' + contador;


    var divId = 'DivGostos' + contador;
    var divId2 = 'DivProjeto' + contador;
    var divId3 = 'DivComentarios' + contador;

    var div = document.getElementById(divId);
    var divprojects = document.getElementById(divId2);
    var divcoments = document.getElementById(divId3);

    if (divcoments) {
        console.log('Div found: ', divId);
        console.log('Div found: ', divId2);
        console.log('Div found: ', divId3);

        var label = divcoments.querySelector('label');
        console.log('Label found comentarios: ', label);

        var label2 = div.querySelector('label');
        console.log('Label found: ', label2);

        var label3 = divprojects.querySelector('label');
        console.log('Label found projetos: ', label3);

        // Modificar a label como desejado
        if (label) {
            label.style.backgroundColor = "rgba(0, 123, 255, 0.1)";
            label.style.borderColor = "#007bff";

            label2.style.backgroundColor = "white";
            label2.style.borderColor = "rgba(187, 187, 187, 0.5)";

            label3.style.backgroundColor = "white";
            label3.style.borderColor = "rgba(187, 187, 187, 0.5)";
        }
    } else {
        console.log('Div not found: ', divId3);
    }



    document.getElementById(elementId).innerHTML = `
                <div style="transition: 1s linear;">
                    <div id="cardButton7-${contador}" class="card card-button m-2 ${comentarios[contador] == 7 ? "active" : ""} ${projetos[contador] == 2 ? "d-none" : ""}" onclick="selectCard('cardButton7', ${contador})" style="height: 80px;">
                        <div class="card-body d-flex align-items-center" style="padding-top: 12px;">
                            <img id="image7-${contador}" ${comentarios[contador] == 7 ? "style='filter: invert(1);'" : ""} src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEQklEQVR4nO2Za4hVVRTHf46a10TElF4aDSkEJQhK0EtChaZMP6QQZjXR44NCH4Sgh5QJ9kAhJMoHfZhR0CBHJImiEose1lCWWr6gIsVKSzN6UOo4c2Nd/ic2l3P22eec63iF84fDMHP++7/3OnvttdZeAyVKlChRABcC84B1wE7gN+AM8DLnCSrAIuB3oBrz9ABX0uS4AvjSWfQBYDEwA7gaeE1/Pwl8CCwABtFkGA18p4X+BMyK4YwDPgJ+cYzdCgyhidClhe0FRgXwZ8lgG/MK/YwWYAqwUi50RGdhPtAH/A20ZtCbJDezILAceBs4DPwB/AlcfzaMGC+/jjvAffr5Ug7dVxM0q8BnwFRgcKOMmKivZOIngFXAbGAycNSZOM8XnKqxvwJ3aa4J2pFI92vgmqJGjNB2m+AbOtT1RkaRyFwvKy7SeHNRF+Z2TwN79P5bYHgBO2o5wYQ+BS6IeT9ArmU7lRd9euJgeWmH1vB4gTnYJZFpHs5fQC8wNId+Rfr/eDi3i7ObnBgInAL+TUlc2zTRLTnmmKKxX3k4Q1QR9OTNOQP0pS3e+/BMgai1XmOXpPCOiHcZOXFUBznufER4X5M8mUN/pca+6+G0yH2NN5KCGbvNw4kmyRNVrtLYHwPcbycF8IVEHvJwolIjS1aP0Kaxn3g4CwPOUSp6JTLMw1kjzhbgkgzaVkR2a+xTHt5QJznauc2FgxK40cMZrexrvNUZtLdozJ4U379JvB8ogOVO5h7r4U0Qb3+G0H5cO27VQxIu19ymvYwCsLi9WUIPp0SWKEReF6B7W+ABbhfvzZTIGYQ7JLY9hfeCeB+k1F2DnLPxWIrmNvHm0gBUnCrX7h5JGOnwng8w+FBKELnHKSh97pcJ0RZ/Hsjb5OFsEse6LATwHqWBuEGiduf2YZ54GzycqAlxd4rWhkBeJkyX6DspvAfE6/RwOsUxrg8dAUEmc+SKSpW1geHakmRaAk0Lp0vEs6vEpRQ85A8qN1RVU12bwLUo9YgaCVX1spIwU5wzGtPiSbQHxbVO5VLllWBcDDwHHHNKg290R48ztt25xdnzYsAcKxz+DmmYVj2sbH/L4Z7S2bEEnAjrVjyrtk40sFthsD4Ztco1XGN/Bu4lHO1OEq1Ka1lC8Xkz8DpwWtxeufnwuF342GnvbE7I0ON0WHvqjL0/4YumoaKx3XX94U7NVY8x2s2TTkOw1a17tjv3ArO+HgN1EzztbHFHgrvlhWl1SLuquRYnnKHxTqG6O+p93ac/HFcjOs6ILme3Os5yR71Vc0SNv41aQz1GqCL+P0S/p1+eSBBeqvfWNJtD/2GO06iz4BOH+Xpv1+3aTkTh9UTME/WdbqX/0ebsjO+p9dX2BRAtYpwrdAWsr1Y6DVblGvd8L+Kd59CQ2VqDffBcqDiZuhmenpwhvpYE9zaBAVUnZzTsXwwlSpQoUYJG4D8zfL5hqU0xoAAAAABJRU5ErkJggg==">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title7-${contador}" style="margin-bottom: 0.25em; ${comentarios[contador] == 7 ? "color: white;" : ""}">Publico</h5>
                                <p class="card-text description">Qualquer pessoa pode ver...</p>
                            </div>
                        </div>
                    </div>

                    <div id="cardButton8-${contador}" class="card card-button m-2 ${comentarios[contador] == 8 ? "active" : ""}" onclick="selectCard('cardButton8', ${contador})">
                        <div class="card-body d-flex align-items-center" style="height: 80px;">
                            <img id="image8-${contador}" ${comentarios[contador] == 8 ? "style='filter: invert(1);'" : ""} src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD1klEQVR4nO2ZW4hVZRTHf2UmTaijOZqXQRON8vZgF8UbgqIiJqgYpuaLL6EpGARB0IsEgkWKIT54Q0VFFO8OGKigMhghhHdMbZRUEmOscRyo3LHkv2FxnLPPvsmc5PxgP5xvr//a33V96/sOVKhQocLzzsvAXGAbUA/8BvwD3ANOAEuAVyhzpgI3gaDEcxYYD7SjDJmnnreKXgQ+B94HegEvAa8DHwJXXIMuAyMoIwYCzarcyhI93RdYBfwi+7+AYZQJG1Wp3QnX0h7p6igDXtRCDjQySagGHkj7Jm3McDff07BTeltjbco0VWR/Sv1X0i+njZmnimxNqf9C+hVF1tFMrb0LCgwWVM4DX2tq5sYsVcQWbhqWS28j4xms6Rq1H10HPgFezaEdjJXTUyn1W6Vf6Mpsz7nj1t4i4G1VuAoYB/zsGvQT8FrWhtTK2e8p9WGvv+PK1qnsJNCxiK6TNthLst1BDoTh942EOuv5x5r37d26aJQ/G4VS9JL+X6APGWjvpsFHCbVzpbvnGjLcpTlx2SeNrdfUTJSTcxruJFQrAgXy48P5kQR+vpVmGRmYLieHU+oPS29+wgzafh9M4GO1NEvJQD85uZ9iRDoDf0hvyaQxWr/PpJhas8nIcRcKLYrFoa/THHPlXVX2QHlcHG6nzPWeotal5XF7ZY7srxY03s4uTXpnm2Ip3pLt3y5gZOLLhKnKdtkvLigfo3LrmJoYfroD16QxbWb6K5Y/irGfmG2LTpQ9ikRB2wzjckqaCeTEFjk8UMLuoOw2t/KutzqkWUflUoxQ51mn9CQneroFHEVoU+zDm52NTZ1idHd2mzLUO7KSWWw66CrJbBZE2C2QTb00ZdcQ42PZ/BhhUy+b+eTMkIQNGRphUxXDV6DHbHOjVgedQLcqUWyQ3a9uR4+qaNr3iegCfOZ21/oYPWRXpqdlf1eXebaje/rovaX0xWhMmE20yrvAeuCh65mjaljczLfOZbrvuXcvAN/p3aEYYXyNNIkbEFYg0MHoB+CDBLlRiNkPKEgiF+uiIdDeMCpCP1KpSaCT4tI4FxJ2cluriodD/k1OF2s1OlP40b2lG5RSTAcanK5Zo9nq/lPt0oAW3XzEnUJxksc/3eja9Jyh5DEu7dSgOmUF4Z2y+W51LjZoauXFEjfC+3K6zB4C7HUd82n4YpIKmwrmc1aGaXQf67onbxbJd4sax64iF2hZWecizrPie33D1vaTOB/oAJMntxNc+aRlkL5hf/892X2DHJ9u+kjefoOI54Z9cEpBeMv6hJFkcs5+gyJPg9pQoUKFCvx/+A8kSpPCW6utKAAAAABJRU5ErkJggg==">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title8-${contador}"  ${comentarios[contador] == 8 ? "style='color: white;'" : ""}>Apenas Seguidores</h5>
                                <p class="card-text description">Apenas quem lhe segue pode ver...</p>
                            </div>
                        </div>
                    </div>

                    <div id="cardButton9-${contador}" class="card card-button m-2 ${comentarios[contador] == 9 ? "active" : ""}" onclick="selectCard('cardButton9', ${contador})">
                        <div class="card-body d-flex align-items-center" style="height: 75px;">
                            <img id="image9-${contador}" ${comentarios[contador] == 9 ? "style='filter: invert(1);'" : ""} src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEBElEQVR4nO2azW+UVRTGfw11OoYizgDiQhNZEoyyFpeNQhojuEPLToIbPlLZomz4sLBq0oS/Q20IEDVNULAgtiz4ELqxwIIPFyqtTWuGnPC8yUmd6XvfO3dmiuFJbvpxzz333HvPPfecZwae4/+LKrAdOAGMAjeAP4A5Nfv9uvpM5kOgwjJBGdgFnAX+BWoF2wJwBhgAejqxgBeBz4F7zqh/gO+BQzqZjdrxF9Qq+p/1fQH8oDHZ+LvAoDanLegHppwBl4BPgdURul4GdgOXnb7bwDZaCNupU27CX4D3EurfCvzq9I+04nReleE2wWNgL7Ai9SQ81bkfmHGnvT6V8g067pqizpu0Hm8BNzXnLdnQFNY5hePAWtqHCnBec0/JK6JQdu70E7CS9mMlcNG5WdSdOeXcyR67IijL138G/lYzg/ZFvBdrnFdYACgcYrOLXfROvA5cXeIRnABei7gzMxpv0S34scveCYtORU8iW8SkNqRXrd/1TUSczAF3+YNc7KB7J1ZETjYp4xdjVROb1K0NqGmeJVF2aUfMYzeusbb7jbBdMnZnimKbxt7JO9EBFyFi8JfG1zsNfyom82eE/i4XST9eSvCchCx3ikF2oVPJ1cMejT1dt1chdkEZaUwC2K6FVFTfzDeyc4eUfxc5QbsWYhjT+A+og5PqtHoiFCXgq0V1SdFmdcgx6QrFYY0dqtc5qk4rQUNxvIkFLG5HC8ybec839Tp/U6dVcaG4qzHvEI8t7mRCsUljjBf4Dx6ps0he1ayvx+pZK/n79Trn1Fl6BhbS43iCtiykX6/wdE4dnnQhD9VpaXMo8gyYdjK/N6GnkWs9SHXZ8wzwbMtUE3oKXfZvI8JvngF9TqavCT2Nwu/XSz2IRp6FIsSAVDLBD2KWXhsDGIoQA6zcvZBAT3CKUnFJozGAyzX8Vl3S+FIjoTNSuLsFBqTS85lkLaVqiE8kZFxskRTF0oxYvCsd9t6EFFZXJL8zr9TNjHs/QPGxhEnjkQLsznQIeTEo4SsB5ENJi8kWH9PuaBF5GUW3SI2a+LFclB3XayTbcsGgbLpZhErK2IoZkWOdxmZgNpbdGXE7UCT/So11IuXMluEYBWXRQhkH1QkSu1cPak0/e5rZjRtSNK6/24Uq8KPmvp3iA58N7mjNzd6mPXfilua0rPyNVIrXOzebEfdq4TA1uhWdZp07vZJ6krILADURyqk+fe3SYzfp9A+3+rP3re7Ya+Ji90R+i6Gq3ClLO2pypZSfFueezgG9ypkBc0qvv1Ths0lhu6S2Rh8afSSZMccTZGnHvk59A6JHrPhplQBF05N5ZbE7O7WAelitQmdIDOB1ERrZl2rs92sqT4ck27CeeA6ecTwBhN3E7TcZQfQAAAAASUVORK5CYII=">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title9-${contador}"  ${comentarios[contador] == 9 ? "style='color: white;'" : ""}>Apenas Eu</h5>
                                <p class="card-text description">Ninguém exceto você pode ver...</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
}

function showProject(contador) {
    var elementId = 'rightPaneContent' + contador;

    var divId = 'DivGostos' + contador;
    var divId2 = 'DivProjeto' + contador;
    var divId3 = 'DivComentarios' + contador;

    var div = document.getElementById(divId);
    var divprojects = document.getElementById(divId2);
    var divcoments = document.getElementById(divId3);

    if (divprojects) {
        console.log('Div found: ', divId);
        console.log('Div found: ', divId2);
        console.log('Div found: ', divId3);

        var label = divprojects.querySelector('label');
        console.log('Label found projetos: ', label);

        var label2 = div.querySelector('label');
        console.log('Label found: ', label2);

        var label3 = divcoments.querySelector('label');
        console.log('Label found comentarios: ', label3);

        // Modificar a label como desejado
        if (label) {
            label.style.backgroundColor = "rgba(0, 123, 255, 0.1)";
            label.style.borderColor = "#007bff";

            label2.style.backgroundColor = "white";
            label2.style.borderColor = "rgba(187, 187, 187, 0.5)";

            label3.style.backgroundColor = "white";
            label3.style.borderColor = "rgba(187, 187, 187, 0.5)";
        }
    } else {
        console.log('Div not found: ', divId2);
    }



    console.log(contador);
    console.log('esta aqui:', elementId);
    document.getElementById(elementId).innerHTML = `
                <div style="transition: 1s linear;">
                    <div id="cardButton1-${contador}" class="card card-button m-2 ${projetos[contador] == 1 ? "active" : ""}"  onclick="selectCard('cardButton1', ${contador})" style="height: 80px;">
                        <div class="card-body d-flex align-items-center" style="padding-top: 12px;">
                            <img ${projetos[contador] == 1 ? "style='filter: invert(1);'" : ""} id="image1-${contador}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEQklEQVR4nO2Za4hVVRTHf46a10TElF4aDSkEJQhK0EtChaZMP6QQZjXR44NCH4Sgh5QJ9kAhJMoHfZhR0CBHJImiEose1lCWWr6gIsVKSzN6UOo4c2Nd/ic2l3P22eec63iF84fDMHP++7/3OnvttdZeAyVKlChRABcC84B1wE7gN+AM8DLnCSrAIuB3oBrz9ABX0uS4AvjSWfQBYDEwA7gaeE1/Pwl8CCwABtFkGA18p4X+BMyK4YwDPgJ+cYzdCgyhidClhe0FRgXwZ8lgG/MK/YwWYAqwUi50RGdhPtAH/A20ZtCbJDezILAceBs4DPwB/AlcfzaMGC+/jjvAffr5Ug7dVxM0q8BnwFRgcKOMmKivZOIngFXAbGAycNSZOM8XnKqxvwJ3aa4J2pFI92vgmqJGjNB2m+AbOtT1RkaRyFwvKy7SeHNRF+Z2TwN79P5bYHgBO2o5wYQ+BS6IeT9ArmU7lRd9euJgeWmH1vB4gTnYJZFpHs5fQC8wNId+Rfr/eDi3i7ObnBgInAL+TUlc2zTRLTnmmKKxX3k4Q1QR9OTNOQP0pS3e+/BMgai1XmOXpPCOiHcZOXFUBznufER4X5M8mUN/pca+6+G0yH2NN5KCGbvNw4kmyRNVrtLYHwPcbycF8IVEHvJwolIjS1aP0Kaxn3g4CwPOUSp6JTLMw1kjzhbgkgzaVkR2a+xTHt5QJznauc2FgxK40cMZrexrvNUZtLdozJ4U379JvB8ogOVO5h7r4U0Qb3+G0H5cO27VQxIu19ymvYwCsLi9WUIPp0SWKEReF6B7W+ABbhfvzZTIGYQ7JLY9hfeCeB+k1F2DnLPxWIrmNvHm0gBUnCrX7h5JGOnwng8w+FBKELnHKSh97pcJ0RZ/Hsjb5OFsEse6LATwHqWBuEGiduf2YZ54GzycqAlxd4rWhkBeJkyX6DspvAfE6/RwOsUxrg8dAUEmc+SKSpW1geHakmRaAk0Lp0vEs6vEpRQ85A8qN1RVU12bwLUo9YgaCVX1spIwU5wzGtPiSbQHxbVO5VLllWBcDDwHHHNKg290R48ztt25xdnzYsAcKxz+DmmYVj2sbH/L4Z7S2bEEnAjrVjyrtk40sFthsD4Ztco1XGN/Bu4lHO1OEq1Ka1lC8Xkz8DpwWtxeufnwuF342GnvbE7I0ON0WHvqjL0/4YumoaKx3XX94U7NVY8x2s2TTkOw1a17tjv3ArO+HgN1EzztbHFHgrvlhWl1SLuquRYnnKHxTqG6O+p93ac/HFcjOs6ILme3Os5yR71Vc0SNv41aQz1GqCL+P0S/p1+eSBBeqvfWNJtD/2GO06iz4BOH+Xpv1+3aTkTh9UTME/WdbqX/0ebsjO+p9dX2BRAtYpwrdAWsr1Y6DVblGvd8L+Kd59CQ2VqDffBcqDiZuhmenpwhvpYE9zaBAVUnZzTsXwwlSpQoUYJG4D8zfL5hqU0xoAAAAABJRU5ErkJggg==">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title1-${contador}" style="margin-bottom: 0.25em; ${projetos[contador] == 1 ? "color: white;" : ""}">Publico</h5>
                                <p class="card-text description">Qualquer pessoa pode ver...</p>
                            </div>
                        </div>
                    </div>

                    <div id="cardButton2-${contador}" class="card card-button m-2 ${projetos[contador] == 2 ? "active" : ""}" onclick="selectCard('cardButton2', ${contador})">
                        <div class="card-body d-flex align-items-center" style="height: 80px;">
                            <img ${projetos[contador] == 2 ? "style='filter: invert(1);'" : ""} id="image2-${contador}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD1klEQVR4nO2ZW4hVZRTHf2UmTaijOZqXQRON8vZgF8UbgqIiJqgYpuaLL6EpGARB0IsEgkWKIT54Q0VFFO8OGKigMhghhHdMbZRUEmOscRyo3LHkv2FxnLPPvsmc5PxgP5xvr//a33V96/sOVKhQocLzzsvAXGAbUA/8BvwD3ANOAEuAVyhzpgI3gaDEcxYYD7SjDJmnnreKXgQ+B94HegEvAa8DHwJXXIMuAyMoIwYCzarcyhI93RdYBfwi+7+AYZQJG1Wp3QnX0h7p6igDXtRCDjQySagGHkj7Jm3McDff07BTeltjbco0VWR/Sv1X0i+njZmnimxNqf9C+hVF1tFMrb0LCgwWVM4DX2tq5sYsVcQWbhqWS28j4xms6Rq1H10HPgFezaEdjJXTUyn1W6Vf6Mpsz7nj1t4i4G1VuAoYB/zsGvQT8FrWhtTK2e8p9WGvv+PK1qnsJNCxiK6TNthLst1BDoTh942EOuv5x5r37d26aJQ/G4VS9JL+X6APGWjvpsFHCbVzpbvnGjLcpTlx2SeNrdfUTJSTcxruJFQrAgXy48P5kQR+vpVmGRmYLieHU+oPS29+wgzafh9M4GO1NEvJQD85uZ9iRDoDf0hvyaQxWr/PpJhas8nIcRcKLYrFoa/THHPlXVX2QHlcHG6nzPWeotal5XF7ZY7srxY03s4uTXpnm2Ip3pLt3y5gZOLLhKnKdtkvLigfo3LrmJoYfroD16QxbWb6K5Y/irGfmG2LTpQ9ikRB2wzjckqaCeTEFjk8UMLuoOw2t/KutzqkWUflUoxQ51mn9CQneroFHEVoU+zDm52NTZ1idHd2mzLUO7KSWWw66CrJbBZE2C2QTb00ZdcQ42PZ/BhhUy+b+eTMkIQNGRphUxXDV6DHbHOjVgedQLcqUWyQ3a9uR4+qaNr3iegCfOZ21/oYPWRXpqdlf1eXebaje/rovaX0xWhMmE20yrvAeuCh65mjaljczLfOZbrvuXcvAN/p3aEYYXyNNIkbEFYg0MHoB+CDBLlRiNkPKEgiF+uiIdDeMCpCP1KpSaCT4tI4FxJ2cluriodD/k1OF2s1OlP40b2lG5RSTAcanK5Zo9nq/lPt0oAW3XzEnUJxksc/3eja9Jyh5DEu7dSgOmUF4Z2y+W51LjZoauXFEjfC+3K6zB4C7HUd82n4YpIKmwrmc1aGaXQf67onbxbJd4sax64iF2hZWecizrPie33D1vaTOB/oAJMntxNc+aRlkL5hf/892X2DHJ9u+kjefoOI54Z9cEpBeMv6hJFkcs5+gyJPg9pQoUKFCvx/+A8kSpPCW6utKAAAAABJRU5ErkJggg==">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title2-${contador}"  ${projetos[contador] == 2 ? "style='color: white;'" : ""}>Apenas Seguidores</h5>
                                <p class="card-text description">Apenas quem lhe segue pode ver...</p>
                            </div>
                        </div>
                    </div>

                    <div id="cardButton3-${contador}" class="card card-button m-2 ${projetos[contador] == 3 ? "active" : ""}" onclick="selectCard('cardButton3', ${contador})">
                        <div class="card-body d-flex align-items-center" style="height: 75px;">
                            <img ${projetos[contador] == 3 ? "style='filter: invert(1);'" : ""}  id="image3-${contador}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEBElEQVR4nO2azW+UVRTGfw11OoYizgDiQhNZEoyyFpeNQhojuEPLToIbPlLZomz4sLBq0oS/Q20IEDVNULAgtiz4ELqxwIIPFyqtTWuGnPC8yUmd6XvfO3dmiuFJbvpxzz333HvPPfecZwae4/+LKrAdOAGMAjeAP4A5Nfv9uvpM5kOgwjJBGdgFnAX+BWoF2wJwBhgAejqxgBeBz4F7zqh/gO+BQzqZjdrxF9Qq+p/1fQH8oDHZ+LvAoDanLegHppwBl4BPgdURul4GdgOXnb7bwDZaCNupU27CX4D3EurfCvzq9I+04nReleE2wWNgL7Ai9SQ81bkfmHGnvT6V8g067pqizpu0Hm8BNzXnLdnQFNY5hePAWtqHCnBec0/JK6JQdu70E7CS9mMlcNG5WdSdOeXcyR67IijL138G/lYzg/ZFvBdrnFdYACgcYrOLXfROvA5cXeIRnABei7gzMxpv0S34scveCYtORU8iW8SkNqRXrd/1TUSczAF3+YNc7KB7J1ZETjYp4xdjVROb1K0NqGmeJVF2aUfMYzeusbb7jbBdMnZnimKbxt7JO9EBFyFi8JfG1zsNfyom82eE/i4XST9eSvCchCx3ikF2oVPJ1cMejT1dt1chdkEZaUwC2K6FVFTfzDeyc4eUfxc5QbsWYhjT+A+og5PqtHoiFCXgq0V1SdFmdcgx6QrFYY0dqtc5qk4rQUNxvIkFLG5HC8ybec839Tp/U6dVcaG4qzHvEI8t7mRCsUljjBf4Dx6ps0he1ayvx+pZK/n79Trn1Fl6BhbS43iCtiykX6/wdE4dnnQhD9VpaXMo8gyYdjK/N6GnkWs9SHXZ8wzwbMtUE3oKXfZvI8JvngF9TqavCT2Nwu/XSz2IRp6FIsSAVDLBD2KWXhsDGIoQA6zcvZBAT3CKUnFJozGAyzX8Vl3S+FIjoTNSuLsFBqTS85lkLaVqiE8kZFxskRTF0oxYvCsd9t6EFFZXJL8zr9TNjHs/QPGxhEnjkQLsznQIeTEo4SsB5ENJi8kWH9PuaBF5GUW3SI2a+LFclB3XayTbcsGgbLpZhErK2IoZkWOdxmZgNpbdGXE7UCT/So11IuXMluEYBWXRQhkH1QkSu1cPak0/e5rZjRtSNK6/24Uq8KPmvp3iA58N7mjNzd6mPXfilua0rPyNVIrXOzebEfdq4TA1uhWdZp07vZJ6krILADURyqk+fe3SYzfp9A+3+rP3re7Ya+Ji90R+i6Gq3ClLO2pypZSfFueezgG9ypkBc0qvv1Ths0lhu6S2Rh8afSSZMccTZGnHvk59A6JHrPhplQBF05N5ZbE7O7WAelitQmdIDOB1ERrZl2rs92sqT4ck27CeeA6ecTwBhN3E7TcZQfQAAAAASUVORK5CYII=">
                            <div class="ms-4">
                                <h5 class="card-title mb-1" id="title3-${contador}"  ${projetos[contador] == 3 ? "style='color: white;'" : ""}>Apenas Eu</h5>
                                <p class="card-text description">Ninguém exceto você pode ver...</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;

}


var imageContainer = "ola";
var id_entrada;

function handleFileInputChange(event) {
    // Lógica para quando o input de arquivo mudar
    const file = event.target.files[0];
    if (file) {
        console.log('Arquivo selecionado:', file.name);
    }
}

function handleButtonClick(event) {
    // Obtém o input de arquivo
    const fileInput = document.getElementById('fileInput');
    // Adiciona o ouvinte de evento de mudança ao input de arquivo
    fileInput.addEventListener('change', handleFileInputChange);
    // Dispara o evento de clique no input de arquivo
    fileInput.click();
}

function handleFileInputChange() {
    const files = this.files;
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; // Tipos de arquivo permitidos

    if (files.length > 0) {
        let lastDataId = 0;
        const existingDivs = document.querySelectorAll(`#${id_entrada} div[data-id]`);

        existingDivs.forEach(div => {
            const dataId = parseInt(div.getAttribute('data-id'));
            if (!isNaN(dataId) && dataId > lastDataId) {
                lastDataId = dataId;
            }
        });

        Array.from(files).forEach((file, index) => {
            // Verifica se o tipo do arquivo está entre os permitidos
            if (allowedTypes.includes(file.type)) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imageUrl = e.target.result;
                    const newId = lastDataId + index + 1; // Incrementa o último data-id
                    displayImageBeforeFixedItem(imageUrl, newId);
                };
                reader.readAsDataURL(file);
            } else {
                console.log(`O arquivo '${file.name}' não é um tipo de imagem suportado.`);
            }
        });
    }
}


function alterarImageContainer(novothis) {
    const fileInput = document.getElementById('fileInput');
    imageContainer = document.getElementById(novothis.id);
    console.log('mudou: ', imageContainer);

    const fixedItem = document.getElementById('fixedItem');

    console.log('Image Container: ', imageContainer);
    console.log("Novo This: ", novothis)
    console.log("Novo This id: ", novothis.id);

    id_entrada = imageContainer.id;
    console.log("fffffffffffff", id_entrada);

}

function displayImageBeforeFixedItem(imageUrl, newId) {
    const div = document.createElement('div');
    newId = newId + $lastImageCount;
    $lastImageCount = 0;
    div.classList.add('col-4', 'mb-3', 'ui-sortable-handle', 'imageContainer');
    div.setAttribute('data-id', newId);
    div.innerHTML = `
        <a class="delete-image" data-id="${newId}">
            <i class="position-absolute mt-2 p-1 bg-danger rounded-circle" style="opacity: 77.5%; margin-left: 12em;">
                <svg style="width: 2em; height: 2em; color: white;" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 32 32">
                    <path d="M 15 4 C 14.476563 4 13.941406 4.183594 13.5625 4.5625 C 13.183594 4.941406 13 5.476563 13 6 L 13 7 L 7 7 L 7 9 L 8 9 L 8 25 C 8 26.644531 9.355469 28 11 28 L 23 28 C 24.644531 28 26 26.644531 26 25 L 26 9 L 27 9 L 27 7 L 21 7 L 21 6 C 21 5.476563 20.816406 4.941406 20.4375 4.5625 C 20.058594 4.183594 19.523438 4 19 4 Z M 15 6 L 19 6 L 19 7 L 15 7 Z M 10 9 L 24 9 L 24 25 C 24 25.554688 23.554688 26 23 26 L 11 26 C 10.445313 26 10 25.554688 10 25 Z M 12 12 L 12 23 L 14 23 L 14 12 Z M 16 12 L 16 23 L 18 23 L 18 12 Z M 20 12 L 20 23 L 22 23 L 22 12 Z" fill="rgb(255, 255, 255)"></path>
                </svg>
            </i>
        </a>
        <img src="${imageUrl}" class="ui-state-default d-block rounded" style="width:240px; height: 180px;" alt="...">
        `;

    document.getElementById(id_entrada).prepend(div);


    // Add delete event
    div.querySelector('.delete-image').addEventListener('click', function (e) {
        e.preventDefault();
        const dataId = this.getAttribute('data-id');
        const elementToDelete = document.querySelector(`[data-id="${dataId}"]`);
        if (elementToDelete) {
            elementToDelete.remove();
        }
    });

    limparImagensData();
}

function setupDeleteLinks() {
    console.log('ovitawaekfdjksf');
    // Selecionar todos os elementos com a classe delete-image
    const deleteLinks = document.querySelectorAll('.delete-image');
    console.log(deleteLinks);

    // Iterar sobre cada link de exclusão e adicionar o manipulador de evento
    deleteLinks.forEach(deleteLink => {
        deleteLink.addEventListener('click', function (e) {
            e.preventDefault(); // Evitar o comportamento padrão do link

            var dataId = this.getAttribute('data-id'); // Obter o atributo data-id do link clicado
            console.log(dataId);

            console.log("asdasdasdasdasdas", id_entrada);
            const divToDelete = document.querySelector(`#${id_entrada} [data-id="${dataId}"]`); // Encontrar a div correspondente
            console.log(divToDelete);

            if (divToDelete) {
                divToDelete.remove(); // Remover a div correspondente se encontrada
                console.log(`Elemento com data-id ${dataId} removido`);

                if (dataId == elementsWithDataId) {
                    $lastImageCount++;
                }

                dataId = 0;
            } else {
                console.log(`Elemento com data-id ${dataId} não encontrado`);
            }

        });
    });
}


function limparImagensData() {
    elementsWithDataId = document.querySelectorAll('[data-id]');
    console.log(`Número de elementos com data-id: ${elementsWithDataId.length}`);
    elementsWithDataId = elementsWithDataId.length / 2;
    console.log(elementsWithDataId);
}

function erro(mensagem) {
    toastr.options.timeOut = 5000; // 10 segundos
    toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
    toastr.error(mensagem);
}

function alteradocomsucesso() {
    toastr.options.timeOut = 5000; // 10 segundos
    toastr.options.toastClass = 'custom-toast'; // Aplicar classe de estilo personalizado
    toastr.success('Alterado com sucesso');
}

function updatePrivacy(var1, var2) {
    var elementsWithDataId;
    $.ajax({
        url: '../../src/Handlers/getPrivacidadeEditar.php',
        method: 'GET',
        data: { var1: var1, var2: var2 }, // Passando variáveis na requisição
        success: function (data) {
            $('#alterarprivacidade' + var1).html(data);

        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}

function guardarPrivacidade(id_projeto, selectedContainer) {

    var xhr = new XMLHttpRequest();
    var url = "../../src/Handlers/guardarPrivacidadeEditar.php";
    var params = "id_projeto=" + encodeURIComponent(id_projeto) +
        "&projetos=" + encodeURIComponent(projetos[selectedContainer]) +
        "&gostos=" + encodeURIComponent(gostos[selectedContainer]) +
        "&comentarios=" + encodeURIComponent(comentarios[selectedContainer]);

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                alteradocomsucesso('Privacidade alterada com sucesso!');
            } else {
                console.error("Erro na requisição: " + xhr.status);
            }
        }
    };
    xhr.send(params);
}

function apagarProjeto(p_id) {
    var xhr = new XMLHttpRequest();
    var url = "../../src/Handlers/apagarProjeto.php";
    var params = "id_projeto=" + encodeURIComponent(p_id);

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                alteradocomsucesso('Projeto apagado com sucesso!');
            } else {
                console.error("Erro na requisição: " + xhr.status);
            }
        }
    };
    xhr.send(params);
}

function updateStats(var1) {
    console.log('updatestats');
    $.ajax({
        url: '../../src/Handlers/getEstatisticasProjeto.php',
        method: 'GET',
        data: { var1: var1 }, // Passando variáveis na requisição
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


function getFollowersList1(var1) {
    var elementsWithDataId;

    $.ajax({
        url: '../../src/Handlers/getFollowersList.php',
        method: 'GET',
        data: { var1: var1, var2: 'open' }, // Passando variáveis na requisição
        success: function (data) {
            $('#getFollowersList').html(data);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}

function getFollowersList2(var1) {
    var elementsWithDataId;

    // Obtendo o elemento input pelo ID
    var inputElement = document.getElementById('SearchBarFollowers');

    // Lendo o valor do input
    var var3 = inputElement.value;

    $.ajax({
        url: '../../src/Handlers/getFollowersList.php',
        method: 'GET',
        data: { var1: var1, var2: 'search', var3: var3 }, // Passando variáveis na requisição
        success: function (data) {
            $('#getFollowersList').html(data);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}











function getFollowingsList1(var1) {
    var elementsWithDataId;

    console.log('executa');

    $.ajax({
        url: '../../src/Handlers/getFollowingsList.php',
        method: 'GET',
        data: { var1: var1, var2: 'open' }, // Passando variáveis na requisição
        success: function (data) {
            $('#getFollowingsList').html(data);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}

function getFollowingsList2(var1) {
    var elementsWithDataId;

    // Obtendo o elemento input pelo ID
    var inputElement = document.getElementById('SearchBarFollowings');

    // Lendo o valor do input
    var var3 = inputElement.value;

    $.ajax({
        url: '../../src/Handlers/getFollowingsList.php',
        method: 'GET',
        data: { var1: var1, var2: 'search', var3: var3 }, // Passando variáveis na requisição
        success: function (data) {
            $('#getFollowingsList').html(data);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}