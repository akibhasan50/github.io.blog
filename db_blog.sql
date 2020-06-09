-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2020 at 07:36 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `social_tbl`
--

DROP TABLE IF EXISTS `social_tbl`;
CREATE TABLE IF NOT EXISTS `social_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb` varchar(255) COLLATE utf8_bin NOT NULL,
  `tt` varchar(255) COLLATE utf8_bin NOT NULL,
  `ln` varchar(255) COLLATE utf8_bin NOT NULL,
  `gp` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `social_tbl`
--

INSERT INTO `social_tbl` (`id`, `fb`, `tt`, `ln`, `gp`) VALUES
(1, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

DROP TABLE IF EXISTS `tbl_catagory`;
CREATE TABLE IF NOT EXISTS `tbl_catagory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`id`, `name`) VALUES
(1, 'java'),
(2, 'php'),
(3, 'html'),
(4, 'css'),
(5, 'javascript'),
(6, 'python 3.0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT 0,
  `firstname` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(55) COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `status`, `firstname`, `lastname`, `email`, `body`, `date`) VALUES
(5, 1, 'nusrat', 'jahan', 'nj@email.com', 'i hate programming', '2020-05-10 15:48:06'),
(8, 1, 'nusrat', 'motu', 'mar@gmail.com', 'i love you', '2020-05-19 09:06:28'),
(6, 1, 'akib', 'jahan', 'mar@gmail.com', 'i love football', '2020-05-11 07:22:33'),
(7, 1, 'sakib', 'motu', 'ona@gmail.com', 'lets watch the game', '2020-05-11 07:22:58'),
(9, 0, 'sakib', 'motu', 'Akib50@gmail.com', 'ygj jjuu', '2020-05-19 13:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copyright`
--

DROP TABLE IF EXISTS `tbl_copyright`;
CREATE TABLE IF NOT EXISTS `tbl_copyright` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_copyright`
--

INSERT INTO `tbl_copyright` (`id`, `title`) VALUES
(1, 'Copyright Akib Hasan Tonu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

DROP TABLE IF EXISTS `tbl_page`;
CREATE TABLE IF NOT EXISTS `tbl_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `title`, `body`) VALUES
(1, 'About us', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam incidunt eum fugiat necessitatibus optio odit est repellendus consequuntur, illo distinctio corporis, adipisci dignissimos quas nesciunt molestias voluptate ab modi? Ut.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam incidunt eum fugiat necessitatibus optio odit est repellendus consequuntur, illo distinctio corporis, adipisci dignissimos quas nesciunt molestias voluptate ab modi? Ut.</p>'),
(4, 'privacy', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam incidunt eum fugiat necessitatibus optio odit est repellendus consequuntur, illo distinctio corporis, adipisci dignissimos quas nesciunt molestias voluptate ab modi? Ut.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam incidunt eum fugiat necessitatibus optio odit est repellendus consequuntur, illo distinctio corporis, adipisci dignissimos quas nesciunt molestias voluptate ab modi? Ut.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `authore` varchar(50) COLLATE utf8_bin NOT NULL,
  `tags` varchar(255) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `authore`, `tags`, `date`, `userid`) VALUES
(9, 4, 'this is a css title', '<p>Software Developer (Sun Certified JAVA Programmer):Since 10 years he has been working as an Instructor of IDB-BISEW IT Scholarship Project (JAVA- J2EE Course). Apart from his Teaching career, he has been working as a team leader/ analyst/ project manager and developed a wide range of applicationsSenior Software Developer (Sun Certified JAVA Programmer):Since 10 years he has been working as an Instructor of IDB-BISEW IT Scholarship Project (JAVA- J2EE Course). Apart from his Teaching career, he has been working as a team leader/ analyst/ project manager and developed a wide range of applications</p>', 'upload/8772237fa7.jpg', 'nusrat jahan', 'css', '2020-05-14 07:55:56', 2),
(10, 4, 'this is a css title', '<p>Software Developer (Sun Certified JAVA Programmer):Since 10 years he has been working as an Instructor of IDB-BISEW IT Scholarship Project (JAVA- J2EE Course). Apart from his Teaching career, he has been working as a team leader/ analyst/ project manager and developed a wide range of applicationsSenior Software Developer (Sun Certified JAVA Programmer):Since 10 years he has been working as an Instructor of IDB-BISEW IT Scholarship Project (JAVA- J2EE Course). Apart from his Teaching career, he has been working as a team leader/ analyst/ project manager and developed a wide range of applications</p>', 'upload/8c63ee4fa2.jpg', 'nusrat', 'css', '2020-05-14 07:55:47', 2),
(12, 6, 'this is a python title', '<p>Software Developer (Sun Certified JAVA Programmer):Since 10 years he has been working as an Instructor of IDB-BISEW IT Scholarship Project (JAVA- J2EE Course). Apart from his Teaching career, he has been working as a team leader/ analyst/ project manager and developed a wide range of applicationsSenior Software Developer (Sun Certified JAVA Programmer):Since 10 years he has been working as an Instructor of IDB-BISEW IT Scholarship Project (JAVA- J2EE Course). Apart from his Teaching career, he has been working as a team leader/ analyst/ project manager and developed a wide range of applications</p>', 'upload/42acf0feb5.jpg', 'admin', 'python', '2020-05-14 07:53:30', 3),
(16, 5, 'this is a javascript title', '<p>Software Developer (Sun Certified JAVA Programmer):Since 10 years he has been working as an Instructor of IDB-BISEW IT Scholarship Project (JAVA- J2EE Course). Apart from his Teaching career, he has been working as a team leader/ analyst/ project manager and developed a wide range of applicationsSenior Software Developer (Sun Certified JAVA Programmer):Since 10 years he has been working as an Instructor of IDB-BISEW IT Scholarship Project (JAVA- J2EE Course). Apart from his Teaching career, he has been working as a team leader/ analyst/ project manager and developed a wide range of applications</p>', 'upload/6270b66164.jpg', 'authore', 'javascript', '2020-05-14 08:25:03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`) VALUES
(2, 'Fast slider title', 'upload/slider/ba38f861ee.jpg'),
(3, 'Second slider', 'upload/slider/8446a37368.jpg'),
(4, 'Third slider', 'upload/slider/aa221ee542.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(55) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `details` text COLLATE utf8_bin DEFAULT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(2, 'akib hasan', 'admin', 'admin92176', 'Akib50@gmail.com', '<p>i am admin</p>', 0),
(3, 'fariya ', 'authore', 'authore26739', 'nj@email.com', '<p>i hate programming</p>', 1),
(4, 'MARUF UDDIN', 'editor', 'editor75935', 'tonuakibhasan@gmail.com', '<p>i am editor</p>', 2);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

DROP TABLE IF EXISTS `title_slogan`;
CREATE TABLE IF NOT EXISTS `title_slogan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `slogan` varchar(255) COLLATE utf8_bin NOT NULL,
  `logo` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'TRAVEL FREAK BD', 'go with the flow', 'upload/logo.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
