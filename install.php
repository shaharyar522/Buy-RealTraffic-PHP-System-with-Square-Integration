<?
$title="The Randomizer 2.0 auto installer";
$dbuser=$_POST['dbuser'];
$dbpass=$_POST['dbpass'];
$dbname=$_POST['dbname'];
$dbhost=$_POST['dbhost'];
$mesaj="<title>$title</title><style>LI {
	LIST-STYLE-IMAGE: url(images/sageti.gif)
}
.mess{background-color: #FF6600;border:ridge 2px white;border-width:thin;color:white; width:400px;text-align:center;font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px;}</style>
<body bgcolor=#336699 text=white>";
$antet="$mesaj<center><div class=mess>
<strong>The Randomizer 2.0 auto installer</strong><br><br></div><div class=mess>";
if(!isset($dbuser)){
echo
"$mesaj
<center>
<div align=center class=mess>
<strong>ESBHOST auto installer</strong><br><br></div>
<form action=install.php method=post>
<fieldset style=\"width=400px\">
<legend style\"\"><strong>Database settings</strong></legend>
<div align=left class=mess>
<ul><li>
<strong>Database Host:</strong>
<input type=text class=input name=dbhost value=localhost>
</li><li>
<strong>Database Name:  </strong>
<input type=text class=input name=dbname>
</li><li>
<strong>Database Username: </strong>
<input type=text class=input name=dbuser><li>
<strong>Database Password:</strong>
<input type=password class=input name=dbpass>
</ul>

</fieldset>
</div>
<fieldset style=\"width=400px\"><legend><strong>Admin account settings.</strong></legend>
<div align=center class=mess>
<table  border=\"0\" cellspacing=\"0\" cellpadding=\"3\" class=\"mess\" >
        <tr id=heading>
          <td colspan=\"2\" align=center  class=text ><strong>
			</td>
        </tr>
        <tr>
          <td width=\"35%\" align=\"right\" class=text > <div align=\"right\"><span class=\"barreclair\"><font color=\"FF0000\">*</font>Username:
              </span> </div></td>
          <td width=\"65%\" align=\"left\" class=text ><input class=input  name=\"username\" type=\"text\" id=\"username\" maxlength=\"15\" value=\"username\" ></td>
        </tr>
        <tr>
          <td align=\"right\" class=text ><font color=\"FF0000\">*</font>Email
            address:</td>
          <td align=\"left\" class=text ><input class=input  name=\"email\" type=\"text\" id=\"email\" maxlength=\"60\" value=\"email\"></td>
        </tr>
        <tr>
          <td align=\"right\" class=text ><font color=\"FF0000\">*</font>First
            name:</td>
          <td align=\"left\" class=text ><input class=input  name=\"firstname\" type=\"text\" id=\"firstname\" maxlength=\"30\" value=\"firstname\"></td>
        </tr>
        <tr>
          <td align=\"right\" class=text ><font color=\"FF0000\">*</font>Last
            name:</td>
          <td align=\"left\" class=text ><input class=input  name=\"lastname\" type=\"text\" id=\"lastname\" maxlength=\"30\"
		  value=\"lastname\"></td>
        </tr>
		        <tr>
          <td align=\"right\" class=text >Paypal
            address:</td>
          <td align=\"left\" class=text ><input class=input  name=\"paypal\" type=\"text\" id=\"paypal\"
		  value=\"paypal\"></td>
        </tr>
        <tr>
          <td align=\"right\" class=text >alertpay
            address:</td>
          <td align=\"left\" class=text ><input class=input  name=\"stormpay\" type=\"text\" id=\"stormpay\"
		  value=\"stormpay\"></td>
        </tr>
        <tr>
          <td align=\"right\" class=text >Egold ID:</td>
          <td align=\"left\" class=text ><input class=input  name=\"egold\" type=\"text\" id=\"egold\"
		  value=\"egold\"></td>
        </tr>
        <tr>
          <td align=\"right\" class=text >libertyreserve ID</td>
          <td align=\"left\" class=text ><input class=input  name=\"libertyreserve\" type=\"text\" id=\"libertyreserve\"
		  value=\"libertyreserve\"></td>
        </tr>
		  <tr>
          <td align=\"right\" class=text >AssuredPay ID</td>
          <td align=\"left\" class=text ><input class=input  name=\"assuredpay\" type=\"text\" id=\"assuredpay\"
		  value=\"assuredpay\"></td>
        </tr>
		<tr>
          <td align=\"right\" class=text >solidtrustpay ID</td>
          <td align=\"left\" class=text ><input class=input  name=\"solidtrustpay\" type=\"text\" id=\"solidtrustpay\"
		  value=\"solidtrustpay\"></td>
        </tr>
		  <tr>
          <td align=\"right\" class=text >Fleetpay ID</td> ID</td>
          <td align=\"left\" class=text ><input class=input  name=\"fleetpay\" type=\"text\" id=\"fleetpay\"
		  value=\"fleetpay\"></td>
        </tr>
		<tr>
          <td align=\"right\" class=text >Dollardeliverys ID</td>
          <td align=\"left\" class=text ><input class=input  name=\"dollardeliverys\" type=\"text\" id=\"dollardeliverys\"
		  value=\"dollardeliverys\"></td>
        </tr>
		  <tr>
          <td align=\"right\" class=text >MoneyBookers ID</td>
          <td align=\"left\" class=text ><input class=input  name=\"moneybookers\" type=\"text\" id=\"moneybookers\"
		  value=\"moneybookers\"></td>
        </tr>
        <tr>
          <td align=\"right\" class=text ><font color=\"FF0000\">*</font>Password:</td>
          <td align=\"left\" class=text ><input class=input  name=\"password\" type=\"text\" id=\"Password\"
		 ></td>
        </tr>

        <tr align=\"center\">
          <td colspan=\"2\" class=text ><input type=submit value=\"Install now\"></form></td>
        </tr>
      </table>
</fieldset>";
}
else{
$dbh=($GLOBALS["___mysqli_ston"] = mysqli_connect("$dbhost",  "$dbuser",  "$dbpass")) or die ('<div align=center class=mess>
<strong>The Randomizer 2.0 auto installer</strong><br></div>$antet I cannot connect to the database because: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
mysqli_select_db($GLOBALS["___mysqli_ston"], $dbname);

$s=mysqli_query($GLOBALS["___mysqli_ston"], "CREATE TABLE administration (
  id int(2) NOT NULL auto_increment,
  promote blob NOT NULL,
  wcm blob NOT NULL,
  indexp blob NOT NULL,
  faq blob NOT NULL,
  member blob NOT NULL,
  joinp blob NOT NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM COMMENT='Site settings and content'") or die("$antet<br>An error has occured while attepting to create the administration table.<br><br>Please check the database settings .</font><br> <strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));
echo"$antet <br><div class=text align=center><ul><li>Admin table created succesfully</li>";
$s=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO administration VALUES (1, 'promote\'\'\'\'\'\':)', 'Dear %username%,\r\nThank you for joining!\r\nYou cam login now to your exclusive member area.\r\nBest regards,\r\nAdmin', '&lt;div class=text&gt;&lt;strong&gt;Thank you for using TheRandomizer.&lt;/strong&gt;&lt;br&gt;\r\nYou can add here the content for your index page.&lt;br&gt; &lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;', '&lt;div align=center class=text&gt;\r\nFaq page \r\n&lt;br&gt;\r\nEdit it from the admin area.\r\n', 'Member announcements:&lt;ul&gt;\r\n&lt;li&gt;first item here&lt;/li&gt;\r\n&lt;li&gt;second item here&lt;/li&gt;\r\n&lt;/ul&gt;', '&lt;div class=text&gt;Join now ')")  or die("An error has occured while attepting to populate the administration table<br> <strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));
echo"<li>Administration table populated succesfully</li>";
$s=mysqli_query($GLOBALS["___mysqli_ston"], "CREATE TABLE hits (
  id int(20) NOT NULL auto_increment,
  username varchar(30) NOT NULL default '',
  refer varchar(255) NOT NULL default '',
  ip varchar(16) NOT NULL default '',
  date datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id)
) TYPE=MyISAM COMMENT='hits'")or die("$antet<strong>An error has occured while attepting to create the hits table</strong><br> <strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));


