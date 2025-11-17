<?
$ba=generate_random();  
//print_r($ba);
 
$q=db_query("select * from banners where username='".$ba["username"]."' order by rand() limit 0,1 ");
$n=db_num_rows($q);



if($n<1)
{
$adm=db_fetch_array(db_query("select username from users where id='1'")); 
$q=db_query("select * from banners where username='".$adm["username"]."' order by rand() limit 0,1 ");
}
$un=db_fetch_array($q);
$url=$un["url"];
$urlto=$un["urlto"];
$db=db_query("update banners set views=views+1 where id='".$un["id"]."'");


if(  isset($un["id"]) && $un["id"]!=null  ){
echo"<div align=center><a href=\"$CONFIG->siteurl/click.php?id=".$un["id"]."\" target=blank>
<img src=\"$url\" width=468 height=60 border=0 alt=\"Random Banner: user ".$un["username"]." \"></a></div>";


}
else{
echo"<div align=\"center\" height=\"60\"></div>";
}

?>