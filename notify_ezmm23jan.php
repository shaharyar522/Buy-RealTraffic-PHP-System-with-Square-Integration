<?

foreach($_POST as $k=>$v) 
{
echo $k;
echo urldecode($v); 
}


echo $_POST['user1'];
echo "sssss<pre>";

print_r($_POST);
print_r( count($_POST) );
print_r( $_POST['tr_id']  );echo "<br>";
print_r($_POST['hash']);
echo "sssss"; exit;

?>