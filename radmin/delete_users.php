<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Delete User";
?>




  	

<?
include("$CONFIG->templatedir/header.php");
if(!isset($term)){
$page_content="<fieldset class=text>
<legend>Please enter the username here</legend>
<br><div align=center class=text>
<form action=\"".my_name()."?action=delete\" method=post class=text>
<input type=text name=term class=input><br>
<input type=submit value=Delete class=button>
<br><br><br>
</form>
</div>
</fieldset>";}
else{
$frm=$_POST;
if($action=='delete'){
$l=db_num_rows(db_query("select * from users where username='$term' and id<>'1'"));
if($l<1){$page_content="<div align=center class=text><br>Username not found!!!<br><br></div>";}
else{$fill=db_fetch_array(db_query("select * from users where username='$term'"));
$page_content=read_template("$CONFIG->templatedir/admin.deleteusers.php");
$page_content=str_replace("#username#",$fill["username"],$page_content);
$page_content=str_replace("#password#",$fill["password"],$page_content);
$page_content=str_replace("#email#",$fill["email"],$page_content);
$page_content=str_replace("#firstname#",$fill["firstname"],$page_content);
$page_content=str_replace("#lastname#",$fill["lastname"],$page_content);
$page_content=str_replace("#sponsor#",$fill["sponsor"],$page_content);
$page_content=str_replace("#term#",$term,$page_content);
$page_content=str_replace("#stormpay#",$fill["stormpay"],$page_content);
$page_content=str_replace("#assuredpay#",$fill["assuredpay"],$page_content);
$page_content=str_replace("#paypal#",$fill["paypal"],$page_content);
$page_content=str_replace("#egold#",$fill["egold"],$page_content);
$page_content=str_replace("#libertyreserve#",$fill["libertyreserve"],$page_content);
$page_content=str_replace("#solidtrustpay#",$fill["solidtrustpay"],$page_content);
$page_content=str_replace("#fleetpay#",$fill["fleetpay"],$page_content);
$page_content=str_replace("#moneybookers#",$fill["moneybookers"],$page_content);
$page_content=str_replace("#dollardeliverys#",$fill["dollardeliverys"],$page_content);
}
}
elseif($action=='now'){
$page_content="<div align=center class=text><ul>";


$q=db_query("delete from users where username='$term'") ;
if($q){$page_content.="<li>User account removed from the database.</li>";}


$q_banner=db_query("delete from banners where username='$term'") ;
if($q_banner){$page_content.="<li>User banners removed from the database.</li>";}


$q_textAd=db_query("delete from textads where username='$term'") ;
if($q_textAd){$page_content.="<li>User Text Ads removed from the database.</li>";}

$q_random_referrals=db_query("delete from random_referrals where username='$term'") ;
if($q_random_referrals){$page_content.="<li>User referrals removed from the database.</li>";}






$q1=db_query("delete from hits where username='$term'");
if($q1){$page_content.="<li>Hits to user page removed from the database.</li>";}
$page_content.="</ul><br>Account removed succesfully.<br><br>";

$q2=db_query("delete from chances where username='$term'");
if($q2){$page_content.="<li>User chances  removed from the database.</li>";}
$c=db_fetch_array(db_query("select * from chances where username='$term'"));
$cid=$c['id'] ?? '';
$chances_start=$c['start'] ?? 0;
$chances_finish=$c['finish'] ?? 0;
$chances_nr=$chances_finish-$chances_start+1;
$n=db_fetch_array(db_query("select count(*) as cnt from chances where id > '$cid'"));

//        db_query("update chances set start =start-".$chances_nr.",finish=finish-".$chances_nr." where id >'$cid'");   // 20 may 2018
          db_query("update chances set start =start-".$chances_nr.",finish=finish-".$chances_nr." where id ='$cid'"); 
}
}
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>


