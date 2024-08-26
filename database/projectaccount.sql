-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 26, 2024 lúc 08:08 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `projectaccount`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `so_tuong` int(11) DEFAULT NULL,
  `so_skin` int(11) DEFAULT NULL,
  `rank` varchar(20) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `url` text NOT NULL,
  `thongtin` tinyint(1) NOT NULL,
  `taikhoan` varchar(30) NOT NULL,
  `matkhau` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `so_tuong`, `so_skin`, `rank`, `ghi_chu`, `gia`, `url`, `thongtin`, `taikhoan`, `matkhau`) VALUES
(1, 115, 293, 'Bạch kim', 'Có 24 thẻ đổi tên, yorn long thần soái, capheny kimono, uy tín 100%, lữ bố tiệc bể biển, tỷ lệ win 49,7%, số trận 8572, arum  bậc S, nata bậc S, grakk bậc S.', 1900000, 'Imgs/Img1.png', 1, 'AnhTuan1923', 'rW4D8qLl'),
(2, 115, 323, 'Bạch kim', 'Joker có cục tỉnh, 43 thẻ đổi tên, liliana Tân Nguyệt mị li, Flo Hisoka, zephys Inosuke, nhiều skin S+ , SS,  có cúp, 2 đá quý,3 skin EVO', 2500000, 'Imgs/Img2.png', 0, 'BaoNgoc7358', 'z6RqT3Pz'),
(3, 115, 236, 'Tinh anh', 'Uy tín 59, 3 cục tỉnh,  tỉ lệ win  50,8%, 6494 trận, 3 skin valentine, 2 skin evo,  nhiều skin S+,SS, enzo sát quỷ đoàn, 1 thẻ đổi tên', 1800000, 'Imgs/Img3.png', 1, 'ChiBao5621', 'p7DjX4Vt'),
(4, 116, 239, 'Bạch kim', 'Flo Hisoka, lindis đồng phục  Shihasukho, Aya điệp viên ký ức, nhiều skin SS, S+, zephys inosuke.', 1700000, 'Imgs/Img4.png', 1, 'DinhHoang8490', 'v9GjS2Xm'),
(5, 116, 236, 'Tinh anh', 'Uy tín 94, tỷ lệ win 49,9%, 14198 trận, nhiều skin S+, SS,  ngộ không evo, 1 skin quang vinh mùa 2, aya điệp viên ký ức.', 1800000, 'Imgs/Img5.png', 0, 'HaiYen2347', 'y3TpQ6Lz'),
(6, 89, 150, 'Cao thủ', '2796 trận, 94 uy tín, 58,4% tỷ lệ win, 1 cục miền, 3 cục tỉnh, nhiều  skin S+, SS.', 1000000, 'Imgs/Img6.png', 0, 'HongVan3948', 'j8RmF2Vy'),
(7, 115, 216, 'Tinh anh', 'Nakroth quán quân, nakroth siêu việt, aya diệp viên ký ức, nakroth bậc S,  nata nghệ nhân lân.', 1200000, 'Imgs/Img7.png', 0, 'KimAnh6025', 'c2TpV4Rz'),
(8, 115, 204, 'Kim cương', '5196 trận, tỉ lệ win 51,3%, 100 uy tín, nhiều skin S+, 1 skin quán quân.', 1100000, 'Imgs/Img8.png', 0, 'LanAnh7584', 'n1WkD7Zp'),
(9, 115, 202, 'Tinh anh', 'Full bảng ngọc, 100 uy tín, 47,5% tỉ lệ win, 13498 trận, flo Hisoka,  nhiều bậc S, zephys inosuke, lindis shihakusho.', 1500000, 'Imgs/Img9.png', 0, 'MinhTriet4206', 'MinhTriet4206'),
(10, 120, 350, 'Vàng', 'Có 30 thẻ đổi tên, 50 skin hiếm, trang bị đầy đủ, tỷ lệ win 55%, số trận 9500.', 2200000, 'Imgs/Img10.png', 1, 'NhanDuong5643', 'g4RmW8Tp'),
(11, 110, 270, 'Bạch kim', 'Joker có cục tỉnh, 40 thẻ đổi tên, nhiều skin quý, tỷ lệ win 50%, số trận 8000.', 1800000, 'Imgs/Img11.png', 0, 'NgocAnh7321', 'l7PjK3Vw'),
(12, 125, 340, 'Vàng', 'Có 25 thẻ đổi tên, skin S+, nhiều item giá trị, tỷ lệ win 60%, số trận 10000.', 2600000, 'Imgs/Img12.png', 0, 'QuangHieu9610', 'd5TqR8Vm'),
(13, 130, 300, 'Bạch kim', 'Lượng thẻ đổi tên lớn, nhiều skin độc quyền, tỷ lệ win 52%, số trận 8700.', 2000000, 'Imgs/Img13.png', 0, 'QuyenChi2847', 'x2WkG6Rp'),
(14, 135, 330, 'Vàng', 'Có 35 thẻ đổi tên, nhiều skin quý hiếm, tỷ lệ win 58%, số trận 9300.', 2400000, 'Imgs/Img14.png', 1, 'SonLam1349', 'b3TnQ9Lx'),
(15, 140, 310, 'Bạch kim', 'Thẻ đổi tên và skin hiếm, trang bị đầy đủ, tỷ lệ win 50%, số trận 8100.', 1900000, 'Imgs/Img15.png', 1, 'ThaoVy5428', 'k6FjT2Vw'),
(16, 115, 320, 'Vàng', 'Joker có thẻ đổi tên, nhiều skin đặc biệt, tỷ lệ win 57%, số trận 9200.', 2100000, 'Imgs/Img16.png', 0, 'ThienAn7894', 'y8WqR4Vm'),
(17, 125, 330, 'Bạch kim', 'Có nhiều thẻ đổi tên, nhiều skin độc quyền, tỷ lệ win 54%, số trận 8900.', 2300000, 'Imgs/Img17.png', 1, 'ThuMinh6475', 'p1TkD7Qz'),
(18, 120, 340, 'Vàng', 'Có 28 thẻ đổi tên, nhiều skin, tỷ lệ win 55%, số trận 9000.', 2500000, 'Imgs/Img18.png', 0, 'ThuyDung3456', 'c9RmW3Vx'),
(19, 130, 310, 'Bạch kim', 'Thẻ đổi tên và skin quý, tỷ lệ win 53%, số trận 8500.', 2000000, 'Imgs/Img19.png', 0, 'TienPhong5983', 'h4FjT8Lz'),
(20, 140, 300, 'Vàng', 'Có nhiều thẻ đổi tên, trang bị hoàn chỉnh, tỷ lệ win 60%, số trận 9500.', 2700000, 'Imgs/Img20.png', 1, 'TranBao8932', 'n3QkD5Rp'),
(21, 120, 350, 'Vàng', 'Có 30 thẻ đổi tên, 50 skin hiếm, trang bị đầy đủ, tỷ lệ win 55%, số trận 9500.', 2200000, 'Imgs/Img21.png', 1, 'TruongSon7524', 'g6RjT2Vx'),
(22, 110, 270, 'Bạch kim', 'Joker có cục tỉnh, 40 thẻ đổi tên, nhiều skin quý, tỷ lệ win 50%, số trận 8000.', 1800000, 'Imgs/Img22.png', 0, 'VanKhoa2139', 'z1TpQ8Lm'),
(23, 125, 340, 'Vàng', 'Có 25 thẻ đổi tên, skin S+, nhiều item giá trị, tỷ lệ win 60%, số trận 10000.', 2600000, 'Imgs/Img23.png', 1, 'VietAnh4527', 'l7WqR3Vt'),
(24, 130, 300, 'Bạch kim', 'Lượng thẻ đổi tên lớn, nhiều skin độc quyền, tỷ lệ win 52%, số trận 8700.', 2000000, 'Imgs/Img24.png', 0, 'XuanPhong8632', 'j8FkD4Vz'),
(25, 135, 330, 'Vàng', 'Có 35 thẻ đổi tên, nhiều skin quý hiếm, tỷ lệ win 58%, số trận 9300.', 2400000, 'Imgs/Img25.png', 1, 'YenNhi9157', 'v2RmW6Lx'),
(26, 140, 310, 'Bạch kim', 'Thẻ đổi tên và skin hiếm, trang bị đầy đủ, tỷ lệ win 50%, số trận 8100.', 1900000, 'Imgs/Img9.png', 1, '', ''),
(27, 115, 320, 'Vàng', 'Joker có thẻ đổi tên, nhiều skin đặc biệt, tỷ lệ win 57%, số trận 9200.', 2100000, 'Imgs/Img10.png', 0, '', ''),
(28, 125, 330, 'Bạch kim', 'Có nhiều thẻ đổi tên, nhiều skin độc quyền, tỷ lệ win 54%, số trận 8900.', 2300000, 'Imgs/Img11.png', 0, '', ''),
(29, 120, 340, 'Vàng', 'Có 28 thẻ đổi tên, nhiều skin, tỷ lệ win 55%, số trận 9000.', 2500000, 'Imgs/Img12.png', 0, '', ''),
(30, 130, 310, 'Bạch kim', 'Thẻ đổi tên và skin quý, tỷ lệ win 53%, số trận 8500.', 2000000, 'Imgs/Img13.png', 0, '', ''),
(31, 140, 300, 'Vàng', 'Có nhiều thẻ đổi tên, trang bị hoàn chỉnh, tỷ lệ win 60%, số trận 9500.', 2700000, 'Imgs/Img14.png', 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderacc`
--

CREATE TABLE `orderacc` (
  `orderid` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `credit` int(12) NOT NULL,
  `id_account` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `typeuser` varchar(20) DEFAULT NULL,
  `email` text NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `typeuser`, `email`, `credit`) VALUES
(1, 'Thong', '10072004', 'user', 'thong1@gmail.com', 5000000),
(2, 'Hung', '20202024', 'user', 'hung@gmail.com', 4000000),
(3, 'Thong1', 'admin1', 'admin', 'admin1@gmail.com', 1000000000),
(4, 'admin', 'admin', 'admin', 'admin@gmail.com', 10000000),
(5, '1enip', '123456', 'user', '1enip@gmail.com', 10000000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderacc`
--
ALTER TABLE `orderacc`
  ADD PRIMARY KEY (`orderid`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `orderacc`
--
ALTER TABLE `orderacc`
  MODIFY `orderid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
