<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Email Users";



include("$CONFIG->templatedir/header.php");

$err_msg = '';

if((isset($_REQUEST['act'])) && !$_REQUEST['act'] == "update") {
$page_content="<fieldset class=text>
<legend>Send mail to all users</legend>
<br> ";



//$page_content .= fform();
  $page_content .=read_template("$CONFIG->templatedir/user_mailer.php");




$page_content .="
<br>

</fieldset>";}


else{

$page_content="<fieldset class=text>
<legend>Send mail to all users</legend>";


        if((isset($_REQUEST['act'])) && $_REQUEST['act'] == "update") {
            
           $f_title       = addslashes(trim($_REQUEST['title'])); 
           $f_desc        = addslashes(trim($_REQUEST['description']));
           $f_mail_type   = addslashes(trim($_REQUEST['mail_type'])); 
           $f_user_status = addslashes(trim($_REQUEST['user_status'])); 
           if($f_user_status == "all"){
              $sql = "";
           }   
           else{
              $sql = "AND status = '$f_user_status'";
           }        
            
           if($f_title == ""){
              $err_msg .="<li>Enter valid title";
           }
           if($f_desc == ""){
              $err_msg .="<li>Enter valid description";
           }
           
           if ($err_msg == "") {
            
               $select_sql  = "SELECT * FROM users WHERE id > '0' $sql";
               $select_sql .= " ORDER BY id ASC";
               
               $result_sql = mysqli_query($GLOBALS["___mysqli_ston"], $select_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$select_sql);
               $num_res    = mysqli_num_rows($result_sql);

                

               if($num_res > 0){      
                
                  
                  $ins_sql  = "INSERT INTO     url_mail_schedule
                               SET 
                                            subject     = '$f_title',
                                            description = '$f_desc', 
                                            mail_type   = '$f_mail_type', 
                                            user_status = '$f_user_status',
                                            assigned    = '$num_res',
                                            delivered   = '0',
                                            status      = '0',
                                            s_time      = now()
                              ";
                  
                  
                              
                  $res_sql = mysqli_query($GLOBALS["___mysqli_ston"], $ins_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ins_sql);

                  $err_msg = 2 ;
                  $_REQUEST['title']       = '';
                  $_REQUEST['description'] = '';
                  $_REQUEST['user_status'] = 'all';

               }//End-if
               
               if($num_res == 0){
                  $err_msg.= "<li>No Users Selected For This Process</li>";
               }
            
            }//end-error message
               
        }//end-swubmit





      if($err_msg == 2){
         $err_msg = "<li>Bulk mail schedule to $num_res Users</li>";
       }



//$page_content .= fform();
  $page_content .=read_template("$CONFIG->templatedir/user_mailer.php");
  $page_content  =str_replace("<span style=color:red></span>","<span style=color:red>".$err_msg."</span>",$page_content);

$page_content .= "</fieldset>";


}




include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>



