<?
/*This is the mysql connection parameters.
For maximum security,you can move this file outside the
web tree .
In this case,please edit the path from the line 100 of config.php.*/
$dbhost = 'localhost';
$database_name = 'buyreal_traffic';
$dbusername = 'root';
$dbpasswd = '';
$connection = ($GLOBALS["___mysqli_ston"] = mysqli_connect("$dbhost", "$dbusername", "$dbpasswd"))
    or die ("Couldn't connect to server.");
    $db = mysqli_select_db( $connection, $database_name)
    or die("Couldn't select database.");
    ?>