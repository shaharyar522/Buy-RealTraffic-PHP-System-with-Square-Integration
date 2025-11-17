<?php

    ob_start();

    

    #global $_POST, $_GET,$_SESSION;

    global $_SESSION;

    if($_GET !="")

    extract($_GET,EXTR_OVERWRITE);

    if($_POST!="")

    extract($_POST,EXTR_OVERWRITE);

    if($_SESSION!="")

    extract($_SESSION,EXTR_SKIP);

    if($_COOKIE!="")

    extract($_COOKIE,EXTR_SKIP);



    extract($_SERVER,EXTR_SKIP);

    extract($_ENV,EXTR_SKIP);

    //extract($_POST,EXTR_SKIP);

    //extract($_GET,EXTR_SKIP);



///included inc files

    include("user_function_inc.php");

    include("tabfunctions_inc.php");





/**  function make_pagenumber($total_results, $print_query, $page_name, $results_per_page, $page, $max_pages_to_show,$font_color,$styleclass)

 *    ----------------------------------------------------------------

 *    Purpose:             page navigation

 *    Arguments/Parameters:$total_results     -

 *                         $print_query       -

 *                         $page_name         -

 *                         $results_per_page  -

 *                         $page              -

 *                         $max_pages_to_show -

 *                         $font_color        -

 *                         $styleclass        -

 *    Returns/Assigns:   pagetext

 *    (Description)      call succeeds and 0 if otherwise.

 */

function make_pagenumber($total_results, $print_query, $page_name, $results_per_page, $page, $max_pages_to_show,$font_color,$styleclass) {

   global $global_url_status;



     $global_url_status = 'close';



    $pagetext="<font color=$font_color><b></b></font>&nbsp;&nbsp;";

    if($page!=1)



       if($global_url_status == 'open'){

          $pagetext.="<a href=\"".$page_name.$print_query."-1page\" class=$styleclass> First </a>&nbsp;&nbsp; ";

       }

       if($global_url_status == 'close'){

          $pagetext.="<a href=\"".$page_name.$print_query."page=1 \" class=$styleclass> First </a>&nbsp;&nbsp; ";



       }



    if($page != 1) {

       $pageprev = $page - 1;



       if($global_url_status == 'open'){

          $pagetext.="<a href=\"".$page_name.$print_query."-page".$pageprev."\" class=$styleclass>&lt;&lt;Prev</a>&nbsp;&nbsp;";

       }

       if($global_url_status == 'close'){

          $pagetext.="<a href=\"".$page_name.$print_query."page=".$pageprev."\" class=$styleclass>&lt;&lt;Prev</a>&nbsp;&nbsp;";



       }



    }

    $showpages  = round($max_pages_to_show/2);

    $showpages  = $max_pages_to_show;

    $numofpages = $total_results/$results_per_page;



    if ($numofpages > $showpages ) {

        $startpage = $page - $showpages ;

    }

    else {

      $startpage = 0;

    }

    if ($startpage < 0){

        $startpage = 0;

    }



    if ($numofpages > $showpages ) {

        $endpage = $page + $showpages;

    } else {

       $endpage = $showpages;

    }



    if ($endpage > $numofpages){

        $endpage = $numofpages;

    }



    for($i = $startpage; $i < $endpage; $i++) {

       $real_page = $i + 1;

       if ($real_page!=$page){



           if($global_url_status == 'open'){

              $pagetext.=" <a href=\"".$page_name.$print_query."-".$real_page."page"."\" class=$styleclass>[".$real_page."]</a>&nbsp; ";

            }

            if($global_url_status == 'close'){

              $pagetext.=" <a href=\"".$page_name.$print_query."page=".$real_page."\" class=$styleclass>[".$real_page."]</a>&nbsp; ";

            }





       } else {

         $pagetext.="[<b>".$real_page."</b>]&nbsp;";

       }

    }



    if(($total_results-($results_per_page*$page)) > 0){

        $pagenext = $page + 1;



        if($global_url_status == 'open'){

           $pagetext.="&nbsp;&nbsp;<a href=\"".$page_name.$print_query."-".$pagenext."page"."\" class=$styleclass>Next &gt;&gt</a> ";

        }

        if($global_url_status == 'close'){

           $pagetext.="&nbsp;&nbsp;<a href=\"".$page_name.$print_query."page=".$pagenext."\" class=$styleclass>Next &gt;&gt</a> ";

        }



     }



     if($page!=ceil($numofpages))



        if($global_url_status == 'open'){

           $pagetext.="&nbsp;<a href=\"".$page_name.$print_query."-".ceil($numofpages)."page"." \" class=$styleclass> Last </a>";

        }

        if($global_url_status == 'close'){

           $pagetext.="&nbsp;<a href=\"".$page_name.$print_query."page=".ceil($numofpages)." \" class=$styleclass> Last </a>";

        }





     return $pagetext;

}





