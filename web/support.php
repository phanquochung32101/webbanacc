<?php
session_start();
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
$username = $loggedIn ? $_SESSION['login_user'] : '';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="support.css" />
    <link rel="shortcut.icon" href="./img/logo.jpg" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>game website | home</title>
  </head>
  <body>
    <header>
      <div class="header">
        <div class="logo">
          <img style = "width:60px;height:45px;" src="./img/logo.jpg" alt="" /> 
        </div>
        <div class="bar">
          <i class="fa-solid fa-bars"></i>
          <i class="fa-solid fa-xmark" id="hdcross"></i>
        </div>
        <div class="nav">
          <ul>
            <a href="index.php">
              <li>Home</li>
            </a>
            <a href="about.php">
              <li>About</li>
            </a>
            <a href="../menu/menu.php">
              <li>Menu</li>
            </a>
            <a href="support.php">
              <li>Support</li>
            </a>
          </ul>
        </div>
        <div class="account">
          <ul>
            <a href="index.php">
              <li>
                <i class="fa-solid fa-house-chimney"></i>
              </li>
            </a>
            <a href="#">
                <li id="user-menu">
                    <i class="fa-solid fa-user" id="user-lap"></i>
                </li>
            </a>
            <ul id="auth-menu">
                <?php if ($loggedIn): ?>
                    <li id="user-info">Xin chào, <?= htmlspecialchars($username); ?></li>
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

    <div class="form-container">
    <h2>Gửi Hỗ Trợ Cho Admin</h2>
    <form action="process_support.php" method="post">
        <div class="form-group">
            <label for="issue">Vấn đề cần hỗ trợ</label>
            <textarea id="issue" name="issue" required></textarea>
        </div>
        <div class="form-group">
            <label for="account">Tài khoản</label>
            <input type="text" id="account" name="account" required>
        </div>
        <div class="form-group">
            <label for="bill_date">Ngày tạo bill</label>
            <input type="date" id="bill_date" name="bill_date" required>
        </div>
        <div class="form-group">
            <label for="payment_time">Thời gian nhập tiền</label>
            <input type="text" id="payment_time" name="payment_time" required>
        </div>
        <div class="form-group">
            <label for="missing_amount">Số tiền không vào tài khoản (nếu có)</label>
            <input type="text" id="missing_amount" name="missing_amount">
        </div>
        <div class="form-group">
            <label for="acc_id">ID acc đã mua nhưng không hiện tài khoản hoặc mật khẩu (nếu có)</label>
            <input type="text" id="acc_id" name="acc_id">
        </div>
        <div class="form-group">
            <label for="email">Thông báo gửi qua mail (vui lòng nhập mail để shop gửi thông báo)</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Gửi Yêu Cầu">
        </div>
    </form>
</div>
<footer class="row">
    <div class="contact-details">
        <div>
            <h2>Số Điện Thoại</h2>
            <p>📞 Hotline: 02251120321   -   022511203313</p>
        </div>
        <div>
            <h2>Email</h2>
            <p>✉️ Email: <a href="mailto:2251120321@ut.edu.vn">2251120321@ut.edu.vn</a>     -     <a href="mailto:22511203313@ut.edu.vn">22511203313@ut.edu.vn</a></p>
        </div>
        <div>
            <h2>Địa Chỉ</h2>
            <p>🏠 70 Tô Ký, Phường Tân Chánh Hiệp, Quận 12, TP. Hồ Chí Minh</p>
        </div>
        </footer>
    <script src="app.js"></script>
</body>
</html>