<?
include'config.php';
$title="opt out page";


include("$CONFIG->templatedir/header.php");
$base_url='https://www.ez-moneymaker.com';

//echo $_REQUEST['user_id']; die;

$id = base64_decode($_REQUEST['user_id'] ?? '');    

$action_url = $base_url.'/opt_out.php?user_id='.($_REQUEST['user_id'] ?? '').'&confirm=yes';  
$cancel_url = $base_url.'/login.php';

if (! isset($popup)) {
	$popup = '';
}

if(isset($_REQUEST['user_id']) && $_REQUEST['user_id'] != "" && isset($_REQUEST['confirm']) && $_REQUEST['confirm'] == 'yes')

{
	$popup='close';

	$query = "SELECT * FROM users WHERE id = ".$_REQUEST['user_id'];

	$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);	
	if(mysqli_num_rows($result) > 0){

		$value = mysqli_fetch_object($result);
	}

	 $name=$value->firstname;
         $username=$value->username;

/////////delete query


	//delete member
        if(  isset($_REQUEST['user_id']) && $_REQUEST['user_id'] != null &&  isset($username)  && $username!=null ){
	 $sql_req = "DELETE FROM banners  WHERE username = '$username' "; 
        $res_req = mysqli_query($GLOBALS["___mysqli_ston"], $sql_req)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_req);

	//site-points list

	 $ups_del = "DELETE FROM cb_textads WHERE  username = '$username' "; 
	 $ups_del = mysqli_query($GLOBALS["___mysqli_ston"], $ups_del) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ups_del);

	//remove pts-----------

	$sql_rem = "SELECT sid FROM url_login_sites  WHERE user_id = '$username' ";


	$res_rem = mysqli_query($GLOBALS["___mysqli_ston"], $sql_rem)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_rem);

	$num_rem = mysqli_num_rows($res_rem);

	if($num_rem > 0){

	  while($row_rem = mysqli_fetch_array($res_rem)){	 

		   $sql_xx = "DELETE FROM url_login_clicks  WHERE site_id = '{$row_rem['sid']}'";

		     $res_xx = mysqli_query($GLOBALS["___mysqli_ston"], $sql_xx)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_xx);

	

	  }//endwhile

	}//End-num

	


        $ups_del_hits = "DELETE FROM hits WHERE  username = '$username' "; 
	$ups_del_hits = mysqli_query($GLOBALS["___mysqli_ston"], $ups_del_hits) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ups_del_hits); 



	 $ups_del_mem = "DELETE FROM members_ads WHERE  username = '$username' "; 
	 $ups_del_mem = mysqli_query($GLOBALS["___mysqli_ston"], $ups_del_mem) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ups_del_mem); 



	 $ups_del = "DELETE FROM textads WHERE  username = '$username' "; 
	        $ups_del = mysqli_query($GLOBALS["___mysqli_ston"], $ups_del) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ups_del);


	  $sql = "DELETE FROM url_login_sites  WHERE user_id = '$username' ";

	  $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);

	

	  $res = "DELETE from users WHERE username = '$username' ";  
	  @mysqli_query($GLOBALS["___mysqli_ston"], $res) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$res);

	

	  $sql = "DELETE FROM url_login_transactions  WHERE user_id = '$username' ";
	  $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);

	

	 $res = "DELETE from url_unassigned_login_credits WHERE user_id = '$username' " ; 
         @mysqli_query($GLOBALS["___mysqli_ston"], $res) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$res);
        }

/////////delete query

}

?>




<? if (isset($popup) && $popup != 'close'){ ?>
<link href="popup/popup.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="popup/popup.js" type="text/javascript"></script>
   
   <div id="overlay-back"></div>
<div id="popup">
<div class="cancle">X</div>
<h1>Confirmation</h1>
<h3>Are You Sure You Want To Delete Your Account?</h3>
<a class="yes-del" href="<? echo $action_url ?>" style="float: left;">Yes</a><a class="no-del" href="<?
 echo $cancel_url ?>">No</a>
</div>
<? } ?>






<?

 if(   isset($name) && $name!=null   ){
  $page_content=read_template("$CONFIG->templatedir/opt_out.php");
  $page_content  =str_replace("{name}",$name,$page_content);
}








include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>





   