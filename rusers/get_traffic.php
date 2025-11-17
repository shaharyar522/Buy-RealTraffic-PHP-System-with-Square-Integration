<?
/*
include'../config.php';
require_login();
$title="$CONFIG->sitename Get Traffic";
include("$CONFIG->templatedir/header.php");

$q_admin= db_query("SELECT * FROM users	WHERE username = 'wespac59'  and id='1'");
$user_admin= db_fetch_array($q_admin);
$venmo_admin = $user_admin["venmo_username"];

$sql = "SELECT *  FROM url_site_setting";
$results = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$row = mysqli_fetch_array($results);

$login_cost_per_hundred = $row['login_cost_per_hundred'];

$amount =  $login_cost_per_hundred *  $row['cost_per_referral_url'];

$page_content=read_template("$CONFIG->templatedir/get_traffic.php");

$page_content=str_replace("%firstname%",$_SESSION["user"]["firstname"],$page_content);

$page_content=str_replace("%lastname%",$_SESSION["user"]["lastname"],$page_content);

$page_content=str_replace("%username%",$_SESSION["user"]["username"],$page_content);

$page_content=str_replace("%login_cost_per_hundred%",$row['cost_per_referral_url'] ,$page_content);

$page_content=str_replace("THE AMOUNT GOES HERE (AMOUNT = The number of urls purchased * cost_per_referral_url)",$amount,$page_content);

$page_content=str_replace("ADMIN VENMO USERNAME GOES HERE(admin_venmo)",$venmo_admin,$page_content);

$page_content=str_replace("THE BUYER'S EZ-MONEYMAKER.COM USERNAME GOES HERE",$_SESSION["user"]["username"],$page_content);

include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
*/




include'../config.php';
require_login();
$title="$CONFIG->sitename Get Traffic";
include("$CONFIG->templatedir/header.php");

$value=0;

$q_admin= db_query("SELECT * FROM users	WHERE username = 'wespac59'  and id='1'");
$user_admin= db_fetch_array($q_admin);
$venmo_admin = $user_admin["venmo_username"];

$sql = "SELECT *  FROM url_site_setting";
$results = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$row = mysqli_fetch_array($results);

$login_cost_per_hundred = $row['login_cost_per_hundred'];


//$amount =  $login_cost_per_hundred *  $row['cost_per_referral_url'];
$amount =  $login_cost_per_hundred *  $row['cost_per_referral_url'];

//$page_content=read_template("$CONFIG->templatedir/get_traffic.php");




if (isset($_POST['mode'])) {
    	$value = "1";
    	$login_credits = $_POST['amount'];
    	$amount =  $row['cost_per_referral_url'] *  $login_credits;
}
else{
$value = "0";
}






//--------------------------------------------------------

?>


<br>
<br>
<table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="25" cellspacing="0" border="0" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>   
    <tr><td>
            <table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="20" cellspacing="0" border="1" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>   
                <tr><td>
                        <br>
                            <center><h3>We'll Advertise Your EZ-MoneyMaker Referral Url</h3></center>
                                <br><br>

                                        Hi <b><?php echo $_SESSION["user"]["firstname"] ?></b>, 
                                            <br><br>
Thank you for your interest in Advertising with EZ-MoneyMaker.com. 
The success of your business depends on quality Targeted visitors. Without quality targeted visitors, your business will not survive. 
<br><br>
If you are looking for business opportunity seekers to visit your EZ-MoneyMaker.com referral url, look no further! Our superb marketing and advertising system will send REAL Visitors to your referral url 24/7 GUARANTEED. 
<br><br>
About 50% of our traffic comes from Business Opportunity expired domains. About 10% comes from search engine Pay Per Click campaigns such as Google and Yahoo. 
<br><br>
And the remaining 40% comes from Banner campaigns on highly targeted websites, high-traffic Classified Ad sites, CPA Networks, Business Opportunity Forums, Article Promotions, Joint Ventures, Sponsorship Ads, Press Releases, Ezine campaigns and Email Marketing Campaigns to highly targeted opt-in mailing lists. 
<br><br>

You can add multiple referral urls.  Each referral url will cost <b>$<?php echo $row['cost_per_referral_url']; ?></b> and each referral url will stay in rotation for <b><?php echo $row['days_url_rotator_last']; ?></b> days.


When you buy website traffic from us, your EZ-MoneyMaker.com referral url will be placed into our main traffic rotator which we are advertising in the advertising sources above. 
<br><br>
You can be certain that REAL people will visit your referral url and that your referral url will be viewed as a full webpage.  Our traffic rotator receives hundreds of visitors each 
month so your referral url will get MASSIVE exposure.  This service also comes with live stats.  You'll be able to see how many visitors we are sending to your referral url.
  To check your Traffic Rotator stats, click on the "Traffic Rotator Stats" link under "Stats" above.  
<br><br>

So if you are ready to get quality traffic and build your EZ-MoneyMaker downline, please make your purchase below.

<br><br>

To Your Success,

<br><br>
<b>
Mike Borders
<br>
Admin 

<br>

