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
}