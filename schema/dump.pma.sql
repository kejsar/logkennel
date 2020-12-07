-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2020 at 05:45 PM
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
-- Dumping data for table `dog`
--

INSERT INTO `dog` (`id`, `dog_birth`, `gender_type`, `for_sale`, `dog_info`) VALUES
(1, '2020-12-01', 1, 0, '<p>фывап кафпкеп крпавыапр ывапичясвми</p>\r\n<p>савпраыер вячапивап ваып в</p>\r\n<p>вачпрыапрывапывапвапф</p>'),
(2, '2020-12-01', 1, 0, '<p>фывап кафпкеп крпавыапр ывапичясвми</p>\r\n<p>савпраыер вячапивап ваып в</p>\r\n<p>вачпрыапрывапывапвапф</p>'),
(3, '2020-12-02', 0, 1, '<p>dhsdfhs sdfgsdf&nbsp;</p>\r\n<p>sdfgwaergfasfdgadsf sdfgsadfgasdf asdfasdfasd</p>'),
(4, '2020-12-03', 0, 0, '<p>sdfgasdfg&nbsp;</p>\r\n<p>dfghsdfhgsd&nbsp;</p>\r\n<p>shgsdfg dsfgsdfg</p>'),
(5, '2020-12-01', 0, 0, '<p>sdfg afasdfg asdfg afg adrfg&nbsp;</p>\r\n<p>fsghs ghsfgh sadfg dafg dgfa</p>\r\n<p>asdfgasd asdfasdfasdf</p>');

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
-- Dumping data for table `dog_image`
--

INSERT INTO `dog_image` (`id`, `dog_id`, `dog_image_link`, `dog_image_alt_text`, `main`) VALUES
(1, 1, '1607208890', 'alt image text', 1),
(2, 2, '1607209416', 'alt image text', 1),
(3, 3, '1607214377', 'alt image text', 1),
(4, 4, '1607214879', 'alt image text', 1),
(5, 5, '1607260056', 'asdwfewaf sadfawefasdfsadf asdfaDS', 1);

--
-- Dumping data for table `dog_name`
--

INSERT INTO `dog_name` (`id`, `dog_id`, `dog_name`, `lang_id`) VALUES
(1, 1, 'asdfsad', 1),
(2, 2, 'qwerqwer', 1),
(3, 3, 'sdfgsdfgd', 1),
(4, 4, 'ajy sdtwseargdsfa', 1),
(5, 5, 'sadgreagasdfgasdf', 1);

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `lang_code`, `lang_name`) VALUES
(1, 'ru', 'русский'),
(2, 'en', 'english'),
(3, 'uk', 'український');

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
