<?




if(   ($_POST['tr_id'] !=null) && ($_POST['status'] =='COMPLETE')  ){
        include'config.php';
        require_once("db_connect.php");


if(  isset($_POST['user9']) && $_POST['user9'] !=null  ){ 


$payer_id  =$_POST['user5'];  
$myItemCode= $_POST['user1']; 
$item_name=  $_POST['user2'];  
//$payment_gross= $_POST['custom'];
      $payment_gross= $_POST['user1'] ." ".$_POST['user2']." for User ID: ".$_POST['user3']." ".$_POST['user4'];
$amount=$_POST['user6'];     
$login_processor= $_POST['user8']; 
$payment_date= $_POST['user7']; 
$txn_id= $_POST['tr_id'];         
    
//    $payer_email= $_MYVAR['nine9']; 
  $payer_email=$_POST['payerAccount'];


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

  $sql_in_update="update url_unassigned_login_credits set  login_credits = login_credits + ".$myItemCode." ,transaction_date = '".$payment_date."' where user_id=  '".$payer_id."'  ";

        mysqli_query($GLOBALS["___mysqli_ston"], $sql_in_update);  
        ((is_null($___mysqli_res = mysqli_close($connection))) ? false : $___mysqli_res); 
}
echo "Things updated..";  exit;
}




         $cccc = $_POST['memo'];
         $dddd = $_POST['merchantAccount']; 


if( $dddd=='wespac' ){
$q= mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE users  set membership_status= 'Pro Member' WHERE username ='". $cccc ."' and id>'1'  "); 

                      }





//        parse_str($_POST['custom'],$_MYVAR);

        $satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where id='1'");
  $rss = mysqli_fetch_array($satya); 
  $to =$rss["paypal"];  
  $to_sponsor =$_POST['user2']; 
  $subject = "TRANSACTION VERIFICATION";
  $subject_sponsor = $_POST['user3'];   
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
    $message .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message .=$_POST['payerAccount'];$message .="</td></tr>";
     $message .= "<tr><td>TRANSACTION ID:</td><td>";$message .=$_POST['tr_id'];$message .="</td></tr>";
      $message .= "<tr><td>PAYEMENT STATUS:</td><td>";$message .=$_POST['status'];$message .="</td></tr>";
       $message .= "<tr><td>SPONSOR USERNAME:</td><td>";$message .=$_POST['user1'];$message .="</td></tr>";
        $message .= "<tr><td>SPONSOR EMAIL ADDRESS:</td><td>";$message .=$_POST['user2'];$message .="</td></tr>";


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
  
  Hi ";$message_sponsor .= $_POST['user3']; $message_sponsor .= ",<br><br>
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
    $message_sponsor .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message_sponsor .=$_POST['payerAccount'];
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
//  $headers .= 'From: <satyajeet.kesharia@gmail.com>' . "\r\n";  
  $headers .= 'From: '.$CONFIG->sitename.' <'.$CONFIG->support.'>' . "\r\n";
  
        //$headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";
  
    mail($to,$subject,$message,$headers);
    mail($to_sponsor,$subject_sponsor,$message_sponsor,$headers); 
    
             
    
}

else {  
        include'config.php';
  require_once("db_connect.php");
  
  
  
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
    $message .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message .=$_POST['payerAccount'];$message .="</td></tr>";
     $message .= "<tr><td>TRANSACTION ID:</td><td>";$message .=$_POST['tr_id'];$message .="</td></tr>";
      $message .= "<tr><td>PAYEMENT STATUS:</td><td>";$message .=$_POST['status'];$message .="</td></tr>";
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
//  $headers .= 'From: <satyajeet.kesharia@gmail.com>' . "\r\n";
        $headers .= 'From: '.$CONFIG->sitename.' <'.$CONFIG->support.'>' . "\r\n";
        //$headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";
  
      if(   empty($_POST['txn_id']) || $_POST['status'] !='COMPLETE'  ){
             mail($to,$subject,$message,$headers);    
      }
}

?>