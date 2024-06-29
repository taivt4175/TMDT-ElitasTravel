-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2024 lúc 04:30 PM
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
-- Cơ sở dữ liệu: `webdulich`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietct`
--

CREATE TABLE `chitietct` (
  `id_user` varchar(10) NOT NULL,
  `masothue` varchar(100) NOT NULL,
  `trust` text NOT NULL,
  `bangchung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietct`
--

INSERT INTO `chitietct` (`id_user`, `masothue`, `trust`, `bangchung`) VALUES
('CT00017', '', '1', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgioyeucau`
--

CREATE TABLE `chitietgioyeucau` (
  `id_gio` int(10) NOT NULL,
  `madichvu` varchar(255) NOT NULL,
  `id_congty` varchar(255) NOT NULL,
  `sl` int(11) NOT NULL,
  `ngayyeucau` date NOT NULL,
  `ngaybatdau` date NOT NULL,
  `dathanhtoan` tinyint(1) NOT NULL DEFAULT 0,
  `daxacnhan` tinyint(1) NOT NULL,
  `rate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietgioyeucau`
--

INSERT INTO `chitietgioyeucau` (`id_gio`, `madichvu`, `id_congty`, `sl`, `ngayyeucau`, `ngaybatdau`, `dathanhtoan`, `daxacnhan`, `rate`) VALUES
(1, 'DLVINHSANG2024', 'CT00017', 1, '2024-06-18', '2024-06-18', 1, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethdv`
--

CREATE TABLE `chitiethdv` (
  `id_user` varchar(10) NOT NULL,
  `tourguide_img` text NOT NULL DEFAULT '0',
  `ngayvaolam` date DEFAULT curdate(),
  `luongcoban` int(7) NOT NULL DEFAULT 2000000,
  `heso` float NOT NULL DEFAULT 1,
  `thuongthem` int(11) NOT NULL DEFAULT 0,
  `tourguide_code` int(10) NOT NULL DEFAULT 0,
  `trust` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethdv`
--

INSERT INTO `chitiethdv` (`id_user`, `tourguide_img`, `ngayvaolam`, `luongcoban`, `heso`, `thuongthem`, `tourguide_code`, `trust`) VALUES
('TG00011', '', '2024-05-12', 2500000, 1, 0, 0, 0),
('TG00012', '', '2024-05-12', 2500000, 1, 0, 0, 0),
('TG00015', '', '2024-05-27', 2000000, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietkh`
--

CREATE TABLE `chitietkh` (
  `id_user` varchar(10) NOT NULL,
  `sl_ecoin` int(10) NOT NULL DEFAULT 0,
  `stk_momo` varchar(20) NOT NULL DEFAULT '0',
  `stk_bidv` varchar(20) NOT NULL DEFAULT '0',
  `mastercard` varchar(20) NOT NULL DEFAULT '0',
  `first` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietkh`
--

INSERT INTO `chitietkh` (`id_user`, `sl_ecoin`, `stk_momo`, `stk_bidv`, `mastercard`, `first`) VALUES
('KH00003', 88119999, 'Chưa thiết lập', 'Chưa thiết lập', 'Chưa thiết lập', 0),
('KH00004', 100000000, '0', '0', '0', 0),
('KH00005', 100000000, '0', '0', '0', 0),
('KH00006', 125000, 'Chưa thiết lập', 'Chưa thiết lập', 'Chưa thiết lập', 0),
('KH00009', 0, 'Chưa thiết lập', 'Chưa thiết lập', 'Chưa thiết lập', 0),
('KH00010', 0, '0', '0', '0', 0),
('KH00014', 0, 'Chưa thiết lập', 'Chưa thiết lập', 'Chưa thiết lập', 0),
('KH00016', 0, '0', '0', '0', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietks`
--

CREATE TABLE `chitietks` (
  `id_user` varchar(10) NOT NULL,
  `masothue` varchar(15) NOT NULL,
  `bangchung` varchar(255) NOT NULL,
  `trust` tinyint(1) NOT NULL DEFAULT 0,
  `diachi` varchar(100) NOT NULL,
  `couple` int(2) NOT NULL DEFAULT 1,
  `single` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietks`
--

INSERT INTO `chitietks` (`id_user`, `masothue`, `bangchung`, `trust`, `diachi`, `couple`, `single`) VALUES
('KS00013', '', '', 0, '', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietnh`
--

CREATE TABLE `chitietnh` (
  `id_user` varchar(10) NOT NULL,
  `sl_ban` int(4) NOT NULL,
  `masothue` int(10) NOT NULL,
  `trust` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietnhaxe`
--

CREATE TABLE `chitietnhaxe` (
  `id_user` varchar(10) NOT NULL,
  `4cho` int(3) NOT NULL DEFAULT 1,
  `16cho` int(3) NOT NULL DEFAULT 1,
  `32cho` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `madichvu` varchar(255) NOT NULL,
  `tendichvu` text NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `motadichvu` text NOT NULL,
  `motachitiet` text NOT NULL,
  `gia` varchar(10) NOT NULL,
  `donvitinh` varchar(100) NOT NULL,
  `tinhtrang` varchar(100) NOT NULL,
  `hinhanh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`madichvu`, `tendichvu`, `id_user`, `motadichvu`, `motachitiet`, `gia`, `donvitinh`, `tinhtrang`, `hinhanh`) VALUES
('DLVINHSANG2024', 'Gói tham quan Khu du lịch Vinh Sang', 'CT00017', 'Miễn phí các trò chơi, hỗ trợ ăn uống tại Khu du lịch', 'Chơi miễn phí:<br>Cưỡi đà điểu.<br>Câu cá sấu.<br>Tát ao bắt cá<br>Trượt cỏ.<br>Hỗ trợ giảm 50% cho hóa đơn ăn trưa tại Khu du lịch.', '990000', 'Người', 'Còn gói', '../img/uploads/DLVINHSANG2024_CT00017_du-lich-vinh-long-khu-du-lich-sinh-thai-vinh-sang-5.jpg;../img/uploads/DLVINHSANG2024_CT00017_khudulichvinhsang.jpg;../img/uploads/DLVINHSANG2024_CT00017_truot-co.jpeg;');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemdulich`
--

CREATE TABLE `diemdulich` (
  `id_ddl` varchar(5) NOT NULL,
  `tenddl` varchar(255) NOT NULL,
  `motachitiet` text NOT NULL,
  `id_tinh` varchar(2) NOT NULL,
  `id_qh` varchar(3) NOT NULL,
  `img` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `diemdulich`
--

INSERT INTO `diemdulich` (`id_ddl`, `tenddl`, `motachitiet`, `id_tinh`, `id_qh`, `img`) VALUES
('00001', 'Văn Thánh Miếu', '', '86', '855', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioyeucau`
--

CREATE TABLE `gioyeucau` (
  `id_gio` int(10) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gioyeucau`
--

INSERT INTO `gioyeucau` (`id_gio`, `id_user`) VALUES
(1, 'KH00003'),
(2, 'KH00004'),
(3, 'KH00005'),
(4, 'KH00006'),
(7, 'KH00009'),
(5, 'KH00010'),
(6, 'KH00014'),
(8, 'KH00016');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `id_qh` varchar(3) NOT NULL,
  `id_tinh` varchar(2) DEFAULT NULL,
  `tenqh` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quanhuyen`
--

INSERT INTO `quanhuyen` (`id_qh`, `id_tinh`, `tenqh`) VALUES
('842', '84', 'Thành phố Trà Vinh'),
('844', '84', 'Huyện Càng Long'),
('845', '84', 'Huyện Cầu Kè'),
('846', '84', 'Huyện Tiểu Cần'),
('847', '84', 'Huyện Châu Thành'),
('848', '84', 'Huyện Cầu Ngang'),
('849', '84', 'Huyện Trà Cú'),
('850', '84', 'Huyện Duyên Hải'),
('851', '84', 'Thị xã Duyên Hải'),
('855', '86', 'Thành phố Vĩnh Long'),
('857', '86', 'Huyện Long Hồ'),
('858', '86', 'Huyện Mang Thít'),
('859', '86', 'Huyện Vũng Liêm'),
('860', '86', 'Huyện Tam Bình'),
('861', '86', 'Thị xã Bình Minh'),
('862', '86', 'Huyện Trà Ôn'),
('863', '86', 'Huyện Bình Tân'),
('899', '91', 'Thành phố Rạch Giá'),
('900', '91', 'Thành phố Hà Tiên'),
('902', '91', 'Huyện Kiên Lương'),
('903', '91', 'Huyện Hòn Đất'),
('904', '91', 'Huyện Tân Hiệp'),
('905', '91', 'Huyện Châu Thành'),
('906', '91', 'Huyện Giồng Riềng'),
('907', '91', 'Huyện Gò Quao'),
('908', '91', 'Huyện An Biên'),
('909', '91', 'Huyện An Minh'),
('910', '91', 'Huyện Vĩnh Thuận'),
('911', '91', 'Thành phố Phú Quốc'),
('912', '91', 'Huyện Kiên Hải'),
('913', '91', 'Huyện U Minh Thượng'),
('914', '91', 'Huyện Giang Thành'),
('916', '92', 'Quận Ninh Kiều'),
('917', '92', 'Quận Ô Môn'),
('918', '92', 'Quận Bình Thủy'),
('919', '92', 'Quận Cái Răng'),
('923', '92', 'Quận Thốt Nốt'),
('924', '92', 'Huyện Vĩnh Thạnh'),
('925', '92', 'Huyện Cờ Đỏ'),
('926', '92', 'Huyện Phong Điền'),
('927', '92', 'Huyện Thới Lai'),
('954', '95', 'Thành phố Bạc Liêu'),
('956', '95', 'Huyện Hồng Dân'),
('957', '95', 'Huyện Phước Long'),
('958', '95', 'Huyện Vĩnh Lợi'),
('959', '95', 'Thị xã Giá Rai'),
('960', '95', 'Huyện Đông Hải'),
('961', '95', 'Huyện Hoà Bình'),
('964', '96', 'Thành phố Cà Mau'),
('966', '96', 'Huyện U Minh'),
('967', '96', 'Huyện Thới Bình'),
('968', '96', 'Huyện Trần Văn Thời'),
('969', '96', 'Huyện Cái Nước'),
('970', '96', 'Huyện Đầm Dơi'),
('971', '96', 'Huyện Năm Căn'),
('972', '96', 'Huyện Phú Tân'),
('973', '96', 'Huyện Ngọc Hiển');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh`
--

CREATE TABLE `tinh` (
  `id_tinh` varchar(2) NOT NULL,
  `tentinh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh`
--

INSERT INTO `tinh` (`id_tinh`, `tentinh`) VALUES
('84', 'Trà Vinh'),
('86', 'Vĩnh Long'),
('91', 'Kiên Giang'),
('92', 'Cần Thơ'),
('95', 'Bạc Liêu'),
('96', 'Cà Mau');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `id_tour` varchar(15) NOT NULL,
  `tentour` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `hoten` char(255) NOT NULL DEFAULT '',
  `gioitinh` tinyint(1) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `sdt` varchar(11) DEFAULT NULL,
  `cccd` char(12) DEFAULT NULL,
  `password` char(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `wrongpass` int(1) NOT NULL DEFAULT 0,
  `account_status` int(1) NOT NULL DEFAULT 1,
  `id_qh` varchar(3) DEFAULT NULL,
  `id_tinh` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `hoten`, `gioitinh`, `ngaysinh`, `sdt`, `cccd`, `password`, `email`, `wrongpass`, `account_status`, `id_qh`, `id_tinh`) VALUES
('AD00001', 'Vũ Thanh Tài', 1, '2002-01-01', '0373081162', '0', '21232f297a57a5a743894a0e4a801fc3', '0', 0, 1, '0', NULL),
('CT00017', 'Khu du lịch Vinh Sang', NULL, NULL, '12364564563', NULL, '10b6662337692ade58f1d52af27f4bf1', 'vinhsang@gmail.com', 0, 1, NULL, NULL),
('KH00003', 'Lưu Đinh Quốc Trung', 0, '2002-12-01', '0373086621', 'Chưa thiết l', 'd8c744a9febd3b9c58d6274588a7f492', 'trungldq@gmail.com', 0, 1, '0', NULL),
('KH00004', 'Nguyễn Hữu Thọ', 1, '2003-05-26', '0355733881', '0', '0f8b4331ede5e303f3dc97a070ec8a30', 'thont@gmail.com', 0, 1, '0', NULL),
('KH00005', 'Trần Hoàng Tân', 1, '2002-03-21', '01900571553', '0', 'b2b5322c253b238ebdd01031da73d019', 'tanth@gmail.com', 0, 1, '0', NULL),
('KH00006', 'Nguyễn Phúc Minh Tâm', 0, '2002-10-19', '0999999123', 'Chưa thiết l', '9ff7f4d65cdca11ff0080c10780add7b', 'tamnpm@gmail.com', 0, 1, '0', NULL),
('KH00009', 'Trần Minh Hồng', 0, '2002-05-15', '0293847561', 'Chưa thiết l', '46dca03cb525a2ccb38c7c2154f93c72', 'tranminhong@gmail.com', 0, 1, '0', NULL),
('KH00010', 'Nguyễn Đặng Ngọc Hân', 0, '2003-03-25', '0123266278', '0', '498c2a5a94fd43052b320534241bb4e2', 'hanndn@gmail.com', 0, 1, '0', NULL),
('KH00014', 'Phan Thị Ngọc Diệp', 0, '2024-04-01', '02344445444', 'Chưa thiết l', '202cb962ac59075b964b07152d234b70', 'diepptn@gmail.com', 0, 1, '0', NULL),
('KH00016', 'Phạm Hồng Tuyết', 0, '1993-11-10', '0939123456', NULL, '2d123f92d581f1e269dc8f68e00fb852', 'tuyetph@gmail.com', 0, 1, NULL, NULL),
('KS00013', 'Khách sạn Cửu Long', 0, '0000-00-00', '1234567878', '0', '07a8abe3aa8434df93726838c4ff9731', 'cuulonghotelvl@gmail.com', 0, 1, '0', NULL),
('TG00011', 'Lưu Đinh Quốc Trung', 0, '2002-12-17', '09192345643', 'Chưa thiết l', 'd8c744a9febd3b9c58d6274588a7f492', 'luudinhquoctrung@gmail.com', 0, 1, '0', NULL),
('TG00012', 'Trương Hoàng Vinh', 0, '2002-02-01', '09192345648', 'Chưa thiết l', 'db0eb2a07fa0cd465288326dd1da76a8', 'truonghoangvinh@gmail.com', 0, 1, '0', NULL),
('TG00015', 'Lâm Minh Trung', 1, '1990-11-06', '12344556677', '0', 'd8c744a9febd3b9c58d6274588a7f492', 'trunglm@gmail.com', 0, 1, '0', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `bsx` varchar(11) NOT NULL,
  `sl_cho` int(2) NOT NULL,
  `booking` tinyint(1) NOT NULL DEFAULT 0,
  `id_request` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`bsx`, `sl_cho`, `booking`, `id_request`) VALUES
('29B-956.44', 4, 0, ''),
('30H-435.88', 4, 0, ''),
('31S-769.48', 4, 0, ''),
('32C-840.60', 32, 0, ''),
('32M-414.93', 16, 0, ''),
('33D-127.62', 4, 0, ''),
('33F-387.52', 32, 0, ''),
('34F-576.84', 4, 0, ''),
('36A-780.70', 4, 0, ''),
('37F-354.65', 16, 0, ''),
('37P-221.24', 32, 0, ''),
('37P-385.22', 16, 0, ''),
('39S-429.62', 16, 0, ''),
('40D-285.80', 32, 0, ''),
('40T-603.74', 4, 0, ''),
('45S-846.63', 32, 0, ''),
('48F-290.32', 16, 0, ''),
('49D-604.85', 32, 0, ''),
('49R-320.35', 16, 0, ''),
('52M-724.71', 32, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeucaudichvu`
--

CREATE TABLE `yeucaudichvu` (
  `id_request` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `soluong` int(11) NOT NULL,
  `ngayyeucau` date NOT NULL,
  `tinhtrang` int(1) NOT NULL,
  `madichvu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietct`
--
ALTER TABLE `chitietct`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `chitietgioyeucau`
--
ALTER TABLE `chitietgioyeucau`
  ADD KEY `id_gio` (`id_gio`),
  ADD KEY `chitietgioyeucau_ibfk_2` (`madichvu`);

--
-- Chỉ mục cho bảng `chitiethdv`
--
ALTER TABLE `chitiethdv`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `chitietkh`
--
ALTER TABLE `chitietkh`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `chitietks`
--
ALTER TABLE `chitietks`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `chitietnh`
--
ALTER TABLE `chitietnh`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `chitietnhaxe`
--
ALTER TABLE `chitietnhaxe`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`madichvu`);

--
-- Chỉ mục cho bảng `diemdulich`
--
ALTER TABLE `diemdulich`
  ADD KEY `id_tinh` (`id_tinh`),
  ADD KEY `id_qh` (`id_qh`);

--
-- Chỉ mục cho bảng `gioyeucau`
--
ALTER TABLE `gioyeucau`
  ADD PRIMARY KEY (`id_gio`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`id_qh`),
  ADD KEY `id_tinh` (`id_tinh`);

--
-- Chỉ mục cho bảng `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`id_tinh`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_ibfk_1` (`id_tinh`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`bsx`);

--
-- Chỉ mục cho bảng `yeucaudichvu`
--
ALTER TABLE `yeucaudichvu`
  ADD KEY `madichvu` (`madichvu`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `gioyeucau`
--
ALTER TABLE `gioyeucau`
  MODIFY `id_gio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietct`
--
ALTER TABLE `chitietct`
  ADD CONSTRAINT `chitietct_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietgioyeucau`
--
ALTER TABLE `chitietgioyeucau`
  ADD CONSTRAINT `chitietgioyeucau_ibfk_1` FOREIGN KEY (`id_gio`) REFERENCES `gioyeucau` (`id_gio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietgioyeucau_ibfk_2` FOREIGN KEY (`madichvu`) REFERENCES `dichvu` (`madichvu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitiethdv`
--
ALTER TABLE `chitiethdv`
  ADD CONSTRAINT `chitiethdv_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietkh`
--
ALTER TABLE `chitietkh`
  ADD CONSTRAINT `chitietkh_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietks`
--
ALTER TABLE `chitietks`
  ADD CONSTRAINT `chitietks_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietnh`
--
ALTER TABLE `chitietnh`
  ADD CONSTRAINT `chitietnh_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diemdulich`
--
ALTER TABLE `diemdulich`
  ADD CONSTRAINT `diemdulich_ibfk_1` FOREIGN KEY (`id_tinh`) REFERENCES `tinh` (`id_tinh`),
  ADD CONSTRAINT `diemdulich_ibfk_2` FOREIGN KEY (`id_qh`) REFERENCES `quanhuyen` (`id_qh`);

--
-- Các ràng buộc cho bảng `gioyeucau`
--
ALTER TABLE `gioyeucau`
  ADD CONSTRAINT `gioyeucau_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD CONSTRAINT `quanhuyen_ibfk_1` FOREIGN KEY (`id_tinh`) REFERENCES `tinh` (`id_tinh`);

--
-- Các ràng buộc cho bảng `yeucaudichvu`
--
ALTER TABLE `yeucaudichvu`
  ADD CONSTRAINT `yeucaudichvu_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
