-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2024 at 06:33 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `bid` varchar(20) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `s_date` varchar(20) NOT NULL,
  `e_date` varchar(20) NOT NULL,
  `rate` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'avilable',
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookid`, `bid`, `uid`, `s_date`, `e_date`, `rate`, `status`) VALUES
(5, '3', '6', '2023-12-15', '2023-12-16', '500.00', 'avilable'),
(8, '3', '7', '2023-12-19', '2023-12-22', '1500.00', 'paid'),
(14, '5', '9', '2023-12-16', '2023-12-20', '6000.00', 'paid'),
(16, '6', '11', '2024-01-10', '2024-01-12', '1000.00', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `bookingdriver`
--

CREATE TABLE IF NOT EXISTS `bookingdriver` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(20) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `s_date` varchar(20) NOT NULL,
  `e_date` varchar(20) NOT NULL,
  `rate` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'avilable',
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `bookingdriver`
--

INSERT INTO `bookingdriver` (`bookid`, `id`, `uid`, `s_date`, `e_date`, `rate`, `status`) VALUES
(4, '2', '5', '2023-11-12', '2023-11-17', '500.00', 'avilable'),
(16, '2', '7', '2023-11-20', '2023-11-23', '300.00', 'avilable'),
(17, '7', '7', '2023-11-20', '2023-11-23', '1500.00', 'avilable'),
(19, '6', '7', '2023-12-07', '2023-12-08', '500.00', 'avilable'),
(28, '3', '7', '2023-12-20', '2023-12-23', '900.00', 'avilable'),
(33, '3', '11', '2024-01-12', '2024-01-13', '300.00', 'avilable'),
(34, '4', '11', '2024-01-16', '2024-01-18', '200.00', 'avilable');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dname` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `exp` varchar(10) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `charge` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `dname`, `phone`, `address`, `exp`, `uname`, `image`, `charge`, `status`) VALUES
(3, 'Arju', '9876543211', 'kottayam', '6 year', 'arju@gmil.com', 'client-img2.png', 300, 'accepted'),
(4, 'vimal', '9974585698', 'kkkk', '1', 'vimal@gmail.com', 'Screenshot 2023-11-11 120011.png', 100, 'accepted'),
(8, 'lal', '9874563215', 'lal villa kottayam', '2 years', 'lal@gmail.com', 'Screenshot 2023-11-11 120011.png', 500, 'accepted'),
(9, 'kebin', '9874563215', 'kebin home kottayam ', '3 years', 'kebin@gmail.com', 'Screenshot 2024-01-03 195752.png', 500, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rating` varchar(15) NOT NULL,
  `text` varchar(100) NOT NULL,
  `bid` int(11) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `rating`, `text`, `bid`) VALUES
(1, 4, '5', 'nice service', 0),
(2, 5, '5', 'good', 0),
(5, 7, '4', 'nice but need improvement', 5),
(7, 7, '3', 'good vehicle', 9),
(8, 9, '4', 'good ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `l_type` varchar(100) DEFAULT NULL,
  `l_status` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `reg_id`, `username`, `password`, `l_type`, `l_status`) VALUES
(1, 1, 'admin', 'admin123', 'admin', 'approved'),
(3, 5, 'vinee@gmail.com', 'Vine@123', 'user', 'rejected'),
(4, 1, 'saju@gmail.com', 'saju123', 'driver', 'approved'),
(7, 2, 'arju@gmil.com', '654321', 'driver', 'approved'),
(9, 3, 'vimal@gmail.com', 'vimal', 'driver', 'approved'),
(10, 4, 'rahul@gmail.com', '12345', 'driver', 'approved'),
(11, 4, 'appu@gmail.com', 'appu', 'driver', 'approved'),
(12, 8, 'shine@gmail.com', 'shine', 'user', 'rejected'),
(13, 6, 'athul@gmail.com', 'athul', 'driver', 'approved'),
(14, 7, 'lal@gmail.com', 'lal123', 'driver', 'approved'),
(15, 9, 'raju@gmail.com', 'raju', 'user', 'rejected'),
(16, 10, 'appu@gmail.com', 'appu', 'user', 'rejected'),
(17, 11, 'amal07@gmail.com', 'asdfghjkl', 'user', 'approved'),
(18, 12, 'amith@gmail.com', 'amith', 'user', 'rejected'),
(19, 8, 'kebin@gmail.com', 'kebin', 'driver', 'approved'),
(20, 13, 'sabu@gmail.', 'sabu', 'user', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE IF NOT EXISTS `user_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `first_name`, `phone_number`, `email`, `password`, `address`) VALUES
(5, 'vineeth', '2147483647', 'vinee@gmail.com', 'Vine@123', 'Iduki'),
(8, 'shine', '2147483647', 'shine@gmail.com', 'shine', 'shine villa kottayam'),
(9, 'Raju', '2147483647', 'raju@gmail.com', 'raju', 'raju villa kottayam'),
(10, 'Appu', '2147483647', 'appu@gmail.com', 'appu', 'appu villa kottayam'),
(11, 'Amal', '2147483647', 'amal07@gmail.com', 'asdfghjkl', 'Kottayam'),
(12, 'Amith', '9658741233', 'amith@gmail.com', 'amith', 'amith villa kottayam'),
(13, 'sabu', '9845454845', 'sabu@gmail.', 'sabu', 'sabu villa iduki');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `bname` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `regnum` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(20) DEFAULT 'pending',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`bid`, `bname`, `brand`, `description`, `img`, `regnum`, `price`, `status`) VALUES
(2, 'Benz', 'Benz', 'good', 'about-img.png', 'KL-39-M8956', '2000.00', 'pending'),
(3, 'Swift', 'Maruthi', 'good vehicle , good milege , 5 seater', 'Screenshot 2023-10-28 185109.png', 'KL-39-PBoo34', '500.00', 'pending'),
(6, 'Bullet', 'Royal Enfield', 'Good condition, Good mileage, 2 seater', 'Royal-Enfield-Classic-350-ABS.jpg', 'KL-05-AB-6764', '500.00', 'booked'),
(7, 'Ninja', 'Kawasaki', 'Good condition, 2 seater', 'kawasaki-ninja-h2-r.jpg', 'KL-05-AB-8947', '800.00', 'pending'),
(8, 'Activa', 'Honda', 'Good condition, Good mileage, 2 seater', 'activa.webp', 'KL-01-CB-9816', '300.00', 'pending'),
(9, 'Classic 350', 'Royal Enfield', 'good condition, good mileage', 'Royal-Enfield-Classic-350-ABS.jpg', 'KL-01-CA-3456', '600.00', 'pending');
