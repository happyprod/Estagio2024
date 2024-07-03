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
    if(isset($_GET['var1']) && isset($_GET['var2'])) {
        $id_projeto = $_GET['var1'];
        $opcao = $_GET['var2'];

        
        if ($opcao == 1)
        {
            $data = $controller->ApagarProjectLikes($id_projeto);
        } else if ($opcao == 2){
            echo 'deu';
            $data = $controller->guardarProjectLikes($id_projeto);

        }

    } else {
        echo "Erro: Variáveis não foram passadas.";
    }


