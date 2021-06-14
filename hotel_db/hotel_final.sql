-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2019 at 12:16 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_info`
--

DROP TABLE IF EXISTS `billing_info`;
CREATE TABLE IF NOT EXISTS `billing_info` (
  `Card_no` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Street_name` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Postal_code` varchar(30) NOT NULL,
  `CVV` int(11) NOT NULL,
  `Holder_name` char(30) NOT NULL,
  `Exp_date` date NOT NULL,
  `Country` varchar(30) NOT NULL,
  PRIMARY KEY (`Card_no`,`id_user`),
  KEY `user_id` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billing_info`
--

INSERT INTO `billing_info` (`Card_no`, `id_user`, `Street_name`, `City`, `Postal_code`, `CVV`, `Holder_name`, `Exp_date`, `Country`) VALUES
(1234122131, 14, 'Japan', 'Japan', '1323', 321, 'Japan', '2019-06-28', 'Japan'),
(2147483647, 1, 'Olenou', 'Athens', '12343', 126, 'Politaki', '0000-00-00', ''),
(2147483647, 2, 'Karolou', 'Patra', '23453', 456, 'Anastasiasdis', '0000-00-00', ''),
(2147483647, 3, 'Gianitson', 'Athens', '76353', 247, 'Grigoriou', '0000-00-00', ''),
(2147483647, 4, 'Kresnas', 'Athens', '95840', 295, 'Papadopoulos', '0000-00-00', ''),
(2147483647, 5, 'Patision', 'Athens', '46518', 975, 'Miltiadou', '0000-00-00', ''),
(2147483647, 6, 'Stournari', 'Athens', '48462', 849, 'Kastanou', '0000-00-00', ''),
(2147483647, 7, 'Akadimias', 'Athens', '65451', 943, 'Limiatis', '0000-00-00', ''),
(2147483647, 8, 'Sofokleous', 'Thessaloniki', '45497', 276, 'Anastasiadou', '0000-00-00', ''),
(2147483647, 9, 'Riga Ferraiou', 'Patra', '78642', 906, 'Christakis', '0000-00-00', ''),
(2147483647, 10, 'Ethnikis Antistaseos', 'Athens', '14796', 493, 'Dimopoulos', '0000-00-00', ''),
(2147483647, 11, 'Polytexnio', 'Patras', '32112', 321, 'Kostas', '2019-06-30', 'Greece');

-- --------------------------------------------------------

--
-- Table structure for table `chosen_services`
--

