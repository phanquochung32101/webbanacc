<?php
require_once '../connectdb.php';
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
$username = $loggedIn ? $_SESSION['login_user'] : '';

if (empty($username)) {
    die("Người dùng chưa đăng nhập hoặc tên người dùng không hợp lệ.");
}

try {
    // Lấy thông tin người dùng
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $credit = $result['credit'];
        $typeuser = $result['typeuser'];
        $email = $result['email'];
    } else {
        $credit = "Không tìm thấy thông tin";
        $typeuser = null;
    }

    // Lấy lịch sử mua tài khoản
    if ($typeuser === 'admin') {
        // Admin xem toàn bộ lịch sử bán hàng
        $stmt_orders = $conn->prepare("
            SELECT o.orderid, o.username, a.taikhoan, a.matkhau, a.rank, o.credit
            FROM orderacc o
            JOIN accsell a ON o.id_account = a.id_acc
        ");
    } else {
        // User chỉ xem lịch sử của chính mình
        $stmt_orders = $conn->prepare("
            SELECT o.orderid, a.taikhoan, a.matkhau, a.rank, o.credit
            FROM orderacc o
            JOIN accsell a ON o.id_account = a.id_acc
            WHERE o.username = :username
        ");
        $stmt_orders->bindParam(':username', $username, PDO::PARAM_STR);
    }
    $stmt_orders->execute();
    $orders = $stmt_orders->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
    $credit = "Lỗi truy vấn";
    $orders = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="lichsu.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Quản lí tài khoản</title>
</head>
<body>
  <header>
    <div class="header">
      <div class="logo">
        <img style="width:60px;height:45px;" src="../web/img/logo.jpg" alt="" />
      </div>
      <div class="bar">
        <i class="fa-solid fa-bars"></i>
        <i class="fa-solid fa-xmark" id="hdcross"></i>
      </div>
      <div class="nav">
        <ul>
          <a href="../web/index.php"><li>Trang chủ</li></a>
          <a href="../web/about.php"><li>Giới thiệu</li></a>
          <a href="../menu/menu.php"><li>Danh sách</li></a>
          <a href="../web/support.php"><li>Hỗ trợ</li></a>
        </ul>
      </div>
      <div class="account">
        <ul>
          <a href="../web/index.php"><li><i class="fa-solid fa-house-chimney"></i></li></a>
          <a href="#"><li id="user-menu"><i class="fa-solid fa-user" id="user-lap"></i></li></a>
          <ul id="auth-menu">
            <?php if ($loggedIn): ?>
              <li id="user-info"><a href="../login/lichsu.php">Xin chào, <?= htmlspecialchars($username); ?></a></li>
              <li id="logout"><a href="../login/logout.php">Đăng xuất</a></li>
            <?php else: ?>
              <li id="login"><a href="../login/login.php">Đăng nhập</a></li>
              <li id="register"><a href="../login/register.php">Đăng ký</a></li>
            <?php endif; ?>
          </ul>
        </ul>
      </div>
    </div>
  </header>

  <div class="main-container">
    <!-- Thông tin người dùng -->
    <div class="thongtin">
    <h1>Chào mừng, <?php echo htmlspecialchars($username); ?></h1>
    <p><strong>Tên người dùng:</strong> <?php echo htmlspecialchars($username); ?></p>
    <p><strong>Phân loại:</strong> <?php echo htmlspecialchars($typeuser); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Số dư tài khoản:</strong> <?php echo number_format($credit, 0, ',', '.'); ?> VND</p>


      <!-- Menu Admin hoặc User -->
      <?php if ($typeuser === 'admin') : ?>
        <div class="menu-container">
          <h2>Khu vực quản trị viên</h2>
          <!-- Các mục quản lý của admin -->
          <div class="admin-section">
            <h3>Quản lý đơn hàng</h3>
            <a href="../database/quanlidonhang.php" class="admin-link">Truy cập</a>
          </div>
          <div class="admin-section">
            <h3>Quản lí tài khoản</h3>
            <a href="../database/quanliaccounts.php" class="admin-link">Truy cập</a>
          </div>
          <div class="admin-section">
            <h3>Quản lí hỗ trợ</h3>
            <a href="../database/quanlihotro.php" class="admin-link">Truy cập</a>
          </div>
          <div class="admin-section">
            <h3>Xem thành viên</h3>
            <a href="../database/xemthanhvien.php" class="admin-link">Truy cập</a>
          </div>
          <!-- Thêm các mục khác tương tự như trên -->
        </div>
      <?php else : ?>
        <div class="menu-container">
          <h2>Khu vực người dùng</h2>
          <!-- Các mục quản lý của user -->
          <div class="user-section">
            <h3>Xem thêm acc</h3>
            <a href="../menu/menu.php" class="user-link">Truy cập</a>
          </div>
          <div class="user-section">
            <h3>Trang chủ</h3>
            <a href="../web/index.php" class="user-link">Truy cập</a>
          </div>
          <div class="user-section">
            <h3>Giới thiệu</h3>
            <a href="../web/about.php" class="user-link">Truy cập</a>
          </div>
          <div class="user-section">
            <h3>Khiếu nại</h3>
            <a href="../web/support.php" class="user-link">Truy cập</a>
          </div>
          <!-- Thêm các mục khác tương tự như trên -->
        </div>
      <?php endif; ?>
    </div>

    <!-- Lịch sử mua hàng -->
    <div class="lichsu">
      <?php if($typeuser == 'admin'): ?>
        <h2>Lịch sử bán tài khoản</h2>
      <?php else: ?>
        <h2>Lịch sử mua tài khoản</h2>
      <?php endif;?>
      <?php if (!empty($orders)) : ?>
        <table border="1">
          <tr>
            <th>Mã đơn hàng</th>
            <th>Tài khoản</th>
            <th>Mật khẩu</th>
            <th>Rank</th>
            <th>Số tiền thanh toán</th>
          </tr>
          <?php foreach ($orders as $order) : ?>
            <tr>
              <td><?php echo htmlspecialchars($order['orderid']); ?></td>
              <td><?php echo htmlspecialchars($order['taikhoan']); ?></td>
              <td><?php echo htmlspecialchars($order['matkhau']); ?></td>
              <td><?php echo htmlspecialchars($order['rank']); ?></td>
              <td><?php echo htmlspecialchars($order['credit']); ?> VND</td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else : ?>
        <p>Chưa có lịch sử mua tài khoản.</p>
      <?php endif; ?>
    </div>
    
  </div>
  <footer class="row">
    <div class="contact-details">
        <div>
            <h2>Số Điện Thoại</h2>
            <p>📞 Hotline: 02251120321   -   02251120292</p>
        </div>
        <div>
            <h2>Email</h2>
            <p>✉️ Email: <a href="mailto:2251120321@ut.edu.vn">2251120321@ut.edu.vn</a>     -     <a href="mailto:2251120292@ut.edu.vn">2251120292@ut.edu.vn</a></p>
        </div>
        <div>
            <h2>Địa Chỉ</h2>
            <p>🏠 70 Tô Ký, Phường Tân Chánh Hiệp, Quận 12, TP. Hồ Chí Minh</p>
        </div>
        </footer>
  <script src="../web/app.js"></script>
</body>
</html>

