<?
/* genlib.php (c) 2003 esbhost.com
 *DO NOT EDIT BELOW
  */
function login_ok() {
	global $_SESSION, $REMOTE_ADDR;
	return isset($_SESSION)
		&& isset($_SESSION["user"])
		&& isset($_SESSION["ip"])
		;
}
function login_ok_admin() {
	global $_SESSION['ADMIN'], $REMOTE_ADDR;
	return isset($_SESSION['ADMIN'])
		&& isset($_SESSION['ADMIN']["admin"])
		&& isset($_SESSION['ADMIN']["ip"])
		;
}
function require_login() {
	global $CONFIG, $_SESSION;
	if (! login_ok()) {
		$_SESSION["wantsurl"] = my_name_long();
	redirect("$CONFIG->siteurl/login.php","",0);

	}

}
function require_login_admin() {
	global $CONFIG, $_SESSION['ADMIN'];
	if (! login_ok_admin()) {
		$_SESSION['ADMIN']["wantsurl"] = my_name_long();
	redirect("$CONFIG->siteurl/radmin/index.php","",0);

	}
	}
function username_exists($username) {
	$query= db_query("SELECT 1 FROM users WHERE username = '$username'");
	return db_num_rows($query);
}

function email_exists($email) {
	$query= db_query("SELECT 1 FROM users WHERE email = '$email'");
	return db_num_rows($query);
}

function validate_email($str){
        $str = strtolower($str);
        if(preg_match("/^([^[:space:]]+)@(.+)\.(ad|ae|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|cr|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|fi|fj|fk|fm|fo|fr|fx|ga|gb|gov|gd|ge|gf|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nato|nc|ne|net|biz|info|nf|ng|ni|nl|no|np|nr|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$/i",$str)){
        return 1;
        } else {
        return 0;
        }
        }
function add_paypal($cat,$ce,$inapoi)
{global $CONFIG;
if($inapoi=='1'){$inapoi=$CONFIG->primu;}
if($inapoi=='2'){$inapoi=$CONFIG->adminul;}
if($inapoi=='3'){$inapoi=$CONFIG->complete;}
if($inapoi=='6'){$inapoi=$CONFIG->add2;}
if($inapoi=='7'){$inapoi=$CONFIG->add5;}
if($inapoi=='8'){$inapoi=$CONFIG->add10;}
if($inapoi=='9'){$inapoi=$CONFIG->add15;}
if($inapoi=='10'){$inapoi=$CONFIG->add25;}
if($inapoi=='11'){$inapoi=$CONFIG->add50;}
if($inapoi=='12'){$inapoi=$CONFIG->add100;}
if($inapoi=='13'){$inapoi=$CONFIG->add250;}



/*

$text="
<form action='https://www.alertpay.com/PayProcess.aspx' method='post'>
<input type='hidden' name='ap_purchasetype' value='Item'>
<input type='hidden' name='ap_merchant' value='mdr1463@yahoo.com'>
<input type='hidden'  name='ap_itemname' value='$CONFIG->paymentnote\'>
<input type='hidden'  name='ap_currency' value='USD'>
<input type='hidden'  name='ap_returnurl' value='$inapoi\'>
<input type='hidden'  name='ap_cancelurl' value='$CONFIG->siteurl\'>
<input type='hidden' name='ap_description' value='$CONFIG->paymentnote\'>
<input type='hidden'  name='ap_amount' value='$cat\'>
<input type='image' src='https://www.alertpay.com/images/BuyNow/big_pay_01.gif'></form>
";

*/






/*
$text='
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business" value="admin@ez-moneymaker.com">

    <!-- Specify a Subscribe button. -->
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <!-- Identify the subscription. -->
    <input type="hidden" name="item_name" value='.$CONFIG->paymentnote.'>
    <input type="hidden" name="item_number" value="DIG Weekly">

    <!-- Set the terms of the regular subscription. -->
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="a3" value='.$CONFIG->sponsorfee.'>
    <input type="hidden" name="p3" value="1">
             <input type="hidden" name="t3" value="Y"> 


    <input type="hidden" name="cbt" value="Return to MY WEBSITE NAME">
    <input type="hidden" name="cancel_return" value='.$CONFIG->siteurl.'>
    <input type="hidden" name="notify_url" value='.$inapoi.'>



    <!-- Set recurring payments until canceled. -->
    <input type="hidden" name="src" value="1">

    <!-- Display the payment button. -->
                                       <!--  <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="Subscribe">
    <img alt="" width="1" height="1"
    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >        -->
    
    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

    
</form>
';


*/



/*
$text='
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
<!-- <input type="hidden" name="business" value="business_accc@gmail.com">  -->
     <input type="hidden" name="business" value='. $CONFIG->support.'>

 

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value='.$CONFIG->paymentnote.'>
  <input type="hidden" name="amount" value='.$CONFIG->sponsorfee.'>
  <input type="hidden" name="currency_code" value="USD">
  
      <input type="hidden" name="cbt" value="Return to MY WEBSITE NAME">
    <input type="hidden" name="cancel_return" value='.$CONFIG->siteurl.'>
    <input type="hidden" name="notify_url" value='.$inapoi.'>
  

  <!-- Display the payment button. -->
 <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

</form>';

*/

$text='
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
<!-- <input type="hidden" name="business" value="business_accc@gmail.com">  -->
     <input type="hidden" name="business" value='.$ce.'>

 

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value='.$CONFIG->paymentnote.'>
  <input type="hidden" name="amount" value='.$cat.'>
  <input type="hidden" name="currency_code" value="USD">
  
  
  <input name="custom" value='.$CONFIG->paymentnote.' type="hidden">
  
      <input type="hidden" name="cbt" value='.$inapoi.'>
    <input type="hidden" name="cancel_return" value='.$CONFIG->siteurl.'>
    <input type="hidden" name="notify_url" value='.$inapoi.'>
  

  <!-- Display the payment button. -->
 <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

</form>';










return codare_output($text);
}

