<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename traffic_site list_all Info";
include("$CONFIG->templatedir/header.php");


?>
<script>


 function update_frm(){
     document.step1frm.action="traffic_site_info_approve.php";
     document.step1frm.act.value="edit";
     document.step1frm.submit();
  }



  function delete_frm(){
     document.step1frm.action="traffic_site_info_approve.php";
     document.step1frm.act.value="delete";
     document.step1frm.submit();
  }


  function confirmation() {
	var answer = confirm("Are you sure to delete this traffic details?")
	if (answer){
		return delete_frm();
	}
	else{
		alert("Thanks for sticking around !")
	}
 }
</script>
<?





function get_login_sid_to_uid($sid){
    $sel_name = "SELECT user_id FROM traffic_sites WHERE sid = '$sid'";
    $res_name = mysqli_query($GLOBALS["___mysqli_ston"], $sel_name) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_name);
    $row_name = mysqli_fetch_array($res_name);
    return $row_name['user_id'];
}//EndFunction





//sssssssss 1-9-2018
function isValidURL($url) {
   return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
 }

  if(isset($_REQUEST['act']) && $_REQUEST['act'] == 'edit'){ 
             $uc_id  = get_login_sid_to_uid($_REQUEST['sd']); 

/*21sep2018
      $sql_cde   = "SELECT points from traffic_clicks WHERE user_id = '$uc_id'  and site_id != '$_REQUEST['sd']' "; 
             $res_cde   = mysql_query($sql_cde) or die(mysql_error().$sql_cde);
             $other_pts = 0;           

                while($row_cde   = mysql_fetch_array($res_cde)){
                      $other_pts = ($row_cde['points'] + $other_pts) ;

                }  
   		     if(!$site_name) {
		   	    $err_msg .= "<li>Invalid site title</li>";
		     }
		     if(!isValidURL($site_url)){
		   	    $err_msg .= "<li> Please enter valid URL including http://</li>";
             }            



    $sql_xyz = "SELECT * FROM url_unassigned_login_credits WHERE user_id = '$uc_id'"; 
    $res_xyz = mysql_query($sql_xyz)or die(mysql_error().$sql_xyz);
    $row_xyz = mysql_fetch_array($res_xyz);
    $cnts = '0';
    $curr_tab_pts_xxx='0';
	$sql_vv = "SELECT * FROM traffic_sites  WHERE user_id = '$uc_id' order by sid ASC"; 
	$res_vv = mysql_query($sql_vv)or die(mysql_error().$sql_vv);
	while($row_vv = mysql_fetch_array($res_vv)) {
          $site_points       = login_site_balance($row_vv[0]);
          $curr_tab_pts_xxx  = ($site_points + $curr_tab_pts_xxx);
          $cnts++;
	}

          $curr_frm_pts      = ($_REQUEST['site_pt'] + $other_pts ); 
          $curr_ac_pts       = $row_xyz['login_credits'];
          $curr_tab_pts      = $curr_tab_pts_xxx;
           if($curr_tab_pts == '0'){
               if($curr_ac_pts < $curr_frm_pts){
                  $err_msg_pt = "<li> You have $curr_ac_pts Unassigned Users only.</li>";
               }//

               if($curr_ac_pts >= $curr_frm_pts){
                  $Pending = ($curr_ac_pts - $curr_frm_pts);
               }//
               if($curr_ac_pts < $curr_frm_pts){
                  $Pending = ($curr_ac_pts - $curr_frm_pts);
               }//

          }

         if($curr_tab_pts != '0'){
             $rem_pts = $curr_ac_pts+$curr_tab_pts-$curr_frm_pts;

             if($rem_pts>=0){
				$Pending = $rem_pts;
			}
			else{
				$err_msg_pt = "<li> You have $curr_ac_pts Unassigned Users only.</li>";
			}
         }

     $err_msg .=  $err_msg_pt;


21sep2018*/
 			// if(!$err_msg) {
                           if($uc_id) { 
  					       $sql = "UPDATE traffic_sites   SET
                                                       site_name   = '{$_POST['site_name']}',
                                                       site_url    = '{$_POST['site_url']}',
                                                       status      = '{$_POST['site_status']}',
                                                       edit_time   = now()
                                   WHERE sid = '{$_REQUEST['sd']}' ";  

  			     $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);
                   //update_banner_status($_REQUEST['owner_id']);
                   //update_textAdds_status($_REQUEST['owner_id']);
     					   $err_msg = "<li>Site Details has updated";
//25 9 2018  
 //  $sql_req = "UPDATE  url_unassigned_login_credits SET login_credits = '$Pending' WHERE user_id = '$uc_id' "; 
 //	    $res_req = mysql_query($sql_req)or die(mysql_error().$sql_req);
//25 9 2018

  
        $ups_del = "UPDATE traffic_clicks set points = '{$_REQUEST['site_pt']}' WHERE site_id = '{$_REQUEST['sd']}' limit 1"; 

        $ups_del = mysqli_query($GLOBALS["___mysqli_ston"], $ups_del) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ups_del);  

     //    echo "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=traffic_site_info_approve.php?sd=$_REQUEST['sd']&setemp=$err_msg&#SITE-LOGIN'>";

    echo "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=edit_users_new_traffic.php?ud=$uc_id&setemp=$err_msg&#SITE-LOGIN'>";



         exit();  
      } else{

   echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=traffic_site_info_approve.php?sd={$_REQUEST['sd']}&setemp=$err_msg&#SITE-LOGIN'>";
           exit();
           }
   }

