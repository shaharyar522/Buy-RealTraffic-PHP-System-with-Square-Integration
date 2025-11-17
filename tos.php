<?
include'config.php';
$title="$CONFIG->sitename TOS";
?>



<?

include("$CONFIG->templatedir/header.php");

{
$page_content=read_template("$CONFIG->templatedir/tos.php");
}



include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>





