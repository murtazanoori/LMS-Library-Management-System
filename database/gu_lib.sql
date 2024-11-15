-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 04:57 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gu_lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` bigint(12) UNSIGNED ZEROFILL NOT NULL,
  `book_title` varchar(64) NOT NULL,
  `author` varchar(64) NOT NULL,
  `translator` varchar(64) NOT NULL,
  `publish_place` varchar(64) NOT NULL,
  `publisher` varchar(64) NOT NULL,
  `publish_year` date NOT NULL,
  `volume` varchar(64) NOT NULL,
  `book_edition` varchar(64) NOT NULL,
  `number_page` int(11) NOT NULL,
  `book_language` varchar(64) NOT NULL,
  `copy` int(11) NOT NULL,
  `b_c_id` int(11) NOT NULL,
  `department_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `faculty_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `author`, `translator`, `publish_place`, `publisher`, `publish_year`, `volume`, `book_edition`, `number_page`, `book_language`, `copy`, `b_c_id`, `department_id`, `faculty_id`, `created_at`) VALUES
(010102110005, 'll', ' Majeed', 'Sami', 'newyork', ' Navid', '2021-02-06', ' 2', ' 2 edition', 12, 'English', 2, 7, 01, 01, '2021-02-26'),
(010102120001, 'live', ' majeed', 'Sediq', 'kabul', ' Ahmadi', '0000-00-00', ' 2', ' 2', 200, 'English', 6, 8, 01, 01, '2021-02-23'),
(010102120002, 'google', ' Ø³Ø¨Ø­Ø§Ù†', 'majeed', 'Gawharshad', ' Ahmadi', '0000-00-00', ' 6', ' 1 edition', 200, 'English', 3, 8, 01, 01, '2021-02-23'),
(010102120003, 'google', ' sami', 'Sediq', 'Gawharshad', ' bahara', '2021-02-13', ' 2', ' 3 edition', 89, 'English', 2, 8, 01, 01, '2021-02-26'),
(010102120004, 'MM', ' Ø³Ø¨Ø­Ø§Ù†', 'Sediq', 'Gawharshad', ' Ahmadi', '2021-02-07', ' 2', ' 1 edition', 12, 'dari', 2, 8, 01, 01, '2021-02-26'),
(020203110001, 'll', ' nn', 'ioioi', 'Gawharshad', ' jk', '0000-00-00', '  11', ' Ø¬Ù„Ø¯ Ø§ÙˆÙ„', 655, 'English', 8, 12, 02, 02, '2021-02-23'),
(020203110002, 'jjlnn,', ' o', 'lll', 'mmm', ' nm', '0000-00-00', ' 2', ' 2 edition', 90, 'English', 6, 12, 02, 02, '2021-02-23'),
(070602120005, 'network+', ' Majeed', 'majeed', 'kabul', ' Ahmadi', '2021-02-18', ' 1', ' 2 edition', 89, 'English', 5, 8, 06, 07, '2021-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `book_case`
--

CREATE TABLE `book_case` (
  `b_c_id` int(11) NOT NULL,
  `book_case_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `c_row` int(1) NOT NULL,
  `c_column` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_case`
--

INSERT INTO `book_case` (`b_c_id`, `book_case_id`, `c_row`, `c_column`) VALUES
(7, 02, 1, 1),
(8, 02, 1, 2),
(10, 03, 1, 1),
(12, 03, 1, 1),
(13, 03, 1, 2),
(14, 03, 2, 2),
(15, 03, 2, 1),
(16, 03, 2, 1),
(17, 04, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cd`
--

