<?php
global $connect; // goi bien trong migrate
require_once "migrate.php";
// Check trong
$method = $_SERVER['REQUEST_METHOD'];
$uname = $_POST["uname"] ?? '';
$password = $_POST["pwd"] ?? '';
$email = $_POST["email"] ?? '';
$errors = [];

if($method == 'POST'){
    if(empty($uname)){
        $errors['username'] = "Username is required";
    }
    if(empty($password)){
        $errors['password'] = "Password is required";
    }
    if(empty($email)){
        $errors['email'] = "Email is required";
    }
    // Khi error rong thi moi dang ky vao DB
    if(empty($errors)){
        $pass_hash =md5($password);
        $sql = "INSERT INTO users (username, password, email) 
                VALUES ('$uname', '$pass_hash', '$email')";
        $result = $connect->query($sql);
        if(!$result){
            echo "Đăng ký thất bại";
        }else{
            echo "Đăng ký thành công";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    <label for="name">Username:</label>
    <input type="text" id="name" name="uname" value="<?=htmlspecialchars($uname)?>">
    <span style="color: red"><?=$errors['username'] ?? ''?></span>
    <br><br>
    <label for="pwd">Password:</label>
    <input type="password" id="pwd" name="pwd" value="<?=htmlspecialchars($password)?>">
    <span style="color: red"><?=$errors['password'] ?? ''?></span>
    <br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?=htmlspecialchars($email)?>">
    <span style="color: red"><?=$errors['email'] ?? ''?></span>
    <br><br>
    <input type="submit" value="Register"><br><br>
</form>
<p>Nếu bạn đã  có tài khoản rồi <a href="index.php">click vào đây</a></p>

</body>
</html>