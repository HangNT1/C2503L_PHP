<?php
//$error = [];
//$title = $_POST['title'] ?? "";
//$author = $_POST['author'] ?? "";
//$published_year = $_POST['published_year'] ?? "";
//$genre = $_POST['genre'] ?? "";
//$price = $_POST['price'] ?? "";
//$description = $_POST['description'] ?? "";
//$method = $_SERVER['REQUEST_METHOD'];
error_reporting(E_ALL );
ini_set('display_errors', 1);
global $conn;
require 'config.php';
$id = $_GET["id"];
echo $id;
$detail = "select * from books where id = ?";
$stm = $conn->prepare($detail);
$stm->bind_param("i", $id);
$stm->execute();
echo $stm->execute();

$result = $stm->get_result();
$book = $result->fetch_assoc();



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>

<body>
<h1 style="text-align: center">Thêm mới sách</h1>
<form method="POST">
    <label>Tiêu đề: <input type="text" value="<?php $book['title'] ?>" name="title"></label>
    <br>
    <label>Tác giả: <input type="text" value="<?php $book['author'] ?> " name="author"></label>
    <br>
    <label>Năm xuất bản: <input type="number" value="<?php $book['published_year'] ?>" name="published_year"></label>
    <br>
    <label>Giá: <input type="number" step="0.01" value="<?php $book['price'] ?>" name="price"></label>
    <br>
    <label>Thể loại: <input type="text" name="genre" value="<?php $book['genre'] ?>"></label>
    <br>
    <label>Mô tả: <textarea name="description" <?php $book['description'] ?>></textarea></label>
    <br>
    <button type="submit">Thêm</button>
</form>
</body>

</html>