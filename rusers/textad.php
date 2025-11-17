<?
include'../config.php';
require_login();
$title="$CONFIG->sitename text ad  Info";
include("$CONFIG->templatedir/header.php");
$page_content="<div class=text id=heading  align=center><h3>Your Text Ad  Statistics</h3></div>";
$query=db_query("select * from textads where username='".$_SESSION["user"]["username"]."' order by id desc");
$q1=db_num_rows($query);
if($q1<1){$page_content.="<div class=text align=center>No text ad  defined yet.</div>";
$page_content.="<div class=text><br>
<ul><li>";


        $satya1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where username='".$_SESSION["user"]["username"]."'");
	$rss_alert = mysqli_fetch_array($satya1);


if($rss_alert["membership_status"]=='Free Member' ){

$page_content .="<script>
function validateForm() { 
           alert(\"Sorry, in order to add Free Text Ads, you will need to purchase one of our services.  \");
        return false;
   
}
</script>";
$page_content .= "<a href=add_textad.php class=link1 onclick=\"return validateForm()\" >Add Text Ad </a>";

}
else{
$page_content .= "<a href=add_textad.php class=link1>Add Text Ad </a>";
}


$page_content.="</li></ul><br></div>";}
else
{$page_content.="<br><div class=text>Text ads used <strong>$q1</strong> of <strong>10</strong>";
if($q1<10){$page_content.="<div class=text>
<ul><li><a href=add_textad.php class=link1>Add Text Ad</a></li></ul><br></div>";}
while($r=db_fetch_array($query))
{$page_content.="<div align=center>





<table align=\"center\" class=\"shadowed\" class=\"text\" width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"0\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">

<tr><td>

<br><br>


<table align=\"center\" class=\"shadowed\" class=\"text\" width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">



<tr>
    <td align=\"center\" valign=\"middle\" colspan=\"4\">
	<div class=textad style=\"width:600px \" align=left><a class=link3 href="  .$r['urlto']. " target=_blank><span style=\"color: #3779ba;\";>"  .stripslashes($r['title'])."</span></a><br>"  
	
	.   stripslashes( $r['text']) ."<br>  <!--  <a class=link3 href=".$r['urlto'].">".$r['url']."</a>  -->  </div>
	<br></td>
  </tr>
  <tr>
    <td align=\"center\" valign=\"middle\">Clicks:</td>
    <td align=\"center\">Views:</td>

<td colspan=2 align=\"center\">Action:</td>

</tr>


   

  <tr>
    <td align=\"center\" valign=\"middle\"><b>".$r['clicks']."</b><br><br></td>
    <td align=\"center\"><b>".$r['views']."</b><br><br></td>
 <td align=\"center\" valign=\"middle\"><a href=edit_textad.php?id=".$r['id']." class=link3>Edit </a><br><br></td>
    <td align=\"center\" valign=\"middle\"><a href=delete_textad.php?id=".$r['id']." class=link3><font color=red>Delete </font></a><br><br>  </td>
  </tr>
</table> <br><br></td></tr></table><br><br></div>";

}//while
}//else

include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>