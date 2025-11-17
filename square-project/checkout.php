<?php
session_start();
require "config.php";

use Square\Checkout\PaymentLinks\Requests\CreatePaymentLinkRequest;
use Square\Types\QuickPay;
use Square\Types\Money;
use Square\Types\CheckoutOptions;

$amount_cents = intval($_SESSION['amount']*100); // convert to cents

// Create Money object
$money = new Money([
    'amount' => $amount_cents,
    'currency' => 'USD'
]);

// Create QuickPay object
$quickPay = new QuickPay([
    'name' => "Login Credits Purchase",
    'priceMoney' => $money,
    'locationId' => $SQUARE_LOCATION_ID
]);

// Create CheckoutOptions object
$checkoutOptions = new CheckoutOptions([
    'redirectUrl' => "http://localhost/square_project/thank_you.php"
]);

// Create payment link request
$request = new CreatePaymentLinkRequest([
    'idempotencyKey' => uniqid(),
    'quickPay' => $quickPay,
    'checkoutOptions' => $checkoutOptions
]);

try {
    $response = $client->checkout->paymentLinks->create($request);
    
    $paymentLink = $response->getPaymentLink();
    $url = $paymentLink->getUrl();
    header("Location: $url");
    exit;
} catch (Exception $e) {
    echo "<pre>";
    echo "Error creating payment link:\n";
    echo $e->getMessage();
    echo "</pre>";
}
