<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "company_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_errno) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
function e($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
