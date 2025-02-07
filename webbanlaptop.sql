-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2023 lúc 04:53 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanlaptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproduct`
--

CREATE TABLE `adproduct` (
  `ma_loaisp` varchar(30) NOT NULL,
  `ma_sp` varchar(50) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `gianhap` int(20) NOT NULL,
  `giaxuat` int(20) NOT NULL,
  `khuyenmai` int(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  `mota_sp` varchar(500) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `adproduct`
--

INSERT INTO `adproduct` (`ma_loaisp`, `ma_sp`, `tensp`, `hinhanh`, `gianhap`, `giaxuat`, `khuyenmai`, `soluong`, `mota_sp`, `create_date`) VALUES
('Dell', 'Dell', 'Laptop Dell Inspiron', 'DELL.jpg', 20000000, 25000000, 1000000, 90, 'CPU i7 - 1360PRAM 16GB DDR5Ổ cứng SSD 512GB NVMeCard Intel Iris Xe GraphicsM.Hình 14.0     ', '2023-12-25'),
('Gigabyte', 'Gigabyte', 'Laptop Gaming Gigabyte', 'Gigabyte.jpg', 20000000, 27000000, 2000000, 88, 'CPU Intel Core i7-1260pRAM 16GB LPDDR5Ổ cứng SSD 512GB NVMeCard Intel Iris Xe GraphicsM.Hình 17 inch 2K 100% DCI-P3     ', '2023-12-25'),
('ASUS', 'HP', 'Laptop HP OMEN', 'HP.jpg', 17000000, 23000000, 1000000, 89, 'CPU M2 (8-Core CPU)RAM 8GB DDR5Ổ cứng SSD 256GBCard 8-Core GPUM.Hình 13.6', '2023-12-25'),
('ASUS', 'LG', 'Laptop LG Gram', 'LG.jpg', 25000000, 32000000, 2000000, 100, 'CPU Intel Core i7-1260pRAM 16GB LPDDR5Ổ cứng SSD 1TB NVMeCard Intel Iris Xe GraphicsM.Hình 17 inch 2K 100% DCI-P3', '2023-12-25'),
('Macbook', 'Macbook', 'Macbook Air M2 2023', 'Macbook.jpg', 17000000, 26000000, 1000000, 99, 'CPU: Intel Core i7-1260P\r\nRAM: 16GB LPDDR5\r\nỔ cứng: 512GB NVMe SSD\r\nCard đồ họa: Intel Iris Xe Graphics\r\nMàn hình: 17 inch, độ phân giải 2K, hỗ trợ 100% DCI-P3     ', '2023-12-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproducttype`
--

