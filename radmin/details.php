<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Account details";
?>




  	

<?
include("$CONFIG->templatedir/header.php");
$frm=$_POST;
if(!$frm){
$fill=db_fetch_array(db_query("select * from users where id='1'"));
$page_content=read_template("$CONFIG->templatedir/admin.details.php");
$page_content=str_replace("#darker#",$CONFIG->darkercolor ?? '',$page_content);
$page_content=str_replace("#username#",$fill["username"],$page_content);
$page_content=str_replace("#password#",$fill["password"],$page_content);
$page_content=str_replace("#email#",$fill["email"],$page_content);
$page_content=str_replace("#firstname#",$fill["firstname"],$page_content);
$page_content=str_replace("#lastname#",$fill["lastname"],$page_content);
$page_content=str_replace("#stormpay#",$fill["stormpay"],$page_content);
$page_content=str_replace("#paypal#",$fill["paypal"],$page_content);
$page_content=str_replace("#egold#",$fill["egold"],$page_content);
$page_content=str_replace("#libertyreserve#",$fill["libertyreserve"],$page_content);
$page_content=str_replace("#assuredpay#",$fill["assuredpay"],$page_content);
$page_content=str_replace("#fleetpay#",$fill["fleetpay"],$page_content);
$page_content=str_replace("#solidtrustpay#",$fill["solidtrustpay"],$page_content);
$page_content=str_replace("#dollardeliverys#",$fill["dollardeliverys"],$page_content);
$page_content=str_replace("#moneybookers#",$fill["moneybookers"],$page_content);
$page_content=str_replace("#light#",$CONFIG->lightcolor,$page_content);
}
else{
$err=0;
	
	$msg = "<p class=text align=center>The following error(s) occured:<br><ul class=text>";

	
	if ((strlen($frm["username"])<3)||(strlen($frm["username"])>15)){
		$err=1;
		$msg .= "<li>The username must have minimum 3 characters and maximum 15</li>";

	}if (username_exists($frm["username"])&&($frm["username"]!=$_SESSION['ADMIN']["admin"]["username"])) {
	$err=1;
		$msg .= "<li>The username <b>" . $frm["username"] ."</b> already exists";
$err=1;
	}
	if (empty($frm["password"])) {
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
	
	 if ((strlen($frm["password"])<5)||(strlen($frm["password"])>15)){
		$err=1;
		$msg .= "<li>The password must have minimum 5 characters and maximum 15</li>";

	}
$msg.="</ul>";
	

if($err==0){

	$assuredpay = $frm['assuredpay'] ?? '';
	$fleetpay = $frm['fleetpay'] ?? '';
	$dollardeliverys = $frm['dollardeliverys'] ?? '';

	$query = db_query("update users set username='{$frm['username']}',firstname='{$frm['firstname']}',lastname='{$frm['lastname']}',
	email='{$frm['email']}',paypal='{$frm['paypal']}',stormpay='{$frm['stormpay']}',
	egold='{$frm['egold']}',libertyreserve='{$frm['libertyreserve']}',assuredpay='{$assuredpay}',
	fleetpay='{$fleetpay}',solidtrustpay='{$frm['solidtrustpay']}',
	moneybookers='{$frm['moneybookers']}',dollardeliverys='{$dollardeliverys}',
	password='{$frm['password']}' where  id='1'");
$page_content="<br><p class=text align=center>Your details have been succesfully updated.<br>
<br><br><br><br><br>";
}
if($err==1){$page_content=$msg."<br><p class=text align=center>
Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";}
}
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>



