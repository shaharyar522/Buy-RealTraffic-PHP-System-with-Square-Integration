<?
include'../config.php';
require_login();
$id = $_GET['id'] ?? '';


$q=db_query("update  members_ads set views = 0 where id='$id'") ;
if($q){ echo "User id". $id ." views are reset to zero";}


?>
