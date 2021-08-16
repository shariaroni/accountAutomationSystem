-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 08:43 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lr`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountsofficeropinion`
--

CREATE TABLE `accountsofficeropinion` (
  `id` int(255) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `accountofficer_id` int(11) NOT NULL,
  `budgetYear` varchar(255) NOT NULL,
  `budgetCode` varchar(255) NOT NULL,
  `budgetSector` varchar(255) NOT NULL,
  `pageNo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(256) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountsofficeropinion`
--

INSERT INTO `accountsofficeropinion` (`id`, `budget_id`, `accountofficer_id`, `budgetYear`, `budgetCode`, `budgetSector`, `pageNo`, `type`, `image`, `date`, `comment`) VALUES
(21, 150, 180, '2021-2022', '1234', 'à¦¬à§ˆà¦œà§à¦žà¦¾à¦¨à¦¿à¦• à¦¯à¦¨à§à¦¤à§à¦°à¦ªà¦¾à¦¤à¦¿', '12', 'ASAP', '', '10-Aug-2021', 'à¦ªà¦°à§€à¦•à§à¦·à¦¿à¦¤'),
(22, 152, 184, '2021-2022', '123', '123', '123', 'ASAP', '', '11-Aug-2021', '123'),
(23, 154, 180, '2021-2022', 'à§§à§¨à§©', 'à§©à§¨à§§', 'à§¨à§§', 'à¦…à¦—à§à¦°à¦¿à¦®', '', '12-Aug-2021', 'à¦Ÿà§‡à¦¸à§à¦Ÿ à¦•à¦®à§‡à¦¨à§à¦Ÿ - à¦•à¦°à§à¦®à¦•à¦°à§à¦¤à¦¾'),
(24, 155, 180, '2021-2022', 'à§§à§¨à§©à§ª', 'à§¨à§¨à§©', 'à§§à§¨', 'à¦…à¦—à§à¦°à¦¿à¦® - à¦²à§‡à¦¨à¦¦à§‡à¦¨', '', '13-Aug-2021', 'à¦Ÿà§‡à¦¸à§à¦Ÿ à¦•à¦®à§‡à¦¨à§à¦Ÿ - à¦•à¦°à§à¦®à¦•à¦°à§à¦¤à¦¾ (à¦¹à¦¿à¦¸à¦¾à¦¬) à¦¦à¦ªà§à¦¤à¦°'),
(25, 177, 184, '2021-2022', '123', '32', '12', 'ASAP', '', '16-Aug-2021', 'comment officer');

-- --------------------------------------------------------

--
-- Table structure for table `budgetseleaction`
--

CREATE TABLE `budgetseleaction` (
  `id` int(255) NOT NULL,
  `budgetId` varchar(255) NOT NULL,
  `budget_type` varchar(255) NOT NULL,
  `budgetType` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budgetseleaction`
--

INSERT INTO `budgetseleaction` (`id`, `budgetId`, `budget_type`, `budgetType`, `comment`) VALUES
(1, '180127', 'others', 'other', 'money'),
(2, '180108', 'development', 'work', 'no comment'),
(3, '170145', 'others', 'service', 'Hello'),
(4, '180107', 'development', 'buyingProduct', 'SE'),
(15, '180129', 'development', 'work', 'abcd'),
(16, '180127', 'development', 'buyingProduct', 'Good comment'),
(17, '', 'revenue', 'buyingProduct', '123456'),
(18, '', 'development', 'buyingProduct', 'lab information'),
(19, '', 'revenue', 'buyingProduct', 'ABCD is here'),
(20, '', 'revenue', 'work', 'ABCD is here 2'),
(21, '', 'revenue', 'work', 'ABCD IS HERE 3'),
(22, '', '', '', ''),
(23, '', '', '', ''),
(24, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `demand`
--

CREATE TABLE `demand` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recommending_officer_id` int(11) NOT NULL,
  `budget_type` varchar(50) NOT NULL,
  `budgetType` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `total` varchar(255) NOT NULL,
  `advanceAmount` double NOT NULL,
  `need` varchar(10) NOT NULL,
  `date` varchar(50) NOT NULL,
  `stage` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demand`
--

INSERT INTO `demand` (`id`, `user_id`, `recommending_officer_id`, `budget_type`, `budgetType`, `comment`, `total`, `advanceAmount`, `need`, `date`, `stage`, `status`) VALUES
(150, 169, 15, 'revenue', 'buyingProduct', 'à¦¸à¦¿à¦à¦¸à¦‡ à¦²à§à¦¯à¦¬à§‡à¦° à¦œà¦¨à§à¦¯ à§§à§¦ à¦Ÿà¦¿ à¦¡à§‡à¦•à§à¦¸à¦Ÿà¦ª à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦ªà§à¦°à§Ÿà§‹à¦œà¦¨à¥¤', '700000', 20000, 'yes', '10-08-2021', 7, 'accepted'),
(151, 169, 15, 'development', 'work', 'à¦¸à¦¿à¦à¦¸à¦‡ à¦²à§à¦¯à¦¾à¦¬ à¦®à§‡à¦°à¦¾à¦®à¦¤ à¦•à¦°à¦¾ à¦ªà§à¦°à§Ÿà§‹à¦œà¦¨', '1500', 1500, 'yes', '11-08-2021', 2, 'rejected'),
(152, 169, 183, 'revenue', 'work', '123', '0', 0, 'no', '11-08-2021', 6, 'rejected'),
(153, 169, 15, 'revenue', 'buyingProduct', 'à¦à¦•à¦Ÿà¦¿ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦ªà§à¦°à§Ÿà§‹à¦œà¦¨', '25000', 25000, 'yes', '11-08-2021', 3, 'seen'),
(154, 169, 15, 'revenue', 'buyingProduct', 'à¦Ÿà§‡à¦¸à§à¦Ÿ à¦¬à¦¾à¦œà§‡à¦Ÿ', '40000', 12300, 'yes', '12-08-2021', 7, 'accepted'),
(155, 188, 15, 'revenue', 'service', 'à¦¸à¦¿à¦à¦¸à¦‡ à¦²à§à¦¯à¦¾à¦¬à§‡à¦° à¦œà¦¨à§à¦¯ à¦²à§à¦¯à¦¾à¦ªà§à¦Ÿà¦ª à¦ªà§à¦°à§Ÿà§‹à¦œà¦¨ ', '300000', 0, 'no', '12-08-2021', 7, 'accepted'),
(156, 189, 183, 'revenue', 'work', 'à¦ªà§à¦°à¦šà¦¨à§à¦¡ à¦¦à¦°à¦•à¦¾à¦°à¦¿', '120000', 0, 'no', '13-08-2021', 3, 'seen'),
(175, 169, 15, 'revenue', 'work', 'test', '12', 1, 'yes', '16-08-2021', 2, 'seen'),
(176, 169, 15, 'revenue', 'buyingProduct', 'test', '5', 0, 'no', '16-08-2021', 2, 'seen'),
(177, 169, 15, 'revenue', 'buyingProduct', 'Test comment', '6050', 1000, 'yes', '16-08-2021', 7, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `demand_chart`
--

CREATE TABLE `demand_chart` (
  `id` int(11) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `item` varchar(256) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `item_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demand_chart`
--

INSERT INTO `demand_chart` (`id`, `budget_id`, `item`, `qty`, `price`, `item_total`) VALUES
(195, 11, 'A', 1, 1, 1),
(196, 11, 'B', 2, 2, 4),
(197, 11, 'C', 3, 3, 9),
(198, 11, 'D', 4, 4, 16),
(199, 176, 'A', 1, 1, 1),
(200, 176, 'B', 2, 2, 4),
(201, 177, 'Pen', 10, 5, 50),
(202, 177, 'Book', 100, 50, 5000),
(203, 177, 'Khata', 50, 20, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `deputydirectoropinion`
--

CREATE TABLE `deputydirectoropinion` (
  `id` int(255) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `deputydirector_id` int(11) NOT NULL,
  `budgetYear` varchar(255) NOT NULL,
  `budgetCode` varchar(255) NOT NULL,
  `budgetSector` varchar(255) NOT NULL,
  `pageNo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(256) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deputydirectoropinion`
--

INSERT INTO `deputydirectoropinion` (`id`, `budget_id`, `deputydirector_id`, `budgetYear`, `budgetCode`, `budgetSector`, `pageNo`, `type`, `image`, `date`, `comment`) VALUES
(12, 150, 185, '2021-2022', '1234', 'à¦¬à§ˆà¦œà§à¦žà¦¾à¦¨à¦¿à¦• à¦¯à¦¨à§à¦¤à§à¦°à¦ªà¦¾à¦¤à¦¿', '12', 'ASAP', '', '11-Aug-2021', ''),
(13, 150, 185, '2021-2022', '1234', 'à¦¬à§ˆà¦œà§à¦žà¦¾à¦¨à¦¿à¦• à¦¯à¦¨à§à¦¤à§à¦°à¦ªà¦¾à¦¤à¦¿', '12', 'ASAP', '', '11-Aug-2021', ''),
(14, 152, 185, '2021-2022', '123', '123', '123', 'ASAP', '', '11-Aug-2021', ''),
(15, 154, 181, '2021-2022', 'à§§à§¨à§ª', 'à§©à§¨à§¦', 'à§¨à§§', 'à¦…à¦—à§à¦°à¦¿à¦®', '', '12-Aug-2021', 'à¦Ÿà§‡à¦¸à§à¦Ÿ à¦•à¦®à§‡à¦¨à§à¦Ÿ - à¦‰à¦ª-à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦•'),
(16, 155, 181, '2021-2022', 'à§§à§¨à§©à§ª', 'à§¨à§¨à§©', 'à§§à§¨', 'à¦…à¦—à§à¦°à¦¿à¦® - à¦²à§‡à¦¨à¦¦à§‡à¦¨', '', '13-Aug-2021', 'à¦Ÿà§‡à¦¸à§à¦Ÿ à¦•à¦®à§‡à¦¨à§à¦Ÿ - à¦‰à¦ª-à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦•'),
(17, 177, 185, '2021-2022', '123', '32', '12', 'ASAP', '', '16-Aug-2021', 'Good budget');

-- --------------------------------------------------------

--
-- Table structure for table `directoropinion`
--

CREATE TABLE `directoropinion` (
  `id` int(255) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `director_id` int(11) NOT NULL,
  `date` varchar(256) NOT NULL,
  `budgetYear` varchar(255) NOT NULL,
  `budgetCode` varchar(255) NOT NULL,
  `budgetSector` varchar(255) NOT NULL,
  `pageNo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directoropinion`
--

INSERT INTO `directoropinion` (`id`, `budget_id`, `director_id`, `date`, `budgetYear`, `budgetCode`, `budgetSector`, `pageNo`, `type`, `image`, `comment`) VALUES
(8, 152, 186, '11-Aug-2021', '2021-2022', '123', '123', '123', 'à¦…à¦—à§à¦°à¦¿à¦®', '', 'à¦¸à§à¦¨à§à¦¦à¦° '),
(9, 154, 182, '12-Aug-2021', '2021-2022', 'à§§à§¨à§«', 'à§©à§¨à§¨', 'à§¨à§§', 'à¦…à¦—à§à¦°à¦¿à¦® - à¦²à§‡à¦¨à¦¦à§‡à¦¨', '', 'à¦Ÿà§‡à¦¸à§à¦Ÿ à¦•à¦®à§‡à¦¨à§à¦Ÿ - à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦•'),
(10, 155, 182, '13-Aug-2021', '2021-2022', 'à§§à§¨à§©à§ª', 'à§¨à§¨à§©', 'à§§à§¨', 'à¦…à¦—à§à¦°à¦¿à¦® - à¦²à§‡à¦¨à¦¦à§‡à¦¨', '', 'à¦Ÿà§‡à¦¸à§à¦Ÿ à¦•à¦®à§‡à¦¨à§à¦Ÿ - à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦•'),
(11, 177, 186, '16-Aug-2021', '2021-2022', '123', '32', '12', 'à¦…à¦—à§à¦°à¦¿à¦®', '', 'à¦…à¦—à§à¦°à¦¿à¦®à¦…à¦—à§à¦°à¦¿à¦®à¦…à¦—à§à¦°à¦¿à¦®à¦…à¦—à§à¦°à¦¿à¦®');

-- --------------------------------------------------------

--
-- Table structure for table `generalinformation`
--

CREATE TABLE `generalinformation` (
  `id` int(255) NOT NULL,
  `budgetId` varchar(255) NOT NULL,
  `need` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `recommending` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalinformation`
--

INSERT INTO `generalinformation` (`id`, `budgetId`, `need`, `value`, `recommending`) VALUES
(1, '180127', 'yes', '', ''),
(4, '180108', 'no', '', ''),
(8, '', 'yes', '2501', ''),
(9, '', '', '', ''),
(10, '', 'yes', '2505', ''),
(11, '', 'yes', '12', 'office_head'),
(12, '', 'yes', '12', 'office_head');

-- --------------------------------------------------------

--
-- Table structure for table `recommendingofficeropinion`
--

CREATE TABLE `recommendingofficeropinion` (
  `id` int(20) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `date` varchar(256) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `recommend` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommendingofficeropinion`
--

INSERT INTO `recommendingofficeropinion` (`id`, `budget_id`, `date`, `image`, `comment`, `recommend`) VALUES
(37, 61, '10-08-2021', '', 'à¦¹à§‡à¦¹à§‡', 'yes'),
(38, 150, '10-Aug-2021', '', 'à¦ªà¦°à§à¦¯à¦¬à§‡à¦•à§à¦·à¦£ à¦•à¦°à¦¾ à¦¹à§Ÿà§‡à¦›à§‡', 'yes'),
(40, 151, '11-Aug-2021', '', 'à¦…à¦ªà§à¦°à§Ÿà§‹à¦œà¦¨à§€à§Ÿ', 'no'),
(41, 152, '11-Aug-2021', '', '123', 'yes'),
(42, 153, '11-Aug-2021', '', '', 'yes'),
(43, 154, '12-Aug-2021', '', 'à¦¸à§à¦¨à§à¦¦à¦° à¦¬à¦¾à¦œà§‡à¦Ÿ - à¦¸à§à¦ªà¦¾à¦°à¦¿à¦¶à¦•à¦¾à¦°à§€', 'yes'),
(44, 155, '13-Aug-2021', '', 'à¦Ÿà§‡à¦¸à§à¦Ÿ à¦•à¦®à§‡à¦¨à§à¦Ÿ - à¦¸à§à¦ªà¦¾à¦°à¦¿à¦¶à¦•à¦¾à¦°à§€ à¦•à¦°à§à¦®à¦•à¦°à§à¦¤à¦¾', 'yes'),
(45, 156, '13-Aug-2021', '', 'à¦¸à§à¦ªà¦¾à¦°à¦¿à¦¶à¦•à¦¾à¦°à§€ à¦•à¦°à§à¦®à¦•à¦°à§à¦¤à¦¾à¦° à¦®à¦¤à¦¾à¦®à¦¤', 'yes'),
(46, 177, '16-Aug-2021', '', '123', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `verification_status` tinyint(1) NOT NULL,
  `verification_id` varchar(256) NOT NULL,
  `admin_verification_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id`, `name`, `email`, `mobile`, `pass`, `type`, `verification_status`, `verification_id`, `admin_verification_status`) VALUES
(15, 'Shariar Oni', 'shariaroni007@gmail.com', '01716822414', '827ccb0eea8a706c4c34a16891f84e7b', 'recommendingOfficer', 1, '9964111abdaf1af6056b75a8e4d928cb', 1),
(169, 'Mr. Faisal Nirjhor', 'faisaljabet@gmail.com', '01784301131', '202cb962ac59075b964b07152d234b70', 'general', 1, '9b334558dba187f3d7d851c8cc5240c5', 1),
(170, 'Latifur Rahman Zihad', 'admin@just.com', '01784301131', '202cb962ac59075b964b07152d234b70', 'admin', 1, 'ecdd3a893e4de089ee988cee8ea83759', 1),
(177, 'Professor Dr. Md. Anwar Hossain', 'vcsir@just.com', '01700000001', '202cb962ac59075b964b07152d234b70', 'vc', 1, '9bd8483e96353324b4c77a3906a7c74e', 1),
(178, 'Rahedul Islam', 'rahedul@gmail.com', '01711111112', '202cb962ac59075b964b07152d234b70', 'treasure', 1, '21b13fe33c39ef37db5e16c2aca5287f', 1),
(180, 'Samiul Basher', 'samiul@gmail.com', '01722222223', '202cb962ac59075b964b07152d234b70', 'accountOfficer', 1, '5e304dd54398a131c8bcc3ae186e6b96', 1),
(181, 'Mr. Deputy Director', 'deputydirector@just.com', '01744444445', '202cb962ac59075b964b07152d234b70', 'deputyDirector', 1, 'b6cf2d0a12f0163c85bbc8ba0985f3cd', 1),
(182, 'Mr. Director', 'director@just.com', '01755555556', '202cb962ac59075b964b07152d234b70', 'director', 1, '70f15fa0b9ca4a71e2dd7405805425cd', 1),
(183, 'R Faisal Nirjhor', 'faisaljabet@gmail.com', '01784301131', '202cb962ac59075b964b07152d234b70', 'recommendingOfficer', 1, '2eeb0637dee7bde01c30155851dee0d0', 1),
(184, 'AO Faisal Nirjhor', 'faisaljabet@gmail.com', '01784301131', '202cb962ac59075b964b07152d234b70', 'accountOfficer', 1, 'bdec03d653ecba470f629f6e1debafab', 1),
(185, 'DD Faisal Nirjhor', 'faisaljabet@gmail.com', '01784301131', '202cb962ac59075b964b07152d234b70', 'deputyDirector', 1, '5a7a99f4204b809300b05e8f964c143a', 1),
(186, 'D Faisal Nirjhor', 'faisaljabet@gmail.com', '01784301131', '202cb962ac59075b964b07152d234b70', 'director', 1, '9119d8642ea8f4964f41dfaeb1b71b74', 1),
(187, 'FaisalNirjhor', 'faisaljabet@gmail.com', '01784301131', '202cb962ac59075b964b07152d234b70', 'treasure', 1, 'edf77bed2bcb9b99c6118e341fa1c255', 1),
(188, 'Shariar Oni', 'shariaroni007@gmail.com', '01712345678', '202cb962ac59075b964b07152d234b70', 'general', 1, '474f3707ce5358c6682cca015ac652b7', 1),
(189, 'Mr. Test Name', 'testemail@just.com', '01712345678', '202cb962ac59075b964b07152d234b70', 'general', 1, '3c61e94aa739a069263432827285e195', 1);

-- --------------------------------------------------------

--
-- Table structure for table `treasureopinion`
--

CREATE TABLE `treasureopinion` (
  `id` int(255) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `treasurer_id` int(11) NOT NULL,
  `parmited` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(256) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treasureopinion`
--

INSERT INTO `treasureopinion` (`id`, `budget_id`, `treasurer_id`, `parmited`, `image`, `date`, `comment`) VALUES
(9, 150, 187, 'yes', '', '11-Aug-2021', 'à¦¸à§à¦¨à§à¦¦à¦°'),
(10, 154, 178, 'yes', '', '12-Aug-2021', 'à¦Ÿà§‡à¦¸à§à¦Ÿ - à¦Ÿà§à¦°à§‡à¦œà¦¾à¦°à¦¾à¦° à¦®à¦¹à§‹à¦¦à§Ÿ'),
(11, 152, 178, 'no', '', '12-Aug-2021', 'à¦Ÿà§‡à¦¸à§à¦Ÿ - à¦Ÿà§à¦°à§‡à¦œà¦¾à¦°à¦¾à¦°'),
(12, 155, 178, 'yes', '', '13-Aug-2021', 'à¦Ÿà§‡à¦¸à§à¦Ÿ à¦•à¦®à§‡à¦¨à§à¦Ÿ - à¦Ÿà§à¦°à§‡à¦œà¦¾à¦°à¦¾à¦°'),
(13, 177, 187, 'yes', '', '16-Aug-2021', 'à¦¸à§à¦ªà¦¾à¦°à¦¿à¦¶ à¦Ÿà§à¦°à§‡à¦œà¦¾à¦°à¦¾à¦°');

-- --------------------------------------------------------

--
-- Table structure for table `vcsiropinion`
--

CREATE TABLE `vcsiropinion` (
  `id` int(255) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `vcSir_id` int(11) NOT NULL,
  `parmited` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(256) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vcsiropinion`
--

INSERT INTO `vcsiropinion` (`id`, `budget_id`, `vcSir_id`, `parmited`, `image`, `date`, `comment`) VALUES
(5, 150, 177, 'yes', '', '11-Aug-2021', 'à¦¸à§à¦¨à§à¦¦à¦°'),
(6, 154, 177, 'yes', '', '12-Aug-2021', 'à¦Ÿà§‡à¦¸à§à¦Ÿ - à¦‰à¦ªà¦¾à¦šà¦¾à¦°à§à¦¯ à¦®à¦¹à§‹à¦¦à§Ÿ'),
(7, 155, 177, 'yes', '', '14-Aug-2021', '	à¦Ÿà§‡à¦¸à§à¦Ÿ à¦•à¦®à§‡à¦¨à§à¦Ÿ - à¦‰à¦ªà¦¾à¦šà¦¾à¦°à§à¦¯ '),
(8, 177, 177, 'yes', '', '16-Aug-2021', 'à¦…à¦¨à§à¦®à¦¦à¦¿à¦¤');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountsofficeropinion`
--
ALTER TABLE `accountsofficeropinion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budgetseleaction`
--
ALTER TABLE `budgetseleaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demand`
--
ALTER TABLE `demand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demand_chart`
--
ALTER TABLE `demand_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deputydirectoropinion`
--
ALTER TABLE `deputydirectoropinion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directoropinion`
--
ALTER TABLE `directoropinion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalinformation`
--
ALTER TABLE `generalinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendingofficeropinion`
--
ALTER TABLE `recommendingofficeropinion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treasureopinion`
--
ALTER TABLE `treasureopinion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vcsiropinion`
--
ALTER TABLE `vcsiropinion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountsofficeropinion`
--
ALTER TABLE `accountsofficeropinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `budgetseleaction`
--
ALTER TABLE `budgetseleaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `demand`
--
ALTER TABLE `demand`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `demand_chart`
--
ALTER TABLE `demand_chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `deputydirectoropinion`
--
ALTER TABLE `deputydirectoropinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `directoropinion`
--
ALTER TABLE `directoropinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `generalinformation`
--
ALTER TABLE `generalinformation`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recommendingofficeropinion`
--
ALTER TABLE `recommendingofficeropinion`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `treasureopinion`
--
ALTER TABLE `treasureopinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vcsiropinion`
--
ALTER TABLE `vcsiropinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
