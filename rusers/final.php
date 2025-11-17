<?
include'../config.php';
$title="$CONFIG->sitename join form";
include("$CONFIG->templatedir/header.php");
$paygat="You have to enter at least one of our supported payment gateways: ";


//////////////////////////////////////////////////

/*


// -----  24 april 2018




if(   isset($_POST['txn_id']) && $_POST['txn_id'] !=null  ){

$satya=mysql_query("select * from users where id='1'");
$rss = mysql_fetch_array($satya);


$to =$rss["paypal"];
$to_sponsor =$_SESSION["sponsor"]["paypal"];

$subject = "TRANSACTION VERIFICATION";
$subject_sponsor = $_SESSION["sponsor"]["firstname"];
$subject_sponsor .=", Did You Receive A Payment From This Buyer?";


$message = "
<html>
<head>
<title>EMAIL TO ADMIN</title>
</head>
<body>

Hi Admin,<br>
Below are the details of a recent payment you received.
<br>
<table border='1'>";

  
 $message .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message .=$_POST['first_name']; $message .="</td></tr>";
 $message .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message .=$_POST['last_name'];$message .="</td></tr>";
  $message .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message .=$_POST['payer_email'];$message .="</td></tr>";
   $message .= "<tr><td>TRANSACTION ID:</td><td>";$message .=$_POST['txn_id'];$message .="</td></tr>";
    $message .= "<tr><td>PAYEMENT STATUS:</td><td>";$message .=$_POST['payment_status'];$message .="</td></tr>";
     $message .= "<tr><td>SPONSOR USERNAME:</td><td>";$message .=$_SESSION["sponsor"]["username"];$message .="</td></tr>";
      $message .= "<tr><td>SPONSOR EMAIL ADDRESS:</td><td>";$message .=$_SESSION["sponsor"]["paypal"];$message .="</td></tr>";


$message .="</table>

Regards,<br>
System Admin

</body>
</html>
";


$message_sponsor = "
<html>
<head>
<title>EMAIL TO SPONSOR</title>
</head>
<body>

Hi ";$message_sponsor .= $_SESSION["sponsor"]["first_name"]; $message_sponsor .= ",<br>
Admin here.  We just receive our admin payment from the buyer below and would like to know if you receive your
sponsor payment from this Buyer.  Please respond to this email with a Yes or No.  If your answer is
No, then we will investigate and let you know what happened.  Below are the buyer's details:

<br>
<table border='1'>";

 $message_sponsor .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message_sponsor .=$_SESSION["sponsor"]["firstname"]; $message_sponsor .="</td></tr>";
 $message_sponsor .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message_sponsor .=$_SESSION["sponsor"]["lastname"];$message_sponsor .="</td></tr>";
  $message_sponsor .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message_sponsor .=$_POST['payer_email'];
  $message_sponsor .="</td></tr>";
  

$message .="</table>

Sincerely,<br>

Admin

EZ-MoneyMaker.com


</body>
</html>
";


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <satyajeet.kesharia@gmail.com>' . "\r\n";
$headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";


mail($to,$subject,$message,$headers);

mail($to_sponsor,$subject_sponsor,$message_sponsor,$headers);
}



// -----  24 april 2018



if(          isset($_SESSION["sponsor_satt"]["mail"]) && $_SESSION["sponsor_satt"]["mail"] != null        )
   {
$to =$_SESSION["sponsor"]["paypal"];
$to_sponsor =$_SESSION["sponsor_satt"]["paypal"];

$subject = "TRANSACTION VERIFICATION";

$subject_sponsor = $_SESSION["sponsor_satt"]["first_name"].", Did You Receive A Payment From This Buyer?";

$message = "
<html>
<head>
<title>EMAIL TO ADMIN</title>
</head>
<body>

Hi Admin,<br>
Below are the details of a recent payment you received.
<br>
<table border='1'>";

 $message .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message .=$_SESSION["sponsor_satt"]["mail"]["first_name"]; $message .="</td></tr>";
 $message .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message .=$_SESSION["sponsor_satt"]["mail"]["last_name"];$message .="</td></tr>";
  $message .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message .=$_SESSION["sponsor_satt"]["mail"]["payer_email"];$message .="</td></tr>";
   $message .= "<tr><td>TRANSACTION ID:</td><td>";$message .=$_SESSION["sponsor_satt"]["mail"]["txn_id"];$message .="</td></tr>";
    $message .= "<tr><td>PAYEMENT STATUS:</td><td>";$message .=$_SESSION["sponsor_satt"]["mail"]["payment_status"];$message .="</td></tr>";
     $message .= "<tr><td>SPONSOR USERNAME:</td><td>";$message .=$_SESSION["sponsor"]["username"];$message .="</td></tr>";
      $message .= "<tr><td>SPONSOR EMAIL ADDRESS:</td><td>";$message .=$_SESSION["sponsor"]["paypal"];$message .="</td></tr>";



$message .="</table>

Regards,<br>
System Admin

</body>
</html>
";






$message_sponsor = "
<html>
<head>
<title>EMAIL TO SPONSOR</title>
</head>
<body>

Hi ,<br>
Admin here.  We just receive our admin payment from the buyer below and would like to know if you receive your
sponsor payment from this Buyer.  Please respond to this email with a Yes or No.  If your answer is
No, then we will investigate and let you know what happened.  Below are the buyer's details:

<br>
<table border='1'>";

 $message_sponsor .= "<tr><td>BUYER'S FIRST NAME:</td><td>"; $message_sponsor .=$_SESSION["sponsor_satt"]["mail"]["first_name"]; $message_sponsor .="</td></tr>";
 $message_sponsor .= "<tr><td>BUYER'S LAST NAME:</td><td>";$message_sponsor .=$_SESSION["sponsor_satt"]["mail"]["last_name"];$message_sponsor .="</td></tr>";
  $message_sponsor .= "<tr><td>BUYER'S EMAIL ADDRESS: </td><td>";$message_sponsor .=$_SESSION["sponsor_satt"]["mail"]["payer_email"];$message_sponsor .="</td></tr>";
  

$message .="</table>

Sincerely,<br>

Admin

EZ-MoneyMaker.com


</body>
</html>
";




// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <satyajeet.kesharia@gmail.com>' . "\r\n";
$headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);
mail($to_sponsor,$subject_sponsor,$message_sponsor,$headers);
   }
*/
//////////////////////////////////////////////////
 unset($_SESSION["sponsor_satt"]);  //satyajeet comment

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
          <td align=\"right\" class=text >solidtrustpay
            ID:</td>
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
$page_content=read_template("$CONFIG->templatedir/signup.php");
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

$page_content=str_replace("%firstname%",$_SESSION["user"]["firstname"],$page_content);



include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>
