<?php  





include'../config.php';
include'../db_connect.php';

//echo "<pre>";  print_r($CONFIG); die;

    error_reporting(0);
  $day   = date('d');
    $month = date('m');
    $year  = date('Y');
    $today = date('Y-m-d');
    $today_txt     = $month."-".$day."-".$year; 
    $yesterday     = date('Y-m-d', mktime (0, 0, 0, $month, $day - 1, $year)); 
    $yesterday_txt = date('m-d-Y', mktime (0, 0, 0, $month, $day - 1, $year));







                  $global_admin_emailname = "Admin";
    $global_admin_email     = "admin@ez-moneymaker.com"; 

$to ="satyajeet.kesharia@gmail.com";

$subject = 'Website Change Request';

$mailHeader  = "From: " . $global_admin_emailname . "\r\n";
$mailHeader .= "Reply-To: " . $global_admin_emailname . "\r\n";
$mailHeader .= "CC: " . $global_admin_emailname . "\r\n";
$mailHeader .= "MIME-Version: 1.0\r\n";
$mailHeader .= "Content-Type: text/html; charset=UTF-8\r\n";

$message = '<p><strong>This  ssss ddddddd is <br>strong text</strong> while this is not.</p>';


//mail($to, $subject, $message, $mailHeader);

//die;





 $members_ads = 'members_ads';

    $sql_units_ods = "SELECT  username
                          FROM    $members_ads  
                          WHERE   url_status      = 'Active' 
                          AND     rotator_expire_date like '%$today%'          order by id ASC";
        
        
    $satya=mysqli_query($GLOBALS["___mysqli_ston"], $sql_units_ods); 
        
        
       //  $rss = mysqli_fetch_array($satya);
      
                  $global_admin_emailname = "Admin";
    $global_admin_email     = "admin@ez-moneymaker.com";  
    $mailHeader  = "From: " . $global_admin_emailname . "\r\n";
    $mailHeader .= "Reply-To: " . $global_admin_emailname . "\r\n";
    $mailHeader .= "CC: " . $global_admin_emailname . "\r\n";
    $mailHeader .= "MIME-Version: 1.0\r\n";
    $mailHeader .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        
        
        
        
        $term_array11 ="('";
          while($rss_datas  = mysqli_fetch_array($satya)){ 
             
               $term_array11 .=$rss_datas['username'];
                
                   $term_array11 .="','";
                  
          }
        $term_array11 .="')";  
    //echo "<pre>";    print_r($term_array); die;
    
    //$values = array_values($term_array);  print_r($term_array); die;
    
   // $term_array11 = "('".$term_array[0]."','".$term_array[1]."')";
    echo "select * from users  where username in".$term_array11; 
    
    
       
    
    
    
    
    
         while($rss_datas  = mysqli_fetch_array($satya)){ 
            // print_r($rss_datas); continue;
             $term = $rss_datas['username']; 
             
             $satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users  where username='".$term."'");
	$rss = mysqli_fetch_array($satya);
	
	$to =$rss["email"]; 
	
	$subject = $rss["firstname"].", Your Traffic Rotator Url Has Expired";
	
	$message = "<html>
	<head>
	<title>EMAIL TO USER WHOSE URL JUST EXPIRED</title>
	</head>
	<body>
	
	Hi ";
	$message .= $rss["firstname"];
	$message .=",<br><br>
	Mike here.  Just a short note to let you know your Traffic Rotator Url has Expired.
<br>
If you would like to continue this service, please log into your account and purchase
<br>
another Traffic Rotator slot.  If you have questions, please write us back.
<br><br>
Sincerely,
<br><br>
Mike
<br>
<a href=http://www.ez-moneymaker.com>http://www.ez-moneymaker.com</a>  ";


$to ="satyajeet.kesharia@gmail.com";

        $t_subject   = $rss["firstname"].", Your Traffic Rotator Url Has Expired";
	//	$t_message   = $admin_mail_content;
        


		//$mailresult  = mail($global_admin_email,$subject,$message,$mailHeader);
		
		$mailresult  = mail($to,$subject,$message,$mailHeader);	

             
         }
        
        
               
          die;     
