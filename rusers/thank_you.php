<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Get Traffic";
include("$CONFIG->templatedir/header.php");





$page_content=read_template("$CONFIG->templatedir/thank_you.php");


$page_content=str_replace("%firstname%",$_SESSION["user"]["firstname"],$page_content);










      $global_admin_emailname = "Admin";
      $global_admin_email     = "admin@ez-moneymaker.com";

	  $admin_name       = $global_admin_emailname;      
	  $mailfrom         = $global_admin_email;  
	  
	  $mailHeader = "From: ".$CONFIG->support. "<".$global_admin_email. ">". "\r\n";

    	       $mailHeader .= "X-Sender: $global_admin_email "."\r\n";
	   $mailHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$term = $_SESSION["user"]["sponsor"];



$satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users  where username='".$term."'");
	$rss = mysqli_fetch_array($satya);
	
if(	$rss["membership_status"] == 'Free Member' )
$fee = $CONFIG->sponsorfee_free;
else
$fee = $CONFIG->sponsorfee;

	
	$to =$rss["email"];
	
	$subject = $rss["firstname"].", Did You Receive Your Sponsor Fee?";
	
	$message = "
	<html>
	<head>
	<title>EMAIL TO THE BUYER'S SPONSOR</title>
	</head>
	<body>
	
	Hi ";
	$message .= $rss["firstname"];
	$message .=",<br><br>
	Mike here.  Just a short note to see if you received your sponsor fee from
<br>
your referral below.  Please reply to this email with a Yes or No.  If you have questions, 
<br>
please write us back.  Below are your referral's details.

<br><br>

Your Referral Name:";
$message .=$_SESSION["user"]["firstname"] .' '. $_SESSION["user"]["lastname"];
$message .="
<br><br>

Your Referral EZ-Money Username:";

$message .=$_SESSION["user"]["username"] ;
$message .="

<br><br>

Your Referral Email Address: ";

$message .=$_SESSION["user"]["email"];
$message .="

<br><br>

Your Referral Venmo Username: ";
$message .=$_SESSION["user"]["venmo_username"] ;
$message .="

<br><br>

Sponsor Fee Amount: $ ";

$message .=$fee;

$message .="
<br><br>
Sincerely,
<br><br>
Mike
<br>
<a href=http://www.ez-moneymaker.com>http://www.ez-moneymaker.com</a>   ";




//if($rss["membership_status"] == 'Free Member' || $rss["membership_status"] == 'Pro Member')
    // mail($to,$subject,$message,$mailHeader);  //26-2-2023







include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>