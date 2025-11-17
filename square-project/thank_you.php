<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Thank You</title>
</head>
<body>

<h2>Payment Successful!</h2>
<p>Thank you <?= $_SESSION['name'] ?>.</p>
<p>You purchased <b><?= $_SESSION['credits'] ?></b> login credits.</p>
<p>Total Paid: $<?= number_format($_SESSION['amount'],2) ?></p>

</body>
</html>
