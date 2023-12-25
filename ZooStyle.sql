-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Дек 25 2023 г., 21:53
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ZooStyle`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Customers`
--

CREATE TABLE `Customers` (
  `custId` int NOT NULL,
  `custName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale` int NOT NULL DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Customers`
--

INSERT INTO `Customers` (`custId`, `custName`, `sale`, `photo`, `userId`) VALUES
(13, 'Mara', 0, NULL, 20),
(14, 'KOKAoka', 0, NULL, 21),
(15, 'Ivan', 0, NULL, 22),
(16, 'Цири', 0, NULL, 23);

-- --------------------------------------------------------

--
-- Структура таблицы `Gallery`
--

CREATE TABLE `Gallery` (
  `photoId` int NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('best','all') COLLATE utf8mb4_unicode_ci NOT NULL,
  `petType` enum('Коты','Собаки') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Gallery`
--

INSERT INTO `Gallery` (`photoId`, `path`, `role`, `petType`) VALUES
(1, '../pics/gallery/1.jpg', 'best', 'Коты'),
(2, '../pics/gallery/2.jpg', 'best', 'Собаки'),
(3, '../pics/gallery/3.jpg', 'best', 'Коты'),
(4, '../pics/gallery/cat1.jpg', 'all', 'Коты'),
(5, '../pics/gallery/cat2.jpg', 'all', 'Коты'),
(6, '../pics/gallery/cat3.jpg', 'all', 'Коты'),
(7, '../pics/gallery/cat4.jpg', 'all', 'Коты'),
(8, '../pics/gallery/cat5.jpg', 'all', 'Коты'),
(9, '../pics/gallery/cat6.jpg', 'all', 'Коты'),
(10, '../pics/gallery/dog1.jpg', 'all', 'Собаки'),
(11, '../pics/gallery/dog2.jpg', 'all', 'Собаки'),
(12, '../pics/gallery/dog3.jpg', 'all', 'Собаки'),
(13, '../pics/gallery/dog4.jpg', 'all', 'Собаки'),
(14, '../pics/gallery/dog5.jpg', 'all', 'Собаки'),
(15, '../pics/gallery/dog6.jpg', 'all', 'Собаки'),
(16, '../pics/gallery/dog7.jpg', 'all', 'Собаки');

-- --------------------------------------------------------

--
-- Структура таблицы `Masters`
--

CREATE TABLE `Masters` (
  `mastId` int NOT NULL,
  `mastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mastSurname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `servtId` int NOT NULL,
  `userId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Masters`
--

INSERT INTO `Masters` (`mastId`, `mastName`, `mastSurname`, `post`, `photo`, `servtId`, `userId`) VALUES
(1, 'Мария', 'Трубецкая', 'Специалист по гигиене', '../pics/about/maria.jpeg', 2, 2),
(2, 'Валерий', 'Петрикор', 'Диетолог', '../pics/about/valeriy.webp', 5, 3),
(3, 'Татьяна', 'Захаренко', 'Грумер', '../pics/about/tatyana.jpg', 3, 4),
(4, 'Владлена', 'Варьина', 'Мастер маникюра', '../pics/about/vladlena.webp', 1, 5),
(5, 'Прохор', 'Савченко', 'Выгуливатель', '../pics/about/prohor.jpeg', 4, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `orderId` int NOT NULL,
  `custId` int NOT NULL,
  `mastId` int NOT NULL,
  `servId` int NOT NULL,
  `orderDate` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`orderId`, `custId`, `mastId`, `servId`, `orderDate`, `status`, `active`) VALUES
(4, 14, 3, 12, '2023-12-13', 0, 1),
(5, 15, 2, 18, '2023-12-03', 0, 1),
(6, 13, 1, 3, '2023-12-23', 0, 1),
(7, 13, 1, 5, '2023-11-16', 0, 1),
(8, 15, 4, 1, '2023-12-09', 0, 1),
(9, 15, 4, 1, '2023-12-24', 0, 1),
(10, 15, 3, 14, '2024-01-07', 0, 1),
(11, 16, 3, 9, '2023-12-25', 0, 1),
(12, 15, 2, 17, '2023-12-29', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Services`
--

CREATE TABLE `Services` (
  `servId` int NOT NULL,
  `servName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `petType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL,
  `servtId` int NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Services`
--

INSERT INTO `Services` (`servId`, `servName`, `petType`, `price`, `servtId`, `active`) VALUES
(1, 'Коты', 'Коты', 5, 1, 1),
(2, 'Собаки', 'Собаки', 7, 1, 1),
(3, 'Короткошерстные', 'Коты', 30, 2, 1),
(4, 'Среднешерстные', 'Коты', 35, 2, 1),
(5, 'Длинношерстные', 'Коты', 40, 2, 1),
(6, 'Короткошерстные', 'Собаки', 40, 2, 1),
(7, 'Среднешерстные', 'Собаки', 45, 2, 1),
(8, 'Длинношерстные', 'Собаки', 50, 2, 1),
(9, 'Короткошерстные', 'Коты', 30, 3, 1),
(10, 'Среднешерстные', 'Коты', 35, 3, 1),
(11, 'Длинношерстные', 'Коты', 40, 3, 1),
(12, 'Короткошерстные', 'Собаки', 40, 3, 1),
(13, 'Среднешерстные', 'Собаки', 45, 3, 1),
(14, 'Длинношерстные', 'Собаки', 50, 3, 1),
(15, 'Коты', 'Коты', 7, 4, 1),
(16, 'Собаки', 'Собаки', 5, 4, 1),
(17, 'Коты', 'Коты', 70, 5, 1),
(18, 'Собаки', 'Собаки', 80, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ServicesTypes`
--

CREATE TABLE `ServicesTypes` (
  `servtId` int NOT NULL,
  `servtName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descript` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ServicesTypes`
--

INSERT INTO `ServicesTypes` (`servtId`, `servtName`, `descript`, `active`) VALUES
(1, 'Обрезание когтей', 'Длинные когти могут травмировать окружающие поверхности, такие как диваны, ковры или обои. Мы можем помочь это предотвратить.', 1),
(2, 'Мытьё', 'Мытье помогает удалить омертвевшие волосы, предотвращая образование комков шерсти и улучшая состояние кожи. Регулярное мытье помогает предотвратить заражение блохами и клещами.', 1),
(3, 'Груминг', 'Груминг включает в себя мытье, расчесывание и другие процедуры, которые помогают поддерживать чистоту питомца.Регулярное мытье и чистка помогают избавиться от неприятных запахов.', 1),
(4, 'Выгул', 'Выгул помогает питомцам поддерживать хорошую физическую форму. Прогулки способствуют развитию мышц, укреплению костей и поддержанию здорового веса.', 1),
(5, 'Диетолог', 'Диетолог разработает индивидуальное меню для вашего питомца, учитывая его возраст, вес, заболевания и особенности организма. Он подберет оптимальное сочетание белков, жиров, углеводов и витаминов.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `userId` int NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Администратор','Мастер','Заказчик') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`userId`, `phone`, `password`, `role`, `active`) VALUES
(1, 'admin', 'admin', 'Администратор', 1),
(2, '+375440000000', 'mtrubeckaya', 'Мастер', 1),
(3, '+375441111111', 'vpetrickor', 'Мастер', 1),
(4, '+375442222222', 'tzaharenko', 'Мастер', 1),
(5, '+375443333333', 'vvaryina', 'Мастер', 1),
(6, '+375444444444', 'psavshenko', 'Мастер', 1),
(20, '+37544535314', '123', 'Заказчик', 1),
(21, '+37511', '1', 'Заказчик', 1),
(22, '+111223334455', '1', 'Заказчик', 1),
(23, '+375331231212', 'зфыы1!', 'Заказчик', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`custId`),
  ADD KEY `userId` (`userId`);

--
-- Индексы таблицы `Gallery`
--
ALTER TABLE `Gallery`
  ADD PRIMARY KEY (`photoId`);

--
-- Индексы таблицы `Masters`
--
ALTER TABLE `Masters`
  ADD PRIMARY KEY (`mastId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `servtId` (`servtId`);

--
-- Индексы таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `custId` (`custId`),
  ADD KEY `mastId` (`mastId`),
  ADD KEY `servId` (`servId`);

--
-- Индексы таблицы `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`servId`),
  ADD KEY `servtId` (`servtId`);

--
-- Индексы таблицы `ServicesTypes`
--
ALTER TABLE `ServicesTypes`
  ADD PRIMARY KEY (`servtId`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Customers`
--
ALTER TABLE `Customers`
  MODIFY `custId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `Gallery`
--
ALTER TABLE `Gallery`
  MODIFY `photoId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `Masters`
--
ALTER TABLE `Masters`
  MODIFY `mastId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `orderId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `Services`
--
ALTER TABLE `Services`
  MODIFY `servId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `ServicesTypes`
--
ALTER TABLE `ServicesTypes`
  MODIFY `servtId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `userId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Customers`
--
ALTER TABLE `Customers`
  ADD CONSTRAINT `Customers_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Masters`
--
ALTER TABLE `Masters`
  ADD CONSTRAINT `Masters_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Masters_ibfk_3` FOREIGN KEY (`servtId`) REFERENCES `ServicesTypes` (`servtId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`custId`) REFERENCES `Customers` (`custId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Orders_ibfk_2` FOREIGN KEY (`mastId`) REFERENCES `Masters` (`mastId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Orders_ibfk_3` FOREIGN KEY (`servId`) REFERENCES `Services` (`servId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Services`
--
ALTER TABLE `Services`
  ADD CONSTRAINT `Services_ibfk_1` FOREIGN KEY (`servtId`) REFERENCES `ServicesTypes` (`servtId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
