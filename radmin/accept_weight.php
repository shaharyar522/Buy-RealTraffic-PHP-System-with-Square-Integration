<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Weight";
include("$CONFIG->templatedir/header.php");
$weight=$_GET['credits'];
$user=$_GET['username'];
$id=$_GET['id'];
$test=db_fetch_row(db_query("select * from chances_temp where id='$id' and status='unverified'"));
$tested=$test[0];
$us=$test[1];
if($tested>=1){
$nrb=db_fetch_row(db_query("select * from chances where username='$us'"),true);
$nr=$nrb[0];
$nri=$nrb[3];
$nrf=$nri+$weight;
db_query("update chances set finish=".$nrf."  where id='$nr'");
db_query("update chances set start=start+$weight,finish=finish+$weight where id>'$nr'");
$q2=db_query("update users set weight=weight+$weight where username='$user'");
$q3=db_query("update chances_temp set status='accepted' where id='$id'");
$page_content="<div align=center class=text>User's <strong>$user</strong> weight has been updated.<br><br><br></div>";
}
else{
$page_content="<div align=center class=text>User's <strong>$user</strong> weight has already  been updated.<br><br><br></div>";
}
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>
