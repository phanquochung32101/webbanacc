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
    // Sử dụng prepared statement để bảo mật
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    
    // Lấy kết quả
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        $credit = $result['credit'];
    } else {
        $credit = "Không tìm thấy thông tin";
    }
} catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
    $credit = "Lỗi truy vấn";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Acc Menu</title>
  <link rel="stylesheet" href="menu.css" />
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
    <div class="header">
      <div class="logo">
      <img style="width:60px;height:45px;" src="../web/img/logo.jpg" alt="" />
      </div>
      <div class="bar">
        <i class="fa-solid fa-bars"></i>
        <i class="fa-solid fa-xmark" id="hdcross"></i>
      </div>
      <div class="nav">
        <ul>
          <a href="../web/index.php">
            <li>Home</li>
          </a>
          <a href="../web/about.php">
            <li>About</li>
          </a>
          <a href="menu.php">
            <li>Menu</li>
          </a>
          <a href="../web/support.php">
            <li>Support</li>
          </a>
        </ul>
      </div>
      <div class="account">
        <ul>
          <a href="../web/index.php">
            <li>
              <i class="fa-solid fa-house-chimney"></i>
            </li>
          </a>
          <a href="#">
                <li id="user-menu">
                    <i class="fa-solid fa-user" id="user-lap"></i>
                </li>
            </a>
            <ul id="auth-menu">
                <?php if ($loggedIn): ?>
                    <li id="user-info">Hi, <?= htmlspecialchars($username); ?></li>
                    <li id="logout"><a href="../login/logout.php">Đăng xuất</a></li>
                <?php else: ?>
                    <li id="login"><a href="../login/login.php">Đăng nhập</a></li>
                    <li id="register"><a href="../login/register.php">Đăng ký</a></li>
                <?php endif; ?>
            </ul>
        </ul>
      </div>
    </div>
  </header>
  <div class="main-container">
    <div class="search-box">
      <input type="text" placeholder="Tìm kiếm sản phẩm..." />
    </div>
    <div class="sections-container">
    <section id="hotacc">
    <h2>Hot Acc</h2>
    <?php 
      $sql = "SELECT id, so_tuong, so_skin, rank, ghi_chu, gia, url FROM accounts WHERE so_skin >= 230";
      $result = $conn->query($sql);
      if ($result->rowCount() > 0) {
        $count = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $formattedPrice = number_format($row['gia'], 0, ',', '.');
          if ($count >= 2) {
            echo '<div class="hidden-products hidden">';
            echo  '<div class="product" onclick="showModal('.$row['id'].', \''.$row['url'].'\', \''.$row['rank'].'\', \''.$formattedPrice.'\', '.$row['so_tuong'].', '.$row['so_skin'].', \''.$row['ghi_chu'].'\')">';
            echo   '<img src="'.$row['url'].'" alt="anh acc game">';
            echo   '<div class="info">';
            echo   '<h3 class="product-name">Rank '.$row['rank'].'</h3>';
            echo   '<p>'.$formattedPrice.' VNĐ</p>';
            echo    '</div>';
            echo     '<div class="price">';
            echo     '<button>Mua ngay</button>';
            echo     '</div>';
            echo     '</div>';
            echo    '</div>';
          } else {
            echo '<div class="product-container">';
            echo  '<div class="product" onclick="showModal('.$row['id'].', \''.$row['url'].'\', \''.$row['rank'].'\', \''.$formattedPrice.'\', '.$row['so_tuong'].', '.$row['so_skin'].', \''.$row['ghi_chu'].'\')">';
            echo   '<img src="'.$row['url'].'" alt="anh acc game">';
            echo   '<div class="info">';
            echo   '<h3 class="product-name">Rank '.$row['rank'].'</h3>';
            echo   '<p>'.$formattedPrice.' VNĐ</p>';
            echo    '</div>';
            echo     '<div class="price">';
            echo     '<button>Mua ngay</button>';
            echo     '</div>';
            echo     '</div>';
            echo    '</div>';
          }
          $count++;
        }
      }
    ?>     
    <button class="toggle-btn" onclick="toggleProducts('hotacc')">Xem thêm</button>
