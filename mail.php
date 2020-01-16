<?php
if ($_POST)  {
  $email = $_POST['email'];
$lines = file('/home/int322_161c35/int322/secret/topsecret');
                $dbserver = trim($lines[0]);
                $uid = trim($lines[1]);
                $pw = trim($lines[2]);
                $dbname = trim($lines[3]);

                $link = mysqli_connect($dbserver, $uid, $pw, $dbname)
                                or die('Could not connect: ' .
mysqli_error($link));
$sql_query = 'SELECT * FROM users where username="' . $email . '"';
$result = mysqli_query($link, $sql_query) or die('query failed'.
mysqli_error($link));


$row = mysqli_fetch_assoc($result);
$userName= $row['username'];
$passWord= $row['password'];
$passWordHint = $row['passwordHint'];
if($userName){
  //Email information
  $sender = "abohakobyan@hotmail.com";
  $email = $_POST['email'];
  $subject = "Lost Password";
  $comment = "$passWordHint  $userName";
$headers = "From: $from\r\nReply-to: $email";  
  //send email
 mail($sender, $subject, $comment, $headers);
  //Email response
  echo "Thank you for contacting us We will Email You Your Password";
}else{
header("Location:http://zenit.senecac.on.ca:18368/cgi-bin/login.php");

}  
}




 else  {
?>

 <form method="post">
 Please Enter your  Email: <input name="email" type="text" /><br />
  <input type="submit" value="Submit" />
  </form>
  
<?php
  }
?>
