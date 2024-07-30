-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 01:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `judging`
--

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

CREATE TABLE `contestants` (
  `contestant_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `subevent_id` int(11) NOT NULL,
  `contestant_ctr` int(11) NOT NULL,
  `status` text NOT NULL,
  `txt_code` text NOT NULL,
  `rand_code` int(15) NOT NULL,
  `txtPollScore` int(11) NOT NULL,
  `Picture` text NOT NULL,
  `AddOn` varchar(80) NOT NULL,
  `schoolid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`contestant_id`, `fullname`, `subevent_id`, `contestant_ctr`, `status`, `txt_code`, `rand_code`, `txtPollScore`, `Picture`, `AddOn`, `schoolid`) VALUES
(185, 'Rona Liza', 0, 1, '', '', 0, 0, 'mcc1.jpg', '', 0),
(188, 'Joann', 43, 0, '', '', 0, 0, '', '', 0),
(189, 'Joann Bilbao', 40, 1, '', 'BSIT 3 SOUTH', 0, 1, 'mcc4.jpg', 'BSIT 3-SOUTh', 0),
(190, 'Khristine', 40, 2, '', '', 0, 0, 'mcc6.jpg', 'BSIT 3-SOUTH', 0),
(191, 'Rona Liza', 40, 3, '', '', 0, 0, 'mcc1.jpg', '', 0),
(192, 'joann', 60, 1, '', '', 267674, 0, '', '', 0),
(193, 'dianna', 60, 2, '', '', 525099, 0, '', '', 0),
(194, 'jKAHDJK', 60, 3, '', '', 9491153, 0, '', '', 0),
(195, ';asjepow', 60, 4, '', '', 9491154, 0, '', '', 0),
(198, 'Joann Bilbao', 62, 1, '', '', 841181, 0, '', '', 0),
(199, 'Dianna Lyn Cena', 62, 2, '', '', 459661, 0, '', '', 0),
(200, 'CJ', 40, 5, '', '', 0, 0, 'mcc9.jpg', '', 0),
(202, 'xks', 42, 12, '', '', 0, 0, 'mcc5.jpg', '5-South', 0),
(203, 'John', 63, 1, '', '', 860866, 0, '../img/mcc3.jpg', '3-South', 0),
(204, 'Joabb', 63, 2, '', '', 880894, 0, '../img/mcc3.jpg', '3-South', 0),
(205, 'Dream Squad', 64, 1, 'finish', '', 691591, 0, '../img/Community-College-Madridejos.jpeg', 'Bsit-3 South', 0),
(206, 'BINI', 64, 2, 'finish', '', 947235, 1, '../img/mcc.jpg', 'Bsit-2 North', 0),
(214, 'Cristina', 77, 1, '', '', 858911, 1, '../img/66a4c61166f2f_mcc4.jpg', 'Bsit-3 South', 0),
(215, 'dianna', 77, 2, '', '', 577163, 1, '../img/mcc1.jpg', 'Bsit-2 North', 0),
(224, 'Joerge Yangao', 79, 1, '', '', 498333, 0, '../img/3d365d87e9ad1563a430c54fcb3a6946.jpg', 'Bsit-3 South', 0),
(225, 'Joabb', 79, 2, '', '', 127154, 2, '../img/c75f26ff828221ee15e928a648a30b6f.jpg', 'Bsit-2 North', 0);

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `criteria_id` int(11) NOT NULL,
  `subevent_id` int(11) NOT NULL,
  `criteria` text NOT NULL,
  `percentage` int(11) NOT NULL,
  `criteria_ctr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`criteria_id`, `subevent_id`, `criteria`, `percentage`, `criteria_ctr`) VALUES
(55, 40, 'Mastery', 30, 2),
(56, 40, 'Self Confidence', 20, 3),
(57, 40, 'Audience Impact', 20, 4),
(58, 41, 'Figure & Fitness', 40, 1),
(59, 41, 'Stage Presence', 20, 2),
(60, 41, 'Confidence', 30, 3),
(61, 41, 'Overall Impact', 10, 4),
(62, 42, 'Creativity & Design', 40, 1),
(63, 42, 'Stage Presence', 20, 2),
(64, 42, 'Poise & Beauty', 30, 3),
(65, 42, 'Overall Impact', 10, 4),
(66, 43, 'Design & Fitting', 20, 1),
(67, 43, 'Stage Deportment', 30, 2),
(68, 43, 'Poise & Beauty', 40, 3),
(69, 43, 'Overall Impact', 10, 4),
(74, 47, 'Wit & Content', 40, 1),
(75, 47, 'Stage Presence', 20, 2),
(76, 47, 'Projection & Delivery', 30, 3),
(77, 47, 'Overall Impact', 10, 4),
(78, 48, 'PRODUCTION NUMBER', 30, 1),
(79, 48, 'SWIMWEAR ATTIRE', 30, 2),
(80, 48, 'EVENING GOWN', 20, 3),
(81, 48, 'Overall Impact', 20, 4),
(82, 51, 'Wit & Content', 20, 1),
(83, 51, 'Stage Presence', 30, 2),
(84, 51, 'Confidence', 50, 3),
(85, 52, 'Stage Presence/Audience Communication', 20, 1),
(86, 52, 'Intonation.', 30, 2),
(87, 52, 'Vocal Quality', 20, 3),
(88, 52, 'Rhythmic Interpretation.', 30, 4),
(91, 40, 'Poise and Beauty', 30, 1),
(92, 60, 'fdfefadfaf', 50, 1),
(93, 60, 'asdada', 50, 2),
(94, 61, 'fajda', 50, 1),
(95, 61, 'ashdgwd', 50, 2),
(96, 62, 'fdfefadfaf', 50, 1),
(97, 62, 'jugfhfsxfj', 50, 2),
(98, 63, 'fajda', 17, 1),
(99, 63, 'ashdgwd', 18, 2),
(100, 64, 'Choreography', 30, 1),
(101, 64, 'Execution/ timing/synchronization', 20, 2),
(102, 64, 'Good and relevant music', 20, 3),
(103, 64, 'Facial expressions and body language', 30, 4),
(110, 77, 'Vocal Quality', 50, 1),
(111, 77, 'Stage Presence/Audience Communication', 50, 2),
(115, 79, 'Choreography', 50, 1),
(116, 79, 'Stage Presence/Audience Communication', 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `judge_id` int(11) NOT NULL,
  `subevent_id` int(11) NOT NULL,
  `judge_ctr` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `code` varchar(6) NOT NULL,
  `jtype` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`judge_id`, `subevent_id`, `judge_ctr`, `fullname`, `code`, `jtype`) VALUES
(104, 64, 1, 'John Christian Fariola', '4c4py6', ''),
(105, 64, 2, 'James Vincent Pastorillo', 'rnisjp', ''),
(106, 64, 3, 'Jo Ann R. Bilbao', '6q4tut', ''),
(113, 77, 1, 'John Fariola', 'tzmuva', ''),
(114, 77, 2, 'James Pastorillo', 'wocupm', ''),
(116, 79, 1, 'John Fariola', 'gkfze3', ''),
(117, 79, 2, 'James Pastorillo', '4cabfr', '');

-- --------------------------------------------------------

--
-- Table structure for table `main_event`
--

CREATE TABLE `main_event` (
  `mainevent_id` int(11) NOT NULL,
  `event_name` text NOT NULL,
  `status` text NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `sy` varchar(9) NOT NULL,
  `date_start` text NOT NULL,
  `date_end` text NOT NULL,
  `place` text NOT NULL,
  `banner` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `main_event`
--

INSERT INTO `main_event` (`mainevent_id`, `event_name`, `status`, `organizer_id`, `sy`, `date_start`, `date_end`, `place`, `banner`) VALUES
(68, 'BSIT DAYS', 'activated', 31, '624', '2024-07-28', '2024-07-30', 'MCC COVERED COURT', '66a5986c29f86_mcc.jpg'),
(82, 'Binibining Marites', 'activated', 31, '642', '2024-07-28', '2024-07-29', 'MCC COVERED COURT', '66a5986c29f86_mcc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messagein`
--

