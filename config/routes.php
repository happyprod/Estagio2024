<?php
require_once '../src/Helpers/init.php';
require_once '../src/Helpers/functions.php';
require_once __DIR__ . '/../vendor/autoload.php'; // Certifique-se de que o autoload do Composer está incluído

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\ChatController;
use App\Controllers\ContractsController;
use App\Controllers\SearchController;
use App\Models\User;
use App\Models\Home;
use App\Models\Message;
use App\Models\Contracts;
use App\Models\Search;
use App\Helpers\Database;
use App\Models\Auth;

$routes = [
    '/home' => [HomeController::class, 'showHome'],
    '/perfil' => [UserController::class, 'show'],
    '/utilizadores/(\d+\.php)' => [UserController::class, 'show'], // Corrigido o padrão de rota
    '/editarPerfil' => [UserController::class, 'showEditar'],
    '/chat' => [ChatController::class, 'showChat'],
    '/contratos' => [ContractsController::class, 'showContratos'],
    '/contact' => 'PageController@contact',
    '/register' => [AuthController::class, 'showRegisterForm'],
    '/login' => [AuthController::class, 'showLoginForm'],
    '/pesquisar' => [SearchController::class, 'showPesquisar'],
    '/logout' => [AuthController::class, 'logout']
];

function route($url, $routes) {
    foreach ($routes as $route => $controller) {
        if (preg_match("~^$route$~", $url, $matches)) {
            $url = preg_replace("~^$route$~", '', $url);
            $url = ltrim($url, '/');
            
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
                $db = Database::connect(); // Conectar ao banco de dados
                
                // Verificar qual controlador está sendo instanciado e passar o modelo correto
                if ($controller === ChatController::class) {
                    $model = new Message($db); // Passar a conexão ao modelo Message para ChatController
                } else if ($controller === UserController::class) {
                    $model = new User($db); // Passar a conexão ao modelo User para outros controladores
                } else if ($controller === HomeController::class) {
                    $model = new Home($db); // Passar a conexão ao modelo Home
                } else if ($controller === ContractsController::class) {
                    $model = new Contracts($db); // Passar a conexão ao modelo Contracts
                } else if ($controller === AuthController::class) {
                    $model = new Auth($db); // Passar a conexão ao modelo Contracts
                } else if ($controller === SearchController::class) {
                    $model = new Search($db); // Passar a conexão ao modelo Search
                }
                
                $controllerInstance = new $controller($model); // Passar o modelo ao controlador
            }

            if (!empty($matches[1])) {
                $controllerInstance->$method($matches[1]);
            } else {
                $controllerInstance->$method();
            }
            return;
        }
    }
    
    echo "404 - Página não encontrada";
}

// Exemplo de uso
$url = $_SERVER['REQUEST_URI'];
$pos = strrpos($url, "/public/");
if ($pos !== false) {
    $url = '/' . substr($url, $pos + strlen("/public/"));
}

