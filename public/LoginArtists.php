<?php
require_once '../src/Helpers/init.php';

$url = getCurrentUrl();

// Chamar a função de roteamento com a URL atual e as rotas definidas
route($url, $routes);
