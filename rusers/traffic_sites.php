<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Traffic Sites";
include("$CONFIG->templatedir/header.php");
//include("$CONFIG->templatedir/user_function_inc.php");
//include("$CONFIG->templatedir/main_function.php");




//$page_content=read_template("$CONFIG->templatedir/traffic_sites.php");
$mode = $_GET["mode"] ?? '';
if(isset($_GET["mode"])){  $mode = $_GET["mode"]; }








	if($mode == "delete") {	
	       $sx_pts = login_site_balance($sid);    
       	   //   $sql_xyz = "SELECT traffic_credits FROM unassigned_traffic_credits WHERE user_id =".$_SESSION["user"]["id"]; 
echo $sql_xyz = "SELECT traffic_credits FROM unassigned_traffic_credits WHERE user_id ='".$_SESSION["user"]["username"]."'"; 

 	       $res_xyz = mysqli_query($GLOBALS["___mysqli_ston"], $sql_xyz)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_xyz);
               $row_xyz = mysqli_fetch_array($res_xyz);
               $my_full_pts = $row_xyz['traffic_credits'];
               $updates_pts = ($my_full_pts + $sx_pts);

           //updated pts
    	//   $sql_reqx = "UPDATE  unassigned_traffic_credits SET traffic_credits = '$updates_pts' WHERE user_id = ".$_SESSION["user"]["id"];  
 echo   $sql_reqx = "UPDATE  unassigned_traffic_credits SET traffic_credits = '$updates_pts' WHERE user_id = '".$_SESSION["user"]["username"]."'";

 	       $res_reqx = mysqli_query($GLOBALS["___mysqli_ston"], $sql_reqx)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_reqx);

           //remove pts
	   	   $sql = "DELETE FROM traffic_sites  WHERE sid = '$sid' LIMIT 1";
 		   $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);
 
           //exchange pts
	   	   $sql_cc = "DELETE FROM traffic_clicks  WHERE site_id = '$sid' LIMIT 1";
 		   $res_cc = mysqli_query($GLOBALS["___mysqli_ston"], $sql_cc)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_cc);

         // update banner status
         //update_banner_status();
         //update_textAdds_status();
 		   $error_msg = "<li>Site deleted successfully!</li>";

           echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=https://www.buy-realtraffic.com/rusers/traffic_sites.php?error_msg=$error_msg'>";
           exit();
	}



        if($mode == "live") {		// Active Site
		   $sql = "UPDATE  traffic_sites SET status = 'L'  WHERE sid = '$sid'";
 		   $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);

        // update_banner_status();
        // update_textAdds_status();
 		   $error_msg = "<li>Site resumed successfully!</li>";
           echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=https://www.buy-realtraffic.com/rusers/traffic_sites.php?error_msg=$error_msg'>";
           exit();

	}


	if($mode == "hide") {		// Active Site
		   $sql = "UPDATE  traffic_sites SET status = 'H'  WHERE sid = '$sid'";
 		   $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);

       //  update_banner_status();
       //  update_textAdds_status();

 		   $error_msg = "<li>Site paused successfully!</li>";
           echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=https://www.buy-realtraffic.com/rusers/traffic_sites.php?error_msg=$error_msg'>";
           exit();

	}
	
	
	if($mode == "reset") {	

		   $sql = "UPDATE  traffic_clicks SET visitors_received = '0'  WHERE site_id = '$sid'";
 		   $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);



 		   $error_msg = "<li>Visitors Received reset successfully!</li>";

           echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=https://www.buy-realtraffic.com/rusers/traffic_sites.php?error_msg=$error_msg'>";

           exit();

	}
	
	
	

    // $unassigned_login_credits_query = "SELECT * FROM unassigned_traffic_credits WHERE user_id = ".$_SESSION["user"]["id"];
     $unassigned_login_credits_query = "SELECT * FROM unassigned_traffic_credits WHERE user_id ='".$_SESSION["user"]["username"]."'";
     $unassigned_login_credits_result = mysqli_query($GLOBALS["___mysqli_ston"], $unassigned_login_credits_query) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$unassigned_login_credits_query);
	if(mysqli_num_rows($unassigned_login_credits_result))
	{
		 while($row = mysqli_fetch_array($unassigned_login_credits_result)) 	
		 {
			   $login_credits = $row['traffic_credits'];	
		 }
	 }
	else	{	$login_credits = 0;	}






function login_site_balance($sid){
    $sel_count = "SELECT points FROM traffic_clicks WHERE site_id = '$sid'";
    $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);
    $row_count_info = mysqli_fetch_row($res_count);
    return $row_count_info[0];
}//EndFunction

