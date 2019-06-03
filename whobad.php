<?php
$addr = $_SERVER["REMOTE_ADDR"];
$d = date(DATE_RFC822);
$string = "WARNING!!! (INCORRECT PASS)---  " . $addr . " --- " . $d . "\n";
file_put_contents("ipbad.txt", $string, FILE_APPEND);

?>