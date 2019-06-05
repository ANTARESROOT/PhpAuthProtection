
<form name="my_form" method="get">
    <input type="hidden" name="key" ><br>
    <input type="hidden" name="done" value="send">
</form>
<?php


if(isset($_GET["key"]) == "0xF0000001")
{
    $attack = 0;
    $block = 0;

    ReWriteConfig($attack, $block);



}

if(isset($_GET["key"]) == "0xFF000001")
{
    $attack = 4;
    $block = 1;

    ReWriteConfig($attack, $block);



}

function ReWriteConfig($a, $b)
{
    $fo1 = fopen("config.ini", 'w');

    $string1 = "attack=" . $a . "\n";
    fputs($fo1, $string1);

    $string1 = "block=" . $b;
    fputs($fo1, $string1);
    fclose($fo1);

}
?>
