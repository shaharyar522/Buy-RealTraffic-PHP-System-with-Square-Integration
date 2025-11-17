<?
include'../config.php';
$title="Join now to $CONFIG->sitename";
include("$CONFIG->templatedir/header.php");


$firstname =$_SESSION["user"]["firstname"];
$lastname =$_SESSION["user"]["lastname"];
$username =$_SESSION["user"]["username"];
$password =$_SESSION["user"]["password"];
$q= db_query("SELECT * FROM users	WHERE username = '$username' AND password = '$password' and id>'1'");

$user= db_fetch_array($q);

$ss_sponsor = $user["sponsor"];
$q_spp= db_query("SELECT * FROM users	WHERE username = '$ss_sponsor' and id>'1'	");
$fetch_sponsor= db_fetch_array($q_spp);
$fetch_sponsor["membership_status"] ?? '';
$fetch_sponsor["venmo_username"] ?? '';



$page_content="
<div align=center class=text>";
//$page_content.=grab_content("joinp");
$page_content=html_entity_decode(stripslashes($page_content));


/*
$page_content.="</div><table width=\"50%\"  border=\"0\" align=\"center\" class=text bgcolor=\"#d8ecff\">

<tr><td><div align=left><fieldset style=\"width:400px\"><legend><strong>Two</strong> steps to join</legend><ul><li>Pay $$CONFIG->sponsorfee to your sponsor - ".$_SESSION["sponsor"]["firstname"]
."  ".$_SESSION["sponsor"]["lastname"]."</li>
";

$page_content.="</ul>";



*/
//echo $_SESSION["sponsor"]["username"];  echo "---";  echo $_SESSION["sponsor_satt"]["username"];  echo "---";

//                         if( $_SESSION["sponsor"]["username"] =='wespac59' ){
                           if( $user["sponsor"] =='wespac59' ){ 
$total_amount = $CONFIG->sponsorfee  + $CONFIG->adminfee;

 $total_amount =  number_format($total_amount,2);



$page_content.="







<table align=\"center\" class=\"shadowed\" valign=top width=\"100%\" height=50 bgcolor=#d8ecff cellpadding=\"25\" cellspacing=\"0\" border=\"0\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=#999999> 
<tr><td>


<table align=\"center\" class=\"shadowed\" class=text width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">




<tr><td>";






$page_content.="<div align='center'><br>";
$page_content.=   html_entity_decode(grab_content("joinp")  );
$page_content.="</div>";




$page_content.="

<div align=left>  
<ul>
 <li>Since you do not have a sponsor, you will pay the admin the sponsor fee of $$CONFIG->sponsorfee and the admin fee of $$CONFIG->adminfee.</li><br> ";


$page_content.="<li>You will make one single payment in the amount of <b>$$total_amount</b>  </li>
<br>





<br><br>
Please Follow The Steps Below:


<br><br>
1)  <a href = https://www.venmo.com target= _blank>Click Here</a> And Log Into Your Venmo Account.  On the left side navigation, click on the Pay button. 
<br><br>
2)  In the Amount Field, Enter The Admin Fee Above.
<br><br>
3)  Copy The Admin's Venmo Username <b>";


$page_content.=$_SESSION["user"]["venmo_username"];

$page_content.="</b> and Paste It Into the \"To\" Field.
<br><br>
4)  Copy This Note <b>Admin Fee From User:  $username ($firstname $lastname)</b> Paste It Into The \"Note\" Field And Click The Pay Button.  Once You Have
Paid The Admin Fee, Come Back To This Page And Click The Click Here To Continue Button Below.


</ul>

<br>


<br>

<center>
<a href = /rusers/thank_you.php><img src =/images/continue.png></a>
</center>

<br>





<br>




";

