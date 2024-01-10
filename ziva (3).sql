-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 08:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ziva`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`) VALUES
(1, 'Programming'),
(2, 'Web Development'),
(3, 'App Development'),
(5, 'Data Structures');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `course_category` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `images` varchar(50) NOT NULL,
  `goal` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `description`, `course_category`, `price`, `images`, `goal`) VALUES
(3, 'Java Script', 'You interact with JavaScript code all the time .It powers dynamic behavior on websites (like this one) and plays an important role in many fields.In this course, you’ll learn JavaScript fundamentals ', 2, 3000, 'image/js.png', 'Become an Advanced, Confident, and Modern JavaScript Developer from scratch. JavaScript fundamentals: variables, if/else, operators, boolean logic, functions, arrays, objects, loops, strings, etc.'),
(5, 'C++', 'With its adaptability and fast rendering, you’ll find the C++ programming language used everywhere. This course will help you learn C++ basics and give you hands-on experience to create your own proje', 1, 2000, 'image/c++.png', 'Learn from the very basics concepts like loops ,Arrays 1D and 2D, Functions to advance topics like pointers, Dynamic Memory Allocations ,Recursion ,Strings.'),
(6, 'Python', 'This Python programming basics / fundamentals course helps you to learn how to write Python code, course carefully designed where students will learn how to build real life applications in Python.', 1, 2000, 'image/python-training.png', 'This Python programming basics / fundamentals course helps you to learn how to write Python code, course carefully designed where students will learn how to build real life applications in Python'),
(9, 'Flutter', 'You interact with JavaScript code all the time .It powers dynamic behavior on websites (like this one) and plays an important role in many fields.In this course, you’ll learn JavaScript fundamentals ', 3, 4000, 'image/flutter.jpg', 'Become an Advanced, Confident, and Modern JavaScript Developer from scratch. JavaScript fundamentals: variables, if/else, operators, boolean logic, functions, arrays, objects, loops, strings, etc.'),
(10, 'C for Everyone', 'In the new world we live in, coding is a universally valuable skill, whether you\'re a scientist, artist, or a humanist. Algorithms are everywhere, and we all have to understand how they work. The C la', 1, 2000, 'image/C.png', 'After competing this course, you will be able to Develop a C program,Control the sequence of the program and give logical outputs\r\nImplement strings in your C program with storing different data types in the same memory .Understand the basics of file handling mechanisms\r\nExplain the uses of pre-processors and various memory models'),
(11, 'HTML and CSS for Web Developers', 'In this course, we will learn the basic tools that every web page coder needs to know. We will start from the ground up by learning how to implement modern web pages with HTML and CSS. We will then ad', 2, 4000, 'image/htmlcss.png', 'You’ll be able to code up a web page that will be just as useful on a mobile phone as on a desktop computer. No “pinch and zoom” required! '),
(12, 'React Basics', 'React is a powerful JavaScript library that you can use to build user interfaces for web  applications (apps). In this course, you will explore the fundamental concepts that underpin the React library', 2, 3000, 'image/react.png', 'By the end of this course, you will be able to:\r\n•	Use reusable components to render views where data changes over time\r\n•	Create more scalable and maintainable websites and apps \r\n•	Use props to pass data between components \r\n•	Create dynamic and interactive web pages and apps\r\n•	Use forms to allow users to interact with the web page \r\n•	Build an application in React'),
(13, 'Basics of Web Development ', 'This Specialization covers how to write syntactically correct HTML5 and CSS3, and how to create interactive web experiences with JavaScript. Mastering this range of technologies will allow you to deve', 2, 4000, 'image/webdesign.jpg', 'At the end of the course You will be able to include your ability to design and implement a responsive site that utilizes tools to create a site that is accessible to a wide audience, including those with visual, audial, physical, and cognitive impairments.'),
(14, 'Introduction to Android App Development', 'This course is an ideal stepping stone if you want to become a mobile developer. We’ll introduce you to this career path and give you a high-level overview of programming and the tools needed to devel', 3, 3000, 'image/android.png', 'Through this course you will Explore the Android Studio and the fundamental concepts of Android app development. Learn about operating systems and different platforms for creating mobile apps. You’ll conclude your introduction to Android application development by building out each aspect of a guided project.'),
(15, 'Data Structures For Everyone', 'A good algorithm usually comes together with a set of good data structures that allow the algorithm to manipulate the data efficiently. In this online course, we consider the common data structures th', 5, 3000, 'image/dsa1.png', 'Through this course  You will learn how these data structures are implemented in different programming languages and will practice implementing them in our programming assignments. This will help you to understand what is going on inside a particular built-in implementation of a data structure and what to expect from it. You will also learn typical use cases for these data structures.');

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollments`
--

CREATE TABLE `course_enrollments` (
  `enroll_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `payment_done` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_enrollments`
--

INSERT INTO `course_enrollments` (`enroll_id`, `student_id`, `course_id`, `city`, `phone_number`, `gender`, `payment_done`) VALUES
(2, 8, 3, 'sama', '0101092929', 'male', 0),
(11, 7, 3, 'sama', '0101092929', 'male', 1),
(12, 4, 3, 'karachi', '123456789', 'male', 0),
(13, 11, 5, 'karachi', '03352822814', 'female', 0),
(14, 11, 12, 'karachi', '03352822814', 'female', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` varchar(200) NOT NULL,
  `lesson_course` int(11) NOT NULL,
  `lesson_video` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `lesson_name`, `lesson_course`, `lesson_video`) VALUES
