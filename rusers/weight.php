<?
include'../config.php';
require_login();
$title="$CONFIG->sitename More weight";
include("$CONFIG->templatedir/header.php");
$page_content="<div align=center class=text>";
$w=db_fetch_array(db_query("select weight from users where username='".$_SESSION["user"]["username"]."'"));
$weight=$w[0];
$w2=db_fetch_array(db_query("select sum(weight) from users "));
$sum=$w2[0];
$q1=db_fetch_array(db_query("select * from users where id='1'"));
$page_content.="The <strong>weight</strong> is the number of chances to be chosen randomly from our system.
<br>Your current weight is: <strong>$weight/$sum</strong><br>
You can buy more weight using the links from below.";
$page_content.="
<fieldset class=text><legend>2 more chances for <strong>$".$CONFIG->weight2."</strong></legend>
";

//include the payment forms

if($CONFIG->allowpaypal){$page_content.=add_paypal($CONFIG->weight2,$q1["paypal"],"6");}

if($CONFIG->allowstormpay){$page_content.=add_stormpay($CONFIG->weight2,$q1["stormpay"],"6");}

if($CONFIG->allowegold){$page_content.=add_egold($CONFIG->weight2,$q1["egold"],"6");}

if($CONFIG->allowlibertyreserve){$page_content.=add_libertyreserve($CONFIG->weight2,$q1["libertyreserve"],"6");}

if($CONFIG->allowassuredpay){$page_content.=add_assuredpay($CONFIG->weight2,$q1["assuredpay"],"6");}

if($CONFIG->allowfleetpay){$page_content.=add_fleetpay($CONFIG->weight2,$q1["fleetpay"],"6");}

if($CONFIG->allowsolidtrustpay){$page_content.=add_solidtrustpay($CONFIG->weight2,$q1["solidtrustpay"],"6");}

if($CONFIG->allowmoneybookers){$page_content.=add_moneybookers($CONFIG->weight2,$q1["moneybookers"],"6");}

if($CONFIG->allowdollardeliverys){$page_content.=add_dollardeliverys($CONFIG->weight2,$q1["dollardeliverys"],"6");}
$page_content.="</fieldset>";

// 5
$page_content.="
<fieldset class=text><legend>5 more chances for <strong>$".$CONFIG->weight5."</strong></legend>
";

//include the payment forms

if($CONFIG->allowpaypal){$page_content.=add_paypal($CONFIG->weight5,$q1["paypal"],"7");}

if($CONFIG->allowstormpay){$page_content.=add_stormpay($CONFIG->weight5,$q1["stormpay"],"7");}

if($CONFIG->allowegold){$page_content.=add_egold($CONFIG->weight5,$q1["egold"],"7");}

if($CONFIG->allowlibertyreserve){$page_content.=add_libertyreserve($CONFIG->weight5,$q1["libertyreserve"],"7");}

if($CONFIG->allowassuredpay){$page_content.=add_assuredpay($CONFIG->weight5,$q1["assuredpay"],"7");}

if($CONFIG->allowfleetpay){$page_content.=add_fleetpay($CONFIG->weight5,$q1["fleetpay"],"7");}

if($CONFIG->allowsolidtrustpay){$page_content.=add_solidtrustpay($CONFIG->weight5,$q1["solidtrustpay"],"7");}

if($CONFIG->allowmoneybookers){$page_content.=add_moneybookers($CONFIG->weight5,$q1["moneybookers"],"7");}

if($CONFIG->allowdollardeliverys){$page_content.=add_dollardeliverys($CONFIG->weight5,$q1["dollardeliverys"],"7");}
$page_content.="</fieldset>";

//10
$page_content.="
<fieldset class=text><legend>10 more chances for <strong>$".$CONFIG->weight10."</strong></legend>
";

//include the payment forms

if($CONFIG->allowpaypal){$page_content.=add_paypal($CONFIG->weight10,$q1["paypal"],"8");}

if($CONFIG->allowstormpay){$page_content.=add_stormpay($CONFIG->weight10,$q1["stormpay"],"8");}

if($CONFIG->allowegold){$page_content.=add_egold($CONFIG->weight10,$q1["egold"],"8");}

