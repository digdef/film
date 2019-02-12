-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 11 2019 г., 20:10
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `film`
--
CREATE DATABASE IF NOT EXISTS `film` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `film`;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `categories`) VALUES
(1, 'СЕРИАЛ'),
(2, 'ДРАМА'),
(3, 'КОМЕДИЯ'),
(4, 'УЖАСЫ'),
(5, 'ТРИЛЛЕР'),
(6, 'БОЕВИК'),
(7, 'ВЕСТЕРН'),
(8, 'ВОЕННЫЙ'),
(9, 'ДЕТЕКТИВ'),
(10, 'ДОКУМЕНТАЛЬНЫЙ'),
(11, 'ИСТОРИЯ'),
(12, 'КРИМИНАЛ'),
(13, 'МУЛЬТФИЛЬМ'),
(14, 'МУЗЫКА');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `nick` varchar(500) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `text` text NOT NULL,
  `film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `nick`, `avatar`, `text`, `film_id`) VALUES
(1, 'admin', 'avatar3.png', 'Интересно, на сколько приблизиться к оригиналу', 10),
(2, 'Egor', 'avatar1.png', 'бла бла бла', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `title` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(300) NOT NULL DEFAULT 'not.jpg',
  `trailer` varchar(300) DEFAULT NULL,
  `text` text,
  `categories` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `film`
--

INSERT INTO `film` (`id`, `title`, `img`, `trailer`, `text`, `categories`, `date`) VALUES
(1, 'Слишком стар, чтобы умереть молодым', '1.jpg', 'https://www.youtube.com/embed/eegGGXrQb3E', 'Cлишком стар, чтобы умереть молодым', 1, '2019-01-01'),
(2, 'Дэтпул 2', '7.jpg', 'https://www.youtube.com/embed/eegGGXrQb3E', 'Cлишком стар, чтобы умереть молодым', 1, '2019-01-01'),
(3, 'Мстители: Война бесконечности', '5.jpg', 'https://www.youtube.com/embed/eegGGXrQb3E', 'Cлишком стар, чтобы умереть молодым', 1, '2019-01-01'),
(4, 'Дюнкерк', '10.jpg', 'https://www.youtube.com/embed/eegGGXrQb3E', 'Cлишком стар, чтобы умереть молодым', 1, '2019-01-01'),
(5, 'Веном', '6.jpg', 'https://www.youtube.com/embed/eegGGXrQb3E', 'Cлишком стар, чтобы умереть молодым', 1, '2019-01-01'),
(6, 'Звёздные войны: Последние джедаи', '8.jpg', 'https://www.youtube.com/embed/eegGGXrQb3E', 'Cлишком стар, чтобы умереть молодым', 1, '2019-01-01'),
(7, 'Три билборда на границе Эббинга, Миссури', '9.jpg', 'https://www.youtube.com/embed/eegGGXrQb3E', 'Cлишком стар, чтобы умереть молодым', 1, '2019-01-01'),
(8, 'Богемская рапсодия', '2.jpg\r\n', 'https://www.youtube.com/embed/e9sz7ZbCmKk', 'Чествование группы Queen, их музыки и их выдающегося вокалиста Фредди Меркьюри, который бросил вызов стереотипам и победил условности, чтобы стать одним из самых любимых артистов на планете. Фильм прослеживает головокружительный путь группы к успеху благодаря их культовым песням и революционному звуку, практически распад коллектива, поскольку образ жизни Меркьюри выходит из-под контроля, и их триумфальное воссоединение накануне концерта Live Aid, ставшим одним из величайших выступлений в истории рок-музыки.', 1, '2019-01-09'),
(9, 'Человек-паук: Вдали от дома', '3.jpg', 'https://www.youtube.com/embed/P01WrKje8Ww', 'Питер Паркер вместе с друзьями отправляется на летние каникулы в Европу. Однако отдохнуть приятелям вряд ли удастся — Питеру придется согласиться помочь Нику Фьюри раскрыть тайну существ, вызывающих стихийные бедствия и разрушения по всему континенту.\r\n', 1, '2019-01-17'),
(10, 'Король Лев', '4.jpg', 'https://www.youtube.com/embed/EZE-rvb3hqg', '«Король Лев» — предстоящий американский приключенческий фильм 2019 года режиссёра Джона Фавро и сценариста Джеффа Натансона c Дональдом Гловером, Джеймсом Эрл Джонсом, Билли Айкнером, Сетом Рогеном и Джоном Оливером в главных ролях. Является ремейком одноимённого анимационного фильма 1994 года. Картина выйдет на экраны 19 июля 2019 года, когда мультфильму исполнится 25 лет.\r\n\r\n', 1, '2019-01-19'),
(11, 'Оскар (кинопремия, 2019)', 'oscar.jpg', 'https://www.youtube.com/embed/Pgfjx0_S7UA', '91-я церемония вручения наград премии «Оскар» за заслуги в области кинематографа за 2018 год состоится 24 февраля 2019 года в театре «Долби» (Голливуд, Лос-Анджелес). Номинанты были объявлены 22 января 2019 года', 1, '2019-02-21');

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `categories` varchar(500) NOT NULL,
  `film` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id`, `categories`, `film`) VALUES
