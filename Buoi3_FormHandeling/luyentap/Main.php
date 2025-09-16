<?php
// Goi File khac vao
//require_once "SinhVien.php";
// 1. Tao 1 doi tuong SinhVien gom cac thuoc tinh: mssv, ten,tuoi,diaChi, nganhHoc, kyHoc.
// Yeu cau:
// 1. In ds doi tuong sv ra man hinh (5 phan tu fix cung)
// 2. Hien thi danh sach duoi dang table
// 3. Hien thi danh sach duoi dang cbb
// 4. Hien thi ds duoi dang ul, li

include "SinhVien.php";
$a = 5;
$sv = new SinhVien();
$sv->ten="nguyen van a";
$sv->mssv="mssv1";
$sv->tuoi=21;
$sv->diaChi="ha noi";
$sv->nganhHoc="thanh khoa";
$sv->khoaHoc="thanh khoa";

$sv1=new SinhVien();
$sv1->ten="nguyen van b";
$sv1->mssv="mssv2";
$sv1->tuoi=23;
$sv1->diaChi="thanh hoa";
$sv1->nganhHoc="thanh khoa";
$sv1->khoaHoc="thanh khoa";

$sv2=new SinhVien();
$sv2->ten="nguyen van c";
$sv2->mssv="mssv3";
$sv2->tuoi=24;
$sv2->diaChi="ha noi";
$sv2->nganhHoc="cntt";
$sv2->khoaHoc="php";


$sinhViens= array($sv,$sv2,$sv1);
foreach($sinhViens as $sv){
    $sv -> hienThiThongTinSinhVien();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <table border ="1">
        <thead>
            <tr>
                <th>MSSV</th>
                <th>Ten</th>
                <th>Tuoi</th>
                <th>Dia chi</th>
                <th>Nganh hoc</th>
                <th>Khoa hoc</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($sinhViens as $sv){
                    echo "<tr>";
                        echo "<td>".$sv->mssv."</td>";
                        echo "<td>".$sv->ten."</td>";
                        echo "<td>".$sv->tuoi."</td>";
                        echo "<td>".$sv->diaChi."</td>";
                        echo "<td>".$sv->nganhHoc."</td>";
                        echo "<td>".$sv->khoaHoc."</td>";
                    echo"</tr>";
                }
            ?>
        </tbody>
    </table>
    <select>
        <?php
        foreach($sinhViens as $sv){
            echo "<option>".$sv->mssv."</option>";
        }
        ?>
    </select>
    <ul>
        <?php
        foreach($sinhViens as $sv){
            echo "<li>".$sv->mssv." - ".$sv->ten." - ".$sv->tuoi."</li>";
        }
        ?>
    </ul>
</body>
</html>
