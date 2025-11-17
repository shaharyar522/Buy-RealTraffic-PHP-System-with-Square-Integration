<?
include'../config.php';
require_login();
$title="$CONFIG->sitename More weight";
include("$CONFIG->templatedir/header.php");
$page_content="<div align=center class=text><strong>Thank you!</strong><br>
Your order has been sent to our site administrator.
<br>After checking the transaction ID,your weight will be automatically changed.
<br><br>
If your weight is not increased after 12 hours,please email us at ".$CONFIG->support." with the payment proof attached.
<br><br>Thank you!</div>";
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>