//9-2-2023 pay_admin to thank_you changed

}
else{
                 
         if($fetch_sponsor["membership_status"] == 'Free Member')
         { 


   $CONFIG->sponsorfee =$CONFIG->sponsorfee_free;   $CONFIG->adminfee = $CONFIG->adminfee_free;

           // $user["sponsor"] = $fetch_sponsor["firstname"] ." " .  $fetch_sponsor["lastname"] . " ( ".$user["sponsor"]  . " / " .$fetch_sponsor["membership_status"]." )" ;


         }
          $usssr1 = $fetch_sponsor["firstname"] ." " .  $fetch_sponsor["lastname"] ;
          $usssr2 =  " ( ".$user["sponsor"]  . " / " .$fetch_sponsor["membership_status"]." / " .$fetch_sponsor["venmo_username"]." )" ;
$usssr3 =  " ( ".$user["username"]  . ")" ;
          
$usssr4 =  " (".$fetch_sponsor["membership_status"]  . ")" ;
$page_content.="</div>







<table align=\"center\" class=\"shadowed\" valign=top width=\"100%\" height=50 bgcolor=#d8ecff cellpadding=\"25\" cellspacing=\"0\" border=\"0\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=#999999> 

<tr><td>

<table align=\"center\" class=\"shadowed\" class=text width-\"100%\" bgcolor=\"#d8ecff\" valign=top cellpadding=\"5\" cellspacing=\"0\" border=\"1\" 
style=\"border-collapse: collapse\" id=\"AutoNumber1\" bordercolor=\"#999999\">



   <tr><td><div align=left>


<br>";





//done on 11 - 1- 2022

if($fetch_sponsor["membership_status"]  == 'Free Member'  OR  $fetch_sponsor["membership_status"]  == 'Pro Member')

$page_content.="<table align=center><tr><td>".html_entity_decode(grab_content('joinp')) ."</td></tr>              </table>";
//$page_content.= html_entity_decode(grab_content('joinp'))  ;

//done on 11 - 1- 2022





$page_content.="

<br>

<ul><b>Two Steps To Upgrade</b></ul>  </div><ul><li>Pay<b> $$CONFIG->sponsorfee</b> to your sponsor - ".$_SESSION["sponsor"]["firstname-----"]
."  ".$_SESSION["sponsor"]["lastname-----"].      $_SESSION["user"]["sponsor---"].


$usssr1.    "</font>";$page_content.=$usssr4;$page_content.="</li><br>";










$page_content.="
<br><br>
Please Follow The Steps Below:

<br><br>
1)  <a href = https://www.venmo.com target= _blank>Click Here</a> And Log Into Your Venmo Account.  On the left side navigation, click on the Pay button. 
<br><br>

2)  In the Amount Field, Enter The Sponsor Fee Above.
<br><br>
3)  Copy Your Sponsor's Venmo Username <b>" .$fetch_sponsor["venmo_username"]." </b> and Paste It Into the \"To\" Field.
<br><br>
4)  Copy This Note <b>Sponsor Fee From User:  $username ($firstname $lastname)</b> Paste It Into The \"Note\" Field And Click The Pay Button.  Once You Have
Paid Your Sponsor, Come Back To This Page And Click The Click Here To Pay The Admin Button Below.



</ul>

<br>


<br>

<center>
<a href = /rusers/pay_admin.php><img src =/images/pay-admin.png></a>
</center>

<br>


<br>



NOTE:  Please Do Not bypass paying your sponsor.  Pay your sponsor first.  Our system will verify your payment to your sponsor.  
By clicking on the \"Click Here To Pay The Admin\" button above, you are confirming that you have already paid your sponsor.


<br><br>

";
}





$page_content.="



<script>
function validateForm() {
    var x = document.forms[\"myForm\"][\"ts\"].checked;
    if (!x) {
        alert(\"You must agree with our Terms and Conditions !\");
        return false;
    }
}
</script>




<script>
function validare()
{  if(document.forms[0].ts.checked){document.forms[0].submit();}
else{alert('You must agree with our Terms and Conditions !');}
}
var popUpWin=0;
function popUpWindow(URLStr, left,top, width, height)
{
  if(popUpWin)
  {
    if(!popUpWin.closed) popUpWin.close();
  }
  popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menub ar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>
<form name=myForm method=post action=join.php";


if( !( isset( $_SESSION["sponsor_satt"]["username"]  ) && $_SESSION["sponsor_satt"]["username"] != null ))
$page_content.=" target=_blank ";


$page_content.=">

 <!--<input name=\"ts\" type=\"checkbox\" value=\"ts\" class=\"input\">
I agree with ".$CONFIG->sitename." <a href=\"javascript:popUpWindow('http://ez-moneymaker.com/terms.php', 100, 100, 300, 399);\" class=link1 >Terms and Conditions</a><br>-->
 <!-- <div align=center><input type=button class=button value=\"Upgrade To Pro\" onclick=\"validare();\"></div> -->


                        <!-- satyajeet -->
";




   //  if( $fetch_sponsor["sponsor"]["username"] =='wespac59' )   // 12 may 2018
    if( $user["sponsor"] =='wespac59' )
{







//                      $page_content.="<br><div align=center><input type=button class=button value=\"Upgrade To Pro\" onclick=\"validare();\"></div>";


//this below code is commented on 26 jan 2023
//$page_content.="<br><div align=center><input  type=submit class=button value=\"Click Here To Pay The Admin\"  name=\"paytheadmin_xxx\"  onclick=\"return validateForm()\">";

$page_content.="<br><br>



</div>";








 }else{
 $page_content.="<br>";
 
 
 
 
 //done on 11 - 1- 2022

if($fetch_sponsor["membership_status"]  != 'Free Member'  && $fetch_sponsor["membership_status"]  != 'Pro Member')
 $page_content.="<div align=center><input type=button class=button value=\"Click Here To Pay The Admin\" onclick=\"validare();\"></div> ";

$page_content.="
<div align=center>






</div>";
   }





$page_content.="
                        <!-- satyajeet -->

</form></fieldset></div></td></tr></table> </td></tr></table>           ";
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>