function login_site_meet($sid){
    $sel_count = "SELECT visitors_received FROM traffic_clicks WHERE site_id = '$sid'";
    $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);
    $row_count_info = mysqli_fetch_row($res_count);
    return $row_count_info[0];   

}//EndFunction





      $sql_max = "SELECT * FROM url_site_setting";
      $res_max = mysqli_query($GLOBALS["___mysqli_ston"], $sql_max);
      $row_max = mysqli_fetch_array($res_max);
      $max_sites_allowed = $row_max['traffic_sites_allowed']; 





 $page_content ='
<br>
<table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="10" cellspacing="0" border="0" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>   


<tr><td align="center">';

 $page_content .=$_REQUEST['error_msg'] ?? '';

 $page_content .='
<br>
<center><h2>Your Traffic Sites & Stats</h2></center>
<br>
<center><b>Unassigned Traffic credits:&nbsp;&nbsp;<font color=green>';
 $page_content .=  $login_credits;
  $page_content .='</font> </b></center>
<br>
<a href="traffic_site_share.php"><font color=#000000><img src="../images/traffic_assign.png" ></font></a>
<br><br>


<table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="10" cellspacing="0" border="1" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>   

 <tr bgcolor="#1B476E">
          <td width="20%"><font color="#FFFFFF" >Site name</font></td>
          <td width="5%"><font color="#FFFFFF">Site URL</font></td>
          <td width="5%"><font color="#FFFFFF">Visitors<br> Assigned</font></td>
          <td width="5%"><font color="#FFFFFF">Visitors<br> Received</font></td>
          <td width="20%"><font color="#FFFFFF">Site Status</font></td>
          <td width="10%"><font color="#FFFFFF">Pause/ <br>Resume</font></td>
          <td width="35%"><font color="#FFFFFF">Action</font></td>
 </tr>';



//echo $queryy = "select * from url_login_sites WHERE user_id=".$_SESSION["user"]["id"]; exit;
//  $queryy = "select * from url_login_sites WHERE user_id=55";

    $queryy = "select * from traffic_sites WHERE user_id='".$_SESSION["user"]["username"]."' order by sid desc";

$q= db_query($queryy);  
                            
while($r=db_fetch_array($q)){
 $page_content .= '<tr>';
 $page_content .='<td>'.$r["site_name"].'</td>';
 //$page_content .='<td max-width="5%">'.$r["site_url"].'</td>';
 $page_content .= '<td max-width="5%"><a href="' . $r["site_url"] . '"target=_blank>' . $r["site_url"] . '</a></td>';
 
 $page_content .='<td>'.login_site_balance($r["sid"]).'</td>';
 $page_content .='<td>'.login_site_meet($r["sid"]).'</td>';
if($r["status"] == 'W'){  $sss = 'WAITING FOR APPROVAL'; }
if($r["status"] == 'H'){  $sss = 'PAUSED'; }
if($r["status"] == 'L'){  $sss = 'ACTIVE'; }
if($r["status"] == 'A'){  $sss = 'SUSPENDED'; }
 $page_content .='<td>'.$sss.'</td>';
 
 
 
 $page_content .='<td>';
 
 if($r["status"] == 'H'){

  $page_content .="<a href='traffic_sites.php?mode=live&sid=";
  $page_content .= $r["sid"];
  $page_content .=  "'  onclick=\"return confirm('Are you sure you want to resume this site?');\"   title='Click To Resume Site'  >  
  <img src='../images/resumeban.png' border=0> </a>"; 
 
 }
 
  if($r["status"] == 'L'){

  $page_content .="<a href='traffic_sites.php?mode=hide&sid=";
  $page_content .= $r["sid"];
  $page_content .=  "'  onclick=\"return confirm('Are you sure you want to pause this site?');\"   title='Click To Pause Site'  >  
  <img src='../images/pauseban.png' border=0> </a>"; 
 
 }
 
 
 
  $page_content .='</td>';
 
 
 
 
 $page_content .='<td>';
 
 
 
// $_SESSION["user"]["id"]
  $page_content .="<a href='traffic_sites_edit.php?site_id=";
  $page_content .= $r["sid"];
  $page_content .=  "' title='Click To Edit Site'  >  <img src='../images/edit.png' border=0> </a>"; 
 
  $page_content .="<a href='traffic_sites.php?mode=delete&sid=";
  $page_content .= $r["sid"];
  $page_content .=  "'  onclick=\"return confirm('Are you sure you want to delete this site?');\"   title='If you DELETE a site with traffic credits assigned, you will not lose those credits.  Your credits will be returned to your UNASSIGNED LOGIN account above.'  >  
  <img src='../images/delete.png' border=0> </a>"; 
  
  $page_content .="<a href='traffic_sites.php?mode=reset&sid=";
  $page_content .= $r["sid"];
  $page_content .=  "'  onclick=\"return confirm('Are you sure you want to reset Visitors Received?');\"   title='Reset Visitors Received'  >  
  <img src='../images/resetban.png' border=0 alt='Reset Visitors Received'> </a>"; 
 
 
 
 
 $page_content .='</td>';
 
 $page_content .= '</tr>';
 
}
  
