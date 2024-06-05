
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
        boxcomnomes.classList.add('d-none');
    }
}


var projetos = [];
var gostos = [];
var comentarios = [];
var contador;

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