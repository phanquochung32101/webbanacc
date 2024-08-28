<?php
$u = $_POST['u'];
$p = $_POST['p'];

$u = trim(strip_tags($u));
$p = trim(strip_tags($p));

require_once("../connectdb.php");

$sql = "SELECT id_user, username, typeuser FROM users WHERE username='{$u}' AND password ='{$p}'";
$kq = $conn->query($sql);
$numrows_user = $kq->rowCount();

if ($numrows_user == 1) {
    session_start();
    $row_user = $kq->fetch();
    $_SESSION['loggedIn'] = true;
    $_SESSION['login_id'] = $row_user['id_user'];
    $_SESSION['login_user'] = $row_user['username'];
    $_SESSION['typeuser'] = $row_user['typeuser'];

    // Check if the user is an admin
    header("location: ../web/index.php");
    exit();
} else {
    header("location: login.php?error=1");
    exit();
}
?>
