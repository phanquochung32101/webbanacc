<?php
include('db.php');

$sql = "SELECT * FROM accounts";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Accounts</title>
</head>
<body>
    <h1>Danh sách tài khoản</h1>
    <a href="add_account.php">Thêm tài khoản mới</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Số Tướng</th>
            <th>Số Skin</th>
            <th>Rank</th>
            <th>Ghi Chú</th>
            <th>Giá</th>
            <th>URL</th>
            <th>Thông Tin</th>
            <th>Tài Khoản</th>
            <th>Mật Khẩu</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['so_tuong']; ?></td>
                <td><?php echo $row['so_skin']; ?></td>
                <td><?php echo $row['rank']; ?></td>
                <td><?php echo $row['ghi_chu']; ?></td>
                <td><?php echo $row['gia']; ?></td>
                <td><?php echo $row['url']; ?></td>
                <td><?php echo $row['thongtin']; ?></td>
                <td><?php echo $row['taikhoan']; ?></td>
                <td><?php echo $row['matkhau']; ?></td>
                <td>
                    <a href="edit_account.php?id=<?php echo $row['id']; ?>">chỉnh sửa</a>
                    <a href="delete_account.php?id=<?php echo $row['id']; ?>">xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