CREATE TABLE `adproducttype` (
  `ma_loaisp` varchar(50) NOT NULL,
  `ten_loaisp` varchar(100) NOT NULL,
  `mota_loaisp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `adproducttype`
--

INSERT INTO `adproducttype` (`ma_loaisp`, `ten_loaisp`, `mota_loaisp`) VALUES
('ASUS', 'Laptop ASUS TUF GAMING', 'Laptop ASUS TUF GAMING là một dòng sản phẩm máy tính xách tay chuyên dụng cho game thủ của hãng ASUS. Được thiết kế để đáp ứng nhu cầu cao cấp của người chơi game, dòng này thường mang lại hiệu suất mạnh mẽ, khả năng làm mát tốt và thiết kế mang tính chất chơi game.'),
('Dell', 'Laptop Dell Inspiron', 'Laptop Dell Inspiron là một dòng sản phẩm máy tính xách tay của hãng Dell, nổi tiếng với sự linh hoạt, hiệu suất ổn định và thiết kế đẹp mắt. Dòng Inspiron của Dell thường được thiết kế để phục vụ nhu cầu đa dạng của người dùng từ các ứng dụng văn phòng đến giải trí đa phương tiện.'),
('Gigabyte', 'Laptop Gaming Gigabyte', 'Laptop Gaming Gigabyte là một dòng sản phẩm máy tính xách tay của hãng Gigabyte, được thiết kế đặc biệt để đáp ứng nhu cầu cao cấp của người chơi game. Dòng laptop này thường mang lại hiệu suất mạnh mẽ, tính năng đặc biệt và thiết kế thời trang.'),
('HP', 'Laptop HP OMEN', 'Laptop HP OMEN là một dòng sản phẩm máy tính xách tay chuyên dụng cho người chơi game của hãng HP. Được thiết kế với sự chú ý đặc biệt đến hiệu suất cao và trải nghiệm chơi game, HP OMEN thường mang lại các tính năng độc đáo và thiết kế thời trang.'),
('LG', 'Laptop LG Gram', '\r\nLaptop LG Gram là một dòng sản phẩm máy tính xách tay của hãng LG, nổi tiếng với thiết kế siêu nhẹ, pin lâu dài và màn hình chất lượng. Dòng laptop này thường được hướng đến người dùng cần di chuyển nhiều và đề cao tính di động.'),
('Macbook', 'Macbook Air M12 2023', 'Laptop Macbook Air M2 2023 8GB/256GB/10 Core GPU MQKU3SA/A Vàng được trang bị Chip M2 hoàn toàn mới của Apple, sở hữu hiệu suất làm việc vượt trội và tốc độ cực kỳ mạnh mẽ. Chip Apple M2 chính là điểm cải tiến đáng giá giúp bạn thực hiện mọi tác vụ một cách mượt mà và hiệu quả hơn.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `canceledgoods`
--

CREATE TABLE `canceledgoods` (
  `ma_hoadon` varchar(100) NOT NULL,
  `ma_khachhang` varchar(100) NOT NULL,
  `tenkhachhang` varchar(100) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tinhthanhpho` varchar(200) NOT NULL,
  `quanhuyen` varchar(200) NOT NULL,
  `diachigiaohang` varchar(200) NOT NULL,
  `giaxuat` int(11) NOT NULL,
  `createdate` date NOT NULL,
  `trangthai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `canceledgoods`
--

INSERT INTO `canceledgoods` (`ma_hoadon`, `ma_khachhang`, `tenkhachhang`, `masp`, `tensp`, `soluong`, `phone`, `email`, `tinhthanhpho`, `quanhuyen`, `diachigiaohang`, `giaxuat`, `createdate`, `trangthai`) VALUES
('HD118999', 'KH427624', 'nguyễn việt dũng Hủy đơn hàng', 'Dell', 'Laptop Dell Inspiron', 7, 498534, 'dungnuyenjr@gmail.com', 'sơn la', 'sơn la', 'hoàng mai', 25000000, '2023-12-25', 'Hủy đơn hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `ma_sp` varchar(100) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `giaxuat` int(11) NOT NULL,
  `khuyenmai` int(11) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `ma_khachhang` varchar(100) NOT NULL,
  `tenkhachhang` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tinhthanhpho` varchar(100) NOT NULL,
  `quanhuyen` varchar(100) NOT NULL,
  `diachigiaohang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`ma_khachhang`, `tenkhachhang`, `phone`, `email`, `tinhthanhpho`, `quanhuyen`, `diachigiaohang`) VALUES
('KH738626', 'nguyễn việt dũng đang xử lý', 98765, 'dung@gmail.com', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaa', 'aaaaaaa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangkithanhvien`
--

CREATE TABLE `dangkithanhvien` (
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `gioitinh` varchar(10) NOT NULL,
  `quoctich` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sothich` varchar(50) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dangkithanhvien`
--

INSERT INTO `dangkithanhvien` (`fullname`, `username`, `password`, `email`, `phone`, `gioitinh`, `quoctich`, `address`, `sothich`, `level`) VALUES
('admin', 'admin', '12345', 'admin@gmail.com', 123456789, 'Nam', 'Việt Nam', 'sơn la', 'sothichCD', 'Quantri'),
('Nguuyen Viet Dung', 'dunggnuyen', '123', 'dungnuyenjr09@gmail.com', 983775973, 'Nam', 'Việt Nam', 'Ha Noi', 'sothichCD', 'Nguoidung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailedpurchasehistory`
--

CREATE TABLE `detailedpurchasehistory` (
  `ma_hoadon` varchar(100) NOT NULL,
  `ma_khachhang` varchar(100) NOT NULL,
  `tenkhachhang` varchar(100) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tinhthanhpho` varchar(200) NOT NULL,
  `quanhuyen` varchar(200) NOT NULL,
  `diachigiaohang` varchar(200) NOT NULL,
  `giaxuat` int(11) NOT NULL,
  `createdate` date NOT NULL,
  `trangthai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detailedpurchasehistory`
--

INSERT INTO `detailedpurchasehistory` (`ma_hoadon`, `ma_khachhang`, `tenkhachhang`, `masp`, `tensp`, `soluong`, `phone`, `email`, `tinhthanhpho`, `quanhuyen`, `diachigiaohang`, `giaxuat`, `createdate`, `trangthai`) VALUES
('HD905990', 'KH81482', 'nguyễn việt dũng đơn thành côn', 'Dell', 'Laptop Dell Inspiron', 1, 983775973, 'dungnuyenjr09@gmail.com', 'hà nội', 'Hà đông', 'trung tâm thomas edison', 25000000, '2023-12-25', 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oderdetail`
--

CREATE TABLE `oderdetail` (
  `ma_hoadon` varchar(10) NOT NULL,
  `masp` varchar(20) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `giaxuat` int(11) NOT NULL,
  `khuyenmai` int(11) NOT NULL,
  `hinhanh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oderdetail`
--

INSERT INTO `oderdetail` (`ma_hoadon`, `masp`, `tensp`, `soluong`, `giaxuat`, `khuyenmai`, `hinhanh`) VALUES
('HD118999', 'Dell', 'Laptop Dell Inspiron', 7, 25000000, 1000000, 'DELL.jpg'),
('HD324421', 'HP', 'Laptop HP OMEN', 1, 23000000, 1000000, 'HP.jpg'),
('HD905990', 'Dell', 'Laptop Dell Inspiron', 1, 25000000, 1000000, 'DELL.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `ma_hoadon` varchar(30) NOT NULL,
  `ma_khachhang` varchar(30) NOT NULL,
  `tenkhachhang` varchar(30) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `createdate` date NOT NULL,
  `trangthai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`ma_hoadon`, `ma_khachhang`, `tenkhachhang`, `tongtien`, `createdate`, `trangthai`) VALUES
('HD324421', 'KH738626', 'nguyễn việt dũng đang xử lý', 22000000, '2023-12-25', 'Chưa thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productreviews`
--

CREATE TABLE `productreviews` (
  `ma_hoadon` varchar(100) NOT NULL,
  `ma_khachhang` varchar(100) NOT NULL,
  `tenkhachhang` varchar(100) NOT NULL,
  `tong_giaxuat` varchar(100) NOT NULL,
  `createdate` date NOT NULL,
  `rating` varchar(20) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productreviews`
--

INSERT INTO `productreviews` (`ma_hoadon`, `ma_khachhang`, `tenkhachhang`, `tong_giaxuat`, `createdate`, `rating`, `comment`) VALUES
('HD905990', 'KH81482', 'nguyễn việt dũng đơn thành côn', '25000000', '2023-12-25', 'good', 'hàng chất lượng cao tốt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliermanagement`
--

CREATE TABLE `suppliermanagement` (
  `tennhacungcap` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachinhacungcap` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliermanagement`
--

INSERT INTO `suppliermanagement` (`tennhacungcap`, `phone`, `email`, `diachinhacungcap`, `date`) VALUES
('ASUS', 192391923, 'dung@gmail.com', 'hà đông', '0000-00-00'),
('Dell', 213123, 'aaaa@thanh.com', 'hà nội', '0000-00-00'),
('Gigabyte', 98346422, 'gg@gnail.com', 'cầu giấy', '0000-00-00'),
('HP', 3848323, 'hp@gmail.com', 'hồ gươm', '0000-00-00'),
('LG', 192391923, 'dung123@gmail.com', 'hồ tây', '0000-00-00'),
('Macbook', 2147483647, 'MC@gmail.com', 'đông anh', '0000-00-00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `adproduct`
--
ALTER TABLE `adproduct`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Chỉ mục cho bảng `adproducttype`
--
ALTER TABLE `adproducttype`
  ADD PRIMARY KEY (`ma_loaisp`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ma_khachhang`);

--
-- Chỉ mục cho bảng `dangkithanhvien`
--
ALTER TABLE `dangkithanhvien`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `oderdetail`
--
ALTER TABLE `oderdetail`
  ADD PRIMARY KEY (`ma_hoadon`,`masp`,`tensp`,`soluong`,`giaxuat`,`khuyenmai`,`hinhanh`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ma_hoadon`);

--
-- Chỉ mục cho bảng `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`ma_khachhang`);

--
-- Chỉ mục cho bảng `suppliermanagement`
--
ALTER TABLE `suppliermanagement`
  ADD PRIMARY KEY (`tennhacungcap`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
