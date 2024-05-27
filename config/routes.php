<?php
$routes = [
    '/' => 'HomeController@index',
    '/profile/(\d+)' => 'PageController@show',
    '/contact' => 'PageController@contact',
    '/loginartists' => 'AuthController@login',
    '/logout' => 'AuthController@logout',
    '/register' => 'AuthController@register',
];

function route($url, $routes)
{
    if (array_key_exists($url, $routes)) {
        list($controller, $method) = explode('@', $routes[$url]);
        require_once "../src/Controllers/{$controller}.php";
        $controllerInstance = new $controller();
        $controllerInstance->$method();
    } else {
        // Página 404
        echo "404 - Página não encontrada";
    }
}
