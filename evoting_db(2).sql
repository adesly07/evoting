-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2022 at 10:58 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evoting_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_reg`
--

CREATE TABLE IF NOT EXISTS `a_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sch_session` varchar(20) NOT NULL,
  `matric_no` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `a_profile` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `a_post` varchar(20) NOT NULL,
  `s_no` varchar(5) NOT NULL,
  `vid` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_type` varchar(200) NOT NULL,
  `file_size` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL DEFAULT '',
  `ip` varchar(225) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `a_reg`
--

INSERT INTO `a_reg` (`id`, `sch_session`, `matric_no`, `password`, `name`, `a_profile`, `gender`, `phone`, `a_post`, `s_no`, `vid`, `status`, `file_name`, `file_type`, `file_size`, `date`, `ip`) VALUES
(1, '2021/2022', 'FFMK00', 'c2V1bg==', 'SYLV3ST3R S39N', '<p>NCE 7n C1mp9t3r Sc73nc3/Phys7cs<br />BSc(Ed) C1mp9t3r Sc73nc3 <br />M.Inf.Sc. 7n V73w</p>\r\n<p styl3=\\"t3xt-4l7gn: j9st7fy;\\">If 4 w7s3 m4n r3f9s3s t1 b3 g1v3rn3d by th3 w7sd1m 1f th3 w7s3, th3n h3 w7ll b3 g1v3rn3d by th3 w7sd1m 1f th3 f11ls</p>', 'Male', '08064405936', 'President', '1', '1', 'Allow', '0mary adedigba.jpg', 'image/jpeg', '34053', '2022-03-09', '127.0.0.1'),
(2, '2021/2022', 'FFMK0K', 'amlt', 'J7M7 ST3PH3N', '<p>NCE 7n C1mp9t3r Sc73nc3 ? Phys7cs</p>\r\n<p>BSc(Ed) C1mp9t3r Sc73nc3</p>\r\n<p>I w7ll b3 p1st7ng my m4n7f3st1 s11n</p>', 'Male', '08062333022', 'President', '1', '2', 'Allow', '0passport2.jpg', 'image/jpeg', '3221', '2022-03-09', '127.0.0.1'),
(3, '2021/2022', 'FFMKX0', 'MTIzNDU=', '1Y7NL1Y3 M4RY', '', 'Female', '08059605896', 'Vice President', '2', '1', 'Allow', '0user.png', 'image/png', '6402', '2022-03-17', '127.0.0.1'),
(4, '2021/2022', 'FFMKXK', 'MTIzNDU=', '7B7K9NL3 S1L4', '', 'Male', '08027736737', 'Vice President', '2', '2', 'Allow', '0user.png', '', '', '2022-03-17', '127.0.0.1'),
(5, '2021/2022', 'FFMKXF', 'MTIzNDU=', 'R4SH33D 4L4B7', '', 'Male', '09027736773', 'Vice President', '2', '3', 'Allow', '0user.png', '', '', '2022-03-17', '127.0.0.1'),
(6, '2021/2022', 'FFMKXZ', 'MTIzNDU=', '1L4W4L3 39N7C3', '', 'Female', '07026637638', 'Secretary', '3', '1', 'Allow', '0user.png', '', '', '2022-03-17', '127.0.0.1'),
(7, '2021/2022', 'FFMKXM', 'MTIzNDU=', '4D3W1L3 4B7MB1L4', '', 'Female', '07027783839', 'Secretary', '3', '2', 'Allow', '0user.png', '', '', '2022-03-17', '127.0.0.1'),
(8, '2021/2022', 'FFMKXX', 'MTIzNDU=', 'M4K7ND3 1L9S3Y7', '', 'Male', '08089883883', 'Assistant Secretary', '4', '1', 'Allow', '0user.png', '', '', '2022-03-17', '127.0.0.1'),
(9, '2021/2022', 'FFMKX6', 'MTIzNDU=', '1G9NW4L3 1L9W4Y3M7S7', '', 'Female', '08037883378', 'Assistant Secretary', '4', '2', 'Allow', '0user.png', '', '', '2022-03-17', '127.0.0.1'),
(10, '2021/2022', 'FFMKX7', 'MTIzNDU=', 'B4B4L1L4 C4R1L7N3', '', 'Female', '09076736738', 'President', '1', '3', 'Allow', 'user.png', '', '', '2022-03-17', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `fid` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `m_comment` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `fid`, `name`, `comment`, `m_comment`, `ip`, `date`, `time`) VALUES
(1, '3', '4D3D7GB4 SYLV3ST3R S39N', 'W3 4r3 3xp3ct7ng 7t my pr3s7d3nt.', 'FFMKM8', '127.0.0.1', '2022-03-16', '15:11:18'),
(2, '3', '4D3D7GB4 SYLV3ST3R S39N', 'Th4t\\''s my Pr3s7d3nt', 'FFMKM8', '127.0.0.1', '2022-03-16', '15:13:22'),
(3, '3', 'M4RY Y3W4ND3', 'G11d t1 h34r', 'FFMKM9', '127.0.0.1', '2022-03-18', '14:36:05'),
(4, '3', 'M4RY Y3W4ND3', 'K9d1s t1 y19 my pr3s7d3nt t1 b3', 'FFMKM9', '127.0.0.1', '2022-03-18', '14:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `create_login`
--

CREATE TABLE IF NOT EXISTS `create_login` (
  `cid` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `t_section` varchar(50) NOT NULL,
  `s_question` varchar(200) NOT NULL,
  `s_answer` varchar(200) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `create_login`
--

INSERT INTO `create_login` (`cid`, `name`, `username`, `password`, `t_section`, `s_question`, `s_answer`) VALUES
(11, 'Sylvester', 'sly', 'c2x5', 'Electoral Representative', 'V0g0VCA3UyBUSDMgTjRNMyAxRiBZMTlSIFNQMTlTMw==', 'TTRSWQ=='),
(13, 'Jimmy', 'jim', 'amlt', 'Electoral Representative', 'WH4T 7S Y19R M1TH3R''S M47D3N N4M3?', '4GB1NY7N'),
(14, 'Administrator', 'admin', 'c2x5', 'Electoral Representative', '', ''),
(16, 'Amy Adedigba', 'amy', 'YW15', 'Election Observer', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `current`
--

CREATE TABLE IF NOT EXISTS `current` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `sch_session` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `period` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `current`
--

INSERT INTO `current` (`id`, `sch_session`, `status`, `period`) VALUES
(1, '2021/2022', 'RELEASED', 'REGISTRATION');

-- --------------------------------------------------------

--
-- Table structure for table `e_access`
--

CREATE TABLE IF NOT EXISTS `e_access` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `a_code` varchar(50) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `cdate` varchar(20) NOT NULL,
  `ctime` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `e_access`
--

INSERT INTO `e_access` (`id`, `a_code`, `created_by`, `ip`, `cdate`, `ctime`) VALUES
(1, '05431', 'Sylvester', '127.0.0.1', '2022-03-19', '10:58:10'),
(2, '96823', 'Sylvester', '127.0.0.1', '2022-03-19', '13:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `e_list`
--

CREATE TABLE IF NOT EXISTS `e_list` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `matric_no` varchar(20) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `sch_session` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `e_list`
--

INSERT INTO `e_list` (`id`, `matric_no`, `s_name`, `sch_session`) VALUES
(1, 'FFMK00', 'Agboola Ayooluwa', '2021/2022'),
(2, 'FFMK0K', 'Abimbola Olowu', '2021/2022'),
(3, 'FFMK0F', 'Bamidele Olurotimi', '2021/2022'),
(4, 'FFMK0Z', 'Ibukun Adeolu', '2021/2022'),
(5, 'FFMK0M', 'Oluwadamilare Ayo', '2021/2022'),
(6, 'FFMK0X', 'Gbolahan Temitope', '2021/2022'),
(7, 'FFMK06', 'Ishola Abidemi', '2021/2022'),
(8, 'FFMK07', 'Oluwole Bisola', '2021/2022'),
(9, 'FFMK08', 'Eyiwumi Adewale', '2021/2022'),
(10, 'FFMKM8', '4D3D7GB4 SYLV3ST3R S39N', '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `fid` int(100) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `matric_no` varchar(50) NOT NULL,
  `sch_session` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `pdate` varchar(20) NOT NULL,
  `ptime` varchar(20) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`fid`, `content`, `created_by`, `matric_no`, `sch_session`, `ip`, `pdate`, `ptime`) VALUES
(1, '<p>L3t\\''s pr3p4r3 t1 c4st 19r v1t3 t1mm1rr1w. I l11k f1rw4rd t1 y19</p>', 'SYLV3ST3R S39N', 'FFMK00', '', '127.0.0.1', '2022-03-23', '18:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `instruction`
--

CREATE TABLE IF NOT EXISTS `instruction` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `starttime` varchar(50) NOT NULL,
  `endtime` varchar(50) NOT NULL,
  `sch_session` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `instruction`
--

INSERT INTO `instruction` (`id`, `starttime`, `endtime`, `sch_session`) VALUES
(4, '2022/03/01 17:10:39', '2022/12/30 20:13', '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `manifesto`
--

CREATE TABLE IF NOT EXISTS `manifesto` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `matric_no` varchar(20) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `manifesto`
--


-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `matric_no` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `s_date` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `matric_no`, `name`, `msg`, `s_date`, `status`) VALUES
(1, 'FFMKM8', '4D3D7GB4 SYLV3ST3R S39N', '<p>&nbsp;I l1v3 th7s 7n7t74t7v3</p>\r\n<p>W3ll d1n3</p>', '2022-03-17', 'READ');

-- --------------------------------------------------------

--
-- Table structure for table `o_name`
--

CREATE TABLE IF NOT EXISTS `o_name` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `s_no` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `o_name`
--

INSERT INTO `o_name` (`id`, `s_no`, `name`) VALUES
(1, '1', 'President'),
(2, '2', 'Vice President'),
(3, '3', 'Secretary'),
(4, '4', 'Assistant Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE IF NOT EXISTS `reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric_no` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `declaration` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_type` varchar(200) NOT NULL,
  `file_size` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL DEFAULT '',
  `ip` varchar(225) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `matric_no`, `name`, `password`, `phone_no`, `email`, `declaration`, `status`, `file_name`, `file_type`, `file_size`, `date`, `ip`) VALUES
(1, 'FFMKM8', '4D3D7GB4 SYLV3ST3R S39N', 'c2x5', '080OGG0D93O', 'adesly07@gmail.com', 'Declared', 'Allow', '0fr2.jpg', 'image/jpeg', '5316', '2022-03-03', '127.0.0.1'),
(2, 'FFMKM9', 'M4RY Y3W4ND3', 'c2x5', '080D9O0D89O', 'maryyewande@gmail.com', 'Declared', 'Allow', '', '', '', '2022-03-04', '127.0.0.1'),
(3, 'FFMKX0', '4MY 4D3D1Y7N', 'amy', '08077889789', 'amy@gmail.com', 'Declared', 'Allow', '', '', '', '2022-03-04', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `matric_no` varchar(200) NOT NULL,
  `v_code` varchar(200) NOT NULL,
  `sch_session` varchar(200) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_post` varchar(200) NOT NULL,
  `vid` varchar(50) NOT NULL,
  `s_no` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `matric_no`, `v_code`, `sch_session`, `a_name`, `a_post`, `vid`, `s_no`, `ip`, `date`, `time`, `status`) VALUES
(1, 'RkZNS004', 'cjluaHhwenU1YTA0bzJpcWt2dG0=', 'MjAyMS8yMDIy', 'U1lMVjNTVDNSIFMzOU4=', 'UHJlc2lkZW50', '1', '1', '127.0.0.1', '2022-03-17', '10:55:19', 'PENDING'),
(2, 'RkZNS004', 'cjluaHhwenU1YTA0bzJpcWt2dG0=', 'MjAyMS8yMDIy', 'N0I3SzlOTDMgUzFMNA==', 'VmljZSBQcmVzaWRlbnQ=', '2', '2', '127.0.0.1', '2022-03-17', '10:55:23', 'PENDING'),
(3, 'RkZNS004', 'cjluaHhwenU1YTA0bzJpcWt2dG0=', 'MjAyMS8yMDIy', 'NEQzVzFMMyA0QjdNQjFMNA==', 'U2VjcmV0YXJ5', '2', '3', '127.0.0.1', '2022-03-17', '10:55:26', 'PENDING'),
(4, 'RkZNS004', 'cjluaHhwenU1YTA0bzJpcWt2dG0=', 'MjAyMS8yMDIy', 'MUc5Tlc0TDMgMUw5VzRZM003Uzc=', 'QXNzaXN0YW50IFNlY3JldGFyeQ==', '2', '4', '127.0.0.1', '2022-03-17', '10:55:28', 'PENDING'),
(5, 'RkZNSzAw', 'MTYzeW1ranAyZDVvaHUwejRiOXc=', 'MjAyMS8yMDIy', 'SjdNNyBTVDNQSDNO', 'UHJlc2lkZW50', '2', '1', '127.0.0.1', '2022-03-17', '13:35:08', 'PENDING'),
(6, 'RkZNSzAw', 'MTYzeW1ranAyZDVvaHUwejRiOXc=', 'MjAyMS8yMDIy', 'MVk3TkwxWTMgTTRSWQ==', 'VmljZSBQcmVzaWRlbnQ=', '1', '2', '127.0.0.1', '2022-03-17', '13:35:12', 'PENDING'),
(7, 'RkZNSzAw', 'MTYzeW1ranAyZDVvaHUwejRiOXc=', 'MjAyMS8yMDIy', 'MUw0VzRMMyAzOU43QzM=', 'U2VjcmV0YXJ5', '1', '3', '127.0.0.1', '2022-03-17', '13:35:16', 'PENDING'),
(8, 'RkZNSzAw', 'MTYzeW1ranAyZDVvaHUwejRiOXc=', 'MjAyMS8yMDIy', 'MUc5Tlc0TDMgMUw5VzRZM003Uzc=', 'QXNzaXN0YW50IFNlY3JldGFyeQ==', '2', '4', '127.0.0.1', '2022-03-17', '13:35:20', 'PENDING'),
(9, 'RkZNS005', 'dnBlN3U2MWtsMDU0bjlmYzNicWk=', 'MjAyMS8yMDIy', 'QjRCNEwxTDQgQzRSMUw3TjM=', 'UHJlc2lkZW50', '3', '1', '127.0.0.1', '2022-03-18', '14:42:40', 'PENDING'),
(10, 'RkZNS005', 'dnBlN3U2MWtsMDU0bjlmYzNicWk=', 'MjAyMS8yMDIy', 'UjRTSDMzRCA0TDRCNw==', 'VmljZSBQcmVzaWRlbnQ=', '3', '2', '127.0.0.1', '2022-03-18', '14:42:49', 'PENDING'),
(11, 'RkZNS005', 'dnBlN3U2MWtsMDU0bjlmYzNicWk=', 'MjAyMS8yMDIy', 'NEQzVzFMMyA0QjdNQjFMNA==', 'U2VjcmV0YXJ5', '2', '3', '127.0.0.1', '2022-03-18', '14:42:57', 'PENDING'),
(12, 'RkZNS005', 'dnBlN3U2MWtsMDU0bjlmYzNicWk=', 'MjAyMS8yMDIy', 'MUc5Tlc0TDMgMUw5VzRZM003Uzc=', 'QXNzaXN0YW50IFNlY3JldGFyeQ==', '2', '4', '127.0.0.1', '2022-03-18', '14:43:04', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `sch_session`
--

CREATE TABLE IF NOT EXISTS `sch_session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `schl_session` varchar(200) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sch_session`
--

INSERT INTO `sch_session` (`session_id`, `schl_session`) VALUES
(1, '2021/2022'),
(2, '2022/2023');
