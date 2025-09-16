<?php

class SinhVien
{
    // Khai bao cac thuoc tinh cua doi tuong SV
    public $mssv;
    public $ten;
    public $tuoi;
    public $diaChi;
    public $nganhHoc;


    // Hien thi tt cua 1 doi tuong SV
    public function hienThiThongTinSinhVien(){
        echo "MSSV : ".$this->mssv."<br/>";
        echo "Ten : ".$this->ten."<br/>";
        echo "Tuoi : ".$this->tuoi."<br/>";
        echo "Dia chi : ".$this->diaChi."<br/>";
        echo "Nganh hoc : ".$this->nganhHoc."<br/>";
    }
}