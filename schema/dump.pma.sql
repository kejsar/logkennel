-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2020 at 03:04 PM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logkennel`
--

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `lang_code`, `lang_name`) VALUES
(1, 'ru', 'русский'),
(2, 'en', 'english'),
(3, 'uk', 'український');

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `admin_menu_link`) VALUES
(3, 'blocks'),
(2, 'dogs'),
(1, 'news');

--
-- Dumping data for table `admin_menu_title`
--

INSERT INTO `admin_menu_title` (`id`, `admin_menu_id`, `admin_menu_title`, `lang_id`) VALUES
(1, 1, 'Новости', 1),
(2, 1, 'News', 2),
(3, 2, 'Собачки', 1),
(4, 2, 'Dogs', 2),
(5, 3, 'Блоки', 1),
(6, 3, 'Blocks', 2);

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `block_name`) VALUES
(3, 'contacts_text'),
(2, 'footer_text'),
(1, 'greetings');

--
-- Dumping data for table `block_image`
--

INSERT INTO `block_image` (`id`, `block_id`, `block_image_link`, `block_image_alt_text`) VALUES
(1, 1, 'about-us', 'about-us about-us');

--
-- Dumping data for table `block_text`
--

INSERT INTO `block_text` (`id`, `block_id`, `block_text`, `lang_id`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
(2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 1),
(3, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1);

--
-- Dumping data for table `block_title`
--

INSERT INTO `block_title` (`id`, `block_id`, `block_title`, `lang_id`) VALUES
(1, 1, 'About us', 1),
(2, 2, '', 1),
(3, 3, 'You are welcome', 1);

--
-- Dumping data for table `dog_gender`
--

INSERT INTO `dog_gender` (`id`, `gender_name`, `gender_type`, `lang_id`) VALUES
(1, 'мальчик', 1, 1),
(2, 'девочка', 0, 1),
(3, 'male', 1, 2),
(4, 'female', 0, 2),
(5, 'хлопчик', 1, 3),
(6, 'дівчинка', 0, 3);

--
-- Dumping data for table `dog`
--

INSERT INTO `dog` (`id`, `dog_birth`, `gender_type`, `for_sale`, `dog_info`) VALUES
(10, '2020-12-01', 1, 1, '<p>asdf asdf asdf asdf a</p>\r\n<p>sd fa</p>\r\n<p>sdf asdfasdf asdf asdf</p>'),
(11, '2020-12-02', 0, 1, '<p>asdfasd fasdf asdf</p>'),
(12, '2020-12-03', 1, 0, '<p>asdfasdf</p>');

--
-- Dumping data for table `dog_image`
--

INSERT INTO `dog_image` (`id`, `dog_id`, `dog_image_link`, `dog_image_alt_text`, `main`) VALUES
(48, 10, '1607377051', 'asdf asdf asdf asdfwae fwe', 1),
(49, 11, '1607377070', 'sdfgsdfg', 1),
(50, 12, '1607377090', 'asdfasdf', 1),
(51, 10, '16073771170', '', 0),
(52, 10, '16073771181', '', 0),
(53, 10, '16073771182', '', 0),
(54, 10, '16073771183', '', 0),
(55, 10, '16073771194', '', 0),
(56, 10, '16073771195', '', 0),
(58, 10, '16073771570', '', 0),
(59, 10, '16073771581', '', 0),
(60, 10, '16073771582', '', 0),
(61, 10, '16073771650', '', 0);

--
-- Dumping data for table `dog_name`
--

INSERT INTO `dog_name` (`id`, `dog_id`, `dog_name`, `lang_id`) VALUES
(10, 10, 'asdf asdfwe ew', 1),
(11, 11, 'asdfasdf', 1),
(12, 12, 'asdfgasdgdfg', 1);

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_link`, `menu_image`) VALUES
(1, 'main', 'img-main.jpg'),
(2, 'news', 'img-news.jpg'),
(3, 'males', 'img-males.jpg'),
(4, 'females', 'img-females.jpg'),
(5, 'for-sale', 'img-for-sale.jpg'),
(6, 'contact', 'img-contact.jpg');

--
-- Dumping data for table `menu_subtitle`
--

INSERT INTO `menu_subtitle` (`id`, `menu_id`, `menu_subtitle`, `lang_id`) VALUES
(1, 1, 'Короткое описание страницы - Главная', 1),
(2, 2, 'Короткое описание страницы - Новости', 1),
(3, 3, 'Короткое описание страницы - Мальчики', 1),
(4, 4, 'Короткое описание страницы - Девочки', 1),
(5, 5, 'Короткое описание страницы - Продажа', 1),
(6, 6, 'Короткое описание страницы - Контакты', 1);

--
-- Dumping data for table `menu_title`
--

INSERT INTO `menu_title` (`id`, `menu_id`, `menu_title`, `lang_id`) VALUES
(1, 1, 'Главная', 1),
(2, 1, 'Main', 2),
(3, 2, 'Новости', 1),
(4, 2, 'News', 2),
(5, 3, 'Мальчики', 1),
(6, 3, 'Male', 2),
(7, 4, 'Девочки', 1),
(8, 4, 'Female', 2),
(9, 5, 'Продажа', 1),
(10, 5, 'For Sale', 2),
(11, 6, 'Контакты', 1),
(12, 6, 'Contact', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
