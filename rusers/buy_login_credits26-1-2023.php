<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Buy Login Credits";
include("$CONFIG->templatedir/header.php");



$value=0;

//echo "<pre>";  print_r($_SESSION['SESSION']['user']['firstname']);

//$page_content=read_template("$CONFIG->templatedir/buy_login_credits.php");



$sql = "SELECT item_name,cost_per_unit, login_cost_per_hundred, vc_log_email, vc_log_security_code, login_cancel_url, login_return_url,paypal_email  FROM url_site_setting";
$results = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$row = mysqli_fetch_array($results);
$login_cost_per_hundred = $row['login_cost_per_hundred'];
$cost_per_unit = $row['cost_per_unit'];
 $vc_log_email = $row['vc_log_email'];
 $vc_log_security_code = $row['vc_log_security_code'];
 $vc_cancel_url = $row['login_cancel_url'];
 $vc_return_url = $row['login_return_url'];
 $vc_paypal_email=$row['paypal_email'];
 $vc_item_name=$row['item_name'];








if (isset($_POST['mode'])) {
	$value = "1";
	$login_credits = $_POST['amount'];
	$amount = ($login_credits / 100) * $login_cost_per_hundred; 
        $amount = sprintf ("%.2f", $amount);
	//$smarty->assign("amount", sprintf ("%.2f", $amount));
	//$smarty->assign("login_credits", $login_credits);
	$_SESSION['login_credits_purchased'] = $login_credits;

  $payza_button = '';

     $select_form = "SELECT * FROM url_merchants  WHERE merchant_name = 'Login Credits' ";
 //     $select_form = "SELECT * FROM url_merchants  WHERE merchant_name = 'forsolidtrustpay' ";



    $result_form = mysqli_query($GLOBALS["___mysqli_ston"], $select_form) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$select_form); 
    
    while ($row_form = mysqli_fetch_array($result_form)) {

    	if ($row_form['merchant_name'] == 'Login Credits') {
    		
    		$payza_button = stripcslashes($row_form['merchant_form']);
    		//$smarty->assign("payza_button", $row_form['merchant_form']);
    	}
    } 
    //$payza_amount = $login_cost_per_hundred / 100;
    $payza_button = str_replace('[amount]', $amount, $payza_button);
	$payza_button = str_replace('[login_quantity]', $login_credits, $payza_button);
	$payza_button = str_replace('[login_quantity1]', $login_credits, $payza_button);

	$payza_button = str_replace('[buyer_stp_fromDB]',$_SESSION['SESSION']['user']['solidtrustpay'], $payza_button);


	$payza_button = str_replace('[username]', $_SESSION['SESSION']['user']['username'], $payza_button);
	$payza_button = str_replace('[user_id]', $_SESSION['SESSION']['user']['username'], $payza_button);

	$payza_button = str_replace('[first_name]', $_SESSION['SESSION']['user']['firstname'], $payza_button);
	$payza_button = str_replace('[last_name]', $_SESSION['SESSION']['user']['lastname'], $payza_button);
	$payza_button = str_replace('[login_payer_email]', $_SESSION['SESSION']['user']['email'], $payza_button);

	$payza_button = str_replace('[login_purchase_date]', date("Y-m-d H:i:s"), $payza_button);
	/* $payza_button = str_replace('[login_processor]', "PayPal", $payza_button); */
        $payza_button = str_replace('[login_processor]', "SolidTrustPay", $payza_button);

	$payza_button = str_replace('[login_item_name]', $vc_item_name, $payza_button);
	$payza_button = str_replace('[login_item_name1]', $vc_item_name, $payza_button);
        $payza_button = str_replace('[login_return_url]', $vc_return_url, $payza_button);
	$payza_button = str_replace('[login_cancel_url]', $vc_cancel_url, $payza_button);

	$payza_button = str_replace('[vc_log_sec_code]', $vc_log_security_code, $payza_button);
	$payza_button = str_replace('[admin_email]', $vc_paypal_email, $payza_button);


}else{

	$value = "0";

}
	








