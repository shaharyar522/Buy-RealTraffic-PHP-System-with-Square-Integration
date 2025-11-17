<?php
session_start();
require 'config.php';

if (!isset($_POST['submit_payment'])) {
    header("Location: buy_login_credits.php");
    exit;
}

// Store user form input in session
$_SESSION['payment_data'] = $_POST;

$amount_credits = $_POST['amount'];

// Example: 1000 credits = $1, adjust as needed
$amount_usd = ($amount_credits / 1000);  
$amount_cents = intval($amount_usd * 100);

// Create Square payment link
$data = [
    "idempotency_key" => uniqid(),
    "quick_pay" => [
        "name" => "Login Credits Purchase",
        "price_money" => [
            "amount" => $amount_cents,
            "currency" => "USD"
        ],
        "location_id" => $SQUARE_LOCATION_ID
    ],
    "redirect_url" => "http://localhost/thank_you.php"
];

$payload = json_encode($data);

$ch = curl_init("https://connect.squareupsandbox.com/v2/online-checkout/payment-links");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Square-Version: 2024-01-18",
    "Authorization: Bearer $SQUARE_ACCESS_TOKEN"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$resp = json_decode($response, true);

if (isset($resp['payment_link']['url'])) {
    // Redirect user to new Sandbox checkout
    header("Location: " . $resp['payment_link']['url']);
    exit;
} else {
    echo "<h3>Error creating checkout link!</h3>";
    echo "<pre>";
    print_r($resp);
    echo "</pre>";
}
?>
