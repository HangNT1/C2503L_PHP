<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h1>Test abde</h1>
<p>
    <?php $e = 10; echo $e; ?>
</p>
<?php echo "<p>aaaaaa</p>"?>
</body>
<?php
// Khai bao bien: $tenBien => Bat buoc phai co gia tri khoi tao khi khai bao bien
//int a;
$a = 5;
$b = "Test abc";
$c = true;
$d = 8;
var_dump($b);
echo $a . "<br/>";
//echo "<br/>";
echo $b;
echo PHP_INT_MIN;
echo "<br/>";
echo PHP_INT_MAX;
echo "<br/>";
// true => 1
// false => ""
$test = false;
echo $test;
echo "<br/>";
var_dump($test); // in ra ca kieu du lieu va gia tri => debug
// Ep kieu
// C1: Giong C (De kieu du lieu)
$kieuFloat = (float)$a;
var_dump($kieuFloat);
// C2: $kieuDulieuVal
echo "<br/>";
$bienFloat1 = floatval($a);
var_dump($bienFloat1);
// Kieu tra 1 bien co thuc su la so nguyen/foat/String
$test1 = 1;
$tong = $a + $test1;
echo $tong;
//is_kieuDulieu
if(is_float($tong)){
    print "Day la so thuc";
}else{
    echo "Day k la so thuc";
}
// Khai bao hang so
echo "<br/>";
// C1: const
const PI = 3.14;
echo PI;

// C2: define
define("PI1",3.22);
echo PI1;

?>
</html>
