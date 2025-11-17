<?php  
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $apiLoginId = $_POST['api_login_id'];
//     $transactionKey = $_POST['transaction_key'];

//     // Use $apiLoginId and $transactionKey in your Authorize.Net API request
//     // Add the necessary Authorize.Net API integration code here

//     // Example: Process payment and display response
//     $cardNumber = $_POST['card_number'];
//     $expirationDate = $_POST['expiration_date'];
//     $cvv = $_POST['cvv'];
//     $amount = $_POST['amount'];

//     // Implement your Authorize.Net API integration here
//     // Use the provided credentials to make the API call
//     // Handle the payment processing logic and response

//     // For simplicity, let's just echo the values for demonstration purposes
//     echo "API Login ID: $apiLoginId<br>";
//     echo "Transaction Key: $transactionKey<br>";
//     echo "Card Number: $cardNumber<br>";
//     echo "Expiration Date: $expirationDate<br>";
//     echo "CVV: $cvv<br>";
//     echo "Amount: $amount<br>";

//     // Add your Authorize.Net API integration code here
// }
?>




<?php

// include'config.php';
// include("$CONFIG->templatedir/SiteSettingClass.php"); 

//     $sitesettingObj = new SiteSetting;   
//     $sitesettingObj->GetSitesetting();    
//     $merchant_login_id = $sitesettingObj->merchant_login_id;
//     $merchant_transaction_key = $sitesettingObj->merchant_transaction_key; 



require 'vendor/autoload.php'; // Include the Composer autoloader

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get your Authorize.Net API credentials
                           //$loginId = '3j75UPx6A8qH'; //sandbox
                           //$transactionKey = '6c6wHB2c9S2J6k33';


                         $loginId = $_POST['merchant_login_id'];
                         $transactionKey = $_POST['merchant_transaction_key'];  



                        //$loginId = '9CkP6L3dH';
                        //  $transactionKey = '9Dy5n3wJ3Q7tu49a';

                        
                                    // Set billing address details
                                        $billingAddress = new AnetAPI\CustomerAddressType();
                                        $billingAddress->setCity($_POST['x_city']);
                                        $billingAddress->setState($_POST['x_state']);
                                        $billingAddress->setFirstName($_POST['x_first_name']);
                                        $billingAddress->setLastName($_POST['x_last_name']);
                                        $billingAddress->setAddress($_POST['x_address']);
                                        $billingAddress->setZip($_POST['x_zip']);
                                        $billingAddress->setCountry($_POST['x_country']); 
                                        $billingAddress->setPhoneNumber(isset($_POST['x_phone']) ? $_POST['x_phone'] : '9999999999'); // Adjust this line
                                        $email = filter_var($_POST['x_email'], FILTER_VALIDATE_EMAIL);
                                        $billingAddress->setEmail($email ? $email : 'satyajeet.kesharia@gmail.com');
                                        
                                        
                                        

    // Create a new credit card object
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($_POST['card_number']);
    $creditCard->setExpirationDate($_POST['expiration_date']);
    $creditCard->setCardCode($_POST['cvv']);

                            
                                  //  $creditCard->setBillingAddress($billingAddress);
                                  
                                

    // Create a payment object using the credit card details
    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);
                                                                                
                                                                                //$paymentOne->setBillTo($billingAddress);
                                                                                //$paymentOne->setCustomer($billingAddress);




    // Create an order
    $order = new AnetAPI\OrderType();
    $order->setDescription($_POST['item_id']);



    // Create a transaction request
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType('authCaptureTransaction');
    $transactionRequestType->setAmount($_POST['amount']);
    $transactionRequestType->setOrder($order);
    $transactionRequestType->setPayment($paymentOne);
    $transactionRequestType->setBillTo($billingAddress);
                                                                                //$transactionRequestType->setCustomer($billingAddress);
    
