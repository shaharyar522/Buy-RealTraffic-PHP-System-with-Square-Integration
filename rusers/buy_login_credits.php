<?
include '../config.php';
require_login();
$title = "$CONFIG->sitename Buy Login Credits";
include("$CONFIG->templatedir/header.php");



$value = 0;


$sql = "SELECT item_name,cost_per_unit, login_cost_per_thousand, vc_log_email, vc_log_security_code, login_cancel_url, login_return_url,paypal_email ,min_traffic_credits ,min_login_credits,merchant_login_id ,merchant_transaction_key,payment_g_type  FROM url_site_setting";
$results = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$row = mysqli_fetch_array($results);
$login_cost_per_thousand = $row['login_cost_per_thousand'];
$cost_per_unit = $row['cost_per_unit'];
$vc_log_email = $row['vc_log_email'];
$vc_log_security_code = $row['vc_log_security_code'];
$vc_cancel_url = $row['login_cancel_url'];
$vc_return_url = $row['login_return_url'];
$vc_paypal_email = $row['paypal_email'];
$vc_item_name = $row['item_name'];




$sql_aa = "SELECT venmo_username  FROM users where id = 1";
$results_aa = mysqli_query($GLOBALS["___mysqli_ston"], $sql_aa);
$row_aa = mysqli_fetch_array($results_aa);
$admin_venmo_username = $row_aa['venmo_username'];




if (isset($_POST['mode'])) {
  $value = "1";
  $login_credits = $_POST['amount'];
  $amount = ($login_credits / 1000) * $login_cost_per_thousand;
  $amount = sprintf("%.2f", $amount);
  $_SESSION['login_credits_purchased'] = $login_credits;
  $payza_button = '';
  $select_form = "SELECT * FROM url_merchants  WHERE merchant_name = 'Login Credits' ";
  $result_form = mysqli_query($GLOBALS["___mysqli_ston"], $select_form) or die(mysqli_error($GLOBALS["___mysqli_ston"]) . $select_form);
  while ($row_form = mysqli_fetch_array($result_form)) {
    if ($row_form['merchant_name'] == 'Login Credits') {
      $payza_button = stripcslashes($row_form['merchant_form']);
    }
  }

  $payza_button = str_replace('[amount]', $amount, $payza_button);
  $payza_button = str_replace('[login_quantity]', $login_credits, $payza_button);
  $payza_button = str_replace('[login_quantity1]', $login_credits, $payza_button);
  $payza_button = str_replace('[buyer_stp_fromDB]', $_SESSION['SESSION']['user']['solidtrustpay'], $payza_button);
  $payza_button = str_replace('[username]', $_SESSION['SESSION']['user']['username'], $payza_button);
  $payza_button = str_replace('[user_id]', $_SESSION['SESSION']['user']['username'], $payza_button);
  $payza_button = str_replace('[first_name]', $_SESSION['SESSION']['user']['firstname'], $payza_button);
  $payza_button = str_replace('[last_name]', $_SESSION['SESSION']['user']['lastname'], $payza_button);
  $payza_button = str_replace('[login_payer_email]', $_SESSION['SESSION']['user']['email'], $payza_button);
  $payza_button = str_replace('[login_purchase_date]', date("Y-m-d H:i:s"), $payza_button);

  $payza_button = str_replace('[login_processor]', "SolidTrustPay", $payza_button);

  $payza_button = str_replace('[login_item_name]', $vc_item_name, $payza_button);
  $payza_button = str_replace('[login_item_name1]', $vc_item_name, $payza_button);
  $payza_button = str_replace('[login_return_url]', $vc_return_url, $payza_button);
  $payza_button = str_replace('[login_cancel_url]', $vc_cancel_url, $payza_button);
  $payza_button = str_replace('[vc_log_sec_code]', $vc_log_security_code, $payza_button);
  $payza_button = str_replace('[admin_email]', $vc_paypal_email, $payza_button);
} else {

  $value = "0";
}



?>
<br>
<div id="form_down">

</div>

