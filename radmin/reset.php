<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Account details";
?>




  	

<?
include("$CONFIG->templatedir/header.php");
$s=db_fetch_array(db_query("select count(*) from hits"));
$d=db_query("TRUNCATE TABLE `hits`");
$page_content="<div class=text align=center><br><br>Hits are now reset.".$s[0]." entries deleted.<br><br></div>";
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>


