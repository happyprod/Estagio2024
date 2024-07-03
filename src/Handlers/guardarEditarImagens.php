<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer


use App\Controllers\UserController;
use App\Models\User;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// No arquivo guardar_sobre.php
$userModel = new User($db);
$userController = new UserController($userModel);


// Verifica se os dados foram enviados corretamente
if(isset($_POST['order'])){
    
    session_start();

    // Obtenha os dados enviados
    $order = $_POST['order'];
    $index = $_POST['index'];
    $projeto = $index;

    $id_user = $_SESSION['user_id'];

    // Caminho para a pasta onde as imagens serão armazenadas
    $caminho_para_pasta = '../../public/users/' . $id_user . '/';

    try {

    $userController->guardarEditarProjetosImagens1($projeto);

        foreach($order as $ordem => $item){
            $dataId = $item['dataId'];
            $imgSrc = $item['imgSrc'];

            // Verifica se a URL da imagem está presente
            if($imgSrc){
                // Obtenha o nome do arquivo da URL
                $nome_arquivo = basename($imgSrc);

                // Verifica se o diretório de destino existe, se não, cria-o
                if (!file_exists($caminho_para_pasta)) {
                    mkdir($caminho_para_pasta, 0777, true); // Cria o diretório recursivamente
                }

                // Tenta fazer o download da imagem
                $conteudo_imagem = file_get_contents($imgSrc);
                if($conteudo_imagem !== false){
                    // Move o arquivo para o diretório de destino
                    if(file_put_contents($caminho_para_pasta.$nome_arquivo, $conteudo_imagem) !== false){
                        $userController->guardarEditarProjetosImagens2($projeto, $ordem, $nome_arquivo);
                    } else {
                        echo "Erro ao salvar a imagem '$nome_arquivo'.";
                    }
                } else {
                    echo "Erro ao baixar a imagem '$nome_arquivo'.";
                }
            } else {
                echo "URL da imagem não encontrada para o item com dataId '$dataId'.";
            }
        }

        echo "Operação realizada com sucesso!";
    } catch (Exception $e) {
        echo "Erro durante a operação: " . $e->getMessage();
    }
} else {
    echo "erro";
}