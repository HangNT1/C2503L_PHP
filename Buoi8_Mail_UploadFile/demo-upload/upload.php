<?php
$target_dir = "uploads/"; // Thư mục lưu ảnh
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Kiểm tra xem có đúng là ảnh không
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File là ảnh - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File không phải ảnh.<br>";
        $uploadOk = 0;
    }
}

// Kiểm tra dung lượng (tối đa 2MB)
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "File quá lớn.<br>";
    $uploadOk = 0;
}

// Giới hạn định dạng ảnh
$allowed = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowed)) {
    echo "Chỉ cho phép JPG, JPEG, PNG & GIF.<br>";
    $uploadOk = 0;
}

// Kiểm tra và demo-upload
if ($uploadOk == 0) {
    echo "Xin lỗi, file không được demo-upload.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được demo-upload.";
        echo "<br><img src='$target_file' width='200'>";
    } else {
        echo "Có lỗi xảy ra khi demo-upload file.";
    }
}
?>
