<?
include'config.php';
$title="Join now to $CONFIG->sitename";
include("$CONFIG->templatedir/header.php");
$page_content="
<div align=center class=text>";
$page_content.=grab_content("joinp");
$page_content=html_entity_decode(stripslashes($page_content));


/*
$page_content.="</div><table width=\"50%\"  border=\"0\" align=\"center\" class=text bgcolor=\"#d8ecff\">
   
<tr><td><div align=left><fieldset style=\"width:400px\"><legend><strong>Two</strong> steps to join</legend><ul><li>Pay $$CONFIG->sponsorfee to your sponsor - <font color=red>".$_SESSION["sponsor"]["firstname"]
."  ".$_SESSION["sponsor"]["lastname"]."</li>
</font>";

$page_content.="<li>Pay the admin fee ($$CONFIG->adminfee)</li></ul>";



*/
//echo $_SESSION["sponsor"]["username"];  echo "---";  echo $_SESSION["sponsor_satt"]["username"];  echo "---";

if( $_SESSION["sponsor"]["username"] =='wespac59' ){
$total_amount = $CONFIG->sponsorfee  + $CONFIG->adminfee;
$page_content.="</div><table width=\"50%\"  border=\"0\" align=\"center\" bgcolor=\"#d8ecff\" class=text>
   
<tr><td><div align=left><fieldset style=\"width:400px\">
<ul>
 <li>Since you do not have a sponsor, you will pay the admin the sponsor fee of $$CONFIG->sponsorfee and the admin of $$CONFIG->adminfee ";
 

$page_content.="<li>You will make one single payment in the amount of $total_amount Click on the \"Join Now\" button below to pay the admin.</li></ul>";
}
else{
$page_content.="</div><table width=\"50%\"  bgcolor=\"#d8ecff\"  border=\"0\" 
align=\"center\" class=text>
   <tr><td><div align=left><fieldset style=\"width:400px\">
<legend><strong>Two</strong> steps to join</legend><ul><li>Pay $$CONFIG->sponsorfee to your sponsor - <font color=red>".$_SESSION["sponsor"]["firstname"]
."  ".$_SESSION["sponsor"]["lastname"]."</li>
<br></font>";

$page_content.="<li>Pay the admin fee ($$CONFIG->adminfee)</li><br>
<li>First, click on the \"Pay Your Sponsor\" button below and pay your sponsor. After you have paid your sponsor, come back to this page and click on the \"Pay The Admin Fee\"
button below to pay the admin fee. <br> Once you have paid the admin fee, you'll be automatically 
redirected to a page where you can create your account</li><br>
<li><font color=red> Make sure you pay your sponsor first and do not bypass paying your sponsor. If you bypass paying your sponsor, our system will 
detect this and your account will be deleted and you will not be issued a refund.</font> </li>

</ul>";
}





$page_content.="



<script>
function validateForm() { 
    var x = document.forms[\"myForm\"][\"ts\"].checked;
    if (!x) {
        alert(\"Name must be filled out\");
        return false;
    }
}
</script>




<script>
function validare()
{if(document.forms[0].ts.checked){document.forms[0].submit();}
else{alert('You must agree with our Terms and Conditions !');}
}
var popUpWin=0;
function popUpWindow(URLStr, left,top, width, height)
{
  if(popUpWin)
  {
    if(!popUpWin.closed) popUpWin.close();
  }
  popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menub ar=no,scrollbars=yes,
resizable=no,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>
<form name=myForm method=post action=join.php";


if( !( isset( $_SESSION["sponsor_satt"]["username"]  ) && $_SESSION["sponsor_satt"]["username"] != null ))
$page_content.=" target=_blank ";


$page_content.=">

<input name=\"ts\" type=\"checkbox\" value=\"ts\" class=\"input\">
I agree with ".$CONFIG->sitename." <a href=\"javascript:popUpWindow('terms.php', 100, 100, 300, 399);\" class=link1 >Terms and Conditions</a><br>
<!--  <div align=center><input type=button class=button value=\"Join now\" onclick=\"validare();\"></div> -->


                        <!-- satyajeet -->
";
   if( $_SESSION["sponsor"]["username"] =='wespac59' )
{
$page_content.="<div align=center><input type=button class=button value=\"Join now\" onclick=\"validare();\"></div>";
 }else{
$page_content.="<div align=center><input type=button class=button value=\"Pay Your Sponsor\" onclick=\"validare();\"></div>
<br>
<div align=center><input";

if( !( isset( $_SESSION["sponsor_satt"]["username"]  ) && $_SESSION["sponsor_satt"]["username"]
 != null )  
    && $_SESSION["sponsor_satt"]["my_ip"] !=  $_SERVER["REMOTE_ADDR"]     )
{  $page_content.=" enable ";   }

$page_content.="  type=submit class=button value=\"Pay The Admin Fee\"  
name=\"paytheadmin\"  onclick=\"return validateForm()\"      ></div>";
   }
$page_content.="
                        <!-- satyajeet -->

</form></fieldset></div></td></tr></table>";
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>