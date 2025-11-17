<?
include'../config.php';
$title="$CONFIG->sitename logout";
?>



  	

<?
unset($_SESSION['ADMIN']["admin"]);
include("$CONFIG->templatedir/header.php");
	$page_content = "<br><br><br><p align=center class=text>You are now logged out from $CONFIG->sitename admin area.<br><br><br><br><br><br><br><br></p>";
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>