$page_content .= '</table>';







$page_content .='<br /><br />
        <p align=center>
           <a href=\'traffic_site_new.php\' onClick="return sitesadd({$num_vv},{$max_sites_allowed});" ><img src="../images/traffic_add.png" ></a>
           <br />
           <font color=#000000>You can add up to <b>';
$page_content .=$max_sites_allowed;
$page_content .='</b> sites</font>
        </p>   
<table align=center width=100%>
<tr><td>
<blockquote>
<font color=red>
Note:  Please <b>DO NOT</b> add a Traffic site unless you have Traffic Credits in your "Unassigned Traffic Credits" account above or Traffic Credits assigned to your current sites.
</font>
</blockquote>
</td></tr></table>';




//---------------------satyajeet 7-7-2018






    if(isset($_REQUEST['mode']) && $_REQUEST['mode'] == 'update_share'){
      $sel_count = "SELECT site_id, points as SUMMER ,user_id FROM traffic_clicks WHERE user_id = '".$_SESSION["user"]["username"]."' AND site_id != '{$_REQUEST['site_id']}' GROUP BY site_id  ORDER BY site_id ASC "; 
       $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);
       
       if (! isset($contentx)) {
        $contentx = '';
       }

       if (! isset($err_msg_share)) {
        $err_msg_share = '';
       }

       
       
       while($row = mysqli_fetch_array($res_count)) {
             $site_name = get_site_name($row['site_id']);
             if($row['site_id']){
                 if($_REQUEST['to_site_id'] ==  $row['site_id']){
                    $contentx .= "<option value=\"{$row['site_id']}\" SELECTED>{$site_name} - {$row['SUMMER']} </option>";
                 }else{
                   $contentx .= "<option value=\"{$row['site_id']}\" >{$site_name} - {$row['SUMMER']} </option>";
                 }
             }//

       }//endwhile

//       $smarty->assign('contentx',$contentx);
    if($_REQUEST['points'] != ''){
        if($_REQUEST['site_id'] == '0'){
           $err_msg_share .="<li>Select any one of the site, in 'Move From' list </li>";
        }

        if($_REQUEST['to_site_id'] == '0'){
           $err_msg_share .="<li>Select any one of the site, in 'Move To' list </li>";
        }



        if($_REQUEST['site_id'] == $_REQUEST['to_site_id']){
          $err_msg_share .="<li>You Cannot Move Credits From and To The Same Site.</li>";
        }



        $From_Site_Balance = login_site_balance($_REQUEST['site_id']); 
        $To_Site_Balance   = login_site_balance($_REQUEST['to_site_id']); 
        if($_REQUEST['points'] > $From_Site_Balance){
           $err_msg_share .="<li>Invalid points </li>";
           $err_msg_share .="<li>The credits to move cannot be greater than the actual credits assigned to that site.</li>";
        }
    }//endif

   if(isset($_REQUEST['points']) && $_REQUEST['points'] == ''){
      $err_msg_share .="<li>Select site and the number of credits to move!</li>";
   }

}









     if(isset($_REQUEST['mode']) && ($_REQUEST['mode'] == 'update_share') && ($err_msg_share== "") && ($_REQUEST['points'] != '')  ) {
       $from_site_id     = $site_id;
       $Curr_from_site_points = ($From_Site_Balance - $points);
       $to_site_id       = $to_site_id;
       $Curr_to_site_points   = ($To_Site_Balance + $points);
       //echo "FROM SITE ID => $from_site_id <br>FROM SITE PTS => $Curr_from_site_points <br> TO SITE ID => $to_site_id <br> TO SITE PTS => $Curr_to_site_points";

       $sel_old = "UPDATE traffic_clicks SET points  = '$Curr_from_site_points' WHERE site_id = '$site_id'";
       $res_old = mysqli_query($GLOBALS["___mysqli_ston"], $sel_old) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_old);
       $sel_new = "UPDATE traffic_clicks SET points  = '$Curr_to_site_points' WHERE site_id = '$to_site_id'";
       $res_new = mysqli_query($GLOBALS["___mysqli_ston"], $sel_new) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_new);
      // header("Location: http://www.ez-moneymaker.com/rusers/traffic_sites.php?E=1&F=$from_site_id&T=$to_site_id#MOVE");

