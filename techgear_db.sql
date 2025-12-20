-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 19 Des 2025 pada 07.12
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techgear_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Keyboard'),
(2, 'Mouse'),
(3, 'Monitor'),
(4, 'Headphone'),
(5, 'Desk'),
(6, 'Chair'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` enum('pending','processing','completed','archived') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `phone`, `address`, `total`, `status`, `created_at`) VALUES
(2, 'Muhammad Fadil', '81348726973', 'jln Gerbang dayaku', 8660000, 'archived', '2025-12-17 06:13:30'),
(4, 'Trump', '083726383', 'USA', 3100000, 'archived', '2025-12-17 06:57:24'),
(5, 'Putin', '07264748848', 'Rusia', 490000, 'archived', '2025-12-17 07:00:29'),
(7, 'Ujang', '087474643', 'Mars', 100000, 'archived', '2025-12-19 00:18:14'),
(8, 'Joko', '097266363', 'Samarinda', 2440000, 'completed', '2025-12-19 05:52:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `price`, `qty`) VALUES
(1, 2, 'Keychron K6 Wireless', 1250000, 1),
(2, 2, 'Mouse Fantech X9 Thor', 210000, 1),
(3, 2, 'Secretlab TITAN Evo 2022', 7200000, 1),
(6, 4, 'Razer BlackShark V2', 1550000, 2),
(7, 5, 'Webcam Full HD 1080p', 490000, 1),
(10, 7, 'Mini Keyboard Bleza', 100000, 1),
(11, 8, 'ASUS TUF Gaming VG249Q', 2350000, 1),
(12, 8, 'Mouse Predator Pro M162', 90000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `image`) VALUES
(1, 1, 'Rexus Legionare MX10', 459000, '/uploads/products/rexus.webp'),
(2, 1, 'Keychron K6 Wireless', 1250000, '/uploads/products/keychron.webp'),
(3, 1, 'Logitech G213 Prodigy', 899000, '/uploads/products/keyboard-logitech.webp'),
(4, 1, 'Keyboard Royal Kludge RK61', 750000, '/uploads/products/royal.webp'),
(5, 1, 'Fantech MAXFIT67 MK858', 680000, '/uploads/products/keyboard-fantech.webp'),
(6, 2, 'Logitech G102 Lightsync', 250000, '/uploads/products/mouse-logitech.webp'),
(7, 2, 'Razer DeathAdder Essential', 380000, '/uploads/products/razer.webp'),
(8, 2, 'Mouse Fantech X9 Thor', 210000, '/uploads/products/mouse-fantech.webp'),
(9, 2, 'Mouse SteelSeries Rival 3', 520000, '/uploads/products/rival.webp'),
(10, 2, 'Logitech MX Master 3S', 1499000, '/uploads/products/mouse-logitechmx.webp'),
(11, 3, 'LG UltraGear 24GN600', 2100000, '/uploads/products/lg.webp'),
(12, 3, 'ASUS TUF Gaming VG249Q', 2350000, '/uploads/products/asus.webp'),
(13, 3, 'Samsung Odyssey G3 24”', 2450000, '/uploads/products/samsung.webp'),
(14, 3, 'Acer Nitro VG270 FHD IPS', 2650000, '/uploads/products/acer.webp'),
(15, 3, 'BenQ Zowie XL2411K 24”', 3100000, '/uploads/products/benq.webp'),
(16, 6, 'Secretlab TITAN Evo 2022', 7200000, '/uploads/products/secrettlab.webp'),
(17, 6, 'Rexus Gaming Chair RGC103', 1950000, '/uploads/products/chair-rexus.webp'),
(18, 6, 'Fantech GC-181 Ergonomic', 1650000, '/uploads/products/chair-fantech.webp'),
(19, 6, 'DXRacer Formula Series', 4500000, '/uploads/products/dxracer.webp'),
(20, 6, 'AutoFull Pink Bunny Edition', 5200000, '/uploads/products/autofull.webp'),
(21, 4, 'Razer BlackShark V2', 1550000, '/uploads/products/headphone-razer.webp'),
(22, 4, 'Logitech G Pro X', 1850000, '/uploads/products/headphone-logitech.webp'),
(23, 4, 'HyperX Cloud II', 1450000, '/uploads/products/hyper.webp'),
(24, 4, 'SteelSeries Arctis 5', 1650000, '/uploads/products/steel.webp'),
(25, 4, 'Corsair HS80 RGB', 2100000, '/uploads/products/corsair.webp'),
(26, 5, 'Meja Gaming Eureka Z60', 2900000, '/uploads/products/eureka.webp'),
(27, 5, 'Meja Minimalis Kayu Jati', 850000, '/uploads/products/meja.webp'),
(28, 5, 'AOR Meja Gaming RGB', 1750000, '/uploads/products/aor.webp'),
(29, 5, 'Oxihom F1301120HM Meja Gaming', 480000, '/uploads/products/oxihom.webp'),
(30, 5, 'Informa Kardel Meja Gaming', 1650000, '/uploads/products/informa.webp'),
(31, 7, 'Mousepad XXL RGB', 250000, '/uploads/products/mousepad.webp'),
(32, 7, 'Lampu Meja LED Ambient', 180000, '/uploads/products/lampu.webp'),
(33, 7, 'Arm Mic Adjustable', 320000, '/uploads/products/arm.webp'),
(34, 7, 'Webcam Full HD 1080p', 490000, '/uploads/products/webcam.webp'),
(35, 7, 'USB Hub 7 Port RGB', 235000, '/uploads/products/usb.webp'),
(40, 1, 'Keyboard Freewolf M87', 250000, '/uploads/products/693f860df1f88_freewolf.webp'),
(45, 1, 'Mini Keyboard Bleza', 100000, '/uploads/products/694223d36f35c_minikey.jpg'),
(46, 2, 'Mouse Predator Pro M162', 90000, '/uploads/products/694224503cfce_predator.webp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `testimonials`
--

INSERT INTO `testimonials` (`id`, `nama`, `pesan`, `created_at`) VALUES
(2, 'Ucup', 'Sangat bagus dan lengkap', '2025-12-16 15:30:59'),
(7, 'joko', 'recomended', '2025-12-16 15:37:03'),
(12, 'Sumanto', 'Lumayan lengkap', '2025-12-17 11:09:35'),
(13, 'Cici', 'Kurang lengkap tapi produknya berkualitas', '2025-12-17 11:34:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nama_lengkap`, `created_at`) VALUES
(1, 'admin', 'admin@email.com', '$2y$10$IRBJ.N1qkL0ovNcCgDzzo.vrFCVgcCG8KjJZX.jDGXN8oOF8Pbm8i', 'Muhammad Fadil', '2025-11-24 02:36:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