CREATE TABLE `cd` (
  `cd_id` bigint(12) UNSIGNED ZEROFILL NOT NULL,
  `cd_title` varchar(64) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `presenter` varchar(255) NOT NULL,
  `files_info` varchar(25) NOT NULL,
  `Author` varchar(64) DEFAULT NULL,
  `cd_number` tinyint(4) NOT NULL,
  `b_c_id` int(11) NOT NULL,
  `copy` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cd`
--

INSERT INTO `cd` (`cd_id`, `cd_title`, `subject`, `presenter`, `files_info`, `Author`, `cd_number`, `b_c_id`, `copy`, `created_at`) VALUES
(000702120001, 'good way1', ' fredam', 'Majeed', 'pdf,mp3,image,video', 'Ø³Ø¨Ø­Ø§Ù†', 1, 8, 10, '2021-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `full_name`, `email`, `subject`, `message`) VALUES
(1, 'majeed', 'admin@gmail.com', 'cv', 'jgyutdyd'),
(2, 'sediq', 'spandarkhan@gmail.com', 'cow milk', 'naaan rata raka ');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `department_name` varchar(64) NOT NULL,
  `faculty_id` int(2) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `faculty_id`) VALUES
(01, 'Software Engineering', 01),
(02, 'IT', 01),
(03, 'Database', 01),
(04, 'Rawabit-Beenullmllall', 05),
(05, 'Technology', 06),
(06, 'collecting data', 07),
(07, 'Analayz Data', 07),
(10, 'qrz', 02);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `name`, `lastname`, `email`, `position_id`) VALUES
(96290017, 'bahara', 'popal', 'bahara@gmail.com', 4),
(96290111, 'Subhan', 'Waisy', 'mahboob.waisy@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `faculty_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`) VALUES
(01, 'Computer Since'),
(02, 'BBA'),
(03, 'Law'),
(04, 'Engineering'),
(05, 'Leadership'),
(06, 'Tiab'),
(07, 'Data Since');

-- --------------------------------------------------------

--
-- Table structure for table `fasilnama`
--

CREATE TABLE `fasilnama` (
  `fasilnama_id` bigint(12) UNSIGNED ZEROFILL NOT NULL,
  `fasilnama_title` varchar(64) NOT NULL,
  `author` varchar(64) DEFAULT NULL,
  `publish_year` date NOT NULL,
  `fas_info` varchar(200) NOT NULL,
  `publish_place` varchar(64) NOT NULL,
  `fas_number` int(11) NOT NULL,
  `b_c_id` int(11) NOT NULL,
  `copy` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fasilnama`
--

INSERT INTO `fasilnama` (`fasilnama_id`, `fasilnama_title`, `author`, `publish_year`, `fas_info`, `publish_place`, `fas_number`, `b_c_id`, `copy`, `created_at`) VALUES
(000202120001, 'Afg War', ' majeed', '2018-01-01', 'how are you', 'Gawharshad', 2, 8, 10, '2021-02-24'),
(001102120002, 'j', ' a', '2021-02-03', 'hi', 'kabul', 7, 8, 10, '2021-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `fasilnama_subject`
--

CREATE TABLE `fasilnama_subject` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `fasilnama_id` bigint(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fasilnama_subject`
--

INSERT INTO `fasilnama_subject` (`subject_id`, `subject`, `fasilnama_id`) VALUES
(1, 'hi', 0202120001),
(2, 'no', 0202120001),
(3, 'yes', 0202120001),
(4, 'hello', 0202120001),
(5, 'jk', 1102120002);

-- --------------------------------------------------------

--
-- Table structure for table `gallary`
--

CREATE TABLE `gallary` (
  `g_id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `author` varchar(100) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(120) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallary`
--

INSERT INTO `gallary` (`g_id`, `title`, `author`, `photo`) VALUES
(1, 'Freedom', 'Majeed Sediqi', '3.jpg'),
(3, 'Monograph Book Pic', '', '1.jpg'),
(5, 'History Book Pic', '', 'img_4.jpg'),
(7, 'General Book Pic', '', 'paper.jpg'),
(9, 'Rule Book', '', 'img_3.jpg'),
(13, 'Ø±Ø§Ø² Ù‡Ø§ÛŒ Ù¾Ù†Ù‡Ø§Ù†', 'Ø³Ø¨Ø­Ø§Ù†', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `general_book`
--

CREATE TABLE `general_book` (
  `general_book_id` bigint(12) UNSIGNED ZEROFILL NOT NULL,
  `book_title` varchar(64) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `author` varchar(64) NOT NULL,
  `translator` varchar(64) NOT NULL,
  `publisher` varchar(64) NOT NULL,
  `publish_place` varchar(64) NOT NULL,
  `volume` varchar(64) NOT NULL,
  `edition` varchar(64) NOT NULL,
  `page` int(11) NOT NULL,
  `b_c_id` int(11) NOT NULL,
  `copy` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_book`
--

INSERT INTO `general_book` (`general_book_id`, `book_title`, `subject`, `author`, `translator`, `publisher`, `publish_place`, `volume`, `edition`, `page`, `b_c_id`, `copy`, `created_at`) VALUES
(001203110001, 'q', 'w', 'e', 'r', 't', 'y', '1', '2', 34, 12, 9, '2021-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `history_book`
--

CREATE TABLE `history_book` (
  `hs_id` bigint(12) UNSIGNED ZEROFILL NOT NULL,
  `book_title` varchar(64) NOT NULL,
  `Author` varchar(64) NOT NULL,
  `Translator` varchar(64) NOT NULL,
  `publish_place` varchar(64) NOT NULL,
  `publisher` varchar(64) NOT NULL,
  `publish_year` date NOT NULL,
  `volume` varchar(64) NOT NULL,
  `edition` varchar(64) NOT NULL,
  `page` int(11) NOT NULL,
  `b_c_id` int(11) NOT NULL,
  `copy` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_book`
--

INSERT INTO `history_book` (`hs_id`, `book_title`, `Author`, `Translator`, `publish_place`, `publisher`, `publish_year`, `volume`, `edition`, `page`, `b_c_id`, `copy`, `created_at`) VALUES
(000602110001, 'google', 'Majeed', 'majeed', 'Gawharshad', 'Ahmadi', '2021-02-17', '1', '1 edition', 20, 7, 10, '2021-02-24'),
(000603110001, 'live', 'Majeed', 'c', 'kabul', 'bahara', '0000-00-00', '6', '1 edition', 20, 12, 8, '2021-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `j_id` int(11) NOT NULL,
  `title` varchar(70) CHARACTER SET utf8 NOT NULL,
  `info` longtext CHARACTER SET utf8 NOT NULL,
  `author` varchar(30) CHARACTER SET utf8 NOT NULL,
  `publish_year` date NOT NULL,
  `pages` int(11) NOT NULL,
  `avalibality` varchar(20) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`j_id`, `title`, `info`, `author`, `publish_year`, `pages`, `avalibality`, `photo`) VALUES
(1, 'Super Intelligence', 'Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end.in find in a of the printing and typeseting industry in find to make it all done into end.', 'Majeed Sediqi', '1998-01-01', 200, 'Avalible', '12.jpg'),
(2, ' Algorithm to live', 'Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end.in find in a of the printing and typeseting industry in find to make it all done into end.', 'Fritz Wold', '2021-02-01', 500, 'Avalible', '1.png'),
(3, 'Cracking the coding interview', 'Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end.in find in a of the printing and typeseting industry in find to make it all done into end.', 'John Klok', '2010-08-01', 1000, 'Coming_Soon', '2.jpg'),
(4, 'Algorithms', 'Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end.in find in a of the printing and typeseting industry in find to make it all done into end.', 'George Strong', '2009-07-30', 2000, 'Avalible', '3.jpg'),
(5, 'Python Crash Course', 'Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end.in find in a of the printing and typeseting industry in find to make it all done into end.', 'Ichae Semos', '2007-11-15', 300, 'Avalible', '4.png'),
(6, 'Boring stuff with Python', 'Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end.in find in a of the printing and typeseting industry in find to make it all done into end.', 'Fidel Martin', '2005-07-14', 800, 'Avalible', '5.png'),
(7, 'AP', 'Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end.in find in a of the printing and typeseting industry in find to make it all done into end.', 'Jules Boutin', '1997-08-08', 900, 'Coming_Soon', '6.jpg'),
(8, 'Machine Learning', 'Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end.in find in a of the printing and typeseting industry in find to make it all done into end.', 'Kusti Franti', '2021-02-06', 1200, 'Avalible', '7.jpg'),
(9, 'Coding Techniques', 'Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end.in find in a of the printing and typeseting industry in find to make it all done into end.', 'Argele Intili', '2005-11-04', 100, 'Avalible', '8.jpg'),
(10, 'Python for Data Analysis', 'Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end.in find in a of the printing and typeseting industry in find to make it all done into end.', 'Henry Jurk', '2017-11-30', 900, 'Avalible', '9.jpg'),
(11, 'The Book of why', 'Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end.in find in a of the printing and typeseting industry in find to make it all done into end.', 'David King', '2011-04-30', 600, 'Coming_Soon', '10.jpg'),
(12, 'Artificial Intelligence', 'Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end.in find in a of the printing and typeseting industry in find to make it all done into end.', 'Attilio Marzi', '2009-05-13', 120, 'Coming_Soon', '11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `l_id` int(11) NOT NULL,
  `loan_date` date NOT NULL,
  `return_date` varchar(30) NOT NULL,
  `loan_status` tinyint(4) NOT NULL,
  `loaner` int(11) NOT NULL,
  `loaner_type` varchar(20) NOT NULL,
  `book_id` bigint(12) UNSIGNED ZEROFILL NOT NULL,
  `book_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`l_id`, `loan_date`, `return_date`, `loan_status`, `loaner`, `loaner_type`, `book_id`, `book_type`) VALUES
(25, '2021-02-28', '2021-03-11', 0, 96290111, '0', 010102110005, 'book'),
(26, '2021-02-28', '2021-03-04', 1, 9629001, '0', 001102120002, 'fasilnama'),
(27, '2021-02-28', '2021-03-12', 0, 9629001, '1', 010102120001, 'book');

-- --------------------------------------------------------

--
-- Table structure for table `monograph`
--

CREATE TABLE `monograph` (
  `mo_id` bigint(12) UNSIGNED ZEROFILL NOT NULL,
  `m_title` varchar(64) NOT NULL,
  `Author` varchar(64) NOT NULL,
  `guide_teacher` varchar(64) NOT NULL,
  `graduation_year` date NOT NULL,
  `score` int(11) NOT NULL,
  `faculty_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `department_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `b_c_id` int(11) NOT NULL,
  `copy` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monograph`
--

INSERT INTO `monograph` (`mo_id`, `m_title`, `Author`, `guide_teacher`, `graduation_year`, `score`, `faculty_id`, `department_id`, `b_c_id`, `copy`, `created_at`) VALUES
(010303110001, 'IT', ' Ø³Ø¨Ø­Ø§Ù†', 'Ù…Ø¬ÛŒØ¯', '2021-02-04', 91, 01, 03, 12, 8, '2021-02-23'),
(030203110001, 'Java', ' Majeed', 'Ahmadi', '2021-02-01', 99, 03, 02, 12, 10, '2021-02-23'),
(030203110002, 'kabul', ' Bahara', 'Ù…Ø¬ÛŒØ¯', '2021-02-18', 99, 03, 02, 12, 4, '2021-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `dis` varchar(100) CHARACTER SET utf8 NOT NULL,
  `info` longtext CHARACTER SET utf8 NOT NULL,
  `news_img` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `dis`, `info`, `news_img`) VALUES
(17, 'Gawharshad University', 'We are serve to our people join white au. educition is a way to make your .', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea?\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea? to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.\r\n\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea? to actually sit through a self-imposed MCSE training.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea?\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea?', 'news.jpg'),
(18, 'Gawharshad Teachers', 'we are served for student to learin role of live and go on . his/her perpose', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea?\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea? to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.\r\n\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea? to actually sit through a self-imposed MCSE training.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea?\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea?', 'teachers.jpg'),
(19, 'Gawharshad Graduation', 'All student has aim to graduad from stadies but we are take him availablty to stand alon.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea?\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea? to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.\r\n\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea? to actually sit through a self-imposed MCSE training.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea?\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea?', 'graduation.jpg'),
(20, 'Gawharshad Students', 'student can change the polocy of system lms on our tream and support his live.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea?\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea? to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.\r\n\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea? to actually sit through a self-imposed MCSE training.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea?\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci recusandae quaerat qui eveniet quos veniam eligendi ratione doloribus optio excepturi illum voluptas neque corrupti, modi asperiores deserunt omnis incidunt? Ea?', 'students.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`) VALUES
(1, 'Libraryan'),
(4, 'Manager'),
(5, 'IT Oficer'),
(6, '');

-- --------------------------------------------------------

--
-- Table structure for table `rule_book`
--

CREATE TABLE `rule_book` (
  `r_id` bigint(12) UNSIGNED ZEROFILL NOT NULL,
  `book_title` varchar(64) NOT NULL,
  `Author` varchar(64) NOT NULL,
  `Translator` varchar(64) NOT NULL,
  `publish_place` varchar(64) NOT NULL,
  `publisher` varchar(64) NOT NULL,
  `publish_year` date NOT NULL,
  `volume` varchar(64) NOT NULL,
  `book_edition` varchar(64) NOT NULL,
  `page` int(11) NOT NULL,
  `b_c_id` int(11) NOT NULL,
  `copy` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rule_book`
--

INSERT INTO `rule_book` (`r_id`, `book_title`, `Author`, `Translator`, `publish_place`, `publisher`, `publish_year`, `volume`, `book_edition`, `page`, `b_c_id`, `copy`, `created_at`) VALUES
(000402110001, 'live', ' majeed', 'sami', 'Gawharshad', ' Ahmadi', '2021-02-11', ' 2', ' 1 edition', 20, 7, 3, '2021-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `shift` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `phone` char(10) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `department_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `faculty_id` int(2) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `name`, `lastname`, `father_name`, `shift`, `status`, `phone`, `photo`, `department_id`, `faculty_id`) VALUES
(1, 'blue', 'haydari', 'Fawad2', 'After noon', 'De-Active', '784381820', '', 02, 04),
(2, 'l', 'i', 'p', 'Morning', 'Active', '90967887', '1614612607register_2.jpg', 04, 05),
(10, 'q', 'w', 'w', 'Morning', 'De-Active', '789453290', '16117882821.png', 03, 03),
(90, 'majeed', 'Ahmadi', 'Fawad', 'Evening', 'De-Active', '87665', '1614613960', 04, 04),
(9629001, 'user23', 'haydari', 'Sami', 'Evening', 'Active', '8766589023', '16109688556a79932a-b8b5-41cd-b4f9-cd72c3114142.jpg', 01, 01),
(96290005, 'sediq Cepe', 'sediqi', 'Noorullah Fawad', 'Evening', 'De-Active', '97868549', '1614612519', 02, 03),
(96290015, 'Abdul Majeed', 'Sediqi', 'Noorullah Fawad', 'After noon', 'Active', '0784381820', '1614612439', 01, 01),
(96290111, 'Subhan', 'Waisy', 'Sami', 'FullTime', 'De-Active', '765463783', '1611840248banner_11.jpg', 01, 02);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `shift` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `department_id` int(2) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `lastname`, `email`, `shift`, `phone`, `department_id`) VALUES
(9629001, 'Abdul Rashid', 'Ahmadi', 'ahmadi@gmail.com', 'FullTime', '0765463783', 01);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT '0 for Admin, 1 for Librarian\r\n',
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `lastname`, `username`, `password`, `role`, `photo`) VALUES
(7, 'Majeed', 'Sediqi', 'majeed@gmail.com', 'cf89c6182b9e7bee55c7493267766230d340b9e016fe48de8fc22fe73b171612', 1, 'FB_IMG_1606418072956.jpg'),
(8, 'Subhan', 'Waisy', 'mahboob.waisy@gmail.com', '5bb0272540cc99316bcefe0ecf151ebc3b4b7fd311231912c87a00168160df03', 0, ''),
(9, 'admin', 'admin', 'admin@gmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 0, ''),
(10, 'Murtaza', 'Baka', 'murtaza@gmail.com', 'fe90994026eb5d7a9185c9162e127b41018ba9669783ed3a5d2e15808e8f5590', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `b_c_id` (`b_c_id`);

--
-- Indexes for table `book_case`
--
ALTER TABLE `book_case`
  ADD PRIMARY KEY (`b_c_id`);

--
-- Indexes for table `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`cd_id`),
  ADD KEY `book_case_cd_fk` (`b_c_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `department_name` (`department_name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `position_employee_fk` (`position_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `fasilnama`
--
ALTER TABLE `fasilnama`
  ADD PRIMARY KEY (`fasilnama_id`),
  ADD KEY `b_c_id` (`b_c_id`);

--
-- Indexes for table `fasilnama_subject`
--
ALTER TABLE `fasilnama_subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `fasilnama_id` (`fasilnama_id`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `general_book`
--
ALTER TABLE `general_book`
  ADD PRIMARY KEY (`general_book_id`),
  ADD KEY `book_case_general_book_fk` (`b_c_id`);

--
-- Indexes for table `history_book`
--
ALTER TABLE `history_book`
  ADD PRIMARY KEY (`hs_id`),
  ADD KEY `book_case_history_book_fk` (`b_c_id`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `monograph`
--
ALTER TABLE `monograph`
  ADD PRIMARY KEY (`mo_id`),
  ADD KEY `book_case_monograph_fk` (`b_c_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `rule_book`
--
ALTER TABLE `rule_book`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `book_case_rule_book_fk` (`b_c_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_case`
--
ALTER TABLE `book_case`
  MODIFY `b_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96290112;

--
-- AUTO_INCREMENT for table `fasilnama_subject`
--
ALTER TABLE `fasilnama_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`b_c_id`) REFERENCES `book_case` (`b_c_id`);

--
-- Constraints for table `cd`
--
ALTER TABLE `cd`
  ADD CONSTRAINT `book_case_cd_fk` FOREIGN KEY (`b_c_id`) REFERENCES `book_case` (`b_c_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `position_employee_fk` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `fasilnama`
--
ALTER TABLE `fasilnama`
  ADD CONSTRAINT `fasilnama_ibfk_1` FOREIGN KEY (`b_c_id`) REFERENCES `book_case` (`b_c_id`);

--
-- Constraints for table `fasilnama_subject`
--
ALTER TABLE `fasilnama_subject`
  ADD CONSTRAINT `fasilnama_subject_ibfk_1` FOREIGN KEY (`fasilnama_id`) REFERENCES `fasilnama` (`fasilnama_id`);

--
-- Constraints for table `general_book`
--
ALTER TABLE `general_book`
  ADD CONSTRAINT `book_case_general_book_fk` FOREIGN KEY (`b_c_id`) REFERENCES `book_case` (`b_c_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `history_book`
--
ALTER TABLE `history_book`
  ADD CONSTRAINT `book_case_history_book_fk` FOREIGN KEY (`b_c_id`) REFERENCES `book_case` (`b_c_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `monograph`
--
ALTER TABLE `monograph`
  ADD CONSTRAINT `book_case_monograph_fk` FOREIGN KEY (`b_c_id`) REFERENCES `book_case` (`b_c_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `rule_book`
--
ALTER TABLE `rule_book`
  ADD CONSTRAINT `book_case_rule_book_fk` FOREIGN KEY (`b_c_id`) REFERENCES `book_case` (`b_c_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
