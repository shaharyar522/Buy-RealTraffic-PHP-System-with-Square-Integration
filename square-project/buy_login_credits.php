<?php
session_start();
require "config.php";

// Store POST data in SESSION
$_SESSION['credits'] = $_POST['credits'];
$_SESSION['pay_type'] = $_POST['pay_type'];
$_SESSION['card_number'] = $_POST['card_number'];
$_SESSION['expiry'] = $_POST['expiry'];
$_SESSION['cvv'] = $_POST['cvv'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['address'] = $_POST['address'];

// Calculate total (example: $10 per 1000 credits)
$total_amount = ($_SESSION['credits']/1000)*10;
$_SESSION['amount'] = $total_amount;
?>

<!DOCTYPE html>
<html>
<head>
<title>Preview Purchase</title>
</head>
<body>

<h2>Preview Your Purchase</h2>
<div id="form_down">
<p><b>Credits:</b> <?= $_SESSION['credits'] ?></p>
<p><b>Amount:</b> $<?= number_format($_SESSION['amount'],2) ?></p>
<p><b>Payment Type:</b> <?= $_SESSION['pay_type'] ?></p>
<p><b>Name:</b> <?= $_SESSION['name'] ?></p>
<p><b>Email:</b> <?= $_SESSION['email'] ?></p>
<p><b>Address:</b> <?= $_SESSION['address'] ?></p>

<form method="post" action="checkout.php">
<button type="submit">Submit Payment</button>
</form>

</div>
</body>
</html>
