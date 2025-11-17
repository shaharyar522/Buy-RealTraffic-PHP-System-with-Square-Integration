<?
include'config.php';
$title="$CONFIG->sitename ClickBank Money Page";
include("$CONFIG->templatedir/cb_header.php");


$result = mysqli_query($GLOBALS["___mysqli_ston"], "select * from cb_vendors order by cb_vendor_number");



$page_content=read_template("$CONFIG->templatedir/cb.php");
// echo $_SESSION["sponsor"]["cb_nickname"];
//if(    $_SESSION["sponsor"]["cb_page_status"]=='Active'    )
//$page_content=str_replace("wespac59",$_SESSION["sponsor"]["cb_nickname"],$page_content);

$ii=11;
while ($row = mysqli_fetch_array($result,  MYSQLI_NUM)) {
   
      $page_content =str_replace($ii."images/CB_IMAGE_GOES_HERE",$row[1],$page_content);
      $page_content =str_replace($ii."CB_TITLE_GOES_HERE",$row[2],$page_content);
      $page_content =str_replace($ii."CB_DESCRIPTION_GOES_HERE",$row[3],$page_content);
      $page_content =str_replace($ii."CB_VENDOR_NAME_GOES_HERE",$row[4],$page_content);


   
$ii++;
}
      $page_content =str_replace("http://CB_NICKNAME_GOES_HERE","http://".$cb_nickname,$page_content);



//$page_content=str_replace("$CB_IMAGE GOES HERE1",$fill["cb_image"],$page_content);

include("$CONFIG->templatedir/content.php");








?>

<p><? //if( $CONFIG->cb_footer_textads){include("$CONFIG->wwwroot"."cb_footer_textads.php");} ?></p>

<?









include("$CONFIG->templatedir/cb_footer.php");
?>