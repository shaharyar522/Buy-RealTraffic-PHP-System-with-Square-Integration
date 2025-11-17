<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Login Sites Share";
include("$CONFIG->templatedir/header.php");





function login_site_balance($sid){
    $sel_count = "SELECT points FROM url_login_clicks WHERE site_id = '$sid'";
    $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);
    $row_count_info = mysqli_fetch_row($res_count);
    return $row_count_info[0];
}







	 //$sql_xyz = "SELECT * FROM url_unassigned_login_credits WHERE user_id =".$_SESSION["user"]["id"];
	  $sql_xyz = "SELECT * FROM url_unassigned_login_credits WHERE user_id ='".$_SESSION["user"]["username"]."'";
 	 $res_xyz = mysqli_query($GLOBALS["___mysqli_ston"], $sql_xyz)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_xyz);
 	 $row_xyz = mysqli_fetch_array($res_xyz); 
         $user_balance=$row_xyz['login_credits'];
         $loggin_user_points = $row_xyz['login_credits'];




  $cnts = '0';
  $curr_tab_pts_xxx='0';
// $sql_vv = "SELECT * FROM url_login_sites WHERE user_id = ".$_SESSION["user"]["id"]." order by sid ASC";  
   $sql_vv = "SELECT * FROM url_login_sites WHERE user_id = '".$_SESSION["user"]["username"]."' order by sid ASC"; 



  $res_vv = mysqli_query($GLOBALS["___mysqli_ston"], $sql_vv)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_vv);
  while($row_vv = mysqli_fetch_array($res_vv)) {
          $site_points   = login_site_balance($row_vv[0]);
          $curr_tab_pts_xxx  = ($site_points + $curr_tab_pts_xxx);
          $cnts++;
  }







if($_REQUEST['division'] == '1'){
       $curr_frm_pts=0;
       $curr_ac_pts=0;
       $number_of_ids = count($sidx); 
       $m=0;

       for($v=0;$v<$number_of_ids;$v++){

           $curr_frm_pts = ($spointx[$m] + $curr_frm_pts);
           $m++;
       }

           $curr_ac_pts  = (int) $row_xyz['login_credits'];
           //echo '$curr_ac_pts => ' . $curr_ac_pts;
             $curr_tab_pts = $curr_tab_pts_xxx; 

///////////////////////////////----- VALIDATION BEGINS-----------///////////////////////
           //TABLE PONTS ARE NULL
           if($curr_tab_pts == '0'){ 
               if($curr_ac_pts < $curr_frm_pts){
                  $err_msg_pt = "<li> You only have $curr_ac_pts Unassigned Login credits!</li>";
               }//
               //if($curr_ac_pts >= $curr_frm_pts){
               if($curr_ac_pts >= $curr_frm_pts){
                  $Pending = ($curr_ac_pts - $curr_frm_pts);
               }//

               if($curr_ac_pts < $curr_frm_pts){

                  $Pending = ($curr_ac_pts - $curr_frm_pts);
               }//

           }//-------------------------------------------curr_ac_pts--------------------------------------------


          if($curr_tab_pts != '0'){   
             $rem_pts = $curr_ac_pts+$curr_tab_pts-$curr_frm_pts; 
             //if($rem_pts>0){ //asokan
             if($rem_pts>=0){
				$Pending = $rem_pts;
			 }
			 else{
				$err_msg_pt = "<li> You only have $curr_ac_pts Unassigned Login Credits!</li>";
			 }



          }


   if($err_msg_pt == ""){ 
      #number_of_ids = Array For Ids
      #spointx       = Array For Points
      #update to pts table
      #$My_Pending_Points = ($loggin_user_points - $curr_frm_pts);
  	  //  $sql_req = "UPDATE url_unassigned_login_credits SET login_credits = '$Pending' WHERE user_id =".$_SESSION["user"]["id"]; 
  	    $sql_req = "UPDATE url_unassigned_login_credits SET login_credits = '$Pending' WHERE user_id ='".$_SESSION["user"]["username"]."'"; 
 	    $res_req = mysqli_query($GLOBALS["___mysqli_ston"], $sql_req)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_req);
       //------------------------------------------------------------------------------------------------------
       //After Error
        $k=0;
        for($w=0;$w<$number_of_ids;$w++){
               $ups_del = "UPDATE url_login_clicks set points = '$spointx[$w]' WHERE site_id = '$sidx[$w]' limit 1"; 
               $ups_del = mysqli_query($GLOBALS["___mysqli_ston"], $ups_del) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ups_del);
        $k++;
      }
    //---------------------------------------------------------------------------------------------------------
     //$err_msg_pt = "<li> Credits successfully assigned!</li>";
     //echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=site_share.php?err_msg_pt=$err_msg_pt&#ASSIGN'>";
     //exit();
      //=======================UPDATE STATUS OF BANNERS AND TEXT ADS ========================================================
    //  update_banner_status();
    //  update_textAdds_status();
     $err_msg = "<li> Credits successfully assigned!</li>";
     echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=login_sites.php?error_msg=$err_msg'>";
     exit();
   }
}


















 $page_content ='<div id="column_w610" style="width:100%">

       <br>

