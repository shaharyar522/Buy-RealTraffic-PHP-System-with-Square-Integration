<?
include'../config.php';
require_login();
$title="$CONFIG->sitename More weight";
include("$CONFIG->templatedir/header.php");
$cat=$_GET['cat'];
$h=db_query("insert into chances_temp(username,credits,status) values('".$_SESSION["user"]["username"]."'
,'$cat','unverified')");
$message="Hello admin!
".
$_SESSION["user"]["username"]."bought $cat chances
Please verify and if it's correct,make the changes from your admin area.
Best regards,
Your Randomizer script:-)";
@mail($CONFIG->support,$_SESSION["user"]["username"]."bought $cat",$message, "From: $CONFIG->sitename <$CONFIG->support>\nX-Mailer: PHP/" . phpversion());
redirect("confirmation.php","",0);
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>