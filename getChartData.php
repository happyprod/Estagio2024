<?php
// Conexão com o banco de dados
$servername = "localhost"; // Endereço do servidor MySQL
$username = "root"; // Nome de usuário do MySQL
$password = ""; // Senha do MySQL
$database = "concertpulse"; // Nome do banco de da

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Lógica para obter os dados do banco de dados
$interval = $_GET['interval']; // Recebe o intervalo enviado pela requisição GET

// Define a consulta SQL com base no intervalo
if ($interval === 'week') {
    $sql = "SELECT data, numero_likes FROM projects_stats_snapshot WHERE data >= DATE_SUB(NOW(), INTERVAL 1 WEEK)";
} elseif ($interval === 'month') {
    $sql = "SELECT data, numero_likes FROM projects_stats_snapshot WHERE data >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
} elseif ($interval === 'year') {
    $sql = "SELECT data, numero_likes FROM projects_stats_snapshot WHERE data >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
} else {
    $sql = "SELECT data, numero_likes FROM projects_stats_snapshot";
}

$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data['labels'][] = $row['data'];
    $data['likes'][] = $row['numero_likes'];
}

// Retorna os dados como JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>