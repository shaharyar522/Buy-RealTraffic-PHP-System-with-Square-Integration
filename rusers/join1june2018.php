<?
include'../config.php';
$title="Join now to $CONFIG->sitename";
include("$CONFIG->templatedir/header.php");
//include("$CONFIG->templatedir/header_locked.php"); // this was for the middle image



$username =$_SESSION["user"]["username"];
$password =$_SESSION["user"]["password"];
$q= db_query("	SELECT * FROM users	WHERE username = '$username' AND password = '$password' and id>'1'	"); 
$user= db_fetch_array($q);




$ss_sponsor = $user["sponsor"];
$q_spp= db_query("	SELECT * FROM users	WHERE  username = '$ss_sponsor' and id>'1'	"); 
$fetch_sponsor= db_fetch_array($q_spp);
$fetch_sponsor["membership_status"];






$stage=$_GET['stage'];
switch($stage)	{
default:

//$_POST["paytheadmin"] !='Pay The Admin Fee'
                                                  

//if( isset($_SESSION["sponsor_satt"]["username"]) && $_SESSION["sponsor_satt"]["username"] != null ) //23 apr2018
if( isset($_POST["paytheadmin"]) && $_POST["paytheadmin"]!= null )   //23 apr2018
{

$satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where id='1'");
$rss = mysqli_fetch_array($satya);
$page_content="
<div align=center class=text style=background-color:#d8ecff;>
<br><font color=red>".$rss["firstname"]
."  ".$rss["lastname"]."</font>";

/* 23 apr2018
$page_content="
<div align=center class=text>
<br>Your sponsor is :<font color=red>".$_SESSION["sponsor_satt"]["firstname"]
."  ".$_SESSION["sponsor_satt"]["lastname"]."</font>";
23 apr2018*/

/*
$page_content.="
<fieldset class=text><legend>".$_SESSION["sponsor_satt"]["firstname"]
."  ".$_SESSION["sponsor_satt"]["lastname"]." currently preferrs:</legend>
";
*/
$page_content.="
		<fieldset class=text><legend>Please pay the Admin $";
 if( $fetch_sponsor["membership_status"] == 'Free Member'){   $CONFIG->adminfee = $CONFIG->adminfee_free;   }  		
		$page_content.=$CONFIG->adminfee;
		$page_content.="</legend>
		";
}
else{

            if( $ss_sponsor !='wespac59' ){
             if($fetch_sponsor["membership_status"] == 'Free Member')
                     { $CONFIG->sponsorfee = $CONFIG->sponsorfee_free;  
                        
                     } 	
                     $usssr1 = $fetch_sponsor["firstname"] ." " .  $fetch_sponsor["lastname"] ;
                        $usssr2 =  " ( ".$user["sponsor"]  . " / " .$fetch_sponsor["membership_status"]." )" ;
                     
                     	
		$page_content="
		<div align=center class=text  style=background-color:#d8ecff; >
		<br>Your sponsor is :<font color=red>".$_SESSION["sponsor"]["firstname-----"]
		."  ".$_SESSION["sponsor"]["lastname-----"].           $user["sponsor---"]. $usssr1 .  "</font>"; $page_content.=$usssr2;
		
		
		$page_content.="
		<fieldset class=text><legend>Please pay the Sponsor $";

		$page_content.=$CONFIG->sponsorfee;
		$page_content.="</legend>
		";
             }else{
             
             
 $satya123=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where id='1'");
$rss123 = mysqli_fetch_array($satya123);            
             
              $page_content="
		<div align=center class=text  style=background-color:#d8ecff;>
		<br><font color=red>".$_SESSION["sponsor"]["firstname----"]
		."  ".$_SESSION["sponsor"]["lastname-----"].        $rss123["firstname"]." ".$rss123["lastname"] .       "</font>";
		
		
		$page_content.="
		<fieldset class=text><legend>Please pay the Admin $";
		$page_content.=$CONFIG->sponsorfee+$CONFIG->adminfee;
		$page_content.="</legend>
		";
             
             
             
             
             
             
             
             
           /*  
             $q1=db_fetch_array(db_query("select * from users where id='1'"));
if(($CONFIG->allowpaypal)&&(validate_email($rss123["paypal"]))){$page_content.=add_paypal($CONFIG->sponsorfee+$CONFIG->adminfee,$q1["paypal"],"3"   ,$_SESSION["sponsor"]["username"],$_SESSION["sponsor"]["email"],$rss["firstname"],$rss["lastname"]  );
             }
             
            */ 
             
             
             
             
             
             
             
             
             }

}


//include the payment forms






/*
if(($CONFIG->allowpaypal)&&(validate_email($_SESSION["sponsor"]["paypal"]))){$page_content.=add_paypal($CONFIG->sponsorfee,$_SESSION["sponsor"]["paypal"],"1");}
*/



///////////////////////////////satyajeet on 22april 2018



//*******************************satt 24 april 2018

                    /*
   if( $_SESSION["sponsor"]["username"] =='wespac59' ){
$q1=db_fetch_array(db_query("select username , paypal ,stormpay,egold,libertyreserve ,assuredpay from users where id='1'"));
if(($CONFIG->allowpaypal)&&(validate_email($_SESSION["sponsor"]["paypal"]))){$page_content.=add_paypal($CONFIG->sponsorfee+$CONFIG->adminfee,$q1["paypal"],"3");}
                                                               }else{
             if($_SESSION["sponsor_satt"]["username"] !='wespac59' )
{                                                              
   if(($CONFIG->allowpaypal)&&(validate_email($_SESSION["sponsor"]["paypal"]))){$page_content.=add_paypal_new($CONFIG->sponsorfee,$_SESSION["sponsor"]["paypal"],"2");}
}            else  {
	$q1=db_fetch_array(db_query("select username , paypal ,stormpay,egold,libertyreserve ,assuredpay from users where id='1'"));
	if(($CONFIG->allowpaypal)&&(validate_email($_SESSION["sponsor"]["paypal"]))    ){$page_content.=add_paypal($CONFIG->adminfee,$q1["paypal"],"2");   } 
             // unset($_SESSION["sponsor_satt"]);

                   } 
                                                               }
                                                               
                                                               
                                                               
                                                               
                     */                                          
                                                               
                                                                  if( $rss123["username"] =='wespac59' ){ 
//$q1=db_fetch_array(db_query("select username , paypal ,stormpay,egold,libertyreserve ,assuredpay from users where id='1'"));
if(($CONFIG->allowpaypal)&&(validate_email($rss123["paypal"]))){$page_content.=add_paypal($CONFIG->sponsorfee+$CONFIG->adminfee,$rss123["paypal"],"3"   ,$rss123["username"],$rss123["email"],$rss123["firstname"],$rss123["lastname"],$_SESSION["user"]["username"]  );}
                                                               }else{
             if($rss["username"] !='wespac59' )
{      


 if( $fetch_sponsor["membership_status"]=='Free Member'){ $CONFIG->sponsorfee = $CONFIG->sponsorfee_free;   }                                                     
   if(($CONFIG->allowpaypal)&&(validate_email($fetch_sponsor["paypal"]))){$page_content.=add_paypal_new($CONFIG->sponsorfee,$fetch_sponsor["paypal"],"2",$fetch_sponsor["username"],$fetch_sponsor["email"],$fetch_sponsor["firstname"],$fetch_sponsor["lastname"]);}
}            else  {            if( $fetch_sponsor["membership_status"]=='Free Member'){   $CONFIG->adminfee = $CONFIG->adminfee_free;   }  
	//$q1=db_fetch_array(db_query("select username , paypal ,stormpay,egold,libertyreserve ,assuredpay from users where id='1'"));
	if(($CONFIG->allowpaypal)&&(validate_email($rss["paypal"]))    ){$page_content.=add_paypal($CONFIG->adminfee,$rss["paypal"] ,"2",$fetch_sponsor["username"],$fetch_sponsor["email"],$fetch_sponsor["firstname"],$rss["lastname"],$_SESSION["user"]["username"]);  } 
             // unset($_SESSION["sponsor_satt"]);

                   } 
                                                               }
                                                               
                                                               
                                                               
                                                               
//*******************************satt 24 april 2018
                                                               
/*

echo $_POST["paytheadmin"];

   if( $_SESSION["sponsor"]["username"] =='wespac59' ){
$q1=db_fetch_array(db_query("select username , paypal ,stormpay,egold,libertyreserve ,assuredpay from users where id='1'"));
if(($CONFIG->allowpaypal)&&(validate_email($_SESSION["sponsor"]["paypal"]))){$page_content.=add_paypal($CONFIG->sponsorfee+$CONFIG->adminfee,$q1["paypal"],"3");}
                                                               }else{
             if($_POST["paytheadmin"] !='Pay The Admin Fee' )
{                                                              
   if(($CONFIG->allowpaypal)&&(validate_email($_SESSION["sponsor"]["paypal"]))){$page_content.=add_paypal_new($CONFIG->sponsorfee,$_SESSION["sponsor"]["paypal"],"2");}
}            else  {
	$q1=db_fetch_array(db_query("select username , paypal ,stormpay,egold,libertyreserve ,assuredpay from users where id='1'"));
	if(($CONFIG->allowpaypal)&&(validate_email($_SESSION["sponsor"]["paypal"]))    ){$page_content.=add_paypal($CONFIG->adminfee,$q1["paypal"],"2");   } 
             // unset($_SESSION["sponsor_satt"]);

                   } 
                                                               }


*/




///////////////////////////////satyajeet on 22april 2018







if(($CONFIG->allowstormpay)&&(validate_email($_SESSION["sponsor"]["stormpay"]))){$page_content.=add_stormpay($CONFIG->sponsorfee,$_SESSION["sponsor"]["stormpay"],"1");}

if(($CONFIG->allowegold)&&(!empty($_SESSION["sponsor"]["egold"]))){$page_content.=add_egold($CONFIG->sponsorfee,$_SESSION["sponsor"]["egold"],"1");}

if(($CONFIG->allowlibertyreserve)&&(!empty($_SESSION["sponsor"]["libertyreserve"]))){$page_content.=add_libertyreserve($CONFIG->sponsorfee,$_SESSION["sponsor"]["libertyreserve"],"1");}

if(($CONFIG->allowassuredpay)&&(!empty($_SESSION["sponsor"]["assuredpay"]))){$page_content.=add_assuredpay($CONFIG->sponsorfee,$_SESSION["sponsor"]["assuredpay"],"1");}
if(($CONFIG->allowsolidtrustpay)&&(!empty($_SESSION["sponsor"]["solidtrustpay"]))){$page_content.=add_solidtrustpay($CONFIG->sponsorfee,$_SESSION["sponsor"]["solidtrustpay"],"1");}
if(($CONFIG->allowfleetpay)&&(!empty($_SESSION["sponsor"]["fleetpay"]))){$page_content.=add_fleetpay($CONFIG->sponsorfee,$_SESSION["sponsor"]["fleetpay"],"1");}
if(($CONFIG->allowdollardeliverys)&&(!empty($_SESSION["sponsor"]["dollardeliverys"]))){$page_content.=add_dollardeliverys($CONFIG->sponsorfee,$_SESSION["sponsor"]["dollardeliverys"],"1");}
if(($CONFIG->allowmoneybookers)&&(!empty($_SESSION["sponsor"]["moneybookers"]))){$page_content.=add_moneybookers($CONFIG->sponsorfee,$_SESSION["sponsor"]["moneybookers"],"1");}
$page_content.="</fieldset>";
Break;
case 'primu':
if(!$_SESSION["random"]["firstname"])
{session_register("random");
$_SESSION["random"]=generate_random();}
$page_content="
<div align=center class=text>
<b>First step succeded!<br>You are now on the second step.</b>
<br>Your random sponsor is :<font color=red>".$_SESSION["random"]["firstname"]
."  ".$_SESSION["random"]["lastname"]."</font>";
$page_content.="
<fieldset class=text><legend>".$_SESSION["random"]["firstname"]
."  ".$_SESSION["random"]["lastname"]." currently preferrs:</legend>
";
//include the payment forms

if(($CONFIG->allowpaypal)&&(validate_email($_SESSION["random"]["paypal"]))){$page_content.=add_paypal($CONFIG->randomfee,$_SESSION["random"]["paypal"],"2");}

if(($CONFIG->allowstormpay)&&(validate_email($_SESSION["random"]["stormpay"]))){$page_content.=add_stormpay($CONFIG->randomfee,$_SESSION["random"]["stormpay"],"2");}

if(($CONFIG->allowegold)&&(!empty($_SESSION["random"]["egold"]))){$page_content.=add_egold($CONFIG->randomfee,$_SESSION["random"]["egold"],"2");}
if(($CONFIG->allowlibertyreserve)&&(!empty($_SESSION["random"]["libertyreserve"]))){$page_content.=add_libertyreserve($CONFIG->randomfee,$_SESSION["random"]["libertyreserve"],"2");}

if(($CONFIG->allowassuredpay)&&(!empty($_SESSION["random"]["assuredpay"]))){$page_content.=add_assuredpay($CONFIG->randomfee,$_SESSION["random"]["assuredpay"],"2");}

if(($CONFIG->allowsolidtrustpay)&&(!empty($_SESSION["random"]["solidtrustpay"]))){$page_content.=add_solidtrustpay($CONFIG->randomfee,$_SESSION["random"]["solidtrustpay"],"2");}
if(($CONFIG->allowfleetpay)&&(!empty($_SESSION["random"]["fleetpay"]))){$page_content.=add_fleetpay($CONFIG->randomfee,$_SESSION["random"]["fleetpay"],"2");}
if(($CONFIG->allowdollardeliverys)&&(!empty($_SESSION["random"]["dollardeliverys"]))){$page_content.=add_dollardeliverys($CONFIG->randomfee,$_SESSION["random"]["dollardeliverys"],"2");}
if(($CONFIG->allowmoneybookers)&&(!empty($_SESSION["random"]["moneybookers"]))){$page_content.=add_moneybookers($CONFIG->randomfee,$_SESSION["random"]["moneybookers"],"2");}
$page_content.="</fieldset>";
break;
/**************************ADMIN*********************************/
case 'adminul':
$_SESSION["sponsor1"]["pay"]='ok';


//24-4-2018 satyajeet




// -----  24 april 2018


/*

if(   isset($_POST['txn_id']) && $_POST['txn_id'] !=null  ){

$satya=mysql_query("select * from users where id='1'");
$rss = mysql_fetch_array($satya);


$to =$rss["paypal"];
$to_sponsor =$_SESSION["sponsor"]["paypal"];

$subject = "TRANSACTION VERIFICATION_222to";
$subject_sponsor = $_SESSION["sponsor"]["firstname"];
$subject_sponsor .=", Did You Receive A Payment From This Buyer?222sponsor";


$message = "
<html>
<head>
<title>EMAIL TO ADMIN</title>
</head>
<body>

Hi Admin,<br>
Below are the details of a recent payment you received.
<br>
<table border='1'>";

  
 $message .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message .=$_POST['first_name']; $message .="</td></tr>";
 $message .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message .=$_POST['last_name'];$message .="</td></tr>";
  $message .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message .=$_POST['payer_email'];$message .="</td></tr>";
   $message .= "<tr><td>TRANSACTION ID:</td><td>";$message .=$_POST['txn_id'];$message .="</td></tr>";
    $message .= "<tr><td>PAYEMENT STATUS:</td><td>";$message .=$_POST['payment_status'];$message .="</td></tr>";
     $message .= "<tr><td>SPONSOR USERNAME:</td><td>";$message .=$_SESSION["sponsor"]["username"];$message .="</td></tr>";
      $message .= "<tr><td>SPONSOR EMAIL ADDRESS:</td><td>";$message .=$_SESSION["sponsor"]["paypal"];$message .="</td></tr>";


$message .="</table>

Regards,<br>
System Admin

</body>
</html>
";


$message_sponsor = "
<html>
<head>
<title>EMAIL TO SPONSOR</title>
</head>
<body>

Hi ";$message_sponsor .= $_SESSION["sponsor"]["first_name"]; $message_sponsor .= ",<br>
Admin here.  We just receive our admin payment from the buyer below and would like to know if you receive your
sponsor payment from this Buyer.  Please respond to this email with a Yes or No.  If your answer is
No, then we will investigate and let you know what happened.  Below are the buyer's details:

<br>
<table border='1'>";

 $message_sponsor .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message_sponsor .=$_SESSION["sponsor"]["firstname"]; $message_sponsor .="</td></tr>";
 $message_sponsor .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message_sponsor .=$_SESSION["sponsor"]["lastname"];$message_sponsor .="</td></tr>";
  $message_sponsor .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message_sponsor .=$_POST['payer_email'];
  $message_sponsor .="</td></tr>";
  

$message .="</table>

Sincerely,<br>

Admin

EZ-MoneyMaker.com


</body>
</html>
";


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <satyajeet.kesharia@gmail.com>' . "\r\n";
$headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";


mail($to,$subject,$message,$headers);

mail($to_sponsor,$subject_sponsor,$message_sponsor,$headers);
}

*/

// -----  24 april 2018



//24-4-2018 satyajeet


$page_content="
<div align=center class=text>
<b>Final step!<br>Pay the $CONFIG->sitename admin<br></b>";
$page_content.="
<fieldset class=text><legend>Please Pay The Admin  "; $page_content.=$CONFIG->adminfee; $page_content.=" </legend>
";
$q1=db_fetch_array(db_query("select username , paypal ,stormpay,egold,libertyreserve ,assuredpay from users where id='1'"));
//include the payment forms

//if($CONFIG->allowpaypal){$page_content.=add_paypal($CONFIG->adminfee,$q1["paypal"],"3");}
if($CONFIG->allowpaypal){$page_content.=add_paypal($CONFIG->adminfee,$q1["paypal"],"3"  ,$_SESSION["sponsor"]["username"],$_SESSION["sponsor"]["email"],$rss["firstname"],$rss["lastname"]  );}



if($CONFIG->allowstormpay){$page_content.=add_stormpay($CONFIG->adminfee,$q1["stormpay"],"3");}

if($CONFIG->allowegold){$page_content.=add_egold($CONFIG->adminfee,$q1["egold"],"3");}

if($CONFIG->allowlibertyreserve){$page_content.=add_libertyreserve($CONFIG->adminfee,$q1["libertyreserve"],"3");}

if($CONFIG->allowassuredpay){$page_content.=add_assuredpay($CONFIG->adminfee,$q1["assuredpay"],"3");}
if($CONFIG->allosolidtrustpay){$page_content.=add_solidtrustpay($CONFIG->adminfee,$q1["solidtrustpay"],"3");}

if($CONFIG->allowfleetpay){$page_content.=add_fleetpay($CONFIG->adminfee,$q1["fleetpay"],"3");}
if($CONFIG->allodollardeliverys){$page_content.=add_dollardeliverys($CONFIG->adminfee,$q1["dollardeliverys"],"3");}

if($CONFIG->allowmoneybookers){$page_content.=add_moneybookers($CONFIG->adminfee,$q1["moneybookers"],"3");}
$page_content.="</fieldset>";
break;

}
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>
