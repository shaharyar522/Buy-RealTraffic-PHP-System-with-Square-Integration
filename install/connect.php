<?php

    $MySqlHostname = "localhost"; //the name of your host - if its local leave it as is.
    $MySqlUsername = "buyreal_wespac"; //the username to your database.
    $MySqlPassword = "Aussie59$$"; //the password to your database.
    $MySqlDatabase = "buyreal_traffic"; //the name of your database.


// do not edit below this line!!
///////////////////////////////////////////////////////////////////////

	$dblink=($GLOBALS["___mysqli_ston"] = mysqli_connect($MySqlHostname,  $MySqlUsername,  $MySqlPassword)) or die("Could not connect to database");
	@mysqli_select_db($GLOBALS["___mysqli_ston"], $MySqlDatabase) or die( "Could not select database");

?>