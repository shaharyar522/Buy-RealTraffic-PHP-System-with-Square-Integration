<?
include '../config.php';
session_register("ADMIN");
$title="$CONFIG->sitename ADMIN Login ";
?>



  	


<? 
include("$CONFIG->templatedir/header.php");
//include("/home1/myguaran/public_html/ezmoneymaker/templates/header.php");
if(isset($_SESSION['ADMIN']) && !empty($_SESSION['ADMIN']["admin"])){return redirect($CONFIG->siteurl."/radmin/adminarea.php","",0);}
$frm=$_POST;
if(empty($frm)){
$page_content="
<table width=100%  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" 
	 bgcolor=white>
  <tr>
    <td ><br><br><table width=\"30%\" border=\"0\" cellspacing=\"2\" cellpadding=\"0\" align=center>
                      <tr valign=\"top\"> 
                      <td> 
                        <form name=\"form1\" method=\"post\" action=\"$CONFIG->siteurl/radmin/index.php\">
                          <table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" >
                            <tr> 
                              <td> 
                                <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" class=\"text\" bgcolor=\"$CONFIG->lightcolor\">
                                  <tr id=heading> 
                                    <td colspan=\"2\" align=center  class=text><strong>ADMIN Login</strong></td>
                                  </tr>
                                  <tr> 
                                    <td align=\"right\" class=\"text_mic\"> 
                                      <div align=\"right\" class=text>Username:</div>
                                    </td>
                                    <td> 
                                      <input type=\"text\" name=\"username\" size=\"10\" maxlength=\"30\" class=\"input\">
                                    </td>
                                  </tr>
                                  <tr> 
                                    <td align=\"right\" class=\"text_mic\"> 
                                      <div align=\"right\" class=text>Password:</div>
                                    </td>
                                    <td class=\"barreclair\"><span class=\"barreclair\"> 
                                      <input type=\"password\" name=\"password\" size=\"10\" maxlength=\"30\" class=\"input\">
                                      </span></td>
                                  </tr>
                                  <tr> 
                                    <td></td>
                                    <td align=\"center\"> 
                                      <input type=\"submit\" name=\"Submit\" value=\"Login\" class=\"button\">
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </form>
                      </td>
                    </tr>
                  </table><div align=center><a class=link1 href=/forgot_password.php>Forgot your password?</a><br><br></div></td>
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
	SELECT username, firstname, lastname, email, lastlogin,last_ip
	FROM users
	WHERE username = '$username' AND password = '$password' and id='1'
	");

	return db_fetch_array($q);}
	
if(isset($frm["username"]) && isset($frm["password"])){
$user = verify_login($frm["username"], $frm["password"]);
	if ($user) {
		$_SESSION['ADMIN']["admin"] = $user;
		$_SESSION['ADMIN']["ip"] = $REMOTE_ADDR;		

		db_query("update users set lastlogin=now(),last_ip='{$REMOTE_ADDR}' where username='{$frm['username']}'");
		$goto =  $CONFIG->siteurl."/radmin/adminarea.php" ;
		redirect( $goto,"",0);
		die;

	} else {
		$page_content = "<br><br><br><p align=center class=text>Invalid login, please try <a href=\"javascript:history.back();\" class=link1>again</a><br><br><br><br><br><br><br></p>";
		$frm["username"] =$_POST["username"];
	}
}
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");?>





     