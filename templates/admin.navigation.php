<?

if(login_ok_admin()){
?>
	<table border="0" cellspacing="0" cellpadding="0" align="center" valign=top>
		<tr valign="top">
			<td>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="<?=$CONFIG->lightcolor?>" valign=top>
	

				<tr>
						<td>
							

<table width="100%" border="0" cellspacing="0" cellpadding="3" class="text" id=heading_light valign=top>
							

	<tr id=heading>
									

<td align="center" class="text"><strong>Welcome ,<br> <?=$_SESSION['ADMIN']["admin"]["firstname"] . " " . $_SESSION['ADMIN']["admin"]["lastname"] ?></strong>
	

								</td>
								</tr>


								<tr>
									

<td align="right" class="text_mic">
										  	

<table  border="0" cellspacing="0" cellpadding="0">
   		<tr>
   			<td class="navigation">
   				

<div id="menu">
	

<a  href=<?=$CONFIG->siteurl?>/radmin/merchants_list.php>Merchant Codes</a><br>
<br>



<a  href=<?=$CONFIG->siteurl?>/radmin/login_sitelist_all.php>Login Sites</a><br>
<br>


<a  href=<?=$CONFIG->siteurl?>/radmin/traffic_sitelist_all.php>Traffic Sites</a><br>
<br>


<a  href=<?=$CONFIG->siteurl?>/radmin/default_login_site_list.php>Default Login Sites</a><br>
<br>



<a  href=<?=$CONFIG->siteurl?>/radmin/popup_settings.php>Popup Settings</a><br>
<br>	

	

<a  href=<?=$CONFIG->siteurl?>/radmin/site_settings.php>My Settings</a><br>
<br>	

	


<a  href=<?=$CONFIG->siteurl?>/radmin/cb_vendors_list.php>CB Vendors List</a><br>
<br>	




<a  href=<?=$CONFIG->siteurl?>/radmin/cb_browse_textads.php>Browse CB Text Ads</a><br>
<br>	

<a  href=<?=$CONFIG->siteurl?>/radmin/cb_textad.php>Default CB Text Ads</a><br>
<br>	


<a  href=<?=$CONFIG->siteurl?>/radmin/change_page_status.php>Change Page Status</a><br>
<br>

<a  href=<?=$CONFIG->siteurl?>/radmin/add_login_credits.php>Add Login Credits</a><br>
<br>
	
	
<a  href=<?=$CONFIG->siteurl?>/radmin/add_traffic_credits.php>Add Traffic Credits</a><br>
<br>
	
	
	
<a  href=<?=$CONFIG->siteurl?>/radmin/members_ads.php>Members Ads</a><br>
<br>


<a  href=<?=$CONFIG->siteurl?>/radmin/change_membership.php>Change Membership</a><br>
<br>
	
	
<a  href=<?=$CONFIG->siteurl?>/radmin/admin_referrals.php>Admin Referrals</a><br>
<br>
	
			                            

<a  href=<?=$CONFIG->siteurl?>/radmin/details.php>Account Details</a><br>
<br>
		

								

<a  href=<?=$CONFIG->siteurl?>/radmin/weight.php>Update weight</a><br>
<br>




										

<a  href=<?=$CONFIG->siteurl?>/radmin/browse_banners.php>Browse Banners</a><br><br>





										

<a  href=<?=$CONFIG->siteurl?>/radmin/browse_textads.php>Browse Textads</a><br>
<br>
									

	<a  href=<?=$CONFIG->siteurl?>/radmin/textad.php>Default Text ads</a><br>
<br>
										

<a  href=<?=$CONFIG->siteurl?>/radmin/banner.php>Default Banners</a><br>
<br>
			

<a  href=<?=$CONFIG->siteurl?>/radmin/sitestats.php>Site Statistics</a><br>
<br>
										

<a  href=<?=$CONFIG->siteurl?>/radmin/search_user.php>Search for user</a><br>
	<br>									

<a  href=<?=$CONFIG->siteurl?>/radmin/add_users.php>Add users</a><br>
<br>
										

<a  href=<?=$CONFIG->siteurl?>/radmin/edit_users.php>Edit users</a><br>
<br>
										

<a  href=<?=$CONFIG->siteurl?>/radmin/site_content.php>Site Content</a><br>
<br>									

<!--	<a  href=<?=$CONFIG->siteurl?>/radmin/email_users.php>Email all users</a> -->
        <a  href=<?=$CONFIG->siteurl?>/radmin/user_mailer.php>Email all users</a>
        <br>
	<br>
									

<a  href=<?=$CONFIG->siteurl?>/radmin/delete_users.php>Delete Users</a><br>
	<br>
									

<a  href=<?=$CONFIG->siteurl?>/radmin/check_updates.php>Check for updates</a><br>
<br>
										

<a  href=<?=$CONFIG->siteurl?>/radmin/reset.php 
									

	onclick="return confirm('You will reset the hits table,\n INCLUDING users stats.\nAre you sure?');"><font color=red>Reset Site Hits</font> </a>
<br>
<br>
	

									<a  href=<?=$CONFIG->siteurl?>/radmin/logout.php>Logout</a>
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
	else{?>
		<table border="0" cellspacing="0" cellpadding="0" align="center" valign=top>
		<tr valign="top">
			<td>
				<table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="<?=$CONFIG->lightcolor?>" valign=top>
					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="3" class="text" id=heading_light valign=top>
								<tr id=heading>
									<td align="center" class="text"><strong>Welcome,Guest</strong>
									<br><font class=text>Please <a class=link1 href=<?=$CONFIG->siteurl?>/login.php >log in</a></font>
									</td>
								</tr>
								<tr>
									<td align="right" class="text_mic">
																	   	<table  border="0" cellspacing="0" cellpadding="0">
   		<tr>
   			<td class="navigation">
   				<div id="menu">
				<a  href=<?=$CONFIG->siteurl?>/index.php>Home</a>
				<a href=<?=$CONFIG->siteurl?>/login.php>Login &nbsp;</a>
				<a href=<?=$CONFIG->siteurl?>/join.php>Join now</a>
		

		<a  href=<?=$CONFIG->siteurl?>/faq.php>FAQ</a>
				<a  href=<?=$CONFIG->siteurl?>/contact.php>Contact us</a>
	

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
	</table><?}
	
	?>