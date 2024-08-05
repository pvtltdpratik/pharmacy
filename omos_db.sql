-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 07:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `appointment_date` datetime DEFAULT NULL,
  `status` enum('Scheduled','Cancelled','Completed') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_list`
--

CREATE TABLE `cart_list` (
  `id` int(30) NOT NULL,
  `customer_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `quantity` int(30) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Tablet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nisl neque, tincidunt eu imperdiet eget, fringilla ut magna. Fusce in auctor nisl, a efficitur nisi. Vestibulum venenatis velit pharetra mauris dictum ultrices quis et quam. Donec sollicitudin condimentum lectus, vel convallis ipsum sodales id.', 1, 0, '2022-05-25 10:14:16', '2022-05-25 10:16:27'),
(2, 'Capsule', 'Suspendisse accumsan mollis quam. Etiam ut dolor felis. Proin maximus eros tortor, et condimentum massa mollis nec. Fusce gravida posuere purus et tempor. Phasellus commodo auctor justo, tempus pellentesque nunc condimentum id.', 1, 0, '2022-05-25 10:16:05', '2022-05-25 10:16:05'),
(3, 'Syrup', 'Sample category 101', 1, 0, '2022-05-26 10:57:14', '2022-05-26 10:57:14'),
(4, 'Test 123 - updated', 'Sample Only', 1, 1, '2022-05-26 10:57:31', '2022-05-26 10:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `customer_list`
--

CREATE TABLE `customer_list` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_list`
--

INSERT INTO `customer_list` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `email`, `password`, `avatar`, `date_created`, `date_updated`) VALUES
(5, 'Ashwini', 'Lalchand ', 'Mundaware', 'Female', '8149532987', 'ashwinimun45@gmail.com', 'c442e808532f2e5053cad0916edb9f45', NULL, '2024-02-10 19:27:10', '2024-02-10 19:27:10'),
(6, 'Ashwini', 'Lalchand ', 'Mundaware', 'Female', '8149532987', 'ashumundaware11@gmail.com', 'c442e808532f2e5053cad0916edb9f45', NULL, '2024-02-10 19:27:58', '2024-02-10 19:27:58'),
(8, '', '', '', 'Male', '', '', '', NULL, '2024-02-14 22:43:50', '2024-02-14 22:43:50'),
(9, 'Pratik', '', 'College', 'Male', '7083937595', 'pratikcollege2005@gmail.com', '0cb2b62754dfd12b6ed0161d4b447df7', NULL, '2024-02-21 12:04:00', '2024-02-21 12:04:00'),
(10, 'Demo', 'demo', 'demo', 'Male', '98745666666666666666', 'demo@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', NULL, '2024-03-05 15:31:55', '2024-03-05 15:31:55'),
(11, 'quazi', 'syeda', 'mahwish', 'Female', '8149253251', 'mahwish@123gmail.com', '1aa06851026f094112f03ee50f27bde2', NULL, '2024-03-05 15:53:36', '2024-03-05 15:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `quantity` int(30) NOT NULL DEFAULT 0,
  `price` float(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(7, 2, 1, 7.00),
(9, 4, 1, 20.00),
(10, 2, 2, 7.00),
(10, 3, 1, 25.00),
(11, 5, 1, 375.00),
(11, 1, 1, 10.00),
(12, 2, 1, 7.00),
(13, 10, 1, 97.00),
(14, 5, 1, 375.00),
(15, 8, 1, 14.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `customer_id` int(30) NOT NULL,
  `delivery_address` text NOT NULL,
  `total_amount` float(12,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending,\r\n1=packed,\r\n2=out for delivery,\r\n3=paid\r\n',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `code`, `customer_id`, `delivery_address`, `total_amount`, `status`, `date_created`, `date_updated`) VALUES
(7, '2024021300001', 5, 'Sample adress for testing', 7.00, 2, '2024-02-13 15:05:11', '2024-02-21 16:31:11'),
(9, '2024021500001', 5, 'address', 20.00, 1, '2024-02-15 15:17:36', '2024-02-21 15:41:18'),
(10, '2024022100001', 9, 'ljjkhk', 39.00, 1, '2024-02-21 15:05:32', '2024-02-21 15:12:39'),
(11, '2024022100002', 5, 'sfgfgjxftdgcv', 385.00, 2, '2024-02-21 17:35:04', '2024-02-21 17:36:20'),
(12, '2024022400001', 5, 'dfgnd a', 7.00, 2, '2024-02-24 19:59:59', '2024-02-24 20:02:58'),
(13, '2024022800001', 5, 'jrij8fwe', 97.00, 0, '2024-02-28 12:51:03', '2024-02-28 12:51:03'),
(14, '2024030200001', 5, 'fndehfbewfkdsf', 375.00, 2, '2024-03-01 23:44:09', '2024-03-01 23:45:40'),
(15, '2024030500001', 5, 'ekgijweidjakewif', 14.00, 3, '2024-03-05 14:57:13', '2024-03-05 14:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `brand` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `dose` varchar(250) NOT NULL,
  `price` float(12,2) NOT NULL DEFAULT 0.00,
  `image_path` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `brand`, `name`, `description`, `dose`, `price`, `image_path`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 2, 'Brand 101', 'Mefenamic', 'Proin aliquam mollis erat nec sodales. Integer ipsum ipsum, vulputate a ipsum quis, auctor tincidunt quam. Curabitur ornare nisl interdum sollicitudin lobortis. Curabitur blandit lacinia est, id rutrum mi ultrices sit amet.', '500mg', 10.00, 'uploads/medicines//1_tablet.jpeg?v=1653447989', 1, 0, '2022-05-25 11:06:29', '2022-05-25 11:08:43'),
(2, 2, 'Brand 101', 'Amoxicillin', 'Aliquam porttitor diam nunc, eu imperdiet mi vulputate ut. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean congue commodo tristique. Proin congue consequat fringilla. Cras bibendum consectetur ipsum eu ultrices. Integer aliquet mauris eu pharetra venenatis.', '250', 7.00, 'uploads/medicines//capsule.jpg?v=1653448223', 1, 0, '2022-05-25 11:10:23', '2022-05-25 11:10:23'),
(3, 1, 'Brand 102', 'Drug 101', 'Ut tristique felis sit amet nisl malesuada, id rutrum ligula iaculis. Pellentesque posuere urna dapibus semper vehicula. Donec ex massa, vestibulum eu lorem ut, malesuada volutpat eros. Suspendisse efficitur dolor ut nulla aliquet, non blandit ex finibus. Nunc ac justo vitae eros dapibus mattis id ut ante.', '25mg', 25.00, 'uploads/medicines//pill.jfif?v=1653448296', 1, 0, '2022-05-25 11:11:36', '2022-05-25 11:11:36'),
(4, 1, 'Brand 103', 'Drug 102', 'Vivamus pretium lectus in enim lobortis, vel scelerisque purus pulvinar. Nam pulvinar blandit ligula sed facilisis. Phasellus venenatis lectus quis euismod vestibulum. Aliquam gravida a risus ut aliquet. Duis rhoncus neque id lectus vestibulum varius. In tristique porta viverra.', '50mg', 20.00, NULL, 1, 0, '2022-05-25 14:18:48', '2022-05-25 14:18:48'),
(5, 3, 'Brand 103', 'Medicine #101', 'This is a sample product only- updated', '280ml', 375.00, 'uploads/medicines//syrup.jpg?v=1653533984', 1, 0, '2022-05-26 10:59:44', '2022-05-26 10:59:56'),
(7, 3, 'Cold', 'Cold', 'na', '300mg', 60.00, 'uploads/medicines//1_capsule.jpg?v=1687633575', 1, 0, '2023-06-25 00:36:15', '2023-06-25 00:40:53'),
(8, 1, 'calpol', 'Paracetamol 500', 'analgesics (pain killers), and antipyretics (fever-reducing agents)', 'Adult & Children 12 years and above ', 14.00, NULL, 1, 0, '2024-02-24 20:13:22', '2024-02-24 20:13:22'),
(9, 1, 'Dolo 650', 'Paracetamol Tablets IP', '650 MG of paracetamol is also called Acetaminophen. It comes under non-steroidal anti-inflammatory drugs (NSAIDs) drug class. Paracetamol has antipyretic and analgesic, which helps in decreasing fever and pain, and it has a minimal anti-inflammatory action.\r\n', 'As directed by the physician ', 30.00, NULL, 1, 0, '2024-02-24 20:32:59', '2024-02-24 20:32:59'),
(10, 3, 'Koflet ', 'Himalayan', 'Koflet is used to cure both productive and dry coughs. The mucolytic and expectorant properties reduce the viscosity of bronchial secretions and facilitate expectoration. Koflet\'s cough suppressant action reduces bronchial mucosal irritation and related bronchospasms.', 'Adults and Children above 12 years of age: 1 to 2 teaspoonsful (5-10 ml) three to four times daily.', 97.00, NULL, 1, 0, '2024-02-24 20:37:07', '2024-02-25 19:39:05'),
(11, 1, 'Combiflam', 'Paracetamol Tablets IP', 'Combiflam tablet is a pain-relieving medicine. This is used to relieve headaches, toothache, body aches, muscle pain, and joint pain and to reduce fever. Take this medicine as recommended by your doctor, preferably after meals. Do not exceed the recommended dosage, as it can increase the risk of side effects.', '1 tablet 3 times a day, or as directed by your doctor.', 42.00, NULL, 1, 0, '2024-02-25 19:45:20', '2024-02-25 19:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `result_text` text DEFAULT NULL,
  `result_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_list`
--

CREATE TABLE `stock_list` (
  `id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `quantity` float(12,2) NOT NULL DEFAULT 0.00,
  `expiration` date DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_list`
--

INSERT INTO `stock_list` (`id`, `product_id`, `code`, `quantity`, `expiration`, `date_created`, `date_updated`) VALUES
(1, 2, '1236548', 50.00, '2025-05-27', '2022-05-25 11:48:05', '2023-06-25 00:39:40'),
(2, 2, '8754665', 15.00, '2025-05-25', '2022-05-25 11:54:40', '2023-06-25 00:39:37'),
(3, 2, '111', 35.00, '2025-05-24', '2022-05-25 11:58:24', '2023-06-25 00:39:34'),
(4, 1, '1231', 35.00, '2025-05-26', '2022-05-25 12:06:04', '2023-06-25 00:39:28'),
(5, 3, '123111', 50.00, '2025-05-26', '2022-05-25 12:06:19', '2023-06-25 00:39:23'),
(6, 4, '89756452', 30.00, '2025-06-23', '2022-05-25 14:19:25', '2022-05-25 14:19:25'),
(7, 5, '06231415', 50.00, '2025-05-27', '2022-05-26 11:01:03', '2023-06-25 00:39:18'),
(8, 5, '9875652', 15.00, '2025-05-09', '2022-05-26 11:01:21', '2023-06-25 00:38:50'),
(10, 10, '#001', 10.00, '2027-03-23', '2024-02-24 20:39:43', '2024-02-24 20:39:43'),
(11, 8, '006', 2.00, '2024-05-25', '2024-02-25 20:11:25', '2024-02-25 20:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `stock_out`
--

CREATE TABLE `stock_out` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `stock_id` int(30) NOT NULL,
  `quantity` int(30) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Pharmacy Delivery System'),
(6, 'short_name', 'Pharmacy Delivery System'),
(11, 'logo', 'uploads/logo.png?v=1653443580'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover.png?v=1653443581'),
(17, 'phone', '9404519121'),
(18, 'mobile', '09123456987 / 094563212222 '),
(19, 'email', 'info@Pharmacy_Delivery_System.com'),
(20, 'address', 'Amravati');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='2';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', '', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatars/1.png?v=1649834664', NULL, 1, '2021-01-20 14:02:37', '2022-05-16 14:17:49'),
(7, 'Ashwini', 'Lalchand ', 'Mundaware', 'amundaware', '1254737c076cf867dc53d60a0364f38e', NULL, NULL, 2, '2022-05-26 11:04:16', '2024-02-15 14:52:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `cart_list`
--
ALTER TABLE `cart_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_list`
--
ALTER TABLE `customer_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);
ALTER TABLE `product_list` ADD FULLTEXT KEY `brand` (`brand`,`name`,`description`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `stock_list`
--
ALTER TABLE `stock_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_list`
--
ALTER TABLE `cart_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_list`
--
ALTER TABLE `customer_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_list`
--
ALTER TABLE `stock_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock_out`
--
ALTER TABLE `stock_out`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`);

--
-- Constraints for table `cart_list`
--
ALTER TABLE `cart_list`
  ADD CONSTRAINT `customer_id_fk_cl` FOREIGN KEY (`customer_id`) REFERENCES `customer_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_id_fk_cl` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_id_fk_oi` FOREIGN KEY (`order_id`) REFERENCES `order_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_id_fk_oi` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `customer_id_fk_ol` FOREIGN KEY (`customer_id`) REFERENCES `customer_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `product_list`
--
ALTER TABLE `product_list`
  ADD CONSTRAINT `category_id_fk_pl` FOREIGN KEY (`category_id`) REFERENCES `category_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`);

--
-- Constraints for table `stock_list`
--
ALTER TABLE `stock_list`
  ADD CONSTRAINT `product_id_fk_sl` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD CONSTRAINT `order_id_fk_so` FOREIGN KEY (`order_id`) REFERENCES `order_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `stock_id_fk_so` FOREIGN KEY (`stock_id`) REFERENCES `stock_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

