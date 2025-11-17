<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename .Your statistics";
?>





  	

<?
include("$CONFIG->templatedir/header.php");
$page_content="<div align=left class=text><br>





<fieldset><legend>
<strong>Best 10 users -based on signups </strong>
</legend>
<ul class=text>";
$doi=db_query("SELECT count(sponsor) as count,sponsor 
FROM users 
GROUP BY sponsor 
ORDER BY count DESC limit 0,10
 ");
while($row=db_fetch_array($doi)){
$page_content.="
<li>".$row["sponsor"].":  <b> ".$row["count"]."</b> signups.</li>";}
$page_content.="</ul>
</fieldset>








<br><br>
<fieldset><legend>
<strong>Best 10 users- based on hits</strong>
</legend>
<ul class=text>";
$doi=db_query("SELECT count(*) as count,username 
FROM hits where refer <> ''
GROUP BY username 
ORDER BY count DESC limit 0,10
");
while($row=db_fetch_array($doi)){
$page_content.="
<li>".$row["username"].":  <b> ".$row["count"]."</b> hits</li>";}
$page_content.="</ul>
</fieldset>



<br><br>


<fieldset><legend>
<strong>Overall details:</strong>
</legend>
<ul class=text>";
$doi=db_query("SELECT count(distinct ip) as cnt , count(*) as cn FROM hits  ");
while($row=db_fetch_array($doi)){$page_content.="
<li>Total hits :<b>".$row["cn"]."</b> (Unique:<b>".$row["cnt"]."</b>)</li>";}
$doi=db_query("SELECT count(distinct ip) as cnt ,count(ip) as cn 
FROM hits where refer =''
GROUP BY refer
ORDER BY cnt DESC 
");
while($row=db_fetch_array($doi)){
$page_content.="
<li>Direct hits :<b>".$row["cn"]."</b> (Unique :<b>".$row["cnt"]."</b>)</li>";}
$doi=db_query("SELECT count(distinct ip) as cnt FROM hits where date>=date_sub(current_date,interval 1 day)  ");
while($row=db_fetch_array($doi)){$page_content.="
<li>Hits today :<b>".$row["cnt"]."</b></li>";}
$doi=db_query("SELECT count(distinct ip) as cnt FROM hits where date >date_sub(current_date,interval 7 day) ");
while($row=db_fetch_array($doi)){$page_content.="
<li>Hits this week :<b>".$row["cnt"]."</b></li>";}
$doi=db_query("SELECT count(distinct ip) as cnt FROM hits where  date>date_sub(current_date,interval 1 month) ");
while($row=db_fetch_array($doi)){$page_content.="
<li>Hits this month :<b>".$row["cnt"]."</b></li>";}
$page_content.="</ul>
</fieldset>






<br><br>
<fieldset><legend>
<strong>Best referrers :</strong>
</legend>
<ul class=text>";
$doi=db_query("SELECT count(refer) as cnt,refer
FROM hits where refer <> ''
GROUP BY refer
ORDER BY cnt DESC 
 ");
while($row=db_fetch_array($doi)){
$page_content.="
<li><a class=link1 href=\"".$row["refer"]."\" target=blank>".no_querystring($row["refer"])."</a> -".$row["cnt"]." hits </li>";}
$page_content.="</ul>
</fieldset>


<br><br>

</div>";
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>


