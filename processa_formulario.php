<?php
session_start();

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações para conexão com o banco de dados (substitua com suas próprias credenciais)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "concertpulse";

    // Inicializa a sessão (se já não estiver iniciada)
    if (!isset($_SESSION)) {
        session_start();
    }

    // Obtém o ID do promotor da sessão
    $id_promotor = $_SESSION["user_id"];

    // Cria a conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se a conexão foi estabelecida corretamente
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Prepara os dados para inserção no banco de dados (evita SQL injection)
    $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
    $preco = mysqli_real_escape_string($conn, $_POST['preco']);
    $localizacao = mysqli_real_escape_string($conn, $_POST['localizacao']);
    $sinopse = mysqli_real_escape_string($conn, $_POST['sinopse']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);

    // Manipulação do arquivo de imagem (cartaz)
    $cartaz_path = ''; // Caminho para armazenar o arquivo de imagem
    if ($_FILES['cartaz']['error'] == 0) {
        $target_dir = "./img/cartaz/";
        $target_file = $target_dir . basename($_FILES["cartaz"]["name"]);
        if (move_uploaded_file($_FILES["cartaz"]["tmp_name"], $target_file)) {
            // Obtém o último número sequencial da tabela shows para o nome do cartaz
            $sql_last_id = "SELECT MAX(id) AS max_id FROM shows";
            $result = $conn->query($sql_last_id);
            $row = $result->fetch_assoc();
            $next_id = ($row['max_id'] ? $row['max_id'] : 0) + 1;

            // Novo nome do arquivo para o cartaz (por exemplo, cartaz_1.jpg, cartaz_2.jpg, etc.)
            $new_cartaz_name = $next_id . "." . pathinfo($target_file, PATHINFO_EXTENSION);

            // Renomeia o arquivo com o novo nome
            $new_cartaz_path = $target_dir . $new_cartaz_name;
            rename($target_file, $new_cartaz_path);

            // Define o caminho final do cartaz para ser inserido no banco de dados
            $cartaz_path = $new_cartaz_name;

            // Cria o arquivo PHP com o ID dentro da pasta de cartazes
            $id_file_path = "./cartazes/" . $next_id . ".php";
            $id_file_content = file_get_contents("2.php"); // Lê o conteúdo do arquivo "2.php"
            file_put_contents($id_file_path, $id_file_content); // Escreve o conteúdo no novo arquivo
        } else {
            echo "Erro ao fazer upload do arquivo.";
        }
    }

    // Prepara e executa a consulta SQL para inserir os dados
    $sql = "INSERT INTO shows (id_promotor, titulo, preco, localizacao, sinopse, descricao, cartaz)
            VALUES ('$id_promotor', '$titulo', '$preco', '$localizacao', '$sinopse', '$descricao', '$cartaz_path')";

    if ($conn->query($sql) === TRUE) {
        echo "Evento inserido com sucesso!";
    } else {
        echo "Erro ao inserir evento: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    echo "Erro: o formulário não foi submetido corretamente.";
}
?>
