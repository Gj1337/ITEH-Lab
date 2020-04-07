-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 07 2020 г., 02:06
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `iteh_lab_1_db`
--
CREATE DATABASE IF NOT EXISTS `iteh_lab_1_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iteh_lab_1_db`;

-- --------------------------------------------------------

--
-- Структура таблицы `actor`
--

CREATE TABLE `actor` (
  `ID_Actor` int(11) NOT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `actor`
--

INSERT INTO `actor` (`ID_Actor`, `name`) VALUES
(1, 'Леонардо ДиКаприо'),
(2, 'Том Хэнкс'),
(3, 'Жан Рено'),
(4, 'Майкл Кейн'),
(5, 'Марго Робби'),
(6, 'Жан-Марк Барр'),
(7, 'Джина Дэвис'),
(8, 'Майкл Кларк Дункан'),
(9, 'Натали Портман');

-- --------------------------------------------------------

--
-- Структура таблицы `film`
--

CREATE TABLE `film` (
  `ID_FILM` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `theDate` date DEFAULT NULL,
  `country` text DEFAULT NULL,
  `quality` int(11) DEFAULT NULL CHECK (1 < `quality` and `quality` <= 100),
  `resolution` text DEFAULT NULL,
  `codec` text DEFAULT NULL,
  `producer` text DEFAULT NULL,
  `director` text DEFAULT NULL,
  `carrier` text DEFAULT NULL CHECK (`carrier` = 'video' or `carrier` = 'CD' or `carrier` = 'DVD' or `carrier` = 'BR')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `film`
--

INSERT INTO `film` (`ID_FILM`, `name`, `theDate`, `country`, `quality`, `resolution`, `codec`, `producer`, `director`, `carrier`) VALUES
(1, 'Леон', '1994-09-14', 'Франция', 87, '720p', 'H.264', 'Люк Бессон', 'Люк Бессон', 'CD'),
(3, 'Начало', '2010-07-08', '	США', 87, '720p', 'H.264', 'Кристофер Нолан', 'Кристофер Нола', 'DVD'),
(5, 'Голубая бездна', '1988-05-11', 'Франция', 78, '720p', 'H.264', 'Патрис Леду', 'Люк Бессон', 'CD'),
(6, 'Волк с Уолл-стрит', '2013-12-17', '	США', 78, '720p', 'H.264', 'Патрис Леду', '	\r\nМартин Скорсезе', 'DVD'),
(7, 'Зеленая миля', '1999-12-06', '	США', 90, '720p', 'H.264', 'Фрэнк Дарабонт', '	\r\nФрэнк Дарабонт', 'CD'),
(8, 'Их собственная лига', '1999-07-06', 'США', 76, '720p', 'H.264', 'Эллиот Эбботт', 'Пенни Маршалл', 'CD');

-- --------------------------------------------------------

--
-- Структура таблицы `film_actor`
--

CREATE TABLE `film_actor` (
  `FID_Film` int(11) DEFAULT NULL,
  `FID_Actor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `film_actor`
--

INSERT INTO `film_actor` (`FID_Film`, `FID_Actor`) VALUES
(7, 2),
(7, 8),
(8, 2),
(8, 7),
(5, 3),
(5, 6),
(6, 1),
(6, 5),
(3, 1),
(3, 4),
(1, 3),
(1, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `film_genre`
--

CREATE TABLE `film_genre` (
  `FID_Film` int(11) DEFAULT NULL,
  `FID_Genre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `film_genre`
--

INSERT INTO `film_genre` (`FID_Film`, `FID_Genre`) VALUES
(1, 1),
(1, 4),
(8, 2),
(5, 1),
(6, 1),
(6, 2),
(3, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `ID_Genre` int(11) NOT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`ID_Genre`, `title`) VALUES
(1, 'Драмы'),
(2, 'Комедии'),
(3, 'Детективы'),
(4, 'Триллеры');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`ID_Actor`);

--
-- Индексы таблицы `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`ID_FILM`);

--
-- Индексы таблицы `film_actor`
--
ALTER TABLE `film_actor`
  ADD KEY `FID_Film` (`FID_Film`),
  ADD KEY `FID_Actor` (`FID_Actor`);

--
-- Индексы таблицы `film_genre`
--
ALTER TABLE `film_genre`
  ADD KEY `FID_Film` (`FID_Film`),
  ADD KEY `FID_Genre` (`FID_Genre`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID_Genre`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actor`
--
ALTER TABLE `actor`
  MODIFY `ID_Actor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `film`
--
ALTER TABLE `film`
  MODIFY `ID_FILM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `ID_Genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `film_actor`
--
ALTER TABLE `film_actor`
  ADD CONSTRAINT `film_actor_ibfk_1` FOREIGN KEY (`FID_Film`) REFERENCES `film` (`ID_FILM`),
  ADD CONSTRAINT `film_actor_ibfk_2` FOREIGN KEY (`FID_Actor`) REFERENCES `actor` (`ID_Actor`);

--
-- Ограничения внешнего ключа таблицы `film_genre`
--
ALTER TABLE `film_genre`
  ADD CONSTRAINT `film_genre_ibfk_1` FOREIGN KEY (`FID_Film`) REFERENCES `film` (`ID_FILM`),
  ADD CONSTRAINT `film_genre_ibfk_2` FOREIGN KEY (`FID_Genre`) REFERENCES `genre` (`ID_Genre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
