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
$dat2 = $_POST['tuesday'];
$tshirt = $_POST['t-shirt'];
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





		echo $title;
		echo " First Name "; 
		echo $firstName;
		echo " Last Name ";
		echo  $lastName;
		echo " Organization ";
		echo  $org;
		echo " Email" ;
		echo  $email;
		echo " Phone Number ";
		echo  $phoneNumber;
} else { $validCount = 0;
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
		<input name="monday" type="checkbox" <?php if ($_POST['monday']) echo "CHECKED"; ?>>Monday
		<input name="tuesday" type="checkbox" <?php if ($_POST['tuesday']) echo "CHECKED"; ?>>Tuesday<?php echo $dateErr;?>
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
