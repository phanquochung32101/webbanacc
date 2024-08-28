<?php
session_start();

require_once '../connectdb.php'; // Kết nối với cơ sở dữ liệu bằng PDO
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
$username = $loggedIn ? $_SESSION['login_user'] : '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy giá trị từ form
    $so_tuong = $_POST['so_tuong'];
    $so_skin = $_POST['so_skin'];
    $rank = $_POST['rank'];
    $ghi_chu = $_POST['ghi_chu'];
    $gia = $_POST['gia'];
    $url = $_POST['url'];
    $thongtin = $_POST['thongtin'];
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];

    try {
        // Chuẩn bị câu truy vấn với các placeholder
        $sql = "INSERT INTO accounts (so_tuong, so_skin, rank, ghi_chu, gia, url, thongtin, taikhoan, matkhau) 
                VALUES (:so_tuong, :so_skin, :rank, :ghi_chu, :gia, :url, :thongtin, :taikhoan, :matkhau)";

        // Chuẩn bị câu truy vấn PDO
        $stmt = $conn->prepare($sql);

        // Gán giá trị cho các placeholder
        $stmt->bindParam(':so_tuong', $so_tuong);
        $stmt->bindParam(':so_skin', $so_skin);
        $stmt->bindParam(':rank', $rank);
        $stmt->bindParam(':ghi_chu', $ghi_chu);
        $stmt->bindParam(':gia', $gia);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':thongtin', $thongtin);
        $stmt->bindParam(':taikhoan', $taikhoan);
        $stmt->bindParam(':matkhau', $matkhau);

        // Thực thi câu truy vấn
        if ($stmt->execute()) {
            echo "New account created successfully";
        } else {
            echo "Error occurred while creating the account.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Đóng kết nối
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="themtaikhoan.css" />
    <title>Thêm tài khoản</title>
    <link rel="shortcut icon" href="../web/img/logo.jpg" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>
<header>
      <div class="header1">
        <div class="logo1">
          <img style="width:60px;height:45px;" src="../web/img/logo.jpg" alt="Logo" /> 
        </div>
        <div class="bar1">
          <i class="fa-solid fa-bars"></i>
          <i class="fa-solid fa-xmark" id="hdcross"></i>
        </div>
        <div class="nav1">
          <ul>
            <li><a id="lop_a_menu_quanliacc" href="../web/index.php">Trang chủ</a></li>
            <li><a id="lop_a_menu_quanliacc" href="../web/about.php"">Giới thiệu</a></li>
            <li><a id="lop_a_menu_quanliacc" href="../menu/menu.php"">Danh sách</a></li>
            <li><a id="lop_a_menu_quanliacc" href="../web/support.php"">Hỗ trợ</a></li>
          </ul>
        </div>
        <div class="account1">
          <ul>
            <li><a href="index.php"><i class="fa-solid fa-house-chimney"></i></a></li>
            <li id="user-menu">
                <i class="fa-solid fa-user" id="user-lap"></i>
                <ul id="auth-menu">
                    <?php if ($loggedIn): ?>
                        <li id="user-info"><a href="../login/lichsu.php">Xin chào, <?= htmlspecialchars($username); ?></a></li>
                        <li id="logout"><a href="../login/logout.php">Đăng xuất</a></li>
                    <?php else: ?>
                        <li id="login"><a href="../login/login.php">Đăng nhập</a></li>
                        <li id="register"><a href="../login/register.php">Đăng ký</a></li>
                    <?php endif; ?>
                </ul>
            </li>
          </ul>
        </div>
      </div>
    </header>
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
        <label>Mật Khẩu:</label><input type="text" name="matkhau" required><br>
        <input type="submit" value="Add Account">
    </form>
    <a href="quanliaccounts.php">Quay lại danh sách tài khoản</a>

    <script src="../web/app.js"></script>

</body>
</html>
