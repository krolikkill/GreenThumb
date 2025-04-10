-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 11 2025 г., 01:56
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `GreenThumb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(2, 'домашние', NULL),
(3, 'кустовые', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `forum_category`
--

CREATE TABLE `forum_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forum_category`
--

INSERT INTO `forum_category` (`id`, `title`, `description`, `created_at`) VALUES
(5, 'тест', 'тест\r\n', '2025-04-10 22:46:41');

-- --------------------------------------------------------

--
-- Структура таблицы `forum_post`
--

CREATE TABLE `forum_post` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `forum_topic`
--

CREATE TABLE `forum_topic` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_pinned` tinyint(1) NOT NULL DEFAULT 0,
  `is_closed` tinyint(1) NOT NULL DEFAULT 0,
  `views_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `plant`
--

CREATE TABLE `plant` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `care_guide` text NOT NULL,
  `water_frequency` varchar(50) DEFAULT NULL,
  `light_requirements` varchar(255) DEFAULT NULL,
  `temperature_range` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `plant`
--

INSERT INTO `plant` (`id`, `category_id`, `name`, `description`, `care_guide`, `water_frequency`, `light_requirements`, `temperature_range`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 'роза', 'Роза канадская «Александр Маккензи» - величавый куст высотой 1,5-2 м с прямостоячими, поникающими на концах побегами. Листва темно-зеленая. Цветки до 7 см, махровые, красные, с ароматом земляники, собраны в небольшие кисти. Цветение волнами на протяжении теплого сезона. Сорт устойчив к болезням, но может подмерзать зимой. Весной поврежденные побеги вырезают.', 'Несмотря на то, что розы шрабы считаются неприхотливыми растениями, принцип «посадил и забыл» неприемлем при их выращивании. Чтобы растение правильно развивалось и радовало цветением, надо знать, как его поливать, чем и когда подкармливать, как правильно обрезать и готовить к зиме.\r\n\r\nДля шрабов допустима посадка как осенью, так и весной. Предварительно почву обогащают органикой и минеральными комплексными удобрениями. В этом случае подкормки в первый год больше не потребуются. Прививку заглубляют на 10 см.\r\n\r\nРозы любят поливы, но тут важно не переусердствовать: лучше поливать 1 раз в 7-10 дней, но обильно, по 2-3 ведра на взрослый куст.\r\n\r\nОбрезка — важная процедура для роз, но здесь важен индивидуальный подход к каждому виду шрабов, информацию по обрезке можно найти в открытых источниках.\r\n\r\nУкрытие роз, даже зимостойких, необходимо в первые годы жизни растений. Гибкие кустарники пригибают к земле, прикрывая лапником, а прямостоячие стягивают и укутывают спанбондом.', '1 раз в неделю ', '', '', '145323.jpg', '2025-04-10 17:03:38', '2025-04-10 17:10:43'),
(2, 2, '1', '1', '1', '1', '', '', '145323.jpg', '2025-04-10 19:34:01', '2025-04-10 19:34:01');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `patronymic` varchar(40) NOT NULL,
  `num_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `auth_key`, `is_admin`, `created_at`, `updated_at`, `role`, `name`, `surname`, `patronymic`, `num_phone`) VALUES
(1, '1', '1@m.r', '$2y$13$QiNkuhVsEXHnxrxldtMWYO2dTNlu7Wz3ODnsAHZzub2ahg6XV0XYO', '3gIG7bBnZLb0TYTtyQoH9lj4xI_rs0dk', 0, '2025-04-10 15:19:16', '2025-04-10 16:53:18', 0, '1', '1', '1', '1'),
(3, 'krolik', '11@m.r', '$2y$13$RpjUOS84psdneuc/Vc9JcuhEjiAvhnxo70Fn9TGus0WYw0WEsE9Ci', 'tKoj_okPZaXdZLiF1Kf5HOGYljTP2Opu', 0, '2025-04-10 15:27:20', '2025-04-10 16:53:18', 0, '123', '123', '123', '123321'),
(4, 'asd', 'asd@mail.r', '$2y$13$WUvncGmkE5ccbS4ToWdD.e3g8cfym28zh9XwvYb4pCK4nc1Y3m4dy', 'CIcGO1uf_q7eUdlgPODTodUzMy4pIoj9', 1, '2025-04-10 15:31:10', '2025-04-10 15:39:05', 1, 'asd', 'asd', 'asd', '+7 (123) (123)-12 31');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forum_category`
--
ALTER TABLE `forum_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forum_post`
--
ALTER TABLE `forum_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `forum_category`
--
ALTER TABLE `forum_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `forum_post`
--
ALTER TABLE `forum_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `plant`
--
ALTER TABLE `plant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `forum_post`
--
ALTER TABLE `forum_post`
  ADD CONSTRAINT `forum_post_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `forum_topic` (`id`),
  ADD CONSTRAINT `forum_post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD CONSTRAINT `forum_topic_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `forum_category` (`id`),
  ADD CONSTRAINT `forum_topic_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `plant`
--
ALTER TABLE `plant`
  ADD CONSTRAINT `plant_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
