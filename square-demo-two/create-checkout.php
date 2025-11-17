<?php
session_start();
require 'vendor/autoload.php';

use Square\SquareClient;
use Square\Checkout\PaymentLinks\Requests\CreatePaymentLinkRequest;
use Square\Types\PaymentLink;
use Square\Types\QuickPay;
use Square\Types\Money;

// Your Square credentials
$accessToken = "EAAAl20jPgj0WEB7FdAXN0zigZOdYRZaIeD5tYbBm9cIWQNxKttkQCdLsUnx66pE";
$locationId = "LYHCWV6ZGN0P7";

// Get amount from session
$amount = $_SESSION['amount'] ?? 1;
$totalAmount = $amount * 50 * 100; // $50 per 1000 credits, in cents

// Initialize Square client
$client = new SquareClient(
    $accessToken,
    '2025-11-15',
    ['baseUrl' => 'https://connect.squareupsandbox.com']
);

// Create quick pay
$quickPay = new QuickPay([
    'name' => $amount . ' Login Credits',
    'priceMoney' => new Money([
        'amount' => $totalAmount,
        'currency' => 'USD'
    ]),
    'locationId' => $locationId
]);

// Create payment link
$paymentLink = new PaymentLink([
    'quickPay' => $quickPay,
    'checkoutOptions' => [
        'redirectUrl' => 'http://localhost/square-demo-two/thank_you.php'
    ]
]);

$request = new CreatePaymentLinkRequest([
    'paymentLink' => $paymentLink,
    'idempotencyKey' => uniqid()
]);

try {
    $response = $client->checkout->paymentLinks->create($request);
    
    if ($response->getPaymentLink()) {
        // Redirect to Square's hosted checkout page
        $checkoutUrl = $response->getPaymentLink()->getUrl();
        header("Location: " . $checkoutUrl);
        exit();
    } else {
        echo "<h3>Error creating payment link:</h3>";
        echo "<pre>";
        print_r($response->getErrors());
        echo "</pre>";
    }
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage();
}
