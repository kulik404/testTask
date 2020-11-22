-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 22 2020 г., 19:56
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testtask`
--

-- --------------------------------------------------------

--
-- Структура таблицы `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `resumeId` int(11) NOT NULL,
  `mStart` int(2) NOT NULL COMMENT 'месяц начала работы',
  `yStart` int(4) NOT NULL COMMENT 'год начала работы',
  `mEnd` int(2) DEFAULT NULL COMMENT 'месяц окончания работы',
  `yEnd` int(4) DEFAULT NULL COMMENT 'год окончания работы',
  `now` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'По настоящее время',
  `organization` text NOT NULL COMMENT 'Организация',
  `position` text NOT NULL COMMENT 'Должность'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `experience`
--

INSERT INTO `experience` (`id`, `resumeId`, `mStart`, `yStart`, `mEnd`, `yEnd`, `now`, `organization`, `position`) VALUES
(1, 9, 11, 2010, 12, 2012, 0, 'asd', 'dsa'),
(2, 9, 3, 2014, 4, 2015, 0, 'org', 'position');

-- --------------------------------------------------------

--
-- Структура таблицы `resume`
--

CREATE TABLE `resume` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL COMMENT 'Фото',
  `last_name` varchar(255) NOT NULL COMMENT 'Фамилия',
  `first_name` varchar(255) NOT NULL COMMENT 'Имя',
  `middle_name` varchar(255) NOT NULL COMMENT 'Отчество',
  `bdate` date NOT NULL COMMENT 'Дата рождения',
  `sex` int(1) NOT NULL COMMENT 'Пол',
  `townId` int(11) NOT NULL COMMENT 'Город',
  `email` varchar(255) NOT NULL COMMENT 'Электронная почта',
  `phone` decimal(14,0) NOT NULL COMMENT 'Телефон',
  `specialityId` int(11) NOT NULL COMMENT 'Специализация',
  `salary` int(11) NOT NULL COMMENT 'Зарплата',
  `fEmp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Полная занятость',
  `pEmp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Частичная занятость',
  `tEmp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Проектная/Временная работа',
  `vEmp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Волонтёрство',
  `iEmp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Стажировка',
  `fSchedule` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Полный день',
  `sSchedule` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Сменный график',
  `flexSchedule` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Гибкий график',
  `remSchedule` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Удалённая работа',
  `rSchedule` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Вахтовый метод',
  `exp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Опыт работы',
  `about` text NOT NULL DEFAULT '' COMMENT 'О себе',
  `count` int(11) NOT NULL DEFAULT 0 COMMENT 'Счетчик просмотров',
  `cDate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Дата создание',
  `uDate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Дата создание'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `resume`
--

INSERT INTO `resume` (`id`, `foto`, `last_name`, `first_name`, `middle_name`, `bdate`, `sex`, `townId`, `email`, `phone`, `specialityId`, `salary`, `fEmp`, `pEmp`, `tEmp`, `vEmp`, `iEmp`, `fSchedule`, `sSchedule`, `flexSchedule`, `remSchedule`, `rSchedule`, `exp`, `about`, `count`, `cDate`, `uDate`) VALUES
(9, 'images/profile-foto.jpg', 'Кулик', 'Алексей', 'Викторович', '1985-09-12', 1, 1, 'kulikalexey@mail.ru', '79103277403', 5, 3000000, 0, 1, 0, 0, 1, 1, 1, 1, 1, 1, 0, 'asdfgh', 4, '2020-11-21 12:33:49', '2020-11-22 13:56:09'),
(5, 'images/profile-foto.jpg', 'иванов', 'иван', 'иваныч', '1985-10-06', 1, 0, 'mail@mail.ru', '7234564787766', 2, 4321, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 'werety', 10, '2020-11-21 10:42:57', '2020-11-21 10:42:57'),
(6, 'images/profile-foto.jpg', 'иванов', 'иван', 'иваныч', '1338-10-06', 1, 0, 'mail@mail.ru', '79998887766', 1, 87654, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 'ewrtyhgfede', 0, '2020-11-21 10:42:57', '2020-11-21 10:42:57'),
(7, 'images/profile-foto.jpg', 'dfgh', 'wertwertew', 'wertwertewrt', '2028-10-06', 1, 2, 'mail@mail.ru', '79998887766', 3, 765432, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 'jiuhgfcdxsa', 4, '2020-11-21 10:42:57', '2020-11-21 10:42:57'),
(8, 'images/profile-foto.jpg', 'ewtrwet', 'erwter', 'wertrertew', '1888-03-20', 1, 4, 'mail@mail.ru', '79998887766', 4, 4444, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 'sadfvfdsfvsa', 3, '2020-11-21 10:42:57', '2020-11-21 10:42:57');

-- --------------------------------------------------------

--
-- Структура таблицы `speciality`
--

CREATE TABLE `speciality` (
  `id` int(11) NOT NULL,
  `speciality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `speciality`
--

INSERT INTO `speciality` (`id`, `speciality`) VALUES
(1, 'Администратор баз данных'),
(2, 'Аналитик'),
(3, 'Арт-директор'),
(4, 'Инженер'),
(5, 'Компьютерная безопасность'),
(6, 'Контент'),
(7, 'Маркетинг'),
(8, 'Мультимедиа'),
(9, 'Оптимизация сайта (SEO)'),
(10, 'Передача данных и доступ в интернет'),
(11, 'Программирование, Разработка'),
(12, 'Продажи'),
(13, 'Продюсер'),
(14, 'Развитие бизнеса'),
(15, 'Системный администратор'),
(16, 'Системы управления предприятием (ERP)'),
(17, 'Сотовые, Беспроводные технологии'),
(18, 'Стартапы'),
(19, 'Телекоммуникации'),
(20, 'Тестирование'),
(21, 'Технический писатель'),
(22, 'Управление проектами'),
(23, 'Электронная коммерция'),
(24, 'CRM системы'),
(25, 'Web инженер'),
(26, 'Web мастер');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resumeId` (`resumeId`);

--
-- Индексы таблицы `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
