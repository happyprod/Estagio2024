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
if (isset($_GET['var1'])) {
    $p_id = $_GET['var1'];
} else {
    // Se as variáveis não foram passadas, retorne um erro ou uma mensagem adequada
    echo "Erro: Variáveis não foram passadas na requisição.";
    exit;
}

// Obtém os dados
$data = $controller->getEstatisticasProjeto($p_id);