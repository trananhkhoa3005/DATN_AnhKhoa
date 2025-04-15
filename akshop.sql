-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 17, 2025 lúc 10:01 AM
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
-- Cơ sở dữ liệu: `akshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_hd`
--

CREATE TABLE `chitiet_hd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MaDH` bigint(20) UNSIGNED NOT NULL,
  `MaSP` bigint(20) UNSIGNED NOT NULL,
  `SLMua` int(11) NOT NULL,
  `DonGiaMua` decimal(18,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_hd`
--

INSERT INTO `chitiet_hd` (`id`, `MaDH`, `MaSP`, `SLMua`, `DonGiaMua`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 40000000, '2025-01-16 10:07:45', '2025-01-16 10:07:45'),
(2, 2, 4, 1, 35390000, '2025-01-16 10:11:20', '2025-01-16 10:11:20'),
(3, 3, 6, 1, 16490000, '2025-01-16 10:19:42', '2025-01-16 10:19:42'),
(4, 4, 4, 1, 35390000, '2025-01-16 10:21:34', '2025-01-16 10:21:34'),
(5, 5, 1, 1, 35000000, '2025-01-16 10:22:55', '2025-01-16 10:22:55'),
(6, 6, 2, 1, 40000000, '2025-01-16 10:24:06', '2025-01-16 10:24:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hangs`
--

CREATE TABLE `don_hangs` (
  `MaDH` bigint(20) UNSIGNED NOT NULL,
  `MaND` bigint(20) UNSIGNED NOT NULL,
  `TenND` varchar(255) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `SDT` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `NgayDH` date NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 8,
  `PTTT` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hangs`
--

INSERT INTO `don_hangs` (`MaDH`, `MaND`, `TenND`, `DiaChi`, `SDT`, `Email`, `NgayDH`, `TrangThai`, `PTTT`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, '12', '0905587316', 'trananhkhoa3005@gmail.com', '2025-01-16', 2, 1, '2025-01-16 10:07:45', '2025-01-16 10:07:45'),
(2, 2, NULL, '23', '0905587316', 'trananhkhoa3005@gmail.com', '2025-01-16', 2, 1, '2025-01-16 10:11:20', '2025-01-16 10:11:20'),
(3, 2, NULL, '43', '0905587316', 'trananhkhoa3005@gmail.com', '2025-01-16', 2, 1, '2025-01-16 10:19:42', '2025-01-16 10:19:42'),
(4, 2, NULL, '78', '0905587316', 'trananhkhoa3005@gmail.com', '2025-01-16', 2, 1, '2025-01-16 10:21:34', '2025-01-16 10:21:34'),
(5, 2, NULL, '78', '0905587316', 'trananhkhoa3005@gmail.com', '2025-01-16', 2, 2, '2025-01-16 10:22:55', '2025-01-16 10:22:55'),
(6, 2, NULL, '78', '0905587316', 'trananhkhoa3005@gmail.com', '2025-01-16', 8, 3, '2025-01-16 10:24:06', '2025-01-16 10:24:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_sx`
--

CREATE TABLE `hang_sx` (
  `MaHSX` bigint(20) UNSIGNED NOT NULL,
  `TenHSX` varchar(255) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_sx`
--

INSERT INTO `hang_sx` (`MaHSX`, `TenHSX`, `MoTa`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'Apple', '2025-01-13 00:52:51', '2025-01-15 09:20:49'),
(2, 'SamSung', 'SamSung', '2025-01-13 00:53:57', '2025-01-13 00:53:57'),
(3, 'Windows', 'Windows', NULL, NULL),
(4, 'Dell', 'Dell', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sp`
--

CREATE TABLE `loai_sp` (
  `MaLoai` bigint(20) UNSIGNED NOT NULL,
  `TenLoai` varchar(255) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_sp`
--

INSERT INTO `loai_sp` (`MaLoai`, `TenLoai`, `MoTa`, `created_at`, `updated_at`) VALUES
(1, 'Điện Thoại', 'Điện Thoại', '2025-01-13 00:56:10', '2025-01-15 09:55:47'),
(2, 'LapTop', 'LapTop', '2025-01-13 00:56:10', '2025-01-13 00:56:10'),
(3, 'Tai Nghe', 'Tai nghe không dây', '2025-01-09 01:14:35', '2025-01-13 01:14:35'),
(4, 'Phụ kiện', 'Phụ kiện', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2025_01_09_200853_create_trang_thai_table', 1),
(10, '2025_01_09_205646_create_chitiet_dh_table', 1),
(11, '2025_01_09_200853_create_status_table', 2),
(14, '2014_10_12_000000_create_users_table', 3),
(15, '2014_10_12_100000_create_password_resets_table', 3),
(16, '2019_08_19_000000_create_failed_jobs_table', 3),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(18, '2025_01_09_195925_create_loai_sp_table', 3),
(19, '2025_01_09_204652_create_hang_sx_table', 3),
(20, '2025_01_09_204745_create_san_phams_table', 3),
(21, '2025_01_09_205606_create_don_hangs_table', 3),
(22, '2025_01_16_163134_create_status_table', 3),
(23, '2025_01_16_164725_create_chitiet_hd_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_phams`
--

CREATE TABLE `san_phams` (
  `MaSP` bigint(20) UNSIGNED NOT NULL,
  `TenSP` varchar(255) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `MaLoai` bigint(20) UNSIGNED NOT NULL,
  `MaHSX` bigint(20) UNSIGNED NOT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `DonGia` int(11) DEFAULT NULL,
  `SLTon` int(11) DEFAULT NULL,
  `PTGiamGia` int(11) DEFAULT NULL,
  `GhiChu` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_phams`
--

INSERT INTO `san_phams` (`MaSP`, `TenSP`, `HinhAnh`, `MaLoai`, `MaHSX`, `MoTa`, `DonGia`, `SLTon`, `PTGiamGia`, `GhiChu`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 16 PRM', 'ip16prm.jpg', 1, 1, 'Apple', 35000000, 20, 5, NULL, NULL, NULL),
(2, 'Mac Book', '5365_laptop_apple_macbook_air_15_mqkq3sa_a.jpg', 2, 1, NULL, 40000000, 20, 5, NULL, NULL, NULL),
(3, 'Tai Nghe Không Dây', '687567.png', 3, 1, NULL, 5000000, 20, NULL, NULL, NULL, '2025-01-12 18:15:59'),
(4, 'Samsung Galaxy S24 Ultra', 's24.jpg', 1, 2, NULL, 35390000, NULL, NULL, NULL, '2025-01-12 18:04:09', '2025-01-12 18:04:09'),
(5, 'Iphone 14 PRM 256GB', '1737002327_ip14.jpg', 1, 1, NULL, 22499000, NULL, NULL, NULL, '2025-01-15 14:38:47', '2025-01-15 14:38:47'),
(6, 'Laptop Dell Inspiron 15 3520', '1737004342_dell.jpg', 2, 4, NULL, 16490000, NULL, NULL, NULL, '2025-01-15 15:12:22', '2025-01-15 15:12:22'),
(7, 'Chuột Apple Magic Mouse 3 2024', '1737048532_chuot-apple-magic-mouse-3_2__3.webp', 4, 1, NULL, 1790000, NULL, NULL, NULL, '2025-01-16 10:28:52', '2025-01-16 10:28:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id`, `ten_status`, `created_at`, `updated_at`) VALUES
(1, 'Đã xác nhận', NULL, NULL),
(2, 'Chờ lấy hàng', NULL, NULL),
(3, 'Đang giao hàng', NULL, NULL),
(4, 'Đã giao hàng', NULL, NULL),
(5, 'Đã thanh toán', NULL, NULL),
(6, 'Đã hủy', NULL, NULL),
(8, 'Chờ xác nhận', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `MaND` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `SDT` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phanquyen` int(11) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`MaND`, `name`, `DiaChi`, `SDT`, `email`, `email_verified_at`, `phanquyen`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '0978780783', 'admin@gmail.com', NULL, 0, '$2y$10$XAD.HKxqUUdJvXAiQQTODOZuY04.VrrusMmhCofcnzThlOE9j4y/K', NULL, '2025-01-16 10:03:37', '2025-01-16 10:03:37'),
(2, 'Trần Anh Khoa', NULL, '0905587316', 'trananhkhoa3005@gmail.com', NULL, 1, '$2y$10$iR0672WgmKu/ZiUjNFZFCuyqpmNIt6dXTQmWT4poZtjlBXOT0hvcO', NULL, '2025-01-16 10:07:06', '2025-01-16 10:07:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiet_hd`
--
ALTER TABLE `chitiet_hd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitiet_hd_madh_foreign` (`MaDH`),
  ADD KEY `chitiet_hd_masp_foreign` (`MaSP`);

--
-- Chỉ mục cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`MaDH`),
  ADD KEY `don_hangs_mand_foreign` (`MaND`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `hang_sx`
--
ALTER TABLE `hang_sx`
  ADD PRIMARY KEY (`MaHSX`);

--
-- Chỉ mục cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `san_phams_maloai_foreign` (`MaLoai`),
  ADD KEY `san_phams_mahsx_foreign` (`MaHSX`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`MaND`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiet_hd`
--
ALTER TABLE `chitiet_hd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `MaDH` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hang_sx`
--
ALTER TABLE `hang_sx`
  MODIFY `MaHSX` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `MaLoai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `MaSP` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `MaND` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_hd`
--
ALTER TABLE `chitiet_hd`
  ADD CONSTRAINT `chitiet_hd_madh_foreign` FOREIGN KEY (`MaDH`) REFERENCES `don_hangs` (`MaDH`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitiet_hd_masp_foreign` FOREIGN KEY (`MaSP`) REFERENCES `san_phams` (`MaSP`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `don_hangs_mand_foreign` FOREIGN KEY (`MaND`) REFERENCES `users` (`MaND`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_mahsx_foreign` FOREIGN KEY (`MaHSX`) REFERENCES `hang_sx` (`MaHSX`) ON DELETE CASCADE,
  ADD CONSTRAINT `san_phams_maloai_foreign` FOREIGN KEY (`MaLoai`) REFERENCES `loai_sp` (`MaLoai`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
