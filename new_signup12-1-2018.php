<?
include'config.php';
$title="$CONFIG->sitename join form";
include("$CONFIG->templatedir/header.php");
$paygat="You have to enter at least one of our supported payment gateways: ";


if($CONFIG->allowpaypal){$payp="  <tr>
          <td align=\"right\" class=text >PayPal Email Address:</td>
          <td align=\"left\" class=text >
		 <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\"paypal\" type=\"text\" id=\"paypal\">
		  </td>
        </tr> ";}
		if($CONFIG->allowstormpay){$stormp=" <tr>
          <td align=\"right\" class=text >Alertpay Email ID:</td>
          <td align=\"left\" class=text >
		  <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\"stormpay\" type=\"text\" id=\"stormpay\">
		  </td>
        </tr> ";}
if($CONFIG->allowegold){$egol="<tr>
          <td align=\"right\" class=text >Egold ID:</td>
          <td align=\"left\" class=text >
		   <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\" class=input  name=\"egold\" type=\"text\" id=\"egold\">
		  </td>
        </tr> ";}
if($CONFIG->allowlibertyreserve){$intg="<tr>
          <td align=\"right\" class=text >libertyreserve
           ID:</td>
          <td align=\"left\" class=text >
		  <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\"libertyreserve\" type=\"text\" id=\"libertyreserve\">
		  </td>
        </tr> ";}
if($CONFIG->allowassuredpay){$assuredp=" <tr>
          <td align=\"right\" class=text >AssuredPay
            ID:</td>
          <td align=\"left\" class=text >
		   <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\"assuredpay\" type=\"text\" id=\"assuredpay\">
		  </td>
        </tr>";}
		if($CONFIG->allowsolidtrustpay){$solarp=" <tr>
          <td align=\"right\" class=text >Your SolidTrustPay Username:</td>
          <td align=\"left\" class=text >
		   <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\solidtrustpay\" type=\"text\" id=\"solidtrustpay\">
		  </td>
        </tr>";}
		if($CONFIG->allowfleetpay){$fleetp=" <tr>
          <td align=\"right\" class=text >Fleetpay
            ID:</td>
          <td align=\"left\" class=text >
		   <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\fleetpay\" type=\"text\" id=\"fleetpay\">
		  </td>
        </tr>";}
		if($CONFIG->allowdollardeliverys){$dollardeliverys=" <tr>
          <td align=\"right\" class=text >Fleetpay
            ID:</td>
          <td align=\"left\" class=text >
		   <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\dollardeliverys\" type=\"text\" id=\"dollardeliverys\">
		  </td>
        </tr>";}
		if($CONFIG->allowmoneybookers){$moneybookers=" <tr>
          <td align=\"right\" class=text >Fleetpay
            ID:</td>
          <td align=\"left\" class=text >
		   <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\moneybookers\" type=\"text\" id=\"moneybookers\">
		  </td>
        </tr>";}
        
$page_content=read_template("$CONFIG->templatedir/signup_n.php");

		if(  isset($_SESSION["sponsor"]["username"])  && $_SESSION["sponsor"]["username"]!=null  )
		 {
		     // $aadmin_satt = 'wespac59';
		        $aadmin_satt = $_SESSION["sponsor"]["username"];
		 } else {  $aadmin_satt = "wespac59"; }
		
$page_content=str_replace("satyajeet",$aadmin_satt,$page_content);

$page_content=str_replace("#paygat#",$paygat,$page_content);
$page_content=str_replace("#payp#",$payp,$page_content);
$page_content=str_replace("#stormp#",$stormp,$page_content);
$page_content=str_replace("#intg#",$intg,$page_content);
$page_content=str_replace("#assuredp#",$assuredp,$page_content);
$page_content=str_replace("#egol#",$egol,$page_content);
$page_content=str_replace("#solarp#",$solarp,$page_content);
$page_content=str_replace("#fleetp#",$fleetp,$page_content);
$page_content=str_replace("#dollardeliverys#",$dollardeliverys,$page_content);
$page_content=str_replace("#moneybookers#",$moneybookers,$page_content);
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>


