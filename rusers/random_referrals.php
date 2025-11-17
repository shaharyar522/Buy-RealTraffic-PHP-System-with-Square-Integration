<?
include'../config.php';
require_login();
$u=$_SESSION["user"]["username"];

$title="Random referrals for ".$_SESSION["user"]["username"];
include("$CONFIG->templatedir/header.php");
function sel($clauza){
GLOBAL $u;
return db_fetch_array(db_query("select count(*) as numar from random_referrals where sponsor='".$u."'  $clauza"));}
$total=sel("");

$today=sel("and TO_DAYS(NOW()) - TO_DAYS(joindate) <= 1");
$week=sel("and TO_DAYS(NOW()) - TO_DAYS(joindate) <= 7");
$month=sel("and TO_DAYS(NOW()) - TO_DAYS(joindate) <=30");
($total["numar"]>=1)?$total["text"]=
"<a class=link1 href=$CONFIG->siteurl/users/random_details.php?time=total>".$total["numar"]."</a>"
:$total["text"]="No referrals yet";
($today["numar"]>=1)?$today["text"]=
"<a class=link1 href=$CONFIG->siteurl/users/random_details.php?time=today>".$today["numar"]."</a>"
:$today["text"]="No referrals yet";
($week["numar"]>=1)?$week["text"]=
"<a class=link1 href=$CONFIG->siteurl/users/random_details.php?time=week>".$week["numar"]."</a>"
:$week["text"]="No referrals yet";
($month["numar"]>=1)?$month["text"]=
"<a class=link1 href=$CONFIG->siteurl/users/random_details.php?time=month>".$month["numar"]."</a>"
:$month["text"]="No referrals yet";
$page_content = "<br><p align=center class=text>
<fieldset class=text><legend>Random referrals for user  <b>".strtoupper($_SESSION["user"]["username"])."</b></legend>
<ul class=text>
<li>Total referrals:".$total["text"]."</li>
<li>Referrals today:".$today["text"]."</li>
<li>Referrals this week:".$week["text"]."</li>
<li>Referrals this month:".$month["text"]."</li>
</ul>
 </fieldset>






<br><br><br><br><br><br><br></p>";
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>