<?php

namespace App\Models;

use PDO;

class Auth
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


    public function VerifyAccountExist($email, $password)
    {
        $stmt = $this->db->prepare("SELECT id, id_name, password FROM accounts WHERE id_name = ?");
        $stmt->execute([$email]);  // Bind the id_name parameter
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['password'])) {
            return $result;  // Retorna o resultado da consulta se a senha coincidir
        } else {
            return false;  // Retorna falso se não encontrar usuário ou senha incorreta
        }
    }


    public function VerifyAccountExistByIdentity($identificacao)
    {
        $stmt = $this->db->prepare("SELECT id_name FROM accounts WHERE id_name = ?");
        $stmt->execute([$identificacao]);  // Bind the id_name parameter
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return true;  // Retorna o resultado da consulta se a senha coincidir
        } else {
            return false;  // Retorna falso se não encontrar usuário ou senha incorreta
        }
    }

    public function VerifyAccountExistByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT mainEmail FROM accounts WHERE mainEmail = ?");
        $stmt->execute([$email]);  // Bind the id_name parameter
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return true;  // Retorna o resultado da consulta se a senha coincidir
        } else {
            return false;  // Retorna falso se não encontrar usuário ou senha incorreta
        }
    }


    public function ResgisterAccount($dadosEvento)
    {

        $id_name = $dadosEvento['identificacao'] ?? '';
        $email = $dadosEvento['email'] ?? '';
        $nome = $dadosEvento['nome'] ?? '';
        $password = $dadosEvento['password'] ?? '';
        $localizacao = $dadosEvento['localizacao'] ?? '';
        $selectedType = $dadosEvento['selectedType'] ?? '';
        $dataAtual = date('Y-m-d'); // Obtém a data atual no formato 'ano-mês-dia'
        $picture = $dadosEvento['picture'] ?? '';

        // Encriptar a senha
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Atualizar o projeto
        $stmt = $this->db->prepare("INSERT INTO accounts (id_name, mainEmail, name, password, location, identity, registered, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $id_name);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $nome);
        $stmt->bindParam(4, $hashed_password);
        $stmt->bindParam(5, $localizacao);
        $stmt->bindParam(6, $selectedType);
        $stmt->bindParam(7, $dataAtual);
        $stmt->bindParam(8, $picture);
        $stmt->execute();

        // Obter o ID inserido
        $lastInsertId = $this->db->lastInsertId();

        return $lastInsertId; // Retorna o ID inserido
    }
}
