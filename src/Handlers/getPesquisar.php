<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\SearchController;
use App\Models\Search;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// Cria instâncias do modelo e do controlador
$model = new Search($db);
$controller = new SearchController($model);

// Verifica se as variáveis foram passadas na requisição
if (isset($_GET['var1'])) {
    // Recupera os valores das variáveis
    $searchBar = $_GET['var1'];
} else {
    // Se as variáveis não foram passadas, retorne um erro ou uma mensagem adequada
    echo "Erro: Variáveis não foram passadas na requisição.";
}

// Obtém os dados
$data = $controller->getPesquisarBySearch($searchBar);

// Gera o HTML
$html = '';
foreach ($data as $row) {
    $acc_id = $row["id"];
    $acc_type = $row["identity"];
    $acc_local = $row["location"];
    $acc_idName = $row["id_name"];
    $acc_name = $row["name"];
    $acc_picture = $row["picture"];


    if ($acc_type == 1) {
        $acc_type = "Promotor";
    } else if ($acc_type == 2) {
        $acc_type = "Artista";
    } else if ($acc_type == 3) {
        $acc_type = "Agente de Booking";
    } else if ($acc_type == 4) {
        $acc_type = "Agencia de booking";
    } else {
        $acc_type = "Evento";
    }

    $html .= '
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card profile-card">
                <img src="http://localhost/Estagio2024/public/users/' . $acc_id . '/' . $acc_picture . '" class="card-img-top" alt="Imagem do Perfil">
                <div class="card-body">
                    <h5 class="card-title">@' . $acc_idName . '</h5>
                    <p class="my-1 ms-1 mt-3 p-0 text-sm text-center" style="height: 20px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                        <strong>Nome: </strong> ' . $acc_name . '<br>
                    </p>
                    <p class="my-1 ms-1 p-0 text-sm text-center" style="height: 20px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                        <strong>Função: </strong>' . $acc_type . '<br>
                    </p>
                    <p class="my-1 ms-1 p-0 mb-3 text-sm text-center" style="height: 20px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                        <strong>Localização: </strong><a href="https://www.google.pt/maps/place/' . $acc_local . '" target="_BLANK"> ' . $acc_local . '</a>
                    </p>
                    <a href="utilizadores/' . $acc_id . '.php" class="btn btn-primary">Ver Perfil</a>
                </div>
            </div>
        </div>';
}

// Retorna o HTML
echo $html;

