<?php
session_start();

$user_id = $_SESSION['user_id'];
$id_saved = $_POST['user_id'];

// Conexão com o banco de dados (substitua com suas credenciais)
$db_host = "localhost";
$db_name = "concertpulse";
$db_user = "root";
$db_pass = "";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verificar se o registro já existe
$sql_check = "SELECT * FROM saved WHERE id_user = '$user_id' AND id_saved = '$id_saved'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    // Registro encontrado, então vamos excluir
    $sql_delete = "DELETE FROM saved WHERE id_user = '$user_id' AND id_saved = '$id_saved'";
    
    if ($conn->query($sql_delete) === TRUE) {
        echo "Registro excluído com sucesso!";
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }
} else {
    // Nenhum registro encontrado, então vamos inserir
    $sql_insert = "INSERT INTO saved (id_user, id_saved) VALUES ('$user_id', '$id_saved')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}

$conn->close();
?>
