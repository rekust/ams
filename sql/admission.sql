-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2023 at 04:39 PM
-- Server version: 10.5.23-MariaDB
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission`
--
CREATE DATABASE IF NOT EXISTS `admission` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `admission`;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `user_id` int(10) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `roll_number` int(20) NOT NULL,
  `rank` int(10) NOT NULL,
  `DOB` date NOT NULL,
  `aadhaar` varchar(255) NOT NULL,
  `PRTC` varchar(255) NOT NULL,
  `marksheet` varchar(255) NOT NULL,
  `admit_card` varchar(255) NOT NULL,
  `birth_certificate` varchar(255) NOT NULL,
  `ration_card` varchar(255) NOT NULL,
  `caste_certificate` varchar(255) DEFAULT NULL,
  `status_id` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`user_id`, `student_name`, `father_name`, `mother_name`, `phone`, `roll_number`, `rank`, `DOB`, `aadhaar`, `PRTC`, `marksheet`, `admit_card`, `birth_certificate`, `ration_card`, `caste_certificate`, `status_id`) VALUES
(1, 'user', 'f user', 'm user', 123456789, 1, 7, '2000-01-01', 'https://myaadhaar.uidai.gov.in/', 'https://edistrict.tripura.gov.in/', 'https://edistrict.tripura.gov.in/', 'https://edistrict.tripura.gov.in/', 'https://edistrict.tripura.gov.in/', 'https://edistrict.tripura.gov.in/', 'https://edistrict.tripura.gov.in/', 2),
(3, 'Tamojoy Chanda', 'Supratim Chanda', 'Sampita Neogi', 2147483647, 12, 4, '2004-08-21', 'https://www.youtube.com/', 'https://www.youtube.com/', 'https://www.youtube.com/', 'https://edistrict.tripura.gov.in/', 'https://www.youtube.com/', 'https://www.youtube.com/', NULL, 2),
(4, 'Aaniketh Ghosh', 'Aaniketh\'s Father', 'Aaniketh\'s Mother', 2147483647, 123, 21, '2004-11-14', 'https://chat.openai.com/', 'https://chat.openai.com/', 'https://chat.openai.com/', 'https://edistrict.tripura.gov.in/', 'https://chat.openai.com/', 'https://chat.openai.com/', 'https://chat.openai.com/', 3),
(5, 'Aisrang Debbarma', 'Aisrang\'s Father', 'Airrang\'s Mother', 123987456, 1234, 55, '2005-05-06', 'https://aniwatch.to/', 'https://aniwatch.to/', 'https://aniwatch.to/', 'https://edistrict.tripura.gov.in/', 'https://aniwatch.to/', 'https://aniwatch.to/', 'https://aniwatch.to/', 3),
(6, 'Manidipa', 'MFather', 'MMother', 92043098, 12345, 34, '2004-09-14', 'https://www.google.com/search?q=student+dashboard&sca_esv=592504798&tbm=isch&sxsrf=AM9HkKnOGigtkOmM11OMdwBFmOOS8x7mHw:1703075289204&source=lnms&sa=X&ved=2ahUKEwjN143tgZ6DAxXbwTgGHZDKCigQ_AUoAXoECAEQAw&biw=1897&bih=1051&dpr=1.69#imgrc=YXLz6-tFmaTheM', 'http://localhost:3000/MajorProject/completeProfile.html', 'https://www.google.com/search?q=student+dashboard&sca_esv=592504798&tbm=isch&sxsrf=AM9HkKnOGigtkOmM11OMdwBFmOOS8x7mHw:1703075289204&source=lnms&sa=X&ved=2ahUKEwjN143tgZ6DAxXbwTgGHZDKCigQ_AUoAXoECAEQAw&biw=1897&bih=1051&dpr=1.69#imgrc=YXLz6-tFmaTheM', 'https://edistrict.tripura.gov.in/', 'http://localhost:3000/MajorProject/completeProfile.html', 'http://localhost:3000/MajorProject/completeProfile.html', 'http://localhost:3000/MajorProject/completeProfile.html', 2),
(9, 'Tester Name', 'Tester Father', 'Tester Mother', 1111111111, 1111111111, 111, '2000-11-11', 'https://www.msn.com/en-in/feed?ocid=wn_startbrowsing&form=MT00LJ&cvid=9a26ed9c858047dc90dcdb3ee5836f4e', 'https://www.msn.com/en-in/feed?ocid=wn_startbrowsing&form=MT00LJ&cvid=9a26ed9c858047dc90dcdb3ee5836f4e', 'https://www.msn.com/en-in/feed?ocid=wn_startbrowsing&form=MT00LJ&cvid=9a26ed9c858047dc90dcdb3ee5836f4e', 'https://edistrict.tripura.gov.in/', 'https://www.msn.com/en-in/feed?ocid=wn_startbrowsing&form=MT00LJ&cvid=9a26ed9c858047dc90dcdb3ee5836f4e', 'https://www.msn.com/en-in/feed?ocid=wn_startbrowsing&form=MT00LJ&cvid=9a26ed9c858047dc90dcdb3ee5836f4e', 'https://www.msn.com/en-in/feed?ocid=wn_startbrowsing&form=MT00LJ&cvid=9a26ed9c858047dc90dcdb3ee5836f4e', 3),
(10, 'Khakachang Tripura', 'Father', 'Mother', 1234567890, 1234567890, 12, '2000-01-01', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_status`
--

CREATE TABLE `student_status` (
  `status_id` int(10) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_status`
--

INSERT INTO `student_status` (`status_id`, `status`) VALUES
(3, 'rejected'),
(1, 'unverified'),
(2, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_type_id` int(10) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_type_id`, `email`, `password`) VALUES
(1, 'User', 1, 'user@mail.com', '123456'),
(2, 'teacher', 2, 'teacher@mail.com', '123456'),
(3, 'Tamojoy', 1, 'tamojoychanda@mail.com', '123456'),
(4, 'Aaniketh', 1, 'aaniketh@mail.com', '123456'),
(5, 'Aisrang', 1, 'aisrang@mail.com', '123456'),
(6, 'Manidipa Das', 1, 'manidipa@mail.com', 'Password@12'),
(9, 'Tester', 1, 'tester@mail.com', 'password@A1'),
(10, 'Khakachang Tripura', 1, 'khakachang@mail.com', 'password@A1'),
(11, 'new user', 1, 'new@mail.com', 'password@A1');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(5) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type`) VALUES
(1, 'student'),
(2, 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`user_id`,`student_name`),
  ADD UNIQUE KEY `aadhaar` (`aadhaar`),
  ADD UNIQUE KEY `PRTC` (`PRTC`),
  ADD UNIQUE KEY `12th_marksheet` (`marksheet`),
  ADD UNIQUE KEY `birth_certificate` (`birth_certificate`),
  ADD UNIQUE KEY `ration_card` (`ration_card`),
  ADD UNIQUE KEY `roll_number` (`roll_number`),
  ADD UNIQUE KEY `cast_certificate` (`caste_certificate`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `student_status`
--
ALTER TABLE `student_status`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `status` (`status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`),
  ADD UNIQUE KEY `user_type` (`user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `student_status` (`status_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
