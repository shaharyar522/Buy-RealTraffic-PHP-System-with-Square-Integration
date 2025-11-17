<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Banner Info";
?>



  	

<?
include("$CONFIG->templatedir/header.php");
if(!isset($_GET['page'])){ 
    $page = 1; 
} else { 
    $page = $_GET['page']; 
} 
$max_results = 10; 
$from = (($page * $max_results) - $max_results);
$total_results = mysqli_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(*) as Num FROM banners"), 0); 
$total_pages = ceil($total_results / $max_results); 
$from1=$from+1;
$to=$from+$max_results;
if($total_results==0){$page_content.="<div class=text align=center>No records yet</div>
<br><br><br>";}
else{
if($to > $total_results){$to=$total_results;}
$page_content="<div class=text id=heading  align=center><h4>User defined banners</h4></div>";

  $id=$from1;
$q= db_query("select * from banners order by id desc LIMIT $from, $max_results");

$page_content.="<fieldset><legend class=text>Records $from1 -$to of $total_results</legend>";
while($r=db_fetch_array($q)){
$id%2?$fundal="even":$fundal="odd";
$page_content.="
<table  border=\"0\" class=text >
  <tr>
    <td align=\"center\" valign=\"middle\" colspan=\"3\">
	ID:<strong>$id.</strong> Added by:<strong>".$r['username']."</strong>
	<img src=\"".$r['url']."\" width=468 height=60>
	</td>
  </tr>
  <tr>
    <td align=\"center\" valign=\"middle\">Clicks:</td>
    <td>Views:</td>
    <td align=\"center\" valign=\"middle\"><a href=edit_banner.php?id=".$r['id']." class=link1>Edit </a></td>
  </tr>
  <tr>
    <td align=\"center\" valign=\"middle\"><b>".$r['clicks']."</b></td>
    <td><b>".$r['views']."</b></td>
    <td align=\"center\" valign=\"middle\"><a href=delete_banner.php?id=".$r['id']." class=link1><font color=red>Delete </font></a></td>
  </tr>
</table><hr align=center width=75%>";$id++;
}
$page_content.=" </table></fieldset>";


 $page_content.= "<div align=center class=text>Select a Page<br />"; 

if($page > 1){ 
    $prev = ($page - 1); 
    $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?page=$prev\"><strong>Previous </strong></a>&nbsp;"; 
} 

for($i = 1; $i <= $total_pages; $i++){ 
    if(($page) == $i){ 
        $page_content.= "$i&nbsp;"; 
        } else { 
            $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?page=$i\"><strong>$i</strong></a>&nbsp;"; 
    } 
} 

// Build Next Link 
if($page < $total_pages){ 
    $next = ($page + 1); 
    $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?page=$next\"><strong>Next>></strong></a>"; 
} 
 $page_content.= "</center>"; 

}




include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>




