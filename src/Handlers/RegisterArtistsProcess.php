<?php
// Conectar ao banco de dados
require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\UserController;
use App\Models\User;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// Verifica se houve um POST válido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];
    $identity = $_POST['identity'];
    $location = $_POST['localizacao'];
    $name = $_POST['name'];
    $selectedType = $_POST['selectedType'];

    // No arquivo guardar_sobre.php
    $userModel = new User($db);
    $userController = new UserController($userModel);

    // Chama o método para registrar o usuário
    $userController->register($email, $password, $identity, $location, $name, $selectedType);
}