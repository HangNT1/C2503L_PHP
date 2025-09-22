<?php
global $connect; // goi bien trong migrate
require_once "migrate.php";
// Check trong
$method = $_SERVER['REQUEST_METHOD'];
$uname = $_POST["uname"] ?? '';
$password = $_POST["pwd"] ?? '';
$errors = [];

if($method == 'POST'){
    if(empty($uname)){
        $errors['username'] = "Username is required";
    }
    if(empty($password)){
        $errors['password'] = "Password is required";
    }
    // Khi error rong thi moi dang ky vao DB
//    if(empty($errors)){
//        // B1: Goi lenh
//        $sql = "SELECT * FROM users
//                WHERE username = '$uname' AND password = '$password'";
//        $result = $connect->query($sql);
//        if($result->num_rows > 0){
//            echo "Đăng nhập thành công";
//        }else{
//            echo "Đăng nhập thất bại";
//        }
//    }
    // Fix SQL Injection
    if(empty($errors)){
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $connect->prepare($sql);
        // Truyền giá trị cho dấu ?
        // username => varchar/nvarchar
        //pass =>  varchar/nvarchar
        // THS1:
        // i => integer (so nguyen : int, bigint)
        // d => double (Float/Double)
        // s => String (varchar/nvarchar/Date/Datetime..)
        // b => du lieu nhi phan

        $stmt -> bind_param("ss",$uname,$password);
        $stmt -> execute();
        $result = $stmt->get_result();
        if($result->num_rows >0){
            echo "Đăng nhập thành công";
        }else{
            echo "Đăng nhập thất bại";
        }
        $stmt ->close();
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
<form method="POST">
    <label for="name">Username:</label>
    <input type="text" id="name" name="uname" value="<?=htmlspecialchars($uname)?>">
    <span style="color: red"><?=$errors['username'] ?? ''?></span>
    <br><br>
    <label for="pwd">Password:</label>
    <input type="password" id="pwd" name="pwd" value="<?=htmlspecialchars($password)?>">
    <span style="color: red"><?=$errors['password'] ?? ''?></span>
    <br><br>
    <input type="submit" value="Login"><br><br>
</form>
<p>Nếu bạn chưa có tài khoản hãy <a href="register.php">click vào đây</a></p>
</body>
</html>