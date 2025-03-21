<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url("../img/imgres1.jpg") no-repeat;
      background-size: cover;
      background-position: center;
    }

    .wrapper {
      width: 650px;
      background: rgba(255, 255, 255, 0.1);
      border: 2px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(50px);
      border-radius: 10px;
      color: #fff;
      padding: 40px 35px 55px;
      margin: 0 10px;
    }

    .wrapper h1 {
      font-size: 36px;
      text-align: center;
      margin-bottom: 20px;
    }

    .wrapper .input-box {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .input-box .input-field {
      position: relative;
      width: 100%;
      height: 50px;
      margin: 13px 0;
    }

    .input-box .input-field input {
      width: 100%;
      height: 100%;
      background: transparent;
      border: 2px solid rgba(255, 255, 255, 0.2);
      outline: none;
      font-size: 16px;
      color: #fff;
      border-radius: 6px;
      padding: 15px 15px 15px 40px;
    }

    .input-box .input-field input::placeholder {
      color: #fff;
    }

    .input-box .input-field i {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 20px;
    }

    .wrapper label {
      display: inline-block;
      font-size: 14.5px;
      margin: 10px 0 23px;
    }

    .wrapper label input {
      accent-color: #fff;
      margin-right: 5px;
    }

    .wrapper .btn {
      width: 100%;
      height: 45px;
      background: #fff;
      border: none;
      outline: none;
      border-radius: 6px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      font-size: 16px;
      color: #333;
      font-weight: 600;
    }

  </style>
</head>

<body>
  <div class="wrapper">
    <form action="xulydangky.php" method="post" id="registerForm">
      <h1>Register</h1>
      <div class="input-box">
        <div class="input-field">
          <input name="username" type="text" placeholder="Username" required />
          <i class="bx bxs-user"></i>
        </div>
      </div>
      <div class="input-box">
        <div class="input-field">
          <input name="email" type="email" placeholder="Email" required />
          <i class="bx bxs-envelope"></i>
        </div>
      </div>

      <div class="input-box">
        <div class="input-field">
          <input name="pass" type="password" placeholder="Password" required />
          <i class="bx bxs-lock-alt"></i>
        </div>
        <div class="input-field">
          <input name="repass" type="password" placeholder="Confirm password" required />
          <i class="bx bxs-lock-alt"></i>
        </div>
      </div>

      <label>
        <input type="checkbox" />
        Tôi xin cam đoan những thông tin cung cấp ở trên là đúng sự thật và chính xác
      </label>

      <button type="submit" class="btn">Register</button>
    </form>
  </div>
</body>

</html>