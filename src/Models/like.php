<?php

/*

Representa um "curtir" em uma postagem ou comentário.

Propriedades:

id
user_id
post_id ou comment_id
created_at

<?php

namespace App\Models;

use PDO;

class Like
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function likePost($userId, $postId)
    {
        $stmt = $this->db->prepare('INSERT INTO likes (user_id, post_id, created_at) VALUES (:user_id, :post_id, NOW())');
        return $stmt->execute([
            'user_id' => $userId,
            'post_id' => $postId
        ]);
    }

    // Outros métodos do modelo...
}

*/