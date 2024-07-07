<?php


namespace App\Models;

use PDO;

class Search
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAccounts()
    {
        // Consulta para carregar todas as contas em ordem aleatória
        $sql = "SELECT * FROM accounts ORDER BY RAND()";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getPesquisarBySearch($searchBar)
    {
        // Adiciona curingas para a consulta LIKE
        $searchTerm = '%' . $searchBar . '%';

        // Consulta SQL com placeholder
        $sql = "SELECT * FROM accounts WHERE id_name LIKE :searchBar";
        $stmt = $this->db->prepare($sql);

        // Vincula o parâmetro :searchBar
        $stmt->bindParam(':searchBar', $searchTerm, PDO::PARAM_STR);

        // Executa a consulta
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
