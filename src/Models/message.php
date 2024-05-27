<?php


/*
Representa uma mensagem privada enviada de um usuário para outro.

Propriedades:

id
sender_id
receiver_id
content
created_at
read_at


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

    public function sendMessage($data)
    {
        $stmt = $this->db->prepare('INSERT INTO messages (sender_id, receiver_id, content, created_at) VALUES (:sender_id, :receiver_id, :content, NOW())');
        return $stmt->execute([
            'sender_id' => $data['sender_id'],
            'receiver_id' => $data['receiver_id'],
            'content' => $data['content']
        ]);
    }

    // Outros métodos do modelo...
}

*/