//sssssssss 1-9-2018











        if(isset($_REQUEST['act']) && $_REQUEST['act'] == 'delete'){ 
      $sx_pts = login_site_balance($_REQUEST['sd']); 
      $uc_id  = get_login_sid_to_uid($_REQUEST['sd']); 



       	   $sql_xyz = "SELECT login_credits FROM url_unassigned_login_credits WHERE user_id = '$uc_id' ";
 	       $res_xyz = mysqli_query($GLOBALS["___mysqli_ston"], $sql_xyz)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_xyz);
           $row_xyz = mysqli_fetch_array($res_xyz);
           $my_full_pts = $row_xyz['login_credits'];
        echo   $updates_pts = ($my_full_pts + $sx_pts); 

 $sql_reqx = "UPDATE  url_unassigned_login_credits SET login_credits = '$updates_pts'  WHERE user_id = '$uc_id' ";
 $res_reqx = mysqli_query($GLOBALS["___mysqli_ston"], $sql_reqx)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_reqx);






/*
        $sql_xyz = "SELECT login_credits FROM url_unassigned_login_credits WHERE user_id = '$uc_id' ";
 	       $res_xyz = mysql_query($sql_xyz)or die(mysql_error().$sql_xyz);
           $row_xyz = mysql_fetch_array($res_xyz);
           $my_full_pts = $row_xyz['login_credits'];
           $updates_pts = ($my_full_pts + $sx_pts);

 echo $sql_reqx = "UPDATE  url_unassigned_login_credits SET login_credits = '$updates_pts'  WHERE user_id = '$uc_id' "; exit;
 	       $res_reqx = mysql_query($sql_reqx)or die(mysql_error().$sql_reqx);
*/
	   	   $sql = "DELETE FROM traffic_sites   WHERE sid = '{$_REQUEST['sd']}' LIMIT 1";  
		   $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);


  		   $sql_xx = "DELETE FROM traffic_clicks  WHERE site_id = '{$_REQUEST['sd']}'";
 		   $res_xx = mysqli_query($GLOBALS["___mysqli_ston"], $sql_xx)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_xx);
/*
	   	   $sql_cc = "DELETE FROM traffic_clicks  WHERE site_id = '$_REQUEST['sd']' LIMIT 1";
 		   $res_cc = mysql_query($sql_cc)or die(mysql_error().$sql_cc);
*/
           $err_msg = "Your select site has deleted";
 //  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=traffic_site_info_approve.php?ud=$uc_id&setemp=$err_msg&#SITE-LOGIN'>";

echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=edit_users_new_traffic.php?ud=$uc_id&setemp=$err_msg&#SITE-LOGIN'>";


           exit();
        }





$status_w=''; 
$status_l='';
$status_h=''; 
$status_a=''; 






function login_site_meet($sid){
    $sel_count = "SELECT visitors_received FROM traffic_clicks WHERE site_id = '$sid'";
    $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);
    $row_count_info = mysqli_fetch_row($res_count);
    return $row_count_info[0];
}//EndFunction





