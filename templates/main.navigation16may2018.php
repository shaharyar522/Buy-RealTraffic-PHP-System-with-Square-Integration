<?

if(login_ok()){
?>


	<table border="0" cellspacing="0" cellpadding="0" align="center" valign=top>
		<tr valign="top">
			<td>
				


<table width="155px" border="1" cellspacing="0" cellpadding="0" bordercolor="#999999>" bgcolor="#d8ecff" valign=top>
	

<br>				<tr>
						<td>
							


<table width="100%" border="0" cellspacing="0" cellpadding="3" class="text" id=heading_light" valign=top>
	


							<tr id=heading>
				
					
<td align="center" class="text"><strong>Welcome ,<br> <?=$_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"] ?></strong>
	






								</td>
								</tr>


								<tr>
									<td align="left" class="text_mic">
										   	<table  border="0" cellspacing="0" cellpadding="0">
   		<tr>
   			<td class="navigation">
   				<div id="menu">
   				
   				
   				
                                                    <img src=/images/blue_dash.gif border="0">  
       

       

   <a  href=<?=$CONFIG->siteurl?>/rusers/join_now.php>Upgrade To Pro</a>                                               
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    

				<br>
<br>   				
   		
   					
			    
                                                    <img src=/images/blue_dash.gif border="0">  <a  href=<?=$CONFIG->siteurl?>/rusers/details.php>Account Details</a>

				<br>
<br>

                                                     <img src=/images/blue_dash.gif border=0> <a  href=<?=$CONFIG->siteurl?>/rusers/direct_referrals.php>Direct referrals</a>

				  
<br>
<br>

                                                 <img src=/images/blue_dash.gif border=0> <a  href=<?=$CONFIG->siteurl?>/rusers/statistics.php>Statistics</a>
<br>
<br>


				<img src=/images/blue_dash.gif border=0> <a  href=<?=$CONFIG->siteurl?>/rusers/banner.php>Banner Info</a>
<br>
<br>

				 <img src=/images/blue_dash.gif border=0> <a  href=<?=$CONFIG->siteurl?>/rusers/textad.php>Text Ad Info</a>
				
<br>
<br>

                                                    <img src=/images/blue_dash.gif border=0> <a  href=<?=$CONFIG->siteurl?>/rusers/promote.php>URL to promote</a>

<br>
<br>



				 <img src=/images/blue_dash.gif border=0> <a  href=<?=$CONFIG->siteurl?>/rusers/memberarea.php>Members Home</a>
   

<br>
<br>



			 <img src=/images/blue_dash.gif border=0> <a  href=<?=$CONFIG->siteurl?>/rusers/logout.php>Logout</a>
   





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