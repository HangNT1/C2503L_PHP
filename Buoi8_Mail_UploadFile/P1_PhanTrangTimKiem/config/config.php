<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sinhvien_db";
ini_set('display_errors', 1);
error_reporting(E_ALL);
$connect = new mysqli($host, $user, $pass, $db);
if ($connect->connect_errno) {
    die("Kết nối thất bại: " . $connect->connect_error);
}