<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Member ads";
?>


<script>
function getXMLHTTP() { //fuction to return the xml http object
    var xmlhttp=false;  
    try{
        xmlhttp=new XMLHttpRequest();
    }
    catch(e)    {       
        try{            
            xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch(e){
            try{
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch(e1){
                xmlhttp=false;
            }
        }
    }       
    return xmlhttp;
}

function getData(strURL,alert_url) {    





var x=window.confirm("Are You Sure You Want To Delete The Following Url : "+alert_url)
if (x)
{





 
 
 
 
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {     location.reload();                     
            document.getElementById('divResult').innerHTML=req.responseText;                        
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }               
        }           
        req.open("GET", strURL, true); 
        req.send(null);
        
        }
        
        
        
        
        
        
        
        
        
        
 }
 else
    window.alert("OK")       
        
    }
</script>




  	

<?
include("$CONFIG->templatedir/header.php");


$sql = "SELECT days_url_rotator_last  FROM url_site_setting";
$results = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$row = mysqli_fetch_array($results);
$days_url_rotator_last = $row['days_url_rotator_last'];



if(!isset($_GET['page'])){ 
    $page = 1; 
} else { 
    $page = $_GET['page']; 
} 
$max_results = 10; 
$from = (($page * $max_results) - $max_results);
$title="Search user ";








if(   isset($term)  && $term!= null   && $_POST['randcheck']==$_SESSION['rand'] ){    //echo "<pre>"; print_r($_POST['term']); die;

$satya_check_user=mysqli_query($GLOBALS["___mysqli_ston"], "select username from users  where username='".$term."'");
	$rss_check = mysqli_fetch_array($satya_check_user);
	if(   isset($rss_check["username"]) && $rss_check["username"] !=null    ){
	
$check="yes";
//db_query("INSERT INTO members_ads (username , url , clicks , views )  VALUES ( '".$term."', 'https://www.ez-moneymaker.com/promo.php?from=".$term."','' ,'' )");



    $d_t=date('Y-m-d h:i:s a', time());
    $date1 = date('Y-m-d h:i:s a', strtotime( $days_url_rotator_last." day", strtotime($d_t)));
    db_query("INSERT INTO members_ads (username , url , clicks , views ,rotator_purchase_date,url_status,rotator_expire_date)  VALUES ( '".$term."', 'https://www.ez-moneymaker.com/promo.php?from=".$term."','' ,''    ,'".$d_t."','Active','".$date1."'    )");

	} else { $check="no"; }

	




//sssssssssssssssss



 

$satya=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users  where username='".$term."'");  
	$rss = mysqli_fetch_array($satya);
	
	$to =$rss["email"];
	
	
	$subject = $rss["firstname"].", Your EZMM Referral Url is Now in Rotation";
	
	$message = "
	<html>
	<head>
	<title>EMAIL TO USER WHOSE URL WAS JUST ADDED</title>
	</head>
	<body>
	
	Hi ";
	$message .= $rss["firstname"];
	$message .=",<br><br>
	Mike here.  Just a short note to Thank Your for purchasing a Traffic Rotator slot.
<br>
Your EZ-MoneyMaker referral url is now in rotation.  Your referral url will remain in rotation 
<br>
for ";


$message .= $days_url_rotator_last;

$message .=" days.  To check your stats, log into your account and click on the Traffic
<br>
Rotator Stats link under the Stats tab.  Again, thanks for trusting us and you can be sure that
<br>
REAL people will visit your site.  If you have questions, please write us back.
<br><br>
Sincerely,
<br><br>
Mike
<br>
<a href=https://www.ez-moneymaker.com>http://www.ez-moneymaker.com</a>   ";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	
	// More headers
//	$headers .= 'From: <satyajeet.kesharia@gmail.com>' . "\r\n";
        $headers .= 'From: '.$CONFIG->sitename.' <'.$CONFIG->support.'>' . "\r\n";
        // $headers .= 'Cc: satyajeet.kesharia@gmail.com' . "\r\n"; //to be commented
	
                                                        	    //if(   empty($_POST['txn_id']) || $_POST['payment_status'] !='Completed'  ){
                                                        	   if(  isset($rss_check["username"]) && $rss_check["username"] !=null  ){
                                                        	           mail($to,$subject,$message,$headers);    
                                                        	    }






//sssssssssssssssss
}


$total_results = mysqli_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(*) as Num FROM members_ads "), 0); 

$total_pages = ceil($total_results / $max_results); 
$from1=$from+1;
$to=$from+$max_results;
if($total_results==0){$page_content.="<div class=text align=center><br><br><strong>No records found.</strong></div>
<br><br><br>";}
else{
if($to > $total_results){$to=$total_results;}








   $rand=rand();
   $_SESSION['rand']=$rand;
  echo    $_SESSION['rand'];

$page_content="<fieldset class=text>
<legend>Please enter the Member's ads</legend>
<br><div align=center class=text>
<form action=".my_name()." method=post class=text>
<input type=text name=term class=input><br>



 <input type=hidden value=".$rand." name=randcheck><br>

<input type=submit value=Submit class=button>
<br><br>Member ads list<br>
</form>
</div>
</fieldset>";





$page_content .="<div id=\"divResult\">";
  if( isset($check) && $check=="no" )

$page_content .= "That Username Does Not Exist!";
$page_content .= "</div>";






$page_content.=
"<fieldset><legend class=text>Records $from1 -$to of $total_results</legend>
<table class=text width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\" bgcolor=\"#d8ecff\">
  <tr id=heading> 
    
    <td><b>User Name</b></td>
    <td><b>Url</b></td>

    <td><b>Visitors Received</b></td>
    
    <td><b>Purchase Date</b></td>
    <td><b>Url Status</b></td>
    <td><b>Expiration Date</b></td>
    
	<td><b>Delete</b></td>
  </tr>";
  $id=$from1;
$q= db_query("select * from members_ads  ORDER BY id DESC  LIMIT $from, $max_results ");
while($r=db_fetch_array($q)){
$id%2?$fundal="#9DC7F2":$fundal="#E0E0E0";
$page_content.="<tr bgcolor=$fundal><td>".$r["username"]."</td>
<td>".$r["url"]."</td>
<td align=center>".$r["views"]."</td>


<td align=center>".$r["rotator_purchase_date"]."</td>
<td align=center>".$r["url_status"]."</td>
<td align=center>".$r["rotator_expire_date"]."</td>



<td> <input name=button type=button value=Delete onClick=getData('https://www.ez-moneymaker.com/radmin/member_ads_del.php?id={$r['id']}','{$r['url']}')>
</td>

</tr>";$id++;
}
$page_content.=" </table></fieldset>";


 $page_content.= "<div align=center class=text>Select a Page<br />"; 

if($page > 1){ 
    $prev = ($page - 1); 
    $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?page=$prev\"><strong>Previous </strong></a>&nbsp;"; 
} 

for($i = 1; $i <= $total_pages; $i++){ 
    if(($page) == $i){ 
        $page_content.= "$i&nbsp;"; 
        } else { 
            $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?page=$i\"><strong>$i</strong></a>&nbsp;"; 
    } 
} 

// Build Next Link 
if($page < $total_pages){ 
    $next = ($page + 1); 
    $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?page=$next\"><strong>Next>></strong></a>"; 
} 
 $page_content.= "</center>"; 

}

include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>

