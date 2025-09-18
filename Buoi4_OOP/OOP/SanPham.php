<?php
class SanPham{

    private $ma;

    private $ten;

    private $gia;

    private $mieuTa;

    // contructor: dung de khoi tao 1 doi tuong
    // Defaut => contructor khong tham so
    // Getter & Setter
    // Get: Lay thuoc tinh gi do
    // Set: Thay doi/Chinh sua thuoc tinh gi do
    /**
     * @param $ma
     * @param $ten
     * @param $gia
     * @param $mieuTa
     */
    public function __construct($ma, $ten, $gia, $mieuTa)
    {
        $this->ma = $ma;
        $this->ten = $ten;
        $this->gia = $gia;
        $this->mieuTa = $mieuTa;
    }

    /**
     * @return mixed
     */
    public function getMa()
    {
        return $this->ma;
    }

    /**
     * @param mixed $ma
     */
    public function setMa($ma): void
    {
        $this->ma = $ma;
    }

    /**
     * @return mixed
     */
    public function getTen()
    {
        return $this->ten;
    }

    /**
     * @param mixed $ten
     */
    public function setTen($ten): void
    {
        $this->ten = $ten;
    }

    /**
     * @return mixed
     */
    public function getGia()
    {
        return $this->gia;
    }

    /**
     * @param mixed $gia
     */
    public function setGia($gia): void
    {
        $this->gia = $gia;
    }

    /**
     * @return mixed
     */
    public function getMieuTa()
    {
        return $this->mieuTa;
    }

    /**
     * @param mixed $mieuTa
     */
    public function setMieuTa($mieuTa): void
    {
        $this->mieuTa = $mieuTa;
    }

    public function hienThi(){
        echo "Ma : ".$this ->ma."<br/>";
        echo "Ten : ".$this ->ten ."<br/>";
        echo "Gia : ".$this ->gia."<br/>";
        echo "Mieu ta : ".$this ->mieuTa."<br/>";
    }
}