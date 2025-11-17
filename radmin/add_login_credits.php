<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Add Users";
include("$CONFIG->templatedir/header.php");  


$frm=$_POST;
if(!$frm){

$page_content=read_template("$CONFIG->templatedir/admin.login_credits.php");
$page_content=str_replace("#username#",$fill["username"] ?? '',$page_content);

$page_content=str_replace("#email#",$fill["email"] ?? '',$page_content);

}
else{
    
    
$page_content=read_template("$CONFIG->templatedir/admin.login_credits.php");
$page_content=str_replace("#username#",$fill["username"] ?? '',$page_content);

$page_content=str_replace("#email#",$fill["email"] ?? '',$page_content);
$err=0;



	if (username_exists($frm["username"])) { 
	    
	        $sql = "SELECT item_name,cost_per_unit, login_cost_per_thousand, vc_log_email, vc_log_security_code, login_cancel_url, login_return_url,paypal_email  FROM url_site_setting";
            $results = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
            $row = mysqli_fetch_array($results);
            $login_cost_per_thousand = $row['login_cost_per_thousand'];
            
    	    
    	    
	    
	        $satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where username='".$frm["username"]."'");
            $rss = mysqli_fetch_array($satya); 
            $payment_date=date ("Y-m-d H:i:s");
            $login_product_description = $frm["login_quantity"] ." Login Credits  for User ID:".$rss["username"]." (".$rss["firstname"] . " ". $rss["lastname"].")";
            
            
            
            $login_credits = $frm["login_quantity"];
    	    $amount = ($login_credits / 1000) * $login_cost_per_thousand; 
             $amount = sprintf ("%.2f", $amount);
	    
            
            $txn_id =0;
            $login_processor = "Authorize.Net";
            $payer_email = $rss["email"];
            
            $sql = "INSERT INTO  url_login_transactions (id, user_id, login_quantity, login_item_name, login_product_description, login_amount, login_purchase_date, login_transaction_id,  login_processor,  login_payer_email)
    VALUES (NULL ,'". $rss["username"]."',  ".$frm["login_quantity"].",  'Login Credits',  '$login_product_description',  '$amount',  '$payment_date',  '$txn_id', '$login_processor',  '$payer_email')";

             mysqli_query($GLOBALS["___mysqli_ston"], $sql); 
                             $quer11=mysqli_query($GLOBALS["___mysqli_ston"], "select * from url_unassigned_login_credits where user_id='".$frm["username"] ."'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
                             $num11=mysqli_num_rows($quer11); 
                            
                            if( $num11==0 )
                            {
                              $sql_in = "INSERT INTO  url_unassigned_login_credits (user_id, login_credits, transaction_date)
                                                                VALUES ( '".$frm["username"]."',  $login_credits,  '$payment_date')";
                                               
                                        mysqli_query($GLOBALS["___mysqli_ston"], $sql_in); 
                                        //((is_null($___mysqli_res = mysqli_close($connection))) ? false : $___mysqli_res); 
                            
                            } else{ 
                            
                             $sql_in_update="update url_unassigned_login_credits set  login_credits = login_credits + ".$login_credits." ,transaction_date = '".$payment_date."' where user_id=  '".$frm["username"]."'  ";
                            
                                    mysqli_query($GLOBALS["___mysqli_ston"], $sql_in_update);  
                                    //((is_null($___mysqli_res = mysqli_close($connection))) ? false : $___mysqli_res); 
                            }
                            
                $sql_in_update_p_mem = "UPDATE users  set membership_status= 'Pro Member' WHERE username ='". $rss["username"] ."' and id>'1'  ";
                mysqli_query($GLOBALS["___mysqli_ston"], $sql_in_update_p_mem);  
                ((is_null($___mysqli_res = mysqli_close($connection))) ? false : $___mysqli_res);                 
                            
            $msg = "<p class=text align=center>Message:<br><ul class=text>";
	    	$msg .= "<li>The username data saved</li>";
	    	$msg.="</ul></p>";
	    	echo $msg;
	    	
	    	
	    	
	$to =$rss["email"];
	
	$subject = $rss["firstname"].", Your Login Credits Have Been Added To Your Account";
	
	$message = "<html>
	<head>
	<title>EMAIL TO USER WHOSE JUST PURCHASED LOGIN CREDITS</title>
	</head>
	<body>
	
	Hi ";
	$message .= $rss["firstname"];
	$message .=",<br><br>
	Mike here.  Just a short note to let you know your Login Credits have been added to your 
<br>
account.  To assign these credits to your login sites, please log into your account, click on the Login
<br>
Sites & Stats link under the 'Stats' tab and follow the instructions on that page. 


<br><br>

Also, you can add up to 10 FREE banners and 10 FREE text ads.  To do so, log into your account,<br> click on the Banner Info and Text Ad Info links under 'Banners & Text Ads' and follow the instructions <br>on those pages.  If you have questions, please write us back.



<br><br>
Sincerely,
<br><br>
Mike
<br>
<a href=https://www.buy-realtraffic.com>https://www.buy-realtraffic.com</a>";
	    	
	    	
	    	
	    	
 $mailHeader = "From: ".$CONFIG->support. "<".$CONFIG->support. ">". "\r\n";
    	       $mailHeader .= "X-Sender: $CONFIG->support "."\r\n";
    	       $mailHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    	       $mailHeader .= "Return-Path: $CONFIG->support "."\r\n";
    	       $mailHeader .= "Error-To: $CONFIG->support "."\r\n";
    	       $mailHeader .= "X-Mailer: {$_SERVER['SERVER_NAME']} "."\r\n";
    	     
    	       $sponsor_email =$to;
    	    
               mail($sponsor_email,$subject,$message,$mailHeader);  
		
	    	
	    	
                            
	}
	else{
	    	$msg = "<p class=text align=center>The following error(s) occured:<br><ul class=text>";
	    	$msg .= "<li>The username is not exist</li>";
	    	$msg.="</ul></p>";
	    	echo $msg;
	}
}
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>