if($CONFIG->allowlibertyreserve){$page_content.=add_libertyreserve($CONFIG->weight10,$q1["libertyreserve"],"8");}

if($CONFIG->allowassuredpay){$page_content.=add_assuredpay($CONFIG->weight10,$q1["assuredpay"],"8");}

if($CONFIG->allowfleetpay){$page_content.=add_fleetpay($CONFIG->weight10,$q1["fleetpay"],"8");}

if($CONFIG->allowsolidtrustpay){$page_content.=add_solidtrustpay($CONFIG->weight10,$q1["solidtrustpay"],"8");}

if($CONFIG->allowmoneybookers){$page_content.=add_moneybookers($CONFIG->weight10,$q1["moneybookers"],"8");}

if($CONFIG->allowdollardeliverys){$page_content.=add_dollardeliverys($CONFIG->weight10,$q1["dollardeliverys"],"8");}
$page_content.="</fieldset>";

//15
$page_content.="
<fieldset class=text><legend>15 more chances for <strong>$".$CONFIG->weight15."</strong></legend>
";

//include the payment forms

if($CONFIG->allowpaypal){$page_content.=add_paypal($CONFIG->weight15,$q1["paypal"],"9");}

if($CONFIG->allowstormpay){$page_content.=add_stormpay($CONFIG->weight15,$q1["stormpay"],"9");}

if($CONFIG->allowegold){$page_content.=add_egold($CONFIG->weight15,$q1["egold"],"9");}

if($CONFIG->allowlibertyreserve){$page_content.=add_libertyreserve($CONFIG->weight15,$q1["libertyreserve"],"9");}

if($CONFIG->allowassuredpay){$page_content.=add_assuredpay($CONFIG->weight15,$q1["assuredpay"],"9");}

if($CONFIG->allowfleetpay){$page_content.=add_fleetpay($CONFIG->weight15,$q1["fleetpay"],"9");}

if($CONFIG->allowsolidtrustpay){$page_content.=add_solidtrustpay($CONFIG->weight15,$q1["solidtrustpay"],"9");}

if($CONFIG->allowmoneybookers){$page_content.=add_moneybookers($CONFIG->weight15,$q1["moneybookers"],"9");}

if($CONFIG->allowdollardeliverys){$page_content.=add_dollardeliverys($CONFIG->weight15,$q1["dollardeliverys"],"9");}
$page_content.="</fieldset>";

//25
$page_content.="
<fieldset class=text><legend>25 more chances for <strong>$".$CONFIG->weight25."</strong></legend>
";

//include the payment forms

if($CONFIG->allowpaypal){$page_content.=add_paypal($CONFIG->weight25,$q1["paypal"],"10");}

if($CONFIG->allowstormpay){$page_content.=add_stormpay($CONFIG->weight25,$q1["stormpay"],"10");}

if($CONFIG->allowegold){$page_content.=add_egold($CONFIG->weight25,$q1["egold"],"10");}

if($CONFIG->allowlibertyreserve){$page_content.=add_libertyreserve($CONFIG->weight25,$q1["libertyreserve"],"10");}

if($CONFIG->allowassuredpay){$page_content.=add_assuredpay($CONFIG->weight25,$q1["assuredpay"],"10");}

if($CONFIG->allowfleetpay){$page_content.=add_fleetpay($CONFIG->weight25,$q1["fleetpay"],"10");}

if($CONFIG->allowsolidtrustpay){$page_content.=add_solidtrustpay($CONFIG->weight25,$q1["solidtrustpay"],"10");}

if($CONFIG->allowmoneybookers){$page_content.=add_moneybookers($CONFIG->weight25,$q1["moneybookers"],"10");}

if($CONFIG->allowdollardeliverys){$page_content.=add_dollardeliverys($CONFIG->weight25,$q1["dollardeliverys"],"10");}
$page_content.="</fieldset>";
//50
$page_content.="
<fieldset class=text><legend>50 more chances for <strong>$".$CONFIG->weight50."</strong></legend>
";

//include the payment forms

if($CONFIG->allowpaypal){$page_content.=add_paypal($CONFIG->weight50,$q1["paypal"],"11");}

