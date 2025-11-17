<?
/* stdlib.php (c) 2003 ITWebTeam.net
 *
 * DO NOT EDIT BELOW
 */

function setdefault(&$var, $default="") {
	if (! isset($var)) {
		$var = $default;
	}
}

function nvl(&$var, $default="") {
	return isset($var) ? $var : $default;
}
function html_get(&$var) {
return isset($var) ? htmlSpecialChars(addslashes($var)) : "";
}

function html_print(&$var) {
	echo isset($var) ? htmlSpecialChars(stripslashes($var)) : "";
}

function no_querystring($url) {
	if ($commapos = strpos($url, '?')) {
		return substr($url, 0, $commapos);
	} else {
		return $url;
	}
}
function codare_output($output){
	$codat = '';
for($count = 0; $count < strlen($output); $count++) 
{ 
 $codat .= "%" . bin2hex($output[$count]); 
} 
$tcodat="<SCRIPT LANGUAGE=\"javascript\">\n<!-- \ndocument.write(unescape(\"$codat\"));\n//-->\n</SCRIPT>";
return $tcodat;
}
function get_referer() {
	global $HTTP_REFERER;
	return no_querystring(nvl($HTTP_REFERER));
}

function my_name() {
	global $PHP_SELF, $REQUEST_URI;
	$my_url = isset($REQUEST_URI) ? $REQUEST_URI : $PHP_SELF;
	return no_querystring($my_url);
}

function my_name_long() {
	global $HTTPS, $SERVER_PROTOCOL, $HTTP_HOST;
	$protocol = (isset($HTTPS) && $HTTPS == "on") ? "https://" : "http://";
	$url_prefix = "$protocol$HTTP_HOST";
	return $url_prefix . my_name();
}

function match_referer($good_referer = "") {
	if ($good_referer == "") { $good_referer = my_name_long(); }
	return $good_referer == get_referer();
}
function redirect($url, $message="", $delay=0) {
	echo "<meta http-equiv='Refresh' content='$delay; url=$url'>";
	if (!empty($message))
	 echo "<div style='font-family: Arial, Sans-serif; font-size: 12pt;' align=center>$message</div>";
	die;
}

function read_template($filename) {
	$template = '';
	$temp = str_replace("\\", "\\\\", implode(file($filename)));
	$temp = str_replace('"', '\"', $temp);
	@eval("\$template = \"$temp\";");
	return $template;
}

?>