<head>
<title><?echo $title?></title>
<link href="<?echo"$CONFIG->siteurl/templates/text.css.php";?>" type="text/css" rel="StyleSheet">
<script language=JavaScript>
function click(e) {if (document.all) { if (event.button==2||event.button==3) { oncontextmenu='return false'; } }if (document.layers) { if (e.which == 3) { oncontextmenu='return false'; } } } if (document.layers) { document.captureEvents(Event.MOUSEDOWN); } onmousedown=click; </script> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="<?echo$CONFIG->bgcolor ?>" oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
  <tr> 
    <td bgcolor="<?=$CONFIG->darkercolor?>"><? $pic = array();
  $pic[0]="$CONFIG->siteurl/rimages/header_1.jpg";
  $pic[1]="$CONFIG->siteurl/rimages/header_5.jpg";
  $pic[2]="$CONFIG->siteurl/rimages/header_6.jpg";
  $pic[3]="$CONFIG->siteurl/rimages/header_7.jpg";
  $pic[4]="$CONFIG->siteurl/rimages/header_2.jpg";
  $pic[5]="$CONFIG->siteurl/rimages/header_8.jpg";
$nr=rand(0,5);
echo"<img src=$pic[$nr] border=0>";?>
	<div class=sitename  id= heading align=center><?echo$CONFIG->sitename ?></div></td>
  </tr>
</table>