<?php
// verifica_email.php

header('Content-Type: application/json');

use App\Controllers\AuthController;

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $authController = new AuthController(); // Supondo que AuthController seja uma classe
    $result = $authController->verificaEmail($email); // Supondo que verificaEmail() retorna true se o email existe
    if ($result) {
        echo json_encode(array('status' => 'existe'));
    } else {
        echo json_encode(array('status' => 'nao_existe'));
    }
} else {
    echo json_encode('Método não permitido');
}

$conn->close();
