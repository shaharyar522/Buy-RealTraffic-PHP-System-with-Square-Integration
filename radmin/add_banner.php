<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Banner add";
global $ce;
$ce=$_GET['id'];
include("$CONFIG->templatedir/header.php");
$page_content="<div class=text id=heading  align=center><b>Add Banner</b></div>";
if(!$_POST){

$page_content.=
"
<script>
function validare()
{
er=\"\";
mesaj='The following fields are required\\n';
if(!document.forms[0].burl.value){mesaj+='  -Text ad  displayed URL\\n';er='a';}
if(!document.forms[0].btourl.value){mesaj+='  -Text ad  destination\\n';er='a';}
if(er=='a'){alert(mesaj);}
else{document.forms[0].submit();}
}
</script><form action=add_banner.php method=post>
<table  border=\"0\" class=text>
  
  <tr>
    <td align=\"left\" valign=\"middle\">Banner URL:</td>
    <td><input type=text class=input name=burl  size=40 maxlength=100></td>
  </tr>
  <tr>
    <td align=\"left\" valign=\"middle\">Banner destination:</td>
    <td><input type=text class=input name=btourl size=40 maxlength=100></td>
  </tr>
  <tr>
    <td colspan=\"2\">
	<input type=button class=button value=\"Add Banner\"  onclick=\"validare();\"></td>
  </tr>
</table></form>";
}//if
else
{$ce=$_POST['ce'];
$s=db_query("insert into banners(username,url,urlto) values('".$_SESSION['ADMIN']["admin"]["username"]."','".$_POST['burl']."' ,'".$_POST['btourl']."')");
$page_content.="<div class=text align=center>Banner added succesfully.<br><br></div>";

}

include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>
