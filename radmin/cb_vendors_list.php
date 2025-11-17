<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Member ads";
include("$CONFIG->templatedir/header.php");



 if(  isset($_POST) && $_POST != null  ) {

       if( $_POST["vendornumber"] >=1 and $_POST["vendornumber"] <=20 )
                           {

//echo $select_q= "select vendornumber from cb_vendors where cb_vendor_number=".$_POST["vendornumber"]; 
//db_query($select_q);

$fill=db_fetch_array(db_query("select cb_vendor_number from cb_vendors where cb_vendor_number=".$_POST["vendornumber"]));
$number = $fill["cb_vendor_number"]; 

      if( !( isset($number) && $number!=null ) )
        {  
 	$query_upload="INSERT into cb_vendors (cb_vendor_number,cb_image,cb_title,cb_description,cb_vendor_name) VALUES 
        ('".$_POST["vendornumber"]."','".$_POST["uploadedimage"] ."','".$_POST["entercbtitle"]."','".$_POST["entercbdescription"]."','".$_POST["entercbvendorname"]."')";
	db_query($query_upload) or die("error in $query_upload == ----> ".mysqli_error($GLOBALS["___mysqli_ston"]));  
        } else { 
                
 
/*
$q_update="UPDATE cb_vendors set cb_image = '".$_POST["uploadedimage"] ."' 
   ,cb_title ='".$_POST["entercbtitle"]."',cb_description = '".$_POST["entercbdescription"]."'         ,cb_vendor_name='".$_POST["entercbvendorname"]."'   where cb_vendor_number =".$_POST["vendornumber"]; 

db_query($q_update) or die("error in $query_upload == ----> ".mysql_error());
*/


if(   isset($_POST["uploadedimage"]) && $_POST["uploadedimage"] != null   )
{
$q_update="UPDATE cb_vendors set cb_image = '".$_POST["uploadedimage"] ."'  where cb_vendor_number =".$_POST["vendornumber"]; 

db_query($q_update);
}


if(   isset($_POST["entercbvendorname"]) && $_POST["entercbvendorname"] != null   )
{
$q_update="UPDATE cb_vendors set cb_vendor_name = '".$_POST["entercbvendorname"] ."'  where cb_vendor_number =".$_POST["vendornumber"]; 

db_query($q_update);
}

if(   isset($_POST["entercbtitle"]) && $_POST["entercbtitle"] != null   )
{
$q_update="UPDATE cb_vendors set cb_title = '".$_POST["entercbtitle"] ."'  where cb_vendor_number =".$_POST["vendornumber"]; 

db_query($q_update);
}


if(   isset($_POST["entercbdescription"]) && $_POST["entercbdescription"] != null   )
{
$q_update="UPDATE cb_vendors set cb_description = '".$_POST["entercbdescription"] ."'  where cb_vendor_number =".$_POST["vendornumber"]; 

db_query($q_update);
}








               } 
	                     }
                                        

                                          }



$page_content=read_template("$CONFIG->templatedir/admin.cb_vendors_list.php");


include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>