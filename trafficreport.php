<?
include'config.php';
$title="$CONFIG->sitename Trafficreport";
?>



<?

include("$CONFIG->templatedir/header.php");

{
$page_content=read_template("$CONFIG->templatedir/trafficreport.php");
}



include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>





