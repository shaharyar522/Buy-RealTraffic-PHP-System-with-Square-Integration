<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Buy Login Credits</title>
</head>
<body>

<h2>Buy Login Credits</h2>

<form method="post" action="buy_login_credits.php#form_down">
<table>
<tr>
<td>Login Credits:</td>
<td><input type="number" name="credits" required></td>
</tr>

<tr>
<td>Payment Type:</td>
<td>
<select name="pay_type">
<option value="Credit Card">Credit Card</option>
<option value="Debit Card">Debit Card</option>
</select>
</td>
</tr>

<tr>
<td>Card Number:</td>
<td><input type="text" name="card_number" value="4111111111111111" readonly></td>
</tr>

<tr>
<td>Expiry:</td>
<td><input type="text" name="expiry" value="12/24" readonly></td>
</tr>

<tr>
<td>CVV:</td>
<td><input type="text" name="cvv" value="852" readonly></td>
</tr>

<tr>
<td>Full Name:</td>
<td><input type="text" name="name" required></td>
</tr>

<tr>
<td>Email:</td>
<td><input type="email" name="email" required></td>
</tr>

<tr>
<td>Address:</td>
<td><input type="text" name="address" required></td>
</tr>

<tr>
<td colspan="2"><button type="submit">Preview</button></td>
</tr>
</table>
</form>

</body>
</html>
