<?
include 'config.php';
$title="Join now to $CONFIG->sitename";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blue Wave Template</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="tooplate_style.css" rel="stylesheet" type="text/css" />
<!--   Free Website Template by t o o p l a t e . c o m   -->
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

</head>
<body>


<div id="tooplate_wrapper">

	<div id="tooplate_header">
    	
        <div id="tooplate_menu">
        	<ul>
                <li><a  href=<?=$CONFIG->siteurl?>/index.php>Home</a></li>
                <li><a href=<?=$CONFIG->siteurl?>/login.php>Login &nbsp;</a></li>
                <li><a href=<?=$CONFIG->siteurl?>/join_now.php>Join now</a></li>
                <li><a  href=<?=$CONFIG->siteurl?>/faq.php>FAQ</a></li>
                <li><a  href=<?=$CONFIG->siteurl?>/contact.php>Contact us</a></li>
            </ul>
            <div class="cleaner"></div>
        </div> <!-- end of menu -->
        
		<div id="site_title"><h1><a href="#">EZ-MoneyMaker.com</a><span>The Easiest Money You Will Ever Make</span></h1></div>
    
    </div> <!-- end of header -->





    
    <div id="tooplate_middle">  </div> <!-- end of middle -->
    



    <div id="tooplate_main">
                
        <div id="tooplate_content">
        
        	<div class="col_w880 home_intro">


            	<p> </p>
              

                <div class="cleaner"></div>
            </div>
        
     






  	

