<?php

/*Representa um comentário em uma postagem.

Propriedades:

id
post_id
user_id
content
created_at
updated_at

<?php

namespace App\Models;

use PDO;

class Comment
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create($data)
    {
        $stmt = $this->db->prepare('INSERT INTO comments (post_id, user_id, content, created_at) VALUES (:post_id, :user_id, :content, NOW())');
        return $stmt->execute([
            'post_id' => $data['post_id'],
            'user_id' => $data['user_id'],
            'content' => $data['content']
        ]);
    }

    // Outros métodos do modelo...
}

*/