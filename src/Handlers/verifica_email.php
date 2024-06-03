<?php
// verifica_email.php

header('Content-Type: application/json');

use App\Controllers\AuthController;

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identity = $_POST['identity'];
    $authController = new AuthController();
    $result = $authController->verificaEmail($identity); 
    if ($result) {
        echo json_encode(array('status' => 'existe'));
    } else {
        echo json_encode(array('status' => 'nao_existe'));
    }
} else {
    echo json_encode('Método não permitido');
}

$conn->close();
