<?php

require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\UserController;
use App\Models\User;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// Cria instâncias do modelo e do controlador
$model = new User($db);
$controller = new UserController($model);

// Verifica se as variáveis foram passadas na requisição
if (isset($_GET['var1']) && isset($_GET['var2'])) {
    // Recupera os valores das variáveis
    $p_id = $_GET['var1'];
    $count = $_GET['var2'];
} else {
    // Se as variáveis não foram passadas, retorne um erro ou uma mensagem adequada
    echo "Erro: Variáveis não foram passadas na requisição.";
}

session_start();
$id = $_SESSION['user_id'];

$result = $controller->getProjectbyId($p_id);

if ($result) {
    $p_id = $result["id"];
    $p_founder = $result["id_founder"];
    $p_nome = $result["nome"];
    $p_userId = $result["Event"];
    $p_bookingUserId = $result["Booking"];
    $p_imagem = $result["imagem"];
    $p_sinopse = $result["sinopse"];
    $p_descricao = $result["descricao"];
    $p_local = $result["local"];
    $p_data = $result["data"];
    $privacy_likes = $result["PrivacyLikes"];
    $privacy_comments = $result["PrivacyComments"];
    $p_like = $controller->getVerifyUserLike($p_id);
} else {
    // Trate o caso onde o projeto não é encontrado
    echo "Projeto não encontrado.";
}



//$p_comments;
//$p_userlike;


// Converte a string de data para um objeto DateTime
$date = new DateTime($p_data);

// Formata a data no formato desejado
$p_data = $date->format('d/m/Y');

// Texto original com quebras de linha
$texto_original2 = $p_descricao;

// Substituir \n por <br>
$texto_formatado2 = nl2br(htmlspecialchars($texto_original2)); // Use nl2br para manter as quebras de linha e htmlspecialchars para escapar caracteres especiais HTML

$p_bookingUserName = $controller->getAccountByDirectory($p_bookingUserId);

$comentarios = $controller->getCommentsByProject($p_id);

if ($p_bookingUserName) {
    $p_bookingUserName = $p_bookingUserName['name'];
}

if ($p_data == '') {
    $p_data = 'Não informado';
}


$row_infos = $controller->getAccountById($p_founder);

