<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename default login site Info";
include("$CONFIG->templatedir/header.php");






//ssssssssssssssssssssssssssssssssssssssssss

$id= $_REQUEST['id'] ?? ''; 
$mode = $_REQUEST['mode'] ?? '';
$site_name =$_REQUEST['site_name'] ?? '';
$site_url =$_REQUEST['site_url'] ?? '';
$act = $_REQUEST['act'] ?? '';



  if ( ($mode == "edit") ) {  

    if ($act == "update") {  


          if(!$site_name) {

            $error_msg .= "<li>Invalid site title</li>";

        }

       // if(!isValidURL($site_url)){

        //    $error_msg .= "<li> Please enter valid URL including http://</li>";

       //     }

      $sql_name = "SELECT * FROM url_login_my_site WHERE site_name = '$site_name' and id != '$id'";
      $res_name = mysqli_query($GLOBALS["___mysqli_ston"], $sql_name)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_name);
        $num_name = mysqli_num_rows($res_name);
        if($num_name == 1) { $error_msg.= "<li> This Site Name Already Exists, Please Check!</li> "; }


      if($num_name == 0) {

                $sql  = "UPDATE url_login_my_site  SET
                                                  site_name = '$site_name',
                                                  site_url  = '$site_url'

                         WHERE id = '$id'";

                $res  = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);

              $error_msg = "<li> Site Details Updated ";

            //  header("Location:default_login_site_list.php?mode=''&error_msg=$error_msg");

        }//errormsg        

      }//update



#####------------------------+

# AFTER UPDATED SHOW DETAILS |

#####------------------------+


  }//end edit

#####--------------+

# SANE NEW DETAILS |

#####--------------+

  elseif ($mode == "savenew") {

         if(!$site_name) {

           $error_msg .= "<li>Invalid site name</li>";

       }

       
       //if(!isValidURL($site_url)){

       //    $error_msg .= "<li> Please enter valid URL including http://</li>";

       //    }


    if(!$error_msg) {


      $sql_name = "SELECT * FROM url_login_my_site WHERE site_name = '$site_name'";
      $res_name = mysqli_query($GLOBALS["___mysqli_ston"], $sql_name)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_name);
        $num_name = mysqli_num_rows($res_name);

        if($num_name > 0){  $error_msg.= "<li> This Site Name Already Exists, Please Check! "; }

           if($error_msg == ""){
          $sql = "INSERT INTO url_login_my_site SET
                                                    site_name = '$site_name',
                                                    site_url  = '$site_url'
                       ";

               //echo $sql;

              $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);

        $error_msg = "<li> New site details added successfully";
        $site_name = "";
        $site_url  = "";
      }

    }

  }



#####--------------+

# DELETED DETAILS  |

#####--------------+

  elseif($mode == "delete") {   // Delete Language


          $sql   = "DELETE FROM url_login_my_site  WHERE id = '$id' ";

        $res   = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);

        $error_msg.= "<li>A Site Detail Deleted";

 
  }

//ssssssssssssssssssssssssssssssssssssssssss









$page_content = "<div class=text id=heading  align=center><h3>Default Login Site Info </h3></div>";

$page_content .='<br><div align=center>';
if(  isset($error_msg) && $error_msg !=null ) {  $page_content .= $error_msg; }
$page_content .='</div>

<table  class="borderdesign1" cellpadding="3" cellspacing="0" width="90%" height=300 align=center>

  <tr>

    <td width="100%" colspan=6 valign=top>

        <table border="1"  cellpadding="3" cellspacing="0" width="100%" align=center>

         <tr>

          <td align=center  width=2%>S.No</td>

          <td align=center  width=40%>Site Name</td>

          <td align=center  width=40%>Site Url</td>

          <td align=center  width=25%>Action</td>

        </tr>';





  $sql = "SELECT * FROM url_login_my_site order by site_name";

  $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);

  $num_rows = mysqli_num_rows($res);

  while ($row = mysqli_fetch_array($res)) {

    $domainlist[] = $row; 

$page_content .=' <tr >
                   <td align=left >'; $page_content .=$row['id']; $page_content .= '</td>
                   <td align=left >'; $page_content .=$row['site_name']; $page_content .= '</td>
                   <td align=left >'; $page_content .=$row['site_url']; $page_content .= '</td>

                   <td align=center ><a href="default_login_site_list.php?mode=edit&id='; $page_content .=$row['id']; $page_content .= '">EDIT</a>| <a href="default_login_site_list.php?mode=delete&id='; $page_content .=$row['id']; $page_content .= '" onclick="return confirm(\'Are you sure to delete this site?\');">DELETE</a></td>

         </tr>';

  }
     $page_content .=' <tr>

             <td colspan=4 align=center ></td>

           </tr>

            
       </table>