<table align="center" class="shadowed" valign=top width="100%" height="0" bgcolor=#d8ecff cellpadding="10" cellspacing="0" border="0" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>

  <tr>
    <td>
      <br>
      <table align="center" class="shadowed" valign=top width="100%" height="0" bgcolor=#d8ecff cellpadding="10" cellspacing="0" border="1" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>

        <tr>
          <td align="center">


            <center>
              <h3>Buy Login Credits</h3>
            </center>

            <br><br>









            <div id="column_w610" style="width:100%">
              <? if ($value == 0) { ?>

                <p align="center"><b>
                    <div class="header_01" align=center> User ID: <? echo $_SESSION['user']['username'] ?> - Buy Login Credits
                      <br>

                      <!-- <br><font color="red">COMING SOON!</font> -->

                    </div>
                  </b></p>

                <!-- <p align="center">Your total Unassigned login credites: </p> -->
                <p align="center"> The cost of Login Credits is <span style="color: red; font-weight: bold;">$<? echo $login_cost_per_thousand; ?></span> per 1000 Login Credits.</p>

                <p align="center">
                  <font color=red></font>
                </p>

                <form name="frm1" action="buy_login_credits.php#form_down" method="post" onsubmit="return validateForm()">
                  

                  <table border="0" cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">

                    <tr class="listtabletoprow">
                      <td colspan="3" align="center" class='textbld' bgcolor="#1B476E">
                        <font color="#FFFFFF">Buy Login Credits</font>
                      </td>
                    </tr>

                    <tr bgcolor="#e9edf6">
                      <td width="60%">
                        <font size="2">&nbsp;&nbsp;Enter the number of Login Credits to purchase. <br>&nbsp;&nbsp;Note: Please do not enter commas:</font>
                      </td>

                      <td width="40%"><input type="text" name="amount" id="amount" value="" class="TextBoxSmall" maxlength="5" /></td>
                    </tr>

                    <tr bgcolor="#d0d7e7">
                      <td>
                        <font size="2">&nbsp;&nbsp;Payment Type:</font>
                      </td>
                      <td>
                        <select name="pay_meth" class="TextBoxSmall">
                          <!--  <option value="PayPal">PayPal</option>        -->
                          <!-- <option value="SolidTrustPay">SolidTrustPay</option>-->
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
                      <td><input type="submit" name="submit" value="  Preview  " class="formbutton"></td>
                    </tr>




                    <tr>
                      <td align=center colspan=100%>


            </div>



            <img alt="Credit Card Logos" title="Credit Card Logos" src="/images/c-cards.gif" width="198" height="28" border="0" />


          </td>
        </tr>




      </table>
      </form>

      <script>
        var minLoginCredits = <?php echo $row['min_login_credits']; ?>;

        function validateForm() {
          var amount = document.getElementById('amount').value;


          // Reset error messages
          //document.getElementById('nameError').innerHTML = '';
          //document.getElementById('emailError').innerHTML = '';

          // Validate name
          if (amount === '') {
            alert('amount is required');
            return false; // Prevent form submission
          }


          if (amount < minLoginCredits) {
            alert('Sorry, the minimum number of Login Credits you can purchase is : ' + minLoginCredits);
            return false; // Prevent form submission
          }


          return true;
        }
      </script>


      <?
              }

              if ($value == 1) {
      ?>


      <form action="https://secure.payza.com/checkout" method="post" name="payment"></form>

      <table border="0" cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">
        <tr>

          <td colspan="3" align="center" class='textbld' bgcolor="#1B476E">
            <font face="verdana" color="#FFFFFF">Purchase Login Credits For User ID: <? echo $_SESSION['user']['username'] ?> </font>
          </td>
        </tr>

        <tr bgcolor="#e9edf6" colspan="3">

          <td width="40%" align="left">
            <font size="2"><? echo $login_credits; ?> Login Credits @ $<? echo $login_cost_per_thousand; ?> per 1000 Login Credits </font>
          </td>


          <td width="55%"></td>
          <td></td>
        </tr>

        <tr bgcolor="#d0d7e7">

          <td width="45%" align="left">
            <font size="2">Total Cost via <? echo $_REQUEST['pay_meth'] ?> </font>
          </td>
          <td>&nbsp;&nbsp;<b>$<? echo $amount; ?></b> </td>
          <td width="60%"></td>
        </tr>

        <!-- </table>   -->
        <input type="hidden" name="mode" value="payment" />
        <!--  <table border="0"  cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">  -->
        <tr bgcolor="#e9edf6" colspan=7>
          <td colspan="3" align="center">
            <? echo $payza_button; ?>



            <form method="post" action="https://www.buy-realtraffic.com/process-payment.php">
        <tr bgcolor="#e9edf6" colspan="3">
          <td width="40%" align="left"><span class="barreclair"> <label for="card_number">Card Number:</label>:</span>
          </td>
          <td width="55%"><input type="text" name="card_number" value="4111111111111111" required></td>
          <td></td>
        </tr>
        <tr bgcolor="#d0d7e7" colspan="3">
          <td width="40%" align="left"><span class="barreclair"> <label for="expiration_date">Expiration Date (MM/YY):</label>:</span>
          </td>
          <td width="55%"><input type="text" name="expiration_date" value="12/24" placeholder="MM/YY" required>

          </td>
          <td></td>
        </tr>
        <tr bgcolor="#e9edf6" colspan="3">
          <td width="40%" align="left"><span class="barreclair"> <label for="cvv">CVV:</label>:</span>
          </td>
          <td width="55%"><input type="text" name="cvv" value="852" required></td>
          <td>
            <input type="hidden" name="amount" value="<? echo $amount; ?>" readonly required>
            <input type="hidden" name="item_id" value="<? echo $login_credits; ?> Login Credits @ $<? echo $login_cost_per_thousand; ?> per 1000 Traffic Credits" />
            <input type="hidden" name="user9" value="1" />
            <input type="hidden" name="page_name" value="buy_login_credits" />
            <input type="hidden" name="payerAccount" value="<? echo $_SESSION['user']['email'] ?>" />
            <input type="hidden" name="user5" value="<? echo $_SESSION['user']['username'] ?>" />
            <input type="hidden" name="user1" value="<? echo $login_credits; ?>" />
            <input type="hidden" name="user2" value="Login Credits" />
            <input type="hidden" name="user3" value="<? echo $_SESSION['user']['username'] ?>" />
            <input type="hidden" name="user4" value="<? echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']  ?>" />
            <input type="hidden" name="user8" value="Authorize.Net" />
            <input type="hidden" name="user7" value="<? echo date('Y-m-d H:i:s'); ?>" />
            <input type="hidden" name="merchant_login_id" value="<? echo $row['merchant_login_id']; ?>" />
            <input type="hidden" name="merchant_transaction_key" value="<? echo $row['merchant_transaction_key']; ?>" />
            <input type="hidden" name="payment_g_type" value="<? echo $row['payment_g_type']; ?>" />


            <input type=hidden name="return_url" value="https://www.buy-realtraffic.com/rusers/thank_you.php" />

          </td>
        </tr>
        <tr bgcolor="#d0d7e7" colspan="3">
          <td width="40%" align="left"><span class="barreclair"> <label for="x_email">Email Address:</label>:</span>
          </td>
          <td width="55%"><input type="text" name="x_email" value="<? echo $_SESSION['user']['email'] ?>" /></td>
          <td></td>
        </tr>
        <tr bgcolor="#e9edf6" colspan="3">
          <td width="40%" align="left"><span class="barreclair"> <label for="x_first_name">First Name:</label>:</span>
          </td>
          <td width="55%"><input type="text" name="x_first_name" value="<? echo $_SESSION['user']['firstname']  ?>" /></td>
          <td></td>
        </tr>
        <tr bgcolor="#d0d7e7" colspan="3">
          <td width="40%" align="left"><span class="barreclair"> <label for="x_last_name">Last Name:</label>:</span>
          </td>
          <td width="55%"><input type="text" name="x_last_name" value="<? echo $_SESSION['user']['lastname']  ?>" />
          </td>
          <td></td>
        </tr>
        <tr bgcolor="#e9edf6" colspan="3">
          <td width="40%" align="left"><span class="barreclair"> <label for="x_address">Address:</label>:</span>
          </td>
          <td width="55%"><input type="text" name="x_address" required value="" /></td>
          <td></td>
        </tr>
        <tr bgcolor="#d0d7e7" colspan="3">
          <td width="40%" align="left"><span class="barreclair"> <label for="x_city">City:</label>:</span>
          </td>
          <td width="55%"><input type="text" name="x_city" required value="" /></td>
          <td></td>
        </tr>
        <tr bgcolor="#e9edf6" colspan="3">
          <td width="40%" align="left"><span class="barreclair"> <label for="x_state">State:</label>:</span>
          </td>
          <td width="55%"><input type="text" name="x_state" required value="" /></td>
          <td></td>
        </tr>
        <tr bgcolor="#d0d7e7" colspan="3">
          <td width="40%" align="left"><span class="barreclair"> <label for="x_zip">Zip Code:</label>:</span>
          </td>
          <td width="55%"><input type="text" name="x_zip" required value="" /></td>
          <td></td>
        </tr>
        <tr bgcolor="#e9edf6" colspan="3">
          <td width="40%" align="left"><span class="barreclair"> <label for="x_country">Country:</label>:</span>
          </td>
          <td width="55%"><input type="text" name="x_country" required value="" /></td>
          <td></td>
        </tr>
        <tr bgcolor="#d0d7e7" colspan="3">
          <td width="40%" align="left"><span class="barreclair"> <label for="p_number">Phone Number:</label>:</span>
          </td>
          <td width="55%"><input type="text" name="u_p_number" required value="" />
          </td>
          <td></td>
        </tr>

        <tr bgcolor="#e9edf6" colspan="3">
          <td width="40%" align="left">
          </td>
          <td width="55%"><button type="submit">Submit Payment</button>
          </td>
          <td></td>
        </tr>

        </form>

      </table>
















      <!--
<form method="post" action="https://www.buy-realtraffic.com/process-payment.php"">
        <label for="card_number">Card Number:</label>
        <input type="text" name="card_number" value="4111111111111111" required><br>

        <label for="expiration_date">Expiration Date (MM/YY):</label>
        <input type="text" name="expiration_date" value ="12/24" placeholder="MM/YY" required><br>

        <label for="cvv">CVV:</label>
        <input type="text" name="cvv" value = "852" required><br>

        
        <input type="hidden" name="amount" value="<? echo $amount; ?>" readonly required><br>
        
        <input type=hidden name="item_id" value="<? echo $login_credits; ?> Traffic Credits @ $<? echo $login_cost_per_thousand; ?> per 1000 Traffic Credits" />
        <input type=hidden name="user9" value="1" /> 
        <input type=hidden name="page_name" value="buy_login_credits" /> 
        <input type=hidden name="user5" value="<? echo $_SESSION['user']['username'] ?>" />
        <input type=hidden name="user1" value="<? echo $login_credits; ?>" />
        <input type=hidden name="user2" value="Traffic Credits" />
        
        <input type=hidden name="user3" value="<? echo $_SESSION['user']['username'] ?>" />
        <input type=hidden name="user4" value="<? echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']  ?>" />
        <input type=hidden name="user8" value="Authorize.Net" />
        <input type="hidden" name="user7" value="<? echo date('Y-m-d H:i:s'); ?>" />
        
        <input type="hidden" name="payerAccount" value="<? echo $_SESSION['user']['email'] ?>" />
        
        <input type="hidden" name="api_login_id" value="9CkP6L3dH">
        <input type="hidden" name="transaction_key" value="9Dy5n3wJ3Q7tu49a">
        
        <input type=hidden name="return_url" value="https://www.buy-realtraffic.com/rusers/thank_you.php" />
        

        <button type="submit">Submit Payment</button>
    </form>

-->









      <!--
<table border="0"  cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">
<tr class="listtabletoprow">
      <td colspan="3" align="center" class='textbld' bgcolor="#1B476E"><font color="#FFFFFF">Please Follow The Steps Below</font></td>

</td></tr>

<tr bgcolor="#e9edf6">  <td>
<br>
1)  <a href = https://www.venmo.com target= _blank>Click Here</a> And Log Into Your Venmo Account.  
On the left side navigation, click on the Pay button. 
<br></td></tr>
  <tr bgcolor="#d0d7e7"><td>

