<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename merchants list  Info";

include("$CONFIG->templatedir/header.php");

$page_content="<div class=text id=heading  align=center><h3>Your merchants list </h3></div>";




$page_content .='<br>
<table  class="borderdesign1" cellpadding="3" cellspacing="0" width="90%" height=300 align=center>
  <tr>
    <td width="100%" colspan=6 valign=top>
        <table border="1"  cellpadding="3" cellspacing="0" width="100%" align=center>
         <tr>
          <td align=center  width=2%>S.No</td>
          <td align=center  width=30%>Name</td>
          <td align=center  width=50%>Code</td>
          <td align=center  width=25%>Action</td>
        </tr>';


	$sql = "SELECT * FROM url_merchants WHERE status <> 'delete' order by merchant_name asc";
	$res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);
	$num_rows = mysqli_num_rows($res);
	while ($row = mysqli_fetch_array($res)) {


$page_content .= '<tr >
		       <td align=left  valign="top">'; $page_content .=$row['id']; $page_content .='</td>
		       <td align=left  valign="top">'; $page_content .= $row['merchant_name']; $page_content .='</td>
		       <td align=left >
                  <textarea name="1" rows="10" cols="70">';
                  $page_content .=$row['merchant_form']; $page_content .='</textarea>
                </td>
               <td align=center ><a href="merchants_list.php?mode=edit&id=$row[\'id\']">EDIT</a>| <a href="merchants_list.php?mode=delete&id=" onclick="return confirm(\'Are you sure to delete this merchant?\');">DELETE</a></td>
		     </tr>';
   }

$page_content .='<tr>
		         <td colspan=4 align=center >No merchant(s) are in list</td>
 		       </tr>
 	          
       </table>
</td></tr>
</table>
<br>';









include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>
