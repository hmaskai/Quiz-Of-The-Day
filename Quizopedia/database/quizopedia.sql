-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2016 at 07:41 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizopedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `demographics`
--

CREATE TABLE `demographics` (
  `asu_id` int(10) NOT NULL,
  `confidence` varchar(50) NOT NULL,
  `courses_completed` int(1) NOT NULL,
  `description` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(10) NOT NULL,
  `mother_tongue` varchar(10) NOT NULL,
  `country_of_residence` varchar(20) NOT NULL,
  `other_country` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='collects demographic information during registration';

--
-- Dumping data for table `demographics`
--

INSERT INTO `demographics` (`asu_id`, `confidence`, `courses_completed`, `description`, `gender`, `age`, `mother_tongue`, `country_of_residence`, `other_country`) VALUES
(24, 'Very Confident', 4, 'Some work experience in CS', 'male', '26-30', 'English', 'Another', 'Pakistan'),
(25, 'Moderately confident', 4, 'Self learer', 'female', '31-35', 'Another', 'Another', 'India'),
(21, 'Moderately confident', 4, 'Degree in CS', 'male', '18-25', 'English', 'Another', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `pretest` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Used for registration and login';

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `user_id`, `fname`, `lname`, `gender`, `pretest`) VALUES
('hmaskai@asu.edu', 'harshil', 16, 'Harshil', 'Maskai', 'male', 1),
('anuran@gmail.com', 'anuran', 21, 'Anuran', 'Duttaroy', 'male', 1),
('skardile@asu.edu', 'saurabh', 24, 'Saurabh', 'Kardile', 'male', 1),
('nbari@asu.edu', 'nilam', 25, 'Nilam', 'Bari', 'female', 1),
('sshinde@asu.edu', 'sudesh', 26, 'Sudesh', 'Shinde', 'male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(10) NOT NULL,
  `question_text` varchar(3000) NOT NULL,
  `option_1` varchar(500) NOT NULL,
  `option_2` varchar(500) NOT NULL,
  `option_3` varchar(500) NOT NULL,
  `option_4` varchar(500) NOT NULL,
  `correct_answer` int(1) NOT NULL,
  `tags` varchar(500) NOT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_text`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_answer`, `tags`, `date`, `type`) VALUES
(1, 'Which inheritance does java not support?', 'multiple', 'multilevel', 'single', 'runtime', 1, 'inheritance', NULL, 'Q'),
(2, 'How is unused memory cleared in java?', 'garbage bins', 'garbage collectors', 'crawlers', 'destructors', 2, 'garbage collection', NULL, 'Q'),
(3, '<label>Consider the followig code segment:</label>\r\n	  <pre>\r\npublic class MyTester {\r\n	public static void main(String[] args) {\r\n	int i = 14;\r\n	int j = 20;\r\n	int k;\r\n	k = j / i * 7 % 4;\r\n	}\r\n}</pre>\r\n	<label>What is the final value of the variable k:</label>', '0', '3', '10', '6', 2, 'operator precedence, arithmetic operators', NULL, 'P'),
(4, '<label>Consider the followig code segment:</label>\r\n	  <pre>\r\n.......\r\nint myYear = 2015;\r\nString myText = new String("Sun Devil!");\r\nint result = 0;\r\nif (myText.length() &gt; 20)\r\n{\r\nresult = 1;\r\nif (myText.length() &lt; 30 &amp;&amp; myYear &gt;= 2008)\r\nresult += 5;\r\n}\r\nelse\r\nif (myYear &gt;= 2000)\r\nresult += 10;\r\nelse\r\nresult += 100;\r\n.......</pre>\r\n	<label>What is the final value of the variable ''result'':</label>', '1', '100', '10', '6', 3, 'conditional statements, if else', NULL, 'P'),
(5, '<label>Consider the followig code segment:</label>\r\n	  <pre>\r\npublic class Rectangle {\r\n	private double x;\r\n	private double y;\r\n	private double height;\r\n	private double width;\r\n	public Rectangle (double x, double y, double height, double width) {\r\n	this.x = x;\r\n	this.y = y;\r\n	this.height = height;\r\n	this.width = width;\r\n	}\r\n	......\r\n}\r\n\r\nAssume, that one more method has been added to the class:\r\n\r\npublic void magnify (int ratio) {\r\n	height = height * ratio;\r\n	width = width * ratio;\r\n}\r\n\r\n\r\nWhat would be the output of the following code fragment using the new method?\r\n\r\n	......\r\n	Rectangle myBox = new Rectangle(50, 40, 10, 10);\r\n	myBox.magnify(3);\r\n	System.out.println(myBox.getHeight());\r\n	System.out.println(myBox.getWidth());\r\n	......</pre>\r\n	<label>What is the final value of the variable ''result'':</label>', '10, 10', '30, 30', '150, 120', '50, 40', 2, 'Object oriented programming, getter, setter, constructor', NULL, 'P'),
(6, '<label>Consider the followig code segment:</label>\r\n		  <pre>\r\nCode segment 1:					Code segment 2:					Code segment 3:\r\nint i = 3;					int i = 4;					int result = 0;\r\nint result = 0;					int result = 0;					for (int i = 5; i &gt; 0;i-- )\r\nwhile (i &lt; 4) {					do {							result = result + i;\r\n	result = result + i;			result = result + i;\r\n	i++;							i++;\r\n	}					} while (i &lt; 4);\r\n</pre>\r\n		<label>What is the final value of the variable ''result'':</label>', '4, 4, 15', '3, 5, 14', '4, 5, 16', '3, 4, 15', 4, 'loop, loops, for, while, do while, conditional blocks', NULL, 'P'),
(7, '<label>Consider the followig code segment:</label>\r\n		  <pre>\r\nint[] data = new int[5];\r\nfor (int i = 0; i &lt; 5; i++)\r\ndata[i] = i*i;\r\ndata[2] += 1;\r\nSystem.out.println(data[2]);\r\n</pre>\r\n		<label>What is the final value of the variable ''result'':</label>', '4', '5', '6', '7', 2, 'array, for, index', NULL, 'P'),
(8, '<label>Consider the followig code segment:</label>\r\n			  <pre>\r\nArrayList&lt;Double&gt; list = new ArrayList&lt;Double&gt;();\r\nlist.add(1.1);\r\nlist.add(2.2);\r\nlist.add(3.3);\r\nlist.remove(0);\r\nfor(Double d : list)\r\nSystem.out.println(d);\r\n</pre>\r\n			<label>output:</label>', '2.2, 3.3', '1.1, 2,2', '2.2, 2.2', '1.1, 3.3', 1, 'ArrayList, collections, list, java.util', NULL, 'P'),
(9, '<label>Consider the followig code segment:</label>\r\n			  <pre>\r\nClass Rectangle implements interface Shape, that declares method\r\npublic boolean contains (double x, double y)\r\n// Tests if the specified coordinates are inside the boundary of the Shape.\r\n\r\nThe implementation of the method contains in class Rectangle is following:\r\n\r\npublic boolean contains(double x, double y) {\r\ndouble x0 = getX();\r\ndouble y0 = getY();\r\nreturn (x &gt;= x0 &amp;&amp; y &gt;= y0 &amp;&amp; x &lt; x0 + getWidth() &amp;&amp; y &lt; y0 + getHeight());\r\n}\r\n\r\nWhat will be the output of the following code fragment:\r\n\r\nShape box = new Rectangle( 0, 0, 10, 20);\r\nSystem.out.println(box.contains(50, 10));\r\n</pre>\r\n			<label>output:</label>', 'false', 'NULL', 'Error', 'true', 1, 'inheritance, interface, implements', NULL, 'P'),
(10, '<label>Consider the followig code segment:</label>\r\n			  <pre>\r\nConsider the fragment of Class ColoredRectangle :\r\n\r\npublic class ColoredRectangle extends Rectanlge\r\n{\r\nString color;\r\npublic ColoredRectangle(double x, double y, double h, double w, String c)\r\n{\r\nsuper(x, y, h, w);\r\ncolor = c;\r\n}\r\npublic String getColor() {\r\nreturn color;\r\n}\r\n.......\r\n}\r\n\r\n\r\nWhat will be the output of the following code fragment using ColoredRectangle:\r\n\r\nColoredRectangle box = new ColoredRectangle (20, 10, 40, 30, "Blue");\r\nSystem.out.println(box.getColor());\r\nSystem.out.println(box.getHeight());\r\nSystem.out.println(box.getWidth());\r\n</pre>\r\n			<label>output:</label>', 'Null, 30.0, 40.0', 'Blue, 30.0, 40.0', 'Blue, 40.0, 30.0', 'Null, Null, Null', 3, 'inheritance, multiple inheritance', NULL, 'P'),
(11, '<pre>\r\nTake into account information in questions 7 and 8.\r\nConsider the following statement:\r\n\r\nColoredRectangle box = new ColoredRectangle(0, 0, 30, 50, "Green");\r\n</pre>\r\n			<label>Which of the following conditions return false:</label>', 'if (box instanceOf Rectangle)', 'if (box instanceOf ColoredRectangle)', 'if (box instanceOf Object)', 'if (box instanceOf ArrayList)', 1, 'dynamic polymorphism, inheritance', NULL, 'P'),
(12, '<label>Consider the followig code segment:</label>\r\n			  <pre>\r\nint a = 4 + 4;\r\nint b = 5 + 5;\r\nif (a != b)\r\nSystem.out.println(" Not equal ");\r\nif (a == b)\r\nSystem.out.println(" Equal ");\r\n</pre>\r\n			<label>Output:</label>', 'Not Equal', 'Equal', 'Error', '0', 1, 'conditional block, if else', NULL, 'P'),
(13, '<label>Which of the following performance is the slowest growth rate?</label>\r\n			<label>Output:</label>', 'O(n)', 'O(n^2)', 'O(nlog(n))', 'O(2^n)', 4, 'complexity, bigo', NULL, 'P'),
(14, '<label>What is the output for the following fragment of java codes?</label>\r\n			<label>Output:</label>\r\n			<pre>\r\nStack letterStack = new Stack();\r\nletterStack.push("X");\r\nletterStack.push("Y");\r\nletterStack.push("Z");\r\nletterStack.pop();\r\nSystem.out.println(letterStack);\r\n</pre>', '[X, Y, Z]\r\n', '[X, Y]', '[Y, Z]', '[Z]', 2, 'Stack, java.util, push, pop, collections', NULL, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `student_questions`
--

CREATE TABLE `student_questions` (
  `user_id` int(11) NOT NULL,
  `question_id` int(10) NOT NULL,
  `answer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_questions`
--

INSERT INTO `student_questions` (`user_id`, `question_id`, `answer`) VALUES
(24, 2, 1),
(16, 2, 2),
(16, 1, 2),
(16, 3, 1),
(16, 4, 2),
(16, 5, 1),
(16, 6, 4),
(16, 7, 2),
(16, 8, 3),
(16, 9, 1),
(16, 10, 2),
(16, 11, 2),
(16, 12, 1),
(16, 13, 4),
(16, 14, 3),
(24, 3, 2),
(24, 4, 3),
(24, 5, 2),
(24, 6, 3),
(24, 7, 3),
(24, 8, 4),
(24, 9, 3),
(24, 10, 1),
(24, 11, 4),
(24, 12, 2),
(24, 13, 4),
(24, 14, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `student_questions`
--
ALTER TABLE `student_questions`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
