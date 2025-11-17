<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename login_site list_all Info";
include("$CONFIG->templatedir/header.php");










 $sel_dis = "SELECT * from users WHERE username = '$_REQUEST['ud']'";
        $res_dis = mysqli_query($GLOBALS["___mysqli_ston"], $sel_dis) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_dis);
        $row_dis = mysqli_fetch_array($res_dis);
       echo  $fname=$row_dis['firstname'];
       echo         $lname=$row_dis['lastname'];
       echo         $email=$row_dis['email'];
       echo 	$net_income=$row_dis['net_income'];
       echo         $password=$row_dis['password'];
       echo         $signup_ip=$row_dis['last_ip'];
       echo         $signup_time=$row_dis['joindate'];
       echo         $ud=$row_dis['id'];
       echo         $uname=$row_dis['username'];
       echo         $status=$row_dis['status'];
       echo         $paypal_email=$row_dis['payment_id'];
       echo         $ref_by=$row_dis['ref_by'];
        if($row_dis['status'] == 'W') { $status_w='SELECTED'; }
        if($row_dis['status'] == 'L') { $status_l='SELECTED'; }
        if($row_dis['status'] == 'H') { $status_h='SELECTED'; }

	

	$unassigned_login_credits_query = "SELECT * FROM url_unassigned_login_credits WHERE user_id= '$_REQUEST['ud']'";
     //echo $sel_count;

     $unassigned_login_credits_result = mysqli_query($GLOBALS["___mysqli_ston"], $unassigned_login_credits_query) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$unassigned_login_credits_query);

	

	if(mysqli_num_rows($unassigned_login_credits_result))
	{
		 while($row = mysqli_fetch_array($unassigned_login_credits_result)) 
		 {   $login_credits = $row['login_credits'];	

		 }

	}
	else
	{
		$login_credits = 0;
	}
	echo $ul_credits=$login_credits;














$page_content = "<div class=text id=heading  align=center><h3> User Account Details Page </h3></div>";


$page_content .="<form name=step1frm action=user_info_approve.php method=post enctype=multipart/form-data>

<table width=600  cellspacing=0 cellpadding=0  border=0 align=center>";
  if($err_msg){
  $page_content .="  <tr><td align=center colspan=2>"; $page_content .=$error_temp;
  $page_content .="</td></tr>";
  }
$page_content .="</table><br>";


$page_content .="</form>";



include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");