$s=mysqli_query($GLOBALS["___mysqli_ston"], "CREATE TABLE random_referrals (
  id int(4) NOT NULL auto_increment,
  sponsor varchar(15) NOT NULL default '',
  username varchar(15) NOT NULL default '',
  joindate datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id)
) TYPE=MyISAM COMMENT='random referrals table'") or die("$antet<strong>An error has occured while attepting to create the random referrals table</strong><br> <strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));
echo"<li>Random referrals table created succesfully</li>";
$s=mysqli_query($GLOBALS["___mysqli_ston"], "CREATE TABLE users (
  id int(5) NOT NULL auto_increment,
  username varchar(15) NOT NULL default '',
  password varchar(15) NOT NULL default '',
  firstname varchar(30) NOT NULL default '',
  lastname varchar(30) NOT NULL default '',
  email varchar(60) NOT NULL default '',
  sponsor varchar(15) NOT NULL default 'admin',
  paypal varchar(60) NOT NULL default 'none',
  stormpay varchar(50) NOT NULL default 'none',
  egold varchar(50) NOT NULL default 'none',
  libertyreserve varchar(50) NOT NULL default 'none',
  assuredpay VARCHAR( 60 ) NOT NULL default 'none',
  solidtrustpay varchar(75) NOT NULL default 'none',
  fleetpay VARCHAR( 75 ) NOT NULL default 'none',
  dollardeliverys varchar(75) NOT NULL default 'none',
  moneybookers VARCHAR( 75 ) NOT NULL default 'none',
  weight int( 6 ) NOT NULL default '1',
  lastlogin datetime NOT NULL default '0000-00-00 00:00:00',
  joindate datetime NOT NULL default '0000-00-00 00:00:00',
  last_ip varchar(15) NOT NULL default '',
  PRIMARY KEY  (id)
) TYPE=MyISAM COMMENT='This table contains the users'") or die("$antet<strong>An error has occured while attepting to create the users table</strong><br> <strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));
echo"<li>Users table created succesfully</li>";
$s=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO users VALUES (1, '".addslashes($_POST["username"])."', '".$_POST["password"]."', '".addslashes($_POST["firstname"])."', '".addslashes($_POST["lastname"])."', '".addslashes($_POST["email"])."', 'admin', '".addslashes($_POST["paypal"])."', '".addslashes($_POST["stormpay"])."', '".addslashes($_POST["egold"])."', '".addslashes($_POST["libertyreserve"])."','".addslashes($_POST["assuredpay"])."',
'".addslashes($_POST["solidtrustpay"])."',
'".addslashes($_POST["fleetpay"])."',
'".addslashes($_POST["dollardeliverys"])."',
'".addslashes($_POST["moneybookers"])."',
'1', now() , now(), '$REMOTE_ADDR')
") or die("$antet<strong>An error has occured while attepting to create the Users  table</strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));
echo"<li>Refferals table created succesfully</li>";
$s=mysqli_query($GLOBALS["___mysqli_ston"], "CREATE TABLE `chances` (
`id` INT( 4 ) NOT NULL AUTO_INCREMENT,
`username` VARCHAR( 15 ) NOT NULL ,
`start` INT( 9 ) NOT NULL ,
`finish` int( 10 ) NOT NULL ,
PRIMARY KEY ( `id` )
) TYPE = MYISAM COMMENT = 'Tickets for the randomizer system-DO NOT EDIT'
") or die("$antet<strong>An error has occured while attepting to create the chances  table</strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));
$s=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `chances` ( `id` , `username` , `start` , `finish` )
VALUES (
'1', 'admin', '1', '2'
)
") or die("<strong>An error has occured while attepting to create the Weight  table</strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));
echo"<li>Weight table created succesfully</li>";
$s=mysqli_query($GLOBALS["___mysqli_ston"], "CREATE TABLE `chances_temp` (
`id` INT( 5 ) NOT NULL AUTO_INCREMENT,
`username` VARCHAR( 15 ) NOT NULL ,
`credits` INT( 3 ) NOT NULL ,
`status` ENUM( 'accepted', 'rejected', 'unverified' ) NOT NULL,
PRIMARY KEY ( `id` )
) TYPE = MYISAM COMMENT = 'Temporary table containining unverified weight purchases'
") or die("$antet<strong>An error has occured while attepting to create the Weight temporary table</strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));
echo"<li>Weight Temporary table created succesfully</li>";

