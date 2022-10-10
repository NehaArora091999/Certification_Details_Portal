-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 09:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spcruddb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete` (IN `rid` INT(5))  BEGIN
delete from tblusers where id=rid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert` (IN `EmployeeName` VARCHAR(250), IN `CSP` VARCHAR(100), IN `CertificationLevel` VARCHAR(250), IN `CertificationName` VARCHAR(250), IN `CertificationId` VARCHAR(250), IN `CertificationDate` VARCHAR(100), IN `ExpiryDateofCertification` VARCHAR(100), IN `CertificationValidity` VARCHAR(20), IN `file_name` VARCHAR(250))  BEGIN
insert into tblusers(EmployeeName,CSP,CertificationLevel,CertificationName,CertificationId,CertificationDate,ExpiryDateofCertification,CertificationValidity,filename) value(EmployeeName,CSP,CertificationLevel,CertificationName,CertificationId,CertificationDate,ExpiryDateofCertification,CertificationValidity,file_name);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_read` ()  BEGIN
select * from tblusers;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_readarow` (IN `rid` INT(5))  BEGIN
select * from tblusers where id=rid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update` (IN `EmployeeName` VARCHAR(250), IN `CSP` VARCHAR(100), IN `CertificationLevel` VARCHAR(250), IN `CertificationName` VARCHAR(250), IN `CertificationId` VARCHAR(250), IN `CertificationDate` VARCHAR(100), IN `ExpiryDateofCertification` VARCHAR(100), IN `CertificationValidity` VARCHAR(20), IN `file_name` VARCHAR(250), IN `rid` INT(5))  BEGIN 
update tblusers set EmployeeName=EmployeeName,CSP=CSP,CertificationLevel=CertificationLevel,CertificationName=CertificationName,
CertificationId=CertificationId,CertificationDate=CertificationDate,ExpiryDateofCertification=ExpiryDateofCertification,
CertificationValidity=CertificationValidity,filename=file_name where id=rid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `EmployeeName` varchar(250) NOT NULL,
  `CSP` varchar(100) NOT NULL,
  `CertificationLevel` varchar(250) NOT NULL,
  `CertificationName` varchar(250) NOT NULL,
  `CertificationId` varchar(250) NOT NULL,
  `CertificationDate` varchar(100) NOT NULL,
  `ExpiryDateofCertification` varchar(100) NOT NULL,
  `CertificationValidity` int(20) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `usertype` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `EmployeeName`, `CSP`, `CertificationLevel`, `CertificationName`, `CertificationId`, `CertificationDate`, `ExpiryDateofCertification`, `CertificationValidity`, `filename`) VALUES
(142, 'neha arora', 'GCP', 'Basic', 'ACE', 'asd1232', '2022-07-11', '2024-11-13', 4, 'DevashishJangid Task1.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
