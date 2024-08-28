<?php
require_once "../connectdb.php";
session_start();
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
$username = $loggedIn ? $_SESSION['login_user'] : '';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vande = $_POST['issue'];
    $user_custom = $_POST['account'];
    $ngaythanhtoan = $_POST['bill_date'];
    $sotien = !empty($_POST['missing_amount']) ? $_POST['missing_amount'] : null;
    $id_accdamua = !empty($_POST['acc_id']) ? $_POST['acc_id'] : null;
    $email = $_POST['email'];

    // Ensure all mandatory fields are filled
    if (empty($vande) || empty($user_custom) || empty($ngaythanhtoan) || empty($email)) {
        echo "Vui lòng điền tất cả các trường bắt buộc.";
        exit;
    }

    try {
        // Prepare the SQL statement using PDO
        $stmt = $conn->prepare("INSERT INTO support (vande, user_custom, ngaythanhtoan, sotien, id_accdamua, email) VALUES (:vande, :user_custom, :ngaythanhtoan, :sotien, :id_accdamua, :email)");

        // Bind the parameters
        $stmt->bindParam(':vande', $vande);
        $stmt->bindParam(':user_custom', $user_custom);
        $stmt->bindParam(':ngaythanhtoan', $ngaythanhtoan);
        $stmt->bindParam(':sotien', $sotien, PDO::PARAM_INT);
        $stmt->bindParam(':id_accdamua', $id_accdamua, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email);
        if ($stmt->execute()) {
            echo "<div class='message success'>Yêu cầu hỗ trợ của bạn đã được gửi thành công!</div>";
        } else {
            echo "<div class='message error'>Đã xảy ra lỗi khi gửi yêu cầu của bạn.</div>";
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }

    // Close the connection
    $conn = null;
} else {
    echo "Không có dữ liệu được gửi.";
}
?>

<div style="margin-top: 20px; text-align: center;">
    <a href="index.php" class="return-home-btn">Quay lại trang chủ</a>
</div>


<style>
.message {
    padding: 15px;
    margin: 20px 0;
    border-radius: 5px;
    font-size: 16px;
    text-align: center;
}

.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}



.return-home-btn {
  display: inline-block;
  text-decoration: none;
  color: #fff;
  background-color: rgb(245, 159, 79);
  padding: 10px 20px;
  border-radius: 5px;
  font-weight: bold;
  font-size: 16px;
  text-align: center;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.return-home-btn:hover {
  background-color: orangered;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.return-home-btn:active {
  background-color: #004494;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}
</style>