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
        $identificacao = $_POST['identificacao'];
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $password = $_POST['password'];
        $localizacao = $_POST['localizacao'];
        $selectedType = $_POST['selectedType'];

        // Chame o método do controlador para fazer login
        $data = $controller->ResgisterAccount($identificacao, $email, $nome, $password, $localizacao, $selectedType);

        echo json_encode($data); // Retorna os dados como JSON
        
    } else {
        echo "Erro: Variáveis não foram passadas.";
    }
} else {
    echo "Erro: Método de requisição inválido.";
}
