<?php


/*Representa uma relação de amizade entre dois usuários.

Propriedades:

id
user_id
friend_id
created_at
status (ex: pending, accepted, rejected)


<?php

namespace App\Models;

use PDO;

class Friendship
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function addFriend($userId, $friendId)
    {
        $stmt = $this->db->prepare('INSERT INTO friendships (user_id, friend_id, status, created_at) VALUES (:user_id, :friend_id, "pending", NOW())');
        return $stmt->execute([
            'user_id' => $userId,
            'friend_id' => $friendId
        ]);
    }

    // Outros métodos do modelo...
}

*/