<?php 
  ob_start();
  include("config.php");
  #$fp = fopen("/home/myguaran/public_html/alpha.txt","a+"); 

  #Select status = L  && points > 0 sites
  #a => tb_points
  #b => tb_site

    $sel_all = "SELECT
                          a.site_id, a.points,a.visitors_received,
                          b.sid, b.site_url, b.status
                FROM
                          url_login_clicks a, url_login_sites b
                WHERE
                          (a.site_id = b.sid)
                AND
                          (b.status = 'L')
                AND
                          (b.cron = 'NEED')
                AND
                          (a.points > 0)
               ";

    $res_all = mysqli_query($GLOBALS["___mysqli_ston"], $sel_all) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_all);
    $num_all = mysqli_num_rows($res_all);
    $row_all = mysqli_fetch_array($res_all);  

    if($num_all > 0){

       //----------------------------------------------------------------------------------------------------//
       //00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000//
       //----------------------------------------------------------------------------------------------------//

           $sel_rex = "SELECT
                               a.site_id, a.points, a.visitors_received,
                               b.sid, b.site_url, b.status, b.user_id as userId
                       FROM
                               url_login_clicks a, url_login_sites b
                       WHERE
                               (a.site_id = b.sid)
                       AND
                               (b.status = 'L')
                       AND
                               (b.cron = 'NEED')
                       AND
                               (a.points > 0)

                      ORDER BY RAND() LIMIT 0,1
                   ";

           $res_rex = mysqli_query($GLOBALS["___mysqli_ston"], $sel_rex) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_rex);
           $num_rex = mysqli_num_rows($res_rex);
           $row_rex = mysqli_fetch_array($res_rex);



           if($num_rex > 0){
              
              //reduce the points------------------------------------------------------------
              $reduce_sql = "UPDATE url_login_clicks SET   points       = points-1, 
                                                   visitors_received = visitors_received+1

                             WHERE  site_id = '{$row_rex['site_id']}'
                             ";

                             
              $reduce_res = mysqli_query($GLOBALS["___mysqli_ston"], $reduce_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$reduce_sql);
              //=======================UPDATE STATUS OF BANNERS AND TEXT ADS ========================================================
              $id = $row_rex['userId'];
            //  update_banner_status($id);
            //  update_textAdds_status($id);
              ///test =================================================
              $old_points = $row_rex['points'];
              $new_points = $old_points-1;
              $old_vcd    = $row_rex['visitors_received'];
              $new_vcd    = $old_vcd+1;
              
              //end =================================================

              //Lock the updater------------------------------------------------------------
              $update_lock_sql = "update url_login_sites set cron = 'DONE' WHERE  sid = ".$row_rex['site_id'];
              #fwrite($fp, "1 SiteId : {$row_rex['site_id']} \n  Ponits ( old = $old_points , new = $new_points ) \n vcd ( old =  $old_vcd , new = $new_vcd ) , SQL => $update_lock_sql  \n\n\n ");
              $update_lock_res = mysqli_query($GLOBALS["___mysqli_ston"], $update_lock_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$update_lock_sql);

              $user_id = $row_rex['userId'];
              $site_id = $row_rex['site_id'];



              /*****************************************
              Check the points availabe for this user.
              If point is 0 then send a mail to that 
			  user 
              *****************************************/

              $query_select_site  = "SELECT * FROM url_login_clicks WHERE user_id = '$user_id'";
              $result_select_site = mysqli_query($GLOBALS["___mysqli_ston"], $query_select_site);
              $total_user_site    = mysqli_num_rows($result_select_site);

              $query_zero_site    = "SELECT * FROM url_login_clicks WHERE user_id = '$user_id' AND points = '0'";
              $result_zero_site   = mysqli_query($GLOBALS["___mysqli_ston"], $query_zero_site);
              $total_zero_site    = mysqli_num_rows($result_zero_site);

              if($total_zero_site == $total_user_site)
              {

              		// Get the user email from user table
              		$query_user  = "SELECT * FROM users WHERE user_id = '$user_id' "; 
              		$result_user = mysqli_query($GLOBALS["___mysqli_ston"], $query_user);
              		$value_user  = mysqli_fetch_object($result_user);

              		$t_subject   = $value_user->fname.", Your Traffic Campaign is Completed";

                    $t_message   = "Hi  ". $value_user->fname .",<br /><br />
                    Mike Border here. Just a short note to let you know that you <br>
                    have no more credits left on your site(s). If you have <br>credits in your Unassigned Credits account, please log in and 
                    <br>assigned them to your sites. 
                    <br /><br />
                    Sincerely,<br /><br />
                    Mike<br />
                    <a href=". $base_url ." >". $base_url ."</a>";

      				//$global_admin_emailname = $global_admin_emailname;	
      				$mailHeader  = "From: $sitename <$global_admin_email> \n" ;
      				$mailHeader .= "X-Sender: $global_admin_email \n";	
      				$mailHeader .= "Content-Type: text/html \n";
      				$mailHeader .= "Return-Path: $global_admin_email \n";
      				$mailHeader .= "Error-To: $global_admin_email \n";
      				$mailHeader .= "X-Mailer: {$_SERVER['SERVER_NAME']} \n";
      				//$mailresult  = mail($value_user->email,$t_subject,$t_message,$mailHeader);

              }

              ///GOTO NEW-------------------------------------------------------------------
              /*header("Location: $row_rex['site_url']");
              die();*/
              //print_r($row_rex);


              $admin_site=$row_rex['site_url'];
              $site_owner_id=$row_rex['userId'];
              $site_id=$site_id;
              $table="url_login_sites";



            //  $smarty->assign("admin_site", $row_rex['site_url']);
            //  $smarty->assign("site_owner_id", $row_rex['userId']);
            //  $smarty->assign("site_id", $site_id);
            //  $smarty->assign("table", "url_login_sites");

           }//InnerSafe

       //----------------------------------------------------------------------------------------------------//
       //00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000//
       //----------------------------------------------------------------------------------------------------//

    }else{

       //UnLock the updater------------------------------------------------------------
       $update_unlock = "update url_login_sites set cron = 'NEED' WHERE  cron = 'DONE' AND status = 'L' ";
       $update_unlock = mysqli_query($GLOBALS["___mysqli_ston"], $update_unlock) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$update_unlock);

       //Check Whether pending is it
       $sel_mysites = "SELECT

                           a.site_id, a.points, a.visitors_received,
                           b.sid, b.site_url, b.status

                      FROM

                           url_login_clicks a, url_login_sites b

                      WHERE
                           (a.site_id = b.sid)
                      AND
                           (b.status = 'L')
                      AND
                           (b.cron = 'NEED')
                      AND
                           (a.points > 0)
                           
                      ORDER BY RAND() LIMIT 0,1
                      ";

       $res_mysites = mysqli_query($GLOBALS["___mysqli_ston"], $sel_mysites) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_mysites);
       $num_mysites = mysqli_num_rows($res_mysites);

       //1 site is available
       if($num_mysites > 0){

       //----------------------------------------------------------------------------------------------------//
       //00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000//
       //----------------------------------------------------------------------------------------------------//

           $sel_max = "SELECT
                           a.site_id, a.points, a.visitors_received,
                           b.sid, b.site_url, b.status, b.user_id as userId
                      FROM
                           url_login_clicks a, url_login_sites b
                      WHERE
                           (a.site_id = b.sid)
                      AND
                           (b.status = 'L')
                      AND
                           (b.cron = 'NEED')
                      AND
                           (a.points > 0)
                           
                      ORDER BY RAND() LIMIT 0,1
                  ";

            //echo $sel_rex;
            $res_max = mysqli_query($GLOBALS["___mysqli_ston"], $sel_max) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_max);
            $num_max = mysqli_num_rows($res_max);
            $row_max = mysqli_fetch_array($res_max);

            if($num_max > 0){
                
              $reduce_sql = "UPDATE url_login_clicks SET 
                                                    
                                                    points            = points-1, 
                                                    visitors_received = visitors_received+1

                             WHERE  site_id = '{$row_max['site_id']}'
                             ";
                             
              $reduce_res   = mysqli_query($GLOBALS["___mysqli_ston"], $reduce_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$reduce_sql);
  //	======================== UPDATE STATUS OF BANNERS AND TEXT ADS ===========================================================
              //print_r($row_max['userId']);
              $user = $row_max['userId'];
            //  update_banner_status($user);
            //  update_textAdds_status($user);

              ///test =================================================
              $old_points = $row_max['points'];
              $new_points = $old_points-1;
              $old_vcd    = $row_max['visitors_received'];
              $new_vcd    = $old_vcd+1;
              
              //end =================================================

              //Lock the updater------------------------------------------------------------
              $update_sql_lock = "update url_login_sites set cron = 'DONE' WHERE  sid = '{$row_max['site_id']}'";
              #fwrite($fp, "2 SiteId : {$row_max['site_id']} \n  Ponits ( old = $old_points , new = $new_points ) \n vcd ( old =  $old_vcd , new = $new_vcd ) , SQL => $update_sql_lock  \n\n\n ");
              $update_res_lock = mysqli_query($GLOBALS["___mysqli_ston"], $update_sql_lock) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$update_sql_lock);

			  $user_id = $row_max['userId'];
              $site_id = $row_max['site_id'];	

			  /*****************************************
              Check the points availabe for this user.
              If point is 0 then send a mail to that 
			  user 
              *****************************************/

              $query_select_site  = "SELECT * FROM url_login_clicks WHERE user_id = '$user_id' ";
              $result_select_site = mysqli_query($GLOBALS["___mysqli_ston"], $query_select_site);
              $total_user_site    = mysqli_num_rows($result_select_site);
              
              $query_zero_site    = "SELECT * FROM url_login_clicks WHERE user_id = '$user_id' AND points = '0' ";
              $result_zero_site   = mysqli_query($GLOBALS["___mysqli_ston"], $query_zero_site);
              $total_zero_site    = mysqli_num_rows($result_zero_site);

              if($total_zero_site == $total_user_site)
              {

              		// Get the user email from user table
              		$query_user  = "SELECT * FROM url_users WHERE user_id = '$user_id'";
            		$result_user = mysqli_query($GLOBALS["___mysqli_ston"], $query_user);
              		$value_user  = mysqli_fetch_object($result_user);
              		$t_subject   = $value_user->fname.", Your Traffic Campaign is Completed";
			        $t_message   = "Hi  ". $value_user->fname .",<br /><br />
                        Mike Border here. Just a short note to let you know that you have no<br />
                        more credits left on your site.  If you would like to purchase<br /> more traffic, 
                        please click on the link below.<br /><br />
                        Sincerely,<br /><br />
                        Mike<br />
                        <a href=". $base_url ." >". $base_url ."</a>";

      				//$global_admin_emailname = $global_admin_emailname;	
      				$mailHeader = "From: $sitename <$global_admin_email> \n" ;
      				$mailHeader .= "X-Sender: $global_admin_email \n";	
      				$mailHeader .= "Content-Type: text/html \n";
      				$mailHeader .= "Return-Path: $global_admin_email \n";
      				$mailHeader .= "Error-To: $global_admin_email \n";
      				$mailHeader .= "X-Mailer: {$_SERVER['SERVER_NAME']} \n";
      				//$mailresult  = mail($value_user->email,$t_subject,$t_message,$mailHeader);
              }	

              ///GOTO NEW-------------------------------------------------------------------
              /*header("Location: $row_max['site_url']");
              die();*/
              //print_r($row_max);


              // LOGIN sITES REDIRECTION --------------------------------------------------------------------------------------------------
                 //print_r($row_max);

                 $admin_site=$row_max['site_url'];
                 $site_id=$row_max['site_id'];
                 $site_owner_id=$row_max['userId'];
                 $table="url_login_sites";




                // $smarty->assign("admin_site", $row_max['site_url']);
                // $smarty->assign("site_id", $row_max['site_id']);
                // $smarty->assign("site_owner_id", $row_max['userId']);
                // $smarty->assign("table", "url_login_sites");

           }//InnerSafe

       //----------------------------------------------------------------------------------------------------//
       //00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000//
       //----------------------------------------------------------------------------------------------------//

       } else{
        
          $sel_admin_mysites = "SELECT id FROM  url_login_my_site WHERE 1";
          $res_admin_mysites = mysqli_query($GLOBALS["___mysqli_ston"], $sel_admin_mysites) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_admin_mysites);
          $num_admin_mysites = mysqli_num_rows($res_admin_mysites);

          if($num_admin_mysites == 0){

            //echo "Admin static site";
        

             //$smarty->assign("admin_site", "http://www.myguaranteedvisitors.com");
          }
          elseif($num_admin_mysites > 0){
             //echo "<br>ADMIN LOOP num=> $num_admin_mysites <br>";
             //exit;

                 $sel_ran_admin_mysites = "SELECT * FROM  url_login_my_site WHERE 1 ORDER BY RAND() LIMIT 0,1";
                 $res_ran_admin_mysites = mysqli_query($GLOBALS["___mysqli_ston"], $sel_ran_admin_mysites) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_ran_admin_mysites);
                 $row_ran_admin_mysites = mysqli_fetch_array($res_ran_admin_mysites);
                 //echo "<br> URL => $row_ran_admin_mysites['site_url'] <br>";
                 //exit;
                 /*header("Location: $row_ran_admin_mysites['site_url']");
                 die();*/
                 //print_r($row_ran_admin_mysites);
