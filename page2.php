<?php
session_start();

ob_start();
if(!$_SESSION['username']){
header("Location:http://zenit.senecac.on.ca:18368/cgi-bin/login.php");}
else{
?>
<html>
<body>
You Are Currently Logged in
</body>
<?php
}
?>
</html>


