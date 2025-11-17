<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Get Traffic";
include("$CONFIG->templatedir/header.php");



$q_admin= db_query("SELECT * FROM users	WHERE username = 'wespac59'  and id='1'");
$user_admin= db_fetch_array($q_admin);
$venmo_admin = $user_admin["venmo_username"];


//$sql = "SELECT item_name,cost_per_unit, login_cost_per_hundred, vc_log_email, vc_log_security_code, login_cancel_url, login_return_url,paypal_email  FROM url_site_setting";
$sql = "SELECT *  FROM url_site_setting";
$results = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$row = mysqli_fetch_array($results);
//echo "<pre>"; print_r($row); die;

$login_cost_per_hundred = $row['login_cost_per_hundred'];

$amount =  $login_cost_per_hundred *  $row['cost_per_referral_url'];


$page_content=read_template("$CONFIG->templatedir/get_traffic.php");


$page_content=str_replace("%firstname%",$_SESSION["user"]["firstname"],$page_content);

$page_content=str_replace("%lastname%",$_SESSION["user"]["lastname"],$page_content);

$page_content=str_replace("%username%",$_SESSION["user"]["username"],$page_content);


$page_content=str_replace("%login_cost_per_hundred%",$login_cost_per_hundred ,$page_content);
$page_content=str_replace("THE AMOUNT GOES HERE (AMOUNT = The number of urls purchased * cost_per_referral_url)",$amount,$page_content);



$page_content=str_replace("ADMIN VENMO USERNAME GOES HERE(admin_venmo)",$venmo_admin,$page_content);



$page_content=str_replace("THE BUYER'S EZ-MONEYMAKER.COM USERNAME GOES HERE",$_SESSION["user"]["username"],$page_content);



include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>