</td></tr>

</table>

<br>';




 $edit=$_GET['mode'] ?? '';
 $id=$_GET['id'] ?? '';








  $sql_single = "SELECT * FROM url_login_my_site WHERE id = '$id' and status <> 'delete' ";
    $res_single = mysqli_query($GLOBALS["___mysqli_ston"], $sql_single)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_single);

    if ($row_single=mysqli_fetch_array($res_single) ) {
     // extract($row_single);
            
     echo $merchant_name_single = stripslashes($row_single['site_name'])  ;
     echo $merchant_form_single = stripslashes($row_single['site_url'])  ;
    }




       $page_content .='<table width="50%" class="borderdesign1"  cellspacing="3" cellpadding="0"  border=0 align=center>';

if (    isset($edit)  && $edit == 'edit'  ){

           $page_content .='<tr><td align=center  height=30>Edit Site(s)</td></tr>

    <tr>

      <td>

      <table border="0" cellpadding="0"  cellspacing="0" width="100%" align=center>

        <form method="post" name="addnewfrm" action="default_login_site_list.php">

           <input type="hidden" name="mode" value="edit">

           <input type="hidden" name="act"  value="update">

           <input type="hidden" name="id"   value="';  $page_content .=$id; $page_content .= '">



      <tr class = "listtableaddrow">

         <td width=20%>&nbsp;</td>

         <td nowrap class="textbld" height=30>Site Name</td>

         <td class="textbld">:</td>

         <td width=20%>&nbsp;</td>

         <td><input name="site_name"  value="'; $page_content .=$merchant_name_single; $page_content .='" ></td>

       <td width=20%>&nbsp;</td>

      </tr>



      <tr class = "listtableaddrow">

         <td width=20%>&nbsp;</td>

         <td nowrap class="textbld" height=30>Site Url</td>

         <td class="textbld">:</td>

         <td width=20%>&nbsp;</td>

         <td><input name="site_url"  value='; $page_content .=$merchant_form_single; $page_content .=' ></td>

       <td width=20%>&nbsp;</td>

      </tr>



     <tr class = "listtableaddrow">

        <td colspan=6 align=center>

    <input name="cancel" class="btn" Type=button value="Cancel" onclick="javascript:window.location=\'default_login_site_list.php\';">&nbsp;

    <input name="submit" class="btn" Type=submit value="Update" >

      </td>

    </tr>



  </form>

  </table>

 </td>

</tr>

<tr><td align=center class="tdimage1" >&nbsp;&nbsp;</td></tr>';

 }else{

    $page_content .='<tr><td align=center >Add New Site</td></tr>

    <tr>

      <td>

      <table border="0" cellpadding="" cellspacing="0" width="100%" align=center class="tbl1">



        <form method="post" name="addnewfrm" action="default_login_site_list.php">

        <input type="hidden" name="mode" value="savenew">



       <tr class = "listtableaddrow">

         <td width=20%>&nbsp;</td>

         <td nowrap class="textbld" height=30>Site Name</td>

         <td class="textbld">:</td>

         <td class="textbld">&nbsp;</td>

         <td><input name="site_name" class="input" value="" ></td>

         <td width=20%>&nbsp;</td>

      </tr>



       <tr class = "listtableaddrow">

         <td width=20%>&nbsp;</td>

         <td nowrap class="textbld" height=30>Site Url</td>

         <td class="textbld">:</td>

         <td class="textbld">&nbsp;</td>

         <td><input name="site_url" class="input" value="" ></td>

         <td width=20%>&nbsp;</td>

      </tr>



      <tr class = "listtableaddrow"><td colspan=6 align=center><input name="submit" class="button" Type=submit value="Add New"></td></tr>



     </form>

     </table>

      </td>

    </tr>';
 }
    if(!$edit) {

   $page_content .='<tr ><td align=center class="tdimage1">&nbsp;&nbsp;</td></tr>';

    }

  $page_content .='</table>';





   

include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");

