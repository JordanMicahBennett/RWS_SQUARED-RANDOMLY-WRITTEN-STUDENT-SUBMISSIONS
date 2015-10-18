
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2015 at 01:22 AM
-- Server version: 5.1.61
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u197334111_tas`
--

-- --------------------------------------------------------

--
-- Table structure for table `Dump`
--

CREATE TABLE IF NOT EXISTS `Dump` (
  `CRN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Subject Code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Course Number` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Semester` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Campus` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Section` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Schedule` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Year Long` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Permission Required` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Quota` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Enrol` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Enrol (Prev. Yr.)` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Instructor ID` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Instructor Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Instructor Position` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Start Date` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `End Date` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Day` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Start Time` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `End Time` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Room Description` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Preferences`
--

CREATE TABLE IF NOT EXISTS `Preferences` (
  `SlotId` varchar(9999) COLLATE latin1_general_ci NOT NULL,
  `InstructorId` varchar(9999) COLLATE latin1_general_ci NOT NULL,
  `Venue` varchar(9999) COLLATE latin1_general_ci NOT NULL,
  `CourseCode` varchar(9999) COLLATE latin1_general_ci NOT NULL,
  `Activity` varchar(2000) COLLATE latin1_general_ci NOT NULL,
  `SlotColour` varchar(9999) COLLATE latin1_general_ci NOT NULL,
  `AcceptanceStatus` varchar(9999) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Preferences`
--

INSERT INTO `Preferences` (`SlotId`, `InstructorId`, `Venue`, `CourseCode`, `Activity`, `SlotColour`, `AcceptanceStatus`) VALUES
('1a', 'mugisa', '4', '1', '2', 'rgba(116,67,219,1)', 'false'),
('2b', 'mugisa', 'r0', 'c0', 'a0', '', 'false'),
('2b', 'Kirk R. Morgan', 'PAS: PreClinical Lecture Theatre', 'COMP2160', 'Lab', '', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `Selectable_Activities`
--

CREATE TABLE IF NOT EXISTS `Selectable_Activities` (
  `ItemName` varchar(9999) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Selectable_Activities`
--

INSERT INTO `Selectable_Activities` (`ItemName`) VALUES
('Lab'),
('Secondary Tutorial'),
('Tutorial-Discussions'),
('Seminar');

-- --------------------------------------------------------

--
-- Table structure for table `Selectable_Courses`
--

CREATE TABLE IF NOT EXISTS `Selectable_Courses` (
  `ItemName` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Selectable_Courses`
--

INSERT INTO `Selectable_Courses` (`ItemName`) VALUES
('COMP1126'),
('COMP1127'),
('COMP1161'),
('COMP1210'),
('COMP2130'),
('COMP2160'),
('COMP2170'),
('COMP2211'),
('COMP2340'),
('COMP3150'),
('COMP3161'),
('COMP3170'),
('COMP3192'),
('COMP3702'),
('COMP3801'),
('COMP3901'),
('COMP3911'),
('COMP3912'),
('COMP5110'),
('COMP5120'),
('COMP5740'),
('COMP6410'),
('COMP6430'),
('COMP6540'),
('COMP6550'),
('COMP6810'),
('INFO2100'),
('INFO2100'),
('INFO3110'),
('INFO3155'),
('INFO3180'),
('INFO3180'),
('INFO3435'),
('SWEN3165'),
('SWEN3185'),
('SWEN3920');

-- --------------------------------------------------------

--
-- Table structure for table `Selectable_Instructors`
--

CREATE TABLE IF NOT EXISTS `Selectable_Instructors` (
  `ItemName` varchar(9999) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Selectable_Instructors`
--

INSERT INTO `Selectable_Instructors` (`ItemName`) VALUES
('Ricardo A. Anderson'),
('Curtis C. Busby-Earle'),
('Claudine A. Allen'),
('Careene Rodney'),
('Dean Jones'),
('Eyton A. Ferguson'),
('Paul A. Gaynor'),
('Simon U. Ewedafe'),
('Kirk R. Morgan'),
('Devon R. Stoddart'),
('Christopher P. Muir'),
('Kevin J. Miller'),
('Kaydia C. Reid'),
('Claudine A. Allen'),
('MELVILLE O. MCINTOSH'),
('Daniel T. Fokum'),
('Gunjan Mansingh'),
('Carl C. Beckford'),
('Ezra K. Mugisa'),
('Lila Rao'),
('Felix O. Akinladejo'),
('Ricardo A. Baccas'),
('Ricardo A. Anderson'),
('David C. Bain');

-- --------------------------------------------------------

--
-- Table structure for table `Selectable_Rooms`
--

CREATE TABLE IF NOT EXISTS `Selectable_Rooms` (
  `ItemName` varchar(9999) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Selectable_Rooms`
--

INSERT INTO `Selectable_Rooms` (`ItemName`) VALUES
('Computer Lab 1'),
('Computing Lecture Room'),
('Computer Science Tutorial Room 2'),
('POST GRAD COMPUTER ROOM'),
('Computer Science Tutorial Room 1'),
('PAS: PreClinical Lecture Theatre'),
('PAS Science Lecture Theatre'),
('PAS: Physiology Lect Theatre'),
('Western Jamaica Computer Lab'),
('PAS Computer Science Lab 2'),
('Western Jamaica Seminar Room 1'),
('PA Phys Lecture Theater B');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `UserId` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `UserPassword` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `UserName` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `UserRole` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `UserStatus` varchar(9999) COLLATE latin1_general_ci NOT NULL,
  `UserMaximumHours` int(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserId`, `UserPassword`, `UserName`, `UserRole`, `UserStatus`, `UserMaximumHours`) VALUES
('admin', 'admin', 'Administrator', 'system-admin', 'full-time', 0),
('rodney', 'rodney', 'rodney price', 'system-assistant', 'part-time', 20),
('mugisa', 'mugisa', 'ezra mugisa', 'system-lecturer', 'full-time', 3),
('mike', 'mike', 'mike larry', 'system-lecturer', 'part-time', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
