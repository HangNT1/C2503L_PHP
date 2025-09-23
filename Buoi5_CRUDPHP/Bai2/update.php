<?php
global $connect;
require_once "config.php";
// BUOC 1: DETAIL => LAY GIA TRI CUA PHAN TU DANG CHON THEO ID
$id = $_GET['id'];
$sql = "SELECT *  FROM `books` WHERE id = ?";
$stmt = $connect->prepare($sql);
$stmt -> bind_param("i",$id);
$stmt->execute();
// Muon lay ds
$result = $stmt->get_result();
// Chuyen thanh 1 dong du
$book = $result->fetch_assoc();
// Buoc 2: Validate - Check trong
$error =[];
$title = $_POST['title'] ?? "";
$author = $_POST['author'] ?? "";
$published_year = $_POST['published_year'] ?? "";
$genre= $_POST['genre'] ?? "";
$price = $_POST['price'] ?? "";
$description = $_POST['description'] ?? "";
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    if ($title == "" || $author == "" || $published_year == "" || $genre == "" || $price == "") {
        $error['error'] = "Khong duoc de trong du lieu";
    }
    if(empty($error)) {
        // update => tu viet noi giong cac chuc nang khac
        $stmt = $connect->prepare("UPDATE books SET title = ?, author = ?, published_year = ?, price = ?, genre = ?, description = ?, updated_at = NOW() WHERE id = ?");
        $stmt->bind_param('sssdssi', $title, $author, $published_year, $price, $genre, $description, $id);

        if ($stmt->execute()) {
            header('Location: index.php');
        } else {
            echo "Lỗi: " . $stmt->error;
        }
    }
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
<h1 style="text-align: center">Sửa mới sách</h1>
<form method="POST">
    <label>Tiêu đề: <input type="text" name="title" value="<?= $book['title']?>" ></label>
    <span style="color:red"><?=$error['error'] ??'' ?></span>
    <br>
    <label>Tác giả: <input type="text" name="author"  value="<?= $book['author']?>" ></label>
    <span style="color:red"><?=$error['error'] ??'' ?></span>
    <br>
    <label>Năm xuất bản: <input type="number" name="published_year" value="<?= $book['published_year']?>"  ></label>
    <span style="color:red"><?=$error['error'] ??'' ?></span>
    <br>
    <label>Giá: <input type="number" step="0.01" name="price"  value="<?= $book['price']?>" ></label>
    <span style="color:red"><?=$error['error'] ??'' ?></span>
    <br>
    <label>Thể loại: <input type="text" name="genre"  value="<?= $book['genre']?>" ></label>
    <span style="color:red"><?=$error['error'] ??'' ?></span>
    <br>
    <label>Mô tả: <textarea name="description" ><?= $book['description']?></textarea></label>
    <span style="color:red"><?=$error['error'] ??'' ?></span>
    <br>
    <button type="submit">Sửa</button>
</form>
</body>
</html>
