<?php
// dd: dump & die => dump & thoat chuong trinh
function dd($var)
{
    echo  "<pre>";
    var_dump($var);
    echo  "</pre>";
   // die;
}
// Mang : []
// Vi tri : Start 0
// Gia tri cua mang
// Theo ly thuyet C => Mang la tap hop cua cac phan tu chung kieu du lieu
// Trong PHP co the co chung hoac khac kieu du lieu vs mang
// Kieu du lieu dac biet: Co the chua chuoi, so, boolean, Object ...
// Mang co chi so
// Mang ket hop(associative Array): cap key - value : Map trong Java
$mang_so_nguyen = [-2,9.5,10,5];
//$mang_so_nguyen = array(-2,9.5,10,5);
//echo  "<pre>";
//var_dump($mang_so_nguyen);
//echo  "</pre>";
dd($mang_so_nguyen);
// var_dump: Kieu du lieu va gia tri

$mangs =[0,-2,9.4,10,"Test","PHP",15,"3",true];
dd($mangs);

$mang3 = array(
    "maSV" => "NV01",
    "tenSV"=>"Nguyen Van 10",
    "tuoi"=>10
);
$mang4 = [
    "maSV" => "NV01",
    "tenSV"=>"Nguyen Van 10",
    "tuoi"=>10
];
dd($mang3);
dd($mang4);