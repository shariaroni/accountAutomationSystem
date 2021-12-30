-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 02:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
(25, 177, 184, '2021-2022', '123', '32', '12', 'ASAP', '', '16-Aug-2021', 'comment officer'),
(26, 178, 184, '2022-2023', '170145', 'gbd', '145', 'oop', '', '08-Sep-2021', 'go'),
(27, 190, 180, '2023-2024', '170145', 'gbd', '145', 'oop', '', '08-Sep-2021', 'à¦•à¦°à§à¦®à¦•à¦°à§à¦¤à¦¾ (à¦¹à¦¿à¦¸à¦¾à¦¬) à¦¦à¦ªà§à¦¤à¦°'),
(28, 191, 180, '2023-2024', '170145', 'gbd', '145', 'oop', '', '11-Sep-2021', 'good'),
(29, 192, 184, '2021-2022', '', '', '', '', '', '24-Nov-2021', ''),
(30, 156, 184, '2021-2022', '', '', '', '', '', '26-Dec-2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `demand`
--

CREATE TABLE `demand` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recommending_officer_id` int(11) NOT NULL,
  `document_number` varchar(50) NOT NULL,
  `office_department_name` varchar(50) NOT NULL,
  `total` varchar(256) DEFAULT NULL,
  `comment` varchar(1000) NOT NULL,
  `fiscal_year` varchar(256) NOT NULL,
  `source_of_money` int(255) NOT NULL,
  `expenditure_budget_sector` varchar(11) NOT NULL,
  `expenditure_budget_code` varchar(11) NOT NULL,
  `procurement_number` varchar(11) NOT NULL,
  `planned_price` varchar(11) NOT NULL,
  `procurement_type` varchar(11) NOT NULL,
  `details_of_goods_and_work` varchar(11) NOT NULL,
  `advanceAmount` double NOT NULL,
  `need` varchar(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `stage` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demand`
--

INSERT INTO `demand` (`id`, `user_id`, `recommending_officer_id`, `document_number`, `office_department_name`, `total`, `comment`, `fiscal_year`, `source_of_money`, `expenditure_budget_sector`, `expenditure_budget_code`, `procurement_number`, `planned_price`, `procurement_type`, `details_of_goods_and_work`, `advanceAmount`, `need`, `date`, `stage`, `status`) VALUES
(150, 169, 15, 'revenue', 'buyingProduct', NULL, 'à¦¸à¦¿à¦à¦¸à¦‡ à¦²à§à¦¯à¦¬à§‡à¦° à¦œà¦¨à§à¦¯ à§§à§¦ à¦Ÿà¦¿ à¦¡à§‡à¦•à§à¦¸à¦Ÿà¦ª à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦ªà§à¦°à§Ÿà§‹à¦œà¦¨à¥¤', '', 0, '', '', '', '', '', '', 20000, '', '10-08-2021', 7, 'accepted'),
(151, 169, 15, 'development', 'work', NULL, 'à¦¸à¦¿à¦à¦¸à¦‡ à¦²à§à¦¯à¦¾à¦¬ à¦®à§‡à¦°à¦¾à¦®à¦¤ à¦•à¦°à¦¾ à¦ªà§à¦°à§Ÿà§‹à¦œà¦¨', '', 0, '', '', '', '', '', '', 1500, '', '11-08-2021', 2, 'rejected'),
(152, 169, 183, 'revenue', 'work', NULL, '123', '', 0, '', '', '', '', '', '', 0, '', '11-08-2021', 6, 'rejected'),
(153, 169, 15, 'revenue', 'buyingProduct', NULL, 'à¦à¦•à¦Ÿà¦¿ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦ªà§à¦°à§Ÿà§‹à¦œà¦¨', '', 0, '', '', '', '', '', '', 25000, '', '11-08-2021', 3, 'seen'),
(154, 169, 15, 'revenue', 'buyingProduct', NULL, 'à¦Ÿà§‡à¦¸à§à¦Ÿ à¦¬à¦¾à¦œà§‡à¦Ÿ', '', 0, '', '', '', '', '', '', 12300, '', '12-08-2021', 7, 'accepted'),
(155, 188, 15, 'revenue', 'service', NULL, 'à¦¸à¦¿à¦à¦¸à¦‡ à¦²à§à¦¯à¦¾à¦¬à§‡à¦° à¦œà¦¨à§à¦¯ à¦²à§à¦¯à¦¾à¦ªà§à¦Ÿà¦ª à¦ªà§à¦°à§Ÿà§‹à¦œà¦¨ ', '', 0, '', '', '', '', '', '', 0, '', '12-08-2021', 7, 'accepted'),
(156, 189, 183, 'revenue', 'work', NULL, 'à¦ªà§à¦°à¦šà¦¨à§à¦¡ à¦¦à¦°à¦•à¦¾à¦°à¦¿', '', 0, '', '', '', '', '', '', 0, '', '13-08-2021', 4, 'seen'),
(175, 169, 15, 'revenue', 'work', NULL, 'test', '', 0, '', '', '', '', '', '', 1, '', '16-08-2021', 2, 'seen'),
(176, 169, 15, 'revenue', 'buyingProduct', NULL, 'test', '', 0, '', '', '', '', '', '', 0, '', '16-08-2021', 2, 'seen'),
(177, 169, 15, 'revenue', 'buyingProduct', NULL, 'Test comment', '', 0, '', '', '', '', '', '', 1000, '', '16-08-2021', 7, 'accepted'),
(178, 169, 15, 'development', 'service', NULL, '123', 'book', 3, '', '', '', '', '', '', 150, '', '08-09-2021', 7, 'accepted'),
(179, 188, 183, 'revenue', 'service', NULL, 'à¦¬à¦¾à¦œà§‡à¦Ÿà§‡à¦° à¦ªà§à¦°à§Ÿà§‹à¦œà¦¨à§€à§Ÿà¦¤à¦¾', 'à¦¬à¦‡', 2, '', '', '', '', '', '', 1000, '', '08-09-2021', 3, 'seen'),
(180, 169, 15, 'revenue', 'service', NULL, 'à¦¬à¦¾à¦œà§‡à¦Ÿ à§¨à§¦à§¨à§§', '', 0, '', '', '', '', '', '', 10000, '', '08-09-2021', 2, 'seen'),
(181, 169, 15, 'revenue', 'work', NULL, '123', '', 0, '', '', '', '', '', '', 0, '', '08-09-2021', 2, 'seen'),
(182, 169, 15, 'revenue', 'work', NULL, '123', '', 0, '', '', '', '', '', '', 0, '', '08-09-2021', 2, 'seen'),
(183, 169, 15, 'revenue', 'work', NULL, '123', '', 0, '', '', '', '', '', '', 0, '', '08-09-2021', 2, 'seen'),
(184, 169, 15, 'revenue', 'work', NULL, '123', '', 0, '', '', '', '', '', '', 0, '', '08-09-2021', 2, 'seen'),
(185, 169, 15, 'revenue', 'work', NULL, '123', '', 0, '', '', '', '', '', '', 0, '', '08-09-2021', 2, 'seen'),
(186, 169, 15, 'revenue', 'work', NULL, '123', '', 0, '', '', '', '', '', '', 0, '', '08-09-2021', 2, 'seen'),
(187, 169, 15, 'revenue', 'work', NULL, '123', '', 0, '', '', '', '', '', '', 0, '', '08-09-2021', 2, 'seen'),
(188, 169, 15, 'revenue', 'work', NULL, '123', '', 0, '', '', '', '', '', '', 0, '', '08-09-2021', 2, 'seen'),
(189, 169, 15, 'revenue', 'service', NULL, '123', '', 0, '', '', '', '', '', '', 0, '', '08-09-2021', 2, 'seen'),
(190, 169, 15, 'revenue', 'buyingProduct', NULL, 'à¦¬à¦¾à¦œà§‡à¦Ÿ à§¨à§¦à§¨à§§', '', 0, '', '', '', '', '', '', 1000, '', '08-09-2021', 7, 'accepted'),
(191, 169, 15, 'revenue', 'work', NULL, 'à¦¬à¦¾à¦œà§‡à¦Ÿ', '', 0, '', '', '', '', '', '', 1000, '', '11-09-2021', 7, 'accepted'),
(192, 169, 183, '', '', NULL, 'à¦—à§à¦¡ à¦•à¦®à§‡à¦¨à§à¦Ÿ', '', 0, '', '', '', '', '', '', 0, '', '24-11-2021', 7, 'accepted'),
(193, 169, 183, '', '', NULL, 'fgg', '', 0, '', '', '', '', '', '', 0, '', '24-11-2021', 2, 'rejected');

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
(203, 177, 'Khata', 50, 20, 1000),
(204, 180, 'book', 2, 500, 1000),
(205, 180, 'à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°', 3, 50000, 150000),
(206, 189, 'book', 12, 340, 4080),
(207, 189, 'à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°', 3, 500, 1500),
(208, 190, 'à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°', 5, 45000, 225000),
(209, 190, 'à¦¬à¦‡', 2, 540, 1080),
(210, 191, 'à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°', 5, 50000, 250000),
(211, 191, 'à¦¬à¦‡', 2, 530, 1060);

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
(17, 177, 185, '2021-2022', '123', '32', '12', 'ASAP', '', '16-Aug-2021', 'Good budget'),
(18, 178, 185, '2022-2023', '170145', 'gbd', '145', 'oop', '', '08-Sep-2021', ''),
(19, 190, 185, '2023-2024', '170145', 'gbd', '145', 'oop', '', '08-Sep-2021', 'à¦‰à¦ª-à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦• (à¦¹à¦¿à¦¸à¦¾à¦¬) à¦¦à¦ªà§à¦¤à¦°à§‡à¦° à¦®à¦¤à¦¾à¦®à¦¤ à¦¦à§‡à¦“à§Ÿà¦¾ à¦¹à¦²à§‹'),
(20, 191, 185, '2023-2024', '170145', 'gbd', '145', 'oop', '', '11-Sep-2021', 'yes'),
(21, 192, 185, '2021-2022', '', '', '', '', '', '24-Nov-2021', '');

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
(11, 177, 186, '16-Aug-2021', '2021-2022', '123', '32', '12', 'à¦…à¦—à§à¦°à¦¿à¦®', '', 'à¦…à¦—à§à¦°à¦¿à¦®à¦…à¦—à§à¦°à¦¿à¦®à¦…à¦—à§à¦°à¦¿à¦®à¦…à¦—à§à¦°à¦¿à¦®'),
(12, 178, 186, '08-Sep-2021', '2022-2023', '170145', 'gbd', '145', 'oop', '', ''),
(13, 190, 186, '08-Sep-2021', '2023-2024', '170145', 'gbd', '145', 'oop', '', 'à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦• (à¦¹à¦¿à¦¸à¦¾à¦¬) à¦¦à¦ªà§à¦¤à¦°à§‡à¦° à¦®à¦¤à¦¾à¦®à¦¤ à¦¦à§‡à¦“à§Ÿ à¦¹à¦²'),
(14, 191, 186, '11-Sep-2021', '2023-2024', '170145', 'gbd', '145', 'oop', '', 'good comment'),
(15, 192, 186, '24-Nov-2021', '2021-2022', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `eqp`
--

CREATE TABLE `eqp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `office_department_name` varchar(11) NOT NULL,
  `fiscal_year` varchar(11) NOT NULL,
  `budget_code` int(11) NOT NULL,
  `budget_sector` varchar(11) NOT NULL,
  `president_1` varchar(11) NOT NULL,
  `member_11` varchar(11) NOT NULL,
  `member_12` varchar(11) NOT NULL,
  `comment_11` varchar(11) NOT NULL,
  `comment_12` varchar(11) NOT NULL,
  `comment_13` varchar(11) NOT NULL,
  `president_2` varchar(11) NOT NULL,
  `member_21` varchar(11) NOT NULL,
  `member_22` varchar(11) NOT NULL,
  `comment_21` varchar(11) NOT NULL,
  `comment_22` varchar(11) NOT NULL,
  `comment_23` varchar(11) NOT NULL,
  `president_3` varchar(11) NOT NULL,
  `member_31` varchar(11) NOT NULL,
  `member_32` varchar(11) NOT NULL,
  `member_33` varchar(11) NOT NULL,
  `comment_31` varchar(11) NOT NULL,
  `comment_32` varchar(11) NOT NULL,
  `comment_33` varchar(11) NOT NULL,
  `comment_34` varchar(11) NOT NULL,
  `need` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `stage` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `open_tenders`
--

CREATE TABLE `open_tenders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `office_department_name` varchar(11) NOT NULL,
  `fiscal_year` varchar(11) NOT NULL,
  `budget_code` int(11) NOT NULL,
  `budget_sector` varchar(11) NOT NULL,
  `president_1` varchar(11) NOT NULL,
  `member_11` varchar(11) NOT NULL,
  `member_12` varchar(11) NOT NULL,
  `comment_11` varchar(11) NOT NULL,
  `comment_12` varchar(11) NOT NULL,
  `comment_13` varchar(11) NOT NULL,
  `president_2` varchar(11) NOT NULL,
  `member_21` varchar(11) NOT NULL,
  `member_22` varchar(11) NOT NULL,
  `comment_21` varchar(11) NOT NULL,
  `comment_22` varchar(11) NOT NULL,
  `comment_23` varchar(11) NOT NULL,
  `president_3` varchar(11) NOT NULL,
  `member_31` varchar(11) NOT NULL,
  `member_32` varchar(11) NOT NULL,
  `member_33` varchar(11) NOT NULL,
  `comment_31` varchar(11) NOT NULL,
  `comment_32` varchar(11) NOT NULL,
  `comment_33` varchar(11) NOT NULL,
  `comment_34` varchar(11) NOT NULL,
  `need` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `stage` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(46, 177, '16-Aug-2021', '', '123', 'yes'),
(47, 178, '08-Sep-2021', '', '', 'yes'),
(48, 179, '08-Sep-2021', '', 'à¦¸à§à¦ªà¦¾à¦°à¦¿à¦¶ à¦•à¦°à¦¾ à¦¹à¦²à§‹', 'yes'),
(49, 190, '08-Sep-2021', '', 'à¦¬à¦¾à¦œà§‡à¦Ÿ à§¨à§¦à§¨à§§ à¦…à¦¨à§à¦®à§‹à¦¦à¦¿à¦¤', 'yes'),
(50, 191, '11-Sep-2021', '', 'ggbbht', 'yes'),
(51, 193, '24-Nov-2021', '', '', ''),
(52, 192, '24-Nov-2021', '', '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `rfq`
--

CREATE TABLE `rfq` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `office_department_name` varchar(11) NOT NULL,
  `fiscal_year` varchar(11) NOT NULL,
  `budget_code` int(11) NOT NULL,
  `budget_sector` varchar(11) NOT NULL,
  `president_1` varchar(11) NOT NULL,
  `member_11` varchar(11) NOT NULL,
  `member_12` varchar(11) NOT NULL,
  `comment_11` varchar(11) NOT NULL,
  `comment_12` varchar(11) NOT NULL,
  `comment_13` varchar(11) NOT NULL,
  `president_2` varchar(11) NOT NULL,
  `member_21` varchar(11) NOT NULL,
  `member_22` varchar(11) NOT NULL,
  `comment_21` varchar(11) NOT NULL,
  `comment_22` varchar(11) NOT NULL,
  `comment_23` varchar(11) NOT NULL,
  `president_3` varchar(11) NOT NULL,
  `member_31` varchar(11) NOT NULL,
  `member_32` varchar(11) NOT NULL,
  `member_33` varchar(11) NOT NULL,
  `comment_31` varchar(11) NOT NULL,
  `comment_32` varchar(11) NOT NULL,
  `comment_33` varchar(11) NOT NULL,
  `comment_34` varchar(11) NOT NULL,
  `need` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `stage` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfq`
--

INSERT INTO `rfq` (`id`, `user_id`, `office_department_name`, `fiscal_year`, `budget_code`, `budget_sector`, `president_1`, `member_11`, `member_12`, `comment_11`, `comment_12`, `comment_13`, `president_2`, `member_21`, `member_22`, `comment_21`, `comment_22`, `comment_23`, `president_3`, `member_31`, `member_32`, `member_33`, `comment_31`, `comment_32`, `comment_33`, `comment_34`, `need`, `date`, `stage`, `status`) VALUES
(1, 169, '', 'à§¨à§¦à§§à§', 123, 'aad', 'adef', 'adwd', '', 'adad', '', 'adawwd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '0000-00-00', '2', 'unseen'),
(2, 169, '', 'à§¨à§¦à§§à§', 123, 'aad', 'adef', 'adwd', '', 'adad', '', 'adawwd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '0000-00-00', '2', 'unseen'),
(3, 169, '', 'à§¨à§¦à§¨à§', 123, 'aad', 'adef', 'adwd', 'as', 'adad', 'adad', 'ass', 'asdd', 'add', 'add', 'add', 'adfe', 'aaaa', 'aaaa', 'aaa', 'aa', 'aaa', 'aaa', 'aa', 'aaa', 'aaa', 'no', '0000-00-00', '2', 'unseen'),
(4, 169, 'BE', 'à§¨à§¦à§¨à§', 123, 'aad', 'adef', 'adwd', 'as', 'adad', 'adad', 'ass', 'asdd', 'add', 'add', 'add', 'adfe', 'aaaa', 'aaaa', 'aaa', 'aa', 'aaa', 'aaa', 'aa', 'aaa', 'aaa', 'no', '0000-00-00', '2', 'unseen'),
(5, 169, 'BE', 'à§¨à§¦à§¨à§', 123, 'aad', 'adef', 'adwd', 'as', 'adad', 'adad', 'ass', 'asdd', 'add', 'add', 'add', 'adfe', 'aaaa', 'aaaa', 'aaa', 'aa', 'aaa', 'aaa', 'aa', 'aaa', 'aaa', 'no', '0000-00-00', '2', 'unseen'),
(6, 169, 'CSE', 'à§¨à§¦à§¨à§', 123, 'aad', 'adef', 'adwd', 'as', 'adad', 'adad', 'adawwd', 'asdd', 'add', 'add', 'add', 'adfe', 'aaaa', 'aaaa', 'aaa', 'aa', 'aaa', 'aaa', 'aa', 'aaa', 'aaa', 'no', '0000-00-00', '2', 'unseen'),
(7, 169, 'CSE', 'à§¨à§¦à§¨à§', 123, 'aad', 'adef', 'adwd', 'as', 'adad', 'adad', 'adawwd', 'asdd', 'add', 'add', 'add', 'adfe', 'aaaa', 'aaaa', 'aaa', 'aa', 'aaa', 'aaa', 'aa', 'aaa', 'aaa', 'no', '0000-00-00', '2', 'unseen');

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
(170, 'Latifur Rahman Zihad', 'admin@just.edu.bd', '01784301131', '202cb962ac59075b964b07152d234b70', 'admin', 1, 'ecdd3a893e4de089ee988cee8ea83759', 1),
(177, 'Professor Dr. Md. Anwar Hossain', 'vc@just.edu.bd', '01700000001', '202cb962ac59075b964b07152d234b70', 'vc', 1, '9bd8483e96353324b4c77a3906a7c74e', 1),
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
(189, 'Mr. Test Name', 'testemail@just.com', '01712345678', '202cb962ac59075b964b07152d234b70', 'general', 1, '3c61e94aa739a069263432827285e195', 1),
(191, 'Mr. Faisal Nirjhor', 'faisaljabet@gmail.com', '01716822414', '202cb962ac59075b964b07152d234b70', 'vc', 1, '88f8bddcad914194d6e159b6479c5273', 1);

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
(13, 177, 187, 'yes', '', '16-Aug-2021', 'à¦¸à§à¦ªà¦¾à¦°à¦¿à¦¶ à¦Ÿà§à¦°à§‡à¦œà¦¾à¦°à¦¾à¦°'),
(14, 178, 187, 'yes', '', '08-Sep-2021', 'yes'),
(15, 190, 187, 'yes', '', '08-Sep-2021', 'à¦“à¦•à§‡'),
(16, 191, 187, 'yes', '', '11-Sep-2021', ''),
(17, 192, 187, 'yes', '', '24-Nov-2021', '');

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
(8, 177, 177, 'yes', '', '16-Aug-2021', 'à¦…à¦¨à§à¦®à¦¦à¦¿à¦¤'),
(9, 178, 177, 'yes', '', '08-Sep-2021', 'yes'),
(10, 190, 177, 'yes', '', '08-Sep-2021', 'ok'),
(11, 191, 177, 'yes', '', '11-Sep-2021', ''),
(12, 192, 177, 'yes', '', '24-Nov-2021', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountsofficeropinion`
--
ALTER TABLE `accountsofficeropinion`
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
-- Indexes for table `recommendingofficeropinion`
--
ALTER TABLE `recommendingofficeropinion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfq`
--
ALTER TABLE `rfq`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `demand`
--
ALTER TABLE `demand`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `demand_chart`
--
ALTER TABLE `demand_chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `deputydirectoropinion`
--
ALTER TABLE `deputydirectoropinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `directoropinion`
--
ALTER TABLE `directoropinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `recommendingofficeropinion`
--
ALTER TABLE `recommendingofficeropinion`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `rfq`
--
ALTER TABLE `rfq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `treasureopinion`
--
ALTER TABLE `treasureopinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vcsiropinion`
--
ALTER TABLE `vcsiropinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
