-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2022 lúc 02:58 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet`
--

CREATE TABLE `chitiet` (
  `id_dh` int(255) NOT NULL,
  `id_sp` int(255) NOT NULL,
  `sl` int(255) NOT NULL,
  `tong_tien` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiet`
--

INSERT INTO `chitiet` (`id_dh`, `id_sp`, `sl`, `tong_tien`) VALUES
(2, 2, 2, 345000),
(2, 1, 5, 2000000),
(3, 1, 3, 1000000),
(5, 3, 4, 6000000),
(3, 1, 2, 400000),
(6, 24, 1, 40000000),
(7, 16, 2, 5000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_dh` int(255) NOT NULL,
  `id_nv` int(255) NOT NULL,
  `id_kh` int(255) NOT NULL,
  `tong_tien` int(255) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_dh`, `id_nv`, `id_kh`, `tong_tien`, `ngay_tao`) VALUES
(2, 1, 1, 300999, '2022-05-04 16:59:00'),
(3, 3, 1, 900555, '2022-06-17 03:00:00'),
(5, 2, 5, 3000000, '2022-04-10 08:39:29'),
(6, 2, 7, 4000000, '2022-03-02 09:00:03'),
(7, 3, 5, 5000000, '2022-02-09 09:00:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` int(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `hoten`, `sdt`, `email`, `diachi`) VALUES
(1, 'Võ Thị Như', '0935678244', 'vothinhu23@gmail.com', 'Hà Nội'),
(5, 'Mai Thị Tuyết', '0945673222', 'tuyet122@gmail.com', 'Củ Chi'),
(7, 'Võ Tùng', '0978348331', 'votung@gmail.com', 'Vũng Tàu'),
(8, 'Minh Lan Hoài', '0876567444', 'ngonhulan3457@gmail.com', 'Nha Trang'),
(11, '3', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id_nv` int(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `code` int(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id_nv`, `firstName`, `lastName`, `email`, `image`, `password`, `gender`, `code`, `status`, `user_type`) VALUES
(1, 'Quỳnh Quỳnh', 'Võ ', 'voquynh496@gmail.com', 'ava.jpg', '1234', 'Nữ', 0, 'Đã xác minh', 'Nhân viên'),
(2, 'Mai', 'Trần', 'tranmai122@gmail.com', 'quan.png', '1234', 'Nam', 0, 'Đã xác minh', 'Nhân viên'),
(3, 'Nhi', 'Phạm', 'nhinh444@gmail.com', 'Khuyên tai.jpg', '444444', 'Nam', 0, 'Đã xác minh', 'Nhân viên'),
(5, 'Nguyệt Anh', 'Phạm', 'nguyetanh.23112002@gmail.com', 'nonnoibat.jpg', '1217a9a7d29aee6701f5ca21a9c705c0', 'Nữ', 0, 'Đã xác minh', 'Admin'),
(13, 'Thị Thanh Chúc', 'Lê', 'chuc105@gmail.com', 'ava.png', '', 'Nữ', 0, '', 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(255) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gia` int(255) NOT NULL,
  `sale` int(255) NOT NULL,
  `mota` longtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `sl` int(255) NOT NULL,
  `ngay_tao` date NOT NULL,
  `ngay_capnhat` date NOT NULL,
  `da_ban` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten_sp`, `image`, `gia`, `sale`, `mota`, `type`, `color`, `size`, `sl`, `ngay_tao`, `ngay_capnhat`, `da_ban`) VALUES
(1, 'Áo khoác jeans kiểu bombe', 'AO3.0.jpeg', 450, 0, '', 'Áo', 'Trắng', 'S', 56, '2022-06-16', '0000-00-00', 4),
(2, 'Áo khoác jeans kiểu bombe', 'dam1.1.jfif', 560999, 0, '', 'Áo', 'Trắng', 'S', 55, '2022-06-15', '0000-00-00', 4),
(3, 'Áo sơ mi vàng', 'AO1.0.jpeg', 88888, 8888, '88888888888888', 'Quần', 'Trắng', 'M', 4, '2022-06-18', '0000-00-00', 0),
(16, 'Áo hai dây trắng', 'AO4.1.jpeg', 300000, 300000, '<p>3</p>\r\n', 'Áo', 'Trắng', 'M', 300, '2022-06-18', '0000-00-00', 0),
(18, 'Quần Short', 'Quần short 2.2.jpeg', 456478, 34543543, '<p>4234</p>\r\n', 'Áo', 'Trắng', 'S', 234, '2022-06-18', '0000-00-00', 0),
(22, '1', 'aobc1.webp', 1, 1, '', 'Quần', 'Trắng', 'S', 1, '2022-06-19', '0000-00-00', 0),
(24, 'Áo ngắn tay', 'AO5.1.jpeg', 2300000, 2300000, '<p>2222222</p>\r\n', 'Áo', 'Đen', 'S', 444, '2022-06-19', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuvienanh`
--

CREATE TABLE `thuvienanh` (
  `id_sp` int(255) NOT NULL,
  `id_image` int(255) NOT NULL,
  `ten_anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thuvienanh`
--

INSERT INTO `thuvienanh` (`id_sp`, `id_image`, `ten_anh`) VALUES
(1, 1, '111111'),
(1, 2, '111111'),
(24, 15, 'AO51655631215.jpeg'),
(24, 16, 'AO51655631215.jpeg'),
(24, 17, 'AO51655631215.png'),
(24, 18, 'AO51655631215.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tt` int(255) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `mota` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `ngay_capnhat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id_tt`, `tieu_de`, `mota`, `image`, `ngay_tao`, `ngay_capnhat`) VALUES
(1, 'Bỏ túi ngay một số kiểu túi xách “không thể thiếu” trong tủ đồ của nàng', '<B>1.Túi Tote dáng to</B><br>\r\nTúi Tote được biết đến là một kiểu túi cân hết tất cả những vật dụng mà nàng cần mang theo vì form dáng rộng đặc trưng. Với thiết kế vô cùng đơn giản song túi vẫn mang trong mình một sức cuốn hút khó có thể cưỡng lại được.Tú', 'tintuc5.jpg', '2022-06-16 15:58:38', '2022-06-16 15:58:38'),
(4, 'Cập nhật ngay 4 Combo phụ kiện với màu sắc trend', '4', 'AO4.2.jpeg', '2022-06-17 13:39:06', '2022-06-19 18:49:18'),
(6, 'LỰA CHỌN PHỤ KIỆN DU LỊCH CHO NÀNG', '2', 'aobc2.webp', '2022-06-19 18:36:49', '2022-06-18 18:49:31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiet`
--
ALTER TABLE `chitiet`
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `chitiet_ibfk_1` (`id_dh`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_dh`),
  ADD KEY `donhang_ibfk_1` (`id_kh`),
  ADD KEY `donhang_ibfk_2` (`id_nv`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id_nv`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`);

--
-- Chỉ mục cho bảng `thuvienanh`
--
ALTER TABLE `thuvienanh`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tt`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_dh` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_kh` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id_nv` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `thuvienanh`
--
ALTER TABLE `thuvienanh`
  MODIFY `id_image` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tt` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet`
--
ALTER TABLE `chitiet`
  ADD CONSTRAINT `chitiet_ibfk_1` FOREIGN KEY (`id_dh`) REFERENCES `donhang` (`id_dh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiet_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`id_nv`) REFERENCES `nhanvien` (`id_nv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thuvienanh`
--
ALTER TABLE `thuvienanh`
  ADD CONSTRAINT `thuvienanh_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
