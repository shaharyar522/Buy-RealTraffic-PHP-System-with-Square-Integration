<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Buy ClickBank Money Page Stats";
include("$CONFIG->templatedir/header.php");




$fill=db_fetch_array(db_query("select * from users where username='".$_SESSION["user"]["username"]."'"));

$page_content=read_template("$CONFIG->templatedir/cb_page_stats.php");

function get_color($satt_status){ 
if( $satt_status=='Disabled' ) return "<span style='color:red'>"; else  return "<span style='color:green'>";
}


$page_content=str_replace("%firstname%",$fill["firstname"],$page_content);
//             $page_content =str_replace("(THE MEMBERS CB_PAGE_STATUS PAGE STATUS GOES HERE)",$fill["cb_page_status"],$page_content);

$page_content =str_replace("(THE MEMBERS CB_PAGE_STATUS PAGE STATUS GOES HERE)",
get_color($fill["cb_page_status"]).$fill["cb_page_status"]."</span>",$page_content);









if(  $fill["cb_page_status"] == 'Disabled' ){
$page_content =str_replace('Your CB Money Page URL is:  
<br>
<b>
<a target="_blank" href="http://www.ez-moneymaker.com/cb.php?cb_nickname=(THE MEMBERS CB_NICKNAME GOES HERE link1)">
   http://www.ez-moneymaker.com/cb.php?cb_nickname=(THE MEMBERS CB_NICKNAME GOES HERE link2)
</a>
</b>
<br><br>
Use this URL to promote your CB Money Page and earn commissions through ClickBank.<br><br>Below are the number of Hits your CB Money Page has received.  To check your commissions and sales, you will need to
log into your ClickBank account.  <a href="https://accounts.clickbank.com/login.htm" target="_blank">Click Here</a> to log into your ClickBank account.',    
'<span style=\'color:red\'>Note: there should be no data in the table if a member’s cb page status is Disabled.</span>',
 $page_content);
                                             }












$page_content=str_replace("(THE MEMBERS CB_NICKNAME GOES HERE link1)",$fill["cb_nickname"],$page_content);
$page_content=str_replace("(THE MEMBERS CB_NICKNAME GOES HERE link2)",$fill["cb_nickname"],$page_content);




if(  $fill["cb_page_status"] == 'Active' ){
$page_content=str_replace('<td align="center" id="id1"></td>', '<td align="center" id="id1">'.$fill["cb_nickname"].'</td>' ,$page_content);
$page_content=str_replace('<td align="center" id="id2"></td>', '<td align="center" id="id1">http://www.ez-moneymaker.com/cb.php?cb_nickname='.$fill["cb_nickname"].'</td>' ,$page_content);
$page_content=str_replace('<td align="center" id="id3"></td>', '<td align="center" id="id1">'.$fill["cb_page_hits"].'</td>' ,$page_content);
}

if(  $fill["cb_page_status"] == 'Disabled' ){
$page_content=str_replace('<td align="center" id="id1"></td>', '<td align="center" id="id1"></td>' ,$page_content);
$page_content=str_replace('<td align="center" id="id2"></td>', '<td align="center" id="id1"></td>' ,$page_content);
$page_content=str_replace('<td align="center" id="id3"></td>', '<td align="center" id="id1"></td>' ,$page_content);
}




include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");