<?php
include 'config.php';




$username=$_GET['usr_name'];
 $password=$_GET['passwd'];

 $password = str_replace("9999999","~",$password);
 $password = str_replace("4444444","+",$password);




function verify_login($username, $password) { 
        $q= db_query(" SELECT * FROM users WHERE username = '$username' AND password = '$password' and id>'1' ");
        return db_fetch_array($q);         }

IF( isset($username) && isset($password)   ){ 
$user = verify_login($username, $password);

if(    isset($user) && count($user)>1    ){
    $_SESSION["user"] = $user;
    $_SESSION["ip"] = $REMOTE_ADDR;

    db_query("update users set lastlogin=now(),last_ip='$REMOTE_ADDR' where username='$username'"); 
      echo "success"; 
                                      } else {  echo "Login Credentials are wrong";  }

} 







//echo $_GET['usr_name'];
//echo $_GET['passwd'];

?>
