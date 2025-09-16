<?php
function dd($var)
{
    echo  "<pre>";
    var_dump($var);
    echo  "</pre>";
    // die;
}

class SinhVien2
{

    // Khai bao cac thuoc tinh cua doi tuong: public: pham vi truy cap - moi noi deu goi duoc
    public $maSinhVien;

    public $tenSinhVien;

    public $tuoi;

    public $nganhHoc;

}

// Doi tuong => Object
$sinhVien1 = new SinhVien2();
// Them thuoc tinh cho doi tuong SV
$sinhVien1 -> maSinhVien = '1';
$sinhVien1 -> ten = 'Nguyen Van A';
$sinhVien1 -> tuoi = 10;
$sinhVien1 -> nganhHoc = 'Ky thuat phan mem';

dd($sinhVien1);
$sv2 = new SinhVien2();
// Them thuoc tinh cho doi tuong SV
$sv2 -> maSinhVien = '2';
$sv2 -> ten = 'Nguyen Van B';
$sv2 -> tuoi = 15;
$sv2 -> nganhHoc = 'An toan thong tin';

dd($sv2);
// null => 1 kieu du lieu dac biet trong PHP
// No bieu thi bien day k có giá trị hoặc giá trị k xác định
$a = null; // no gan truc tiep
$b; // chua khoi tao => coi nhu la null
$c = "Hello";
$c = null; // Huy gia tri cua 1 bien
// resource => 1 kieu du lieu dac biet trong PHP
// No dung de tham chieu toi tai nguyen ben ngoai (Ket noi vs CSDL, ket noi vs socket...)
// Resource k phai kieu du lieu thuan => handle do PHP quan ly