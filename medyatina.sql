-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 09 2025 г., 09:50
-- Версия сервера: 5.7.39-log
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `medyatina`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` enum('в обработке','отправлен','доставлен') COLLATE utf8mb4_unicode_ci DEFAULT 'в обработке',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `status`, `created_at`) VALUES
(1, 1, 1, 'отправлен', '2025-04-08 09:34:57'),
(2, 6, 1, 'доставлен', '2025-04-08 16:40:47'),
(3, 6, 3, 'в обработке', '2025-04-08 16:40:52');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `weight` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `weight`, `price`, `category`, `image`) VALUES
(1, 'Гречишный мед', '', '150 гр', 500, 'honey', 'img/honey1.png'),
(2, 'Липовый мед', '', '450 гр', 1000, 'honey', 'img/honey2.png'),
(3, 'Акациевый мед', '', '250 гр', 600, 'honey', 'img/honey3.png'),
(4, 'Прополис', '', '50 гр', 300, 'beekeeping', 'img/honey4.png'),
(5, 'Пыльца цветочная', '', '250 гр', 850, 'beekeeping', 'img/honey5.png'),
(6, 'Пчелиный воск', '', '500 гр', 600, 'beekeeping', 'img/honey6.png'),
(7, 'Подарочный набор, 4 шт', 'Гречишный, каштановый, луговой, акациевый', '1000 гр', 2299, 'sets', 'img/honey7.png'),
(8, 'Подарочный набор, 3 шт', 'Гречишный, каштановый, акациевый', '750 гр', 1599, 'sets', 'img/honey8.png'),
(9, 'Подарочный набор, 6 шт', 'Гречишный, каштановый, луговой, акациевый, цветочный, липовый', '1500', 2999, 'sets', 'img/honey9.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
(1, 'Дарья', 'dasha@mail.ru', '$2y$10$mCXWm80hz3NXIwiqKHF2WOs4HI9Cv3XL9HffSgYAaIfUpk4V6WQlK', 0),
(5, 'admin', 'admin@mail.ru', '$2y$10$7yJG.1Rz4d2qj/ypJoXrIOPNGL6UCJVm5PCQJrHKkfitVaP2/An7e', 1),
(6, 'Милена', 'mila@mail.ru', '$2y$10$uo40znM4RWgOg87hu7Kb.uo5T4XGeJ71sh7vHlD502hZb7e6OHzwW', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
