<?php

/*
O AuthController, por outro lado, é responsável por lidar com a autenticação e autorização de usuários na aplicação. Ele gerencia o processo de login, registro e logout de usuários, além de outras funcionalidades relacionadas à segurança e gerenciamento de contas de usuário. Suas responsabilidades podem incluir:

Autenticar usuários por meio de credenciais (nome de usuário, email, senha).
Criar novas contas de usuário.
Encerrar sessões de usuários (logout).
Redirecionar usuários após o login ou logout.
Gerenciar permissões e acessos dos usuários.
Exemplo de métodos em um AuthController:

login(): Exibe o formulário de login e processa as credenciais inseridas.
logout(): Encerra a sessão do usuário e redireciona para a página inicial.
register(): Exibe o formulário de registro e cria uma nova conta de usuário.
*/


namespace App\Controllers;

use App\Models\Home;

class HomeController
{

    private $model;

    public function __construct(Home $model)
    {
        $this->model = $model;
    }


    public function showHome()
    {
        require __DIR__ . '/../Views/Home/home.php';
    }


    public function getSugestions()
    {
        $data = $this->model->getSugestions();

        $count = 0;

        foreach ($data as $row) {
            $sugs_picture = htmlspecialchars($row->picture);
            $sugs_idName = htmlspecialchars($row->id_name);
            $sugs_id = htmlspecialchars($row->id);
            $sugs_identity = htmlspecialchars($row->identity);


            if ($sugs_identity == 1) {
                $sugs_identity = "Promotor";
            } else if ($sugs_identity == 2) {
                $sugs_identity = "Artista";
            } else if ($sugs_identity == 3) {
                $sugs_identity = "Agente de Booking";
            } else if ($sugs_identity == 4) {
                $sugs_identity = "Agencia de booking";
            } else {
                $sugs_identity = "Evento";
            }

            // Obtém a extensão do arquivo em letras minúsculas
            $extension = strtolower(pathinfo($sugs_picture, PATHINFO_EXTENSION));

            // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

            // Verifica se a extensão está na lista de extensões permitidas
            $google_image = !in_array($extension, $allowed_extensions);

            if ($google_image) {
                $sugs_picture = 'src="' . $sugs_picture . '"';
            } else {
                $sugs_picture = 'src="users/' . $sugs_id . '/' . $sugs_picture . '"';
            }


            echo '
            <div class="row mt-3">
                <div class="col-3 h-100 my-auto">
                    <a href="utilizadores/' . $sugs_id . '.php">
                        <img ' . $sugs_picture . ' class="img-fluid rounded-circle" style="object-fit: cover; width: 40px; height: 40px; padding-right: 0px;">
                    </a>
                </div>
                <div class="col-6 p-2" style="margin-left: -0.5em;">
                    <a href="utilizadores/' . $sugs_id . '.php" >
                        <p class="text-sm mb-1" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"> @' . $sugs_idName . '</p>
                    </a>
                    <p class="text-xs mb-0" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">' . $sugs_identity . '</p>
                </div>
                <div class="col-2 mx-auto my-auto" id="sugestion-' . $sugs_id . '" onclick="follow(this)">
                    <img src="img/adicionar-amigo.png" style="cursor:pointer; width: 25px;" alt="" class="img-toggle mx-auto my-auto">
                </div>
            </div>';

            $count++;
        }
    }

    public function getPopulars()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $id_user = $_SESSION['user_id'];

        $data = $this->model->getPopulars();

        $count = 0;

        foreach ($data as $row) {
            $sugs_picture = htmlspecialchars($row->picture);
            $sugs_idName = htmlspecialchars($row->id_name);
            $sugs_id = htmlspecialchars($row->id);
            $sugs_identity = htmlspecialchars($row->identity);
            $is_following = $row->is_following; // Não é necessário htmlspecialchars


            if ($sugs_identity == 1) {
                $sugs_identity = "Promotor";
            } else if ($sugs_identity == 2) {
                $sugs_identity = "Artista";
            } else if ($sugs_identity == 3) {
                $sugs_identity = "Agente de Booking";
            } else if ($sugs_identity == 4) {
                $sugs_identity = "Agencia de booking";
            } else {
                $sugs_identity = "Evento";
            }

            // Obtém a extensão do arquivo em letras minúsculas
            $extension = strtolower(pathinfo($sugs_picture, PATHINFO_EXTENSION));

            // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

            // Verifica se a extensão está na lista de extensões permitidas
            $google_image = !in_array($extension, $allowed_extensions);

            if ($google_image) {
                $sugs_picture = 'src="' . $sugs_picture . '"';
            } else {
                $sugs_picture = 'src="users/' . $sugs_id . '/' . $sugs_picture . '"';
            }

            if ($is_following == 1) {
                $seguirImg = 'remover-amigo.png';
            } else {
                $seguirImg = 'adicionar-amigo.png';
            }


            echo '
            <div class="row mt-3">
                <div class="col-3 h-100 my-auto">
                    <a href="utilizadores/' . $sugs_id . '.php">
                        <img ' . $sugs_picture . ' class="img-fluid rounded-circle" style="object-fit: cover; width: 40px; height: 40px; padding-right: 0px;">
                    </a>
                </div>
                <div class="col-6 p-2" style="margin-left: -0.5em;">
                    <a href="utilizadores/' . $sugs_id . '.php">
                        <p class="text-sm mb-1" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"> @' . $sugs_idName . '</p>
                    </a>
                    <p class="text-xs mb-0" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">' . $sugs_identity . '</p>
                </div>
                <div class="col-2 mx-auto my-auto" id="sugestion-' . $sugs_id . '" onclick="follow(this)">';

            if ($sugs_id != $id_user) {
                echo '<img src="img/' . $seguirImg . '" style="cursor:pointer; width: 25px;" alt="" class="img-toggle mx-auto my-auto">';
            }
            echo '</div>
            </div>';

            $count++;
        }
    }


    public function getProjectsFeed($limit, $offset)
    {
        return $this->model->getProjectsFeed($limit, $offset);
    }

    public function getProjectsImagesFeed($p_id)
    {
        return $this->model->getProjectsImagesFeed($p_id);
    }

    public function removerFollow($idUtilizador)
    {
        $this->model->removerFollow($idUtilizador);
    }

    public function adicionarFollow($idUtilizador)
    {
        $this->model->adicionarFollow($idUtilizador);
    }
}