function login_site_balance($sid){
    $sel_count = "SELECT points FROM traffic_clicks WHERE site_id = '$sid'";
    $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);
    $row_count_info = mysqli_fetch_row($res_count);
    return $row_count_info[0];
}//EndFunction


        $sel_dis = "SELECT * from traffic_sites  WHERE sid = '{$_REQUEST['sd']}'";
        $res_dis = mysqli_query($GLOBALS["___mysqli_ston"], $sel_dis) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_dis);
        $row_dis = mysqli_fetch_array($res_dis);

        $site_name=$row_dis['site_name'];
         $site_url=$row_dis['site_url'];
         $new_time=$row_dis['new_time'];
         $edit_time=$row_dis['edit_time'];

         $uname=$row_dis['user_id'];
         $status=$row_dis['status'];
 $sd=$_REQUEST['sd'];

        $site_balance = login_site_balance($sd);
        $site_pt=$site_balance;



        $site_views = login_site_meet($sd);
        $site_views=$site_views;

        $meet_time = login_site_meet($sd);
        $meet_time=$meet_time;



        if($row_dis['status'] == 'W') { $status_w='SELECTED'; }
        if($row_dis['status'] == 'L') { $status_l='SELECTED'; }
        if($row_dis['status'] == 'H') { $status_h='SELECTED'; }
        if($row_dis['status'] == 'A') { $status_a='SELECTED'; }








$page_content = "<div class=text id=heading  align=center><h3> Traffic Site Info Approved Page </h3></div>";




$page_content .="<table width=90%  cellpadding=0 cellspacing=0 border=0>
  <td  align=right>&nbsp;&nbsp;</td>
  </tr>
</table>
<form name=step1frm action=edit_users_new_traffic.php method=post enctype=multipart/form-data>
<table width=600  cellspacing=0 cellpadding=0  border=0 align=center>";

 $error_temp = $_REQUEST['setemp'] ?? '';
  if (  isset($error_temp) &&  $error_temp!=null ){

  $page_content .="  <tr><td align=center colspan=2 >"; $page_content .=$error_temp; $page_content .="</td></tr>";
  }
$page_content .="</table>
<br>
<table width=500  cellspacing=0 cellpadding=0  border=0 align=center>
<tr><td >Traffic Site Details</td></tr>
<tr>
   <td align=left height=35 colspan=4 >&nbsp;&nbsp;</td>
    <tr><td valign=top >
     <table width=100% border=0 align=center>
         <tr>
           <td width=15%>&nbsp;&nbsp;</td>
 	       <td width=35% align=left height=35 >&nbsp;&nbsp;Owned by#</td>
   	       <td width=35% align=left  height=35>{$uname}&nbsp;&nbsp;<a href='edit_users_new_traffic.php?ud=$uname'>['^']</a></td>
           <input type=hidden name='owner_id' value='$uname' >
           <td width=15%>&nbsp;&nbsp;</td>

         </tr>
         <tr>
           <td width=15%>&nbsp;&nbsp;</td>
 	       <td width=35% align=left height=35 >&nbsp;&nbsp;Site Name</td>
   	       <td width=35% align=left  height=35><input type=text name='site_name' value='$site_name' ></td>
           <td width=15%>&nbsp;&nbsp;</td>
         </tr>
         <tr>
           <td width=15%>&nbsp;&nbsp;</td>
           <td width=35% align=left height=35  >&nbsp;&nbsp;Site URL</td>
   	       <td width=35% align=left  height=35><input type=text name='site_url' value='$site_url' ></td>
           <td width=15%>&nbsp;&nbsp;</td>
        </tr>
         <tr>
           <td width=15%>&nbsp;&nbsp;</td>
	       <td nowrap width=35% align=left height=35 >&nbsp;&nbsp;Visitors Assigned</td>
   	       <td width=35% align=left  height=35><input type=text name='site_pt' value='$site_pt'  

                                                                    ONKEYPRESS='if (document.layers)
                                                                     var c = event.which;
                                                                     else if (document.all)
                                                                     var c = event.keyCode;
                                                                     else
                                                                      var c = event.charCode;
                                                                      var s = String.fromCharCode(c);
                                                                      if(c!=0) return /[0-9]/.test(s); else return;'></td>
           <td width=15%>&nbsp;&nbsp;</td>
        </tr>
         <tr>
           <td width=15%>&nbsp;&nbsp;</td>
	       <td width=35% align=left height=35  >&nbsp;&nbsp;Visitors Received</td>
   	       <td width=35% align=left  height=35>$site_views</td>
           <td width=15%>&nbsp;&nbsp;</td>
        </tr>
         <tr>
           <td width=15%>&nbsp;&nbsp;</td>
	       <td width=35% align=left height=35  >&nbsp;&nbsp;Status</td>
   	       <td width=35% align=left  height=35>
    	     <select name='site_status' >
                 <option value='W' $status_w>Waiting For Approval</option>
                 <option value='L' $status_l>Active</option>
                 <option value='H' $status_h>Paused</option>
                 <option value='A' $status_a>Suspended</option>

             </select>
            </td>
           <td width=15%>&nbsp;&nbsp;</td>
        </tr>
        <tr><td width=100% colspan=3>&nbsp;&nbsp;</td></tr>
      </table>
   </td>
  </tr>
  <tr><td align=left height=35 colspan=4 class=tdimage1>&nbsp;&nbsp;</td></tr>
 </table>
    <input type=hidden name=act     value='1'>
    <input type=hidden name=mode    value='1'>
    <input type=hidden name=sd      value='$sd' >
    <input type=hidden name=ud      value='$uname' >

