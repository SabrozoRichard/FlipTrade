-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 05:13 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trade`
--

CREATE TABLE `tbl_trade` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `title` varchar(50) NOT NULL,
  `posted_img` varchar(500) NOT NULL,
  `post` text NOT NULL,
  `categories` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` tinyint(1) NOT NULL,
  `variant` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trade`
--

INSERT INTO `tbl_trade` (`id`, `postid`, `userid`, `title`, `posted_img`, `post`, `categories`, `location`, `date`, `has_image`, `variant`, `status`) VALUES
(30, 1618774, 9723, 'oxygen', 'uploads/ea6fe67d291342493591aa33a8e6591e.jfif', 'good condition ', 'Apparel', 'Lingayen', '2021-06-08 15:22:26', 0, '1.5', 'available'),
(33, 9108694735, 6089423991896858, 'Camera', 'uploads/1_BDE-SkJBCG_7P4chK4vKnw.jpeg', 'DSLR', 'Entertainment', 'Bien East Binmaley Pangasinan', '2021-05-18 19:41:53', 0, 'black', ''),
(34, 477435022980777, 223607016229643, 'Giyang Clothing', 'uploads/d7a9220827cd5fbf3a5dfef48f181807.jfif', 'New arrival', 'Apparel', 'Carael st. Dagupan City', '2021-05-18 19:29:09', 0, 'small', ''),
(36, 80362116169286, 3703089056, 'BOOKS', 'uploads/AvkNsmQygJ3UTBy.jpg', 'take it in good condition', 'Electronic', 'Buenlag Binmaley Pangasinan', '2021-06-26 02:54:32', 0, 'Red', 'available'),
(37, 9230892389674137, 3703089056, 'JANSPORT BAG ', 'uploads/original_jansport_backpack_1595251870_0336c0aa.jpg', 'Jansport bag brand new', 'Apparel', 'Buenlag Binmaley Pangasinan', '2021-06-09 04:10:38', 0, 'Red', 'sold'),
(52, 16053903, 1046194695747809078, 'Shoes', 'uploads/download.jfif', 'good like new', 'Instrument', 'Agno, Pangasinan', '2021-06-09 02:07:52', 1, 'medium', 'available'),
(60, 925134166435741, 5726412542277, 'gaming chair', 'uploads/01-shutterstock_476340928-Irina-Bg.jpg', 'good as new', 'Games', 'Agno, Pangasinan', '2021-06-09 02:29:28', 1, '', 'available'),
(61, 86486478, 4593403, 'Spalding Ball', 'uploads/1_BDE-SkJBCG_7P4chK4vKnw.jpeg', 'brand new', 'Sports', 'Dagupan City', '2021-06-12 10:09:30', 1, '', 'available'),
(62, 97877, 469691711198504, 'Head Phone', 'uploads/download (2).jfif', 'good condition check all you want', 'Entertainment', 'lingayen', '2021-06-09 01:57:06', 1, '', 'available'),
(64, 1238017219077868412, 6089423991896858, 'headphone', 'uploads/download (2).jfif', '1 month old', 'Electronic', 'Bien East Binmaley Pangasinan', '2021-06-12 09:25:13', 1, 'black', 'Active'),
(65, 15450, 4593403, 'baby rat', 'uploads/mouse.jpg', '1 month old\r\nswap sa rabbit', 'Pets', 'Dagupan City', '2021-06-12 10:12:14', 1, '', 'Active'),
(66, 5331, 355575, 'dog', 'uploads/dpg.jpg', '1 month old', 'Pets', 'Binmaley, Pangasinan', '2021-06-12 11:26:32', 1, 'color white', 'Active'),
(67, 10184908894, 712635897, 'dog', 'uploads/dog.jpg', '1 month old', 'Pets', 'Binmaley, Pangasinan', '2021-06-12 12:00:56', 1, 'black', 'Active'),
(68, 757253, 15911, 'tv', 'uploads/tv.jpg', '16 inches', 'Electronic', 'Binmaley, Pangasinan', '2021-06-12 12:45:39', 1, '', 'Active'),
(69, 123655111074, 1149736795873, 'nike', 'uploads/20200220_122454.jpg', 'wgood to new', 'Home', 'Dasol, Pangasinan', '2021-06-12 13:05:22', 1, '', 'Active'),
(70, 355655017940172, 4766381375427071875, 'gaming chair', 'uploads/6f69dc7a54a64947a5ab846ed13124b3.jfif', 'goods 1 month old', 'Hobbies', 'Binmaley, Pangasinan', '2021-06-12 13:11:34', 1, '', 'Active'),
(71, 47415461751, 4593403, 'molten ball', 'uploads/1_BDE-SkJBCG_7P4chK4vKnw.jpeg', '1 month old', 'Sports', 'Dagupan City', '2021-06-23 06:31:58', 1, 'black', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_trade`
--
ALTER TABLE `tbl_trade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tradeid` (`postid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `title` (`title`),
  ADD KEY `categoties` (`categories`),
  ADD KEY `location` (`location`),
  ADD KEY `date` (`date`),
  ADD KEY `has_image` (`has_image`);
ALTER TABLE `tbl_trade` ADD FULLTEXT KEY `post` (`post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_trade`
--
ALTER TABLE `tbl_trade`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
