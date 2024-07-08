<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\HomeController;
use App\Models\Home;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// Cria instâncias do modelo e do controlador
$model = new Home($db);
$controller = new HomeController($model);


// Obtém o número de projetos a serem carregados e a partir de qual ponto
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = 3;  // Quantidade de projetos por vez

$result = $controller->getProjectsFeed($limit, $offset);

$projects = array();

if (count($result)) {
    foreach ($result as $row) {

        $fotodeperfil = $row['picture'];

        // Obtém a extensão do arquivo em letras minúsculas
        $extension = strtolower(pathinfo($fotodeperfil, PATHINFO_EXTENSION));

        // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

        // Verifica se a extensão está na lista de extensões permitidas
        if (in_array($extension, $allowed_extensions)) {
            $google_image = false;
        } else {
            $google_image = true;
        }

        if ($google_image == false) {
            $row['picture'] = '../public/users/' . $row['user_id'] . '/' . $fotodeperfil;
        } else {
            $row['picture'] = $fotodeperfil;
        }

        $p_id = $row['id'];


        $result2 = $controller->getProjectsImagesFeed($p_id);


        $imageList = '';

        if (count($result2)) {
            $count = 1;
            foreach ($result2 as $row2) {
                $imagem = $row2['image'];

                if ($count == 1) {
                    $imageList .= ' <div class="carousel-item active">
                    <img src="../public/users/' . $row['id_founder'] . '/' . $imagem . '" class=" img-fluid border-radius-xl w-100" style="object-fit: cover; background-position-y: 50%; height: auto;">
                    </div>';
                } else {
                    $imageList .= ' <div class="carousel-item">
                    <img src="../public/users/' . $row['id_founder'] . '/' . $imagem . '" class=" img-fluid border-radius-xl w-100" style="object-fit: cover; background-position-y: 50%; height: auto;">
                    </div>';
                }

                $row['imageNum'] = $count;
                $count++;
            }
        }

        $row['image'] = $imageList;

        $projects[] = $row;
    }
}

// Retorna os projetos em formato JSON
echo json_encode($projects);

