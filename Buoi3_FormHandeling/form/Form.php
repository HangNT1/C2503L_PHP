<?php
include "Helper.php";
// loai biet GET & POST
//dd($_GET);
//dd($_POST);
//dd($_SERVER);
// Lay gia tri cua doi tuong Object
//$name1 = $_GET['name'];
//dd($name1);
//if($name1 === ""){
//    echo "Khong duoc de trong";
//}
$errors =[];
if(isset($_GET['name'])){
    if(htmlspecialchars($_GET['name']) === ""){
//        echo "<span style='color:red'>Khong duoc de trong</span>";
        $errors['name'] = "Name is required";
    }
}
if(isset($_GET['age'])){
    $age = htmlspecialchars($_GET['age']);
    if($age === ""){
//        echo "<span style='color:red'>Khong duoc de trong</span>";
        $errors['age'] = "Age is required";
    }
    if(intval($age) > 18){
//        echo "<span style='color:green'>K duoc phep lon hon 18</span>";
        $errors['age'] = "Age must be 18 or older";
    }
}
//html entity
$str = "<a href='index.html'>Click me</a>";
echo $str;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<!--HTTP Method: Get, Post-->
<!--<form action="http://localhost/C2503L_PHP/Buoi3_FormHandeling/form/index.html"-->
<!--      method="GET"-->
    <form action=""
              method="GET"
        <label>Name</label>
        <input type="text" name="name" id="">
        <?php
//        if(isset($_GET['name'])){
//            if($_GET['name'] === ""){
//                echo "<span style='color:red'>Khong duoc de trong</span>";
//            }
//        }
        if(isset($errors['name'])){
            echo $errors['name'];
        }
        ?>
        <br/><br/>
        <label>Age</label>
        <input type="text" name="age" id="">
        <?php
//            if($_GET['age'] === ""){
//                echo "<span style='color:red'>Khong duoc de trong</span>";
//            }
//            if(intval($_GET['age']) > 18){
//                echo "<span style='color:green'>K duoc phep lon hon 18</span>";
//            }
            if(isset($errors['age'])){
                echo $errors['age'];
            }
        ?>
        <br/><br/>
        <label>Address</label>
        <input type="text" name="address" id=""><br/><br/>
        <label>Subject</label>
        <input type="checkbox" name="subject" id="">PHP
        <input type="checkbox" name="subject" id="">Java
        <input type="checkbox" name="subject" id="">C#
        <br/><br/>
        <input type="submit" value="Submit Form">
    </form>
</body>
</html>
