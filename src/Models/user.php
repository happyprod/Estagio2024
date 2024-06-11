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

}