?>
<br>
<table align="center" class="shadowed" valign=top width="100%" height="0" bgcolor=#d8ecff cellpadding="10" cellspacing="0" border="0" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>   

<tr><td>
<br>
<table align="center" class="shadowed" valign=top width="100%" height="0" bgcolor=#d8ecff cellpadding="10" cellspacing="0" border="1" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>   



<tr><td align="center">
<br>
<center><h3>Buy Login Credits</h3></center>



<br><br>


<div id="column_w610" style="width:100%">
<? if ($value== 0){ ?>

   <p align="center"><b><div class="header_01" align=center> User ID: <? echo $_SESSION['SESSION']['user']['username'] ?>  - Buy Login Credits 
<br>

<!-- <br><font color="red">COMING SOON!</font> -->

</div></b></p>

      <!-- <p align="center">Your total Unassigned login credites: </p> -->
      <p align="center"> The cost of Login Credits is <span style="color: red; font-weight: bold;">$<? echo $login_cost_per_hundred; ?></span> per 100 Login Credits.</p> 
   
        <p align="center"><font color=red></font></p>
  
       <form name="frm1" action="buy_login_credits.php" method="post">     

          <table border="0"  cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">
            
             <tr class="listtabletoprow">
		        <td colspan="3" align="center" class='textbld' bgcolor="#1B476E"><font color="#FFFFFF">Buy Login Credits</font></td>
 	         </tr>       

             <tr bgcolor="#e9edf6">        <td width="60%"><font size="2">&nbsp;&nbsp;Enter the number of Login Credits to purchase. <br>&nbsp;&nbsp;Note: Please do not enter commas:</font></td>

  <td width="40%"><input type="text" name="amount" value="" class="TextBoxSmall" maxlength="5"/></td>
             </tr> 

             <tr bgcolor="#d0d7e7">
              <td><font size="2">&nbsp;&nbsp;Payment Method:</font></td>
              <td>
                  <select name="pay_meth" class="TextBoxSmall">
                <!--  <option value="PayPal">PayPal</option>        -->
                     <!-- <option value="SolidTrustPay">SolidTrustPay</option>-->
 <option value="Venmo">Venmo</option>

                  </select>
              </td>
            </tr>

            <input type="hidden" name="mode" value="preview" />

           <tr bgcolor="#e9edf6">    <td><font size="2">&nbsp;&nbsp;Proceed:</font></td>
               <td><input type="submit" name="submit" value="  Preview  " class="formbutton"></td>
           </tr>        

          </table>
         </form> 

<?
}

if ($value == 1){
?>
      <form action="https://secure.payza.com/checkout" method="post" name="payment"></form>    

       <table border="0" cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">
         <tr>      

             <td colspan="3" align="center" class='textbld' bgcolor="#1B476E"><font face="verdana" color="#FFFFFF">Purchase Login Credits For User ID: <? echo $_SESSION['SESSION']['user']['username'] ?> </font></td>
         </tr>            

         <tr bgcolor="#e9edf6" colspan="3">     

            <td width="40%" align="left"><font size="2"><? echo $login_credits; ?> Login Credits @ $<? echo $login_cost_per_hundred; ?> per 100 Login Credits </font></td>
          

  <td width="55%"></td>     <td></td>  </tr>

         <tr bgcolor="#d0d7e7">      

             <td width="45%" align="left"><font size="2">Total Cost via <? echo $_REQUEST['pay_meth'] ?> </font></td>
             <td>&nbsp;&nbsp;<b>$<? echo $amount; ?></b> </td>
  <td width="60%"></td>      </tr> 

<!-- </table>   -->   
        <input type="hidden" name="mode" value="payment" />
      <!--  <table border="0"  cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">  -->
       <tr bgcolor="#e9edf6" colspan=7>                   
               <td colspan="3" align="center">
<? echo $payza_button; ?>
<!-- <input type="submit" name="submit" value="  Proceed  " class="formbutton"> -->
</td></tr></table>
       

 </form> 
<? } ?>

</div>

   </td>
        </tr>
      </table>






















</td>
        </tr>









<tr><td>






















</td></tr>




      </table>

<?
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>