<?php

// Ham so:
echo abs(-10) ."<br/>";
echo round(3.6) ."<br/>";
echo round(3.4) ."<br/>";
echo round(3.5) ."<br/>";
echo round(3.414566,2) ."<br/>"; // lam 2 chu so dang sau dau .
// Lam tron len va lam tron xuong : ceil & floor
echo floor(3.9) ."<br/>";
echo floor(-3.9) ."<br/>";
//-5 -4      -3 -2 -1 0 1 2 3      4 5
//      -3.9                  3.9
echo ceil(3.9) ."<br/>";
echo ceil(-3.9) ."<br/>";

echo rand() ."<br/>";
echo rand(1,10) ."<br/>";

echo min(-10,4,6,9) ."<br/>";
echo max(-10,4,6,9) ."<br/>";

echo sqrt(16) ."<br/>"; // 4
echo pow(2,3) ."<br/>"; // 2^3

echo M_PI."<br/>";
echo M_E."<br/>";
// tinh log, sin, cos, tan..
// Ham danh cho chuoi
$str1 = "xin chao pHP";
// PHP oah...
echo strlen($str1) ."<br/>"; // tinh do dai cua chuoi (kem theo khoang cach)
echo str_word_count($str1) ."<br/>"; // Dem tu trong chuoi
echo strrev($str1) ."<br/>"; // Dao nguoc chuoi
// Lay ra vi tri bat dau cua 1 tu nao do: PHP => strpos
echo strpos($str1,"PHP") ."<br/>"; // tra ra vi tri cua chuoi chung ta tim
// doc them cac ham chuoi PHP
echo str_replace("PHP","Java",$str1) ."<br/>";
// substr: cat chuoi tu vi tri gi thanh vi tri
// Uppercase: strupper
// strlower
// ucword
echo ucwords($str1) ."<br/>";
// Xoa khoang trang
// dau vao cuoi: .trim
// Xoa trai: ltrim(chuoi)
// Xoa phai: rtrim(chuoi)
$str ="       Test123        ";
echo trim($str) ."<br/>"; ;
// cai chuoi: split
$str2 ="Hello world!";
print_r( str_split($str2) ); // 1 array va cat tung tu: H,e,l,l,...
// https://viblo.asia/p/cac-ham-xu-ly-chuoi-trong-php-phan-1-RQqKLvmNl7z