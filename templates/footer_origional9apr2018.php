<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" >
		<tr>
			<td id=heading>
			<? if($CONFIG->footer_banners){include("$CONFIG->wwwroot/banner_jos.php");};?>
			<? if(       !  $CONFIG->footer_textads){include("$CONFIG->wwwroot/banner_sus.php");};?>
			</td></tr></table>
			
	<!--		
			
	<table width="690" border="1" align="center" cellpadding="0" cellspacing="0" id=heading>
		<tr>
			<td id=heading><p>
				<div id="menu1" align=center>
				<a  class="link3" href=<?=$CONFIG->siteurl?>/index.php>Home</a>
				<a  class="link3" href=<?=$CONFIG->siteurl?>/login.php>Login</a>
				<a  class="link3" href=<?=$CONFIG->siteurl?>/join_now.php>Join now</a>
				<a   class="link3" href=<?=$CONFIG->siteurl?>/faq.php>FAQ</a>
				<a  class="link3" href=<?=$CONFIG->siteurl?>/contact.php>Contact us
				<?=codare_output($gTMgr);?>
