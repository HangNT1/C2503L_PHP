<?php
global $connect;
require_once "config.php";

// B1: Lay gia tri cua bien tren duong dan
$id = $_GET['id1'];
$sql = "DELETE FROM `books` WHERE id = ?";
$stmt = $connect->prepare($sql);
$stmt -> bind_param("i",$id);
if($stmt->execute()){ // success
    // xoa xong quay ve trang index.php
    header("Location:index.php");
}else{
    echo "Xoa that bai";
}
