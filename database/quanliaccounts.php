<?php
session_start();
require_once '../connectdb.php';
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
$username = $loggedIn ? $_SESSION['login_user'] : '';

try {
    // Thực hiện truy vấn để lấy tất cả các tài khoản từ bảng accounts
    $sql = "SELECT * FROM accounts";
    $stmt = $conn->prepare($sql); // Chuẩn bị truy vấn
    $stmt->execute(); // Thực thi truy vấn
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả kết quả dưới dạng mảng kết hợp
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
    exit;
}
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  try {
      $stmt = $conn->prepare("DELETE FROM accounts WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      echo '<script>alert("Xóa thành công")</script>';
      echo "<script>window.location.href = 'quanliaccounts.php';</script>";
  } catch (PDOException $e) {
      echo "Lỗi: " . $e->getMessage();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý tài khoản</title>
    <link rel="stylesheet" href="quanliaccounts.css" />
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

    <main>
        <h1>Danh sách tài khoản</h1>
        <a href="themtaikhoan.php" id="lop_a_quanliacc" class="return-home-btn">Thêm tài khoản mới</a>
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
            <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['so_tuong']); ?></td>
                    <td><?php echo htmlspecialchars($row['so_skin']); ?></td>
                    <td><?php echo htmlspecialchars($row['rank']); ?></td>
                    <td><?php echo htmlspecialchars($row['ghi_chu']); ?></td>
                    <td><?php echo htmlspecialchars($row['gia']); ?></td>
                    <td><?php echo htmlspecialchars($row['url']); ?></td>
                    <td><?php echo htmlspecialchars($row['thongtin']); ?></td>
                    <td><?php echo htmlspecialchars($row['taikhoan']); ?></td>
                    <td><?php echo htmlspecialchars($row['matkhau']); ?></td>
                    <td>
                        <a id="lop_a_quanliacc" href="chinhsuaaccount.php?id=<?php echo htmlspecialchars($row['id']); ?>">Chỉnh sửa</a>
                        <a id="lop_a_quanliacc" href="quanliaccounts.php?delete=<?php echo htmlspecialchars($row['id']); ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>

    <script src="../web/app.js"></script>
</body>
</html>

<?php
$conn = null; // Đóng kết nối cơ sở dữ liệu
?>
