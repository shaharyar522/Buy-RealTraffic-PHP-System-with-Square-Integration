<?
include'config.php';
$title="Welcome to $CONFIG->sitename";
//include("$CONFIG->templatedir/header.php");
//$q=db_query("SELECT * FROM `members_ads` WHERE 1 order by rand() limit 0,1 ");

$q=db_query("SELECT * FROM `members_ads` WHERE url_status = 'Active' order by rand() limit 0,1 ");
$un=db_fetch_array($q);
$url=$un["url"];
$username=$un["username"];
$db=db_query("update members_ads set views=views+1 where id='".$un["id"]."'");
if(  isset($un["id"]) && $un["id"]!=null  ){
header("Location: {$un['url']}");
//echo $un['url'];

}

  $total = $CONFIG->adminfee+$CONFIG->sponsorfee;
  $total =  number_format($total,2);
 
 

$page_content=str_replace("(sponsorfee + adminfee)",$total,$page_content);
$page_content=str_replace("adminfee_free",$CONFIG->adminfee_free,$page_content);
$page_content=str_replace("adminfee",$CONFIG->adminfee,$page_content);
$page_content=str_replace("sponsorfee_free",$CONFIG->sponsorfee_free,$page_content);
$page_content=str_replace("sponsorfee",$CONFIG->sponsorfee,$page_content);



$page_content=html_entity_decode(stripslashes($page_content));
include("$CONFIG->templatedir/content.php");
//include("$CONFIG->templatedir/footer.php");
?>


            	
  