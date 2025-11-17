<?
include'config.php';
$title="$CONFIG->sitename Privacy";
?>



<?

include("$CONFIG->templatedir/header.php");

{
$page_content=read_template("$CONFIG->templatedir/privacy.php");
}



include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>





