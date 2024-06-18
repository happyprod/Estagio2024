<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function show($userId)
    {
        require __DIR__ . '/../Views/Users/Perfil.php';
    }

    public function showEditar()
    {
        require __DIR__ . '/../Views/Users/editarPerfil.php';
    }

    public function getEditarImagens($count, $p_id)
    {
        return $this->model->getEditarImagens($count, $p_id);
    }

    public function inserirEvento()
    {
        $switchEvento = isset($_POST['switchEvento']) && $_POST['switchEvento'] == 'true' ? 1 : 0;
        $switchData = isset($_POST['switchData']) && $_POST['switchData'] == 'true' ? 1 : 0;
        $switchBooking = isset($_POST['switchBooking']) && $_POST['switchBooking'] == 'true' ? 1 : 0;
        $switchLocal = isset($_POST['switchLocal']) && $_POST['switchLocal'] == 'true' ? 1 : 0;
        $switchCollabs = isset($_POST['switchCollabs']) && $_POST['switchCollabs'] == 'true' ? 1 : 0;

        $id_projeto = $_POST['id_projeto'] ?? '';

        // Outros dados
        $nomeEvento = $_POST['nomeEvento'] ?? '';
        $identificacaoEvento = $_POST['identificacaoEvento'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $data = $_POST['data'] ?? '';
        $empresaBooking = $_POST['empresaBooking'] ?? '';
        $localizacao = $_POST['localizacao'] ?? '';
        $arrayC_idName = isset($_POST['arrayC_idName']) ? json_decode($_POST['arrayC_idName'], true) : [];

        // Exibe os dados recebidos para debug
        echo "Nome do Evento: " . htmlspecialchars($nomeEvento) . "<br>";
        echo "Identificação do Evento: " . htmlspecialchars($identificacaoEvento) . "<br>";
        echo "Descrição: " . htmlspecialchars($descricao) . "<br>";
        echo "Data: " . htmlspecialchars($data) . "<br>";
        echo "Empresa de Booking: " . htmlspecialchars($empresaBooking) . "<br>";
        echo "Localização: " . htmlspecialchars($localizacao) . "<br>";
        echo "switchBooking: " . htmlspecialchars($switchBooking) . "<br>";
        echo "switchEvento: " . htmlspecialchars($switchEvento) . "<br>";

        // Verificar se os campos obrigatórios estão vazios
        if (empty($localizacao)) {
            $switchLocal = 0;
        }

        if (empty($empresaBooking)) {
            $switchBooking = 0;
        }

        if (empty($identificacaoEvento)) {
            $switchEvento = 0;
        }

        // Verificar se a data está dentro dos últimos 50 anos e não ultrapassa a data atual
        $dataAtual = strtotime(date('Y-m-d'));
        $dataLimite = strtotime('-50 years');
        $dataEvento = strtotime($data);

        if (!empty($data) && ($dataEvento >= $dataLimite && $dataEvento <= $dataAtual)) {
            // Verificar se o evento e o booking existem
            $eventoExiste = false;
            $bookingExiste = false;

            if ($switchBooking == 1) {
                $bookingExiste = $this->model->verificarBooking($empresaBooking);
                echo 'Executou o switchBooking<br>';
                echo 'Resultado de verificarBooking: ' . ($bookingExiste ? '1' : '0') . '<br>';
            } else {
                $bookingExiste = true;
            }

            if ($switchEvento == 1) {
                $eventoExiste = $this->model->verificarEvento($nomeEvento);
                echo 'Executou o switchEvento<br>';
                echo 'Resultado de verificarEvento: ' . ($eventoExiste ? '1' : '0') . '<br>';
            } else {
                $eventoExiste = true;
            }

            echo 'bookingExiste: ' . ($bookingExiste ? '1' : '0') . '<br>';
            echo 'eventoExiste: ' . ($eventoExiste ? '1' : '0') . '<br>';

            if ($eventoExiste && $bookingExiste) {
                // Inserir no banco de dados
                $dadosEvento = array(
                    'nomeEvento' => $nomeEvento,
                    'identificacaoEvento' => $identificacaoEvento,
                    'descricao' => $descricao,
                    'data' => $data,
                    'empresaBooking' => $empresaBooking,
                    'localizacao' => $localizacao,
                    'switchEvento' => $eventoExiste ? '1' : '0',
                    'switchData' => $switchData,
                    'switchBooking' => $bookingExiste ? '1' : '0',
                    'switchLocal' => $switchLocal,
                    'switchCollabs' => $switchCollabs,
                    'id_projeto' => $id_projeto
                );

                $this->model->inserirEvento($dadosEvento);
                echo 'Evento inserido com sucesso<br>';
            } else {
                echo 'Evento';
            }
        } else {
            echo 'Erro: Data inválida<br>';
        }
    }

    public function getEditarInfoProjects($count, $p_id)
    {
        return $this->model->getEditarInfoProjects($count, $p_id);
    }

    public function getEditarInfoProjectsCollabs($count, $p_id)
    {
        return $this->model->getEditarInfoProjectsCollabs($count, $p_id);
    }
    public function getBookingUsersComplete($pesquisa)
    {
        return $this->model->getBookingUsersComplete($pesquisa);
    }

    public function getEstatisticasProjeto($p_id)
    {
        $data = $this->model->getEstatisticasProjeto($p_id);
        $data7dias = $this->model->getEstatisticas7dias($p_id);
        $data30dias = $this->model->getEstatisticas30dias($p_id);
        $data1ano = $this->model->getEstatisticas1ano($p_id);
        $dataTudo = $this->model->getEstatisticastudo($p_id);
        
        $dataVerificarDias = $this->model->getVerificarDias($p_id);


        if (!empty($data)) {

            $impressions7 = '[';
            $likes7 = '[';
            $comments7 = '[';
            $organic7 = '[';
            $unganic7 = '[';

            $impressions1ano = '[';
            $likes1ano = '[';
            $comments1ano = '[';
            $organic1ano = '[';
            $unganic1ano = '[';

            $impressionstudo = '[';
            $likestudo = '[';
            $commentstudo = '[';
            $organictudo = '[';
            $unganictudo = '[';

            $impressions30 = '[';
            $likes30 = '[';
            $comments30 = '[';
            $organic30 = '[';
            $unganic30 = '[';



            foreach ($data7dias as $row) {
                $impressions7 .= isset($row->impressions) ? $row->impressions . ', ' : '';
                $likes7 .= isset($row->likes) ? $row->likes . ', ' : '';
                $comments7 .= isset($row->comments) ? $row->comments . ', ' : '';
                $organic7 .= isset($row->organic) ? $row->organic . ', ' : '';

                $saver7 = isset($row->impressions) && isset($row->organic) ? ($row->impressions - $row->organic) . ', ' : '';
                $unganic7 .= $saver7;
            }

            foreach ($data1ano as $row) {
                $impressions1ano .= isset($row->impressions) ? $row->impressions . ', ' : '';
                $likes1ano .= isset($row->likes) ? $row->likes . ', ' : '';
                $comments1ano .= isset($row->comments) ? $row->comments . ', ' : '';
                $organic1ano .= isset($row->organic) ? $row->organic . ', ' : '';

                $saver1ano = isset($row->impressions) && isset($row->organic) ? ($row->impressions - $row->organic) . ', ' : '';
                $unganic1ano .= $saver1ano;
            }

            $OrganicSoma = 0;
            // Inicializa o maior número como o menor valor possível
            $maiorOrganic = PHP_INT_MIN;
            $maiorUnganic = PHP_INT_MIN;
            $maiorImpressions = PHP_INT_MIN;
            $maiorLikes = PHP_INT_MIN;
            $maiorComments = PHP_INT_MIN;


            $UnganicSoma = 0;
            $UnganicTudoNumero = 0;
            $ImpressionsSoma = 0;
            $LikesSoma = 0;
            $CommentsSoma = 0;

            foreach ($dataTudo as $row) {
                $impressionstudo .= isset($row->impressions) ? $row->impressions . ', ' : '';
                $likestudo .= isset($row->likes) ? $row->likes . ', ' : '';
                $commentstudo .= isset($row->comments) ? $row->comments . ', ' : '';
                $organictudo .= isset($row->organic) ? $row->organic . ', ' : '';

                $savertudo = isset($row->impressions) && isset($row->organic) ? ($row->impressions - $row->organic) . ', ' : '';
                $unganictudo .= $savertudo;


                //Maximo mensal
                if ($row->organic > $maiorOrganic) {
                    $maiorOrganic = $row->organic;
                }

                if ($row->impressions > $maiorImpressions) {
                    $maiorImpressions = $row->impressions;
                }

                if ($row->likes > $maiorLikes) {
                    $maiorLikes = $row->likes;
                }

                if ($row->comments > $maiorComments) {
                    $maiorComments = $row->comments;
                }

                $UnganicTudoNumero = isset($row->impressions) && isset($row->organic) ? ($row->impressions - $row->organic) : '';
                if ($UnganicTudoNumero > $maiorUnganic) {
                    $maiorUnganic = $UnganicTudoNumero;
                }


                //Somar todos os meses.
                $OrganicSoma = $OrganicSoma + $row->organic;
                $UnganicSoma = $UnganicSoma + $UnganicTudoNumero;
                $ImpressionsSoma = $ImpressionsSoma + $row->impressions;
                $LikesSoma = $LikesSoma + $row->likes;
                $CommentsSoma = $CommentsSoma + $row->comments;
            }

            $OrganicMensal = intval($OrganicSoma / count($dataTudo));
            $OrganicMediaDiaria = intval($OrganicSoma / $dataVerificarDias);
            $OrganicTotal = $OrganicSoma;
            $OrganicMaxMensal = $maiorOrganic;

            $UnganicMensal = intval($UnganicSoma / count($dataTudo));
            $UnganicMediaDiaria = intval($UnganicSoma / $dataVerificarDias);
            $UnganicTotal = $UnganicSoma;
            $UnganicMaxMensal = $maiorUnganic;

            $ImpressionsMensal = intval($ImpressionsSoma / count($dataTudo));
            $ImpressionsMediaDiaria = intval($ImpressionsSoma / $dataVerificarDias);
            $ImpressionsTotal = $ImpressionsSoma;
            $ImpressionsMaxMensal = $maiorImpressions;

            $LikesMensal = intval($LikesSoma / count($dataTudo));
            $LikesMediaDiaria = intval($LikesSoma / $dataVerificarDias);
            $LikesTotal = $LikesSoma;
            $LikesMaxMensal = $maiorLikes;

            $CommentsMensal = intval($CommentsSoma / count($dataTudo));
            $CommentsMediaDiaria = intval($CommentsSoma / $dataVerificarDias);
            $CommentsTotal = $CommentsSoma;
            $CommentsMaxMensal = $maiorComments;


            foreach ($data30dias as $row) {
                $impressions30 .= isset($row->impressions) ? $row->impressions . ', ' : '';
                $likes30 .= isset($row->likes) ? $row->likes . ', ' : '';
                $comments30 .= isset($row->comments) ? $row->comments . ', ' : '';
                $organic30 .= isset($row->organic) ? $row->organic . ', ' : '';

                // Calcular e concatenar outras informações conforme necessário
                $saver30 = isset($row->impressions) && isset($row->organic) ? ($row->impressions - $row->organic) . ', ' : '';
                $unganic30 .= $saver30;
            }


            // Remover a última vírgula de cada variável
            $impressions7 = rtrim($impressions7, ', ');
            $likes7 = rtrim($likes7, ', ');
            $comments7 = rtrim($comments7, ', ');
            $organic7 = rtrim($organic7, ', ');
            $unganic7 = rtrim($unganic7, ', ');

            // Remove a última vírgula
            $impressions30 = rtrim($impressions30, ', ');
            $likes30 = rtrim($likes30, ', ');
            $comments30 = rtrim($comments30, ', ');
            $organic30 = rtrim($organic30, ', ');
            $unganic30 = rtrim($unganic30, ', ');

            // Remove a última vírgula
            $impressions1ano = rtrim($impressions1ano, ', ');
            $likes1ano = rtrim($likes1ano, ', ');
            $comments1ano = rtrim($comments1ano, ', ');
            $organic1ano = rtrim($organic1ano, ', ');
            $unganic1ano = rtrim($unganic1ano, ', ');

            // Remove a última vírgula
            $impressionstudo = rtrim($impressionstudo, ', ');
            $likestudo = rtrim($likestudo, ', ');
            $commentstudo = rtrim($commentstudo, ', ');
            $organictudo = rtrim($organictudo, ', ');
            $unganictudo = rtrim($unganictudo, ', ');


            $impressions7 .= ']';
            $likes7 .= ']';
            $comments7 .= ']';
            $organic7 .= ']';
            $saver7 = ']';
            $unganic7 .= ']';

            $impressions30 .= ']';
            $likes30 .= ']';
            $comments30 .= ']';
            $organic30 .= ']';
            $saver30 = ']';
            $unganic30 .= ']';

            $impressions1ano .= ']';
            $likes1ano .= ']';
            $comments1ano .= ']';
            $organic1ano .= ']';
            $saver1ano = ']';
            $unganic1ano .= ']';

            $impressionstudo .= ']';
            $likestudo .= ']';
            $commentstudo .= ']';
            $organictudo .= ']';
            $savertudo = ']';
            $unganictudo .= ']';


           
            // Gera o HTML
            $html = '';

            $html .= '  
        <div class="container">
            <!-- Primeiro gráfico de linha -->
            <div class="">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h1 class="lead ms-2" style="font-size: 40px;">Engajamento Orgânico</h1>
                    <div class="btn-group mt-3" role="group" aria-label="Basic example">';
                    if ($dataVerificarDias > 7)
                    {
                        $html .= '<button type="button" class="btn btn-primary" id="week-btn-line">7 Dias</button>';
                    }
                     
                    if ($dataVerificarDias > 31)
                    {
                        $html .= '<button type="button" class="btn btn-primary" id="month-btn-line">Ultimo Mês</button>';
                    }

                    if ($dataVerificarDias > 364)
                    {
                        $html .= '<button type="button" class="btn btn-primary" id="year-btn-line">Ultimo Ano</button>';
                    }

                    if ($dataVerificarDias > 62)
                    {
                        $html .= '<button type="button" class="btn btn-primary" id="all-btn-line">Tudo</button>';
                    }
                        
                    $html .= '</div>
                </div>
                <div class="card-body p-3">
                    <div class="chart-container" style="height: 500px;">
                        <canvas id="chart-line" class="chart-canvas"></canvas>
                    </div>
                    <div class="ms-1 row text-sm mt-3" style="margin-top: 0em;">
                        <div class="col-md-4">
                            <h4>Engajamento Orgânico</h4>
                            <p class="lead-xs">
                                Média Diária: ' . $OrganicMediaDiaria . '<br>';
                                if ($dataVerificarDias > 31)
                                {
                                    $html .= 'Média Mensal: ' . $OrganicMensal . '<br>
                                    Máximo Mensal: ' . $OrganicMaxMensal . '<br>';
                                }

                            $html .= 'Total: ' . $OrganicTotal . '</p>
                        </div>
                        <div class="col-md-4">
                            <h4>Engajamento Não Orgânico</h4>
                            <p class="lead-xs">
                                Média Diária: ' . $UnganicMediaDiaria . '<br>';
                                    
                                    if ($dataVerificarDias > 31)
                                    {
                                        $html .= 'Média Mensal: ' . $UnganicMensal . '<br>
                                        Máximo Mensal: ' . $UnganicMaxMensal . '<br>';
                                    }

                                $html .= 'Total: ' . $UnganicTotal . '</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Segundo gráfico de barras -->
            <div class="mt-6">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <div class="btn-group mt-2" role="group" aria-label="Basic example">';

                    if ($dataVerificarDias > 7)
                    {
                        $html .= '<button type="button" class="btn btn-primary" id="week-btn-bar">7 Dias</button>';
                    }
                     
                    if ($dataVerificarDias > 31)
                    {
                        $html .= '<button type="button" class="btn btn-primary" id="month-btn-bar">Ultimo Mês</button>';
                    }

                    if ($dataVerificarDias > 364)
                    {
                        $html .= '<button type="button" class="btn btn-primary" id="year-btn-bar">Ultimo Ano</button>';
                    }

                    if ($dataVerificarDias > 62)
                    {
                        $html .= '<button type="button" class="btn btn-primary" id="all-btn-bar">Tudo</button>';
                    }
                    $html .= '</div>
                    <h1 class="lead ms-2" style="font-size: 40px;">Estatísticas Principais</h1>
                </div>
                <div class="card-body p-3">
                    <div class="chart-container" style="height: 500px;">
                        <canvas id="chart-bar" class="chart-canvas"></canvas>
                    </div>

                    <div class="mt-2 row text-sm mt-3" style="margin-left: 6.5em;">
                        <div class="col-md-4 text-justify">
                            <h4>Impressões</h4>
                            <p class="lead-xs">
                            Média Diária: ' . $ImpressionsMediaDiaria . '<br>';
                                    if ($dataVerificarDias > 31)
                                    {
                                        $html .=  'Média Mensal: ' . $ImpressionsMensal . '<br>
                                        Máximo Mensal: ' . $ImpressionsMaxMensal . '<br>';
                                    }

                                $html .= 'Total: ' . $ImpressionsTotal . '</p>
                        </div>

                        <div class="col-md-4 text-justify">
                            <h4>Gostos</h4>
                            <p class="lead-xs">
                            Média Diária: ' . $LikesMediaDiaria . '<br>';
                                    if ($dataVerificarDias > 31)
                                    {
                                        $html .=  'Média Mensal: ' . $LikesMensal . '<br>
                                        Máximo Mensal: ' . $LikesMaxMensal . '<br>';
                                    }

                                $html .= 'Total: ' . $LikesTotal . '</p>
                        </div>

                        <div class="col-md-4">
                            <h4>Comentários</h4>
                            <p class="lead-xs">
                            Média Diária: ' . $CommentsMediaDiaria . '<br>';
                                    if ($dataVerificarDias > 31)
                                    {
                                        $html .=  'Média Mensal: ' . $CommentsMensal . '<br>
                                        Máximo Mensal: ' . $CommentsMaxMensal . '<br>';
                                    }

                                $html .= 'Total: ' . $CommentsTotal . '</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';

            // Retorna o HTML
            echo $html;


            // Caminho para o arquivo .js no sistema de arquivos
            $filePath = $_SERVER['DOCUMENT_ROOT'] . '/redes/public/assets/js/graficos.js';

            // Verifica se o arquivo existe no sistema de arquivos

            // Verifica se o arquivo existe no sistema de arquivos
            if (file_exists($filePath)) {
                // Lê o conteúdo do arquivo para uma variável
                $conteudoDoArquivo = file_get_contents($filePath);

                // Verifica se foi possível ler o arquivo
                if ($conteudoDoArquivo !== false) {
                    // Sanitiza as variáveis para prevenir ataques XSS

                    // Exibe o conteúdo do arquivo dentro de uma tag <script>
                    echo '<script>
                        var impressions30 = ' . json_encode($impressions30) . ';
                        var likes30 = ' . json_encode($likes30) . ';
                        var comments30 = ' . json_encode($comments30) . ';
                        var organic30 = ' . json_encode($organic30) . ';
                        var unganic30 = ' . json_encode($unganic30) . ';

                        var impressions7 = ' . json_encode($impressions7) . ';
                        var likes7 = ' . json_encode($likes7) . ';
                        var comments7 = ' . json_encode($comments7) . ';
                        var organic7 = ' . json_encode($organic7) . ';
                        var unganic7 = ' . json_encode($unganic7) . ';

                        var impressions1ano = ' . json_encode($impressions1ano) . ';
                        var likes1ano = ' . json_encode($likes1ano) . ';
                        var comments1ano = ' . json_encode($comments1ano) . ';
                        var organic1ano = ' . json_encode($organic1ano) . ';
                        var unganic1ano = ' . json_encode($unganic1ano) . ';

                        var impressionstudo = ' . json_encode($impressionstudo) . ';
                        var likestudo = ' . json_encode($likestudo) . ';
                        var commentstudo = ' . json_encode($commentstudo) . ';
                        var organictudo = ' . json_encode($organictudo) . ';
                        var unganictudo = ' . json_encode($unganictudo) . ';

                        ' . $conteudoDoArquivo . '</script>';
                } else {
                    // Adiciona um fallback ou mensagem de erro
                    echo 'Não foi possível ler o arquivo.';
                }
            } else {
                // Adiciona um fallback ou mensagem de erro
                echo 'Arquivo não encontrado.';
            }
        } else {
            $html = '<div class="w-100 text-center" style="height: 400px;"><img src="../../public/img/aviso.png" class="mt-6" style="width: 150px; height: 150px;"><p class="mt-4">Ainda não existem estatísticas disponiveis, <br> Em média demora 7 dias após a publicação ser carregada.</p></div>';
            echo $html;
        }
    }

    public function getUsersComplete($pesquisa)
    {
        return $this->model->getUsersComplete($pesquisa);
    }

    public function getEventUsersComplete($pesquisa)
    {
        return $this->model->getEventUsersComplete($pesquisa);
    }

    public function getEditarPrivacy($p_id)
    {
        return $this->model->getEditarPrivacy($p_id);
    }

    public function editarPrivacidade()
    {
        // Ler dados enviados via POST
        $id_projeto = $_POST['id_projeto'];
        $projetos = $_POST['projetos'];
        $gostos = $_POST['gostos'];
        $comentarios = $_POST['comentarios'];

        if ($projetos == 3) {
            $gostos = 6;
            $comentarios = 9;
        }

        // Inserir no banco de dados
        $dadosEvento = array(
            'id_projeto' => $id_projeto,
            'projetos' => $projetos,
            'gostos' => $gostos,
            'comentarios' => $comentarios
        );

        $this->model->editarPrivacidade($dadosEvento);
    }

    public function apagarProjeto()
    {
        // Ler dados enviados via POST
        $id_projeto = $_POST['id_projeto'];

        $this->model->apagarProjeto($id_projeto);
    }

    public function getProjects($id)
    {
        return $this->model->getProjects($id);
    }

    public function getProjectsImages($p_id)
    {
        return $this->model->getProjectsImages($p_id);
    }

    public function getAccountByDirectory($lastDirectoryName)
    {
        return $this->model->getAccountByDirectory($lastDirectoryName);
    }

    public function getAccountById($id)
    {
        return $this->model->getAccountById($id);
    }


    public function getRatings($id)
    {
        return $this->model->getRatings($id);
    }


    public function getRatingsAccounts($id)
    {
        return $this->model->getRatingsAccounts($id);
    }


    public function getShowsQuantidade($id)
    {
        return $this->model->getShowsQuantidade($id);
    }


    public function getavgStars($id)
    {
        return $this->model->getavgStars($id);
    }

    public function getFollowsQuantidade($id)
    {
        return $this->model->getFollowsQuantidade($id);
    }

    public function getFollowingsQuantidade($id)
    {
        return $this->model->getFollowingsQuantidade($id);
    }
}
