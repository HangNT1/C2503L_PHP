<?php
require 'config.php';

$sql = "SELECT e.id, e.full_name, e.email, e.hire_date, d.name AS dept_name
        FROM employees e
        JOIN departments d ON e.department_id = d.id
        ORDER BY e.id DESC";
$res = $conn->query($sql);
?>
<!doctype html><html><head><meta charset="utf-8"><title>Employees</title></head>
<body>
<h2>Danh sách nhân viên</h2>
<p><a href="create.php">+ Thêm nhân viên</a></p>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th><th>Họ tên</th><th>Email</th><th>Ngày vào</th><th>Phòng ban</th><th>Hành động</th>
    </tr>
    <?php while($r = $res->fetch_assoc()): ?>
        <tr>
            <td><?= e($r['id']) ?></td>
            <td><?= e($r['full_name']) ?></td>
            <td><?= e($r['email']) ?></td>
            <td><?= e($r['hire_date']) ?></td>
            <td><?= e($r['dept_name']) ?></td>
            <td>
                <a href="update.php?id=<?= e($r['id']) ?>">Sửa</a> |
                <a href="delete.php?id=<?= e($r['id']) ?>" onclick="return confirm('Xóa nhân viên này?')">Xóa</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body></html>
