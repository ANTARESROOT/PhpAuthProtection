<?php
$addr = $_SERVER["REMOTE_ADDR"];
$d = date(DATE_RFC822);
$string = $addr . " --- " . $d . "\n";
file_put_contents("ip.txt", $string, FILE_APPEND);

?>