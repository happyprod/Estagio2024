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

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user_id = $_SESSION['user_id'];

$row_infos = $controller->getAccountById($user_id);

if ($row_infos) {
    $acc_id = $row_infos["id"];
    $acc_type = $row_infos["identity"];
    $acc_idName = $row_infos["id_name"];
    $acc_name = $row_infos["name"];
    $acc_picture = $row_infos["picture"];
} else {
    // Tratar o caso onde não há informações adicionais encontradas
    die("No additional account information found for the given ID.");
}

if ($acc_type == 1) {
    $acc_type = "Promotor";
} else if ($acc_type == 2) {
    $acc_type = "Artista";
} else if ($acc_type == 3) {
    $acc_type = "Agente de Booking";
} else if ($acc_type == 4) {
    $acc_type = "Agencia de booking";
} else {
    $acc_type = "Evento";
}
$html = '';

$html .= '

            <!-- User Profile Item -->
            <li class="nav-item">
                <div class="d-flex nav-link align-items-center">
                    <div class="">
                        <img class="rounded-circle" src="http://localhost/Estagio2024/public/users/' . $acc_id . '/' . $acc_picture . '" style="height: 40px; width: 40px; object-fit: cover;" alt="Imagem do Perfil">
                    </div>
                    <div class="d-flex ms-1 flex-column">
                        <h6 style="font-size: 15px;" class="title mb-0">@' . $acc_idName . '</h6>
                        <p style="font-size: 12px;" class="text-muted mb-0 "">' . $acc_type . '</p>
                    </div>
                </div>
            </li>
    ';

echo $html;
