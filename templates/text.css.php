
<?
@include"../config.php";
global $CONFIG;
switch($CONFIG->colorscheme){
default:
$darkcolor="#B3D8FF";
$bgcolor="#5985B3";
$lightcolor="#9DC7F2";
break;
case 'nice_blue':
$darkcolor="#B3D8FF";
$bgcolor="#5985B3";
$lightcolor="#9DC7F2";
break;
case 'almost_green':
$darkcolor="#D0F29D";
$bgcolor="#96B359";
$lightcolor="#E3F2C2";
break;
case 'fresh':
$darkcolor="#66CC00";
$bgcolor="#336600";
$lightcolor="#66FF33";
break;
case 'sunny':
$darkcolor="#FFCC00";
$bgcolor="#FF9900";
$lightcolor="#FFFFCC";
break;
case 'custom':
$darkcolor=$CONFIG->darkcolor;
$bgcolor=$CONFIG->bgcolor;
$lightcolor=$CONFIG->lightcolor;
break;
}


 ?>
 body{background-color: <?=$bgcolor?>;
	margin-top: 0px;
}
 #even{background-color: <?=$bgcolor?>}
 #odd{background-color: #c0c0c0}
 #heading{background-color: <?=$bgcolor?>;border-width:thin;color:#fff;border-top:0px double #fff
 ;border-bottom:1px double #fff;border-left:1px double #fff;border-right:1px double #fff;display: block; }
 #heading_light{background-color: <?=$darkcolor?>;color:#fff;border:1px inset #fff #fff #fff #fff}
#menu	{ width: 150px }
#menu	a:link		{ background-color: <?=$darkcolor?>; border-top: 1px solid <?=$darkcolor?>; border-bottom: 1px solid #000000; display: block; font: 12px Tahoma, Verdana, Arial, sans-serif; color: #000;  line-height: 1.2; text-transform: capitalize; padding-left: 8px; height: 20px;}
#menu	a:visited	{ background-color: <?=$darkcolor?>; border-top: 1px solid <?=$darkcolor?>; border-bottom: 1px solid #A2C4E8; display: block; font: 12px Tahoma, Verdana, Arial, sans-serif; color: #000;  line-height: 1.2; text-transform: capitalize; padding-left: 8px; height: 20px;  }
#menu	a:hover    	{ background-color: <?=$lightcolor?>; border-top: 1px solid <?=$darkcolor?>; border-bottom: 1px solid #A2C4E8; display: block; font: 12px Tahoma, Verdana, Arial, sans-serif; color: #000;  line-height: 1.2; text-transform: capitalize; padding-left: 8px; height: 20px; }

 .button {background-color: <?=$bgcolor?>;border-width:thin;color:#fff;border-top:1px double #fff
 ;border-bottom:1px double #fff;border-left:1px double #fff;border-right:1px double #fff;display: block; }
#menu1	a:link		{   font: 12px Tahoma, Verdana, Arial, sans-serif; color: #fff;  line-height: 1.2; text-transform: capitalize; padding-left: 8px; height: 20px;}
#menu1	a:visited	{ font: 12px Tahoma, Verdana, Arial, sans-serif; color: #fff;  line-height: 1.2; text-transform: capitalize; padding-left: 8px; height: 20px;  }
#menu1	a:hover    	{ font: 12px Tahoma, Verdana, Arial, sans-serif; color: #fff;  line-height: 1.2; text-transform: capitalize; padding-left: 8px; height: 20px; text-decoration:underline;}
.navigation		{ border: 1px solid <?=$bgcolor?>; background-color: #fff; width:150px}


a 		{ color: #000; text-decoration: none}
a:link		{ color: #000; background-color: transparent}
a:visited 	{ color:#ccc; background-color: transparent }
a:hover 	{ color: #000; background-color: <?=$bgcolor?> }



.text {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; line-height: normal; font-weight: normal; font-variant: normal; text-transform: none;  text-decoration: none}
.micutz {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size:9px; font-style: normal; line-height: normal; font-weight: normal; font-variant: normal; text-transform: none;  text-decoration: none}
.micutz_inchis {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; font-style: normal; line-height: normal; font-weight: normal; font-variant: normal; text-transform: none; color:<?=$bgcolor?>; text-decoration: none}
.punctat {  border-color: #FFFFFF #666666 #FFFFFF #FFFFFF; border-style: dotted; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px}
.punctat_jos {  border-color: #FFFFFF #FFFFFF #666666; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; font-style: normal; line-height: normal; font-weight: normal; font-variant: normal; text-transform: none; color:<?=$bgcolor?>; text-decoration: none; border-style: dotted;}
.norepeat {  background-repeat: no-repeat; background-position: right top}
.form {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #000080; text-decoration: none; background-color: lightblue; border: 1px #666666 solid}

.text_mic {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; font-style: normal; line-height: normal; font-weight: normal; font-variant: normal; text-transform: none; color: #000; text-decoration: none}
.form_mic {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #000080; text-decoration: none; background-color: lightblue; border: 1px #666666 solid}
.link1:hover{background-color:white;font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; line-height: normal; font-weight: normal; font-variant: normal; text-transform: none; color:<?=$bgcolor?>; text-decoration: underline}
.link1:visited{background-color:white;font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; line-height: normal; font-weight: normal; font-variant: normal; text-transform: none; color:<?=$bgcolor?>; text-decoration:none}
.link1:link{background-color: white;font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; line-height: normal; font-weight: normal; font-variant: normal; text-transform: none; color:<?=$bgcolor?>; text-decoration:none}
.link2:hover{font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; line-height: normal; font-weight: normal; font-variant: normal; text-transform: none;  text-decoration: underline;color:#fff}
.link2:visited{font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; line-height: normal; font-weight: normal; font-variant: normal; text-transform: none;text-decoration:none;color:#fff}
.link2:link{font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; line-height: normal; font-weight: normal; font-variant: normal; text-transform: none;  text-decoration:none;color:#fff}
LI {
	LIST-STYLE-IMAGE: url(../rimages/sageti.gif)
}
.sitename {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none;  text-decoration: none}
.input {border:1px <?=$lightcolor?> ridge;color:<?=$bgcolor?>;font-family: Verdana, Arial, Helvetica, sans-serif;background:#ffffff
	FONT-WEIGHT: normal; FONT-SIZE: 12px; BACKGROUND: url(../rimages/back_input.gif); }
.input2 {border:1px <?=$lightcolor?> ridge;color:<?=$bgcolor?>;font-family: Verdana, Arial, Helvetica, sans-serif;background:#ffffff
	FONT-WEIGHT: normal; FONT-SIZE: 12px; BACKGROUND: url(../rimages/back_input2.gif); }
.select {
	BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; FONT-WEIGHT: normal; FONT-SIZE: 12px; BORDER-LEFT: #000000 1px solid; COLOR: #1c3664; BORDER-BOTTOM: #000000 1px solid; FONT-FAMILY: Verdana; HEIGHT: 19px
}
.textad{ background-color: <?=$darkcolor?>; border :1px solid white;  font: 12px Tahoma, Verdana, Arial, sans-serif; color: #000;  line-height: 1.2; padding-left: 8px; height:90px}