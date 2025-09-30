<?php
require_once 'config.php';
// -> Nạp cấu hình DB và tạo kết nối $mysqli để dùng truy vấn.
//   Nếu thiếu dòng này, các lệnh $mysqli->prepare(), ->query() sẽ báo lỗi biến không tồn tại.

// -------------------- XỬ LÝ SUBMIT --------------------
$msg = ''; // biến chứa thông báo trả ra giao diện (thành công/ lỗi)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Chỉ xử lý khi form gửi bằng POST (bấm nút Lưu). F5/GET sẽ không vào khối này.

    // Lấy dữ liệu text. Theo yêu cầu: không validate ràng buộc "mã" hay "tên" ở server nữa.
    $ma  = trim($_POST['ma'] ?? '');   // vẫn đọc để lưu DB
    $ten = trim($_POST['ten'] ?? '');  // vẫn đọc để lưu DB

    // 1) Xác định thư mục đích để chứa ảnh upload:
    $uploadDir = __DIR__ . '/uploads/';
    // __DIR__ = đường dẫn tuyệt đối tới THƯ MỤC chứa file PHP hiện tại (index.php).
    // Ví dụ: /Applications/XAMPP/xamppfiles/htdocs/php_project/demo-upload
    // => $uploadDir = /Applications/.../demo-upload/uploads/
    // Ưu điểm: luôn đúng tuyệt đối, không phụ thuộc chỗ bạn gọi file.

    // 2) Tạo thư mục nếu chưa có
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
        // 0775: owner+group ghi/đọc/thực thi; others đọc/thực thi.
        // 'true' cho phép tạo đệ quy nếu thiếu thư mục cha (ít dùng ở đây).
    }

    // 3) Lấy thông tin file từ input name="anh"
    $fileInput = $_FILES['anh'] ?? null;
    // $_FILES['anh'] là mảng gồm: name, type, tmp_name, error, size
    // - tmp_name: đường dẫn file tạm do PHP tạo.
    // - error: mã lỗi upload (0 là OK).

    $filenameOnServer = null; // sẽ lưu tên file thật sau khi move()

    // 4) Chỉ xử lý nếu người dùng có chọn file
    if ($fileInput && $fileInput['error'] !== UPLOAD_ERR_NO_FILE) {

        // 4.1) Nếu có lỗi từ tầng upload của PHP (thiếu tmp dir, vượt post_max_size, v.v.)
        if ($fileInput['error'] !== UPLOAD_ERR_OK) {
            $msg = 'Lỗi upload ảnh (code ' . $fileInput['error'] . ').';

        } else {
            // 4.2) Kiểm tra file có phải ảnh thật không (anti fake)
            $check = getimagesize($fileInput['tmp_name']);
            // getimagesize trả về mảng thông tin ảnh (width, height, type, mime ...)
            // Nếu trả về false => KHÔNG phải ảnh/ file hỏng.

            if ($check === false) {
                $msg = 'File không phải ảnh.';

            } else {
//                // Sinh tên file an toàn để lưu trên server
//                $ext = strtolower(pathinfo($fileInput['name'], PATHINFO_EXTENSION));
//                $safeName = preg_replace('/[^A-Za-z0-9\-_\.]/', '_', pathinfo($fileInput['name'], PATHINFO_FILENAME));
//                $filenameOnServer = $safeName . '_' . time() . '.' . $ext;
//
//// Đường dẫn đích tuyệt đối
//                $destination = $uploadDir . $filenameOnServer;
//
//// Di chuyển file từ thư mục tạm sang thư mục uploads
//                if (!move_uploaded_file($fileInput['tmp_name'], $destination)) {
//                    $msg = 'Không thể lưu ảnh lên server.';
//                }
                // Lấy extension gốc
                // Lấy phần đuôi (extension) của file người dùng upload và chuẩn hóa về chữ thường, để dùng đặt tên file mới khi lưu trên server.
                $ext = strtolower(pathinfo($fileInput['name'], PATHINFO_EXTENSION));

            // Đếm số bản ghi hiện có trong DB để tạo số thứ tự tiếp theo
                $resCount = $mysqli->query("SELECT COUNT(*) AS total FROM nguoi_dung");
                $total = $resCount->fetch_assoc()['total'];
                $nextId = $total + 1;

            // Đặt tên file dạng anh_1.jpg, anh_2.png, ...
                $filenameOnServer = 'anh_' . $nextId . '.' . $ext;

            // Đường dẫn đích
                $destination = $uploadDir . $filenameOnServer;

                // Di chuyển file
                if (!move_uploaded_file($fileInput['tmp_name'], $destination)) {
                    $msg = 'Không thể lưu ảnh lên server.';
                }

            }
        }
    }

    // 5) Nếu không có lỗi -> Lưu DB
    if ($msg === '') {
        // Dùng prepared statement (an toàn SQL injection)
        $stmt = $mysqli->prepare("INSERT INTO nguoi_dung (ma, ten, anh) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param('sss', $ma, $ten, $filenameOnServer);
            if ($stmt->execute()) {
                $msg = 'Đăng ký thành công.';
            } else {
                // Vì đã bỏ validate "mã" trùng ở server, nếu cột 'ma' UNIQUE thì DB sẽ ném lỗi duplicate tại đây.
                // Bạn sẽ thấy "Lỗi DB: Duplicate entry ..." -> đây là hành vi mong đợi trong phiên bản rút gọn.
                $msg = 'Lỗi DB: ' . $stmt->error;
            }
            $stmt->close();
        } else {
            $msg = 'Lỗi prepare: ' . $mysqli->error;
        }
    }
}

