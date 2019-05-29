<?php
$sec = 10;
sleep($sec);

$attack = 0;
$block = 0;

ReWriteConfig($attack, $block);

 
function ReWriteConfig($a, $b)
{
    $fo1 = fopen ("config.ini", 'w');
    
    $string1 = "attack=" . $a . "\n";
    fputs($fo1, $string1);
    
    $string1 = "block=" . $b;
    fputs($fo1, $string1);
    fclose($fo1);
}
?>