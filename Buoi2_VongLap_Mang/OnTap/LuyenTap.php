<?php
echo"<p>Bai 1</p>";
$so = 4;
$float = 4.5;
$string="Hungw";
$bool=true;
$null=null;
$arr=[9,-1,10,15];
echo "<pre>";
var_dump($arr);
echo "</pre>";
echo "<pre>";
var_dump($so );
echo "</pre>";
var_dump($float ."<br>");
var_dump($string ."<br>");
var_dump($bool ."<br>");
var_dump($null ."<br>");

echo"<p>Bai 2</p>";
$stringint = "1234";
$FLOATINT = "12,4";
$intbool = 0;
echo (int)$stringint;
echo"<br/>";
echo (int)$FLOATINT;
echo"<br/>";
echo(bool)$intbool;

echo"<p>Bai 3</p>";
$pi = 3.14;
$r = 5;
$area = $pi * pow($r,2);
echo $area;

echo"<br/>";
echo"<p>Bai 6</p>";
$gio = 10;

if ($gio < 12){
    echo "sang";
} elseif ($gio < 18){
    echo "chieu";
} else{
    echo "toi";
}