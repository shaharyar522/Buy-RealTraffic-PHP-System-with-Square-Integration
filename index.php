<?
// include 'rector.php'; 
include 'config.php';  
///////////////////////////////////////////////////
//echo $CONFIG->wwwroot;
//echo $CONFIG->sitename;



//////////////////////////////////////////////////
 $title="Welcome to $CONFIG->sitename"; 





?>



  	


<?
include("$CONFIG->templatedir/header.php");


$page_content=grab_content("indexp");


  $total = $CONFIG->adminfee+$CONFIG->sponsorfee;
  $total =  number_format($total,2);
 
 

$page_content=str_replace("(sponsorfee + adminfee)",$total,$page_content);
$page_content=str_replace("adminfee_free",$CONFIG->adminfee_free,$page_content);
$page_content=str_replace("adminfee",$CONFIG->adminfee,$page_content);
$page_content=str_replace("sponsorfee_free",$CONFIG->sponsorfee_free,$page_content);
$page_content=str_replace("sponsorfee",$CONFIG->sponsorfee,$page_content);


//$page_content=str_replace("login_timer",$CONFIG->login_timer,$page_content);  

//      $sql_max = "SELECT * FROM url_site_setting";
//      $res_max = mysql_query($sql_max);
//      $row_max = mysql_fetch_array($res_max);
//      $login_timer = $row_max['login_timer']; 

include("$CONFIG->templatedir/SiteSettingClass.php");
     
        $sitesettingObj = new SiteSetting; 
        $sitesettingObj->GetSitesetting();  
        
$page_content=str_replace("login_timer",$sitesettingObj->login_timer,$page_content);










$page_content=html_entity_decode(stripslashes($page_content));
include("$CONFIG->templatedir/content.php");

include("$CONFIG->templatedir/footer.php");
?>




<!----------------below is the pop up code------------------>

<?php 

$sql = "SELECT * FROM popup_setting LIMIT 1";
$result = mysqli_query($connection, $sql);



// ✅ Step 3: Show result if available
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    //echo "<pre>";
    print_r($row['impressions']);
    print_r($row['pop_up_click_count']);
    //pop_up_weight
    //pop_up_message
    //pop_up_message_font_color
    //pop_up_message_font_size
    //pop_up_message_font_face
    //pop_up_button_text
    //pop_up_button_size
    //pop_up_button_color
    //pop_up_button_font_face
    //pop_up_button_background
    //pop_up_button_url
    //pop_up_button_hover_color
    //echo "</pre>";
} else {
    echo "<h4>⚠️ No rows found in table 'popup_setting'.</h4>";
}



?>

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
    background: <?php echo $row['pop_up_bg_color']; ?>; 
    color: white;
    border-radius: 8px;
    padding: 100px 100px;
    max-width: <?php echo $row['pop_up_height']; ?>px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    position: relative;
  }

  .popup-box h2 {
    font-size: <?php echo $row['pop_up_message_font_size']; ?>px;
    font-weight: 700;
    margin-bottom: 10px;
    line-height:1.0;
    color:<?php echo $row['pop_up_message_font_color']; ?>;
    font-family: <?php if (!empty($row['pop_up_message_font_face'])) {
            echo "'" . $row['pop_up_message_font_face'] . "', sans-serif";
        } else {
            echo "'Rateway (Primary)', sans-serif";
        }
      ?>;
  }

  .popup-box hr {
      /*
    width: 60px;
    border: 2px solid white;
    margin: 10px auto 20px;
    */
  }

  .popup-box button {
    font-size: <?php echo $row['pop_up_button_size']; ?>px;  
    background: <?php echo $row['pop_up_button_background']; ?>;
    color: <?php echo $row['pop_up_button_color']; ?>;
    border: none;
    padding: 12px 20px;
    font-weight: bold;
    /*text-transform: uppercase;*/
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.2s ease;
    font-family: <?php if (!empty($row['pop_up_button_font_face'])) {
            echo "'" . $row['pop_up_button_font_face'] . "', sans-serif";
        } else {
            echo "'Montserrat (Secondary font)', sans-serif";
        }
      ?>;
  }

  .popup-box button:hover {
    background: <?php echo $row['pop_up_button_hover_color']; ?>;
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
    <h2><?php echo $row['pop_up_message']; ?></h2>
    <!--<hr>-->
    <button id="popupButton_to_save" onclick="window.open('<?php echo $row['pop_up_button_url']; ?>', '_blank')">
    <?php echo $row['pop_up_button_text']; ?>
</button>
<!--
    <div class="popup-stats">
      <span class="stat-item">Impressions: <strong><?php echo $row['impressions']; ?></strong></span>
      <span class="stat-separator">|</span>
      <span class="stat-item">Clicks: <strong><?php echo $row['pop_up_click_count']; ?></strong></span>
    </div>
-->
  </div>
</div>



<script>

/*
  // Allowed URLs for popup
  const allowedUrls = [
    'https://www.buy-realtraffic.com/',
    'https://www.buy-realtraffic.com/index.php'
  ];

  // Get the current full URL
  const currentUrl = window.location.href;
  const popupStatus = <?php echo (int)$row['pop_up_status']; ?>;
  // Check if current page is allowed
  if (allowedUrls.includes(currentUrl)  && popupStatus === 1) {
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
  
 */
 
 
 
 
 
 
 
 
 
  window.addEventListener('load', function() {

    const allowedUrls = [
      'https://www.buy-realtraffic.com/',
      'https://www.buy-realtraffic.com/index.php'
    ];

    const currentUrl = window.location.href;
    const popupStatus = <?php echo (int)$row['pop_up_status']; ?>;

    // ✅ Show popup only if allowed and active
    if (allowedUrls.includes(currentUrl) && popupStatus === 1) {
    setTimeout(() => {
      const popup = document.getElementById('trafficPopup');
      if (popup) {
        popup.classList.add('active');

        // 📈 1️⃣ Send AJAX request to increase impressions count
        fetch('ajax_update_impressions.php', {
          method: 'POST'
        })
        .then(response => response.text())
        .then(data => console.log('✅ Impressions count updated:', data))
        .catch(error => console.error('❌ Error updating impressions:', error));
      }
    }, 2000);
  } else {
      const popup = document.getElementById('trafficPopup');
      if (popup) popup.style.display = 'none';
    }

    // ✅ Close popup
    window.closePopup = function() {
      const popup = document.getElementById('trafficPopup');
      if (popup) popup.classList.remove('active');
    }

    // ✅ Button click event
    const popupButton = document.getElementById('popupButton_to_save');
    if (popupButton) {
      popupButton.addEventListener('click', function() {
        // 1️⃣ Open the link in a new tab
        window.open('<?php echo $row['pop_up_button_url']; ?>', '_blank');

        // 2️⃣ Send AJAX to update count
        fetch('ajax_update_popup_count.php', {
          method: 'POST'
        })
        .then(response => response.text())
        .then(data => console.log('✅ Popup count updated:', data))
        .catch(error => console.error('❌ Error updating count:', error));

        // 3️⃣ Optionally close popup
        closePopup();
      });
    }
  });
 
  
  
  
</script>
