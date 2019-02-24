-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2013 at 11:17 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `store`
--
DROP DATABASE IF EXISTS `store`;
CREATE DATABASE `store` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `store`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `summary` text NOT NULL,
  `cover` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `price`, `category_id`, `summary`, `cover`, `created_date`, `modified_date`) VALUES
(1, 'The Design of the UNIX Operating System', 'Maurice J. Bach', 49, 1, 'This book describes the internal algorithms and the structures that form the basis of the UNIXÂ® operating system and their relationship to the programmer interface. The system description is based on UNIX System V Release 2 supported by AT&T, with some features from Release 3. ', 'unix.jpg', '2013-07-12 15:40:11', '2013-07-12 15:40:41'),
(2, 'Programming in Scala', 'Martin Odersky, Lex Spoon, and Bill Venners', 29, 4, 'This book is a tutorial for the Scala programming language, written by people directly involved in the development of Scala. Our goal is that by reading this book, you can learn everything you need to be a productive Scala programmer. All examples in this book compile with Scala version 2.7.2.', 'scala.jpg', '2013-07-12 15:41:39', '2013-07-12 15:41:39'),
(3, 'Beginning Perl', 'Curtis â€œOvidâ€ Poe', 39, 4, 'Perl is the ever-popular, flexible, open source programming language that has been called the programmersâ€™ Swiss army knife. This book introduces Perl to both new programmers and experienced ones who are looking to learn a new language. In the tradition of the popular Wrox Beginning guides, it presents step-by-step guidance in getting started, a host of try-it-out exercises, real-world examples, and everything necessary for a Perl novice to start programming with confidence.', 'perl.jpg', '2013-07-12 15:43:28', '2013-07-12 15:43:28'),
(4, 'Ubuntu Pocket Guide and Reference', 'Keir Thomas', 9, 1, 'A very well written introductory book with no fluf for the Ubuntu operating system. The book is rather dated though (Hasnt been updated since 2009) and new users may be confused with the changes such as the Unity interface that have gone into Ubuntu over the years. ', 'ubuntu.jpg', '2013-07-12 15:45:06', '2013-07-12 15:45:06'),
(5, 'Introduction to Data Science', 'Jeffrey Stanton ', 59, 1, 'This book provides non-technical readers with a gentle introduction to essential concepts and activities of data science. For more technical readers, the book provides explanations and code for a range of interesting applications using the open source R language for statistical computing and graphics', 'data.jpg', '2013-07-12 15:45:42', '2013-07-12 15:45:42'),
(6, 'UX Design for Startups', 'Marcin Treder ', 39, 1, 'A must read for any startup or grown-up company that wishes to keep its startup spirit and conquer the world with stunning UX Design.', 'ux.jpg', '2013-07-12 15:46:16', '2013-07-12 15:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `remark`, `created_date`, `modified_date`) VALUES
(1, 'Technology', '', '2013-06-22 08:19:41', '2013-06-22 08:19:41'),
(2, 'History', '', '2013-06-22 08:19:45', '2013-06-22 08:19:45'),
(3, 'Sci-Fi', '', '2013-06-22 08:19:54', '2013-06-22 08:19:54'),
(4, 'Language', '', '2013-06-22 08:20:05', '2013-06-22 08:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
