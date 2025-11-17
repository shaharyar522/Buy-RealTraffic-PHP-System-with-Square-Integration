<? 
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename site settings";

include("$CONFIG->templatedir/header.php"); 
include("$CONFIG->templatedir/SiteSettingClass.php"); 

    $sitesettingObj = new SiteSetting;   
    $sitesettingObj->GetSitesetting();    

   if(isset($_REQUEST['act']) && $_REQUEST['act'] == "update") { 
      $sitesettingObj->SetPostValues($_REQUEST);  
      $err_msg = $sitesettingObj->CheckSiteSetting(); 
      if(!$err_msg) { 
          $sitesettingObj->UpdateSiteSetting();
          $err_msg = "Site Settings has been updated";
      }
   }//EndUpdate








$page_content ='
<table width="100%" class="menubar" cellpadding="0" cellspacing="0" border="0">
  <td  class="menudottedline" align="right">&nbsp;&nbsp;</td>
  </tr>
</table>
<form name=login method="post" action="site_settings.php">
<div align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr><td style="FONT: bold 12px Verdana;">Site settings</td></tr>';
     if( isset($err_msg) && $err_msg!= null ) {
   $page_content .='  <tr><td colspan=8 align=center class=err>'; $page_content .=$err_msg;
   $page_content .='</td></tr>';
                                              }
    
$page_content .='</table>
</div>
<div align="center">
<table width="100%"   cellspacing="0" cellpadding="0" border=0 bordercolor="#000000" backgroundcolor="#000000">
    <tr>
      <td>
      <table border="0" cellpadding="0" cellspacing="0" width="100%" align=center>
             






         <tr><td>&nbsp;&nbsp;</td></tr>







	 <tr class = "listtableevenrow">
          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Emails to send each hour</span><br><span style="FONT: 13px Verdana;">&nbsp;Number Of Emails to send each hour.</span></td>

          <td width="30%" align=center><input type=text name="bulk_email" value="';
        $page_content .=$sitesettingObj->bulk_email;
       $page_content .=' " size="30" class="TextBox">&nbsp;</td>

        </tr>
        <tr><td>&nbsp;&nbsp;</td></tr>









     	<tr class="listtableevenrow">
           <td  colspan=6 ><span style="FONT: bold 11px Verdana;">&nbsp;Payza Email<br></span>&nbsp;<span style="FONT: 13px Verdana;">Your payza merchant id.</span></td>

           <td width="30%" align=center><input type=input name="paypal_email" value="';
           $page_content .=$sitesettingObj->paypal_email;
                    $page_content .=' "  size="30" class="TextBox">&nbsp;</td>
        </tr>
  	
       



        <tr><td>&nbsp;&nbsp;</td></tr>

        <tr class = "listtableevenrow">

          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Login Cost per Thousand</span><br><span style="FONT: 13px Verdana;">&nbsp;Login Cost per Thousand</span></td>

          <td width="30%" align=center><input type=text name="login_cost_per_thousand" value="';
$page_content .=$sitesettingObj->login_cost_per_thousand;
$page_content .='" size="30" class="TextBox">&nbsp;</td>

        </tr>



        <tr><td>&nbsp;&nbsp;</td></tr>

        <tr class = "listtableevenrow">

          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Login Credits Item Name</span><br><span style="FONT: 13px Verdana;">&nbsp;Login Credits Item Name</span></td>

          <td width="30%" align=center><input type=text name="item_name" value="';
$page_content .=$sitesettingObj->item_name ;
$page_content .=' " size="30" class="TextBox">&nbsp;</td>

        </tr>



        <tr><td>&nbsp;&nbsp;</td></tr>

        <tr class = "listtableevenrow">

          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Login Timer</span><br><span style="FONT: 13px Verdana;">&nbsp;Login Timer</span></td>

          <td width="30%" align=center><input type=text name="login_timer" value="';
