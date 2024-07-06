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

use App\Models\Contracts;

class ContractsController
{

    private $model;

    public function __construct(Contracts $model)
    {
        $this->model = $model;
    }


    public function showContratos()
    {
        require __DIR__ . '/../Views/Contracts/Contracts.php';
    }

    public function getPropostasNovas()
    {
        return $this->model->getPropostasNovas();
    }

    public function getPropostasAceitas()
    {
        return $this->model->getPropostasAceitas();
    }

    public function getPropostasFeitas()
    {
        return $this->model->getPropostasFeitas();
    }

    public function recusarContract($idContract)
    {
        return $this->model->recusarContract($idContract);
    }

    public function aceitarContract($idContract)
    {
        return $this->model->aceitarContract($idContract);
    }

    //o guardarReview2 é para os enviados
    public function guardarReview($rating, $comentario, $id)
    {
        $result = $this->model->checkReviewExist($id);

        if ($result) {
            if (empty($rating) && empty($comentario)) 
            {
                $this->model->deleteReview($id);
            } else {
                $this->model->updateReview($rating, $comentario, $id);
            }
        } else {
            $this->model->guardarReview($rating, $comentario, $id);
        }
    }

}
