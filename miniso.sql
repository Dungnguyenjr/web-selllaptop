-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 04, 2024 lúc 10:22 PM
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
-- Cơ sở dữ liệu: `miniso`
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
('Mỹ phẩm tráng điểm dụng cụ làm', 'Băng đô rửa mặt', 'Băng đô rửa mặt', '1.jpg', 20000, 40000, 10000, 999, 'Tên SP: Băng đô rửa mặtNK & PP: Công ty TNHH MTV Miniso Việt Nam. ĐC: Lầu 7, 184 Nam Kỳ Khởi Nghĩa, Phường 06, Quận 03, Thành phố Hồ Chí Minh.Điện thoại: 028 39322778Xuất Xứ: Trung QuốcBarcode: 4518562412118     ', '2024-02-26'),
('Mỹ phẩm tráng điểm dụng cụ làm', 'Bông tắm hình thỏ ( hồng)', 'Bông tắm hình thỏ ( hồng)', '2.jpg', 20000, 50000, 0, 1000, 'Tên SP: Bông tắm hình thỏ ( hồng)\r\nNK & PP: Công ty TNHH MTV Miniso Việt Nam. ĐC: Lầu 7, 184 Nam Kỳ Khởi Nghĩa, Phường 06, Quận 03, Thành phố Hồ Chí Minh.Điện thoại: 028 39322482\r\nXuất Xứ: Trung Quốc\r\nBarcode: 4518562410312     ', '2024-02-26'),
('Đồ gia dụng', 'gấu bơ', 'gấu bơ', 'anh bơ.jpg', 100000, 70000, 0, 990, 'Tên SP :Thú bông Mini gấu bơ\r\nThành Phần :Shell:95%polyester,5%elastane\r\nBarcode :6941447596685     ', '2024-02-26'),
('Gấu', 'Gấu dâu', 'Gấu dâu', 'z5195749489676_7f8bbade6a1a991493b2b87ed537ef82.jpg', 100000, 150000, 0, 997, 'Tên SP:Thú bông Gấu dâu\r\nThành Phần :Decoration:100%polyester; Body:93%polyester,7%elastane\r\nBarcode :6941447598849', '2024-02-26'),
('Gấu', 'gấu gà', 'gấu gà', 'gà.jpg', 70000, 100000, 0, 1000, 'Tên SP :Thú bông gấu gà\r\nThành Phần :Shell:95%polyester,5%elastane\r\nBarcode :6941447596685', '2024-02-26'),
('Gấu', 'Gấu nâu', 'Gấu nâu', 'gấu nâu.jpg', 100000, 70000, 0, 1000, 'Tên SP:Thú bông Mini Gấu nâu\r\nThành Phần :Decoration:100%polyester; Body:93%polyester,7%elastane\r\nBarcode :6941447598849     ', '2024-02-26'),
('Gấu', 'gấu ong', 'gấu ong', 'gấu ong.jpg', 70000, 50000, 0, 1000, 'Tên SP :Thú bông gấu ong\r\nThành Phần :Shell:95%polyester,5%elastane\r\nBarcode :6941447596685', '2024-02-26'),
('Mỹ phẩm tráng điểm dụng cụ làm', 'Gương bỏ túi 2 mặt pink panther', 'Gương bỏ túi 2 mặt pink panther', '5.jpg', 10000, 20000, 0, 1000, 'Tên SP: Gương bỏ túi 2 mặt pink pantherNK & PP: Công ty TNHH MTV Miniso Việt Nam. ĐC: Lầu 7, 184 Nam Kỳ Khởi Nghĩa, Phường 06, Quận 03, Thành phố Hồ Chí Minh.Điện thoại: 028 39324710Xuất Xứ: Trung QuốcBarcode: 4519792443118     ', '2024-02-26'),
('Đồ gia dụng', 'Hộp đựng đồ lót 4 ô ( xám) Hộp đựng đồ lót 4 ô ( x', 'Hộp đựng đồ lót 4 ô ( xám) Hộp đựng đồ lót 4 ô ( xám)', 'z5195740547776_f562ddd9b7ad0fbccae8f00b723ec599.jpg', 80000, 60000, 0, 1000, '     ', '2024-02-26'),
('Đồ gia dụng', 'Hộp đựng kim chỉ', 'Hộp đựng kim chỉ', 'z5195740547745_59deb6a0db38575b856c5965fb16f05f.jpg', 20000, 40000, 0, 1000, '     ', '2024-02-26'),
('Đồ gia dụng', 'Khăn giấy 18 gói', 'Khăn giấy 18 gói', 'z5195740546803_7c0faf7ac6de882d67b6b0b9ed86cf71.jpg', 50000, 30000, 0, 0, 'Tên SP: Khăn giấy 18 gói\r\nNK & PP: Công ty TNHH MTV Miniso Việt Nam. ĐC: Lầu 7, 184 Nam Kỳ Khởi Nghĩa, Phường 06, Quận 03, Thành phố Hồ Chí Minh.Điện thoại: 028 39321274\r\nXuất Xứ: Trung Quốc\r\nBarcode: 4891403010217     ', '2024-02-26'),
('Mỹ phẩm tráng điểm dụng cụ làm', 'Lược dành cho tóc xoăn', 'Lược dành cho tóc xoăn', '4.jpg', 20000, 30000, 0, 1000, 'Tên SP: Lược dành cho tóc xoăn\r\nNK & PP: Công ty TNHH MTV Miniso Việt Nam. ĐC: Lầu 7, 184 Nam Kỳ Khởi Nghĩa, Phường 06, Quận 03, Thành phố Hồ Chí Minh.Điện thoại: 028 39321458\r\nXuất Xứ: Trung Quốc\r\nBarcode: 4517332378418     ', '2024-02-26'),
('Mỹ phẩm tráng điểm dụng cụ làm', 'Tăm bông cuống giấy (200 pcs)', 'Tăm bông cuống giấy (200 pcs)', '3.jpg', 20000, 30000, 0, 1000, 'Tên SP: Tăm bông cuống giấy (200 pcs)\r\nNK & PP: Công ty TNHH MTV Miniso Việt Nam. ĐC: Lầu 7, 184 Nam Kỳ Khởi Nghĩa, Phường 06, Quận 03, Thành phố Hồ Chí Minh.Điện thoại: 028 39323824\r\nXuất Xứ: Trung Quốc\r\nBarcode: 4519932427114     ', '2024-02-26'),
('Đồ gia dụng', 'Thùng đựng rác mini', 'Thùng đựng rác mini', 'a.jpg', 70000, 50000, 0, 1000, '     ', '2024-02-26'),
('Đồ gia dụng', 'Túi đựng đồ dạng treo 4 tầng (hồng)', 'Túi đựng đồ dạng treo 4 tầng (hồng)', 'z5195740505201_4b6f74edec6a7c3d08b0cc1205d3bd88.jpg', 70000, 50000, 0, 1000, '     ', '2024-02-26');

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
('Đồ gia dụng', 'Đồ gia dụng', 'những sản phầm trong nhà'),
('Đồ theo mùa', 'Đồ theo mùa', 'mũ và dép'),
('Gấu', 'Gấu bông', 'mềm mại'),
('Mỹ phẩm tráng điểm dụng cụ làm đẹp', 'Mỹ phẩm tráng điểm dụng cụ làm đẹp', 'sản phẩm làm đẹp'),
('Phụ kiện kĩ thuật số đồ điện tử', 'Phụ kiện kĩ thuật số đồ điện tử', 'những sản phảm về điện'),
('Phụ kiện thời trang và túi xách', 'Phụ kiện thời trang và túi xách', 'túi thời trang thắt lưng ví'),
('Thực phẩm', 'Thực phẩm', 'Đồ ăn '),
('Trang sức', 'Trang sức', 'Trang sức làm đẹp'),
('Văn phòng phẩm/ Qùa lưu niệm', 'Văn phòng phẩm/ Qùa lưu niệm', 'đồ dùng văn phòng');

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
('HD788708', 'KH846655', 'nguyễn việt dũng', 'gấu bơ', 'gấu bơ', 1, 983775973, 'dungnuyenjr09@gmail.com', 'hà nội', 'Hà đông', 'trung tâm thomas edison', 70000, '2024-03-05', 'Hủy đơn hàng');

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
('KH665270', 'Mỹ linh', 12431234, 'linh@gmail.com', 'HÀ NỘI', 'HÀ NỘI', 'SƠN TÂY'),
('KH74213', '435345', 345345, '3453', '45345', '345', '345345'),
('KH775135', '123', 123, '123', '123', '123', '123'),
('KH925032', '12', 12, '12', '12', '12', '12');

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
('admin', 'admin', '12345', 'admin@gmail.com', 123456789, 'Nam', 'Việt Nam', 'Hà Nội', 'sothichCD', 'Quantri'),
('Nguuyen Viet Dungggggg', 'dunggnuyen', '123', 'dungnuyenjr09@gmail.com', 983775973, 'Nam', 'Viá»‡t Nam', 'Ha Noi', 'sothichCD', 'Nguoidung'),
('Vũ Thị Thanh Hảo', 'thanhhao', '12345', 'thanhhaovu19@gmail.com', 383825812, 'Nữ', 'Việt Nam', 'Hà Nội', 'sothichCD', 'Nguoidung');

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
('HD996936', 'KH121284', 'nguyễn việt dũng', 'gấu bơ', 'gấu bơ', 1, 983775973, 'dungnuyenjr09@gmail.com', 'hà nội', 'Hà đông', 'trung tâm thomas edison', 70000, '2024-03-05', 'Đã thanh toán'),
('HD137421', 'KH489093', 'Vũ Thị Thanh Hảo', 'Gấu dâu', 'Gấu dâu', 1, 983775973, 'hao@gmail.com', 'hà nội', 'Hà đông', 'trung tâm thomas edison', 150000, '2024-03-05', 'Đã thanh toán'),
('HD607647', 'KH4229', 'trần thị mĩ linh', 'Bông tắm hình thỏ ( ', 'Bông tắm hình thỏ ( hồng)', 2, 2147483647, 'linh@gmail.com', 'hà nội', 'aaaaaaaaaaaa', 'hoàng mai', 50000, '2024-03-05', 'Đã thanh toán'),
('HD607647', 'KH4229', 'trần thị mĩ linh', 'gấu bơ', 'gấu bơ', 2, 2147483647, 'linh@gmail.com', 'hà nội', 'aaaaaaaaaaaa', 'hoàng mai', 70000, '2024-03-05', 'Đã thanh toán');

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
('HD996936', 'gấu bơ', 'gấu bơ', 1, 70000, 0, 'anh bơ.jpg'),
('HD788708', 'gấu bơ', 'gấu bơ', 1, 70000, 0, 'anh bơ.jpg'),
('HD137421', 'Gấu dâu', 'Gấu dâu', 1, 150000, 0, 'z5195749489676_7f8bbade6a1a991493b2b87ed537ef82.jpg'),
('HD607647', 'Bông tắm hình thỏ ( ', 'Bông tắm hình thỏ ( hồng)', 2, 50000, 0, '2.jpg'),
('HD607647', 'gấu bơ', 'gấu bơ', 2, 70000, 0, 'anh bơ.jpg');

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
('HD996936', 'KH121284', 'nguyễn việt dũng', '70000', '2024-03-05', 'good', 'tốt'),
('HD951651', 'KH128611', 'nguyễn việt dũng', '40000', '2024-02-27', 'good', 'tốt quá'),
('HD987963', 'KH179950', 'sdfsdfsdf', '150000', '2024-03-05', 'good', 'ádfasfasf'),
('HD137421', 'KH489093', 'Vũ Thị Thanh Hảo', '150000', '2024-03-05', 'good', 'hàng tốt'),
('HD905990', 'KH81482', 'nguyễn việt dũng đơn thành côn', '25000000', '2023-12-25', 'good', 'hàng chất lượng cao tốt'),
('HD986707', 'KH89227', '1', '50000', '0000-00-00', 'good', 'tốt lắm '),
('HD826964', 'KH900183', '', '70000', '0000-00-00', 'good', 'ádasdasdasd');

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
('AE NHÀ GẤU', 192391923, 'dung@gmail.com', 'hà đông', '0000-00-00'),
('GẤU PINK', 213123, 'aaaa@thanh.com', 'hà nội', '0000-00-00'),
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
