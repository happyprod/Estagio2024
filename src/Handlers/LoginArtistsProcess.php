<?php
// processa_formulario.php

header('Content-Type: application/json');
// Código do login

use App\Controllers\AuthController;

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../Helpers/init.php';
    require_once '../Helpers/functions.php';

    // Obter os valores dos campos 'username' e 'password'
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Criar uma instância do controlador
    $authController = new AuthController();
    $authController ->login($username, $password);

}