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

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin_menu_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `admin_menu_link`) VALUES
(3, 'blocks'),
(2, 'dogs'),
(1, 'news');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_title`
--

CREATE TABLE `admin_menu_title` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin_menu_id` int(11) UNSIGNED NOT NULL,
  `admin_menu_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `id` int(11) UNSIGNED NOT NULL,
  `block_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `block_name`) VALUES
(3, 'contacts_text'),
(2, 'footer_text'),
(1, 'greetings');

-- --------------------------------------------------------

--
-- Table structure for table `block_image`
--

CREATE TABLE `block_image` (
  `id` int(11) UNSIGNED NOT NULL,
  `block_id` int(11) UNSIGNED NOT NULL,
  `block_image_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block_image_alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `block_image`
--

INSERT INTO `block_image` (`id`, `block_id`, `block_image_link`, `block_image_alt_text`) VALUES
(1, 1, 'about-us', 'about-us about-us');

-- --------------------------------------------------------

--
-- Table structure for table `block_text`
--

CREATE TABLE `block_text` (
  `id` int(11) UNSIGNED NOT NULL,
  `block_id` int(11) UNSIGNED NOT NULL,
  `block_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `block_text`
--

INSERT INTO `block_text` (`id`, `block_id`, `block_text`, `lang_id`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
(2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 1),
(3, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `block_title`
--

CREATE TABLE `block_title` (
  `id` int(11) UNSIGNED NOT NULL,
  `block_id` int(11) UNSIGNED NOT NULL,
  `block_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `block_title`
--

INSERT INTO `block_title` (`id`, `block_id`, `block_title`, `lang_id`) VALUES
(1, 1, 'About us', 1),
(2, 2, '', 1),
(3, 3, 'You are welcome', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dog`
--

CREATE TABLE `dog` (
  `id` int(11) UNSIGNED NOT NULL,
  `dog_birth` date DEFAULT NULL,
  `gender_type` tinyint(1) UNSIGNED NOT NULL,
  `for_sale` tinyint(1) DEFAULT NULL,
  `dog_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dog`
--

INSERT INTO `dog` (`id`, `dog_birth`, `gender_type`, `for_sale`, `dog_info`) VALUES
(10, '2020-12-01', 1, 1, '<p>asdf asdf asdf asdf a</p>\r\n<p>sd fa</p>\r\n<p>sdf asdfasdf asdf asdf</p>'),
(11, '2020-12-02', 0, 1, '<p>asdfasd fasdf asdf</p>'),
(12, '2020-12-03', 1, 0, '<p>asdfasdf</p>');

-- --------------------------------------------------------

--
-- Table structure for table `dog_gender`
--

CREATE TABLE `dog_gender` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `gender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_type` tinyint(1) UNSIGNED NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `dog_image`
--

CREATE TABLE `dog_image` (
  `id` int(11) UNSIGNED NOT NULL,
  `dog_id` int(11) UNSIGNED NOT NULL,
  `dog_image_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dog_image_alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `dog_name`
--

CREATE TABLE `dog_name` (
  `id` int(11) UNSIGNED NOT NULL,
  `dog_id` int(11) UNSIGNED NOT NULL,
  `dog_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dog_name`
--

INSERT INTO `dog_name` (`id`, `dog_id`, `dog_name`, `lang_id`) VALUES
(10, 10, 'asdf asdfwe ew', 1),
(11, 11, 'asdfasdf', 1),
(12, 12, 'asdfgasdgdfg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `lang_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `lang_code`, `lang_name`) VALUES
(1, 'ru', 'русский'),
(2, 'en', 'english'),
(3, 'uk', 'український');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `menu_subtitle`
--

CREATE TABLE `menu_subtitle` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `menu_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `menu_title`
--

CREATE TABLE `menu_title` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `menu_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `news_year` int(4) UNSIGNED NOT NULL,
  `news_month` int(2) UNSIGNED NOT NULL,
  `news_day` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_image`
--

CREATE TABLE `news_image` (
  `id` int(11) UNSIGNED NOT NULL,
  `news_id` int(11) UNSIGNED NOT NULL,
  `news_image_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_image_alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_link`
--

CREATE TABLE `news_link` (
  `id` int(11) UNSIGNED NOT NULL,
  `news_id` int(11) UNSIGNED NOT NULL,
  `news_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_text`
--

CREATE TABLE `news_text` (
  `id` int(11) UNSIGNED NOT NULL,
  `news_id` int(11) UNSIGNED NOT NULL,
  `news_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_title`
--

CREATE TABLE `news_title` (
  `id` int(11) UNSIGNED NOT NULL,
  `news_id` int(11) UNSIGNED NOT NULL,
  `news_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `settings_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link_UNIQUE` (`admin_menu_link`);

--
-- Indexes for table `admin_menu_title`
--
ALTER TABLE `admin_menu_title`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_text_lang1_idx` (`lang_id`),
  ADD KEY `fk_menu_text_menu1_idx` (`admin_menu_id`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`block_name`);

--
-- Indexes for table `block_image`
--
ALTER TABLE `block_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_block_image_block1_idx` (`block_id`);

--
-- Indexes for table `block_text`
--
ALTER TABLE `block_text`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_block_text_lang1_idx` (`lang_id`),
  ADD KEY `fk_block_text_block1` (`block_id`);

--
-- Indexes for table `block_title`
--
ALTER TABLE `block_title`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `block_id_UNIQUE` (`block_id`),
  ADD KEY `fk_block_title_lang1_idx` (`lang_id`);

--
-- Indexes for table `dog`
--
ALTER TABLE `dog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dog_gender`
--
ALTER TABLE `dog_gender`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`gender_name`),
  ADD KEY `fk_gender_lang1_idx` (`lang_id`);

--
-- Indexes for table `dog_image`
--
ALTER TABLE `dog_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dog_image_dog1_idx` (`dog_id`);

--
-- Indexes for table `dog_name`
--
ALTER TABLE `dog_name`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `block_id_UNIQUE` (`dog_id`),
  ADD KEY `fk_block_title_lang1_idx` (`lang_id`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`lang_name`),
  ADD UNIQUE KEY `link_UNIQUE` (`lang_code`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link_UNIQUE` (`menu_link`);

--
-- Indexes for table `menu_subtitle`
--
ALTER TABLE `menu_subtitle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_text_lang1_idx` (`lang_id`),
  ADD KEY `fk_menu_text_menu0` (`menu_id`);

--
-- Indexes for table `menu_title`
--
ALTER TABLE `menu_title`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_text_lang1_idx` (`lang_id`),
  ADD KEY `fk_menu_text_menu` (`menu_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_image`
--
ALTER TABLE `news_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_image_news1_idx` (`news_id`);

--
-- Indexes for table `news_link`
--
ALTER TABLE `news_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_link_lang1_idx` (`lang_id`),
  ADD KEY `fk_news_link_news1` (`news_id`);

--
-- Indexes for table `news_text`
--
ALTER TABLE `news_text`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_text_lang1_idx` (`lang_id`),
  ADD KEY `fk_news_text_news1` (`news_id`);

--
-- Indexes for table `news_title`
--
ALTER TABLE `news_title`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_title_lang1_idx` (`lang_id`),
  ADD KEY `fk_news_title_news1` (`news_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_settings_lang1_idx` (`lang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_menu_title`
--
ALTER TABLE `admin_menu_title`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `block_image`
--
ALTER TABLE `block_image`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `block_text`
--
ALTER TABLE `block_text`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `block_title`
--
ALTER TABLE `block_title`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dog`
--
ALTER TABLE `dog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dog_gender`
--
ALTER TABLE `dog_gender`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dog_image`
--
ALTER TABLE `dog_image`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `dog_name`
--
ALTER TABLE `dog_name`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_subtitle`
--
ALTER TABLE `menu_subtitle`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_title`
--
ALTER TABLE `menu_title`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news_image`
--
ALTER TABLE `news_image`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news_link`
--
ALTER TABLE `news_link`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_text`
--
ALTER TABLE `news_text`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news_title`
--
ALTER TABLE `news_title`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_menu_title`
--
ALTER TABLE `admin_menu_title`
  ADD CONSTRAINT `fk_menu_text_lang11` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menu_text_menu1` FOREIGN KEY (`admin_menu_id`) REFERENCES `admin_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `block_image`
--
ALTER TABLE `block_image`
  ADD CONSTRAINT `fk_block_image_block1` FOREIGN KEY (`block_id`) REFERENCES `block` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `block_text`
--
ALTER TABLE `block_text`
  ADD CONSTRAINT `fk_block_text_block1` FOREIGN KEY (`block_id`) REFERENCES `block` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_block_text_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `block_title`
--
ALTER TABLE `block_title`
  ADD CONSTRAINT `fk_block_name_block1` FOREIGN KEY (`block_id`) REFERENCES `block` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_block_title_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dog_gender`
--
ALTER TABLE `dog_gender`
  ADD CONSTRAINT `fk_gender_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dog_image`
--
ALTER TABLE `dog_image`
  ADD CONSTRAINT `fk_dog_image_dog1` FOREIGN KEY (`dog_id`) REFERENCES `dog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dog_name`
--
ALTER TABLE `dog_name`
  ADD CONSTRAINT `fk_block_title_lang10` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dog_name_dog1` FOREIGN KEY (`dog_id`) REFERENCES `dog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_subtitle`
--
ALTER TABLE `menu_subtitle`
  ADD CONSTRAINT `fk_menu_text_lang10` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menu_text_menu0` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_title`
--
ALTER TABLE `menu_title`
  ADD CONSTRAINT `fk_menu_text_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menu_text_menu` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_image`
--
ALTER TABLE `news_image`
  ADD CONSTRAINT `fk_news_image_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_link`
--
ALTER TABLE `news_link`
  ADD CONSTRAINT `fk_news_link_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_news_link_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_text`
--
ALTER TABLE `news_text`
  ADD CONSTRAINT `fk_news_text_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_news_text_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_title`
--
ALTER TABLE `news_title`
  ADD CONSTRAINT `fk_news_title_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_news_title_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `fk_settings_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