<!--

        {if $error}

        <p>&nbsp;</p>

        <div align="center">

          <center>

          <table border="0" width="400" cellspacing="0" cellpadding="0">

           <tr><td align=center class=red_text>{$error_temp}</td></tr>

          </table>

          </center>
          </div>
          
       {/if} 

       {if $error_pt}
       <div align="center">
         <center>
           <table border="0" width="400" cellspacing="0" cellpadding="0"><a name="ASSIGN">
             <tr><td style="width: 414px; align=center >{$error_temp_pt}</td></tr>
           </table>
         </center>
       </div>
    {/if}

          
         --> 
          





<table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="10" cellspacing="0" border="0" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>  
<tr><td align="center">






          
          
     <div align="center" >



        <center>

         <table border="0" width="100%" cellspacing="0" cellpadding="0"></a>

            <tr><td align=right>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>

            <tr>

                <td  colspan=3 align="center">

                  <blockquote>

                   You currently have<font color=red> ';
                    if(  isset($user_balance)  ){
                     $page_content .=$user_balance;
                                                }else{  $page_content .=0;   }
                     $page_content .='</font color> Unassigned Login credits. Please enter the number of visitors you want each site to receive and click the Submit button below. NOTE: When entering the number of visitors, please do not use commas.

                  <br>

 <br>                 </blockquote>

                </td>

           </tr>
           
           
           
           
           
          <tr>
            <td width="100%">
               <div align="center">
               
                  
                  <table border="0"  cellpadding="3" cellspacing="0" width="100%"  style=" border: 1px solid #808080;font-size: 14px;" tr bgcolor="#1B476E" height="30">  
                    <tr><td align=center><font color=#ffffff>Assign Login Credits</font></td></tr>
                </table>   
                
                
                
                
                
                
                <tr>
                    <td width="100%"><form name="assx" method="post" action="login_site_share.php#ASSIGN">
                       <div align="center">

                       <table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="10" cellspacing="0" border="1" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>  ';
                     
                     
           
//$sql_zz = "SELECT * FROM url_login_sites WHERE user_id = ".$_SESSION["user"]["id"]." order by sid ASC"; 
//  $sql_zz = "SELECT * FROM url_login_sites WHERE user_id=55  order by sid ASC";	
    $sql_zz = "SELECT * FROM url_login_sites WHERE user_id='" .$_SESSION["user"]["username"]. "'  order by sid ASC";
	
	 $cnt = '0';
	$res_zz = mysqli_query($GLOBALS["___mysqli_ston"], $sql_zz)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_zz);  

	while($row_zz = mysqli_fetch_array($res_zz)) { 

         // $package_list[$cnt]               = $row_zz;
         // $package_list[$cnt]['status']       = $row_zz['status'];
         // $package_list[$cnt]['site_name']    = $row_zz['site_name'];
         // $package_list[$cnt]['site_url']     = $row_zz['site_url'];
         // $package_list[$cnt]['site_balance'] = login_site_balance($row_zz[0]);
         // $package_list[$cnt]['site_meet']    = login_site_meet($row_zz[0]);
          $cnt++;
                         
                       
                       $page_content .='    <tr>
                               <td >';
                       $page_content .=  $cnt;    
                        $page_content .='</td>
                               <td >';
                       $page_content .=  $row_zz['site_name'];         
                         $page_content .= '</td>
                               <td >';
                       $page_content .=  $row_zz['site_url'];       
                        $page_content .= '</td>
                               <td ><input type=hidden name=sidx[] value="';
                       $page_content .=  $row_zz["sid"];          
                        $page_content .='"></td>  
                               

                               <td><input type=text  name=spointx[]  value=';
                    //   $page_content .= login_site_balance($row_zz["sid"]) ;  
                    $bbalance    =login_site_balance($row_zz["sid"]);    
                        $bbalance = ($bbalance!=null) ? $bbalance : 0;
                    
                    
                       $page_content .= $bbalance  ;          
                    
                    
                         $page_content .=' ONKEYPRESS="if (document.layers)
                                                                     var c = event.which;
                                                                     else if (document.all)
                                                                     var c = event.keyCode;
                                                                     else
                                                                      var c = event.charCode;
                                                                      var s = String.fromCharCode(c);
                                                                      if(c!=0) return /[0-9]/.test(s); else return;" ></td>   


                                                                                                                          
                           </tr><input type=hidden name=division value=1>';
                           
           }  
           
            $resultq = mysqli_num_rows($res_zz);
                  if($resultq <= 0)
			    {
	$page_content .='<tr><td colspan=6 align=center><b><font color=red>You have no site listed</font></b></td></tr>
	<tr><td colspan=6 align=center ><b><font color=blue><a href=\'login_sites.php\' title=\'BACK\'><font color="blue">BACK</font></a></font></b></td></tr>
	';
	

			    }
			    
        if($resultq > 0){
			            
         $page_content .=' <tr>
                  <td width="100%" colspan=6><p align="center"><input type=image src="../images/submit55.png"> &nbsp;&nbsp;<img src="../images/cancel55.png"  onclick="javascript:window.location=\'login_sites.php\'">
                  </p>
                  </td>
             </tr>
         
         ';
         }
            

               
            
                        
                
                       $page_content .='</table> 
                       </div>
                     </td>  
                </tr>
                
                  
                  
               </div>
            </td>
          </tr>          
           
           
           
           
           
           
           
           
          </table>
         </center>
        </div>  
          
          
          
</td></tr></table>          
          
          

        </div>';
















include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>