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

function getData(strURL) {     alert (strURL);   
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {                        
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
</script>




  	

<?
include("$CONFIG->templatedir/header.php");
if(!isset($term)){
$page_content="<fieldset class=text>
<legend>Please enter the Member's ads</legend>
<br><div align=center class=text>
<form action=".my_name()." method=post class=text>
<input type=text name=term class=input><br>
<input type=submit value=Submit class=button>
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



db_query("INSERT INTO members_ads (username , url , clicks , views )  VALUES ( '".$term."', 'http://www.ez-moneymaker.com/promo.php?from=".$term."','' ,'' )");




$total_results = mysqli_result(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(*) as Num FROM members_ads "), 0); 

$total_pages = ceil($total_results / $max_results); 
$from1=$from+1;
$to=$from+$max_results;
if($total_results==0){$page_content.="<div class=text align=center><br><br><strong>No records found.</strong></div>
<br><br><br>";}
else{
if($to > $total_results){$to=$total_results;}








$page_content="<fieldset class=text>
<legend>Please enter the Member's ads</legend>
<br><div align=center class=text>
<form action=".my_name()." method=post class=text>
<input type=text name=term class=input><br>
<input type=submit value=Submit class=button>
<br><br>To get a list of all users,just leave the field blank<br>
</form>
</div>
</fieldset>";












$page_content.=
"<fieldset><legend class=text>Records $from1 -$to of $total_results</legend>
<table class=text width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\" bgcolor=\"#d8ecff\">
  <tr id=heading> 
    
    <td><b>User Name</b></td>
    <td><b>Url</b></td>

    <td><b>Visitors Received</b></td>
	<td><b>Delete</b></td>
  </tr>";
  $id=$from1;
$q= db_query("select * from members_ads  ORDER BY id DESC  LIMIT $from, $max_results ");
while($r=db_fetch_array($q)){
$id%2?$fundal="#9DC7F2":$fundal="#E0E0E0";
$page_content.="<tr bgcolor=$fundal><td>".$r["username"]."</td>
<td>".$r["url"]."</td>
<td>".$r["clicks"]."</td>

<td> <input name=button type=button value=Delete onClick=getData('$r['username']')>
</td>

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
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>

