<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Banner delete";
global $ce;
$ce=$_GET['id'];
include("$CONFIG->templatedir/header.php");
$page_content="<div class=text id=heading  align=center><b>Banner delete</b></div>";
if(!$_POST){
$query=db_query("select * from banners where id='".$_GET['id']."'");
$q1=db_fetch_array($query);

$page_content.=
"<form action=delete_banner.php method=post>
<table  border=\"0\" class=text>
  <tr>
    <td colspan=\"2\"><img src=\"".$q1['url']."\" width=468 height=60></td>
  </tr>
  <tr>
    <td align=\"left\" valign=\"middle\">Banner URL:</td>
    <td><input type=text class=input name=burl value=\"".$q1['url']."\" size=40 maxlength=100></td>
  </tr>
  <tr>
    <td align=\"left\" valign=\"middle\">Banner destination:</td>
    <td><input type=text class=input name=btourl value=\"".$q1['urlto']."\" size=40 maxlength=100></td>
  </tr>
  <tr>
    <td colspan=\"2\">
	<input type=hidden name=ce value='$ce'><input type=submit class=button value=\"Delete This banner\"></td>
  </tr>
</table></form>";
}//if
else
{$ce=$_POST['ce'];

//satyajeet kesharia 29april 2018
//$s=db_query("delete from banners where id='$ce' and username='".$_SESSION['ADMIN']["admin"]["username"]."'");
  $s=db_query("delete from banners where id='$ce'");
//satyajeet kesharia 29april 2018

$page_content.="<div class=text align=center><br><br>Banner removed succesfully.<br><br></div>";

}

include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>
