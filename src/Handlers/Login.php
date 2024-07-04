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


    if (isset($_GET['email']) && isset($_GET['password'])) {
        // Receba os dados do formulário
        $email = $_GET['email'];
        $password = $_GET['password'];
        $remember = $_GET['remember'];


        $data = $controller->LoginAccount($email, $password, $remember);

    } else {
        echo "Erro: Variáveis não foram passadas.";
    }
}
