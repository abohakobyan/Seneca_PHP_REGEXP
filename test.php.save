<html>
  <head>
    <title>FSOSS Registration</title>
  </head>
  <body>
<?php
$data = "";
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$org = $_POST['organization'];
$email = $_POST['email'];
$phoneNumber = $_POST['phone'];
$title = $_POST['title'];
$validCount= 0;
$day1 = $_POST['monday'];
$day2 = $_POST['tuesday'];
$tshirt = $_POST['t-shirt'];
if($_GET){
 $id = $_GET['id'];
$lines = file('/home/int322_161c35/int322/secret/topsecret');
                $dbserver = trim($lines[0]);
                $uid = trim($lines[1]);
                $pw = trim($lines[2]);
                $dbname = trim($lines[3]);

                $link = mysqli_connect($dbserver, $uid, $pw, $dbname)
                                or die('Could not connect: ' . mysqli_error($link));

                $sql_query = 'UPDATE  registrant SET day1 = "", day2 = "" where id =' . $id . '';
		$result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));

}


if ($_POST) { 

	if($title == ""){
		$titleErr = "Error- you must check at least one title";
		$dataValid = false;
		}else{
		$dataValid= true;
		$validCount++;}
    if ($_POST['firstName'] == "") {
		$firstNameErr = "Error - you must fill in a first name";
		$dataValid = false;
		
	}else{$dataValid = true;
		$validCount++;
	}
	
	 if ($_POST['lastName'] == "") {
		$lastNameErr = "Error - you must fill in a last name";
		$dataValid = false;
				
	}else{$dataValid = true;
		$validCount++;	}
	 if ($_POST['organization'] == "") {
		$orgErr = "Error - you must fill in the organization";
		$dataValid = false;
					
	}else{$dataValid = true;
		$validCount++;	}
	if ($_POST['email'] == "") {
		$emailErr = "Error - you must fill in a email";
		$dataValid = false;
				
	}else{$dataValid = true;
		$validCount++;	}

	if ($_POST['phone'] == "") {
		$phoneErr = "Error - you must fill in a last name";
		$dataValid = false;	
			
	}else{
$phoneNumber= trim($phoneNumber);
$phoneNumber = str_replace(' ', '', $phoneNumber);
	if($phoneNumber == ""){
	$phoneErr = "Error - You must fill in at least 1 char";
}else if(preg_match("/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/", $phoneNumber)){
         $dataValid= true;
	$validCount++;
}else{
	$phoneErr= "Must Enter Valid Format";
	$dataValid= false;	
}	
if($day1 == "" && $day2 == ""){
                $dateErr = "   Error- you must check at least one date";
                $dataValid = false;
                }else{
                $dataValid= true;
                $validCount++;}
 

}if($tshirt == "--Please choose--"){
	$shirtErr= "  Error- You must select a size";
	$dataValid = false;
	}else{
	$dataValid = true;
	$validCount++;
	
}
}
if ($_POST && $dataValid && $validCount == 8) { 
		$lines = file('/home/int322_161c35/int322/secret/topsecret');
		$dbserver = trim($lines[0]);
		$uid = trim($lines[1]);
		$pw = trim($lines[2]);
		$dbname = trim($lines[3]);
		
		$link = mysqli_connect($dbserver, $uid, $pw, $dbname)
         			or die('Could not connect: ' . mysqli_error($link));

      		$sql_query = 'INSERT INTO registrant set title= "' . $title .'",  firstName="' . $firstName . '", lastName="' . 
$lastName . '", org="' . $org . '", email= "' . $email . '", phoneNumber = "' . $phoneNumber . '", day1 = "' . $day1 . '", day2 
= "' . $day2 . '", tshirt= "' . $tshirt . '"';
		$result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));
		$sql_query = "SELECT * from registrant";
		$result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));	
		print "<br>Names in DB: <br>";


?>
<html>
<body>
<a href="http://zenit.senecac.on.ca:18368/cgi-bin/test.php">here</a>
<table border="1">
<tr>
<th>Title </th><th>First Name</th><th>Last Name</th><th>Org</th><th>Email</th>
<th>Phone Number</th><th>Monday</th><th>Tuesday</th><th>T-shirt size</th>

