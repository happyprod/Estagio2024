<?php
require_once '../src/Helpers/init.php';
require_once '../src/Helpers/functions.php';

$url = getCurrentUrl();

// Chamar a função de roteamento com a URL atual e as rotas definidas
route($url, $routes);
