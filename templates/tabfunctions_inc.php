<?

/**  function   industry_list($selectedlist='')
 *    ----------------------------------------------------------------
 *    Purpose:             total category list in a category
 *    Arguments/Parameters:$tb_category
 *    Returns/Assigns:     $cat_list
 *    (Description)        Returns a list of category in a category list
 */

 function industry_list($selectedlist=''){
        global $tb_category;

        $a_selectedlist = split(",",$selectedlist);
        $sql = "select cat_name,cat_id from $tb_category ORDER BY cat_name ASC";
        $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($sql));

        $cat_list.="<table width=350><tr width=350>";
        while ($data=mysqli_fetch_row($res))        {
               $chkvalue="";
               if ($a_selectedlist){
                   if (in_Array($data[1],$a_selectedlist)) $chkvalue="checked";
               }
            $cat_list.="<td width=13% class=text_small><input type=checkbox name=category_list[] value=$data[1] id=category_list$data[1] $chkvalue class=outer>&nbsp;&nbsp;<label for=category_list$data[1]>". ucwords(strtolower($data[0])) . "</label>&nbsp;</td>";
            $i++;
            if ($i%2==0) $cat_list .="</tr><tr>";
        }
        $cat_list .="</tr></table>";

        return $cat_list;
   }

/**  function   jobtypelisto($selected='')
 *    ----------------------------------------------------------------
 *    Purpose:              List of jobs in a job type list
 *    Arguments/Parameters: $tb_jobtype
 *    Returns/Assigns:      $jobtype_listo
 *    (Description)         Return total job types in a job type list
 */


function jobtypelist($selected=''){
   global $tb_jobtype;
    $sql = "select name,id from $tb_jobtype order by name asc";
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
    while($data = mysqli_fetch_row($res)){
       if ($selected == "$data[0]")
           $jobtype_listo.="<option value=\"$data[0]\" selected>$data[0]</option>\n";
       else
           $jobtype_listo.="<option value=\"$data[0]\">$data[0]</option>\n";
       }

        return $jobtype_listo;
  }


/**  function   days_list($days)
 *    ----------------------------------------------------------------
 *    Purpose:              List of days in a days list
 *    Arguments/Parameters: $days
 *    Returns/Assigns:      $print
 *    (Description)         Return total no of days
 */



  function days_list($days) {
        $print = "";
    	for($i=7 ; $i>0 ; $i--) {
	       if($i == $days) {
	      	  $print.= "<option value=\"$i\" selected>$i</option>";
	       }
	       else {
		      $print.= "<option value=\"$i\">$i</option>";
	       }
	   }
   	   return $print;
    }
    
 /**  function   read_the_file($fname)
 *    ----------------------------------------------------------------
 *    Purpose:              return the contents of the file
 *    Arguments/Parameters: $fname
 *    Returns/Assigns:      $contents
 *    (Description)         Returns the content of the file
 */


     function read_the_file($fname)
 {
    $filename = "$fname";
    $fd = fopen ($filename, "r");
    $file_size=filesize($filename);
    $contents = fread ($fd,$file_size);
    fclose ($fd);
    return $contents;
 }

    ?>
