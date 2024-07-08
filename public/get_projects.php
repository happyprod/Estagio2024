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
$limit = 3;  // Quantidade de projetos por vez

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$id_user = $_SESSION['user_id'];

$sql = "
SELECT 
    p.*, 
    a.id as user_id,
    a.id_name, 
    a.picture, 
    (CASE 
        WHEN p.PrivacyLikes = 4 OR (p.PrivacyLikes = 5 AND f.id_user IS NOT NULL)
        THEN (SELECT COUNT(*) FROM projects_likes pcl WHERE pcl.id_project = p.id) 
        ELSE 0 
    END) AS likes_count,
    (CASE 
        WHEN p.PrivacyComments = 7 OR (p.PrivacyComments = 8 AND f.id_user IS NOT NULL)
        THEN (SELECT COUNT(*) FROM projects_comments pc WHERE pc.id_project = p.id) 
        ELSE 0 
    END) AS comments_count,
    IF(pl.id_user_send IS NOT NULL, 1, 0) AS liked_by_user
FROM 
    projects p
JOIN 
    accounts a ON p.id_founder = a.id
LEFT JOIN 
    follows f ON a.id = f.id_followed AND f.id_user = $id_user
LEFT JOIN
    projects_likes pl ON p.id = pl.id_project AND pl.id_user_send = $id_user
WHERE
    (p.PrivacyProjects = 1 OR p.PrivacyProjects = 2 AND f.id_user IS NOT NULL)
    AND p.deleted = 0
LIMIT
    $limit OFFSET $offset;
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
            $row['picture'] = '../public/users/' . $row['user_id'] . '/' . $fotodeperfil;
        } else {
            $row['picture'] = $fotodeperfil;
        }

        $p_id = $row['id'];
        

        // Consulta SQL que une as tabelas necessárias e faz os contagens
        $sql = "SELECT *, `order` as ordem FROM projects_images WHERE id_project = $p_id ORDER BY ordem"; // Use placeholder for PDO

        $result2 = $conn->query($sql);

        $imageList = '';

        if ($result2->num_rows > 0) {
            $count = 1;
            while($row2 = $result2->fetch_assoc()) {
                $imagem = $row2['image'];

                if ($count == 1)
                {
                    $imageList .= ' <div class="carousel-item active">
                    <img src="../public/users/' . $row['id_founder'] . '/' . $imagem . '" class=" img-fluid border-radius-xl w-100" style="object-fit: cover; background-position-y: 50%; height: auto;">
                    </div>';
                } else {
                    $imageList .= ' <div class="carousel-item">
                    <img src="../public/users/' . $row['id_founder'] . '/' . $imagem . '" class=" img-fluid border-radius-xl w-100" style="object-fit: cover; background-position-y: 50%; height: auto;">
                    </div>';
                }

                $row['imageNum'] = $count;
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