redirect("$CONFIG->siteurl/rusers/traffic_sites.php?E=1&F=$from_site_id&T=$to_site_id#MOVE","",0);
       die();
    }


    if(isset($_REQUEST['E']) && $_REQUEST['E'] == '1'){
       $error_msg     ='';
       $f_name = get_site_name_login_sites($_REQUEST['F']);
       $t_name = get_site_name_login_sites($_REQUEST['T']);
       $err_msg_share = "<li>Credits successfully moved from  $f_name to $t_name</li>";    

    }











function get_site_name_login_sites($sid){
    $sel_name = "SELECT site_name FROM traffic_sites WHERE sid = '$sid'";
    $res_name = mysqli_query($GLOBALS["___mysqli_ston"], $sel_name) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_name);
    $row_name = mysqli_fetch_array($res_name); 
    return $row_name['site_name'];
}

function get_site_name($sid){
    $sel_name = "SELECT site_name FROM traffic_sites WHERE sid = '$sid'";
    //echo $sel_count;
    $res_name = mysqli_query($GLOBALS["___mysqli_ston"], $sel_name) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_name);
    $row_name = mysqli_fetch_array($res_name);    
    return $row_name['site_name'];
}



    $sel_count = "SELECT site_id, points as SUMMER ,user_id  FROM traffic_clicks WHERE user_id = '".$_SESSION["user"]["username"]."'   GROUP BY site_id  ORDER BY site_id ASC "; 
     $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);
     if (! isset($content)) {
        $content = '';
     }
     while($row = mysqli_fetch_array($res_count)) {  
           $site_name = get_site_name_login_sites($row['site_id']);
           if($row['site_id']){
               if(isset($_REQUEST['site_id']) && $_REQUEST['site_id'] ==  $row['site_id']){
                  $content .= "<option value=\"{$row['site_id']}\" SELECTED>{$site_name} - {$row['SUMMER']} </option>";
               }else{
                 $content .= "<option value=\"{$row['site_id']}\" >{$site_name} - {$row['SUMMER']} </option>";
               }

           }//
     }



$page_content .='<table border="0" width="790" cellspacing="0" cellpadding="0" align="center" style=" border: 1px solid #808080;font-size: 14px;"><a name="MOVE"></a>
           <form method="post" name="ThisForm" action="traffic_sites.php?#MOVE">';
                if(isset($err_msg_share)){
            $page_content .=' <tr><td colspan=3 align=center>'; 

                     $page_content .=$err_msg_share; 
                $page_content .='</td></tr>';
                }
            $page_content .='<tr class="listtabletoprow">

          <td colspan="3" align="right" class="textbld" bgcolor="#1B476E"><font color="#FFFFFF">MOVE CREDITS</font></td>
        </tr> 
                <tr><td><br /></td></tr>
                <tr>
                    <td width="30%"></td>
                    <td  width="25%">Move Credits From</td>
                    <td> <select size="1" name="site_id" class="select170" onChange="document.ThisForm.submit();">

                         <option value="0">Select Any Site...</option>';

                         $page_content .=$content;
                    $page_content .='   </select>
                    </td>
                </tr>
                <tr><td><br /></td></tr>
                <tr>
                    <td width="30%"></td>

                    <td align="" width="25%">Move Credits To</td>
                    <td> <select size="1" name="to_site_id" class="select170">
                         <option value="0">Select Any Site...</option>';
                          $page_content .=$content;

                      $page_content .=' </select>

                    </td>

                </tr>

                <tr><td><br /></td></tr>

                <tr>

                    <td width="30%"></td>
                    <td align="" width="25%">Credits To Move</td>
                    <td> <input type="text" name="points" value="" class="TextBoxSmall" maxlength="5"
                                                                    ONKEYPRESS="if (document.layers)
                                                                    var c = event.which;
                                                                     else if (document.all)
                                                                     var c = event.keyCode;
                                                                     else
                                                                      var c = event.charCode;
                                                                     var s = String.fromCharCode(c);

                                                                    if(c!=0) return /[0-9]/.test(s); else return ;">&nbsp;&nbsp;<font color="red">(Ex: 20)</font>
                    </td>
                </tr>                

                <tr><td><br /></td></tr>
                <input type=hidden name=mode value="update_share">
               <tr>
                   <td colspan=3 align=center>
                   <input type=image src="/images/move-traffic-credits.png" border=0  >
 <br><br>

                  </td>
               </tr> 
         </form>

    </table>        </table>  ';


//---------------------satyajeet 7-7-2018




?>
<!-- satyajeet kesharia1 -->












<?


include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>