/**  function writefile($filna,$content)

 *    ----------------------------------------------------------------

 *    Purpose:             write a file

 *    Arguments/Parameters:$filna     -

 *                         $content   -

 *    Returns/Assigns:     $wrfil     -

 *    (Description)      used to write a content from a file

 */

function writefile($filna,$content) {

    $wrfil = fopen($filna, 'w');

    fwrite($wrfil,$content);

    fclose($wrfil);

}





/**  function readfilecontent($file)

 *    ----------------------------------------------------------------

 *    Purpose:             Read a file

 *    Arguments/Parameters:$file     -

 *    Returns/Assigns:     $filecontent     -

 *    (Description)      used to read a content from a file

 */

    function readfilecontent($file)    {

       $fp=fopen("$file","r") or die("Could not open the file $file");

       $filesize=filesize($file);

       $filecontent=fread($fp,$filesize);

       fclose($fp);

       return $filecontent;

    }





/**  function get_country_options_list($sel_id=207)

 *    ----------------------------------------------------------------

 *    Purpose:             return all country options fro select list

 *    Arguments/Parameters:$tb_country

 *    Returns/Assigns:     $category_id                -

 *    (Description)        return all country options fro select list

 */



function get_country_options_list($sel_id){

    global $tb_country;

    if (!$sel_id) {

	$sel_id = 224;

    }

    $sql = "SELECT * FROM $tb_country  ORDER BY country_name";

    //echo "kkk=>$sql";

    

    $query = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die(mysqli_error($sel));

	while($row    = mysqli_fetch_array($query)) {

		if($sel_id == $row['id_country']) {

			$content .= "<option value=\"{$row['id_country']}\" selected>{$row['country_name']}</option>";

		}

		else {

			$content .= "<option value=\"{$row['id_country']}\">{$row['country_name']}</option>";

		}

	}

    return ($content);

}





/**  function get_language_options_list($sel_id=207)

 *    ----------------------------------------------------------------

 *    Purpose:             return all language options fro select list

 *    Arguments/Parameters:$tb_language

 *    Returns/Assigns:     $category_id                -

 *    (Description)        return all language options fro select list

 */



function get_language_options_list($sel_id){

    global $tb_language;

    if (!$sel_id) {

	$sel_id = 13;

    }

    $sql = "SELECT * FROM $tb_language  ORDER BY name";

    //echo "kkk=>$sql";



    $query = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die(mysqli_error($sql));

	while($row    = mysqli_fetch_array($query)) {

		if($sel_id == $row['id']) {

			$content .= "<option value=\"{$row['id']}\" selected>{$row['name']}</option>";

		}

		else {

			$content .= "<option value=\"{$row['id']}\">{$row['name']}</option>";

		}

	}

    return ($content);

}





 /**  date_table_display($date)

 *    ----------------------------------------------------------------

 *    Purpose:             return date--month--year from database

 *    Arguments/Parameters:date,month,year

 *    Returns/Assigns:     date,month,year

 *    (Description)        return date--month--year

 */



function date_table_display($date){



   list($year, $month, $date) = explode("-",$date);

       $dis_date =  date("M-d-Y ", mktime(0, 0, 0, $month, $date, $year));

       return $dis_date;

}



/**  get_metacontent($fname)

 *    ----------------------------------------------------------------

 *    Purpose:             return page title,keywords,description from  metatag database

 *    Arguments/Parameters:$data_tag

 *    Returns/Assigns:     page_title,description,keywords

 *    (Description)        return page_title,description,keywords

 */

