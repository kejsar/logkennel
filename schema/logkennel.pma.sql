-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2020 at 10:47 AM
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
  `link` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `link`, `image`) VALUES
(1, 'main', NULL),
(2, 'dog', NULL),
(3, 'news', NULL),
(4, 'block', NULL),
(5, 'menu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_title`
--

CREATE TABLE `admin_menu_title` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_menu_title`
--

INSERT INTO `admin_menu_title` (`id`, `menu_id`, `menu_title`, `lang_id`) VALUES
(1, 1, 'Главная', 1),
(2, 1, 'Main', 2),
(3, 2, 'Собачки', 1),
(4, 2, 'Dogs', 2),
(5, 3, 'Новости', 1),
(6, 3, 'News', 2),
(7, 4, 'Блоки', 1),
(8, 4, 'Blocks', 2),
(9, 5, 'Меню', 1),
(10, 5, 'Menu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `id` int(11) UNSIGNED NOT NULL,
  `block_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `block_text`
--

CREATE TABLE `block_text` (
  `id` int(11) UNSIGNED NOT NULL,
  `block_id` int(11) UNSIGNED NOT NULL,
  `block_text` text NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `block_title`
--

CREATE TABLE `block_title` (
  `id` int(11) UNSIGNED NOT NULL,
  `block_id` int(11) UNSIGNED NOT NULL,
  `block_title` varchar(255) NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dog`
--

CREATE TABLE `dog` (
  `id` int(11) UNSIGNED NOT NULL,
  `birth` date DEFAULT NULL,
  `teeth` varchar(255) DEFAULT NULL,
  `patella` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `after` varchar(255) DEFAULT NULL,
  `under` varchar(255) DEFAULT NULL,
  `gender_type` tinyint(1) UNSIGNED NOT NULL,
  `puppy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dog`
--

INSERT INTO `dog` (`id`, `birth`, `teeth`, `patella`, `owner`, `after`, `under`, `gender_type`, `puppy`) VALUES
(1, '1928-01-01', 'sdfg', 'wert', 'ytu', 'tyuk', 'fgh', 1, 0),
(2, '1985-10-04', 'afsdgar', 'awsrtwqer', 'gdfsgdfg', 'xcvbsd', 'gsaergsdf', 1, 0),
(3, '1990-03-03', 'asdfa', 'dgasd', 'fgdsf', 'ghsdf', 'gsdfg', 1, 1),
(4, '1990-02-02', 'awgrw', 'garewq', 'gwer', 'tgerqwag', 'wer', 0, 0),
(5, '1990-02-02', 'awgrw', 'garewq', 'gwer', 'tgerqwag', 'wer', 0, 0),
(6, '1985-10-04', 'yeuj', 'dryujh', 'fdh', 'dfgjh', 'dfgh', 1, 1),
(7, '1985-10-04', 'yeuj', 'dryujh', 'fdh', 'dfgjh', 'dfgh', 1, 1),
(8, '1993-01-01', 'wsthsh', 'wrthrt', 'hwrethws', 'erhgyqwaer', 'tgqwaertgq', 0, 1),
(9, '1990-02-02', 'awgrw', 'garewq', 'gwer', 'tgerqwag', 'wer', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dog_gender`
--

CREATE TABLE `dog_gender` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `gender` varchar(255) NOT NULL,
  `gender_type` tinyint(1) UNSIGNED NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dog_gender`
--

INSERT INTO `dog_gender` (`id`, `gender`, `gender_type`, `lang_id`) VALUES
(1, 'мужской', 1, 1),
(2, 'женский', 0, 1),
(3, 'male', 1, 2),
(4, 'female', 0, 2),
(5, 'чоловіча', 1, 3),
(6, 'жіноча', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dog_image`
--

CREATE TABLE `dog_image` (
  `id` int(11) UNSIGNED NOT NULL,
  `dog_id` int(11) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `main` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dog_image`
--

INSERT INTO `dog_image` (`id`, `dog_id`, `link`, `alt`, `main`) VALUES
(1, 1, 'image.jpg', 'alt image text', 1),
(2, 2, 'image.jpg', 'alt image text', 1),
(3, 3, 'image.jpg', 'alt image text', 1),
(4, 4, 'image.jpg', 'alt image text', 1),
(5, 5, 'image.jpg', 'alt image text', 1),
(6, 6, 'image.jpg', 'alt image text', 1),
(7, 7, 'image.jpg', 'alt image text', 1),
(8, 8, 'image.jpg', 'alt image text', 1),
(9, 9, 'image.jpg', 'alt image text', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dog_name`
--

CREATE TABLE `dog_name` (
  `id` int(11) UNSIGNED NOT NULL,
  `dog_id` int(11) UNSIGNED NOT NULL,
  `dog_name` varchar(255) NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dog_name`
--

INSERT INTO `dog_name` (`id`, `dog_id`, `dog_name`, `lang_id`) VALUES
(1, 1, 'asdf asdfasdfsad', 1),
(2, 2, 'vzsd rqwrefwaef', 1),
(3, 3, 'wqefwqaefasd qqq', 1),
(4, 4, 'whywt ersfdg sad fg', 1),
(5, 5, 'whywtersfdgsadfg', 1),
(6, 6, 'wergsdfgsd', 1),
(7, 7, 'wergsdfgsd', 1),
(8, 8, 'asertgqaefrgser', 1),
(9, 9, 'whywtersfdgsadfg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dog_result`
--

CREATE TABLE `dog_result` (
  `id` int(11) UNSIGNED NOT NULL,
  `dog_id` int(11) UNSIGNED NOT NULL,
  `result_text` varchar(255) NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dog_result`
--

INSERT INTO `dog_result` (`id`, `dog_id`, `result_text`, `lang_id`) VALUES
(1, 1, 'ytegsdfh hsdrtghse', 1),
(2, 1, 'ytegsdfh hsdrtghse', 1),
(3, 1, 'ytegsdfh hsdrtghse', 1),
(4, 2, 'gvsaergtwe', 1),
(5, 2, 'sgdfgew', 1),
(6, 2, 'gvfdfdsa', 1),
(7, 3, 'gsdfg', 1),
(8, 3, 'gsdfg', 1),
(9, 3, 'gsdfg', 1),
(10, 4, 'tgwqertg', 1),
(11, 4, 'tgwqertg', 1),
(12, 4, 'tgwqertg', 1),
(13, 5, 'tgwer', 1),
(14, 5, 'gtwer', 1),
(15, 5, 'tgwqertg', 1),
(16, 6, 'dfgjh', 1),
(17, 6, 'dfgjd', 1),
(18, 6, 'fgjdfgh', 1),
(19, 7, 'dfgjh', 1),
(20, 7, 'dfgjd', 1),
(21, 7, 'fgjdfgh', 1),
(22, 8, 'wretqawert', 1),
(23, 8, 'qawretq', 1),
(24, 8, 'rwetqwaert', 1),
(25, 9, 'asdfasdfs', 1),
(26, 9, 'asdfasdfs', 1),
(27, 9, 'asdfasdfs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `link` varchar(3) NOT NULL,
  `lang` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `link`, `lang`) VALUES
(1, 'ru', 'русский'),
(2, 'en', 'english'),
(3, 'uk', 'український');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `menu_subtitle` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `menu_subtitle` varchar(255) NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `menu_title` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `year` int(4) UNSIGNED NOT NULL,
  `month` int(2) UNSIGNED NOT NULL,
  `day` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_image`
--

CREATE TABLE `news_image` (
  `id` int(11) UNSIGNED NOT NULL,
  `news_id` int(11) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `main` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_link`
--

CREATE TABLE `news_link` (
  `id` int(11) UNSIGNED NOT NULL,
  `news_id` int(11) UNSIGNED NOT NULL,
  `news_link` text NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_text`
--

CREATE TABLE `news_text` (
  `id` int(11) UNSIGNED NOT NULL,
  `news_id` int(11) UNSIGNED NOT NULL,
  `news_text` text NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_title`
--

CREATE TABLE `news_title` (
  `id` int(11) UNSIGNED NOT NULL,
  `news_id` int(11) UNSIGNED NOT NULL,
  `news_title` text NOT NULL,
  `lang_id` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link_UNIQUE` (`link`);

--
-- Indexes for table `admin_menu_title`
--
ALTER TABLE `admin_menu_title`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_text_lang1_idx` (`lang_id`),
  ADD KEY `fk_menu_text_menu1_idx` (`menu_id`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`block_name`);

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
  ADD UNIQUE KEY `name_UNIQUE` (`gender`),
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
-- Indexes for table `dog_result`
--
ALTER TABLE `dog_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_result_dog1_idx` (`dog_id`),
  ADD KEY `fk_result_lang1_idx` (`lang_id`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`lang`),
  ADD UNIQUE KEY `link_UNIQUE` (`link`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link_UNIQUE` (`link`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_menu_title`
--
ALTER TABLE `admin_menu_title`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `block_text`
--
ALTER TABLE `block_text`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `block_title`
--
ALTER TABLE `block_title`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dog`
--
ALTER TABLE `dog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dog_gender`
--
ALTER TABLE `dog_gender`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dog_image`
--
ALTER TABLE `dog_image`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dog_name`
--
ALTER TABLE `dog_name`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dog_result`
--
ALTER TABLE `dog_result`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_image`
--
ALTER TABLE `news_image`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_link`
--
ALTER TABLE `news_link`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_text`
--
ALTER TABLE `news_text`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_title`
--
ALTER TABLE `news_title`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_menu_title`
--
ALTER TABLE `admin_menu_title`
  ADD CONSTRAINT `fk_menu_text_lang11` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menu_text_menu1` FOREIGN KEY (`menu_id`) REFERENCES `admin_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_dog_name_dog1` FOREIGN KEY (`dog_id`) REFERENCES `dog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