if ($row_infos) {
    $sobre = $row_infos["about"];
    $nome = $row_infos["name"];
    $email = $row_infos["email"];
    $numero = $row_infos["number"];
    $localizacao = $row_infos["location"];
    $type_utilizador = $row_infos["type"];
    $fotodeperfil = $row_infos["picture"];
    $fotodecapa = $row_infos["picture_background"];
    $identidadeRow = $row_infos["identity"];
    $id_name_user = $row_infos["id_name"];
    $acc_id = $row_infos["id"];
} else {
    // Tratar o caso onde não há informações adicionais encontradas
    die("No additional account information found for the given ID.");
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


$result2 = $controller->getProjectsImages($p_id);

$follow = $controller->getVerifyUserFollows($acc_id);


if ($privacy_comments == 7 || ($privacy_comments == 8 && $follow == '1') || ($privacy_comments == 9 && $p_founder == $id)) {
    $html = '';
    $html .= '
<div class="row h-100 w-100">
<div class="col-8 h-100 p-0 d-flex align-items-center">

<!-- Main Carousel -->
<div id="carousel' . $count . '" class="carousel slide w-100 h-100" data-bs-ride="carousel">
<div class="carousel-inner w-100 h-100">';

    if (count($result2) > 0) {  // Use PDO method to check rows

        $isActive = true; // For setting the first item as active
        foreach ($result2 as $row2) {

            $pi_imagem = $row2["image"];

            $html .= '
                <div class="carousel-item w-100 h-100 ' . ($isActive ? 'active' : '') . '">
                    <img src="http://localhost/redes/public/users/' . $p_founder . '/' . $pi_imagem . '" class="d-block w-100 img-fluid h-100" alt="...">
                </div>';

            $isActive = false; // Set to false after the first item
        }
    }

    $html .= '
</div>

<button class="carousel-control-prev" type="button" data-bs-target="#carousel' . $count . '" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>

<button class="carousel-control-next" type="button" data-bs-target="#carousel' . $count . '" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>

</div>

<div class="col-4" style="padding-right: 0px;">
<div class="row w-100" style="margin-right: 0px; border-right-width: 10px; padding-right: 0px;">
<div class="w-100 mt-3" style="height: 120px; padding-right: 0px;">
<div class="following-item w-100 mb-2 rounded">
<div class="row align-items-center">
<div class="col-3 text-center">
<img ';
    if ($google_image) {
        $html .= 'src="' . $fotodeperfil . '"';
    } else {
        $html .= 'src="http://localhost/redes/public/users/' . $id . '/' . $fotodeperfil . '"';
    }
    $html .= 'alt="profile_image" class="rounded-circle img-fluid shadow-sm" style="height: 40px; width: 40px; object-fit: cover;">
</div>
<div class="col-9" style="margin-left: -1.5em;">
<a href="utilizadores/' . $p_founder . '.php"><h6 class="title mb-0" style="font-size: 14px;">@' . $id_name_user . '</h6></a>';
    if ($p_userId) {
        $html .= '<p class="text-muted mb-0 text-sm" style="font-size: 11px;"><a href="' . $p_userId . '.php">' . $p_nome . '</a></p>';
    } else {
        $html .= '<p class="text-muted mb-0 text-sm" style="font-size: 11px;">' . $p_nome . '</p>';
    }
    $html .= '
</div>
<div class="row mt-2 ms-0">
<div class="col-6" style="margin-bottom: 2px; height: 20px;">';
    if ($p_local) {
        $html .= '<p style="width: 100%; font-size: 13px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><strong>Localização: </strong> <a target="_blank" href="https://www.google.pt/maps/search/' . $p_local . '">' . $p_local . '</p></a>';
    } else {
        $html .= '<p style="width: 100%; font-size: 13px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><strong>Localização: </strong>Não informado</p>';
    }

    $html .= '
</div>
<div class="col-6" style="margin-bottom: 2px; height: 20px;">
<p style="width: 100%; font-size: 13px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><strong>Data:</strong> ' . $p_data . '</p>
</div>';

    if ($p_bookingUserName) {
        $html .= '<p style="margin-bottom: 2px; width: 100%; font-size: 13px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><strong>Empresa de Booking:</strong> <a href="' . $p_bookingUserId . '.php">' . $p_bookingUserName . '</a></p>';
    } else {
        $html .= '<p style="margin-bottom: 2px; width: 100%; font-size: 13px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><strong>Empresa de Booking:</strong> Não informado</p>';
    }


    $html .= '
<div id="divDescricao' . $count . '">
<p id="pDescricao' . $count . '" style="margin-bottom: 2px; width: 100%; height: 40px; font-size: 13px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
<strong>Descrição:</strong> ' . $p_descricao . '
</p>';

    $collabs = $controller->getEditarInfoProjectsCollabs($count, $p_id);

    // Verifica se a consulta retornou resultados
    if (!empty($collabs)) {  // Verifica se $result não está vazio
        $contador = 1;
        $html .= '<div id="collabs' . $count . '" class="d-none mt-2">';
        $html .= '<p style="width: 100%; margin-bottom: 6px; font-size: 13px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><strong>Colaborações:</strong></p>';
        $html .= '<div class="row">';
        // Exibindo os dados encontrados
        foreach ($collabs as $collabs_row) {

            $collab_name = $collabs_row->name;
            $collab_picture = $collabs_row->picture;
            $collab_idName = $collabs_row->idName;
            $collab_idUser = $collabs_row->id;

            // Obtém a extensão do arquivo em letras minúsculas
            $extension = strtolower(pathinfo($collab_picture, PATHINFO_EXTENSION));

            // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

            // Verifica se a extensão está na lista de extensões permitidas
            if (in_array($extension, $allowed_extensions)) {
                $google_image3 = false;
            } else {
                $google_image3 = true;
            }

            if ($contador == 2) {
                $contador = 1;
                $html .= '</div>';
                $html .= '<div class="row">';
            }

            $html .= '
                    <div class="col-6">
                        <li class="list-group-item pt-0 pb-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">';
                                        if ($google_image3 == false) {
                                            $html .= '<img class="rounded-circle image-fluid" style="object-fit: cover; width: 35px; height: 35px;" src="../public/users/' . $collab_idUser . '/' . $collab_picture . '">';
                                        } else {
                                            $html .= '<img class="rounded-circle image-fluid" src="' . $collab_picture . '" style="object-fit: cover; width: 35px; height: 35px;">';
                                        }
                                        $html .= '</div>
                                <div class="flex-grow-1">
                                    <a href="' . $collab_idUser . '.php"><h6 class="mb-0 text-sm" style="font-size: 13px;">@' . $collab_idName . '</h6></a>
                                    <p class="mb-0 text-muted text-xs" style="font-size: 13px;" id="idNameUser" >' . $collab_name . '</p>
                                </div>
                            </div>
                        </li>
                    </div>
                    ';
        }
        $html .= '</div>';
        $html .= '</div>';
    } else {
        $html .= '<div id="collabs' . $count . '" class="d-none mt-2"></div>';
    }
    $html .= '</div>
</div>
<button type="button" id="alterarElementos' . $count . '" onclick="alterarElementos(' . $count . ')" class="btn btn-primary mt-1 btn-sm w-50" style="margin-left: 8.75em; padding-top: 2px; padding-bottom: 2px; padding-left: 6px; padding-right: 6px; font-size: 11px;">Ver Mais</button>
<div class="border-top w-85 mx-auto"></div>
<div id="divComentarios' . $count . '" class="w-100 overflow-auto" style="height: 240px;">
<div class="mt-3"></div>';

    // Verifica se a consulta retornou resultados
    if (!empty($comentarios)) {  // Verifica se $result não está vazio

        // Exibindo os dados encontrados
        foreach ($comentarios as $comentarios_row) {

            $id_comentario = $comentarios_row->id;

            $comment_name = $comentarios_row->id_name;

            $comentario = $comentarios_row->comment;

            $fotodeperfil2 = $comentarios_row->picture;

            $commentUserId = $comentarios_row->id_user;

            $UserComment = $comentarios_row->id_user_send;

            // Obtém a extensão do arquivo em letras minúsculas
            $extension = strtolower(pathinfo($fotodeperfil2, PATHINFO_EXTENSION));

            // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

            // Verifica se a extensão está na lista de extensões permitidas
            if (in_array($extension, $allowed_extensions)) {
                $google_image2 = false;
            } else {
                $google_image2 = true;
            }

            $p_likes = $controller->getVerifyUserCommentLike($id_comentario);

            $likes = $controller->getVerifyCommentLikes($id_comentario);

            if (!$likes) {
                $likes = 0;
            }

            $subComentarios = $controller->getSubCommentsByComment($id_comentario);


            $html .= '
<div>
<div class="row">
<div class="col-2">';
            if ($google_image2 == false) {
                $html .= '<img class="rounded-circle image-fluid" style="object-fit: cover; width: 35px; height: 35px;" src="../public/users/' . $UserComment . '/' . $fotodeperfil2 . '">';
            } else {
                $html .= '<img class="rounded-circle image-fluid" src="' . $fotodeperfil2 . '" style="object-fit: cover; width: 35px; height: 35px;">';
            }

            $html .= '
</div>
<div class="col-9">
<a href="utilizadores/' . $commentUserId . '.php"><p style="margin-top: -0.25em; margin-left: -1em; font-size: 12px;"><strong>@' . $comment_name . '</strong></p></a>
<p class="text-justify" style="margin-top: -1.25em; margin-left: -1em; font-size: 12px;">' . $comentario . '
</p>
</div>
<div class="col-1 mt-1" style="margin-left: -1em;">
<button id="color-changing-btn" onclick="toggleColorLike(this), guardarLike(' . $id_comentario . ', this)" style="border: 0px; background-color: white !important;">';
            if ($p_likes) {
                $html .= '<i class="ni ni-favourite-28 text-primary" style="transition: color 0.2s ease; font-size: 15px;"></i>';
            } else {
                $html .= '<i class="ni ni-favourite-28 text-secondary" style="transition: color 0.2s ease; font-size: 15px;"></i>';
            }
            $CommentReply = "CommentReply(" . $id_comentario . ", '@" . $comment_name . "', " . $count . ")";
            $html .= '</button>
</div>
</div>
<div class="row" style="margin-top: -1.2em; width: 87.5%;margin-left: 2em;cursor: pointer;">
<div class="col-4">
<button id="color-changing-btn" style="cursor: default; border: 0px; background-color: white !important;">
<p style="font-size: 10px;" id="likes-' . $id_comentario . '">' . $likes . ' Gostos</p>
</button>
</div>

<div class="col-3"> 
<button id="color-changing-btn" onclick="' . $CommentReply . '" style="border: 0px; background-color: white !important;">
<p style="font-size: 10px;">Responder</p>
</button>
</div>
</div>';


            if (!empty($subComentarios)) {  // Verifica se $result não está vazio
                $html .= '<div class="row" onclick="toggleResponses(' . $id_comentario . ')" style="width: 87.5%;margin-left: 2em;cursor: pointer;height: 10px;padding-top: 10px;padding-bottom: 10px; margin-top: -0.75em; margin-bottom: 0.5em;">
<div class="col-4">
<div class="border-top w-85 mx-auto"></div>
</div>

<div class="col-4" style="padding-left: 0px; padding-right: 0px;">
<p style="margin-top: -0.83em; font-size: 10px;">Mostrar Respostas</p>
</div>

<div class="col-4">
<div class="border-top w-85 mx-auto"></div>
</div>
</div>';
            }


            $html .= '
<div id="' . $id_comentario . '" style="display: none;">';

            // Verifica se a consulta retornou resultados
            if (!empty($subComentarios)) {  // Verifica se $result não está vazio

                // Exibindo os dados encontrados
                foreach ($subComentarios as $subComentarios_row) {

                    $id_comentario = $subComentarios_row->id;

                    $comment_name = $subComentarios_row->id_name;

                    $comentario = $subComentarios_row->comment;

                    $fotodeperfil2 = $subComentarios_row->picture;

                    $commentUserId = $subComentarios_row->id_user;

                    $UserComment = $subComentarios_row->id_user_send;

                    // Obtém a extensão do arquivo em letras minúsculas
                    $extension = strtolower(pathinfo($fotodeperfil2, PATHINFO_EXTENSION));

                    // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
                    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

                    // Verifica se a extensão está na lista de extensões permitidas
                    if (in_array($extension, $allowed_extensions)) {
                        $google_image2 = false;
                    } else {
                        $google_image2 = true;
                    }

                    $p_likes = $controller->getVerifyUserCommentLike($id_comentario);

                    $likes = $controller->getVerifyCommentLikes($id_comentario);

                    if (!$likes) {
                        $likes = 0;
                    }

                    $html .= '
<div class="row" style="margin-left: 1.75em; width: 93%;">
<div class="col-2">';
                    if ($google_image2 == false) {
                        $html .= '<img class="rounded-circle image-fluid" style="object-fit: cover; width: 35px; height: 35px;" src="../public/users/' . $UserComment . '/' . $fotodeperfil2 . '">';
                    } else {
                        $html .= '<img class="rounded-circle image-fluid" src="' . $fotodeperfil2 . '" style="object-fit: cover; width: 35px; height: 35px;">';
                    }
                    $html .= '
</div>
<div class="col-9 ms-1">
<a href="' . $commentUserId . '.php"><p style="margin-top: -0.25em; margin-left: -1em; font-size: 12px;"><strong>@' . $comment_name . '</strong></p></a>
<p class="text-justify" style="margin-top: -1.25em; margin-left: -1em; font-size: 12px;">' . $comentario . '
</p>
</div>
<div class="col-1" style="margin-left: -1em;">
<button id="color-changing-btn" onclick="toggleColorLike(this), guardarLike(' . $id_comentario . ', this)" style="border: 0px; background-color: white !important;">';
                    if ($p_likes) {
                        $html .= '<i class="ni ni-favourite-28 text-primary" style="transition: color 0.2s ease; font-size: 15px;"></i>';
                    } else {
                        $html .= '<i class="ni ni-favourite-28 text-secondary" style="transition: color 0.2s ease; font-size: 15px;"></i>';
                    }
                    $html .= '</button>
</div>

<div class="row" style="margin-top: -1.2em; width: 87.5%;margin-left: 2em;cursor: pointer;">
<div class="col-4">
<button id="color-changing-btn" style="cursor: default; border: 0px; background-color: white !important;">
<p style="font-size: 10px;" id="likes-' . $id_comentario . '">' . $likes . ' Gostos</p>
</button>
</div>
</div>
</div>';
                }
            }
            $html .= '
</div>

</div>';
        }
    }

    $html .= '

<div class="mt-2 w-85 mx-auto"></div>
</div>
<div id="separator' . $count . '" class="border-top mt-1 w-85 mx-auto"></div>
<div class="ms-1" style="margin-top: 0.75em; display: flex; align-items: center;">
<div class="row w-100" style="height: 20px;">
<div class="col-2">
<button id="color-changing-btn" onclick="toggleColorLike(this), guardarProjectLike(' . $p_id . ', this)" style="border: 0px; background-color: white !important;">';
    if ($p_like) {
        $html .= '<i class="ni ni-favourite-28 text-primary" style="transition: color 0.2s ease; font-size: 20px;"></i>';
    } else {
        $html .= '<i class="ni ni-favourite-28 text-secondary" style="transition: color 0.2s ease; font-size: 20px;"></i>';
    }

    $p_likes = $controller->getVerifyProjectLikes($p_id);

    if (!$p_likes) {
        $p_likes = 0;
    }

    $html .= '</button>
</div>
<div class="col-10">';
    if ($privacy_likes == 4 || ($privacy_likes == 5 && $follow == '1') || $p_founder == $id) {
        $html .= '<p class="me-auto" id="Projeto-' . $p_id . '" style="font-size: 14px; margin-left: -1.5em;"><strong>' . $p_likes . ' Gostos</strong></p>';
    } else {
        $html .= '<p class="me-auto" style="font-size: 14px; margin-left: -1.5em;"><strong> Gostar</strong></p>';
    }
    $html .= '
</div>
</div>
</div>
<div class="input-group ms-1" style="margin-top: 1em;">
<input type="text" id="chat' . $count . '" class="form-control form-control-sm" style="height: 40px; font-size: 12px;" placeholder="Adiciona um comentário..." aria-label="Recipients username" aria-describedby="button-addon2">
<button class="btn btn-outline-primary btn-sm mb-0" type="button" style="height: 40px; font-size: 12px;" onclick="CommentSend(' . $count . ', ' . $p_id . ')" id="button-addon2">Enviar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>';
} else if ($privacy_comments == 8 || $privacy_comments == 9) {




    $html = '';
    $html .= '
<div class="row h-100 w-100">
<div class="col-8 h-100 p-0 d-flex align-items-center">

<!-- Main Carousel -->
<div id="carousel' . $count . '" class="carousel slide w-100 h-100" data-bs-ride="carousel">
<div class="carousel-inner w-100 h-100">';

    if (count($result2) > 0) {  // Use PDO method to check rows

        $isActive = true; // For setting the first item as active
        foreach ($result2 as $row2) {

            $pi_imagem = $row2["image"];

            $html .= '
<div class="carousel-item w-100 h-100 ' . ($isActive ? 'active' : '') . '">
<img src="http://localhost/redes/public/users/' . $id . '/' . $pi_imagem . '" class="d-block w-100 h-100" alt="...">
</div>';

            $isActive = false; // Set to false after the first item
        }
    }

    $html .= '
</div>

<button class="carousel-control-prev" type="button" data-bs-target="#carousel' . $count . '" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>

<button class="carousel-control-next" type="button" data-bs-target="#carousel' . $count . '" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>

</div>

<div class="col-4" style="padding-right: 0px;">
<div class="row w-100" style="margin-right: 0px; border-right-width: 10px; padding-right: 0px;">
<div class="w-100 mt-3" style="height: 120px; padding-right: 0px;">
<div class="following-item w-100 mb-2 rounded">
<div class="row align-items-center">
<div class="col-3 text-center">
<img ';
    if ($google_image) {
        $html .= 'src="' . $fotodeperfil . '"';
    } else {
        $html .= 'src="http://localhost/redes/public/users/' . $id . '/' . $fotodeperfil . '"';
    }
    $html .= 'alt="profile_image" class="rounded-circle img-fluid shadow-sm" style="height: 40px; width: 40px; object-fit: cover;">
</div>
<div class="col-9" style="margin-left: -1.5em;">
<a href="utilizadores/' . $p_founder . '.php"><h6 class="title mb-0" style="font-size: 14px;">@' . $id_name_user . '</h6></a>';
    if ($p_userId) {
        $html .= '<p class="text-muted mb-0 text-sm" style="font-size: 11px;"><a href="' . $p_userId . '.php">' . $p_nome . '</a></p>';
    } else {
        $html .= '<p class="text-muted mb-0 text-sm" style="font-size: 11px;">' . $p_nome . '</p>';
    }
    $html .= '
</div>
<div class="row mt-2 ms-0">
<div class="col-6" style="margin-bottom: 2px; height: 20px;">';
    if ($p_local) {
        $html .= '<p style="width: 100%; font-size: 13px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><strong>Localização: </strong> <a target="_blank" href="https://www.google.pt/maps/search/' . $p_local . '">' . $p_local . '</p></a>';
    } else {
        $html .= '<p style="width: 100%; font-size: 13px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><strong>Localização: </strong>Não informado</p>';
    }

    $html .= '
</div>
<div class="col-6" style="margin-bottom: 2px; height: 20px;">
<p style="width: 100%; font-size: 13px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><strong>Data:</strong> ' . $p_data . '</p>
</div>';

    if ($p_bookingUserName) {
        $html .= '<p style="margin-bottom: 2px; width: 100%; font-size: 13px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><strong>Empresa de Booking:</strong> <a href="' . $p_bookingUserId . '.php">' . $p_bookingUserName . '</a></p>';
    } else {
        $html .= '<p style="margin-bottom: 2px; width: 100%; font-size: 13px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><strong>Empresa de Booking:</strong> Não informado</p>';
    }


    $html .= '
<div class="overflow-auto" style="height: 360px;" id="divDescricao' . $count . '">
<p id="pDescricao' . $count . '" style="margin-bottom: 2px; width: 100%; height: auto; font-size: 13px; textOverflow: unset; text-overflow: ellipsis; display: block; -webkit-line-clamp: unset; -webkit-box-orient: vertical;">
<strong>Descrição:</strong> ' . $p_descricao . '
</p>';

    $collabs = $controller->getEditarInfoProjectsCollabs($count, $p_id);

    // Verifica se a consulta retornou resultados
    if (!empty($collabs)) {  // Verifica se $result não está vazio
        $contador = 1;
        $html .= '<div id="collabs' . $count . '" class="mt-2">';
        $html .= '<p style="width: 100%; margin-bottom: 6px; font-size: 13px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><strong>Colaborações:</strong></p>';
        $html .= '<div class="row">';
        // Exibindo os dados encontrados
        foreach ($collabs as $collabs_row) {

            $collab_name = $collabs_row->name;
            $collab_picture = $collabs_row->picture;
            $collab_idName = $collabs_row->idName;
            $collab_idUser = $collabs_row->id;

            // Obtém a extensão do arquivo em letras minúsculas
            $extension = strtolower(pathinfo($collab_picture, PATHINFO_EXTENSION));

            // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

            // Verifica se a extensão está na lista de extensões permitidas
            if (in_array($extension, $allowed_extensions)) {
                $google_image3 = false;
            } else {
                $google_image3 = true;
            }

            if ($contador == 2) {
                $contador = 1;
                $html .= '</div>';
                $html .= '<div class="row">';
            }

            $html .= '
<div class="col-6">
<li class="list-group-item pt-0 pb-4">
<div class="d-flex align-items-center">
    <div class="flex-shrink-0 me-3">';
            if ($google_image3 == false) {
                $html .= '<img class="rounded-circle image-fluid" style="object-fit: cover; width: 35px; height: 35px;" src="../public/users/' . $collab_idUser . '/' . $collab_picture . '">';
            } else {
                $html .= '<img class="rounded-circle image-fluid" src="' . $collab_picture . '" style="object-fit: cover; width: 35px; height: 35px;">';
            }
            $html .= '</div>
    <div class="flex-grow-1">
        <a href="' . $collab_idUser . '.php"><h6 class="mb-0 text-sm" style="font-size: 13px;">@' . $collab_idName . '</h6></a>
        <p class="mb-0 text-muted text-xs" style="font-size: 13px;" id="idNameUser" >' . $collab_name . '</p>
    </div>
</div>
</li>
</div>
';
        }
        $html .= '</div>';
        $html .= '</div>';
    } else {
        $html .= '<div id="collabs' . $count . '" class="d-none mt-2"></div>';
    }
    $html .= '</div>
</div>
<div id="separator' . $count . '" class="border-top mt-1 w-85 mx-auto"></div>
<div class="ms-1" style="margin-top: 0.75em; display: flex; align-items: center;">
<div class="row w-100" style="height: 20px;">
<div class="col-2">';


    $p_likes = $controller->getVerifyProjectLikes($p_id);

    if (!$p_likes) {
        $p_likes = 0;
    }

    $html .= '
    <button id="color-changing-btn" onclick="toggleColorLike(this), guardarProjectLike(' . $p_id . ', this)" style="border: 0px; background-color: white !important;">';
    if ($p_like) {
        $html .= '<i class="ni ni-favourite-28 text-primary" style="transition: color 0.2s ease; font-size: 20px;"></i>';
    } else {
        $html .= '<i class="ni ni-favourite-28 text-secondary" style="transition: color 0.2s ease; font-size: 20px;"></i>';
    }

    $p_likes = $controller->getVerifyProjectLikes($p_id);

    if (!$p_likes) {
        $p_likes = 0;
    }

    $html .= '</button>
</div>
<div class="col-10">';
    if ($privacy_likes == 4 || ($privacy_likes == 5 && $follow == '1') || $p_founder == $id) {
        $html .= '<p class="me-auto" id="Projeto-' . $p_id . '" style="font-size: 14px; margin-left: -1.5em;"><strong>' . $p_likes . ' Gostos</strong></p>';
    } else {
        $html .= '<p class="me-auto" style="font-size: 14px; margin-left: -1.5em;"><strong> Gostar</strong></p>';
    }


    $html .= '
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>';
}

echo $html;
