<?php
session_start();
require_once '../connectdb.php';
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
$username = $loggedIn ? $_SESSION['login_user'] : '';

 // Kết nối đến cơ sở dữ liệu bằng PDO

try {
    // Thực hiện truy vấn để lấy tất cả các vấn đề từ bảng support
    $query = "SELECT * FROM support ORDER BY ngaythanhtoan DESC";
    $stmt = $conn->prepare($query); // Chuẩn bị truy vấn
    $stmt->execute(); // Thực thi truy vấn
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả kết quả dưới dạng mảng kết hợp
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
    exit;
}

if (isset($_GET['delete'])) {
    $id_support = $_GET['delete'];
    try {
        $stmt = $conn->prepare("DELETE FROM support WHERE id_support = :id_support");
        $stmt->bindParam(':id_support', $id_support);
        $stmt->execute();
        echo '<script>alert("Xóa thành công")</script>';
        echo "<script>window.location.href = 'quanlihotro.php';</script>";
        exit();
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản trị hỗ trợ</title>
    <link rel="stylesheet" href="quanlihotro.css" />
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
        <h2>Tất cả vấn đề</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Tài khoản</th>
                <th>Vấn đề</th>
                <th>Ngày thanh toán</th>
                <th>Số tiền</th>
                <th>ID tài khoản đã mua</th>
                <th>Email</th>
                <th>Thao tác</th>
            </tr>
            <?php if (count($result) > 0): ?>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id_support']); ?></td>
                        <td><?php echo htmlspecialchars($row['user_custom']); ?></td>
                        <td><?php echo htmlspecialchars($row['vande']); ?></td>
                        <td><?php echo htmlspecialchars($row['ngaythanhtoan']); ?></td>
                        <td><?php echo htmlspecialchars($row['sotien']); ?></td>
                        <td><?php echo htmlspecialchars($row['id_accdamua']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>

                        <td>
                            <a id='the_a_donhang' href="quanlihotro.php?delete=<?php echo htmlspecialchars($row['id_support']); ?>">Xử lý</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không tìm thấy vấn đề</td>
                </tr>
            <?php endif; ?>
        </table>
    </main>
    <script src="../web/app.js"></script>
</body>
</html>

<?php
$conn = null; // Đóng kết nối cơ sở dữ liệu
?>
