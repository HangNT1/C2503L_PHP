<?php
// config.php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';      // sửa theo cấu hình của bạn
$DB_NAME = 'demo_upload';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
    die('Kết nối MySQL lỗi: ' . $mysqli->connect_error);
}
$mysqli->set_charset("utf8mb4");
