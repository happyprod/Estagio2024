<?php

namespace App\Models;

use PDO;

class Message
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function sendMessage($user, $message)
    {
        // Iniciar a sessão se ainda não estiver iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $session = $_SESSION['user_id']; // Obtém o ID do usuário da sessão

        // Insere os novos registros
        $stmt_insert = $this->db->prepare("INSERT INTO chat (id_sender, id_receive, message) VALUES (:id_sender, :id_receive, :message)");

        // Parâmetros para a inserção
        $id_sender = $session; // Usuário atual (remetente)
        $id_receive = $user;   // Usuário destinatário

        // Executa a inserção
        $stmt_insert->bindParam(':id_sender', $id_sender, PDO::PARAM_INT);
        $stmt_insert->bindParam(':id_receive', $id_receive, PDO::PARAM_INT);
        $stmt_insert->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt_insert->execute();
    }

    public function saveView($user)
    {
        // Iniciar a sessão se ainda não estiver iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $session = $_SESSION['user_id']; // Obtém o ID do usuário da sessão

        $stmt5 = $this->db->prepare("UPDATE chat SET viewed = 1 WHERE (id_sender = ? AND id_receive = ?) OR (id_sender = ? AND id_receive = ?)");
        $stmt5->execute([$session, $user, $user, $session]);
    }


    public function getOptions($search)
    {
        // Iniciar a sessão se ainda não estiver iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $session = $_SESSION['user_id']; // Obtém o ID do usuário da sessão

        if ($search == '') {
            $sql = "SELECT DISTINCT CASE
                    WHEN id_sender = ? THEN id_receive
                    WHEN id_receive = ? THEN id_sender
                    END AS id
                    FROM chat
                    WHERE id_sender = ? OR id_receive = ?
                    ORDER BY date DESC";

            $stmt_projects = $this->db->prepare($sql);
            $stmt_projects->execute([$session, $session, $session, $session]);

            $result = $stmt_projects->fetchAll(PDO::FETCH_ASSOC); // Fetch the result set as an associative array
        } else {
            // Carregar procura
            $searchParam = '%' . $search . '%';

            $sql = "SELECT DISTINCT CASE
                    WHEN c.id_sender = ? THEN c.id_receive
                    WHEN c.id_receive = ? THEN c.id_sender
                    END AS id
                    FROM chat c
                    JOIN accounts a ON a.id = CASE
                        WHEN c.id_sender = ? THEN c.id_receive
                        WHEN c.id_receive = ? THEN c.id_sender
                    END
                    WHERE (c.id_sender = ? OR c.id_receive = ?)
                    AND a.id_name LIKE ?
                    ORDER BY c.date ASC";

            $stmt_projects = $this->db->prepare($sql);
            $stmt_projects->execute([$session, $session, $session, $session, $session, $session, $searchParam]);

            $result = $stmt_projects->fetchAll(PDO::FETCH_ASSOC); // Fetch the result set as an associative array
        }

        return $result;
    }


    public function getChatTrade($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $session = $_SESSION['user_id'];

        if (!$session || !$id || $session == $id) {
            error_log("Invalid session or id values. Session: $session, ID: $id");
            return null;
        }

        $sql = "SELECT a.id_name, a.picture, c.id_sender, c.message, c.viewed, c.date
            FROM chat c
            JOIN accounts a ON a.id = CASE
                WHEN c.id_sender = ? THEN c.id_receive
                WHEN c.id_receive = ? THEN c.id_sender
            END
            WHERE (c.id_sender = ? AND c.id_receive = ?)
            OR (c.id_sender = ? AND c.id_receive = ?)
            ORDER BY c.date DESC
            LIMIT 1";

        $stmt2 = $this->db->prepare($sql);
        $stmt2->execute([$session, $session, $session, $id, $id, $session]);
        $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        error_log("Query result: " . print_r($result2, true));

        return $result2;
    }




    public function getViews($id)
    {
        // Iniciar a sessão se ainda não estiver iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $session = $_SESSION['user_id']; // Obtém o ID do usuário da sessão

        // Consulta para as vistas
        $sql = "SELECT a.id_name, a.picture, c.id_sender, c.message, c.viewed, c.date
        FROM chat c
        JOIN accounts a ON (c.id_sender = a.id OR c.id_receive = a.id)
        WHERE ((c.id_sender = ? AND c.id_receive = ?) OR (c.id_sender = ? AND c.id_receive = ?))
        AND c.viewed = 0 
        AND c.id_sender <> ?
        ORDER BY c.date DESC";
        $stmt3 = $this->db->prepare($sql);
        $stmt3->execute([$session, $id, $id, $session, $session]);
        $result3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

        return $result3;
    }


    public function getLastChat($user)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $session = $_SESSION['user_id'];

        // Verifique se o $session e o $user não são nulos ou iguais
        if (!$session || !$user || $session == $user) {
            return null; // Retorna nulo ou uma mensagem de erro adequada
        }

        $sql = "SELECT c.id_sender, c.id_receive, a.id, a.id_name, a.picture, c.date
            FROM chat c
            JOIN accounts a ON a.id = CASE
                WHEN c.id_sender = ? THEN c.id_receive
                WHEN c.id_receive = ? THEN c.id_sender
            END
            WHERE (c.id_sender = ? AND c.id_receive = ?)
            OR (c.id_sender = ? AND c.id_receive = ?)
            ORDER BY c.date DESC
            LIMIT 1";

        $stmt2 = $this->db->prepare($sql);
        $stmt2->execute([$session, $session, $session, $user, $user, $session]);
        $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        return $result2;
    }

    public function getMessages($user)
    {
        // Iniciar a sessão se ainda não estiver iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $session = $_SESSION['user_id']; // Obtém o ID do usuário da sessão

        // Consulta para carregar as mensagens entre o usuário atual e o usuário específico
        $sql = "SELECT * FROM chat WHERE (id_sender = ? AND id_receive = ?) OR (id_sender = ? AND id_receive = ?) ORDER BY date ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$session, $user, $user, $session]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
