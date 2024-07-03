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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_acc = $_POST['id_acc'];

    // Verifica se o arquivo foi enviado
    if (isset($_FILES['pdfFile']) && $_FILES['pdfFile']['error'] == UPLOAD_ERR_OK) {
        $targetDir = "../../public/users/" . $id_acc . "/";
        $originalName = basename($_FILES["pdfFile"]["name"]);
        $fileType = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        // Verifica se o arquivo é um PDF
        if ($fileType != "pdf") {
            echo json_encode(['status' => 'error', 'message' => 'Apenas arquivos PDF são permitidos.']);
            exit;
        }

        // Garante que o diretório de destino exista
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Gera um nome único para o arquivo se ele já existir
        $nameFile = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 24);
        $nameFile .= '.pdf';
        $targetFile = $targetDir . $nameFile;
        $counter = 1;
        while (file_exists($targetFile)) {
            $nameFile = pathinfo($originalName, PATHINFO_FILENAME) . '_' . $counter . '.' . $fileType;
            $targetFile = $targetDir . $nameFile;
            $counter++;
        }

        // Tenta mover o arquivo enviado para o diretório de destino
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
            $assuntoContract = $_POST['assuntoContract'];
            // Você pode salvar $assuntoContract e o caminho do arquivo no banco de dados aqui, se necessário

            $controller->guardarContract($id_acc, $assuntoContract, $nameFile);

            echo json_encode(['status' => 'success', 'message' => 'O arquivo foi enviado com sucesso.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Desculpe, houve um erro ao enviar seu arquivo.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nenhum arquivo foi enviado.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido.']);
}
