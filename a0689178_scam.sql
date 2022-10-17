-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.3.13
-- Время создания: Июн 30 2022 г., 09:03
-- Версия сервера: 5.7.35-38
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `a0689178_scam`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `access`
--

INSERT INTO `access` (`id`, `name`) VALUES
(1, 'Администратор'),
(2, 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `hero`
--

CREATE TABLE `hero` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `hero`
--

INSERT INTO `hero` (`id`, `name`) VALUES
(1, 'Invoker'),
(2, 'Juggernaut'),
(3, 'Pudge'),
(4, 'Shadow Fiend'),
(5, 'Terrorblade');

-- --------------------------------------------------------

--
-- Структура таблицы `rarity`
--

CREATE TABLE `rarity` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `rarity`
--

INSERT INTO `rarity` (`id`, `name`) VALUES
(1, 'Common'),
(2, 'Uncommon'),
(3, 'Rare'),
(4, 'Mythical'),
(5, 'Immortal'),
(6, 'Arcana');

-- --------------------------------------------------------

--
-- Структура таблицы `skin`
--

CREATE TABLE `skin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_rarity` int(11) NOT NULL,
  `id_hero` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `skin`
--

INSERT INTO `skin` (`id`, `name`, `id_rarity`, `id_hero`, `img`, `price`) VALUES
(1, 'Heir of Menace', 4, 1, 'Heir_of_Menace.png', 4839),
(6, 'Feast of Abscession', 6, 3, 'Feast_of_Abscession.png', 1840),
(8, 'Dark Artistry', 5, 1, 'da.png', 12038),
(9, 'Bladeform Legacy', 6, 2, 'jugga.png', 1896),
(10, 'Balance of the Bladekeeper', 4, 2, 'jiga.png', 564),
(11, 'Jagged Honor', 4, 2, 'jerag.png', 3574),
(12, 'Demon Eater', 6, 4, 'sf.png', 1500),
(13, 'Eternal Harvest', 4, 4, 'sf2.png', 15545),
(14, 'Blades of the Foulfell Corruptor', 5, 5, 'tb.png', 456),
(15, 'Fractal Horns of Inner Abysm', 6, 5, 'tb2.png', 1413),
(16, 'super set', 2, 3, 'slide-23.jpg', 567);

-- --------------------------------------------------------

--
-- Структура таблицы `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_skin` int(11) NOT NULL,
  `price` float NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `transaction`
--

INSERT INTO `transaction` (`id`, `id_user`, `id_skin`, `price`, `date`) VALUES
(3, 3, 1, 4839, '2022-06-28 22:50:47'),
(21, 2, 6, 1840, '2022-06-29 02:27:30'),
(22, 3, 1, 4839, '2022-06-29 02:34:48'),
(23, 2, 10, 564, '2022-06-29 02:48:08'),
(24, 2, 15, 1413, '2022-06-29 07:25:57'),
(25, 6, 15, 1413, '2022-06-29 09:58:07'),
(26, 8, 14, 456, '2022-06-29 11:59:13'),
(27, 8, 11, 3574, '2022-06-29 11:59:28');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `balance` float UNSIGNED NOT NULL,
  `id_access` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `balance`, `id_access`) VALUES
(1, 'admin', 'admin', 'admin123@admin.com', 0, 1),
(2, 'user', 'qwerty', 'usersad@yandex.ru', 2344, 2),
(3, 'clown123', 'zxc123', 'yandex213@clown.ru', 3417, 2),
(4, 'Yrmen45', 'Yrmen45', 'a.fassaloff@yandex.ru', 27093, 2),
(5, 'Vladislave999', 'asdasd123', 'drevyashkin@mail.ru', 0, 2),
(6, 'sergei', 'qwerty', 'sergei.ivanovich@yandex.ru', 2087, 2),
(7, 'koresh42', 'qwerty', 'aysdasdkj@mail.ru', 0, 2),
(8, 'qwerty213', 'qwerty', 'koresh@yandex.ru', 3970, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rarity`
--
ALTER TABLE `rarity`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `skin`
--
ALTER TABLE `skin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `rarity`
--
ALTER TABLE `rarity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `skin`
--
ALTER TABLE `skin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
