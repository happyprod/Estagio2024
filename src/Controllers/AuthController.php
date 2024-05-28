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

use MyApp\Models\User;


class AuthController
{
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


    public function login($email, $senha)
    {
        // Conectar ao banco de dados usando PDO
        $db = Database::connect();
    
        // Verifica se o formulário foi submetido
        if (isset($email, $senha)) {
    
            // Consulta SQL para selecionar o usuário com o email fornecido
            $query = "SELECT id, email, password FROM accounts WHERE email = :email";
            $stmt = $db->prepare($query);
    
            // Verifica se a preparação da consulta foi bem-sucedida
            if ($stmt) {
                $stmt->bindParam(":email", $email);
                $stmt->execute();
    
                // Obtém o resultado da consulta
                $user = $stmt->fetch(\PDO::FETCH_ASSOC);
    
                // Verifica se encontrou exatamente um registro
                if ($user) {
                    // Verifica se a senha fornecida está correta
                    if ($user['password'] == $senha) {
                        // Credenciais de login válidas
                        $_SESSION['user_id'] = $user['id'];
    
                        // Verifica se o checkbox foi marcado
                        if (isset($_POST['checkbox'])) {
                            // Define um cookie com duração de 1 mês (30 dias)
                            setcookie("email", $email, time() + (60 * 60 * 24 * 30));
                        } else {
                            // Define um cookie com duração de 1 dia
                            setcookie("email", $email, time() + (3600 * 24));
                        }
    
                        // Resposta de sucesso
                        echo json_encode(['success' => true, 'message' => 'Login realizado com sucesso.']);
                    } else {
                        // Senha incorreta
                        echo json_encode(['success' => false, 'message' => 'Nome de email ou senha inválidos.']);
                    }
                } else {
                    // Usuário não encontrado
                    echo json_encode(['success' => false, 'message' => 'Nome de email ou senha inválidos.']);
                }
            } else {
                // Erro ao preparar a consulta
                echo json_encode(['success' => false, 'message' => 'Erro ao preparar a consulta SQL.']);
            }
        } else {
            // Dados do formulário não fornecidos
            echo json_encode(['success' => false, 'message' => 'Dados do formulário não fornecidos.']);
        }
    }
    



    public function user_cenas($name, $email, $password) {
        // Validação dos dados do formulário de registro

        // Por exemplo, verificando se o email já está em uso
        // (Esta lógica pode estar no modelo ou em uma classe de serviço separada)
        
        // Criar uma instância do modelo User
        $user = new User($name, $email, $password);
        
        // Salvar o user na bd
        $user->save();
        
        // Redirecionar para uma página de sucesso ou exibir uma mensagem de sucesso
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
