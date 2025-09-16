<?php
function  dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
$data =[10,50,60,20,-40];
echo "<h3>Mang goc</h3>";
dd($data);
// SORT_NUMBERIC && SORT_STRING
// tang dan => sort
sort($data);
dd($data);
// giam dan =>rsot
rsort($data);
dd($data);

$dataTest = [
    "Tao" => 10,
    "Cam"=>20,
    "Dao"=>-30,
    "Mang cut"=>-40
];
// mang chua sap xep
echo "<h3>Mang chua sap xep</h3>";
dd($dataTest);
echo "<h3>Mang da sap xep</h3>";
// sort tang dan key =>ksort
ksort($dataTest);
dd($dataTest);
// sort tang dan theo value =? asort
//asort($dataTest);
//dd($dataTest);
//// sort giam dan theo key => krsot
//krsort($dataTest);
//dd($dataTest);
//// sort giam dan them value => arsort
//arsort($dataTest);
//dd($dataTest);