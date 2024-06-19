<?php
// Conectar ao banco de dados
require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer


use App\Controllers\UserController;
use App\Models\User;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();


// No arquivo guardar_sobre.php
$userModel = new User($db);
$userController = new UserController($userModel);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userController->guardarEditarPerfilSobre($_POST);
}
