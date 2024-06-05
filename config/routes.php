<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Certifique-se de que o autoload do Composer está incluído

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;


$routes = [
    '/home' => [HomeController::class, 'showHome'],
    '/perfil' => [UserController::class, 'show'],
    '/utilizadores/(\d+\.php)' => [UserController::class, 'show'], // Corrigido o padrão de rota
    '/editarPerfil' => [UserController::class, 'showEditar'],
    '/contact' => 'PageController@contact',
    '/registerartists' => [AuthController::class, 'showRegisterForm'],
    '/loginartists' => [AuthController::class, 'showLoginForm'],
    '/logout' => [AuthController::class, 'logout'],
    '/register' => 'AuthController@register',
];

function route($url, $routes) {
    foreach ($routes as $route => $controller) {
        // Verifica se a URL corresponde ao padrão da rota
        if (preg_match("~^$route$~", $url, $matches)) {
            // Remove a rota correspondente da URL
            $url = preg_replace("~^$route$~", '', $url);
            // Remove a parte vazia do início da URL
            $url = ltrim($url, '/');
            
            // Se a rota corresponder, chama o controlador e o método correspondentes
            if (is_string($controller)) {
                list($controller, $method) = explode('@', $controller);
                $controllerPath = "../src/Controllers/{$controller}.php";
                if (file_exists($controllerPath)) {
                    require_once $controllerPath;
                    $controllerInstance = new $controller();
                } else {
                    echo "404 - Página não encontrada";
                    return;
                }
            } else {
                list($controller, $method) = $controller;
                $controllerInstance = new $controller();
            }

            // Passa o ID do usuário, se houver, como parâmetro para o método
            if (!empty($matches[1])) {
                $controllerInstance->$method($matches[1]);
            } else {
                $controllerInstance->$method();
            }
            return; // Encerra a função depois de encontrar a rota correspondente
        }
    }
    
    // Se nenhuma rota corresponder, exibe a página 404
    echo "404 - Página não encontrada";
}