// -------------------- LẤY DANH SÁCH --------------------
$res = $mysqli->query("SELECT * FROM nguoi_dung ORDER BY id DESC");
// -> Lấy tất cả người dùng, bản mới nhất trước (ORDER BY id DESC)
$users = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
// -> Nếu query thành công, lấy về mảng kết quả (mỗi phần tử là 1 bản ghi)
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <title>Upload ảnh + Hiển thị danh sách</title>
    <!-- CSS tối giản cho nhanh: -->
</head>
<body>
<h1>Đăng ký người dùng</h1>

<?php if ($msg): ?>
    <div><?= htmlspecialchars($msg) ?></div>
    <!-- htmlspecialchars: chống XSS nếu $msg có ký tự đặc biệt -->
<?php endif; ?>

<!-- Form: BẮT BUỘC có enctype="multipart/form-data" để browser gửi file đúng chuẩn -->
<form method="post" enctype="multipart/form-data">
    <input type="text" name="ma" placeholder="Mã" required>
    <!-- 'required' chỉ check ở phía trình duyệt (client). Server không chặn nếu bị bypass. -->
    <input type="text" name="ten" placeholder="Tên" required>
    <input type="file" name="anh" accept="image/*">
    <!-- accept="image/*" chỉ gợi ý filter trên UI, không phải kiểm tra bảo mật -->
    <button type="submit">Lưu</button>
</form>

<h2>Danh sách</h2>
<table border="1" cellpadding="6">
    <tr><th>#</th><th>Mã</th><th>Tên</th><th>Ảnh</th><th>Ngày tạo</th></tr>
    <?php if (!$users): ?>
        <tr><td colspan="5">Chưa có dữ liệu</td></tr>
    <?php else: ?>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= htmlspecialchars($u['ma']) ?></td>
                <td><?= htmlspecialchars($u['ten']) ?></td>
                <td>
                    <?php if ($u['anh']): ?>
                        <!-- Khi hiển thị, dùng đường dẫn TƯƠNG ĐỐI cho <img src> -->
                        <img src="uploads/<?= htmlspecialchars($u['anh']) ?>" width="80" alt="ảnh">
                    <?php else: ?>
                        Không có ảnh
                    <?php endif; ?>
                </td>
                <td><?= $u['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
</body>
</html>
