<?php
session_start();
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
$username = $loggedIn ? $_SESSION['login_user'] : '';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css" />
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
              <li>Trang chủ</li>
            </a>
            <a href="about.php">
              <li>Giới thiệu</li>
            </a>
            <a href="../menu/menu.php">
              <li>Danh sách</li>
            </a>
            <a href="support.php">
              <li>Hỗ trợ</li>
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
                    <li id="user-info"><a href="../login/lichsu.php">Xin chào, <?= htmlspecialchars($username); ?></a></li>
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

    <div class="home">
      <div class="main_slide">
        <div class = "content_main1">
          <h1 style="font-size:50px;">Shop bán <span>tài khoản</span> game</h1>
          <p>Nơi đây tổng hợp những tài khoản game liên quân ngon và rẻ nhất</p>
          <p>Đa dạng hóa: "Nơi đây tổng hợp những tài khoản game Liên Quân Mobile đa dạng nhất, từ tài khoản mới bắt đầu đến tài khoản cao cấp." </p>
<p>Bảo mật: "Cam kết bảo mật thông tin khách hàng và hoàn tiền 100% nếu phát sinh vấn đề." </p>
<p>Hỗ trợ: "Đội ngũ hỗ trợ 24/7 sẵn sàng giải đáp mọi thắc mắc của bạn."</p>
<p>Khuyến mãi: "Sale off cực sốc lên đến 50% cho tất cả các tài khoản." </p>
<p>Tặng kèm: "Mua tài khoản tặng ngay skin hiếm hoặc rương tướng." </p>

          <button class="red_btn">
            <a href="#moreAccount">Visit Now <i class="fa-solid fa-arrow-right-long"></i></a>
          </button>
        </div>
        <div>
          <img src="./img/game.png" alt="" />
        </div>
      </div>

      <div class="acc-items">
    <div class="item">
        <div>
            <img src="./img/item1.jpg" alt="acc item" />
        </div>
        <h3>Murad chí tôn</h3>
        <p>Gồm murad chí tôn, ngộ không bậc A, violet bậc A,....</p>
        <button class="white_btn acctrungbay">See Menu</button>
    </div>
    <div class="item">
        <div>
            <img src="./img/item2.jpg" alt="acc item" />
        </div>
        <h3>Laville tay đua đường phố</h3>
        <p>Gồm Laville bậc A và 30 tướng</p>
        <button class="red_btn acctrungbay">See Menu</button>
    </div>
    <div class="item">
        <div>
            <img src="./img/item3.jpg" alt="acc item" />
        </div>
        <h3>Ata Tân Thuỷ Thủ</h3>
        <p>Gồm zuka bậc A, Laville bậc A,...</p>
        <button class="white_btn acctrungbay">See Menu</button>
    </div>
    <div class="item">
        <div>
            <img src="./img/item4.jpg" alt="acc item" />
        </div>
        <h3>Tulen chí tôn kiếm tiên</h3>
        <p>Gồm Tulen bậc SSS và 60 tướng</p>
        <button class="red_btn acctrungbay">See Menu</button>
    </div>
