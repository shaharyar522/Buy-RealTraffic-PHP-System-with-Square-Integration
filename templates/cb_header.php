<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta name="robots" content="index,follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Make Money Online Free</title>

<meta name="Description" content="This will be the easiest money you can make online.  Make money online for Free.">

<meta name="Keywords" content="make money online free, easy money, easy money maker, money maker, earn cash, earn money, earn easy money, make money, make easy money">







<link rel="stylesheet" href="../menu/menu-style.css" type="text/css">




<!--
<style type="text/css">
	.shadowed{
		
		border-collapse:collapse; 
	}
	.shadowed td{ 
		padding:7px; border:#4e95f4 1px solid;
	}
	/* provide some minimal visual accomodation for IE8 and below */
	.shadowed tr{
		background: #b8d1f3;
	}
	/*  Define the background color for all the ODD background rows  */
	.shadowed tr:nth-child(odd){ 
		background: #E0E0E0;  
	}
	/*  Define the background color for all the EVEN background rows  */
	.shadowed tr:nth-child(even){
		background: #4f8ec1;
	}
</style>
-->




<link href="../tooplate_style.css" rel="stylesheet" type="text/css" />
<!--   Free Website Template by t o o p l a t e . c o m   -->


<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';

 else if (field.value == '') field.value = field.defaultValue;
}
</script>





<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.lightbox-0.5.css" media="screen" />







<!-- start start
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>



$(function() {
      $('li').click(function() { // Whenever any menu_border is clicked
            $(this).children('a').addClass('current'); // Flag it with a new class

      });
});




$(document).ready(function(){
    $('li').on('click', function(){
        //alert(this);
                  //alert(window.location.pathname);
        //alert($(this).text());

      //  $(this).siblings().removeClass('current');
       // $(this).addClass('current');
    });
});





$(function() {
      $('li.a').click(function() { // Whenever any menu_border is clicked
            $(this).addClass('current'); // Flag it with a new class
      });
});








</script>



<script type='text/javascript'>
  $(document).ready(function(){
    $(function() { // alert($(this).text());
        switch (window.location.pathname) {
            case '/index.php':
                     $(this).children('a').addClass('current'); //alert('hello index'); break;
            case '/faq.php':
                    $('.nav-blog').addClass('current'); //alert('hello faq');
            case '/p/design.html':
                    $('.nav-design').addClass('current')
            case '/p/photography.html':
                $('.nav-photography').addClass('current')
            case '/p/hosting.html':
                $('.nav-hosting').addClass('current')
        }
      });
  });
</script>


end end ...................-->




</head>



<body>




<script>
function validateFormPro(status_satt) {
         if(  status_satt == 'Free Member'  ) {  return true; }

         if(  status_satt == 'Pro Member'  ) { alert('You Are Already a Pro Member'); return false; }

}
</script>




<?
 $actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

		$number_list =  array('http://www.ez-moneymaker.com/index.php','http://www.ez-moneymaker.com/', 'http://www.ez-moneymaker.com/login.php',
		'http://www.ez-moneymaker.com/join_now.php', 'http://www.ez-moneymaker.com/join.php',
		'http://www.ez-moneymaker.com/faq.php','http://www.ez-moneymaker.com/contact.php','http://www.ez-moneymaker.com/forgot_password.php',
		'http://www.ez-moneymaker.com/new_signup.php',
		'http://ez-moneymaker.com/join.php?stage=adminul',
		'http://www.ez-moneymaker.com/rusers/index.php',
		'http://www.ez-moneymaker.com/rusers/final.php',
		'http://www.ez-moneymaker.com/rusers/complete_check.php',
		'http://www.ez-moneymaker.com/rusers/logout.php',
		'http://www.ez-moneymaker.com/radmin/index.php',
		'http://www.ez-moneymaker.com/radmin/',
		'http://www.ez-moneymaker.com/radmin/logout.php',
		'http://www.ez-moneymaker.com/join.php?stage=adminul',
		'http://www.ez-moneymaker.com/join.php?stage=primu'


		);
?>



<div id="tooplate_wrapper">
<div class="header-bg"></div>

<div class="head-banner">
<img src="/images/cb_header_banner.jpg" >
</div>

<div id="tooplate_header">
<div class="nav-bg"></div>



<div id="tooplate_menu">





<?
require_once("db_connect.php");
$nick_name=$_GET["cb_nickname"] ?? '';
if(  isset($nick_name)  && $nick_name !=null  ){
    $query_satt=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM users WHERE cb_nickname='$nick_name' and cb_page_status='Active'");
    $num_rows = mysqli_num_rows($query_satt); 
      if($num_rows==0)
        {$query_satt=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM users WHERE id=1");
         $qqq="update users set cb_page_hits=cb_page_hits+1 where id=1";
         mysqli_query($GLOBALS["___mysqli_ston"], $qqq);
        }

      if($num_rows!=0)
        {
$qqq="update users set cb_page_hits=cb_page_hits+1 where cb_nickname='$nick_name' and cb_page_status='Active'";
mysqli_query($GLOBALS["___mysqli_ston"], $qqq);
}

  

} else {
     $query_satt=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM users WHERE id=1");
$qqq="update users set cb_page_hits=cb_page_hits+1 where id=1";
mysqli_query($GLOBALS["___mysqli_ston"], $qqq);

}

  $ressult = mysqli_fetch_array($query_satt);  
  $firstname =$ressult["firstname"];
  $lastname =$ressult["lastname"];
  $cb_nickname=$ressult["cb_nickname"];

  $cb_username=$ressult["username"];

?>






<ul><br>
           <!-- <li><font color=#FFFFFF>This Page is Presented BY:  %firstname% %lastname%</font></li> -->
<li><font color=#FFFFFF>This Page is Presented BY:   <? echo $firstname; echo " "; echo $lastname; ?></font></li>


               

  </ul>

         
         </div>

















<div class="cleaner"></div>
        </div> <!-- end of menu -->



    </div>


<div style="-webkit-box-shadow: 2px 4px 15px 5px rgba(0,0,0,0.6); -moz-box-shadow: 2px 4px 15px 5px rgba(0,0,0,0.6); box-shadow: 2px 4px 15px 5px rgba(0,0,0,0.6); margin-top: -1.1em; position: relative; width: 1000px;
    margin: 0 auto;
    margin-top: -1.1em;">



<div id="tooplate_main">




 <div id="tooplate_content">




  









         <div class="cleaner"></div>
        

<br><br>

      <div class="cleaner"></div>


