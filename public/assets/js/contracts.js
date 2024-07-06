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

function updateContracts(var1) {
    $.ajax({
        url: '../src/Handlers/getContracts.php',
        method: 'GET',
        data: { var1: var1 }, // Passando variáveis na requisição
        success: function (data) {
            $('#novasTable').html(data);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}

function mostrarAssunto(var1)
{
    document.getElementById('assuntoModal').textContent = var1;
}

function downloadFile(fileName, id) {
    const filePath = '/Estagio2024/public/users/' + id + '/' + fileName;
    const xhr = new XMLHttpRequest();
    console.log(id);
    xhr.open('GET', filePath, true);
    xhr.responseType = 'blob';
    xhr.onload = function () {
        if (xhr.status === 200) {
            const url = window.URL.createObjectURL(xhr.response);
            const a = document.createElement('a');
            a.href = url;
            a.download = fileName;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            document.body.removeChild(a);
        } else {
            console.error('Erro ao baixar o arquivo: ', xhr.status, xhr.statusText);
            alert('Erro ao baixar o arquivo.');
        }
    };
    xhr.onerror = function () {
        console.error('Erro ao realizar a requisição.');
        alert('Erro ao realizar a requisição.');
    };
    xhr.send();
}


function estadoContract(var1, opcao)
{
    $.ajax({
        url: '../src/Handlers/guardarEstadoContract.php',
        method: 'GET',
        data: { var1: var1, opcao: opcao }, // Passando variáveis na requisição
        success: function (data) {
            console.log(data);
            updateContracts(1);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}

function sendAvaliation(id)
{
     // Lê o valor do rating selecionado
     let rating;
     const ratings = document.getElementsByName('rating');
     for (let i = 0; i < ratings.length; i++) {
         if (ratings[i].checked) {
             rating = ratings[i].value;
             break;
         }
     }

     // Lê o valor do textarea
     const comentario = document.getElementById('message-text').value;

     $.ajax({
        url: '../src/Handlers/guardarAvaliacaoEnviadas.php',
        method: 'GET',
        data: { rating: rating, comentario: comentario, id: id }, // Passando variáveis na requisição
        success: function (data) {
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });

     // Exibe os valores no console (ou faça qualquer outra coisa com esses valores)
     console.log('Classificação selecionada:', rating);
     console.log('Comentário:', comentario);
}

function sendAvaliation2(id)
{
     // Lê o valor do rating selecionado
     let rating;
     const ratings = document.getElementsByName('rating');
     for (let i = 0; i < ratings.length; i++) {
         if (ratings[i].checked) {
             rating = ratings[i].value;
             break;
         }
     }

     // Lê o valor do textarea
     const comentario = document.getElementById('message-text').value;

     $.ajax({
        url: '../src/Handlers/guardarAvaliacaoAceites.php',
        method: 'GET',
        data: { rating: rating, comentario: comentario, id: id }, // Passando variáveis na requisição
        success: function (data) {
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });

     // Exibe os valores no console (ou faça qualquer outra coisa com esses valores)
     console.log('Classificação selecionada:', rating);
     console.log('Comentário:', comentario);
}


function AvModalDataSend(name, id) {
    // O HTML a ser inserido
    const htmlContent = `
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Avaliar @${name}</h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group d-flex my-auto">
                <label for="recipient-name" class="w-15 my-auto col-form-label">Classificação:</label>
                <div class="rating my-auto">
                    <input value="5" name="rating" id="star5" type="radio">
                    <label for="star5"></label>
                    <input value="4" name="rating" id="star4" type="radio">
                    <label for="star4"></label>
                    <input value="3" name="rating" id="star3" type="radio">
                    <label for="star3"></label>
                    <input value="2" name="rating" id="star2" type="radio">
                    <label for="star2"></label>
                    <input value="1" name="rating" id="star1" type="radio">
                    <label for="star1"></label>
                </div>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Comentário:</label>
                <textarea class="form-control" style="height: 150px;" placeholder="Deixe um pequeno comentário de como foi trabalhar com @${name}..." id="message-text"></textarea>
                <div class="mt-2 opacity-9">
                    <p class="p-0 m-0 text-xs text-success">Caso já tenha uma avaliação a este utilizador a avaliação será substituida!</p>
                    <p class="p-0 m-0 text-xs text-danger">Para remover a avaliação basta enviar em branco.</p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" onclick="sendAvaliation(${id})" data-bs-dismiss="modal" class="btn bg-gradient-primary">Enviar</button>
        </div>
    `;

    // Inserindo o HTML na div com o id avaliarModalBody
    document.getElementById('avaliarModalBody').innerHTML = htmlContent;
}



function AvModalDataAccept(name, id) {
    // O HTML a ser inserido
    const htmlContent = `
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Avaliar @${name}</h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group d-flex my-auto">
                <label for="recipient-name" class="w-15 my-auto col-form-label">Classificação:</label>
                <div class="rating my-auto">
                    <input value="5" name="rating" id="star5" type="radio">
                    <label for="star5"></label>
                    <input value="4" name="rating" id="star4" type="radio">
                    <label for="star4"></label>
                    <input value="3" name="rating" id="star3" type="radio">
                    <label for="star3"></label>
                    <input value="2" name="rating" id="star2" type="radio">
                    <label for="star2"></label>
                    <input value="1" name="rating" id="star1" type="radio">
                    <label for="star1"></label>
                </div>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Comentário:</label>
                <textarea class="form-control" style="height: 150px;" placeholder="Deixe um pequeno comentário de como foi trabalhar com @${name}..." id="message-text"></textarea>
                <div class="mt-2 opacity-9">
                    <p class="p-0 m-0 text-xs text-success">Caso já tenha uma avaliação a este utilizador a avaliação será substituida!</p>
                    <p class="p-0 m-0 text-xs text-danger">Para remover a avaliação basta enviar em branco.</p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" onclick="sendAvaliation2(${id})" data-bs-dismiss="modal" class="btn bg-gradient-primary">Enviar</button>
        </div>
    `;

    // Inserindo o HTML na div com o id avaliarModalBody
    document.getElementById('avaliarModalBody').innerHTML = htmlContent;
}