EZ-MoneyMaker.com
</b>
<br><br>
<br><br>

<br>

<br>

<br><br>

<div id="form_down">
</div>
<br>
<center><h3>Buy Traffic Rotator Referral Url</h3></center>
<br><br>




        

<div id="column_w610" style="width:800px">
<? if ($value== 0){ ?>
   <p align="center"><b><div class="header_01" align=center> User ID# <?php echo $_SESSION["user"]["username"] ?> - Buy Traffic Rotator Url 
<br>
</div></b></p>

       <p align="center"> The cost of a Referral Url is <span style="color: red; font-weight: bold;">$<?php echo $row['cost_per_referral_url'] ?></span> Per Referral Url.</p>
        <p align="center"><font color=red></font></p>

       <form name="frm1" action="get_traffic.php#form_down" method="post">     
          <table border="0"  cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">
             <tr class="listtabletoprow">
		        <td colspan="3" align="center" class='textbld' bgcolor="#1B476E"><font color="#FFFFFF">Buy Traffic Rotator Referral Url</font></td>
 	         </tr> 
             <tr bgcolor="#e9edf6">        <td width="60%"><font size="2">&nbsp;&nbsp;Enter the number of Referral Urls you would like to purchase <br>
&nbsp;&nbsp;and click the Preview button.  &nbsp;&nbsp;Note: Please do not enter commas:</font></td>
  <td width="40%"><input type="text" name="amount" value="" class="TextBoxSmall" maxlength="5"/></td>
             </tr>
             <tr bgcolor="#d0d7e7">
              <td><font size="2">&nbsp;&nbsp;Payment Method:</font></td>
              <td>
                  <select name="pay_meth" class="TextBoxSmall">
                  <option value="Venmo">Venmo</option>
                  </select>
              </td>
            </tr>
            <input type="hidden" name="mode" value="preview" />
           <tr bgcolor="#e9edf6">    <td><font size="2">&nbsp;&nbsp;Proceed:</font></td>
               <td><input type="submit" name="submit" value="  Preview  " class="formbutton"></td>
           </tr>
          </table>
     </form> 
<br><br><br><br>


<?
}

if ($value == 1){
?>
    
    
    
    
    
    
  <!--
    
       <p align="center"><b><div class="header_01" align=center> User ID# <?php echo $_SESSION["user"]["username"] ?> - Buy Traffic Rotator Url 
<br>
</div></b></p>

       <p align="center"> The cost of a Referral Url is <span style="color: red; font-weight: bold;">$<?php echo $row['cost_per_referral_url'] ?></span> Per Referral Url.</p>
        <p align="center"><font color=red></font></p>

       <form name="frm1" action="get_traffic.php" method="post">     
          <table border="0"  cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">
             <tr class="listtabletoprow">
		        <td colspan="3" align="center" class='textbld' bgcolor="#1B476E"><font color="#FFFFFF">Buy Traffic Rotator Referral Url</font></td>
 	         </tr> 
             <tr bgcolor="#e9edf6">        <td width="60%"><font size="2">&nbsp;&nbsp;Enter the number of Referral Urls you would like to purchase <br>
&nbsp;&nbsp;and click the Preview button.  &nbsp;&nbsp;Note: Please do not enter commas:</font></td>
  <td width="40%"><input type="text" name="amount" value="<? echo $login_credits; ?>" class="TextBoxSmall" maxlength="5"/></td>
             </tr>
             <tr bgcolor="#d0d7e7">
              <td><font size="2">&nbsp;&nbsp;Payment Method:</font></td>
              <td>
                  <select name="pay_meth" class="TextBoxSmall">
                  <option value="Venmo">Venmo</option>
                  </select>
              </td>
            </tr>
            <input type="hidden" name="mode" value="preview" />
           <tr bgcolor="#e9edf6">    <td><font size="2">&nbsp;&nbsp;Proceed:</font></td>
               <td><input type="submit" name="submit" value="  Preview  " class="formbutton"></td>
           </tr>
          </table>
     </form> 
<br><br><br><br>
    -->
    
    
    
    
    
    
    
    
    

    
    
    
    <table border="0" cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">
         <tr>     

             <td colspan="3" align="center" class='textbld' bgcolor="#1B476E"><font face="verdana" color="#FFFFFF">Purchase Traffic Rotator For User ID: <? echo $_SESSION['user']['username'] ?> </font></td>
         </tr>            

         <tr bgcolor="#e9edf6" colspan="3">     

            <td width="40%" align="left"><font size="2"><? echo $login_credits; ?> Referral <?php if( $login_credits == 1) echo 'Url'; else echo 'Urls'; ?>  @ $<?php echo $row['cost_per_referral_url'] ?> Per Referral Url. </font></td>
          

  <td width="55%"></td>     <td></td>  </tr>

         <tr bgcolor="#d0d7e7">      

             <td width="45%" align="left"><font size="2">Total Cost via <? echo $_REQUEST['pay_meth'] ?> </font></td>
             <td>&nbsp;&nbsp;<b>$<? echo $amount; ?></b> </td>
  <td width="60%"></td>      </tr> 

<!-- </table>   -->   
        <input type="hidden" name="mode" value="payment" />
      <!--  <table border="0"  cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">  -->
       <tr bgcolor="#e9edf6" colspan=7>                   
               <td colspan="3" align="center">
<? echo $payza_button; ?>

</td></tr></table>




    
    
    
    
    
    
    
    
    
      
      
    <table border="0"  cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">
<tr class="listtabletoprow">
      <td colspan="3" align="center" class='textbld' bgcolor="#1B476E"><font color="#FFFFFF">Please Follow The Steps Below</font></td>

</td></tr>

<tr bgcolor="#e9edf6">  <td>
<br>
1)  <a href = https://www.venmo.com target= _blank>Click Here</a> And Log Into Your Venmo Account.  
On the left side navigation, click on the Pay button. 
<br></td></tr>
  <tr bgcolor="#d0d7e7"><td>
