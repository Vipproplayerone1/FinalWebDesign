-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2024 lúc 09:52 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `finalwebdb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(12) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `pttt` tinyint(1) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `name`, `address`, `tel`, `email`, `total`, `pttt`, `user`) VALUES
(11, 'admin', '123', '123', 'admin@gmail.com', 100000, 0, ''),
(12, 'admin', '123', '456', '123@gmail.com', 100000, 0, ''),
(15, '123', '123', '123', '123', 100000, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(12) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `dongia` int(12) NOT NULL,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(12) NOT NULL,
  `idbill` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `tensp`, `img`, `dongia`, `soluong`, `thanhtien`, `idbill`) VALUES
(11, 'Mens Winter Jacket ', 'aokhoacmuadong.jpg', 300000, 8, 2400000, 10),
(12, 'Womens White Shirt ', 'short jean.jfif', 100000, 1, 100000, 11),
(13, 'Womens White Shirt ', 'short jean.jfif', 100000, 1, 100000, 12),
(14, 'Womens White Shirt ', 'short jean.jfif', 100000, 2, 200000, 13),
(15, 'Womens White Shirt ', 'short jean.jfif', 100000, 1, 100000, 14),
(16, 'Womens White Shirt  ', 'short jean.jfif', 100000, 1, 100000, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `hoten` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sdt` int(12) NOT NULL,
  `ghichu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`hoten`, `email`, `sdt`, `ghichu`) VALUES
('Hoang Nhan Bui', 'nhanthanh535@gmail.com', 0931937000, 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(10) NOT NULL,
  `nhom_id` varchar(11) NOT NULL,
  `tensp` varchar(30) NOT NULL,
  `mota` text NOT NULL,
  `soluong` int(200) NOT NULL,
  `dongia` int(11) NOT NULL,
  `dongiaold` int(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `enable` tinyint(11) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `nhom_id`, `tensp`, `mota`, `soluong`, `dongia`, `dongiaold`, `img`, `enable`, `ghichu`) VALUES
(1, '1', 'Mens Winter Jacket ', 'Genuine Winter Coat   ', 10, 300000, 350000, 'aokhoacmuadong.jpg', 1, 'Genuine Winter Coat   '),
(2, '2', 'Womens White Shirt  ', 'Pro Vip Max Womens White Shirt  ', 5, 100000, 120000, 'short jean.jfif', 1, 'Pro Vip Max Womens White Shirt  '),
(3, '2', 'T-shirt  ', 'Fashionable Printed Short-Sleeved T-shirt for Women  ', 100, 500000, 540000, 'c22601915838fce7af790bcbfc2716dd.jpg', 1, 'Fashionable Printed Short-Sleeved T-shirt for Women  '),
(4, '1', 'Mens Gray Jeans ', 'Mens Gray Jeans  ', 10, 250000, 300000, 'quanjeannam.jpg', 1, 'Mens Gray Jeans  '),
(5, '1', 'Adidas Ultra Boost Shoes ', 'Adidas Ultra Boost Shoes ', 4, 400000, 520000, 'hihi.jpg', 1, 'Adidas Ultra Boost Shoes '),
(6, '1', 'Men T - shirt ', 'Men T - shirt ', 30, 20000, 250000, 'aothunnam.jpg', 1, 'Men T - shirt ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_nhom`
--

CREATE TABLE `sanpham_nhom` (
  `id` int(10) NOT NULL,
  `tennhom` varchar(30) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham_nhom`
--

INSERT INTO `sanpham_nhom` (`id`, `tennhom`, `ghichu`) VALUES
(1, 'Mens Fashion', 'Specializing in Selling Mens Clothes'),
(2, 'Womens Fashion', 'Specializing in Selling Womens Clothes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tendangnhap` varchar(30) NOT NULL,
  `matkhau` varchar(30) DEFAULT NULL,
  `hoten` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `enable` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`tendangnhap`, `matkhau`, `hoten`, `email`, `enable`) VALUES
('hoangnhanadmin', '7814', 'Bui Hoang Nhan', 'nhan.bui2104009@vnuk.edu.vn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `nhom_id` int(11) NOT NULL DEFAULT 0,
  `tentintuc` varchar(30) NOT NULL,
  `tennguoidang` varchar(30) NOT NULL,
  `ngaydang` int(11) NOT NULL,
  `mota` text NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `nhom_id`, `tentintuc`, `tennguoidang`, `ngaydang`, `mota`, `img`) VALUES
(8, 1, 'Coordinate mens clothes with a coat', 'Quang Nghia', 1, 'Coordinating winter outfits with a trench coat is always the top choice of guys. This is an indispensable item in a mans wardrobe because of its elegance and creates the wearers own style. Although this outfit is simple, it is extremely beneficial when combined with other outfits. You can combine it with rolled-up pants and classic leather shoes to create an elegant but no less dynamic style. Wearing a shirt inside and a coat outside whether walking around or going to school creates a polite and neat style.', 'phoidonam3.jpg'),
(9, 1, 'Combine mens clothes with a vest', 'Shoujo', 2, 'The vest is an outfit associated with class and fashion, and is a style of clothing that is very popular with men every winter because it brings freedom and elegance when combined with other outfits.', 'phoidogile.jpg'),
(10, 2, 'Tips for dressing for skinny men', 'Sora', 3, 'An extremely important rule for thin people is to wear clothes that fit their body. Many people often misunderstand that thin people should wear loose clothes to hide their flaws, but in fact this only makes you thinner. You should choose jeans that fit your body, not too tight and not too loose. In addition, you can also combine them with a long-sleeved shirt to help hide your veiny arms.', 'meo1.jpg'),
(11, 2, 'Tips for dressing for fat men', 'Sola', 5, 'Similar to skinny people, fat people should also choose clothes that fit their body best. You can wear a shirt or t-shirt as you like as long as it fits your body. Additionally, you can also try combining a V-neck shirt with fabric pants or straight-leg jeans. Note that choosing dark pants will help hide the flaws in your big, rough legs. If you choose shorts, you should also be careful not to choose pants that go above your knees because they will make you look shorter.', 'meo2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc_nhom`
--

CREATE TABLE `tintuc_nhom` (
  `id` int(10) NOT NULL,
  `tennhom` varchar(30) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc_nhom`
--

INSERT INTO `tintuc_nhom` (`id`, `tennhom`, `ghichu`) VALUES
(1, 'Mens fashion coordination', 'genuine '),
(2, 'Good Tip', 'That Tip'),
(3, 'Events and Exhibitions', 'Hi Hi '),
(4, 'Brand and Design', 'perfect'),
(5, 'Care and Accessories', 'ninnin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tendangnhap`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc_nhom`
--
ALTER TABLE `tintuc_nhom`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
