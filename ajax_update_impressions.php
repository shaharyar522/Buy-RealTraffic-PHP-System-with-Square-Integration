<?php
include 'config.php';

// Increment popup click count
$sql = "UPDATE popup_setting SET impressions = impressions + 1 LIMIT 1";


mysqli_query($GLOBALS["___mysqli_ston"], $sql);

?>