$page_content .= $sitesettingObj->login_timer ;
$page_content .=' " size="30" class="TextBox">&nbsp;</td>

        </tr>



         <tr><td>&nbsp;&nbsp;</td></tr>

        <tr class = "listtableevenrow">

          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Login Sites Allowed</span><br><span style="FONT: 13px Verdana;">&nbsp;Login Sites Allowed</span></td>

          <td width="30%" align=center><input type=text name="login_sites_allowed" value="';
$page_content .=$sitesettingObj->login_sites_allowed ;
$page_content .=' " size="30" class="TextBox">&nbsp;</td>

        </tr>



<tr><td>&nbsp;&nbsp;</td></tr>

        <tr class = "listtableevenrow">

          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Days CB Page Last</span><br><span style="FONT: 13px Verdana;">&nbsp;Days CB Page Last</span></td>

          <td width="30%" align=center><input type=text name="days_cb_page_last" value="';
$page_content .=$sitesettingObj->days_cb_page_last ?? '' ;
$page_content .=' " size="30" class="TextBox">&nbsp;</td>

        </tr>









<tr><td>&nbsp;&nbsp;</td></tr>

        <tr class = "listtableevenrow">

          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Days Url Rotator Last</span><br><span style="FONT: 13px Verdana;">&nbsp;Days Url Rotator Last</span></td>

          <td width="30%" align=center><input type=text name="days_url_rotator_last" value="';
$page_content .=$sitesettingObj->days_url_rotator_last ?? '' ;
$page_content .=' " size="30" class="TextBox">&nbsp;</td>

        </tr>







<tr><td>&nbsp;&nbsp;</td></tr>

<tr class = "listtableevenrow">
  <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;CB Page Cost </span><br><span style="FONT: 13px Verdana;">&nbsp;CB Page Cost</span></td>
  <td width="30%" align=center><input type=text name="cb_page_cost" value="';
$page_content .=$sitesettingObj->cb_page_cost ?? '' ;
$page_content .=' " size="30" class="TextBox">&nbsp;</td>
</tr>
<tr><td>&nbsp;&nbsp;</td></tr>

<tr class = "listtableevenrow">
<td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp; Cost Per Referral Url </span><br><span style="FONT: 13px Verdana;">&nbsp; Cost Per Referral Url</span></td>
<td width="30%" align=center><input type=text name="cost_per_referral_url" value="';
$page_content .=$sitesettingObj->cost_per_referral_url ?? '' ;
$page_content .=' " size="30" class="TextBox">&nbsp;</td>
</tr>







         <tr><td>&nbsp;&nbsp;</td></tr>

        <tr class = "listtableevenrow">

          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Login Return Url</span><br><span style="FONT: 13px Verdana;">&nbsp;Login Return Url</span></td>

          <td width="30%" align=center><input type=text name="login_return_url" value="';
$page_content .=$sitesettingObj->login_return_url ;
$page_content .='" size="30" class="TextBox">&nbsp;</td>

        </tr>




         <tr><td>&nbsp;&nbsp;</td></tr>

        <tr class = "listtableevenrow">

          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Login Cancel Url</span><br><span style="FONT: 13px Verdana;">&nbsp;Login Cancel Url</span></td>

          <td width="30%" align=center><input type=text name="login_cancel_url" value="';
$page_content .=$sitesettingObj->login_cancel_url ;
$page_content .=' " size="30" class="TextBox">&nbsp;</td>

        </tr>


         
		

         <tr><td>&nbsp;&nbsp;</td></tr>	
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         

         
        <tr class = "listtableevenrow">
          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Traffic Item Name</span><br><span style="FONT: 13px Verdana;">&nbsp;Traffic Item Name</span></td>
          <td width="30%" align=center><input type=text name="traffic_item_name" value="';
$page_content .=$sitesettingObj->traffic_item_name;
$page_content .='" size="30" class="TextBox">&nbsp;</td>
        </tr>
         <tr><td>&nbsp;&nbsp;</td></tr>	
         

        <tr class = "listtableevenrow">
          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Traffic Cost per Thousand</span><br><span style="FONT: 13px Verdana;">&nbsp;Traffic cost per thousand</span></td>
          <td width="30%" align=center><input type=text name="traffic_cost_per_thousand" value="';
