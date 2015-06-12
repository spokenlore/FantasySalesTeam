<?php
$myFile = "test.txt";

$fh = fopen($myFile, 'w');
$stringData = $_POST['Data'];
fwrite($fh, $stringData);
fclose($fh);
?>
