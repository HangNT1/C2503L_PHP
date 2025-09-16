<?php
// Object tieu chuan => STDClass: {}
function dd($var)
{
    echo  "<pre>";
    var_dump($var);
    echo  "</pre>";
    // die;
}

// Object & Class
//Class SinhVien : ma, ten, tuoi, diem, chuyen nganh
// thuoc tinh cua 1 doi tuong
// Class khuon mau
// Object: SV Nguyen Quocs Hung, SV Trinh Hoang Dung
// OOP: 4 dac trung
// Cha to nhat:
// Object - Java
// STDClass : DongVat, ThucVat.. con cua STDClass - PHP
$doiTuong = new stdClass(); // Object tieu chuan
$doiTuong -> ten = 'Meo 1';
$doiTuong -> tuoi = 2;
$doiTuong -> gio = 3;
$doiTuong -> version = 1.1;
dd($doiTuong);