</div>


      <div class="main_slide2">
        <div class="accimg">
          <img src="./img/plate1.png" alt="" />
        </div>
        <div class="container">
          <div class="question">
            <div>
              <h2>Tại sao bạn chọn nó?</h2>
            </div>
          </div>
          <div class="choose_ans">
            <div class="q-ans">
              <div>
                <img src="./img/plate2.png" alt="" />
              </div>
              <div>
                <h4>Vì nó rẻ?</h4>
                <p>
                  Người chơi gặp khó khăn về tài chính nênư cần bán tài khoản để
                  có tiền trang trải cuộc sống.
                </p>
              </div>
            </div>
          </div>
          <div class="choose_ans">
            <div class="q-ans">
              <div>
                <img src="./img/plate3.png" alt="" />
              </div>
              <div>
                <h4>Vì nó có nhiều tướng?</h4>
                <p>
                  Những tài khoản này thường không được đầu tư nhiều vào skin mà
                  chỉ mua tướng thôi
                </p>
              </div>
            </div>
          </div>
          <div class="choose_ans">
            <div class="q-ans">
              <div>
                <img src="./img/plate4.png" alt="" />
              </div>
              <div>
                <h4>Vì nó có nhiều skin?</h4>
                <p>
                  Những tài khoản này thường không được đầu tư nhiều vào tướng
                  nhiều nhưng mà skin thì
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="main_slide3" id = "moreAccount">
        <div class="fav-head">
          <h3>Những mẫu acc</h3>
          <p>Dưới đây là những mẫu acc có thể bạn sẽ thích!</p>
        </div>
        <div class="fav-game">
          <div class="item" style="box-shadow: 0 0 5px orangered;">
            <div>
              <img src="./img/plate1.png" alt="" />
            </div>
            <div class="details">
              <h4>Acc trắng thông tin</h4>
              <p name="decription">Cam kết 100% trắng thông tin, mẫu acc đa dạng</p>
              <p class="fav-price"><a href="../menu/menu.php">Click</a></p>
            </div>
          </div>
          <div class="item" style="box-shadow: 0 0 5px skyblue;">
            <div>
              <img src="./img/plate2.png" alt="" />
            </div>
            <div class="details">
              <h4>Acc giá rẻ</h4>
              <p name="decription">Giá cả vừa phải nhưng vẫn sở hữu được tài khoản xứng đáng</p>
              <p class="fav-price"><a href="../menu/menu.php#price-cheap">Click</a></p>
            </div>
          </div>
          <div class="item" style="box-shadow: 0 0 5px orange;">
            <div>
              <img src="./img/plate3.png" alt="" />
            </div>
            <div class="details" >
              <h4>Acc hot</h4>
              <p name="decription">Những acc thường được xem hoặc đang có trang phục hot</p>
              <p class="fav-price"><a href="../menu/menu.php#hotacc">Click</a></p>
            </div>
          </div>
          <div class="item" style="box-shadow: 0 0 5px purple;">
            <div>
              <img src="./img/plate4.png" alt="" />
            </div>
            <div class="details">
              <h4>Acc vip</h4>
              <p name="decription">Những acc khủng, sở hữu nhiều skin đẹp và đắt tiền</p>
              <p class="fav-price"><a href="../menu/menu.php#vipacc">Click</a></p>
            </div>
          </div>
        </div>
        <div class="dsgn"></div>
      </div>

  <div class="main_slide4">
    <div class="acc-game">
        <h2>Phản hồi của <span style="color: red">Khách Hàng</span></h2>

        <h3>Vì sao cần thu thập phản hồi của khách hàng?</h3>
        <ul>
          <li><strong>Hiểu rõ nhu cầu khách hàng:</strong> Nhờ đó bạn có thể điều chỉnh sản phẩm, dịch vụ để phù hợp hơn với thị trường.</li>
          <li><strong>Nâng cao chất lượng dịch vụ:</strong> Phát hiện và khắc phục những điểm yếu, cải thiện trải nghiệm người dùng.</li>
          <li><strong>Tăng lòng trung thành của khách hàng:</strong> Khi khách hàng cảm thấy được lắng nghe và giải quyết vấn đề, họ sẽ có xu hướng quay lại và giới thiệu cho người khác.</li>
          <li><strong>Xây dựng uy tín:</strong> Những phản hồi tích cực sẽ giúp bạn xây dựng hình ảnh thương hiệu chuyên nghiệp, đáng tin cậy.</li>
        </ul>

        <h3>Các kênh thu thập phản hồi:</h3>
        <ul>
          <li><strong>Đánh giá trên website:</strong> Cho phép khách hàng đánh giá trực tiếp về sản phẩm, dịch vụ và trải nghiệm mua sắm.</li>
          <li><strong>Mạng xã hội:</strong> Theo dõi các bình luận, đánh giá trên các trang mạng xã hội như Facebook, Instagram.</li>
          <li><strong>Email:</strong> Gửi email khảo sát để thu thập ý kiến khách hàng sau khi giao dịch.</li>
          <li><strong>Hotline/Zalo:</strong> Tiếp nhận các cuộc gọi, tin nhắn từ khách hàng để giải đáp thắc mắc và thu thập phản hồi.</li>
        </ul>

        <h3>Những vấn đề khách hàng thường quan tâm:</h3>
        <ul>
          <li><strong>Chất lượng tài khoản:</strong> Tài khoản có đúng như mô tả, có bị khóa hay không?</li>
          <li><strong>Quy trình giao dịch:</strong> Thủ tục mua bán có nhanh chóng, thuận tiện không?</li>
          <li><strong>Bảo mật thông tin:</strong> Thông tin cá nhân có được bảo mật an toàn?</li>
          <li><strong>Chính sách đổi trả:</strong> Nếu có vấn đề xảy ra, quy trình đổi trả có rõ ràng, nhanh chóng không?</li>
          <li><strong>Hỗ trợ khách hàng:</strong> Đội ngũ hỗ trợ có nhiệt tình, giải quyết vấn đề hiệu quả không?</li>
        </ul>
      </div>
      <div class="images">
            <img src="./img/feedback.png" alt="Feedback Image" />
      </div>
      </div>
    </div> 
    <footer class="row">
    <div class="contact-details">
        <div>
            <h2>Số Điện Thoại</h2>
            <p>📞 Hotline: 02251120321   -   02251120292</p>
        </div>
        <div>
            <h2>Email</h2>
            <p>✉️ Email: <a href="mailto:2251120321@ut.edu.vn">2251120321@ut.edu.vn</a>     -     <a href="mailto:2251120292@ut.edu.vn">2251120292@ut.edu.vn</a></p>
        </div>
        <div>
            <h2>Địa Chỉ</h2>
            <p>🏠 70 Tô Ký, Phường Tân Chánh Hiệp, Quận 12, TP. Hồ Chí Minh</p>
        </div>
        </footer>
        <!-- Modal -->
    <div id="modalTrungBay" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Đây là acc trưng bày <br> Hãy chọn acc khác</p>
            <p><a href="../menu/menu.php">Click vào đây để xem thêm acc</a></p>
        </div>
    </div>


    <script src="app.js"></script> 
  </body>
</html>
