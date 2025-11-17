<?

include'config.php';
$title="Join now to $CONFIG->sitename";
?>



  	


<?
include("$CONFIG->templatedir/header.php");
$page_content="
<div align=center class=text>";
$page_content.=grab_content("joinp");
$page_content=html_entity_decode(stripslashes($page_content));
$page_content.="</div><table width=\"50%\"  border=\"0\" align=\"center\" class=text>
   <tr><td><div align=left><fieldset style=\"width:400px\">
<legend><strong>Two</strong> steps to join</legend><ul><li>Pay $$CONFIG->sponsorfee to your sponsor - <font color=red>".$_SESSION["sponsor"]["firstname"]
."  ".$_SESSION["sponsor"]["lastname"]."</li></font>";


$page_content.="<li>Pay the admin fee ($$CONFIG->adminfee)</li></ul>";
$page_content.="
<script>
function validare()
{if(document.forms[0].ts.checked){document.forms[0].submit();}
else{alert('You must agree with our Terms and Conditions !');}
}
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
  if(popUpWin)
  {
    if(!popUpWin.closed) popUpWin.close();
  }
  popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menub ar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>
<form method=post action=join.php>
<input name=\"ts\" type=\"checkbox\" value=\"ts\" class=input>
I agree with ".$CONFIG->sitename." <a href=\"javascript:popUpWindow('terms.php', 100, 100, 300, 399);\" class=link1 >Terms and Conditions</a>
<br>
<div align=center><input type=button class=button value=\"Join now\" onclick=\"validare();\"></div>
</form></fieldset></div></td></tr></table>";
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>





 