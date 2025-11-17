<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Login Sites Edit";
include("$CONFIG->templatedir/header.php");


function isValidURL($url) {
        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
      }

//echo $_REQUEST["error_msg"];
if (! isset($error_msg)) {
        $error_msg = '';
}
 if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "editsite") { 
 
          if(!$site_name) {
		   	   $error_msg .= "<li>Invalid site title</li>";
		          }

		   if(!isValidURL($site_url)){
		   	   $error_msg .= "<li> Please enter valid URL including http://</li>";
                          }     
                          
                                                    
                          
                               if($error_msg == "") {
  					       $sql = "UPDATE url_login_sites  SET
                                                       site_name  = '$site_name',
                                                       site_url   = '$site_url',
                                                       edit_time  = now(),
                                                       status     = 'W'
                                   WHERE sid = '$site_id' ";

  			   $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);
     			   $error_msg = "<li>Site Details updated.  </li><li>Admin must approve your site</li>";}
                           echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=http://www.buy-realtraffic.com/rusers/login_sites.php?error_msg=$error_msg'>";
                           exit();
         //  }
                           
                          
                          
                          
 
 
 }





















                $site_id=$_REQUEST["site_id"]; 

		$sql = "SELECT * FROM url_login_sites WHERE sid = '$site_id' order by sid ASC" ;
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);
		$row = mysqli_fetch_array($res);
		
		$site_url=$row["site_url"];
                $site_name=$row["site_name"]; 


 




 $page_content ='

<table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="10" cellspacing="0" border="0" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>   

<tr><td align="center"></td></tr>

<tr><td align="center">';


 $page_content .='<div id="column_w610" style="width:100%;">

<!--
 <table border="1"  bgcolor="#d0d7e7" cellpadding="10" cellspacing="0" width="95%" height=40 align=center style="border-collapse: collapse" id="AutoNumber1" bordercolor="#808080" font-size = "14px">
-->
<table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="10" cellspacing="0" border="1" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>

	<tr class="listtabletoprow">
           <td colspan="3" align="center"  bgcolor="#1B476E"><font color="#FFFFFF">EDIT SITE</font></td>
	</tr>

        <tr><td colspan=3 align=center></td></tr>

                             </td>
                 </tr>

                           
              <form name="step1frm" action="login_site_edit.php?site_id=';
               $page_content .=$site_id;
                $page_content .='" method="post">
                          
              
 <tr>
                  <td width="30%" >Site Name:</td>
                                 <td width="20%"><input size="50" type="text" name="site_name"  class="TextBox" value="';
                                 
$page_content .= $site_name;
$page_content .='"></td>
                                   <td width="80%" >Enter a valid site name</td>
               </tr>
                         <tr>
                  <td width="30%" >Site URL :</td>
                                   <td width="20%"><input size="50" name="site_url" class="TextBox" value="';
                                   
$page_content .=$site_url;
                                   
$page_content .='" ></td>
                                 <td width="80%" >Enter a valid site url</td>
                               </tr>

<tr><td colspan=3 align=center>    <input type=hidden name="act"       value="editsite">

               <input type=hidden name="site_id"   value="';
$page_content .= $site_id;
$page_content .='">
                                                  <input type=image  src="../images/submit55.png" >
                      <img src="../images/cancel55.png"  onclick="javascript:window.location=\'login_sites.php\'"></img>
                             </form>
</td>

          </tr>
    </table>    


</div>
</td></tr>
<tr><td align="center"></td></tr>
</table>
';















include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>