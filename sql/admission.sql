-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2024 at 03:21 PM
-- Server version: 10.5.23-MariaDB
-- PHP Version: 8.2.17

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

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `user_id` int(10) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `phone` int(12) DEFAULT NULL,
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
  `status_id` int(10) NOT NULL DEFAULT 1,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`user_id`, `student_name`, `father_name`, `mother_name`, `phone`, `roll_number`, `rank`, `DOB`, `aadhaar`, `PRTC`, `marksheet`, `admit_card`, `birth_certificate`, `ration_card`, `caste_certificate`, `status_id`, `reg_date`) VALUES
(1, 'user', 'f user', 'm user', 123456789, 1, 7, '2000-01-01', 'https://myaadhaar.uidai.gov.in/', 'https://edistrict.tripura.gov.in/', 'https://edistrict.tripura.gov.in/', 'https://edistrict.tripura.gov.in/', 'https://edistrict.tripura.gov.in/', 'https://edistrict.tripura.gov.in/', 'https://edistrict.tripura.gov.in/', 2, '2024-04-14'),
(3, 'Tamojoy Chanda', 'Supratim Chanda', 'Sampita Neogi', 2147483647, 12, 4, '2004-08-21', 'https://www.youtube.com/', 'https://www.youtube.com/', 'https://www.youtube.com/', 'https://edistrict.tripura.gov.in/', 'https://www.youtube.com/', 'https://www.youtube.com/', NULL, 2, '2025-04-15'),
(4, 'Aaniketh Ghosh', 'Aaniketh\'s Father', 'Aaniketh\'s Mother', 2147483647, 123, 21, '2004-11-14', 'https://chat.openai.com/', 'https://chat.openai.com/', 'https://chat.openai.com/', 'https://edistrict.tripura.gov.in/', 'https://chat.openai.com/', 'https://chat.openai.com/', 'https://chat.openai.com/', 2, '2025-04-14'),
(5, 'Aisrang Debbarma', 'Aisrang\'s Father', 'Airrang\'s Mother', 123987456, 1234, 55, '2005-05-06', 'https://aniwatch.to/', 'https://aniwatch.to/', 'https://aniwatch.to/', 'https://edistrict.tripura.gov.in/', 'https://aniwatch.to/', 'https://aniwatch.to/', 'https://aniwatch.to/', 3, '2024-04-14'),
(6, 'Manidipa', 'MFather', 'MMother', 92043098, 12345, 34, '2004-09-14', 'https://www.google.com/search?q=student+dashboard&sca_esv=592504798&tbm=isch&sxsrf=AM9HkKnOGigtkOmM11OMdwBFmOOS8x7mHw:1703075289204&source=lnms&sa=X&ved=2ahUKEwjN143tgZ6DAxXbwTgGHZDKCigQ_AUoAXoECAEQAw&biw=1897&bih=1051&dpr=1.69#imgrc=YXLz6-tFmaTheM', 'http://localhost:3000/MajorProject/completeProfile.html', 'https://www.google.com/search?q=student+dashboard&sca_esv=592504798&tbm=isch&sxsrf=AM9HkKnOGigtkOmM11OMdwBFmOOS8x7mHw:1703075289204&source=lnms&sa=X&ved=2ahUKEwjN143tgZ6DAxXbwTgGHZDKCigQ_AUoAXoECAEQAw&biw=1897&bih=1051&dpr=1.69#imgrc=YXLz6-tFmaTheM', 'https://edistrict.tripura.gov.in/', 'http://localhost:3000/MajorProject/completeProfile.html', 'http://localhost:3000/MajorProject/completeProfile.html', 'http://localhost:3000/MajorProject/completeProfile.html', 2, '2024-04-14'),
(9, 'Tester Name', 'Tester Father', 'Tester Mother', 1111111111, 1111111111, 111, '2000-11-11', 'https://www.msn.com/en-in/feed?ocid=wn_startbrowsing&form=MT00LJ&cvid=9a26ed9c858047dc90dcdb3ee5836f4e', 'https://www.msn.com/en-in/feed?ocid=wn_startbrowsing&form=MT00LJ&cvid=9a26ed9c858047dc90dcdb3ee5836f4e', 'https://www.msn.com/en-in/feed?ocid=wn_startbrowsing&form=MT00LJ&cvid=9a26ed9c858047dc90dcdb3ee5836f4e', 'https://edistrict.tripura.gov.in/', 'https://www.msn.com/en-in/feed?ocid=wn_startbrowsing&form=MT00LJ&cvid=9a26ed9c858047dc90dcdb3ee5836f4e', 'https://www.msn.com/en-in/feed?ocid=wn_startbrowsing&form=MT00LJ&cvid=9a26ed9c858047dc90dcdb3ee5836f4e', 'https://www.msn.com/en-in/feed?ocid=wn_startbrowsing&form=MT00LJ&cvid=9a26ed9c858047dc90dcdb3ee5836f4e', 2, '2025-04-14'),
(10, 'Khakachang Tripura', 'Father', 'Mother', 1234567890, 1234567890, 12, '2000-01-01', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 2, '2024-04-14'),
(12, 'Student Name', 'Father Name', 'Mother Name', 898989898, 2139580, 34, '2004-01-01', 'https://workspace.google.com/products/meet/', 'https://workspace.google.com/products/meet/', 'https://workspace.google.com/products/meet/', 'https://workspace.google.com/products/meet/', 'https://workspace.google.com/products/meet/', 'https://workspace.google.com/products/meet/', 'https://workspace.google.com/products/meet/', 3, '2024-04-14'),
(44, 'StudentName Surname', 'FatherName Surname', 'MotherName Surname', 1242343451, 12309, 12, '1999-01-01', 'https://hianime.to/', 'https://hianime.to/', 'https://hianime.to/', 'https://hianime.to/', 'https://hianime.to/', 'https://hianime.to/', 'https://hianime.to/', 3, '2024-04-18');

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
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `user_id`, `teacher_name`, `teacher_phone`) VALUES
(4, 36, 'Gauri Sankar Majumder', '8798156727'),
(5, 37, 'Debjani Tripura', '8794836356'),
(6, 38, 'Ruman Sarkar', '9774142493');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_type_id` int(10) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type_id`, `email`, `password`) VALUES
(1, 1, 'user@mail.com', '123456'),
(2, 2, 'teacher@mail.com', '123456'),
(3, 1, 'tamojoychanda@mail.com', '123456'),
(4, 1, 'aaniketh@mail.com', '123456'),
(5, 1, 'aisrang@mail.com', '123456'),
(6, 1, 'manidipa@mail.com', 'Password@12'),
(9, 1, 'tester@mail.com', 'password@A1'),
(10, 1, 'khakachang@mail.com', 'password@A1'),
(12, 1, 'student@mail.com', 'Password@123'),
(17, 1, 'name@mail.com', 'Password@123'),
(19, 1, 'emailfortester@mail.com', 'Password@123'),
(20, 1, 'someteacher@mail.com', 'somePassword@123'),
(30, 2, 'random1@mail.com', 'Password@123'),
(34, 2, 'rumansarkar.tit@mail.com', 'P@ssW0rd@Ruman#7856'),
(35, 2, 'rumansarkar.tit1@mail.com', 'somePassword@123'),
(36, 2, 'gaurisankarmajumder@tit.com', 'Teacher@C0mm0nP@SS'),
(37, 2, 'debjanitripura@tit.com', 'Teacher@C0mm0nP@SS'),
(38, 2, 'rumansarkar@tit.com', 'Teacher@C0mm0nP@SS'),
(39, 2, '', ''),
(42, 2, 'somemail@mail.com', 'Teacher@C0mm0nP@SS'),
(43, 1, 'newemailuser@mail.com', 'Password@123'),
(44, 1, 'myemail@mail.com', 'Password@123');

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
  ADD UNIQUE KEY `roll_number` (`roll_number`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `aadhaar` (`aadhaar`) USING BTREE,
  ADD KEY `PRTC` (`PRTC`) USING BTREE,
  ADD KEY `12th_marksheet` (`marksheet`) USING BTREE,
  ADD KEY `birth_certificate` (`birth_certificate`) USING BTREE,
  ADD KEY `ration_card` (`ration_card`) USING BTREE,
  ADD KEY `cast_certificate` (`caste_certificate`) USING BTREE;

--
-- Indexes for table `student_status`
--
ALTER TABLE `student_status`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `status` (`status`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
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
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
