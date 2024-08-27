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
    } else {
        $credit = "Không tìm thấy thông tin";
    }

    // Lấy lịch sử mua tài khoản
    $stmt_orders = $conn->prepare("
        SELECT o.orderid, a.taikhoan, a.rank, a.gia, o.credit 
        FROM orderacc o 
        JOIN accounts a ON o.id_account = a.id 
        WHERE o.username = :username
    ");
    $stmt_orders->bindParam(':username', $username, PDO::PARAM_STR);
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
  <title>Lịch sử mua tài khoản</title>
</head>
<body>
  <h1>Chào mừng, <?php echo htmlspecialchars($username); ?></h1>
  <p>Số dư tài khoản: <?php echo htmlspecialchars($credit); ?> VND</p>

  <h2>Lịch sử mua tài khoản</h2>
  <?php if (!empty($orders)) : ?>
    <table border="1">
      <tr>
        <th>Mã đơn hàng</th>
        <th>Tài khoản</th>
        <th>Rank</th>
        <th>Giá</th>
        <th>Số tiền thanh toán</th>
      </tr>
      <?php foreach ($orders as $order) : ?>
        <tr>
          <td><?php echo htmlspecialchars($order['orderid']); ?></td>
          <td><?php echo htmlspecialchars($order['taikhoan']); ?></td>
          <td><?php echo htmlspecialchars($order['rank']); ?></td>
          <td><?php echo htmlspecialchars($order['gia']); ?> VND</td>
          <td><?php echo htmlspecialchars($order['credit']); ?> VND</td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php else : ?>
    <p>Chưa có lịch sử mua tài khoản.</p>
  <?php endif; ?>
</body>
</html>
