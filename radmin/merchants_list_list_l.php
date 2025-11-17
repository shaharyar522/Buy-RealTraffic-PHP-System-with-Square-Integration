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
               <td align=center ><a href="merchants_list.php?mode=edit&id='; $page_content .=$row['id']; $page_content .= '">EDIT</a>| <a href="merchants_list.php?mode=delete&id='; $page_content .=$row['id']; $page_content .= '" onclick="return confirm(\'Are you sure to delete this merchant?\');">DELETE</a></td>
		     </tr>';
   }

$page_content .='<tr>
		         <td colspan=4 align=center >No merchant(s) are in list</td>
 		       </tr>
 	          
       </table>
</td></tr>
</table>
<br>';














$edit=$_REQUEST['mode'];
$id=$_REQUEST['id'];



       $page_content .='<table width="50%" class="borderdesign1"  cellspacing="3" cellpadding="0"  border=0 align=center>';
if (    isset($edit)  && $edit == 'edit'  ){
      $page_content .='<tr><td align=center  height=30>Edit Merchant</td></tr>
    <tr>
      <td>
      <table border="0" cellpadding="0"  cellspacing="0" width="100%" align=center>
        <form method="post" name="addnewfrm" action="merchants_list.php">
           <input type="hidden" name="mode" value="edit">
           <input type="hidden" name="act"  value="update">
           <input type="hidden" name="id"   value="';  $page_content .=$id; $page_content .= '">

      <tr class = "listtableaddrow">
         <td width=20%>&nbsp;</td>
         <td nowrap class="textbld" height=30>Name</td>
         <td class="textbld">:</td>
         <td width=20%>&nbsp;</td>
         <td><input name="merchant_name" class="input" value="{$merchant_name}" ></td>
       <td width=20%>&nbsp;</td>
      </tr>

      <tr class = "listtableaddrow">
         <td width=20%>&nbsp;</td>
         <td nowrap class="textbld" height=30 valign="top">Code</td>
         <td class="textbld" valign="top">:</td>
         <td width=20%>&nbsp;</td>
         <td>
             <textarea name="merchant_form" rows=10 cols=70>{$merchant_form}</textarea>
         </td>
       <td width="20%">&nbsp;</td>
      </tr>


     <tr class = "listtableaddrow">
        <td colspan=6 align=center>
    <input name="cancel" class="btn" Type=button value="Cancel" onclick="javascript:window.location=\'merchants_list.php\';">&nbsp;
    <input name="submit" class="btn" Type=submit value="Update" >
      </td>
    </tr>

  </form>
  </table>
 </td>
</tr>
<tr><td align=center class="tdimage1" >&nbsp;&nbsp;</td></tr>';
}
else{

     $page_content .=' <tr><td align=center>Add New Merchant</td></tr>
    <tr>
      <td>
      <table border="0" cellpadding="" cellspacing="0" width="100%" align=center class="tbl1">

        <form method="post" name="addnewfrm" action="merchants_list.php">
        <input type="hidden" name="mode" value="savenew">

       <tr class = "listtableaddrow">
         <td width=20%>&nbsp;</td>
         <td nowrap class="textbld" height=30>Name</td>
         <td class="textbld">:</td>
         <td class="textbld">&nbsp;</td>
         <td><input name="merchant_name" class="input" value="{$merchant_name}" ></td>
         <td width=20%>&nbsp;</td>
      </tr>

       <tr class = "listtableaddrow">
         <td width=20%>&nbsp;</td>
         <td nowrap class="textbld" height=30 valign="top">Code</td>
         <td class="textbld" valign="top">:</td>
         <td class="textbld">&nbsp;</td>
         <td>
            <textarea name="merchant_form" rows=10 cols=70>{$merchant_form}</textarea>
         </td>
         <td width=20%>&nbsp;</td>
      </tr>

      <tr class = "listtableaddrow"><td colspan=6 align=center><input name="submit" class="button" Type=submit value="Add New"></td></tr>

     </form>
     {/if}
     </table>
      </td>
    </tr>';
}
       $page_content .='<tr ><td align=center class="tdimage1">&nbsp;&nbsp;</td></tr></table>';









include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>
