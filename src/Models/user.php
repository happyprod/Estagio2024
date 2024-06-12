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


    public function getEditarImagens($count, $p_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM projects_images WHERE id_project = ? ORDER BY ordem");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
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
        $stmt = $this->db->prepare("SELECT accounts.name as name, accounts.picture as picture, accounts.id_name as idName
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


    public function inserirEvento($dadosEvento)
{
    $nomeEvento = $dadosEvento['nomeEvento'] ?? '';
    $identificacaoEvento = $dadosEvento['identificacaoEvento'] ?? '';
    $descricao = $dadosEvento['descricao'] ?? '';
    $data = $dadosEvento['data'] ?? '';
    $empresaBooking = $dadosEvento['empresaBooking'] ?? '';
    $localizacao = $dadosEvento['localizacao'] ?? '';
    $switchEvento = $dadosEvento['switchEvento'] ?? '';
    $switchData = $dadosEvento['switchData'] ?? '';
    $switchBooking = $dadosEvento['switchBooking'] ?? '';
    $switchLocal = $dadosEvento['switchLocal'] ?? '';
    $switchCollabs = $dadosEvento['switchCollabs'] ?? '';
    $id_projeto = $dadosEvento['id_projeto'] ?? '';

    $stmt = $this->db->prepare("UPDATE Projects SET nome = ?, Event = ?, descricao = ?, data = ?, Booking = ?, local = ?, Active_Event = ?, Active_Data = ?, Active_Booking = ?, Active_local = ?, Active_Collab = ? WHERE id = ?");
    $stmt->bindParam(1, $nomeEvento);
    $stmt->bindParam(2, $identificacaoEvento);
    $stmt->bindParam(3, $descricao);
    $stmt->bindParam(4, $data);
    $stmt->bindParam(5, $empresaBooking);
    $stmt->bindParam(6, $localizacao);
    $stmt->bindParam(7, $switchEvento);
    $stmt->bindParam(8, $switchData);
    $stmt->bindParam(9, $switchBooking);
    $stmt->bindParam(10, $switchLocal);
    $stmt->bindParam(11, $switchCollabs);
    $stmt->bindParam(12, $id_projeto);
    $stmt->execute();
}


    public function verificarEvento($evento)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $user_id = $_SESSION['user_id'];

        $evento = '%' . $evento . '%'; // Adiciona wildcards para a consulta LIKE
        $stmt = $this->db->prepare("SELECT 1 FROM accounts WHERE id_name LIKE ? AND identity = ? AND id <> ? LIMIT 1");
        $stmt->execute([$evento, 5, $user_id]);  // Bind the id parameter and the identity value
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // Log para verificar o resultado da consulta
        error_log(print_r($result, true));

        // Retorna true se um registro foi encontrado, false caso contrário
        return $result !== false;
    }


    public function verificarBooking($booker)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $user_id = $_SESSION['user_id'];

        $booker = '%' . $booker . '%'; // Adiciona wildcards para a consulta LIKE
        $stmt = $this->db->prepare("SELECT 1 FROM accounts WHERE id_name LIKE ? AND identity = ? AND id <> ? LIMIT 1");
        $stmt->execute([$booker, 4, $user_id]);  // Bind the id parameter and the identity value
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // Log para verificar o resultado da consulta
        error_log(print_r($result, true));

        // Retorna true se um registro foi encontrado, false caso contrário
        return $result !== false;
    }
}