//echo $row_ran_admin_mysites['site_url']; exit;
  

                 $admin_site=$row_ran_admin_mysites['site_url'];
                 $site_id=$row_ran_admin_mysites['id'];
                 $site_owner_id="admin";
                 $table="url_login_my_site";




               //  $smarty->assign("admin_site", $row_ran_admin_mysites['site_url']);
               //  $smarty->assign("site_id", $row_ran_admin_mysites['id']);
               //  $smarty->assign("site_owner_id", "admin");
               //  $smarty->assign("table", "url_login_my_site");


                 /*$smarty->assign("admin_site", $row_ran_admin_mysites['site_url']);*/

          }//Admin Sites > 0 End
       }//Admin Sites == 0 End


       ///---------------------------ADMIN SITES---------------------------------------//
    }//End-Else




    ///----------------------------------------------------------------------------------------------//

  
    //GET LOGING TIMMER FROM SITE SETTING 
    $sel_sql = "SELECT login_timer FROM url_site_setting"; 

    $sel_res      = mysqli_query($GLOBALS["___mysqli_ston"], $sel_sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_sql);
    $site_setting    = mysqli_fetch_array($sel_res);

    $login_timer= $site_setting['login_timer'];

  //  $smarty->display('popup.tpl');















?>

<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
	body
	{
		margin: 0;
		padding: 0;
		font-family: 'Open Sans', sans-serif;
	}
	.top-bar-1 {
    background: #2B547E;
    color: #fff;
    padding: 10px;
        height: 51px;
}

