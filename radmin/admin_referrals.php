<?
include'../config.php';
require_login_admin();
$u=$_SESSION['ADMIN']["admin"]["username"];

$title="Direct referrals for ".$_SESSION['ADMIN']["admin"]["username"];
include("$CONFIG->templatedir/header.php");
function sel($clauza){
GLOBAL $u;
return db_fetch_array(db_query("select count(*) as numar from users where sponsor='".$u."'  $clauza"));}
$total=sel("");

$today=sel("and TO_DAYS(NOW()) - TO_DAYS(joindate) <= 1");
$week=sel("and TO_DAYS(NOW()) - TO_DAYS(joindate) <= 7");
$month=sel("and TO_DAYS(NOW()) - TO_DAYS(joindate) <=30");
($total["numar"]>=1)?$total["text"]=
"<a class=link1 href=$CONFIG->siteurl/radmin/ref_details.php?time=total>".$total["numar"]."</a>"
:$total["text"]="No referrals yet";
($today["numar"]>=1)?$today["text"]=
"<a class=link1 href=$CONFIG->siteurl/radmin/ref_details.php?time=today>".$today["numar"]."</a>"
:$today["text"]="No referrals yet";
($week["numar"]>=1)?$week["text"]=
"<a class=link1 href=$CONFIG->siteurl/radmin/ref_details.php?time=week>".$week["numar"]."</a>"
:$week["text"]="No referrals yet";
($month["numar"]>=1)?$month["text"]=
"<a class=link1 href=$CONFIG->siteurl/radmin/ref_details.php?time=month>".$month["numar"]."</a>"
:$month["text"]="No referrals yet";







$free_mem=sel(" and membership_status='Free Member' ");
$pro_mem=sel(" and membership_status='Pro Member' ");

($free_mem["numar"]>=1)?$free_mem["text"]=
"<a class=link1 href=$CONFIG->siteurl/radmin/ref_details.php?time=free>".$free_mem["numar"]."</a>"
:$free_mem["text"]="No referrals yet";

($pro_mem["numar"]>=1)?$pro_mem["text"]=
"<a class=link1 href=$CONFIG->siteurl/radmin/ref_details.php?time=pre>".$pro_mem["numar"]."</a>"
:$pro_mem["text"]="No referrals yet";






$page_content = "<br>


<table bgcolor=#d8ecff width=100%>

<p align=center class=text>
<fieldset class=text><legend>Direct referrals for user  <b>".strtoupper($_SESSION['ADMIN']["admin"]["username"])."</b></legend>


<tr><td>
<ul class=text>
<li>Total referrals:".$total["text"]."</li>
<li>Referrals today:".$today["text"]."</li>
<li>Referrals this week:".$week["text"]."</li>
<li>Referrals this month:".$month["text"]."</li>

<li>Total Free Members:".$free_mem["text"]."</li>
<li>Total Pro Members:".$pro_mem["text"]."</li>
</ul>
</td></tr>

<!--
<tr><td>First Name</td>    <td>    ". ($_SESSION["user"]["firstname"] ?? '') ."  </td>  </tr>
<tr><td>Last Name</td>    <td>    ". ($_SESSION["user"]["lastname"] ?? '') ."   </td>  </tr>
<tr><td>Sign Up Info</td>    <td>   ". ($_SESSION["user"]["joindate"] ?? '') ."  </td>  </tr>
<tr><td>IP Address </td>    <td>   ". ($_SESSION["user"]["last_ip"] ?? '') ."    </td>  </tr>
<tr><td>Referral Username</td>    <td>". ($_SESSION["user"]["email"] ?? '') ." </td>  </tr>
<tr><td>Membership Status</td>    <td>". ($_SESSION["user"]["membership_status"] ?? '') ."    </td>  </tr>
-->



</table>


 </fieldset>






<br><br><br><br><br><br><br></p>";
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>