<?
if(   ($_POST['txn_id'] !=null) && ($_POST['payment_status'] =='Completed')  ){
        include'config.php';
        require_once("db_connect.php");


if (strpos($_POST['custom'], 'nine9') !== false){ 

parse_str($_POST['custom'],$_MYVAR);
//echo $_MYVAR['one1'];
//echo $_MYVAR['two2'];
//echo $_MYVAR['three3'];
//echo $_MYVAR['four4'];
//echo $_MYVAR['five5'];
//echo $_MYVAR['six6'];
//echo $_MYVAR['seven7'];
//echo $_MYVAR['eight8'];
//echo $_MYVAR['nine9'];


$payer_id  =$_MYVAR['five5'];  
$myItemCode= $_MYVAR['one1']; 
$item_name=  $_MYVAR['two2'];  
//$payment_gross= $_POST['custom'];
      $payment_gross= $_MYVAR['one1'] ." ".$_MYVAR['two2']." for User ID: ".$_MYVAR['three3']." ".$_MYVAR['four4'];
$amount=$_MYVAR['six6'];     
$login_processor= $_MYVAR['eight8']; 
$payment_date= $_MYVAR['seven7']; 
$txn_id= $_POST['txn_id'];         
//$payer_email= $_MYVAR['nine9']; 
  $payer_email=$_POST['payer_email'];


 $sql = "INSERT INTO  url_login_transactions (id, user_id, login_quantity, login_item_name, login_product_description, login_amount, login_purchase_date, login_transaction_id,  login_processor,  login_payer_email)
    VALUES (NULL ,  '$payer_id',  '$myItemCode',  '$item_name',  '$payment_gross',  '$amount',  '$payment_date',  '$txn_id', '$login_processor',  '$payer_email')";

             mysqli_query($GLOBALS["___mysqli_ston"], $sql); 


 $quer11=mysqli_query($GLOBALS["___mysqli_ston"], "select * from url_unassigned_login_credits where user_id='$payer_id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
 $num11=mysqli_num_rows($quer11); 


//if( $num==0 && $num11==0 )
if( $num11==0 )
{
  $sql_in = "INSERT INTO  url_unassigned_login_credits (user_id, login_credits, transaction_date)
                                    VALUES ( '$payer_id',  '$myItemCode',  '$payment_date')";
                   
            mysqli_query($GLOBALS["___mysqli_ston"], $sql_in); 
            ((is_null($___mysqli_res = mysqli_close($connection))) ? false : $___mysqli_res); 


} else{ 

  $sql_in_update="update url_unassigned_login_credits set  login_credits = login_credits + ".$_MYVAR['one1']." ,transaction_date = '".$payment_date."' where user_id=  '".$payer_id."'  ";

        mysqli_query($GLOBALS["___mysqli_ston"], $sql_in_update);  
        ((is_null($___mysqli_res = mysqli_close($connection))) ? false : $___mysqli_res); 
}
echo "Things updated..";  exit;
}











        parse_str($_POST['custom'],$_MYVAR);
//	$username =$_SESSION["user"]["username"];
//	$q= mysql_query("UPDATE users  set membership_status= 'Pro Member'	WHERE username = '$username'  and id>'1' "); 
	$q= mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE users  set membership_status= 'Pro Member'	WHERE username ='". $_MYVAR['five5']  ."' and id>'1' "); 



//        parse_str($_POST['custom'],$_MYVAR);

        $satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where id='1'");
	$rss = mysqli_fetch_array($satya);	
	$to =$rss["paypal"];	
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
	
	Hi ";$message_sponsor .= $_MYVAR['three3']; $message_sponsor .= ",<br><br>
	Admin here.  We just received our admin payment from the buyer below and 
	<br>
	would like to know if you received your sponsor payment from this Buyer. 
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
//	$headers .= 'From: <satyajeet.kesharia@gmail.com>' . "\r\n";	
	$headers .= 'From: '.$CONFIG->sitename.' <'.$CONFIG->support.'>' . "\r\n";
	
        //$headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";
	
		mail($to,$subject,$message,$headers);
		mail($to_sponsor,$subject_sponsor,$message_sponsor,$headers);	
		
		
		
		
//from mycashback 10  6  2018		
/*	
	$query_satt=mysql_query("select * from users where email='$to_sponsor'");
	$ressult = mysql_fetch_array($query_satt); 	
	$required_id =$ressult["id"];
		
		
   $payer_id= $_POST['payer_id'];
   $myItemCode=$_POST['quantity'];
   $item_name =$_POST['item_name'];
   $payment_gross=$_POST['payment_gross'];
   $payment_date = $_POST['payment_date'];
   $txn_id = $_POST['txn_id'];
   $payer_email = $_POST['payer_email'];

   $sql = "SELECT item_name,login_cost_per_hundred, vc_log_email  FROM url_site_setting";
      $results = mysql_query($sql);
      $row = mysql_fetch_array($results);
      $my_db_item_name = $row['item_name'];


       if (  $_POST['txn_id'] != "" && $_POST['payment_status'] == 'Completed'){
       if ($my_db_item_name == "Login Credits") {
      $sql = "INSERT INTO  url_login_transactions (id, user_id, login_quantity, login_item_name, login_product_description, login_amount, login_purchase_date, login_transaction_id,  login_processor,  login_payer_email)
      VALUES (NULL ,  '$payer_id',  '$myItemCode',  'Login Credits',  '$item_name',  '$payment_gross',  '$payment_date',  '$txn_id',  'Palpal',       '$payer_email')";

                   mysql_query($sql);
               }

            $sql_se = "SELECT * FROM url_unassigned_login_credits WHERE user_id=$required_id";
            $result = mysql_query($sql_se);
            $row_num = mysql_num_rows($result);
            $row = mysql_fetch_array($result);




          if ($row_num > 0) {

          $sql_up = "UPDATE url_unassigned_login_credits SET login_credits=login_credits + $myItemCode, transaction_date=$payment_date WHERE user_id=$required_id";
          mysql_query($sql_up);

   $myFile = "IPNRes.txt";
          $fh = fopen($myFile,'a') or die("can't open the file");
          fwrite($fh, " updat SQL: ". $sql_up);

        } else {

            $sql_in = "INSERT INTO  url_unassigned_login_credits (bid, user_id, login_credits, transaction_date)
                                    VALUES (NULL ,  '$required_id',  '0',  '$payment_date')";
            mysql_query($sql_in);

            $sql_up = "UPDATE url_unassigned_login_credits SET login_credits=login_credits + $myItemCode, transaction_date=$payment_date WHERE user_id='$required_id'";
            mysql_query($sql_up);
          
        }
          


       }

*/	
		
		
		
		
//from mycashback 10  6  2018					
		
}

else {  
        include'config.php';
	require_once("db_connect.php");
	
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
//	$headers .= 'From: <satyajeet.kesharia@gmail.com>' . "\r\n";
        $headers .= 'From: '.$CONFIG->sitename.' <'.$CONFIG->support.'>' . "\r\n";
        //$headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";
	
	    if(   empty($_POST['txn_id']) || $_POST['payment_status'] !='Completed'  ){
	           mail($to,$subject,$message,$headers);    
	    }
}

?>