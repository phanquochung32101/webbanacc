// Đảm bảo menu ẩn khi trang được tải lại
window.addEventListener('load', function() {
  var authMenu = document.getElementById("auth-menu");
  authMenu.style.display = "none";
});

document.getElementById("user-lap").addEventListener("click", function() {
  var authMenu = document.getElementById("auth-menu");
  if (authMenu.style.display === "none" || authMenu.style.display === "") {
      authMenu.style.display = "flex";
  } else {
      authMenu.style.display = "none";
  }
});

// Tùy chọn: Ẩn menu khi nhấp ra ngoài khu vực menu
document.addEventListener("click", function(event) {
  var userIcon = document.getElementById("user-lap");
  var authMenu = document.getElementById("auth-menu");

  if (!userIcon.contains(event.target) && !authMenu.contains(event.target)) {
      authMenu.style.display = "none";
  }
});


// Lấy modal
var modal = document.getElementById("modalTrungBay");

// Lấy nút đóng modal
var span = document.getElementsByClassName("close")[0];

// Lấy tất cả các nút có class "acctrungbay"
var buttons = document.querySelectorAll(".acctrungbay");

// Duyệt qua từng nút và gán sự kiện click cho chúng
buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Mở modal khi nhấn vào nút
        modal.style.display = "block";
    });
});

// Đóng modal khi nhấn vào nút đóng
span.onclick = function() {
    modal.style.display = "none";
}

// Đóng modal khi nhấn ra ngoài modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
