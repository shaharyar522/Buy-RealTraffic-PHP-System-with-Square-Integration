<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Weight";
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
$tot=db_fetch_row(db_query("select count(*) from chances_temp where status='unverified'"));
$total_results=$tot[0];
$d=db_query("select * from chances_temp where status='unverified'");

$total_pages = ceil($total_results / $max_results); 
$from1=$from+1;
$to=$from+$max_results;
if($total_results==0){$page_content ="<div class=text align=center>Nothing to verify</div>
<br><br><br>";}

else{
if($to > $total_results){$to=$total_results;}
$page_content=
"<fieldset><legend class=text>Records $from1 -$to of $total_results</legend><br>

<table class=text width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" >
  <tr id=heading > 
    <td>ID</td>
    <td>Username</td>
    <td>Credits bought</td>
	<td>Quick Actions</td>
  </tr>";
  $id=$from1;
$q= db_query("select * from chances_temp where status='unverified' LIMIT $from, $max_results");
while($r=db_fetch_array($q)){
$id%2?$fundal="even":$fundal="odd";
$page_content.="<tr id=$fundal><td>$id</td><td>".$r["username"]."</td>
<td>".$r["credits"]."</td>
<td><a href=accept_weight.php?credits=".$r["credits"]."&id=".$r["id"]."&username=".$r["username"].">Accept</a>||
<a href=reject_weight.php?credits=".$r["credits"]."&id=".$r["id"].">Reject</a></td>
</tr>";$id++;
}
$page_content.=" </table></fieldset><br>";


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
 $page_content.= "<br>"; 

}
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>




