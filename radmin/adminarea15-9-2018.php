<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename ADMIN Area";
?>



  	

<?
include("$CONFIG->templatedir/header.php");
$page_content="<div align=center class=text>Last login on ".$_SESSION['ADMIN']["admin"]["lastlogin"]."
from ".$_SESSION['ADMIN']["admin"]["last_ip"]."<br>

<br><strong>Welcome to the admin area.</strong><br><br>You can manage from here your users , view detailed stats about the site ,and change the content for some pages.<br>
<font color=red>Important:</font>
You should change your  password often and make it hard to guess.<br>

</div>";

include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>





    