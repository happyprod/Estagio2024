<?php

namespace App\Controllers;

use App\Models\User;
use App\Helpers\ValidationHelper;


class UserController
{
    private $model;
    public $helper;


    public function __construct(User $model)
    {
        $this->model = $model;
        $this->helper = new ValidationHelper();
    }

    public function show($userId)
    {
        require __DIR__ . '/../Views/Users/Perfil.php';
    }

    public function showEditar()
    {
        require __DIR__ . '/../Views/Users/editarPerfil.php';
    }

    public function criarProjeto()
    {
        $this->model->criarProjeto();
    }
    public function getEditarImagens($count, $p_id)
    {
        return $this->model->getEditarImagens($count, $p_id);
    }

    public function verificarAgenteExiste($AgenteBooking)
    {
        return $this->model->verificarAgenteExiste($AgenteBooking);
    }

    public function inserirEvento()
    {
        $id_project = $_POST['id_project'] ?? '';

        // Outros dados
        $nomeEvento = $_POST['nomeEvento'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $data = $_POST['data'] ?? '';
        $AgenteBooking = $_POST['empresaBooking'] ?? '';
        $localizacao = $_POST['localizacao'] ?? '';
        $arrayC_idName = isset($_POST['arrayC_idName']) ? json_decode($_POST['arrayC_idName'], true) : [];

        if (!$this->verificarAgenteExiste($AgenteBooking))
        {
            echo 'Agente';
            return;
        }

        // Inserir no banco de dados
        $dadosEvento = array(
            'nomeEvento' => $nomeEvento,
            'descricao' => $descricao,
            'data' => $data,
            'empresaBooking' => $AgenteBooking,
            'localizacao' => $localizacao,
            'id_project' => $id_project
        );

        $this->model->inserirEvento($dadosEvento, $arrayC_idName);
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

            $LikesSoma = 0;
            $CommentsSoma = 0;
            $maiorLikes = PHP_INT_MIN;
            $maiorComments = PHP_INT_MIN;

            $likes7 = '[';
            $comments7 = '[';

            $likes1ano = '[';
            $comments1ano = '[';

            $likestudo = '[';
            $commentstudo = '[';

            $likes30 = '[';
            $comments30 = '[';



            foreach ($data7dias as $row) {
                $likes7 .= isset($row->likes) ? $row->likes . ', ' : '';
                $comments7 .= isset($row->comments) ? $row->comments . ', ' : '';
            }

            foreach ($data1ano as $row) {
                $likes1ano .= isset($row->likes) ? $row->likes . ', ' : '';
                $comments1ano .= isset($row->comments) ? $row->comments . ', ' : '';
            }

            
            foreach ($dataTudo as $row) {
                // Somar todos os likes e comments
                $LikesSoma += isset($row->likes) ? $row->likes : 0;
                $CommentsSoma += isset($row->comments) ? $row->comments : 0;
        
                // Encontrar máximo mensal
                if ($row->likes > $maiorLikes) {
                    $maiorLikes = $row->likes;
                }
                if ($row->comments > $maiorComments) {
                    $maiorComments = $row->comments;
                }
            }

            $LikesMensal = intval($LikesSoma / count($dataTudo));
            $LikesMediaDiaria = intval($LikesSoma / $dataVerificarDias);
            $LikesTotal = $LikesSoma;
            $LikesMaxMensal = $maiorLikes;

            $CommentsMensal = intval($CommentsSoma / count($dataTudo));
            $CommentsMediaDiaria = intval($CommentsSoma / $dataVerificarDias);
            $CommentsTotal = $CommentsSoma;
            $CommentsMaxMensal = $maiorComments;

            foreach ($dataTudo as $row) {
                $likestudo .= isset($row->likes) ? $row->likes . ', ' : '';
                $commentstudo .= isset($row->comments) ? $row->comments . ', ' : '';


                //Maximo mensal

                if ($row->likes > $maiorLikes) {
                    $maiorLikes = $row->likes;
                }

                if ($row->comments > $maiorComments) {
                    $maiorComments = $row->comments;
                }


                //Somar todos os meses.
                $LikesSoma = $LikesSoma + $row->likes;
            }


            foreach ($data30dias as $row) {
                $likes30 .= isset($row->likes) ? $row->likes . ', ' : '';
                $comments30 .= isset($row->comments) ? $row->comments . ', ' : '';
            }


            // Remover a última vírgula de cada variável
            $likes7 = rtrim($likes7, ', ');
            $comments7 = rtrim($comments7, ', ');

            // Remove a última vírgula
            $likes30 = rtrim($likes30, ', ');
            $comments30 = rtrim($comments30, ', ');

            // Remove a última vírgula
            $likes1ano = rtrim($likes1ano, ', ');
            $comments1ano = rtrim($comments1ano, ', ');

            // Remove a última vírgula
            $likestudo = rtrim($likestudo, ', ');
            $commentstudo = rtrim($commentstudo, ', ');

            $likes7 .= ']';
            $comments7 .= ']';

            $likes30 .= ']';
            $comments30 .= ']';

            $likes1ano .= ']';
            $comments1ano .= ']';

            $likestudo .= ']';
            $commentstudo .= ']';
            


            // Gera o HTML
            $html = '';

            $html .= '  
        <div class="container">
            <!-- Segundo gráfico de barras -->
            <div class="mt-2">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <div class="btn-group mt-2" role="group" aria-label="Basic example">';

            if ($dataVerificarDias > 7) {
                $html .= '<button type="button" class="btn btn-primary" id="week-btn-bar">7 Dias</button>';
            }

            if ($dataVerificarDias > 31) {
                $html .= '<button type="button" class="btn btn-primary" id="month-btn-bar">Ultimo Mês</button>';
            }

            if ($dataVerificarDias > 364) {
                $html .= '<button type="button" class="btn btn-primary" id="year-btn-bar">Ultimo Ano</button>';
            }

            if ($dataVerificarDias > 62) {
                $html .= '<button type="button" class="btn btn-primary" id="all-btn-bar">Tudo</button>';
            }
            $html .= '</div>
                    <h1 class="lead ms-2" style="font-size: 40px;">Estatísticas Principais</h1>
                </div>
                <div class="card-body p-3">
                    <div class="chart-container" style="height: 500px;">
                        <canvas id="chart-line" class="chart-canvas"></canvas>
                    </div>

                    <div class="mt-2 row text-sm mt-3" style="margin-left: 2em;">
                        <div class="col-md-4 text-justify">
                            <h4>Gostos</h4>
                            <p class="lead-xs">
                            Média Diária: ' . $LikesMediaDiaria . '<br>';
            if ($dataVerificarDias > 31) {
                $html .=  'Média Mensal: ' . $LikesMensal . '<br>
                                        Máximo Mensal: ' . $LikesMaxMensal . '<br>';
            }

            $html .= 'Total: ' . $LikesTotal . '</p>
                        </div>

                        <div class="col-md-4">
                            <h4>Comentários</h4>
                            <p class="lead-xs">
                            Média Diária: ' . $CommentsMediaDiaria . '<br>';
            if ($dataVerificarDias > 31) {
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
            $filePath = $_SERVER['DOCUMENT_ROOT'] . '/Estagio2024/public/assets/js/graficos.js';

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
                        var likes30 = ' . json_encode($likes30) . ';
                        var comments30 = ' . json_encode($comments30) . ';

                        var likes7 = ' . json_encode($likes7) . ';
                        var comments7 = ' . json_encode($comments7) . ';

                        var likes1ano = ' . json_encode($likes1ano) . ';
                        var comments1ano = ' . json_encode($comments1ano) . ';

                        var likestudo = ' . json_encode($likestudo) . ';
                        var commentstudo = ' . json_encode($commentstudo) . ';
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
        $id_project = $_POST['id_project'];
        $projetos = $_POST['projetos'];
        $gostos = $_POST['gostos'];
        $comentarios = $_POST['comentarios'];

        if ($projetos == 3) {
            $gostos = 6;
            $comentarios = 9;
        }

        // Inserir no banco de dados
        $dadosEvento = array(
            'id_project' => $id_project,
            'projetos' => $projetos,
            'gostos' => $gostos,
            'comentarios' => $comentarios
        );

        $this->model->editarPrivacidade($dadosEvento);
    }

    public function guardarEditarPerfilSobre()
    {
        header('Content-Type: application/json');

        $LBLfotoPerfil = $_POST['LBLfotoPerfil'];
        $LBLfotoCapa = $_POST['LBLfotoCapa'];
        $TXTnome = $_POST['TXTnome'];
        $TXTnumero = $_POST['TXTnumero'];
        $TXTemail = $_POST['TXTemail'];
        $TXTlocalizacao = $_POST['TXTlocalizacao'];
        $TXTdescricao = $_POST['TXTdescricao'];
        $youtube = $_POST['youtube'];
        $instagram = $_POST['instagram'];
        $tiktok = $_POST['tiktok'];
        $blog = $_POST['blog'];
        $yt_switch = $_POST['yt_switch'];
        $ig_switch = $_POST['ig_switch'];
        $tiktok_switch = $_POST['tiktok_switch'];
        $blog_switch = $_POST['blog_switch'];

        $yt_switch = ($yt_switch == 'true' && $youtube != '') ? 1 : 0;
        $ig_switch = ($ig_switch == 'true'  && $instagram != '') ? 1 : 0;
        $tiktok_switch = ($tiktok_switch == 'true' && $tiktok != '') ? 1 : 0;
        $blog_switch = ($blog_switch == 'true' && $blog != '') ? 1 : 0;

        if ($this->helper->validateInputs($TXTemail) != '') {
            if (!$this->helper->validateEmail($TXTemail)) {
                // Se o e-mail for inválido
                $response = array('status' => 'error', 'message' => 'Email inválido');
                echo json_encode($response);
                return;
            }
        } else {
            $TXTemail = $this->helper->validateInputs($TXTemail);
        }


        if ($TXTnumero != '' && !$this->helper->validateNumber($TXTnumero)) {
            // Se o e-mail for inválido
            $response = array('status' => 'error', 'message' => 'Número inválido');
            echo json_encode($response);
            return;
        }


        session_start();

        $id_user = $_SESSION['user_id'];

        // Caminho para a pasta onde as imagens serão armazenadas
        $caminho_para_pasta = '../../public/users/' . $id_user . '/';

        $nome_arquivo_foto_perfil = null;
        $nome_arquivo_foto_capa = null;

        // Verifica se a URL da imagem de perfil está presente
        if (strpos($LBLfotoPerfil, 'data:image/') === 0) {
            // Extrai o tipo da imagem
            if (preg_match('/^data:image\/(\w+);base64,/', $LBLfotoPerfil, $tipo_imagem)) {
                // Obtém o tipo da imagem
                $tipo_imagem = strtolower($tipo_imagem[1]); // jpg, png, gif, etc.

                // Decodifica os dados da imagem
                $data_imagem = substr($LBLfotoPerfil, strpos($LBLfotoPerfil, ',') + 1);
                $data_imagem = base64_decode($data_imagem);

                // Verifica se o tipo de imagem é permitido
                $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($tipo_imagem, $extensoes_permitidas)) {
                    die('Tipo de imagem de perfil não permitido.');
                }

                // Gera um nome de arquivo único
                $nome_arquivo_foto_perfil = uniqid() . '.' . $tipo_imagem;

                // Verifica se o diretório de destino existe, se não, cria-o
                if (!file_exists($caminho_para_pasta)) {
                    mkdir($caminho_para_pasta, 0777, true); // Cria o diretório recursivamente
                }

                // Salva o arquivo no diretório de destino
                if (file_put_contents($caminho_para_pasta . $nome_arquivo_foto_perfil, $data_imagem) === false) {
                    echo "Erro ao salvar a imagem de perfil";
                }
            } else {
                echo "Erro ao baixar a imagem de perfil";
            }
        } else {
            // Parse a URL into its components
            $path = parse_url($LBLfotoPerfil, PHP_URL_PATH);

            // Obter apenas o nome do arquivo
            $nome_arquivo_foto_perfil = basename($path);
        }

        // Verifica se $LBLfotoCapa é uma data URL de imagem
        if (strpos($LBLfotoCapa, 'data:image/') === 0) {
            // Extrai o tipo da imagem
            if (preg_match('/^data:image\/(\w+);base64,/', $LBLfotoCapa, $tipo_imagem)) {
                // Obtém o tipo da imagem
                $tipo_imagem = strtolower($tipo_imagem[1]); // jpg, png, gif, etc.

                // Decodifica os dados da imagem
                $data_imagem = substr($LBLfotoCapa, strpos($LBLfotoCapa, ',') + 1);
                $data_imagem = base64_decode($data_imagem);

                // Verifica se o tipo de imagem é permitido
                $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($tipo_imagem, $extensoes_permitidas)) {
                    die('Tipo de imagem de capa não permitido.');
                }

                // Gera um nome de arquivo único
                $nome_arquivo_foto_capa = uniqid() . '.' . $tipo_imagem;

                // Verifica se o diretório de destino existe, se não, cria-o
                if (!file_exists($caminho_para_pasta)) {
                    mkdir($caminho_para_pasta, 0777, true); // Cria o diretório recursivamente
                }

                // Salva o arquivo no diretório de destino
                if (file_put_contents($caminho_para_pasta . $nome_arquivo_foto_capa, $data_imagem) === false) {
                    echo "Erro ao salvar a imagem de capa";
                }
            } else {
                echo "Erro ao baixar a imagem de capa";
            }
        } else {
            // Parse a URL into its components
            $path = parse_url($LBLfotoCapa, PHP_URL_PATH);

            // Obter apenas o nome do arquivo
            $nome_arquivo_foto_capa = basename($path);
        }

        if ($nome_arquivo_foto_capa == 'curved0.jpg')
        {
            $nome_arquivo_foto_capa = '';
        }

        // Inserir no banco de dados
        $dadosEvento = array(
            'LBLfotoPerfil' => $nome_arquivo_foto_perfil,
            'LBLfotoCapa' => $nome_arquivo_foto_capa,
            'TXTnome' => $TXTnome,
            'TXTnumero' => $TXTnumero,
            'TXTemail' => $TXTemail,
            'TXTlocalizacao' => $TXTlocalizacao,
            'TXTdescricao' => $TXTdescricao,
            'youtube' => $youtube,
            'instagram' => $instagram,
            'tiktok' => $tiktok,
            'blog' => $blog,
            'yt_switch' => $yt_switch,
            'ig_switch' => $ig_switch,
            'tiktok_switch' => $tiktok_switch,
            'blog_switch' => $blog_switch
        );

        $this->model->guardarEditarPerfilSobre($dadosEvento);

        // Se tudo correr bem
        $response = array('status' => 'success');

        echo json_encode($response);
    }

