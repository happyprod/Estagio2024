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


namespace MyApp\Models;

class User {
    private $name;
    private $email;
    private $password;

    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    // Métodos para acessar e manipular os dados do usuário, como getters e setters

    public function save() {
        // Conexão com o banco de dados (substitua as credenciais e o nome do banco de dados conforme necessário)
        $mysqli = new mysqli("localhost", "usuario", "senha", "nome_do_banco");
    
        // Verifica se houve erro na conexão
        if ($mysqli->connect_error) {
            die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
        }
    
        // Prepara a consulta SQL
        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $statement = $mysqli->prepare($query);
    
        // Verifica se a preparação da consulta teve êxito
        if (!$statement) {
            die("Erro na preparação da consulta: " . $mysqli->error);
        }
    
        // Associa os parâmetros à consulta
        $statement->bind_param("sss", $this->name, $this->email, $this->password);
    
        // Executa a consulta
        $result = $statement->execute();
    
        // Verifica se a execução da consulta teve êxito
        if (!$result) {
            die("Erro na execução da consulta: " . $statement->error);
        }
    
        // Fecha a declaração e a conexão
        $statement->close();
        $mysqli->close();
    }
    
}
