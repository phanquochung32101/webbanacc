
<?php
session_start();
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
$username = $loggedIn ? $_SESSION['login_user'] : '';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="about.css" />
    <link rel="shortcut.icon" href="./img/logo.jpg" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>game website | home</title>
  </head>
  <body>
    <header>
      <div class="header">
        <div class="logo">
          <img style = "width:60px;height:45px;" src="./img/logo.jpg" alt="" />
        </div>
        <div class="bar">
          <i class="fa-solid fa-bars"></i>
          <i class="fa-solid fa-xmark" id="hdcross"></i>
        </div>
        <div class="nav">
          <ul>
            <a href="index.php">
              <li>Home</li>
            </a>
            <a href="about.php">
              <li>About</li>
            </a>
            <a href="../menu/menu.php">
              <li>Menu</li>
            </a>
            <a href="support.php">
              <li>Support</li>
            </a>
          </ul>
        </div>
        <div class="account">
          <ul>
            <a href="index.php">
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
                    <li id="user-info">Xin chào, <?= htmlspecialchars($username); ?></li>
                    <li id="logout"><a href="../login/logout.php">Đăng xuất</a></li>
                <?php else: ?>
                    <li id="login"><a href="../login/login.php">Đăng nhập</a></li>
                    <li id="register"><a href="../login/register.php">Đăng ký</a></li>
                <?php endif; ?>
            </ul>
            </a>
          </ul>
        </div>
      </div>
    </header>

      <div class="container">
        <h1>Chào mừng bạn đến với ThƯng Shop - Thiên đường dành cho game thủ Liên Quân Mobile!</h1>

        <div class="content-section left">
            <img  style = "width:343px;height:320px;"src="./img/game.png" alt="ThƯng Shop Image 1">
            <div class="text-content">
                <p>Nếu bạn là một người yêu thích Liên Quân Mobile và luôn mong muốn sở hữu một tài khoản mạnh mẽ, đầy đủ tướng, trang phục độc quyền, và có xếp hạng cao, thì bạn đã đến đúng nơi. Tại ThƯng Shop, chúng tôi tự hào là nơi cung cấp những tài khoản Liên Quân Mobile chất lượng cao, đã được kiểm duyệt kỹ lưỡng, đảm bảo mang lại cho bạn trải nghiệm chơi game hoàn hảo.</p>
            </div>
        </div>

        <div class="content-section right">
            <img src="./img/item1.jpg" alt="ThƯng Shop Image 2">
            <div class="text-content">
                <h2>Điều gì làm nên sự khác biệt của ThƯng Shop?</h2>
                <ul>
                    <li><strong>Kho tài khoản phong phú:</strong> Chúng tôi sở hữu hàng trăm tài khoản Liên Quân Mobile với đủ các loại tướng, skin, và vật phẩm quý hiếm. Dù bạn là người mới bắt đầu hay một game thủ lâu năm, chúng tôi đều có những tài khoản phù hợp với nhu cầu của bạn. Từ tài khoản giá rẻ, dễ tiếp cận cho đến những tài khoản VIP có đầy đủ các tướng và trang phục hiếm, bạn sẽ dễ dàng tìm thấy sự lựa chọn hoàn hảo tại ThƯng Shop.</li>
                    <li><strong>Chất lượng tài khoản hàng đầu:</strong> Mỗi tài khoản tại ThƯng Shop đều được chúng tôi kiểm tra cẩn thận, đảm bảo rằng chúng không có lịch sử vi phạm, bị khóa hay có bất kỳ rủi ro nào. Chúng tôi hiểu rằng an toàn và bảo mật là yếu tố hàng đầu mà mọi game thủ quan tâm, vì vậy, tất cả tài khoản đều được bảo mật tuyệt đối, giúp bạn yên tâm khi mua và sử dụng.</li>
                    <li><strong>Giá cả hợp lý, cạnh tranh:</strong> ThƯng Shop cam kết mang đến cho bạn những tài khoản chất lượng với mức giá tốt nhất trên thị trường. Chúng tôi luôn cố gắng giữ mức giá hợp lý để bất kỳ ai cũng có thể sở hữu tài khoản mong muốn mà không lo về tài chính.</li>
                    <li><strong>Hỗ trợ khách hàng chuyên nghiệp:</strong> Đội ngũ nhân viên tư vấn của ThƯng Shop luôn sẵn sàng lắng nghe và giải đáp mọi thắc mắc của bạn. Chúng tôi không chỉ cung cấp tài khoản mà còn mang đến sự hỗ trợ nhiệt tình trong suốt quá trình mua và sử dụng tài khoản. Bạn sẽ không bao giờ cảm thấy lạc lõng khi có chúng tôi đồng hành.</li>
                    <li><strong>Giao dịch nhanh chóng, tiện lợi:</strong> Với hệ thống thanh toán và giao dịch hiện đại, việc mua tài khoản tại ThƯng Shop trở nên cực kỳ nhanh chóng và thuận tiện. Sau khi thanh toán thành công, bạn sẽ nhận được thông tin tài khoản trong thời gian ngắn nhất, sẵn sàng cho những trận chiến đỉnh cao ngay lập tức.</li>
                </ul>
            </div>
        </div>

        <div class="content-section left">
            <img src="./img/item1.jpg" alt="ThƯng Shop Image 3">
            <div class="text-content">
                <h2>Lựa chọn ThƯng Shop - Lựa chọn của sự tin cậy</h2>
                <p>Chúng tôi không chỉ đơn thuần là một nơi bán tài khoản, mà còn là người bạn đồng hành đáng tin cậy trên hành trình chinh phục Liên Quân Mobile của bạn. Với sứ mệnh mang đến cho game thủ những trải nghiệm tốt nhất, ThƯng Shop cam kết cung cấp dịch vụ chất lượng, uy tín, và luôn đặt sự hài lòng của khách hàng lên hàng đầu.</p>
            </div>
        </div>

        <div class="content-section reverse">
            <img src="./img/logo1.jpg" alt="ThƯng Shop Image 4">
            <div class="text-content">
                <h2>Bắt đầu hành trình của bạn ngay hôm nay</h2>
                <p>Hãy khám phá kho tài khoản đa dạng của chúng tôi và tìm cho mình một tài khoản Liên Quân Mobile phù hợp nhất. Dù bạn muốn leo rank cao, sở hữu những tướng yêu thích, hay chỉ đơn giản là trải nghiệm game một cách thoải mái hơn, ThƯng Shop đều có thể đáp ứng. Đừng bỏ lỡ cơ hội sở hữu những tài khoản tốt nhất với giá cả phải chăng nhất trên thị trường.</p>
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
      
    <script src="app.js"></script>
  </body>
</html>
