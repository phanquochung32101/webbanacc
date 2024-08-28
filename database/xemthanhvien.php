<?php
session_start();
require_once '../connectdb.php';
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
$username = $loggedIn ? $_SESSION['login_user'] : '';

// Truy vấn cơ sở dữ liệu
$sql = "SELECT id_user, username, password, typeuser, email, credit FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <link rel="stylesheet" href="xemthanhvien.css" />
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

    <h1>Danh sách người dùng</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên người dùng</th>
                <th>Mật khẩu</th>
                <th>Loại người dùng</th>
                <th>Email</th>
                <th>Tín dụng</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id_user']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['password']); ?></td>
                        <td><?php echo htmlspecialchars($user['typeuser']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['credit']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Không có người dùng nào</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script src="../web/app.js"></script>

</body>
</html>