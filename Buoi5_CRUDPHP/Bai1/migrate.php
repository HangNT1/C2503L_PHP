<?php
error_reporting(E_ALL );
ini_set('display_errors', 1);

// Sau laravel => quen dan
// Muc dich: dung de nhap lieu, tich hop di chuyen... (connect SQL, tao DB, tao bang...)
require_once "helper.php";
// B1: Chuan bi cac thong tin de ket noi SQL
$hostname = "localhost";
$username = "root";
$password = ""; // neu dung xampp thi password la rong
$port = "3306"; // default : 3307, 4306
$database ='test'; // PHAI LA 1 DATABASE CO SAN TRONG SQL - cach 2 moi dung
// B2: Ket noi SQL
// C1: new mysqli
//$connect = new mysqli($hostname, $username, $password);
// C2: mysql_connect
$connect = mysqli_connect($hostname, $username, $password,$database,$port);

// B3: Tao DB
$sql  = "CREATE DATABASE IF NOT EXISTS buoi9";
// ``: de bieu dien ten DB & ten bang
// truy van
$result = $connect->query($sql); // doi tuong da duoc ket noi sql
//dd($result);
// su dung db
$connect ->select_db("buoi9"); // Use database
// B4: Tao bang
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB;";

$result = $connect->query($sql);
// neu tao bang loi thi hien thi
//if(!$result){
//    echo $connect->error;
//}
//$sql = "INSERT INTO users (username, password, email, created_at, updated_at) VALUES";
//$result = $connect->query($sql);