(1, 'СЕРИАЛ', 'Слишком стар, чтобы умереть молодым'),
(2, 'МУЗЫКА', 'Богемская рапсодия'),
(3, 'ВОЕННЫЙ', 'Дюнкерк'),
(4, 'ИСТОРИЯ', 'Дюнкерк'),
(5, 'БОЕВИК', 'Человек-паук: Вдали от дома'),
(6, 'БОЕВИК', 'Дэтпул 2'),
(7, 'БОЕВИК', 'Мстители: Война бесконечности');

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img` varchar(300) NOT NULL,
  `link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `img`, `link`) VALUES
(1, 'oscar.png', 'http://film/film.php?id=11'),
(2, '2.png', 'http://film/film.php?id=8'),
(3, '3.png\r\n', 'http://film/film.php?id=9'),
(4, '4.png', 'http://film/film.php?id=3'),
(5, '1.png\r\n', 'http://film/film.php?id=1'),
(6, '6.png\r\n', 'http://film/film.php?id=5'),
(7, '7.png\r\n', 'http://film/film.php?id=2'),
(8, '5.png', 'http://film/film.php?id=10'),
(9, '8.png', 'http://film/film.php?id=6');

-- --------------------------------------------------------

--
-- Структура таблицы `subs`
--

CREATE TABLE `subs` (
  `id` int(11) NOT NULL,
  `subscriber` varchar(500) DEFAULT NULL,
  `subscription` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subs`
--

INSERT INTO `subs` (`id`, `subscriber`, `subscription`) VALUES
(1, 'admin', 'Богемская рапсодия'),
(2, 'admin', 'Оскар (кинопремия, 2019)'),
(3, 'admin', 'Три билборда на границе Эббинга, Миссури'),
(4, '', 'Король Лев');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `email` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `avatar` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cookie` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `name`, `avatar`, `password`, `cookie`) VALUES
(1, 'admin', 'admin@film.com', 'admin', 'avatar3.png', '$2y$10$akwyANNt9Y75//3QO1Fe/uQzpvXiEWfq3W4KpPpNoYFOXnC595BNm', NULL),
(47, 'chmo1', 'chmo1@chmo', 'chmo1', 'avatar1.png', '$2y$10$m9Fw19TxeGa0T66jZHGKqOF.Y3Eg52FaoETnN/w87/dHGPsmC9F0W', NULL),
(48, 'chmo', 'chmo@chmo', '', 'avatar1.png', '$2y$10$lQmsj0GCESRI/nofayDTOeKty/B5IN8UzATAASZM6fXT5IFy5pUvS', '<O)^qTB'),
(50, '123', 'loshara@qqw', '123', 'avatar1.png', '$2y$10$mSd9pT8c3KVtaryDfYhZROUy4XkUizh1XOuzQkTI..3yA8KBPg5Ry', NULL),
(53, '121', '1@11', '1', 'avatar1.png', '$2y$10$Rp7N80vsb6Vf0wsaPZa5iOwzEYcg4Za4bLDuGx1EKM4btEr9ibloq', NULL),
(54, 'masha', 'masha@masha', 'masha', 'avatar1.png', '$2y$10$39Yj5tSl1lBHXkcoN7igJOSM.PaL0GBfRde9XEk6tsP5n2bsHqKOm', NULL),
(55, 'sasda', 'sadasd@sdfs', 'asdsad', NULL, '$2y$10$HKZ.MDXqWoVaodIhKwhayeHsvgnmZDXdoy5/BybwUxxvlGmW1Uec.', NULL),
(56, 'loh', 'loh@chat.com', 'loh', NULL, '$2y$10$oDokVb.3cMNy5yCkbNnPZ.6/gy8/LvICg6RnfwdY0pawHVW7NPzMq', NULL),
(57, 'Egor', 'egor@egor.com', 'Egor', 'avatar1.png', '$2y$10$BD1H7cC8n5FaHAjewDGh/utv3az/2o5qXk7dNfJpruUh9Sy5rncqu', 'H3fHsLYU'),
(59, 'sergey', 'bydigdef@gmail.com', 'sergey', 'avatar3.png', '$2y$10$IrXEFXIaTkCtDkHbkGCPeeQQy/YgVlqxBLXEpOt3BQfwLgvHoIY.u', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1324;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `subs`
--
ALTER TABLE `subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
