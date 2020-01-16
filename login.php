<?php
session_start();
ob_start();
function login($userNameCom){
echo "im here";
$_SESSION['username'] = $userNameCom;
header("Location:http://zenit.senecac.on.ca:18368/cgi-bin/protectedstuff.php");
exit();
}?>


<html>
<head>
<?php
$userName = $_POST['userName'];
$passWord = $_POST['passWord'];
$passWord =  crypt($passWord, 'secret');
if($_POST){
 $lines = file('/home/int322_161c35/int322/secret/topsecret');
                $dbserver = trim($lines[0]);
                $uid = trim($lines[1]);
                $pw = trim($lines[2]);
                $dbname = trim($lines[3]);

                $link = mysqli_connect($dbserver, $uid, $pw, $dbname)
                                or die('Could not connect: ' . 
mysqli_error($link));
$sql_query = 'SELECT * FROM users where username="' . $userName . '" 
and password = "' . $passWord . '"';
$result = mysqli_query($link, $sql_query) or die('query failed'. 
mysqli_error($link));
$row = mysqli_fetch_assoc($result);
$userNameCom= $row['username'];
$passWordCom= $row['password'];

if($userNameCom){
login($userNameCom);
}
else{echo "Invalid UserName Or Password";}
}

?>
</head>
<body>
<h3>Log In</h3>
<form method="post" action="">
<input type="text" name="userName">
<input type="password" name="passWord">
<input type="submit" name="submit">
</form>
<a href="http://zenit.senecac.on.ca:18368/cgi-bin/mail.php"> Forgot Password! </a>
</body>
</html>
