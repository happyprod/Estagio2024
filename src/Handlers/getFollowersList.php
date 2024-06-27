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

// Verifica se as variáveis foram passadas na requisição
if (isset($_GET['var1']) && isset($_GET['var2'])) {
    // Recupera os valores das variáveis
    $id = $_GET['var1'];
    $option = $_GET['var2'];
} 
// Verifica se as variáveis foram passadas na requisição
if (isset($_GET['var1']) && isset($_GET['var2']) && isset($_GET['var3'])) {
    // Recupera os valores das variáveis
    $id = $_GET['var1'];
    $option = $_GET['var2'];
    $id_name_user_search = $_GET['var3'];
}


$html = '';

if ($option == 'open') {
$followers_list = $controller->getFollowersList($id);

    foreach ($followers_list as $row) {
        $fl_id = htmlspecialchars($row->id);
        $fl_picture = htmlspecialchars($row->picture);
        $fl_id_name = htmlspecialchars($row->id_name);
        $fl_type = htmlspecialchars($row->type);
        $fl_identidadeRow = htmlspecialchars($row->identity);

        $fl_identidade = $fl_identidadeRow;

        if ($fl_identidade == 1) {
            $fl_identidade = "Promotor";
        } else if ($fl_identidade == 2) {
            $fl_identidade = "Artista";
        } else if ($fl_identidade == 3) {
            $fl_identidade = "Agente de Booking";
        } else if ($fl_identidade == 4) {
            $fl_identidade = "Agencia de booking";
        } else {
            $fl_identidade = "Evento";
        }

        // Obtém a extensão do arquivo em letras minúsculas
        $extension = strtolower(pathinfo($fl_picture, PATHINFO_EXTENSION));

        // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

        // Verifica se a extensão está na lista de extensões permitidas
        $google_image = !in_array($extension, $allowed_extensions);

        $html .= '<div class="following-item w-100 p-3 mb-3 rounded shadow-sm">';
        $html .= '    <div class="row align-items-center">';
        $html .= '        <div class="col-2 text-center">';
        $html .= '            <img ';
        if ($google_image) {
            $html .= 'src="' . $fl_picture . '"';
        } else {
            $html .= 'src="http://localhost/Estagio2024/public/users/' . $fl_id . '/' . $fl_picture . '"';
        }
        $html .= ' alt="profile_image" class="rounded-circle img-fluid shadow-sm" style="height: 50px; width: 50px; object-fit: cover;">';
        $html .= '        </div>';
        $html .= '        <div class="col-9">';
        $html .= '            <a href="' . $fl_id . '.php"><h6 class="title mb-1">@' . $fl_id_name . '</h6></a>';
        $html .= '            <p class="text-muted mb-0 text-sm" style="margin-top: -0.2em;">' . $fl_identidade . ' - ' . $fl_type . '</p>';
        $html .= '        </div>';
        $html .= '    </div>';
        $html .= '</div>';
    }
} else if ($option == 'search')
{

$followers_list = $controller->getFollowersListSearch($id, $id_name_user_search);

    foreach ($followers_list as $row) {
        $fl_id = htmlspecialchars($row->id);
        $fl_picture = htmlspecialchars($row->picture);
        $fl_id_name = htmlspecialchars($row->id_name);
        $fl_type = htmlspecialchars($row->type);
        $fl_identidadeRow = htmlspecialchars($row->identity);

        $fl_identidade = $fl_identidadeRow;

        if ($fl_identidade == 1) {
            $fl_identidade = "Promotor";
        } else if ($fl_identidade == 2) {
            $fl_identidade = "Artista";
        } else if ($fl_identidade == 3) {
            $fl_identidade = "Agente de Booking";
        } else if ($fl_identidade == 4) {
            $fl_identidade = "Agencia de booking";
        } else {
            $fl_identidade = "Evento";
        }

        // Obtém a extensão do arquivo em letras minúsculas
        $extension = strtolower(pathinfo($fl_picture, PATHINFO_EXTENSION));

        // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

        // Verifica se a extensão está na lista de extensões permitidas
        $google_image = !in_array($extension, $allowed_extensions);

        $html .= '<div class="following-item w-100 p-3 mb-3 rounded shadow-sm">';
        $html .= '    <div class="row align-items-center">';
        $html .= '        <div class="col-2 text-center">';
        $html .= '            <img ';
        if ($google_image) {
            $html .= 'src="' . $fl_picture . '"';
        } else {
            $html .= 'src="http://localhost/Estagio2024/public/users/' . $fl_id . '/' . $fl_picture . '"';
        }
        $html .= ' alt="profile_image" class="rounded-circle img-fluid shadow-sm" style="height: 50px; width: 50px; object-fit: cover;">';
        $html .= '        </div>';
        $html .= '        <div class="col-9">';
        $html .= '            <a href="' . $fl_id . '.php"><h6 class="title mb-1">@' . $fl_id_name . '</h6></a>';
        $html .= '            <p class="text-muted mb-0 text-sm" style="margin-top: -0.2em;">' . $fl_identidade . ' - ' . $fl_type . '</p>';
        $html .= '        </div>';
        $html .= '    </div>';
        $html .= '</div>';
    }
}


echo $html;