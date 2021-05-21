-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 04:23 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `descriptive_answers`
--

CREATE TABLE `descriptive_answers` (
  `quesID` int(11) NOT NULL,
  `Answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `descriptive_marks`
--

CREATE TABLE `descriptive_marks` (
  `studentID` varchar(100) NOT NULL,
  `questionID` varchar(200) NOT NULL,
  `marks` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `quesID` varchar(255) NOT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) NOT NULL,
  `option5` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`quesID`, `option1`, `option2`, `option3`, `option4`, `option5`, `Answer`) VALUES
('What is programming?', 'Precise steps of sequence', 'steps of sequence', 'Random steps of sequence', 'Linear steps of sequence', 'Non Linear steps of sequence', '1'),
('------- is a whole number data type', 'int', 'float', 'double', '', '', '1'),
('Each statement in c++ ends with a........', 'colon (:)', 'semi colon (;)', 'comma(,)', 'dot(.)', '', '2'),
('C++ is a case sensitive language', 'true', 'false', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QuesID` int(100) NOT NULL,
  `subjectID` varchar(100) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `qType` varchar(255) NOT NULL,
  `marks` int(255) NOT NULL,
  `options` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuesID`, `subjectID`, `Question`, `qType`, `marks`, `options`) VALUES
(4, 'Introduction to Programming', 'What is programming?', 'mcq', 1, 5),
(5, 'Introduction to Programming', '------- is a whole number data type', 'mcq', 1, 3),
(6, 'Introduction to Programming', 'Define Class in c++', 'discriptive', 3, 0),
(7, 'Introduction to Programming', 'What is dynamic memory allocation inC++', 'discriptive', 3, 0),
(8, 'Introduction to Programming', 'Each statement in c++ ends with a........', 'mcq', 1, 4),
(9, 'Introduction to programming', 'syntax of while loop', 'discriptive', 2, 0),
(10, 'Introduction to Programming', 'C++ is a case sensitive language', 'mcq', 1, 2),
(11, 'Introduction to Programming', 'Dynamic memory allocation in c and c++ ?', 'discriptive', 5, 0),
(12, 'Introdunction To Programming', 'What is Friend Function ? write syntax of friend functions? limits of friend functions?', 'discriptive', 5, 0),
(13, 'Introduction to Programming', 'What is Friend function and advantages and disadvantages of friend function?', 'discriptive', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quizcriteria`
--

CREATE TABLE `quizcriteria` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `mcq` int(10) NOT NULL,
  `twoM` int(10) NOT NULL DEFAULT 0,
  `threeM` int(10) NOT NULL DEFAULT 0,
  `fiveM` int(10) NOT NULL DEFAULT 0,
  `startingdate` date NOT NULL,
  `endingdate` date NOT NULL,
  `totalMarks` int(10) NOT NULL,
  `TotalTime` int(10) NOT NULL,
  `Remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizcriteria`
--

INSERT INTO `quizcriteria` (`id`, `subject`, `mcq`, `twoM`, `threeM`, `fiveM`, `startingdate`, `endingdate`, `totalMarks`, `TotalTime`, `Remarks`) VALUES
(15, 'Introduction to Programming', 3, 1, 1, 1, '2021-03-22', '2021-04-05', 13, 20, '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `StudyProgram` varchar(100) NOT NULL,
  `CGPA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `department`, `StudyProgram`, `CGPA`) VALUES
('0', '0', '0', '0'),
('zu@gmail.com', 'Computer Science', 'MCS', '0');

-- --------------------------------------------------------

--
-- Table structure for table `studentanswers`
--

CREATE TABLE `studentanswers` (
  `id` int(11) NOT NULL,
  `StudentName` text DEFAULT NULL,
  `Subject` text DEFAULT NULL,
  `question` text DEFAULT NULL,
  `Answer` varchar(500) DEFAULT NULL,
  `marks` int(10) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `qtype` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentanswers`
--

INSERT INTO `studentanswers` (`id`, `StudentName`, `Subject`, `question`, `Answer`, `marks`, `status`, `qtype`) VALUES
(219, 'zu@gmail.com', 'Introduction to Programming', 'What is programming?', 'Precise steps of sequence', 1, 'done', 'mcq'),
(220, 'zu@gmail.com', 'Introduction to Programming', '------- is a whole number data type', 'int', 1, 'done', 'mcq'),
(221, 'zu@gmail.com', 'Introduction to Programming', 'Each statement in c++ ends with a........', 'semi colon (;)', 1, 'done', 'mcq'),
(222, 'zu@gmail.com', 'Introduction to Programming', 'syntax of while loop', 'int i=1;\r\nwhile (i<=10) {cout<<i; i++;}', 2, 'done', 'discriptive'),
(223, 'zu@gmail.com', 'Introduction to Programming', 'Define Class in c++', 'class Student{ string name; int rollNo; public: Student(string s,int r){name=s;rollNo=r;}};', 2, 'done', 'discriptive'),
(224, 'zu@gmail.com', 'Introduction to Programming', 'Dynamic memory allocation in c and c++ ?', 'new and delete operators are used for dynamically memory allocation in c++', 2, 'done', 'discriptive');

-- --------------------------------------------------------

--
-- Table structure for table `studentquiz`
--

CREATE TABLE `studentquiz` (
  `ID` int(11) NOT NULL,
  `options` text DEFAULT '0',
  `Subject` text DEFAULT NULL,
  `option1` text DEFAULT NULL,
  `option2` text DEFAULT NULL,
  `option3` text DEFAULT NULL,
  `option4` text DEFAULT NULL,
  `option5` varchar(255) DEFAULT NULL,
  `Correct` text DEFAULT NULL,
  `QuestionNo` int(10) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `qtype` text DEFAULT NULL,
  `mark` int(10) DEFAULT NULL,
  `DesAnswer` text DEFAULT NULL,
  `DesMarks` int(11) DEFAULT NULL,
  `status` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentquiz`
--

INSERT INTO `studentquiz` (`ID`, `options`, `Subject`, `option1`, `option2`, `option3`, `option4`, `option5`, `Correct`, `QuestionNo`, `question`, `qtype`, `mark`, `DesAnswer`, `DesMarks`, `status`, `date`) VALUES
(462, '5', 'Introduction to Programming', 'Precise steps of sequence', 'steps of sequence', 'Random steps of sequence', 'Linear steps of sequence', 'Non Linear steps of sequence', '1', 1, 'What is programming?', 'mcq', NULL, NULL, NULL, NULL, NULL),
(463, '3', 'Introduction to Programming', 'int', 'float', 'double', '', '', '1', 2, '------- is a whole number data type', 'mcq', NULL, NULL, NULL, NULL, NULL),
(464, '4', 'Introduction to Programming', 'colon (:)', 'semi colon (;)', 'comma(,)', 'dot(.)', '', '2', 3, 'Each statement in c++ ends with a........', 'mcq', NULL, NULL, NULL, NULL, NULL),
(465, '0', 'Introduction to Programming', NULL, NULL, NULL, NULL, NULL, NULL, 4, 'syntax of while loop', 'discriptive', 2, NULL, NULL, NULL, NULL),
(466, '0', 'Introduction to Programming', NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Define Class in c++', 'discriptive', 3, NULL, NULL, NULL, NULL),
(467, '0', 'Introduction to Programming', NULL, NULL, NULL, NULL, NULL, NULL, 6, 'Dynamic memory allocation in c and c++ ?', 'discriptive', 5, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `studentID` varchar(255) NOT NULL,
  `subjectID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`studentID`, `subjectID`) VALUES
('zu@gmail.com', 'Introduction to Programming'),
('zu@gmail.com', 'Introduction to Programming'),
('zu@gmail.com', 'Data Communication');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectID` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectID`, `Title`, `Department`, `Description`) VALUES
('cs201', 'Introduction to Programming', 'Computer Science', 'Introduction to Programming'),
('cs601', 'Data Communication', 'Computer Science', 'Data com');

-- --------------------------------------------------------

--
-- Table structure for table `subject_result`
--

CREATE TABLE `subject_result` (
  `studentID` varchar(255) NOT NULL,
  `subjectID` varchar(255) NOT NULL,
  `Marks_obtained` int(100) NOT NULL,
  `totalMarks` decimal(10,0) NOT NULL,
  `percentage` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TeacherID` varchar(255) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherID`, `specialization`, `qualification`, `department`) VALUES
('t1@gmail.com', 'Software engineering', 'MSCS', 'computerscience'),
('t2@gmail.com', 'Networking', 'MSCS', 'Computer Science'),
('ali1@gmail.com', 'Database', 'MSCS', 'computer science');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subjects`
--

CREATE TABLE `teacher_subjects` (
  `teacherID` varchar(255) NOT NULL,
  `subjectID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_subjects`
--

INSERT INTO `teacher_subjects` (`teacherID`, `subjectID`) VALUES
('umar', 'Introduction to Programming'),
('ali', 'Data Communication');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `MobileNo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Gender`, `userType`, `Email`, `Password`, `MobileNo`) VALUES
(1, 'umar', 'male', 'teacher', 't1@gmail.com', '123', '123456789'),
(2, 'ali', 'male', 'teacher', 't2@gmail.com', '123', '1234567'),
(4, 'Zainab', 'female', 'student', 'zu@gmail.com', '123', '123'),
(5, 'ali', 'male', 'teacher', 'ali1@gmail.com', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuesID`);

--
-- Indexes for table `quizcriteria`
--
ALTER TABLE `quizcriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentanswers`
--
ALTER TABLE `studentanswers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentquiz`
--
ALTER TABLE `studentquiz`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuesID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quizcriteria`
--
ALTER TABLE `quizcriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `studentanswers`
--
ALTER TABLE `studentanswers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `studentquiz`
--
ALTER TABLE `studentquiz`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
