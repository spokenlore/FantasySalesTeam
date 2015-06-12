<?php
$myFile = "test.txt";

$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $_POST["Data"];
fwrite($fh, $stringData);
fclose($fh);
?>