$page_content .=$sitesettingObj->traffic_cost_per_thousand;
$page_content .='" size="30" class="TextBox">&nbsp;</td>

        </tr>
        <tr><td>&nbsp;&nbsp;</td></tr>	
                <tr class = "listtableevenrow">

          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Traffic Sites Allowed</span><br><span style="FONT: 13px Verdana;">&nbsp;Traffic Sites Allowed</span></td>

          <td width="30%" align=center><input type=text name="traffic_sites_allowed" value="';
$page_content .=$sitesettingObj->traffic_sites_allowed;
$page_content .='" size="30" class="TextBox">&nbsp;</td>

        </tr>
        
         <tr><td>&nbsp;&nbsp;</td></tr>	
                <tr class = "listtableevenrow">

          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Min_Traffic_Credits</span><br><span style="FONT: 13px Verdana;">&nbsp;Min_Traffic_Credits</span></td>

          <td width="30%" align=center><input type=text name="min_traffic_credits" value="';
$page_content .=$sitesettingObj->min_traffic_credits;
$page_content .='" size="30" class="TextBox">&nbsp;</td>

        </tr>
        
        
         <tr><td>&nbsp;&nbsp;</td></tr>	
                <tr class = "listtableevenrow">

          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;min_Login_Credits</span><br><span style="FONT: 13px Verdana;">&nbsp;min_Login_Credits</span></td>

          <td width="30%" align=center><input type=text name="min_login_credits" value="';
$page_content .=$sitesettingObj->min_login_credits;
$page_content .='" size="30" class="TextBox">&nbsp;</td>

        </tr>
         
          <tr><td>&nbsp;&nbsp;</td></tr>	
         
         
         

<tr><td>&nbsp;&nbsp;</td></tr>	
<tr class = "listtableevenrow">
<td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Merchant_Login_ID</span><br><span style="FONT: 13px Verdana;">&nbsp;Merchant_Login_ID</span></td>
<td width="30%" align=center><input type=text name="merchant_login_id" value="';
$page_content .=$sitesettingObj->merchant_login_id;
$page_content .='" size="30" class="TextBox">&nbsp;</td>
</tr>
<tr><td>&nbsp;&nbsp;</td></tr>	
         
<tr><td>&nbsp;&nbsp;</td></tr>	
<tr class = "listtableevenrow">
<td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Merchant_Transaction_Key</span><br><span style="FONT: 13px Verdana;">&nbsp;Merchant_Transaction_Key</span></td>
<td width="30%" align=center><input type=text name="merchant_transaction_key" value="';
$page_content .=$sitesettingObj->merchant_transaction_key;
$page_content .='" size="30" class="TextBox">&nbsp;</td>
</tr>
<tr><td>&nbsp;&nbsp;</td></tr>	
         

<tr><td>&nbsp;&nbsp;</td></tr>	
<tr class = "listtableevenrow">
<td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;payment_g_type</span> SANDBOX / PRODUCTION <br><span style="FONT: 13px Verdana;">&nbsp;payment_g_type</span></td>
<td width="30%" align=center><input type=text name="payment_g_type" value="';
$page_content .=$sitesettingObj->payment_g_type;
$page_content .='" size="30" class="TextBox">&nbsp;</td>
</tr>
<tr><td>&nbsp;&nbsp;</td></tr>	         
         
         
         

         <tr><td>&nbsp;&nbsp;</td></tr>

         <tr align=right>

            <td align=center colspan=8><INPUT name="Update" class="btn" onclick="nxtfrm()" type=submit value="Update"></td>

        </tr>



      </table>

    </td>

  </tr>

</table>

</div>

<input type="Hidden" name="act" value="" >

</form>



<script language=javascript>

function nxtfrm(){

   document.login.action="site_settings.php";

   document.login.act.value="update";

   document.login.submit();

}

</script>


';











include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>



