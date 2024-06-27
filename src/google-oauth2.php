<?php
// Inicia a sessão para manter a persistência de dados entre as requisições
session_start();

// Configurações da base de dados
$db_host = 'localhost'; // Host do banco de dados
$db_name = 'concertpulse'; // Nome do banco de dados
$db_user = 'root'; // Usuário do banco de dados
$db_pass = ''; // Senha do banco de dados

// Tenta estabelecer a conexão com o banco de dados usando o PDO
try {
    // Cria uma nova instância da classe PDO para estabelecer a conexão com o banco de dados
    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);

    // Configuração do PDO para lançar exceções em caso de erros, facilitando a detecção e tratamento de problemas na conexão
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {
    // Se ocorrer uma exceção durante a conexão, encerra o script exibindo uma mensagem de erro
    exit('Falha ao conectar ao banco de dados!');
}

// Configurações da autenticação do Google OAuth
$google_oauth_client_id = '529869352786-3eq5s9oqkqmb900ichve6qjdb36cld3k.apps.googleusercontent.com'; // ID do cliente OAuth do Google
$google_oauth_client_secret = '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'; // Segredo do cliente OAuth do Google
$google_oauth_redirect_uri = 'http://localhost/redes/google-oauth2.php'; // URI de redirecionamento após a autenticação do Google
$google_oauth_version = 'v3'; // Versão da API do Google OAuth