    public function guardarFollow($id)
    {
        $this->model->guardarFollow($id);
    }

    public function removerFollow($id)
    {
        $this->model->removerFollow($id);
    }

    public function verificarFollow($id)
    {
        return $this->model->verificarFollow($id);
    }

    public function guardarAssuntoChat($idAcc, $message)
    {
        $this->model->guardarAssuntoChat($idAcc, $message);
    }

    public function verificarChat($id)
    {
        return $this->model->verificarChat($id);
    }

    public function guardarContract($id_acc, $assuntoContract, $nameFile)
    {
        $this->model->guardarContract($id_acc, $assuntoContract, $nameFile);
    }

    public function apagarProjeto()
    {
        // Ler dados enviados via POST
        $id_project = $_POST['id_project'];

        $this->model->apagarProjeto($id_project);
    }

    public function guardarEditarProjetosImagens1($projeto)
    {
        $this->model->guardarEditarProjetosImagens1($projeto);
    }

    public function guardarEditarProjetosImagens2($projeto, $ordem, $nome_arquivo)
    {
        $this->model->guardarEditarProjetosImagens2($projeto, $ordem, $nome_arquivo);
    }

    public function getProjects($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $id_user = $_SESSION['user_id'];

        if ($id_user == $id) {
            return $this->model->getProjects($id);
        } else {
            return $this->model->getProjectsPublic($id, $id_user);
        }
    }


