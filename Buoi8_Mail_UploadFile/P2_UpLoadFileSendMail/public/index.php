<?php

// Goi cac thu vien
// SMTP
//__DIR__ : hang so trong PHP => duong dan tuyet doi cua thu muc dang chay
use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . '/../vendor/PHPMailer/src/SMTP.php';
require_once __DIR__ . '/../vendor/PHPMailer/src/Exception.php';
require_once __DIR__ . '/../vendor/PHPMailer/src/PHPMailer.php';

// Tao ra 1 doi tuong PHPMailer
$mail = new PHPMailer(true);
// try..catch
// try: chua doan code co the xay ra loi
// catch: cach xu ly khi loi xay ra
try{
    // gmail, email: 465 & 587
    // Kich hoat SMTP
    $mail->isSMTP();
    // Cau hinh chung email: cau hinh email
    $mail -> Host = 'smtp.gmail.com';
    $mail -> SMTPAuth = true;
    $mail -> Username = 'hangnt16499@gmail.com';
    $mail -> Password = 'ctlb zcwa euav utqk'; // App passs
    $mail -> SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Su dung SSL de bao mat
    $mail -> Port = 465; // Cong SMTP gmail(465 -> SSL)

    // thong tin nguoi dung
    $mail -> setFrom('hangnt16499@gmail.com','Nguyen Thuy Hang');
    $mail -> Sender = 'hangnt16499@gmail.com';

    // Thong tin nguoi nhan
    $mail -> addAddress('hangnt169@fpt.edu.vn','Hang2');

    // Cau hinh noi dung mail
    $mail -> isHTML(true); // Email duoi dang text thuong => k ghi gi => html
    $mail -> Subject = 'Test mail';
    $mail -> Body = '<b>Test mail body</b>';

    // Gui mail
    $mail -> send();
    echo  "Email da duoc gui di";
}catch (Exception $e){
    // Hen thi thong bao loi khi gui mail that bai
    echo  "Email khong duoc gui thanh cong";
}