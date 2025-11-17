<?
if(   isset($_POST['txn_id']) && $_POST['payment_status'] =='Completed'  ){

require_once("db_connect.php");
$satt=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where id='1'");
@session_register("sponsor_satt");
$_SESSION["sponsor_satt"]=mysqli_fetch_array($satt);
$_SESSION["sponsor_satt"]["my_ip"]= $_SERVER['REMOTE_ADDR'];
$_SESSION["sponsor_satt"]["mail"]= $_POST;


parse_str($_POST['custom'],$_MYVAR);

$satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where id='1'");
$rss = mysqli_fetch_array($satya);

$to =$rss["paypal"];
//$to_sponsor =$_SESSION["sponsor"]["paypal"] . ',' .$rss["paypal"];
$to_sponsor =$_MYVAR['two2'];

$subject = "TRANSACTION VERIFICATION";
$subject_sponsor = $_MYVAR['three3']; 

$subject_sponsor .=", Did You Receive A Payment From This Buyer?";

$message = "
<html>
<head>
<title>EMAIL TO ADMIN</title>
</head>
<body>

Hi Admin,<br><br>
Below are the details of a recent payment you received.
<br><br>
<table border='1'>";

  
 $message .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message .=$_POST['first_name']; $message .="</td></tr>";
 $message .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message .=$_POST['last_name'];$message .="</td></tr>";
  $message .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message .=$_POST['payer_email'];$message .="</td></tr>";
   $message .= "<tr><td>TRANSACTION ID:</td><td>";$message .=$_POST['txn_id'];$message .="</td></tr>";
    $message .= "<tr><td>PAYEMENT STATUS:</td><td>";$message .=$_POST['payment_status'];$message .="</td></tr>";
     $message .= "<tr><td>SPONSOR USERNAME:</td><td>";$message .=$_MYVAR['one1'];$message .="</td></tr>";
      $message .= "<tr><td>SPONSOR EMAIL ADDRESS:</td><td>";$message .=$_MYVAR['two2'];$message .="</td></tr>";


$message .="</table>
<br><br>
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

Hi ";$message_sponsor .= $_MYVAR['three3']; $message_sponsor .= ",<br>
Admin here.  We just receive our admin payment from the buyer below and 
<br>
would like to know if you receive your sponsor payment from this Buyer. 
<br> 
Please respond to this email with a Yes or No. If your answer is No, then 
<br>
we will investigate and let you know what happened. Below are the buyer's details:
<br><br>


<table border='1'>";
 
  
    $message_sponsor .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message_sponsor .=$_POST['first_name']; $message_sponsor .="</td></tr>";
 $message_sponsor .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message_sponsor .=$_POST['last_name'];$message_sponsor .="</td></tr>";
  $message_sponsor .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message_sponsor .=$_POST['payer_email'];
  $message_sponsor .="</td></tr>";
 

$message_sponsor .="</table>

<br><br>

Admin
<br>
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



	    if(   isset($_POST['txn_id']) && $_POST['payment_status'] =='Completed'  )
	       {	
		mail($to,$subject,$message,$headers);
		mail($to_sponsor,$subject_sponsor,$message_sponsor,$headers);
		
		
		$username =$_SESSION["user"]["username"];
		$password =$_SESSION["user"]["password"];
     //$q= mysql_query("UPDATE users  set membership_status= 'Pro Member'	WHERE username = '$username' AND password = '$password' and id>'1' "); 
		$q= mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE users  set membership_status= 'Pro Member'	WHERE username = '$username'  and id>'1'	"); 
		}


}

else {   //satyajeet else satyejet else




require_once("db_connect.php");
$satt=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where id='1'");
@session_register("sponsor_satt");
$_SESSION["sponsor_satt"]=mysqli_fetch_array($satt);

$_SESSION["sponsor_satt"]["my_ip"]= $_SERVER['REMOTE_ADDR'];
$_SESSION["sponsor_satt"]["mail"]= $_POST;



parse_str($_POST['custom'],$_MYVAR);

$satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where id='1'");
$rss = mysqli_fetch_array($satya);


$to =$rss["paypal"];

$subject = "INVALID TRANSACTION";


$message = "
<html>
<head>
<title>EMAIL TO ADMIN</title>
</head>
<body>

Hi Admin,<br><br>
Your system just receive an Invalid Transaction.
<br>
Below are the buyer's details:
<br><br>
<table border='1'>";


  
 $message .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message .=$_POST['first_name']; $message .="</td></tr>";
 $message .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message .=$_POST['last_name'];$message .="</td></tr>";
  $message .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message .=$_POST['payer_email'];$message .="</td></tr>";
   $message .= "<tr><td>TRANSACTION ID:</td><td>";$message .=$_POST['txn_id'];$message .="</td></tr>";
    $message .= "<tr><td>PAYEMENT STATUS:</td><td>";$message .=$_POST['payment_status'];$message .="</td></tr>";
    // $message .= "<tr><td>SPONSOR USERNAME:</td><td>";$message .=$_MYVAR['one1'];$message .="</td></tr>";
    //  $message .= "<tr><td>SPONSOR EMAIL ADDRESS:</td><td>";$message .=$_MYVAR['two2'];$message .="</td></tr>";
        $message .= "<tr><td>BUYER'S USERNAME:</td><td>"; $message .=$username; $message .="</td></tr>";

$message .="</table>
<br><br>
Regards,<br>
System Admin

</body>
</html>
";



// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <satyajeet.kesharia@gmail.com>' . "\r\n";
$headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";

    if(   empty($_POST['txn_id']) || $_POST['payment_status'] !='Completed'  ){
           mail($to,$subject,$message,$headers);    
    }


   //satyajeet else satyajeet else

}





// -----  24 april 2018
?>