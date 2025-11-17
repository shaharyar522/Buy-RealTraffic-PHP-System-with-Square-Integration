<?php
// process.php - Simple Square sandbox payment

header('Content-Type: application/json');

// REPLACE this with your sandbox access token
$ACCESS_TOKEN = 'EAAAl2bzdxjY2SP-cDKg_qoHQ6OAD4I1a0EH6vOlosFhHqz3xNKuozMqLbigJ8Am';

// Read JSON from frontend
$input = json_decode(file_get_contents('php://input'), true);
$sourceId = $input['sourceId'] ?? null;
$amount = intval($input['amount'] ?? 100); // 100 = $1.00

if (!$sourceId) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing sourceId']);
    exit;
}

// Square sandbox payments endpoint
$url = "https://connect.squareupsandbox.com/v2/payments";

// Unique key to avoid duplicate charges
$idempotency_key = bin2hex(random_bytes(12));

// Set location ID from your Sandbox dashboard
$location_id = 'LYHCWV6ZGN0P7';  // correct sandbox location ID

// Payload
$body = [
    "idempotency_key" => $idempotency_key,
    "source_id" => $sourceId,
    "amount_money" => [
        "amount" => $amount,
        "currency" => "USD"
    ],
    "location_id" => $location_id
];

$payload = json_encode($body);

// cURL request
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer {$ACCESS_TOKEN}",
    "Accept: application/json"
]);

$response = curl_exec($ch);
$httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlErr = curl_error($ch);
curl_close($ch);

if ($curlErr) {
    http_response_code(500);
    echo json_encode(['error' => 'cURL error: ' . $curlErr]);
    exit;
}

http_response_code($httpStatus);
echo $response;
