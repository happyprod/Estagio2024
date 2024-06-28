<?php

require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\HomeController;
use App\Models\Home;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// Cria instâncias do modelo e do controlador
$model = new Home($db);
$controller = new HomeController($model);

// Verifica se as variáveis foram passadas na requisição
if (isset($_GET['var1']) && isset($_GET['var2'])) {
    $idUtilizador = $_GET['var1'];
    $opcao = $_GET['var2'];


    if ($opcao == 1) {
        $controller->removerFollow($idUtilizador);
    } else if ($opcao == 2) {
        $controller->adicionarFollow($idUtilizador);
    }
    
} else {
    echo "Erro: Variáveis não foram passadas.";
}
