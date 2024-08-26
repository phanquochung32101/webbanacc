<?php
session_start();
session_unset(); // Xóa tất cả các biến phiên
session_destroy(); // Hủy phiên

header("Location: ../web/index.php"); // Chuyển hướng về trang đăng nhập hoặc trang chủ
exit();
?>
