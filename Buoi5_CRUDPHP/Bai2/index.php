<?php
global $connect;
require_once "config.php";
// Lay toan bo danh sach cua bang books => SELECT
$sql = "SELECT * FROM `books` ORDER BY created_at";
$result = $connect -> query($sql); // dang chua du lieu tra ra
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1 style="text-align: center">Màn hình quản lý sách</h1>
<a href="create.php">Thêm mới sách</a>
<table border="1" cellpadding="3" cellspacing="3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Tác giả</th>
            <th>Năm xuất bản</th>
            <th>Giá</th>
            <th>Thể loại</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
    <!--    C1: Tách thanh php 2 lan-->
    <!--    C2: Su dung endwhile   -->
    <?php while($row = $result ->fetch_assoc()) : ?>
        <tr>
             <td><?=$row['id']?></td>
             <td><?=$row['title']?></td>
             <td><?=$row['author']?></td>
             <td><?=$row['published_year']?></td>
             <td><?=$row['price']?></td>
             <td><?=$row['genre']?></td>
             <td><?=$row['description']?></td>
             <td>
                 <a href="update.php?id=<?=$row['id']?>">Sửa</a>
                 <a href="test.php?id=<?=$row['id']?>">Sửa</a>
                 <a href="delete.php?id1=<?=$row['id']?>">Xoá</a>
             </td>
        </tr>
    <?php endwhile ;?>
    </tbody>
</table>
</body>
</html>
