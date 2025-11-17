<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Square Sandbox Configuration
$square_app_id = 'sandbox-sq0idb-RoBtfk6edD6F5wzJTWZPtA';
$square_access_token = 'EAAAl20jPgj0WEB7FdAXN0zigZOdYRZaIeD5tYbBm9cIWQNxKttkQCdLsUnx66pE';
$square_location_id = 'LYHCWV6ZGN0P7';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $amount = $_POST['amount'];
    $login_credits = $_POST['login_credits'];
    $pay_meth = $_POST['pay_meth'];
    $card_number = $_POST['card_number'];
    $expiration_date = $_POST['expiration_date'];
    $cvv = $_POST['cvv'];
    $email = $_POST['x_email'];
    $first_name = $_POST['x_first_name'];
    $last_name = $_POST['x_last_name'];
    $address = $_POST['x_address'];
    $city = $_POST['x_city'];
    $state = $_POST['x_state'];
    $zip = $_POST['x_zip'];
    $country = $_POST['x_country'];
    $phone = $_POST['u_p_number'];
    
    // Parse expiration date
    $exp_parts = explode('/', $expiration_date);
    $exp_month = isset($exp_parts[0]) ? trim($exp_parts[0]) : '';
    $exp_year = isset($exp_parts[1]) ? trim($exp_parts[1]) : '';
    
    // Add 2000 to year if it's 2 digits
    if (strlen($exp_year) == 2) {
        $exp_year = '20' . $exp_year;
    }
    
    // Generate a unique idempotency key
    $idempotency_key = uniqid('', true);
    
    // Convert amount to cents (Square uses cents)
    $amount_cents = intval($amount * 100);
    
    // Prepare payment data for Square
    $payment_data = [
        'idempotency_key' => $idempotency_key,
        'source_id' => 'cnon:card-nonce-ok', // Square test nonce - always succeeds in sandbox
        'amount_money' => [
            'amount' => $amount_cents,
            'currency' => 'USD'
        ],
        'location_id' => $square_location_id,
        'billing_address' => [
            'address_line_1' => $address,
            'locality' => $city,
            'administrative_district_level_1' => $state,
            'postal_code' => $zip,
            'country' => $country
        ],
        'buyer_email_address' => $email,
        'note' => $login_credits . ' Login Credits for ' . $_SESSION['user']['username']
    ];
    
    // Make API call to Square
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://connect.squareupsandbox.com/v2/payments');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payment_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Square-Version: 2024-11-13',
        'Authorization: Bearer ' . $square_access_token,
        'Content-Type: application/json'
    ]);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    $result = json_decode($response, true);
    
    // Check if payment was successful
    if ($http_code == 200 && isset($result['payment']) && $result['payment']['status'] === 'COMPLETED') {
        // Payment successful
        $transaction_id = $result['payment']['id'];
        
        // Update user credits
        $_SESSION['user']['login_credits'] += $login_credits;
        
        // Store invoice in session
        if (!isset($_SESSION['invoices'])) {
            $_SESSION['invoices'] = [];
        }
        
        $invoice = [
            'id' => count($_SESSION['invoices']) + 1,
            'username' => $_SESSION['user']['username'],
            'amount' => $amount,
            'login_credits' => $login_credits,
            'payment_method' => $pay_meth,
            'payment_status' => 'Completed',
            'transaction_id' => $transaction_id,
            'payment_date' => date('Y-m-d H:i:s'),
            'billing_info' => [
                'name' => $first_name . ' ' . $last_name,
                'email' => $email,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'zip' => $zip,
                'country' => $country,
                'phone' => $phone
            ]
        ];
        
        $_SESSION['invoices'][] = $invoice;
        $_SESSION['last_transaction'] = $invoice;
        
        // Redirect to thank you page
        header('Location: thank_you.php');
        exit;
    } else {
        // Payment failed
        $error_message = isset($result['errors']) ? $result['errors'][0]['detail'] : 'Payment processing failed';
        $_SESSION['payment_error'] = $error_message;
        
        // Store failed invoice
        if (!isset($_SESSION['invoices'])) {
            $_SESSION['invoices'] = [];
        }
        
        $invoice = [
            'id' => count($_SESSION['invoices']) + 1,
            'username' => $_SESSION['user']['username'],
            'amount' => $amount,
            'login_credits' => $login_credits,
            'payment_method' => $pay_meth,
            'payment_status' => 'Failed',
            'transaction_id' => 'N/A',
            'payment_date' => date('Y-m-d H:i:s'),
            'error_message' => $error_message
        ];
        
        $_SESSION['invoices'][] = $invoice;
        
        header('Location: buy_login_credits.php?error=payment_failed');
        exit;
    }
} else {
    header('Location: buy_login_credits.php');
    exit;
}
?>
