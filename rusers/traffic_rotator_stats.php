<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Get Traffic";
include("$CONFIG->templatedir/header.php");

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

function getData(strURL) {      


var x=window.confirm("Are You Sure You Want To Reset Visitors Received?")
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




if(!isset($_GET['page'])){ 
    $page = 1; 
} else { 
    $page = $_GET['page']; 
} 
$max_results = 10; 
$from = (($page * $max_results) - $max_results);
$title="Search user ";


$total_results_msg = mysqli_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(*) as Num FROM members_ads   where username='".$_SESSION["user"]["username"]."' "), 0); 


$total_results = mysqli_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(*) as Num FROM members_ads "), 0); 

$total_pages = ceil($total_results / $max_results); 
$from1=$from+1;
$to=$from+$max_results;


if (! isset($page_content)) {
    $page_content = '';
}


$page_content .='<table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="25" cellspacing="0" border="0" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>   


<tr><td>

<center><h3>Your Traffic Rotator Stats</h3></center>
<br>
';

if(  $total_results_msg !=0   ){
     $page_content .='<b>'.$_SESSION["user"]["firstname"].'</b>, below are your stats.  These are the number of visitors
we have sent to your EZMM Referral URL so far. <br> NOTE:  You can have more than 1 referral url in rotation.
If you would like to purchase additional rotation positions, click on the "Get Traffic" link under "Paid Services" above.';
}
else{
    $page_content .='<span style=\'color:red\'><bkockquote>'.$_SESSION["user"]["firstname"].', Your EZ-MoneyMaker Referral url is not in rotation. If you would like for us to advertise your EZ-MoneyMaker referral url and build your downline
for you, please click on the \'Get Traffic\' link under \'Paid Services\' above for details.</blockquote>
   </span>';
}

$page_content .='

   </td>
        </tr>
        
        <tr><td>';
        
        


if($total_results==0){$page_content.="<div class=text align=center><br><br><strong>No records found.</strong></div>
<br>";}
else{
if($to > $total_results){$to=$total_results;}

$page_content.=
"<table align=\"center\" class=\"shadowed\" class=text width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">


  <tr id=heading> 
    
    <td align=center><b>Your Username</b></td>
    <td align=center><b>Your EZMM Referrral Url</b></td>

    <td align=center><b>Visitors Received</b></td>
  <td align=center><b>Reset Visitors Received</b></td>
  
  <td align=center><b>Purchase Date</b></td>
  <td align=center><b>Url Status</b></td>
  <td align=center><b>Expiration Date</b></td>
  
  
  </tr>";
  //echo "select * from members_ads      where username='".$_SESSION["user"]["username"]."'     ORDER BY id DESC  LIMIT $from, $max_results "; die;
  $id=$from1;
$q= db_query("select * from members_ads      where username='".$_SESSION["user"]["username"]."'     ORDER BY id DESC  LIMIT $from, $max_results ");
while($r=db_fetch_array($q)){
$id%2?$fundal="#9DC7F2":$fundal="#E0E0E0";
$page_content.="<tr bgcolor=$fundal><td align=center>".$r["username"]."</td>
<td>".$r["url"]."</td>
<td align=center>".$r["views"]."</td>

<td align=center> <input name=button type=button value=Reset onClick=getData('https://www.ez-moneymaker.com/rusers/member_ads_view_reset.php?id={$r['id']}')>

<td align=center>".$r["rotator_purchase_date"]."</td>
<td align=center>".$r["url_status"]."</td>
<td align=center>".$r["rotator_expire_date"]."</td>
</td>

</tr>";$id++;
}
$page_content.=" </table>";


}


   $page_content .=' </td></tr></table>';



include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>