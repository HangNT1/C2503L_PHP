<?php
    global $connect;
    require_once "config.php";
    $error =[];
    $title = $_POST['title'] ?? "";
    $author = $_POST['author'] ?? "";
    $published_year = $_POST['published_year'] ?? "";
    $genre= $_POST['genre'] ?? "";
    $price = $_POST['price'] ?? "";
    $description = $_POST['description'] ?? "";
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == "POST") {
        if($title == "" || $author == "" || $published_year == "" || $genre == "" || $price == "") {
            $error['error']="Khong duoc de trong du lieu";
        }
        if(empty($error)) {
            // insert
            $sql = "INSERT INTO `books`
        (`title`, `author`, `published_year`, `price`, `genre`, `description`, `created_at`, `updated_at`) 
                VALUES (?,?,?,?,?,?,NOW(),NOW())
            ";
            $stmt = $connect->prepare($sql);
            $stmt -> bind_param("sssdss",$title,$author,$published_year,$price,$genre,$description);
            if($stmt->execute()){ // success
                // add xong quay ve trang index.php
                header("Location:index.php");
            }else{
                echo "Add that bai";
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
<h1 style="text-align: center">Thêm mới sách</h1>
<form method="POST">
    <label>Tiêu đề: <input type="text" name="title" ></label>
    <span style="color:red"><?=$error['error'] ??'' ?></span>
    <br>
    <label>Tác giả: <input type="text" name="author" ></label>
    <span style="color:red"><?=$error['error'] ??'' ?></span>
    <br>
    <label>Năm xuất bản: <input type="number" name="published_year" ></label>
    <span style="color:red"><?=$error['error'] ??'' ?></span>
    <br>
    <label>Giá: <input type="number" step="0.01" name="price" ></label>
    <span style="color:red"><?=$error['error'] ??'' ?></span>
    <br>
    <label>Thể loại: <input type="text" name="genre"></label>
    <span style="color:red"><?=$error['error'] ??'' ?></span>
    <br>
    <label>Mô tả: <textarea name="description"></textarea></label>
    <span style="color:red"><?=$error['error'] ??'' ?></span>
    <br>
    <button type="submit">Thêm</button>
</form>
</body>
</html>
