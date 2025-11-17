<?
include'../config.php';
require_login();
$title="$CONFIG->sitename Login Sites New";
include("$CONFIG->templatedir/header.php");




 $sql_site = "select * from url_site_setting";
  $res_site = mysqli_query($GLOBALS["___mysqli_ston"], $sql_site)or die (mysqli_error($GLOBALS["___mysqli_ston"]).$sql_site);
  $rec_site = mysqli_fetch_array($res_site);
  $login_sites_allowed = $rec_site["login_sites_allowed"];


  function isValidURL($url) {
    return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
  }


  $sql_site = "select * from url_site_setting";
  $res_site = mysqli_query($GLOBALS["___mysqli_ston"], $sql_site)or die (mysqli_error($GLOBALS["___mysqli_ston"]).$sql_site);
  $rec_site = mysqli_fetch_array($res_site);
  $global_user_avl_site        = $rec_site['number_of_site'];  


    $site_url = trim($_REQUEST['site_url'] ?? '');
    $site_name= trim($_REQUEST['site_name'] ?? '');

    if (! isset($error_msg)) {
      $error_msg = '';
    }

    if (isset($_REQUEST['act']) && $_REQUEST['act'] == "newsite") {
  	// $sql_cc = "SELECT * FROM url_login_sites WHERE user_id = '$_SESSION['user_id']' AND status != 'D'";
  $sql_cc = "SELECT * FROM url_login_sites WHERE user_id = '".$_SESSION["user"]["username"]."' AND status != 'D'";

 	 $res_cc = mysqli_query($GLOBALS["___mysqli_ston"], $sql_cc)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_cc);
 		    $num_cc = mysqli_num_rows($res_cc);
            if($num_cc >= $login_sites_allowed){
		   	   $error_msg .= "<li>Sorry, you can only add up to $login_sites_allowed sites!</li>";
            }

   		    if(!$site_name) {
		   	   $error_msg .= "<li>Invalid site name</li>";
		    }

		    if(!isValidURL($site_url)){
		   	   $error_msg .= "<li> Please enter a valid URL including http://</li>";

            }



  $fox = parse_url($site_url);

  if(  isset($site_url) && $site_url!=null && isset($site_name) && $site_name!=null && $error_msg==null  ) {
			    $sql = "INSERT INTO url_login_sites set
                                                site_name  = '$site_name',
                                                site_url   = '$site_url',
                                                user_id    = '".$_SESSION["user"]["username"]."',
                                                new_time   = now()   ";

	            $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql);
	            $mid = ((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
                $sql_ggg = "INSERT INTO url_login_clicks SET
                                                       user_id  = '".$_SESSION["user"]["username"]."',
                                                       site_id  = '$mid',
                                                       points   = '0'  ";



                $res_ggg = mysqli_query($GLOBALS["___mysqli_ston"], $sql_ggg) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_ggg);

				$error_msg  = "<li> New site added successfully</li>";
				#$site_name  = "";
				#$site_url   = "";
                echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=login_sites.php?error_msg=$error_msg'>";
                exit();
           }//EndInsert

      		   
    }//EndAct










?>

<table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="10" cellspacing="0" border="0" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>  
<tr><td align="center"></td></tr>
<tr><td align="center">



<div id="column_w610" style="width:800px;">


<!--
 <table border="1"  bgcolor="#d0d7e7" cellpadding="10" cellspacing="0" width="95%" height=40 align=center style="border-collapse: collapse" id="AutoNumber1" bordercolor="#808080" font-size = "14px" class="shadowed">
-->
<table align="center" class="shadowed" valign=top width="100%" height=50 bgcolor=#d8ecff cellpadding="10" cellspacing="0" border="1" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>



			<tr class="listtabletoprow">
<td colspan="3" align="center" class='textbld' bgcolor="#1B476E"><font color="#FFFFFF">ADD A NEW LOGIN SITE</font></td>

				</tr>
       <form name="step1frm" action="login_site_new.php" method="post">
               
                 <tr><td colspan=3>

<? if( isset($error_msg) && $error_msg !=null ){echo $error_msg;} ?>
                      </td></tr>
                              

                              <tr>

                    <td width="30%">Site Name :</td>

                    <td width="20%"><input size="50" type="text" name="site_name"  class="TextBox" value="" ></td>

                    <td size="50" width="80%" class='text'>&nbsp;Enter a valid site name or title</td>

                </tr>
                               <tr>
                  <td width="30%">Site URL :</td>

                  <td width="20%"><input size="50" name="site_url" class="TextBox" value="" ></td>


                 <td width="80%" class='text'>&nbsp;Enter a valid site url</td>
               </tr>
                             <input type=hidden name="act"   value='newsite'>

               <tr>

                    <td  colspan="3" align=center>
                      <input type=image  src="../images/submit55.png" >  &nbsp;&nbsp;<img src="../images/cancel55.png"   onclick="javascript:window.location='login_sites.php'">

                    </td>
               </tr>         



 <tr>
                <td colspan="3">


<font color=red font face=verdana size=2><b>Note 1:</b></font>  <font face=verdana size=2>The following sites are NOT allowed:  Sites with pop-ups, Adult sites, 

illegal sites, HYIP sites, Paid-To-Surf sites, Frame Breakers, Rotators, Sites that re-direct and Paid-To-Promote sites.  Additionally, ALL sites must be in ENGLISH.

<br><br>




<font color=red font face=verdana size=2><b>Note 2:</b></font>  To increase the flow

of visitors to your sites, we suggest you add your sites multiple times.  You can add up to <? echo $login_sites_allowed; ?> Login Sites.

</font></td>
               </tr>
        </form>

    </table>        

</div>



</td></tr><tr><td align="center"></td></tr></table>




<?
include("$CONFIG->templatedir/content.php");
include("$CONFIG->templatedir/footer.php");
?>