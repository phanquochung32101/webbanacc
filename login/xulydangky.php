<?php
$u = $_POST['username'];
$pass = $_POST['pass'];
$repass = $_POST['repass'];
$email = $_POST['email'];

$u = trim(strip_tags($u));
$pass = trim(strip_tags($pass));
$repass = trim(strip_tags($repass));
$email = trim(strip_tags($email));

$loi = "";
if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
    $loi .= "Email không đúng<br>";
if ($pass != $repass)
    $loi .= "Hai mật khẩu không giống nhau<br>";
?>

<?php if ($loi != "") { ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="col-8 m-auto">
        <div class="alert alert-danger mt-5 text-center">
            <?=$loi?>
            <button class="btn btn-primary" onclick="history.back()">Trở lại</button>
        </div>
    </div>
<?php } else {
    require_once '../connectdb.php';
    
    // Set the default user type, e.g., 'user'
    $typeuser = 'user'; 

    // Insert the new user into the database
    $sql = "INSERT INTO users(username, password, typeuser, email) VALUES ('$u', '$pass', '$typeuser', '$email')";
    $kq = $conn->exec($sql);

    if ($kq == 1) {
        echo "Thành công";
        header("location:login.php");
        // Gửi mail hoặc thực hiện các hành động khác
    } else {
        echo "Cập nhật không thành công";
    }
} ?>
