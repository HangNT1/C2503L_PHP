<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "library_management";
$port = "3306"; // CO THE KHAI BAO HOAC KHONG TUY - DEFAULT 3306 THI K CAN
$connect = mysqli_connect($host, $username, $password,$database,$port); // ham nay tra ra true false
// true => thanh cong
// false => that bai
if(!$connect){ // ERROR
    die ("Ket noi that bai");
}