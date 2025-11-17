<?
include '../config.php';
require_login_admin();
$title="$CONFIG->sitename ADMIN Area";
?>



  	

<?
include("$CONFIG->templatedir/header.php");
$page_content="<div align=center class=text>";


    $sql = "SELECT COUNT(sid) as login_sites FROM url_login_sites WHERE status='W'";
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $row = mysqli_fetch_array($res);
    $login_sites = $row['login_sites'];



if($login_sites == 0){
  $page_content .="<span style=font-size:15px; >There are No Login sites waiting for approval</span>";
                     }
else{
      $page_content .="<span style=font-size:18px;>There are ";  
      $page_content .= $login_sites;
      $page_content .=" Login sites waiting for approval</span>";
}
  $page_content .="<br><br>";







    $sql = "SELECT COUNT(sid) as traffic_sites FROM traffic_sites WHERE status='W'";
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $row = mysqli_fetch_array($res);
    $traffic_sites = $row['traffic_sites'];



if($traffic_sites == 0){
  $page_content .="<span style=font-size:15px; >There are No Traffic sites waiting for approval</span>";
                     }
else{
      $page_content .="<span style=font-size:18px;>There are ";  
      $page_content .= $traffic_sites;
      $page_content .=" Traffic sites waiting for approval</span>";
}
  $page_content .="<br><br>";








$page_content .="Last login on ".$_SESSION['ADMIN']["admin"]["lastlogin"]."
from ".$_SESSION['ADMIN']["admin"]["last_ip"]."<br>

<br><strong>Welcome to the admin area.</strong><br><br>You can manage from here your users , view detailed stats about the site ,and change the content for some pages.<br>
<font color=red>Important:</font>
You should change your  password often and make it hard to guess.<br>

</div>";

include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>





    