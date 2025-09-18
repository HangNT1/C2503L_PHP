<?php
$toan = $_POST['toan'] ?? '';
$ly = $_POST['ly'] ?? '';
$hoa = $_POST['hoa'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];
$err = '';
$xepLoai ='';
$tb= null;
if($method == 'POST'){
    $a=filter_var($toan, FILTER_VALIDATE_FLOAT); // Kiem tra xem co dung la so float khong
    $b=filter_var($ly, FILTER_VALIDATE_FLOAT); // Kiem tra xem co dung la so float khong
    $c=filter_var($hoa, FILTER_VALIDATE_FLOAT); // Kiem tra xem co dung la so float khong
    if(!$a || !$b || !$c){
        $err = "Vui long nhap dung dinh dang so thuc";
    }else{
        $tb = round(($a+$b+$c)/3,2);
        if($tb >=9 && $tb <=10){
            $xepLoai = 'Xuat sac';
        }else if($tb >=8 && $tb <9){
            $xepLoai = 'Gioi';
        }else if($tb >=7 && $tb < 8){
            $xepLoai = 'Kha';
        }else if($tb >=6 && $tb < 7){
            $xepLoai = 'TB kha';
        }else if($tb >=5 && $tb < 6){
            $xepLoai = 'TB ';
        }else{
            $xepLoai = 'Yeu';
        }
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
<form action=""method="post">
    <label>Toan</label>
    <input type="number" name="toan" value="<?=htmlspecialchars($toan)?>"><br>
    <label>Ly</label>
    <input type="number" name="ly" value="<?=htmlspecialchars($ly)?>"><br>
    <label>Hoa</label>
    <input type="number" name="hoa" value="<?=htmlspecialchars($hoa)?>"><br>
    <button type="submit">Submit</button>
</form>
<?php
if($err){
    echo "<p style='color:red'>$err</p>";
}else{
    echo "<h2 style='color:blue'>$tb - $xepLoai
</h2>";
}
?>
</body>
</html>
