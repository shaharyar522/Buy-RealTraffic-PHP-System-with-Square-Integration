<?php



/**  function get_user_email($cid)

 *    ----------------------------------------------------------------

 *    Purpose:             return  candidate email from candidate id

 *    Arguments/Parameters:$tb_candidate

 *    Returns/Assigns:     $email               -

 *    (Description)        return candidate email from candidate id

 */



function get_user_id($user_name){

  global $tb_users;



  $sel_qry = "select * from $tb_users where user_name = '$user_name'";

  //echo $sel_qry;

  $res_qry = mysqli_query($GLOBALS["___mysqli_ston"], $sel_qry) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_qry);

  $row_val = mysqli_fetch_array($res_qry);

  return $row_val['user_id'];

}



/**  function get_user_id($email)

 *    ----------------------------------------------------------------

 *    Purpose:             return  candidate email from candidate id

 *    Arguments/Parameters:$tb_candidate

 *    Returns/Assigns:     $email               -

 *    (Description)        return candidate email from candidate id

 */



function email_to_userid($email){

  global $tb_users;



  $sel_qry = "select * from $tb_users where email = '$email'";

  //echo $sel_qry;

  $res_qry = mysqli_query($GLOBALS["___mysqli_ston"], $sel_qry) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_qry);

  $row_val = mysqli_fetch_array($res_qry);

  return $row_val['user_id'];

}



/**  function get_user_email($cid)

 *    ----------------------------------------------------------------

 *    Purpose:             return  candidate email from candidate id

 *    Arguments/Parameters:$tb_candidate

 *    Returns/Assigns:     $email               -

 *    (Description)        return candidate email from candidate id

 */



function get_user_name($user_id){

  global $tb_users;



  if($user_id<0) return 'System';





  $sel_qry = "select * from $tb_users where user_id = '$user_id'";

  //echo $sel_qry;

  $res_qry = mysqli_query($GLOBALS["___mysqli_ston"], $sel_qry) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_qry);

  $row_val = mysqli_fetch_array($res_qry);

  return $row_val['user_name'];

}



/**  function get_user_email($cid)

 *    ----------------------------------------------------------------

 *    Purpose:             return  candidate email from candidate id

 *    Arguments/Parameters:$tb_candidate

 *    Returns/Assigns:     $email               -

 *    (Description)        return candidate email from candidate id

 */



function get_user_email($user_id){

  global $tb_users;



  $sel_qry = "select * from $tb_users where user_id = '$user_id'";

  //echo $sel_qry;

  $res_qry = mysqli_query($GLOBALS["___mysqli_ston"], $sel_qry) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_qry);

  $row_val = mysqli_fetch_array($res_qry);

  return $row_val['email'];

}



/**  function get_user_email($cid)

 *    ----------------------------------------------------------------

 *    Purpose:             return  candidate email from candidate id

 *    Arguments/Parameters:$tb_candidate

 *    Returns/Assigns:     $email               -

 *    (Description)        return candidate email from candidate id

 */



function get_user_exist($user_name){

  global $tb_user;



  $sel_qry = "select * from $tb_user where user_name = '$user_name'";

  //echo $sel_qry;

  $res_qry = mysqli_query($GLOBALS["___mysqli_ston"], $sel_qry) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_qry);

  $num_val = mysqli_num_rows($res_qry);

  if($num_val == 0) return false;

  if($num_val == 1) return true;

}







/**  function get_user_email($cid)

 *    ----------------------------------------------------------------

 *    Purpose:             return  candidate email from candidate id

 *    Arguments/Parameters:$tb_candidate

 *    Returns/Assigns:     $email               -

 *    (Description)        return candidate email from candidate id

 */



function get_user_pass($user_id){

  global $tb_users;



  $sel_qry = "select * from $tb_users where user_id = '$user_id'";

  //echo $sel_qry;

  $res_qry = mysqli_query($GLOBALS["___mysqli_ston"], $sel_qry) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_qry);

  $row_val = mysqli_fetch_array($res_qry);

  return $row_val['password'];

}



/**  function   start_month_listo($selected='')

 *    ----------------------------------------------------------------

 *    Purpose:              List of jobs in a job type list

 *    Arguments/Parameters: $tb_jobtype

 *    Returns/Assigns:      $jobtype_listo

 *    (Description)         Return total job types in a job type list

 */



 function date_listo($day) {

   

        $print = "";

        if($day==""){

          $day = date("j");

        }

    	for($i=1; $i<=31; $i++) {

          

	       if($i == $day) {

             $print.= "<option value=\"$i\" selected>$i</option>";

           }

	       else {

		      $print.= "<option value=\"$i\">$i</option>";

	       }

	   }

	   return $print;

    }



/**  function   start_month_listo($selected='')

 *    ----------------------------------------------------------------

 *    Purpose:              List of jobs in a job type list

 *    Arguments/Parameters: $tb_jobtype

 *    Returns/Assigns:      $jobtype_listo

 *    (Description)         Return total job types in a job type list

 */



 function month_listo($month) {

      $mon_list=array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");

      if($month==""){

          $month = date("m");

          //echo $month;

        }

      while(list($key,$val)=each($mon_list)){

        

          if($key==$month){

             $print.="<option value=\"$key\" selected>$val</option>";

          }

          else {

            $print.="<option value=\"$key\">$val</option>";

          }

        }

      return $print;

    }



