<?php
// =======================
// SQUARE ONLINE CHECKOUT PAYMENT LINK (SANDBOX)
// =======================

require 'vendor/autoload.php'; // optional if using Square SDK elsewhere
use Square\Environment;

// ----------------------
// STEP 1: Square Settings
// ----------------------
//$accessToken = 'EAAAl15H58Zkiy5zQBHw5X5W-GAf-mIHzHj-dEBTqvZmnYrMR0jW6eK2iSKx7xxe'; // Sandbox Access Token


//$accessToken = 'EAAAl15H58Zkiy5zQBHw5X5W-GAf-mIHzHj-dEBTqvZmnYrMR0jW6eK2iSKx7xxe';
//$locationId  = 'LEEBJ3DMZ3GRC'; // Production Location ID


$accessToken = 'EAAAl9R9WifRhntM1f_gykfM5TiM-UfSfoq9mfwZF2roRbXpfGeN2tpVikI79Gfk';
$locationId  = 'L6QXMVJJ5Y1W2'; // Production Location ID




// ----------------------
// STEP 2: Collect POST or Demo Data
// ----------------------
$rawAmount = isset($_POST['amount']) && is_numeric($_POST['amount'])
    ? floatval($_POST['amount'])
    : 5.00; // Default $5.00 demo amount

$itemName = $_POST['item_id'] ?? 'Demo Traffic Credits';
$firstname = $_POST['firstname'] ?? 'John';
$lastname  = $_POST['lastname'] ?? 'Doe';
$username  = $_POST['username'] ?? 'demo_user';
$email     = $_POST['email'] ?? 'demo@example.com';

// Convert to cents (Square expects integer cents)
$amountCents = intval(round($rawAmount * 100));

// ----------------------
// STEP 3: Create JSON payload for Square API
// ----------------------
$idempotencyKey = uniqid('sq_', true);

$data = [
    "idempotency_key" => $idempotencyKey,
    "quick_pay" => [
        "price_money" => [
            "currency" => "USD",
            "amount" => $amountCents
        ],
        "location_id" => $locationId,
        "name" => $itemName,
        "note" => "Firstname: $firstname | Lastname: $lastname | Username: $username | Email: $email"
    ],
    "checkout_options" => [
        "custom_fields" => [
            ["title" => "First Name", "value" => $firstname],
            ["title" => "Last Name", "value" => $lastname]
        ],
        "merchant_support_email" => "admin@buy-realtraffic.com",
        "redirect_url" => "https://www.buy-realtraffic.com/rusers/thank_you.php"
    ]
];

// ----------------------
// STEP 4: Initialize CURL
// ----------------------
$url = "https://connect.squareup.com/v2/online-checkout/payment-links";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Square-Version: 2025-10-16",
    "Authorization: Bearer $accessToken",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// ----------------------
// STEP 5: Execute Request
// ----------------------
$response = curl_exec($ch);
if (curl_errno($ch)) {
    die("<h3>❌ cURL Error:</h3>" . curl_error($ch));
}
curl_close($ch);

// ----------------------
// STEP 6: Handle Response
// ----------------------
$result = json_decode($response, true);

if (isset($result['payment_link']['url'])) {
    $paymentLink = $result['payment_link']['url'];

    echo "<h2>✅ Square Payment Link Created Successfully!</h2>";
    echo "<p>Amount: $" . number_format($rawAmount, 2) . "</p>";
    echo "<p>Item: $itemName</p>";
    echo "<p><a href='$paymentLink' target='_blank'>Click here to Pay Now</a></p>";

    // Optional redirect
    // header("Location: $paymentLink");
    // exit();
} else {
    echo "<h3>⚠️ Failed to create payment link</h3>";
    echo "<pre>";
    print_r($result);
    echo "</pre>";
}
?>
