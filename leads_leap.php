<? 
include'config.php';

include("$CONFIG->templatedir/header.php");

?>

<head>

<META http-equiv="refresh" content="0;URL=http://www.ez-moneymaker.com/mas.php">

<meta name="robots" content="index,follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Make Money Online Free</title>

<meta name="Description" content="This will be the easiest money you can make online.  Make money online for Free.">

<meta name="Keywords" content="make money online free, easy money, easy money maker, money maker, earn cash, earn money, earn easy money, make money, make easy money">






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
 $actual_link = "http://$_SERVER['HTTP_HOST']$_SERVER['REQUEST_URI']"; 
    
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

	


<div id="tooplate_header">
    	
        


<div id="tooplate_menu">
        	
        	
       <?  $uurl = $_SERVER['REQUEST_URI']; ?>

<ul>
             <?  if( $uurl =='/' ||  $uurl =='/index.php' ) { ?>
                <li><a href="http://www.ez-moneymaker.com/index.php" class="current">Home</a></li> 
              <? } else {?>
                <li><a href="http://www.ez-moneymaker.com/index.php">Home</a></li>
                <? } ?>
                
               <?  if( $uurl =='/new_signup.php' ) { ?>               
               <li><a href="http://www.ez-moneymaker.com/new_signup.php" class="current">Sign Up</a></li>   
               <? } else {?>      
               <li><a href="http://www.ez-moneymaker.com/new_signup.php">Sign Up</a></li>        
               <? } ?>                 


             <?  if( $uurl =='/login.php' ) { ?>
               <li><a href="http://www.ez-moneymaker.com/login.php" class="current">Login</a></li>  
               <? } else {?> 
               <li><a href="http://www.ez-moneymaker.com/login.php">Login</a></li>
             <? } ?>
         <!--      
               <?  if( $uurl =='/join_now.php' || $uurl =='/join.php' ) { ?>
               <li><a href="http://www.ez-moneymaker.com/join_now.php" class="current">Join Now</a></li>
               <? } else {?> 
               <li><a href="http://www.ez-moneymaker.com/join_now.php">Join Now</a></li>               
               <? } ?>
           -->    
               <?  if( $uurl =='/faq.php' ) { ?>
               <li><a href="http://www.ez-moneymaker.com/faq.php" class="current">FAQ</a></li>
               <? } else {?> 
               <li><a href="http://www.ez-moneymaker.com/faq.php">FAQ</a></li>
               <? } ?>
               
               <?  if( $uurl =='/contact.php' ) { ?>               
               <li><a href="http://www.ez-moneymaker.com/contact.php" class="current">Contact Us</a></li>   
               <? } else {?>      
               <li><a href="http://www.ez-moneymaker.com/contact.php">Contact Us</a></li>        
               <? } ?>
               
              


<?  if( $uurl =='https://www.leadsleap.com/?r=wespac' ) { ?>               
               <li><a href="https://www.leadsleap.com/?r=wespac" class="current" target="_blank">Get Free Traffic</a></li>   
               <? } else {?>      
               <li><a href="https://www.leadsleap.com/?r=wespac" target="_blank">Get Free Traffic</a></li>        
               <? } ?>


  </ul>
            


<div class="cleaner"></div>
        </div> <!-- end of menu -->
        
		








<div id="site_title"><h1><a href="/index.php">EZ-MoneyMaker.com</a></h1></div>
   




 
    </div>




    
   


 <div id="tooplate_middle">

   		
   


 </div> <!-- end of middle -->
    






    


<div id="tooplate_main">
  
              
       

 <div id="tooplate_content">
        
        	


<div class="col_w880 home_intro">


            	




       


         <div class="cleaner"></div>
            </div>
        
        	
















  Thank you for visiting our website.  My name is Mike Borders, one of the owners of EZ-MoneyMaker.com.  You now have the opportunity to earn some serious cash.  
Our program is simple and easy.  All you have to do is refer others to our site and get paid each time one of your referrals upgrades to Pro.
<br><br>


<h2 align="center">How Our Program Works</h2>

<br><br>

We offer 2 types of memberships, Free and Pro.  Once you sign up for free, you can choose to remain a free member or you can upgrade to Pro in your member's area.

<br><br>




As a Pro member, you will earn $25.00 each time a member in your downline upgrades to Pro.  You can also add up to 10 Text Ads and 10 Banners to our system.  
Your text ads and banners will rotate at the top and bottom of each page of our website.  Our site receives thousands of visitors each day so your text ads and banners will get massive exposure.

<br><br>

As a Free member, you cannot add text ads or banners, but you will earn $10.00 each time a member in your downline upgrades to Pro.  
<br> <br>

Once you sign up, click on the "Login" link at the top of the page and log into your member's area.  If you decide to upgrade to Pro, click on the "Upgrade To Pro" link in your member's area and follow the instructions.
<br> <br>


Pro membership is a one-time fee of <b>$50.00</b>.  If you decide to upgrade to Pro, below is how you will make your payments.
 
<ul>

