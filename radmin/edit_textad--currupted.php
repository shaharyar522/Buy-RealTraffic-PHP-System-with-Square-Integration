<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Text ad  Edit";
global $ce;
$ce=$_GET['id'];
include("$CONFIG->templatedir/header.php");
$page_content="<div class=text id=heading  align=center><b>Text ad  edit</b></div>";
if(!$_POST){
$query=db_query("select * from textads where id='".$_GET['id']."'");
$q1=db_fetch_array($query);

$page_content.=
"<form action=edit_textad.php method=post>
<table  border=\"0\" class=text>
 <tr>
    <td align=\"left\" valign=\"middle\">Text ad  text:</td>
    <td><input type=text class=input name=btext size=40 maxlength=150 value=\"".$q1['text']."\"></td>
  </tr>
  <tr>
    <td align=\"left\" valign=\"middle\">Text ad  URL:</td>
    <td><input type=text class=input name=burl value=\"".$q1['url']."\" size=40 maxlength=100></td>
  </tr>
  <tr>
    <td align=\"left\" valign=\"middle\">Text ad  destination:</td>
    <td><input type=text class=input name=btourl value=\"".$q1['urlto']."\" size=40 maxlength=100></td>
  </tr>



  <tr>
    <td align=\"left\" valign=\"middle\">Text ad  destination:</td>
    <td><input type=text class=input name=btourl value=\"".$q1['urlto']."\" size=40 maxlength=100></td>
  </tr>



  <tr>
    <td colspan=\"2\">
	<input type=hidden name=ce value='$ce'><input type=submit class=button value=\"Edit Text ad \"></td>
  </tr>
</table></form>";
}//if
else
{$ce=$_POST['ce'];
$s=db_query("update textads set text='".addslashes(htmlspecialchars($_POST['btext']))."',url='".$_POST['burl']."' ,urlto='".$_POST['btourl']."' where id='$ce'");
$page_content.="<div class=text align=center>Text ad  settings updated.<br><br></div>";

}

include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>