<br>
2)  In the amount field, enter the Amount: <b> $<?php //echo  $login_credits * $login_cost_per_thousand / 100  ;   

                                                echo  number_format((float)$login_credits * $login_cost_per_thousand / 100, 2, '.', '');
                                                ?>  </b>
<br>

<tr bgcolor="#e9edf6"> <br><td><br>
3)  Copy the Admin's Venmo username <b><?php echo $admin_venmo_username;  //echo $_SESSION['user']['venmo_username'] 
                                        ?></b> and paste it into the "To" field.
<br>

</td></tr>
  <tr bgcolor="#d0d7e7"><td><br>
4)  Copy this Note:  <b> <? echo $login_credits; ?>  Login Credits For User:  <? echo $_SESSION['user']['username'] ?> (<? echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] ?>)</b> and paste it into the "Note" field and click the Pay button.  Once you have 
completed your payment to the admin, come back to this page and click the "Continue" button below.
<br>
</td></tr>
<tr bgcolor="#e9edf6"><td><br>
<center><a href =/rusers/thank_you.php><img src=/images/continue.png></a></center>
<br>
</td></tr></table>
-->


      </form>

      <? } ?>

      </div>

    </td>
  </tr>
</table>



</td>
</tr>


<tr>
  <td>



  </td>
</tr>

</table>

<?
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>