<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename CB Text ad  delete";
global $ce;
$ce=$_GET['id'] ?? '';
include("$CONFIG->templatedir/header.php");
$page_content="<div class=text id=heading  align=center><b>Text ad  delete</b></div>";
if(!$_POST){
$query=db_query("select * from cb_textads where id='".$_GET['id']."'");
$q1=db_fetch_array($query);

$page_content.=
"<form action=cb_delete_textad.php method=post>
<table  border=\"0\" class=text>


 <tr>
    <td align=\"left\" valign=\"middle\"><span style=\"color: #3779ba;\";>Text Ad Title</span>:</td>
    <td><input type=text class=input name=btext size=40 maxlength=150 value=\"".$q1['title']."\"></td>
  </tr>

 <tr>
    <td align=\"left\" valign=\"middle\"><span style=\"color: #3779ba;\";>Text Ad Description</span>:</td>
    <td><input type=text class=input name=btext size=40 maxlength=150 value=\"".$q1['text']."\"></td>
  </tr>
  <tr  style=\"display:none\">
    <td align=\"left\" valign=\"middle\">Text ad  URL:</td>
    <td><input type=text class=input name=burl value=\"".$q1['url']."\" size=40 maxlength=100></td>
  </tr>
  <tr>
    <td align=\"left\" valign=\"middle\"><span style=\"color: #3779ba;\";>Text Ad Url</span>:</td>
    <td><input type=text class=input name=btourl value=\"".$q1['urlto']."\" size=40 maxlength=100></td>
  </tr>
  <tr>
    <td colspan=\"2\">
	<input type=hidden name=ce value='$ce'><input type=submit class=button value=\"Delete This CB Text Ad\"></td>
  </tr>
</table></form>";
}//if
else
{$ce=$_POST['ce'] ?? '';

//satyajeet kesharia 29april 2018
   // $s=db_query("delete from textads where id='$ce' and username='".$_SESSION['ADMIN']["admin"]["username"]."'");
 $s=db_query("delete from cb_textads where id='$ce'");
//satyajeet kesharia 29april 2018
   
$page_content.="<div class=text align=center><br><br>Text ad  deleted succesfully.<br><br></div>";

}

include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>