    public function getProjectTumb($p_id)
    {
        return $this->model->getProjectTumb($p_id);
    }

    public function getProjectbyId($p_id)
    {
        return $this->model->getProjectbyId($p_id);
    }


    public function getProjectsImages($p_id)
    {
        return $this->model->getProjectsImages($p_id);
    }

    public function getAccountByDirectory($lastDirectoryName)
    {
        return $this->model->getAccountByDirectory($lastDirectoryName);
    }

    public function getAccountByIdName($lastDirectoryName)
    {
        return $this->model->getAccountByIdName($lastDirectoryName);
    }

    public function getVerifyUserLike($p_id)
    {
        return $this->model->getVerifyUserLike($p_id);
    }

    public function getVerifyUserCommentLike($id_comentario)
    {
        return $this->model->getVerifyUserCommentLike($id_comentario);
    }

    public function getVerifyCommentLikes($id_comentario)
    {
        return $this->model->getVerifyCommentLikes($id_comentario);
    }

    public function getAccountById($id)
    {
        return $this->model->getAccountById($id);
    }

    public function getVerifyUserFollows($acc_id)
    {
        return $this->model->getVerifyUserFollows($acc_id);
    }

    public function getRatings($id)
    {
        return $this->model->getRatings($id);
    }


    public function getRatingsAccounts($id)
    {
        return $this->model->getRatingsAccounts($id);
    }

