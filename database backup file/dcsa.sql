-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2016 at 03:30 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcsa`
--
CREATE DATABASE IF NOT EXISTS `dcsa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dcsa`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` text NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assign_id` bigint(20) NOT NULL,
  `group_id` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `title` varchar(30) NOT NULL,
  `descr` varchar(250) NOT NULL,
  `last_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assign_id`, `group_id`, `batch`, `staff_id`, `title`, `descr`, `last_date`) VALUES
(123500, 201601, 14322, 1002, 'IP Assignment - I', 'write any three importance of IP', '31-06-2016'),
(123501, 201602, 14322, 1001, 'asf', 'dfdf', '22-06-2016'),
(123502, 201601, 14322, 1002, 'assignment 1', 'asjad', '2016-06-24T01:00'),
(123503, 201601, 14322, 1002, 'Mathava Assign demo', 'write about urself', '2016-06-16T01:00'),
(123504, 201608, 16322, 1002, 'C Assign 1', 'write about features of c program\r\nc\r\nprint method\r\nmath functions', '2016-06-17T10:01');

-- --------------------------------------------------------

--
-- Table structure for table `assign_submit`
--

CREATE TABLE `assign_submit` (
  `assign_sno` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `assign_id` bigint(20) NOT NULL,
  `doc_path` varchar(50) NOT NULL,
  `submit_date` varchar(20) NOT NULL,
  `mark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_submit`
--

INSERT INTO `assign_submit` (`assign_sno`, `student_id`, `assign_id`, `doc_path`, `submit_date`, `mark`) VALUES
(3, 14322013, 123502, 'lectures/Character Arrays-.pdf', '1464927822', NULL),
(4, 14322028, 123503, 'lectures/File Management.pdf', '1464927856', 6),
(5, 14322013, 123503, 'lectures/File Management.pdf', '1465055272', 4),
(6, 14322013, 123500, 'lectures/GRI e_Prospectus.pdf', '1465272713', NULL),
(7, 14322005, 123503, 'lectures/Notes07.pdf', '1465489212', NULL),
(8, 14322002, 123503, 'lectures/Mathava nw index.docx', '1465527027', 5);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `class` varchar(20) NOT NULL,
  `batch_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`class`, `batch_id`) VALUES
('I M.Sc(IT)', 16321),
('I MCA', 16322),
('II M.Sc(IT)', 15321),
('II MCA', 15322),
('III MCA', 14322);

-- --------------------------------------------------------

--
-- Table structure for table `eventcalendar`
--

CREATE TABLE `eventcalendar` (
  `Id` int(11) NOT NULL,
  `Title` varchar(65) NOT NULL,
  `Detail` varchar(255) NOT NULL,
  `eventDate` varchar(10) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventcalendar`
--

INSERT INTO `eventcalendar` (`Id`, `Title`, `Detail`, `eventDate`, `dateAdded`) VALUES
(1, 'hkbkjb', 'fgygfxgjvjk', '02/03/2016', '2016-02-03 00:00:00'),
(2, 'rsgjzfkj', 'rgsghcjhvjm', '11/16/2016', '2016-02-03 00:00:00'),
(3, 'birthday', 'me', '02/03/2016', '2016-02-03 00:00:00'),
(5, 'koi', 'mca 2 year', '02/15/2016', '2016-02-04 00:00:00'),
(6, 'birthday', 'kjbljnkönlö', '02/26/2016', '2016-02-04 00:00:00'),
(11, 'sd', 'mathav birthday', '12/12/2015', '0000-00-00 00:00:00'),
(12, 'sindhu', 'hema', '12/12/2016', '2016-02-16 16:19:41'),
(13, 'exam', 'ese', '05/03/2016', '2016-05-27 16:26:09'),
(14, 'sa', 'maddy', '06/16/2016', '2016-06-07 10:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` varchar(2000) NOT NULL,
  `place` varchar(200) NOT NULL,
  `cdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`, `place`, `cdate`) VALUES
