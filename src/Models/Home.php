<?php

namespace App\Models;

use PDO;

class Home
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getSugestions()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        // Consulta para obter o identity do usuário logado
        $stmt = $this->db->prepare("SELECT identity FROM accounts WHERE id = ?;");
        $stmt->execute([$user_id]);  // Vincula o parâmetro id

        $result = $stmt->fetch(PDO::FETCH_ASSOC);  // Modo de fetch para obter um array associativo

        $sug_identity = $result['identity'];

        // Definição do valor de $sug com base no identity do usuário logado
        switch ($sug_identity) {
            case 1:
                $sug = 3; // um artista quer um agente de booking
                break;
            case 2:
                $sug = 1; // um promotor quer um artista
                break;
            case 3:
                $sug = 2; // agente de booking quer um promotor
                break;
            case 4:
                $sug = 5; // uma agencia de booking quer um evento
                break;
            default:
                $sug = 4; // um evento quer uma agencia de booking
                break;
        }

        // Consulta para obter sugestões com base nos critérios especificados
        $stmt = $this->db->prepare("SELECT DISTINCT a.id, a.id_name, a.picture, a.identity
                                    FROM accounts a
                                    LEFT JOIN follows f ON a.id = f.id_followed AND f.id_user = ?
                                    WHERE a.identity = ?
                                    AND (f.id_user IS NULL OR f.id_user <> ?)
                                    ORDER BY RAND()
                                    LIMIT 5;");

        $stmt->execute([$user_id, $sug, $user_id]);


        $result = $stmt->fetchAll(PDO::FETCH_OBJ);  // Modo de fetch para obter um array de objetos

        return $result;
    }


    public function getPopulars()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $id_user = $_SESSION['user_id'];

        // Consulta para obter as 5 contas mais seguidas e verificar se $id_user as segue
        $stmt = $this->db->prepare("SELECT a.id, a.id_name, a.picture, a.identity, COUNT(f.id_followed) AS follows_count,
                                        EXISTS(SELECT 1 FROM follows WHERE id_user = ? AND id_followed = a.id) AS is_following
                                    FROM accounts a
                                    JOIN follows f ON a.id = f.id_followed
                                    GROUP BY a.id, a.id_name, a.picture, a.identity
                                    ORDER BY follows_count DESC
                                    LIMIT 5;");

        $stmt->execute([$id_user]);  // Vincula o parâmetro id_user

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);  // Obtém todos os resultados como um array de objetos

        return $result;
    }


    public function removerFollow($idUtilizador)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $id_user = $_SESSION['user_id'];

        // Remove os registros existentes
        $stmt_delete = $this->db->prepare("DELETE FROM follows WHERE id_user = :id_user AND id_followed = :id_followed");

        // Executa a exclusão
        $stmt_delete->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt_delete->bindParam(':id_followed', $idUtilizador, PDO::PARAM_INT);
        $stmt_delete->execute();
    }

    public function adicionarFollow($idUtilizador)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $id_user = $_SESSION['user_id'];

        // Insere os novos registros
        $stmt_insert = $this->db->prepare("INSERT INTO follows (id_user, id_followed) VALUES (:id_user, :id_followed)");

        // Executa a inserção
        $stmt_insert->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt_insert->bindParam(':id_followed', $idUtilizador, PDO::PARAM_INT);
        $stmt_insert->execute();
    }


    public function getProjectsFeed($limit, $offset)
    {

        // Definindo a consulta SQL
        $sql = "
            SELECT 
                p.*, 
                a.id as user_id,
                a.id_name, 
                a.picture, 
                (CASE 
                    WHEN p.PrivacyLikes = 4 OR (p.PrivacyLikes = 5 AND f.id_user IS NOT NULL)
                    THEN (SELECT COUNT(*) FROM projects_likes pcl WHERE pcl.id_project = p.id) 
                    ELSE 0 
                END) AS likes_count,
                (CASE 
                    WHEN p.PrivacyComments = 7 OR (p.PrivacyComments = 8 AND f.id_user IS NOT NULL)
                    THEN (SELECT COUNT(*) FROM projects_comments pc WHERE pc.id_project = p.id) 
                    ELSE 0 
                END) AS comments_count,
                IF(pl.id_user_send IS NOT NULL, 1, 0) AS liked_by_user
            FROM 
                projects p
            JOIN 
                accounts a ON p.id_founder = a.id
            LEFT JOIN 
                follows f ON a.id = f.id_followed AND f.id_user = :id_user
            LEFT JOIN
                projects_likes pl ON p.id = pl.id_project AND pl.id_user_send = :id_user
            WHERE
                (p.PrivacyProjects = 1 OR p.PrivacyProjects = 2 AND f.id_user IS NOT NULL)
                AND p.deleted = 0
            LIMIT
                :limit OFFSET :offset;
        ";

        // Preparando a consulta
        $stmt = $this->db->prepare($sql);

        // Vinculando os parâmetros
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Executando a consulta
        $stmt->execute();

        // Recuperando os resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjectsLikes($p_id, $id_search)
    {
        // Definindo a consulta SQL
        $sql = "SELECT id FROM projects_likes WHERE id_project = :p_id AND id_user_send = :id_search";

        // Preparando a consulta
        $stmt = $this->db->prepare($sql);

        // Vinculando os parâmetros
        $stmt->bindParam(':p_id', $p_id, PDO::PARAM_INT);
        $stmt->bindParam(':id_search', $id_search, PDO::PARAM_INT);

        // Executando a consulta
        $stmt->execute();

        // Recuperando o resultado
        $result = $stmt->fetchColumn();

        // Verificando se o resultado existe e retornando 1 ou 0
        return $result !== false ? 1 : 0;
    }



    public function getProjectsImagesFeed($p_id)
    {
        // Definindo a consulta SQL
        $sql = "SELECT *, `order` as ordem FROM projects_images WHERE id_project = :p_id ORDER BY ordem";

        // Preparando a consulta
        $stmt = $this->db->prepare($sql);

        // Vinculando o parâmetro
        $stmt->bindParam(':p_id', $p_id, PDO::PARAM_INT);

        // Executando a consulta
        $stmt->execute();

        // Recuperando os resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
