<?
include'../config.php';
$title="$CONFIG->sitename join form";
include("$CONFIG->templatedir/header.php");
$paygat="You have to enter at least one of our supported payment gateways: ";
if($CONFIG->allowpaypal){$payp="  <tr> 
          <td align=\"right\" class=text >Paypal 
            address:</td>
          <td align=\"left\" class=text >
		 <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\"paypal\" type=\"text\" id=\"paypal\">
		  </td>
        </tr> ";}
		if($CONFIG->allowstormpay){$stormp=" <tr> 
          <td align=\"right\" class=text >StormPay 
            address:</td>
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
            address:</td>
          <td align=\"left\" class=text >
		   <input onblur=\"this.className='input'\"  onfocus=\"this.className='input2';\"  class=input  name=\"assuredpay\" type=\"text\" id=\"assuredpay\">
		  </td>
        </tr>";}
$page_content=read_template("$CONFIG->templatedir/signup.php");
$page_content=str_replace("#paygat#",$paygat,$page_content);
$page_content=str_replace("#payp#",$payp,$page_content);
$page_content=str_replace("#stormp#",$stormp,$page_content);
$page_content=str_replace("#intg#",$intg,$page_content);
$page_content=str_replace("#assuredp#",$assuredp,$page_content);
$page_content=str_replace("#egol#",$egol,$page_content);




include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>
