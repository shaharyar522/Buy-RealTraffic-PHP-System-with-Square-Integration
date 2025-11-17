<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Get last transaction
$transaction = isset($_SESSION['last_transaction']) ? $_SESSION['last_transaction'] : null;

if (!$transaction) {
    header('Location: buy_login_credits.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - LoginCreditsApp</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .success-container {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        
        .success-header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }
        
        .success-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }
        
        .success-body {
            padding: 40px;
        }
        
        .transaction-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            font-weight: 600;
            color: #495057;
        }
        
        .detail-value {
            color: #212529;
        }
        
        .action-buttons {
            margin-top: 30px;
            text-align: center;
        }
        
        .action-buttons a {
            display: inline-block;
            margin: 0 10px;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-container">
            <div class="success-header">
                <div class="success-icon">✓</div>
                <h1>Payment Successful!</h1>
                <p style="font-size: 18px; margin-top: 10px;">Thank you for your purchase</p>
            </div>
            
            <div class="success-body">
                <h3 style="color: #28a745; text-align: center; margin-bottom: 20px;">
                    Your transaction has been completed successfully
                </h3>
                
                <div class="transaction-details">
                    <h4 style="margin-bottom: 15px; color: #1B476E;">Transaction Details</h4>
                    
                    <div class="detail-row">
                        <span class="detail-label">Transaction ID:</span>
                        <span class="detail-value"><?php echo $transaction['transaction_id']; ?></span>
                    </div>
                    
                    <div class="detail-row">
                        <span class="detail-label">Username:</span>
                        <span class="detail-value"><?php echo $transaction['username']; ?></span>
                    </div>
                    
                    <div class="detail-row">
                        <span class="detail-label">Login Credits Purchased:</span>
                        <span class="detail-value" style="color: #28a745; font-weight: bold;">
                            <?php echo number_format($transaction['login_credits']); ?> Credits
                        </span>
                    </div>
                    
                    <div class="detail-row">
                        <span class="detail-label">Amount Paid:</span>
                        <span class="detail-value" style="font-weight: bold;">
                            $<?php echo number_format($transaction['amount'], 2); ?>
                        </span>
                    </div>
                    
                    <div class="detail-row">
                        <span class="detail-label">Payment Method:</span>
                        <span class="detail-value"><?php echo $transaction['payment_method']; ?></span>
                    </div>
                    
                    <div class="detail-row">
                        <span class="detail-label">Payment Date:</span>
                        <span class="detail-value"><?php echo date('F d, Y h:i A', strtotime($transaction['payment_date'])); ?></span>
                    </div>
                    
                    <div class="detail-row">
                        <span class="detail-label">Status:</span>
                        <span class="detail-value">
                            <span class="status-badge status-completed"><?php echo $transaction['payment_status']; ?></span>
                        </span>
                    </div>
                </div>
                
                <div style="background: #d4edda; padding: 15px; border-radius: 5px; margin: 20px 0; border-left: 4px solid #28a745;">
                    <strong style="color: #155724;">Current Balance:</strong>
                    <span style="color: #155724; font-size: 20px; font-weight: bold; margin-left: 10px;">
                        <?php echo number_format($_SESSION['user']['login_credits']); ?> Login Credits
                    </span>
                </div>
                
                <div class="action-buttons">
                    <a href="dashboard.php" class="btn-primary">View Dashboard</a>
                    <a href="buy_login_credits.php" class="btn-secondary">Buy More Credits</a>
                </div>
                
                <p style="text-align: center; color: #6c757d; margin-top: 30px; font-size: 14px;">
                    A confirmation email has been sent to <?php echo $transaction['billing_info']['email']; ?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
