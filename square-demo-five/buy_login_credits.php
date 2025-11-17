<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Buy Login Credits</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Buy Login Credits</h2>

    <form method="POST">

        <label>Enter Login Credits:</label>
        <input type="number" name="amount" required min="1">

        <label>Payment Type:</label>
        <select name="payment_type" required>
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
        </select>

        <h3>Billing Information</h3>

        <label>Card Number:</label>
        <input type="text" name="card_number" value="4111111111111111" required>

        <label>Expiration (MM/YY):</label>
        <input type="text" name="expiration" value="12/24" required>

        <label>CVV:</label>
        <input type="text" name="cvv" value="852" required>

        <label>Email Address:</label>
        <input type="email" name="email" value="demo@example.com" required>

        <label>First Name:</label>
        <input type="text" name="fname" value="Demo" required>

        <label>Last Name:</label>
        <input type="text" name="lname" value="User" required>

        <label>Address:</label>
        <input type="text" name="address" required>

        <label>City:</label>
        <input type="text" name="city" required>

        <label>State:</label>
        <input type="text" name="state" required>

        <label>Zip Code:</label>
        <input type="text" name="zip" required>

        <label>Country:</label>
        <input type="text" name="country" required>

        <label>Phone Number:</label>
        <input type="text" name="phone" required>

        <button type="submit" name="submit_payment">Submit Payment</button>

    </form>
</div>

</body>
</html>

<?php
// When user clicks submit
if (isset($_POST['submit_payment'])) {

    // Save form to session
    $_SESSION['payment_data'] = $_POST;

    // REPLACE THIS with your NEW Square Payment Link from Dashboard
    // Example: https://checkout.square.site/buy/XXXXXXXX
    $square_checkout_url = "YOUR_NEW_PAYMENT_LINK_HERE";

    // Redirect user to official Square checkout page
    header("Location: $square_checkout_url");
    exit;
}
?>
