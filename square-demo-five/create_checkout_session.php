<?php
session_start();
require_once 'config.php';

if (isset($_POST['submit_payment'])) {
    
    // Save form data
    $_SESSION['payment_data'] = $_POST;
    
    try {
        // Create checkout session
        $checkout_data = [
            'idempotency_key' => uniqid(),
            'order' => [
                'location_id' => SQUARE_LOCATION_ID,
                'line_items' => [
                    [
                        'name' => 'Login Credits',
                        'quantity' => '1',
                        'base_price_money' => [
                            'amount' => 500, // $5.00 in cents
                            'currency' => 'USD'
                        ]
                    ]
                ]
            ],
            'redirect_url' => 'http://localhost/square-demo-five/thank_you.php',
            'ask_for_shipping_address' => false
        ];

        $ch = curl_init('https://connect.squareupsandbox.com/v2/online-checkout/payment-links');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . SQUARE_ACCESS_TOKEN,
            'Content-Type: application/json',
            'Square-Version: 2023-12-13'
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($checkout_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = json_decode($response, true);

        if ($http_code == 200 && isset($result['payment_link']['url'])) {
            // Redirect to official Square checkout
            header("Location: " . $result['payment_link']['url']);
            exit;
        } else {
            echo "Error creating checkout: " . json_encode($result);
        }

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
