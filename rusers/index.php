<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Member Area";
include("$CONFIG->templatedir/header.php");
$page_content="<div align=center class=text>Last login on ".$_SESSION["user"]["lastlogin"]."
from ".$_SESSION["user"]["last_ip"]."<br></div>";
$page_content.=grab_content("member");

$fill=db_fetch_array(db_query("select * from users where username='".$_SESSION["user"]["username"]."'"));



//if( $fill['membership_status']=='Free Member' ) return "<span style='color:red'>"; else  return "<span style='color:green'>";
function get_color($satt_status){
if( $satt_status=='Free Member' ) return "<span style='color:red'>"; else  return "<span style='color:green'>";
}

function get_color_1($satt_status){
if( $satt_status=='Disabled' ) return "<span style='color:red'>"; else  return "<span style='color:green'>";
}
$page_content=str_replace("%firstname%, Thank You For Joining EZ-MoneyMaker.com", $_SESSION["user"]["firstname"].", Welcome To Your Member's Area and<br> Thank You For Joining EZ-MoneyMaker.com<br>Your Membership Status is:  ". get_color($fill['membership_status']).$fill['membership_status']."</span>" ."<br>Your ClickBank Money Page is:  "   . get_color_1($fill['cb_page_status']).$fill['cb_page_status']."</span>"       ,$page_content);
$page_content=str_replace("sponsorfee_free", $CONFIG->sponsorfee_free,$page_content);
$page_content=str_replace("sponsorfee", $CONFIG->sponsorfee,$page_content);
$page_content=html_entity_decode(stripslashes($page_content));

include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>