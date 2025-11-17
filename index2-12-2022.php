<?
include'config.php';

$title="Welcome to $CONFIG->sitename"; 
?>



  	


<?
include("$CONFIG->templatedir/header.php");
$page_content=grab_content("index.php");


  $total = $CONFIG->adminfee+$CONFIG->sponsorfee;
  $total =  number_format($total,2);
 
 

$page_content=str_replace("(sponsorfee + adminfee)",$total,$page_content);
$page_content=str_replace("adminfee_free",$CONFIG->adminfee_free,$page_content);
$page_content=str_replace("adminfee",$CONFIG->adminfee,$page_content);
$page_content=str_replace("sponsorfee_free",$CONFIG->sponsorfee_free,$page_content);
$page_content=str_replace("sponsorfee",$CONFIG->sponsorfee,$page_content);



$page_content=html_entity_decode(stripslashes($page_content));
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>


            	
  