-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 06:05 PM
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
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `f_name`, `l_name`, `email`, `password`) VALUES
(1, 'omar', 'haitham', 'omar@admin.com', 'admin'),
(2, 'mazen', 'hagag', 'mazen@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `f_name`, `l_name`, `email`, `password`, `status`, `phone_number`) VALUES
(28, 'ahmed', 'Haitham', 'ahmed@hotmail.com', '2', 'suspended', '01002839933'),
(29, 'omar', 'Haitham', 'omar@gmail.com', '1', 'active', '0123568787'),
(35, 'mazen', 'mohamed', 'mazen@gmail.com', 'g', 'active', '0117278822'),
(49, 'younis ', 'ahmed', 'younis@gmail.com', '123', 'active', '01002531616'),
(52, 'omar', 'Haitham', 'ahmed@hotmail.comm', '4', 'active', '01002531616');

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `admin_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`admin_id`, `customer_id`) VALUES
(1, 28),
(1, 29),
(1, 35),
(1, 49),
(1, 52),
(2, 28),
(2, 29),
(2, 35),
(2, 49),
(2, 52);

-- --------------------------------------------------------

--
-- Table structure for table `parking_owner`
--

CREATE TABLE `parking_owner` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(500) NOT NULL,
  `phone_number` int(100) NOT NULL,
  `garage_license` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `parking_owner`
--

INSERT INTO `parking_owner` (`id`, `f_name`, `l_name`, `email`, `password`, `status`, `phone_number`, `garage_license`) VALUES
(3, 'sayed', 'mohy', 'sayed@gmail.com', 'sayed', 'suspended', 1002567895, '564799'),
(4, 'hany', 'mahmoud', 'hany@gmail.com', 'hany', 'active', 1118792034, '988577'),
(5, 'amr ', 'samir', 'amr@gmail.com', 'amr', 'active', 1204589922, '657785'),
(6, 'salah', 'shawky', 'salah@gmail.com', 'salah', 'active', 1126270018, '987699'),
(7, 'hussam', 'bassem', 'hussam@gmail.com', 'hussam', 'active', 1237833390, '927728'),
(8, 'atef', 'sayed', 'atef@gmail.com', 'atef', 'active', 1111545361, '556774'),
(9, 'maged', 'samy', 'maged@gmail.com', 'maged', 'active', 1128389282, '445636'),
(10, 'amir', 'hashem', 'amir@gmail.com', 'amir', 'active', 1001019287, '556998'),
(11, 'mahmoud', 'hamed', 'mahmoud@gmail.com', 'mahmoud', 'active', 1237859094, '878564'),
(12, 'tarek', 'ahmed', 'tarek@gmail.com', 'tarek', 'active', 1228794456, '565764'),
(13, 'mohab', 'helmy', 'mohab@gmail.com', 'mohab', 'active', 1002987744, '778987'),
(14, 'salem', 'ezz', 'salem@gmail.com', 'salem', 'active', 1228749304, '546375'),
(28, 'maha', 'ahmed', 'sayed@gmail.comm', 'm', 'active', 1141074455, '9678');

-- --------------------------------------------------------

--
-- Table structure for table `parking_spot`
--

CREATE TABLE `parking_spot` (
  `id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `region` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `spots` int(11) NOT NULL,
  `spots_booked` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `parking_spot`
--

INSERT INTO `parking_spot` (`id`, `location`, `description`, `region`, `type`, `image`, `price`, `spots`, `spots_booked`, `owner_id`) VALUES
(2, '9 Abo Elfeda Street', 'Next to faculty of commerce, Helwan university', 'zamalek , cairo', 'hourly', 'spots\\feda.jpeg', 5, 0, 20, 3),
(3, ' 9 abo elfeda street', 'Next to faculty of commerce, Helwan university', 'zamalek , cairo', 'monthly', 'spots\\feda.jpeg', 450, 20, 0, 3),
(4, '18 Brazil Street', 'Next to Safaa Hegazy metro station', 'zamalek , cairo ', 'hourly', 'spots\\brazil.jpeg', 5, 26, 2, 4),
(5, '18 Brazil Street', 'Next to Safaa Hegazy metro station', 'zamalek , cairo', 'monthly', 'spots\\brazil.jpeg', 600, 25, 0, 4),
(14, '3 Gabalaya Street', 'Next to Alahly club', 'zamalek , cairo', 'hourly', 'spots\\gabalaya.jpeg', 5, 20, 0, 5),
(15, '3 Gabalaya Street', 'Next to Alahly club', 'zamalek , cairo', 'monthly', 'spots\\gabalaya.jpeg', 120, 20, 0, 5),
(16, '5, 26 july Street', 'under 15 May bridge', 'zamalek , cairo', 'hourly', 'spots\\26.jpeg', 5, 15, 0, 6),
(17, '10 Mohy Eldeen Street', 'Next to Elbehous metro station', 'dokki ,doki ,  giza', 'hourly', 'spots\\bhos.jpg\r\n', 5, 19, 1, 7),
(20, '10 Mohy Eldeen Street', 'Next to Elbehous metro station', 'dokki ,doki , giza', 'monthly', 'spots\\bhos.jpg', 250, 20, 0, 7),
(21, '26 Mesaha Square', 'Next to McDonald\'s and our kids shop', 'dokki , doki , giza', 'hourly', 'spots\\mesaha.jpg', 5, 19, 1, 8),
(22, '26 Mesaha Square', 'Next to McDonald\'s and our kids shop', 'dokki , doki , giza', 'monthly', 'spots\\mesaha.jpg', 400, 20, 0, 8),
(23, '77 Mossadak Street ', 'In front of Hardee\'s', 'dokki , doki , giza', 'hourly', 'spots\\mesada2.jpg', 5, 20, 0, 9),
(24, '77 Mossadak Street ', 'In front of Hardee\'s', 'dokki , doki , giza', 'monthly', 'spots\\mesada2.jpg', 350, 20, 0, 9),
(25, '2 Veni Square ', 'Near to Misr International Hospital', 'dokki , doki , giza', 'hourly', 'spots\\veni.jpg', 5, 25, 0, 10),
(26, '22 Algeria Square ', 'Near to KFC', 'maadi , madi, cairo', 'hourly', 'spots\\algeria.jpeg', 5, 20, 0, 11),
(27, '22 Algeria Square ', 'Near to KFC', 'maadi , madi, cairo', 'monthly', 'spots\\algeria.jpeg', 350, 20, 0, 11),
(28, '6 EL-Nasr Street', 'In front of RadioShack shop ', 'maadi , madi , cairo', 'hourly', 'spots\\nasr.jpeg', 5, 20, 0, 12),
(29, '6 EL-Nasr Street', 'In front of RadioShack shop ', 'maadi , madi , cairo', 'monthly', 'spots\\nasr.jpeg', 400, 20, 0, 12),
(30, '2, 9 Street', 'Next to EL Maadi metro station', 'maadi , madi , cairo', 'hourly', 'spots\\9.jpg', 5, 20, 0, 13),
(31, '2, 9 Street', 'Next to EL Maadi metro station', 'maadi , madi , cairo', 'monthly', 'spots\\9.jpg', 400, 20, 0, 13),
(32, '44 EL-Horeya Square', 'Near to kornish el nile', 'maadi , madi , cairo', 'hourly', 'spots\\horeya.jpeg', 5, 21, 0, 14),
(82, '5, 26 july Street', 'under 15 May bridge', 'zamalek , cairo', 'monthly', 'spots\\26.jpeg', 0, 0, 0, 6),
(83, '2 Veni Square ', 'Near to Misr International Hospital', 'dokki , doki , giza', 'monthly', 'spots\\veni.jpg', 300, 20, 0, 10),
(84, '44 EL-Horeya Square', 'Near to kornish el nile', 'maadi , madi , cairo', 'monthly', 'spots\\horeya.jpeg', 500, 17, 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `type` varchar(500) NOT NULL,
  `booking_number` int(11) NOT NULL,
  `date` varchar(200) NOT NULL DEFAULT current_timestamp(),
  `spot_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `status`, `cost`, `payment_method`, `type`, `booking_number`, `date`, `spot_id`, `customer_id`) VALUES
(63, 'confirmed', 5, 'visa', 'hourly', 44780055, '2023-06-19 16:26:12', 4, 29),
(64, 'confirmed', 400, 'visa', 'monthly', 98763383, '2023-06-19 16:26:12', 5, 28),
(76, 'confirmed', 10, 'visa', 'hourly', 20460290, '2023-06-19 16:26:12', 4, 29),
(83, 'confirmed', 400, 'visa', 'monthly', 81259264, '2023-06-19 16:26:12', 5, 29),
(87, 'confirmed', 10, 'visa', 'hourly', 65917640, '2023-06-19 16:26:12', 21, 29),
(88, 'confirmed', 5, 'visa', 'hourly', 82263606, '2023-06-19 16:26:12', 4, 35),
(89, 'confirmed', 10, 'visa', 'hourly', 52215108, '2023-06-19 16:26:12', 4, 29),
(91, 'confirmed', 5, 'visa', 'hourly', 95364945, '2023-06-19 16:26:12', 4, 29),
(97, 'confirmed', 600, 'visa', 'monthly', 55117669, '2023-06-19 16:26:12', 5, 29),
(99, 'confirmed', 10, 'visa', 'hourly', 98896213, '2023-06-19 16:34:40', 21, 29);

-- --------------------------------------------------------

--
-- Table structure for table `supervise`
--

CREATE TABLE `supervise` (
  `admin_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `supervise`
--

INSERT INTO `supervise` (`admin_id`, `owner_id`) VALUES
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 28),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 28);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `license_number` varchar(100) NOT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `brand`, `model`, `license_number`, `customer_id`) VALUES
(15, 'renault', 'megan', '76576', 29),
(16, 'toyota', 'corolla', '988', 28),
(17, 'chevrolet ', 'optra', '878-يبي', 35),
(20, 'fiat', 'tibo', 'مق-666', 49);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`admin_id`,`customer_id`),
  ADD KEY `customer foreign key` (`customer_id`);

--
-- Indexes for table `parking_owner`
--
ALTER TABLE `parking_owner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `parking_spot`
--
ALTER TABLE `parking_spot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner key` (`owner_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spot key` (`spot_id`),
  ADD KEY `customer key` (`customer_id`);

--
-- Indexes for table `supervise`
--
ALTER TABLE `supervise`
  ADD PRIMARY KEY (`admin_id`,`owner_id`),
  ADD KEY `owner foreign key` (`owner_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust key` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `parking_owner`
--
ALTER TABLE `parking_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `parking_spot`
--
ALTER TABLE `parking_spot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manage`
--
ALTER TABLE `manage`
  ADD CONSTRAINT `admin foreign key` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer foreign key` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parking_spot`
--
ALTER TABLE `parking_spot`
  ADD CONSTRAINT `owner key` FOREIGN KEY (`owner_id`) REFERENCES `parking_owner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `customer key` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spot key` FOREIGN KEY (`spot_id`) REFERENCES `parking_spot` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervise`
--
ALTER TABLE `supervise`
  ADD CONSTRAINT `admin key` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owner foreign key` FOREIGN KEY (`owner_id`) REFERENCES `parking_owner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `cust key` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
