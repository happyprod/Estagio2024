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

// Obtém os dados
$data = $controller->getEditarSobre();
