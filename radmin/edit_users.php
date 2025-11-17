<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Edit Users";
?>



  	

<?
include("$CONFIG->templatedir/header.php");
if(!isset($term)){
$page_content="<fieldset class=text>
<legend>Please enter the username here</legend>
<br><div align=center class=text>
<form action=\"".my_name()."?action=edit\" method=post class=text>
<input type=text name=term class=input><br>
<input type=submit value=Edit class=button>
<br><br><br>
</form>
</div>
</fieldset>";}
else{
$frm=$_POST;
if($action=='edit'){
$l=db_num_rows(db_query("select * from users where username='$term'"));
if($l<1){$page_content="<div align=center class=text><br>Username not found!!!<br><br></div>";}
else{$fill=db_fetch_array(db_query("select * from users where username='$term'"));




 $unassigned_login_credits_query = "SELECT * FROM url_unassigned_login_credits WHERE user_id = '".$term."'";
 $unassigned_login_credits_result = mysqli_query($GLOBALS["___mysqli_ston"], $unassigned_login_credits_query) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$unassigned_login_credits_query);	

	if(mysqli_num_rows($unassigned_login_credits_result))
	{
	 while($row = mysqli_fetch_array($unassigned_login_credits_result)) 
		 {   $login_credits = $row['login_credits'];	

		 }
	}
	else
	{
		$login_credits = 0;
	}





$page_content=read_template("$CONFIG->templatedir/admin.edituser.php");
$page_content=str_replace("#username#",$fill["username"],$page_content);
$page_content=str_replace("#password#",$fill["password"],$page_content);
$page_content=str_replace("#email#",$fill["email"],$page_content);
$page_content=str_replace("#firstname#",$fill["firstname"],$page_content);
$page_content=str_replace("#lastname#",$fill["lastname"],$page_content);
$page_content=str_replace("#sponsor#",$fill["sponsor"],$page_content);

$page_content=str_replace("#membership_status#",$fill["membership_status"],$page_content);


$page_content=str_replace("#login_credits#",$login_credits,$page_content);



$page_content=str_replace("#cb_nickname#",$fill["cb_nickname"],$page_content);
$page_content=str_replace("#cb_page_status#",$fill["cb_page_status"],$page_content);
$page_content=str_replace("#cb_page_hits#",$fill["cb_page_hits"],$page_content);


$page_content=str_replace("#term#",$term,$page_content);
$page_content=str_replace("#stormpay#",$fill["stormpay"],$page_content);
$page_content=str_replace("#weight#",$fill["weight"],$page_content);
$page_content=str_replace("#paypal#",$fill["paypal"],$page_content);
$page_content=str_replace("#egold#",$fill["egold"],$page_content);
$page_content=str_replace("#libertyreserve#",$fill["libertyreserve"],$page_content);
$page_content=str_replace("#assuredpay#",$fill["assuredpay"],$page_content);
$page_content=str_replace("#solidtrustpay#",$fill["solidtrustpay"],$page_content);
$page_content=str_replace("#fleetpay#",$fill["fleetpay"],$page_content);
$page_content=str_replace("#moneybookers#",$fill["moneybookers"],$page_content);
$page_content=str_replace("#dollardeliverys#",$fill["dollardeliverys"],$page_content);
}
}
elseif($action=='now'){
$err=0;
	
	$msg = "<p class=text align=center>The following error(s) occured:<br><ul class=text>";

if (empty($frm["cb_nickname"])) {
		$err=1;
		$msg .= "<li>You did not specify  the  nickname</li>";
	}
if (empty($frm["cb_page_status"]) or $frm["cb_page_status"] !='Disabled' or $frm["cb_page_status"] !='Active'    ) { 
      if(  $frm["cb_page_status"] !='Disabled' and $frm["cb_page_status"] !='Active'   ){
         	$err=1; 
		$msg .= "<li>pagestatus should be either 'Disabled' or 'Active'</li>";  }
	
	}
if (!is_numeric($frm["cb_page_hits"])) {
		$err=1;
		$msg .= "<li>Please enter numeric value</li>";
	}







	 if (empty($frm["password"])) {
		$err=1;
		$msg .= "<li>You did not specify a password</li>";

	} if (empty($frm["firstname"])) {
		$err=1;
		$msg .= "<li>You did not specify  the  firstname</li>";

	} if (empty($frm["lastname"])) {
	$err=1;
		$msg .= "<li>You did not specify  the  lastname</li>";

	} 
	 if (!validate_email($frm["email"])) {
$err=1;
		$msg .= "<li>Invalid email address( ".$frm["email"].") </li>";

	}if ((!validate_email($frm["paypal"]))  and 
	(!validate_email($frm["stormpay"])) and
	(empty($frm["egold"]))  and
	(empty($frm["libertyreserve"]))  and
	(empty($frm["assuredpay"]))
	and (empty($frm["solidtrustpay"]))
	and (empty($frm["fleetpay"]))
	and (empty($frm["dollardeliverys"]))
	and (empty($frm["moneybookers"])))
	
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









$sql_up = "UPDATE url_unassigned_login_credits SET login_credits='{$frm['login_credits']}' WHERE user_id='{$frm['username']}'"; 
 mysqli_query($GLOBALS["___mysqli_ston"], $sql_up);

 $assuredpay = $frm['assuredpay'] ?? '';
 $fleetpay = $frm['fleetpay'] ?? '';
 $dollardeliverys = $frm['dollardeliverys'] ?? '';

$query = db_query("update users set username='{$frm['username']}',  firstname='{$frm['firstname']}' ,lastname='{$frm['lastname']}',  membership_status= '{$frm['membership_status']}' ,

sponsor='{$frm['sponsor']}' ,

 cb_nickname= '{$frm['cb_nickname']}' ,
 cb_page_status= '{$frm['cb_page_status']}' ,
 cb_page_hits= '{$frm['cb_page_hits']}' ,


	email='{$frm['email']}',paypal='{$frm['paypal']}',stormpay='{$frm['stormpay']}',weight='{$frm['weight']}',
	egold='{$frm['egold']}',libertyreserve='{$frm['libertyreserve']}'
	,assuredpay='{$assuredpay}',solidtrustpay='{$frm['solidtrustpay']}',fleetpay='{$fleetpay}'
	,dollardeliverys='{$dollardeliverys}'
	,moneybookers='{$frm['moneybookers']}',password='{$frm['password']}' where  username='{$frm['term']}'");
	$c=db_fetch_array(db_query("select * from chances where username='{$frm['username']}'"));
	$cid=$c['id'] ?? '';
$chances_start=$c['start'] ?? 0;
$chances_finish=$c['finish'] ?? 0;
$chances_nr=$chances_finish-$chances_start+1;
if((int)($chances_nr)!=(int)($frm["weight"]))
{

if((int)($chances_nr)>(int)($frm["weight"]))
{
$cat=(int)($chances_nr)-(int)($frm["weight"]);
$f1=$frm["weight"]-1;
db_query("update  chances set finish=start+".$f1." where id='$cid'");
db_query("update chances set start=start-$cat,finish=finish-$cat where id>'$cid'");
}
elseif((int)($chances_nr)<(int)($frm["weight"]))
{
$f1=$frm["weight"]-1;
$cat=(int)($frm["weight"])-(int)($chances_nr);
db_query("update chances set finish=start+".$f1."  where id='$cid'");
db_query("update chances set start=start+$cat,finish=finish+$cat where id>'$cid'");
}
}
$page_content="<br><p class=text align=center> The  details have been succesfully updated.<br>
<br><br><br><br><br>";
}
else{$page_content=$msg."<br><p class=text align=center>
Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";}
}
}
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>