if($CONFIG->allowstormpay){$page_content.=add_stormpay($CONFIG->weight50,$q1["stormpay"],"11");}

if($CONFIG->allowegold){$page_content.=add_egold($CONFIG->weight50,$q1["egold"],"11");}

if($CONFIG->allowlibertyreserve){$page_content.=add_libertyreserve($CONFIG->weight50,$q1["libertyreserve"],"11");}

if($CONFIG->allowassuredpay){$page_content.=add_assuredpay($CONFIG->weight50,$q1["assuredpay"],"11");}

if($CONFIG->allowfleetpay){$page_content.=add_fleetpay($CONFIG->weight50,$q1["fleetpay"],"11");}

if($CONFIG->allowsolidtrustpay){$page_content.=add_solidtrustpay($CONFIG->weight50,$q1["solidtrustpay"],"11");}

if($CONFIG->allowmoneybookers){$page_content.=add_moneybookers($CONFIG->weight50,$q1["moneybookers"],"11");}

if($CONFIG->allowdollardeliverys){$page_content.=add_dollardeliverys($CONFIG->weight50,$q1["dollardeliverys"],"11");}
$page_content.="</fieldset>";
//100
$page_content.="
<fieldset class=text><legend>100 more chances for <strong>$".$CONFIG->weight100."</strong></legend>
";

//include the payment forms

if($CONFIG->allowpaypal){$page_content.=add_paypal($CONFIG->weight100,$q1["paypal"],"12");}

if($CONFIG->allowstormpay){$page_content.=add_stormpay($CONFIG->weight100,$q1["stormpay"],"12");}

if($CONFIG->allowegold){$page_content.=add_egold($CONFIG->weight100,$q1["egold"],"12");}

if($CONFIG->allowlibertyreserve){$page_content.=add_libertyreserve($CONFIG->weight100,$q1["libertyreserve"],"12");}

if($CONFIG->allowassuredpay){$page_content.=add_assuredpay($CONFIG->weight100,$q1["assuredpay"],"12");}

if($CONFIG->allowfleetpay){$page_content.=add_fleetpay($CONFIG->weight100,$q1["fleetpay"],"12");}

if($CONFIG->allowsolidtrustpay){$page_content.=add_solidtrustpay($CONFIG->weight100,$q1["solidtrustpay"],"12");}

if($CONFIG->allowmoneybookers){$page_content.=add_moneybookers($CONFIG->weight100,$q1["moneybookers"],"12");}

if($CONFIG->allowdollardeliverys){$page_content.=add_dollardeliverys($CONFIG->weight100,$q1["dollardeliverys"],"12");}
$page_content.="</fieldset>";

//250
$page_content.="
<fieldset class=text><legend>250 more chances for <strong>$".$CONFIG->weight250."</strong></legend>
";

//include the payment forms

if($CONFIG->allowpaypal){$page_content.=add_paypal($CONFIG->weight250,$q1["paypal"],"13");}

if($CONFIG->allowstormpay){$page_content.=add_stormpay($CONFIG->weight250,$q1["stormpay"],"13");}

if($CONFIG->allowegold){$page_content.=add_egold($CONFIG->weight250,$q1["egold"],"13");}

if($CONFIG->allowlibertyreserve){$page_content.=add_libertyreserve($CONFIG->weight250,$q1["libertyreserve"],"13");}

if($CONFIG->allowassuredpay){$page_content.=add_assuredpay($CONFIG->weight250,$q1["assuredpay"],"13");}

if($CONFIG->allowfleetpay){$page_content.=add_fleetpay($CONFIG->weight250,$q1["fleetpay"],"13");}

if($CONFIG->allowsolidtrustpay){$page_content.=add_solidtrustpay($CONFIG->weight250,$q1["solidtrustpay"],"13");}

if($CONFIG->allowmoneybookers){$page_content.=add_moneybookers($CONFIG->weight250,$q1["moneybookers"],"13");}

if($CONFIG->allowdollardeliverys){$page_content.=add_dollardeliverys($CONFIG->weight250,$q1["dollardeliverys"],"13");}
$page_content.="</fieldset>";
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>