<?php
error_reporting(E_ALL); // Bao tat ca loi cua file
ini_set("display_errors", 1); // Hien thi loi tren trinh duyet
$x = 5;
function Test(){
//    $x = 10; // Local
    static $x = 10 ;
    $x++;
    echo "Gia tri cua bien x trong  la : $x" ."<br/>";
}
Test(); // 11
Test(); // 12
Test(); // 13
echo "Gia tri cua bien x ngoai la : $x" ."<br/>";
