<table  align="center" valign=top width="100%" height=50 bgcolor="#ffffff" cellpadding="4" cellspacing="0" border="0" style="border-collapse: collapse" id="AutoNumber1" bordercolor=#999999>



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
		if (! isset($page_content)) {
			$page_content = '';
		}
if (in_array($actual_link, $number_list_new)){ ?>

<table align="center"  valign="top" width="100%" height="50" bgcolor="#d8ecff" cellpadding="25" cellspacing="0" border="0" 
style="border-collapse: collapse" id="AutoNumber1" bordercolor="#999999"> <tbody> <tr><td>


   <?=$page_content?>

</td></tr></tbody></table> 

<?php } else { 
?>
  <?=$page_content?>
<?
}
?>








	 </td></tr></table></td>
  </tr>
</table><br><br>



<!----------------below is the pop up code------------------>
<!--
<style>
  /* Overlay */
  .popup-overlay {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s ease, visibility 0.3s ease;
  }

  .popup-overlay.active {
    visibility: visible;
    opacity: 1;
  }

  /* Popup box */
  .popup-box {
    background: #3a8dde;
    color: white;
    border-radius: 8px;
    padding: 100px 100px;
    max-width: 400px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    position: relative;
  }

  .popup-box h2 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 10px;
    line-height:1.5;
    color:white;
  }

  .popup-box hr {
    width: 60px;
    border: 2px solid white;
    margin: 10px auto 20px;
  }

  .popup-box button {
    background: white;
    color: #3a8dde;
    border: none;
    padding: 12px 20px;
    font-weight: bold;
    text-transform: uppercase;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.2s ease;
  }

  .popup-box button:hover {
    background: #e0e0e0;
  }

  /* Close button */
  .popup-close {
    position: absolute;
    top: 8px;
    right: 12px;
    color: white;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
  }
</style>
</head>
<body>


<div id="trafficPopup" class="popup-overlay">
  <div class="popup-box">
    <span class="popup-close" onclick="closePopup()">×</span>
    <h2>Need More Traffic and More Cash?</h2>
    <hr>
    <button onclick="window.location.href='https://www.buy-realtraffic.com/traffic1.php'">
      Click Here for Details!
    </button>
  </div>
</div>
<script>
  // Allowed URLs for popup
  const allowedUrls = [
    'https://www.buy-realtraffic.com/',
    'https://www.buy-realtraffic.com/index.php'
  ];

  // Get the current full URL
  const currentUrl = window.location.href;

  // Check if current page is allowed
  if (allowedUrls.includes(currentUrl)) {
    window.addEventListener('load', () => {
      setTimeout(() => {
        document.getElementById('trafficPopup').classList.add('active');
      }, 2000);
    });
  } else {
    // Hide popup for all other pages
    document.getElementById('trafficPopup').style.display = 'none';
  }

  // Close popup
  function closePopup() {
    document.getElementById('trafficPopup').classList.remove('active');
  }
</script>
-->