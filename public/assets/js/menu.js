function perfilAtual() {    
    $.ajax({
        url: 'http://localhost/Estagio2024/src/Handlers/getPerfilAtual.php',
        method: 'GET',
        data: {}, // Passando variáveis na requisição
        success: function (data) {
            $('#perfilAtual').html(data);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}

$(document).ready(function() {
    perfilAtual();
});
