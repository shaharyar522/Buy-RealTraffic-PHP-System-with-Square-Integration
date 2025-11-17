<?
include'../config.php';
require_login_admin();
$title="$CONFIG->sitename login_site list_all Info";
include("$CONFIG->templatedir/header.php");



   if(isset($_REQUEST['status'])){
         $status = $_REQUEST['status'];
     }else{
         $status ='N';
     }


 $orderbytext = " ORDER BY  new_time  DESC";
   if($_REQUEST['status'] == 'W') { $statsql = "AND status = 'W'";  }
   if($_REQUEST['status'] == 'L') { $statsql = "AND status = 'L'";  }
   if($_REQUEST['status'] == 'H') { $statsql = "AND status = 'H'";  }
   if($_REQUEST['status'] == '1') { $statsql = "AND status = 'A'";  }
 $sql_list = "select * from url_login_sites where 1   $statsql  $orderbytext  ";

if($status =='N'){
 $sql_list = "select * from url_login_sites where 1  and status = 'N'";
    }

  $res_list = mysqli_query($GLOBALS["___mysqli_ston"], $sql_list) or die(mysqli_error($GLOBALS["___mysqli_ston"]).$sql_list);




$page_content = "<div class=text id=heading  align=center><h3> Login Site List All Info </h3></div>";


$page_content .= "<form name=form1 method=post action=login_sitelist_all.php?act=search>

 <input type=hidden name=page  value=>

<table width=100% border=0 cellspacing=0 cellpadding=5 align=center>

  <tr><td >Site List</td></tr>

</table>

<br>

<table border=0  cellpadding=0 cellspacing=0 width=80% align=center>";


if ($status == 'N'){

 $page_content .= "<tr class=tblheader>
    <td align=center colspan=2 >
       <span class=text><a href='login_sitelist_all.php?act=search&status=A'>ALL </a></span>|
       <span class=text><a href='login_sitelist_all.php?act=search&status=L'>ACTIVE</a></span>&nbsp;|&nbsp;
       <span class=text><a href='login_sitelist_all.php?act=search&status=H'>PAUSE</a></span>&nbsp;|&nbsp;
       <span class=text><a href='login_sitelist_all.php?act=search&status=1'>SUSPEND</a></span>&nbsp;|&nbsp;
       <span class=text><a href='login_sitelist_all.php?act=search&status=W'>WAITING</a></span>
    </td>
  </tr>";

}




if ($status == 'A'){

 $page_content .= "<tr class=tblheader>

    <td align=center colspan=2 >

       <span class=textbld>ALL </span>|

       <span class=text><a href='login_sitelist_all.php?act=search&status=L'>ACTIVE</a></span>&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=H'>PAUSE</a></span>&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=1'>SUSPEND</a></span>&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=W'>WAITING</a></span>

    </td>

  </tr>";

}

if ($status == 'L'){

  $page_content .= " <tr class=tblheader>

    <td align=center colspan=2 class=text>

       <span class=text><a href='login_sitelist_all.php?act=search&status=A'>ALL </a></span>&nbsp;|&nbsp;

       <span class=textbld>ACTIVE&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=H'>PAUSE</a></span>&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=1'>SUSPEND</a></span>&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=W'>WAITING</a></span>

    </td>

  </tr>";

}

if ($status == 'H'){

 $page_content .= "  <tr class=tblheader>

    <td align=center colspan=2 class=text>

       <span class=text><a href='login_sitelist_all.php?act=search&status=A'>ALL </a></span>&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=L'>ACTIVE</a></span>&nbsp;|&nbsp;

       <span class=textbld>PAUSE&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=1'>SUSPEND</a></span>&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=W'>WAITING</a></span>

    </td>

  </tr>";

}

if ($status == '1'){

 $page_content .= "  <tr class=tblheader>

    <td align=center colspan=2 class=text>

       <span class=text><a href='login_sitelist_all.php?act=search&status=A'>ALL </a></span>&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=L'>ACTIVE</a></span>&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=H'>PAUSE</a></span>&nbsp;|&nbsp;

       <span class=textbld>SUSPEND</span>&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=W'>WAITING</a></span>

    </td>

  </tr>";

}

