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

    // Prepara a declaração SQL para buscar o usuário com o id_name exato fornecido
    $id_name = $_POST['id_name'];
    $sql = "SELECT * FROM accounts WHERE id_name = '$id_name' LIMIT 1";

    // Executa a consulta SQL
    $result = $conn->query($sql);

    // Verifica se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Obtém o resultado como um array associativo
        $user = $result->fetch_assoc();
        // Retorna os dados do usuário em formato JSON
        echo json_encode(
            array(
                'status' => 'valid',
                'name' => $user['name'],
                'picture' => $user['picture'] // Supondo que você também tenha a coluna 'picture' na tabela
            )
        );
    } else {
        // Usuário não encontrado
        echo json_encode(array('status' => 'invalid'));
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    // Se 'id_name' não foi fornecido via POST
    echo json_encode(array('status' => 'invalid'));
}
?>