<table width=100% class=menubar cellpadding=0 cellspacing=0 border=0>

  <td  width=40%>&nbsp;&nbsp;</td>

  <td   align=right>
        <table width=20% cellpadding=0 cellspacing=2 border=0 id=toolbar>
          <tr valign=middle align=center>
             <td align=right><INPUT name=Update   onclick=update_frm()   type=submit  value=Update></td>
             <td align=right><INPUT name=Delete  class='btn' onclick=confirmation()   type=submit  value=Delete></td>
         </tr>
         <tr><td align=left height=35 colspan=2 class=tdimage1>&nbsp;&nbsp;</td></tr>
        </table>
   </td>
 </tr>
</table>
</form>";






	$sql_ssv = "SELECT * FROM traffic_sites WHERE user_id = '$uname' order by sid ASC";
	$cntsas = '0';
	$res_ssv = mysqli_query($GLOBALS["___mysqli_ston"], $sql_ssv)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_ssv);


 $num_rem_satt = mysqli_num_rows($res_ssv);


$page_content___bysatt = "<div align=center><b>#User Traffic Sites</b><br><br></div>";




$page_content___bysatt .= " <table border=0  cellpadding=3 cellspacing=0 width=700 align=center >
         <tr >
          <td align=left class='textbld' >Site name</td>
          <td align=left class='textbld' >Site URL</td>
          <td align=left class='textbld' >Visitors<br>Assigned</td>
          <td align=left class='textbld' >Visitors<br>Received</td>
          <td align=left class='textbld' >Status</td>
         </tr>

         <tr><td class='horizontal_dotted_line' colspan=5>&nbsp;&nbsp;</td></tr>";


while($row_ssv = mysqli_fetch_array($res_ssv)) { 


        $page_content___bysatt .= " <tr>             

		<td align=left  style=word-wrap: break-word width=80>";
 $page_content___bysatt .= stripslashes($row_ssv['site_name']);
 $page_content___bysatt .= "</td>

		       <td align=left  style=word-wrap: break-word width=280><a href='traffic_site_info_approve.php?sd={$row_ssv['sid']}'>";

 $page_content___bysatt .=stripslashes($row_ssv['site_url']);
 $page_content___bysatt .="</a></td>
		       <td align=left>";
 $page_content___bysatt .=login_site_balance($row_ssv[0]);
                     
 $page_content___bysatt .="  </td>

		       <td align=left >";
 $page_content___bysatt .= login_site_meet( $row_ssv[0] );
 $page_content___bysatt .="</td>
               <td align=left >";

if(stripslashes($row_ssv['status'])=='W')
 $page_content___bysatt .= 'WAITING';

if(stripslashes($row_ssv['status'])=='L')
 $page_content___bysatt .= 'ACTIVE';

if(stripslashes($row_ssv['status'])=='H')
 $page_content___bysatt .= 'PAUSED';

if(stripslashes($row_ssv['status'])=='A')
 $page_content___bysatt .= 'SUSPENDED';



        $page_content___bysatt .= "</td>

		     </tr>";
}


if(  $num_rem_satt == 0  ) {
$page_content___bysatt .= " <tr>
		  <td colspan=5 align=center><b><font color=red>No site in list</font></b></td>
	       </tr>";
             }
     
$page_content___bysatt .="</table>";










include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");