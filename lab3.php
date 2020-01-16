<html>
  <head>
    <title>Lab 3</title>
  </head>
  <body>
<?php
$number = $_POST['number'];
if ($_POST) {
$number= trim($number);
$number = str_replace(' ', '', $number);
	if($number == ""){
	$numberErr = "Error - You must fill in at least 1 char";
}else if(preg_match("/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/", $number)){
           $numberErr= "Works";
}else{
	$numberErr= "Doesnt Work";	
}

}

?>
<h1> Lab3 </h1>
<form method = "post" action = "">

<input type = "text" name = "number" value="<?php if (isset($_POST['number'])) echo $_POST['number']; ?>">
        <?php echo $numberErr;?>
<br>
<input type = "submit"/>
</body>
</html>
