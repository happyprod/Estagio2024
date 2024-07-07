function pesquisarSend()
{
    let searchBar = document.getElementById('searchBar').value;
    console.log(searchBar);
    
    
    $.ajax({
        url: '../src/Handlers/getPesquisar.php',
        method: 'GET',
        data: { var1: searchBar }, // Passando variáveis na requisição
        success: function (data) {
            $('#userShow').html(data);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}