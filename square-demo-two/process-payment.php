<?php
session_start();
require 'vendor/autoload.php';

use Square\SquareClient;
use Square\Types\Money;
use Square\Payments\Requests\CreatePaymentRequest;

$accessToken = "EAAAl20jPgj0WEB7FdAXN0zigZOdYRZaIeD5tYbBm9cIWQNxKttkQCdLsUnx66pE";
$locationId = "LYHCWV6ZGN0P7";

// Prevent page refresh resubmission
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: buy_login_credits.php");
    exit();
}

$nonce = $_POST['nonce'] ?? null;
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$amount = $_SESSION['amount'] ?? 0;

// Check if nonce is received
if (empty($nonce)) {
    $_SESSION['error'] = "Payment nonce is missing. Please try again.";
    header("Location: buy_login_credits.php");
    exit();
}

echo "Debug - Nonce received: " . htmlspecialchars($nonce) . "<br>";
echo "Debug - Amount: $amount credits<br>";
echo "Debug - Total: $" . ($amount * 50) . "<br><br>";

$totalAmount = $amount * 50 * 100;

$client = new SquareClient(
    $accessToken,
    '2025-11-15',
    ['baseUrl' => 'https://connect.squareupsandbox.com']
);

$paymentsApi = $client->payments;

$money = new Money();
$money->setAmount($totalAmount);
$money->setCurrency('USD');

$paymentRequest = new CreatePaymentRequest([
    'sourceId' => $nonce,
    'idempotencyKey' => uniqid(),
    'amountMoney' => $money
]);

try {
    $response = $paymentsApi->create($paymentRequest);
    if ($response->getErrors() === null) {
        header("Location: thank_you.php");
        exit();
    } else {
        echo "<h3>Payment Failed:</h3>";
        echo "<pre>";
        print_r($response->getErrors());
        echo "</pre>";
    }
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage();
}
