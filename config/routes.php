<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Certifique-se de que o autoload do Composer está incluído

use App\Controllers\AuthController;

$routes = [
    '/' => 'HomeController@index',
    '/profile/(\d+)' => 'PageController@show',
    '/contact' => 'PageController@contact',
    '/registerartists' => [AuthController::class, 'showRegisterForm'],
    '/loginartists' => [AuthController::class, 'showLoginForm'],
    '/logout' => [AuthController::class, 'logout'],
    '/register' => 'AuthController@register',
];

function route($url, $routes) {
    foreach ($routes as $route => $controllerAction) {
        $routePattern = "@^" . preg_replace('/\\\d\+/', '\d+', $route) . "$@";
        if (preg_match($routePattern, $url, $matches)) {
            if (is_string($controllerAction)) {
                list($controller, $method) = explode('@', $controllerAction);
                require_once "../src/Controllers/{$controller}.php";
                $controllerInstance = new $controller();
            } else {
                list($controller, $method) = $controllerAction;
                $controllerInstance = new $controller();
            }
            array_shift($matches); // Remove o primeiro elemento, que é o URL completo
            call_user_func_array([$controllerInstance, $method], $matches);
            return;
        }
    }
    // Página 404
    echo "404 - Página não encontrada";
}

// Exemplo de uso:
// route('/loginartists', $routes);