$s=mysqli_query($GLOBALS["___mysqli_ston"], "CREATE TABLE `banners` (
`id` INT( 5 ) NOT NULL AUTO_INCREMENT,
`username` VARCHAR( 15 ) NOT NULL ,
`url` VARCHAR( 100) NOT NULL ,
`urlto` VARCHAR( 100 ) NOT NULL ,
`clicks` MEDIUMINT( 5 ) NOT NULL ,
`views` MEDIUMINT( 5 ) NOT NULL ,
PRIMARY KEY ( `id` )
) TYPE = MYISAM COMMENT = 'Banners'") or die("$antet<br>Table banners could not be created.<br><br>Please check the database settings .</font><br> <strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));
echo" <br><div class=text align=center><ul><li>Banners table created succesfully</li>";
$s=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO banners VALUES (1, 'admin', 'http://www.esbhost.com/banners/esb/host1.jpg', 'http://www.esbhost.com/', 0, 0);") or die("$antet<br>Table banners could not be populated.<br><br>Please check the database settings .</font><br> <strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));
echo"<br><div class=text align=center><ul><li>Banners table populated succesfully</li>";
$s=mysqli_query($GLOBALS["___mysqli_ston"], "CREATE TABLE textads (
  id int(11) NOT NULL auto_increment,
  username varchar(15) NOT NULL default '',
  text varchar(150) NOT NULL default '',
  url varchar(100) NOT NULL default '',
  urlto varchar(100) NOT NULL default '',
  clicks mediumint(5) NOT NULL default '0',
  views mediumint(5) NOT NULL default '0',
  PRIMARY KEY  (id)
) TYPE = MYISAM ")or die("$antet<strong>An error has occured while attepting to create the textads table</strong><br> <strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));

echo"<li>Textads table created succesfully</li>";

$s=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO textads VALUES (1, 'admin', 'Create your Randomizer site in a few minutes,using ESBHost Randomizer.Accepts more Payment Processors then ever!Rotate banners and text ads!', 'The ESBHost.com', 'http://www.esbhost.com', 0, 0)") or die("$antet<br>Table textads could not be populated.<br><br>Please check the database settings .</font><br> <strong>mysql said</strong><br>:".mysqli_error($GLOBALS["___mysqli_ston"]));
echo"<li>Textads table populated succesfully</li>";
echo"</ul><font color=white><b>If you can see this message,everything went OK.Your database is created now.<br><br>
<br><br>
Do not forget to delete this file(install.php) from your webserver.</font><br>
<br></b>Thank you for using <a href=\"http://www.esbhost.com\">ESBHost.com</a>'s Randomizer<br><br><br>";}

?>