function get_metacontent($fname){

global $tb_metatags,$g_user_friendly_url;



    $select_tag = "Select * from $tb_metatags WHERE status = 'L'";

    $result_tag = mysqli_query($GLOBALS["___mysqli_ston"], $select_tag) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$select_tag);

    $num_rows   = mysqli_num_rows($result_tag);

    while($data = mysqli_fetch_array($result_tag)){

     /* //Using for user friendly urls here

      if($g_user_friendly_url=='1'){



        $mystring=$fname;

        list($f1, $ext1) = split('['.']', $mystring);

        list($f2, $ext2)=split('['.']', $data['html_file']);

        $pos = strpos($f1, $f2);

                if ($pos === false) {

                }

                else {

                   $select_tag="Select page_title,keywords,description from $tb_metatags where html_file like '%$f1%'";

                    //echo $select_tag;

                   $result_tag=mysql_query($select_tag) or die(mysql_error());

                   $data_tag=mysql_fetch_array($result_tag);

                   return $data_tag;

                }

      }

      //ends here

      else{*/

/*

            $mystring = $fname;

            list($f1, $ext1) = split('['?']', $mystring);

            list($f2, $ext2) = split('['?']', $data['file_name']);

            $pos = strpos($ext1, $ext2);

                if ($pos === false) {

                }

                else{

*/

//                      $select_tag = "select page_title,keywords,description from $tb_metatags where file_name like '%$ext2%'";

                      $select_tag = "select page_title,keywords,description from $tb_metatags where file_name like '%$fname%'";

                      $result_tag = mysqli_query($GLOBALS["___mysqli_ston"], $select_tag) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

                      $data_tag   = mysqli_fetch_array($result_tag);

                    return $data_tag;

//               }

         /// }

   }//while ends here

 }



/**  get_def_meta()

 *    ----------------------------------------------------------------

 *    Purpose:             return page title,keywords,description from  metatag database

 *    Arguments/Parameters:$data

 *    Returns/Assigns:     page_title,description,keywords

 *    (Description)        return page_title,description,keywords

 */

function get_def_meta(){

global $tb_metatags;

       $select_tag = "Select page_title,keywords,description from $tb_metatags where file_name = 'default'";

       $result_tag = mysqli_query($GLOBALS["___mysqli_ston"], $select_tag) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

       $data       = mysqli_fetch_array($result_tag);

    return $data;

}





/**  function get_countryname($country_id)

 *    ----------------------------------------------------------------

 *    Purpose:             return all country options fro select list

 *    Arguments/Parameters:$tb_country  -

 *    Returns/Assigns:     $category_name               -

 *    (Description)        return all country options fro select list

 */

    function get_countryname($country_id){

        global $tb_country;

        $sql  = "select country_name from $tb_country where id_country = '$country_id'";

        $res  = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($sql));

        $data = mysqli_fetch_array($res);

        return $data['country_name'];

    }



/**  function get_languagename($language_id)

 *    ----------------------------------------------------------------

 *    Purpose:             return all language options fro select list

 *    Arguments/Parameters:$tb_language  -

 *    Returns/Assigns:     $category_name               -

 *    (Description)        return all language options fro select list

 */

    function get_languagename($language_id){

        global $tb_language;

        $sql  = "select name from $tb_language where id = '$language_id'";

        $res  = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($sql));

        $data = mysqli_fetch_array($res);

        return $data['name'];

    }





 /**  faqtype_listo($selected='')

 *    ----------------------------------------------------------------

 *    Purpose:             return date--month--year from database

 *    Arguments/Parameters:date,month,year

 *    Returns/Assigns:     date,month,year

 *    (Description)        return date--month--year

 */



 function faqtype_listo($selected=''){

        global $tb_faqtype;

        $sql = "select faqtype,id from $tb_faqtype order by faqtype asc";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($GLOBALS["___mysqli_ston"]));

        while($data = mysqli_fetch_row($res)){

            if ($selected=="$data[1]")

                $faqtype_list.="<option value=\"$data[1]\" selected>$data[0]</option>\n";

            else

                $faqtype_list.="<option value=\"$data[1]\">$data[0]</option>\n";

        }

        return $faqtype_list;

    }





