<?php
// Verifica se foi recebido o parâmetro 'id_name' via POST
if (isset($_POST['id_name'])) {
    // Conectar ao banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "concertpulse";

    // Cria uma conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Prepara a declaração SQL para buscar usuários com id_name semelhante ao texto fornecido
    $id_name = $conn->real_escape_string($_POST['id_name']);
    $sql = "SELECT * FROM accounts WHERE id_name LIKE '%$id_name%' LIMIT 5";

    // Executa a consulta SQL
    $result = $conn->query($sql);

    // Verifica se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        $users = array();
        // Percorre os resultados e os adiciona ao array
        while ($row = $result->fetch_assoc()) {
            $users[] = array(
                'id_name' => $row['id_name'],
                'name' => $row['name'],
                'picture' => $row['picture'] // Supondo que você também tenha a coluna 'picture' na tabela
            );
        }
        // Retorna os usuários em formato JSON
        echo json_encode($users);
    } else {
        // Nenhum usuário encontrado
        echo json_encode(array());
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    // Se 'id_name' não foi fornecido via POST
    echo json_encode(array());
}
?>