////////////////////////////////////////////////////////////////////////////////////////////////////////////////                2-4-2023
        
        
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
        
        
        
        
        
        
        while($rss){
            
              /////////////////////
              //Today expired package users only              
              if($row_units_ods['quantity'] > 0){              
                 
                 //purchased amount
                 $package_purchased_amount = $row_units_ods['amount']; 
                 $package_purchased_amount = "$". number_format($package_purchased_amount,2);
                         
                 //purchase date        
                 list($pur_year,$pur_month,$pur_date) = explode("-", $row_units_ods['purchase_date']); 
                 $purchase_date_html = "$pur_month-$pur_date-$pur_year";

                 //unit expire date
                 list($exp_year,$exp_month,$exp_date) = explode("-", $row_units_ods['unit_expire_date']); 
                 $expire_date_html   = "$exp_month-$exp_date-$exp_year";
                  
if($row_admin['min_active_units'] <> 1){
   $join_html = "s"; 
}
   $min_total_cash_earned_html = "$". number_format($row_admin['min_total_cash_earned'],2);

             //send notification to user
		     $u_subject   = "{$row_users['fname']}, Traffic Unit Expiration Notice";

$u_message   = "Hi  {$row_users['fname']},<br/><br/>
                             
Below are your Expired units for today:<br/><br/>

- Quantity:  {$row_units_ods['quantity']}<br/>

- Package Name:  {$row_units_ods['item_name']}<br/>

- Purchase Amount:  {$package_purchased_amount}<br/>

- Purchase Date:  {$purchase_date_html}<br/>

- Unit Expiration Date:  {$expire_date_html}<br/><br/>
                             
=============================<br/>
VERY IMPORTANT, PLEASE READ BELOW<br/>
=============================<br/><br/>

In order to get paid on payday, the 20th of the month,<br/>

you must meet the following 2 pay requirements:<br/><br/>

1)  You must have at least  {$row_admin['min_active_units']} Active {$row_units_ods['item_name']}{$join_html}<br/>

2)  And your Total Cash Earned must be at least {$min_total_cash_earned_html}<br/><br/>

If you meet these 2 pay requirements on payday, the<br/>

20th of the month, you will get paid.  Otherwise,<br/>

your Total Cash Earned will be carried over until<br/>

you meet the 2 pay requirements on payday the 20th <br/>

of the month.<br/><br/>

So please make sure you meet the 2 pay requirements<br/>

on payday, 
the 20th of the month.  Also, make sure your<br/> 

Payza email address is 
valid and correct.  Payza cannot <br/>

pay to an email address that is not 
registered with them.<br/><br/>

To Your Success,<br/><br/>

Mike Borders<br/><br/>

<a href=http://www.mycashbacktraffic.com>http://www.mycashbacktraffic.com</a><br/><br/><br/><br/>";

                            
			$mailHeader = "From: $global_site_title <$global_admin_email> \n" ;
			$mailHeader .= "X-Sender: $global_admin_email \n";	
			$mailHeader .= "Content-Type: text/html \n";
			$mailHeader .= "Return-Path: $global_admin_email \n";
			$mailHeader .= "Error-To: $global_admin_email \n";
			$mailHeader .= "X-Mailer: {$_SERVER['SERVER_NAME']} \n";
		    $mailresult  = mail($row_users['email'],$u_subject,$u_message,$mailHeader);	

           // $mailresult  = mail("asokan.zil016@gmail.com",$u_subject,$u_message,$mailHeader);
          //end mail
          

            ########################################################################################################

           if($k%2 == 0) { $bg="#e9edf6"; }else{ $bg="#d0d7e7"; }
         
$admin_mail_summary .=<<<EOD

	     <tr bgcolor="{$bg}">
	       <td style="word-wrap: break-word"  width="7%" align="left" valign="top"><span class='text'>{$row_users['user_id']}</span></td>
	       <td align="left" class='text' width="5%" valign="top">{$row_units_ods['quantity']}</span></td>
	       <td style="word-wrap: break-word" width="12%" align="left" class='text'  valign="top">{$row_admin['package_name']} </td>
           <td align="left" class='text' width="5%" valign="top">{$package_purchased_amount}</td>
           <td align="left" class='text' width="5%" valign="top">{$purchase_date_html}</td>
           <td align="left" class='text' width="5%" valign="top">{$expire_date_html} </td>
	     </tr>
EOD;

           $k++;   

           ########################################################################################################
              }//endif
              /////////////////////
        
            
        }//end-while




