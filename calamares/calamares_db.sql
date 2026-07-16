-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 16, 2026 at 03:51 AM
-- Server version: 8.0.44
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calamares_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `action_done` text,
  `log_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `user_email`, `action_done`, `log_date`) VALUES
(1, '', 'Added Product', '2026-07-13 08:56:01'),
(2, 'admin@calamares.com', 'Added Product', '2026-07-14 01:37:29'),
(3, 'admin@calamares.com', 'Updated Product: Intel Core i5-12400F', '2026-07-14 01:40:41'),
(4, 'admin@calamares.com', 'Added Product', '2026-07-14 01:41:57'),
(5, 'admin@calamares.com', 'Added Product', '2026-07-14 14:25:36'),
(6, 'admin@calamares.com', 'Added Product', '2026-07-15 17:34:16'),
(7, 'admin@calamares.com', 'Updated Product: ASUS PRIME B550M-A', '2026-07-15 17:43:50'),
(8, 'admin@calamares.com', 'Updated Product: Ryzen 5 5600', '2026-07-15 17:52:24'),
(9, 'admin@calamares.com', 'Updated Product: Ryzen 5 5600', '2026-07-15 17:52:47'),
(10, 'admin@calamares.com', 'Updated Product: ASUS PRIME B550M-A', '2026-07-15 17:53:07'),
(11, 'admin@calamares.com', 'Updated Product: Ryzen 5 5600', '2026-07-15 17:58:02'),
(12, 'admin@calamares.com', 'Updated Product: RTX 4060', '2026-07-15 17:59:31'),
(13, 'admin@calamares.com', 'Updated Product: Kingston SSD 1TB', '2026-07-15 18:00:05'),
(14, 'admin@calamares.com', 'Updated Product: Ryzen 5 5600', '2026-07-15 18:00:23'),
(15, 'admin@calamares.com', 'Updated Product: HyperX Fury 16GB', '2026-07-15 18:00:52'),
(16, 'admin@calamares.com', 'Updated Product: Intel Core i5-12400F', '2026-07-15 18:01:16'),
(17, 'admin@calamares.com', 'Updated Product: Corsair Vengeance RGB 32GB', '2026-07-15 18:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `payment_method`, `status`, `order_date`) VALUES
(1, 1, 28500.00, 'GCash', 'Pending', '2026-07-13 15:16:26'),
(2, 1, 0.00, 'Cash On Delivery', 'Pending', '2026-07-13 15:16:32'),
(3, 1, 16000.00, 'Cash On Delivery', 'Pending', '2026-07-13 15:18:38'),
(4, 1, 25000.00, 'Cash On Delivery', 'Pending', '2026-07-14 01:22:52'),
(5, 1, 141000.00, 'GCash', 'Pending', '2026-07-15 15:11:05'),
(6, 3, 29300.00, 'Cash On Delivery', 'Pending', '2026-07-15 17:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `product_name`, `description`, `price`, `stock`, `image`) VALUES
(1, 'Processor', 'Ryzen 5 5600', '6-core AMD Ryzen processor delivering reliable performance for gaming, work, and entertainment.\r\n\r\n', 8000.00, 25, 'ryzen5600.jpg'),
(2, 'Graphics Card', 'RTX 4060', 'NVIDIA RTX 4060 graphics card with 8GB memory, delivering reliable performance for gaming and creative workloads.', 25000.00, 10, 'rtx4060.jpg'),
(3, 'Storage', 'Kingston SSD 1TB', 'Fast and reliable 1TB SSD storage designed for quicker boot times, faster file transfers, and smooth everyday performance.', 3500.00, 20, 'ssd1tb.jpg'),
(4, 'RAM', 'HyperX Fury 16GB', 'High-performance 16GB gaming memory designed for smooth multitasking, faster load times, and reliable system performance.', 4500.00, 25, NULL),
(5, 'Graphics Card', 'Intel Core i5-12400F', 'Intel Core i5-12400F delivers fast and efficient performance for gaming, productivity, and daily computing.\r\n\r\n', 800.00, 10, NULL),
(6, 'RAM', 'Corsair Vengeance RGB 32GB', 'High-performance 32GB DDR5 gaming memory with RGB lighting, designed for smooth multitasking, gaming, and demanding applications.\r\n\r\n', 8500.00, 2, NULL),
(7, 'Motherboard', 'ASUS PRIME B550M-A', 'Micro-ATX AMD Ryzen motherboard with PCIe 4.0, fast memory support, and reliable gaming performance.', 5999.00, 2, NULL),
(8, 'Graphics Card', 'NVIDIA GeForce RTX 4060', '8GB GDDR6 Graphics Card for gaming and content creation.', 19999.00, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` text,
  `contact` varchar(30) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `address`, `contact`, `role`, `status`) VALUES
(1, 'System Admin', 'admin@calamares.com', 'admin123', 'CALAMARES Office', '09123456789', 'admin', 'verified'),
(2, 'Gerald Arago', 'gerald18.gaa@gmail.com', '123456789', '855 P. Paredes Street, Sampaloc, Manila', '1234567890', 'buyer', 'verified'),
(3, 'Test buyer', 'test@buyer.com', '123buyer', 'Manila', '09876545678', 'buyer', 'verified'),
(46, 'gerald', 'gerald18.gaa@gmail.com', '123', '123', '123', 'buyer', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
