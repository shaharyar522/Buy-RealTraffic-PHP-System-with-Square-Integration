<? 
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename popup settings";

include("$CONFIG->templatedir/header.php"); 
include("$CONFIG->templatedir/PopupSettingClass.php"); 

    $popupsettingObj = new PopupSetting;   
    $popupsettingObj->GetPopupsetting();    

   if(isset($_REQUEST['act']) && $_REQUEST['act'] == "update") { 
      $popupsettingObj->SetPostValues($_REQUEST);  
      $err_msg = $popupsettingObj->CheckPopupSetting(); 
      if(!$err_msg) { 
          $popupsettingObj->UpdatePopupSetting();
          $err_msg = "Popup Settings has been updated";
      }
   }//EndUpdate


   if(isset($_REQUEST['act']) && $_REQUEST['act'] == "reset") {
          $popupsettingObj->ResetPopupSetting();
          $popupsettingObj->GetPopupsetting(); 
          $err_msg_reset = "Popup Impression and Click count has been reset";
      
   }//EndReset





$page_content ='
<table width="100%" class="menubar" cellpadding="0" cellspacing="0" border="0">
  <td  class="menudottedline" align="right">&nbsp;&nbsp;</td>
  </tr>
</table>
<form name=login method="post" action="popup_settings.php">
<div align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr><td style="FONT: bold 12px Verdana;">Popup settings</td></tr>';
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

        <tr><td>&nbsp;&nbsp;</td></tr>




        <tr class="listtableevenrow">
          <td colspan="6">
            <span style="font: bold 11px Verdana;">&nbsp;Pop Up Status</span><br>
            <span style="font: 13px Verdana;">&nbsp;Select Pop Up Status</span>
          </td>
          <td width="30%" align="center">
            <select name="pop_up_status" class="TextBox" style="width:100%;">
              <option value="1" ';

if (($popupsettingObj->pop_up_status ?? '') == '1') { 
  $page_content .= 'selected'; 
}

$page_content .='>Active</option>
              <option value="2" ';

if (($popupsettingObj->pop_up_status ?? '') == '2') { 
  $page_content .= 'selected'; 
}

$page_content .='>Paused</option>
            </select>
          </td>
        </tr>
        <tr><td colspan="7">&nbsp;</td></tr>






















        <tr class = "listtableevenrow">
          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup height in Pixel</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup height in Pixel</span></td>
          <td width="30%" align=center><input type=text name="pop_up_height" value="';
        $page_content .=$popupsettingObj->pop_up_height ?? '' ;
        $page_content .='" size="30" class="TextBox">&nbsp;</td>
        </tr>
        <tr><td>&nbsp;&nbsp;</td></tr>

        <tr class = "listtableevenrow">
        <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp; Popup width in Pixel</span><br><span style="FONT: 13px Verdana;">&nbsp; Popup width in Pixel</span></td>
        <td width="30%" align=center><input type=text name="pop_up_weight" value="';
        $page_content .=$popupsettingObj->pop_up_weight ?? '' ;
        $page_content .='" size="30" class="TextBox">&nbsp;</td>
        </tr>


        <tr><td>&nbsp;&nbsp;</td></tr>

        <tr class = "listtableevenrow">

          <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup background Color</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup background Color</span></td>

          <td width="30%" align=center><input type=text name="pop_up_bg_color" value="';
            $page_content .=$popupsettingObj->pop_up_bg_color ;
            $page_content .='" size="30" class="TextBox">&nbsp;</td>

        </tr>




        <tr><td>&nbsp;&nbsp;</td></tr>
        	         
                 
                 


<tr class = "listtableevenrow">
  <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup Message</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup Message</span></td>

  <td width="30%" align=center><input type=text name="pop_up_message" value="';
    $page_content .=$popupsettingObj->pop_up_message ;
    $page_content .='" size="30" class="TextBox">&nbsp;</td>

</tr>

<tr><td>&nbsp;&nbsp;</td></tr>
        

<tr class = "listtableevenrow">
  <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup Message Font Color</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup Message Font Color</span></td>

  <td width="30%" align=center><input type=text name="pop_up_message_font_color" value="';
    $page_content .=$popupsettingObj->pop_up_message_font_color ;
    $page_content .='" size="30" class="TextBox">&nbsp;</td>

</tr>

<tr><td>&nbsp;&nbsp;</td></tr>

<tr class = "listtableevenrow">
  <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup Message Font Size</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup Message Font Size</span></td>

  <td width="30%" align=center><input type=text name="pop_up_message_font_size" value="';
    $page_content .=$popupsettingObj->pop_up_message_font_size ;
    $page_content .='" size="30" class="TextBox">&nbsp;</td>

</tr>

<tr><td>&nbsp;&nbsp;</td></tr>

