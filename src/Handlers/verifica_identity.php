<?php
// verifica_identity.php

header('Content-Type: application/json');

use App\Controllers\AuthController;

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identity = $_POST['identity'];
    $authController = new AuthController(); // Supondo que AuthController seja uma classe
    $result = $authController->verificaIdentity($identity); // Supondo que verificaEmail() retorna true se o email existe
    if ($result) {
        echo json_encode(array('status' => 'existe'));
    } else {
        echo json_encode(array('status' => 'nao_existe'));
    }
} else {
    echo json_encode('Método não permitido');
}

$conn->close();
