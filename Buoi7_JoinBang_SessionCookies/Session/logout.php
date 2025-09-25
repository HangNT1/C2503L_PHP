<?php
session_start();
//session_destroy(); // XOA HET TOAN BO SESSION
//header("location:index.php");
//exit();
unset($_SESSION['username']); // Xoa lan luot tung session
header("location:index.php");
exit();