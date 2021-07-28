-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 10:21 AM
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
  `budgetSeleaction` varchar(255) NOT NULL,
  `budgetYear` varchar(255) NOT NULL,
  `budgetType` varchar(255) NOT NULL,
  `budgetCode` varchar(255) NOT NULL,
  `budgetSector` varchar(255) NOT NULL,
  `pageNo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountsofficeropinion`
--

INSERT INTO `accountsofficeropinion` (`id`, `budgetSeleaction`, `budgetYear`, `budgetType`, `budgetCode`, `budgetSector`, `pageNo`, `type`, `image`, `day`, `month`, `year`, `comment`) VALUES
(1, 'work', '2023-2024', 'revenue', '345', 'bnp', '44', 'np', '', '17', 'sep', '2030', 'hlw world'),
(2, 'buying', '2021-2022', 'others', '170145', 'adp', '127', 'abcd', '', '16', 'may', '2023', 'ajker din'),
(3, 'service', '2023-2024', 'revenue', '1234', 'ndp', '27', 'r15', '', '17', 'oct', '2034', 'gdpa'),
(4, 'work', '2023-2024', 'revenue', '170145', 'ndp', '145', 'abcd', '', '15', 'aug', '2021', 'good'),
(5, 'service', '2022-2023', 'others', '12344', 'gbd', '27', 'oop', '', '15', 'aug', '2021', 'Good Comment'),
(6, 'buying', '2023-2024', 'others', '170145', 'mri', '145', 'oop', '', '20', 'dec', '2035', 'yes'),
(7, 'service', '2023-2024', 'others', '170145', '', '145', 'oop', '', 'day', 'month', 'year', '');

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
(18, '', 'development', 'buyingProduct', 'lab information');

-- --------------------------------------------------------

--
-- Table structure for table `demand`
--