//$transactionRequestType->setCity($_POST['x_city']);    

    // Create a request
    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication(new AnetAPI\MerchantAuthenticationType());
    $request->getMerchantAuthentication()->setName($loginId);
    $request->getMerchantAuthentication()->setTransactionKey($transactionKey);
    $request->setTransactionRequest($transactionRequestType);

    // Make the API call
    $controller = new AnetController\CreateTransactionController($request);
            //$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
            //$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
            
            if($_POST['payment_g_type'] == 'SANDBOX')
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
            else
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
            
        

    // Check if the transaction was successful
    if ($response != null) {
        // Check to see if the API request was successfully received and acted upon
        if ($response->getMessages()->getResultCode() == "Ok") {
            // Since the API request was successful, look for a transaction response
            // and parse it to display the results of authorizing the card
            $tresponse = $response->getTransactionResponse();
        
            if ($tresponse != null && $tresponse->getMessages() != null) { //echo "<pre>"; print_r($_POST);
                //echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                
                
                
                
                
                //response->getMessages()->getResultCode() == "Ok"
                //echo $tresponse->getResponseCode(); echo "ffffff"; die;
if(   ($tresponse->getTransId()!=null)   && ($response->getMessages()->getResultCode() == "Ok")   ){ //7 jan 2024
        include'config.php';
        require_once("db_connect.php");


if(  isset($_POST['user9']) && $_POST['user9'] !=null  ){ 


$payer_id  =$_POST['user5'];  
$myItemCode= $_POST['user1']; 
$item_name=  $_POST['user2'];  
//$payment_gross= $_POST['custom'];
      $payment_gross= $_POST['user1'] ." ".$_POST['user2']." for User ID: (".$_POST['user3']." ".$_POST['user4'].")";
$amount=$_POST['amount'];     
$login_processor= $_POST['user8']; 
$payment_date= $_POST['user7']; 
$txn_id= $tresponse->getTransId() ;         
    
//    $payer_email= $_MYVAR['nine9']; 
  $payer_email=$_POST['payerAccount'];
$payerAccount=$_POST['payerAccount'];


if($_POST['page_name'] == 'buy_traffic_credits')
 $sql = "INSERT INTO  traffic_transactions (id, user_id, traffic_quantity, traffic_item_name, traffic_product_description, traffic_amount, traffic_purchase_date, traffic_transaction_id,  traffic_processor,  traffic_payer_email)
    VALUES (NULL ,  '$payer_id',  '$myItemCode',  '$item_name',  '$payment_gross',  '$amount',  '$payment_date',  '$txn_id', '$login_processor',  '$payer_email')";

if($_POST['page_name'] == 'buy_login_credits')
 $sql = "INSERT INTO  url_login_transactions (id, user_id, login_quantity, login_item_name, login_product_description, login_amount, login_purchase_date, login_transaction_id,  login_processor,  login_payer_email)
    VALUES (NULL ,  '$payer_id',  '$myItemCode',  '$item_name',  '$payment_gross',  '$amount',  '$payment_date',  '$txn_id', '$login_processor',  '$payer_email')";
    
    

             mysqli_query($GLOBALS["___mysqli_ston"], $sql); 

if($_POST['page_name'] == 'buy_traffic_credits')
 $quer11=mysqli_query($GLOBALS["___mysqli_ston"], "select * from unassigned_traffic_credits where user_id='$payer_id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
 
 if($_POST['page_name'] == 'buy_login_credits')
 $quer11=mysqli_query($GLOBALS["___mysqli_ston"], "select * from url_unassigned_login_credits where user_id='$payer_id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
 
 
 $num11=mysqli_num_rows($quer11); 

//if( $num==0 && $num11==0 )
if( $num11==0 )
{
    if($_POST['page_name'] == 'buy_traffic_credits')
  $sql_in = "INSERT INTO  unassigned_traffic_credits (user_id, traffic_credits, transaction_date)
                                    VALUES ( '$payer_id',  '$myItemCode',  '$payment_date')";
                                    
if($_POST['page_name'] == 'buy_login_credits')
  $sql_in = "INSERT INTO  url_unassigned_login_credits (user_id, login_credits, transaction_date)
                                    VALUES ( '$payer_id',  '$myItemCode',  '$payment_date')";
                   
            mysqli_query($GLOBALS["___mysqli_ston"], $sql_in); 
            ((is_null($___mysqli_res = mysqli_close($connection))) ? false : $___mysqli_res); 

} else{ 

if($_POST['page_name'] == 'buy_traffic_credits')
  $sql_in_update="update unassigned_traffic_credits set  traffic_credits = traffic_credits + ".$myItemCode." ,transaction_date = '".$payment_date."' where user_id=  '".$payer_id."'  ";
  
  if($_POST['page_name'] == 'buy_login_credits')
  $sql_in_update="update url_unassigned_login_credits set  login_credits = login_credits + ".$myItemCode." ,transaction_date = '".$payment_date."' where user_id=  '".$payer_id."'  ";

        mysqli_query($GLOBALS["___mysqli_ston"], $sql_in_update);  
       // ((is_null($___mysqli_res = mysqli_close($connection))) ? false : $___mysqli_res); 
}   
//echo "Things updated..";  exit;
}




         $cccc = $payer_id;
         

                 //echo "UPDATE users  set membership_status= 'Pro Member' WHERE username ='". $cccc ."' and id>'1'  "; die;

$q= mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE users  set membership_status= 'Pro Member' WHERE username ='". $cccc ."' and id>'1'  "); 

if (!$q) {
    die('Error updating user membership status: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}

header("Location: https://www.buy-realtraffic.com/rusers/thank_you.php");
exit();



//        parse_str($_POST['custom'],$_MYVAR);

        $satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where id='1'");
  $rss = mysqli_fetch_array($satya); 
//  $to =$rss["paypal"];  
  $to =$rss["email"];  
//    $to ="satyajeet.kesharia@gmail.com";
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

  
   $message .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message .=$_POST['user6']; $message .="</td></tr>";
   $message .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message .=$_POST['user7'];$message .="</td></tr>";
    $message .= "<tr><td>BUYER'S SOLIDTRUST PAY USERNAME: </td><td>";$message .=$payerAccount;$message .="</td></tr>";
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
    
    $message_sponsor .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message_sponsor .=$_POST['user6']; $message_sponsor .="</td></tr>";
    $message_sponsor .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message_sponsor .=$_POST['user7'];$message_sponsor .="</td></tr>";
    $message_sponsor .= "<tr><td>BUYER'S SOLIDTRUST PAY USERNAME: </td><td>";$message_sponsor .=$payerAccount;
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
  
  $payerAccount=$_POST['payerAccount'];
  
  $satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where id='1'");
  $rss = mysqli_fetch_array($satya);
  
//  $to =$rss["paypal"];
    $to =$rss["email"];

// $to ="satyajeet.kesharia@gmail.com";


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

  

if(  isset($_POST['user9']) && $_POST['user9'] !=null  ){ 
       $string = substr($_POST['user4'], 1, -1);
       $n_name =explode(" ",$string);
       
       
       
       
       

 $payment_gross= $_POST['user1'] ." ".$_POST['user2']." for User ID: (".$_POST['user3']." ".$_POST['user4'].")"; 
       

   $message .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message .=$n_name[0]; $message .="</td></tr>";
   $message .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message .=$n_name[1];$message .="</td></tr>";
   
   $message .= "<tr><td>BUYER'S USER NAME:</td><td>";$message .=$_POST['user5'];$message .="</td></tr>";
   $message .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message .=$_POST['payerAccount'];$message .="</td></tr>";
   $message .= "<tr><td>PRODUCT DESCRIPTION: </td><td>";$message .=$payment_gross;$message .="</td></tr>";
   $message .= "<tr><td>PRODUCT COST: </td><td>";$message .=$_POST['amount'];$message .="</td></tr>";
    // $message .= "<tr><td>BUYER'S SOLIDTRUST PAY USERNAME: </td><td>";$message .=$_POST['user10'];$message .="</td></tr>";
     $message .= "<tr><td>TRANSACTION ID:</td><td>";$message .=$tresponse->getTransId();$message .="</td></tr>";
      $message .= "<tr><td>PAYEMENT STATUS:</td><td>";$message .='Fail';$message .="</td></tr>";    
          

}else{



   $message .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message .=$_POST['user6']; $message .="</td></tr>";
   $message .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message .=$_POST['user7'];$message .="</td></tr>";
    $message .= "<tr><td>BUYER'S SOLIDTRUST PAY USERNAME: </td><td>";$message .=$_POST['user8'];$message .="</td></tr>";
     $message .= "<tr><td>TRANSACTION ID:</td><td>";$message .=$_POST['tr_id'];$message .="</td></tr>";
      $message .= "<tr><td>PAYEMENT STATUS:</td><td>";$message .=$_POST['status'];$message .="</td></tr>";
      // $message .= "<tr><td>SPONSOR USERNAME:</td><td>";$message .=$_MYVAR['one1'];$message .="</td></tr>";
      //  $message .= "<tr><td>SPONSOR EMAIL ADDRESS:</td><td>";$message .=$_MYVAR['two2'];$message .="</td></tr>";
          $message .= "<tr><td>BUYER'S EZMM USERNAME:</td><td>"; $message .=$_POST['memo']; $message .="</td></tr>";

}


  
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
                                                         
      
             mail($to,$subject,$message,$headers);    
      
}
                
                
                
                
                
                
                
                
                
                
                
                
                
            } else {
                echo "Transaction Failed \n";
                if ($tresponse->getErrors() != null) {
                    echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                }
            }
            // Or, print errors if the API request wasn't successful
        } else {
            echo "Transaction Failed \n";
            $tresponse = $response->getTransactionResponse();
        
            if ($tresponse != null && $tresponse->getErrors() != null) {
                echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
            } else {
                echo " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                echo " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
            }
        }
    } else {
        echo  "No response returned \n";
    }

    return $response;
}

if (!defined('DONT_RUN_SAMPLES')) {
    chargeCreditCard("2.23");

}
?>
