<?
function text_ad(){
global $CONFIG;


/*
$ba=generate_random();  
$q=db_query("select * from textads where username='".$ba["username"]."' order by rand() limit 0,1 ");
$n=db_num_rows($q);
if($n<1)
{
$adm=db_fetch_array(db_query("select username from users where id='1'"));
$q=db_query("select * from textads where username='".$adm["username"]."' order by rand() limit 0,1 ");
}
*/




$nick_name=$_GET["cb_nickname"];
if(  isset($nick_name)  && $nick_name !=null  ){
    $query_satt=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM users WHERE cb_nickname='$nick_name' and cb_page_status='Active'");
    $num_rows = mysqli_num_rows($query_satt); 
      if($num_rows==0)
        {$query_satt=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM users WHERE id=1");
        }

      if($num_rows!=0)
        {}

  

} else {
     $query_satt=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM users WHERE id=1");
}

  $ressult = mysqli_fetch_array($query_satt);  

  $cb_username=$ressult["username"];






$q=db_query("SELECT * FROM `cb_textads` WHERE username='".$cb_username."' order by rand() limit 0,1 ");



//$q=db_query("SELECT * FROM `cb_textads` WHERE 1 order by rand() limit 0,1 ");





$un=db_fetch_array($q);
$url=$un["url"];
$urlto=$un["urlto"];
$db=db_query("update cb_textads set views=views+1 where id='".$un["id"]."'");



$r="<div class=\"col_w260 fp_box\"><a href=\"$CONFIG->siteurl/cb_click_ad.php?id=".$un['id']."\" target=blank title=\"Random TextAd: user ".$un["username"]." \"><h2>     <font face=\"verdana\">     ".stripslashes($un['title'])."</font></h2></a><font face=\"verdana\"  size=\"2\" >".stripslashes($un['text'])."</font></div>";
return $r;

}

echo "<div class=\"col_w880\">". text_ad().text_ad().text_ad()."</div>";

?>