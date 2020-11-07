-- phpMyAdmin SQL Dump
-- version 4.3.13.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2020 at 04:07 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.6.40.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `logkennel`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `id` int(11) unsigned NOT NULL,
  `block_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `block_text`
--

CREATE TABLE IF NOT EXISTS `block_text` (
  `id` int(11) unsigned NOT NULL,
  `block_id` int(11) unsigned NOT NULL,
  `block_text` text NOT NULL,
  `lang_id` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `block_title`
--

CREATE TABLE IF NOT EXISTS `block_title` (
  `id` int(11) unsigned NOT NULL,
  `block_id` int(11) unsigned NOT NULL,
  `block_title` varchar(255) NOT NULL,
  `lang_id` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dog`
--

CREATE TABLE IF NOT EXISTS `dog` (
  `id` int(11) unsigned NOT NULL,
  `birth` date DEFAULT NULL,
  `teeth` varchar(255) DEFAULT NULL,
  `patella` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `after` varchar(255) DEFAULT NULL,
  `under` varchar(255) DEFAULT NULL,
  `gender_id` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dog_gender`
--

CREATE TABLE IF NOT EXISTS `dog_gender` (
  `id` tinyint(1) unsigned NOT NULL,
  `gender` varchar(255) NOT NULL,
  `lang_id` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dog_gender`
--

INSERT INTO `dog_gender` (`id`, `gender`, `lang_id`) VALUES
(1, 'мужской', 1),
(2, 'женский', 1),
(3, 'male', 2),
(4, 'female', 2),
(5, 'чоловіча', 3),
(6, 'жіноча', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dog_image`
--

CREATE TABLE IF NOT EXISTS `dog_image` (
  `id` int(11) unsigned NOT NULL,
  `dog_id` int(11) unsigned NOT NULL,
  `link` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `main` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dog_result`
--

CREATE TABLE IF NOT EXISTS `dog_result` (
  `id` int(11) unsigned NOT NULL,
  `dog_id` int(11) unsigned NOT NULL,
  `result_text` varchar(255) NOT NULL,
  `lang_id` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` tinyint(1) unsigned NOT NULL,
  `link` varchar(3) NOT NULL,
  `lang` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `link`, `lang`) VALUES
(1, 'rus', 'русский'),
(2, 'eng', 'english'),
(3, 'ukr', 'український');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) unsigned NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `link`, `image`) VALUES
(1, 'main', 'img-main.jpg'),
(2, 'males', 'img-males.jpg'),
(3, 'females', 'img-females.jpg'),
(4, 'puppies', 'img-puppies.jpg'),
(5, 'news', 'img-news.jpg'),
(6, 'contact', 'img-contact.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu_subtitle`
--

CREATE TABLE IF NOT EXISTS `menu_subtitle` (
  `id` int(11) unsigned NOT NULL,
  `menu_id` int(11) unsigned NOT NULL,
  `menu_subtitle` varchar(255) NOT NULL,
  `lang_id` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_subtitle`
--

INSERT INTO `menu_subtitle` (`id`, `menu_id`, `menu_subtitle`, `lang_id`) VALUES
(1, 1, 'Короткое описание страницы - Главная', 1),
(2, 2, 'Короткое описание страницы - Мальчики', 1),
(3, 3, 'Короткое описание страницы - Девочки', 1),
(4, 4, 'Короткое описание страницы - Щеночки', 1),
(5, 5, 'Короткое описание страницы - Новости', 1),
(6, 6, 'Короткое описание страницы - Контакты', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_title`
--

CREATE TABLE IF NOT EXISTS `menu_title` (
  `id` int(11) unsigned NOT NULL,
  `menu_id` int(11) unsigned NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `lang_id` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_title`
--

INSERT INTO `menu_title` (`id`, `menu_id`, `menu_title`, `lang_id`) VALUES
(19, 1, 'Главная', 1),
(20, 1, 'Main', 2),
(21, 2, 'Мальчики', 1),
(22, 2, 'Male', 2),
(23, 3, 'Девочки', 1),
(24, 3, 'Female', 2),
(25, 4, 'Щеночки', 1),
(26, 4, 'Puppies', 2),
(27, 5, 'Новости', 1),
(28, 5, 'News', 2),
(29, 6, 'Контакты', 1),
(30, 6, 'Contact', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) unsigned NOT NULL,
  `year` int(4) unsigned NOT NULL,
  `month` int(2) unsigned NOT NULL,
  `day` int(2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_image`
--

CREATE TABLE IF NOT EXISTS `news_image` (
  `id` int(11) unsigned NOT NULL,
  `news_id` int(11) unsigned NOT NULL,
  `link` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `main` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_link`
--

CREATE TABLE IF NOT EXISTS `news_link` (
  `id` int(11) unsigned NOT NULL,
  `news_id` int(11) unsigned NOT NULL,
  `news_link` text NOT NULL,
  `lang_id` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_text`
--

CREATE TABLE IF NOT EXISTS `news_text` (
  `id` int(11) unsigned NOT NULL,
  `news_id` int(11) unsigned NOT NULL,
  `news_text` text NOT NULL,
  `lang_id` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_title`
--

CREATE TABLE IF NOT EXISTS `news_title` (
  `id` int(11) unsigned NOT NULL,
  `news_id` int(11) unsigned NOT NULL,
  `news_title` text NOT NULL,
  `lang_id` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`block_name`);

--
-- Indexes for table `block_text`
--
ALTER TABLE `block_text`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_block_text_lang1_idx` (`lang_id`), ADD KEY `fk_block_text_block1` (`block_id`);

--
-- Indexes for table `block_title`
--
ALTER TABLE `block_title`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `block_id_UNIQUE` (`block_id`), ADD KEY `fk_block_title_lang1_idx` (`lang_id`);

--
-- Indexes for table `dog`
--
ALTER TABLE `dog`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_dog_gender1_idx` (`gender_id`);

--
-- Indexes for table `dog_gender`
--
ALTER TABLE `dog_gender`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`gender`), ADD KEY `fk_gender_lang1_idx` (`lang_id`);

--
-- Indexes for table `dog_image`
--
ALTER TABLE `dog_image`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_dog_image_dog1_idx` (`dog_id`);

--
-- Indexes for table `dog_result`
--
ALTER TABLE `dog_result`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_result_dog1_idx` (`dog_id`), ADD KEY `fk_result_lang1_idx` (`lang_id`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`lang`), ADD UNIQUE KEY `link_UNIQUE` (`link`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `link_UNIQUE` (`link`);

--
-- Indexes for table `menu_subtitle`
--
ALTER TABLE `menu_subtitle`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_menu_text_lang1_idx` (`lang_id`), ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `menu_title`
--
ALTER TABLE `menu_title`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_menu_text_lang1_idx` (`lang_id`), ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_image`
--
ALTER TABLE `news_image`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_news_image_news1_idx` (`news_id`);

--
-- Indexes for table `news_link`
--
ALTER TABLE `news_link`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_news_link_lang1_idx` (`lang_id`), ADD KEY `fk_news_link_news1` (`news_id`);

--
-- Indexes for table `news_text`
--
ALTER TABLE `news_text`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_news_text_lang1_idx` (`lang_id`), ADD KEY `fk_news_text_news1` (`news_id`);

--
-- Indexes for table `news_title`
--
ALTER TABLE `news_title`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_news_title_lang1_idx` (`lang_id`), ADD KEY `fk_news_title_news1` (`news_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `block_text`
--
ALTER TABLE `block_text`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `block_title`
--
ALTER TABLE `block_title`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dog`
--
ALTER TABLE `dog`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dog_gender`
--
ALTER TABLE `dog_gender`
  MODIFY `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dog_image`
--
ALTER TABLE `dog_image`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dog_result`
--
ALTER TABLE `dog_result`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `menu_subtitle`
--
ALTER TABLE `menu_subtitle`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `menu_title`
--
ALTER TABLE `menu_title`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_image`
--
ALTER TABLE `news_image`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_link`
--
ALTER TABLE `news_link`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_text`
--
ALTER TABLE `news_text`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_title`
--
ALTER TABLE `news_title`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

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
-- Constraints for table `dog`
--
ALTER TABLE `dog`
ADD CONSTRAINT `fk_dog_gender1` FOREIGN KEY (`gender_id`) REFERENCES `dog_gender` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `dog_result`
--
ALTER TABLE `dog_result`
ADD CONSTRAINT `fk_result_dog1` FOREIGN KEY (`dog_id`) REFERENCES `dog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_result_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
