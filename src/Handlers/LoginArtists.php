<?php
// Incluir o arquivo de configuração da conexão com o banco de dados
// Configurações do banco de dados
$servername = "localhost"; // Nome do servidor MySQL (geralmente 'localhost' em desenvolvimento)
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$database = "concertpulse"; // Nome do banco de dados

// Cria a conexão usando MySQLi
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


// Verifique se os dados foram enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Proteção contra SQL Injection (recomendado usar prepared statements)
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Consulta para verificar o usuário no banco de dados
    $sql = "SELECT id, id_name, password FROM accounts WHERE id_name = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Usuário encontrado, verificar a senha
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            // Senha correta, iniciar sessão
            session_start();
            $_SESSION['user_id'] = $row['id'];
            header('Location: ../../public/home.php'); // Redirecionar para a página de dashboard
            exit();
        } else {
            // Senha incorreta
            echo 'Credenciais inválidas. Tente novamente.';
        }
    } else {
        // Usuário não encontrado
        echo 'Credenciais inválidas. Tente novamente.';
    }
}
?>
