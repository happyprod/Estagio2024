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
if (isset($_GET['var1']) && isset($_GET['var2'])) {
    $idAcc = $_GET['var1'];
    $message = $_GET['var2'];

    $data = $controller->guardarAssuntoChat($idAcc, $message);
} else {
    echo "Erro: Variáveis não foram passadas.";
}