function add_stormpay($cat,$ce,$inapoi)
{
global $CONFIG;
if($inapoi=='1'){$inapoi=$CONFIG->primu;}
if($inapoi=='2'){$inapoi=$CONFIG->adminul;}
if($inapoi=='3'){$inapoi=$CONFIG->complete;}
if($inapoi=='6'){$inapoi=$CONFIG->add2;}
if($inapoi=='7'){$inapoi=$CONFIG->add5;}
if($inapoi=='8'){$inapoi=$CONFIG->add10;}
if($inapoi=='9'){$inapoi=$CONFIG->add15;}
if($inapoi=='10'){$inapoi=$CONFIG->add25;}
if($inapoi=='11'){$inapoi=$CONFIG->add50;}
if($inapoi=='12'){$inapoi=$CONFIG->add100;}
if($inapoi=='13'){$inapoi=$CONFIG->add250;}
$text="
  <form action='https://www.alertpay.com/PayProcess.aspx' method='post'>
  <input type='hidden' name='ap_purchasetype' value='Item'>
  <input type=hidden name='ap_merchant' value=\"$ce\">
  <input type=hidden name=ap_itemname value=\"$CONFIG->paymentnote\">
  <input type=hidden name=ap_amount value=\"$cat\">
  <input type='hidden'  name='ap_currency' value='USD'>
  <input type=hidden name=ap_returnurl value=\"$inapoi\">
  <input type=hidden name=ap_cancelurl value=\"$CONFIG->siteurl\">
  <input type=hidden name=ap_description value=\"$CONFIG->paymentnote\">
  <input type=image src=\"https://www.alertpay.com/images/BuyNow/big_pay_01.gif\">
</form>
";
return codare_output($text);
}
function add_egold($cat,$ce,$inapoi)
{
global $CONFIG;
if($inapoi=='1'){$inapoi=$CONFIG->primu;}
if($inapoi=='2'){$inapoi=$CONFIG->adminul;}
if($inapoi=='3'){$inapoi=$CONFIG->complete;}
if($inapoi=='6'){$inapoi=$CONFIG->add2;}
if($inapoi=='7'){$inapoi=$CONFIG->add5;}
if($inapoi=='8'){$inapoi=$CONFIG->add10;}
if($inapoi=='9'){$inapoi=$CONFIG->add15;}
if($inapoi=='10'){$inapoi=$CONFIG->add25;}
if($inapoi=='11'){$inapoi=$CONFIG->add50;}
if($inapoi=='12'){$inapoi=$CONFIG->add100;}
if($inapoi=='13'){$inapoi=$CONFIG->add250;}
$text="
<form action=\"https://www.e-gold.com/sci_asp/payments.asp\" method=\"POST\" target=_blank>
<div align=\"center\">
<input type=\"hidden\" name=\"PAYEE_ACCOUNT\" value=\"$ce\">
<input type=\"hidden\" name=\"PAYEE_NAME\" value=\"$CONFIG->paymentnote\">
<input type=hidden name=\"PAYMENT_AMOUNT\" value=\"$cat\">
<input type=hidden name=\"PAYMENT_UNITS\" value=1>
<input type=hidden name=\"PAYMENT_METAL_ID\" value=1>
<input type=\"hidden\" name=\"NOPAYMENT_URL\" value=\"$CONFIG->siteurl\">
<input type=\"hidden\" name=\"NOPAYMENT_URL_METHOD\" value=\"LINK\">
<input type=\"hidden\" name=\"PAYMENT_URL\" value=\"$inapoi\">
<input type=\"hidden\" name=\"PAYMENT_URL_METHOD\" value=\"LINK\">
<input type=\"hidden\" name=\"BAGGAGE_FIELDS\" value=\"CUSTOMERID\">
<input type=\"hidden\" name=\"CUSTOMERID\" value=\"2490\">
<input type=\"hidden\" name=\"SUGGESTED_MEMO\" value=\"$CONFIG->paymentnote\">
<input type=\"image\" border=\"0\" src=\"https://www.e-gold.com/gif/logo.gif\" width=\"88\" height=\"31\" name=\"egold\" alt=\"Pay Via E-gold Here\" target=_self>
</div></form>
";
return codare_output($text);

}

