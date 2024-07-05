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

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os campos esperados estão presentes
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Receba os dados do formulário
        $email = $_POST['email'];
        $password = $_POST['password'];
        $remember = $_POST['remember'];

        // Chame o método do controlador para fazer login
        $data = $controller->LoginAccount($email, $password, $remember);

        echo json_encode($data); // Retorna os dados como JSON
        
    } else {
        echo "Erro: Variáveis não foram passadas.";
    }
} else {
    echo "Erro: Método de requisição inválido.";
}
