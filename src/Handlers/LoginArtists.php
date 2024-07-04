<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\AuthController;
use App\Models\Auth;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// Cria instâncias do modelo e do controlador
$model = new Auth($db);
$controller = new AuthController($model);



// Verifique se os dados foram enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Proteção contra SQL Injection (recomendado usar prepared statements)
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $data = $controller->LoginAccount($email, $password);

}

