<?
include'config.php';
$title="$CONFIG->sitename Faq";
?>



<?

include("$CONFIG->templatedir/header.php");

{
$page_content=read_template("$CONFIG->templatedir/faq.php");
}



include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>






   