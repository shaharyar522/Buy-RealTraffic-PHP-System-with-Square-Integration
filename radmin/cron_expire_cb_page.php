<?php 

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

    //fwrite($fp,"\n\n********************************************************");
    //fwrite($fp,"Enter the logger \n");
include'../config.php';
    //Get admin details
    $sql_admin = "SELECT * FROM url_site_setting WHERE id = '1'"; 
    $res_admin = mysqli_query($GLOBALS["___mysqli_ston"], $sql_admin) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_admin);
    $row_admin = mysqli_fetch_array($res_admin);
    
    
    if($row_admin['cron_last_run'] == $today){
       //die("Cron already run on $today 12:05 AM  & check unit expiry date was $yesterday"); 
    }
    




      /*
      $upx_traffic_units = "UPDATE   users    SET   cb_page_status  = 'Disabled'      WHERE  cb_page_status = 'Active'     AND      cb_expire_date <= '$today' "; 
      echo "upx_traffic_units => $upx_traffic_units <br/><br/>";    
      $rex_traffic_units = mysqli_query($GLOBALS["___mysqli_ston"], $upx_traffic_units) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$upx_traffic_units);
      */
      

      
      
      
        $satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users  where cb_expire_date <='".$today."'  AND  cb_page_status = 'Active'  ");
	

	
	while($rss = mysqli_fetch_array($satya)) {
    //echo $rss['username'];
    
    $to =$rss["email"];
    //$to = 'satyajeet.kesharia@gmail.com';
    
    
	$subject = $rss["firstname"].", Your CB Money Page Has Been Disabled";
	$message = "<html><head><title>EMAIL TO USER WHOSE CB PAGE STATUS WAS SET TO DISABLED</title></head><body>
	Hi ";
	$message .= $rss["firstname"];
	$message .=",<br><br>
Mike here.  Just a short note to let you know your ClickBank Money Page 
<br>
is now Disabled. If you would like to continue with our service, log into 
<br>
your EZMM account and purchase another CB Money Page.  If you have <br>
questions, please write us back.



<br><br>
Sincerely,
<br><br>
Mike
<br>
<a href=http://www.ez-moneymaker.com>http://www.ez-moneymaker.com</a>
<br><br>

Email ID:  EZMM-2024
";
    

      $global_admin_emailname = "Admin";
      $global_admin_email     = "admin@ez-moneymaker.com";
	  $admin_name       = $global_admin_emailname;      
	  $mailfrom         = $global_admin_email;  
    



                	$headers = "MIME-Version: 1.0" . "\r\n";
	                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= 'From: '.$admin_name.' <'.$global_admin_email.'>' . "\r\n";
                    $headers .= "X-Sender: $global_admin_email  \r\n";
                    $headers .= "Content-Type: text/html \r\n";
//$headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";
                    mail($to,$subject,$message,$headers);



    
    }
      
      
      $upx_traffic_units = "UPDATE   users    SET   cb_page_status  = 'Disabled'      WHERE  cb_page_status = 'Active'     AND      cb_expire_date <= '$today' "; 
      echo "upx_traffic_units => $upx_traffic_units <br/><br/>";    
      $rex_traffic_units = mysqli_query($GLOBALS["___mysqli_ston"], $upx_traffic_units) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$upx_traffic_units);
      
      
      
      
      