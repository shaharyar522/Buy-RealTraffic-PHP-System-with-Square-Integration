<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Get invoice ID
$invoice_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Find invoice
$invoice = null;
if (isset($_SESSION['invoices'])) {
    foreach ($_SESSION['invoices'] as $inv) {
        if ($inv['id'] == $invoice_id) {
            $invoice = $inv;
            break;
        }
    }
}

if (!$invoice) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #<?php echo str_pad($invoice['id'], 5, '0', STR_PAD_LEFT); ?> - LoginCreditsApp</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .invoice-container {
            max-width: 800px;
            margin: 30px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        
        .invoice-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
        }
        
        .invoice-body {
            padding: 40px;
        }
        
        .invoice-section {
            margin-bottom: 30px;
        }
        
        .invoice-section h4 {
            color: #1B476E;
            margin-bottom: 15px;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .info-item {
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        
        .info-label {
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 5px;
        }
        
        .info-value {
            font-size: 16px;
            color: #212529;
            font-weight: 500;
        }
        
        @media print {
            body {
                background: white;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="no-print">
            <ul>
                <li><a href="buy_login_credits.php">Buy Credits</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="index.php?logout=1">Logout</a></li>
            </ul>
        </nav>
        
        <div class="invoice-container">
            <div class="invoice-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <h2 style="margin: 0;">INVOICE</h2>
                        <p style="margin: 5px 0 0 0;">Invoice #<?php echo str_pad($invoice['id'], 5, '0', STR_PAD_LEFT); ?></p>
                    </div>
                    <div style="text-align: right;">
                        <h3 style="margin: 0;">LoginCreditsApp</h3>
                        <p style="margin: 5px 0 0 0; font-size: 14px;">Square Payment System</p>
                    </div>
                </div>
            </div>
            
            <div class="invoice-body">
                <!-- Transaction Information -->
                <div class="invoice-section">
                    <h4>Transaction Information</h4>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Transaction ID</div>
                            <div class="info-value" style="font-family: monospace; font-size: 12px;">
                                <?php echo $invoice['transaction_id']; ?>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Payment Date</div>
                            <div class="info-value">
                                <?php echo date('F d, Y h:i A', strtotime($invoice['payment_date'])); ?>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Payment Status</div>
                            <div class="info-value">
                                <?php 
                                $status_class = 'status-pending';
                                if ($invoice['payment_status'] === 'Completed') {
                                    $status_class = 'status-completed';
                                } elseif ($invoice['payment_status'] === 'Failed') {
                                    $status_class = 'status-failed';
                                }
                                ?>
                                <span class="status-badge <?php echo $status_class; ?>">
                                    <?php echo $invoice['payment_status']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Payment Method</div>
                            <div class="info-value"><?php echo $invoice['payment_method']; ?></div>
                        </div>
                    </div>
                </div>
                
                <!-- Customer Information -->
                <?php if (isset($invoice['billing_info'])): ?>
                <div class="invoice-section">
                    <h4>Billing Information</h4>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Full Name</div>
                            <div class="info-value"><?php echo $invoice['billing_info']['name']; ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email Address</div>
                            <div class="info-value"><?php echo $invoice['billing_info']['email']; ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Phone Number</div>
                            <div class="info-value"><?php echo $invoice['billing_info']['phone']; ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Address</div>
                            <div class="info-value">
                                <?php 
                                echo $invoice['billing_info']['address'] . '<br>';
                                echo $invoice['billing_info']['city'] . ', ' . $invoice['billing_info']['state'] . ' ' . $invoice['billing_info']['zip'] . '<br>';
                                echo $invoice['billing_info']['country'];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Order Summary -->
                <div class="invoice-section">
                    <h4>Order Summary</h4>
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                                <th style="padding: 15px; text-align: left;">Description</th>
                                <th style="padding: 15px; text-align: center;">Quantity</th>
                                <th style="padding: 15px; text-align: right;">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 15px; border-bottom: 1px solid #dee2e6;">
                                    <strong>Login Credits</strong><br>
                                    <small style="color: #6c757d;">@ $10 per 1000 Credits</small>
                                </td>
                                <td style="padding: 15px; text-align: center; border-bottom: 1px solid #dee2e6;">
                                    <?php echo number_format($invoice['login_credits']); ?> Credits
                                </td>
                                <td style="padding: 15px; text-align: right; border-bottom: 1px solid #dee2e6;">
                                    $<?php echo number_format($invoice['amount'], 2); ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 15px; text-align: right;">
                                    <strong style="font-size: 18px;">Total Amount:</strong>
                                </td>
                                <td style="padding: 15px; text-align: right;">
                                    <strong style="font-size: 20px; color: #28a745;">
                                        $<?php echo number_format($invoice['amount'], 2); ?>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Error Message (if failed) -->
                <?php if ($invoice['payment_status'] === 'Failed' && isset($invoice['error_message'])): ?>
                <div class="invoice-section">
                    <div style="background: #f8d7da; border-left: 4px solid #dc3545; padding: 15px; border-radius: 5px;">
                        <strong style="color: #721c24;">Error:</strong>
                        <p style="color: #721c24; margin: 5px 0 0 0;"><?php echo $invoice['error_message']; ?></p>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Actions -->
                <div class="invoice-section no-print" style="text-align: center;">
                    <button onclick="window.print()" class="formbutton" style="margin: 0 10px;">
                        Print Invoice
                    </button>
                    <a href="dashboard.php" class="formbutton" style="background: #6c757d; margin: 0 10px; display: inline-block;">
                        Back to Dashboard
                    </a>
                </div>
                
                <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #dee2e6; text-align: center; color: #6c757d; font-size: 12px;">
                    <p>Thank you for your purchase!</p>
                    <p>If you have any questions, please contact support.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
