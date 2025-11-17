<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Edit Users";
?>



  	

<?
include("$CONFIG->templatedir/header.php");

$term=$_REQUEST['ud']; 
if( !isset($term) )
{ $term=$_REQUEST['term'];  }



echo $action=$_REQUEST['action'] ?? ''; 
if(  ! isset($action)    )
{ $action='edit'; }



   $unassigned_login_credits_query = "SELECT * FROM url_unassigned_login_credits WHERE user_id = '".$term."'";

     $unassigned_login_credits_result = mysqli_query($GLOBALS["___mysqli_ston"], $unassigned_login_credits_query) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$unassigned_login_credits_query);	

	if(mysqli_num_rows($unassigned_login_credits_result))
	{
	 while($row = mysqli_fetch_array($unassigned_login_credits_result)) 
		 {   $login_credits = $row['login_credits'];	

		 }
	}
	else
	{
		$login_credits = 0;
	}







if(!isset($term)){
$page_content="<fieldset class=text>
<legend>Please enter the username here</legend>
<br><div align=center class=text>
<form action=\"".my_name()."?action=edit\" method=post class=text>
<input type=text name=term class=input><br>
<input type=submit value=Edit class=button>
<br><br><br>
</form>
</div>
</fieldset>";}
else{
$frm=$_POST;
if($action=='edit'){
$l=db_num_rows(db_query("select * from users where username='$term'"));
if($l<1){$page_content="<div align=center class=text><br>Username not found!!!<br><br></div>";}
else{$fill=db_fetch_array(db_query("select * from users where username='$term'"));
$page_content=read_template("$CONFIG->templatedir/admin.edituser_new.php");
$page_content=str_replace("#username#",$fill["username"],$page_content);
$page_content=str_replace("#password#",$fill["password"],$page_content);
$page_content=str_replace("#email#",$fill["email"],$page_content);
$page_content=str_replace("#firstname#",$fill["firstname"],$page_content);
$page_content=str_replace("#lastname#",$fill["lastname"],$page_content);
$page_content=str_replace("#sponsor#",$fill["sponsor"],$page_content);

$page_content=str_replace("#membership_status#",$fill["membership_status"],$page_content);


$page_content=str_replace("#login_credits#",$login_credits,$page_content);


$page_content=str_replace("#cb_nickname#",$fill["cb_nickname"],$page_content);
$page_content=str_replace("#cb_page_status#",$fill["cb_page_status"],$page_content);
$page_content=str_replace("#cb_page_hits#",$fill["cb_page_hits"],$page_content);


$page_content=str_replace("#term#",$term,$page_content);
$page_content=str_replace("#stormpay#",$fill["stormpay"],$page_content);
$page_content=str_replace("#weight#",$fill["weight"],$page_content);
$page_content=str_replace("#paypal#",$fill["paypal"],$page_content);
$page_content=str_replace("#egold#",$fill["egold"],$page_content);
$page_content=str_replace("#libertyreserve#",$fill["libertyreserve"],$page_content);
$page_content=str_replace("#assuredpay#",$fill["assuredpay"],$page_content);
$page_content=str_replace("#solidtrustpay#",$fill["solidtrustpay"],$page_content);
$page_content=str_replace("#fleetpay#",$fill["fleetpay"],$page_content);
$page_content=str_replace("#moneybookers#",$fill["moneybookers"],$page_content);
$page_content=str_replace("#dollardeliverys#",$fill["dollardeliverys"],$page_content);
}
}
elseif($action=='now'){  
// echo "<pre>"; print_r($frm["login_credits"]);  echo "ssss test"; exit;


$unassigned_login_credits_query = "update url_unassigned_login_credits set login_credits = {$frm['login_credits']} WHERE user_id = '".$term."'";
   $unassigned_login_credits_result = mysqli_query($GLOBALS["___mysqli_ston"], $unassigned_login_credits_query) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$unassigned_login_credits_query);





$err=0;
	
	$msg = "<p class=text align=center>The following error(s) occured:<br><ul class=text>";

if (empty($frm["cb_nickname"])) {
		$err=1;
		$msg .= "<li>You did not specify  the  nickname</li>";
	}
if (empty($frm["cb_page_status"]) or $frm["cb_page_status"] !='Disabled' or $frm["cb_page_status"] !='Active'    ) { 
      if(  $frm["cb_page_status"] !='Disabled' and $frm["cb_page_status"] !='Active'   ){
         	$err=1; 
		$msg .= "<li>pagestatus should be either 'Disabled' or 'Active'</li>";  }
	
	}
if (!is_numeric($frm["cb_page_hits"])) {
		$err=1;
		$msg .= "<li>Please enter numeric value</li>";
	}







	 if (empty($frm["password"])) {
		$err=1;
		$msg .= "<li>You did not specify a password</li>";

	} if (empty($frm["firstname"])) {
		$err=1;
		$msg .= "<li>You did not specify  the  firstname</li>";

	} if (empty($frm["lastname"])) {
	$err=1;
		$msg .= "<li>You did not specify  the  lastname</li>";

	} 
	 if (!validate_email($frm["email"])) {
$err=1;
		$msg .= "<li>Invalid email address( ".$frm["email"].") </li>";

	}if ((!validate_email($frm["paypal"]))  and 
	(!validate_email($frm["stormpay"])) and
	(empty($frm["egold"]))  and
	(empty($frm["libertyreserve"]))  and
	(empty($frm["assuredpay"]))
	and (empty($frm["solidtrustpay"]))
	and (empty($frm["fleetpay"]))
	and (empty($frm["dollardeliverys"]))
	and (empty($frm["moneybookers"])))
	
	 {
$err=1;
		$msg .= "<li>You have to specify at least one payment gateway. </li>";

	} 
	
	 if ((strlen($frm["password"])<5)||(strlen($frm["password"])>15)){
		$err=1;
		$msg .= "<li>The password must have minimum 5 characters and maximum 15</li>";

	}
$msg.="</ul>";
	

if($err==0){


$query = db_query("update users set username='{$frm['username']}',  firstname='{$frm['firstname']}' ,lastname='{$frm['lastname']}',  membership_status= '{$frm['membership_status']}' ,

sponsor='{$frm['sponsor']}' ,

 cb_nickname= '{$frm['cb_nickname']}' ,
 cb_page_status= '{$frm['cb_page_status']}' ,
 cb_page_hits= '{$frm['cb_page_hits']}' ,


	email='{$frm['email']}',paypal='{$frm['paypal']}',stormpay='{$frm['stormpay']}',weight='{$frm['weight']}',
	egold='{$frm['egold']}',libertyreserve='{$frm['libertyreserve']}'
	,assuredpay='{$frm['assuredpay']}',solidtrustpay='{$frm['solidtrustpay']}',fleetpay='{$frm['fleetpay']}'
	,dollardeliverys='{$frm['dollardeliverys']}'
	,moneybookers='{$frm['moneybookers']}',password='{$frm['password']}' where  username='{$frm['term']}'");
	$c=db_fetch_array(db_query("select * from chances where username='{$frm['username']}'"));
	$cid=$c['id'];
$chances_start=$c['start'];
$chances_finish=$c['finish'];
$chances_nr=$chances_finish-$chances_start+1;
if((int)($chances_nr)!=(int)($frm["weight"]))
{

if((int)($chances_nr)>(int)($frm["weight"]))
{
$cat=(int)($chances_nr)-(int)($frm["weight"]);
$f1=$frm["weight"]-1;
db_query("update  chances set finish=start+".$f1." where id='$cid'");
db_query("update chances set start=start-$cat,finish=finish-$cat where id>'$cid'");
}
elseif((int)($chances_nr)<(int)($frm["weight"]))
{
$f1=$frm["weight"]-1;
$cat=(int)($frm["weight"])-(int)($chances_nr);
db_query("update chances set finish=start+".$f1."  where id='$cid'");
db_query("update chances set start=start+$cat,finish=finish+$cat where id>'$cid'");
}
}
$page_content="<br><p class=text align=center> The  details have been succesfully updated.<br>
<br><br><br><br><br>";
}
else{$page_content=$msg."<br><p class=text align=center>
Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";}
}
}




//satyajeet 1 sep 2018


function login_site_meet($sid){
    $sel_count = "SELECT visitors_received FROM url_login_clicks WHERE site_id = '$sid'";
    $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);
    $row_count_info = mysqli_fetch_row($res_count);
    return $row_count_info[0];
}//EndFunction





function login_site_balance($sid){
    $sel_count = "SELECT points FROM url_login_clicks WHERE site_id = '$sid'";
    $res_count = mysqli_query($GLOBALS["___mysqli_ston"], $sel_count) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sel_count);
    $row_count_info = mysqli_fetch_row($res_count);
    return $row_count_info[0];
}//EndFunction




	$sql_ssv = "SELECT * FROM url_login_sites WHERE user_id = '$term' order by sid ASC";
	$cntsas = '0';
	$res_ssv = mysqli_query($GLOBALS["___mysqli_ston"], $sql_ssv)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_ssv);


 $num_rem_satt = mysqli_num_rows($res_ssv);