</section>



      

  <section id="price-cheap">
  <h2>Giá Rẻ</h2>
  <?php 
    $sql = "SELECT id, so_tuong, so_skin, rank, ghi_chu, gia, url FROM accounts WHERE gia <= 1500000";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
      $count = 0;
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $formattedPrice = number_format($row['gia'], 0, ',', '.');

        if ($count >= 2) {
          echo '<div class="hidden-products hidden">';
          echo  '<div class="product" onclick="showModal('.$row['id'].', \''.$row['url'].'\', \''.$row['rank'].'\', \''.$formattedPrice.'\', '.$row['so_tuong'].', '.$row['so_skin'].', \''.$row['ghi_chu'].'\')">';
          echo   '<img src="'.$row['url'].'" alt="anh acc game">';
          echo   '<div class="info">';
          echo   '<h3 class="product-name">Rank '.$row['rank'].'</h3>';
          echo   '<p>'.$formattedPrice.' VNĐ</p>';
          echo    '</div>';
          echo     '<div class="price">';
          echo     '<button>Mua ngay</button>';
          echo     '</div>';
          echo     '</div>';
          echo    '</div>';
        } else {
          echo '<div class="product-container">';
          echo  '<div class="product" onclick="showModal('.$row['id'].', \''.$row['url'].'\', \''.$row['rank'].'\', \''.$formattedPrice.'\', '.$row['so_tuong'].', '.$row['so_skin'].', \''.$row['ghi_chu'].'\')">';
          echo   '<img src="'.$row['url'].'" alt="anh acc game">';
          echo   '<div class="info">';
          echo   '<h3 class="product-name">Rank '.$row['rank'].'</h3>';
          echo   '<p>'.$formattedPrice.' VNĐ</p>';
          echo    '</div>';
          echo     '<div class="price">';
          echo     '<button>Mua ngay</button>';
          echo     '</div>';
          echo     '</div>';
          echo    '</div>';
        }
        $count++;
      }
    }
  ?>     
  <button class="toggle-btn" onclick="toggleProducts('price-cheap')">Xem thêm</button>
</section>


<section id="vipacc">
  <h2>Vip Acc</h2>
  <?php 
    $sql = "SELECT id, so_tuong, so_skin, rank, ghi_chu, gia, url FROM accounts WHERE gia > 1500000";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
      $count = 0;
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $formattedPrice = number_format($row['gia'], 0, ',', '.');

        if ($count >= 2) {
          echo '<div class="hidden-products hidden">';
          echo  '<div class="product" onclick="showModal('.$row['id'].', \''.$row['url'].'\', \''.$row['rank'].'\', \''.$formattedPrice.'\', '.$row['so_tuong'].', '.$row['so_skin'].', \''.$row['ghi_chu'].'\')">';
          echo   '<img src="'.$row['url'].'" alt="anh acc game">';
          echo   '<div class="info">';
          echo   '<h3 class="product-name">Rank '.$row['rank'].'</h3>';
          echo   '<p>'.$formattedPrice.' VNĐ</p>';
          echo    '</div>';
          echo     '<div class="price">';
          echo     '<button>Mua ngay</button>';
          echo     '</div>';
          echo     '</div>';
          echo    '</div>';
        } else {
          echo '<div class="product-container">';
          echo  '<div class="product" onclick="showModal('.$row['id'].', \''.$row['url'].'\', \''.$row['rank'].'\', \''.$formattedPrice.'\', '.$row['so_tuong'].', '.$row['so_skin'].', \''.$row['ghi_chu'].'\')">';
          echo   '<img src="'.$row['url'].'" alt="anh acc game">';
          echo   '<div class="info">';
          echo   '<h3 class="product-name">Rank '.$row['rank'].'</h3>';
          echo   '<p>'.$formattedPrice.' VNĐ</p>';
          echo    '</div>';
          echo     '<div class="price">';
          echo     '<button>Mua ngay</button>';
          echo     '</div>';
          echo     '</div>';
          echo    '</div>';
        }
        $count++;
      }
    }
  ?>     
  <button class="toggle-btn" onclick="toggleProducts('vipacc')">Xem thêm</button>
</section>


<div id="modal" class="modal">
  <div class="modal-content">
    <span class="close-button">&times;</span>
    <div class="modal-body">
      <img id="modal-image" src="" alt="Modal Image">
      <div id="modal-info">
        <h3 id="modal-rank"></h3>
        <p id="modal-price-label">Giá: <span id="modal-price"></span></p>
        <p id="modal-so-tuong"></p>
        <p id="modal-so-skin"></p>
        <p id="modal-ghi-chu"></p>
      </div>
    </div>
    <button id="payment-button">Thanh toán</button>
    <p id="credit">Số dư khả dụng: <?php echo number_format($credit, 0, ',', '.'); ?> VNĐ</p>
  </div>
</div>

</div>
  </div>
  <footer class="row">
    <div class="contact-details">
        <div>
            <h2>Số Điện Thoại</h2>
            <p>📞 Hotline: 02251120321   -   022511203313</p>
        </div>
        <div>
            <h2>Email</h2>
            <p>✉️ Email: <a href="mailto:2251120321@ut.edu.vn">2251120321@ut.edu.vn</a>     -     <a href="mailto:22511203313@ut.edu.vn">22511203313@ut.edu.vn</a></p>
        </div>
        <div>
            <h2>Địa Chỉ</h2>
            <p>🏠 70 Tô Ký, Phường Tân Chánh Hiệp, Quận 12, TP. Hồ Chí Minh</p>
        </div>
        </footer>
  <script src="menu.js"></script>
  <script src="../web/app.js"></script>
</body>
</html>
