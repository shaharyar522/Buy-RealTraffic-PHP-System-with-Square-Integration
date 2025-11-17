<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Account details";
include("$CONFIG->templatedir/header.php");
$frm=$_POST;
if(!$frm){
$fill=db_fetch_array(db_query("select * from users where username='".$_SESSION["user"]["username"]."'"));
$page_content=read_template("$CONFIG->templatedir/details.php");
if($CONFIG->allowpaypal){$payp="  <tr>
          <td align=\"right\" class=text >PayPal Email Address:</td>
          <td align=\"left\" class=text >
		  <input class=input  name=\"paypal\" type=\"text\" id=\"paypal\" value=\"".$fill["paypal"]."\">
		  </td>
        </tr> ";}
		if($CONFIG->allowstormpay){$stormp=" <tr>
          <td align=\"right\" class=text >AlertPay
            address:</td>
          <td align=\"left\" class=text >
		  <input class=input  name=\"stormpay\" type=\"text\" id=\"stormpay\" value=\"".$fill["stormpay"]."\">
		  </td>
        </tr> ";}
if($CONFIG->allowegold){$egol="<tr>
          <td align=\"right\" class=text >Egold ID:</td>
          <td align=\"left\" class=text >
		  <input class=input  name=\"egold\" type=\"text\" id=\"egold\" value=\"".$fill["egold"]."\">
		  </td>
        </tr> ";}
if($CONFIG->allowlibertyreserve){$intg="<tr>
          <td align=\"right\" class=text >libertyreserve
           ID:</td>
          <td align=\"left\" class=text >
		  <input class=input  name=\"libertyreserve\" type=\"text\" id=\"libertyreserve\" value=\"".$fill["libertyreserve"]."\">
		  </td>
        </tr> ";}
if($CONFIG->allowassuredpay){$assuredp=" <tr>
          <td align=\"right\" class=text >Not Used
            ID:</td>
          <td align=\"left\" class=text >
		  <input class=input  name=\"assuredpay\" type=\"text\" id=\"assuredpay\" value=\"".$fill["assuredpay"]."\">
		  </td>
        </tr>";}
		if($CONFIG->allowsolidtrustpay){$solarp=" <tr>
          <td align=\"right\" class=text >Your SolidTrustPay Username:</td>
          <td align=\"left\" class=text >
		   <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\"solidtrustpay\" type=\"text\" id=\"solidtrustpay\" value=\"".$fill["solidtrustpay"]."\">
		  <br>Leave Blank if You Do Not Have One</td>
        </tr>";}
		if($CONFIG->allowfleetpay){$fleetp=" <tr>
          <td align=\"right\" class=text >Not Used
            ID:</td>
          <td align=\"left\" class=text >
		   <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\"fleetpay\" type=\"text\" id=\"fleetpay\" value=\"".$fill["fleetpay"]."\">
		  </td>
        </tr>";}
		if($CONFIG->allowdollardeliverys){$dollardeliverys=" <tr>
          <td align=\"right\" class=text >Not Used
            ID:</td>
          <td align=\"left\" class=text >
		   <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\"dollardeliverys\" type=\"text\" id=\"dollardeliverys\" value=\"".$fill["dollardeliverys"]."\">
		  </td>
        </tr>";}
		if($CONFIG->allowmoneybookers){$moneybookers=" <tr>
          <td align=\"right\" class=text >Moneybookers
            ID:</td>
          <td align=\"left\" class=text >
		   <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\"moneybookers\" type=\"text\" id=\"moneybookers\" value=\"".$fill["moneybookers"]."\">
		  </td>
        </tr>";}
$page_content=str_replace("#darker#",$CONFIG->darkercolor ?? '',$page_content);
$page_content=str_replace("#username#",$fill["username"],$page_content);

$page_content=str_replace("#membership_status#",$fill["membership_status"],$page_content);

$page_content=str_replace("#cb_nickname#",$fill["cb_nickname"],$page_content);
$page_content=str_replace("#cb_page_status#",$fill["cb_page_status"],$page_content);
$page_content=str_replace("#cb_page_hits#",$fill["cb_page_hits"],$page_content);
$page_content=str_replace("#venmo_username#",$fill["venmo_username"],$page_content);


$page_content=str_replace("#password#",$fill["password"],$page_content);
$page_content=str_replace("#email#",$fill["email"],$page_content);
$page_content=str_replace("#firstname#",$fill["firstname"],$page_content);
$page_content=str_replace("#lastname#",$fill["lastname"],$page_content);
$page_content=str_replace("#stormpay#",$fill["stormpay"],$page_content);
$page_content=str_replace("#paypal#",$fill["paypal"],$page_content);
$page_content=str_replace("#egold#",$fill["egold"],$page_content);
$page_content=str_replace("#libertyreserve#",$fill["libertyreserve"],$page_content);
$page_content=str_replace("#light#",$CONFIG->lightcolor,$page_content);
$page_content=str_replace("#paygat#",$paygat ?? '',$page_content);
$page_content=str_replace("#payp#",$payp ?? '',$page_content);
$page_content=str_replace("#stormp#",$stormp ?? '',$page_content);
$page_content=str_replace("#intg#",$intg ?? '',$page_content);
$page_content=str_replace("#assuredp#",$assuredp ?? '',$page_content);
$page_content=str_replace("#egol#",$egol ?? '',$page_content);
$page_content=str_replace("#solarp#",$solarp ?? '',$page_content);
$page_content=str_replace("#fleetp#",$fleetp ?? '',$page_content);
$page_content=str_replace("#dollardeliverys#",$dollardeliverys ?? '',$page_content);
$page_content=str_replace("#moneybookers#",$moneybookers ?? '',$page_content);

}
else{
$err=0;

	$msg = "<p class=text align=center>The following error(s) occured:<br><ul class=text>";


if (empty($frm["venmo_username"])) {
		$err=1;
		$msg .= "<li>Please Enter Your Venmo Username.  Your Referrals Will Use This Username To Pay You Your Sponsor Fee.</li>";

	}



	if (empty($frm["username"])) {
		$err=1;
		$msg .= "<li>You did not specify a username</li>";

	}
	if ((strlen($frm["username"])<3)||(strlen($frm["username"])>15)){
		$err=1;
		$msg .= "<li>The username must have minimum 3 characters and maximum 15</li>";

	} if (empty($frm["password"])) {
		$err=1;
		$msg .= "<li>You did not specify a password</li>";

	} if (empty($frm["firstname"])) {
		$err=1;
		$msg .= "<li>You did not specify your firstname</li>";

	} if (empty($frm["lastname"])) {
	$err=1;
		$msg .= "<li>You did not specify your lastname</li>";

	}
	 	
	 if ((strlen($frm["password"])<5)||(strlen($frm["password"])>15)){
		$err=1;
		$msg .= "<li>The password must have minimum 5 characters and maximum 15</li>";

	}
$msg.="</ul>";


if($err==0){

	$paypal = $frm['paypal'] ?? '';
	$stormpay = $frm['stormpay'] ?? '';
	$egold = $frm['egold'] ?? '';
	$libertyreserve = $frm['libertyreserve'] ?? '';
	$assuredpay = $frm['assuredpay'] ?? '';
	$fleetpay = $frm['fleetpay'] ?? '';
	$dollardeliverys = $frm['dollardeliverys'] ?? '';
	$moneybookers = $frm['moneybookers'] ?? '';


	$query = db_query("update users set firstname='{$frm['firstname']}',lastname='{$frm['lastname']}',
 cb_nickname= '{$frm['cb_nickname']}' ,
 cb_page_status= '{$frm['cb_page_status']}' ,
 cb_page_hits= '{$frm['cb_page_hits']}' , venmo_username= '{$frm['venmo_username']}' ,
	email='{$frm['email']}',paypal='{$paypal}',stormpay='{$stormpay}',
	egold='{$egold}',libertyreserve='{$libertyreserve}',assuredpay='{$assuredpay}'
	 ,solidtrustpay='{$frm['solidtrustpay']}',fleetpay='{$fleetpay}',dollardeliverys='{$dollardeliverys}',
moneybookers='{$moneybookers}',password='{$frm['password']}' where username='".$_SESSION["user"]["username"]."'");
$page_content="<br><p class=text align=center>Your details have been succesfully updated.<br>
<br><br><br><br><br>";
}
if($err==1){$page_content=$msg."<br><p class=text align=center>
Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";}
}
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>