echo "final"; die;




    error_reporting(0);
    include_once("/home2/myguaran/public_html/mycashbacktraffic/admin/config/adminglobal.php");
    $fp = fopen("$base_path/payment_log/crons.txt",'w');
    $day   = date('d');
    $month = date('m');
    $year  = date('Y');
    $today = date('Y-m-d');
    $today_txt     = $month."-".$day."-".$year; 
    $yesterday     = date('Y-m-d', mktime (0, 0, 0, $month, $day - 1, $year)); 
    $yesterday_txt = date('m-d-Y', mktime (0, 0, 0, $month, $day - 1, $year));

    fwrite($fp,"\n\n********************************************************");
    fwrite($fp,"Enter the logger \n");
    $sql_admin = "SELECT * FROM $tb_site_setting WHERE id = '1'";
    $res_admin = mysqli_query($GLOBALS["___mysqli_ston"], $sql_admin) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_admin);
    $row_admin = mysqli_fetch_array($res_admin);
    
    fwrite($fp,"Today : $today \n");
   
    $upx_traffic_units = "UPDATE 
                                    $tb_traffic_unit_purchase_history
                            SET        
                                    unit_status      = 'Expired',
                                    cron_expire_date = '$today'         
                            WHERE 
                                    unit_status = 'Active' 
                            AND 
                                    unit_paid   = 'No'
                            AND 
                                    unit_expire_date <= '$today'         
                            ";
                            
      echo "upx_traffic_units => $upx_traffic_units <br/><br/>";                       
      
      $rex_traffic_units = mysqli_query($GLOBALS["___mysqli_ston"], $upx_traffic_units) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$upx_traffic_units);
      
      fwrite($fp,"****************** Check For Expired Traffic Units *************** \n");
      fwrite($fp,"upx_traffic_units : $upx_traffic_units \n\n");

       $sql_users = "SELECT 
                             * 
                     FROM 
                             $tb_users
                     WHERE 
                             status = 'L' 
                    ";
                    
       $res_users = mysqli_query($GLOBALS["___mysqli_ston"], $sql_users) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_users);
       $num_users = mysqli_num_rows($res_users);

      fwrite($fp,"****************** No of users *************** \n");
      fwrite($fp,"num_users : $num_users \n\n");
       
       if($num_users > 0){
                $k=1; 
          while($row_users = mysqli_fetch_array($res_users)){
                $sql_exp_units = "SELECT 
                                           SUM(quantity) AS QTY
                                  FROM 
                                           $tb_traffic_unit_purchase_history  
                                  WHERE 
                                           unit_status      = 'Expired' 
                                  AND 
                                           unit_paid        = 'No'
                                  AND  
                                           user_id          = '{$row_users['user_id']}'      
                                 ";
           
                $res_exp_units  = mysqli_query($GLOBALS["___mysqli_ston"], $sql_exp_units) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_exp_units);
                $row_exp_units  = mysqli_fetch_array($res_exp_units);
                $up_to_date_expired_units  = (int) $row_exp_units['QTY'];

                echo "<b>sql_exp_units </b>: $sql_exp_units <br/> 
                      <b>up_to_date_expired_units </b>: $up_to_date_expired_units <br><br> ";
                

                fwrite($fp,"*********Get the number of expired_units a member currently has***** \n");
                fwrite($fp,"sql_exp_units : $sql_exp_units \n");
                fwrite($fp,"up_to_date_expired_units : $up_to_date_expired_units \n\n");
               
                                
                $sql_act_units = "SELECT 
                                           SUM(quantity) AS QTY
                                  FROM 
                                           $tb_traffic_unit_purchase_history  
                                  WHERE 
                                           unit_status      = 'Active' 
                                  AND 
                                           unit_paid        = 'No'
                                  AND  
                                           user_id          = '{$row_users['user_id']}'   
                                 ";
           
                $res_act_units  = mysqli_query($GLOBALS["___mysqli_ston"], $sql_act_units) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_act_units);
                $row_act_units  = mysqli_fetch_array($res_act_units);
                $up_to_date_active_units  = (int) $row_act_units['QTY'];
                
                
                echo "<b>sql_act_units </b>: $sql_act_units <br/> 
                      <b>up_to_date_active_units </b>: $up_to_date_active_units <br/>  
                      <br><br> ";
                
                fwrite($fp,"*********Get the number of $active_units a member currently has***** \n");
                fwrite($fp,"sql_act_units : $sql_act_units \n");
                fwrite($fp,"up_to_date_active_units : $up_to_date_active_units \n");
                
                $sql_cash_back_due  = "SELECT 
                                               SUM(amount)   AS AMT 
                                       FROM 
                                               $tb_traffic_unit_purchase_history  
                                       WHERE 
                                               unit_status      = 'Expired' 
                                       AND 
                                               unit_paid        = 'No'
                                       AND  
                                               user_id          = '{$row_users['user_id']}'
                                      ";
           
                $res_cash_back_due    = mysqli_query($GLOBALS["___mysqli_ston"], $sql_cash_back_due) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_cash_back_due);
                $row_cash_back_due    = mysqli_fetch_array($res_cash_back_due);
                $total_cash_back_due  = $row_cash_back_due['AMT'];  
                
                
                $cash_back_rate             = ($row_admin['cash_back_rate'] * 0.01);
                $up_to_date_cash_back_due   = ($total_cash_back_due * $cash_back_rate);
                #$up_to_date_cash_back_due   = number_format($up_to_date_cash_back_due,2);
                $up_to_date_cash_back_due   = $up_to_date_cash_back_due;

                echo "<b>sql_cash_back_due </b>: $sql_cash_back_due <br/>
                      <b>total_cash_back_due </b>: $total_cash_back_due <br> 
                      <b>up_to_date_cash_back_due </b>: $up_to_date_cash_back_due <br><br> ";


                fwrite($fp,"*********Get the Total Cash Back Due ***** \n");
                fwrite($fp,"sql_cash_back_due : $sql_cash_back_due \n");
                fwrite($fp,"total_cash_back_due : $total_cash_back_due \n");
                fwrite($fp,"up_to_date_cash_back_due : $up_to_date_cash_back_due \n\n");

         
                #Affiliate commission amount
         
                $sql_affl_commission  = "SELECT 
                                               SUM(aff_comm_amount) AS AMT 
                                         FROM 
                                               $tb_affiliate_commission_history  
                                         WHERE 
                                               aff_comm_paid    = 'No' 
                                         AND  
                                               ref_id           = '{$row_users['user_id']}'
                                        ";
           
                $res_affl_commission  = mysqli_query($GLOBALS["___mysqli_ston"], $sql_affl_commission) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_affl_commission);
                $row_affl_commission  = mysqli_fetch_array($res_affl_commission);
                #$up_to_date_affl_commission  = number_format($row_affl_commission['AMT'],2);  
                $up_to_date_affl_commission  = $row_affl_commission['AMT'];
         
               echo "<b>sql_affl_commission </b>: $sql_affl_commission <br/>
                     <b>up_to_date_affl_commission </b>: $up_to_date_affl_commission 
                     <br><br>
                     ";
         
                fwrite($fp,"*********Get the Total Affiliate commission amount ***** \n");
                fwrite($fp,"sql_affl_commission : $sql_affl_commission \n");
                fwrite($fp,"up_to_date_affl_commission : $up_to_date_affl_commission \n\n");
         
         
                #CASH ADJUSTMENT HISTORY
           	    $sql_cash_adjustment  = "SELECT 
                                               SUM(cash_adjust_amount) as CNT 
                                        FROM 
                                                $tb_cash_adjustment_history 
                                        WHERE
                                                cash_adjustment_amount_paid = 'No'
                                        AND
                                                user_id = '{$_REQUEST['ud']}'
                                       ";
                           
               $res_cash_adjustment  = mysqli_query($GLOBALS["___mysqli_ston"], $sql_cash_adjustment) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_cash_adjustment);
               $row_cash_adjustment  = mysqli_fetch_array($res_cash_adjustment);
               
               $up_to_date_cash_adjustment = $row_cash_adjustment['CNT'];

         ########################################################################################################
         
         
            $total_cash_earned = ($up_to_date_cash_back_due + $up_to_date_affl_commission  +  $up_to_date_cash_adjustment );
            #$total_cash_earned = number_format($total_cash_earned,2);
            #$total_cash_earned = $total_cash_earned;
            
            echo "<br>****************************************
                  <br><b>up_to_date_cash_back_due     </b>: $up_to_date_cash_back_due <br/>
                  <b>up_to_date_affl_commission   </b>: $up_to_date_affl_commission <br/>
                  <b>up_to_date_cash_adjustment </b>: $up_to_date_cash_adjustment <br/>
                  ****************************************<br>
                  <br>
                 ";
            
         
             $ups_userx = "UPDATE
                                  $tb_users 
                           SET  
                                  
                                  active_units          = '$up_to_date_active_units',
                                  expired_units         = '$up_to_date_expired_units', 
                                  total_cash_back_due   = '$up_to_date_cash_back_due',
                                  total_cash_earned     = '$total_cash_earned',
                                  total_aff_comm_amount = '$up_to_date_affl_commission'
                                  
                           WHERE        
                                  user_id = '{$row_users['user_id']}'      
                       ";
             $res_userx =  mysqli_query($GLOBALS["___mysqli_ston"], $ups_userx) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ups_userx); 

             echo "ups_userx : $ups_userx  <br><br> ";

             fwrite($fp,"*********update  user table \n");
             fwrite($fp,"ups_userx : $ups_userx \n");

            //final sum
            $sum_sql  = "UPDATE 
                               $tb_users 
                        SET 
                               total_cash_earned  = total_cash_back_due + total_aff_comm_amount + total_cash_adjustment_amount
                        WHERE        
                               user_id      = '{$row_users['user_id']}'
                       ";     
            $res_sql =  mysqli_query($GLOBALS["___mysqli_ston"], $sum_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sum_sql); 


         #####################################################################################################
         ###############  TODAY STATUS ####################################################################### 
         #####################################################################################################
            
            #Today expiry units
            $sql_exp_unitx = "SELECT 
                                       SUM(quantity) AS QTY,
                                       SUM(amount)   AS AMT,
                                       purchase_date 
                              FROM 
                                       $tb_traffic_unit_purchase_history  
                              WHERE 
                                       unit_status      = 'Expired' 
                              AND 
                                       unit_paid        = 'No'
                              AND  
                                       user_id          = '{$row_users['user_id']}'      
                              AND 
                                       unit_expire_date = '$yesterday'         
                             ";
       
            $res_exp_unitx  = mysqli_query($GLOBALS["___mysqli_ston"], $sql_exp_unitx) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_exp_unitx);
            $row_exp_unitx  = mysqli_fetch_array($res_exp_unitx);
            
            $today_expiry_units  = $row_exp_unitx['QTY'];
            $today_cash_back_due = ($row_exp_unitx['AMT'] * ($row_admin['cash_back_rate'] * 0.01));
            $purchase_date       = $row_exp_unitx['purchase_date'];    
            
            list($pd_Y,$pd_M,$pd_D) = explode("-",$purchase_date);
            $purchase_date_txt   = "{$pd_M}-{$pd_D}-{$pd_Y}";

            echo " today_expiry_units : $today_expiry_units <br>today_cash_back_due : $today_cash_back_due <br>today_cash_back_due : $today_cash_back_due <br><br>";

             fwrite($fp,"*********Today expiry units \n");
             fwrite($fp,"today_expiry_units : $today_expiry_units \n");
             fwrite($fp,"today_cash_back_due : $today_cash_back_due \n");
             fwrite($fp,"c \n");



        #####################################################################################################
        ###############  SEND MAIL TO INDIVIDUAL PACKAGE #################################################### 
        #####################################################################################################


        $sql_units_ods = "SELECT 
                                   *
                          FROM 
                                   $tb_traffic_unit_purchase_history  
                          WHERE 
                                   unit_status      = 'Expired' 
                          AND 
                                   cron_expire_date = '$today'  
                          AND  
                                   user_id          = '{$row_users['user_id']}'      
                          
                          order by id ASC         
                         ";
        
        $res_units_ods  = mysqli_query($GLOBALS["___mysqli_ston"], $sql_units_ods) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_units_ods);
        while($row_units_ods  = mysqli_fetch_array($res_units_ods)){
            
              /////////////////////
              //Today expired package users only              
              if($row_units_ods['quantity'] > 0){              
                 
                 //purchased amount
                 $package_purchased_amount = $row_units_ods['amount']; 
                 $package_purchased_amount = "$". number_format($package_purchased_amount,2);
                         
                 //purchase date        
                 list($pur_year,$pur_month,$pur_date) = explode("-", $row_units_ods['purchase_date']); 
                 $purchase_date_html = "$pur_month-$pur_date-$pur_year";

                 //unit expire date
                 list($exp_year,$exp_month,$exp_date) = explode("-", $row_units_ods['unit_expire_date']); 
                 $expire_date_html   = "$exp_month-$exp_date-$exp_year";
                  
if($row_admin['min_active_units'] <> 1){
   $join_html = "s"; 
}
   $min_total_cash_earned_html = "$". number_format($row_admin['min_total_cash_earned'],2);

             //send notification to user
		     $u_subject   = "{$row_users['fname']}, Traffic Unit Expiration Notice";

$u_message   = "Hi  {$row_users['fname']},<br/><br/>
                             
Below are your Expired units for today:<br/><br/>

- Quantity:  {$row_units_ods['quantity']}<br/>

- Package Name:  {$row_units_ods['item_name']}<br/>

- Purchase Amount:  {$package_purchased_amount}<br/>

- Purchase Date:  {$purchase_date_html}<br/>

- Unit Expiration Date:  {$expire_date_html}<br/><br/>
                             
=============================<br/>
VERY IMPORTANT, PLEASE READ BELOW<br/>
=============================<br/><br/>

In order to get paid on payday, the 20th of the month,<br/>

you must meet the following 2 pay requirements:<br/><br/>

1)  You must have at least  {$row_admin['min_active_units']} Active {$row_units_ods['item_name']}{$join_html}<br/>

2)  And your Total Cash Earned must be at least {$min_total_cash_earned_html}<br/><br/>

