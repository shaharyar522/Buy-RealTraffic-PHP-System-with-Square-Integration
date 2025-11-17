<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename Edit Users";
?>



  	

<?
include("$CONFIG->templatedir/header.php");
if(!isset($term)){



$page_content="<fieldset class=text>
<legend>Please enter the username here</legend>
<br><div align=center class=text>
<form action=\"".my_name()."?action=pro\" method=post class=text>
<input type=text name=term class=input placeholder='Enter Member\"s Username'>
<input type=submit value='Set Member To Pro' class=button>
<br><br><br>
</form>
</div>



<div align=center class=text>
<form action=\"".my_name()."?action=free\" method=post class=text>
<input type=text name=term class=input placeholder='Enter Member\"s Username'>
<input type=submit value='Set Member To Free' class=button >
<br><br><br>
</form>
</div>




</fieldset>";}
else{

//echo "<pre>";  print_r($_POST);


$frm=$_POST;   
if($action=='pro'){
$l=db_num_rows(db_query("select * from users where username='$term'")); 
if($l<1){$page_content="<div align=center class=text><br>Username not found!!!<br><br></div>";

         $page_content .="<br><p class=text align=center>
         Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";

        }
else{
		        $err=0;
			$msg = "<p class=text align=center>The following error(s) occured:<br><ul class=text>";
		
			 if (empty($frm["term"])) {
				$err=1;
				$msg .= "<li>You did not specify a UserName</li>";
		
			}
			
                if($err==0){
                     $query = db_query("update users set membership_status='Pro Member' where  username='{$frm['term']}'");
                           $page_content="<br><p class=text align=center> user : {$frm['term']} is updated As Pro Member.<br>
			<br><br><br><br><br>";
			}
			else{$page_content=$msg."<br><p class=text align=center>
			Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";
			}                    
                           
                           
    }
}


if($action=='free'){
$l=db_num_rows(db_query("select * from users where username='$term'")); 
if($l<1){$page_content="<div align=center class=text><br>Username not found!!!<br><br></div>";

         $page_content .="<br><p class=text align=center>
         Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";

        }
else{
		        $err=0;
			$msg = "<p class=text align=center>The following error(s) occured:<br><ul class=text>";
		
			 if (empty($frm["term"])) {
				$err=1;
				$msg .= "<li>You did not specify a UserName</li>";
		
			}
			
                if($err==0){
                     $query = db_query("update users set membership_status='Free Member' where  username='{$frm['term']}'");
                           $page_content="<br><p class=text align=center> user : {$frm['term']} is updated As Free Member.<br>
			<br><br><br><br><br>";
			}
			else{$page_content=$msg."<br><p class=text align=center>
			Please go <a href=\"javascript:history.back();\" class=link1>Back </a> and correct this.</p>";
			}                    
                           
                           
    }
}
}
include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");
?>



