<?php
$conf = parse_ini_file("config.ini");
if ($conf['block'] != 0)//���� ������� �����������
{
    include 'block.html';
require ("timer.php");
    die("System blocked!!!");
}
if ($conf['attack'] >= 3)//���� ����� ���� ��������������
{
    $a=3;
    $b =1;//���������� ������� ��� ����� >= 3
    WriteConfig($conf, $a, $b);//����� ������, ������� �����, ������� �������
    include 'blockAttack.html';

    die("System blocked!!! Attack was found.");
}
//������ ������ ������ ������� �����
//$conf = AttCount($conf);

//WriteConfigAttack($conf);

//����� ������ ������ ������� �����





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
}//��� ����������� ����� ����������� ������ ������. ����������!!!
function AttCount($i)
{
    $attcounter = $i['attack'];
    var_dump($i);
    $attcounter++;
    var_dump($attcounter);
    $i['attack'] = $attcounter;
    return $i;
}//������� �������. ����� ��������� ������� ������ ������ �������
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
}//������� ������ ������ �������
?>