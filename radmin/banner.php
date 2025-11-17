<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Banner Info";
?>


  	


<?
include("$CONFIG->templatedir/header.php");
$page_content="






<div class=text id=heading  align=center>







<h3>Your banner statistics</h3></div>";
$query=db_query("select * from banners where username='".$_SESSION['ADMIN']["admin"]["username"]."'");
$q1=db_num_rows($query);  
if($q1<1){$page_content.="<div class=text align=center>No banner defined yet.</div>";
$page_content.="<div class=text><br>
<ul><li><a href=add_banner.php class=link1>Add banner</a></li></ul><br></div>";}
else
{$page_content.="<br><div class=text>Banners used <strong>$q1</strong> of <strong>10</strong>";
if($q1<10){$page_content.="<div class=text>
<ul><li><a href=add_banner.php class=link1>Add banner</a></li></ul><br></div>";}


while($r=db_fetch_array($query))
{$page_content .="







<table>



<tr>
    <td align=\"center\" valign=\"middle\" colspan=\"3\">
	<img src=\"".$r['url']."\" width=468 height=60>
	</td>
  </tr>
  <tr>
    <td align=\"center\" valign=\"middle\">Clicks:</td>
    <td>Views:</td>
    <td align=\"center\" valign=\"middle\"><a href=edit_banner.php?id=".$r['id']." class=link1>Edit </a></td>
  </tr>
 <tr>
    <td align=\"center\" valign=\"middle\"><b>".$r['clicks']."</b></td>
    <td><b>".$r['views']."</b></td>
    <td align=\"center\" valign=\"middle\"><a href=delete_banner.php?id=".$r['id']." class=link1><font color=red>Delete </font></a></td>
  </tr>
</table>";

}//while
}//else


include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>
