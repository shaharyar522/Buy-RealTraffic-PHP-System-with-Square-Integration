<?php 
session_start();
$orderAmount = $_SESSION['order_amount'] ?? 'N/A';
$orderTotal = $_SESSION['order_total'] ?? 0;
$paymentMethod = $_SESSION['payment_method'] ?? 'N/A';
$orderId = $_SESSION['order_id'] ?? 'N/A';

// You can save to database here if needed
// Example: save order to database
// $db->query("INSERT INTO orders (amount, total, payment_method, order_id) VALUES (...)");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - Thank You</title>
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
            padding: 50px 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            animation: fadeIn 0.6s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            animation: scaleIn 0.5s ease-in-out;
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        .success-icon svg {
            width: 50px;
            height: 50px;
            stroke: white;
            stroke-width: 3;
            fill: none;
        }

        h2 {
            color: #333;
            margin-bottom: 15px;
            font-size: 32px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 16px;
            line-height: 1.6;
        }

        .order-summary {
            background: #f8f9ff;
            padding: 25px;
            border-radius: 15px;
            margin: 30px 0;
            text-align: left;
        }

        .order-summary h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .order-item:last-child {
            border-bottom: none;
            font-weight: bold;
            color: #667eea;
            font-size: 18px;
            padding-top: 15px;
        }

        .order-item span:first-child {
            color: #666;
        }

        .order-item span:last-child {
            color: #333;
            font-weight: 600;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 16px 40px;
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            margin: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
            box-shadow: none;
        }

        .btn-secondary:hover {
            background: #f0f4ff;
            box-shadow: none;
        }

        .badge {
            display: inline-block;
            background: #4caf50;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">
            <svg viewBox="0 0 52 52">
                <polyline points="14 27 22 35 38 19"/>
            </svg>
        </div>

        <div class="badge">Payment Successful</div>
        <h2>Thank You!</h2>
        <p class="subtitle">
            Your payment has been processed successfully.
            <br>Your login credits will be activated shortly.
        </p>

        <div class="order-summary">
            <h3>Order Summary</h3>
            <?php
            // YE AUTHENTICATION HAI
            $accessToken = "EAAAl20jPgj0WEB7FdAXN0zigZOdYRZaIeD5tYbBm9cIWQNxKttkQCdLsUnx66pE";
            $locationId = "LYHCWV6ZGN0P7";
            
            // Square Client with SANDBOX mode
            $client = new SquareClient(
                $accessToken,  // ← Ye tumhari sandbox access token
                '2025-10-16',
                ['baseUrl' => 'https://connect.squareupsandbox.com']  // ← Sandbox URL
            );            <?php if ($orderId !== 'N/A'): ?>
            <div class="order-item">
                <span>Order ID:</span>
                <span style="font-family: monospace; font-size: 12px;"><?= htmlspecialchars($orderId) ?></span>
            </div>
            <?php endif; ?>
            <div class="order-item">
                <span>Login Credits:</span>
                <span><?= htmlspecialchars($orderAmount) ?> credits</span>
            </div>
            <div class="order-item">
                <span>Payment Method:</span>
                <span><?= htmlspecialchars($paymentMethod) ?></span>
            </div>
            <div class="order-item">
                <span>Status:</span>
                <span style="color: #4caf50;">✓ Completed</span>
            </div>
            <div class="order-item">
                <span>Total Paid:</span>
                <span>$<?= number_format($orderTotal, 2) ?></span>
            </div>
        </div>

        <div>
            <a href="index.php" class="btn">← Back to Home</a>
            <a href="buy_login_credits.php" class="btn btn-secondary">Buy More Credits</a>
        </div>
    </div>
</body>
</html>
