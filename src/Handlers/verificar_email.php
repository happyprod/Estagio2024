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

// Verifica se foi recebido o parâmetro 'id_name' via POST
if (isset($_POST['id_name'])) {

    // Prepara a declaração SQL para buscar o usuário com o id_name exato fornecido
    $id_name = $_POST['id_name'];

    $user = $controller->getAccountByIdName($id_name);


    // Verifica se a consulta retornou algum resultado
    if (count($user)) {
        // Retorna os dados do usuário em formato JSON
        echo json_encode(
            array(
                'status' => 'valid',
                'name' => $user['name'],
                'picture' => $user['picture'] // Supondo que você também tenha a coluna 'picture' na tabela
            )
        );
    } else {
        // User não encontrado
        echo json_encode(array('status' => 'invalid'));
    }
} else {
    // Se 'id_name' não foi fornecido via POST
    echo json_encode(array('status' => 'invalid'));
}