<?
include("$CONFIG->templatedir/header_locked.php");
$stage=$_GET['stage'];
switch($stage){
default:

$page_content="
<div align=center class=text>
<br>Your sponsor is :<font color=red>".$_SESSION["sponsor"]["firstname"]
."  ".$_SESSION["sponsor"]["lastname"]."</font>";
$page_content.="
<fieldset class=text><legend>".$_SESSION["sponsor"]["firstname"]
."  ".$_SESSION["sponsor"]["lastname"]." currently preferrs:</legend>
";
//include the payment forms



if(($CONFIG->allowpaypal)&&(validate_email($_SESSION["sponsor"]["paypal"]))){$page_content.=add_paypal($CONFIG->sponsorfee,$_SESSION["sponsor"]["paypal"],"1");}

if(($CONFIG->allowstormpay)&&(validate_email($_SESSION["sponsor"]["stormpay"]))){$page_content.=add_stormpay($CONFIG->sponsorfee,$_SESSION["sponsor"]["stormpay"],"1");}

if(($CONFIG->allowegold)&&(!empty($_SESSION["sponsor"]["egold"]))){$page_content.=add_egold($CONFIG->sponsorfee,$_SESSION["sponsor"]["egold"],"1");}

if(($CONFIG->allowlibertyreserve)&&(!empty($_SESSION["sponsor"]["libertyreserve"]))){$page_content.=add_libertyreserve($CONFIG->sponsorfee,$_SESSION["sponsor"]["libertyreserve"],"1");}

if(($CONFIG->allowassuredpay)&&(!empty($_SESSION["sponsor"]["assuredpay"]))){$page_content.=add_assuredpay($CONFIG->sponsorfee,$_SESSION["sponsor"]["assuredpay"],"1");}
if(($CONFIG->allowsolidtrustpay)&&(!empty($_SESSION["sponsor"]["solidtrustpay"]))){$page_content.=add_solidtrustpay($CONFIG->sponsorfee,$_SESSION["sponsor"]["solidtrustpay"],"1");}
if(($CONFIG->allowfleetpay)&&(!empty($_SESSION["sponsor"]["fleetpay"]))){$page_content.=add_fleetpay($CONFIG->sponsorfee,$_SESSION["sponsor"]["fleetpay"],"1");}
if(($CONFIG->allowdollardeliverys)&&(!empty($_SESSION["sponsor"]["dollardeliverys"]))){$page_content.=add_dollardeliverys($CONFIG->sponsorfee,$_SESSION["sponsor"]["dollardeliverys"],"1");}
if(($CONFIG->allowmoneybookers)&&(!empty($_SESSION["sponsor"]["moneybookers"]))){$page_content.=add_moneybookers($CONFIG->sponsorfee,$_SESSION["sponsor"]["moneybookers"],"1");}
$page_content.="</fieldset>";
Break;
case 'primu':
if(!$_SESSION["random"]["firstname"])
{session_register("random");
$_SESSION["random"]=generate_random();}
$page_content="
<div align=center class=text>
<b>First step succeded!<br>You are now on the second step.</b>
<br>Your random sponsor is :<font color=red>".$_SESSION["random"]["firstname"]
."  ".$_SESSION["random"]["lastname"]."</font>";
$page_content.="
<fieldset class=text><legend>".$_SESSION["random"]["firstname"]
."  ".$_SESSION["random"]["lastname"]." currently preferrs:</legend>
";
//include the payment forms

if(($CONFIG->allowpaypal)&&(validate_email($_SESSION["random"]["paypal"]))){$page_content.=add_paypal($CONFIG->randomfee,$_SESSION["random"]["paypal"],"2");}

if(($CONFIG->allowstormpay)&&(validate_email($_SESSION["random"]["stormpay"]))){$page_content.=add_stormpay($CONFIG->randomfee,$_SESSION["random"]["stormpay"],"2");}

if(($CONFIG->allowegold)&&(!empty($_SESSION["random"]["egold"]))){$page_content.=add_egold($CONFIG->randomfee,$_SESSION["random"]["egold"],"2");}
if(($CONFIG->allowlibertyreserve)&&(!empty($_SESSION["random"]["libertyreserve"]))){$page_content.=add_libertyreserve($CONFIG->randomfee,$_SESSION["random"]["libertyreserve"],"2");}

if(($CONFIG->allowassuredpay)&&(!empty($_SESSION["random"]["assuredpay"]))){$page_content.=add_assuredpay($CONFIG->randomfee,$_SESSION["random"]["assuredpay"],"2");}

if(($CONFIG->allowsolidtrustpay)&&(!empty($_SESSION["random"]["solidtrustpay"]))){$page_content.=add_solidtrustpay($CONFIG->randomfee,$_SESSION["random"]["solidtrustpay"],"2");}
if(($CONFIG->allowfleetpay)&&(!empty($_SESSION["random"]["fleetpay"]))){$page_content.=add_fleetpay($CONFIG->randomfee,$_SESSION["random"]["fleetpay"],"2");}
if(($CONFIG->allowdollardeliverys)&&(!empty($_SESSION["random"]["dollardeliverys"]))){$page_content.=add_dollardeliverys($CONFIG->randomfee,$_SESSION["random"]["dollardeliverys"],"2");}
if(($CONFIG->allowmoneybookers)&&(!empty($_SESSION["random"]["moneybookers"]))){$page_content.=add_moneybookers($CONFIG->randomfee,$_SESSION["random"]["moneybookers"],"2");}
$page_content.="</fieldset>";
break;
/**************************ADMIN*********************************/
case 'adminul':
$_SESSION["sponsor1"]["pay"]='ok';

$page_content="
<div align=center class=text>
<b>Final step!<br>Pay the $CONFIG->sitename admin<br></b>";
$page_content.="
<fieldset class=text><legend>The site Admin currently preferrs:</legend>
";
$q1=db_fetch_array(db_query("select username , paypal ,stormpay,egold,libertyreserve ,assuredpay from users where id='1'"));
//include the payment forms

if($CONFIG->allowpaypal){$page_content.=add_paypal($CONFIG->adminfee,$q1["paypal"],"3");}

if($CONFIG->allowstormpay){$page_content.=add_stormpay($CONFIG->adminfee,$q1["stormpay"],"3");}

if($CONFIG->allowegold){$page_content.=add_egold($CONFIG->adminfee,$q1["egold"],"3");}

if($CONFIG->allowlibertyreserve){$page_content.=add_libertyreserve($CONFIG->adminfee,$q1["libertyreserve"],"3");}

if($CONFIG->allowassuredpay){$page_content.=add_assuredpay($CONFIG->adminfee,$q1["assuredpay"],"3");}
if($CONFIG->allosolidtrustpay){$page_content.=add_solidtrustpay($CONFIG->adminfee,$q1["solidtrustpay"],"3");}

if($CONFIG->allowfleetpay){$page_content.=add_fleetpay($CONFIG->adminfee,$q1["fleetpay"],"3");}
if($CONFIG->allodollardeliverys){$page_content.=add_dollardeliverys($CONFIG->adminfee,$q1["dollardeliverys"],"3");}

if($CONFIG->allowmoneybookers){$page_content.=add_moneybookers($CONFIG->adminfee,$q1["moneybookers"],"3");}
$page_content.="</fieldset>";
break;

}
include("$CONFIG->templatedir/content.php"); 
include("$CONFIG->templatedir/footer.php");
?>





   <!--         	
                

<div>


</div>

               
                
               
                
                <div class="cleaner"></div>
          



        
        </div>
        
    </div>	






   <div id="tooplate_footer">
    
       
        <div style="float: left" class=\"text\">Copyright &#169; 2018&nbsp;&nbsp;<a class=\"link3\" href=\"<? echo $CONFIG->siteurl; ?>"><? echo $CONFIG->sitename ?></a> - All Rights Reserved</div>
         <div style="float: right" class=\"text\">
            


                <a  class="link3" href=<?=$CONFIG->siteurl?>/index.php>Home</a>&nbsp;&nbsp;
                <a  class="link3" href=<?=$CONFIG->siteurl?>/login.php>Login</a>&nbsp;&nbsp;
                <a  class="link3" href=<?=$CONFIG->siteurl?>/join_now.php>Join now</a>&nbsp;&nbsp;
                <a   class="link3" href=<?=$CONFIG->siteurl?>/faq.php>FAQ</a>&nbsp;&nbsp;
                <a  class="link3" href=<?=$CONFIG->siteurl?>/contact.php>Contact us</a>
                


         </div>

    
    </div> 

  



</div>

</body>
</html>
-->