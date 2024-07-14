function perfilAtual() {    
    $.ajax({
        url: 'http://localhost/ConcertPulse/src/Handlers/getPerfilAtual.php',
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
