<?php
// Verifica se os dados foram enviados corretamente
if(isset($_POST['order'])){
    
// Configurações do banco de dados
$hostname = 'localhost'; // Hostname (geralmente 'localhost' para o servidor local)
$username = 'root'; // Nome de usuário do banco de dados
$password = ''; // Senha do banco de dados
$database = 'concertpulse'; // Nome do banco de dados

try {
    // Cria uma nova conexão PDO
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    
    // Configura o modo de erro do PDO para lançar exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Configura o charset para UTF-8
    $pdo->exec("set names utf8");
    
    // OPCIONAL: Configura o modo de busca padrão para retornar objetos
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    
} catch(PDOException $e) {
    // Se ocorrer um erro na conexão, exibe a mensagem de erro
    echo "Erro de conexão: " . $e->getMessage();
    die(); // Encerra o script
}

    session_start();


    // Obtenha os dados enviados
    $order = $_POST['order'];
    $index = $_POST['index'];
    $projeto = $index;

    $id_user = $_SESSION['user_id'];

    // Caminho para a pasta onde as imagens serão armazenadas
    $caminho_para_pasta = '../../public/users/' . $id_user . '/';

    try {
        // Inicia uma transação
        $pdo->beginTransaction();

        // Deleta todos os registros com o id_project igual a $projeto
        $stmt_delete = $pdo->prepare("DELETE FROM projects_images WHERE id_project = :projeto");
        $stmt_delete->bindParam(':projeto', $projeto, PDO::PARAM_INT);
        $stmt_delete->execute();

        // Insere os novos registros
        $stmt_insert = $pdo->prepare("INSERT INTO projects_images (id_project, image, Ordem) VALUES (:projeto, :image, :ordem)");
        
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
                        // Executa a inserção
                        $stmt_insert->bindParam(':projeto', $projeto, PDO::PARAM_INT);
                        $stmt_insert->bindParam(':image', $nome_arquivo, PDO::PARAM_STR); // Armazena apenas o nome do arquivo
                        $novaordem = $ordem + 1;
                        $stmt_insert->bindParam(':ordem', $novaordem, PDO::PARAM_INT);
                        $stmt_insert->execute();
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

        // Commit da transação
        $pdo->commit();
        echo "Operação realizada com sucesso!";
    } catch (Exception $e) {
        // Rollback da transação em caso de erro
        $pdo->rollBack();
        echo "Erro durante a operação: " . $e->getMessage();
    }
} else {
    echo "Nenhum dado de imagem foi enviado.";
}
