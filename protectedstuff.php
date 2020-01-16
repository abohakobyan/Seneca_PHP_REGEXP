<?php
session_start();
ob_start();

if(!$_SESSION['username']){
header("Location:http://zenit.senecac.on.ca:18368/cgi-bin/login.php");}
else{
?>
<html>
<body>
You Are Logged in
<form method="post" action="">
<input type="submit" name="logout">
</body>
<?php 
if($_POST){
$_SESSION['username'] = "";
header("Location:http://zenit.senecac.on.ca:18368/cgi-bin/login.php");
}
}
?>
</html>
