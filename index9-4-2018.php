<?
include'config.php';
$title="Welcome to $CONFIG->sitename";
include("$CONFIG->templatedir/header.php");
$page_content=grab_content("indexp");
$page_content=html_entity_decode(stripslashes($page_content));
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>
