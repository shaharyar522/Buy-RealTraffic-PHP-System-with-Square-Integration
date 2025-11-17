<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Delete CB Text Ad";
global $ce;
$ce=$_GET['id'];
include("$CONFIG->templatedir/header.php");
$page_content="<div class=text id=heading  align=center><b>Delete CB Text Ad</b><br><br></div>";
if(!$_POST){
$query=db_query("select * from cb_textads where id='".$_GET['id']."'");
$q1=db_fetch_array($query);
if($q1["username"]!=$_SESSION["user"]["username"])
{$page_content.="This text ad belongs to someone else.";}
else{
$page_content.=
"<form action=cb_delete_textad.php method=post>


<table align=\"center\" class=\"shadowed\" class=\"text\" width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"0\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">
<tr><td>

<br><br>

<table align=\"center\" class=\"shadowed\" class=text width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">


 <tr>
    <td align=\"left\" valign=\"middle\"> Text Ad Title:</td>
    <td><input type=text class=input name=btext size=40 maxlength=150 value=\"".$q1['title']."\"></td>
  </tr>

 <tr>
    <td align=\"left\" valign=\"middle\"> Text Ad Description:</td>
    <td><input type=text class=input name=btext size=40 maxlength=150 value=\"".$q1['text']."\"></td>
  </tr>
  <tr  style=\"display:none\">
    <td align=\"left\" valign=\"middle\">Text ad  URL:</td>
    <td><input type=text class=input name=burl value=\"".$q1['url']."\" size=40 maxlength=75></td>
  </tr>
  <tr>
    <td align=\"left\" valign=\"middle\"> Website URL:</td>
    <td><input type=text class=input name=btourl value=\"".$q1['urlto']."\" size=40 maxlength=75></td>
  </tr>
  <tr>
    <td colspan=\"2\">
	<input type=hidden name=ce value='$ce'><input type=submit class=button value=\"Delete This CB Text Ad\"><br><br></td>
  </tr>
</table> <br><br> </td></tr></table></form>";}
}//if
else
{$ce=$_POST['ce'];
$s=db_query("delete from cb_textads where id='$ce' and username='".$_SESSION["user"]["username"]."'");
$page_content.="<div class=text align=center><br><br>Text ad  deleted succesfully.<br><br></div>";

}
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>