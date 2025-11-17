<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Text ad  add";
global $ce;
$ce=$_GET['id'];
include("$CONFIG->templatedir/header.php");




        $satya1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where username='".$_SESSION["user"]["username"]."'");
	$rss_alert = mysqli_fetch_array($satya1);
if($rss_alert["membership_status"]=='Free Member' ){
                                 redirect("$CONFIG->siteurl/rusers/textad.php","",0);
                                                   }





$page_content="<div class=text id=heading  align=center><b>Add Text Ad </b><br><br></div>";
if(!$_POST){

$page_content.=

"
<script>
function validare()
{
er=\"\";
mesaj='The following fields are required\\n';
if(!document.forms[0].btext.value){mesaj+=\"  -Text ad  text\\n\";er='a';}
if(       document.forms[0].burl.value){mesaj+='  -Text ad  displayed URL\\n';er='a';}
if(!document.forms[0].btourl.value){mesaj+='  -Text ad  destination\\n';er='a';}
if(er=='a'){alert(mesaj);}
else{document.forms[0].submit();}
}
</script>
<form action=add_textad.php method=post>


<table align=\"center\" class=\"shadowed\" class=\"text\" width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"0\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">

<tr><td>
<br><br>

<table align=\"center\" class=\"shadowed\" class=text width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">

  <tr>
    <td align=\"left\" valign=\"middle\">  Text Ad Title:</td>
    <td><input type=text class=input name=btitle size=40 maxlength=25></td>
  </tr>


  <tr>
    <td align=\"left\" valign=\"middle\">  Text Ad Description:</td>
    <td><input type=text class=input name=btext size=40 maxlength=180></td>
  </tr>
  <tr style=\"display:none\">
    <td align=\"left\" valign=\"middle\">Text ad  displayed URL:</td>
    <td><input type=text class=input name=burl  size=40 maxlength=100></td>
  </tr>
  <tr>
    <td align=\"left\" valign=\"middle\">Website URL:</td>
    <td><input type=text class=input name=btourl size=40 maxlength=100></td>
  </tr>
  <tr>
    <td colspan=\"2\">
	<input type=button class=button value=\"Add Text Ad \" onclick=\"validare();\"><br><br></td>
  </tr>
</table><br><br> </td></tr></table></form>";
}//if
else
{$ce=$_POST['ce'];
$s=db_query("insert into textads(username,title,text,url,urlto) values('".$_SESSION["user"]["username"]."', 
      '".addslashes(htmlspecialchars($_POST['btitle']))."'       ,'".addslashes(htmlspecialchars($_POST['btext']))."','".$_POST['burl']."' ,'".$_POST['btourl']."')");
$page_content.="<div class=text align=center>Text ad  added succesfully.<br><br></div>";

}
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>