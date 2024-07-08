<?php

namespace App\Controllers;

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


    public function LoginAccount($email, $password)
    {
        $result = $this->model->VerifyAccountExist($email, $password);

        if ($result) {
            session_set_cookie_params(86400 * 30);

            session_start();
            $_SESSION['user_id'] = $result['id'];

            // Verificar se a sessão foi iniciada corretamente
            if (session_status() == PHP_SESSION_ACTIVE) {
                if ($result) {
                    return 1; //vai para o home
                } else {
                    return 0; //vai para o login
                }
            } else {
                echo json_encode(['error' => 'Erro ao iniciar a sessão.']);
            }
        } else {
            return 0; //vai para o login
        }
    }

    public function ResgisterAccount($identificacao, $email, $nome, $password, $localizacao, $selectedType)
    {

        $result = $this->model->VerifyAccountExistByEmail($email);

        if ($result) {
            return 2;
        }

        $result = $this->model->VerifyAccountExistByIdentity($identificacao);

        if ($result) {
            return 3;
        }

        
        // Define o comprimento da string desejada em bytes
        $comprimento = 16; // 16 bytes = 32 caracteres hexadecimais

        // Gera bytes aleatórios
        $bytes_aleatorios = random_bytes($comprimento);

        // Converte os bytes em uma string hexadecimal
        $string_random = bin2hex($bytes_aleatorios) . '.png';


        // Inserir no banco de dados
        $dadosEvento = array(
            'identificacao' => $identificacao,
            'email' => $email,
            'nome' => $nome,
            'password' => $password,
            'localizacao' => $localizacao,
            'selectedType' => $selectedType,
            'picture' => $string_random
        );

        $namePasta = $this->model->ResgisterAccount($dadosEvento);

        $diretorio = '../../public/users/' . $namePasta;

        if (!file_exists($diretorio)) {
            // Cria o diretório
            if (!mkdir($diretorio, 0777, true)) {
                return 5;
            }
        } else {
            return 6;
        }

        // Caminho do arquivo original
        $arquivo_origem = '../../public/img/defaultPerfilImage.png';

        // Caminho da pasta de destino
        $pasta_destino = $diretorio . '/';

        // Nome do arquivo de destino (opcional, se quiser mudar o nome)
        $nome_arquivo_destino = $string_random;

        // Copia o arquivo para o destino
        copy($arquivo_origem, $pasta_destino . $nome_arquivo_destino);
        

        return 1;
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
