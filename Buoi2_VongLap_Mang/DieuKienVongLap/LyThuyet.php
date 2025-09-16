<?php
// if... else
// continue
// break;
// Vong lap:
// while, do..while, for
// for vs mang co chi so
//Duyet qua gia tri
//foreach($array as $value){
//    // code
//}
$numbers =[10,20,40,50];
foreach ($numbers as $n){
    echo $n."<br/>";
}
// Duyet qua mang phuc hop key... value
//foreach ($arrays as $key => $value){
//    // code
//}
foreach ($numbers as $k => $v){
    echo $k . "- " . $v . "<br/>";
}

$hoa_quas = [
    "qua 1"=> 10,
    "qua 2"=> 20,
];

foreach ($hoa_quas as $k => $v){
    echo $k . "- " . $v . "<br/>";
}