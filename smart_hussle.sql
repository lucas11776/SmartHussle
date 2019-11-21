-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 03:11 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_hussle`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `slug` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `created`, `slug`, `name`) VALUES
(11, '2019-11-10 05:33:56', 'cap', 'cap'),
(16, '2019-11-11 13:13:11', 't-shirt', 't-shirt'),
(17, '2019-11-16 06:30:56', 'dress', 'dress');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mid` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mid`, `created`, `name`, `surname`, `subject`, `email`, `phone_number`, `message`) VALUES
(7, 0, 'Themba', 'Ngubeni', 'Testing Send Message is working', 'thembangubeni04@gmail.com', '07295632658', 'Just testing if send message is working.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `created`, `pid`, `name`, `surname`, `email`, `phone_number`) VALUES
(17, '2019-11-11 13:14:58', 18, 'Themba Lucas', 'Ngubeni', 'thembangubeni04@gmail.com', '07295632658'),
(18, '2019-11-19 06:33:41', 22, 'Themba', 'Ngubeni', 'thembangubeni04@gmail.com', '07295632658'),
(19, '2019-11-19 06:35:17', 22, 'Themba', 'Ngubeni', 'thembangubeni04@gmail.com', '07295632658'),
(20, '2019-11-19 06:59:09', 19, 'Themba', 'Ngubeni', 'thembangubeni04@gmail.com', '07295632658'),
(21, '2019-11-19 07:01:04', 19, 'Themba', 'Ngubeni', 'thembangubeni04@gmail.com', '07295632658'),
(22, '2019-11-19 07:35:11', 19, 'Themba', 'Ngubeni', 'thembangubeni04@gmail.com', '07295632658');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `slug` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `created`, `slug`, `category`, `picture`, `name`, `price`, `description`) VALUES
(18, '2019-11-11 13:14:28', 'sun-out-design', 't-shirt', 'uploads/Sun_Out_Design.png', 'sun out design', 80, 'Sun out design t-shirt with custom name.'),
(19, '2019-11-16 06:31:43', 'red-dress', 'dress', 'uploads/Red_Dress.jpg', 'red dress', 250, 'Red Dress with strips lancers.'),
(20, '2019-11-16 06:33:04', 'flower-pattern-dress', 'dress', 'uploads/Flower_Pattern_Dress_.jpg', 'flower pattern dress ', 400, 'Flower pattern dress with main color of white.'),
(21, '2019-11-16 06:34:31', 'design-hat', 'cap', 'uploads/Design_Hat.jpg', 'design hat', 150, 'Design shirt black hat.'),
(22, '2019-11-16 06:34:55', 'design-black-hat', 'cap', 'uploads/Design_Black_Hat.jpg', 'design black hat', 150, 'Design shirt black hat.'),
(23, '2019-11-16 06:37:12', 'golf-jersey', 't-shirt', 'uploads/Golf_Jersey.png', 'golf jersey', 450, 'Pro golf jersey.'),
(24, '2019-11-16 06:39:07', 'black-white-style', 't-shirt', 'uploads/Black_White_Style.jpg', 'black & white style', 350.99, 'Get full style of black and white.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` int(1) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `created`, `role`, `username`, `email`, `password`) VALUES
(15, '2019-11-14 15:02:29', 2, 'themba', 'thembangubeni04@gmail.com', '389986579c46ce682bc6cbb033e8174326e9c703bf5c17cf58d1a535ce1c8207cd0d17592a6fd4c27473f8e04d60f7449e868de00a3728bba0abdaec4d7a8db13YkjHbhClx8gLkwkUsh4mueBRaJIbFDutz+36xpVzq4='),
(16, '2019-11-14 16:17:11', 1, 'Peter', 'peter@gmail.com', 'bb8bd7d670d97f750b4eee528d60b75c9f68f9cc19a98e547bb1228c37e4012f977581688219eb563ff12cb043d15b82bc7cec9c8069d250e624ae9d1f0e14564pvUnLGQ4i23e2BhPpAqNESM/9UZbzFv/RZC8E0ahfE='),
(17, '2019-11-14 16:17:33', 1, 'sbu1', 'sbu1@gmail.com', '1e632993a760bd604193a70b39804094e087fede45f6c1db2ba325d9be9bcedc1f453c7f162fc1697dfeb0a37c891a62bc9f109c9ad4e42d0e54717e440652e4UbX92Iz3ZRRTlsGnMwQeq+mIOViTIQUq/sebVgxzrfw='),
(18, '2019-11-14 16:19:48', 1, 'lucas', 'lucas@gmail.com', 'dd62a4b364494a0f01b70d266e294c6afc4615800b073228dadef1c2e16c036264d5ce8f7c1ea3ea6e14212223d9a9de7fc01ea2d9302b6ca52e2ad195f060dcUGBr8Yz9IfNR152iDDYX7Aeqt91LsMoa3+CKXQr5XV0='),
(19, '2019-11-14 16:20:04', 1, 'musa', 'musa@gmail.com', '8d85a6e9de83ae578b536dfebf5408497bfe8b0232d5871f8a88ad37fc24b3fbe5219364b537e3890594801442bfb5fe9fb1f1cb102e29289f37ff1b9b1db4f3Bc84+tLsiDZZCuwTyHKkti8J8KQdw+X3S75ybmgHzlw=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
