<?
include "connect.php";

$data = file_get_contents("install.sql");
$data = explode(";\n", $data);
 foreach($data as $query) {
	mysqli_query($GLOBALS["___mysqli_ston"], $query) or die("Completed! Ya!!! Remove the file called install for the safty of the site: $query");
}

echo "Installation complete.<br>You can delete install.php and install.sql.";


((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
