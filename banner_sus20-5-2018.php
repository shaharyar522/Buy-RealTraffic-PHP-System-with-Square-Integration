<?
function text_ad(){
global $CONFIG;
$ba=generate_random();  
// print_r( $ba  );
$q=db_query("select * from textads where username='".$ba["username"]."' order by rand() limit 0,1 ");
$n=db_num_rows($q);
if($n<1)
{
$adm=db_fetch_array(db_query("select username from users where id='1'"));
$q=db_query("select * from textads where username='".$adm["username"]."' order by rand() limit 0,1 ");
}
$un=db_fetch_array($q);
$url=$un["url"];
$urlto=$un["urlto"];
$db=db_query("update textads set views=views+1 where id='".$un["id"]."'");



$r="<div class=\"col_w260 fp_box\"><a href=\"$CONFIG->siteurl/click_ad.php?id=".$un['id']."\" target=blank title=\"Random TextAd: user ".$un["username"]." \"><h2>     <font face=\"verdana\">     ".stripslashes($un['title'])."</font></h2></a><font face=\"verdana\"  size=\"2\" >".stripslashes($un['text'])."</font></div>";
return $r;

}

echo "<div class=\"col_w880\">". text_ad().text_ad().text_ad()."</div>";

?>