    public function getCommentsByProject($p_id)
    {
        return $this->model->getCommentsByProject($p_id);
    }

    public function getSubCommentsByComment($id_comentario)
    {
        return $this->model->getSubCommentsByComment($id_comentario);
    }

    public function guardarCommentsLikes($id_comentario)
    {
        return $this->model->guardarCommentsLikes($id_comentario);
    }

    public function ApagarCommentsLikes($id_comentario)
    {
        return $this->model->ApagarCommentsLikes($id_comentario);
    }

    public function ApagarProjectLikes($id_project)
    {
        return $this->model->ApagarProjectLikes($id_project);
    }

    public function guardarProjectLikes($id_project)
    {
        return $this->model->guardarProjectLikes($id_project);;
    }



    public function getFollowingsList($id)
    {
        return $this->model->getFollowingsList($id);
    }

    public function getFollowingsListSearch($id, $id_name_user_search)
    {
        return $this->model->getFollowingsListSearch($id, $id_name_user_search);
    }

    public function getFollowersList($id)
    {
        return $this->model->getFollowersList($id);
    }

    public function getFollowersListSearch($id, $id_name_user_search)
    {
        return $this->model->getFollowersListSearch($id, $id_name_user_search);
    }

    public function getReviewsNumber($id)
    {
        return $this->model->getReviewsNumber($id);
    }

    public function getVerifyProjectLikes($p_id)
    {
        return $this->model->getVerifyProjectLikes($p_id);
    }

    public function guardarComments($p_id, $text)
    {
        return $this->model->guardarComments($p_id, $text);
    }

    public function guardarParentComments($p_id, $text, $resposta)
    {
        return $this->model->guardarParentComments($p_id, $text, $resposta);
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
