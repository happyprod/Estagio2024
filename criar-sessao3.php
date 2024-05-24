<?php
require 'vendor/autoload.php'; // Certifique-se de ter o Stripe SDK instalado

\Stripe\Stripe::setApiKey('sk_test_51NKzOGCqYoZgfeJs4WjIB8YDE8MMvkkhWYRNbtGsnJrUyCoIP2pCiSqlSW9yVigCt1yaYYybnxAvfzNlzjQgVyuU00RCj8qBan');

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'eur',
            'product_data' => [
                'name' => 'Plano Vitalício',
            ],
            'unit_amount' => 12000, // Montante em centimos
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'http://localhost/redes/planos/pagegenerator3.php',
    'cancel_url' => 'http://localhost/redes/index.php',
]);

header('Content-Type: application/json');
echo json_encode(['id' => $session->id]);


?>

