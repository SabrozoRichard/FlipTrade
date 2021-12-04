-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 05:37 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fliptrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acccount`
--

CREATE TABLE `admin_acccount` (
  `id` int(11) NOT NULL,
  `userid` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_acccount`
--

INSERT INTO `admin_acccount` (`id`, `userid`, `fname`, `lname`, `email`, `password`) VALUES
(1, 12345, 'Admin', 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `recieved_by` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `csid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `msgtype` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `recieved_by`, `message`, `sender`, `created`, `csid`, `msgtype`) VALUES
(1, '3703089056', 'tse', 'arnel bataoil', '2021-06-05 06:17:21', '9723_3703089056', 'text'),
(2, '', 'heyy ibang tao ako', 'ibang tao', '2021-06-05 07:10:17', '1_2', 'text'),
(3, '', 'kausap mo', 'reply', '2021-06-05 07:11:34', '3703089056_9723', 'text'),
(4, '3703089056', 'hoi', 'arnel bataoil', '2021-06-05 07:21:13', '9723_3703089056', 'text'),
(5, '9723', 'bakit?', 'jaymark', '2021-06-05 07:25:07', '3703089056_9723', 'text'),
(6, '3703089056', 'wala lang', 'arnel bataoil', '2021-06-05 11:47:45', '9723_3703089056', 'text'),
(108, '9723', 'walay ibagak', 'arnel bataoil', '2021-06-05 12:38:52', '9723_3703089056', 'text'),
(114, '9723', 'oyy tol musta ka na?', 'arnel bataoil', '2021-06-05 14:09:58', '9723_3703089056', 'text'),
(115, '9723', 'ayus lang ako', 'jaymark', '2021-06-05 14:10:09', '3703089056_9723', 'text'),
(131, '9723', 'is this available ... ?', 'arnel bataoil', '2021-06-06 11:27:16', '9723_3703089056', 'text'),
(132, '9723', 'read my uid', 'arnel bataoil', '2021-06-06 12:41:16', '9723_3703089056', 'text'),
(133, '3703089056', 'oo nabasa ko na po', 'jaymark baniqued', '2021-06-06 13:08:50', '3703089056_9723', 'text'),
(136, '9723', 'sir how much po yung bike ?', 'arnel bataoil', '2021-06-06 13:48:07', '9723_3703089056', 'text'),
(137, '3703089056', 'mga 1000 po ibenta mo na kidney mo', 'jaymark baniqued', '2021-06-06 13:49:28', '3703089056_9723', 'text'),
(138, '9723', 'di waw', 'arnel bataoil', '2021-06-06 13:49:34', '9723_3703089056', 'text'),
(139, '3703089056', 'bleh bleh', 'jaymark baniqued', '2021-06-06 13:49:39', '3703089056_9723', 'text'),
(158, '1046194695747809078', 'how much yung books?', 'welmar abaoag', '2021-06-07 07:36:06', '1046194695747809078_3703089056', 'text'),
(159, '3703089056', '250 lang po sir &#128512;', 'jaymark baniqued', '2021-06-07 07:36:15', '3703089056_1046194695747809078', 'text'),
(160, '1046194695747809078', 'teynkyu', 'welmar abaoag', '2021-06-07 07:40:12', '1046194695747809078_3703089056', 'text'),
(161, '9723', 'sir reject po pala yung bike', 'arnel bataoil', '2021-06-07 07:58:08', '9723_3703089056', 'text'),
(162, '3703089056', 'dalihin nyo po dito sa shop sir', 'jaymark baniqued', '2021-06-07 08:58:16', '3703089056_9723', 'text'),
(164, '223607016229643', 'sir may sira yung shoes', 'timmy bautista', '2021-06-07 13:26:28', '223607016229643_1046194695747809078', 'text'),
(165, '1046194695747809078', 'repair mo nalang', 'welmar abaoag', '2021-06-07 13:27:39', '1046194695747809078_223607016229643', 'text'),
(166, '223607016229643', 'hmm!😡', 'timmy bautista', '2021-06-07 15:38:44', '223607016229643_1046194695747809078', 'text'),
(167, '223607016229643', 'balakajan! 😂', 'timmy bautista', '2021-06-07 15:39:04', '223607016229643_1046194695747809078', 'text'),
(191, '9723', 'wag nalang😡', 'arnel bataoil', '2021-06-08 12:05:04', '9723_3703089056', 'text'),
(216, '1046194695747809078', 'sir!', 'welmar abaoag', '2021-06-11 01:27:03', '1046194695747809078_4593403', 'text'),
(217, '1046194695747809078', 'Jl4v9dy6DhjGpp9pNfSgtTPNWFOrQVAD.png', 'welmar abaoag', '2021-06-11 01:27:06', '1046194695747809078_4593403', 'media'),
(218, '1046194695747809078', 'may something sa chicken mo!', 'welmar abaoag', '2021-06-11 01:27:11', '1046194695747809078_4593403', 'text'),
(219, '4593403', 'ohh really??', 'Flip Trade', '2021-06-11 01:27:25', '4593403_1046194695747809078', 'text'),
(220, '4593403', 'sige bayaran kita, wag moko isumbong kay tulfo', 'Flip Trade', '2021-06-11 01:27:34', '4593403_1046194695747809078', 'text'),
(221, '4593403', 'k0RBiuGiRTVPE9eefplQCzaiRtwAQhFz.png', 'Flip Trade', '2021-06-11 01:27:39', '4593403_1046194695747809078', 'media'),
(222, '4593403', 'asdsadsa', 'Flip Trade', '2021-06-25 15:31:07', '4593403_4593403', 'text'),
(223, '4593403', 'Hello', 'Flip Trade', '2021-06-26 12:45:42', '4593403_4593403', 'text'),
(224, '4593403', 'Boss, pinge skin ni nana', 'Flip Trade', '2021-06-26 12:46:13', '4593403_1046194695747809078', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senderdp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `reciever` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senderuid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `csid` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `message`, `sender`, `senderdp`, `created`, `reciever`, `status`, `senderuid`, `csid`) VALUES
(33, 'teynkyu', 'welmar abaoag', 'profiles/pexels-photo-220453.jpeg', '2021-06-07 15:36:06', '3703089056', 'unread', '1046194695747809078', '1046194695747809078_3703089056'),
(34, '250 lang po sir ', 'jaymark baniqued', 'profiles/imagesqq.jfif', '2021-06-07 15:36:16', '1046194695747809078', 'unread', '3703089056', '3703089056_1046194695747809078'),
(37, 'sir may something sa chicken', 'jaymark baniqued', 'profiles/imagesqq.jfif', '2021-06-11 12:01:28', '9723', 'unread', '3703089056', '3703089056_9723'),
(39, 'balakajan! 😂', 'timmy bautista', 'profiles/landscape.jpg', '2021-06-07 21:26:28', '1046194695747809078', 'seen', '223607016229643', '223607016229643_1046194695747809078'),
(40, 'repair mo nalang', 'welmar abaoag', 'profiles/pexels-photo-220453.jpeg', '2021-06-07 21:27:39', '223607016229643', 'seen', '1046194695747809078', '1046194695747809078_223607016229643'),
(64, 'ibalik ko pera mo sir pakiprint mo nalang', 'arnel bataoil', 'profiles/87305941_2602013913379209_5219261833105375232_n.jpg', '2021-06-10 11:26:49', '3703089056', 'unread', '9723', '9723_3703089056'),
(67, 'may something sa chicken mo!', 'welmar abaoag', 'profiles/pexels-photo-220453.jpeg', '2021-06-11 09:27:11', '4593403', 'seen', '1046194695747809078', '1046194695747809078_4593403'),
(68, 'Boss, pinge skin ni nana', 'Flip Trade', 'profiles/1-intro-photo-final.jpg', '2021-06-26 08:46:13', '1046194695747809078', 'unread', '4593403', '4593403_1046194695747809078'),
(69, 'Hello', 'Flip Trade', 'profiles/1-intro-photo-final.jpg', '2021-06-26 08:45:42', '4593403', 'seen', '4593403', '4593403_4593403');

-- --------------------------------------------------------

--
-- Table structure for table `sold_items`
--

CREATE TABLE `sold_items` (
  `id` int(250) NOT NULL,
  `userid` varchar(250) NOT NULL,
  `buyer_fname` varchar(250) NOT NULL,
  `buyer_lname` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `variant` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `trader_fname` varchar(250) NOT NULL,
  `trader_lname` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `postid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold_items`
--

INSERT INTO `sold_items` (`id`, `userid`, `buyer_fname`, `buyer_lname`, `product_name`, `variant`, `category`, `location`, `quantity`, `trader_fname`, `trader_lname`, `image`, `postid`) VALUES
(21, '4593403', 'Dominique', 'Jorge', 'Spalding Ball', 'Black', 'Sports', 'Dagupan City', '1', 'Flip', 'Trade', 'uploads/1_BDE-SkJBCG_7P4chK4vKnw.jpeg', '86486478'),
(22, '9723', 'Flip', 'Trade', 'oxygen', '1.5', 'Apparel', 'Lingayen', '1', 'arnel', 'bataoil', 'uploads/ea6fe67d291342493591aa33a8e6591e.jfif', '1618774');

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
  `status` varchar(100) NOT NULL,
  `quantity` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trade`
--

INSERT INTO `tbl_trade` (`id`, `postid`, `userid`, `title`, `posted_img`, `post`, `categories`, `location`, `date`, `has_image`, `variant`, `status`, `quantity`) VALUES
(29, 1200, 4593403, 'Road Bike', 'uploads/content_022717_0709_road_bikes_choose_lg.jpg', 'swap sa MTB', 'Vehicles', 'Dagupan City', '2021-06-26 13:57:54', 0, '48 size', 'available', '-2'),
(30, 1618774, 9723, 'oxygen', 'uploads/ea6fe67d291342493591aa33a8e6591e.jfif', 'good condition ', 'Apparel', 'Lingayen', '2021-06-28 12:48:13', 0, '1.5', 'available', '4'),
(33, 9108694735, 6089423991896858, 'Camera', 'uploads/1_BDE-SkJBCG_7P4chK4vKnw.jpeg', 'DSLR', 'Hobbies', 'Bien East Binmaley Pangasinan', '2021-06-29 03:18:59', 0, 'black', '', '5'),
(34, 477435022980777, 223607016229643, 'Giyang Clothing', 'uploads/d7a9220827cd5fbf3a5dfef48f181807.jfif', 'New arrival', 'Apparel', 'Carael st. Dagupan City', '2021-06-27 14:53:56', 0, 'small', '', '10'),
(36, 80362116169286, 3703089056, 'BOOKS', 'uploads/AvkNsmQygJ3UTBy.jpg', 'take it in good condition', 'Electronic', 'Buenlag Binmaley Pangasinan', '2021-06-27 14:54:00', 0, 'Red', 'available', '10'),
(37, 9230892389674137, 3703089056, 'JANSPORT BAG ', 'uploads/original_jansport_backpack_1595251870_0336c0aa.jpg', 'Jansport bag brand new', 'Apparel', 'Buenlag Binmaley Pangasinan', '2021-06-27 14:54:03', 0, 'Red', 'sold', '5'),
(52, 16053903, 1046194695747809078, 'Shoes', 'uploads/download.jfif', 'good like new', 'Instrument', 'Agno, Pangasinan', '2021-06-27 14:54:35', 1, 'medium', 'available', '10'),
(53, 88470, 5726412542277, 'Spalding Ball', 'uploads/1_BDE-SkJBCG_7P4chK4vKnw.jpeg', 'Good as new ', 'Sports', 'Binmaley, Pangasinan', '2021-06-27 14:54:32', 1, 'blue', 'available', '10'),
(60, 925134166435741, 5726412542277, 'gaming chair', 'uploads/01-shutterstock_476340928-Irina-Bg.jpg', 'good as new', 'Games', 'Agno, Pangasinan', '2021-06-27 14:54:38', 1, '', 'available', '2'),
(61, 86486478, 4593403, 'Spalding Ball', 'uploads/1_BDE-SkJBCG_7P4chK4vKnw.jpeg', 'brand new', 'Sports', 'Dagupan City', '2021-06-27 13:34:53', 1, 'Black', 'available', '5'),
(62, 97877, 469691711198504, 'Head Phone', 'uploads/download (2).jfif', 'good condition check all you want', 'Entertainment', 'lingayen', '2021-06-09 01:57:06', 1, '', 'available', ''),
(63, 251062819827995, 4593403, 'Camera', 'uploads/90d-yellow.jpeg', 'awesome', 'Electronic', 'Dagupan City', '2021-06-27 13:34:05', 1, 'Black', 'Active', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_img` varchar(1000) NOT NULL,
  `userstate` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `userid`, `firstname`, `lastname`, `email`, `password`, `address`, `gender`, `url_address`, `date`, `profile_img`, `userstate`) VALUES
(19, 4593403, 'Flip', 'Trade', 'fliptrade@gmail.com', 'fliptrade', 'Dagupan City', 'female', 'flip.trade', '2021-06-28 10:12:33', 'profiles/0e0672f41f112736dd84af19dbc6bdad.jpg', 'Verified'),
(20, 9723, 'arnel', 'bataoil', 'arnel@yahoo.com', 'arnel123', 'Lingayen ', 'female', 'arnel.bataoil', '2021-06-29 03:35:59', 'profiles/87305941_2602013913379209_5219261833105375232_n.jpg', 'pending'),
(21, 1046194695747809078, 'welmar', 'abaoag', 'welmar@gmail.com', '12345', 'Baybay Lopez', 'male', 'welmar.abaoag', '2021-06-29 03:36:03', 'profiles/pexels-photo-220453.jpeg', 'pending'),
(22, 469691711198504, 'chad', 'bataoil', 'chad@gmail.com', '12345', 'lingayen', 'male', 'chad.chad', '2021-06-29 03:36:06', 'profiles/imagesqq.jfif', 'pending'),
(27, 3703089056, 'jaymark', 'baniqued', 'jaymark@gmail.com', 'jaymark', 'Buenlag Binmaley Pangasinan', 'male', 'jaymark.baniqued', '2021-06-29 03:36:09', 'profiles/imagesqq.jfif', 'pending'),
(28, 6089423991896858, 'Prince', 'Shaman', 'prince@yahoo.com', 'prince', 'Bien East Binmaley Pangasinan', 'male', 'prince.shaman', '2021-06-28 15:06:24', 'profiles/1-intro-photo-final.jpg', 'pending'),
(29, 223607016229643, 'timmy', 'bautista', 'timmy@gmail.com', 'timmy', 'Carael st. Dagupan City', 'male', 'timmy.bautista', '2021-06-28 10:08:55', 'profiles/landscape.jpg', 'pending'),
(36, 5726412542277, 'richard', 'sabrozo', 'richard@yahoo.com', 'richard', 'Agno, Pangasinan', 'male', 'richard.sabrozo', '2021-05-18 19:17:49', 'profiles/social-media-profile-photos-3.jpg', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acccount`
--
ALTER TABLE `admin_acccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `csid` (`csid`) USING HASH;

--
-- Indexes for table `sold_items`
--
ALTER TABLE `sold_items`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `email` (`email`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acccount`
--
ALTER TABLE `admin_acccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `sold_items`
--
ALTER TABLE `sold_items`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_trade`
--
ALTER TABLE `tbl_trade`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
