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

if ($_GET['var2'] != '')
{
    // Verifica se as variáveis foram passadas na requisição
    if(isset($_GET['var1']) && isset($_GET['var2']) && isset($_GET['var3'])) {
        $p_id = $_GET['var1'];
        $text = $_GET['var2'];
        $resposta = $_GET['var3'];

        $data = $controller->guardarParentComments($p_id, $text, $resposta);

    } else if(isset($_GET['var1']) && isset($_GET['var2'])) {
            // Recupera os valores das variáveis
            $p_id = $_GET['var1'];
            $text = $_GET['var2'];
        
            $data = $controller->guardarComments($p_id, $text);
    }
}


