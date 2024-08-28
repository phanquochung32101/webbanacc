<?php
// manage_orders.php
session_start();
require_once '../connectdb.php';
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
$username = $loggedIn ? $_SESSION['login_user'] : '';
// Handle adding a new order
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_order'])) {
    $username = $_POST['username'];
    $credit = $_POST['credit'];
    $id_account = $_POST['id_account'];

    try {
        $stmt = $conn->prepare("INSERT INTO orderacc (username, credit, id_account) VALUES (:username, :credit, :id_account)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':credit', $credit);
        $stmt->bindParam(':id_account', $id_account);
        $stmt->execute();
        echo "New order added successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Handle deleting an order
if (isset($_GET['delete'])) {
    $orderid = $_GET['delete'];
    try {
        $stmt = $conn->prepare("DELETE FROM orderacc WHERE orderid = :orderid");
        $stmt->bindParam(':orderid', $orderid);
        $stmt->execute();
        echo "Order deleted successfully!";
    } catch (PDOException $e) {
        echo "Error deleting order: " . $e->getMessage();
    }
}

// Fetch orders from the database
try {
    $stmt = $conn->prepare("SELECT * FROM orderacc");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching orders: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="quanlidonhang.css" />
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


    <h1>Quản lý đơn đặt hàng</h1>

    <h2>Danh sách đơn hàng</h2>
    <table>
        <tr>
            <th>ID đơn hàng</th>
            <th>Tài khoản</th>
            <th>Số tiền</th>
            <th>ID tài khoản đã mua</th>
            <th>Hành động</th>
        </tr>
        <?php
        if (!empty($result)) {
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['orderid']) . "</td>";
                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['credit']) . "</td>";
                echo "<td>" . htmlspecialchars($row['id_account']) . "</td>";
                echo "<td><a id='the_a_donhang' href='quanlidonhang.php?delete=" . htmlspecialchars($row['orderid']) . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Không tìm thấy đơn hàng nào</td></tr>";
        }
        ?>

    </table>
    <script src="../web/app.js"></script>

</body>
</html>

<?php
$conn = null; // Close the PDO connection
?>
