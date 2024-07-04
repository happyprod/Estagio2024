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

    public function register($email, $senha, $identity, $location, $name, $selectedType)
    {
        // Verifica se o formulário foi submetido
        if (isset($email, $senha, $name, $identity, $location, $selectedType)) {

            // Consulta SQL para verificar se o email já existe
            $query = "SELECT email FROM accounts WHERE email = :email";
            $stmt = $this->db->prepare($query);

            if ($stmt) {
                $stmt->bindParam(":email", $email);
                $stmt->execute();

                // Verifica se o email já está registrado
                if ($stmt->rowCount() > 0) {
                    // Email já está registrado
                    echo json_encode(['success' => false, 'message' => 'Email já em uso.']);
                    return;
                }



                $query = "SELECT id_name FROM accounts WHERE id_name = :id_name";
                $stmt = $this->db->prepare($query);


                if ($stmt) {
                    $stmt->bindParam(":id_name", $identity);
                    $stmt->execute();

                    // Verifica se o email já está registrado
                    if ($stmt->rowCount() > 0) {
                        // Email já está registrado
                        echo json_encode(['success' => false, 'message' => 'Indentificação já em uso.']);
                        return;
                    }


                    // Consulta SQL para inserir um novo usuário
                    $query = "INSERT INTO accounts (email, password, name, id_name, location, identity) VALUES (:email, :senha, :name, :id_name, :location, :selectedType)";
                    $stmt = $this->db->prepare($query);

                    if ($stmt) {
                        // Vincula os parâmetros
                        $stmt->bindParam(":email", $email);
                        $stmt->bindParam(":senha", $senha); // Deveria usar hash de senha, ex: password_hash($senha, PASSWORD_BCRYPT)
                        $stmt->bindParam(":name", $name);
                        $stmt->bindParam(":id_name", $identity);
                        $stmt->bindParam(":location", $location);
                        $stmt->bindParam(":selectedType", $selectedType);

                        // Executa a consulta
                        if ($stmt->execute()) {
                            // Registro bem-sucedido
                            echo json_encode(['success' => true, 'message' => 'Registro realizado com sucesso.']);
                        } else {
                            // Falha ao inserir o usuário
                            echo json_encode(['success' => false, 'message' => 'Erro ao registrar usuário.']);
                        }
                    } else {
                        // Erro ao preparar a consulta de inserção
                        echo json_encode(['success' => false, 'message' => 'Erro ao preparar a consulta de inserção.']);
                    }
                } else {
                    // Erro ao preparar a consulta de verificação de email
                    echo json_encode(['success' => false, 'message' => 'Erro ao preparar a consulta de verificação de email.']);
                }
            } else {
                // Dados do formulário não fornecidos
                echo json_encode(['success' => false, 'message' => 'Dados do formulário não fornecidos.']);
            }
        }
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
}
