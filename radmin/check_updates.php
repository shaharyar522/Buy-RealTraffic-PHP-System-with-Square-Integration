<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename .TheRandomizer Update Checker";
?>


  	

<?
include("$CONFIG->templatedir/header.php");
$page_content="<div id=heading align=center>
<strong>TheRandomizer Update Checker</strong></div>
<br><img src=\"http://www.therandomizer.net/update_check.php?ver=2.0&domain=".urlencode($_SERVER["SERVER_NAME"])."\">";
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>


