<?
include'../config.php';
require_login();
$title="$CONFIG->sitename .Your statistics";
include("$CONFIG->templatedir/header.php");
$more=" and username='".$_SESSION["user"]["username"]."'";
$unde=" where username='".$_SESSION["user"]["username"]."'";
$where= "where username='".$_SESSION["user"]["username"]."'";
$page_content="<div align=left class=text><br>






<h3 align=center>Your Referral URL Stats</h3>
<br>


<table align=\"center\" class=\"shadowed\" class=text width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">
<tr><td >

<br><br>

<table align=\"center\" class=\"shadowed\" class=text width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">

<tr><td width=510>

<strong>Overall Visitors To Your Referral Url:</strong>

<ul class=text>";
$doi=db_query("SELECT count(distinct ip) as cnt FROM hits $where LIMIT 0 , 10 ");
while($row=db_fetch_array($doi)){$page_content.="
<li>Total hits :<b>".$row["cnt"]."</b></li>";}
$doi=db_query("SELECT count(distinct ip) as cnt FROM hits where date>=date_sub(current_date,interval 1 day) $more LIMIT 0 , 10 ");
while($row=db_fetch_array($doi)){$page_content.="
<li>Hits today :<b>".$row["cnt"]."</b></li>";}
$doi=db_query("SELECT count(distinct ip) as cnt FROM hits where date >date_sub(current_date,interval 7 day) $more LIMIT 0 , 10 ");
while($row=db_fetch_array($doi)){$page_content.="
<li>Hits this week :<b>".$row["cnt"]."</b></li>";}
$doi=db_query("SELECT count(distinct ip) as cnt FROM hits where  date>date_sub(current_date,interval 1 month) $more LIMIT 0 , 10 ");
while($row=db_fetch_array($doi)){$page_content.="
<li>Hits this month :<b>".$row["cnt"]."</b></li>";}
$page_content.="</ul>


</td></tr></table> <br><br></td></tr></table>


<br><br>






<table align=\"center\" class=\"shadowed\" class=text width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">
<tr><td>

<br><br>
<table align=\"center\" class=\"shadowed\" class=text width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">

<tr><td>

<strong>Last 100 Visitors To Your Referral Url Based on IP Address:</strong>

<ul class=text>";
$doi=db_query("SELECT distinct(ip),date_format(date,'%e %b %Y, %k:%i:%s') as data,refer
FROM hits $where
GROUP BY ip 
ORDER BY date DESC 
LIMIT 0 , 100 ");
while($row=db_fetch_array($doi)){
$page_content.="
<li>Visitor From IP Address:  ".$row["ip"]." on ".$row["data"]."</li>";}
$page_content.="</ul>


</td></tr></table><br><br> </td></tr></table>


<br>








<br>




</div>";
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>