<?
include'config.php';
$title="Password Recovery";
include("$CONFIG->templatedir/header.php");
$user=$_POST["username"];
if(!isset($user)){
$page_content=
"<div class=text align=center>
<form action=$CONFIG->siteurl/forgot_password.php method=post>
<fieldset class=text><br><br>
<legend>Please enter your username</legend>
<input type=text class=input name=username>
<br><br>
<input type=submit value=\"Send my password\" class=button>

</fieldset><br><br><br><br><br><br>
</form>
</div>";
}
else{
$quer=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where username='$user'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

$num=db_num_rows($quer);
if($num<1){$page_content="<div align=center class=text> Username <b>$user </b> was not found on our database.</div>
<br><br><br><br><br>";}
else{
$query=db_fetch_array($quer);
$subject="$CONFIG->sitename Password";
$message="
Dear ".$query["firstname"]." ".$query["lastname"].",
Your account password is :".$query["password"]."
Thank you for using our site.
Sincerely,
Admin
$CONFIG->sitename
";
mail($query["email"], $subject, $message, "From: $CONFIG->sitename <$CONFIG->support>\nX-Mailer: PHP/" . phpversion());

{$page_content="<div align=center class=text> Your password has been sent to your email address.</div>
<br><br><br><br><br>";}}
}

include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>
