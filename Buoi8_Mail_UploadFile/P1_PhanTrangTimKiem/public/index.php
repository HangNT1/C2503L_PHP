<?php
global $connect;
require_once "../config/config.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Khai bao cac thong so cần thiét khi phân trang
$limit = 3; // So ban ghi/trang
$page = $_GET['page'] ?? 1;
$offset = ($page-1) * $limit;
// Cau hinh search
$searchValue = $_GET['search'] ?? '';
$search= '%'.$searchValue.'%';

//SELECT *
//FROM sinhvien
//LIMIT 3
//OFFSET 6 -- 7
//-- LIMIT: SO LUONG PHAN TU /TRANG
//-- OFFSET: bo qua phan tu o vi tri nay, tien den phan tu o vi tri tiep theo
//-- trang dau: 1,2,3 - 0
//-- trang thu 2: 4,5,6 - 3
//-- trang dau: 1,2,3,4,5
//-- trang thu 2: 6,7
//-- VD: 2 phan tu 1 trang => 4
//-- trang dau tien: 1,2
//-- trang thu 2: 3,4
//-- Co:
//   -- limit: 7
//-- so trang mong muon: page = 1 (0)
//-- Mong muon: offset => offset = page * limit
//    -- 3 phan tu/trang => limit = 3 && offset = 0*3 = 0
//-- trang tiep theo - 1: 3*1 = 3
//-- 2 * 3 = 6
// Load du lieu sinh vien len table
//$sql = 'SELECT * FROM sinhvien';
//$ketqua = $connect->query($sql);
// SEARCH
// B1: Goi gia tri search
//// B2: Viet cau truy van
//$sql = 'SELECT * FROM `sinhvien` WHERE ten_sinhvien LIKE ?';
//$stmt = $connect->prepare($sql);
//// B3: Chuan bi du lieu truy vao dau ? nen can
//// B4: Truyen du lieu vao dau ?
//$stmt->bind_param('s', $search); // like la co %
//// B5: Excute va hien thi ket qua
//$stmt->execute();
//$ketqua = $stmt->get_result();
// TEN BIEN PHAN SEARCH, PHAN TRANG, SORT... => TRUNG VS TEN CUA LIST BAN
// TUC LA DUNG 1 LIST CHI THAY GIA TRI
// Phan trang
// B1: Tim tong so luong phan tu
//$countQuery = "SELECT COUNT(*) FROM `sinhvien` ";
//$countResult = $connect->query($countQuery);
//$totalElements = $countResult->fetch_row()[0];
// Đếm tổng số bản ghi
$countQuery = "SELECT COUNT(*) AS total FROM `sinhvien` WHERE ten_sinhvien LIKE ?";
$countStmt = $connect->prepare($countQuery);
$countStmt->bind_param("s", $search);   // dùng $search thay vì $searchParam
$countStmt->execute();
$countResult = $countStmt->get_result();

// B2: Tinh total Page
$totalElements = $countResult->fetch_assoc()['total'] ?? 0;
$totalPages = ceil($totalElements / $limit);
//echo $totalPages;
// Phan trang
$sqlPhanTrang = 'SELECT * FROM sinhvien WHERE ten_sinhvien LIKE ? LIMIT ? OFFSET ? ';
$stmtPhanTrang = $connect->prepare($sqlPhanTrang);
$stmtPhanTrang->bind_param("sii", $search, $limit, $offset);
$stmtPhanTrang->execute();
$ketqua = $stmtPhanTrang->get_result();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
    <title>Document</title>
</head>
<body>
<h1>Quản lý sinh viên</h1>
<form method="GET">
    <input type="search" name="search" placeholder="Search" value="<?= htmlspecialchars($searchValue); ?>" />
    <button type="submit">Search</button>
</form>
<br/><br/>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Mã</th>
        <th>Tên</th>
        <th>Tuổi</th>
        <th>Địa chỉ</th>
        <th>Kỳ học</th>
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $ketqua->fetch_assoc())  : ?>
        <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['ma_sinhvien']?></td>
            <td><?= $row['ten_sinhvien']?></td>
            <td><?= $row['tuoi']?></td>
            <td><?= $row['diachi']?></td>
            <td><?= $row['kyhoc']?></td>
            <td>
                <a href="#">Xem</a>
                <a href="#">Sua</a>
                <a href="#">Xoa</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<div>
    <?php
    //    for ($page = 1; $page <= $totalPages; $page++) {
    //        echo "<a href='?page=" . $page . "&search=".$search."'>" . $page . "</a>";
    //    }
    // Chua ki tu dang biet search thi chet:   A

    for ($page = 1; $page <= $totalPages; $page++) {
        echo "<a href='?page=" . $page . "&search=" . urlencode($searchValue) . "'>" . $page . "</a> ";
    }
    ?>
</div>
</body>
</html>