/**  function   year_listo($selected='')

 *    ----------------------------------------------------------------

 *    Purpose:              List of jobs in a job type list

 *    Arguments/Parameters: $tb_jobtype

 *    Returns/Assigns:      $jobtype_listo

 *    (Description)         Return total job types in a job type list

 */



 function year_listo($year) {

        $print = "";

        if($year==""){

          $year = date("Y");

        }

    	for($i=2007; $i<=2009; $i++) {

	       if($i == $year) {

	      	  $print.= "<option value=\"$i\" selected>$i</option>";

	       }

	       else {

		      $print.= "<option value=\"$i\">$i</option>";

	       }

	   }

	   return $print;

  }





/**  function   site_balance($sid='')

 *    ----------------------------------------------------------------

 *    Purpose:              List of jobs in a job type list

 *    Arguments/Parameters: $tb_jobtype

 *    Returns/Assigns:      $jobtype_listo

 *    (Description)         Return total job types in a job type list

 */



function site_balance($sid){



    $sel_count = "SELECT points FROM {$GLOBALS['tb_points']} WHERE site_id = '$sid'";

    //echo "<pre>$sel_count</pre>";

    $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);

    $row_count_info = mysqli_fetch_row($res_count);

    return $row_count_info[0];

}//EndFunction





function login_site_balance($sid){



    $sel_count = "SELECT points FROM url_login_clicks WHERE site_id = '$sid'";

    //echo "<pre>$sel_count</pre>";

    $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);

    $row_count_info = mysqli_fetch_row($res_count);

    return $row_count_info[0];

}//EndFunction





/**  function   site_balance($sid='')

 *    ----------------------------------------------------------------

 *    Purpose:              List of jobs in a job type list

 *    Arguments/Parameters: $tb_jobtype

 *    Returns/Assigns:      $jobtype_listo

 *    (Description)         Return total job types in a job type list

 */



function get_site_name($sid){



    $sel_name = "SELECT site_name FROM {$GLOBALS['tb_site']} WHERE sid = '$sid'";

    //echo $sel_name;

    $res_name = mysqli_query($GLOBALS["___mysqli_ston"], $sel_name) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_name);

    $row_name = mysqli_fetch_array($res_name);

    

    //echo "<pre>$row_name['site_name']</pre>";

    

    return $row_name['site_name'];

}//EndFunction

function get_site_name_login_sites($sid){



    $sel_name = "SELECT site_name FROM url_login_sites WHERE sid = '$sid'";

    //echo $sel_name;

    $res_name = mysqli_query($GLOBALS["___mysqli_ston"], $sel_name) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_name);

    $row_name = mysqli_fetch_array($res_name);

    

    //echo "<pre>$row_name['site_name']</pre>";

    

    return $row_name['site_name'];

}



function get_site_url($sid){



    $sel_name = "SELECT site_url FROM {$GLOBALS['tb_site']} WHERE sid = '$sid'";

    //echo $sel_count;

    $res_name = mysqli_query($GLOBALS["___mysqli_ston"], $sel_name) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_name);

    $row_name = mysqli_fetch_array($res_name);



    return $row_name['site_url'];

}//EndFunction





/**  function   site_balance($sid='')

 *    ----------------------------------------------------------------

 *    Purpose:              List of jobs in a job type list

 *    Arguments/Parameters: $tb_jobtype

 *    Returns/Assigns:      $jobtype_listo

 *    (Description)         Return total job types in a job type list

 */

function site_meet_old($sid){



    $sel_count      = "SELECT id FROM {$GLOBALS['tb_clicks']} WHERE site_id = '$sid'";

    //echo "<pre>$sel_count</pre>";

    $res_count      = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);

    $row_count_info = mysqli_num_rows($res_count);

    return $row_count_info;

    

    

}//EndFunction





function site_meet($sid){



    //$sel_count      = "SELECT id FROM $GLOBALS['tb_clicks'] WHERE site_id = '$sid'";

    //echo "<pre>$sel_count</pre>";

    //$res_count      = mysql_query($sel_count) or die(mysql_error().$sel_count);

    //$row_count_info = mysql_num_rows($res_count);

    //return $row_count_info;

    

    $sel_count = "SELECT visitors_received FROM {$GLOBALS['tb_points']} WHERE site_id = '$sid'";

    ///echo "<pre>$sel_count</pre>";

    $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);

    $row_count_info = mysqli_fetch_row($res_count);

    return $row_count_info[0];

    

    

}//EndFunction



function login_site_meet($sid){



    //$sel_count      = "SELECT id FROM $GLOBALS['tb_clicks'] WHERE site_id = '$sid'";

    //echo "<pre>$sel_count</pre>";

    //$res_count      = mysql_query($sel_count) or die(mysql_error().$sel_count);

    //$row_count_info = mysql_num_rows($res_count);

    //return $row_count_info;

    

    $sel_count = "SELECT visitors_received FROM url_login_clicks WHERE site_id = '$sid'";

    ///echo "<pre>$sel_count</pre>";

    $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);

    $row_count_info = mysqli_fetch_row($res_count);

    return $row_count_info[0];

    

    

}//EndFunction



function isValidURL($url) {
  return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}



function get_sid_to_uid($sid){



    $sel_name = "SELECT user_id FROM {$GLOBALS['tb_site']} WHERE sid = '$sid'";

    //echo $sel_count;

    $res_name = mysqli_query($GLOBALS["___mysqli_ston"], $sel_name) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_name);

    $row_name = mysqli_fetch_array($res_name);



    return $row_name['user_id'];

}//EndFunction



function get_login_sid_to_uid($sid){



    $sel_name = "SELECT user_id FROM {$GLOBALS['tb_login_sites']} WHERE sid = '$sid'";

    //echo $sel_count;

    $res_name = mysqli_query($GLOBALS["___mysqli_ston"], $sel_name) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_name);

    $row_name = mysqli_fetch_array($res_name);



    return $row_name['user_id'];

}//EndFunction





?>

