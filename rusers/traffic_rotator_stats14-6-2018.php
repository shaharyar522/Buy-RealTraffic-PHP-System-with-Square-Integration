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


//$page_content=read_template("$CONFIG->templatedir/traffic_rotator_stats.php");

?>


<?


$page_content .='<table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="25" cellspacing="0" border="0" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>   


<tr><td>
<br>
<center><h3>Your Traffic Rotator Stats</h3></center>
<br><br>
If you are subscribed to our Monthly Traffic Rotator Service, below are your stats.  These are the visitors
we have sent to your EZMM Referral URL so far.





   </td>
        </tr>
        
        <tr><td>';
        
        
        
        
        
        





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
if($total_results==0){$page_content.="<div class=text align=center><br><br><strong>No records found.</strong></div>
<br><br><br>";}
else{
if($to > $total_results){$to=$total_results;}

$page_content.=
"<table align=\"center\" class=\"shadowed\" class=text width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">


  <tr id=heading> 
    
    <td align=center><b>Your Username</b></td>
    <td align=center><b>Your EZMM Referrral Url</b></td>

    <td align=center><b>Visitors Received</b></td>
	<td align=center><b>Reset Visitors Received</b></td>
  </tr>";
  $id=$from1;
$q= db_query("select * from members_ads      where username='".$_SESSION["user"]["username"]."'     ORDER BY id DESC  LIMIT $from, $max_results ");
while($r=db_fetch_array($q)){
$id%2?$fundal="#9DC7F2":$fundal="#E0E0E0";
$page_content.="<tr bgcolor=$fundal><td align=center>".$r["username"]."</td>
<td>".$r["url"]."</td>
<td align=center>".$r["views"]."</td>

<td align=center> <input name=button type=button value=Reset onClick=getData('http://www.ez-moneymaker.com/rusers/member_ads_view_reset.php?id={$r['id']}')>
</td>

</tr>";$id++;
}
$page_content.=" </table>";


if(  $total_results_msg ==0   ){
   $page_content.= "<div align=left class=text> <br />
   <span style=\"color:red\"><bkockquote>


";
$page_content.=$_SESSION["user"]["firstname"];

$page_content.=", Your EZ-MoneyMaker Referral url is not in rotation. If you would like us to advertise your EZ-MoneyMaker referral url and build your downline
for you, please hover over the \"Paid Services\" link above then click on the \"Get Traffic\" link for details.</blockquote>
   </span>
   
   <br />"; 
}

/*
 $page_content.= "<div align=center class=text>Select a Page<br />"; 
 

if($page > 1){ 
    $prev = ($page - 1); 
    $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?term=$term&page=$prev\"><strong>Previous </strong></a>&nbsp;"; 
} 

for($i = 1; $i <= $total_pages; $i++){ 
    if(($page) == $i){ 
        $page_content.= "$i&nbsp;"; 
        } else { 
            $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?term=$term&page=$i\"><strong>$i</strong></a>&nbsp;"; 
    } 
} 

// Build Next Link 
if($page < $total_pages){ 
    $next = ($page + 1); 
    $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?term=$term&page=$next\"><strong>Next>></strong></a>"; 
} 
 $page_content.= "</center>"; 
 
 */

}


   $page_content .=' </td></tr></table>';


/*
if(!isset($term)){
$page_content.="<fieldset class=text>
<legend>Please enter the search term</legend>
<br><div align=center class=text>
<form action=".my_name()." method=post class=text>
<input type=text name=term class=input><br>
<input type=submit value=Search class=button>
<br><br>To get a list of all users,just leave the field blank<br>
</form>
</div>
</fieldset>";}
else{
if(!isset($_GET['page'])){ 
    $page = 1; 
} else { 
    $page = $_GET['page']; 
} 
$max_results = 10; 
$from = (($page * $max_results) - $max_results);
$title="Search user ";

$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM members_ads where username like '%$term%' "),0); 

$total_pages = ceil($total_results / $max_results); 
$from1=$from+1;
$to=$from+$max_results;
if($total_results==0){$page_content.="<div class=text align=center><br><br><strong>No records found.</strong></div>
<br><br><br>";}
else{
if($to > $total_results){$to=$total_results;}
$page_content=
"<fieldset><legend class=text>Records $from1 -$to of $total_results</legend>
<table class=text width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\" bgcolor=\"#d8ecff\">
  <tr id=heading> 
    <td><b>ID</b></td>
    <td><b>Your Username</b></td>
    <td><b>Your EZMM Referrral Url</b></td>
    <td><b>Visitors Received</b></td>
    <td><b>Reset Visitors Received</b></td>

  </tr>";
  $id=$from1;
$q= db_query("select * from members_ads  where username like '%$term%'  LIMIT $from, $max_results");
while($r=db_fetch_array($q)){
$id%2?$fundal="#9DC7F2":$fundal="#E0E0E0";
$page_content.="<tr bgcolor=$fundal><td>$id</td><td>".$r["username"]."</td>
<td>".$r["url"]."</td>
<td>".$r["views"]."</td>
<td> <input name=button type=button value=Delete onClick=getData('http://www.ez-moneymaker.com/rusers/member_ads_view_reset.php?id=$r['id']')> </td>

</tr>";$id++;
}
$page_content.=" </table></fieldset>";


 $page_content.= "<div align=center class=text>Select a Page<br />"; 

if($page > 1){ 
    $prev = ($page - 1); 
    $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?term=$term&page=$prev\"><strong>Previous </strong></a>&nbsp;"; 
} 

for($i = 1; $i <= $total_pages; $i++){ 
    if(($page) == $i){ 
        $page_content.= "$i&nbsp;"; 
        } else { 
            $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?term=$term&page=$i\"><strong>$i</strong></a>&nbsp;"; 
    } 
} 

// Build Next Link 
if($page < $total_pages){ 
    $next = ($page + 1); 
    $page_content.= "<a class=link1 href=\"".$_SERVER['PHP_SELF']."?term=$term&page=$next\"><strong>Next>></strong></a>"; 
} 
 $page_content.= "</center>"; 

}
}

*/













include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>