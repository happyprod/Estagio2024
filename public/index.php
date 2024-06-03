<?php
require_once '../config/config.php';
require_once '../config/routes.php';

session_start();

$url = $_SERVER['REQUEST_URI'];

// Encontra a posição da última ocorrência de "/public/"
$pos = strrpos($url, "/public/");

// Se encontrar a string "/public/", obtém a substring a partir dessa posição
if ($pos !== false) {
    $url = '/' . substr($url, $pos + strlen("/public/"));
} else {
}


// Chamar a função de roteamento com a URL atual e as rotas definidas
route($url, $routes);
