<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Promote tools";
include("$CONFIG->templatedir/header.php");





$page_content="

<div width=\"100%\">

<table align=\"center\" class=\"shadowed\" class=\"text\" width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"10\" cellspacing=\"10\" border=\"0\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">

<tr><td>
<br><br>

<table align=\"center\" class=\"shadowed\" class=\"text\" width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"10\" cellspacing=\"10\" border=\"1\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\" height=\"300\">




<tr><td align=center width=625> <b>Your $CONFIG->sitename Referral URLs Are:</b></td></tr>

<tr><td>

<a href=$CONFIG->siteurl/promo.php?from=".$_SESSION["user"]["username"]." target=_blank>$CONFIG->siteurl/promo.php?from=".$_SESSION["user"]["username"]."</a>


<br>
</td></tr>


<!-- <tr><td>Splash Page 1 Coming Soon <br> </td></tr> -->
<tr><td><a href=\"https://www.ez-moneymaker.com/splash1.php?username=".$_SESSION["user"]["username"]."\"target=_blank>           https://www.ez-moneymaker.com/splash1.php?username=".$_SESSION["user"]["username"]."            </a> <br> </td></tr>


<!--<tr><td>Splash Page 2 Coming Soon <br> </td></tr> -->
<tr><td><a href=\"https://www.ez-moneymaker.com/splash2.php?username=".$_SESSION["user"]["username"]."\"target=_blank>         https://www.ez-moneymaker.com/splash2.php?username=".$_SESSION["user"]["username"]."           </a><br> </td></tr>


<!--<tr><td>Splash Page 3 Coming Soon <br> </td></tr> -->
<tr><td><a href=\"https://www.ez-moneymaker.com/splash3.php?username=".$_SESSION["user"]["username"]."\"target=_blank>         https://www.ez-moneymaker.com/splash3.php?username=".$_SESSION["user"]["username"]."          </a><br> </td></tr>


<!--<tr><td>Splash Page 4 Coming Soon <br> </td></tr> -->
<tr><td><a href=\"https://www.ez-moneymaker.com/splash4.php?username=".$_SESSION["user"]["username"]."\"target=_blank>         https://www.ez-moneymaker.com/splash4.php?username=".$_SESSION["user"]["username"]."           </a> <br> </td></tr>


<!--<tr><td>Splash Page 5 Coming Soon <br> </td></tr> -->
<tr><td><a href=\"https://www.ez-moneymaker.com/splash5.php?username=".$_SESSION["user"]["username"]."\"target=_blank>         https://www.ez-moneymaker.com/splash5.php?username=".$_SESSION["user"]["username"]."             </a><br> </td></tr>




</table>

<br><br>
</td></tr></table>


</div>








<br><br>






<table align=\"center\" class=\"shadowed\" class=\"text\" width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"10\" cellspacing=\"10\" border=\"0\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">


<tr><td width=650>

<br><br>

<table align=\"center\" class=\"shadowed\" class=\"text\" width-\"80%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"10\" cellspacing=\"10\" border=\"1\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">


<tr><td>

<br><br>

<div align=center class=text>
<h3>Banners To Promote</h3></div>

Below are banners you can use to get referrals.  To use these banners on your site, please
copy the banner code above the banner and paste that code on your site.
<div align=center class=text>

<br><br>

<textarea cols=55 rows=3 readonly>
<a href=https://www.ez-moneymaker.com/promo.php?from=".$_SESSION["user"]["username"]." target=_blank>
<img src=https://www.ez-moneymaker.com/images/banner1.gif border=0> </a>
</textarea>

<a href=https://www.ez-moneymaker.com/promo.php?from=".$_SESSION["user"]["username"]." target=_blank><img src=https://www.ez-moneymaker.com/images/banner1.gif border=0></a>


</div>

</td></tr>


<tr><td>
<br><br>

<div align=center class=text>

<br><br>

<textarea cols=55 rows=3 readonly>
<a href=https://www.ez-moneymaker.com/promo.php?from=".$_SESSION["user"]["username"]." target=_blank>
<img src=https://www.ez-moneymaker.com/images/banner2.gif border=0> </a>
</textarea>

<a href=https://www.ez-moneymaker.com/promo.php?from=".$_SESSION["user"]["username"]." target=_blank><img src=https://www.ez-moneymaker.com/images/banner2.gif border=0></a>


</div>

</td></tr>



<tr><td>

<br><br>

<div align=center class=text>


<br><br>

<textarea cols=55 rows=3 readonly>
<a href=https://www.ez-moneymaker.com/promo.php?from=".$_SESSION["user"]["username"]." target=_blank>
<img src=https://www.ez-moneymaker.com/images/banner3.gif border=0> </a>
</textarea>

<a href=https://www.ez-moneymaker.com/promo.php?from=".$_SESSION["user"]["username"]." target=_blank><img src=https://www.ez-moneymaker.com/images/banner3.gif border=0></a>


</div>


</td></tr>



<tr><td>
<br><br>

<div align=center class=text>


<br><br>

<textarea cols=55 rows=3 readonly>
<a href=https://www.ez-moneymaker.com/promo.php?from=".$_SESSION["user"]["username"]." target=_blank>
<img src=https://www.ez-moneymaker.com/images/banner4.gif border=0> </a>
</textarea>

<a href=https://www.ez-moneymaker.com/promo.php?from=".$_SESSION["user"]["username"]." target=_blank><img src=https://www.ez-moneymaker.com/images/banner4.gif border=0></a>


</div>

<br><br>

</td></tr></table>
<br><br>

</td></tr></table>

</td></tr></table>






<br><br>






























";
$page_content.=grab_content("promote");
$page_content=html_entity_decode(stripslashes($page_content));
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>