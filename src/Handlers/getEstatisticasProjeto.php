<?php

require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\UserController;
use App\Models\User;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// Cria instâncias do modelo e do controlador
$model = new User($db);
$controller = new UserController($model);

// Verifica se as variáveis foram passadas na requisição
if (isset($_GET['var1'])) {
    $p_id = $_GET['var1'];
} else {
    // Se as variáveis não foram passadas, retorne um erro ou uma mensagem adequada
    echo "Erro: Variáveis não foram passadas na requisição.";
}


// Obtém os dados
$data = $controller->getEstatisticasProjeto($p_id);


// Gera o HTML
$html = '';
foreach ($data as $row) {
}

    $html .= '  
    
        <div class="container">
        <!-- Primeiro gráfico de linha -->
        <div class="">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h1 class="lead ms-2" style="font-size: 40px;">Engajamento Orgânico</h1>
            <div class="btn-group mt-3" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary" id="week-btn-line">7 Dias</button>
            <button type="button" class="btn btn-primary" id="month-btn-line">30 Dias</button>
            <button type="button" class="btn btn-primary" id="year-btn-line">1 Ano</button>
            <button type="button" class="btn btn-primary" id="all-btn-line">Tudo</button>
            </div>
        </div>
        <div class="card-body p-3">
            <div class="chart-container" style="height: 500px;">
            <canvas id="chart-line" class="chart-canvas"></canvas>
            </div>
            <div class="ms-1 row text-sm mt-3" style="margin-top: 0em;">
            <div class="col-md-4">
                <h4>Engajamento Orgânico</h4>
                <p class="lead-xs">
                Média Mensal: 0 <br>
                Máximo Semanal: 0 <br>
                Máximo Mensal: 0 <br>
                Total: 0</p>
            </div>
            <div class="col-md-4">
                <h4>Engajamento Não Orgânico</h4>
                <p class="lead-xs">
                Média Mensal: 0 <br>
                Máximo Semanal: 0 <br>
                Máximo Mensal: 0 <br>
                Total: 0</p>
            </div>
            </div>
        </div>
        </div>

        <!-- Segundo gráfico de barras -->
        <div class="mt-6">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <div class="btn-group mt-2" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary" id="week-btn-bar">7 Dias</button>
            <button type="button" class="btn btn-primary" id="month-btn-bar">30 Dias</button>
            <button type="button" class="btn btn-primary" id="year-btn-bar">1 Ano</button>
            <button type="button" class="btn btn-primary" id="all-btn-bar">Tudo</button>
            </div>
            <h1 class="lead ms-2" style="font-size: 40px;">Engajamento Não Orgânico</h1>
        </div>
        <div class="card-body p-3">
            <div class="chart-container" style="height: 500px;">
            <canvas id="chart-bar" class="chart-canvas"></canvas>
            </div>

            <div class="mt-2 row text-sm mt-3" style="margin-left: 6.5em;">
            <div class="col-md-4 text-justify">
                <h4>Impressões</h4>
                <p class="lead-xs">
                Média Mensal: 0 <br>
                Máximo Semanal: 0 <br>
                Máximo Mensal: 0 <br>
                Total: 0</p>
            </div>

            <div class="col-md-4 text-justify">
                <h4>Gostos</h4>
                <p class="lead-xs">
                Média Mensal: 0 <br>
                Média Semanal: 0 <br>
                Média Diária: 0 <br>
                Total: 0</p>
            </div>

            <div class="col-md-4">
                <h4>Comentários</h4>
                <p class="lead-xs">
                Média Mensal: 0 <br>
                Média Semanal: 0 <br>
                Média Diária: 0 <br>
                Total: 0</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    
    ';


// Retorna o HTML
echo $html;

// Caminho completo para o diretório atual
$dirAtual = __DIR__;

// Caminho completo para o arquivo atual
$arquivoAtual = __FILE__;

echo "Diretório atual: $dirAtual<br>";
echo "Arquivo atual: $arquivoAtual<br>";

// Caminho para o arquivo .js
$filePath = 'http://localhost/redes/public/assets/js/graficos.js';

// Verifica se o arquivo existe
if (file_exists($filePath)) {
    // Lê o conteúdo do arquivo para uma variável
    $conteudoDoArquivo = file_get_contents($filePath);

    // Verifica se foi possível ler o arquivo
    if ($conteudoDoArquivo === false) {
        echo "Erro ao ler o arquivo $filePath.";
    } else {
        echo '<script>' . $conteudoDoArquivo . '</script>';
    }
} else {
    echo "O arquivo $filePath não foi encontrado.";
}
