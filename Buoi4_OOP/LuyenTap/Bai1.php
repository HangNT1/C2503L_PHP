<?php
// B1: Khai bao het toan bo cac bien co trong form
// input => bat buoc phai co name
$name = $_POST["name"] ?? '';
$mail = $_POST["email"] ?? '';
$uname = $_POST["username"] ?? '';
$pass = $_POST["password"] ?? '';
$cfPass = $_POST["cfPass"] ?? '';
$errors = []; // Mang chua cac loi
$method = $_SERVER['REQUEST_METHOD'];
// B2: Kiem tra check dieu kien theo de bai
// Không được để trống.
// Email đúng định dạng.
// Password ≥ 6 ký tự và trùng nhau.
// Check co thuc su dung method hay khong
if($method === "POST"){
    // Validate
    // 1. Check trong
    if($name === ''){
        $errors['name'] = 'Tên không để trống';
    }
    if($mail === ''){
        $errors['email'] = 'Email không được để trống';
    }
    if($uname === ''){
        $errors['username'] = 'Username không được để trống';
    }
    if($pass === ''){
        $errors['password'] = 'Password không được để trống';
    }
    if($cfPass === ''){
        $errors['cfPass'] = 'Confirm password không được để trống';
    }
    // 2. Check password
    if($pass !== $cfPass){
        $errors['password'] = 'Password && Cf Password không trùng nhau';
    }
    if(strlen($pass) < 6 && strlen($pass) > 0){
        $errors['password'] = 'Password phải ít nhất 6 kí tự';
    }
    // 3. Check dinh dang email
    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email không đúng định dạng';
    }
    // Neu dang ky thanh cong
    if(!$errors){
        // dang ky thanh cong
        echo "<h1>Dang ky thanh cong</h1>";
        echo "Ho ten la: ".htmlspecialchars($name);
        echo "Email la: ".htmlspecialchars($mail);
        echo "UName la: ".htmlspecialchars($uname);
    }
}
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
<!--Get: Lay hien thi => k can che giau thong tin
-- Post: Xu ly form, Che giau thong tin
-->
<!--Form gồm: Họ tên, Email, Username, Password, Xác nhận Password.-->
<form action="" method="post">
    <label for="">Ho ten: </label>
    <input type="text" name="name" id="" value="<?= htmlspecialchars($name) ?>">
    <span style="color: red">
        <?=$errors['name'] ?? ''?>
    </span>
    <br><br>
    <label for="">Email: </label>
    <input type="text" name="email" value="<?= htmlspecialchars($mail) ?>">
    <span style="color: red">
        <?=$errors['email'] ?? ''?>
    </span><br><br>
    <label for="">Username: </label>
    <input type="text" name="username" value="<?= htmlspecialchars($uname) ?>">
    <span style="color: red">
        <?=$errors['username'] ?? ''?>
    </span><br><br>
    <label for="">Password: </label>
    <input type="password" name="password">
    <span style="color: red">
        <?=$errors['password'] ?? ''?>
    </span><br><br>
    <label for="">Xac nhan Password: </label>
    <input type="password" name="cfPass">
    <span style="color: red">
        <?=$errors['cfPass'] ?? ''?>
    </span><br><br>
    <button type="submit">Submit</button>
</form>
</body>
</html>