<?
$continut="<ul class=micutz align=left>";
$doi=db_query("SELECT count(*) as count
FROM users where id<>'1'
LIMIT 0 , 1 ");
while($row=db_fetch_array($doi)){
$continut.="
<li>Total users: <b>".$row["count"]."</b></li>";}
$doi=db_query("SELECT count(distinct ip) as cnt , count(*) as cn FROM hits where date>=date_sub(current_date,interval 1 day) LIMIT 0 , 10 ");
while($row=db_fetch_array($doi)){$continut.="
<li>Hits today : <b>".$row["cn"]." (".$row["cnt"].")</b></li>";}
$doi=db_query("SELECT count(distinct ip) as cnt , count(*) as cn FROM hits where date >date_sub(current_date,interval 7 day) LIMIT 0 , 10 ");
while($row=db_fetch_array($doi)){$continut.="
<li>Hits this week : <b>".$row["cn"]." (".$row["cnt"].")</b></li>";}
$doi=db_query("SELECT count(distinct ip) as cnt , count(*) as cn  FROM hits where  date>date_sub(current_date,interval 1 month) LIMIT 0 , 10 ");
while($row=db_fetch_array($doi)){$continut.="
<li>Hits this month : <b>".$row["cn"]." (".$row["cnt"].")</b></li>";}
$doi=db_query("SELECT count(sponsor) as count,sponsor 
FROM users where id<>'1'
GROUP BY sponsor 
ORDER BY count DESC 
LIMIT 0 , 1 ");
while($row=db_fetch_array($doi)){
$continut.="
<li>Best sponsor-<br><b>".$row["sponsor"]."</b>:   (".$row["count"]." signups.)</li>";}
echo"$continut";
?>