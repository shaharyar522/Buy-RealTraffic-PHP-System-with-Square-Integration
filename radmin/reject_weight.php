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
if($tested>=1){
$q3=db_query("update chances_temp set status='rejected' where id='$id'");
$page_content="<div align=center class=text>User's <strong>$user</strong> weight increase request has been rejected.<br><br><br></div>";
}
else{
$page_content="<div align=center class=text>User's <strong>$user</strong> weight has already  been rejected .<br><br><br></div>";
}
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>