If you meet these 2 pay requirements on payday, the<br/>

20th of the month, you will get paid.  Otherwise,<br/>

your Total Cash Earned will be carried over until<br/>

you meet the 2 pay requirements on payday the 20th <br/>

of the month.<br/><br/>

So please make sure you meet the 2 pay requirements<br/>

on payday, 
the 20th of the month.  Also, make sure your<br/> 

Payza email address is 
valid and correct.  Payza cannot <br/>

pay to an email address that is not 
registered with them.<br/><br/>

To Your Success,<br/><br/>

Mike Borders<br/><br/>

<a href=http://www.mycashbacktraffic.com>http://www.mycashbacktraffic.com</a><br/><br/><br/><br/>";

                            
			$mailHeader = "From: $global_site_title <$global_admin_email> \n" ;
			$mailHeader .= "X-Sender: $global_admin_email \n";	
			$mailHeader .= "Content-Type: text/html \n";
			$mailHeader .= "Return-Path: $global_admin_email \n";
			$mailHeader .= "Error-To: $global_admin_email \n";
			$mailHeader .= "X-Mailer: {$_SERVER['SERVER_NAME']} \n";
		    $mailresult  = mail($row_users['email'],$u_subject,$u_message,$mailHeader);	

           // $mailresult  = mail("asokan.zil016@gmail.com",$u_subject,$u_message,$mailHeader);
          //end mail
          

            ########################################################################################################

           if($k%2 == 0) { $bg="#e9edf6"; }else{ $bg="#d0d7e7"; }
         
