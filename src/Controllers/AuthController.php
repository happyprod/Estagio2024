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

use App\Helpers\Database;
use App\Models\Auth;
use App\Helpers\ValidationHelper;

class AuthController
{
    private $model;
    public $helper;


    public function __construct(Auth $model)
    {
        $this->model = $model;
        $this->helper = new ValidationHelper();
    }

    public function showLoginForm($error = null)
    {
        session_destroy();

        require __DIR__ . '/../Views/Accounts/login.php';
    }

    public function showRegisterForm($error = null)
    {
        session_destroy();

        require __DIR__ . '/../Views/Accounts/register.php';
    }

    // Exemplo da função register no controlador UserController
    public function register($email, $password, $identity, $location, $name, $selectedType)
    {
        $this->model->register($email, $password, $identity, $location, $name, $selectedType);
    }

    public function LoginAccount($email, $password)
    {
        $result = $this->model->VerifyAccountExist($email, $password);

        if ($result) {
            // Senha correta, iniciar sessão
            session_start();
            $_SESSION['user_id'] = $result['id'];
            header('Location: ../../public/home.php'); // Redirecionar para a página de dashboard
            exit();
        } else {
            // Usuário não encontrado ou senha incorreta
            echo 'Credenciais inválidas. Tente novamente.';
        }
    }


    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /login');
        exit();
    }
}
