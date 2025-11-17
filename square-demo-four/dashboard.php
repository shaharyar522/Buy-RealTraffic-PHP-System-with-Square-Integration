<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Get user data
$user = $_SESSION['user'];
$invoices = isset($_SESSION['invoices']) ? $_SESSION['invoices'] : [];

// Calculate statistics
$total_spent = 0;
$total_credits_purchased = 0;
$successful_transactions = 0;

foreach ($invoices as $invoice) {
    if ($invoice['payment_status'] === 'Completed') {
        $total_spent += $invoice['amount'];
        $total_credits_purchased += $invoice['login_credits'];
        $successful_transactions++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LoginCreditsApp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="buy_login_credits.php">Buy Credits</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="index.php?logout=1">Logout</a></li>
            </ul>
        </nav>
        
        <div class="shadowed" style="margin-top: 20px;">
            <div class="dashboard-header">
                <h2 style="margin: 0;">Dashboard - <?php echo $user['username']; ?></h2>
                <p style="margin: 5px 0 0 0;">Welcome to LoginCreditsApp</p>
            </div>
            
            <div style="padding: 30px;">
                <!-- Statistics Cards -->
                <div class="dashboard-stats">
                    <div class="stat-card">
                        <h4>Current Balance</h4>
                        <div class="stat-value" style="color: #28a745;">
                            <?php echo number_format($user['login_credits']); ?>
                        </div>
                        <p style="color: #6c757d; margin-top: 10px;">Login Credits</p>
                    </div>
                    
                    <div class="stat-card">
                        <h4>Total Spent</h4>
                        <div class="stat-value" style="color: #667eea;">
                            $<?php echo number_format($total_spent, 2); ?>
                        </div>
                        <p style="color: #6c757d; margin-top: 10px;">All Time</p>
                    </div>
                    
                    <div class="stat-card">
                        <h4>Total Transactions</h4>
                        <div class="stat-value" style="color: #764ba2;">
                            <?php echo $successful_transactions; ?>
                        </div>
                        <p style="color: #6c757d; margin-top: 10px;">Successful</p>
                    </div>
                    
                    <div class="stat-card">
                        <h4>Credits Purchased</h4>
                        <div class="stat-value" style="color: #20c997;">
                            <?php echo number_format($total_credits_purchased); ?>
                        </div>
                        <p style="color: #6c757d; margin-top: 10px;">Total</p>
                    </div>
                </div>
                
                <!-- Invoices Table -->
                <h3 style="margin: 40px 0 20px 0; color: #1B476E;">Transaction History / Invoices</h3>
                
                <?php if (empty($invoices)): ?>
                    <div style="text-align: center; padding: 40px; background: #f8f9fa; border-radius: 10px;">
                        <p style="color: #6c757d; font-size: 18px;">No transactions yet</p>
                        <a href="buy_login_credits.php" class="formbutton" style="margin-top: 20px; display: inline-block;">
                            Buy Login Credits
                        </a>
                    </div>
                <?php else: ?>
                    <div style="overflow-x: auto;">
                        <table class="invoice-table">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Date</th>
                                    <th>Transaction ID</th>
                                    <th>Credits</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (array_reverse($invoices) as $invoice): ?>
                                    <tr>
                                        <td><strong>#<?php echo str_pad($invoice['id'], 5, '0', STR_PAD_LEFT); ?></strong></td>
                                        <td><?php echo date('M d, Y', strtotime($invoice['payment_date'])); ?></td>
                                        <td style="font-family: monospace; font-size: 11px;">
                                            <?php 
                                            $txn_id = $invoice['transaction_id'];
                                            echo strlen($txn_id) > 20 ? substr($txn_id, 0, 20) . '...' : $txn_id;
                                            ?>
                                        </td>
                                        <td><strong><?php echo number_format($invoice['login_credits']); ?></strong></td>
                                        <td><strong>$<?php echo number_format($invoice['amount'], 2); ?></strong></td>
                                        <td><?php echo $invoice['payment_method']; ?></td>
                                        <td>
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
                                        </td>
                                        <td>
                                            <a href="invoice_details.php?id=<?php echo $invoice['id']; ?>" 
                                               style="color: #667eea; text-decoration: none; font-weight: 500;">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
                
                <!-- Quick Actions -->
                <div style="margin-top: 40px; text-align: center;">
                    <a href="buy_login_credits.php" class="formbutton" style="margin: 0 10px;">
                        Buy More Credits
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
