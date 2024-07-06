<?php

require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\ContractsController;
use App\Models\Contracts;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();


// Cria instâncias do modelo e do controlador
$model = new Contracts($db);
$controller = new ContractsController($model);

// Verifica se foi recebido o parâmetro 'id_name' via POST
if (isset($_GET['id'])) {

    $rating = $_GET['rating'];
    $comentario = $_GET['comentario'];
    $id = $_GET['id'];

    $controller->guardarReview($rating, $comentario, $id);

}