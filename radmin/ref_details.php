<?
include'../config.php';
require_login_admin();
$u=$_SESSION['ADMIN']["admin"]["username"];
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
$today="and  joindate>date_sub(current_date,interval 1 day)";
$week="and  joindate>date_sub(current_date,interval 7 day)";
$month=" and joindate>date_sub(current_date,interval 1 month)";

$free_r=" and membership_status='Free Member' ";
$pro_r=" and membership_status='Pro Member' ";

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


case 'free':
$clauza=$free_r;
break;
case 'pre':
$clauza=$pro_r;
break;

}
$total_results = mysqli_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(*) as Num FROM users where sponsor='".$u."'  $clauza"), 0); 

$total_pages = ceil($total_results / $max_results); 
$from1=$from+1;
$to=$from+$max_results;
if($total_results==0){$page_content.="<div class=text align=center>No records yet</div>
<br><br><br>";}
else{
if($to > $total_results){$to=$total_results;}
$page_content=
"<fieldset><legend class=text>Records $from1 -$to of $total_results</legend>
<table class=text width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\" bgcolor=\"#d8ecff\" >
  <tr id=heading > 
    <td><b>ID</b></td>
    <td><b>Referral Username</b></td>
    <td><b>First Name</b></td>
    <td><b>Last Name</b></td>
    <td><b>Sign Up Info</b></td>
    <td><b>IP Address</b></td>    
    <td><b>Membership Status</b></td>
    
    
  </tr>";
  $id=$from1;
$q= db_query("select username,firstname,lastname,joindate,membership_status,last_ip  from users where sponsor='".$u."'  $clauza order by joindate desc LIMIT $from, $max_results");
while($r=db_fetch_array($q)){
$id%2?$fundal="even":$fundal="odd";
$page_content.="<tr id=$fundal><td>$id</td><td>".$r["username"]."</td>
<td>".$r["firstname"]."</td>
<td>".$r["lastname"]."</td>
<td>".$r["joindate"]."</td>       <td>".$r["last_ip"]."</td>       <td>".$r["membership_status"]."</td></tr>";$id++;
}
$page_content.=" </table></fieldset>";


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
 $page_content.= "</center>"; 

}

include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>