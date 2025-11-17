<?
global $CONFIG,$_SESSION,$REMOTE_ADDR;
$ref=$_SERVER['HTTP_REFERER'];
// Random user generate 
function generate_random(){
global $CONFIG,$_SESSION,$REMOTE_ADDR;
$nx=db_fetch_array(db_query("select max(finish) from chances "));
$nrmax=$nx[0];

//satyajeet

//$rand=rand(2,$nrmax);
              $rand=rand(0,$nrmax);
//$rand=rand(0,-$nrmax);



//satyajeet
                    
          
$query=db_query("select username from chances where '$rand'>= start and '$rand'<=finish");
//          $query=db_query("select username from chances where finish=".$rand);



$xxx=db_num_rows($query);
if($xxx>=1){
$a1=db_fetch_array($query);      
$q1=db_fetch_array(db_query("select * from users where username='".$a1["username"]."'"));
}
elseif($xxx<1)
{$q1=db_fetch_array(db_query("select * from users where id='1'"));
}
return $q1;
}
//
$prajitura=$_COOKIE["sponsor_is"];
if(!isset($_SESSION["sponsor"]["firstname"]))
{
if($prajitura)
{
$q1=db_fetch_array(db_query("select * from users where username='".strtolower($prajitura)."'"));
$_SESSION["sponsor"]=array();
$_SESSION["sponsor"]=$q1;
}
else{
if($CONFIG->payrandom){
$_SESSION["sponsor"]=array();
$_SESSION["sponsor"]=generate_random();}
else{
$q1=db_fetch_array(db_query("select * from users where id='1'"));
$_SESSION["sponsor"]=array();
$_SESSION["sponsor"]=$q1;}
}
$who=$_SESSION["sponsor"]["username"];
$r=db_query("INSERT INTO `hits` (`username` , `refer` , `ip` , `date` ) 
VALUES ( '".$who."', '$ref', '$REMOTE_ADDR',now())");

}
else{}
if(!$_SESSION["random"]["firstname"])
{session_register("random");
$_SESSION["random"]=array();
$_SESSION["random"]=generate_random();
}

?>