<?php
require_once '../src/Helpers/init.php';
require_once '../src/Helpers/functions.php';

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
