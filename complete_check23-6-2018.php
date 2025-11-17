<?
include'config.php';
$title="$CONFIG->sitename join form";
include("$CONFIG->templatedir/header.php");


//$found_sponsor=$_SESSION["sponsor"]["username"];


if(  $_SESSION["sponsor"]["firstname"] ==null  ) {  $_SESSION["sponsor"]["firstname"]= 'Mike'; }
if(  $_SESSION["sponsor"]["email"]==null  ){   $_SESSION["sponsor"]["email"] = 'admin@ez-moneymaker.com';   }






$rands=$_SESSION["random"]["username"];
$frm = $_POST;$err=0;
		$msg = "<p class=text align=center>The following error(s) occured:<br><ul class=text>";

$found_sponsor=$frm["sponsor"];

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
//         $q=db_query("insert into chances(username,start,finish) values('$frm['username']','$nri','$nri')"); // it stops inserting.
 //
 if($rands){$query = db_query("
	INSERT INTO random_referrals(sponsor,username,joindate)
	values('$rands','$frm['username']',now())");}
$page_content= "<br>

<table align=\"center\" class=\"shadowed\" valign=top width=\"100%\" height=50 bgcolor=#d8ecff cellpadding=\"25\" cellspacing=\"0\" border=\"0\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=#999999> 

<tr><td>

<table align=\"center\" class=\"shadowed\" class=text width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">


<tr><td><p class=text align=center><b>".$frm["firstname"]."</b>, Thank You for joining $CONFIG->sitename.<b> 



</b><br><br>In order to get your referral url and start building your downline, click on the Login link at the top of this page
and then log into your account.  Next, click on the \"Referral URL & Banners\" link under \"Banners & Text Ads\".
<br><br>Your details have been sent to <b>".$frm["email"]."</td></tr></table></td></tr></table></b><br> <br><br>";
//mail the user
session_register("account");
	
	$subject = "".$frm["firstname"].", Here Are Your Login Details";
	$subject1 = "$CONFIG->sitename New User";

	
	$s=mysqli_query($GLOBALS["___mysqli_ston"], "select wcm from administration where id=1") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	while($r=mysqli_fetch_array($s)){$message=$r[0];}
	$message=str_replace("%username%",$frm["username"],$message);
	$message=str_replace("%firstname%",$frm["firstname"],$message);
	$message=str_replace("%lastname%",$frm["lastname"],$message);
	$message=str_replace("%email%",$frm["email"],$message);
	$message=str_replace("%password%",$frm["password"],$message);




	$message=str_replace("&lt;br&gt;&lt;br&gt;","<br><br>",$message);
	$message=str_replace("&lt;br&gt;","<br>",$message);
       $message=str_replace("&lt;a ","<a ",$message);
        $message=str_replace("&gt;",">",$message);        
        	
        $message=str_replace("&lt;","<",$message);   
        $message=str_replace("&lt;/a&gt;","</a>",$message);	        
        $message=str_replace("&amp;nbsp;","  ",$message);	                

//$message=str_replace("nbsp;"," ",$message);    
//$message=str_replace("Your Username is:&","Your Username is:  ",$message);    

  



	
	$message1="Hi!
	A new signup on your Randomizer-".$CONFIG->siteurl." 
		<br>Username : ".$frm["username"]."
		<br>Name     : ".$frm["firstname"]." ".$frm["lastname"]."
                <br>New Member IP: ".$_SERVER['REMOTE_ADDR']."
                <br><br>Sponored By : ".$frm["sponsor"]."

               


";
		
		
		
		$subject2 = $_SESSION["sponsor"]["firstname"].", Congratulations You Just Referred A New Member To EZ-MoneyMaker.com";
		$message2 ="Hi  ";
		$message2 .=$_SESSION["sponsor"]["firstname"];
$message2 .=" ,<br><br>
Mike Borders here.  Just a short note to let you know you just referred
<br>
a new member to EZ-MoneyMaker.com. If this member decides to Upgrade
<br>
his/her account, you will earn $"; $message2 .=$CONFIG->sponsorfee_free; $message2 .=" if you are a Free Member 
<br>
and $"; $message2 .=$CONFIG->sponsorfee ; $message2 .=" if you are a Pro Member.  If you haven't done so already,
<br>
we recommend you upgrade before your referrals upgrade; this way you
<br>
will earn $"; $message2 .= $CONFIG->sponsorfee; $message2 .=" each time a member in your downline upgrades instead
<br>
of $"; $message2 .= $CONFIG->sponsorfee_free; $message2 .="
<br><br>
Below are your referral's details.
<br><br>
First Name:&nbsp;&nbsp; ";  $message2 .= $frm["firstname"];

 $message2 .="<br><br>
Last Name:&nbsp;&nbsp; ";  $message2 .=$frm["lastname"];
$message2 .="<br><br>
Sign Up Date and Time:&nbsp;&nbsp; ";  $message2 .=date('m/d/Y h:i:s a', time());

$message2 .="<br><br>
IP Address:&nbsp;&nbsp; ";  $message2 .= $_SERVER['REMOTE_ADDR'];
$message2 .="
<br><br>
Username:&nbsp;&nbsp; ";  $message2 .= $frm["username"];
$message2 .="<br><br>";

$message2 .="Email Address: &nbsp;&nbsp;";
  $message2 .= $frm["email"];
$message2 .="<br><br>


You can send this referral a welcome email and find out<br>
if he/she needs help with our program.  But please do not<br>
SPAM your referral.<br><br>
Thanks for promoting our site and keep up the Good Work! 
<br><br>
Sincerely,
<br><br>
Mike Borders
<br>
Admin
<br>
<a href=http://www.ez-moneymaker.com>Click Here To Log Into Your Account</a>";
		
		
		
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers

$headers .= 'From: '.$CONFIG->sitename.' <'.$CONFIG->support.'>' . '\r\n';
//$headers .= 'Cc: satyajeet.kesharia@gmail.com' . '\r\n';		



		//  mail('satyajeet.kesharia@gmail.com',  'ssubject', $message2,$headers); 
		
		
//echo $_SESSION["sponsor"]["email"]; echo "<br>";		
//echo $frm["email"]; echo "<br>";		
//echo $CONFIG->sendto; echo "<br>";  exit;		
				
                  //   mail('satyajeet.kesharia@gmail.com',  $subject2, $message2,$headers); exit;	
  mail($_SESSION["sponsor"]["email"], $subject2, $message2,$headers);		
    mail($frm["email"], $subject, $message,$headers);		
// mail($frm["email"], $subject, $message, "From: $CONFIG->sitename <$CONFIG->support>\nX-Mailer: PHP/" . phpversion());



if($CONFIG->sendemail)
   {
//@mail($CONFIG->sendto, $subject1, $message1,"From: ".$frm["firstname"]." ".$frm["lastname"]." <".$frm["email"].">\nX-Mailer: PHP/" . phpversion());

@mail($CONFIG->sendto, $subject1, $message1,$headers);


   }
}
else{$page_content=$msg."<br><p class=text align=center>
Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";}

include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>
