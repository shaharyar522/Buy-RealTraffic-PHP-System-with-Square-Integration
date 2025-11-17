<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Email Users";



include("$CONFIG->templatedir/header.php");


if(!$_REQUEST['act'] == "update") {
$page_content="<fieldset class=text>
<legend>Send mail to all users</legend>
<br> 





<form name=step1frm action=user_mailer.php?act=mailer method=post>
<table width=100%  cellspacing=0 cellpadding=0  align=center>
  <tr><td class=tblrow>E-mail Member Database</td></tr>
  <tr><td class=tblrow></td></tr>
  {if $pending}
  <tr>
  	<td class=tblrow>
  		<table width=100% style=font-family: arial;font-size: 11px;font-weight: bold>
  			<tr>
  				<td>
  					Mail Status : Active
				</td>
				<td>
					Total Sent : {$mail_sent}
				</td>
				<td>
					Total Pending : {$mail_pending}
				</td>
			</tr>
		</table>
	</td>
  </tr>
  {/if}
 <tr>
   <td class=tdimage1 colspan=4 align=center>&nbsp;&nbsp;&nbsp;</td>
    <tr><td>
      <table width=100% border=0 cellspacing=0 cellpadding=0>
         {if $err_msg}
	       <tr><td align=center colspan=3 class=err>{$error_temp}<br></td></tr>
         {/if}
        <tr><td height=10>&nbsp;&nbsp;</td></tr>
        
        <tr class = listtableoddrow>
           <td colspan=0  align=left width=4%>&nbsp;&nbsp;</td>
           <td colspan=0  align=left class=textbld width=25%><b>Status</b></td>
           <td align=left width=77%>
            <select name='user_status' class='select100'>
	          <option value=all SELECTED {$sel_all}>All</option>
	          <option value=L            {$sel_active}>Active</option>
	          <option value=W            {$sel_wait}>UN-CONFIRMED</option>
            </select>
           </td>
        </tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>

        <tr class = listtableoddrow>
           <td colspan=0  align=left width=4%>&nbsp;&nbsp;</td>
           <td align=left class=textbld><b>Message type</b></td>
           <td align=left >
             <select name='mail_type' class='select100'>
               <option value=plain SELECTED {$sel_plain}>Plain Text</option>
               <option value=html           {$sel_html}>HTML Text</option>
             </select>
           </td>
        </tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>

		<tr  class = listtableoddrow>
           <td colspan=0  align=left width=4%>&nbsp;&nbsp;</td>
		   <td align=left class=textbld><b>Title</b></td>
		   <td><input type=text name='title' value='' class='Textbox' size=34></td>
	    </tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>
		<tr  class = listtableoddrow>
           <td colspan=0  align=left width=4%>&nbsp;&nbsp;</td>
		   <td align=left class=textbld><b>Description</b></td>
		   <td>
             <div align=left>
               <textarea wrap=virtual rows=15 cols=60 name=description class='TEXTAREA'>{$description}</textarea><br>
             </div>
           </td>
	    </tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>
        <tr><td height=10 colspan=3 class='text'>Substitutions (Message Body / Title field):</td></tr>
        <tr><td height=10 width=30% class='text'> {USERID}   </td><td width=2%>:</td><td width=40% class='text'>User's ID</td></tr>
        <tr><td height=10 width=30% class='text'> {FIRSTNAME} </td><td width=2%>:</td><td width=40%  class='text'>User's firstname</td></tr>
        <tr><td height=10 width=30% class='text'> {LASTNAME} </td><td width=2%>:</td><td width=40%  class='text'>User's lastname</td></tr>
        <tr><td height=10 width=30% class='text'> {EMAIL}   </td><td width=2%>:</td><td width=40% class='text'>User's email</td></tr>
        <tr><td height=10 class='text'> {BASEURL}  </td><td width=2%>:</td><td width=40% class='text'>{$base_url}</td></tr>
        <tr><td height=10 class='text'> {SITETITLE} </td><td width=2%>:</td><td width=40% class='text'>{$global_site_title}</td></tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>
       <tr>
         <td colspan=0  align=left width=4%>&nbsp;&nbsp;</td>
         <td  align=center colspan=2 width=94% >
           <input type=submit name=f_submit value=Send class='btn' onmouseover=this.className='btnhov' >
           <input type=hidden name=act   value='update'>
           <input type=hidden name=mode  value='1'>
         </td>
       </tr>
        <tr><td height=10>&nbsp;&nbsp;</td></tr>
       
    </table>
   </td>
  </tr>
 </table>
</form>







<br>

</fieldset>";}


else{

$page_content="<fieldset class=text>
<legend>Send mail to all users</legend>";


        if($_REQUEST['act'] == "update") {
            
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


$page_content .= "</fieldset>";


}




include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>



