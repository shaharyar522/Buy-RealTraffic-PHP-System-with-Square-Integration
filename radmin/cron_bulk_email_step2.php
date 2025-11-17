<?php


error_reporting(0);

      include __DIR__ . '/../config.php';
      require_once(__DIR__ . "/../db_connect.php");
    
       $base_path = __DIR__ ;
$base_url='https://www.buy-realtraffic.com';

      //-------------------------------------------------------------------------------------------------------













/*ssssssssssssssssssssssssssssssssssssssssssssssss */



/*

$sid = 119;
$uid = 863;
               $schedule_sql = "SELECT * FROM  url_mail_schedule WHERE id = '$sid' ";
               $schedule_res = mysqli_query($GLOBALS["___mysqli_ston"], $schedule_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$schedule_sql);
               $schedule_row = mysqli_fetch_array($schedule_res);                      
               $mailHeader = "MIME-Version: 1.0" . "\r\n";

               ###############################

              
              $mailHeader .= "From: ".$CONFIG->support. "<".$mailfrom.">"."\r\n";
        	  $mailHeader .= "X-Sender: ".$mailfrom ."\r\n";

        	   if($schedule_row['mail_type'] == 'plain'){
        	      $mailHeader .= "Content-type:text/text;charset=UTF-8" . "\r\n";
        	   }
        	   if($schedule_row['mail_type'] == 'html'){
        	      $mailHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        	   }
        	   $mailHeader .= "Return-Path: $mailfrom"."\r\n";
        	   $mailHeader .= "Error-To: $mailfrom "."\r\n";
        	   $mailHeader .= "X-Mailer: {$_SERVER['SERVER_NAME']} "."\r\n";
               $content    = stripslashes($schedule_row['description']);
        	   $mailcontent = $content;
               ###############################

               //get user details

               $user_details = get_user_details($uid);
               $mailto = $user_details['email'];
               $password = $user_details['password'];
               $usrid  = $user_details['id'];
               $usrname  = $user_details['username'];
               $fname  = $user_details['firstname'];
               $lname  = $user_details['lastname'];
               $email  = $user_details['email'];
               //end user details 
               //mail subject
               $mailsubject_dev = stripslashes($schedule_row['subject']);;

               //$mailsubject_dev = str_replace('{USERID}',$usrid,"$mailsubject_dev");
               $mailsubject_dev = str_replace('{USERID}',$usrname,"$mailsubject_dev");
               $mailsubject_dev = str_replace('{FIRSTNAME}',$fname,"$mailsubject_dev");
               $mailsubject_dev = str_replace('{LASTNAME}',$lname,"$mailsubject_dev");
               $mailsubject_dev = str_replace('{EMAIL}',$email,"$mailsubject_dev");
               $mailsubject_dev = str_replace('{PASSWORD}',$password,"$mailsubject_dev");
               $mailsubject_dev = str_replace('{BASEURL}',$base_url,"$mailsubject_dev");
               $mailsubject_dev = str_replace('{SITETITLE}',"$global_site_title","$mailsubject_dev");
               $mailsubject     = $mailsubject_dev;

    	       //mail content

       	       $mail_content = nl2br($mailcontent);
        	   $mail_content = str_replace('{USERID}',$usrname,"$mail_content");
        	   $mail_content = str_replace('{FIRSTNAME}',$fname,"$mail_content");
        	   $mail_content = str_replace('{LASTNAME}',$lname,"$mail_content");
        	   $mail_content = str_replace('{EMAIL}',$email,"$mail_content");
        	   $mail_content = str_replace('{PASSWORD}',$password,"$mail_content"); 
        	   $mail_content = str_replace('{BASEURL}',"<a href='$base_url'>$base_url</a>","$mail_content");
        	   $mail_content = str_replace('{SITETITLE}',"$global_site_title","$mail_content");
    		   $id = base64_encode($usrid);
    		   $mail_content .= "<br /><br /><br /><br />If you do not want to receive emails from us, please click the link below to delete your account.<br /> <a href='$base_url/opt_out.php?user_id=$usrid'>Delete Account</a><br /><br />";
    	       #Header  -- Zen --#

    		   $mailHeader = "From: ".$CONFIG->support. "<".$global_admin_email. ">". "\r\n";
    	       $mailHeader .= "X-Sender: $global_admin_email "."\r\n";

        	   if($schedule_row['mail_type'] == 'plain'){
        	      $mailHeader .= "Content-Type: text/plain "."\r\n";
        	   }

        	   if($schedule_row['mail_type'] == 'html'){
        	      $mailHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        	   }
    	       $mailHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    	       $mailHeader .= "Return-Path: $global_admin_email "."\r\n";
    	       $mailHeader .= "Error-To: $global_admin_email "."\r\n";
    	       $mailHeader .= "X-Mailer: {$_SERVER['SERVER_NAME']} "."\r\n";

               $fp = fopen("$base_path/log/myguarand.txt","w");


               if(!file_exists("$base_path/log/myguarand.txt")){
                   die('file does not exit');

               }


               fwrite($fp, "S.No         =  {$user_details['id']} \n");
               fwrite($fp, "mailto       = $mailto  \n");
               fwrite($fp, "mailsubject  = $mailsubject  \n");
               fwrite($fp, "mail_content = $mail_content  \n");
               fwrite($fp, "mailHeader   = $mailHeader  \n");

        mail($mailto,$mailsubject,$mail_content,$mailHeader); 

*/
/*ssssssssssssssssssssssssssssssssssssssssssssssss */


	  $query_num_email  = "SELECT * FROM url_site_setting";
 	  $result_num_email = mysqli_query($GLOBALS["___mysqli_ston"], $query_num_email);
	  $value_num_email  = mysqli_fetch_object($result_num_email);
   	  $email_per_hour   = $value_num_email->bulk_email;  



      $global_admin_emailname = "Admin";
      $global_admin_email     = "admin@buy-realtraffic.com";

	  $admin_name       = $global_admin_emailname;      
	  $mailfrom         = $global_admin_email;  


      //-------------------------------------------------------------------------------------------------------


      $select_sql = "SELECT * FROM  url_mail_process WHERE sid > '0' ORDER BY id ASC LIMIT 0,$email_per_hour ";
      $result_sql = mysqli_query($GLOBALS["___mysqli_ston"], $select_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$select_sql);
      $number_res = mysqli_num_rows($result_sql);
      if($number_res == 0){
         die("No records in Queue");
      }

      #-------------------------------------------------------------------------------------------------------
      #=======================================================================================================
      #-------------------------------------------------------------------------------------------------------

      if($number_res > 0){
          while($process_row = mysqli_fetch_object($result_sql)){
               $id  =  $process_row->id;
               $sid =  $process_row->sid;
               $uid =  $process_row->uid;  

               $schedule_sql = "SELECT * FROM  url_mail_schedule WHERE id = '$sid' ";

               $schedule_res = mysqli_query($GLOBALS["___mysqli_ston"], $schedule_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$schedule_sql);

               $schedule_row = mysqli_fetch_array($schedule_res);                      

               $mailHeader = "MIME-Version: 1.0" . "\r\n";

               ###############################

                $mailHeader = "From: ".$CONFIG->support. "<".$mailfrom.">". "\r\n";
        	    $mailHeader .= "X-Sender: ".$mailfrom ."\r\n";

        	   if($schedule_row['mail_type'] == 'plain'){
        	      $mailHeader .= "Content-Type: text/plain" ."\r\n";
        	   }


        	   if($schedule_row['mail_type'] == 'html'){
        	      $mailHeader .=  "Content-type:text/html;charset=UTF-8" . "\r\n";
        	   }

        	   $mailHeader .= "Return-Path: $mailfrom"."\r\n";

        	   $mailHeader .= "Error-To: $mailfrom "."\r\n";

        	   $mailHeader .= "X-Mailer: {$_SERVER['SERVER_NAME']} "."\r\n";

               $content    = stripslashes($schedule_row['description']);

        	   $mailcontent = $content;

               ###############################


               $user_details = get_user_details($uid);

               $mailto = $user_details['email'];
               
               $password = $user_details['password'];

               $usrid  = $user_details['id'];
               $usrname  = $user_details['username'];
               

               $fname  = $user_details['firstname'];

               $lname  = $user_details['lastname'];

               $email  = $user_details['email'];



               $mailsubject_dev = stripslashes($schedule_row['subject']);;


               $mailsubject_dev = str_replace('{USERID}',$usrname,"$mailsubject_dev");
               


               $mailsubject_dev = str_replace('{FIRSTNAME}',$fname,"$mailsubject_dev");


               $mailsubject_dev = str_replace('{LASTNAME}',$lname,"$mailsubject_dev");


               $mailsubject_dev = str_replace('{EMAIL}',$email,"$mailsubject_dev");
               
               
               $mailsubject_dev = str_replace('{PASSWORD}',$password,"$mailsubject_dev");


               $mailsubject_dev = str_replace('{BASEURL}',$base_url,"$mailsubject_dev");


               $mailsubject_dev = str_replace('{SITETITLE}',"$global_site_title","$mailsubject_dev");


               $mailsubject     = $mailsubject_dev;





    	       //mail content


       	       $mail_content = nl2br($mailcontent);


        	   //$mail_content = str_replace('{USERID}',$usrid,"$mail_content");
        	   $mail_content = str_replace('{USERID}',$usrname,"$mail_content");
        	   


        	   $mail_content = str_replace('{FIRSTNAME}',$fname,"$mail_content");


        	   $mail_content = str_replace('{LASTNAME}',$lname,"$mail_content");


        	   $mail_content = str_replace('{EMAIL}',$email,"$mail_content");
        	   
        	   
        	   $mail_content = str_replace('{PASSWORD}',$password,"$mail_content"); 


        	   $mail_content = str_replace('{BASEURL}',"<a href='$base_url'>$base_url</a>","$mail_content");


        	   $mail_content = str_replace('{SITETITLE}',"$global_site_title","$mail_content");



    		   $id = base64_encode($usrid);

    		   
    		   $mail_content .= "<br /><br /><br /><br />If you do not want to receive emails from us, please click the link below to delete your account.<br /> <a href='$base_url/opt_out.php?user_id=$usrid'>Delete Account</a><br /><br />";


    		   $mailHeader = "From: ".$CONFIG->support. "<".$global_admin_email. ">". "\r\n";

    	       $mailHeader .= "X-Sender: $global_admin_email "."\r\n";


    


        	   if($schedule_row['mail_type'] == 'plain'){


        	      $mailHeader .= "Content-Type: text/plain "."\r\n";


        	   }


        	   if($schedule_row['mail_type'] == 'html'){


        	      $mailHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";


        	   }


    	       $mailHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";


           


    	       $mailHeader .= "Return-Path: $global_admin_email "."\r\n";


    	       $mailHeader .= "Error-To: $global_admin_email "."\r\n";


    	       $mailHeader .= "X-Mailer: {$_SERVER['SERVER_NAME']} "."\r\n";


               


              


               $fp = fopen("$base_path/log/myguarand.txt","w");


               


               if(!file_exists("$base_path/log/myguarand.txt")){


                   die('file does not exit');


               }


               


               


               fwrite($fp, "S.No         =  {$user_details['id']} \n");


               fwrite($fp, "mailto       = $mailto  \n");


               fwrite($fp, "mailsubject  = $mailsubject  \n");


               fwrite($fp, "mail_content = $mail_content  \n");


               fwrite($fp, "mailHeader   = $mailHeader  \n");




// mail($mailto = "satyajeet.kesharia@gmail.com","sssss","cccccc",$mailHeader);  
// mail($mailto = "satyajeet.kesharia@gmail.com",$mailsubject,$mail_content,$mailHeader); 
 

        mail($mailto,$mailsubject,$mail_content,$mailHeader); 


// mail("satyajeet.kesharia@gmail.com",$mailsubject,$mail_content,$mailHeader); 

               //mail($mailto = "Jeshinajes@gmail.com",$mailsubject,$mail_content,$mailHeader); 


               


               //update ---------------------------------------------------------------------------// 


   	$counter_change_status = "UPDATE  url_mail_schedule SET delivered = delivered+1 WHERE id = '$process_row->sid'";
              	mysqli_query($GLOBALS["___mysqli_ston"], $counter_change_status);


               //end ---------------------------------------------------------------------------//


               


          	   


               fwrite($fp, "Your mail deliverd  \n\n");


               


               fclose($fp);


               


    $query_change_status = "DELETE FROM url_mail_process WHERE id = '$process_row->id' AND sid = '$process_row->sid' AND uid = '$process_row->uid'  ";

               mysqli_query($GLOBALS["___mysqli_ston"], $query_change_status);





             #-------------------------------------------------------------------------------------------------------


             #=======================================================================================================


             #-------------------------------------------------------------------------------------------------------


    


                //get schedule details


          $schedule_sql  = "SELECT * FROM  url_mail_process WHERE sid = '$process_row->sid' ";

                 #echo $schedule_sqlc;


                 $schedule_resc = mysqli_query($GLOBALS["___mysqli_ston"], $schedule_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$schedule_sql);


                 $schedule_numc = mysqli_num_rows($schedule_resc);


                 if($schedule_numc == 0){ //all the mails delivered 





                   $query_final_status = "";


        $query_final_status = "UPDATE  url_mail_schedule SET status = '2' WHERE id = '$process_row->sid' ";


                   mysqli_query($GLOBALS["___mysqli_ston"], $query_final_status);


                 


                    //final mail send to admin 

                     $txt = final_mail_send_to_admin($process_row->sid);


                    //end 


                 }//end-if


                


         }//end-while


            


             


     }//endif  


     #-------------------------------------------------------------------------------------------------------


     #=======================================================================================================


     #-------------------------------------------------------------------------------------------------------








