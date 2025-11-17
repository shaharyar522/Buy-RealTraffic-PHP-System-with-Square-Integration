<?
include'../config.php';
require_login_admin();
$id = $_GET['id'];


$q=db_query("delete from   members_ads  where id='$id'") ;
if($q){ echo "User id". $id ." removed from the table members_ads";}


?>



