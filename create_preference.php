<?php

$access_token = "APP_USR-a183c177-58e6-4dd8-b9bf-8c4eb130f69c";

$data = [
    "items" => [
        [
            "title" => "Casa Digital",
            "quantity" => 1,
            "unit_price" => 0.01
        ]
    ],
    "back_urls" => [
        "success" => "https://seusite.com/sucesso",
        "failure" => "https://seusite.com/erro",
        "pending" => "https://seusite.com/pendente"
    ],
    "auto_return" => "approved"
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.mercadopago.com/checkout/preferences");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $access_token"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

header("Location: " . $result["init_point"]);
exit;

?>