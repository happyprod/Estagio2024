<?php


/*
Representa uma mensagem privada enviada de um usuário para outro.

Propriedades:

id
sender_id
receiver_id
content
created_at
read_at

*/

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
                $sug = 2; // um artista quer um promotor
                break;
            case 2:
                $sug = 1; // um promotor quer um artista
                break;
            case 3:
                $sug = 4; // agente de booking quer uma agencia de booking
                break;
            case 4:
                $sug = 5; // uma agencia de booking quer um evento
                break;
            default:
                $sug = 4; // um evento quer uma agencia de booking
                break;
        }

        // Consulta para obter sugestões com base nos critérios especificados
        $stmt = $this->db->prepare("SELECT a.id, a.id_name, a.picture, a.identity
                                    FROM accounts a
                                    LEFT JOIN follows f ON a.id = f.id_followed
                                    WHERE a.identity = ?
                                    AND (f.id_user IS NULL OR f.id_user <> ?)
                                    AND (f.id_followed IS NULL OR f.id_followed <> a.id)
                                    ORDER BY RAND()
                                    LIMIT 5;");

        $stmt->execute([$sug, $user_id]);  // Vincula os parâmetros identity e user_id

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
}