function get_user_details($user_id){


	$sel_sql  = "SELECT * FROM users WHERE id = '$user_id'  ";
    $res_sql  = mysqli_query($GLOBALS["___mysqli_ston"], $sel_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_sql);
    $user_row = mysqli_fetch_array($res_sql);
    return $user_row;
}








function final_mail_send_to_admin($pid){
  global $CONFIG;
  //  global $global_admin_emailname,$global_admin_email,$base_path;

    //inform to admin - when last mailer sebt out

              $global_admin_emailname = "Admin";
              $global_admin_email     = "admin@buy-realtraffic.com";



   $base_path = __DIR__;


    $mailsubjectx  = "Mail sent to all the members";


    $mail_contentx = "This is an automatic email message to inform about the last bulk email sent to all the members";





    //18-8-2018      $mailHeader  = "From: $global_admin_emailname <$global_admin_email> \n" ;
    //$mailHeader  = "From: $global_admin_email <$global_admin_email> \n" ;
    $mailHeader  = "From: ".$CONFIG->support. "<".$global_admin_email.">". "\r\n";

    $mailHeader .= "X-Sender: $global_admin_email "."\r\n";
    $mailHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $mailHeader .= "Return-Path: $global_admin_email "."\r\n";
    $mailHeader .= "Error-To: $global_admin_email "."\r\n";
    $mailHeader .= "X-Mailer: {$_SERVER['SERVER_NAME']} "."\r\n";


    $fp    = fopen("$base_path/log/myguarand.txt","a");
//    $fp    = fopen("/home1/myguaran/public_html/ezmoneymaker/radmin/log/myguarand.txt","a");

    fwrite($fp, "******* last mail ************** \n");
    fwrite($fp, "S.No               => FINAL $pid \n");
    fwrite($fp, "global_admin_email => $global_admin_email  \n");
    fwrite($fp, "mailsubjectx       => $mailsubjectx  \n");
    fwrite($fp, "mail_contentx      => $mail_contentx  \n");
    fwrite($fp, "mailHeader         = >$mailHeader  \n");    


    #echo $mail_content;


    mail($global_admin_email,$mailsubjectx,$mail_contentx,$mailHeader); 


    //mail('asokan.zil016@gmail.com',$mailsubjectx,$mail_contentx,$mailHeader);


                     


    fwrite($fp, "last mail send   \n");


    fclose($fp); 


    


    return true;


}








?>