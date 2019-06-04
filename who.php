<?php
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];

if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
else $ip = $remote;

//$addr = $_SERVER["REMOTE_ADDR"];
$d = date(DATE_RFC822);
$string = $ip . " --- " . $d . "\n";
file_put_contents("ip.txt", $string, FILE_APPEND);

?>