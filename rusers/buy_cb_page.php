<?




include'../config.php';
require_login();
$title="$CONFIG->sitename Buy ClickBank Money Page";
include("$CONFIG->templatedir/header.php");





$admin_detail=db_fetch_array(db_query("select * from users where id=1"));













include("$CONFIG->templatedir/SiteSettingClass.php");

    $sitesettingObj = new SiteSetting;  
    $sitesettingObj->GetSitesetting();   
    $cb_page_cost =  $sitesettingObj->cb_page_cost; 
    $days_cb_page_last =  $sitesettingObj->days_cb_page_last; 
    



$page_content=read_template("$CONFIG->templatedir/buy_cb_page.php");


$page_content=str_replace("cb_page_cost",$cb_page_cost,$page_content);
$page_content=str_replace("days_cb_page_last",$days_cb_page_last,$page_content);


$page_content=str_replace("%firstname%",$_SESSION["user"]["firstname"],$page_content);

$page_content=str_replace("%lastname%",$_SESSION["user"]["lastname"],$page_content);

$page_content=str_replace("%username%",$_SESSION["user"]["username"],$page_content);




//$page_content=str_replace("ADMIN VENMO USERNAME GOES HERE",$admin_detail['username'],$page_content);
$page_content=str_replace("ADMIN VENMO USERNAME GOES HERE", '' ,$page_content);
$page_content=str_replace("admin_venmo",$admin_detail['venmo_username'],$page_content);







$page_content=str_replace("THE BUYER'S EZ-MONEYMAKER.COM USERNAME GOES HERE",$_SESSION["user"]["username"],$page_content);


include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>