function get_faqtype($id){

       global $tb_faqtype;

        $sql = "select faqtype from $tb_faqtype where id = '$id'";

      //  echo " uu".$sql;

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($GLOBALS["___mysqli_ston"]).$sql);

        $row = mysqli_fetch_array($res);

        $faqtype = $row['faqtype'];

        return $faqtype;

    }





//Function to calculate the statistcs in the main page

function get_count($tbname,$arg){

	global $tb_users,$tb_transactions;





	if($arg=='a'){

   	   $where="where 1";

	}



	if($arg=='b'){

	   $where="where status='L'";

	}



	if($arg=='c'){

	   $where="where status='W'";

	}



	if($arg=='d'){

   	   $today = date("Y-m-d");

	   $where = "where signup_time = '$today' and  status='L'";

	}



	if($arg=='e'){

	   $todaym = date("Ym");

	   $where="WHERE EXTRACT(YEAR_MONTH FROM signup_time) = '$todaym'";

	}



	if($arg=='f'){

	   $todaym = date("Y");

	   $where="WHERE EXTRACT(YEAR FROM signup_time) = '$todaym'";

	}



	if($arg=='w'){

	   $where="WHERE status = 'W'";

	}





	//Total number of users

        $select_qry="SELECT count(*) as cnt from $tbname $where";

	//echo "<br>$select_qry";

        $result=mysqli_query($GLOBALS["___mysqli_ston"], $select_qry) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$select_qry);

        $data=mysqli_fetch_array($result);

        $total_cnt=$data['cnt'];

	return $total_cnt;

	}

    

    

function get_merchant_options_list($sel_id){

    global $tb_merchants;



    $sql = "SELECT * FROM $tb_merchants  ORDER BY merchant_name";

    $query = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die(mysqli_error($sel));

	while($row    = mysqli_fetch_array($query)) {

	   

          $internal_val = strtolower($row['merchant_name']); 

          $external_val = ucfirst($row['merchant_name']);

       

		if($sel_id == $internal_val) {

			$content .= "<option value=\"{$internal_val}\" selected>{$external_val}</option>";

		}

		else {

			$content .= "<option value=\"{$internal_val}\">{$external_val}</option>";

		}

	}

    

    return ($content);

}

   
function update_banner_status($user_id = null){

  if ($user_id == null) {
    
    $user_id = $_SESSION['user_id'];
  }

  //  CHECK USER HAVE AT LEAST ONE ACTIVE LOGIN SITE AND VISITOR CREDITS ASSIGNED TO IT
    $sql_login = "SELECT * FROM url_login_sites 
            INNER JOIN url_login_clicks
            ON url_login_clicks.site_id = url_login_sites.sid AND url_login_clicks.points > 0 AND url_login_sites.status = 'L' AND  
            url_login_sites.user_id = '$user_id' AND url_login_clicks.user_id = '$user_id'";

    $results_login = mysqli_query($GLOBALS["___mysqli_ston"], $sql_login);
    //print_r($num_login_sites);
    //echo $sql_login."<br>";
    $num_login_sites = mysqli_num_rows($results_login);
    //echo $num_login_sites ."<br>";

    //  CHECK USER HAVE AT LEAST ONE ACTIVE SITE AND VISITOR CREDITS ASSIGNED TO IT
    $sql_sites = "SELECT * FROM url_site
                    INNER JOIN url_points
                    ON url_points.site_id = url_site.sid AND url_points.points > 0 AND url_site.status = 'L'
                    AND url_points.user_id = '$user_id' AND url_site.user_id = '$user_id'";
    $results_sites = mysqli_query($GLOBALS["___mysqli_ston"], $sql_sites);
    $num_sites = mysqli_num_rows($results_sites);
    //print_r($num_sites);
    //echo $sql_sites;
    //die();

  if ($num_sites == 0 && $num_login_sites == 0) {

    $ref_sql_up = "SELECT * FROM url_free_banners WHERE user_id ='$user_id'";          
      $ref_res_up      = mysqli_query($GLOBALS["___mysqli_ston"], $ref_sql_up) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ref_sql_up);
      
      while ($row_up = mysqli_fetch_object($ref_res_up)) {

        $sql_bn_up = "UPDATE  url_free_banners SET  status =  'disabled' WHERE  banner_id='$row_up->banner_id'";
      mysqli_query($GLOBALS["___mysqli_ston"], $sql_bn_up);

        
      }

  }elseif ($num_sites > 0 || $num_login_sites > 0) {

    //echo"<script language='javascript'> alert('hello world'); </script>";

    $ref_sql_up = "SELECT * FROM url_free_banners WHERE user_id ='$user_id'";          
      $ref_res_up      = mysqli_query($GLOBALS["___mysqli_ston"], $ref_sql_up) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ref_sql_up);
      
      while ($row_up = mysqli_fetch_object($ref_res_up)) {

        if ($row_up->status == 'disabled') {
    
          $sql_bn_up = "UPDATE url_free_banners SET  status = 'active' WHERE  banner_id='$row_up->banner_id'";
        mysqli_query($GLOBALS["___mysqli_ston"], $sql_bn_up);
        }


    }
  }
  //echo "string";
}


