<?
include'config.php';
$title="$CONFIG->sitename Contact";
include("$CONFIG->templatedir/header.php");
$frm = $_POST;
if(!$frm){
$page_content=read_template("$CONFIG->templatedir/contact.php");
}
else{
$err=0;
	
	$msg = "<p class=text align=center>The following error(s) occured:<br><ul class=text>";

	if (empty($frm["name"])) {
		$err=1;
		$msg .= "<li>You did not specify a name</li>";

	} 
	
	
	if (!validate_email($frm["email"])) {
$err=1;
		$msg .= "<li>The email address that you entered is not valid </li>";

	} if (empty($frm["subject"])) {
		$err=1;
		$msg .= "<li>You did not specify a subject</li>";

	} 
	
	if (empty($frm["message"])) {
		$err=1;
		$msg .= "<li>The message is too short.</li>";

	} 

$msg.="</ul>";
	

if($err==0){

	
$page_content= "<p class=text align=center><br> Thank you!Your message has been sent!<br> ";
//send mail
	
		mail($CONFIG->support, $frm["subject"], $frm["message"], "From: $CONFIG->sitename Contact Form <".$frm["email"].">\nX-Mailer: PHP/" . phpversion());

}
else{$page_content=$msg."<br><p class=text align=center>
Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";}
}


include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>
