<?
include'config.php';
$id=$_GET['id'];
$db2=db_query("update banners set clicks=clicks+1 where id='$id'");
$db=db_fetch_array(db_query("select urlto from banners where  id='$id'"));
echo( "<meta http-equiv='Refresh' content='0; url=".$db[0]."'>");
?>
