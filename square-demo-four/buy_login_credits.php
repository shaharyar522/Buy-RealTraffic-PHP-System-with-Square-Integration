<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Configuration
$login_cost_per_thousand = 10; // $10 per 1000 credits
$min_login_credits = 100; // Minimum credits

// Handle form submission
$value = 0; // 0 = show form, 1 = show preview
$login_credits = 0;
$amount = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['mode']) && $_POST['mode'] === 'preview') {
        $login_credits = intval($_POST['amount']);
        
        if ($login_credits < $min_login_credits) {
            $error = "Sorry, the minimum number of Login Credits you can purchase is: " . $min_login_credits;
        } else {
            // Calculate amount
            $amount = ($login_credits / 1000) * $login_cost_per_thousand;
            $amount = number_format($amount, 2, '.', '');
            $value = 1; // Show preview
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Login Credits - LoginCreditsApp</title>
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
        
        <table align="center" class="shadowed" valign="top" width="100%" bgcolor="#d8ecff" cellpadding="10" cellspacing="0" border="0">
            <tr>
                <td>
                    <br>
                    <table align="center" class="shadowed" valign="top" width="100%" bgcolor="#d8ecff" cellpadding="10" cellspacing="0" border="0">
                        <tr>
                            <td align="center">
                                <center>
                                    <h3>Buy Login Credits</h3>
                                </center>
                                <br><br>
                                
                                <div id="column_w610" style="width:100%">
                                    <?php if ($value == 0) { ?>
                                        
                                        <p align="center"><b>
                                            <div class="header_01" align="center">
                                                User ID: <?php echo $_SESSION['user']['username'] ?> - Buy Login Credits
                                            </div>
                                        </b></p>
                                        
                                        <?php if (isset($error)): ?>
                                            <div class="alert alert-error" style="margin: 20px;"><?php echo $error; ?></div>
                                        <?php endif; ?>
                                        
                                        <p align="center">The cost of Login Credits is <span style="color: red; font-weight: bold;">$<?php echo $login_cost_per_thousand; ?></span> per 1000 Login Credits.</p>
                                        
                                        <form name="frm1" action="buy_login_credits.php#form_down" method="post" onsubmit="return validateForm()">
                                            <table border="0" cellpadding="10" cellspacing="0" width="100%" align="center" style="border: 1px solid #808080; font-size: 14px;">
                                                <tr class="listtabletoprow">
                                                    <td colspan="3" align="center" class="textbld" bgcolor="#1B476E">
                                                        <font color="#FFFFFF">Buy Login Credits</font>
                                                    </td>
                                                </tr>
                                                
                                                <tr bgcolor="#e9edf6">
                                                    <td width="60%">
                                                        <font size="2">&nbsp;&nbsp;Enter the number of Login Credits to purchase. <br>&nbsp;&nbsp;Note: Please do not enter commas:</font>
                                                    </td>
                                                    <td width="40%">
                                                        <input type="text" name="amount" id="amount" value="" class="TextBoxSmall" maxlength="6" />
                                                    </td>
                                                </tr>
                                                
                                                <tr bgcolor="#d0d7e7">
                                                    <td>
                                                        <font size="2">&nbsp;&nbsp;Payment Type:</font>
                                                    </td>
                                                    <td>
                                                        <select name="pay_meth" class="TextBoxSmall">
                                                            <option value="Credit Card">Credit Card</option>
                                                            <option value="Debit Card">Debit Card</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                
                                                <input type="hidden" name="mode" value="preview" />
                                                
                                                <tr bgcolor="#e9edf6">
                                                    <td>
                                                        <font size="2">&nbsp;&nbsp;Proceed:</font>
                                                    </td>
                                                    <td>
                                                        <input type="submit" name="submit" value="  Preview  " class="formbutton">
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td align="center" colspan="2">
                                                        <img alt="Credit Card Logos" title="Credit Card Logos" src="images/c-cards.svg" width="198" height="28" border="0" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                        
                                        <script>
                                            var minLoginCredits = <?php echo $min_login_credits; ?>;
                                            
                                            function validateForm() {
                                                var amount = document.getElementById('amount').value;
                                                
                                                if (amount === '') {
                                                    alert('Amount is required');
                                                    return false;
                                                }
                                                
                                                if (amount < minLoginCredits) {
                                                    alert('Sorry, the minimum number of Login Credits you can purchase is: ' + minLoginCredits);
                                                    return false;
                                                }
                                                
                                                return true;
                                            }
                                        </script>
                                        
                                    <?php } ?>
                                    
                                    <?php if ($value == 1) { ?>
                                        
                                        <form method="post" action="process-payment.php">
                                            <table border="0" cellpadding="10" cellspacing="0" width="100%" align="center" style="border: 1px solid #808080; font-size: 14px;">
                                                <tr>
                                                    <td colspan="3" align="center" class="textbld" bgcolor="#1B476E">
                                                        <font face="verdana" color="#FFFFFF">Purchase Login Credits For User ID: <?php echo $_SESSION['user']['username'] ?></font>
                                                    </td>
                                                </tr>
                                                
                                                <tr bgcolor="#e9edf6">
                                                    <td width="40%" align="left">
                                                        <font size="2"><?php echo $login_credits; ?> Login Credits @ $<?php echo $login_cost_per_thousand; ?> per 1000 Login Credits</font>
                                                    </td>
                                                    <td width="55%"></td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr bgcolor="#d0d7e7">
                                                    <td width="45%" align="left">
                                                        <font size="2">Total Cost via <?php echo $_POST['pay_meth'] ?></font>
                                                    </td>
                                                    <td>&nbsp;&nbsp;<b>$<?php echo $amount; ?></b></td>
                                                    <td width="60%"></td>
                                                </tr>
                                                
                                                <tr bgcolor="#e9edf6">
                                                    <td colspan="3" align="center">
                                                        <h4 style="color: #1B476E; margin: 10px 0;">Payment Information</h4>
                                                    </td>
                                                </tr>
                                                
                                                <tr bgcolor="#d0d7e7">
                                                    <td width="40%" align="left">
                                                        <span class="barreclair"><label for="card_number">Card Number:</label></span>
                                                    </td>
                                                    <td width="55%">
                                                        <input type="text" name="card_number" value="" placeholder="4111 1111 1111 1111" required>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr bgcolor="#e9edf6">
                                                    <td width="40%" align="left">
                                                        <span class="barreclair"><label for="expiration_date">Expiration Date (MM/YY):</label></span>
                                                    </td>
                                                    <td width="55%">
                                                        <input type="text" name="expiration_date" value="" placeholder="MM/YY" required>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr bgcolor="#d0d7e7">
                                                    <td width="40%" align="left">
                                                        <span class="barreclair"><label for="cvv">CVV:</label></span>
                                                    </td>
                                                    <td width="55%">
                                                        <input type="text" name="cvv" value="" placeholder="123" required>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr bgcolor="#e9edf6">
                                                    <td width="40%" align="left">
                                                        <span class="barreclair"><label for="x_email">Email Address:</label></span>
                                                    </td>
                                                    <td width="55%">
                                                        <input type="email" name="x_email" value="<?php echo $_SESSION['user']['email'] ?>" required />
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr bgcolor="#d0d7e7">
                                                    <td width="40%" align="left">
                                                        <span class="barreclair"><label for="x_first_name">First Name:</label></span>
                                                    </td>
                                                    <td width="55%">
                                                        <input type="text" name="x_first_name" value="<?php echo $_SESSION['user']['firstname'] ?>" required />
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr bgcolor="#e9edf6">
                                                    <td width="40%" align="left">
                                                        <span class="barreclair"><label for="x_last_name">Last Name:</label></span>
                                                    </td>
                                                    <td width="55%">
                                                        <input type="text" name="x_last_name" value="<?php echo $_SESSION['user']['lastname'] ?>" required />
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr bgcolor="#d0d7e7">
                                                    <td width="40%" align="left">
                                                        <span class="barreclair"><label for="x_address">Address:</label></span>
                                                    </td>
                                                    <td width="55%">
                                                        <input type="text" name="x_address" required value="" />
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr bgcolor="#e9edf6">
                                                    <td width="40%" align="left">
                                                        <span class="barreclair"><label for="x_city">City:</label></span>
                                                    </td>
                                                    <td width="55%">
                                                        <input type="text" name="x_city" required value="" />
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr bgcolor="#d0d7e7">
                                                    <td width="40%" align="left">
                                                        <span class="barreclair"><label for="x_state">State:</label></span>
                                                    </td>
                                                    <td width="55%">
                                                        <input type="text" name="x_state" required value="" />
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr bgcolor="#e9edf6">
                                                    <td width="40%" align="left">
                                                        <span class="barreclair"><label for="x_zip">Zip Code:</label></span>
                                                    </td>
                                                    <td width="55%">
                                                        <input type="text" name="x_zip" required value="" />
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr bgcolor="#d0d7e7">
                                                    <td width="40%" align="left">
                                                        <span class="barreclair"><label for="x_country">Country:</label></span>
                                                    </td>
                                                    <td width="55%">
                                                        <input type="text" name="x_country" required value="" />
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr bgcolor="#e9edf6">
                                                    <td width="40%" align="left">
                                                        <span class="barreclair"><label for="u_p_number">Phone Number:</label></span>
                                                    </td>
                                                    <td width="55%">
                                                        <input type="text" name="u_p_number" required value="" />
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                
                                                <!-- Hidden Fields -->
                                                <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
                                                <input type="hidden" name="login_credits" value="<?php echo $login_credits; ?>" />
                                                <input type="hidden" name="pay_meth" value="<?php echo $_POST['pay_meth']; ?>" />
                                                <input type="hidden" name="username" value="<?php echo $_SESSION['user']['username']; ?>" />
                                                
                                                <tr bgcolor="#d0d7e7">
                                                    <td width="40%" align="left"></td>
                                                    <td width="55%">
                                                        <button type="submit" class="formbutton" style="width: 100%; padding: 15px;">Submit Payment</button>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </form>
                                        
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
