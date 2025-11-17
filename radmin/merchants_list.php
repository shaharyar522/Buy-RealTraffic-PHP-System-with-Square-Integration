<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename merchants list  Info";

include("$CONFIG->templatedir/header.php");








$id= $_REQUEST['id'] ?? ''; 
$mode = $_REQUEST['mode'] ?? '';
$merchant_name =$_REQUEST['merchant_name'] ?? '';
$merchant_form =$_REQUEST['merchant_form'] ?? '';
$act = $_REQUEST['act'] ?? '';
$error_msg = '';
    $error =  "welcome";
  if ( ($mode == "edit") ) {      // Edit option

#######-------------+
#  UPDATED          |
#######-------------+
    if ($act == "update") {     // Update option

          if(!$merchant_name) {
            $error_msg .= "<li>Invalid merchant name</li>";
        }
            
            //name
      $sql_name = "SELECT * FROM url_merchants WHERE merchant_name = '$merchant_name' and id != '$id'";
      $res_name = mysqli_query($GLOBALS["___mysqli_ston"], $sql_name)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_name);
        $num_name = mysqli_num_rows($res_name);
        if($num_name == 1) { $error_msg.= "<li> This merchant Name already exists, Please Check!</li> "; }

      if(!$error_msg) {
       
                $merchant_name = addslashes(trim($merchant_name));
                $merchant_form = addslashes(trim($merchant_form));
                             
                $sql  = "UPDATE url_merchants  SET
                                                  merchant_name = '$merchant_name',
                                                  merchant_form = '$merchant_form'
                         WHERE id = '$id'";
                         
                $res  = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);
                
              $error_msg = "<li> Merchant Details Updated ";
            //  header("Location:merchants_list.php?mode=''&error_msg=$error_msg");
            
         }//errormsg
        
      }//update

#####------------------------+
# AFTER UPDATED SHOW DETAILS |
#####------------------------+

  }//end edit









/////////////////////////////////////////////////////////////////////////////////////////14 8 2018

  elseif ($mode == "savenew") {


    //Save New Language
      if(!$merchant_name) {
           $error_msg .= "<li>Invalid merchant name</li>";
    }

    if(!$error_msg) {
            //name
      $sql_name = "SELECT * FROM url_merchants WHERE merchant_name = '$merchant_name'";
      $res_name = mysqli_query($GLOBALS["___mysqli_ston"], $sql_name)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_name);
        $num_name = mysqli_num_rows($res_name);
        if($num_name > 0){  $error_msg.= "<li> This merchant name Already Exists, Please Check! "; }

           if($error_msg == ""){
            
                $merchant_name = addslashes(trim($merchant_name));
                $merchant_form = addslashes(trim($merchant_form));
            
          $sql = "INSERT INTO url_merchants SET
                                                    merchant_name  = '$merchant_name',
                                                    merchant_form  = '$merchant_form'
                       ";
               
                //echo $sql;
              $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);
        $error_msg = "<li> New merchant details added successfully";
        $merchant_name  = "";
        $merchant_form  = "";
                
      }
    }
           
           
  }




    elseif($mode == "delete") {   // Delete Language
           //$table_name = $tb_users;
           //$field_name = 'domain_id';
           //$field_id   = $domain_id;
            // if(check_field_delete($table_name,$field_name,$field_id) == 0){
          $sql   = "DELETE FROM url_merchants  WHERE id = '$id' ";
          $res   = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);
        $error_msg.= "<li>A Merchant Detail Deleted";
           // }
            //else{
            //  $error_msg.= "<li>Field already in use, Cannot delete";
            //}
  }


/////////////////////////////////////////////////////////////////////////////////////////14 8 2018













$page_content="<div class=text id=heading  align=center><h3>Your merchants list </h3></div>";




$page_content .='<br><div align=center>';
if(  isset($error_msg) && $error_msg !=null ) {  $page_content .= $error_msg; }
$page_content .='</div>
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














 $edit=$_GET['mode'] ?? '';
 $id=$_GET['id'] ?? '';



    $sql_single = "SELECT * FROM url_merchants WHERE id = '$id' and status <> 'delete' ";
    $res_single = mysqli_query($GLOBALS["___mysqli_ston"], $sql_single)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_single);

    if ($row_single=mysqli_fetch_array($res_single) ) {
      extract($row_single);
            
      $merchant_name_single = stripslashes($row_single['merchant_name'])  ;
      $merchant_form_single = stripslashes($row_single['merchant_form'])  ;
    }






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
         <td><input name="merchant_name" class="input" value='; $page_content .=$merchant_name_single; $page_content .=' ></td>
       <td width=20%>&nbsp;</td>
      </tr>

      <tr class = "listtableaddrow">
         <td width=20%>&nbsp;</td>
         <td nowrap class="textbld" height=30 valign="top">Code</td>
         <td class="textbld" valign="top">:</td>
         <td width=20%>&nbsp;</td>
         <td>
             <textarea name="merchant_form" rows=10 cols=70>'; $page_content .=$merchant_form_single; $page_content .='</textarea>
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
         <td><input name="merchant_name" class="input" value="" ></td>
         <td width=20%>&nbsp;</td>
      </tr>

       <tr class = "listtableaddrow">
         <td width=20%>&nbsp;</td>
         <td nowrap class="textbld" height=30 valign="top">Code</td>
         <td class="textbld" valign="top">:</td>
         <td class="textbld">&nbsp;</td>
         <td>
            <textarea name="merchant_form" rows=10 cols=70></textarea>
         </td>
         <td width=20%>&nbsp;</td>
      </tr>

      <tr class = "listtableaddrow"><td colspan=6 align=center><input name="submit" class="button" Type=submit value="Add New"></td></tr>

     </form>
     
     </table>
      </td>
    </tr>';
}
       $page_content .='<tr ><td align=center class="tdimage1">&nbsp;&nbsp;</td></tr></table>';









include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>
