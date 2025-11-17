<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename default login site Info";
include("$CONFIG->templatedir/header.php");







$page_content = "<div class=text id=heading  align=center><h3>Default Login Site Info </h3></div>";

$page_content .='<br>

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
                   <td align=left >111</td>
                   <td align=left >222</td>
                   <td align=left >444</td>

                   <td align=center ><a href="default_login_site_list.php?mode=edit&id='; $page_content .=$row['id']; $page_content .= '">EDIT</a>| <a href="default_login_site_list.php?mode=delete&id='; $page_content .=$row['id']; $page_content .= '" onclick="return confirm(\'Are you sure to delete this site?\');">DELETE</a></td>

         </tr>';

  }
     $page_content .=' <tr>

             <td colspan=4 align=center >No site(s) are in list</td>

           </tr>

            
       </table>

</td></tr>

</table>

<br>';




echo $edit=$_REQUEST['mode'];  echo "<br>";
echo $id=$_REQUEST['id'];

   

include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");

