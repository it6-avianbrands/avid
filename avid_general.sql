-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 09:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avid_general`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch_code` varchar(10) NOT NULL,
  `branch_desc` text NOT NULL,
  `region_code` varchar(10) NOT NULL,
  `parent_code` varchar(10) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_code`, `branch_desc`, `region_code`, `parent_code`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'SMG', 'Artatama Asasta Abadi Semarang', 'R3', 'AAA', 1, '2021-08-18 05:28:41', 'admin', '2021-08-17 22:28:30', 'admin'),
(2, 'CRB', 'Artatama Asasta Abadi Cirebon', 'R2', 'AAA', 1, '2021-08-18 04:41:31', 'admin', '2021-08-17 21:41:31', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `url` text NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `code`, `description`, `url`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'module', 'Modul', 'module', 1, '2021-08-16 07:49:17', 'admin', '2021-08-16 00:48:49', 'admin'),
(2, 'branch', 'Cabang', 'branch', 1, '2021-08-12 23:56:26', 'admin', '2021-08-12 23:56:26', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbJenis`
--

CREATE TABLE `tbJenis` (
  `JenisCode` varchar(20) NOT NULL,
  `JenisDesc` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` varchar(15) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbJenis`
--

INSERT INTO `tbJenis` (`JenisCode`, `JenisDesc`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
('EMULSION', 'Emulsion Ready Mix', '2021-08-22 13:32:18', 'admin', '2021-08-22 13:46:54', 'admin'),
('EMULSION MESIN', 'Emulsion Mesin (Tinting)', '2021-08-22 13:50:37', 'admin', '2021-08-22 13:50:37', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbKemasan`
--

CREATE TABLE `tbKemasan` (
  `KemasanCode` varchar(20) NOT NULL,
  `KemasanDesc` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` varchar(15) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbKemasan`
--

INSERT INTO `tbKemasan` (`KemasanCode`, `KemasanDesc`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
('DEKORATIF', 'Dekoratif', '2021-08-22 14:04:20', 'admin', '2021-08-22 14:07:00', 'admin'),
('PRIMER', 'Primer', '2021-08-22 14:07:10', 'admin', '2021-08-22 14:07:10', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbMerk`
--

CREATE TABLE `tbMerk` (
  `MerkCode` varchar(20) NOT NULL,
  `MerkDesc` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` varchar(15) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbMerk`
--

INSERT INTO `tbMerk` (`MerkCode`, `MerkDesc`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
('AVIAN', 'Avian', '2021-08-22 01:00:40', 'admin', '2021-08-22 01:00:40', 'admin'),
('AVITEX', 'Avitex', '2021-08-22 00:58:01', 'admin', '2021-08-22 01:00:27', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbProduct`
--

CREATE TABLE `tbProduct` (
  `ProductCode` varchar(20) NOT NULL,
  `ProductDesc` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` varchar(15) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbProduct`
--

INSERT INTO `tbProduct` (`ProductCode`, `ProductDesc`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
('CAT', 'Cat', '2021-08-21 20:45:46', 'admin', '2021-08-21 23:15:46', 'admin'),
('PIPA', 'Pipa', '2021-08-21 23:15:38', 'admin', '2021-08-21 23:15:38', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbUkuran`
--

CREATE TABLE `tbUkuran` (
  `UkuranCode` varchar(20) NOT NULL,
  `UkuranDesc` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` varchar(15) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbUkuran`
--

INSERT INTO `tbUkuran` (`UkuranCode`, `UkuranDesc`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
('1 KG', '1 KG', '2021-08-22 13:56:50', 'admin', '2021-08-22 13:57:56', 'admin'),
('5 KG', '5 KG', '2021-08-22 13:58:11', 'admin', '2021-08-22 13:58:11', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbWarna`
--

CREATE TABLE `tbWarna` (
  `ColorCode` varchar(20) NOT NULL,
  `ColorDesc` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` varchar(15) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbJenis`
--
ALTER TABLE `tbJenis`
  ADD PRIMARY KEY (`JenisCode`);

--
-- Indexes for table `tbKemasan`
--
ALTER TABLE `tbKemasan`
  ADD PRIMARY KEY (`KemasanCode`);

--
-- Indexes for table `tbMerk`
--
ALTER TABLE `tbMerk`
  ADD PRIMARY KEY (`MerkCode`);

--
-- Indexes for table `tbProduct`
--
ALTER TABLE `tbProduct`
  ADD PRIMARY KEY (`ProductCode`);

--
-- Indexes for table `tbUkuran`
--
ALTER TABLE `tbUkuran`
  ADD PRIMARY KEY (`UkuranCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
