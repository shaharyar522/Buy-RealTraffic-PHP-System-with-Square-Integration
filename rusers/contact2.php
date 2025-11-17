<?
include'../config.php';
$title="$CONFIG->sitename Contact2";
?>



<?

include("$CONFIG->templatedir/header.php");
$frm = $_POST;
if(!$frm){
$page_content=read_template("$CONFIG->templatedir/contact2.php");
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

	
$page_content= "<p class=text align=center><br> <b><font color=#008000 size=4>Thank you!  Your message has been sent.  We will reply within 24 hours!</font></b><br> ";
//send mail
	


//	mail($CONFIG->support, $frm["subject"], $frm["message"], "From: $CONFIG->sitename Contact Form <".$frm["email"].">\nX-Mailer: PHP/" . phpversion());


$new_sub=stripslashes($frm["subject"]);
$new_msq = stripslashes($frm["message"]);
mail($CONFIG->support, $new_sub, $new_msq, "From: $CONFIG->sitename Contact Form <".$frm["email"].">\nX-Mailer: PHP/" . phpversion());


/*
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: '.$CONFIG->sitename.' <'.$CONFIG->support.'>' . "\r\n";
        $headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";

$new_msq = stripslashes($frm["message"]);
mail($CONFIG->support, $frm["subject"], $new_msq, $headers);
*/




}
else{$page_content=$msg."<br><p class=text align=center>
Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";}
}


include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>