CREATE TABLE `demand` (
  `id` int(255) NOT NULL,
  `budgetId` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `item_total` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demand`
--

INSERT INTO `demand` (`id`, `budgetId`, `item`, `qty`, `price`, `item_total`, `total`) VALUES
(1, '180127', 'book', '3', '150', '450.00', '450.00'),
(2, '180108', 'pen', '4', '5', '20.00', '820.00'),
(3, '170145', 'book', '3', '100', '300.00', '615.00'),
(4, '180127', 'light', '3', '350', '1,050.00', '1,050.00'),
(5, '170145', 'book', '2', '150', '300.00', '300.00'),
(6, '', 'book', '3', '30', '90.00', '5,090.00');

-- --------------------------------------------------------

--
-- Table structure for table `deputydirectoropinion`
--

CREATE TABLE `deputydirectoropinion` (
  `id` int(255) NOT NULL,
  `budgetSeleaction` varchar(255) NOT NULL,
  `budgetYear` varchar(255) NOT NULL,
  `budgetType` varchar(255) NOT NULL,
  `budgetCode` varchar(255) NOT NULL,
  `budgetSector` varchar(255) NOT NULL,
  `pageNo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deputydirectoropinion`
--

INSERT INTO `deputydirectoropinion` (`id`, `budgetSeleaction`, `budgetYear`, `budgetType`, `budgetCode`, `budgetSector`, `pageNo`, `type`, `image`, `day`, `month`, `year`, `comment`) VALUES
(1, 'service', '2023-2024', 'service', '1234', 'abcd', '23', 'xyz', '', '12', 'oct', '2025', 'no comment'),
(2, 'work', '2021-2022', 'service', '342', 'npd', '27', 'abc', '', '16', 'nov', '2035', 'speech less'),
(3, 'buying', '2022-2023', 'others', '1234', 'gbd', '27', 'r1d', '', '23', 'sep', '2021', 'hello world'),
(4, 'buying', '2022-2023', 'others', '170145', 'dj', '145', 'r15', '', '17', 'jul', '2027', 'data'),
(6, 'service', '2022-2023', 'others', '342', 'bnp', '23', 'x1f', '', '18', 'aug', '2026', 'we asbr'),
(7, 'service', '2021-2022', 'development', '170145', 'gbd', '145', 'oop', '', '22', 'jul', '2032', 'gdpa'),
(8, 'none', 'none', 'development', '12344', 'ndp', '145', 'oop', '', '17', 'aug', '2035', 'good'),
(9, 'service', '2023-2024', 'others', '342', 'gbd', '342', 'oop', '', '20', 'dec', '2035', 'yes'),
(10, 'none', 'none', 'none', '', '', '', '', '', 'day', 'month', 'year', '');

-- --------------------------------------------------------

--
-- Table structure for table `directoropinion`
--

CREATE TABLE `directoropinion` (
  `id` int(255) NOT NULL,
  `budgetSeleaction` varchar(255) NOT NULL,
  `budgetYear` varchar(255) NOT NULL,
  `budgetType` varchar(255) NOT NULL,
  `budgetCode` varchar(255) NOT NULL,
  `budgetSector` varchar(255) NOT NULL,
  `pageNo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directoropinion`
--

INSERT INTO `directoropinion` (`id`, `budgetSeleaction`, `budgetYear`, `budgetType`, `budgetCode`, `budgetSector`, `pageNo`, `type`, `image`, `day`, `month`, `year`, `comment`) VALUES
(1, 'service', '2020-2021', 'others', '56', 'mri', '36', 'oop', '', '19', 'sep', '2029', 'good'),
(2, 'work', '2022-2023', 'revenue', '342', 'ndp', '127', 'x1f', '', '23', 'sep', '2024', '1adrefc'),
(3, 'service', '2022-2023', 'development', '170145', 'bnp', '145', 'x1f', '', '20', 'may', '2024', 'afcdg'),
(4, 'work', '2023-2024', 'others', '345', 'Irm', '23', 'Asde', '', '23', 'Jan', '2025', 'Done'),
(5, 'service', '2023-2024', 'others', '342', 'ndp', '342', 'abcd', '', '20', 'dec', '2035', '12345'),
(6, 'none', 'none', 'none', '', '', '', '', '', 'day', 'month', 'year', '');

-- --------------------------------------------------------

--
-- Table structure for table `generalinformation`
--

CREATE TABLE `generalinformation` (
  `id` int(255) NOT NULL,
  `budgetId` varchar(255) NOT NULL,
  `office_head` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `need` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalinformation`
--

INSERT INTO `generalinformation` (`id`, `budgetId`, `office_head`, `others`, `need`, `value`) VALUES
(1, '180127', '', 'Mr. D', 'yes', ''),
(4, '180108', '', 'Mr. H', 'no', ''),
(8, '', '', '', 'yes', '2501'),
(9, '', '', '', '', ''),
(10, '', '', '', 'yes', '2505');

-- --------------------------------------------------------

--
-- Table structure for table `recommendingofficeropinion`
--

CREATE TABLE `recommendingofficeropinion` (
  `id` int(255) NOT NULL,
  `budgetSeleaction` varchar(255) NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommendingofficeropinion`
--

INSERT INTO `recommendingofficeropinion` (`id`, `budgetSeleaction`, `recommend`, `image`, `day`, `month`, `year`, `comment`) VALUES
(1, 'service', 'yes', '', '23', 'sep', '2030', 'well done'),
(2, 'service', 'yes', '', '8', 'mar', '2024', 'this is good'),
(3, 'service', 'yes', '', '16', 'mar', '2033', 'prosside'),
(4, 'service', 'no', '', '14', 'mar', '2035', 'bad'),
(5, 'buying', 'no', '', '18', 'apr', '2031', 'abcdg'),
(13, 'service', 'yes', '', '10', 'may', '2032', 'Good comment'),
(14, 'service', 'yes', '', '20', 'dec', '2035', 'yes'),
(15, 'service', 'yes', '', '16', 'oct', '2034', ''),
(16, 'service', 'yes', '', '16', 'oct', '2034', '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `verification_id` varchar(256) NOT NULL,
  `verification_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id`, `name`, `email`, `mobile`, `pass`, `type`, `verification_id`, `verification_status`) VALUES
(15, 'Shariar Oni', 'shariaroni007@gmail.com', '01716822414', '827ccb0eea8a706c4c34a16891f84e7b', 'general', '9964111abdaf1af6056b75a8e4d928cb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `treasureopinion`
--

CREATE TABLE `treasureopinion` (
  `id` int(255) NOT NULL,
  `parmited` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treasureopinion`
--

INSERT INTO `treasureopinion` (`id`, `parmited`, `image`, `day`, `month`, `year`, `comment`) VALUES
(1, 'yes', '', '14', 'feb', '2021', 'abcd'),
(2, 'no', '', '15', 'jul', '2027', 'no recomanded'),
(3, 'yes', '', '16', 'may', '2022', 'good'),
(4, 'no', '', 'day', 'month', 'year', '');

-- --------------------------------------------------------

--
-- Table structure for table `vcsiropinion`
--

CREATE TABLE `vcsiropinion` (
  `id` int(255) NOT NULL,
  `parmited` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vcsiropinion`
--

INSERT INTO `vcsiropinion` (`id`, `parmited`, `image`, `day`, `month`, `year`, `comment`) VALUES
(1, 'yes', '', '23', 'sep', '2021', 'good'),
(2, 'no', '', '18', 'aug', '2033', 'no recommended'),
(3, 'yes', '', '15', 'oct', '2023', 'bad');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `budgetseleaction`
--
ALTER TABLE `budgetseleaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `demand`
--
ALTER TABLE `demand`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deputydirectoropinion`
--
ALTER TABLE `deputydirectoropinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `directoropinion`
--
ALTER TABLE `directoropinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `generalinformation`
--
ALTER TABLE `generalinformation`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `recommendingofficeropinion`
--
ALTER TABLE `recommendingofficeropinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `treasureopinion`
--
ALTER TABLE `treasureopinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vcsiropinion`
--
ALTER TABLE `vcsiropinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
