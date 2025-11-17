<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Banner Edit";
global $ce;
$ce=$_GET['id'];
include("$CONFIG->templatedir/header.php");
$page_content="<div class=text id=heading  align=center><b>Edit Banner</b><br><br></div>";
if(!$_POST){
$query=db_query("select * from banners where id='".$_GET['id']."'");
$q1=db_fetch_array($query);
if($q1["username"]!=$_SESSION["user"]["username"])
{$page_content.="This banner belongs to someone else.";}
else{
$page_content.=
"<form action=edit_banner.php method=post>



<table align=\"center\" class=\"shadowed\" class=\"text\" width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"0\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">
<tr><td><br><br>

<table align=\"center\" class=\"shadowed\" class=text width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">

  

<tr>
    <td colspan=\"2\" align=\"center\"><img src=\"".$q1['url']."\" width=468 height=60></td>
  </tr>


  <tr>
    <td align=\"left\" valign=\"middle\">Banner URL:</td>
    <td><input type=text class=input name=burl value=\"".$q1['url']."\" size=40 maxlength=100></td>
  </tr>
  <tr>
    <td align=\"left\" valign=\"middle\">Website URL:</td>
    <td><input type=text class=input name=btourl value=\"".$q1['urlto']."\" size=40 maxlength=100></td>
  </tr>
  <tr>
    <td colspan=\"2\">
	<input type=hidden name=ce value='$ce'><input type=submit class=button value=\"Edit Banner\"><br><br></td>
  </tr>
</table>  <br><br></td></tr></table></form>";}
}//if
else
{$ce=$_POST['ce'];
$s=db_query("update banners set url='".$_POST['burl']."' ,urlto='".$_POST['btourl']."' where id='$ce'");
$page_content.="<div class=text align=center>Banner settings updated.<br><br></div>";

}
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>