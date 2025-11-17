<br>




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





var x=window.confirm("Are You Sure You Want To Reset Hits?")
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




<table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="25" cellspacing="0" border="0" 
style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999> 

<tr><td>

<table align="center" class="shadowed" class=text width="100%" bgcolor="#d8ecff" valign=top cellpadding="25 cellspacing="0" border="1" 
style="border-collapse: collapse" id="AutoNumber1" bordercolor="#999999">





<tr><td>
<br>
<center><h3>Your ClickBank Money Page Stats</h3></center>
<br><br>

<b>Hi %firstname%</b>, 

<br><br>
Your CB Money Page is:  <b>(THE MEMBERS CB_PAGE_STATUS PAGE STATUS GOES HERE)</b>

<br><br>
Your CB Money Page URL is:  
<br>
<b>
<a target="_blank" href="https://www.ez-moneymaker.com/cb.php?cb_nickname=(THE MEMBERS CB_NICKNAME GOES HERE link1)">
   https://www.ez-moneymaker.com/cb.php?cb_nickname=(THE MEMBERS CB_NICKNAME GOES HERE link2)
</a>
</b>
<br><br>
Use this URL to promote your CB Money Page and earn commissions through ClickBank.<br><br>Below are the number of Hits your CB Money Page has received.  To check your commissions and sales, you will need to
log into your ClickBank account.  <a href="https://accounts.clickbank.com/login.htm" target="_blank">Click Here</a> to log into your ClickBank account.
<br><br>



<table align="center"  class=text width="100%" bgcolor="#d8ecff" valign=top cellpadding="5 cellspacing="0" border="1" 
style="border-collapse: collapse" id="AutoNumber1" bordercolor="#999999">

<tr align="center"><td><b>Your CB Nickname</b></td>  <td><b>Your CB Money Page URL</b></td>   <td><b>Hits</b></td>   <td><b>Reset Hits</b></td> <td><b>Purchase Date</b></td><td><b>Expiration Date</b></td></tr>


<tr>  
<td align="center" id="id1"></td>
<td align="center" id="id2"></td>
<td align="center" id="id3"></td>
<td align="center" id="id4">

<input name="button" type="button" value="Reset" onClick=getData("https://www.ez-moneymaker.com/rusers/cb_page_stats_reset.php?id=theid") >

</td>
<td align="center" id="id5"></td>
<td align="center" id="id6"></td>
</tr>






</table>





</td>
</tr>
</table>
</td>
</tr>
</table>