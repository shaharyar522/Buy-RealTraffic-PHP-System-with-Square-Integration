<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename CB Banner Info";
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
$total_results = mysqli_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(*) as Num FROM cb_textads"), 0); 
$total_pages = ceil($total_results / $max_results); 
$from1=$from+1;
$to=$from+$max_results;
if($total_results==0){$page_content.="<div class=text align=center>No records yet</div>
<br><br><br>";}
else{
if($to > $total_results){$to=$total_results;}
$page_content="<div class=text id=heading  align=center><h4>User Defined CB Text Ads</h4></div>";

  $id=$from1;
$q= db_query("select * from cb_textads order by id desc LIMIT $from, $max_results");

$page_content.="<fieldset><legend class=text>Records $from1 -$to of $total_results</legend>";
while($r=db_fetch_array($q)){
$id%2?$fundal="even":$fundal="odd";
$page_content.="
<table  border=\"0\" class=text id=heading align=center>
  <tr>
    <td align=\"center\" valign=\"middle\" colspan=\"3\">
	ID:<strong>$id.</strong> Added by:<strong>".$r['username']."</strong>
	
	
<!--<div class=textad style=\"width:300px\" align=left><a class=link3 href=".$r['urlto'].">"  .$r['title'] . "</a><br>"   .$r['text']."<br> -->
    <div class=textad style=\"width:300px\" align=left><a class=link3 href=".$r['urlto']."><span style=\"color: #3779ba;\";>"  .$r['title'] . "</span></a><br>"   .$r['text']."<br>
	
	
	
	<!-- <a class=link3 href=".$r['urlto'].">".$r['url']."</a>    -->    </div>
	</td>
  </tr>
  <tr>
    <td align=\"center\" valign=\"middle\">Clicks:</td>
    <td>Views:</td>
    <td align=\"center\" valign=\"middle\"><a href=cb_edit_textad.php?id=".$r['id']." class=link3>Edit </a></td>
  </tr>
  <tr>
    <td align=\"center\" valign=\"middle\"><b>".$r['clicks']."</b></td>
    <td><b>".$r['views']."</b></td>
    <td align=\"center\" valign=\"middle\"><a href=cb_delete_textad.php?id=".$r['id']." class=link3><font color=red>Delete </font></a></td>
  </tr>
</table></div><br>
";$id++;
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


