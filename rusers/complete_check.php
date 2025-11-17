<?
include'../config.php';
$title="$CONFIG->sitename join form";
include("$CONFIG->templatedir/header.php");
$found_sponsor=$_SESSION["sponsor"]["username"];;
$rands=$_SESSION["random"]["username"];
$frm = $_POST;$err=0;     
		$msg = "<p class=text align=center>The following error(s) occured:<br><ul class=text>";

	if (empty($frm["username"])) {
		$err=1;
		$msg .= "<li>You did not specify a username</li>";

	} 
	if ((strlen($frm["username"])<3)||(strlen($frm["username"])>15)){
		$err=1;
		$msg .= "<li>The username must have minimum 3 characters and maximum 15</li>";

	}if (username_exists($frm["username"])) {
	$err=1;
		$msg .= "<li>The username <b>" . $frm["username"] ."</b> already exists";
$err=1;
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
	 if (email_exists($frm["email"])) {
		$err=1;
		$msg .= "<li>The email address <b>" . $frm["email"] ."</b> already exists on our database</li>";

	}if (!validate_email($frm["email"])) {
$err=1;
		$msg .= "<li>Invalid email address( ".$frm["email"].") </li>";

	}
	if ((!validate_email($frm["paypal"]))  and 
	(!validate_email($frm["stormpay"])) and
	(empty($frm["egold"]))  and
	(empty($frm["libertyreserve"]))  and
	(empty($frm["assuredpay"]))and
	(empty($frm["solidtrustpay"]))and
	(empty($frm["fleetpay"]))
	and
	(empty($frm["dollardeliverys"]))
	and
	(empty($frm["moneybookers"])))
	
	 {
$err=1;
		$msg .= "<li>You have to specify at least one payment gateway. </li>";

	} 
	if ($frm["password"]!=$frm["rpassword"])
	 {$err=1;
		
		$msg .= "<li>The passwords do not match.</li>";

	} 
	 if ((strlen($frm["password"])<5)||(strlen($frm["password"])>15)){
		$err=1;
		$msg .= "<li>The password must have minimum 5 characters and maximum 15</li>";

	}
$msg.="</ul>";
	

if($err==0){
$_SESSION["account"]="true";
	$query = db_query("INSERT INTO `users` (  `username` , `password` , `firstname` , `email` , 
	`lastname` , `sponsor` , `paypal` , `stormpay` , `egold` , `libertyreserve` , `assuredpay`, `solidtrustpay`,
	 `fleetpay`, `moneybookers`, `dollardeliverys`,
	 `joindate` , `last_ip`, `membership_status` ) VALUES (
'".trim(htmlspecialchars($frm["username"]))."', '$frm['password']', 
'".htmlspecialchars($frm["firstname"])."', '$frm['email']',
 '".htmlspecialchars($frm["lastname"])."', '$found_sponsor', '$frm['paypal']', '$frm['stormpay']', 
 '$frm['egold']', '$frm['libertyreserve']',  '$frm['assuredpay']','$frm['solidtrustpay']','$frm['fleetpay']','$frm['moneybookers']','$frm['dollardeliverys']',
 now(), '$REMOTE_ADDR'       ,'Free Member'       )");
 //chances
 $nrb=db_fetch_row(db_query("select max(finish) from chances"));
$nr=$nrb[0];
$nri=$nr+1;
$q=db_query("insert into chances(username,start,finish) values('$frm['username']','$nri','$nri')");
 //
 if($rands){$query = db_query("
	INSERT INTO random_referrals(sponsor,username,joindate)
	values('$rands','$frm['username']',now())");}
$page_content= "<p class=text align=center>Welcome to $CONFIG->sitename ,<b>".$frm["firstname"]." " .$frm["lastname"].
"</b><br><br>Your Site URL is:<br><a href=\"$CONFIG->siteurl/promo.php?from=".$frm["username"]."\" class=link1>$CONFIG->siteurl/promo.php?from=".$frm["username"]."</a><br>
To log into your account, click on the Login link at the top of this page.
<br><br>Your details have been sent to <b>"
.$frm["email"]."</b><br> <br><br>";
//mail the user
session_register("account");
	
	$subject = "$CONFIG->sitename Membership";
	$subject1 = "$CONFIG->sitename New User";
	$s=mysqli_query($GLOBALS["___mysqli_ston"], "select wcm from administration where id=1") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	while($r=mysqli_fetch_array($s)){$message=$r[0];}
	$message=str_replace("%username%",$frm["username"],$message);
	$message=str_replace("%firstname%",$frm["firstname"],$message);
	$message=str_replace("%lastname%",$frm["lastname"],$message);
	$message=str_replace("%email%",$frm["email"],$message);
	$message=str_replace("%password%",$frm["password"],$message);
	$message1="Hi!
	A new signup on your Randomizer-".$CONFIG->siteurl." 
		Username : ".$frm["username"]."
		Name     :".$frm["firstname"]." ".$frm["lastname"].
		"";
	mail($frm["email"], $subject, $message, 
	"From: $CONFIG->sitename <$CONFIG->support>\nX-Mailer: PHP/" . phpversion());
if($CONFIG->sendemail)
{
@mail($CONFIG->sendto, $subject1, $message1,"From: ".$frm["firstname"]." ".$frm["lastname"]." <".$frm["email"].">\nX-Mailer: PHP/" . phpversion()); }
}
else{$page_content=$msg."<br><p class=text align=center>
Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";}

include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>
