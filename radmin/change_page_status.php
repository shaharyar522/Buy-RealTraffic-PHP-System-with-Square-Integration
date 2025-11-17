<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Edit Users";

include("$CONFIG->templatedir/header.php");





include("$CONFIG->templatedir/SiteSettingClass.php");

    $sitesettingObj = new SiteSetting; 
    $sitesettingObj->GetSitesetting();   
    $day =  $sitesettingObj->days_cb_page_last; 

$cb_purchase_date =  date('Y-m-d H:i:s');
$cb_expire_date =   date('Y-m-d H:i:s', strtotime($day."day"));






if(!isset($_POST['term'])){
$page_content="<fieldset class=text>
<legend>Please enter the username here</legend>
<br><div align=center class=text>
<form action=\"".my_name()."?action=edit\" method=post class=text>
<input type=text name=term class=input><br><br>

 Status: <select id = cb_page_status name =cb_page_status>
  <option value=Active>Active</option>
  <option value=Disabled>Disabled</option>
</select> 
<br><br>
<input type=submit value=Enter class=button>
<br><br><br>
</form>
</div>
</fieldset>";}
else{
$frm=$_POST;
if($_GET['action']=='edit'){
$term = $_POST['term'];    
$cb_page_status = $_POST['cb_page_status'];   
$l=db_num_rows(db_query("select * from users where username='$term'"));


if($l<1){$page_content="<div align=center class=text><br>Username not found!!!<br><br></div>";}
else{$fill=db_fetch_array(db_query("select * from users where username='$term'"));





$l=$query = db_query("update users set cb_page_status='".$cb_page_status."'   , cb_purchase_date = '$cb_purchase_date',  cb_expire_date = '$cb_expire_date'   where  username='$term'  ");

//$l=$query = db_query("update users set cb_page_status='".$cb_page_status."'     where  username='$term'  ");


if($l==1){ //mail section strats
   $page_content="<div align=center class=text><br>Page status is updated :".$frm['cb_page_status']."<br></div>";
                  if(  $frm['cb_page_status']=='Active'  ){ //Active start
                      
                      
                       $to =$fill['email'];
                      // $to ='satyajeet.kesharia@gmail.com';
                       $subject = $fill['firstname'].", Your ClickBank Money Page is Now Active!";
                       
$clickable = 'http://www.ez-moneymaker.com/cb.php?cb_nickname='.$fill['cb_nickname'];                       
	               $message = "<html><head><title>EMAIL TO SPONSOR</title></head>
	               <body>";
	               
	               
	               
$message .= "Hi ";
$message .= $fill['firstname'];
$message .= ",<br><br>
Mike here.  Just a short note to let you know your ClickBank Money Page 
<br>
is now Active. Below is the url to your ClickBank Money Page.
<br><a href='http://www.ez-moneymaker.com/cb.php?cb_nickname=";

$message .=$fill['cb_nickname'];

$message .="'>$clickable</a> <br>
Use this url to promote your page and earn commissions from ClickBank.
<br><br>
To see the stats of your Money Page, login into your EZMM account and 
<br>
click on the CB Page Stats ";


//$message .="  <a href='https://www.ez-moneymaker.com/rusers/cb_page_stats.php'> CB Page Stats </a>";

$message .="link underneath 'Stats'.  To add your 10 text
<br>
ads to your CB Money Page, click on the CB Text Ads ";


//$message .="  <a href='https://www.ez-moneymaker.com/rusers/cb_textad.php'> CB Text Ads </a>";

$message .="link under 
<br>
'Banners & Text Ads'.  If you have questions, please write us back.
<br><br>
To Your Success,
<br><br>
Mike
<br>
Admin
<br>
EZ-MoneyMaker.com
<br>

<a href='http://www.ez-moneymaker.com'>Click Here To Log Into Your EZMM Account</a> 
	
	            </body>
	             </html>";	               
	               
	               
	               
	               
	/*
	               $message .= "Hi ";
                       $message .= $fill['firstname'];
                       $message .= ",<br><br>
Mike here.  Just a short note to let you know your ClickBank Money Page 
<br>
is now Active. Below is the url to your ClickBank Money Page.
<br>
http://www.ez-moneymaker.com/cb.php?cb_nickname=";

$message .=$fill['cb_nickname'];

$message .="<br>
Use this url to promote your page and earn commissions from ClickBank.
<br><br>
To see the stats of your Money Page, login into your EZMM account and 
<br>
click on the CB Page Stats ";


//$message .="  <a href='https://www.ez-moneymaker.com/rusers/cb_page_stats.php'> CB Page Stats </a>";

$message .="link underneath 'Stats'.  To add your 10 text
<br>
ads to your CB Money Page, click on the CB Text Ads ";


//$message .="  <a href='https://www.ez-moneymaker.com/rusers/cb_textad.php'> CB Text Ads </a>";

$message .="link under 
<br>
'Banners & Text Ads'.  If you have questions, please write us back.
<br><br>
To Your Success,
<br><br>
Mike
<br>
Admin
<br>
EZ-MoneyMaker.com
<br>

<a href='http://www.ez-moneymaker.com'>Click Here To Log Into Your EZMM Account</a> 
	
	            </body>
	             </html>";
*/
                    	$headers = "MIME-Version: 1.0" . "\r\n";
	                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                         $headers .= 'From: '.$CONFIG->sitename.' <'.$CONFIG->support.'>' . "\r\n";
//$headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";
                        mail($to,$subject,$message,$headers);


                  }//Active end
      
      







if(  $frm['cb_page_status']=='Disabled'  ){ //Disabled start
                       $to =$fill['email'];
                       
                       $subject = $fill['firstname'].", Your ClickBank Money Page is Now Disabled!";
	               $message = "<html><head><title>EMAIL TO SPONSOR</title></head>
	               <body>";
	
	               $message .= "Hi ";
                       $message .= $fill['firstname'];
                       $message .= ",<br><br>

Mike here.  Just a short note to let you know your ClickBank Money Page 
<br>
is now Disabled.  If you would like to purchase another CB Money Page,
<br>
Please log into your EZMM account to do so. If you have questions, 
<br>
please write us back.


<br><br>
To Your Success,
<br><br>
Mike
<br>
Admin
<br>
EZ-MoneyMaker.com
<br>

<a href='http://www.ez-moneymaker.com'>Click Here To Log Into Your EZMM Account</a>  
	
	            </body>
	             </html>";

                    	$headers = "MIME-Version: 1.0" . "\r\n";
	                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                         $headers .= 'From: '.$CONFIG->sitename.' <'.$CONFIG->support.'>' . "\r\n";
//$headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n";
                        mail($to,$subject,$message,$headers);


                  }//Disabled end













         } //mail section ends


}
}

}
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>



