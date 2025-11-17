<?
/* dblib.php (c) 2003 ITWebTeam
 *DO NOT EDIT BELOW
  */
   $style="<center><div align=center style=\"background-color: #FF6600;border-width:thin;color:white;border:1px dotted red; width:400px;text-align:center;font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px;\">";
if (!isset($DB_DIE_ON_FAIL)) { $DB_DIE_ON_FAIL = true; }
if (!isset($DB_DEBUG)) { $DB_DEBUG = true; }

function db_connect($dbhost, $dbname, $dbuser, $dbpass) {
	global $DB_DIE_ON_FAIL, $DB_DEBUG,$style;

	if (! $dbh = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass))) {
        if ($DB_DEBUG) {
            echo "$style<h2>Failure trying to connect to $dbhost as $dbuser</h2>";
            echo "<p><b>mysql Error</b>: ", mysqli_error($GLOBALS["___mysqli_ston"]);
        } else {
            echo "$style<h2>Database error.</h2>";
        }

        if ($DB_DIE_ON_FAIL) {
            echo "$style The script is now halted.Please contact the webmaster</p><p align=center> <font color=red><a href=http://www.therandomizer.net>TheRandomizer</a>  <font color=white><strong>2.0</strong></font></font></p>";
            die();
        }
    }

    if (! mysqli_select_db($GLOBALS["___mysqli_ston"], $dbname)) {
        if ($DB_DEBUG) {
            echo "$style<h2>Can't select database $dbname</h2>";
            echo "<p><b>mysql Error</b>: ", mysqli_error($GLOBALS["___mysqli_ston"]);
        } else {
            echo "$style<h2>Database error.</h2>";
        }

        if ($DB_DIE_ON_FAIL) {
        echo "$style The script is now halted.Please contact the webmaster</p><p align=center> <font color=red><a href=http://www.therandomizer.net>TheRandomizer</a>  <font color=white><strong>2.0</strong></font></font></p>";
            die();
        }
    }

	return $dbh;
}
function grab_content($what)
{
	global $DB_DIE_ON_FAIL, $DB_DEBUG,$style;
	$query = db_query("select ".$what." from administration where id='1'") ;
	$content= db_fetch_array($query);
	return $content[0];
}

function db_query($query, $test=false, $terminate=true, $silent=false) {

	global $DB_DIE_ON_FAIL, $DB_DEBUG,$style;

	if ($test) {
		echo "<pre>" . htmlspecialchars($query) . "</pre>";

		if ($terminate) die;
	}

	$query = mysqli_query($GLOBALS["___mysqli_ston"], $query);

	if (! $query && ! $silent) {
		if ($DB_DEBUG) {
			echo "$style<h2>Warning!</h2>The following error occured:";
			echo "<pre>" . htmlspecialchars($query) . "</pre>";
			echo "<p><b>mysql Error</b>: ", mysqli_error($GLOBALS["___mysqli_ston"]);
		} else {
			echo "$style<h2>Database Error occured!</h2>";
		}

		if ($DB_DIE_ON_FAIL) {
			echo "$style<br>The script is now halted.Please contact the webmaster<br><br>
			<p align=center> <font color=red><a href=http://www.therandomizer.net>TheRandomizer</a>  <font color=white><strong>2.0</strong></font></font></p><br>";
			die();
		}
	}

	return $query;
}

function db_fetch_array($query) {
    return mysqli_fetch_array($query);
}

function db_fetch_row($query) {
    return mysqli_fetch_row($query);
}

function db_fetch_object($query) {
return mysqli_fetch_object($query);
}

function db_num_rows($query) {
return mysqli_num_rows($query);
}

function db_affected_rows() {
/* INSERT, UPDATE, or DELETE*/

    return mysqli_affected_rows($GLOBALS["___mysqli_ston"]);
}

function insert_id() {
return ((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
}
function db_num_fields($query) {
return (($___mysqli_tmp = mysqli_num_fields($query)) ? $___mysqli_tmp : false);
}

function db_field_name($query, $fieldno) {
return ((($___mysqli_tmp = mysqli_fetch_field_direct($query,  $fieldno)->name) && (!is_null($___mysqli_tmp))) ? $___mysqli_tmp : false);
}
?>