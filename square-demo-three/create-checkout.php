<?php
session_start();
require 'vendor/autoload.php';

use Square\SquareClient;
use Square\Checkout\PaymentLinks\Requests\CreatePaymentLinkRequest;
use Square\Types\QuickPay;
use Square\Types\Money;
use Square\Types\CheckoutOptions;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;

// Square Sandbox Credentials
$accessToken = "EAAAl20jPgj0WEB7FdAXN0zigZOdYRZaIeD5tYbBm9cIWQNxKttkQCdLsUnx66pE";
$locationId = "LYHCWV6ZGN0P7";

// Get amount from session
$amount = $_SESSION['amount'] ?? 1000;
$pricePerThousand = 50;
$totalAmount = ($amount / 1000) * $pricePerThousand * 100; // Convert to cents

// Initialize Square client for SANDBOX
$client = new SquareClient(
    $accessToken,
    '2025-10-16',
    ['baseUrl' => 'https://connect.squareupsandbox.com']
);

// Get the base URL for redirect
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$baseUrl = $protocol . "://" . $host . dirname($_SERVER['PHP_SELF']);
$redirectUrl = rtrim($baseUrl, '/') . '/thank_you.php';

try {
    // Create Money object
    $money = new Money([
        'amount' => $totalAmount,
        'currency' => 'USD'
    ]);
    
    // Create Quick Pay
    $quickPay = new QuickPay([
        'name' => $amount . ' Login Credits',
        'priceMoney' => $money,
        'locationId' => $locationId
    ]);
    
    // Create Checkout Options with redirect URL
    $checkoutOptions = new CheckoutOptions([
        'redirectUrl' => $redirectUrl
    ]);
    
    // Create the request
    $request = new CreatePaymentLinkRequest([
        'idempotencyKey' => uniqid('order_', true),
        'quickPay' => $quickPay,
        'checkoutOptions' => $checkoutOptions
    ]);
    
    // Make API call using the paymentLinks client
    $apiResponse = $client->checkout->paymentLinks->create($request);
    
    // Check for errors in response
    if ($apiResponse->getErrors()) {
        displayError("Failed to create payment link", $apiResponse->getErrors());
    }
    
    // Get the checkout URL
    $paymentLink = $apiResponse->getPaymentLink();
    if ($paymentLink && $paymentLink->getUrl()) {
        $checkoutUrl = $paymentLink->getUrl();
        
        // Store order details in session
        $_SESSION['order_amount'] = $amount;
        $_SESSION['order_total'] = $totalAmount / 100;
        
        // Redirect to Square's official checkout page
        header("Location: " . $checkoutUrl);
        exit();
    } else {
        displayError("Failed to create payment link", ["No checkout URL returned"]);
    }
    
} catch (SquareApiException $e) {
    displayError("Square API Exception", [$e->getMessage()]);
} catch (SquareException $e) {
    displayError("Square Exception", [$e->getMessage()]);
} catch (Exception $e) {
    displayError("Exception", [$e->getMessage()]);
}

function displayError($title, $errors) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error - Square Checkout</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }
            .error-container {
                max-width: 600px;
                width: 100%;
                background: white;
                padding: 40px;
                border-radius: 20px;
                box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            }
            h2 {
                color: #d32f2f;
                margin-bottom: 20px;
                font-size: 24px;
            }
            .error-details {
                background: #ffebee;
                padding: 20px;
                border-left: 4px solid #d32f2f;
                border-radius: 8px;
                margin: 20px 0;
                overflow-x: auto;
            }
            .error-details pre {
                white-space: pre-wrap;
                word-wrap: break-word;
                color: #c62828;
                font-size: 14px;
            }
            .btn {
                display: inline-block;
                padding: 14px 28px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                text-decoration: none;
                border-radius: 50px;
                margin-top: 20px;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            }
            .btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
            }
        </style>
    </head>
    <body>
        <div class="error-container">
            <h2><?= htmlspecialchars($title) ?></h2>
            <div class="error-details">
                <strong>Error Details:</strong>
                <pre><?php print_r($errors); ?></pre>
            </div>
            <a href="buy_login_credits.php" class="btn">← Back to Purchase Page</a>
        </div>
    </body>
    </html>
    <?php
    exit();
}
