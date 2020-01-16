<?php
 class DBLink {
  private $link;
  public function __construct ($database_name) {
$lines = file('/home/int322_161c35/int322/secret/topsecret');
                $dbserver = trim($lines[0]);
                $uid = trim($lines[1]);
                $pw = trim($lines[2]);
		

   $link = mysqli_connect($dbserver, $uid, $pw) or die('Could not connect: ' . mysqli_error($link));

   
  mysqli_select_db($link, $database_name);
   $this -> link = $link;
   }
  function query ($sql_query) {
  $result = mysqli_query($this -> link, $sql_query) or die('query failed'. mysqli_error($link));
	return $result;
   }
  function __destruct() {
   mysqli_close ($this -> link);
   }
  }
 $db = new DBLink("int322_161c35");
$username = "james@server.com";
$password = crypt("secret", "salt");
$passwordHint = "shh, don't tell anyone";
$role = admin;

 $result = $db->query ('insert into users (username, password, role, passwordHint) values(' . $username . ', ' . $password . ', ' . 
$role . ', ' . $passwordHint . ')');

?>