if ($status == 'W'){

  $page_content .= " <tr class=tblheader>

    <td align=center colspan=2 class=text>

       <span class=text><a href='login_sitelist_all.php?act=search&status=A'>ALL </a></span>|

       <span class=text><a href='login_sitelist_all.php?act=search&status=L'>ACTIVE</span>&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=H'>PAUSE</a></span>&nbsp;|&nbsp;

       <span class=text><a href='login_sitelist_all.php?act=search&status=1'>SUSPEND</a></span>&nbsp;|&nbsp;

       <span class=textbld>WAITING</a></span>

    </td>

  </tr>";

}

 $page_content .= "</table>

<br>

<table cellpadding=0 cellspacing=0 width=80% align=center>

  <tr class=tblheader>

    <td align=center colspan=2 class=text><span class=text1><b>{$page_navigation}</span></td>

  </tr>

</table>

<br>

<table   cellpadding=0 cellspacing=0 width=65% align=center>";

if ($error){

 $page_content .= "  <tr>

    <td align=center colspan=3 class=err>{$error_temp}</td>

  </tr>";

}

 $page_content .= "</table>

<br>

<table cellpadding=0 cellspacing=0 width=100% height=300 align=center>

  <tr>

    <td width=100% align=center valign=top>

        <table border=1  cellpadding=3 cellspacing=0 width=90% align=center >

         <tr>

          <td align=center   class='textbld' nowrap   width='6%'>S.No</td>

          <td align=center   class='textbld' nowrap   width='35%'>Site Title</td>

  	      <td align=center   class='textbld' nowrap   width='40%'>Site URL </td>

  	      <td align=center   class='textbld' nowrap   width='5%'>Ownerid#</td>

 	      <td align=center   class='textbld' nowrap   width='10%'>Status</td>

         </tr>";

$count=1;
while($row_zz  = mysqli_fetch_array($res_list)){
     
 $page_content .= "<tr>

	       <td align=center width='6%'>";  $page_content .=$count++;
 $page_content .= "</td>

       <td align=left width=30% class=text><a href='login_site_info_approve.php?sd=$row_zz['sid']'>";





 $page_content .= $row_zz['site_name'];
 $page_content .= "</a></td>

           <td align=left width=35% class=text>";
 $page_content .= $row_zz['site_url'] ;
 $page_content .="</td>

           <td align=left width=5% class=text>";

 $page_content .=$row_zz['user_id'];



 $page_content .= "</td>
           <td align=left width=10% class=text>";


if( $row_zz['status'] == 'L'  )
 $page_content .= 'ACTIVE' ;

if( $row_zz['status'] == 'W'  )
 $page_content .= 'WAITING' ;

if( $row_zz['status'] == 'H'  )
 $page_content .= 'PAUSED' ;

if( $row_zz['status'] == 'A'  )
 $page_content .= 'SUSPEND' ;


 $page_content .= "</td>
        </tr>";
}

 $page_content .= "</table>

</td></tr>

</form>

</table>";


if($status =='N'){
    $sql = "SELECT COUNT(sid) as login_sites FROM url_login_sites WHERE status='W'";
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $row = mysqli_fetch_array($res);
    $login_sites = $row['login_sites'];


 $page_content .="
<table width=80% height=10 cellspacing=0 cellpadding=0 align=center>
     <tr>
            <td>";
if($login_sites == 0){
  $page_content .="<span style=font-size:18px;>There are No Login sites waiting for approval</span>";
                     }
else{
      $page_content .="<span style=font-size:18px;>There are ";  
      $page_content .= $login_sites;
      $page_content .=" Login sites waiting for approval</span>";
}
  $page_content .="</td>
     </tr>
</table>
";
}










include("$CONFIG->templatedir/admin.content.php");
include("$CONFIG->templatedir/footer.php");

