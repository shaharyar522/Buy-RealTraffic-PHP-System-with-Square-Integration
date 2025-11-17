<?
include'../config.php';
require_login();
$id = $_GET['id'];


$q=db_query("update  users set cb_page_hits = 0 where id='$id'") ;
//if($q){ echo "User id". $id ." hits are reset to zero";}


?>
