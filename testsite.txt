-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2012 at 12:32 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'victor', 'victor@hotmail.com', ''),
(3, 'rock', 'rock@gmail.com', ''),
(5, 'vvvvvv', 'victorcruzbastos@gmail.comvvv', 'vvvvv'),
(6, 'tomas', 'victorcruzbastos@gmail.comvvcc', 'eeeee'),
(7, 'ffffffff', 'victorcruzbastos@gmail.comvvvv', '111111'),
(8, 'victor', 'victorcruzbastos@gmail.comvv', 'vvvvv'),
(9, 'vvvvv', 'victorcruzbastos@gmail.comvvvvvv', 'vvvvv'),
(10, 'vvvvvvvvvvv', 'victorcruzbastos@gmail.comvvvvvvv', 'vvvvv'),
(11, 'vvvvvvvv', 'victorcruzbastos@gmail.com', '11111'),
(12, 'vvbbb', 'victorcruzbastos@gmail.comv', '11111'),
(13, '11111', 'victorcruzbastos@gmail.comvvvvv', '11111'),
(14, '11111', 'victorcruzbastos@gmail.comvvvvv', '11111'),
(15, 'vvvvvvvvv', 'victorcruzbastos@gmail.comvvvvvvvv', 'vvvvv'),
(16, '11111d', 'victorcruzbastos@gmail.comvvvvvc', '11111'),
(17, 'vvvvvvv', 'victorcruzbastos@gmail.comvvxs', 'sssss'),
(18, 'victw', 'victorcruzbastos@gmail.comvvx', '11111'),
(19, 'Vict1', 'victorcruzbastos@gmail.coms', '11111'),
(20, 'victo', 'victorcruzbastos@gmail.comvvxa', '11111'),
(21, 'victor1', 'victorcruzbastos3@gmail.com', '11111'),
(22, 'dddd', 'dennis333@hotmail.com', '50f84daf3a6dfd6a9f20c9f8ef4289'),
(23, 'ddddd3', 'dennis33d3@hotmail.com', '50f84daf3a6dfd6a9f20c9f8ef4289'),
(24, 'ddddd33232', 'dennis331ddd3@hotmail.com', 'b7bc2a2f5bb6d521e64c8974c143e9'),
(25, 'aasewr', 'dennis121212@hotmail.com', 'b0baee9d279d34fa1dfd71aadb908c'),
(26, 'teswedcfw', 'dennis3212121213d3@hotmail.com', 'b0baee9d279d34fa1dfd71aadb908c'),
(27, 'mamatudo', 'mamatudo@gmail.com', 'd6d78c3165f36a6585caf50953ace0'),
(28, 'sapinto', 'sapinto@gmail.com', '827ccb0eea8a706c4c34a16891f84e'),
(29, 'chupa', 'chupa@gmail.com', '827ccb0eea8a706c4c34a16891f84e'),
(30, 'jaesta', 'jaesta@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
