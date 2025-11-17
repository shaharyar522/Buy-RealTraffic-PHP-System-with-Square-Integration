<?
include'../config.php';
$title="$CONFIG->sitename logout";
session_start();
unset($_SESSION["user"]);
session_destroy();
$_SESSION["user"]='';
$_SESSION = array();


include("$CONFIG->templatedir/header.php");
	$page_content = "





<table width=100% bgcolor=#d8ecff border=0 valign=top class=shadowed>
<tr><td>



<table align=\"center\" class=\"shadowed\" class=\"text\" width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">
<tr><td>

<br>
<center><h2>You Are Now Logged Out</h2></center>
<br> 

<p align=center class=text>You are now logged out from your $CONFIG->sitename member area.<br>Thank you for being a member of $CONFIG->sitename<br><br></p>



</td></tr></table>



</td></tr></table>





";
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>