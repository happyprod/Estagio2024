<?php
// Definindo o ambiente da aplicação (development ou production)
define('APP_ENV', 'development');

// URL base da aplicação
define('BASE_URL', '../public/index');

// Constantes globais
define('APP_NAME', 'Concert Pulse');
define('APP_VERSION', '1.0.0');

// Configurações de e-mail
define('EMAIL_HOST', 'smtp.gmail.com');
define('EMAIL_PORT', 587);
define('EMAIL_USERNAME', 'concertpulse.ese@gmail.com');
define('EMAIL_PASSWORD', 'ahgu ovhv hmtc olow');
define('EMAIL_FROM', 'concertpulse.ese@gmail.com');


//Chaves de API
define('API_KEY', 'minha_chave_api');
define('API_SECRET', 'meu_segredo_api');


// Configurações de sessão
ini_set('session.cookie_lifetime', 86400); // 1 dia
ini_set('session.gc_maxlifetime', 86400);  // 1 dia
session_name('minha_sessao');


