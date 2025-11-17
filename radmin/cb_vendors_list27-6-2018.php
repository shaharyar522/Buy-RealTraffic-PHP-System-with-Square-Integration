<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Member ads";
include("$CONFIG->templatedir/header.php");




    function GetImageExtension($imagetype)
    {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }

     }
 
	
if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "../images/".$imagename;

  if(move_uploaded_file($temp_name, $target_path)) {
 	$query_upload="INSERT into cb_vendors (cb_vendor_number,cb_image,cb_title,cb_description,cb_vendor_name) VALUES 
        ('".$_POST["vendornumber"]."','".$target_path ."','".$_POST["entercbtitle"]."','".$_POST["entercbdescription"]."','".$_POST["entercbvendorname"]."')";
	db_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  	
       }else{
       exit("Error While uploading image on the server");
       } 

}





$page_content=read_template("$CONFIG->templatedir/admin.cb_vendors_list.php");


include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>

