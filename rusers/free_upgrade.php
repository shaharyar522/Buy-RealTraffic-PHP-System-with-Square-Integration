<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Free Upgrade";
include("$CONFIG->templatedir/header.php");





$page_content=read_template("$CONFIG->templatedir/free_upgrade.php");


$page_content=str_replace("%firstname%",$_SESSION["user"]["firstname"],$page_content);



include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>