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