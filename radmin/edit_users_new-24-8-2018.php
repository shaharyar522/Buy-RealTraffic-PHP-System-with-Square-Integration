<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Edit Users";
?>



  	

<?
include("$CONFIG->templatedir/header.php");

$term=$_REQUEST['ud']; 

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









if(!isset($term)){
$page_content="<fieldset class=text>
<legend>Please enter the username here</legend>
<br><div align=center class=text>
 Incorrect Username
</div>
</fieldset>";}
else{
$l=db_num_rows(db_query("select * from users where username='$term'"));
if($l<1){$page_content="<div align=center class=text><br>Username not found!!!<br><br></div>";}
else{$fill=db_fetch_array(db_query("select * from users where username='$term'"));
$page_content=read_template("$CONFIG->templatedir/admin.edituser_new.php");

$page_content=str_replace("#username#",$fill["username"],$page_content);
$page_content=str_replace("#password#",$fill["password"],$page_content);
$page_content=str_replace("#email#",$fill["email"],$page_content);
$page_content=str_replace("#firstname#",$fill["firstname"],$page_content);
$page_content=str_replace("#lastname#",$fill["lastname"],$page_content);
$page_content=str_replace("#sponsor#",$fill["sponsor"],$page_content);

$page_content=str_replace("#membership_status#",$fill["membership_status"],$page_content);


$page_content=str_replace("#login_credits#",$login_credits,$page_content);

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







include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>