function add_libertyreserve($cat,$ce,$inapoi)
{global $CONFIG;
$item_numer=rand(100000,999999);
if($inapoi=='1'){$inapoi=$CONFIG->primu."&";}
if($inapoi=='2'){$inapoi=$CONFIG->adminul."&";}
if($inapoi=='3'){$inapoi=$CONFIG->complete."?when=now&";}
if($inapoi=='6'){$inapoi=$CONFIG->add2."&";}
if($inapoi=='7'){$inapoi=$CONFIG->add5."&";}
if($inapoi=='8'){$inapoi=$CONFIG->add10."&";}
if($inapoi=='9'){$inapoi=$CONFIG->add15."&";}
if($inapoi=='10'){$inapoi=$CONFIG->add25."&";}
if($inapoi=='11'){$inapoi=$CONFIG->add50."&";}
if($inapoi=='12'){$inapoi=$CONFIG->add100."&";}
if($inapoi=='13'){$inapoi=$CONFIG->add250."&";}
$text="<form action=\"https://sci.libertyreserve.com\" method=\"POST\">
<p align=\"center\">
<input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
<input type=\"hidden\" name=\"lr_acc\" value=\"$ce\">
<input type=\"hidden\" name=\"lr_success_url\" value=\"$inapoi\">
<input type=\"hidden\" name=\"lr_fail_url\" value=\"$CONFIG->siteurl\">
<input type=\"hidden\" name=\"lr_store\" value=\"$item_number\">
<input type=\"hidden\" name=\"lr_comments\" value=\"$CONFIG->paymentnote\">
<input type=\"hidden\" name=\"METHOD\" value=\"POST\">
<input type=\"hidden\" name=\"lr_currency\" value=\"LRUSD\">
<input type=\"hidden\" name=\"lr_amnt\" value=\"$cat\">
<input type=submit name=\"cartImage\" value=\"Pay with libertyreserve.com\">
</form>
";
return codare_output($text);

}
function add_assuredpay($cat,$ce,$inapoi)
{
global $CONFIG;
if($inapoi=='1'){$inapoi=$CONFIG->primu;}
if($inapoi=='2'){$inapoi=$CONFIG->adminul;}
if($inapoi=='3'){$inapoi=$CONFIG->complete;}
if($inapoi=='6'){$inapoi=$CONFIG->add2;}
if($inapoi=='7'){$inapoi=$CONFIG->add5;}
if($inapoi=='8'){$inapoi=$CONFIG->add10;}
if($inapoi=='9'){$inapoi=$CONFIG->add15;}
if($inapoi=='10'){$inapoi=$CONFIG->add25;}
if($inapoi=='11'){$inapoi=$CONFIG->add50;}
if($inapoi=='12'){$inapoi=$CONFIG->add100;}
if($inapoi=='13'){$inapoi=$CONFIG->add250;}
$text="<FORM action=\"https://assuredpay.com/handle.php\" method=\"post\">
	<input type=hidden name=\"generic\" value=\"1\">
	<input type=hidden name=\"receiver\" value=\"$ce\">
	<input type=hidden name=\"amount\" value=\"$cat\">
	<input type=hidden name=\"item_name\" value=\"$CONFIG->paymentnote\">
	<input type=hidden name=\"return_url\" value=\"$inapoi\">
	<input type=hidden name=\"notify_url\" value=\"\">
	<input type=hidden name=\"cancel_url\" value=\"$CONFIG->siteurl\">
	<input type=image name=\"cartImage\" src=\"https://assuredpay.com/deskpay/img/buttons/buttons_buynow3.gif\">
</form>
";
return codare_output($text);

}
function add_fleetpay($cat,$ce,$inapoi)
{
global $CONFIG;
if($inapoi=='1'){$inapoi=$CONFIG->primu;}
if($inapoi=='2'){$inapoi=$CONFIG->adminul;}
if($inapoi=='3'){$inapoi=$CONFIG->complete;}
if($inapoi=='6'){$inapoi=$CONFIG->add2;}
if($inapoi=='7'){$inapoi=$CONFIG->add5;}
if($inapoi=='8'){$inapoi=$CONFIG->add10;}
if($inapoi=='9'){$inapoi=$CONFIG->add15;}
if($inapoi=='10'){$inapoi=$CONFIG->add25;}
if($inapoi=='11'){$inapoi=$CONFIG->add50;}
if($inapoi=='12'){$inapoi=$CONFIG->add100;}
if($inapoi=='13'){$inapoi=$CONFIG->add250;}
$text="<FORM action=\"http://www.fleetpay.com/handle.php\" method=\"post\">
	<input type=hidden name=\"merchantAccount\" value=\"$ce\">
	<input type=hidden name=\"amount\" value=\"$cat\">
	<input type=hidden name=\"item_id\" value=\"$CONFIG->paymentnote\">
	<input type=hidden name=\"return_url\" value=\"$inapoi\">
	<input type=hidden name=\"notify_url\" value=\"\">
	<input type=hidden name=\"cancel_url\" value=\"$CONFIG->siteurl\">
	<input type=submit name=\"cartImage\" value=\"Pay with FleetPay\">
</form>
";
return codare_output($text);

}
$gTMgr="</a></div><div align=\"center\" class=\"text\">	<br>Copyright &#169; 2018&nbsp;&nbsp;<a class=\"link3\" href=\"$CONFIG->siteurl\">$CONFIG->sitename</a> - All Rights Reserved</div></p></td></tr>	</table>








