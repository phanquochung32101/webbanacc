<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="style.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form id="loginForm" action="xulydangnhap.php" method="post" class="form-container col-5 m-auto">
      <h1>Login</h1>
      <div class="input-box">
        <input name="u" type="text" id="username" placeholder="Username" required />
        <i class='bx bx-user'></i>
      </div>
      <div class="input-box">
        <input name="p" type="password" id="password" placeholder="Password" required />
        <i class='bx bxs-lock-alt'></i>
      </div>

      <div class="remember-forgot">
        <label><input type="checkbox" />Remember me</label>
        <a href="#">Forgot password</a>
      </div>
      <button type="submit" class="btn">Login</button>

      <div class="register-link">
        <p>Don't have an account? <a href="register.php">Register</a></p>
      </div>
    </form>
  </div>

  <?php
  if (isset($_GET['error']) && $_GET['error'] == 1) {
      echo "<script>alert('Username hoặc Mật khẩu không đúng');</script>";
  }
  
  ?>

</body>
</html>
