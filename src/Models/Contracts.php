<?php


namespace App\Models;

use PDO;

class Contracts
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getPropostasNovas()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $id_user = $_SESSION['user_id'];

        // Consulta para obter as 5 contas mais seguidas e verificar se $id_user as segue
        $stmt = $this->db->prepare("SELECT contracts.*, accounts.name, accounts.id_name, accounts.identity, accounts.picture
                                    FROM contracts
                                    JOIN accounts ON contracts.id_sender = accounts.id
                                    WHERE contracts.id_receive = ? AND contracts.state = 0"); //0 é pendente

        $stmt->execute([$id_user]);  // Vincula o parâmetro id_user

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);  // Obtém todos os resultados como um array de objetos

        return $result;
    }

    public function getPropostasAceitas()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $id_user = $_SESSION['user_id'];

        $stmt = $this->db->prepare("SELECT contracts.*, 
                                   CASE 
                                       WHEN contracts.id_sender = ? THEN accounts_receive.name
                                       ELSE accounts_sender.name
                                   END as name,
                                   CASE 
                                       WHEN contracts.id_sender = ? THEN accounts_receive.id_name
                                       ELSE accounts_sender.id_name
                                   END as id_name,
                                   CASE 
                                       WHEN contracts.id_sender = ? THEN accounts_receive.identity
                                       ELSE accounts_sender.identity
                                   END as identity,
                                   CASE 
                                       WHEN contracts.id_sender = ? THEN accounts_receive.picture
                                       ELSE accounts_sender.picture
                                   END as picture
                            FROM contracts
                            JOIN accounts AS accounts_sender ON contracts.id_sender = accounts_sender.id
                            JOIN accounts AS accounts_receive ON contracts.id_receive = accounts_receive.id
                            WHERE (contracts.id_sender = ? OR contracts.id_receive = ?) AND contracts.state = 1");

        $stmt->execute([$id_user, $id_user, $id_user, $id_user, $id_user, $id_user]);



        $result = $stmt->fetchAll(PDO::FETCH_OBJ);  // Obtém todos os resultados como um array de objetos

        return $result;
    }


    public function getPropostasFeitas()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $id_user = $_SESSION['user_id'];

        // Consulta para obter as 5 contas mais seguidas e verificar se $id_user as segue
        $stmt = $this->db->prepare("SELECT contracts.*, accounts.name, accounts.id_name, accounts.identity, accounts.picture
                                    FROM contracts
                                    JOIN accounts ON contracts.id_receive = accounts.id
                                    WHERE contracts.id_sender = ?"); //0 é pendente

        $stmt->execute([$id_user]);  // Vincula o parâmetro id_user

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);  // Obtém todos os resultados como um array de objetos

        return $result;
    }

    public function recusarContract($idContract)
    {
        $stmt = $this->db->prepare("UPDATE contracts SET 
                                    state = ? 
                                    WHERE id = ?");

        $state = 2;
        $stmt->bindParam(1, $state);
        $stmt->bindParam(2, $idContract);
        $stmt->execute();
    }

    public function aceitarContract($idContract)
    {
        $stmt = $this->db->prepare("UPDATE contracts SET 
                                    state = ? 
                                    WHERE id = ?");

        $state = 1;
        $stmt->bindParam(1, $state);
        $stmt->bindParam(2, $idContract);
        $stmt->execute();
    }

}
