<?php
require_once __DIR__ . '/../../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\ChatController;
use App\Models\Message;
use App\Helpers\Database;

$db = Database::connect();

// Verificação de erro na conexão com o banco de dados
if (!$db) {
    die("Erro ao conectar ao banco de dados");
}

// Cria instâncias do modelo e do controlador
$model = new Message($db);
$controller = new ChatController($model);

// Iniciar a sessão se ainda não estiver iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$session = $_SESSION['user_id'] ?? null; // Obtém o ID do usuário da sessão

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'send') {

    echo 'Enviando mensagem...';
    // Enviar mensagem
    $user = htmlspecialchars($_POST['user']);
    $message = htmlspecialchars($_POST['message']);

    $controller->sendMessage($user, $message);
} else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'options') {

    $search = htmlspecialchars($_GET['search']);
    
    $result = $controller->getOptions($search);

    // Check if there are results
    if (count($result) > 0) {
        $uniqueIds = [];
        foreach ($result as $row) {
            $uniqueIds[] = $row['id'];
        }
        $uniqueIds = array_unique($uniqueIds);
        foreach ($uniqueIds as $id) {

            $result2 = $controller->getChatTrade($id);

            if ($result2) {
                $id_name = htmlspecialchars($result2['id_name']);
                $fotodeperfil = htmlspecialchars($result2['picture']); // Segurança: evitar XSS
                $visto = htmlspecialchars($result2['viewed']);
                $message = htmlspecialchars($result2['message']);
                $date_bd = htmlspecialchars($result2['date']);
                $id_sender = htmlspecialchars($result2['id_sender']);
            }

            $result3 = $controller->getViews($id);

            $vistas = count($result3); // Count the number of rows fetched

            if ($id_sender == $session) {
                if ($visto == 1) {
                    $visto = 'svg15 me-1 double-check-blue';
                } else {
                    $visto = 'svg15 me-1 double-check';
                }
            } else {
                $visto = '';
            }

            // Obter data atual
            $date_atual = time(); // Isso retorna a data atual

            // Converter a data do banco de dados para um Unix timestamp
            $date_bd = strtotime($date_bd);

            // Calcular a diferença em segundos
            $diferenca_segundos = $date_atual - $date_bd;

            // Converter a diferença de segundos para dias
            $diferenca_dias = floor($diferenca_segundos / (60 * 60 * 24));

            if ($diferenca_dias == 0) {
                $diferenca_dias = "Hoje";
            } else if ($diferenca_dias == 1) {
                $diferenca_dias .= ' Dia';
            } else {
                $diferenca_dias .= ' Dias';
            }

            // Obtém a extensão do arquivo em letras minúsculas
            $extension = strtolower(pathinfo($fotodeperfil, PATHINFO_EXTENSION));

            // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

            // Verifica se a extensão está na lista de extensões permitidas
            if (in_array($extension, $allowed_extensions)) {
                $google_image = false;
            } else {
                $google_image = true;
            }

            if ($google_image) {
                $fotodeperfil = 'src="' . $fotodeperfil . '"';
            } else {
                $fotodeperfil = 'src="http://localhost/Estagio2024/public/users/' . $id . '/' . $fotodeperfil . '"';
            }

            if ($vistas != 0) {
                $vistas = '<span class="round badge badge-light-success margin-auto">' . $vistas . '</span>';
            } else {
                $vistas = '';
            }

            echo '<div onclick="abrirMensagens(' . $id . ')" id=' . $id . ' class="chat-item d-flex ps-3 pe-0 pt-3 pb-3">
                <div class="w-100">
                <div class="d-flex ps-0">
                    <img class="rounded-circle shadow avatar-sm me-3 img-fluid" style="object-fit: cover;" ' . $fotodeperfil . '>
                    <div>
                    <p class="margin-auto fw-400 text-dark-75">@' . $id_name . '</p>
                    <div class="d-flex flex-row mt-1">
                        <span>
                        <div class="' . $visto . '"></div>
                        </span>
                        <span class="message-shortcut margin-auto text-muted fs-13 ml-1 me-4">' . $message . '</span>
                    </div>
                    </div>
                </div>
                </div>
                <div class="flex-shrink-0 margin-auto ps-2 pe-3">
                <div class="d-flex flex-column">
                    <p class="text-muted text-right fs-13 mb-2">' . $diferenca_dias . '</p>'
                . $vistas . '
                </div>
                </div>
            </div>';
        }
    } else {
        echo "Nenhuma mensagem.";
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'loadMessages' && isset($_GET['user'])) {

    // Carregar mensagens com um usuário específico
    $user = htmlspecialchars($_GET['user']);

    // Consulta geral para obter informações do último chat com o usuário específico
    $result2 = $controller->getLastChat($user);

    if ($result2) {
        $id_acc = htmlspecialchars($result2['id']);
        $id_name = htmlspecialchars($result2['id_name']);
        $fotodeperfil = htmlspecialchars($result2['picture']); // Agora $fotodeperfil será definido se houver linhas
        $date_bd = htmlspecialchars($result2['date']);
        $id_sender = htmlspecialchars($result2['id_sender']);
    }

    // Atualizar mensagens para marcá-las como vistas se o usuário não for o mesmo que a sessão atual
    if ($session != $id_sender) {
        $controller->saveView($user);
    }

    // Verificação da extensão do arquivo da imagem do perfil
    $extension = strtolower(pathinfo($fotodeperfil, PATHINFO_EXTENSION));

    // Verificar se a extensão do arquivo está em um array de extensões de imagem permitidas
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

    // Verifica se a extensão está na lista de extensões permitidas
    if (in_array($extension, $allowed_extensions)) {
        $google_image = false;
    } else {
        $google_image = true;
    }

    if ($google_image) {
        $fotodeperfil = 'src="' . $fotodeperfil . '"';
    } else {
        $fotodeperfil = 'src="http://localhost/Estagio2024/public/users/' . $user . '/' . $fotodeperfil . '"';
    }

    // Obter a data atual
    $date_atual = time(); // Retorna a data atual em UNIX timestamp

    // Converter a data do banco de dados para UNIX timestamp
    $date_bd = strtotime($date_bd);

    // Calcular a diferença em segundos
    $diferenca_segundos = $date_atual - $date_bd;

    // Converter a diferença de segundos para dias
    $diferenca_dias = floor($diferenca_segundos / (60 * 60 * 24));

    if ($diferenca_dias == 0) {
        $diferenca_dias = "Hoje";
    } else if ($diferenca_dias == 1) {
        $diferenca_dias .= ' Dia atrás';
    } else {
        $diferenca_dias .= ' Dias atrás';
    }

    // Saída do cabeçalho do chat com as informações do usuário
    echo '<div class="p-3 chat-header">
            <div class="d-flex">
                <div class="w-100 d-flex ps-0">
                    <img class="rounded-circle shadow avatar-sm me-3 chat-profile-picture img-fluid" style="object-fit: cover;" ' . $fotodeperfil . '>
                    <div class="me-3">
                      <a href="utilizadores/' . $id_acc . '.php">
                        <p class="fw-400 mb-0 text-dark-75">@' . $id_name . '</p>
                      </a>
                      <p class="sub-caption text-muted text-small mb-0"><i class="la la-clock me-1"></i>Última mensagem - ' . $diferenca_dias . '</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-100">
            <div class="scrollResponsive w-100 p-3 overflow-auto mt-auto" style="flex-direction: column; justify-content: flex-end;">';


        $result = $controller->getMessages($user);

    if ($result) {
        $saver = 0;
        foreach ($result as $row) {
            $id_sender = htmlspecialchars($row['id_sender']);
            $message = htmlspecialchars($row['message']);
            $date_bd = htmlspecialchars($row['date']);
            $vistas = htmlspecialchars($row['viewed']);

            // Converter a data do banco de dados para UNIX timestamp
            $date_trans = strtotime($date_bd);

            // Calcular a diferença em segundos
            if ($saver != 0) {
                $diferenca_segundos = $saver - $date_trans;
            }

            // Converter a diferença de segundos para horas
            $diferenca_horas = floor($diferenca_segundos / (60 * 60 * 12));

            $saver = $date_trans; // Armazenar a data atual

            // Formatar a data para exibir apenas as horas e minutos
            $time = date('H:i', $date_trans);

            // Verificar se a mensagem foi vista
            if ($vistas != 0) {
                $vistas_html = '<div class="svg15 double-check-blue"></div>';
            } else {
                $vistas_html = '<div class="svg15 double-check"></div>';
            }

            // Verificar se a mensagem é do usuário atual ou do outro usuário
            if ($id_sender == $session) {
                echo '<div class="d-flex flex-row-reverse mb-2">
                        <div class="right-chat-message fs-13 mb-2">
                          <div class="mb-0 me-3 pe-4">
                            <div class="flex-row">
                              <div class="pe-2" style="font-size: 13px;">' . $message . '</div>
                              <div class="pe-4"></div>
                            </div>
                          </div>
                          <div class="message-options dark">
                            <div class="message-time" style="font-size: 9px;">
                              <div class="d-flex flex-row">
                                <div class="me-2">' . $time . '</div>
                                ' . $vistas_html . '
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>';
            } else {
                echo '<div class="left-chat-message fs-13 mb-2">
                        <p class="mb-0 me-3 pe-4" style="font-size: 13px;">' . $message . '</p>
                        <div class="message-options">
                          <div class="message-time" style="font-size: 9px;">' . $time . '</div>
                        </div>
                      </div>';
            }
        }
    } else {
        echo "Nenhuma mensagem.";
    }

    echo '</div>
        </div>';
}
?>
