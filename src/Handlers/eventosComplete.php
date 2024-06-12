<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\UserController;
use App\Models\User;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// Verifica se foi recebido o parâmetro 'id_name' via POST
if (isset($_POST['id_name'])) {

    $pesquisa = $_POST['id_name'];

    // Cria instâncias do modelo e do controlador
    $model = new User($db);
    $controller = new UserController($model);

    $data = $controller->getEventUsersComplete($pesquisa);

    $users = array();

    // Verifica se a consulta retornou algum resultado
    foreach ($data as $row) {
        // Log para verificar os dados retornados
        error_log(print_r($row, true));

        // Adiciona os resultados ao array
        $users[] = array(
            'id_name' => htmlspecialchars($row->id_name),
            'name' => htmlspecialchars($row->name),
            'picture' => htmlspecialchars($row->picture) // Supondo que você também tenha a coluna 'picture' na tabela
        );
    }

    // Retorna os usuários em formato JSON
    echo json_encode($users);
    
} else {
    // Se 'id_name' não foi fornecido via POST
    echo json_encode(array());
}