function update_textAdds_status($user_id = null){

  if ($user_id == null) {
    
    $user_id = $_SESSION['user_id'];
  }

  //  CHECK USER HAVE AT LEAST ONE ACTIVE LOGIN SITE AND VISITOR CREDITS ASSIGNED TO IT
    $sql_login = "SELECT * FROM url_login_sites 
            INNER JOIN url_login_clicks
            ON url_login_clicks.site_id = url_login_sites.sid AND url_login_clicks.points > 0 AND url_login_sites.status = 'L' AND  
            url_login_sites.user_id = '$user_id' AND url_login_clicks.user_id = '$user_id'";

    $results_login = mysqli_query($GLOBALS["___mysqli_ston"], $sql_login);
    //print_r($num_login_sites);
    //echo $sql_login;
    $num_login_sites = mysqli_num_rows($results_login);
    //echo $num_login_sites ."<br>";

    //  CHECK USER HAVE AT LEAST ONE ACTIVE SITE AND VISITOR CREDITS ASSIGNED TO IT
    $sql_sites = "SELECT * FROM url_site
                    INNER JOIN url_points
                    ON url_points.site_id = url_site.sid AND url_points.points > 0 AND url_site.status = 'L'
                    AND url_points.user_id = '$user_id' AND url_site.user_id = '$user_id'";
    $results_sites = mysqli_query($GLOBALS["___mysqli_ston"], $sql_sites);
    $num_sites = mysqli_num_rows($results_sites);
    //print_r($num_sites);
    //echo $sql_sites;

  if ($num_sites == 0 && $num_login_sites == 0) {

    $ref_sql_up = "SELECT * FROM url_user_text_ads WHERE userid ='$user_id'";          
      $ref_res_up      = mysqli_query($GLOBALS["___mysqli_ston"], $ref_sql_up) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ref_sql_up);
      
      while ($row_up = mysqli_fetch_object($ref_res_up)) {

        $sql_bn_up = "UPDATE  url_user_text_ads SET  ad_status = '0' WHERE id='$row_up->id'";
        mysqli_query($GLOBALS["___mysqli_ston"], $sql_bn_up);

        //echo "<br>".$sql_bn_up."<br>";        
      }


  }elseif ($num_sites > 0 || $num_login_sites > 0) {

    $ref_sql_up = "SELECT * FROM url_user_text_ads WHERE userid ='$user_id'";          
      $ref_res_up      = mysqli_query($GLOBALS["___mysqli_ston"], $ref_sql_up) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$ref_sql_up);
      
      while ($row_up = mysqli_fetch_object($ref_res_up)) {

          $sql_bn_up = "UPDATE url_user_text_ads SET ad_status = '1' WHERE id='$row_up->id'";
          mysqli_query($GLOBALS["___mysqli_ston"], $sql_bn_up);

          //echo "<br>".$sql_bn_up."<br>";
    }

  }
}


 ?>

