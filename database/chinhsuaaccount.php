<?php
session_start();
require_once '../connectdb.php';

$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
$username = $loggedIn ? $_SESSION['login_user'] : '';

// Kiểm tra xem có ID không và ID có hợp lệ không
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID không hợp lệ.");
}

$id = intval($_GET['id']);

try {
    // Lấy thông tin tài khoản từ cơ sở dữ liệu
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $account = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$account) {
        die("Tài khoản không tồn tại.");
    }

    // Xử lý cập nhật thông tin tài khoản
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $so_tuong = $_POST['so_tuong'];
        $so_skin = $_POST['so_skin'];
        $rank = $_POST['rank'];
        $ghi_chu = $_POST['ghi_chu'];
        $gia = $_POST['gia'];
        $url = $_POST['url'];
        $thongtin = $_POST['thongtin'];
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];

        // Cập nhật tài khoản trong cơ sở dữ liệu
        try {
            $stmt = $conn->prepare("
            UPDATE accounts
            SET so_tuong = :so_tuong, so_skin = :so_skin, rank = :rank, ghi_chu = :ghi_chu, gia = :gia,
                url = :url, thongtin = :thongtin, taikhoan = :taikhoan, matkhau = :matkhau
            WHERE id = :id
        ");
            $stmt->bindParam(':so_tuong', $so_tuong, PDO::PARAM_STR);
            $stmt->bindParam(':so_skin', $so_skin, PDO::PARAM_STR);
            $stmt->bindParam(':rank', $rank, PDO::PARAM_STR);
            $stmt->bindParam(':ghi_chu', $ghi_chu, PDO::PARAM_STR);
            $stmt->bindParam(':gia', $gia, PDO::PARAM_STR);
            $stmt->bindParam(':url', $url, PDO::PARAM_STR);
            $stmt->bindParam(':thongtin', $thongtin, PDO::PARAM_STR);
            $stmt->bindParam(':taikhoan', $taikhoan, PDO::PARAM_STR);
            $stmt->bindParam(':matkhau', $matkhau, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            echo '<script>alert("Chỉnh sửa thành công")</script>';
            echo "<script>window.location.href = 'quanliaccounts.php';</script>";
        }
        catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa tài khoản</title>
    <link rel="stylesheet" href="chinhsuaaccount.css" />
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
        <h1>Chỉnh sửa tài khoản</h1>
        <form action="chinhsuaaccount.php?id=<?php echo htmlspecialchars($id); ?>" method="post">
            <label for="so_tuong">Số Tướng:</label>
            <input type="text" id="so_tuong" name="so_tuong" value="<?php echo htmlspecialchars($account['so_tuong']); ?>" required>
            <br>

            <label for="so_skin">Số Skin:</label>
            <input type="text" id="so_skin" name="so_skin" value="<?php echo htmlspecialchars($account['so_skin']); ?>" required>
            <br>

            <label for="rank">Rank:</label>
            <input type="text" id="rank" name="rank" value="<?php echo htmlspecialchars($account['rank']); ?>" required>
            <br>

            <label for="ghi_chu">Ghi Chú:</label>
            <input type="text" id="ghi_chu" name="ghi_chu" value="<?php echo htmlspecialchars($account['ghi_chu']); ?>">
            <br>

            <label for="gia">Giá:</label>
            <input type="text" id="gia" name="gia" value="<?php echo htmlspecialchars($account['gia']); ?>" required>
            <br>

            <label for="url">URL:</label>
            <input type="text" id="url" name="url" value="<?php echo htmlspecialchars($account['url']); ?>" required>
            <br>

            <label for="thongtin">Thông Tin:</label>
            <input type="text" id="thongtin" name="thongtin" value="<?php echo htmlspecialchars($account['thongtin']); ?>">
            <br>

            <label for="taikhoan">Tài Khoản:</label>
            <input type="text" id="taikhoan" name="taikhoan" value="<?php echo htmlspecialchars($account['taikhoan']); ?>" required>
            <br>

            <label for="matkhau">Mật Khẩu:</label>
            <input type="text" id="matkhau" name="matkhau" value="<?php echo htmlspecialchars($account['matkhau']); ?>" required>
            <br>

            <button type="submit">Cập nhật</button>
        </form>
    </main>

    <script src="../web/app.js"></script>
</body>
</html>

<?php
$conn = null; // Đóng kết nối cơ sở dữ liệu
?>
