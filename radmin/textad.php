<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename text ad  Info";
?>



  	

<?
include("$CONFIG->templatedir/header.php");
$page_content="<div class=text id=heading  align=center><h3>Your text ad  statistics</h3></div>";
$query=db_query("select * from textads where username='".$_SESSION['ADMIN']["admin"]["username"]."'");
$q1=db_num_rows($query);
if($q1<1){$page_content.="<div class=text align=center>No text ad  defined yet.</div>";
$page_content.="<div class=text><br>
<ul><li><a href=add_textad.php class=link1>Add text ad </a></li></ul><br></div>";}
else
{$page_content.="<br><div class=text>Text ads used <strong>$q1</strong> of <strong>10</strong>";
if($q1<10){$page_content.="<div class=text>
<ul><li><a href=add_textad.php class=link1>Add text ad </a></li></ul><br></div>";}
while($r=db_fetch_array($query))
{$page_content.="<div align=center>
<table  border=\"0\" class=text id=heading>
  <tr>
    <td align=\"center\" valign=\"middle\" colspan=\"3\">
	
	<div class=textad style=\"width:300px\" align=left><a class=link3 href=".$r['urlto'] ."><span style=\"color: #3779ba;\";>" .$r['title']. "</span></a><br>"    
	
	.$r['text']."
	
	<!-- <br><a class=link3 href=".$r['urlto'].">".$r['url']."</a> -->
	
	</div>
	</td>
  </tr>
  <tr>
    <td align=\"center\" valign=\"middle\">Clicks:</td>
    <td>Views:</td>
    <td align=\"center\" valign=\"middle\"><a href=edit_textad.php?id=".$r['id']." class=link3>Edit </a></td>
  </tr>
  <tr>
    <td align=\"center\" valign=\"middle\"><b>".$r['clicks']."</b></td>
    <td><b>".$r['views']."</b></td>
    <td align=\"center\" valign=\"middle\"><a href=delete_textad.php?id=".$r['id']." class=link3><font color=red>Delete </font></a></td>
  </tr>
</table></div><br>";

}//while
}//else


include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>