<li>If your sponsor is a Free Member you will pay your sponsor the sponsor fee of $10.00 and you will pay the admin the admin fee of $40.00</li>

<br>

<li>If your sponsor is a Pro Member you will pay your sponsor the sponsor fee of $25.00 and you will pay the admin the admin fee of $25.00</li>
<br>

<li>If you do not have a sponsor, admin will be your sponsor and you will pay the admin the sponsor fee of  $25.00 and the admin fee of $25.00.  You will make one single payment to the admin in the amount of $50.00.</li>

</ul>

<br> <br>

To make money, click on the "Url to Promote" link in your member's area and get your referral url.  All you have to do is advertise your referral url.  Anyone that signs up under your referral url will be placed into your downline
permanently.  Whenever a member in your downline upgrades to Pro, that member will send your sponsor fee directly to your PayPal account. Simple and Easy!
<br><br>

(Optional)  If you do not have the time or money to promote your referral url, we'll promote it for you.  For a small monthly fee, we will add your referral url to our company traffic rotator.


<br><br>

Our Traffic Rotator receives thousands of REAL visitors each day.  So your referral url will get Massive Exposure.  For more details, log into your account and click on the "Get Traffic" link.


<br> <br>
PayPal is the only payment processor we accept.  if you need a PayPal account, <a href=https://www.paypal.com/us/webapps/mpp/account-selection target=_blank>Click Here</a> to get one free.   So, if you are ready to get quality traffic and earn some serious cash, click on the button below and Join FREE Now!



<br> <br>


To Your Success,


<br><br>
Mike Borders

<br>
Owner/Program Manager

<br>
EZ-MoneyMaker.com



<br><br>


<center> <a href=/new_signup.php><img src=/images/join_now1.jpg borer=0></a></center>


<br><br><br><br>



        








     
                <div class="cleaner"></div>
     


     



        
        </div> <!-- end of content -->
        
   


 </div>	<!-- end of main -->



    





            	

             


<div class="col_w260 fp_box">


<br>
<br>

               	

<!--

  -->     
  
			  <div class="col_w880"> 
			   <div class="col_w260 fp_box">      	
			
			
			
			    </div>
			           
			      <div class="cleaner"> 



 </div>
			
			          </div>
  
  
  
  
  
           



                </div>


    


<div id="tooplate_footer">
    
       


 <div>Copyright &#169; 2018&nbsp;&nbsp;EZ-MoneyMaker.com - All Rights Reserved </div>




<div id="tooplate_menu_footer_satt">
        	

<ul>
             <?  if( $uurl =='/' ||  $uurl =='/index.php' ) { ?>
                <li><a href="http://www.ez-moneymaker.com/index.php" class="current">Home</a></li> 
              <? } else {?>
                <li><a href="http://www.ez-moneymaker.com/index.php">Home</a></li>
                <? } ?>
                
                
               <?  if( $uurl =='/new_signup.php' ) { ?>               
               <li><a href="http://www.ez-moneymaker.com/new_signup.php" class="current">Sign Up</a></li>   
               <? } else {?>      
               <li><a href="http://www.ez-moneymaker.com/new_signup.php">Sign Up</a></li>        
               <? } ?> 


             <?  if( $uurl =='/login.php' ) { ?>
               <li><a href="http://www.ez-moneymaker.com/login.php" class="current">Login</a></li>  
               <? } else {?> 
               <li><a href="http://www.ez-moneymaker.com/login.php">Login</a></li>
             <? } ?>
         <!--  
               <?  if( $uurl =='/join_now.php' || $uurl =='/join.php' ) { ?>
               <li><a href="http://www.ez-moneymaker.com/join_now.php" class="current">Join Now</a></li>
               <? } else {?> 
               <li><a href="http://www.ez-moneymaker.com/join_now.php">Join Now</a></li>               
               <? } ?>
           -->
               <?  if( $uurl =='/faq.php' ) { ?>
               <li><a href="http://www.ez-moneymaker.com/faq.php" class="current">FAQ</a></li>
               <? } else {?> 
               <li><a href="http://www.ez-moneymaker.com/faq.php">FAQ</a></li>
               <? } ?>
               
               <?  if( $uurl =='/contact.php' ) { ?>               
               <li><a href="http://www.ez-moneymaker.com/contact.php" class="current">Contact Us</a></li>   
               <? } else {?>      
               <li><a href="http://www.ez-moneymaker.com/contact.php">Contact Us</a></li>        
               <? } ?>
      







<?  if( $uurl =='https://www.leadsleap.com/?r=wespac' ) { ?>               
               <li><a href="https://www.leadsleap.com/?r=wespac" class="current" target="_blank">Get Free Traffic</a></li>   
               <? } else {?>      
               <li><a href="https://www.leadsleap.com/?r=wespac" target="_blank">Get Free Traffic</a></li>        
               <? } ?>


         
   
  </ul>
        


<div class="cleaner"></div>
        


</div> <!-- end of menu -->
    
    


</div> <!-- end of tooplate_footer -->

</div> <!-- end of wrapper -->



<!--   Free Website Template by t o o p l a t e . c o m   -->



</body>



</html>




