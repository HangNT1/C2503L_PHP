<?php
require 'config.php';
$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) { header('Location: index.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'] ?? '';
    $email     = $_POST['email'] ?? null;
    $hire_date = $_POST['hire_date'] ?: null;
    $department_id = (int)($_POST['department_id'] ?? 0);

    $stmt = $conn->prepare("UPDATE employees SET full_name=?, email=?, hire_date=?, department_id=? WHERE id=?");
    $stmt->bind_param("sssii", $full_name, $email, $hire_date, $department_id, $id);
    if ($stmt->execute()) {
        header('Location: index.php'); exit;
    } else {
        $err = "Lỗi: " . e($stmt->error);
    }
}

$stmt = $conn->prepare("SELECT id, full_name, email, hire_date, department_id FROM employees WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$emp = $stmt->get_result()->fetch_assoc();
if (!$emp) { header('Location: index.php'); exit; }
$deps = $conn->query("SELECT id, name FROM departments ORDER BY name");
?>
<!doctype html><html><head><meta charset="utf-8"><title>Sửa nhân viên</title></head>
<body>
<h2>Sửa nhân viên</h2>
<?php if(!empty($err)) echo "<p style='color:red'>$err</p>"; ?>
<form method="post">
    Họ tên: <input name="full_name" value="<?= e($emp['full_name']) ?>" required><br>
    Email: <input name="email" type="email" value="<?= e($emp['email']) ?>"><br>
    Ngày vào: <input name="hire_date" type="date" value="<?= e($emp['hire_date']) ?>"><br>
    Phòng ban:
    <select name="department_id" required>
        <?php while($d = $deps->fetch_assoc()): ?>
            <option value="<?= e($d['id']) ?>" <?= ($d['id']==$emp['department_id'])?'selected':'' ?>>
                <?= e($d['name']) ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>
    <button type="submit">Cập nhật</button> |
    <a href="index.php">Quay lại</a>
</form>
</body></html>
