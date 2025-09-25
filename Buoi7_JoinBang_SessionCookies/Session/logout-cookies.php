<?php
setcookie("username", "", time() - 3600); // CHI CAN THOI GIAN AM LA TU DONG HUY
header("location:index.php");
exit();