.n-report input[type='submit']
{
	float: right;
    position: relative;
    top: 8px;
    background: #EFEFEF;
    border: none;
    padding: 10px 22px;
    border-radius: 3px;
}
#counter
{
	
	font-family: 'Open Sans', sans-serif;
}
.top-bar-2
{

	    background: #F5F5F5;
    padding: 12px;
}
#dialog-second
{
	position: relative;
    bottom: 8px;
        display: table;
    margin: 0 auto; 

}

</style>



<div>

 <iframe src="<? echo $admin_site; ?>" style="height: 100%; width: 100%;"></iframe>  

</div>





  
  <script type="text/javascript">
    var f = document.getElementById("counter").className;

      function delay () { 
			setTimeout(function () {    
		
      console.log(f);

		      document.getElementById("counter").innerHTML = "Please view this advertiser's site for "+ f +" seconds";          
		
      
		      f--;                     
		      if (f >= 0) {            
		         delay();              
		      }else{

		
      	document.getElementById("dialog-second").style.display = "";
		      	document.getElementById("counter").innerHTML = "";
		      	 
		      }                 
		   }, 1000)
		}

	delay();


	function navigate(){
		/*alert("adsf");*/
		window.location='/rusers/login_sites.php';
	}


        
    </script>

<?

















    //////////////RRRRRRRRRRRRRRRRRRRRRRRRR///////////////////////////////////////////////////////////
?>