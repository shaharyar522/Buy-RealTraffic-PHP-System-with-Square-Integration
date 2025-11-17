<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Banner Info";
include("$CONFIG->templatedir/header.php");
$page_content="<div class=text id=heading  align=center><h3>Your Banner Statistics</h3></div>";
$query=db_query("select * from banners where username='".$_SESSION["user"]["username"]."'order by id desc");


$q1=db_num_rows($query);

if($q1<1){$page_content.="<div class=text align=center>No banner defined yet.</div>";
$page_content.="<div class=text><br>
<ul><li>";



        $satya1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where username='".$_SESSION["user"]["username"]."'");
	$rss_alert = mysqli_fetch_array($satya1);	


if($rss_alert["membership_status"]=='Free Member' ){

$page_content.="<script>
function validateForm() { 
           alert(\"Sorry, in order to add Free Banners, you will need to purchase one of our services. \");
        return false;
   
}
</script>";


  $page_content .= "<a href=add_banner.php class=link1  onclick=\"return validateForm()\">Add banner</a>";
}
else{
$page_content .= "<a href=add_banner.php class=link1>Add banner</a>";




}



$page_content .="</li></ul><br></div>";}
else
{$page_content.="<br><div class=text>Banners used <strong>$q1</strong> of <strong>10</strong><br><br>";
if($q1<10){$page_content.="<div class=text>
<ul><li><a href=add_banner.php class=link1>Add banner</a></li></ul><br></div>";}
while($r=db_fetch_array($query))
{$page_content.="





<table align=\"center\" class=\"shadowed\" class=\"text\" width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"0\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">
<tr>
<td><br><br>


<table align=\"center\" class=\"shadowed\" class=\"text\" width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">
<tr>



    <td align=\"center\" valign=\"top\" colspan=\"4\">
<a class=link3 href="  .$r['urlto']. " target=_blank>  	<img src=\"".$r['url']."\" width=468 height=60></a>






	</td>
  </tr>
  <tr>
    <td align=\"center\" valign=\"middle\">Clicks:</td>
    <td align=\"center\">Views:</td><td colspan=2 align=\"center\">Action:</td>


    
  </tr>
  <tr>
    <td align=\"center\" valign=\"middle\"><b>".$r['clicks']."</b><br><br></td>
    <td align=\"center\"><b>".$r['views']."</b><br><br></td>

<td align=\"center\" valign=\"middle\"><a href=edit_banner.php?id=".$r['id']." class=link1>Edit </a><br><br></td>
    <td align=\"center\" valign=\"middle\"><a href=delete_banner.php?id=".$r['id']." class=link1><font color=red>Delete </font></a><br><br></td>
  </tr>
</table>
<br><br>

</td></tr></table>
<br><br>";

}//while
}//else

include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>