</body></html>";
function add_solidtrustpay($cat,$ce,$inapoi)
{
global $CONFIG;
if($inapoi=='1'){$inapoi=$CONFIG->primu;}
if($inapoi=='2'){$inapoi=$CONFIG->adminul;}
if($inapoi=='3'){$inapoi=$CONFIG->complete;}
if($inapoi=='6'){$inapoi=$CONFIG->add2;}
if($inapoi=='7'){$inapoi=$CONFIG->add5;}
if($inapoi=='8'){$inapoi=$CONFIG->add10;}
if($inapoi=='9'){$inapoi=$CONFIG->add15;}
if($inapoi=='10'){$inapoi=$CONFIG->add25;}
if($inapoi=='11'){$inapoi=$CONFIG->add50;}
if($inapoi=='12'){$inapoi=$CONFIG->add100;}
if($inapoi=='13'){$inapoi=$CONFIG->add250;}
$text="<FORM action=\"http://solidtrustpay.com/handle.php\" method=\"post\">
	<input type=hidden name=\"merchantAccount\" value=\"$ce\">
	<input type=hidden name=\"amount\" value=\"$cat\">
	<input type=hidden name=\"item_id\" value=\"$CONFIG->paymentnote\">
	<input type=hidden name=\"return_url\"
value=\"$inapoi\">
	<input type=hidden name=\"notify_url\"
value=\"\">
	<input type=hidden name=\"cancel_url\"
value=\"$CONFIG->siteurl\">
	<input type=image name=\"cartImage\"
src=\"http://solidtrustpay.com/images/buttons/pay1.gif\">
</form>
";
return codare_output($text);

}
function add_dollardeliverys($cat,$ce,$inapoi)
{
global $CONFIG;
if($inapoi=='1'){$inapoi=$CONFIG->primu;}
if($inapoi=='2'){$inapoi=$CONFIG->adminul;}
if($inapoi=='3'){$inapoi=$CONFIG->complete;}
if($inapoi=='6'){$inapoi=$CONFIG->add2;}
if($inapoi=='7'){$inapoi=$CONFIG->add5;}
if($inapoi=='8'){$inapoi=$CONFIG->add10;}
if($inapoi=='9'){$inapoi=$CONFIG->add15;}
if($inapoi=='10'){$inapoi=$CONFIG->add25;}
if($inapoi=='11'){$inapoi=$CONFIG->add50;}
if($inapoi=='12'){$inapoi=$CONFIG->add100;}
if($inapoi=='13'){$inapoi=$CONFIG->add250;}
$text="<FORM action=\"http://www.dollardeliverys.com/handle.php\" method=\"post\">
	<input type=hidden name=\"merchantAccount\" value=\"$ce\">
	<input type=hidden name=\"amount\" value=\"$cat\">
	<input type=hidden name=\"item_id\" value=\"$CONFIG->paymentnote\">
	<input type=hidden name=\"return_url\" value=\"$inapoi\">
	<input type=hidden name=\"notify_url\" value=\"\">
	<input type=hidden name=\"cancel_url\" value=\"$CONFIG->siteurl\">
	<input type=submit name=\"cartImage\" value=\"Pay with DollarDeliverys\">
</form>
";
return codare_output($text);

}
function add_moneybookers($cat,$ce,$inapoi)
{
global $CONFIG;
if($inapoi=='1'){$inapoi=$CONFIG->primu;}
if($inapoi=='2'){$inapoi=$CONFIG->adminul;}
if($inapoi=='3'){$inapoi=$CONFIG->complete;}
if($inapoi=='6'){$inapoi=$CONFIG->add2;}
if($inapoi=='7'){$inapoi=$CONFIG->add5;}
if($inapoi=='8'){$inapoi=$CONFIG->add10;}
if($inapoi=='9'){$inapoi=$CONFIG->add15;}
if($inapoi=='10'){$inapoi=$CONFIG->add25;}
if($inapoi=='11'){$inapoi=$CONFIG->add50;}
if($inapoi=='12'){$inapoi=$CONFIG->add100;}
if($inapoi=='13'){$inapoi=$CONFIG->add250;}
$text="<form action=\"https://www.moneybookers.com/app/payment.pl\" method=post target=\"_blank\">
<input type=\"hidden\" name=\"pay_to_email\" value=\"$ce\">
<input type=\"hidden\" name=\"return_url\" value=\"$inapoi\">
<input type=\"hidden\" name=\"cancel_url\" value=\"$CONFIG->siteurl\">
<input type=\"hidden\" name=\"status_url\" value=\"$ce\">
<input type=\"hidden\" name=\"language\" value=\"EN\">
<input type=\"hidden\" name=\"amount\" value=\"$cat\">
<input type=\"hidden\" name=\"currency\" value=\"USD\">
<input type=\"hidden\" name=\"detail1_description\" value=\"Payment For\">
<input type=\"hidden\" name=\"detail1_text\" value=\"$CONFIG->paymentnote\">
<input type=\"image\" name=\"Pay\" src=\"http://www.moneybookers.com/images/banners/88_en_paynow.gif\">
</form>
";
return codare_output($text);

}
?>