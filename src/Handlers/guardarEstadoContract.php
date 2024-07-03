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

// Verifica se as variáveis foram passadas na requisição
if (isset($_GET['var1']) && isset($_GET['opcao'])) {
    $idContract = $_GET['var1'];
    $opcao = $_GET['opcao'];


    if ($opcao == 2) {
        $controller->recusarContract($idContract);
    } else if ($opcao == 1) {
        $controller->aceitarContract($idContract);
    }
    
} else {
    echo "Erro: Variáveis não foram passadas.";
}