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


    public function getEditarImagens($count)
    {
        $stmt = $this->db->prepare("SELECT * FROM projects_images WHERE id_project = ? ORDER BY ordem");
        $stmt->execute([$count]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        return $result;

    }
}