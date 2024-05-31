<?php


/*
Propriedades:

id
name
email
password
profile_picture
bio
created_at
updated_at

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

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Outros métodos do modelo...
}
*/

// Arquivo: app/Models/User.php
namespace MyApp\Models;

use App\Helpers\Database;

class User {
    public function emailExiste($email) {
        $db = Database::connect();

        $query = $db->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
    
        return $query->fetchColumn() > 0;
    }
}
?>
