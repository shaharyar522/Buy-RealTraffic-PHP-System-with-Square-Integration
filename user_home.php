<?php ob_start();

/**
* Short description for file
*       This file is used to display home page
*
* Long description for file (if any)...
*
* PHP versions 4 and 5
*
*
* @category         User Side
* @package          User details
* @owner            Zen e-solutions pvt ltd
* @developed on     09-10-2007
* @author           <asokan@zen-e-solutions.com>
* @copyright
* @license
* @version          CVS: 1:0
* @link             http://www.myguaranteedvisitors.com
* @see
* @since            File available since Release 1.0
* @deprecated       File deprecated in Release 1.0
*
* The updated/modified history manage the following procedure.
*
* @Last Modified on
* @Last Modified by
* @Modified reason
*
* Global variables.
*   $smarty ~ this is a object for Smarty class.
*   $errortemplates ~ this is a path for errortemplate, which is used to displayed the error messages
*
* Main Functions.
*   readfilecontent()  ~ read the file
*   $smarty->assign()  ~ Assign the variables and values
*   $smarty->fetch()   ~ fetch the values from php to tpl
*   $smarty->display() ~ display the fetched tpl thro main.tpl.
*
* Include Files.
*   config.php   ~ global settings, dba settings, session settings , function files included this file only
*/
    include("config.php");


    if(! isset($_SESSION["user"])) { 
       header("Location: index.php");   
       exit();
    }

       header("Location: rusers/memberarea.php");
       die();

   
?>
