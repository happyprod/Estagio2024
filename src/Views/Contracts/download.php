<?php
if (isset($_GET['file']) && isset($_GET['id'])) {
    $file = basename($_GET['file']);  // Sanitize the file parameter for security
    $id = $_GET['id'];
    $filePath = __DIR__ . '/../../../public/users/' . $id . '/' . $file;  // Ajuste o caminho conforme necessário

    echo $id;
    
    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));

        ob_clean();
        flush();

        readfile($filePath);
        exit;
    } else {
        http_response_code(404);
        echo 'Arquivo não encontrado: ' . $filePath;
    }
} else {
    http_response_code(400);
    echo 'Nenhum arquivo especificado.';
}
?>
