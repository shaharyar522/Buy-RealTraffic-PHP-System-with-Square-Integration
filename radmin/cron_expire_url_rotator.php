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



//echo $today; die;

 $members_ads = 'members_ads';

    $sql_units_ods = "SELECT  username
                          FROM    $members_ads  
                          WHERE   url_status      = 'Active' 
                          AND     rotator_expire_date<= '$today'               order by id ASC";
        
        
    $satya=mysqli_query($GLOBALS["___mysqli_ston"], $sql_units_ods); 
        
        
       //  $rss = mysqli_fetch_array($satya);
      
                  $global_admin_emailname = "Admin";
                  
                  $global_site_title ="Admin";
    $global_admin_email     = "admin@ez-moneymaker.com";  
    //$mailHeader  = "From: " . $global_admin_emailname . "\r\n";
    $mailHeader = "From: $global_site_title <$global_admin_email> \r\n";
    $mailHeader .= "Reply-To: $global_site_title <$global_admin_email> \r\n";
    
    $mailHeader .= "MIME-Version: 1.0\r\n";
    $mailHeader .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        
        
        
        
        $term_array11 ="('";
          while($rss_datas  = mysqli_fetch_array($satya)){ 
             
               $term_array11 .=$rss_datas['username'];
                
                   $term_array11 .="','";
                  
          }
        $term_array11 .="')";  


    
    
    

      
      
    
    
    
    
    
    //print_r($term_array11); die;
    
    
       
             
             $satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users  where username in ".$term_array11."");
             
	while($rss = mysqli_fetch_array($satya)){
	                   // echo "<br>"; echo $rss["firstname"] ; continue;
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
<a href=http://www.ez-moneymaker.com>http://www.ez-moneymaker.com</a> 

Email ID:  EZMM-2023
";


//$to ="satyajeet.kesharia@gmail.com";

        $t_subject   = $rss["firstname"].", Your Traffic Rotator Url Has Expired";
	//	$t_message   = $admin_mail_content;
        


		//$mailresult  = mail($global_admin_email,$subject,$message,$mailHeader);
		
		$mailresult  = mail($to,$subject,$message,$mailHeader);	

             
         }
        
        
               
          
          
              
       //Check For Expired Traffic Rotator Urls.
      $upx_traffic_units = "UPDATE 
                                    $members_ads
                            SET        
                                    url_status      = 'Expired'        
                            WHERE 
                                    url_status = 'Active' 
                            
                            AND 
                                    rotator_expire_date<= '$today'         
                            ";
                            
      echo "upx_traffic_units => $upx_traffic_units <br/><br/>";                        
      
      $rex_traffic_units = mysqli_query($GLOBALS["___mysqli_ston"], $upx_traffic_units) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$upx_traffic_units);
      
      fwrite($fp,"****************** Check For Expired Traffic Units *************** \n");
      fwrite($fp,"upx_traffic_units : $upx_traffic_units \n\n");
      
          
          
          
           
////////////////////////////////////////////////////////////////////////////////////////////////////////////////                2-4-2023
        
        
   
   
   
   
   
   
   
   
   