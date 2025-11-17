<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Banner add";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blue Wave Template</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../tooplate_style.css" rel="stylesheet" type="text/css" />
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
global $ce;
$ce=$_GET['id'];
include("$CONFIG->templatedir/header.php");
$page_content="<div class=text id=heading  align=center><b>Add Banner</b></div>";
if(!$_POST){

$page_content.=
"
<script>
function validare()
{
er=\"\";
mesaj='The following fields are required\\n';
if(!document.forms[0].burl.value){mesaj+='  -Text ad  displayed URL\\n';er='a';}
if(!document.forms[0].btourl.value){mesaj+='  -Text ad  destination\\n';er='a';}
if(er=='a'){alert(mesaj);}
else{document.forms[0].submit();}
}
</script><form action=add_banner.php method=post>
<table  border=\"0\" class=text>
  
  <tr>
    <td align=\"left\" valign=\"middle\">Banner URL:</td>
    <td><input type=text class=input name=burl  size=40 maxlength=100></td>
  </tr>
  <tr>
    <td align=\"left\" valign=\"middle\">Banner destination:</td>
    <td><input type=text class=input name=btourl size=40 maxlength=100></td>
  </tr>
  <tr>
    <td colspan=\"2\">
	<input type=button class=button value=\"Add Banner\"  onclick=\"validare();\"></td>
  </tr>
</table></form>";
}//if
else
{$ce=$_POST['ce'];
$s=db_query("insert into banners(username,url,urlto) values('".$_SESSION['ADMIN']["admin"]["username"]."','".$_POST['burl']."' ,'".$_POST['btourl']."')");
$page_content.="<div class=text align=center>Banner added succesfully.<br><br></div>";

}

include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>




            	
                

<div>


</div>

               
                
               
                
                <div class="cleaner"></div>
          



        
        </div> <!-- end of content -->
        
    </div>	<!-- end of main -->





    <!--
    <div id="tooplate_footer">        
        <div align=\"center\" class=\"text\">	<br>Copyright &#169; 2018&nbsp;&nbsp;<a class=\"link3\" href=\"<? echo $CONFIG->siteurl; ?>"><? echo $CONFIG->sitename ?></a> - All Rights Reserved</div>    
    </div> 

  -->

   <div id="tooplate_footer">
    
        <!-- Copyright © 2048 <a href="#">Your Company Name</a> -->
        <div style="float: left" class=\"text\">Copyright &#169; 2018&nbsp;&nbsp;<a class=\"link3\" href=\"<? echo $CONFIG->siteurl; ?>"><? echo $CONFIG->sitename ?></a> - All Rights Reserved</div>
         <div style="float: right" class=\"text\">
            


                <a  class="link3" href=<?=$CONFIG->siteurl?>/index.php>Home</a>&nbsp;&nbsp;
                <a  class="link3" href=<?=$CONFIG->siteurl?>/login.php>Login</a>&nbsp;&nbsp;
                <a  class="link3" href=<?=$CONFIG->siteurl?>/join_now.php>Join now</a>&nbsp;&nbsp;
                <a   class="link3" href=<?=$CONFIG->siteurl?>/faq.php>FAQ</a>&nbsp;&nbsp;
                <a  class="link3" href=<?=$CONFIG->siteurl?>/contact.php>Contact us</a>
                


         </div>

    
    </div> <!-- end of tooplate_footer -->

  



</div> <!-- end of wrapper -->
<!--   Free Website Template by t o o p l a t e . c o m   -->
</body>
</html>
