<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "concertpulse";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtém o número de projetos a serem carregados e a partir de qual ponto
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = 4;  // Quantidade de projetos por vez

// Consulta SQL que une as tabelas necessárias e faz os contagens
$sql = "
SELECT 
    p.*, 
    a.id as user_id,
    a.id_name, 
    a.picture, 
    (SELECT COUNT(*) FROM projects_likes pcl WHERE pcl.id_project = p.id) AS likes_count,
    (SELECT COUNT(*) FROM projects_comments pc WHERE pc.id_project = p.id) AS comments_count
FROM 
    projects p
JOIN 
    accounts a ON p.id_founder = a.id
LIMIT
    $limit OFFSET $offset
";

$result = $conn->query($sql);

$projects = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        $fotodeperfil = $row['picture'];

        // Obtém a extensão do arquivo em letras minúsculas
        $extension = strtolower(pathinfo($fotodeperfil, PATHINFO_EXTENSION));

        // Verifica se a extensão do arquivo está em um array de extensões de imagem permitidas
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Adicione outras extensões se necessário

        // Verifica se a extensão está na lista de extensões permitidas
        if (in_array($extension, $allowed_extensions)) {
            $google_image = false;
        } else {
            $google_image = true;
        }

        if ($google_image == false) {
            $row['picture'] = '/public/users/' . $row['user_id'] . '/' . $fotodeperfil;
        } else {
            $row['picture'] = $fotodeperfil;
        }

        $p_id = $row['id'];
        

        // Consulta SQL que une as tabelas necessárias e faz os contagens
        $sql = "SELECT * FROM projects_images WHERE id_project = $p_id ORDER BY ordem";

        $result2 = $conn->query($sql);

        $imageList = '';

        if ($result2->num_rows > 0) {
            $count = 1;
            while($row2 = $result2->fetch_assoc()) {
                $imagem = $row2['image'];

                if ($count == 1)
                {
                    $imageList .= ' <div class="carousel-item active">
                    <img src="/public/users/' . $row['id_founder'] . '/' . $imagem . '" class=" img-fluid border-radius-xl w-100" style="object-fit: cover; background-position-y: 50%; height: auto;">
                    </div>';
                } else {
                    $imageList .= ' <div class="carousel-item">
                    <img src="/public/users/' . $row['id_founder'] . '/' . $imagem . '" class=" img-fluid border-radius-xl w-100" style="object-fit: cover; background-position-y: 50%; height: auto;">
                    </div>';
                }

                $count++;
               
            }
        }

        $row['image'] = $imageList;

        $projects[] = $row;
    }
}

// Retorna os projetos em formato JSON
echo json_encode($projects);

$conn->close();
