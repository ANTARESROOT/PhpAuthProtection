<?php
$conf = parse_ini_file("config.ini");
if ($conf['block'] != 0)//если система блокирована
{
    include 'block.html';
require ("timer.php");
    die("System blocked!!!");
}
if ($conf['attack'] >= 3)//если атака была зафиксированна
{
    $a=3;
    $b =1;//блокировка доступа при атаке >= 3
    WriteConfig($conf, $a, $b);//отдаём массив, уровень атаки, уровень доступа
    include 'blockAttack.html';

    die("System blocked!!! Attack was found.");
}
//начало записи плохих попыток входа
//$conf = AttCount($conf);

//WriteConfigAttack($conf);

//конец записи плохих попыток входа





function WriteConfig($c, $a, $b)
{
    $fo = fopen ("config.ini", 'w');
    //$string = "attack=" . $c['attack'] . "\n";
    $string = "attack=" . $a . "\n";
    fputs($fo, $string);
    //$string = "block=" . $c['block'];
    $string = "block=" . $b;
    fputs($fo, $string);
    fclose($fo);
}//При обнаружении атаки срабатывает плохая запись. Блокировка!!!
function AttCount($i)
{
    $attcounter = $i['attack'];
    var_dump($i);
    $attcounter++;
    var_dump($attcounter);
    $i['attack'] = $attcounter;
    return $i;
}//счётчик попыток. Далее требуется функция записи плохих попыток
function WriteConfigAttack($c)
{
    $fo = fopen ("config.ini", 'w');
    $string = "attack=" . $c['attack'] . "\n";
    //$string = "attack=" . $a . "\n";
    fputs($fo, $string);
    $string = "block=" . $c['block'];
    //$string = "block=" . $b;
    fputs($fo, $string);
    fclose($fo);
}//функция записи плохих попыток
?>