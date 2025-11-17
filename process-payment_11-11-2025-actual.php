<?php


require 'vendor/autoload.php';

use Square\SquareClient;
use Square\Exceptions\ApiException;
use Square\Models\CreatePaymentRequest;
use Square\Models\Money;
use Square\Environment;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // =======================
    // STEP 1: Square Settings
    // =======================
    $accessToken = 'EAAAl15H58Zkiy5zQBHw5X5W-GAf-mIHzHj-dEBTqvZmnYrMR0jW6eK2iSKx7xxe'; // Sandbox Access Token
    $locationId  = 'LEEBJ3DMZ3GRC'; // Sandbox Location ID
    $environment = Environment::SANDBOX; // Change to PRODUCTION later

    // =======================
    // STEP 2: Initialize Square Client
    // =======================
    $client = new SquareClient([
        'accessToken' => $accessToken,
        'environment' => $environment
    ]);

    // =======================
    // STEP 3: Handle amount
    // =======================
    $rawAmount = isset($_POST['amount']) && is_numeric($_POST['amount'])
        ? floatval($_POST['amount'])
        : 2.00; // Default $2.00

    $amount = intval(round($rawAmount * 100)); // convert to cents
    $currency = 'USD';
    $sourceId = $_POST['nonce'] ?? 'cnon:card-nonce-ok'; // Default Sandbox nonce

    // =======================
    // STEP 4: Create Money object
    // =======================
    $money = new Money();
    $money->setAmount($amount);
    $money->setCurrency($currency);

    // =======================
    // STEP 5: Build Payment Request
    // =======================
    $idempotencyKey = uniqid('sq_', true);

    $paymentRequest = new CreatePaymentRequest($sourceId, $idempotencyKey);
    $paymentRequest->setAmountMoney($money);
    $paymentRequest->setAutocomplete(true);
    $paymentRequest->setLocationId($locationId);
    $paymentRequest->setNote($_POST['item_id'] ?? 'Square Transaction');

    // =======================
    // STEP 6: Execute Payment
    // =======================
    try {
        $paymentsApi = $client->getPaymentsApi();
        $response = $paymentsApi->createPayment($paymentRequest);

        if ($response->isSuccess()) {
            $payment = $response->getResult()->getPayment();
            $transactionId = $payment->getId();
            $status = $payment->getStatus(); //COMPLETED
            
            
            $_POST['txn_id']= $transactionId;
            $_POST['tr_id'] = $transactionId;
            $_POST['status'] = $status;
            
            $amountPaid = $payment->getAmountMoney()->getAmount() / 100;

            // =======================
            // STEP 7: Database Operations (your logic)
            // =======================
            include 'config.php';
            require_once("db_connect.php");

            if (isset($_POST['user9']) && $_POST['user9'] != null) {

                $payer_id = $_POST['user5'];
                $myItemCode = $_POST['user1'];
                $item_name = $_POST['user2'];
                $payment_gross = $_POST['user1'] . " " . $_POST['user2'] . " for User ID: (" . $_POST['user3'] . " " . $_POST['user4'] . ")";
                $amount = $_POST['amount'];
                $login_processor = $_POST['user8'];
                $payment_date = $_POST['user7'];
                $txn_id = $transactionId;
                $payer_email = $_POST['payerAccount'];
                $payerAccount = $_POST['payerAccount'];

                // Insert transaction record
                if ($_POST['page_name'] == 'buy_traffic_credits')
                    $sql = "INSERT INTO traffic_transactions (id, user_id, traffic_quantity, traffic_item_name, traffic_product_description, traffic_amount, traffic_purchase_date, traffic_transaction_id, traffic_processor, traffic_payer_email)
                            VALUES (NULL , '$payer_id', '$myItemCode', '$item_name', '$payment_gross', '$amount', '$payment_date', '$txn_id', '$login_processor', '$payer_email')";

                if ($_POST['page_name'] == 'buy_login_credits')
                    $sql = "INSERT INTO url_login_transactions (id, user_id, login_quantity, login_item_name, login_product_description, login_amount, login_purchase_date, login_transaction_id, login_processor, login_payer_email)
                            VALUES (NULL , '$payer_id', '$myItemCode', '$item_name', '$payment_gross', '$amount', '$payment_date', '$txn_id', '$login_processor', '$payer_email')";

                mysqli_query($GLOBALS["___mysqli_ston"], $sql);

                // Update or insert credits
                if ($_POST['page_name'] == 'buy_traffic_credits')
                    $quer11 = mysqli_query($GLOBALS["___mysqli_ston"], "select * from unassigned_traffic_credits where user_id='$payer_id'");

                if ($_POST['page_name'] == 'buy_login_credits')
                    $quer11 = mysqli_query($GLOBALS["___mysqli_ston"], "select * from url_unassigned_login_credits where user_id='$payer_id'");

                $num11 = mysqli_num_rows($quer11);

                if ($num11 == 0) {
                    if ($_POST['page_name'] == 'buy_traffic_credits')
                        $sql_in = "INSERT INTO unassigned_traffic_credits (user_id, traffic_credits, transaction_date)
                                   VALUES ('$payer_id', '$myItemCode', '$payment_date')";

                    if ($_POST['page_name'] == 'buy_login_credits')
                        $sql_in = "INSERT INTO url_unassigned_login_credits (user_id, login_credits, transaction_date)
                                   VALUES ('$payer_id', '$myItemCode', '$payment_date')";

                    mysqli_query($GLOBALS["___mysqli_ston"], $sql_in);
                } else {
                    if ($_POST['page_name'] == 'buy_traffic_credits')
                        $sql_in_update = "UPDATE unassigned_traffic_credits 
                                          SET traffic_credits = traffic_credits + $myItemCode,
                                              transaction_date = '$payment_date'
                                          WHERE user_id='$payer_id'";

                    if ($_POST['page_name'] == 'buy_login_credits')
                        $sql_in_update = "UPDATE url_unassigned_login_credits 
                                          SET login_credits = login_credits + $myItemCode,
                                              transaction_date = '$payment_date'
                                          WHERE user_id='$payer_id'";

                    mysqli_query($GLOBALS["___mysqli_ston"], $sql_in_update);
                }

                // Update membership
                $q = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE users SET membership_status='Pro Member' WHERE username='$payer_id' AND id>'1'");
                if (!$q) die('Error updating user membership: ' . mysqli_error($GLOBALS["___mysqli_ston"]));





/////////////success//////////////


         $cccc = $_POST['memo'];
         $dddd = $_POST['merchantAccount']; 


if( $dddd=='wespac' ){
$q= mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE users  set membership_status= 'Pro Member' WHERE username ='". $cccc ."' and id>'1'  "); 

                      }





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

  
   $message .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message .=$_SESSION['user']['firstname']; $message .="</td></tr>";
   $message .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message .=$_SESSION['user']['lastname'];$message .="</td></tr>";
    $message .= "<tr><td>BUYER'S Square PAY USERNAME: </td><td>";$message .=$payerAccount;$message .="</td></tr>";
     $message .= "<tr><td>Payment ID:</td><td>";$message .=$_POST['tr_id'];$message .="</td></tr>";
     
     $message .= "<tr><td>PAYMENT CREATED AT:</td><td>" . $payment->getCreatedAt() . "</td></tr>";
     
    
     
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
    
    $message_sponsor .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message_sponsor .=$_SESSION['user']['firstname']; $message_sponsor .="</td></tr>";
    $message_sponsor .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message_sponsor .=$_SESSION['user']['lastname'];$message_sponsor .="</td></tr>";
    
    $message_sponsor .= "<tr><td>Payment Created At:</td><td>";$message_sponsor .=$payment->getCreatedAt();$message_sponsor .="</td></tr>";
    
    $message_sponsor .= "<tr><td>BUYER'S Square PAY USERNAME: </td><td>";$message_sponsor .=$payerAccount;
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
  
        $headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";
  
    mail($to,$subject,$message,$headers);
    mail($to_sponsor,$subject_sponsor,$message_sponsor,$headers); 
    

/////////////////success///////////////////////    





                // Redirect after success
                //header("Location: http://localhost/buy_realtraffic/rusers/thank_you.php");
                header("Location: https://www.buy-realtraffic.com/rusers/thank_you.php");
                exit();
            }

            // Show success message (fallback if no redirect)
            
            
            
            
            
////////////////fail////////////////////


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

   $message .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message .=$n_name[0]; $message .="</td></tr>";
   $message .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message .=$n_name[1];$message .="</td></tr>";
    $message .= "<tr><td>BUYER'S Square PAY USERNAME: </td><td>";$message .=$_POST['user10'];$message .="</td></tr>";
     $message .= "<tr><td>Payment ID:</td><td>";$message .=$_POST['tr_id'];$message .="</td></tr>";
      $message .= "<tr><td>PAYEMENT STATUS:</td><td>";$message .=$_POST['status'];$message .="</td></tr>";    
          $message .= "<tr><td>BUYER'S EZMM USERNAME:</td><td>"; $message .=$_POST['user3']; $message .="</td></tr>";

}else{



   $message .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message .=$_POST['user6']; $message .="</td></tr>";
   $message .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message .=$_POST['user7'];$message .="</td></tr>";
    $message .= "<tr><td>BUYER'S Square PAY USERNAME: </td><td>";$message .=$_POST['user8'];$message .="</td></tr>";
     $message .= "<tr><td>Payment ID:</td><td>";$message .=$_POST['tr_id'];$message .="</td></tr>";
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
        $headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";
  
      if(   empty($_POST['txn_id']) || $_POST['status'] !='COMPLETE'  ){
             mail($to,$subject,$message,$headers);    
      }

////////////////fail////////////////////            

            
            
            echo "<h3>✅ Payment Successful!</h3>";
            echo "Transaction ID: $transactionId<br>";
            echo "Status: $status<br>";
            echo "Amount Paid: $$amountPaid<br>";

        } else {
            echo "<h3>⚠️ Square Payment Error:</h3>";
            foreach ($response->getErrors() as $error) {
                echo "• " . htmlspecialchars($error->getDetail()) . "<br>";
            }
        }

    } catch (ApiException $e) {
        echo "<h3>❌ Square API Exception:</h3>";
        echo "Message: " . htmlspecialchars($e->getMessage());
    }

} else {
    echo "<h3>🚫 Invalid Request Method</h3>";
}
?>
