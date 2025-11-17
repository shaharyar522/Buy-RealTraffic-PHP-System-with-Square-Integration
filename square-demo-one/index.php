<?php
session_start();
$_SESSION['user'] = [
    'username' => 'demouser',
    'email' => 'demo@example.com',
    'firstname' => 'Demo',
    'lastname' => 'User'
];

$login_cost_per_thousand = 50;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Buy Login Credits Demo</title>
    <style>
        .hidden { display: none; }
        .card-form { max-width: 400px; margin: 20px 0; }
    </style>
</head>
<body>
<h2>Buy Login Credits</h2>

<p>User: <?php echo $_SESSION['user']['username']; ?></p>
<p>Cost: $<?php echo $login_cost_per_thousand; ?> per 1000 Login Credits</p>

<form id="credits-form">
    <label>Enter Number of Login Credits:</label>
    <input type="number" name="credits" id="credits" required><br><br>

    <label>Select Payment Type:</label>
    <select name="pay_meth" id="pay_meth">
        <option value="">--Select--</option>
        <option value="Credit Card">Credit Card</option>
        <option value="Debit Card">Debit Card</option>
    </select><br><br>

    <div id="card-container" class="card-form hidden">
        <!-- This can be your Square card container or dummy form -->
        <p>Credit Card Details (Sandbox Demo)</p>
        <label>Card Number:</label>
        <input type="text" name="card_number" value="4111111111111111" required><br><br>
        <label>Expiry (MM/YY):</label>
        <input type="text" name="expiration_date" value="12/24" required><br><br>
        <label>CVV:</label>
        <input type="text" name="cvv" value="852" required><br><br>
    </div>

    <button type="submit">Submit Payment</button>
</form>

<script>
const paySelect = document.getElementById('pay_meth');
const cardForm = document.getElementById('card-container');

paySelect.addEventListener('change', () => {
    if (paySelect.value === 'Credit Card') {
        cardForm.classList.remove('hidden');
    } else {
        cardForm.classList.add('hidden');
    }
});

document.getElementById('credits-form').addEventListener('submit', function(e){
    e.preventDefault();

    // Redirect to your official Square checkout sandbox page
    window.location.href = "https://checkout.square.site/merchant/ML2HT8TSM0T0H/order/9QbMYz7MTVzruxdp91g9SaXQN2fZY";
});
</script>
</body>
</html>
