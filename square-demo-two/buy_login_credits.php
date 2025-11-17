<?php
session_start();

$login_cost_per_thousand = 50;
$value = 0;

if (isset($_POST['mode']) && $_POST['mode'] == "preview") {
    $value = 1;
    $_SESSION['amount'] = $_POST['amount'];
    $_SESSION['pay_meth'] = $_POST['pay_meth'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buy Login Credits</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
<center><h2>Buy Login Credits</h2></center>

<p align="center"> The cost of Login Credits is 
<b style="color:red;">$<?= $login_cost_per_thousand ?></b> 
per 1000 Login Credits.</p>

<?php if ($value == 0) { ?>
<form action="buy_login_credits.php#form_down" method="POST">
<table width="100%" border="1" cellpadding="10" cellspacing="0">
<tr bgcolor="#1B476E">
<td colspan="2" align="center">
<font color="white"><b>Buy Login Credits</b></font>
</td>
</tr>

<tr bgcolor="#e9edf6">
<td width="60%">Enter the number of Login Credits:</td>
<td><input type="text" name="amount" required></td>
</tr>

<tr bgcolor="#d0d7e7">
<td>Select Payment Type:</td>
<td>
<select name="pay_meth">
<option value="Credit Card">Credit Card</option>
<option value="Debit Card">Debit Card</option>
</select>
</td>
</tr>

<input type="hidden" name="mode" value="preview">

<tr bgcolor="#e9edf6">
<td></td>
<td><button type="submit">Preview</button></td>
</tr>
</table>
</form>

<?php } else { ?>
<a name="form_down"></a>
<h3>Payment Information</h3>

<!-- Payment Form using Square JS SDK -->
<form id="payment-form" action="process-payment.php" method="POST">
<table width="100%" border="1" cellpadding="10" cellspacing="0">
<tr bgcolor="#e9edf6">
<td>Name</td>
<td><input type="text" name="name" required></td>
</tr>
<tr bgcolor="#d0d7e7">
<td>Email</td>
<td><input type="email" name="email" required></td>
</tr>
<tr bgcolor="#e9edf6">
<td>Card</td>
<td>
<div id="card-container"></div>
</td>
</tr>
</table>

<input type="hidden" id="card-nonce" name="nonce">
<br>
<button type="submit">Submit Payment</button>
</form>

<script type="text/javascript" src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
<script>
const appId = "sandbox-sq0idb-RoBtfk6edD6F5wzJTWZPtA"; // Sandbox App ID
const locationId = "LYHCWV6ZGN0P7";

async function initializeCard() {
    try {
        if (!window.Square) {
            console.error('Square.js failed to load properly');
            alert('Payment system failed to load. Please refresh the page.');
            return;
        }

        const payments = Square.payments(appId, locationId);
        const card = await payments.card();
        await card.attach('#card-container');

        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async function(event) {
            event.preventDefault();
            
            console.log('Form submitted, tokenizing card...');
            
            try {
                const result = await card.tokenize();
                console.log('Tokenization result:', result);
                
                if (result.status === 'OK') {
                    console.log('Token received:', result.token);
                    document.getElementById('card-nonce').value = result.token;
                    
                    // Verify nonce is set
                    const nonceValue = document.getElementById('card-nonce').value;
                    console.log('Nonce value before submit:', nonceValue);
                    
                    if (nonceValue) {
                        form.submit();
                    } else {
                        alert('Error: Payment token not generated');
                    }
                } else {
                    let errorMessage = 'Payment tokenization failed.';
                    if (result.errors) {
                        errorMessage = result.errors.map(e => e.message).join(', ');
                        console.error('Tokenization errors:', result.errors);
                    }
                    alert(errorMessage);
                }
            } catch (e) {
                console.error('Tokenization error:', e);
                alert('Error processing card: ' + e.message);
            }
        });
    } catch (e) {
        console.error('Square initialization error:', e);
        alert('Payment system initialization failed: ' + e.message);
    }
}

// Wait for page to load
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeCard);
} else {
    initializeCard();
}
</script>

<?php } ?>
</div>
</body>
</html>
