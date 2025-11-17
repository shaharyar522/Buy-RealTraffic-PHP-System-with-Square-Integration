<?session_start();
session_destroy();
$who=$_GET['from'] ?? '';
$ref=$_SERVER['HTTP_REFERER'] ?? '';
unset($_SESSION["sponsor"]);
unset($_SESSION["random"]);
setcookie("sponsor_is", "", time()-3600); 
setcookie("sponsor_is", $who, time()+24*60*60*365); 
require_once("db_connect.php");
require_once("config.php");
$s=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where username='".strtolower($who)."'");
//if no valid sponsor entered,let's just pay the admin
if(mysqli_num_rows($s)<1){$s=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where id='1'");}
session_register("sponsor"); 
$_SESSION["sponsor"]=mysqli_fetch_array($s); 
$r=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `hits` (`username` , `refer` , `ip` , `date` ) 
VALUES ( '".$who."', '$ref', '$REMOTE_ADDR',now())");
echo "<meta http-equiv='Refresh' content='0; url=index.php'>";

?>
