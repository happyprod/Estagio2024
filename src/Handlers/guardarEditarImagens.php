<?php
// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados esperados foram recebidos
    if (isset($_POST['idCount']) && isset($_POST['order'])) {
        // Obtém os dados enviados
        $idCount = $_POST['idCount'];
        $order = $_POST['order'];
        
        // Exibe os dados recebidos na console
        echo "idCount: " . $idCount . "\n";
        echo "order:\n";
        print_r($order);

        // Exemplo de resposta de volta para o JavaScript
        $response = array(
            'success' => true,
            'message' => 'Dados recebidos com sucesso.'
        );
        echo json_encode($response);
    } 
}
