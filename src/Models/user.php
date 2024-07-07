<?php

namespace App\Models;

use PDO;

class User
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Exemplo da função register no modelo User
    
    public function criarProjeto()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        // Insere os novos registros
        $stmt_insert = $this->db->prepare("INSERT INTO projects (id_founder, nome, descricao, data, PrivacyProjects, PrivacyLikes, PrivacyComments) VALUES (:id_founder, :nome, :descricao, :data, :PrivacyProjects, :PrivacyLikes, :PrivacyComments)");

        $nome = 'Rascunho';
        $descricao = 'Isto é apenas um Rascunho';
        $data = date('Y-m-d');  // Mantém o formato de data como ano-mês-dia
        $PrivacyProjects = 3;
        $PrivacyLikes = 6;
        $PrivacyComments = 9;

        // Executa a inserção
        $stmt_insert->bindParam(':id_founder', $user_id, PDO::PARAM_INT);
        $stmt_insert->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt_insert->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt_insert->bindParam(':data', $data, PDO::PARAM_STR);
        $stmt_insert->bindParam(':PrivacyProjects', $PrivacyProjects, PDO::PARAM_INT);
        $stmt_insert->bindParam(':PrivacyLikes', $PrivacyLikes, PDO::PARAM_INT);
        $stmt_insert->bindParam(':PrivacyComments', $PrivacyComments, PDO::PARAM_INT);
        $stmt_insert->execute();

        // Obtém o ID do projeto recém-criado
        $project_id = $this->db->lastInsertId();

        echo 'executou 1: ' . $project_id;

        // Chama a função para guardar a imagem de rascunho
        // Definir o caminho do arquivo original
        $arquivoOrigem = '../../public/img/defaultProjectImage.png';

        // Gerar um nome encriptado para a imagem
        $nomeImagemOriginal = basename($arquivoOrigem); // Obter o nome do arquivo original
        $extensao = pathinfo($nomeImagemOriginal, PATHINFO_EXTENSION); // Obter a extensão do arquivo
        $nomeEncriptado = substr(md5($nomeImagemOriginal . time()), 0, 16) . '.' . $extensao; // Nome encriptado com extensão

        // Definir o caminho de destino
        $diretorioDestino = '../../public/users/' . $user_id . '/';
        $arquivoDestino = $diretorioDestino . $nomeEncriptado;

        // Verificar se o diretório de destino existe, caso contrário, criar
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true); // Cria o diretório com permissões recursivas
        }

        echo 'executou 2: ' . $project_id;
        echo basename(__DIR__) . '<br>';


        // Copiar o arquivo
        if (copy($arquivoOrigem, $arquivoDestino)) {
            // Insere a informação da imagem no banco de dados
            $stmt_insert = $this->db->prepare("INSERT INTO projects_images (id_project, image, ordem) VALUES (:id_project, :image, :ordem)");

            $ordem = 1;

            // Executa a inserção
            $stmt_insert->bindParam(':id_project', $project_id, PDO::PARAM_INT);
            $stmt_insert->bindParam(':image', $nomeEncriptado, PDO::PARAM_STR);
            $stmt_insert->bindParam(':ordem', $ordem, PDO::PARAM_INT);
            $stmt_insert->execute();

            echo "A imagem foi copiada com sucesso e registrada no banco de dados! Novo nome: " . $nomeEncriptado;
        } else {
            echo "Falha ao copiar a imagem.";
        }
    }

    public function guardarEditarProjetosImagens1($projeto)
    {
        // Deleta todos os registros com o id_project igual a $projeto
        $stmt_delete = $this->db->prepare("DELETE FROM projects_images WHERE id_project = :projeto");
        $stmt_delete->bindParam(':projeto', $projeto, PDO::PARAM_INT);
        $stmt_delete->execute();
    }


    public function guardarEditarProjetosImagens2($projeto, $ordem, $nome_arquivo)
    {
        // Insere os novos registros
        $stmt_insert = $this->db->prepare("INSERT INTO projects_images (id_project, image, Ordem) VALUES (:projeto, :image, :ordem)");

        // Executa a inserção
        $stmt_insert->bindParam(':projeto', $projeto, PDO::PARAM_INT);
        $stmt_insert->bindParam(':image', $nome_arquivo, PDO::PARAM_STR); // Armazena apenas o nome do arquivo
        $novaordem = $ordem + 1;
        $stmt_insert->bindParam(':ordem', $novaordem, PDO::PARAM_INT);
        $stmt_insert->execute();
    }

    public function guardarComments($p_id, $text)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        // Insere os novos registros
        $stmt_insert = $this->db->prepare("INSERT INTO projects_comments (id_project, id_user_send, comment, parent_comment_id) VALUES (:id_project, :id_user_send, :comment, null)");

        echo 'deuuu';
        // Executa a inserção
        $stmt_insert->bindParam(':id_project', $p_id, PDO::PARAM_INT);
        $stmt_insert->bindParam(':id_user_send', $user_id, PDO::PARAM_INT);
        $stmt_insert->bindParam(':comment', $text, PDO::PARAM_STR);
        $stmt_insert->execute();
    }

    public function guardarParentComments($p_id, $text, $resposta)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        // Insere os novos registros
        $stmt_insert = $this->db->prepare("INSERT INTO projects_comments (id_project, id_user_send, comment, parent_comment_id) VALUES (:id_project, :id_user_send, :comment, :parent_comment_id)");

        // Executa a inserção
        $stmt_insert->bindParam(':id_project', $p_id, PDO::PARAM_INT);
        $stmt_insert->bindParam(':id_user_send', $user_id, PDO::PARAM_INT);
        $stmt_insert->bindParam(':comment', $text, PDO::PARAM_STR);
        $stmt_insert->bindParam(':parent_comment_id', $resposta, PDO::PARAM_INT);
        $stmt_insert->execute();
    }

    public function verificarFollow($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        $stmt = $this->db->prepare("SELECT * FROM follows WHERE id_user = ? AND id_followed = ? LIMIT 1");

        $stmt->execute([$user_id, $id]);  // Bind the id parameter and the identity value

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // Retorna true se um registro foi encontrado, false caso contrário
        return $result !== false;
    }

    public function verificarAgenteExiste($AgenteBooking) 
    {
        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE id_name = ? AND identity = 3 LIMIT 1");

        $stmt->execute([$AgenteBooking]);  // Bind the id parameter and the identity value

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // Retorna true se um registro foi encontrado, false caso contrário
        return $result !== false;
    }

    public function guardarAssuntoChat($idAcc, $message)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        // Insere os novos registros
        $stmt_insert = $this->db->prepare("INSERT INTO chat (id_sender, id_receive, message) VALUES (:id_sender, :id_receive, :message)");

        // Executa a inserção
        $stmt_insert->bindParam(':id_sender', $user_id, PDO::PARAM_INT);
        $stmt_insert->bindParam(':id_receive', $idAcc, PDO::PARAM_INT);
        $stmt_insert->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt_insert->execute();
    }

    public function verificarChat($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        $stmt = $this->db->prepare("SELECT * FROM chat WHERE id_sender = ? AND id_receive = ? LIMIT 1");

        $stmt->execute([$user_id, $id]);  // Bind the id parameter and the identity value

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // Retorna true se um registro foi encontrado, false caso contrário
        return $result !== false;
    }

    public function guardarContract($id_acc, $assuntoContract, $nameFile)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        // Insere os novos registros
        $stmt_insert = $this->db->prepare("INSERT INTO contracts (id_sender, id_receive, file, subject) VALUES (:id_sender, :id_receive, :file, :subject)");

        // Executa a inserção
        $stmt_insert->bindParam(':id_sender', $user_id, PDO::PARAM_INT);
        $stmt_insert->bindParam(':id_receive', $id_acc, PDO::PARAM_INT);
        $stmt_insert->bindParam(':file', $nameFile, PDO::PARAM_STR);
        $stmt_insert->bindParam(':subject', $assuntoContract, PDO::PARAM_STR);
        $stmt_insert->execute();
    }

    public function guardarFollow($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        // Insere os novos registros
        $stmt_insert = $this->db->prepare("INSERT INTO follows (id_user, id_followed) VALUES (:id_user, :id_followed)");

        // Executa a inserção
        $stmt_insert->bindParam(':id_user', $user_id, PDO::PARAM_INT);
        $stmt_insert->bindParam(':id_followed', $id, PDO::PARAM_INT);
        $stmt_insert->execute();
    }

    public function removerFollow($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        // Remove os registros existentes
        $stmt_delete = $this->db->prepare("DELETE FROM follows WHERE id_user = :id_user AND id_followed = :id_followed");

        // Executa a exclusão
        $stmt_delete->bindParam(':id_user', $user_id, PDO::PARAM_INT);
        $stmt_delete->bindParam(':id_followed', $id, PDO::PARAM_INT);
        $stmt_delete->execute();
    }

    public function guardarCommentsLikes($id_comentario)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        // Insere os novos registros
        $stmt_insert = $this->db->prepare("INSERT INTO projects_comments_likes (comment_id, id_user_send) VALUES (:comment_id, :id_user_send)");

        // Executa a inserção
        $stmt_insert->bindParam(':comment_id', $id_comentario, PDO::PARAM_INT);
        $stmt_insert->bindParam(':id_user_send', $user_id, PDO::PARAM_INT);
        $stmt_insert->execute();
    }

    public function ApagarCommentsLikes($id_comentario)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        // Remove os registros existentes
        $stmt_delete = $this->db->prepare("DELETE FROM projects_comments_likes WHERE comment_id = :comment_id AND id_user_send = :id_user_send");

        // Executa a exclusão
        $stmt_delete->bindParam(':comment_id', $id_comentario, PDO::PARAM_INT);
        $stmt_delete->bindParam(':id_user_send', $user_id, PDO::PARAM_INT);
        $stmt_delete->execute();
    }





    public function guardarProjectLikes($id_projeto)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        // Insere os novos registros
        $stmt_insert = $this->db->prepare("INSERT INTO projects_likes (id_project, id_user_send) VALUES (:id_project, :id_user_send)");

        // Executa a inserção
        $stmt_insert->bindParam(':id_project', $id_projeto, PDO::PARAM_INT);
        $stmt_insert->bindParam(':id_user_send', $user_id, PDO::PARAM_INT);
        $stmt_insert->execute();
    }

    public function ApagarProjectLikes($id_projeto)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        // Remove os registros existentes
        $stmt_delete = $this->db->prepare("DELETE FROM projects_likes WHERE id_project = :id_project AND id_user_send = :id_user_send");

        // Executa a exclusão
        $stmt_delete->bindParam(':id_project', $id_projeto, PDO::PARAM_INT);
        $stmt_delete->bindParam(':id_user_send', $user_id, PDO::PARAM_INT);
        $stmt_delete->execute();
    }










    public function getAccountByDirectory($lastDirectoryName)
    {
        // Prepara uma consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o url corresponde ao nome do último diretório
        $stmt = $this->db->prepare('SELECT * FROM accounts WHERE id = ?');

        // Executa a consulta SQL, substituindo o marcador de posição '?' pelo valor de $lastDirectoryName
        $stmt->execute([$lastDirectoryName]);

        // Obtém o resultado da consulta
        return $result = $stmt->fetch(PDO::FETCH_ASSOC); // Retorna a primeira linha do resultado como um array associativo
    }

    public function getVerifyCommentLikes($id_comentario)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql = "SELECT count(id)
                FROM projects_comments_likes
                WHERE comment_id = ?"; // Use placeholder for PDO

        $stmt_rating = $this->db->prepare($sql);
        $stmt_rating->execute([$id_comentario]);  // Bind the id parameter
        return $ratings = $stmt_rating->fetchColumn();
    }

    public function getVerifyUserLike($p_id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        $stmt = $this->db->prepare("SELECT * FROM projects_likes WHERE id_project = ? AND id_user_send = ? LIMIT 1");

        $stmt->execute([$p_id, $user_id]);  // Bind the id parameter and the identity value

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // Retorna true se um registro foi encontrado, false caso contrário
        return $result !== false;
    }

    public function getVerifyUserCommentLike($id_comentario)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        $stmt = $this->db->prepare("SELECT * FROM projects_comments_likes WHERE comment_id = ? AND id_user_send = ? LIMIT 1");

        $stmt->execute([$id_comentario, $user_id]);  // Bind the id parameter and the identity value

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // Retorna true se um registro foi encontrado, false caso contrário
        return $result !== false;
    }

    public function getEditarImagens($count, $p_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM projects_images WHERE id_project = ? ORDER BY ordem");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function getProjects($id)
    {
        $sql = "SELECT * FROM projects WHERE id_founder = ? AND deleted = 0 ORDER BY id DESC"; // Use placeholder para PDO

        $stmt_projects = $this->db->prepare($sql);
        $stmt_projects->execute([$id]);  // Vincula o parâmetro $id
        $result = $stmt_projects->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getProjectsPublic($id, $id_user)
    {
        $sql = "SELECT DISTINCT p.*
        FROM projects p
        LEFT JOIN follows f ON p.id_founder = f.id_followed
        WHERE p.id_founder = ?
        AND (p.PrivacyProjects = 1 
        OR (p.PrivacyProjects = 2 AND f.id_user = ? AND f.id_followed = ?))
        AND p.deleted = 0
        ORDER BY id DESC";

        // Prepara a consulta
        $stmt_projects = $this->db->prepare($sql);

        // Executa a consulta com os parâmetros $id e $id_user
        $stmt_projects->execute([$id, $id_user, $id]);

        // Busca todos os resultados
        $result = $stmt_projects->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getProjectbyId($p_id)
    {
        $sql = "SELECT * FROM projects WHERE id = ?"; // Use placeholder para PDO

        $stmt_projects = $this->db->prepare($sql);
        $stmt_projects->execute([$p_id]);  // Vincula o parâmetro $id
        $result = $stmt_projects->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    public function getProjectsImages($p_id)
    {
        $sql2 = "SELECT * FROM projects_images WHERE id_project = ? ORDER BY ordem"; // Use placeholder for PDO

        $stmt_projects2 = $this->db->prepare($sql2);
        $stmt_projects2->execute([$p_id]);  // Bind the id parameter
        return $result2 = $stmt_projects2->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEditarInfoProjects($count, $p_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function getEditarInfoProjectsCollabs($count, $p_id)
    {
        $stmt = $this->db->prepare("SELECT accounts.id as id, accounts.name as name, accounts.picture as picture, accounts.id_name as idName
        FROM accounts
        JOIN projects_collabs AS ids ON accounts.id = ids.id_user 
        WHERE ids.id_project = ?");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function getBookingUsersComplete($pesquisa)
    {
        session_start();
        $user_id = $_SESSION['user_id'];

        $pesquisa = '%' . $pesquisa . '%'; // Adiciona wildcards para a consulta LIKE
        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE id_name LIKE ? AND identity = ? AND id <> ? LIMIT 5");
        $stmt->execute([$pesquisa, 4, $user_id]);  // Bind the id parameter and the identity value
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Log para verificar o resultado da consulta
        error_log(print_r($result, true));

        return $result;
    }

    public function getEventUsersComplete($pesquisa)
    {
        session_start();
        $user_id = $_SESSION['user_id'];

        $pesquisa = '%' . $pesquisa . '%'; // Adiciona wildcards para a consulta LIKE
        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE id_name LIKE ? AND identity = ? AND id <> ? LIMIT 5");
        $stmt->execute([$pesquisa, 5, $user_id]);  // Bind the id parameter and the identity value
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Log para verificar o resultado da consulta
        error_log(print_r($result, true));

        return $result;
    }

    public function getUsersComplete($pesquisa)
    {
        session_start();
        $user_id = $_SESSION['user_id'];

        $pesquisa = '%' . $pesquisa . '%'; // Adiciona wildcards para a consulta LIKE
        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE id_name LIKE ? AND id <> ? LIMIT 5");
        $stmt->execute([$pesquisa, $user_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Log para verificar o resultado da consulta
        error_log(print_r($result, true));

        return $result;
    }

    public function inserirEvento($dadosEvento, $arrayC_idName)
    {
        $nomeEvento = $dadosEvento['nomeEvento'] ?? '';
        $descricao = $dadosEvento['descricao'] ?? '';
        $data = $dadosEvento['data'] ?? '';
        $empresaBooking = $dadosEvento['empresaBooking'] ?? '';
        $localizacao = $dadosEvento['localizacao'] ?? '';
        $id_projeto = $dadosEvento['id_projeto'] ?? '';

        // Atualizar o projeto
        $stmt = $this->db->prepare("UPDATE Projects SET nome = ?, descricao = ?, data = ?, Booking = ?, local = ? WHERE id = ?");
        $stmt->bindParam(1, $nomeEvento);
        $stmt->bindParam(2, $descricao);
        $stmt->bindParam(3, $data);
        $stmt->bindParam(4, $empresaBooking);
        $stmt->bindParam(5, $localizacao);
        $stmt->bindParam(6, $id_projeto);
        $stmt->execute();

        $stmt = $this->db->prepare("DELETE FROM projects_collabs WHERE id_project = ?");
        $stmt->bindParam(1, $id_projeto);
        $stmt->execute();

        // Inserir colaboradores no projeto
        foreach ($arrayC_idName as $id_name) {
            // Buscar o id do usuário baseado no id_name
            $stmt = $this->db->prepare("SELECT id FROM accounts WHERE id_name = ?");
            $stmt->bindParam(1, $id_name);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $id_user = $user['id'];

                // Inserir na tabela projects_collabs
                $stmt = $this->db->prepare("INSERT INTO projects_collabs (id_project, id_user) VALUES (?, ?)");
                $stmt->bindParam(1, $id_projeto);
                $stmt->bindParam(2, $id_user);
                $stmt->execute();
            }
        }
    }

    public function getCommentsByProject($p_id)
    {
        $stmt = $this->db->prepare(
            "SELECT pc.id, pc.id_project, pc.id_user_send, pc.comment, a.id as id_user, a.id_name, a.picture, pc.parent_comment_id
            FROM 
                projects_comments pc
            JOIN 
                accounts a 
            ON 
                pc.id_user_send = a.id 
            WHERE 
                pc.id_project = ? AND pc.parent_comment_id IS NULL
            ORDER BY 
                id DESC;"
        );
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function verificarEvento($evento)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        $evento = '%' . $evento . '%'; // Adiciona wildcards para a consulta LIKE

        // Mensagem de debug para verificar os parâmetros
        error_log("Parâmetros de verificarEvento: evento = $evento, identity = 5, user_id = $user_id");

        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE id_name LIKE ? AND identity = ? AND id <> ? LIMIT 1");
        $stmt->execute([$evento, 5, $user_id]);  // Bind the id parameter and the identity value

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // Log para verificar o resultado da consulta
        error_log("Resultado da consulta verificarEvento: " . print_r($result, true));

        // Retorna true se um registro foi encontrado, false caso contrário
        return $result !== false;
    }

    public function getSubCommentsByComment($id_comentario)
    {
        $stmt = $this->db->prepare(
            "SELECT 
                pc.id, 
                pc.id_project, 
                pc.id_user_send, 
                pc.comment,
                a.id as id_user, 
                a.id_name, 
                a.picture,
                pc.parent_comment_id
                FROM 
                projects_comments pc
                JOIN 
                accounts a 
                ON 
                pc.id_user_send = a.id 
                WHERE 
                pc.parent_comment_id = ?;"

        );
        $stmt->execute([$id_comentario]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function verificarBooking($booker)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        $booker = '%' . $booker . '%'; // Adiciona wildcards para a consulta LIKE

        // Mensagem de debug para verificar os parâmetros
        error_log("Parâmetros de verificarBooking: booker = $booker, identity = 4, user_id = $user_id");

        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE id_name LIKE ? AND identity = ? AND id <> ? LIMIT 1");
        $stmt->execute([$booker, 4, $user_id]);  // Bind the id parameter and the identity value

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // Log para verificar o resultado da consulta
        error_log("Resultado da consulta verificarBooking: " . print_r($result, true));

        // Retorna true se um registro foi encontrado, false caso contrário
        return $result !== false;
    }

    function getEditarPrivacy($p_id)
    {
        $stmt = $this->db->prepare("SELECT PrivacyProjects, PrivacyLikes, PrivacyComments FROM projects WHERE id = ?");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function getEstatisticas7dias($p_id)
    {
        $stmt = $this->db->prepare("SELECT 
                                        DATE_FORMAT(data, '%Y-%m-%d') AS dia,
                                        SUM(likes) AS likes,
                                        SUM(comments) AS comments
                                    FROM projects_stats_snapshot
                                    WHERE id_projeto = ?
                                        AND data >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)  -- Ajustado para exatamente 7 dias atrás
                                        AND data <= CURDATE()  -- Inclui apenas até a data atual
                                    GROUP BY dia
                                    ORDER BY dia");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function getEstatisticas30dias($p_id)
    {
        $stmt = $this->db->prepare("SELECT 
                                        DATE_FORMAT(data, '%Y-%u') AS semana,
                                        id_projeto,
                                        SUM(likes) AS likes,
                                        SUM(comments) AS comments
                                    FROM 
                                        projects_stats_snapshot 
                                    WHERE 
                                        id_projeto = ?
                                        AND data >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
                                    GROUP BY 
                                        semana, id_projeto
                                    ORDER BY 
                                        semana ASC");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function getEstatisticas1ano($p_id)
    {
        $stmt = $this->db->prepare("SELECT DATE_FORMAT(data, '%Y-%m') AS mes_ano, SUM(likes) AS likes, SUM(comments) AS comments FROM projects_stats_snapshot WHERE id_projeto = ? AND data >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) GROUP BY mes_ano ORDER BY mes_ano");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function getEstatisticastudo($p_id)
    {
        $stmt = $this->db->prepare("SELECT 
                    DATE_FORMAT(data, '%Y-%m') AS mes_ano,
                    SUM(likes) AS likes,
                    SUM(comments) AS comments
                FROM projects_stats_snapshot
                WHERE id_projeto = ?
                GROUP BY mes_ano
                ORDER BY mes_ano");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function getEstatisticasProjeto($p_id)
    {
        $stmt = $this->db->prepare("SELECT likes, comments FROM projects_stats_snapshot WHERE id_projeto = ?");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function editarPrivacidade($dados)
    {
        // Ler dados enviados via POST
        $id_projeto = $dados['id_projeto'];
        $projetos = $dados['projetos'];
        $gostos = $dados['gostos'];
        $comentarios = $dados['comentarios'];

        $stmt = $this->db->prepare("UPDATE projects SET 
        PrivacyProjects = ?, 
        PrivacyLikes = ?, 
        PrivacyComments = ? 
        WHERE id = ?");

        $stmt->bindParam(1, $projetos);
        $stmt->bindParam(2, $gostos);
        $stmt->bindParam(3, $comentarios);
        $stmt->bindParam(4, $id_projeto);
        $stmt->execute();
    }

    public function apagarProjeto($p_id)
    {
        $stmt = $this->db->prepare("UPDATE projects SET deleted = 1 WHERE id = ?");

        $stmt->bindParam(1, $p_id);
        $stmt->execute();
    }

    public function getAccountById($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql_infos = "SELECT * FROM accounts WHERE id = ?";
        $stmt_infos = $this->db->prepare($sql_infos);
        $stmt_infos->execute([$id]);
        return $row_infos = $stmt_infos->fetch(PDO::FETCH_ASSOC);
    }

    public function getProjectTumb($p_id)
    {
        $sql_infos = "SELECT image FROM projects_images WHERE id_project = ? ORDER BY `ordem` ASC";
        $stmt_infos = $this->db->prepare($sql_infos);
        $stmt_infos->execute([$p_id]);

        // Armazenar o valor da coluna 'picture' numa variável
        $picture = $stmt_infos->fetchColumn();

        // Retornar o valor da coluna 'picture'
        return $picture;
    }

    public function getRatings($id)
    {
        // Consulta SQL para obter os dados desejados
        $sql = "SELECT r.stars, r.date, r.comentario, a.picture, a.id, a.id_name as name 
         FROM rating AS r
         INNER JOIN accounts AS a ON r.id_send = a.id
         WHERE r.id_receive = ?";

        $stmt_rating = $this->db->prepare($sql);
        $stmt_rating->execute([$id]);  // Bind the id parameter
        return $ratings = $stmt_rating->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRatingsAccounts($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql = "SELECT r.stars, r.comentario, a.picture, a.id, a.id_name as name
        FROM rating AS r
        INNER JOIN accounts AS a ON r.id_send = a.id
        WHERE r.id_receive = ?"; // Use placeholder for PDO

        $stmt_rating = $this->db->prepare($sql);
        $stmt_rating->execute([$id]);  // Bind the id parameter
        return $ratings = $stmt_rating->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReviewsNumber($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql = "SELECT count(id)
        FROM rating AS r
        WHERE r.id_receive = ?"; // Use placeholder for PDO

        $stmt_rating = $this->db->prepare($sql);
        $stmt_rating->execute([$id]);  // Bind the id parameter
        return $ratings = $stmt_rating->fetchColumn();
    }

    public function getFollowingsList($id)
    {
        $sql = "SELECT a.id_name as id_name, a.picture as picture, a.id as id, a.type as type, a.identity as identity
        FROM accounts a
        JOIN follows f ON a.id = f.id_followed
        WHERE f.id_user = ?";

        $stmt_followings = $this->db->prepare($sql);
        $stmt_followings->execute([$id]);
        $followings = $stmt_followings->fetchAll(PDO::FETCH_OBJ);

        return $followings;
    }

    public function getVerifyProjectLikes($p_id)
    {
        $sql = "SELECT count(id) FROM projects_likes WHERE id_project = ?";

        $stmt_likes = $this->db->prepare($sql);
        $stmt_likes->execute([$p_id]);  // Bind the id parameter
        return $ratings = $stmt_likes->fetchColumn();
    }



    public function getFollowingsListSearch($id, $id_name_user_search)
    {
        // Ajuste na query SQL para incluir a busca por id_name
        $sql = "SELECT a.id_name as id_name, a.picture as picture, a.id as id, a.type as type, a.identity as identity
            FROM accounts a
            JOIN follows f ON a.id = f.id_followed
            WHERE f.id_user = ? AND a.id_name LIKE ?";  // Adiciona a condição LIKE

        // Preparação da consulta SQL
        $stmt_followings = $this->db->prepare($sql);

        // Executa a consulta passando os parâmetros
        $stmt_followings->execute([$id, $id_name_user_search . '%']);

        // Obtém os resultados
        $followings = $stmt_followings->fetchAll(PDO::FETCH_OBJ);

        // Retorna os resultados
        return $followings;
    }



    public function getFollowersList($id)
    {
        $sql = "SELECT a.id_name as id_name, a.picture as picture, a.id as id, a.type as type, a.identity as identity
        FROM accounts a
        JOIN follows f ON a.id = f.id_user
        WHERE f.id_followed = ?";

        $stmt_followings = $this->db->prepare($sql);
        $stmt_followings->execute([$id]);
        $followings = $stmt_followings->fetchAll(PDO::FETCH_OBJ);

        return $followings;
    }

    public function getFollowersListSearch($id, $id_name_user_search)
    {
        // Ajuste na query SQL para incluir a busca por id_name
        $sql = "SELECT a.id_name as id_name, a.picture as picture, a.id as id, a.type as type, a.identity as identity
            FROM accounts a
            JOIN follows f ON a.id = f.id_user
            WHERE f.id_followed = ? AND a.id_name LIKE ?";  // Adiciona a condição LIKE

        // Preparação da consulta SQL
        $stmt_followings = $this->db->prepare($sql);

        // Executa a consulta passando os parâmetros
        $stmt_followings->execute([$id, $id_name_user_search . '%']);

        // Obtém os resultados
        $followings = $stmt_followings->fetchAll(PDO::FETCH_OBJ);

        // Retorna os resultados
        return $followings;
    }




    public function getShowsQuantidade($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql_shows = "SELECT COUNT(*) as shows FROM projects WHERE id_founder = ?";
        $stmt_shows = $this->db->prepare($sql_shows);
        $stmt_shows->execute([$id]);
        return $row_shows = $stmt_shows->fetch(PDO::FETCH_ASSOC);
    }

    public function getVerifyUserFollows($acc_id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        $stmt = $this->db->prepare("SELECT id FROM follows WHERE id_followed = ? AND id_user = ? LIMIT 1");

        $stmt->execute([$acc_id, $user_id]);  // Bind the id parameter and the identity value

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // Retorna true se um registro foi encontrado, false caso contrário
        return $result !== false;
    }

    public function getavgStars($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql_avg_rating = "SELECT AVG(stars) as avg_stars FROM rating WHERE id_receive = ?";
        $stmt_avg_rating = $this->db->prepare($sql_avg_rating);
        $stmt_avg_rating->execute([$id]);
        $row_avg_rating = $stmt_avg_rating->fetch(PDO::FETCH_ASSOC);
        $valor = $row_avg_rating["avg_stars"];
        return $numero_arredondado = round($valor, 1); // arredonda para 12.35
    }

    public function getFollowsQuantidade($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql_follows = "SELECT COUNT(*) as following FROM follows WHERE id_user = ?";
        $stmt_follows = $this->db->prepare($sql_follows);
        $stmt_follows->execute([$id]);
        $row_avg_rating = $stmt_follows->fetch(PDO::FETCH_ASSOC);
        return $following = $row_avg_rating["following"];
    }

    public function getFollowingsQuantidade($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql_follows = "SELECT COUNT(*) as following FROM follows WHERE id_followed = ?";
        $stmt_follows = $this->db->prepare($sql_follows);
        $stmt_follows->execute([$id]);
        $row_avg_rating = $stmt_follows->fetch(PDO::FETCH_ASSOC);
        return $following = $row_avg_rating["following"];
    }

    public function getVerificarDias($p_id)
    {
        $stmt = $this->db->prepare("SELECT id_snapshot FROM projects_stats_snapshot WHERE id_projeto = ?");
        $stmt->execute([$p_id]);  // Bind the id parameter
        return count($stmt->fetchAll(PDO::FETCH_OBJ));
    }

    public function guardarEditarPerfilSobre($dadosEvento)
    {

        $user_id = $_SESSION['user_id'];

        $LBLfotoPerfil = $dadosEvento['LBLfotoPerfil'] ?? '';
        $LBLfotoCapa = $dadosEvento['LBLfotoCapa'] ?? '';
        $TXTnome = $dadosEvento['TXTnome'] ?? '';
        $TXTnumero = $dadosEvento['TXTnumero'] ?? '';
        $TXTemail = $dadosEvento['TXTemail'] ?? '';
        $TXTlocalizacao = $dadosEvento['TXTlocalizacao'] ?? '';
        $TXTdescricao = $dadosEvento['TXTdescricao'] ?? '';
        $youtube = $dadosEvento['youtube'] ?? '';
        $instagram = $dadosEvento['instagram'] ?? '';
        $tiktok = $dadosEvento['tiktok'] ?? '';
        $blog = $dadosEvento['blog'] ?? '';
        $yt_switch = $dadosEvento['yt_switch'] ?? '';
        $ig_switch = $dadosEvento['ig_switch'] ?? '';
        $tiktok_switch = $dadosEvento['tiktok_switch'] ?? '';
        $blog_switch = $dadosEvento['blog_switch'] ?? '';

        $stmt = $this->db->prepare("UPDATE accounts SET picture = ?, picture_background = ?, name = ?, number = ?, email = ?, location = ?, about = ?, Youtube = ?, Instagram = ?, Tiktok = ?, Blog = ?, Active_Youtube = ?, Active_Instagram = ?, Active_Tiktok = ?, Active_Blog = ? WHERE id = ?");
        $stmt->bindParam(1, $LBLfotoPerfil);
        $stmt->bindParam(2, $LBLfotoCapa);
        $stmt->bindParam(3, $TXTnome);
        $stmt->bindParam(4, $TXTnumero);
        $stmt->bindParam(5, $TXTemail);
        $stmt->bindParam(6, $TXTlocalizacao);
        $stmt->bindParam(7, $TXTdescricao);
        $stmt->bindParam(8, $youtube);
        $stmt->bindParam(9, $instagram);
        $stmt->bindParam(10, $tiktok);
        $stmt->bindParam(11, $blog);
        $stmt->bindParam(12, $yt_switch);
        $stmt->bindParam(13, $ig_switch);
        $stmt->bindParam(14, $tiktok_switch);
        $stmt->bindParam(15, $blog_switch);
        $stmt->bindParam(16, $user_id);
        $stmt->execute();
    }
}
