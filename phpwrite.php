<?php
$myFile = "test.json";

$fh = fopen($myFile, 'w+');
$stringData = $_POST['json'];
fwrite($fh, $stringData);
fclose($fh);
?>
