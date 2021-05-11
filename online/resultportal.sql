-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2018 at 01:26 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resultportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` int(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`) VALUES
(2, 'John Doe', 'johndoe@yahoo.com', 2147483647, '1c0879d30c3cc49ff1492b4fe1a92d72'),
(3, 'Johnny Doe', 'johnnydoe@yahoo.com', 2147483647, '1c0879d30c3cc49ff1492b4fe1a92d72'),
(4, 'admin', 'admin@yahoo.com', 9876, '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `teacher_id`, `date`) VALUES
(16, 'JSS 1', 13, '2018-08-02'),
(18, 'JSS 2', 15, '2018-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `class_teachers`
--

CREATE TABLE `class_teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `class` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_teachers`
--

INSERT INTO `class_teachers` (`id`, `name`, `email`, `class`) VALUES
(14, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `relation` varchar(250) NOT NULL,
  `gender` enum('M','F','','') NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(225) NOT NULL,
  `child_class_id` int(11) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `name`, `relation`, `gender`, `phone`, `email`, `child_class_id`, `password`) VALUES
(1, 'MRS IBRAHIM', 'Mother', 'F', '09066029286', 'ipeluwa@gmail.com', 0, 'luway2012@@'),
(2, 'MR & MRS JOHNSON', 'parents', 'M', '098765433', 'p@yahoo.com', 16, 'luway2012@@'),
(4, 'MR & MRS FOLA', 'Parents', 'M', '08090909090', 'folafola@yahoo.com', 0, ''),
(5, 'Itemeh', 'Parents', 'M', '080808080808', 'itemeh@yahoo.com', 16, 'itemeh'),
(6, 'MR EZEOKOYE', 'Parents', 'M', '08090806070', 'ezeokoye@yahoo.com', 16, 'ezeokoye');

-- --------------------------------------------------------

--
-- Table structure for table `session_available`
--

CREATE TABLE `session_available` (
  `id` int(11) NOT NULL,
  `session_name` varchar(225) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_available`
--

INSERT INTO `session_available` (`id`, `session_name`, `date`) VALUES
(2, '2018', '2018-07-23'),
(6, '2017', '2018-07-23'),
(7, '2019', '2018-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `adm_no` int(225) NOT NULL,
  `fname` varchar(259) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `gender` enum('M','F','','') NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `parent_id` varchar(225) NOT NULL,
  `class_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `adm_no`, `fname`, `lname`, `gender`, `birthday`, `email`, `password`, `parent_id`, `class_id`) VALUES
(8, 121, 'Jonhson', 'Rest', 'M', '2000-12-31', 'johnson@yahoo.com', 'johnson', '2', 16),
(9, 122, 'Itemeh', 'Tega', 'F', '2002-01-08', 'itemeh@yahoo.com', 'itemeh', '5', 16),
(10, 123, 'Ezeokoye', 'Chibuifem', 'M', '2002-05-06', 'chibuifem@yahoo.com', 'chibuifem', '6', 16),
(11, 141, 'Vanessa', 'Edhere', 'F', '2002-02-04', 'vanessa@yahoo.com', 'vanessa', '7', 16),
(12, 765, 'Oghene', 'Itemeh', 'F', '2000-12-05', 'ogheneitemeh@yahoo.com', 'ogheneitemeh', '5', 16);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `class_id`, `teacher_id`, `date`) VALUES
(18, 'Mathematics', 16, 13, '2018-08-02'),
(19, 'Mathematics', 17, 13, '2018-08-02'),
(21, 'English', 16, 15, '2018-08-11'),
(22, 'French', 16, 16, '2018-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `subject_teachers`
--

CREATE TABLE `subject_teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `subject` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_teachers`
--

INSERT INTO `subject_teachers` (`id`, `name`, `email`, `subject`) VALUES
(14, 'John Doe', 'john@yahoo.com', 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'u',
  `phonenumber` int(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `category`, `status`, `phonenumber`, `password`) VALUES
(13, 'Fola', 'fola@gmail.com', '1', 'u', 2147483647, 'c32ca6c6ee9799dff53ab97144a88fc9'),
(15, 'johnnydoe', 'johnnydoe@yahoo.com', '1', 'u', 890909009, '21232f297a57a5a743894a0e4a801fc3'),
(16, 'johndoe', 'johndoe@yahoo.com', '2', 'u', 2147483647, '6579e96f76baa00787a28653876c6127');

-- --------------------------------------------------------

--
-- Table structure for table `term1`
--

CREATE TABLE `term1` (
  `id` int(20) NOT NULL,
  `session_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `class_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `note1` int(20) NOT NULL,
  `project1` int(20) NOT NULL,
  `test1` int(20) NOT NULL,
  `note2` int(11) NOT NULL,
  `project2` int(11) NOT NULL,
  `test2` int(20) NOT NULL,
  `exam` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term1`
--

INSERT INTO `term1` (`id`, `session_id`, `student_id`, `fname`, `lname`, `teacher_id`, `class_id`, `subject_id`, `note1`, `project1`, `test1`, `note2`, `project2`, `test2`, `exam`) VALUES
(21, 7, 8, 'Jonhson', 'Rest', 13, 16, 18, 3, 4, 8, 4, 5, 10, 53),
(22, 7, 9, 'Itemeh', 'Tega', 13, 16, 18, 4, 3, 6, 5, 5, 10, 58),
(23, 7, 10, 'Ezeokoye', 'Chibuifem', 13, 16, 18, 2, 3, 6, 5, 4, 9, 49),
(24, 7, 11, 'Vanessa', 'Edhere', 13, 16, 18, 5, 3, 5, 5, 3, 8, 50),
(25, 7, 8, 'Jonhson', 'Rest', 15, 16, 21, 4, 5, 10, 4, 5, 10, 47),
(26, 7, 9, 'Itemeh', 'Tega', 15, 16, 21, 5, 5, 10, 5, 5, 10, 53),
(27, 7, 10, 'Ezeokoye', 'Chibuifem', 15, 16, 21, 5, 4, 9, 5, 4, 9, 51),
(28, 7, 11, 'Vanessa', 'Edhere', 15, 16, 21, 5, 3, 8, 5, 3, 8, 41);

-- --------------------------------------------------------

--
-- Table structure for table `term2`
--

CREATE TABLE `term2` (
  `id` int(20) NOT NULL,
  `session_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `class_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `note1` int(20) NOT NULL,
  `project1` int(20) NOT NULL,
  `test1` int(20) NOT NULL,
  `note2` int(11) NOT NULL,
  `project2` int(11) NOT NULL,
  `test2` int(20) NOT NULL,
  `exam` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term2`
--

INSERT INTO `term2` (`id`, `session_id`, `student_id`, `fname`, `lname`, `teacher_id`, `class_id`, `subject_id`, `note1`, `project1`, `test1`, `note2`, `project2`, `test2`, `exam`) VALUES
(19, 7, 8, 'Jonhson', 'Rest', 15, 16, 21, 5, 5, 9, 5, 5, 9, 40),
(20, 7, 9, 'Itemeh', 'Tega', 15, 16, 21, 5, 5, 10, 5, 5, 10, 60),
(21, 7, 10, 'Ezeokoye', 'Chibuifem', 15, 16, 21, 5, 4, 8, 5, 5, 8, 47),
(22, 7, 11, 'Vanessa', 'Edhere', 15, 16, 21, 4, 5, 7, 5, 5, 8, 45),
(23, 7, 8, 'Jonhson', 'Rest', 13, 16, 18, 5, 5, 9, 5, 5, 9, 53),
(24, 7, 9, 'Itemeh', 'Tega', 13, 16, 18, 5, 5, 10, 5, 5, 10, 60),
(25, 7, 10, 'Ezeokoye', 'Chibuifem', 13, 16, 18, 5, 4, 8, 5, 5, 8, 52),
(26, 7, 11, 'Vanessa', 'Edhere', 13, 16, 18, 4, 5, 7, 5, 5, 8, 59);

-- --------------------------------------------------------

--
-- Table structure for table `term3`
--

CREATE TABLE `term3` (
  `id` int(20) NOT NULL,
  `session_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `class_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `note1` int(20) NOT NULL,
  `project1` int(20) NOT NULL,
  `test1` int(20) NOT NULL,
  `note2` int(11) NOT NULL,
  `project2` int(11) NOT NULL,
  `test2` int(20) NOT NULL,
  `exam` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term3`
--

INSERT INTO `term3` (`id`, `session_id`, `student_id`, `fname`, `lname`, `teacher_id`, `class_id`, `subject_id`, `note1`, `project1`, `test1`, `note2`, `project2`, `test2`, `exam`) VALUES
(1, 7, 8, 'Jonhson', 'Rest', 13, 16, 18, 4, 5, 10, 4, 5, 10, 53),
(2, 7, 9, 'Itemeh', 'Tega', 13, 16, 18, 5, 5, 10, 5, 5, 10, 58),
(3, 7, 10, 'Ezeokoye', 'Chibuifem', 13, 16, 18, 5, 4, 9, 5, 4, 9, 49),
(4, 7, 11, 'Vanessa', 'Edhere', 13, 16, 18, 5, 3, 8, 5, 3, 8, 50),
(5, 7, 8, 'Jonhson', 'Rest', 15, 16, 21, 3, 4, 8, 5, 5, 9, 50),
(6, 7, 9, 'Itemeh', 'Tega', 15, 16, 21, 4, 3, 6, 5, 4, 10, 56),
(7, 7, 10, 'Ezeokoye', 'Chibuifem', 15, 16, 21, 2, 3, 6, 5, 4, 8, 46),
(8, 7, 11, 'Vanessa', 'Edhere', 15, 16, 21, 5, 3, 5, 5, 4, 9, 49);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_teachers`
--
ALTER TABLE `class_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_available`
--
ALTER TABLE `session_available`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term1`
--
ALTER TABLE `term1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term2`
--
ALTER TABLE `term2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term3`
--
ALTER TABLE `term3`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `session_available`
--
ALTER TABLE `session_available`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `term1`
--
ALTER TABLE `term1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `term2`
--
ALTER TABLE `term2`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `term3`
--
ALTER TABLE `term3`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
