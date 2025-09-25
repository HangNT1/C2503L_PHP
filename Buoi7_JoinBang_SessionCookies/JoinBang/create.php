<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name    = $_POST['full_name'] ?? '';
    $email        = $_POST['email'] ?? null;
    $hire_date    = $_POST['hire_date'] ?: null;
    $department_id= (int)($_POST['department_id'] ?? 0);

    $stmt = $conn->prepare("INSERT INTO employees(full_name, email, hire_date, department_id) VALUES (?,?,?,?)");
    $stmt->bind_param("sssi", $full_name, $email, $hire_date, $department_id);
    if ($stmt->execute()) {
        header('Location: index.php'); exit;
    } else {
        $err = "Lỗi: " . e($stmt->error);
    }
}

$deps = $conn->query("SELECT id, name FROM departments ORDER BY name");
?>
<!doctype html><html><head><meta charset="utf-8"><title>Thêm nhân viên</title></head>
<body>
<h2>Thêm nhân viên</h2>
<?php if(!empty($err)) echo "<p style='color:red'>$err</p>"; ?>
<form method="post">
    Họ tên: <input name="full_name" required><br>
    Email: <input name="email" type="email"><br>
    Ngày vào: <input name="hire_date" type="date"><br>
    Phòng ban:
    <select name="department_id" required>
        <?php while($d = $deps->fetch_assoc()): ?>
            <option value="<?= e($d['id']) ?>"><?= e($d['name']) ?></option>
        <?php endwhile; ?>
    </select><br><br>
    <button type="submit">Lưu</button> |
    <a href="index.php">Hủy</a>
</form>
</body></html>
