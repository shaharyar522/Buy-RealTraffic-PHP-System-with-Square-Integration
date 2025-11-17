<?

include'config.php';
$title="$CONFIG->sitename Login ";


?>






<?
include("$CONFIG->templatedir/header.php");
$frm=$_POST;;
if(!$frm){
$page_content="
<table width=70%  border=0 align=\"center\" cellpadding=\"0\" cellspacing=\"0\"
	 bgcolor=#d8ecff class=shadowed>
  <tr>
    <td align=\"center\"><br><br><table width=\"70%\" border=\"0\" cellspacing=\"2\" cellpadding=\"0\" align=center>
                      <tr valign=\"top\">
                      <td>
                        <form name=\"form1\" method=\"post\" action=\"login.php\">
                          <table width=100% border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >
                            <tr>
                              <td>
                                <table width=100% border=\"0\" cellspacing=\"0\" cellpadding=\"3\" class=\"text\" >
                                  <tr id=heading>
                                    <td colspan=4 align=center  class=text><h3>Member's Login</h3></td>
                                  </tr>
                                  <tr>
                                    <td align=\"right\" class=\"text_mic\">
                                      <div align=\"right\" class=text>Username:</div>
                                    </td>
                                    <td>
                                      <input type=\"text\" name=\"username\" size=\"10\" maxlength=\"30\" class=\"input\"
									  onblur=\"this.className='input'\"
           onfocus=\"this.className='input2';this.value=''\" value=\"Username\" style=\"width=120px\">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align=\"right\" class=\"text_mic\">
                                      <div align=\"right\" class=text>Password:</div>
                                    </td>
                                    <td class=\"barreclair\"><span class=\"barreclair\">
                                      <input type=\"password\" name=\"password\" size=\"10\" maxlength=\"30\" class=\"input\"
									   onblur=\"this.className='input'\"
           onfocus=\"this.className='input2';this.value=''\" value=\"mypassword\" style=\"width=120px\">
                                      </span></td>
                                  </tr>
                                  <tr>

<td></td>
                                    
                                    <td>
                                      <input type=\"submit\" name=\"Submit\" value=\"Login\" class=\"button\">
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </form><br>
                      </td>
                    </tr>
                  </table><div align=center><a class=link1 href=forgot_password.php>Forgot your password?</a><br><br><br></div></td>
                    </tr>
                  </table>";}
			if (match_referer() && isset($frm["username"])) {
				  $err=0;
		$msg = "<p class=text align=center>The following error(s) occured:<br><ul class=text>";

				  if(!$frm["username"])
				  {$err=1;
				  $msg.="<li>Please enter the username</li>";
				  }
				  if(!$frm["password"])
				  {$err=1;
				  $msg.="<li>Please enter the password</li>";
				  }

			$msg.="</ul><br><p class=text align=center>
Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";
if($err==1)$page_content=$msg;

}

function verify_login($username, $password) {
				$q= db_query("

	SELECT *
	FROM users
	WHERE username = '$username' AND password = '$password' and id>'1'
	");

	return db_fetch_array($q);}

IF($frm["username"]&&$frm["password"]){
$user = verify_login($frm["username"], $frm["password"]);
	if ($user) {
		$_SESSION["user"] = $user;
		$_SESSION["ip"] = $REMOTE_ADDR;

		db_query("update users set lastlogin=now(),last_ip='$REMOTE_ADDR' where username='$frm['username']'");
		$goto = empty($_SESSION["wantsurl"]) ? $CONFIG->siteurl."/rusers/memberarea.php" : $_SESSION["wantsurl"];
		redirect( $goto,"",0);
		die;

	} else {
		$page_content = "<br><br><br><p align=center class=text>Invalid login, please try <a href=\"javascript:history.back();\" class=link1>again</a><br><br><br><br><br><br><br></p>";
		$frm["username"] =$_POST["username"];
	}




}
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");?>
