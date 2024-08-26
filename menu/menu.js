function toggleProducts(sectionId) {
    const section = document.getElementById(sectionId);
    const hiddenProducts = section.querySelectorAll('.hidden-products');
    const toggleButton = section.querySelector('.toggle-btn');

    // Toggle visibility of the hidden products containers
    hiddenProducts.forEach(product => {
        product.classList.toggle('hidden');
    });

    // Update the button text based on its current state
    if (hiddenProducts[0].classList.contains('hidden')) {
        toggleButton.textContent = 'Xem thêm';
    } else {
        toggleButton.textContent = 'Ẩn bớt';
    }
}

// Initially hide products after the first 2 in each section
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.sections-container section').forEach(section => {
        const products = section.querySelectorAll('.product');
        if (products.length > 2) {
            products.forEach((product, index) => {
                if (index >= 2) {
                    product.classList.add('hidden');
                }
            });
        }
    });
});


// Lấy modal và các thành phần cần thiết
var modal = document.getElementById("modal");
var closeButton = document.getElementsByClassName("close-button")[0];

// Lấy tất cả hình ảnh sản phẩm
var images = document.querySelectorAll(".product img");

// Thêm sự kiện click cho từng hình ảnh
images.forEach(function (img) {
    img.addEventListener("click", function () {
        // Hiển thị modal
        modal.style.display = "block";

        // Cập nhật hình ảnh và thông tin trong modal
        document.getElementById("modal-image").src = this.src;
        var productInfo = this.parentElement; // Lấy phần tử cha của hình ảnh
        var rank = productInfo.querySelector(".product-name").innerText; // Lấy rank
        var price = productInfo.querySelector(".info p").innerText; // Lấy giá
        document.getElementById("modal-rank").innerText = rank;
        document.getElementById("modal-price").innerText = price;
    });
});

// Đóng modal khi click vào nút đóng
closeButton.addEventListener("click", function () {
    modal.style.display = "none";
});

// Đóng modal khi click ra ngoài modal
window.addEventListener("click", function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
});


function showModal(id, url, rank, price, soTuong, soSkin, ghiChu) {
    document.getElementById('modal-image').src = url;
    document.getElementById('modal-rank').innerText = "Rank: " + rank;
    document.getElementById('modal-price').innerText = price + " VNĐ";
    document.getElementById('modal-so-tuong').innerText = "Số tướng: " + soTuong;
    document.getElementById('modal-so-skin').innerText = "Số skin: " + soSkin;
    document.getElementById('modal-ghi-chu').innerText = ghiChu;
    
    // Lưu thông tin tài khoản vào thuộc tính dữ liệu của modal
    document.getElementById('modal-info').setAttribute('data-account-id', id);
    document.getElementById('modal-info').setAttribute('data-account-price', price);

    document.getElementById('modal').style.display = "block";
}

document.querySelector('.close-button').onclick = function () {
    document.getElementById('modal').style.display = "none";
}

document.getElementById('payment-button').addEventListener('click', function() {
    const accountId = document.getElementById('modal-info').getAttribute('data-account-id');
    const accountPrice = parseFloat(document.getElementById('modal-info').getAttribute('data-account-price').replace(/\./g, '').replace(' VNĐ', ''));

    if (isNaN(accountPrice) || accountId <= 0) {
        alert('Thông tin tài khoản không hợp lệ.');
        return;
    }

    if (confirm('Bạn có chắc chắn muốn thanh toán không?')) {
        fetch('thanhtoan.php', {    
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `accountId=${accountId}&accountPrice=${accountPrice}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            // Refresh the page or update the UI as needed
            window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra khi thực hiện thanh toán.');
        });
    }
});
