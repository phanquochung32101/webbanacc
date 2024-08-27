<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $so_tuong = $_POST['so_tuong'];
    $so_skin = $_POST['so_skin'];
    $rank = $_POST['rank'];
    $ghi_chu = $_POST['ghi_chu'];
    $gia = $_POST['gia'];
    $url = $_POST['url'];
    $thongtin = $_POST['thongtin'];
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];

    $sql = "INSERT INTO accounts (so_tuong, so_skin, rank, ghi_chu, gia, url, thongtin, taikhoan, matkhau) 
            VALUES ('$so_tuong', '$so_skin', '$rank', '$ghi_chu', '$gia', '$url', '$thongtin', '$taikhoan', '$matkhau')";

    if ($conn->query($sql) === TRUE) {
        echo "New account created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Account</title>
</head>
<body>
    <h1>Thêm tài khoản mới</h1>
    <form method="POST" action="">
        <label>Số Tướng:</label><input type="text" name="so_tuong" required><br>
        <label>Số Skin:</label><input type="text" name="so_skin" required><br>
        <label>Rank:</label><input type="text" name="rank" required><br>
        <label>Ghi Chú:</label><textarea name="ghi_chu"></textarea><br>
        <label>Giá:</label><input type="text" name="gia" required><br>
        <label>URL:</label><input type="text" name="url" required><br>
        <label>Thông Tin:</label><input type="text" name="thongtin" required><br>
        <label>Tài Khoản:</label><input type="text" name="taikhoan" required><br>
        <label>Mật Khẩu:</label><input type="password" name="matkhau" required><br>
        <input type="submit" value="Add Account">
    </form>
    <a href="manage_accounts.php">Quay lại danh sách tài khoản</a>
</body>
</html>