$admin_mail_summary .=<<<EOD

	     <tr bgcolor="{$bg}">
	       <td style="word-wrap: break-word"  width="7%" align="left" valign="top"><span class='text'>{$row_users['user_id']}</span></td>
	       <td align="left" class='text' width="5%" valign="top">{$row_units_ods['quantity']}</span></td>
	       <td style="word-wrap: break-word" width="12%" align="left" class='text'  valign="top">{$row_admin['package_name']} </td>
           <td align="left" class='text' width="5%" valign="top">{$package_purchased_amount}</td>
           <td align="left" class='text' width="5%" valign="top">{$purchase_date_html}</td>
           <td align="left" class='text' width="5%" valign="top">{$expire_date_html} </td>
	     </tr>
EOD;

           $k++;   

           ########################################################################################################
              }//endif
              /////////////////////
        
            
        }//end-while
        #########################################################################################################

          }//end-while
       }//end-if
       
      ####################################################################################################
      ####################################################################################################
      $sel_exp_today_units = "SELECT 
                                      * 
                              FROM
                                      $tb_traffic_unit_purchase_history
                              WHERE
                                      unit_status      = 'Expired'
                              AND      
                                      cron_expire_date = '$today'         
                             ";
                             
      $rex_exp_today_units = mysqli_query($GLOBALS["___mysqli_ston"], $sel_exp_today_units) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_exp_today_units);
      $num_exp_today_units = mysqli_num_rows($rex_exp_today_units);  

      if($num_exp_today_units == 0){

         $admin_mail_summary =<<<EOD
	       <tr>
	         <td colspan="6" align="center" class="textbld"><b><font color="red">THERE ARE NO EXPIRED UNITS FOR TODAY</font></b></td>
	       </tr>
EOD;
       }

      ####################################################################################################
      ####################################################################################################
       
       