(5, 'Introduction to Javascript', 3, 'https://www.youtube.com/embed/VEQYRJkoRBY'),
(6, 'Data Types', 3, 'https://www.youtube.com/embed/9vIi56spxo8com/'),
(7, 'Say Hello To React Js', 12, 'https://www.youtube.com/embed/ZOrFTWSAzYw'),
(8, 'What are Props In React Js', 12, 'https://www.youtube.com/embed/SC66BW1WZpY'),
(9, 'Why We need JSX', 12, 'https://www.youtube.com/embed/Ek9Nvqp1WVo'),
(10, 'Using Variable in JSX', 12, 'https://www.youtube.com/embed/o1m2IeFonQU'),
(13, 'First Functional Component', 12, 'https://www.youtube.com/embed/VcgacXluI0s'),
(14, 'basics Component Props', 12, 'https://www.youtube.com/embed/DTyvcynHduU'),
(15, 'Create React App', 12, 'https://www.youtube.com/embed/0mgRwEhH0LY'),
(17, 'What Is JavaScript ', 3, 'https://www.youtube.com/embed/Q_CRM2lXXBg'),
(18, 'Creating your first application', 3, 'https://www.youtube.com/embed/nQu2bbh4Vyc'),
(19, 'Structure of C++', 5, 'https://www.youtube.com/embed/Z8gO8Te0FuI'),
(20, 'Statements and Operators', 5, 'https://www.youtube.com/embed/5adPJ2uXKoo'),
(21, 'Classes And Objects', 5, 'https://www.youtube.com/embed/Qce1grGbBgg'),
(22, 'Inheritance and Polymorphism', 5, 'https://www.youtube.com/embed/gcjSY-i9WUs'),
(23, 'Strings', 6, 'https://www.youtube.com/embed/k9TUPpGqYTo'),
(24, 'List, Tuple And Sets', 6, 'https://www.youtube.com/embed/W8KRzm-HUcc'),
(25, 'Dictionaries', 6, 'https://www.youtube.com/embed/daefaLgNkw0'),
(26, 'Functions', 6, 'https://www.youtube.com/embed/9Os0o3wzS_I'),
(27, 'Decorators', 6, 'https://www.youtube.com/embed/FsAPt_9Bf3U'),
(28, 'Property Decorators - Getters, Setters, and Deleters', 6, 'https://www.youtube.com/embed/jCzT9XFZ5bw'),
(29, 'Flutter Overview', 9, 'https://www.youtube.com/embed/bKueYVtV0eA'),
(30, 'Creating a Flutter App in Android Studio', 9, 'https://www.youtube.com/embed/TSIhiZ5jRB0'),
(31, 'Scaffold & App Bar Widgets', 9, 'https://www.youtube.com/embed/C5lpPjoivaw'),
(32, 'Colours & Fonts', 9, 'https://www.youtube.com/embed/km2P_KQJyO0'),
(33, 'Stateless Widgets & Hot Reload', 9, 'https://www.youtube.com/embed/zwPBMg3SHVU'),
(34, 'Images & Assets', 9, 'https://www.youtube.com/embed/Hxh6nNHSUjo'),
(35, 'Buttons & Icons', 9, 'https://www.youtube.com/embed/ABmqtI7ec7E'),
(36, 'Containers & Padding', 9, 'https://www.youtube.com/embed/H0cJ0gUlgE8'),
(37, 'C Programming Features And First C Program', 10, 'https://www.youtube.com/embed/rLf3jnHxSmU'),
(39, 'Introduction', 11, 'https://www.youtube.com/embed/hu-q2zYwEYs'),
(40, 'HTML Basics', 11, 'https://www.youtube.com/embed/mbeT8mpmtHA'),
(41, 'CSS Basics', 11, 'https://www.youtube.com/embed/D3iEE29ZXRM'),
(42, 'CSS Grid Basics', 11, 'https://www.youtube.com/embed/xPuYbmmPdEM'),
(43, 'Full Course', 14, 'https://www.youtube.com/embed/fis26HvvDII'),
(45, ' how to make a website', 13, 'https://www.youtube.com/embed/gQojMIhELvM'),
(46, 'How to build webpages with HTML, CSS, Javascript', 13, 'https://www.youtube.com/embed/3JluqTojuME'),
(49, 'Basic CSS - How to build a website with HTML & CSS\r\n', 13, 'https://www.youtube.com/embed/gBi8Obib0tw'),
(51, 'Introduction to Data Structures', 15, 'https://www.youtube.com/embed/xLetJpcjHS0'),
(52, 'Data Types vs. Abstract Data Types', 15, 'https://www.youtube.com/embed/ZniDyolzrBw'),
(53, 'Types of Data Structures', 15, 'https://www.youtube.com/embed/T9DSBhBR_I4');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymet_id` int(11) NOT NULL,
  `enroll_id` int(11) NOT NULL,
  `card_holder_name` varchar(255) NOT NULL,
  `card_no` int(100) NOT NULL,
  `cvc` int(11) NOT NULL,
  `card_expiry` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymet_id`, `enroll_id`, `card_holder_name`, `card_no`, `cvc`, `card_expiry`) VALUES
