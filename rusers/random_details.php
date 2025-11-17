<?
include'../config.php';
require_login();
$u=$_SESSION["user"]["username"];
$time=$_GET['time'];
if(!isset($_GET['page'])){ 
    $page = 1; 
} else { 
    $page = $_GET['page']; 
} 
$max_results = 10; 
$from = (($page * $max_results) - $max_results);
$title="Referral details ";
include("$CONFIG->templatedir/header.php");
$total="";
$today="and  random_referrals.joindate>date_sub(current_date,interval 1 day)";
$week="and  random_referrals.joindate>date_sub(current_date,interval 7 day)";
$month=" and random_referrals.joindate>date_sub(current_date,interval 1 month)";
switch($time)
{
case 'today':
$clauza=$today;
break;
case 'total':
$clauza=$total;
break;
case 'week':
$clauza=$week;
break;
case 'month':
$clauza=$month;
break;
}
$total_results = mysqli_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(*) as Num FROM random_referrals where sponsor='".$u."'  $clauza"), 0); 

$total_pages = ceil($total_results / $max_results); 
$from1=$from+1;
$to=$from+$max_results;
if($total_results==0){$page_content.="<div class=text align=center>No records yet</div>
<br><br><br>";}

else{
if($to > $total_results){$to=$total_results;}
$page_content=
"<fieldset><legend class=text>Records $from1 -$to of $total_results</legend><br>

<table class=text width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" >
  <tr id=heading > 
    <td>ID</td>
    <td>Username</td>
     <td>Joindate</td>
  </tr>";
  $id=$from1;
$q= db_query("select username ,joindate from random_referrals where sponsor='".$u."'  $clauza order by joindate desc LIMIT $from, $max_results");
while($r=db_fetch_array($q)){
$id%2?$fundal="even":$fundal="odd";
$page_content.="<tr id=$fundal><td>$id</td><td>".$r["username"]."</td>

<td>".$r["joindate"]."</td></tr>";$id++;
}
$page_content.=" </table></fieldset><br>";


 $page_content.= "<div align=center class=text>Select a Page<br />"; 

if($page > 1){ 
    $prev = ($page - 1); 
    $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?time=$time&page=$prev\"><strong>Previous </strong></a>&nbsp;"; 
} 

for($i = 1; $i <= $total_pages; $i++){ 
    if(($page) == $i){ 
        $page_content.= "$i&nbsp;"; 
        } else { 
            $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?time=$time&page=$i\"><strong>$i</strong></a>&nbsp;"; 
    } 
} 

// Build Next Link 
if($page < $total_pages){ 
    $next = ($page + 1); 
    $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?time=$time&page=$next\"><strong>Next>></strong></a>"; 
} 
 $page_content.= "<br>"; 

}
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>