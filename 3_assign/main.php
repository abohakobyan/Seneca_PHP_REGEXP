<?php
require('deadlanguages.txt');
$filename = 'deadlanguages.txt';
$filename2 = 'deadlanguages2.txt';
$count2= 0;
$count3= 0;
$fp = fopen($filename, "r+") or die ("Couldn'y open $filename");
$s = fread($fp, filesize($filename)) or die ("did not get anything");
$string = file_get_contents($filename);

$count = preg_match_all('/wh\*/', $string);
$matches = '/\((.*?)\)/';
$match2= '/wha/';
fseek($fp, 0);
file_put_contents($filename, "");
$total =  preg_replace($matches, '(*wh*)', $s, -1, $count2);
fwrite($fp, $total);

 fseek($fp, 782);
 ftell($fp);
$re = filesize($filename) - ftell($fp);
$s2 = fread($fp, $re) or die ("not working");
fseek($fp, 762);
$fp2 = fopen($filename2, "w") or die ("Couldn'y open $filename2");

$str = preg_replace($match2, 'which', $s2, -1, $count3);
fwrite($fp2, $str);
fclose($fp2);

$count = substr_count($string, 'wh*');
$count = preg_match_all('/wh\*/', $string);

$lines = file('/home/int322_161c35/int322/secret/topsecret');
		$dbserver = trim($lines[0]);
		$uid = trim($lines[1]);
		$pw = trim($lines[2]);
		$dbname = trim($lines[3]);
		$link = mysqli_connect($dbserver, $uid, $pw, $dbname)
         			or die('Could not connect: ' . mysqli_error($link));
$sql_query = 'INSERT INTO editing set preedit="' . $count . '", postedit="' . $count2 . '",
		selection="' . $count3 . '"';
$result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));
mysqli_close($link);


fclose($fp);
?>
