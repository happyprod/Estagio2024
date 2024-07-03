<?php

require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\UserController;
use App\Models\User;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// Cria instâncias do modelo e do controlador
$model = new User($db);
$controller = new UserController($model);

// Verifica se as variáveis foram passadas na requisição
if(isset($_GET['var1']) && isset($_GET['var2']) && isset($_GET['var3'])) {
    // Recupera os valores das variáveis
    $count = $_GET['var1'];
    $id = $_GET['var2'];
    $p_id = $_GET['var3'];
} else {
    // Se as variáveis não foram passadas, retorne um erro ou uma mensagem adequada
    echo "Erro: Variáveis não foram passadas na requisição.";
}


// Obtém os dados
$data = $controller->getEditarImagens($count, $p_id);


// Gera o HTML
$html = '';
foreach ($data as $row) {
    $pi_imagem = htmlspecialchars($row->image);
    $ordem = htmlspecialchars($row->ordem);

    $html .= '  
                <div class="col-4 mb-3 imageContainer" data-id="' . $ordem . '">
                    <a class="delete-image" onclick="setupDeleteLinks()" data-id="' . $ordem . '">
                        <i class="position-absolute mt-2 p-1 bg-danger rounded-circle" style="opacity: 77.5%; margin-left: 12em;">
                            <svg style="width: 2em; height: 2em; color: white;" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 32 32">
                                <path d="M 15 4 C 14.476563 4 13.941406 4.183594 13.5625 4.5625 C 13.183594 4.941406 13 5.476563 13 6 L 13 7 L 7 7 L 7 9 L 8 9 L 8 25 C 8 26.644531 9.355469 28 11 28 L 23 28 C 24.644531 28 26 26.644531 26 25 L 26 9 L 27 9 L 27 7 L 21 7 L 21 6 C 21 5.476563 20.816406 4.941406 20.4375 4.5625 C 20.058594 4.183594 19.523438 4 19 4 Z M 15 6 L 19 6 L 19 7 L 15 7 Z M 10 9 L 24 9 L 24 25 C 24 25.554688 23.554688 26 23 26 L 11 26 C 10.445313 26 10 25.554688 10 25 Z M 12 12 L 12 23 L 14 23 L 14 12 Z M 16 12 L 16 23 L 18 23 L 18 12 Z M 20 12 L 20 23 L 22 23 L 22 12 Z" fill="rgb(255, 255, 255)"></path>
                            </svg>
                        </i>
                    </a>
                    <img src="http://localhost/Estagio2024/public/users/' . $id . '/' . $pi_imagem . '" data-id="' . $ordem . '" class="ui-state-default d-block rounded" style="width:240px; height: 180px;" alt="...">
                </div>';
}

$html2 = '';
$html2 .= '
<div class="col-4 mb-3 fixed-item" id="fixedItem" style="width:263px; height: 180px;">
<label for="fileInput" class="w-100 h-100">
        <div class="card card-plain w-100 h-100 border">
            <div class="card-body d-flex flex-column justify-content-center text-center" style="width:100%; height: 100%;">
                <i class="fa fa-plus text-secondary mb-3" aria-hidden="true"></i>
                <h5 class=" text-secondary"> Adicionar Imagem </h5>
            </div>
        </div>
</label>
<input id="fileInput"  accept=".jpg, .jpeg, .png, .gif" onclick="handleButtonClick()" type="file" style="display: none;">
</div>';


// Retorna o HTML
echo $html;
echo $html2;

echo '  <script>    
                    setupDeleteLinks();
                    limparImagensData();   
        </script>';