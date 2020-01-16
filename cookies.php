<?php
if(!isset($_COOKIE['count'])){
$cookie = 1;
setcookie("count", $cookie);}else{
$cookie = ++$_COOKIE['count'];
setcookie("count", $cookie);}
if($_POST){
setcookie($_POST['cookieName'],$_POST['cookieValue']);
}
?>




<html>
<body>
<h3>Cookies</h3>
<form method="post" action="">
<input type="text" name="cookieName">
<input type="test" name="cookieValue">
<input type="submit" name="submit">
</form>
<?php
print_r($_COOKIE);
echo "<br>";
echo "<br>";
echo "You have visited this website " . $_COOKIE['count'] . " Times";
?> 

</body>
</html>
