<?php

//Viết một hàm trong PHP nhận vào một chuỗi họ tên (ví dụ: "Nguyen Van A") và trả về một địa chỉ email được tạo tự động theo quy tắc sau:
//Lấy tên (phần cuối của họ tên) làm phần chính của email.
//Lấy chữ cái đầu của họ và các phần còn lại (trừ tên) để thêm vào trước tên, viết liền không dấu.
//Địa chỉ email có định dạng: [kết quả]@aptechlearning.edu.vn.
//Chuỗi đầu vào cần được xử lý: loại bỏ dấu tiếng Việt, chuyển thành chữ thường, không có khoảng trắng trong phần tên email.

// Nguyen Thuy Hang
// hang.nt@aptechlearning.edu.vn

$name = "      Nguyen Van Thuy Linh     ";
$nameTrim = trim($name); // Nguyen Thuy Hang
// Muon cat 1 chuoi thanh 1 mang gom nhieu phan tu:
// split
// Cat mang thanh tu theo dieu kien: explode
$names = explode(" ",$nameTrim);
// 3 phan tu : Nguyen, Thuy, Hang
echo "<pre>";
var_dump($names);
echo "</pre>";

// B1: Lay ra phan tu cuoi cung
//echo $names[count($names)-1];
// array_pod
//echo array_pop($names);
$result = array_pop($names).".";
for($i = 0 ; $i < count($names) ; $i++){
    $result .= substr($names[$i],0,1);
}
echo strtolower($result)."@aptechlearning.edu.vn";
