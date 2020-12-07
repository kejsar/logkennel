

-- --------------------------------------------------------

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `lang_code`, `lang_name`) VALUES
(1, 'ru', 'русский'),
(2, 'en', 'english'),
(3, 'uk', 'український');

-- --------------------------------------------------------

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `admin_menu_link`) VALUES
(1, 'news'),
(2, 'dogs'),
(3, 'blocks');

-- --------------------------------------------------------

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
-- Dumping data for table `dog_gender`
--

INSERT INTO `dog_gender` (`id`, `gender_name`, `gender_type`, `lang_id`) VALUES
(1, 'мужской', 1, 1),
(2, 'женский', 0, 1),
(3, 'male', 1, 2),
(4, 'female', 0, 2),
(5, 'чоловіча', 1, 3),
(6, 'жіноча', 0, 3);

-- --------------------------------------------------------

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_link`, `menu_image`) VALUES
(1, 'main', 'img-main.jpg'),
(2, 'news', 'img-news.jpg'),
(3, 'males', 'img-males.jpg'),
(4, 'females', 'img-females.jpg'),
(5, 'sale', 'img-sale.jpg'),
(6, 'contact', 'img-contact.jpg');

-- --------------------------------------------------------

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
