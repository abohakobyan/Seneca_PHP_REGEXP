<html>
  <head>
<title> Assignment1 by: Albert Hakobyan </title>			
  </head>
<body>
<?php
//Reading Files
$modelfile = file('cellphone.txt');
$osfile = file('OS.txt');
$versionfile= file('version.txt');
$pricefile = file('price.txt');
//Counting # of items
$itemcount = 0;
$handle	= fopen('cellphone.txt', "r+");
while(!feof($handle)){
$line = fgets($handle);
$itemcount++;
}
fclose($handle);
$itemcount--;
for($i=0;$i<$itemcount;$i++){
$model[$i] = trim($modelfile[$i]);
$os[$i] = trim($osfile[$i]);
$version[$i] = trim($versionfile[$i]);
$price[$i] = trim($pricefile[$i]);
}

//Connecting to DataBase function
function linker(){	  
$lines = file('/home/int322_161c35/int322/secret/topsecret');
                $dbserver = trim($lines[0]);
                $uid = trim($lines[1]);
                $pw = trim($lines[2]);
                $dbname = trim($lines[3]);
  $link = mysqli_connect($dbserver, $uid, $pw, $dbname)
                                or die('Could not connect: ' . mysqli_error($link));
return $link;
}
//Clearing Old Data
	$link = linker();
	$sql_query = 'drop table phones';
//Creating New Table
	$result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));
	$sql_query = 'create table phones(id int zerofill not null auto_increment, 
	model varchar(20) not null, os varchar(20) not null,price decimal(10,2) not null, primary key (id))'; 
	$result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));

//Filling in new data
for($i = 0; $i< $itemcount; $i++){
	$sql_query = 'INSERT INTO phones set model= "' . $model[$i] . '", os= "' . $os[$i] . ' '  . $version[$i] . '", 
price= "' . $price[$i] .'"';
	 $result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));
}
	$sql_query = 'SELECT * FROM phones';
	         $result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));
//Validification
$dataValidCount = 0;
$dataValid = false;
$valid = "/^[0-9]\d*(\.\d+)?$/";
$maxPrice = $_POST['maxPrice'];
$minPrice = $_POST['minPrice'];
$modelSel = $_POST['modelSel'];
if($_POST){
	
	if($modelSel != "Select A Phone"){
		if(preg_match($valid, $maxPrice) || $maxPrice = ""){
		$dataValidCount++;	
			}else{
		$maxPriceErr = "Must Enter a Valid Max Price";
		$dataValid = false;
		}
		if(preg_match($valid, $minPrice) || $minPrice = ""){
	 	$dataValidCount++;
		}else{
		$minPriceErr= "<br>Must Enter a Valid Min Price<br>";}
		$dataValid = false;
		if($maxPrice > $minPrice){
		$dataValidCount++;
		}else{
		$logicErr = "Maximum price must be greater than the minimum price";
		$dataValid = false;
		}
	}else{
$selErr = 'Must select a Model';
}
}
//OutPut
if($modelSel!= "Select A Phone" && $_POST && $dataValidCount == 3){
//First query
$sql_query = 'SELECT * FROM phones where model="' . $modelSel . '"';
 $result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));
$row = mysqli_fetch_assoc($result);
?>
<html>
<body>
<table border ="1">
<tr><th>Model</th> <th>OS</th> <th>Price</th></tr>
<tr>
<td><?php print $row['model']; ?></td>
<td><?php print $row['os']; ?></td>
<td>$<?php print $row['price']; ?></td>
</tr>
</table>
<?php
//Second query
$sql_query = "SELECT * FROM phones where price between $minPrice and $maxPrice order by price;";
 $result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));
if(mysqli_num_rows($result) != 0){
echo "<h3>Here are the Phones between $minPrice and $maxPrice:</h3>";
echo "<br>";
?>
<table border ="1">
<tr><th>Model</th> <th>OS</th> <th>Price</th></tr>
<?php
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php print $row['model']; ?></td>
<td><?php print $row['os']; ?></td>
<td>$<?php print $row['price']; ?></td>
</tr>
<?php } ?>
</table>
</body>
</html>
<?php
}else{
echo "<h3>There are no phones between $minPrice and $maxPrice </h3>";
}
}else{
?>
<h2> Compare Cell Phones! </h2>
<?php echo $selErr; ?>
<form method="post" action="">
<?php
echo '<select name="modelSel">';
echo "<option>Select A Phone </option>";
for($i = 0; $i < $itemcount; $i++){
    echo "<option>{$model[$i]}</option>";
    if ($_POST['model']== '$model[$i]'){
 echo "SELECTED";
}	
}
echo '</select>'; 
?>
<br>
<br>
Min Price:
<input name = "minPrice" type= "text" size= "3" value ="<?php if (isset($_POST['minPrice'])) echo $_POST['minPrice']; ?>">
<?php echo $minPriceErr;?>

Max Price:
<input name = "maxPrice" type= "text" size= "3" value ="<?php if (isset($_POST['maxPrice'])) echo $_POST['maxPrice']; ?>">
<?php echo $maxPriceErr;?>
<br>
<?php echo $logicErr;?>
<br>
 <input name="submit" type="submit">
</form>
<?php
}
?>
</body>
</html>
