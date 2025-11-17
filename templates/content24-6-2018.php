<table  align="center" valign=top width="100%" height=50 bgcolor="#ffffff" cellpadding="10" cellspacing="0" border="0" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>



<tr>
    <td width="145" valign=top>
    
    
    
    <?   
           /* $actual_link = "http://$_SERVER['HTTP_HOST']$_SERVER['REQUEST_URI']"; 
    
		$number_list =  array('http://www.ez-moneymaker.com/', 'http://www.ez-moneymaker.com/login.php', 
		'http://www.ez-moneymaker.com/join_now.php', 'http://www.ez-moneymaker.com/join.php',
		'http://www.ez-moneymaker.com/faq.php','http://www.ez-moneymaker.com/contact.php'
		);
	*/	
		if (!in_array($actual_link, $number_list))
		{
		//echo $actual_link." found in the array";
?>
	






<table>




<tr><td>
	<?//include("$CONFIG->templatedir/main.navigation.php");
	?> 
	</td></tr></table>

<?		
		
		}
    
    ?>

<!--
	<table bordercolor="BDD5E9" border=0 width=100%>
	<tr><td>
	<?include("$CONFIG->templatedir/main.navigation.php");?> </td></tr></table>

-->
	
	
	
	</td>
    <td width="100%" valign=top >
      
<table class="shadow-inside" bordercolor="BDD5E9" border=0 width=100%>






	<tr><td>







<?php 

		$number_list_new =  array('http://www.ez-moneymaker.com/rusers/join.php'
		);

if (in_array($actual_link, $number_list_new)){ ?>
<table align="center"  valign="top" width="100%" height="50" bgcolor="#d8ecff" cellpadding="25" cellspacing="0" border="0" 
style="border-collapse: collapse" id="AutoNumber1" bordercolor="#999999"> <tr><td>


   <?=$page_content?>

</td></tr></table>

<?php } else { 
?>
  <?=$page_content?>
<?
}?>








	 </td></tr></table></td>
  </tr>
</table><br><br>