DROP TABLE IF EXISTS `chosen_services`;
CREATE TABLE IF NOT EXISTS `chosen_services` (
  `Service_no` int(11) NOT NULL,
  `id_res` int(11) NOT NULL,
  PRIMARY KEY (`Service_no`,`id_res`),
  KEY `id_res` (`id_res`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chosen_services`
--

INSERT INTO `chosen_services` (`Service_no`, `id_res`) VALUES
(1, 4),
(1, 45),
(6, 45),
(1, 46),
(6, 46),
(1, 47),
(6, 47),
(1, 48),
(6, 48);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_res` int(11) NOT NULL AUTO_INCREMENT,
  `RoomNo` int(11) NOT NULL,
  `Checkin` date NOT NULL,
  `Checkout` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `Payment_Method` char(30) NOT NULL,
  `Price` int(11) NOT NULL,
  `Payment_Status` char(30) NOT NULL,
  PRIMARY KEY (`id_res`),
  KEY `user_id` (`id_user`),
  KEY `RoomNo` (`RoomNo`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_res`, `RoomNo`, `Checkin`, `Checkout`, `id_user`, `Payment_Method`, `Price`, `Payment_Status`) VALUES
(1, 101, '2018-06-21', '2018-06-30', 1, 'Cash', 200, 'Paid'),
(2, 203, '2018-06-18', '2018-06-22', 2, 'Cash', 230, 'Paid'),
(3, 404, '2018-07-28', '2018-08-03', 1, 'Cash', 300, 'Paid'),
(4, 409, '2018-10-10', '2018-10-15', 11, 'Cash', 480, 'Unpaid'),
(5, 403, '2019-06-04', '2019-06-11', 11, 'Cash', 280, 'Unpaid'),
(22, 301, '2019-06-14', '2019-06-15', 11, 'Cash', 44, 'Pending'),
(23, 406, '2019-06-14', '2019-06-15', 11, 'Cash', 78, 'Pending'),
(24, 403, '2019-06-14', '2019-06-17', 11, 'Cash', 132, 'Pending'),
(25, 405, '2019-06-14', '2019-06-17', 11, 'Cash', 234, 'Pending'),
(26, 402, '2019-06-14', '2019-06-17', 11, 'Cash', 132, 'Pending'),
(27, 404, '2019-06-14', '2019-06-17', 11, 'Cash', 234, 'Pending'),
(28, 402, '2019-06-05', '2019-06-07', 11, 'Cash', 80, 'Pending'),
(29, 401, '2019-06-05', '2019-06-07', 11, 'Cash', 80, 'Pending'),
(32, 403, '2019-06-01', '2019-06-30', 14, 'Cash', 1421, 'Pending'),
(33, 402, '2019-06-01', '2019-06-30', 14, 'Cash', 1421, 'Pending'),
(34, 401, '2019-06-01', '2019-06-30', 14, 'Cash', 1421, 'Pending'),
(35, 302, '2019-06-01', '2019-06-30', 14, 'Cash', 1421, 'Pending'),
(36, 406, '2019-06-01', '2019-06-30', 14, 'Cash', 2552, 'Pending'),
(37, 301, '2019-06-01', '2019-06-30', 14, 'Cash', 1421, 'Pending'),
(38, 405, '2019-06-01', '2019-06-30', 14, 'Cash', 2552, 'Pending'),
(39, 202, '2019-06-01', '2019-06-30', 14, 'Cash', 1421, 'Pending'),
(40, 404, '2019-06-01', '2019-06-30', 14, 'Cash', 2552, 'Pending'),
(41, 201, '2019-06-01', '2019-06-30', 14, 'Cash', 1421, 'Pending'),
(42, 305, '2019-06-01', '2019-06-30', 14, 'Cash', 2552, 'Pending'),
(43, 103, '2019-06-01', '2019-06-30', 14, 'Cash', 1421, 'Pending'),
(44, 304, '2019-06-01', '2019-06-30', 14, 'Cash', 2552, 'Pending'),
(45, 102, '2019-06-01', '2019-06-30', 14, 'Cash', 1421, 'Pending'),
(46, 206, '2019-06-01', '2019-06-30', 14, 'Cash', 2552, 'Pending'),
(47, 101, '2019-06-01', '2019-06-30', 14, 'Cash', 1421, 'Pending'),
(48, 205, '2019-06-01', '2019-06-30', 14, 'Cash', 2552, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `RoomNo` int(11) NOT NULL,
  `Availability` char(30) NOT NULL,
  `Room_Type` char(30) NOT NULL,
  `Price_Night` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  PRIMARY KEY (`RoomNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomNo`, `Availability`, `Room_Type`, `Price_Night`, `Rating`) VALUES
(101, 'A', '1', 40, 5),
(102, 'A', '1', 40, 4),
(103, 'A', '1', 40, 5),
(104, 'A', '2', 70, 5),
(105, 'A', '2', 70, 5),
(106, 'A', '4', 100, 4),
(107, 'A', '3', 90, 4),
(108, 'A', '3', 90, 4),
(109, 'A', '3', 90, 4),
(201, 'A', '1', 40, 5),
(202, 'A', '1', 40, 5),
(203, 'A', '4', 100, 5),
(204, 'A', '4', 100, 5),
(205, 'A', '2', 70, 5),
(206, 'A', '2', 70, 4),
(207, 'A', '3', 90, 4),
(208, 'A', '3', 90, 4),
(209, 'A', '3', 90, 5),
(301, 'A', '1', 40, 4),
(302, 'A', '1', 40, 5),
(303, 'A', '4', 100, 4),
(304, 'A', '2', 70, 4),
(305, 'A', '2', 70, 5),
(306, 'A', '4', 100, 5),
(307, 'A', '3', 90, 5),
(308, 'A', '3', 90, 5),
(309, 'A', '3', 90, 5),
(401, 'A', '1', 40, 4),
(402, 'A', '1', 40, 5),
(403, 'A', '1', 40, 4),
(404, 'A', '2', 70, 4),
(405, 'A', '2', 70, 4),
(406, 'A', '2', 70, 5),
(407, 'A', '3', 90, 5),
(408, 'A', '3', 90, 5),
(409, 'A', '3', 90, 5);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `Service_no` int(11) NOT NULL,
  `Service_name` char(30) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`Service_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Service_no`, `Service_name`, `Price`) VALUES
(1, 'Breakfast', 4),
(2, 'Lunch', 8),
(3, 'Dinner', 10),
(4, 'Gym', 10),
(5, 'Spa-Sauna-Massage', 20),
(6, 'Pool', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FName` char(30) CHARACTER SET utf8 NOT NULL,
  `LName` char(30) CHARACTER SET utf8 NOT NULL,
  `email` char(30) CHARACTER SET utf8 NOT NULL,
  `passcode` char(30) CHARACTER SET utf8 NOT NULL,
  `A_T` char(30) CHARACTER SET utf8 DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `FName`, `LName`, `email`, `passcode`, `A_T`, `Phone`) VALUES
(1, 'Anna', 'Politaki', 'anpol@gmail.com', 'ap0004', 'C2913', 2147483647),
(2, 'Stelios', 'Anastasiasdis', 'stelios_ana@gmail.com', 'sa0002', 'bk2767', 2147483647),
(3, 'Dimitris', 'Grigoriou', 'dimgri@gmail.com', 'dg0003', 'ui4386', 2147483647),
(4, 'Giorgos', 'Papadopoulos', 'grpap@gmail.com', 'gp0004', 'cv6574', 2147483647),
(5, 'Danai', 'Miltiadou', 'dan-milt@gmail.com', 'dm0005', 'jk3452', 2147483647),
(6, 'Eleni', 'Kastanou', 'hel_kast@gmail.com', 'ek0006', 'fg3245', 2147483647),
(7, 'Spiros', 'Limiatis', 'limiatissp@gmail.com', 'sl0007', 'ge3452', 2147483647),
(8, 'Sofia', 'Anastasiadou', 'sofiana@gmail.com', 'sa0008', 'bw3456', 2147483647),
(9, 'Argiris', 'Christakis', 'chrisarg@gmail.com', 'ac0009', 'vk4389', 2147483647),
(10, 'Timoleon', 'Dimopoulos', 'timdim@gmail.com', 'td0010', 'xo4356', 2147483647),
(11, 'Konstantinos', 'Toulis', 'toulis@gmail.com', 'kt0002', 'A9956', 2147483647),
(13, 'Γιώργος', 'Παπαγεωργίου', 'george-pap@gmail.com', '111', '', 0),
(14, 'm', 'm', 'M@gmail.com', '1', '2113', 2131412412),
(15, 'admin', 'admin', 'admin@mail.com', '1234', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_info`
--
ALTER TABLE `billing_info`
  ADD CONSTRAINT `billing_info_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chosen_services`
--
ALTER TABLE `chosen_services`
  ADD CONSTRAINT `chosen_services_ibfk_1` FOREIGN KEY (`id_res`) REFERENCES `reservation` (`id_res`) ON DELETE CASCADE,
  ADD CONSTRAINT `chosen_services_ibfk_2` FOREIGN KEY (`Service_no`) REFERENCES `services` (`Service_no`) ON DELETE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`RoomNo`) REFERENCES `room` (`RoomNo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
