<?php
require_once "SanPham.php";
require_once "DienThoai.php";
require_once "DienThoaiServiceImpl.php";
require_once "IService.php";
//$sp = new SanPham(); // day la contructor khong tham so
//$sp ->setMa("aaaaaa");
//$sp ->setTen("gsdfgfdsg");
//$sp ->setGia(100);
//$sp ->setMieuTa("fsagdfsag");
// contructor full tham so
$sp = new SanPham("SP01","San pham 1",10.5,"San pham tot");
$sp ->hienThi();
$dt = new DienThoai("123","San pham 2",10.5,"San pham tot");
$dt ->hienThi();
$a = new SanPhamServiceImpl();
$a ->nhapThongTin(); // cua doi tuong SP
$a = new DienThoaiServiceImpl();
$a ->nhapThongTin(); // cua doi tuong DT
//echo "Ma : ".$sp ->getMa()."<br/>";
//echo "Ten : ".$sp ->getTen()."<br/>";
//echo "Gia : ".$sp ->getGia()."<br/>";
//echo "Mieu ta : ".$sp ->getMieuTa()."<br/>";