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

class Home
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getSugestions()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE  LIMIT 1");
        //quero fazer uma consulta de 5 registos onde preciso de pegar no "id" "id_name" "picture" e no "identity" da tabela "accounts" onde identity = $sug e verificar na tabela follows se id_user é diferente de $user_id e id_followed é diferente do id que foi pego na accounts

        $stmt->execute([$user_id]);  // Bind the id parameter and the identity value

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result;
    }
    

    public function getPopulars()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE  LIMIT 1");
        //quero fazer uma consulta de 5 registos onde preciso de pegar no "id" "id_name" "picture" e no "identity" da tabela "accounts" onde na tabela follows tiver com mais "id_followed"

        $stmt->execute([$user_id]);  // Bind the id parameter and the identity value

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result;
    }

}
