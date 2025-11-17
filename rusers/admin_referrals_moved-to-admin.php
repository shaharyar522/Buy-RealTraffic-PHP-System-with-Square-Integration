<?
include'../config.php';
require_login();
$u=$_SESSION["user"]["username"];

$title="Direct referrals for ".$_SESSION["user"]["username"];
include("$CONFIG->templatedir/header.php");


function sel_admin($clauza){
GLOBAL $u_admin;
return db_fetch_array(db_query("select count(*) as numar from users where sponsor='wespac59'  $clauza"));}

 $total_admin=sel_admin("");
echo "total member";  echo $total_admin["numar"];
 $free_Mem=sel_admin(" and membership_status='Free Member' ");
echo "free member"; echo $free_Mem['numar']; 


  $pro_Mem=sel_admin(" and membership_status='Pro Member' ");
echo "Pro Member"; echo $pro_Mem['numar']; 
 
 
 


function sel($clauza){
GLOBAL $u;
return db_fetch_array(db_query("select count(*) as numar from users where sponsor='".$u."'  $clauza"));}
$total=sel("");

$today=sel("and TO_DAYS(NOW()) - TO_DAYS(joindate) <= 1");
$week=sel("and TO_DAYS(NOW()) - TO_DAYS(joindate) <= 7");
$month=sel("and TO_DAYS(NOW()) - TO_DAYS(joindate) <=30");
($total["numar"]>=1)?$total["text"]=
"<a class=link1 href=$CONFIG->siteurl/rusers/ref_details.php?time=total>".$total["numar"]."</a>"
:$total["text"]="No referrals yet";
($today["numar"]>=1)?$today["text"]=
"<a class=link1 href=$CONFIG->siteurl/rusers/ref_details.php?time=today>".$today["numar"]."</a>"
:$today["text"]="No referrals yet";
($week["numar"]>=1)?$week["text"]=
"<a class=link1 href=$CONFIG->siteurl/rusers/ref_details.php?time=week>".$week["numar"]."</a>"
:$week["text"]="No referrals yet";
($month["numar"]>=1)?$month["text"]=
"<a class=link1 href=$CONFIG->siteurl/rusers/ref_details.php?time=month>".$month["numar"]."</a>"
:$month["text"]="No referrals yet";



$page_content = "<br>


<table bgcolor=#d8ecff width=100%>

<p align=center class=text>
<fieldset class=text><legend>Direct referrals for user  <b>".strtoupper($_SESSION["user"]["username"])."</b></legend>








<tr><td>
";
$page_content .=
"<fieldset><legend class=text>Records $from1 -$to of $total_results</legend>
<table class=text width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\" bgcolor=\"#d8ecff\" >
  <tr id=heading > 

    <td><b>Referral Username</b></td>
    <td><b>First Name</b></td>
    <td><b>Last Name</b></td>
    <td><b>Sign Up Info</b></td>
    <td><b>IP Address</b></td>    
    <td><b>Membership Status</b></td>
    
    
  </tr>";

$q= db_query("select id,username,firstname,lastname,joindate,membership_status,last_ip  from users where sponsor='wespac59' ");
while($r=db_fetch_array($q)){

$page_content.="<tr><td>".$r["username"]."</td>
<td>".$r["firstname"]."</td>
<td>".$r["lastname"]."</td>
<td>".$r["joindate"]."</td>       <td>".$r["last_ip"]."</td>       <td>".$r["membership_status"]."</td></tr>";$id++;
}
$page_content.=" </table></fieldset>";
$page_content.="
</td></tr>







<tr><td>
<ul class=text>
<!--
<li>Total referrals:".$total["text"]."</li>
<li>Referrals today:".$today["text"]."</li>
<li>Referrals this week:".$week["text"]."</li>
<li>Referrals this month:".$month["text"]."</li>
-->

<li>Total Members:".$total_admin['numar']."</li>
<li>Total Free Members:".$free_Mem['numar'].     "</li>
<li>Total Pro Members:".$pro_Mem['numar']."</li>



</ul>
</td></tr>



</table>


 </fieldset>






<br><br><br><br><br><br><br></p>";
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>