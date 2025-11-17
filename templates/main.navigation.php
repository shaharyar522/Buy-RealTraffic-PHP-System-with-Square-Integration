<?

if(login_ok()){
?>


	<table width="0%" border="0" cellspacing="0" cellpadding="0" align="center" valign=top>
		<tr valign="top">
			<td>
				


<table width="0" border="1" cellspacing="0" cellpadding="0" bordercolor="#999999>" bgcolor="#d8ecff" valign=top>
	

<br>				<tr>
						<td>
							


<table width="0%" border="0" cellspacing="0" cellpadding="3" class="text" id=heading_light" valign=top>
	


							<tr id=heading>
				
					
<td align="center" class="text"><strong>Welcome ,<br> <? echo $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"] ?></strong>
	

<br><br>




								</td>
								</tr>


								<tr>
									<td align="left" class="text_mic">
										   	<table  border="0" cellspacing="0" cellpadding="0">
   		<tr>
   			<td class="navigation">
   				<div id="menu">
   				
   				
   				
                                                    <img src=/images/blue_dash.gif border="0">  
       
<? // if($_SESSION["user"]["membership_status"] == 'Free Member') echo 'disabled'; 

        $satya2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where username='".$_SESSION["user"]["username"]."'");
	$rss_alert = mysqli_fetch_array($satya2);


?>




   <a  href=<? echo $CONFIG->siteurl?>/rusers/join_now.php  onclick="return&nbsp;validateFormPro('<?echo $rss_alert["membership_status"]?>' )" >Upgrade To Pro</a>                                               
                                                    
                                                    
                                                    
                                                    
                                                    

				<br>
<br>   				
   		






			    
                                                    <img src=/images/blue_dash.gif border="0">  <a  href=<? echo $CONFIG->siteurl?>/rusers/get_traffic.php>Get Traffic</a>

                    

				<br>
<br>   				


<img src=/images/blue_dash.gif border="0">  <a  href=<? echo $CONFIG->siteurl?>/rusers/traffic_rotator_stats.php>Traffic Rotator Stats</a>


				<br>
<br>   	


   					
			    
                                                    <img src=/images/blue_dash.gif border="0">  <a  href=<? echo $CONFIG->siteurl?>/rusers/details.php>Account Details</a>

				<br>
<br>

                                                     <img src=/images/blue_dash.gif border=0> <a  href=<? echo $CONFIG->siteurl?>/rusers/direct_referrals.php>Direct Referrals</a>

				  
<br>
<br>

                                                 <img src=/images/blue_dash.gif border=0> <a  href=<? echo $CONFIG->siteurl?>/rusers/statistics.php>Statistics</a>
<br>
<br>


				<img src=/images/blue_dash.gif border=0> <a  href=<? echo $CONFIG->siteurl?>/rusers/banner.php>Banner Info</a>
<br>
<br>

				 <img src=/images/blue_dash.gif border=0> <a  href=<? echo $CONFIG->siteurl?>/rusers/textad.php>Text Ad Info</a>
				
<br>
<br>

                                                    <img src=/images/blue_dash.gif border=0> <a  href=<? echo $CONFIG->siteurl?>/rusers/promote.php>URL To Promote</a>

<br>
<br>



				 <img src=/images/blue_dash.gif border=0> <a  href=<? echo $CONFIG->siteurl?>/rusers/memberarea.php>Member's Home</a>
   

<br>
<br>











			 <img src=/images/blue_dash.gif border=0> <a  href=<? echo $CONFIG->siteurl?>/rusers/logout.php>Log Out</a>
   


<br>
<br>




				</div>
   			</td>
   		</tr>
   	</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
	<?}
			
	?>