<?php

 		while($row = mysqli_fetch_assoc($result))
 		{
?>
		<tr>
		<td><?php print $row['title']; ?></td>
		<td><?php print $row['firstName']; ?></td>
		<td><?php print $row['lastName']; ?></td>
		<td><?php print $row['org']; ?></td>
		<td><?php print $row['email']; ?></td>
		<td><?php print $row['phoneNumber']; ?></td>
		<td><?php print $row['day1']; ?></td>
		<td><?php print $row['day2']; ?></td>
		<td><?php print $row['tshirt']; ?></td>
		<td><?php echo '<a href="test.php?id=' . $row['id'] . '">Remove</a>'; ?></td>
		
			</tr>
<?php
 		}

?>
</table>
</body>
</html>
<?php
 
		// Free resultset (optional)
		mysqli_free_result($result);
  
		//Close the MySQL Link
 		mysqli_close($link);
		// print "Name entered: " . $_POST['firstName'] . ' ' . $_POST['lastName'];
	}
else {
$validCount = 0;
?>
  <h1>FSOS Registration</h1>
  <form method="post" action="">
	<table>
	<tr>
    	<td valign="top">Title:</td>
	<td>
		<table>
		<tr>
		<td><input type="radio" name="title" value="mr" <?php if ($_POST['title'] == "mr") echo "CHECKED"; ?>>Mr</td>
		</tr>
		<tr>
		<td><input type="radio" name="title" value="mrs" <?php if ($_POST['title'] == "mrs") echo "CHECKED"; ?>>Mrs</td>
		</tr>
		<tr>
		<td><input type="radio" name="title" value="ms" <?php if ($_POST['title'] == "ms") echo "CHECKED"; ?>>Ms</td>
		<?php echo $titleErr;?>
		</tr>
		</table>
	</td>
	</tr>
	<tr>
    	<td>First name:</td>
	<td><input name="firstName" type="text" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>">
	<?php echo $firstNameErr;?></td>
	</tr>
	<tr>
    	<td>Last name:</td>
	<td><input name="lastName" type="text" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>">
	<?php echo $lastNameErr;?></td>
	</tr>
	<tr>
    	<td>Organization:</td>
	<td><input name="organization" type="text" value="<?php if (isset($_POST['organization'])) echo $_POST['organization']; ?>">
	<?php echo $orgErr;?></td>
	</tr>
	<tr>
    	<td>Email address:</td>
	<td><input name="email" type="text" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
	<?php echo $emailErr;?></td>
	</tr>
	<tr>
    	<td>Phone number:</td>
	<td><input name="phone" type="text" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
	<?php echo $phoneErr;?></td>
	</tr>
	<tr>
    	<td>Days attending:</td>
	<td>
		<input name="monday" type="checkbox" value = "Monday" <?php if ($_POST['monday']) echo "CHECKED"; ?>>Monday
		<input name="tuesday" type="checkbox" value = "Tuesday" <?php if ($_POST['tuesday']) echo "CHECKED"; ?>>Tuesday<?php 
echo $dateErr;?>
<td/>
	</tr>
	<tr>
	<td>T-shirt size:</td>
	<td>
	<select name="t-shirt">
	<option>--Please choose--</option>
	<option name="s"  <?php if ($_POST['t-shirt']== 'Small') echo "SELECTED"; ?>>Small</option>
	<option name="m" <?php if ($_POST['t-shirt']== 'Medium') echo "SELECTED"; ?>>Medium</option>
	<option name= "l" <?php if ($_POST['t-shirt']== 'Large') echo "SELECTED"; ?>>Large</option>
	<option name= "xl" <?php if ($_POST['t-shirt']== 'X-Large') echo "SELECTED"; ?>>X-Large</option>
	</select>
	<?php echo $shirtErr;?>
	</td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
	<td></td>
	<td><input name="submit" type="submit"></td>
	</tr>
  </form>
  <?php
}
?>
  </body>
</html>
