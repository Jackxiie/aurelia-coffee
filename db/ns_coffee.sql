-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: JUN 03, 2026 at 10:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aurelia_coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(2) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(3) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `product_id` int(10) NOT NULL,
  `size` varchar(30) NOT NULL,
  `quantity` int(10) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `street_address` varchar(200) NOT NULL,
  `town` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_id` int(3) NOT NULL,
  `status` varchar(20) NOT NULL,
  `total_price` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(5) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE product_sizes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT UNSIGNED NOT NULL,
    size_name VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `type`, `created_at`) VALUES
(1, 'Coffee Capuccino', 'menu-1.jpg', 'A classic Italian cappuccino crafted with rich espresso and velvety milk foam, delivering a smooth and refined coffee experience.', '15.90', 'coffee', '2026-01-28 06:19:36'),
(2, 'Creamy Latte Coffee', 'menu-2.jpg', 'Premium espresso blended with silky steamed milk, creating a perfectly balanced and creamy texture in every sip.', '19.50', 'coffee', '2026-01-28 06:19:36'),
(3, 'Cold Coffee', 'menu-3.jpg', 'Chilled coffee crafted from high-quality beans, offering a refreshing and bold flavor for a modern luxury taste.', '15.50', 'coffee', '2026-01-28 07:13:50'),
(4, 'Lemonde Juice', 'drink-1.jpg', 'Freshly squeezed lemonade made from selected citrus, delivering a crisp and refreshing premium taste.', '12.50', 'drink', '2026-01-24 16:53:22'),
(5, 'Pineapple Juice', 'drink-2.jpg', 'Tropical pineapple juice crafted from ripe fruits, perfectly balanced between sweetness and freshness.', '16.50', 'drink', '2026-01-24 16:53:22'),
(6, 'Hot Cake Honey', 'dessert-1.jpg', 'Handcrafted fluffy hotcakes drizzled with premium golden honey, delivering a delicate and luxurious sweetness.', '15.50', 'dessert', '2026-01-24 16:59:23'),
(7, 'Cherry Butter Cake', 'dessert-2.jpg', 'Rich butter cake infused with premium cherries, offering a smooth texture and refined fruity elegance.', '20.00', 'dessert', '2026-01-24 16:59:23'),
(8, 'Banana Cheery Cake', 'dessert-5.jpg', 'Soft banana cake layered with fresh seasonal fruits, crafted for a naturally indulgent experience.', '19.00', 'dessert', '2026-01-24 17:01:31'),
(14, 'Soda Drinks', 'drink-3.jpg', 'Signature sparkling soda blends with vibrant colors and refined flavors, crafted for a refreshing luxury experience.', '12.90', 'drink', '2026-01-28 07:40:44'),
(15, 'Roasted Chicken', 'dish-4.jpg', 'Slow-roasted chicken with crispy golden skin, seasoned with signature herbs for a rich and savory flavor.', '60', 'main dish', '2026-01-28 07:43:52'),
(16, 'Cornish - Mackere', 'dish-1.jpg', 'Carefully grilled mackerel infused with herbs, offering a deep and authentic ocean taste.', '30', 'main dish', '2026-01-28 07:56:21'),
(17, ' Roasted Steak', 'dish-2.jpg', 'Premium cut steak grilled to perfection, juicy, tender, and rich in flavor.', '150', 'main dish', '2026-01-28 07:59:00'),
(18, 'Cheese Burger', 'burger-1.jpg', 'Premium beef patty topped with melted cheese in a soft artisan bun, delivering a rich and satisfying bite.', '20.50', 'starter', '2026-01-28 08:01:57'),
(19, 'Salad Burger', 'burger-3.jpg', 'A fresh and balanced burger with crisp vegetables and light dressing, crafted for a refined healthy choice.', '25.80', 'starter', '2026-01-28 08:02:50'),
(20, 'Roasted Sea Food', 'dish-5.jpg', 'A luxurious selection of roasted seafood, combining freshness and richness in every bite.', '90', 'main dish', '2026-01-28 08:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
INSERT INTO product_sizes (product_id, size_name, price) VALUES

-- Coffee
(1,'Small',15.90),(1,'Medium',17.90),(1,'Large',19.90),(1,'Extra Large',21.90),
(2,'Small',19.50),(2,'Medium',21.50),(2,'Large',23.50),(2,'Extra Large',25.50),
(3,'Small',15.50),(3,'Medium',17.50),(3,'Large',19.50),(3,'Extra Large',21.50),

-- Drinks
(4,'Small',12.50),(4,'Medium',14.50),(4,'Large',16.50),(4,'Extra Large',18.50),
(5,'Small',16.50),(5,'Medium',18.50),(5,'Large',20.50),(5,'Extra Large',22.50),
(14,'Small',12.90),(14,'Medium',14.90),(14,'Large',16.90),(14,'Extra Large',18.90),

-- Dessert 
(6,'Small',15.50),(6,'Medium',17.50),(6,'Large',19.50),(6,'Extra Large',21.50),
(7,'Small',20.00),(7,'Medium',22.00),(7,'Large',24.00),(7,'Extra Large',26.00),
(8,'Small',19.00),(8,'Medium',21.00),(8,'Large',23.00),(8,'Extra Large',25.00),

-- Main dish
(15,'Small',60),(15,'Medium',65),(15,'Large',70),(15,'Extra Large',75),
(16,'Small',30),(16,'Medium',35),(16,'Large',40),(16,'Extra Large',45),
(17,'Small',150),(17,'Medium',160),(17,'Large',170),(17,'Extra Large',180),
(20,'Small',90),(20,'Medium',100),(20,'Large',110),(20,'Extra Large',120),

-- Starter
(18,'Small',20.50),(18,'Medium',22.50),(18,'Large',24.50),(18,'Extra Large',26.50),
(19,'Small',25.80),(19,'Medium',27.80),(19,'Large',29.80),(19,'Extra Large',31.80);
-----
-------
CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    subject VARCHAR(255),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@admin.com', 'admin@admin', '2025-12-03 05:45:14');

--
-- Indexes for dumped tables
--
INSERT INTO admins (admin_name, email, password)
VALUES ('Super Admin', 'admin@gmail.com', '12345');

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

ALTER TABLE order_items ADD size VARCHAR(50) NULL AFTER product_price;
ALTER TABLE products
ADD status VARCHAR(50) NOT NULL DEFAULT 'active' AFTER type;
UPDATE products
SET status = 'active'
WHERE status IS NULL OR status = '';
UPDATE products SET status = 'active' WHERE status = 'available';
UPDATE products SET status = 'inactive' WHERE status = 'unavailable';
UPDATE products SET status = 'active' WHERE status IS NULL OR status = '';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