$page_content = "<div align=center><b>#User Login Sites</b><br><br></div>";




$page_content .= " <table border=0  cellpadding=3 cellspacing=0 width=700 align=center >
         <tr >
          <td align=left class='textbld' >Site name</td>
          <td align=left class='textbld' >Site URL</td>
          <td align=left class='textbld' >Visitors<br>Assigned</td>
          <td align=left class='textbld' >Visitors<br>Received</td>
          <td align=left class='textbld' >Status</td>
         </tr>

         <tr><td class='horizontal_dotted_line' colspan=5>&nbsp;&nbsp;</td></tr>";


while($row_ssv = mysqli_fetch_array($res_ssv)) { 


        $page_content .= " <tr>             

		<td align=left  style=word-wrap: break-word width=80>";
 $page_content .= stripslashes($row_ssv['site_name']);
 $page_content .= "</td>

		       <td align=left  style=word-wrap: break-word width=280><a href='login_site_info_approve.php?sd={$row_ssv['sid']}'>";

 $page_content .=stripslashes($row_ssv['site_url']);
 $page_content .="</a></td>
		       <td align=left>";
 $page_content .=login_site_balance($row_ssv[0]);
                     
 $page_content .="  </td>

		       <td align=left >";
 $page_content .= login_site_meet( $row_ssv[0] );
 $page_content .="</td>
               <td align=left >";

if(stripslashes($row_ssv['status'])=='W')
 $page_content .= 'WAITING';

if(stripslashes($row_ssv['status'])=='L')
 $page_content .= 'ACTIVE';

if(stripslashes($row_ssv['status'])=='H')
 $page_content .= 'PAUSED';

if(stripslashes($row_ssv['status'])=='A')
 $page_content .= 'SUSPENDED';



        $page_content .= "</td>

		     </tr>";
}


if(  $num_rem_satt == 0  ) {
$page_content .= " <tr>
		  <td colspan=5 align=center><b><font color=red>No site in list</font></b></td>
	       </tr>";
             }
     
$page_content .="</table>";
//satyajeet 1 sep 2018





include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>



