<html>
<head>
<?php
if($_GET){
$id = $_GET['firstName'];
$lines = file('/home/int322/secret/topsecret');
		$dbserver = trim($lines[0]);
		$uid = trim($lines[1]);
		$pw = trim($lines[2]);
		$dbname = trim($lines[3]);

		//Connect to the mysql server and get back our link_identifier
 		$link = mysqli_connect($dbserver, $uid, $pw, $dbname)
         			or die('Could not connect: ' . mysqli_error($link));
 

}
?>
</head>
<body>

</body>
</html>
