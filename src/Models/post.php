<?php


/*
Representa uma postagem feita por um usuário.

Propriedades:

id
user_id
content
image
created_at
updated_at

<?php

namespace App\Models;

use PDO;

class Post
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create($data)
    {
        $stmt = $this->db->prepare('INSERT INTO posts (user_id, content, image, created_at) VALUES (:user_id, :content, :image, NOW())');
        return $stmt->execute([
            'user_id' => $data['user_id'],
            'content' => $data['content'],
            'image' => $data['image']
        ]);
    }

    // Outros métodos do modelo...
}
*/