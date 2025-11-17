<?
include'config.php';
$title="Frequently Asked Questions";
include("$CONFIG->templatedir/header.php");
$page_content=grab_content("faq");
$page_content=html_entity_decode(stripslashes($page_content));
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>