(3, 12, 'zzzzz', 4242, 999, 2028),
(4, 13, 'Syedazobia', 4242, 123, 2029),
(5, 14, 'Sana', 4242, 123, 2029);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_occ` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_img` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(1, 'Ifra Siddiqui', 'ifra@gmail.com', 'ifra123', '', ''),
(2, 'Aleena Fatima', 'Aleena@gmail.com', 'aleena123', '', ''),
(4, 'Vandana', 'Vandana@gmail.com', 'vandana123', '', ''),
(5, 'Zobia', 'Zobia@gmail.com', 'zobia123', '', ''),
(7, 'xxx', 'xyz@gmail.com', 'abc123', '', ''),
(8, 'abc', 'abc@gmail.com', 'abc', '', ''),
(9, 'zzz', 'ssss@gmail.com', '123456', '', ''),
(10, 'zobiairshad', 'zobia123@gmail.com', 'zobia123@', '', ''),
(11, 'zobiatest', 'zobiatest@gmail.com', 'Pakistan971@', '', ''),
(12, 'hafsaa', 'hafsa@gmail.com', 'pakistan971@P', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_category` (`course_category`);

--
-- Indexes for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `lesson_course` (`lesson_course`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymet_id`),
  ADD KEY `enroll_id` (`enroll_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `course_category` FOREIGN KEY (`course_category`) REFERENCES `categories` (`categories_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`stu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lesson_course` FOREIGN KEY (`lesson_course`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `enroll_id` FOREIGN KEY (`enroll_id`) REFERENCES `course_enrollments` (`enroll_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
