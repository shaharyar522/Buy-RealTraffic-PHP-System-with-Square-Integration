<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Login Sites";
include("$CONFIG->templatedir/header.php");
//include("$CONFIG->templatedir/user_function_inc.php");
//include("$CONFIG->templatedir/main_function.php");




include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>