<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Add Users";
?>





  	

<?  
include("$CONFIG->templatedir/header.php");
$frm=$_POST;
if(!$frm){

$page_content=read_template("$CONFIG->templatedir/admin.adduser.php");
$page_content=str_replace("#username#",$fill["username"] ?? '',$page_content);
$page_content=str_replace("#password#",$fill["password"] ?? '',$page_content);
$page_content=str_replace("#email#",$fill["email"] ?? '',$page_content);
$page_content=str_replace("#firstname#",$fill["firstname"] ?? '',$page_content);
$page_content=str_replace("#lastname#",$fill["lastname"] ?? '',$page_content);
$page_content=str_replace("#sponsor#","admin",$page_content);
$page_content=str_replace("#stormpay#",$fill["stormpay"] ?? '',$page_content);
$page_content=str_replace("#paypal#",$fill["paypal"] ?? '',$page_content);
$page_content=str_replace("#assuredpay#",$fill["assuredpay"] ?? '',$page_content);
$page_content=str_replace("#egold#",$fill["egold"] ?? '',$page_content);
$page_content=str_replace("#libertyreserve#",$fill["libertyreserve"] ?? '',$page_content);
$page_content=str_replace("#solidtrustpay#",$fill["solidtrustpay"] ?? '',$page_content);
$page_content=str_replace("#fleetpay#",$fill["fleetpay"] ?? '',$page_content);
$page_content=str_replace("#dollardeliverys#",$fill["dollardeliverys"] ?? '',$page_content);
$page_content=str_replace("#moneybookers#",$fill["moneybookers"] ?? '',$page_content);
}
else{
$err=0;
	
	$msg = "<p class=text align=center>The following error(s) occured:<br><ul class=text>";

	if (username_exists($frm["username"])) {
	$err=1;
		$msg .= "<li>The username <b>" . $frm["username"] ."</b> already exists";
$err=1;
	}
	if ((strlen($frm["username"])<3)||(strlen($frm["username"])>15)){
		$err=1;
		$msg .= "<li>The username must have minimum 3 characters and maximum 15</li>";

	} if (empty($frm["password"])) {
		$err=1;
		$msg .= "<li>You did not specify a password</li>";

	} if (empty($frm["firstname"])) {
		$err=1;
		$msg .= "<li>You did not specify your firstname</li>";

	} if (empty($frm["lastname"])) {
	$err=1;
		$msg .= "<li>You did not specify your lastname</li>";

	} 
	 if (!validate_email($frm["email"])) {
$err=1;
		$msg .= "<li>Invalid email address( ".$frm["email"].") </li>";

	}
		if ((!validate_email($frm["paypal"]))  and 
	(!validate_email($frm["stormpay"])) and
	(empty($frm["egold"]))  and
	(empty($frm["libertyreserve"]))  and
	(empty($frm["fleetpay"]))and
	(empty($frm["solidtrustpay"]))and
	(empty($frm["dollardeliverys"]))and
	(empty($frm["moneybookers"])))
	
	 {
$err=1;
		$msg .= "<li>You have to specify at least one payment gateway. </li>";

	} 
	 if ((strlen($frm["password"])<5)||(strlen($frm["password"])>15)){
		$err=1;
		$msg .= "<li>The password must have minimum 5 characters and maximum 15</li>";

	}
$msg.="</ul>";
	

if($err==0){

	$query = db_query("
	INSERT INTO `users` (  `username` , `password` , `firstname` , `email` , 
	`lastname` , `sponsor` , `paypal` , `stormpay` , `egold` , `libertyreserve` , `assuredpay`, `fleetpay` , `solidtrustpay`, `dollardeliverys` , `moneybookers`,
	 `joindate` , `last_ip` ) 
VALUES (
'{$frm['username']}', '{$frm['password']}', '{$frm['firstname']}', '{$frm['email']}',
 '{$frm['lastname']}', '{$frm['sponsor']}', '{$frm['paypal']}', '{$frm['stormpay']}', 
 '{$frm['egold']}', '{$frm['libertyreserve']}', '{$frm['assuredpay']}',  '{$frm['fleetpay']}', '{$frm['solidtrustpay']}', '{$frm['dollardeliverys']}', '{$frm['moneybookers']}', 
 now(), '$REMOTE_ADDR')");
  //chances
 $nrb=db_fetch_row(db_query("select max(finish) from chances"));
$nr=$nrb[0];
$nri=$nr+1;
$q=db_query("insert into chances(username,start,finish) values('{$frm['username']}','$nri','$nri')");
 //
$page_content= "<p class=text align=center>Account for <b>".$frm["firstname"]." " .$frm["lastname"].
"</b> has been created.<br><br>Site URL :<br><a href=\"$CONFIG->siteurl/promo.php?from=".$frm["username"]."\" class=link1>$CONFIG->siteurl/promo.php?from=".$frm["username"]."</a><br><br><br>The site details have been sent to <b>"
.$frm["email"]."</b><br> <br><br>";
//mail the user
	
	$subject = "$CONFIG->sitename Membership";
	$s=mysqli_query($GLOBALS["___mysqli_ston"], "select wcm from administration where id=1") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	while($r=mysqli_fetch_array($s)){$message=$r[0];}
	$message=str_replace("%username%",$frm["username"],$message);
	$message=str_replace("%firstname%",$frm["firstname"],$message);
	$message=str_replace("%lastname%",$frm["lastname"],$message);
	$message=str_replace("%email%",$frm["email"],$message);
	$message=str_replace("%password%",$frm["password"],$message);
	mail($frm["email"], $subject, $message, "From: $CONFIG->sitename <$CONFIG->support>\nX-Mailer: PHP/" . phpversion());

}
else{$page_content=$msg."<br><p class=text align=center>
Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";}
}
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>


