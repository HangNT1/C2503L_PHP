<?php
error_reporting(E_ALL );
ini_set('display_errors', 1);
// function  phepCong(int $a, int $b) => xac dau phai la 1 so nguyen
function  phepCong( $a,  $b) :float{
//    echo $a;
//    echo "<br/>";
//    echo $b;
    return $a + $b;
}

function  phepTru( $a,  $b) :float{
//    echo $a;
//    echo "<br/>";
//    echo $b;
    return $a - $b;
}

function  phepNhan( $a,  $b) :float{
//    echo $a;
//    echo "<br/>";
//    echo $b;
    return $a * $b;
}

// K ghi gi => rat linh hoat
//var_dump(M_P_);
var_dump( phepCong(3,4));
echo "<br/>";
echo round(phepCong(3.5,5.6),2);
printf("%.1f",phepCong(3.5,5.6));
// 1/3 -> 0.133333
echo "<br/>";
//echo phepCong("a","b"); // dau .
// switch case
// ham de lay ngay gio hien tai
echo "<br/>".date("d/m/Y");
echo "<br/>".date("h:i:sa");
// function

function test1($number = 10, $test = 5.5){
    echo $number/$test;
}
echo "<br/>";
test1(test:3,number:12);
echo "<br/>";
// switch
// cai nay chi PHP co
$bam ="phepTru";
echo $bam(3,5);
//switch($bam){
//    case "phepTru":{
//        echo phepTru(3,4);
//        break;
//    }
//    case "phepNhan":{
//        echo  phepNhan(3,4);
//        break;
//    }
//    case "phepCong":{
//        echo phepCong(3,5);
//        break;
//    }
//    default:{
//        echo "Khong ton tai";
//        break;
//    }
//}