<?php
// Check dịnh dang mong muốn
// Posix regex => loại cũ
//ereg(), ereg_replace()...
// PCRE Regex
//preg_match() // kiem tra chuoi co khop mau khong
//preg_match_all() // tim tat ca cac ket qua phu hop vs yeu cau
//preg_replace() // thay the chuoi moi bang doan text gi do
//preg_split() // tach chuoi theo regex
//    Nguyen Van A 123 456
// Kiem tra trong chuoi co so hay khong
// Tim tat ca so trong chuoi nay
$pattern = "/\d+/"; // Regex chua so nhieu so (them +) : 1
//\d+: 0->9, 11, 112111
$giaTri ="123 Nguyen Van A ";
if(preg_match($pattern, $giaTri)){
    echo "Co ton tai so trong chuoi";
}else{
    echo "Khong co ton tai so trong chuoi";
}