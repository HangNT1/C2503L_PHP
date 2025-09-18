<?php
// Ke thua : 2 class:
// Cha & Con
require_once  "SanPham.php";
class DienThoai extends SanPham
{

    // khai bao cac thuoc tinh rieng cua dien thoai
    private $imei;
    // Dien thoai: 5
    /**
     * @param $imei
     */
    public function __construct($imei,$ma, $ten, $gia, $mieuTa)
    {
        // Goi contructor tu cha -> con
        parent::__construct($ma, $ten, $gia, $mieuTa);
        $this->imei = $imei;
    }
    // this: goi cac thuoc tinh va phuong cua chinh no
    // parent: goi cac thuoc tinh va phuong cua class cha
    /**
     * @return mixed
     */
    public function getImei()
    {
        return $this->imei;
    }

    /**
     * @param mixed $imei
     */
    public function setImei($imei): void
    {
        $this->imei = $imei;
    }

    // ghi de function
    public function hienThi(){
        parent::hienThi();
        echo "Imei : ".$this->imei."<br/>";
    }

}