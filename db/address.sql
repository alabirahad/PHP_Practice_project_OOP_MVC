-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 07:14 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `address`
--

-- --------------------------------------------------------

--
-- Table structure for table `albumdetails`
--

CREATE TABLE `albumdetails` (
  `id` int(50) NOT NULL,
  `album_name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albumdetails`
--

INSERT INTO `albumdetails` (`id`, `album_name`, `photo`) VALUES
(37, 'cricket', '13.jpg'),
(38, 'Football', '8.jpg'),
(39, 'Bangladesh', 'c7.jpg'),
(59, ' Capture', 'images.jpg'),
(60, 'abcd', 'background1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `albumphotos`
--

CREATE TABLE `albumphotos` (
  `id` int(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `album_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albumphotos`
--

INSERT INTO `albumphotos` (`id`, `photo`, `album_id`) VALUES
(99, '3.jpg', 36),
(100, '4.jpg', 36),
(103, '17.jpg', 36),
(104, '18.jpg', 36),
(106, '19.jpg', 36),
(107, '20.jpg', 36),
(110, '23.jpg', 36),
(116, '3.jpg', 37),
(117, '5.jpg', 37),
(118, '15.jpg', 37),
(119, '16.jpg', 37),
(120, '17.jpg', 37),
(121, '18.jpg', 37),
(122, '19.jpg', 37),
(123, '20.jpg', 37),
(124, '21.jpg', 37),
(125, '22.jpg', 37),
(126, '23.jpg', 37),
(127, '24.jpg', 37),
(129, '26.jpg', 37),
(131, '6.jpg', 38),
(132, '7.jpg', 38),
(133, '9.jpg', 38),
(134, '11.jpg', 38),
(135, 'c1.jpg', 39),
(136, 'c2.jpg', 39),
(137, 'c3.jpg', 39),
(139, 'c5.jpg', 39),
(140, 'c6.jpg', 39),
(141, 'c8.jpg', 39),
(165, '104539449_580574132877814_8238617255879986737_n.jpg', 59),
(166, '105030560_3037590786336322_8897664843781943149_n.jpg', 59),
(167, '105278360_369026467394038_7858535988757120167_n.jpg', 59),
(168, '105419619_192686878754543_8965687444432506191_n.jpg', 59),
(169, '117444765_821537211713692_7826555538095690619_n.jpg', 59),
(170, '117822941_682432592483403_5078510059859368468_n.jpg', 59),
(171, '117943307_3255203117905386_1024997732729909510_n.jpg', 59),
(174, '27.jpg', 37);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL,
  `division_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `division_id`) VALUES
(1, 'Dhaka', '1'),
(2, 'Faridpur', '1'),
(3, 'Gazipur', '1'),
(4, 'Tangail', '1'),
(5, 'Barisal', '2'),
(6, 'Barguna', '2'),
(7, 'vola', '2'),
(8, 'potuakhali', '2'),
(9, 'Coxs Bazar', '3'),
(10, 'Bandarban', '3'),
(11, 'Rangamati', '3'),
(12, 'Bagerhat', '4'),
(13, 'Khulna', '4'),
(14, 'kustia', '4'),
(15, 'Bagura', '5'),
(16, 'Pabna', '5'),
(17, 'Dinajpur', '6'),
(18, 'Rangpur', '6'),
(19, 'Hobiganj', '7'),
(20, 'Sunamganj', '7'),
(21, 'Sylhet', '7'),
(22, 'Jamalpur', '8'),
(23, 'Sherpur', '8'),
(24, 'Mymensing', '8');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `division_id` int(11) NOT NULL,
  `division_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`) VALUES
(1, 'Dhaka'),
(2, 'Barisal'),
(3, 'Chottogram'),
(4, 'Khulna'),
(5, 'Rajshahi'),
(6, 'Rangpur'),
(7, 'Sylhet'),
(8, 'Mymensing');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `file`, `date`, `user`) VALUES
(25, 'dsf', '6.jpg', '2020-08-24 10:15:00.000000', '151'),
(28, 'word', 'New Microsoft Word Document.docx', '2020-08-24 10:29:00.000000', '151');

-- --------------------------------------------------------

--
-- Table structure for table `registerperson`
--

CREATE TABLE `registerperson` (
  `id` int(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `division` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `thana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registerperson`
--

INSERT INTO `registerperson` (`id`, `firstName`, `lastName`, `userName`, `password`, `email`, `number`, `photo`, `division`, `district`, `thana`) VALUES
(151, 'y', 'y', 'y', '415290769594460e2e485922904f345d', 'y@gmail.com', '00000', '6.jpg', '1', '4', '10'),
(152, 'x', 'x', 'x', '9dd4e461268c8034f5c8564e155c67a6', 'x@gmail.com', 'x', '13.jpg', '1', '2', ''),
(157, 'Abir', '', 'h', '2510c39011c5be704182423e3a695e91', 'h@gmail.com', 'h', 'abir2.png', '1', '2', '1'),
(175, 'Ahad', 'fdg', 'dfg', 'bf22a1d0acfca4af517e1417a80e92d1', 'gd@gmail.com', 'fddd', 'download.jfif', '1', '4', '13'),
(176, 'araf', 'trrrrrryeety', 'eyteyt', '166239c14775ae931d8feedc165ac9b8', 'yetyt@gmail.com', 'etyety', 'download (1).jfif', '1', '1', '3'),
(177, 'Abid', 'vcxbv', 'gdsgg', 'ad14ddc62656449dd2cd1f942937dd0a', 'fsdg@gmail.com', 'gsfsdg', 'download (2).jfif', '0', '--- Select District ---', '--- Select Thana ---'),
(178, 'Adnan', 'agb fds', 'bfgsbg', '844db9663752eae2edfc6032080e8f41', 'sgbs@gmail.com', 'sgbs', 'images.jfif', '0', '--- Select District ---', '--- Select Thana ---'),
(179, 'mamun', 'rewtwbytry', 'wrybhwyt', '91af3bd938c5820bb475993bda467886', 'twy@gmail.com', 'wytb', 'images (1).jfif', '0', '--- Select District ---', '--- Select Thana ---'),
(180, 'patuary', '', 'fdsgs b', '9e61055bb59b83b9aebe8b9f67149c64', 'sg@gmail.com', '', 'images.png', '0', '--- Select District ---', '--- Select Thana ---'),
(181, 'sakhawat', 'sdagasfdg', 'asdfg', 'e6790d825d13e7bc0b7f5545e60fb5f9', 'fdsg@gmail.com', '', 'images (2).jfif', '0', '--- Select District ---', '--- Select Thana ---'),
(182, 'gsev w', 'wqqqqqqc ', 'C ', '9e24f12bda941d6c96dc26491031c6a3', 'HG@gmail.com', '', 'images (3).jfif', '0', '--- Select District ---', '--- Select Thana ---'),
(183, 'HGGFGD', 'HHGHHGFH', 'DGHDG', 'a32d7dd361050689713d9934fda1716d', 'GFH@gmail.com', '', 'images (4).jfif', '0', '--- Select District ---', '--- Select Thana ---'),
(184, 'HGHG', 'GFHDFH', 'HGFHGDHGD', '38e43eee1f430a070346bb75175c0246', 'GFHG@gmail.com', '', '', '0', '0', '0'),
(185, 'REWRF', 'ERWREW', 'EWEWR', '8fd51b2183fe3d0de18ba79416830826', 'REEWR@gmail.com', '', '', '0', '0', '0'),
(186, 'GRTTR', 'RTTRE', 'RETERT', '5ae4816972174ac7516cfc436424c0f5', 'TRTR@gmail.com', '', '', '0', '0', '0'),
(187, 'dd', '', 'dd', '1aabac6d068eef6a7bad3fdf50a05cc8', 'dd@gmail.com', '', '', '0', '0', '0'),
(188, 'ff', '', 'ff', '633de4b0c14ca52ea2432a3c8a5c4c31', 'ff@gmail.com', '', '', '0', '0', '0'),
(189, 'fgh', '', 'gg', '4b43b0aee35624cd95b910189b3dc231', 'hh@gmail.com', '', '', '0', '0', '0'),
(190, 'www', '', 'rrw', '124c54355f396f0d1b0f653d105340b3', 'rgt@gmail.com', '', '', '0', '0', '0'),
(191, 'sd', 'fdgf', 'fdsggf', '12bdeaf98d08243ff45795387fe7572b', 'dfsg@gmail.com', '', '', '0', '0', '0'),
(192, 'afgfd', 'fga', 'fgdag', 'c592eff5625d551b0c5be656377ff871', 'afg@gmail.com', '', '', '0', '0', '0'),
(193, 'afdg', 'fag', 'faas', '6eccbc21f928bedd79f4735a70de2bf4', 'gda@gmail.com', '', '', '0', '0', '0'),
(196, 'eertgret', 'aas', 's', '03c7c0ace395d80182db07ae2c30f034', 'dsfgf@gmail.com', 's', 'background3.jpg', '1', '4', '12');

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE `thana` (
  `id` int(11) NOT NULL,
  `thana_name` varchar(255) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thana`
--

INSERT INTO `thana` (`id`, `thana_name`, `district_id`) VALUES
(1, 'Vanga', 2),
(3, 'Khilkhet', 1),
(4, 'Mirpur', 1),
(5, 'Tejgoun', 1),
(10, 'Mirzapur', 4),
(11, 'Delduar', 4),
(12, 'Basail', 4),
(13, 'Kalihati', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albumdetails`
--
ALTER TABLE `albumdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albumphotos`
--
ALTER TABLE `albumphotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registerperson`
--
ALTER TABLE `registerperson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thana`
--
ALTER TABLE `thana`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albumdetails`
--
ALTER TABLE `albumdetails`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `albumphotos`
--
ALTER TABLE `albumphotos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `registerperson`
--
ALTER TABLE `registerperson`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `thana`
--
ALTER TABLE `thana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