CREATE TABLE `messagein` (
  `Id` int(11) NOT NULL,
  `SendTime` varchar(10) DEFAULT NULL,
  `ReceiveTime` varchar(10) DEFAULT NULL,
  `MessageFrom` bigint(12) DEFAULT NULL,
  `MessageTo` varchar(10) DEFAULT NULL,
  `SMSC` varchar(10) DEFAULT NULL,
  `MessageText` varchar(4) DEFAULT NULL,
  `MessageType` varchar(10) DEFAULT NULL,
  `MessagePDU` varchar(10) DEFAULT NULL,
  `Gateway` varchar(10) DEFAULT NULL,
  `UserId` varchar(10) DEFAULT NULL,
  `sendStatus` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messagelog`
--

CREATE TABLE `messagelog` (
  `Id` int(11) NOT NULL,
  `SendTime` datetime DEFAULT NULL,
  `ReceiveTime` datetime DEFAULT NULL,
  `StatusCode` int(11) DEFAULT NULL,
  `StatusText` varchar(80) DEFAULT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `MessageType` varchar(80) DEFAULT NULL,
  `MessageId` varchar(80) DEFAULT NULL,
  `ErrorCode` varchar(80) DEFAULT NULL,
  `ErrorText` varchar(80) DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `MessageParts` int(11) DEFAULT NULL,
  `MessagePDU` text DEFAULT NULL,
  `Connector` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  `UserInfo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messagelog`
--

INSERT INTO `messagelog` (`Id`, `SendTime`, `ReceiveTime`, `StatusCode`, `StatusText`, `MessageTo`, `MessageFrom`, `MessageText`, `MessageType`, `MessageId`, `ErrorCode`, `ErrorText`, `Gateway`, `MessageParts`, `MessagePDU`, `Connector`, `UserId`, `UserInfo`) VALUES
(26, '2017-02-18 16:11:34', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2017-02-18 16:12:00', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '2017-02-18 16:12:00', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2017-02-18 16:12:00', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2017-02-18 16:12:00', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '2017-02-18 16:12:00', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '2017-02-18 16:12:00', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '2017-02-18 16:12:00', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2017-02-18 16:12:00', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '2017-02-18 16:12:31', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '2017-02-18 16:12:31', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2017-02-18 16:12:31', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '2017-02-18 16:12:31', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2017-02-18 16:12:31', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '2017-02-18 16:12:31', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '2017-02-18 16:12:31', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '2017-02-18 16:12:31', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '2017-02-18 16:21:40', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2017-02-18 16:22:10', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '2017-02-18 16:23:10', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, '2017-02-18 16:23:41', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '2017-02-18 16:24:13', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, '2017-02-18 16:24:45', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '2017-02-18 16:25:16', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '2017-02-18 16:27:19', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, '2017-02-18 16:27:21', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, '2017-02-18 16:30:21', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '2017-02-18 16:30:49', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, '2017-02-18 16:31:21', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, '2017-02-18 16:32:21', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, '2017-02-18 16:38:03', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, '2017-02-18 16:38:33', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, '2017-02-18 16:40:09', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, '2017-02-18 16:40:11', NULL, 300, NULL, '+', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, '2017-02-18 16:40:41', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, '2017-02-18 16:42:16', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, '2017-02-18 16:42:16', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, '2017-02-18 16:42:59', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, '2017-02-18 16:43:30', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, '2017-02-18 16:44:02', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, '2017-02-18 16:44:34', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, '2017-02-18 16:45:05', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, '2017-02-18 16:50:22', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, '2017-02-18 16:50:55', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, '2017-02-18 16:54:03', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, '2017-02-18 16:55:35', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, '2017-02-18 16:56:07', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, '2017-02-18 16:56:39', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, '2017-02-18 16:57:12', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, '2017-02-18 17:02:44', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, '2017-02-18 17:02:44', NULL, 300, NULL, '+4438', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, '2017-02-18 17:02:44', NULL, 300, NULL, '+8080', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, '2017-02-18 17:15:15', NULL, 300, NULL, '+0', 'BCC EJS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, '2017-02-18 17:30:24', NULL, 200, NULL, '+639074946964', 'test message', NULL, NULL, '1:+639074946964:197', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, '2017-02-18 17:35:38', NULL, 200, NULL, '+639074946964', 'Thank you. Your vote has been counted.', NULL, NULL, '1:+639074946964:198', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, '2017-02-18 17:35:40', NULL, 200, NULL, '+4438', 'Wrong code. Pls. try again.', NULL, NULL, '1:+4438:199', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, '2017-02-18 17:37:47', NULL, 300, NULL, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, '2017-02-18 17:38:23', NULL, 300, NULL, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, '2017-02-18 17:38:47', NULL, 300, NULL, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, '2017-02-18 17:39:09', NULL, 200, NULL, '+639074946964', 'Wrong code. Pls. try again.', NULL, NULL, '1:+639074946964:200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, '2017-02-18 17:39:47', NULL, 200, NULL, '+639074946964', 'You have voted previously. Your vote is not counted.', NULL, NULL, '1:+639074946964:201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, '2017-02-18 17:41:41', NULL, 200, NULL, '+639074946964', 'Thank you. Your vote has been counted.', NULL, NULL, '1:+639074946964:202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, '2017-02-18 17:42:18', NULL, 200, NULL, '+639074946964', 'You have voted previously. Your vote is not counted.', NULL, NULL, '1:+639074946964:203', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, '2017-02-18 17:47:10', NULL, 200, NULL, '+639074946964', 'You have voted previously. Your vote is not counted.', NULL, NULL, '1:+639074946964:204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, '2017-02-18 17:48:36', NULL, 200, NULL, '+639074946964', 'Thank you. Your vote has been counted.', NULL, NULL, '1:+639074946964:205', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, '2017-02-18 17:49:19', NULL, 200, NULL, '+639074946964', 'Wrong code. Pls. try again.', NULL, NULL, '1:+639074946964:206', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, '2017-02-18 17:52:58', NULL, 200, NULL, '+639983401847', 'Wrong code. Pls. try again.', NULL, NULL, '1:+639983401847:207', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, '2017-02-18 17:55:22', NULL, 200, NULL, '+639468601299', 'Thank you. Your vote has been counted.', NULL, NULL, '1:+639468601299:208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, '2017-02-18 17:56:15', NULL, 200, NULL, '+639468601299', 'Thank you. Your vote has been counted.', NULL, NULL, '1:+639468601299:209', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, '2017-02-18 17:57:01', NULL, 200, NULL, '+639468601299', 'Thank you. Your vote has been counted.', NULL, NULL, '1:+639468601299:210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, '2017-02-18 18:02:11', NULL, 200, NULL, '+639156444975', 'Thank you. Your vote has been counted.', NULL, NULL, '1:+639156444975:211', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, '2017-02-18 18:02:49', NULL, 200, NULL, '+639156444975', 'Wrong code. Pls. try again.', NULL, NULL, '1:+639156444975:212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messageout`
--

CREATE TABLE `messageout` (
  `Id` int(11) NOT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `MessageType` varchar(80) DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  `UserInfo` text DEFAULT NULL,
  `Priority` int(11) DEFAULT NULL,
  `Scheduled` datetime DEFAULT NULL,
  `ValidityPeriod` int(11) DEFAULT NULL,
  `IsSent` tinyint(1) NOT NULL DEFAULT 0,
  `IsRead` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `organizer_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `reset_token` varchar(250) DEFAULT NULL,
  `reset_expires` varchar(250) DEFAULT NULL,
  `pnum` varchar(15) NOT NULL,
  `txt_poll_num` varchar(15) NOT NULL,
  `access` varchar(25) NOT NULL,
  `org_id` varchar(12) NOT NULL,
  `status` varchar(12) NOT NULL,
  `company_name` varchar(55) NOT NULL,
  `company_address` varchar(55) NOT NULL,
  `company_logo` varchar(55) NOT NULL,
  `company_telephone` varchar(55) NOT NULL,
  `company_email` varchar(55) NOT NULL,
  `company_website` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`organizer_id`, `fname`, `mname`, `lname`, `username`, `password`, `email`, `reset_token`, `reset_expires`, `pnum`, `txt_poll_num`, `access`, `org_id`, `status`, `company_name`, `company_address`, `company_logo`, `company_telephone`, `company_email`, `company_website`) VALUES
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a5ec8fbde936fd4071677a935f3a0a5f26f98f6f
(19, 'AYRES', 'SANTILLAN', 'ILUSTRISIMO', 'blue', 'blue', 'ayresilustrisimo@gmail.com', NULL, NULL, '09385974999', '09385974999', 'Organizer', '', 'online', 'MCC EVENT JUDGING SYSTEM', 'BANTAYAN ISLAND, BUNAKAN, MADRIDEJOS, CEBU', '52985-ejs_logo.png', '9476865867', 'mcceventjudgingsystem@gmail.com', 'mcceventjudging.com'),
(20, 'JOANN', 'REBAMONTE', 'BILBAO', 'red', 'red', 'thomassalvado15@gmail.com', '13a47eee732480d3c33d459f0c5d46a7c2277c09e09c967c4bd05f22e35f5a56', '2023-05-11 22:56:30', '', '', 'Tabulator', '19', 'offline', '', '', '', '', '', ''),
(31, 'JOANN', 'REBAMONTE', 'BILBAO', 'ann', 'ann123', 'thomassalvado15@gmail.com', NULL, NULL, '09476875656', '09382451653', 'Organizer', '', 'offline', 'MCC EVENT JUDGING SYSTEM', 'BANTAYAN ISLAND, BUNAKAN, MADRIDEJOS, CEBU', 'logo.png', '9476865867', 'mcceventjudgingsystem@gmail.com', 'mcceventjudging.com'),
(34, 'Gwendelyn', 'Marabi', 'Escaran', 'gwen', 'gwen', '', NULL, NULL, '', '', 'Tabulator', '31', 'offline', '', '', '', '', '', '');
<<<<<<< HEAD
=======
=======
(19, 'CHRISTIAN PAUL', 'LANORIAS', 'SALVADO', 'blue', 'blue', 'salvadochristianpaul5@gmail.com', NULL, NULL, '09385974999', '09385974999', 'Organizer', '', 'online', '', 'BANTAYAN ISLAND CEBU', '', '000-0000', '', ''),
(20, 'JOHN PAUL', '', 'UNGON', 'red', 'red', 'thomassalvado15@gmail.com', '13a47eee732480d3c33d459f0c5d46a7c2277c09e09c967c4bd05f22e35f5a56', '2023-05-11 22:56:30', '', '', 'Tabulator', '19', 'offline', '', '', '', '', '', ''),
(27, 'user', 'user', 'user', 'user', 'hello', 'evas.jygona@gmail.com', NULL, NULL, '', '09078262015', 'Organizer', '', 'offline', '', '', '', '', '', ''),
(28, 'black', 'black', 'black', '123', '123', 'cheskajumantoc@gmail.com', '74cf843a5c9ac73769332b28cd7e79ae5e11698dcec3aa768f1c5a96ffdf0dde', '2023-05-12 11:00:26', '', '', 'Organizer', '', 'offline', '', '', '', '', '', ''),
(29, 'kin', 'ni', 'chi', 'userr', 'userr', '', NULL, NULL, '', '', 'Organizer', '', 'offline', '', '', '', '', '', ''),
(30, 'Shiela Mae', 'Ducay', 'Yhapon', 'shie', 'la', 'shielamaeyhapon791@gmail.com', 'dba9ffbaee49e2c2a779e2b214135fae6cd43c48516f267ad21dd65e28dc0cc9', '2023-05-10 16:59:13', '', '', 'Organizer', '', 'offline', '', '', '', '', '', '');
>>>>>>> b77b374fd7ac336d8cec2548774a60ff6476fedd
>>>>>>> a5ec8fbde936fd4071677a935f3a0a5f26f98f6f

-- --------------------------------------------------------

--
-- Table structure for table `rank_system`
--

CREATE TABLE `rank_system` (
  `rs_id` int(11) NOT NULL,
  `subevent_id` varchar(12) NOT NULL,
  `contestant_id` varchar(12) NOT NULL,
  `total_rank` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rank_system`
--

INSERT INTO `rank_system` (`rs_id`, `subevent_id`, `contestant_id`, `total_rank`) VALUES
(16, '40', '97', 18.0),
(17, '40', '98', 39.0),
(18, '40', '99', 22.0),
(19, '40', '100', 19.5),
(20, '40', '101', 36.0),
(21, '40', '102', 23.0),
(22, '40', '103', 20.5),
(23, '40', '104', 30.0),
(24, '40', '105', 37.0),
(25, '40', '106', 31.5),
(26, '40', '107', 28.0),
(27, '40', '108', 28.5),
(28, '40', '109', 31.0),
(29, '41', '110', 23.5),
(30, '41', '111', 40.5),
(31, '41', '112', 22.5),
(32, '41', '113', 17.0),
(33, '41', '114', 19.0),
(34, '41', '115', 22.0),
(35, '41', '116', 34.5),
(36, '41', '117', 29.0),
(37, '41', '118', 24.5),
(38, '41', '119', 37.5),
(39, '41', '120', 37.0),
(40, '41', '121', 27.0),
(41, '41', '122', 30.0),
(42, '42', '123', 19.0),
(43, '42', '124', 35.5),
(44, '42', '125', 39.5),
(45, '42', '126', 33.5),
(46, '42', '127', 41.0),
(47, '42', '128', 32.0),
(48, '42', '129', 11.0),
(49, '42', '130', 35.0),
(50, '42', '131', 36.0),
(51, '42', '132', 24.0),
(52, '42', '133', 20.5),
(53, '42', '134', 20.0),
(54, '42', '135', 17.0),
(55, '43', '136', 33.0),
(56, '43', '137', 35.5),
(57, '43', '138', 35.5),
(58, '43', '139', 16.5),
(59, '43', '140', 15.5),
(60, '43', '141', 25.0),
(61, '43', '142', 35.5),
(62, '43', '143', 26.5),
(63, '43', '144', 25.5),
(64, '43', '145', 25.0),
(65, '43', '146', 23.5),
(66, '43', '147', 26.0),
(67, '43', '148', 41.0),
(68, '44', '149', 31.0),
(69, '44', '150', 40.5),
(70, '44', '151', 28.5),
(71, '44', '152', 15.5),
(72, '44', '153', 17.5),
(73, '44', '158', 34.0),
(74, '44', '157', 10.0),
(75, '44', '156', 39.5),
(76, '44', '155', 30.0),
(77, '44', '154', 34.0),
(78, '44', '159', 28.5),
(79, '44', '160', 33.0),
(80, '44', '161', 32.0),
(81, '47', '162', 10.0),
(82, '47', '163', 15.0),
(83, '47', '164', 13.5),
(84, '47', '165', 9.5),
(85, '47', '166', 12.0),
(86, '52', '179', 8.5),
(87, '52', '180', 9.0),
(88, '52', '181', 6.5),
(89, '52', '182', 9.5),
(90, '52', '183', 11.5),
(91, '64', '205', 5.5),
(92, '64', '206', 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(30) NOT NULL,
  `faculty_id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `schedule_type` tinyint(1) NOT NULL COMMENT '1= class, 2= meeting,3=others',
  `description` text NOT NULL,
  `location` text NOT NULL,
  `is_repeating` tinyint(1) NOT NULL,
  `repeating_data` text NOT NULL,
  `schedule_date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `faculty_id`, `title`, `schedule_type`, `description`, `location`, `is_repeating`, `repeating_data`, `schedule_date`, `time_from`, `time_to`, `date_created`) VALUES
(1, 2, 'Class 101 (M & Th)', 1, 'Sample Only', 'Online', 1, '{\"dow\":\"1,4\",\"start\":\"2020-10-01\",\"end\":\"2020-11-30\"}', '0000-00-00', '09:00:00', '12:00:00', '2023-04-19 08:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `schoolid` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`schoolid`, `student_id`, `fname`, `mname`, `lname`, `course`) VALUES
(1, '2021', 'JOANN', 'R. ', 'BILBAO', 'BSIT 3 SOUTH'),
(2, '2021-1485', 'John Christian', 'L.', 'Fariola', 'BSIT 3 SOUTH');

-- --------------------------------------------------------

--
-- Table structure for table `sub_event`
--

CREATE TABLE `sub_event` (
  `subevent_id` int(11) NOT NULL,
  `mainevent_id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `event_name` text NOT NULL,
  `status` text NOT NULL,
  `eventdate` text NOT NULL,
  `eventtime` text NOT NULL,
  `place` text NOT NULL,
  `txtpoll_status` text NOT NULL,
  `view` varchar(15) NOT NULL,
  `txtpollview` varchar(15) NOT NULL,
  `banner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_event`
--

INSERT INTO `sub_event` (`subevent_id`, `mainevent_id`, `organizer_id`, `event_name`, `status`, `eventdate`, `eventtime`, `place`, `txtpoll_status`, `view`, `txtpollview`, `banner`) VALUES
(64, 68, 31, 'HIPHOP DANCE COMPITATION', 'activated', '2024-07-23', '10:30', 'MCC COVERED COURT', 'deactive', 'deactive', 'deactive', 'mcc3.jpg'),
(77, 68, 31, '123', 'activated', '2024-07-31', '', '123', 'deactive', 'deactive', 'deactive', 'mcc2.jpg'),
(79, 82, 31, 'SINGING CONTEST', 'activated', '2024-07-28', '', 'MCC COVERED COURT', 'deactive', 'deactive', 'deactive', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `sub_results`
--

CREATE TABLE `sub_results` (
  `subresult_id` int(11) NOT NULL,
  `subevent_id` int(11) NOT NULL,
  `mainevent_id` int(11) NOT NULL,
  `contestant_id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `total_score` decimal(11,1) NOT NULL,
  `deduction` int(11) NOT NULL,
  `criteria_ctr1` decimal(11,1) NOT NULL,
  `criteria_ctr2` decimal(11,1) NOT NULL,
  `criteria_ctr3` decimal(11,1) NOT NULL,
  `criteria_ctr4` decimal(11,1) NOT NULL,
  `criteria_ctr5` decimal(11,1) NOT NULL,
  `criteria_ctr6` decimal(11,1) NOT NULL,
  `criteria_ctr7` decimal(11,1) NOT NULL,
  `criteria_ctr8` decimal(11,1) NOT NULL,
  `criteria_ctr9` decimal(11,1) NOT NULL,
  `criteria_ctr10` decimal(11,1) NOT NULL,
  `comments` text NOT NULL,
  `rank` varchar(11) NOT NULL,
  `judge_rank_stat` varchar(15) NOT NULL,
  `place_title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_results`
--

INSERT INTO `sub_results` (`subresult_id`, `subevent_id`, `mainevent_id`, `contestant_id`, `judge_id`, `total_score`, `deduction`, `criteria_ctr1`, `criteria_ctr2`, `criteria_ctr3`, `criteria_ctr4`, `criteria_ctr5`, `criteria_ctr6`, `criteria_ctr7`, `criteria_ctr8`, `criteria_ctr9`, `criteria_ctr10`, `comments`, `rank`, `judge_rank_stat`, `place_title`) VALUES
(365, 64, 68, 205, 105, 85.0, 0, 30.0, 17.0, 18.0, 20.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 'good performance', '2', '', '2nd'),
(366, 64, 68, 206, 105, 95.0, 0, 29.0, 17.0, 19.5, 29.5, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, '', '1', '', '1st'),
(367, 64, 68, 205, 104, 75.5, 0, 5.5, 20.0, 20.0, 30.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, '', '2', '', '2nd'),
(368, 64, 68, 206, 104, 99.5, 0, 30.0, 19.5, 20.0, 30.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, '', '1', '', '1st'),
(369, 64, 68, 205, 106, 100.0, 0, 30.0, 20.0, 20.0, 30.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, '', '1.5', 'tie', '2nd'),
(370, 64, 68, 206, 106, 100.0, 0, 30.0, 20.0, 20.0, 30.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, '', '1.5', 'tie', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `textpoll`
--

CREATE TABLE `textpoll` (
  `textpoll_id` int(11) NOT NULL,
  `contestant_id` varchar(12) NOT NULL,
  `text_vote` int(11) NOT NULL,
  `subevent_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_events`
--

CREATE TABLE `upcoming_events` (
  `id` int(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `banner` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upcoming_events`
--

INSERT INTO `upcoming_events` (`id`, `title`, `start_date`, `end_date`, `banner`) VALUES
(65, 'Dance Contestant', '2024-08-01 15:30:00', '2024-08-01 16:30:00', '../uploads/66a5986c29f86_mcc.jpg'),
(67, 'Singing', '2024-08-01 03:00:00', '2024-08-01 04:30:00', '../uploads/66a5986c29f86_mcc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `subevent_id` int(11) NOT NULL,
  `contestant_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `student_id`, `subevent_id`, `contestant_id`, `timestamp`) VALUES
(4, '2021-1485', 64, 206, '2024-07-29 10:02:40'),
(5, '2021-1485', 79, 225, '2024-07-29 10:05:22'),
(6, '2021-1485', 77, 215, '2024-07-29 10:30:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contestants`
--
ALTER TABLE `contestants`
  ADD PRIMARY KEY (`contestant_id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`criteria_id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD PRIMARY KEY (`judge_id`);

--
-- Indexes for table `main_event`
--
ALTER TABLE `main_event`
  ADD PRIMARY KEY (`mainevent_id`);

--
-- Indexes for table `messagein`
--
ALTER TABLE `messagein`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `messagelog`
--
ALTER TABLE `messagelog`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IDX_MessageId` (`MessageId`,`SendTime`);

--
-- Indexes for table `messageout`
--
ALTER TABLE `messageout`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IDX_IsRead` (`IsRead`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`organizer_id`);

--
-- Indexes for table `rank_system`
--
ALTER TABLE `rank_system`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`schoolid`);

--
-- Indexes for table `sub_event`
--
ALTER TABLE `sub_event`
  ADD PRIMARY KEY (`subevent_id`);

--
-- Indexes for table `sub_results`
--
ALTER TABLE `sub_results`
  ADD PRIMARY KEY (`subresult_id`);

--
-- Indexes for table `textpoll`
--
ALTER TABLE `textpoll`
  ADD PRIMARY KEY (`textpoll_id`);

--
-- Indexes for table `upcoming_events`
--
ALTER TABLE `upcoming_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_vote` (`student_id`,`subevent_id`,`contestant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contestants`
--
ALTER TABLE `contestants`
  MODIFY `contestant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `criteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
  MODIFY `judge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `main_event`
--
ALTER TABLE `main_event`
  MODIFY `mainevent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `messagein`
--
ALTER TABLE `messagein`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messagelog`
--
ALTER TABLE `messagelog`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `messageout`
--
ALTER TABLE `messageout`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `organizer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rank_system`
--
ALTER TABLE `rank_system`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `schoolid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_event`
--
ALTER TABLE `sub_event`
  MODIFY `subevent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `sub_results`
--
ALTER TABLE `sub_results`
  MODIFY `subresult_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `textpoll`
--
ALTER TABLE `textpoll`
  MODIFY `textpoll_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upcoming_events`
--
ALTER TABLE `upcoming_events`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
