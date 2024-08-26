<?php
require_once '../connectdb.php';
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
$username = $loggedIn ? $_SESSION['login_user'] : '';

if (!$loggedIn) {
    die("Bạn cần đăng nhập để thực hiện thanh toán.");
}

// Lấy thông tin từ POST request
$accountId = isset($_POST['accountId']) ? intval($_POST['accountId']) : 0;
$accountPrice = isset($_POST['accountPrice']) ? floatval($_POST['accountPrice']) : 0;

if ($accountId <= 0 || $accountPrice <= 0) {
    die("Thông tin không hợp lệ.");
}

try {
    // Bắt đầu transaction
    $conn->beginTransaction();

    // Lấy số dư của người dùng
    $stmt = $conn->prepare("SELECT credit FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("Không tìm thấy người dùng.");
    }

    $currentCredit = $user['credit'];

    if ($currentCredit < $accountPrice) {
        die("Số dư không đủ để thanh toán.");
    }

    // Kiểm tra giá tài khoản trong bảng accounts
    $stmt = $conn->prepare("SELECT gia, taikhoan, matkhau, so_tuong, so_skin, rank, ghi_chu, url FROM accounts WHERE id = :accountId");
    $stmt->bindParam(':accountId', $accountId, PDO::PARAM_INT);
    $stmt->execute();
    $account = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$account || $account['gia'] != $accountPrice) {
        die("Thông tin tài khoản không hợp lệ.");
    }

    // Thêm đơn hàng vào bảng orderacc
    $stmt = $conn->prepare("INSERT INTO orderacc (username, credit, id_account) VALUES (:username, :credit, :accountId)");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':credit', $accountPrice, PDO::PARAM_STR);
    $stmt->bindParam(':accountId', $accountId, PDO::PARAM_INT);
    $stmt->execute();

    // Cập nhật thông tin tài khoản vào bảng accsell
    $stmt = $conn->prepare("INSERT INTO accsell (id_acc, so_tuong, so_skin, rank, ghi_chu, url, gia, taikhoan, matkhau) VALUES (:id_acc, :so_tuong, :so_skin, :rank, :ghi_chu, :url, :gia, :taikhoan, :matkhau)");
    $stmt->bindParam(':id_acc', $accountId, PDO::PARAM_INT);
    $stmt->bindParam(':so_tuong', $account['so_tuong'], PDO::PARAM_INT);
    $stmt->bindParam(':so_skin', $account['so_skin'], PDO::PARAM_INT);
    $stmt->bindParam(':rank', $account['rank'], PDO::PARAM_STR);
    $stmt->bindParam(':ghi_chu', $account['ghi_chu'], PDO::PARAM_STR);
    $stmt->bindParam(':url', $account['url'], PDO::PARAM_STR);
    $stmt->bindParam(':gia', $account['gia'], PDO::PARAM_STR);
    $stmt->bindParam(':taikhoan', $account['taikhoan'], PDO::PARAM_STR);
    $stmt->bindParam(':matkhau', $account['matkhau'], PDO::PARAM_STR);
    $stmt->execute();

    // Xóa tài khoản khỏi bảng accounts
    $stmt = $conn->prepare("DELETE FROM accounts WHERE id = :accountId");
    $stmt->bindParam(':accountId', $accountId, PDO::PARAM_INT);
    $stmt->execute();

    // Kiểm tra nếu tài khoản đã bị xóa thành công
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE id = :accountId");
    $stmt->bindParam(':accountId', $accountId, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        die("Không thể xóa tài khoản.");
    }

    // Cập nhật số dư của người dùng
    $newCredit = $currentCredit - $accountPrice;
    $stmt = $conn->prepare("UPDATE users SET credit = :newCredit WHERE username = :username");
    $stmt->bindParam(':newCredit', $newCredit, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    // Commit transaction
    $conn->commit();

    // Hiển thị thông tin tài khoản và mật khẩu
    echo "Thanh toán thành công!<br>";
    echo "Tài khoản: " . htmlspecialchars($account['taikhoan']) . "<br>";
    echo "Mật khẩu: " . htmlspecialchars($account['matkhau']) . "<br>";

} catch (PDOException $e) {
    $conn->rollBack();
    echo "Lỗi: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;
?>