// Verifica se o código de autorização está presente na URL e não está vazio
if (isset($_GET['code']) && !empty($_GET['code'])) {
    // Parâmetros para a solicitação do token de acesso do Google OAuth

    // Define os parâmetros necessários para a solicitação do token de acesso do Google OAuth
    $params = [
        'code' => $_GET['code'],                 // Código de autorização recebido do Google após a autenticação do usuário
        'client_id' => $google_oauth_client_id,   // ID do cliente fornecido pelo Console de APIs do Google
        'client_secret' => $google_oauth_client_secret,  // Chave secreta do cliente fornecida pelo Console de APIs do Google
        'redirect_uri' => $google_oauth_redirect_uri,   // URI de redirecionamento registrado no Console de APIs do Google
        'grant_type' => 'authorization_code'     // Tipo de concessão para obter o token de acesso
    ];


    // Inicializa uma sessão cURL para fazer a solicitação do token de acesso ao servidor de autenticação do Google
    $ch = curl_init();

    // Configura as opções da sessão cURL
    curl_setopt($ch, CURLOPT_URL, 'https://accounts.google.com/o/oauth2/token');   // URL para a solicitação do token de acesso
    curl_setopt($ch, CURLOPT_POST, true);                                        // Configura a requisição como POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));             // Adiciona os parâmetros à requisição POST
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                              // Configura o cURL para retornar a resposta como uma string
    $response = curl_exec($ch);                                                  // Executa a sessão cURL
    curl_close($ch);                                                             // Fecha a sessão cURL
    $response = json_decode($response, true);                                    // Decodifica a resposta JSON em um array associativo


    // Verifica se um token de acesso válido foi obtido
    if (isset($response['access_token']) && !empty($response['access_token'])) {
        // Inicializa uma sessão cURL para obter informações do perfil do usuário do Google
        $ch = curl_init();

        // Configura as opções da sessão cURL
        curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/oauth2/' . $google_oauth_version . '/userinfo');  // URL para obter informações do perfil
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                    // Configura o cURL para retornar a resposta como uma string
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $response['access_token']]);       // Adiciona o token de acesso ao cabeçalho da requisição
        $response = curl_exec($ch);                                                                         // Executa a sessão cURL
        curl_close($ch);                                                                                    // Fecha a sessão cURL
        $profile = json_decode($response, true);                                                           // Decodifica a resposta JSON em um array associativo


        // Verifica se o endereço de e-mail está presente no perfil do usuário do Google
        if (isset($profile['email'])) {

            // Inicializa um array para armazenar as partes do nome do usuário do Google
            $google_name_parts = [];

            // Adiciona a parte do nome dada ao array, removendo caracteres especiais
            $google_name_parts[] = isset($profile['given_name']) ? preg_replace('/[^a-zA-Z0-9]/s', '', $profile['given_name']) : '';

            // Adiciona a parte do sobrenome ao array, removendo caracteres especiais
            $google_name_parts[] = isset($profile['family_name']) ? preg_replace('/[^a-zA-Z0-9]/s', '', $profile['family_name']) : '';


            // Prepara uma consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o email corresponde ao email do perfil do usuário do Google
            $stmt = $pdo->prepare('SELECT * FROM accounts WHERE email = ?');

            // Executa a consulta SQL, substituindo o marcador de posição '?' pelo valor do endereço de e-mail do perfil do usuário do Google
            $stmt->execute([$profile['email']]);

            // Obtém a primeira linha do conjunto de resultados como um array associativo
            $account = $stmt->fetch(PDO::FETCH_ASSOC);


            // Verifica se não há uma conta associada ao endereço de e-mail do perfil do usuário do Google
            if (!$account) {

                // Prepara uma consulta SQL para inserir uma nova linha na tabela 'accounts' com as informações do perfil do usuário do Google
                $stmt = $pdo->prepare('INSERT INTO accounts (email, name, picture, registered, method, verified) VALUES (?, ?, ?, ?, ?, ?)');

                // Executa a consulta SQL, substituindo os marcadores de posição pelos valores correspondentes
                $stmt->execute([$profile['email'], implode(' ', $google_name_parts), isset($profile['picture']) ? $profile['picture'] : '', date('Y-m-d H:i:s'), 'google', 'false']);

                // Obtém o ID da última linha inserida na tabela 'accounts'
                $id = $pdo->lastInsertId();

                // Prepara uma consulta SQL para atualizar a coluna 'url' na tabela 'accounts' com o valor fornecido, onde o id corresponde ao usuário
                $stmt = $pdo->prepare('UPDATE accounts SET url = ? WHERE id = ?');

                // Define os valores para atualização (url e id)
                $url = $pdo->lastInsertId(); // Aqui você define a URL desejada

                // Executa a consulta SQL, substituindo os marcadores de posição pelos valores correspondentes
                $stmt->execute([$url, $id]);


                $mailpasta = $id;

                // Caminho da pasta "utilizador" onde você deseja criar a nova pasta
                $utilizadorPath = 'utilizador';

                // Caminho completo da nova pasta
                $newFolderPath = $utilizadorPath . '/' . $mailpasta;

                // Verifica se a pasta ainda não existe
                if (!is_dir($newFolderPath)) {
                    // Cria a pasta com permissões padrão (0777)
                    mkdir($newFolderPath, 0777, true); // O terceiro parâmetro true permite a criação de pastas recursivamente se necessário

                    echo "A pasta '$mailpasta' foi criada com sucesso dentro de '$utilizadorPath'.";
                } else {
                    echo "A pasta '$mailpasta' já existe dentro de '$utilizadorPath'.";
                }


            } else {

                // Se a conta já existe, obtém o ID da conta existente
                $id = $account['id'];
            }


            // Regenera o ID da sessão para aumentar a segurança
            session_regenerate_id();

            // Define variáveis de sessão para indicar que o usuário está autenticado via Google
            $_SESSION['loggedin'] = TRUE;   // Indica que o usuário está autenticado
            $_SESSION['user_id'] = $id;     // Armazena o ID da conta associada ao perfil do usuário do Google


            // Redireciona para a página de perfil após a autenticação bem-sucedida
            header('Location: ./home.php');
            exit;
        } else {
            exit('Não foi possível obter informações do perfil! Por favor, tente novamente mais tarde!');
        }
    } else {
        exit('Token de acesso inválido! Por favor, tente novamente mais tarde!');
    }
} else {
    // Se não houver código na URL, redireciona para a página de autorização do Google OAuth

    // Configuração dos parâmetros para a solicitação de autorização no Google OAuth
    $params = [
        'response_type' => 'code',                                        // Tipo de resposta esperada (código de autorização)
        'client_id' => $google_oauth_client_id,                           // ID do cliente fornecido pelo Console de APIs do Google
        'redirect_uri' => $google_oauth_redirect_uri,                     // URI de redirecionamento registrado no Console de APIs do Google
        'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile', // Escopos solicitados
        'access_type' => 'offline',                                       // Tipo de acesso offline para obter um token de atualização
        'prompt' => 'consent'                                             // Solicitação de consentimento ao usuário
    ];

    // Redireciona o navegador para a URL de autorização do Google OAuth, incluindo os parâmetros na URL
    header('Location: https://accounts.google.com/o/oauth2/auth?' . http_build_query($params));
    exit;
}
?>