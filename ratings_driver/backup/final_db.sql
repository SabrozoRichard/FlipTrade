-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 04:21 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
(222, '4593403', 'qc87TytKVmHtjc2xz9SUUBmJoiGKlaUB.jpg', 'Flip Trade', '2021-06-11 02:24:16', '4593403_1122940424', 'media'),
(223, '4593403', 'S5TUiyk3Ao6HHHDhAsvO9L91nUfSL3OP.jpg', 'Flip Trade', '2021-06-11 02:27:27', '4593403_469691711198504', 'media'),
(224, '4593403', 'k6ktZwVeTsTEGwKpKdNQCYEqi4kpCi0c.jpg', 'Flip Trade', '2021-06-11 02:35:03', '4593403_469691711198504', 'media'),
(225, '4593403', '😂', 'walts Trade', '2021-06-11 09:05:09', '4593403_5726412542277', 'text'),
(226, '4593403', 'hi😂', 'walts Trade', '2021-06-11 09:05:22', '4593403_5726412542277', 'text'),
(227, '4593403', 'oyALhtZqDYnEbHuJG9e8UOg7bj2sCWsK.jpg', 'walts Trade', '2021-06-11 09:05:46', '4593403_5726412542277', 'media'),
(228, '5726412542277', 'yes sir', 'richard sabrozo', '2021-06-11 09:08:24', '5726412542277_4593403', 'text'),
(229, '4593403', 'J6k1hYert591KrWvyVWTmDYKnlXuHYqL.jpg', 'walts Trade', '2021-06-11 09:24:19', '4593403_5726412542277', 'media'),
(230, '4593403', '68gtynv8x7DPe7YhdvJE5Nbx5fCOUI30.jpg', 'walts Trade', '2021-06-11 09:25:10', '4593403_5726412542277', 'media'),
(231, '4593403', 'wqw', 'walts Trade', '2021-06-11 09:25:16', '4593403_5726412542277', 'text'),
(232, '4593403', 'wqwwqwqwqwqwqw', 'walts Trade', '2021-06-11 09:25:22', '4593403_5726412542277', 'text'),
(233, '4593403', 'qw', 'walts Trade', '2021-06-11 09:25:22', '4593403_5726412542277', 'text'),
(234, '4593403', 'qw', 'walts Trade', '2021-06-11 09:25:22', '4593403_5726412542277', 'text'),
(235, '4593403', 'qw', 'walts Trade', '2021-06-11 09:25:22', '4593403_5726412542277', 'text'),
(236, '4593403', 'qw', 'walts Trade', '2021-06-11 09:25:22', '4593403_5726412542277', 'text'),
(237, '4593403', 'q', 'walts Trade', '2021-06-11 09:25:23', '4593403_5726412542277', 'text'),
(238, '4593403', 'wq', 'walts Trade', '2021-06-11 09:25:23', '4593403_5726412542277', 'text'),
(239, '4593403', 'wq', 'walts Trade', '2021-06-11 09:25:23', '4593403_5726412542277', 'text'),
(240, '4593403', 'wq', 'walts Trade', '2021-06-11 09:25:23', '4593403_5726412542277', 'text'),
(241, '4593403', 'wq', 'walts Trade', '2021-06-11 09:25:23', '4593403_5726412542277', 'text'),
(242, '4593403', 'w', 'walts Trade', '2021-06-11 09:25:23', '4593403_5726412542277', 'text'),
(243, '4593403', 'qw', 'walts Trade', '2021-06-11 09:25:24', '4593403_5726412542277', 'text'),
(244, '4593403', 'qw', 'walts Trade', '2021-06-11 09:25:24', '4593403_5726412542277', 'text'),
(245, '4593403', 'RCVZHv8DrHf7lzLe4P7h5LokhPcdNlo6.jpg', 'walts Trade', '2021-06-11 09:33:46', '4593403_5726412542277', 'media'),
(246, '4593403', '3Ks6bHgeeCvFKkZdhPbDBLt3MKKzlxAn.jpg', 'walts Trade', '2021-06-11 09:33:58', '4593403_5726412542277', 'media'),
(247, '4593403', 'mtuTjyZRCRIxd0rBShXxVVSk9e3ToqZj.png', 'walts Trade', '2021-06-11 09:34:11', '4593403_5726412542277', 'media'),
(248, '4593403', 'ohAXtLYA0YahEhCsXwWL0m7hWBV1AkQM.png', 'walts Trade', '2021-06-11 09:35:54', '4593403_5726412542277', 'media'),
(249, '4593403', 'hiii ito yung image', 'walts Trade', '2021-06-11 09:38:05', '4593403_5726412542277', 'text'),
(250, '4593403', 'AnaNpClFwl7rVzVqM2Z8Patq74aX1HhG.jpg', 'walts Trade', '2021-06-11 09:38:13', '4593403_5726412542277', 'media'),
(251, '5726412542277', 'gg', 'richard sabrozo', '2021-06-11 09:40:21', '5726412542277_4593403', 'text'),
(252, '5726412542277', 'g', 'richard sabrozo', '2021-06-11 09:40:26', '5726412542277_4593403', 'text'),
(253, '5726412542277', 'SDqAFqLqpciDMqeJr1XAT1q7cJllvA8l.jpg', 'richard sabrozo', '2021-06-11 09:41:00', '5726412542277_4593403', 'media'),
(254, '4593403', 'j4RXXn6NyoPjEESB4Z9fQ7tatmSiNTFu.jpg', 'walts Trade', '2021-06-11 09:41:15', '4593403_5726412542277', 'media'),
(255, '4593403', '9DeRKS7xOAbY8eRnui9WiP0OiZBytZFL.png', 'walts Trade', '2021-06-11 09:42:24', '4593403_5726412542277', 'media'),
(256, '4593403', 'vCjcnbr70zAimVznYaJr8cmh78d8AZYS.jpg', 'walts Trade', '2021-06-11 09:51:29', '4593403_5726412542277', 'media'),
(257, '4593403', '31VYSoo02v4xiRtHM3EQSRjclvVdFfbi.jpg', 'walts Trade', '2021-06-11 10:02:52', '4593403_5726412542277', 'media'),
(258, '4593403', 'cTIKoL66hAgqvNTY6QiKAU9sUbuNq9EZ.jpg', 'walts Trade', '2021-06-11 10:03:10', '4593403_469691711198504', 'media'),
(259, '4593403', 'aOatvJ9bZkyqRrmKd9AfB7t9gSR3YvrP.jpg', 'walts Trade', '2021-06-11 10:14:56', '4593403_1046194695747809078', 'media'),
(260, '4593403', 'KSyEnXplQSg9Zq2narxzu2n94mhGcx33.jpg', 'walts Trade', '2021-06-11 10:18:04', '4593403_9723', 'media'),
(261, '355575', 'ano gusto mo kapalit', 'Jeffrey Melendez', '2021-06-12 11:27:14', '355575_4593403', 'text'),
(262, '4593403', 'zyuIDE9WxmjXxf7S5JdBHym8qsHPzeHY.jpeg', 'walts Trade', '2021-06-12 11:28:01', '4593403_355575', 'media'),
(263, '4593403', 'ball', 'walts Trade', '2021-06-12 11:28:05', '4593403_355575', 'text'),
(264, '355575', 'okay', 'Jeffrey Melendez', '2021-06-12 11:28:29', '355575_4593403', 'text'),
(265, '4593403', 'saan meet up', 'walts Trade', '2021-06-12 11:28:53', '4593403_355575', 'text'),
(266, '712635897', 'this is available??', 'walt for sale Melendez', '2021-06-12 12:01:34', '712635897_4593403', 'text'),
(267, '4593403', 'yes po sir', 'walts Trade', '2021-06-12 12:02:21', '4593403_712635897', 'text'),
(268, '15911', 'gusto ko ito', 'Mcwalter Melendez', '2021-06-12 12:47:55', '15911_4593403', 'text'),
(269, '4593403', 'sayo na', 'walts Trade', '2021-06-12 12:48:20', '4593403_15911', 'text'),
(270, '4593403', '😡', 'walts Trade', '2021-06-12 12:48:33', '4593403_15911', 'text'),
(271, '4593403', 'cytKRgQd2SW2gjpper86oeomVKtTpIfL.jpg', 'walts Trade', '2021-06-12 12:48:39', '4593403_15911', 'media'),
(272, '1149736795873', 'i want this item', 'jeffrey Melendez', '2021-06-12 13:06:08', '1149736795873_5726412542277', 'text'),
(273, '4766381375427071875', 'what item you want', 'mcwalter  shop', '2021-06-12 13:13:00', '4766381375427071875_5726412542277', 'text'),
(274, '5726412542277', 'road bike', 'richard sabrozo', '2021-06-12 13:13:49', '5726412542277_4766381375427071875', 'text'),
(275, '4766381375427071875', 'zVm3ChHhtQEob69ngzKl6XQoXnOQb1f6.jpg', 'mcwalter  shop', '2021-06-12 13:14:23', '4766381375427071875_5726412542277', 'media'),
(276, '4593403', 'L7u7Y4jvFKLtzKqzOPP8rpR8CdWacEyZ.jpeg', 'walts melendez', '2021-06-24 05:14:17', '4593403_469691711198504', 'media');

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
(68, 'Sent a photo', 'Flip Trade', 'profiles/1-intro-photo-final.jpg', '2021-06-11 06:14:56', '1046194695747809078', 'unread', '4593403', '4593403_1046194695747809078'),
(69, 'Sent a photo.', 'Flip Trade', 'profiles/1-intro-photo-final.jpg', '2021-06-11 10:24:16', '1122940424', 'unread', '4593403', '4593403_1122940424'),
(70, 'Sent a photo', 'Flip Trade', 'profiles/1-intro-photo-final.jpg', '2021-06-24 01:14:17', '469691711198504', 'unread', '4593403', '4593403_469691711198504'),
(71, 'Sent a photo', 'walts Trade', 'profiles/1-intro-photo-final.jpg', '2021-06-11 06:02:52', '5726412542277', 'seen', '4593403', '4593403_5726412542277'),
(72, 'Sent a photo', 'richard sabrozo', 'profiles/social-media-profile-photos-3.jpg', '2021-06-11 05:41:00', '4593403', 'seen', '5726412542277', '5726412542277_4593403'),
(73, 'Sent a photo.', 'walts Trade', 'profiles/1-intro-photo-final.jpg', '2021-06-11 18:18:04', '9723', 'unread', '4593403', '4593403_9723'),
(74, 'okay', 'Jeffrey Melendez', '', '2021-06-12 07:28:29', '4593403', 'seen', '355575', '355575_4593403'),
(75, 'saan meet up', 'walts Trade', 'profiles/1-intro-photo-final.jpg', '2021-06-12 07:28:53', '355575', 'seen', '4593403', '4593403_355575'),
(76, 'this is available??', 'walt for sale Melendez', 'profiles/walter.jpg', '2021-06-12 20:01:34', '4593403', 'seen', '712635897', '712635897_4593403'),
(77, 'yes po sir', 'walts Trade', 'profiles/1-intro-photo-final.jpg', '2021-06-12 20:02:21', '712635897', 'unread', '4593403', '4593403_712635897'),
(78, 'gusto ko ito', 'Mcwalter Melendez', '', '2021-06-12 20:47:55', '4593403', 'seen', '15911', '15911_4593403'),
(79, 'Sent a photo', 'walts Trade', 'profiles/1-intro-photo-final.jpg', '2021-06-12 08:48:39', '15911', 'unread', '4593403', '4593403_15911'),
(80, 'i want this item', 'jeffrey Melendez', 'profiles/1-intro-photo-final.jpg', '2021-06-12 21:06:08', '5726412542277', 'seen', '1149736795873', '1149736795873_5726412542277'),
(81, 'Sent a photo', 'mcwalter  shop', 'profiles/1-intro-photo-final.jpg', '2021-06-12 09:14:23', '5726412542277', 'seen', '4766381375427071875', '4766381375427071875_5726412542277'),
(82, 'road bike', 'richard sabrozo', 'profiles/social-media-profile-photos-3.jpg', '2021-06-12 21:13:49', '4766381375427071875', 'seen', '5726412542277', '5726412542277_4766381375427071875');

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
(36, 80362116169286, 3703089056, 'BOOKS', 'uploads/AvkNsmQygJ3UTBy.jpg', 'take it in good condition', 'Electronic', 'Buenlag Binmaley Pangasinan', '2021-06-09 02:29:22', 0, 'Red', 'available'),
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
  `profile_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `userid`, `firstname`, `lastname`, `email`, `password`, `address`, `gender`, `url_address`, `date`, `profile_img`) VALUES
(19, 4593403, 'walts', 'melendez', 'fliptrade@gmail.com', 'fliptrade', 'Dagupan City', 'female', 'flip.trade', '2021-06-12 12:50:01', 'profiles/01-shutterstock_476340928-Irina-Bg.jpg'),
(20, 9723, 'arnel', 'bataoil', 'arnel@yahoo.com', 'arnel123', 'Lingayen ', 'female', 'arnel.bataoil', '2021-05-03 09:06:08', 'profiles/87305941_2602013913379209_5219261833105375232_n.jpg'),
(21, 1046194695747809078, 'welmar', 'abaoag', 'welmar@gmail.com', '12345', 'Baybay Lopez', 'male', 'welmar.abaoag', '2021-05-03 09:06:01', 'profiles/pexels-photo-220453.jpeg'),
(22, 469691711198504, 'chad', 'bataoil', 'chad@gmail.com', '12345', 'lingayen', 'male', 'chad.chad', '2021-05-18 19:33:16', 'profiles/imagesqq.jfif'),
(27, 3703089056, 'jaymark', 'baniqued', 'jaymark@gmail.com', 'jaymark', 'Buenlag Binmaley Pangasinan', 'male', 'jaymark.baniqued', '2021-05-03 09:05:41', 'profiles/imagesqq.jfif'),
(28, 6089423991896858, 'Prince', 'Shaman', 'prince@yahoo.com', 'prince', 'Bien East Binmaley Pangasinan', 'male', 'prince.shaman', '2021-05-03 09:01:12', 'profiles/1-intro-photo-final.jpg'),
(29, 223607016229643, 'timmy', 'bautista', 'timmy@gmail.com', 'timmy', 'Carael st. Dagupan City', 'male', 'timmy.bautista', '2021-05-03 08:59:46', 'profiles/landscape.jpg'),
(36, 5726412542277, 'richard', 'sabrozo', 'richard@yahoo.com', 'richard', 'Agno, Pangasinan', 'male', 'richard.sabrozo', '2021-05-18 19:17:49', 'profiles/social-media-profile-photos-3.jpg'),
(38, 355575, 'Jeffrey', 'Melendez', 'jeffrey@gmail.com', 'jeffrey', 'Binmaley, Pangasinan', 'male', 'jeffrey.melendez', '2021-06-12 11:24:53', ''),
(43, 1149736795873, 'jeffrey', 'Melendez', 'jeff@gmail.com', 'melendez12', 'Dasol, Pangasinan', 'male', 'jeff.melendez', '2021-06-12 13:05:42', 'profiles/1-intro-photo-final.jpg'),
(44, 4766381375427071875, 'mcwalter ', 'shop', 'waltermcmelendez17@gmail.com', 'melendez', 'Binmaley, Pangasinan', 'male', 'mcwalter.melendez', '2021-06-12 13:12:22', 'profiles/1-intro-photo-final.jpg');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_trade`
--
ALTER TABLE `tbl_trade`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
