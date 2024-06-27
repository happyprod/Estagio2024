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

*/

namespace App\Models;

use PDO;

class AccountListing
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


}
