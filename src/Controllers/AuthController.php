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


class AuthController
{
    public function showLoginForm($error = null)
    {
        require __DIR__ . '/../Views/login.php';
    }


    public function login($username, $password)
    {

        // Connect to the database
        $db = Database::connect();

        // Prepare the SQL statement
        $stmt = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
        $stmt->execute(['username' => $username, 'password' => $password]);

        // Fetch the user data
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        // Check if the user exists and the password is correct
        if ($user && $password) {
            // Start the session

            // Set the user ID in the session
            $_SESSION['user_id'] = $user['id'];

            $url = '/sucesso';

            header('Location: ' . $url);

            exit();
        } else {
            // Display an error message
            $error = 'Nome de usuário ou senha inválidos';
            header ('Location: ../../public/loginartists.php');
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
