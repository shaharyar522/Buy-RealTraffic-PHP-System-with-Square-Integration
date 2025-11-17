<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename merchants list  Info";

include("$CONFIG->templatedir/header.php");

$page_content="<div class=text id=heading  align=center><h3>Your merchants list </h3></div>";



include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>