<br>
2)  In the amount field, enter the Amount: <b>$<?php echo $amount; ?></b>
<br>

<tr bgcolor="#e9edf6"> <br><td><br>
3)  Copy the Admin's Venmo username <b><?php echo $venmo_admin; ?></b> and paste it into the "To" field.
<br>

</td></tr>

  <tr bgcolor="#d0d7e7"><td><br>


4)  Copy this Note:  <b><?php echo $login_credits; ?> Referral <?php if( $login_credits == 1) echo 'Url'; else echo 'Urls'; ?> For User:  <?php echo $_SESSION["user"]["username"] ?> (<?php echo $_SESSION["user"]["firstname"] ?> <?php echo $_SESSION["user"]["lastname"] ?>)</b> and paste it into the "Note" field and click the Pay button.  Once you have 
completed your payment to the admin, come back to this page and click the "Continue" button below.

<br>

</td></tr>

<tr bgcolor="#e9edf6"><td><br>
<center><a href =/rusers/thank_you.php><img src=/images/continue.png></a></center>
<br>
</td></tr></table>  
      
      
      
      
      
      
<!--      
      
             <p align="center"><b><div class="header_01" align=center> User ID# <?php echo $_SESSION["user"]["username"] ?> - Buy Traffic Rotator Url 
<br>
</div></b></p>

       <p align="center"> The cost of a Referral Url is <span style="color: red; font-weight: bold;">$<?php echo $row['cost_per_referral_url'] ?></span> Per Referral Url.</p>
        <p align="center"><font color=red></font></p>

       <form name="frm1" action="get_traffic.php" method="post">     
          <table border="0"  cellpadding="10" cellspacing="0" width="100%" align=center style=" border: 1px solid #808080;font-size: 14px;">
             <tr class="listtabletoprow">
		        <td colspan="3" align="center" class='textbld' bgcolor="#1B476E"><font color="#FFFFFF">Buy Traffic Rotator Referral Url</font></td>
 	         </tr> 
             <tr bgcolor="#e9edf6">        <td width="60%"><font size="2">&nbsp;&nbsp;Enter the number of Referral Urls you would like to purchase <br>
&nbsp;&nbsp;and click the Preview button.  &nbsp;&nbsp;Note: Please do not enter commas:</font></td>
  <td width="40%"><input type="text" name="amount" value="<? echo $login_credits; ?>" class="TextBoxSmall" maxlength="5"/></td>
             </tr>
             <tr bgcolor="#d0d7e7">
              <td><font size="2">&nbsp;&nbsp;Payment Method:</font></td>
              <td>
                  <select name="pay_meth" class="TextBoxSmall">
                  <option value="Venmo">Venmo</option>
                  </select>
              </td>
            </tr>
            <input type="hidden" name="mode" value="preview" />
           <tr bgcolor="#e9edf6">    <td><font size="2">&nbsp;&nbsp;Proceed:</font></td>
               <td><input type="submit" name="submit" value="  Preview  " class="formbutton"></td>
           </tr>
          </table>
     </form> 
      
-->      
      
    

    
      
      
      
      
<? } ?>
<br>
</div>
<br><br><br><br>
   </td>
        </tr>
      </table>

<br><br>

   </td>
        </tr>
      </table>

<center>








<?

//--------------------------------------------------------






/*
$page_content=str_replace("%firstname%",$_SESSION["user"]["firstname"],$page_content);

$page_content=str_replace("%lastname%",$_SESSION["user"]["lastname"],$page_content);

$page_content=str_replace("%username%",$_SESSION["user"]["username"],$page_content);

$page_content=str_replace("%login_cost_per_hundred%",$row['cost_per_referral_url'] ,$page_content);

$page_content=str_replace("THE AMOUNT GOES HERE (AMOUNT = The number of urls purchased * cost_per_referral_url)",$amount,$page_content);

$page_content=str_replace("ADMIN VENMO USERNAME GOES HERE(admin_venmo)",$venmo_admin,$page_content);

$page_content=str_replace("THE BUYER'S EZ-MONEYMAKER.COM USERNAME GOES HERE",$_SESSION["user"]["username"],$page_content);
*/


include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");



?>