(7, 'Hema', 'chemalatha@gamil.com', 'good...!!!', 'dindigul', '2016-05-28 15:06:04'),
(9, 'latha', 'latha@gmil.com', 'awesome....!!!!', 'dindigul', '2016-05-28 15:15:17'),
(10, 'maddy', 'maddy@gmail.com', 'super.....!!!!!!', 'palani', '2016-05-28 15:26:45'),
(11, 'prema', 'prema@gmail.com', 'good...!!!', 'cnp', '2016-05-28 15:37:05'),
(12, 'sindhu', 'sindhu@gmail.com', 'nice..!!!!!!', 'gri', '2016-05-28 15:37:39'),
(14, 'mathavaprakash', 'maddy@gmail.com', 'well done team.. great work.. keep it up...', 'gandhigram', '2016-06-05 20:54:14'),
(15, 'Ram Kumar', 'ram@gmail.com', 'Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.', 'Mumbai', '2016-06-06 08:43:27'),
(16, 'Ram Kumar', 'ram@gmail.com', 'Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.', 'Mumbai', '2016-06-06 08:43:41'),
(17, 'Giri Prasad', 'giri@yahoo.com', 'Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis', 'Delhi', '2016-06-06 08:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `id` int(11) NOT NULL,
  `folder` varchar(100) NOT NULL,
  `img` varchar(500) NOT NULL,
  `des` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id`, `folder`, `img`, `des`) VALUES
(166, 'dcsa-photo', '0', 'GRI photos'),
(168, 'TCE-photo', '0,1', 'TCE intercollege competition on 2016 at 9.30 Am');

-- --------------------------------------------------------

--
-- Table structure for table `mas_staff`
--

CREATE TABLE `mas_staff` (
  `Staff_Key` varchar(20) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Designation` varchar(100) DEFAULT NULL,
  `Role` varchar(20) DEFAULT NULL,
  `Create_Date` datetime DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_staff`
--

INSERT INTO `mas_staff` (`Staff_Key`, `First_Name`, `Last_Name`, `Mobile`, `Email`, `Gender`, `Designation`, `Role`, `Create_Date`, `Modified_Date`, `Password`, `IsActive`) VALUES
('1001', 'Dr.Somasundaram', 'K', '9797979797', 'soms@gmail.com', NULL, NULL, NULL, NULL, NULL, '1111', 1),
('1002', 'Dr.Shanmugavadivu', 'P', '9443736780', 'shanmugavadivu@gmail.com', 'Female', 'hod', NULL, NULL, NULL, '1111', 1),
('1003', 'Dr.Kalavathi', 'P', NULL, 'kalavathi@gmail.com', NULL, NULL, NULL, NULL, NULL, 'GQhCTVm1P2', 1),
('1006', 'Dr.Sivagurunathan', 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1111', 1),
('1007', 'Dr.Senthilkumaran', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mas_students`
--

CREATE TABLE `mas_students` (
  `Student_Key` bigint(20) NOT NULL,
  `Staff_Key` bigint(20) DEFAULT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Address` text,
  `batch` int(11) NOT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Create_Date` datetime DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_students`
--

INSERT INTO `mas_students` (`Student_Key`, `Staff_Key`, `First_Name`, `Last_Name`, `Mobile`, `Email`, `Gender`, `Address`, `batch`, `Password`, `Create_Date`, `Modified_Date`, `IsActive`) VALUES
(13322001, NULL, 'praveen paul', 'A', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322002, NULL, 'Antonsamy', 'A', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322003, NULL, 'Arunpandi', 'S', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322004, NULL, 'Jeyashree', 'C', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322005, NULL, 'Muniyandi', 'K', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322006, NULL, 'Thulasiram', 'R', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322007, NULL, 'Athishoba', 'T', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322010, NULL, 'Selvamurugan', 'S', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322011, NULL, 'Prasannakumari', 'S', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322012, NULL, 'Anitha', 'T', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322013, NULL, 'Sivaranjani', '', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322014, NULL, 'Dhanidahran', 'V', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322015, NULL, 'Thangeswari', 'S', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322016, NULL, 'Sumithr', 'P', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322020, NULL, 'Shanmuga priya', 'M', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(13322021, NULL, 'sangil raja', 'P', NULL, NULL, NULL, NULL, 13322, '1111', NULL, NULL, 1),
(14321001, NULL, 'Saravana', 'Kumar', NULL, NULL, NULL, NULL, 14321, '1111', NULL, NULL, 1),
(14321002, NULL, 'Vaishnava', 'Praba', NULL, NULL, NULL, NULL, 14321, '1111', NULL, NULL, 1),
(14322002, NULL, 'jeevitha', 'R', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322003, NULL, 'vignesh', 'M', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322004, NULL, 'Balaji', 'K.R', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322005, NULL, 'GunaJohnsurani', 'J', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322006, 1001, 'Swathi', 'C', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322007, NULL, 'Geetha', 'S', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322008, NULL, 'Ramalakshmi', 'K', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322009, NULL, 'Gayathri', 'S', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322010, NULL, 'Sasikumar', 'N', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322011, NULL, 'Vaishnavi', 'P', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322013, 1002, 'Mathava Prakash', 'A', '7871270232', 'mathavaprakash.apac@gmail.com', 'Male', NULL, 14322, '1111', '2016-01-15 00:00:00', '2016-01-15 00:00:00', 1),
(14322014, 1002, 'Naganadhini', 'N', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322016, NULL, 'Priyadharsini', 'S', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322017, NULL, 'Gopika', 'S', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322019, NULL, 'Abraham', 'D', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322020, NULL, 'Mahalingam', 'M', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322021, 1212, 'prema', 'p', '8122868615', 'prema@gmail.com', 'Female', 'cnp\r\ndgl', 14322, '1111', '2015-12-01 00:00:00', '2016-05-19 00:00:00', 1),
(14322023, NULL, 'Divya', 'V', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322024, NULL, 'Suganya', 'R', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322025, NULL, 'Haritha', 'P', NULL, NULL, NULL, NULL, 14322, '1111', NULL, NULL, 1),
(14322028, 1002, 'Hema', 'Latha', '7639700830', 'chemalathacnp94@gmail.com', 'Female', NULL, 14322, '1111', '2016-01-16 00:00:00', '2016-01-16 00:00:00', 1),
(15321001, NULL, 'Pavithra', 'S', '7871270230', 'mathavaprakash.gri@gmail.com', 'Female', NULL, 15321, '1111', NULL, NULL, 1),
(15321002, NULL, 'Sasi', 'M', NULL, NULL, NULL, NULL, 15321, '1111', NULL, NULL, 1),
(15321004, NULL, 'Rajalakshmi', 'H', NULL, NULL, NULL, NULL, 15321, '1111', NULL, NULL, 1),
(15321005, NULL, 'Revathi', 'T.S', NULL, NULL, NULL, NULL, 15321, '1111', NULL, NULL, 1),
(15321006, NULL, 'Sangeetha priya', 'G', NULL, NULL, NULL, NULL, 15321, '1111', NULL, NULL, 1),
(15321013, NULL, 'Najib isaaq kani', 'A', NULL, NULL, NULL, NULL, 15321, '1111', NULL, NULL, 1),
(15321014, NULL, 'Vigneshwaran', 'K', NULL, NULL, NULL, NULL, 15321, '1111', NULL, NULL, 1),
(15321015, NULL, 'Tony amarnath', 'J', NULL, NULL, NULL, NULL, 15321, '1111', NULL, NULL, 1),
(15322001, NULL, 'Sonai Muthu', 'S', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322002, NULL, 'Ravi', 'Krishna', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322003, NULL, 'Priya', 'Mani', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322004, NULL, 'Swathi Priya', 'P R', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322005, NULL, 'Kamatchi Chitra', 'M', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322007, NULL, 'Manikandan', 'V', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322008, NULL, 'Arun Kumar', 'R', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322009, NULL, 'Dhamodharan', 'T', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322010, NULL, 'Rajalakshmi Praveena', 'R', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322011, NULL, 'Jesicynthiya', 'D', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322012, NULL, 'Kavinilavu', 'A', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322013, NULL, 'Prabu', 'N', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322014, NULL, ' Nathiya', 'N', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322015, NULL, 'Gopala Krishnan', 'G', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322016, NULL, 'Marutha Pandi', 'K', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322017, NULL, 'Ramzan Froza', 'P', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322018, NULL, 'Ashok', 'R', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(15322020, NULL, 'Aathi Lakshmi', 'N', NULL, NULL, NULL, NULL, 15322, '1111', NULL, NULL, 1),
(16321001, NULL, 'Karthi', 'S', NULL, NULL, NULL, NULL, 16321, '1111', NULL, NULL, 1),
(16321002, NULL, 'Mathava', 'Prakash', NULL, NULL, NULL, NULL, 16321, '1111', NULL, NULL, 1),
(16322001, NULL, 'janaki', 's', '9034785621', 'jan@gmail.com', 'Female', NULL, 16322, '1111', NULL, NULL, 1),
(16322002, NULL, 'Pushpa', 'latha', NULL, NULL, NULL, NULL, 16322, '1111', NULL, NULL, 1),
(16322003, NULL, 'Thilshat barveen', 'A', NULL, NULL, NULL, NULL, 16322, '1111', NULL, NULL, 1),
(16322004, NULL, 'Nandhini', 'S', NULL, NULL, NULL, NULL, 16322, '1111', NULL, NULL, 1),
(16322005, NULL, 'Nandhini', 'M', NULL, NULL, NULL, NULL, 16322, '1111', NULL, NULL, 1),
(16322006, NULL, 'Yogalakshmi', 'P', NULL, NULL, NULL, NULL, 16322, '1111', NULL, NULL, 1),
(16322007, NULL, 'Tamilmani', 'N', NULL, NULL, NULL, NULL, 16322, '1111', NULL, NULL, 1),
(16322008, NULL, 'Mathankumar', 'G', NULL, NULL, NULL, NULL, 16322, '1111', NULL, NULL, 1),
(16322010, NULL, 'Sri bharathi', 'D', NULL, NULL, NULL, NULL, 16322, '1111', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `userid` bigint(10) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `passWord` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`userid`, `userName`, `passWord`) VALUES
(1, 'sindhu', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notes_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `batch` int(11) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `title` varchar(30) NOT NULL,
  `post_date` varchar(20) NOT NULL,
  `doc_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notes_id`, `group_id`, `batch`, `staff_id`, `title`, `post_date`, `doc_path`) VALUES
(321103, 201608, 16322, 1002, 'Basics of C language', '1464878713', 'lectures/Tree View.zip'),
(321104, 201601, 14322, 1002, 'IP Note 1', '1464920979', 'lectures/Pointers.pdf'),
(321105, 201608, 16322, 1002, 'C Programming note 1', '1464921102', 'lectures/File Management.pdf'),
(321106, 201615, 16322, 1001, 'CO Chapter 1', '1464921233', 'lectures/Character Arrays-.pdf'),
(321107, 201603, 14322, 1006, 'Client Server ch1', '1464921335', 'lectures/User Defined Functions.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `operator_dcsap`
--

CREATE TABLE `operator_dcsap` (
  `userid` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `IsActive` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator_dcsap`
--

INSERT INTO `operator_dcsap` (`userid`, `fname`, `lname`, `gender`, `mobile`, `email`, `password`, `IsActive`) VALUES
('1001', 'pp', 'pp', 'Female', 9898765454, 'pp@gmail.com', 'pp', 1),
('10011', 'ss', 'ss', 'Female', 9098787654, 'lkfv@gmail.com', 'ss', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` bigint(20) NOT NULL,
  `question` varchar(200) NOT NULL,
  `a` varchar(30) NOT NULL,
  `b` varchar(30) NOT NULL,
  `c` varchar(30) NOT NULL,
  `d` varchar(30) NOT NULL,
  `answer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `question`, `a`, `b`, `c`, `d`, `answer`) VALUES
(16021601, 'Love@ Facebook is written by', 'Chetan Bhagat ', 'Anurag Mathu ', 'Nikitha Singh ', 'Hindon Sengupta', 'c'),
(16021602, 'Convert this into binary numbers (11100111)2=()16', '(E7)16', '(E6)2', '(E6)8', 'none of the above', 'a'),
(16021603, 'If all 6 are replaced by 9 ,then the  algebraic sum of all numbers from 1 to 100 varies by', '320', '420', '300', '330', 'd'),
(16021604, 'If  VXUPLVH is written as SURMISE, what is SHDVD?', 'PEACE ', 'PAESE', 'PEASE ', 'PAECE', 'c'),
(16021605, 'The first operating system used in microprocessor is', 'CPIM  ', 'DOS  ', 'ZENIX  ', 'MUTICS', 'a'),
(16021606, 'If â€˜+â€™ means division ,â€™-â€˜ means multiplication, â€˜*â€™ means minus,â€™+â€™ means plus then (280+10*20)-8/6', '70', '112', '-392', 'none of these', 'a'),
(16021607, 'Can ROM be used as stack  ', 'yes', 'no', 'sometimes yes', 'sometimes no', 'b'),
(16021608, 'who was recently awarded with the Asian of the year 2014 by the Straits Times?', 'Chinese president Xi Jinping ', 'Japanese prime minister shinzo', 'Myanmar president  the in Sein', 'Indian prime minister Narendra', 'd'),
(16021609, 'Different versions of UNIX refered to as ', 'Flavors ', 'UAP', 'Torvalds ', 'Applications', 'a'),
(16021610, 'Python is ', 'Dynamically object oriented', 'statically non object oriented', 'statically object oriented ', 'dynamically non object oriente', 'a'),
(16021701, 'eeeeeeeeeee', 'fff', 'sd', 'sdsd', 'dsds', 'a'),
(16021702, 'adjlsd', 'iosf', 'sfnjls', 'sd', 'sdlsd', 'b'),
(16021703, 'eroir', 'sdsd', 'fslf', 'yurs', 'lksd', 'd'),
(16021901, 'Micro processor is a..?', 'Scripting Language', 'OOP', 'OOA', 'Programming Language', 'a'),
(16021902, 'MP is a', 'Micro processor', 'Micro Controller', 'Micro Second', 'none', 'a'),
(16021903, 'MB is ', 'Mega Bit', 'Mega Byte', 'Mass Bit', 'Mass Byte', 'b'),
(16022001, '2+2=?', '5', '4', '6', '3', 'b'),
(16022002, '5-2=?', '3', '2', '1', '0', 'a'),
(16022003, '10*10=?', '10', '20', '100', '50', 'c'),
(16022101, '5*5=?', '5', '10', '15', '25', 'd'),
(16022102, '10/2=?', '5', '2', '10', '15', 'a'),
(16022501, 'java is a', 'OOPS', 'non OOP', 'object based', 'none', 'a'),
(16022502, 'java have feature ', 'aaaa', 'bbbbb', 'cccc', 'platform independent', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `test_id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT 'IQ Test',
  `Staff_Key` bigint(20) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '30',
  `batch` bigint(20) NOT NULL DEFAULT '1000',
  `group_id` bigint(20) NOT NULL,
  `total_questions` int(11) NOT NULL DEFAULT '10',
  `start_time` varchar(20) NOT NULL,
  `end_time` varchar(20) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`test_id`, `title`, `Staff_Key`, `duration`, `batch`, `group_id`, `total_questions`, `start_time`, `end_time`, `active`) VALUES
(160216, 'interface 16 quiz prelims', 1001, 1, 14322, 201601, 10, '2016-05-22T08:00', '2016-05-30T08:00', 1),
(160219, 'Micro processor', 1006, 3, 14322, 201602, 3, '2016-05-22T08:00', '2016-05-31T10:00', 1),
(160220, 'quiz 1 GK', 1002, 3, 14322, 201601, 3, '2016-05-24T13:00', '2016-06-15T00:00', 1),
(160221, 'quiz 1 GK', 1002, 2, 15322, 201605, 2, '2016-05-24T00:00', '2016-05-30T22:00', 1),
(160224, 'Computer Organization quiz', 1001, 1, 15322, 201605, 2, '2016-06-01T00:00', '2016-06-30T12:59', 1),
(160225, 'Java Programming', 1001, 1, 14322, 201601, 2, '2016-06-01T00:00', '2016-06-30T00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_assignments`
--

CREATE TABLE `std_assignments` (
  `Std_Assignment_Key` bigint(20) NOT NULL,
  `Assignment_Key` bigint(20) NOT NULL,
  `Group_ID` bigint(20) NOT NULL,
  `Student_Key` bigint(20) NOT NULL,
  `Std_Assignment_Path` text NOT NULL,
  `Marks_Assigned` int(11) NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Modified_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_assignments`
--

INSERT INTO `std_assignments` (`Std_Assignment_Key`, `Assignment_Key`, `Group_ID`, `Student_Key`, `Std_Assignment_Path`, `Marks_Assigned`, `Create_Date`, `Modified_Date`) VALUES
(3, 100001, 201601, 14322013, 'uploads/64_HR_Questions_1_.pdf', 5, '2016-03-15 16:15:26', '2016-03-15 16:15:26'),
(4, 6, 201601, 14322013, 'uploads/Presentation1.pptx', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 7, 160202, 14322013, 'uploads/Presentation1.pptx', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 9, 201601, 14322013, 'uploads/c.pdf', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 160202, 14322013, 'uploads/c.pdf', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 9, 201601, 14322013, 'uploads/niyantra_2016_rulebook_guidelines.pdf', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stf_assignments`
--

CREATE TABLE `stf_assignments` (
  `Assignment_Key` bigint(20) NOT NULL,
  `Staff_Key` bigint(20) NOT NULL,
  `Group_ID` bigint(20) NOT NULL,
  `Assignment_Name` varchar(30) NOT NULL,
  `Assignment_Desc` text,
  `Create_Date` datetime NOT NULL,
  `Modified_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stf_assignments`
--

INSERT INTO `stf_assignments` (`Assignment_Key`, `Staff_Key`, `Group_ID`, `Assignment_Name`, `Assignment_Desc`, `Create_Date`, `Modified_Date`) VALUES
(5, 1212, 0, 'asas', 'compression methods', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1212, 201601, 'uuu', 'rrrrrr', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1515, 160202, 'IP', 'compression methods', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1515, 160202, 'IP', 'compression methods', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1002, 201601, 'abc', 'sdsfdg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1002, 201602, 'psvintpro01', 'chapter 4 and 5', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stf_lectures`
--

CREATE TABLE `stf_lectures` (
  `Lecture_key` bigint(20) NOT NULL,
  `Group_ID` int(11) NOT NULL,
  `Staff_Key` bigint(20) NOT NULL,
  `Lecture_Name` varchar(30) NOT NULL,
  `Lecture_Desc` text NOT NULL,
  `Lecture_path` varchar(100) NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Modified_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stf_lectures`
--

INSERT INTO `stf_lectures` (`Lecture_key`, `Group_ID`, `Staff_Key`, `Lecture_Name`, `Lecture_Desc`, `Lecture_path`, `Create_Date`, `Modified_Date`) VALUES
(1213, 160202, 1212, 'gtee', 'jdshfj', 'lectures/syl mca.pdf', '2016-02-24 11:39:16', '2016-02-24 11:39:16'),
(54105, 160202, 1212, 'java', 'jdshfj', 'lectures/Let_Us_C_-_Yashwant_Kanetkar.pdf', '2016-03-02 13:47:02', '2016-03-02 13:47:02'),
(54108, 160202, 1212, 'txt', 'jdshfj', 'lectures/Personality Color Gold.pdf', '2016-03-02 16:05:15', '2016-03-02 16:05:15'),
(54112, 0, 1212, 'ip', 'jdshfj', 'lectures/Presentation1.pptx', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54114, 201601, 1212, 'image', 'resolution', 'lectures/Presentation1.pptx', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54115, 201601, 1212, 'nw', 'routing', 'lectures/BSP-TREE METHOD.pptx', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54116, 201601, 1212, 'os', 'sched', 'lectures/syl mca.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54117, 201601, 1212, 'demo upload', 'operating system', 'lectures/c.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54118, 201601, 1212, 'os demo', 'deadlock', 'lectures/CPPQA.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54119, 201601, 1002, 'hai', 'nothing', 'lectures/If no activity for 15 minutes, display an alert on web page, and then either continue or lo', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `study_group`
--

CREATE TABLE `study_group` (
  `Group_ID` bigint(20) NOT NULL,
  `Staff_Key` bigint(20) NOT NULL,
  `Subject` varchar(30) NOT NULL,
  `Batch` varchar(15) NOT NULL,
  `semester` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `study_group`
--

INSERT INTO `study_group` (`Group_ID`, `Staff_Key`, `Subject`, `Batch`, `semester`) VALUES
(160202, 1003, 'Web Design', '14322', '4'),
(201601, 1002, 'Image Processing', '14322', '4'),
(201602, 1002, 'Internet Programming', '14322', '5'),
(201603, 1006, 'Client Server', '14322', '5'),
(201604, 1003, 'IT for rural Development', '14322', '5'),
(201605, 1003, 'Operating System', '15322', '3'),
(201606, 1007, 'OOAD', '15322', '3'),
(201607, 1006, 'Micro processor', '15322', '3'),
(201608, 1002, 'Programming in C', '16322', '1'),
(201609, 1001, 'Computer Organization', '16322', '1'),
(201610, 1004, 'DAA', '16322', '1'),
(201611, 1001, 'Java', '15321', '3'),
(201612, 1006, 'Operating System', '15321', '3'),
(201613, 1005, 'Computer Networks', '15321', '3'),
(201614, 1005, 'Programming in C', '16321', '1'),
(201615, 1001, 'Computer Organization', '16321', '1'),
(201616, 1005, 'Visual Programming', '16321', '1'),
(201617, 1515, 'image processing', '', '4');

-- --------------------------------------------------------

--
-- Table structure for table `stud_attend`
--

CREATE TABLE `stud_attend` (
  `id` int(10) NOT NULL,
  `rollno` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `batch` int(10) NOT NULL,
  `sem` int(2) NOT NULL,
  `month` varchar(4) NOT NULL,
  `subjects` varchar(6000) NOT NULL,
  `date` varchar(1200) NOT NULL,
  `dayvalue` varchar(1200) NOT NULL,
  `overall` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_attend`
--

INSERT INTO `stud_attend` (`id`, `rollno`, `name`, `batch`, `sem`, `month`, `subjects`, `date`, `dayvalue`, `overall`) VALUES
(1, 15322029, 'nibilavarshini', 15322, 2, 'Jun', 'sub1|sub2|sub3|sub4|sub5|sub6||c|mfc|ac|dfs|c|co||', '2016-06-01|2016-06-06|', '1|1|1|1|1|1||1|1|1|1|1|1||', '1|1|'),
(2, 15322032, 'prabhakaran', 15322, 2, 'Jun', 'sub1|sub2|sub3|sub4|sub5|sub6||c|mfc|ac|dfs|c|co||', '2016-06-01|2016-06-06|', '1|1|1|1|1|1||1|1|1|0|1|1||', '1|1|'),
(3, 15322034, 'swathipriya', 15322, 2, 'Jun', 'sub1|sub2|sub3|sub4|sub5|sub6||c|mfc|ac|dfs|c|co||', '2016-06-01|2016-06-06|', '1|1|1|1|1|1||1|1|0|1|1|1||', '1|1|'),
(4, 15322045, 'karthigaiselvan', 15322, 2, 'Jun', 'sub1|sub2|sub3|sub4|sub5|sub6||c|mfc|ac|dfs|c|co||', '2016-06-01|2016-06-06|', '1|1|1|1|1|1||1|1|1|1|0|1||', '1|1|'),
(5, 15322078, 'praveenkumar', 15322, 2, 'Jun', 'sub1|sub2|sub3|sub4|sub5|sub6||c|mfc|ac|dfs|c|co||', '2016-06-01|2016-06-06|', '1|1|1|1|1|1||1|0|1|1|1|1||', '1|1|'),
(6, 15322029, 'nibilavarshini', 15322, 2, 'May', 'c|mfc|ac|dfs|c|co||c|mfc|ac|dfs|c|co||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-23|2016-05-30|2016-05-31|', '1|0|1|1|1|1||1|1|1|1|1|1||1|0|0|0|0|0||', '1|1|1|'),
(7, 15322032, 'prabhakaran', 15322, 2, 'May', 'c|mfc|ac|dfs|c|co||c|mfc|ac|dfs|c|co||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-23|2016-05-30|2016-05-31|', '1|1|0|1|1|1||1|1|1|1|1|1||1|0|0|0|0|0||', '1|1|1|'),
(8, 15322034, 'swathipriya', 15322, 2, 'May', 'c|mfc|ac|dfs|c|co||c|mfc|ac|dfs|c|co||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-23|2016-05-30|2016-05-31|', '1|1|1|0|1|1||1|1|1|1|1|1||1|0|0|0|0|0||', '1|1|1|'),
(9, 15322045, 'karthigaiselvan', 15322, 2, 'May', 'c|mfc|ac|dfs|c|co||c|mfc|ac|dfs|c|co||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-23|2016-05-30|2016-05-31|', '1|1|1|1|0|1||1|1|1|1|1|1||1|0|0|0|0|0||', '1|1|1|'),
(10, 15322078, 'praveenkumar', 15322, 2, 'May', 'c|mfc|ac|dfs|c|co||c|mfc|ac|dfs|c|co||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-23|2016-05-30|2016-05-31|', '1|1|1|1|1|0||1|1|1|1|1|1||1|0|0|0|0|0||', '1|1|1|'),
(23, 14322002, 'vigneshr', 14322, 4, 'May', 'sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-10|2016-05-17|2016-05-31|', '1|1|1|1|1|1||1|0|1|0|0|0||1|1|1|1|1|1||', '1|0|0|'),
(24, 14322003, 'jeevithar', 14322, 4, 'May', 'sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-10|2016-05-17|2016-05-31|', '1|1|1|1|1|1||1|0|1|0|0|0||1|1|1|1|1|1||', '1|1|1|'),
(25, 14322004, 'balajik', 14322, 4, 'May', 'sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-10|2016-05-17|2016-05-31|', '1|1|1|1|1|1||1|0|1|0|0|0||1|1|1|1|1|1||', '1|0|0|'),
(26, 14322013, 'MathavaprakashAmutharaj', 14322, 4, 'May', 'sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-10|2016-05-17|2016-05-31|', '1|1|1|1|1|0||1|0|1|0|0|0||1|1|1|1|1|0||', '0|1|0|'),
(28, 14322023, 'hemalatha', 14322, 4, 'May', 'sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-10|2016-05-17|2016-05-31|', '1|1|1|1|1|1||1|0|1|0|0|0||1|1|1|1|1|1||', '1|0|1|'),
(29, 14322028, 'HemaLatha', 14322, 4, 'May', 'sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-10|2016-05-17|2016-05-31|', '1|1|1|1|1|1||1|0|1|0|0|0||1|1|1|1|1|0||', '1|1|0|'),
(30, 14322029, 'sindhubairavi', 14322, 4, 'May', 'sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-10|2016-05-17|2016-05-31|', '1|1|1|1|1|1||1|0|1|0|0|0||1|1|1|1|1|1||', '1|0|1|'),
(31, 14322056, 'maruthupandi', 14322, 4, 'May', 'sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-10|2016-05-17|2016-05-31|', '1|1|1|1|1|1||1|0|1|0|0|0||1|1|1|1|1|1||', '1|1|1|'),
(32, 14322059, 'swathic', 14322, 4, 'May', 'sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-10|2016-05-17|2016-05-31|', '1|1|1|1|1|1||1|0|1|0|0|0||1|1|1|1|1|1||', '1|0|1|'),
(33, 14322065, 'sasikumar', 14322, 4, 'May', 'sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-10|2016-05-17|2016-05-31|', '1|1|1|1|1|1||1|0|1|0|0|0||1|1|1|1|1|1||', '1|1|1|'),
(34, 14322078, 'susilar', 14322, 4, 'May', 'sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||sub1|sub2|sub3|sub4|sub5|sub6||', '2016-05-10|2016-05-17|2016-05-31|', '1|1|1|1|1|1||1|0|1|0|0|0||1|1|1|1|1|1||', '1|0|1|');

-- --------------------------------------------------------

--
-- Table structure for table `temp_report_assign`
--

CREATE TABLE `temp_report_assign` (
  `sno` int(11) NOT NULL,
  `reg_no` bigint(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `submit_date` varchar(20) NOT NULL,
  `marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_report_quiz`
--

CREATE TABLE `temp_report_quiz` (
  `sno` int(11) NOT NULL,
  `reg_no` bigint(20) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `st_time` varchar(20) DEFAULT NULL,
  `end_time` varchar(20) DEFAULT NULL,
  `time_taken` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_report_quiz`
--

INSERT INTO `temp_report_quiz` (`sno`, `reg_no`, `name`, `st_time`, `end_time`, `time_taken`, `marks`) VALUES
(1, 14322013, 'Mathava Prakash A', '1465291145', '1465291205', 60, 1),
(2, 14322005, 'GunaJohnsurani J', '1465488431', '1465488491', 60, 0),
(3, 14322009, 'Gayathri S', '1465489404', '1465489414', 10, 0),
(4, 14322002, 'jeevitha R', '1465489825', '1465489885', 60, 2),
(5, 14322006, 'Swathi C', '1465551474', '1465551534', 60, 2),
(6, 14322014, 'Naganadhini N', '1465561477', '1465561537', 60, 2),
(7, 0, '', '1465561845', '1465561905', 60, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` bigint(20) NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `Student_Key` bigint(20) NOT NULL,
  `duration` int(11) NOT NULL,
  `marks` int(11) DEFAULT '0',
  `start_time` varchar(20) NOT NULL,
  `end_time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `quiz_id`, `Student_Key`, `duration`, `marks`, `start_time`, `end_time`) VALUES
(5414, 160218, 14322013, 1, 10, '1463659669', '1463659702'),
(5415, 160219, 14322013, 3, 3, '1463902904', '1463902941'),
(5416, 160219, 14322028, 3, 0, '1463902982', '1463903074'),
(5424, 160220, 14322013, 3, 3, '1464413340', '1464413374'),
(5432, 160216, 14322013, 1, 5, '1464425804', '1464425831'),
(5433, 160220, 14322028, 3, 2, '1464425919', '1464425947'),
(5438, 160219, 14322021, 3, 0, '1464427647', '1464427666'),
(5439, 160220, 14322021, 3, 3, '1464427910', '1464427921'),
(5440, 160216, 14322021, 1, 6, '1464428006', '1464428066'),
(5442, 160216, 14322028, 1, 6, '1464451514', '1464451574'),
(5443, 160225, 14322013, 1, 1, '1465291145', '1465291205'),
(5444, 160225, 14322005, 1, 0, '1465488431', '1465488491'),
(5445, 160225, 14322009, 1, 0, '1465489404', '1465489414'),
(5446, 160220, 14322009, 3, 0, '1465489697', '1465489701'),
(5447, 160225, 14322002, 1, 2, '1465489825', '1465489885'),
(5448, 160220, 14322006, 3, 2, '1465551388', '1465551405'),
(5449, 160225, 14322006, 1, 2, '1465551474', '1465551534'),
(5450, 160220, 14322002, 3, 2, '1465552329', '1465552509'),
(5451, 160225, 14322014, 1, 2, '1465561477', '1465561537'),
(5452, 160220, 14322014, 3, 2, '1465561593', '1465561611'),
(5453, 160225, 0, 1, 0, '1465561845', '1465561905');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `class` varchar(20) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `1` varchar(20) NOT NULL,
  `2` varchar(20) NOT NULL,
  `3` varchar(20) NOT NULL,
  `4` varchar(20) NOT NULL,
  `5` varchar(20) NOT NULL,
  `6` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `class`, `sem`, `day`, `1`, `2`, `3`, `4`, `5`, `6`) VALUES
(35, 'Mca', 'I', 'Tuesday', 'bbb1', 'aaa1', 'fff1', 'ddd1', 'ccc1', 'eee1'),
(36, 'Mca', 'I', 'Wednesday', 'eee', 'aaa', 'ggg', 'bbb', 'ddd', 'ccc'),
(38, 'Mca', 'I', 'Thurday', 'we', 'twq', 'awr', 'fdg', 'sd', 'rtj'),
(39, 'Mca', 'I', 'Friday', 'wt', 'gh', 'sfd', 'rty', 'dg', 'etyu'),
(40, 'Msc(IT)', 'I', 'Monday', 'fgj', 'dfhj', 'dfgh', 'rty', 'ry', 'sdf'),
(41, 'Msc(IT)', 'I', 'Tuesday', 'tyu', 'ryi', 'fgj', 'rti', 'wty', 'dfh'),
(42, 'Msc(IT)', 'I', 'Wednesday', 'rty', 'rth', 'dh', 'ery', 'werg', 'qet'),
(44, 'Msc(IT)', 'I', 'Thurday', 'yuk', 'eyt', 'wert', 'dfgb', 'ewrt', 'hdf'),
(45, 'Msc(IT)', 'I', 'Friday', 'ewrty', 'ery', 'wsth', 'ehr', 'wt', 'yuyy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `assign_submit`
--
ALTER TABLE `assign_submit`
  ADD PRIMARY KEY (`assign_sno`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`class`);

--
-- Indexes for table `eventcalendar`
--
ALTER TABLE `eventcalendar`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_staff`
--
ALTER TABLE `mas_staff`
  ADD PRIMARY KEY (`Staff_Key`);

--
-- Indexes for table `mas_students`
--
ALTER TABLE `mas_students`
  ADD PRIMARY KEY (`Student_Key`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notes_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `std_assignments`
--
ALTER TABLE `std_assignments`
  ADD PRIMARY KEY (`Std_Assignment_Key`);

--
-- Indexes for table `stf_assignments`
--
ALTER TABLE `stf_assignments`
  ADD PRIMARY KEY (`Assignment_Key`,`Staff_Key`);

--
-- Indexes for table `stf_lectures`
--
ALTER TABLE `stf_lectures`
  ADD PRIMARY KEY (`Lecture_key`);

--
-- Indexes for table `study_group`
--
ALTER TABLE `study_group`
  ADD PRIMARY KEY (`Group_ID`);

--
-- Indexes for table `stud_attend`
--
ALTER TABLE `stud_attend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_report_quiz`
--
ALTER TABLE `temp_report_quiz`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assign_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123505;
--
-- AUTO_INCREMENT for table `assign_submit`
--
ALTER TABLE `assign_submit`
  MODIFY `assign_sno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `eventcalendar`
--
ALTER TABLE `eventcalendar`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notes_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321108;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `test_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160226;
--
-- AUTO_INCREMENT for table `std_assignments`
--
ALTER TABLE `std_assignments`
  MODIFY `Std_Assignment_Key` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `stf_assignments`
--
ALTER TABLE `stf_assignments`
  MODIFY `Assignment_Key` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `stf_lectures`
--
ALTER TABLE `stf_lectures`
  MODIFY `Lecture_key` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54120;
--
-- AUTO_INCREMENT for table `study_group`
--
ALTER TABLE `study_group`
  MODIFY `Group_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201618;
--
-- AUTO_INCREMENT for table `stud_attend`
--
ALTER TABLE `stud_attend`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5454;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
