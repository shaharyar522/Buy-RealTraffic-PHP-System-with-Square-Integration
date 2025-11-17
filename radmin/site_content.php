<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Site Content";
?>




  	

<?
include("$CONFIG->templatedir/header.php");
$frm=$_POST;
if(empty($ce)){
$page_content="
<div class=text>
Select the page that you wish to edit:
<ul class=text>
<li><a class=link1  href=\"".my_name()."?ce=wcm\">The welcome email</a></li>
<li><a class=link1  href=\"".my_name()."?ce=indexp\">Index page</a></li>
<li><a class=link1  href=\"".my_name()."?ce=joinp\">Join us page</a></li>
<li><a class=link1  href=\"".my_name()."?ce=faq\">FAQ page</a></li>
<li><a class=link1  href=\"".my_name()."?ce=member\">Members area  page</a></li>
<li><a class=link1  href=\"".my_name()."?ce=promote\">Member area: promote page</a></li>

</ul></div>
";
}
else{
if(!isset($cand)){
function arata($ce)
{
$sel=db_fetch_array(db_query("select $ce as ceva from administration where id='1'"));





/*
$ret="
<div class=text>
<fieldset>
<legend>Edit the site content</legend>
<form action=\"".my_name()."?ce=$ce&cand=acum\" method=post>
<textarea name=ce2 cols=50 rows=20 class=input>
".stripslashes($sel["ceva"])."</textarea>
<br><br>
<input class=input type=submit value=edit>
</form>
</fieldset>
</div>";
*/


$value_satt = $sel["ceva"];
//$value_satt = str_replace("sponsorfee_free",$CONFIG->sponsorfee_free, $value_satt);
//$value_satt = str_replace("sponsorfee",$CONFIG->sponsorfee, $value_satt);


$ret="
<div class=text><fieldset><legend>Edit the site content</legend>
<form action=\"".my_name()."?ce=$ce&cand=acum\" method=post>
<textarea name=ce2 cols=50 rows=20 class=input>
".stripslashes($value_satt)."</textarea>
<br><br><input class=input type=submit value=edit></form>
</fieldset>
</div>";




return $ret;
}//functie
switch($ce){
default:
echo"Error.";
break;
case 'wcm':
$page_content=arata("wcm");
break;
case 'indexp':
$page_content=arata("indexp");
break;
case 'joinp':
$page_content=arata("joinp");
break;
case 'faq':
$page_content=arata("faq");
break;
case 'member':
$page_content=arata("member");
break;
case 'promote':
$page_content=arata("promote");
break;
}//switch
}
elseif(isset($cand)&&(!empty($ce2))){
$ce2=$_POST["ce2"];

function modific($ce,$ce2)
{
db_query("update administration set $ce='".htmlspecialchars($ce2)."'  where id='1'");
return "<div align=center class=text><br>Update Succesful<br><br><br></div>";
}
switch($ce){
default:
echo"Error.";
break;
case 'wcm':
$page_content=modific("wcm",$ce2);
break;
case 'indexp':
$page_content=modific("indexp",$ce2);
break;
case 'joinp':
$page_content=modific("joinp",$ce2);
break;
case 'faq':
$page_content=modific("faq",$ce2);
break;
case 'member':
$page_content=modific("member",$ce2);
break;
case 'promote':
$page_content=modific("promote",$ce2);
break;
}//switch
}
else{echo"error";}

}
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>


