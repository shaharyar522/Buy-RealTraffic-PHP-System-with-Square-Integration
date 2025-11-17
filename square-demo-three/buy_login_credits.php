<?php
session_start();
require 'vendor/autoload.php';

use Square\SquareClient;
use Square\Checkout\PaymentLinks\Requests\CreatePaymentLinkRequest;
use Square\Types\QuickPay;
use Square\Types\Money;
use Square\Types\CheckoutOptions;

$login_cost_per_thousand = 50;

// When form is submitted, create checkout and redirect immediately
if (isset($_POST['mode']) && $_POST['mode'] == "preview") {
    $_SESSION['amount'] = $_POST['amount'];
    $_SESSION['pay_meth'] = $_POST['pay_meth'];
    
    $accessToken = "EAAAl20jPgj0WEB7FdAXN0zigZOdYRZaIeD5tYbBm9cIWQNxKttkQCdLsUnx66pE";
    $locationId = "LYHCWV6ZGN0P7";
    
    $amount = $_SESSION['amount'];
    $pricePerThousand = 50;
    $totalAmount = ($amount / 1000) * $pricePerThousand * 100;
    
    $client = new SquareClient(
        $accessToken,
        '2025-10-16',
        ['baseUrl' => 'https://connect.squareupsandbox.com']
    );
    
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $baseUrl = $protocol . "://" . $host . dirname($_SERVER['PHP_SELF']);
    $redirectUrl = rtrim($baseUrl, '/') . '/thank_you.php';
    
    try {
        $money = new Money([
            'amount' => $totalAmount,
            'currency' => 'USD'
        ]);
        
        $quickPay = new QuickPay([
            'name' => $amount . ' Login Credits',
            'priceMoney' => $money,
            'locationId' => $locationId
        ]);
        
        $checkoutOptions = new CheckoutOptions([
            'redirectUrl' => $redirectUrl
        ]);
        
        $request = new CreatePaymentLinkRequest([
            'idempotencyKey' => uniqid('order_', true),
            'quickPay' => $quickPay,
            'checkoutOptions' => $checkoutOptions
        ]);
        
        $apiResponse = $client->checkout->paymentLinks->create($request);
        
        if (!$apiResponse->getErrors()) {
            $paymentLink = $apiResponse->getPaymentLink();
            if ($paymentLink && $paymentLink->getUrl()) {
                $checkoutUrl = $paymentLink->getUrl();
                
                // Store order details in session
                $_SESSION['order_amount'] = $amount;
                $_SESSION['order_total'] = $totalAmount / 100;
                $_SESSION['payment_method'] = $_POST['pay_meth'];
                $_SESSION['order_id'] = $paymentLink->getOrderId();
                
                // DIRECT REDIRECT to Square's official checkout page
                header("Location: " . $checkoutUrl);
                exit();
            }
        }
        
        // If error, show error page
        $error = "Failed to create checkout link. Please try again.";
        
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Login Credits</title>
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

        .container {
            max-width: 600px;
            width: 100%;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 10px;
            font-size: 28px;
        }

        .pricing-info {
            text-align: center;
            padding: 15px;
            background: #f0f4ff;
            border-radius: 10px;
            margin: 20px 0;
            color: #555;
        }

        .pricing-info .price {
            color: #667eea;
            font-size: 24px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 15px;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 14px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        input[type="number"]:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 16px;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .badge {
            display: inline-block;
            background: #f0f4ff;
            color: #667eea;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        #total-display {
            text-align: center;
            margin: 20px 0;
            padding: 15px;
            background: #f8f9ff;
            border-radius: 10px;
            font-size: 18px;
            color: #333;
        }

        #total-display .amount {
            color: #667eea;
            font-weight: bold;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="text-align: center;">
            <span class="badge">Square Sandbox Mode</span>
        </div>
        <h2>Buy Login Credits</h2>
        
        <div class="pricing-info">
            The cost is <span class="price">$<?= $login_cost_per_thousand ?></span> per 1000 Login Credits
        </div>

        <?php if (isset($error)): ?>
            <!-- Show error -->
            <div style="background: #ffebee; padding: 20px; border-radius: 10px; border-left: 4px solid #d32f2f;">
                <h3 style="color: #d32f2f; margin-bottom: 10px;">Error Creating Checkout</h3>
                <p style="color: #666;"><?= htmlspecialchars($error) ?></p>
                <a href="buy_login_credits.php" class="btn" style="margin-top: 15px;">Try Again</a>
            </div>
        <?php else: ?>
            <!-- Show form -->
            <form action="buy_login_credits.php" method="POST" id="checkoutForm">
                <div class="form-group">
                    <label for="amount">Number of Login Credits:</label>
                    <input type="number" id="amount" name="amount" min="100" step="100" value="1000" required>
                </div>

                <div class="form-group">
                    <label for="pay_meth">Payment Type:</label>
                    <select name="pay_meth" id="pay_meth" required>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Debit Card">Debit Card</option>
                    </select>
                </div>

                <div id="total-display">
                    Total: <span class="amount" id="total-amount">$50.00</span>
                </div>

                <input type="hidden" name="mode" value="preview">
                
                <button type="submit" class="btn" id="submitBtn">
                    🔒 Proceed to Secure Checkout
                </button>
            </form>

            <a href="index.php" class="back-link">← Back to Home</a>
        <?php endif; ?>
    </div>

    <?php if (!isset($error)): ?>
    <script>
        // Calculate total dynamically
        const amountInput = document.getElementById('amount');
        const totalAmount = document.getElementById('total-amount');
        const pricePerThousand = <?= $login_cost_per_thousand ?>;

        function updateTotal() {
            const credits = parseInt(amountInput.value) || 0;
            const total = (credits / 1000) * pricePerThousand;
            totalAmount.textContent = '$' + total.toFixed(2);
        }

        amountInput.addEventListener('input', updateTotal);
        updateTotal();

        // Show loading when form submits
        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('submitBtn');
            btn.textContent = '⏳ Creating checkout...';
            btn.disabled = true;
        });
    </script>
    <?php endif; ?>
</body>
</html>