<tr class = "listtableevenrow">
  <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup Message Font Face</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup Message Font Face</span></td>

  <td width="30%" align=center><input type=text name="pop_up_message_font_face" value="';
    $page_content .=$popupsettingObj->pop_up_message_font_face ;
    $page_content .='" size="30" class="TextBox">&nbsp;</td>

</tr>

<tr><td>&nbsp;&nbsp;</td></tr>

<tr class = "listtableevenrow">
  <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup Button Text</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup Button Text</span></td>

  <td width="30%" align=center><input type=text name="pop_up_button_text" value="';
    $page_content .=$popupsettingObj->pop_up_button_text ;
    $page_content .='" size="30" class="TextBox">&nbsp;</td>

</tr>

<tr><td>&nbsp;&nbsp;</td></tr>

<tr class = "listtableevenrow">
  <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup Button Size</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup Button Size</span></td>

  <td width="30%" align=center><input type=text name="pop_up_button_size" value="';
    $page_content .=$popupsettingObj->pop_up_button_size ;
    $page_content .='" size="30" class="TextBox">&nbsp;</td>

</tr>

<tr><td>&nbsp;&nbsp;</td></tr>

<tr class = "listtableevenrow">
  <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup Button Color</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup Button Color</span></td>

  <td width="30%" align=center><input type=text name="pop_up_button_color" value="';
    $page_content .=$popupsettingObj->pop_up_button_color ;
    $page_content .='" size="30" class="TextBox">&nbsp;</td>

</tr>

<tr><td>&nbsp;&nbsp;</td></tr>

<tr class = "listtableevenrow">
  <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup Button font face</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup Button font face</span></td>

  <td width="30%" align=center><input type=text name="pop_up_button_font_face" value="';
    $page_content .=$popupsettingObj->pop_up_button_font_face ;
    $page_content .='" size="30" class="TextBox">&nbsp;</td>

</tr>

<tr><td>&nbsp;&nbsp;</td></tr>

<tr class = "listtableevenrow">
  <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup Button background Color</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup Button background Color</span></td>

  <td width="30%" align=center><input type=text name="pop_up_button_background" value="';
    $page_content .=$popupsettingObj->pop_up_button_background ;
    $page_content .='" size="30" class="TextBox">&nbsp;</td>

</tr>

<tr><td>&nbsp;&nbsp;</td></tr>

<tr class = "listtableevenrow">
  <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup Button URL</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup Button URL</span></td>

  <td width="30%" align=center><input type=text name="pop_up_button_url" value="';
    $page_content .=$popupsettingObj->pop_up_button_url ;
    $page_content .='" size="30" class="TextBox">&nbsp;</td>

</tr>

<tr><td>&nbsp;&nbsp;</td></tr>

<tr class = "listtableevenrow">
  <td colspan="6"><span style="FONT: bold 11px Verdana;">&nbsp;Popup button hover Color</span><br><span style="FONT: 13px Verdana;">&nbsp;Popup button hover Color</span></td>

  <td width="30%" align=center><input type=text name="pop_up_button_hover_color" value="';
    $page_content .=$popupsettingObj->pop_up_button_hover_color ;
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






<form name=reset method="post" action="popup_settings.php">
<div align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="8">';
     if( isset($err_msg_reset) && $err_msg_reset!= null ) {
   $page_content .='  <tr><td colspan=8 align=center class=err>'; $page_content .=$err_msg_reset;
   $page_content .='</td></tr>';                                              }
    
$page_content .='</table>
</div>
<div align="center">
<table width="100%"   cellspacing="0" cellpadding="0" border=0 bordercolor="#000000" backgroundcolor="#000000">
    <tr>
      <td>
      <table border="0" cellpadding="0" cellspacing="0" width="100%" align=center>
             
        <tr><td>&nbsp;&nbsp;</td></tr>

        <tr><td>&nbsp;&nbsp;</td></tr>
        

         <tr><td align=center colspan=8><span style="font: 14px Verdana; margin-right: 20px;">
      Impressions : <i id="impressions_count"><b>' . ($popupsettingObj->impressions ?? 0) . '</b></i>
    </span>
    <span style="font: 14px Verdana;">
      Clicks : <i id="clicks_count"><b>' . ($popupsettingObj->pop_up_click_count ?? 0) . '</b></i>
    </span></td></tr>

        <tr><td>&nbsp;&nbsp;</td></tr>
         <tr align=right>

            <td align=center colspan=8><INPUT name="Reset" class="btn" onclick="nxtfrm_reset()" type=submit value="Reset Impressions & Click Count"></td>

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

   document.login.action="popup_settings.php";

   document.login.act.value="update";

   document.login.submit();

}


function nxtfrm_reset(){ 

   document.reset.action="popup_settings.php";
   document.reset.act.value="reset";
   document.reset.submit();


}

</script>


';

include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>
