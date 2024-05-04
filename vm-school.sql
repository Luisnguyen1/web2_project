-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 02, 2024 lúc 11:20 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vm-school`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `MaGV` varchar(255) NOT NULL,
  `TenGV` varchar(255) NOT NULL,
  `SDT` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `GioiThieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`MaGV`, `TenGV`, `SDT`, `Email`, `GioiThieu`) VALUES
('TE1222', 'Nguyễn Hoàng Luis', '0987732321', 'LuisTeacher@vmschool.com', 'Giáo viên Nguyễn Hoàng Luis là một trong những giáo viên xuất sắc nhất của học viện công nghệ VM-School'),
('TE1234', 'Nguyễn Thị Ngọc Ánh', '0932123323', 'AnhTeacher@vmschool.com', 'Giáo viên Nguyễn Thị Ngọc Ánh là một trong những giáo viên xuất sắc nhất của học viện công nghệ VM-School'),
('TE8658', 'Nguyễn Văn Mạnh', '0397161120', 'ManhTeacher@vmschool.com', 'Giáo viên Nguyễn Văn Mạnh là một trong những giáo viên xuất sắc nhất của học viện công nghệ VM-School');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `MaKhoaHoc` varchar(255) NOT NULL,
  `TenKhoaHoc` varchar(255) NOT NULL,
  `Noidung` varchar(255) NOT NULL,
  `PicLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`MaKhoaHoc`, `TenKhoaHoc`, `Noidung`, `PicLink`) VALUES
('3DGAME1', 'Lập trình Game 3D & Metaverse', 'Phát triển tư duy ứng dụng, sáng tạo cá tính và nuôi dưỡng tinh thần doanh nhân công nghệ trong thời đại 4.0; Theo chuẩn Kiến thức Khoa học máy tính CSTA cho K12 của Mỹ', 'https://teky-prod.sgp1.digitaloceanspaces.com/teky-edu-vn/media/C-PA-711-2020BLGcourse_instances/course_instances/2022-06-03course_instances/_DSC7099.JPG'),
('Robotics1', 'Khám Phá Robotics Cùng Lego Wedo 2.0', 'Phát triển tư duy ứng dụng, sáng tạo cá tính và nuôi dưỡng tinh thần doanh nhân công nghệ trong thời đại 4.0; Theo chuẩn Kiến thức Khoa học máy tính CSTA cho K12 của Mỹ', 'https://teky-prod.sgp1.digitaloceanspaces.com/teky-edu-vn/media/C-RB-1218-2020TGVVTMcourse_instances/course_instances/2022-06-03course_instances/_DSC5858.JPG'),
('WEBSITE1', 'Siêu nhân Lập trình Web', 'Phát triển tư duy ứng dụng, sáng tạo cá tính và nuôi dưỡng tinh thần doanh nhân công nghệ trong thời đại 4.0; Theo chuẩn Kiến thức Khoa học máy tính CSTA cho K12 của Mỹ', 'https://teky-prod.sgp1.digitaloceanspaces.com/teky-edu-vn/media/C-PA-1218-2020SNLTWcourse_instances/course_instances/2022-05-31course_instances/_DSC6701.JPG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `MaLH` varchar(255) NOT NULL,
  `TenLH` varchar(255) NOT NULL,
  `MaGV` varchar(255) NOT NULL,
  `MaKhoaHoc` varchar(255) NOT NULL,
  `NgayKhaiGiang` date NOT NULL,
  `GioHoc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`MaLH`, `TenLH`, `MaGV`, `MaKhoaHoc`, `NgayKhaiGiang`, `GioHoc`) VALUES
('CLASS1', 'Siêu nhân lập trình Web', 'TE8658', 'WEBSITE1', '2024-03-27', '10:00 - 12:00 Sunday'),
('CLASS2', 'Thiết kế 3D cùng Maker Empire', 'TE8658', '3DGAME1', '2024-03-20', '16:00 - 20:00 Satuday'),
('CLASS3', 'Khám phá Robotics Wedo 2.0', 'TE8658', '3DGAME1', '2024-03-20', '8:00 - 10:00 Monday');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`MaGV`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`MaKhoaHoc`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`MaLH`),
  ADD KEY `lophoc_makhoahoc_foreign` (`MaKhoaHoc`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_makhoahoc_foreign` FOREIGN KEY (`MaKhoaHoc`) REFERENCES `khoahoc` (`MaKhoaHoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
