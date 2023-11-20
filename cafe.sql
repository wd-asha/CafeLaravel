-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 19 2023 г., 23:11
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cafe`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `slug`, `title`, `created_at`, `updated_at`) VALUES
(1, 'soup', 'суп', '2023-11-15 14:38:46', NULL),
(2, 'salad', 'салат', '2023-11-15 14:38:46', NULL),
(3, 'drink', 'напиток', '2023-11-15 14:38:46', NULL),
(4, 'bakery', 'выпечка', '2023-11-15 14:38:46', NULL),
(5, 'snack', 'закуска', '2023-11-15 14:38:46', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int UNSIGNED DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` int UNSIGNED DEFAULT NULL,
  `price` int UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media/dish/empty-image.png',
  `compound` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `category_id`, `slug`, `title`, `weight`, `price`, `status`, `image`, `compound`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'salat-s-mocareloy-i-tomatami', 'Салат с моцарелой и томатами', 200, 220, 1, 'media/dish/1782715914560529.jpg', '<p>помидоры<br>моцарела<br>масло оливковое<br>базелик<br>уксус<br>перец<br></p>', '2023-11-16 05:26:21', '2023-11-16 06:21:07', NULL),
(2, 2, 'teplyy-salat-s-kuricey-i-bekonom', 'Теплый салат с курицей и беконом', 250, 175, 1, 'media/dish/1782719510765757.jpg', '<p>бекон<br>филе куриное<br>масло растительное<br>листья салата<br>помидор<br>майонез<br>лимон<br></p>', '2023-11-16 06:23:30', '2023-11-16 06:23:30', NULL),
(3, 2, 'steyk-malat-s-ovoshchami-gril', 'Стейк-салат с овощами-гриль', 400, 265, 1, 'media/dish/1782719791257974.jpg', '<p>стейк<br>перец болгарский<br>баклажаны<br>виноград<br>цукини<br>гранат<br>перец<br></p>', '2023-11-16 06:27:58', '2023-11-16 06:27:58', NULL),
(4, 2, 'buratta-s-tomatami', 'Буратта с томатами', 300, 345, 1, 'media/dish/1782742973665548.jpg', '<p>сыр Буратта<br>масло оливковое<br>помидоры<br>базелик<br>чеснок<br>уксус<br></p>', '2023-11-16 12:36:26', '2023-11-16 12:36:26', NULL),
(5, 2, 'salat-s-tuncom', 'Салат с тунцом', 300, 235, 1, 'media/dish/1782743249375989.jpg', '<p>тунец<br>капуста пекинская<br>масло оливковое<br>помидоры черри<br>перец сладкий<br>горчица<br>чеснок<br>яйцо<br>лук<br></p>', '2023-11-16 12:40:49', '2023-11-16 12:40:49', NULL),
(6, 2, 'salat-olive', 'Салат Оливье', 300, 125, 1, 'media/dish/1782743529562808.jpg', '<p>горошек зеленый<br>огурцы соленые<br>лук зеленый<br>картофель<br>морковь<br>майонез<br>ветчина<br>перец<br>яйцо<br></p>', '2023-11-16 12:45:16', '2023-11-16 12:45:16', NULL),
(7, 5, 'kesadilya-s-kuricey', 'Кесадилья с курицей', 200, 235, 1, 'media/dish/1782792514373967.jpg', '<p>филе куриное<br>перец сладкий<br>масло растительное<br>сыр Чеддер<br>помидоры<br>чеснок<br>кинза<br>лайм<br>лук<br></p>', '2023-11-17 01:43:52', '2023-11-17 01:43:52', NULL),
(8, 2, 'spagetti-s-sousom', 'Спагетти с соусом', 250, 175, 1, 'media/dish/1782792643403580.jpg', '<p>спагетти<br>соус Песто<br>сыр Пармезан<br>безелик<br></p>', '2023-11-17 01:45:55', '2023-11-17 01:45:55', NULL),
(9, 5, 'myasnaya-lazanya', 'Мясная лазанья', 250, 195, 1, 'media/dish/1782792784934756.jpg', '<p>мясной фарш<br>томатная паста<br>масло оливковое<br>сыр Пармезан<br>вино красное<br>морковь<br>чеснок<br>лук<br></p>', '2023-11-17 01:48:10', '2023-11-17 01:48:10', NULL),
(10, 5, 'zapechenaya-svinina-s-kartofelem', 'Запеченая свинина с картофелем', 300, 235, 1, 'media/dish/1782792909649709.jpg', '<p>свинина<br>картофель<br>масло подсолнечное<br>приправа Аджика<br>чеснок<br>перец<br>паприка<br></p>', '2023-11-17 01:50:09', '2023-11-17 01:50:09', NULL),
(11, 5, 'burger-s-kartofelem', 'Бургер с картофелем', 200, 275, 1, 'media/dish/1782793086909627.jpg', '<p>говяжий фарш<br>картофель Фри<br>сдобная булочка<br>масло растительное<br>кетчуп<br>перец<br>сыр<br>лук<br></p>', '2023-11-17 01:52:58', '2023-11-17 01:52:58', NULL),
(12, 5, 'govyazhi-shchechki-s-kartofelem', 'Говяжьи щечки с картофелем', 250, 280, 1, 'media/dish/1782793192594848.jpg', '<p>щеки говяжьи<br>морковь<br>томаты<br>картофель<br>пастернак<br>лук<br></p>', '2023-11-17 01:54:39', '2023-11-17 01:54:39', NULL),
(13, 4, 'hleb-baget', 'Хлеб «Багет»', 250, 60, 1, 'media/dish/1782793401319219.jpg', '<p>мука пшеничная<br>оливковое масло<br>кунжут<br>сахар<br>соль<br></p>', '2023-11-17 01:57:58', '2023-11-17 01:57:58', NULL),
(14, 4, 'hleb-chmabatta', 'Хлеб «Чиабатта»', 250, 60, 1, 'media/dish/1782793480062831.jpg', '<p>мука пшеничная<br>оливковое масло<br>соль<br></p>', '2023-11-17 01:59:13', '2023-11-17 01:59:13', NULL),
(15, 4, 'hleb-rzhanoy', 'Хлеб «Ржаной»', 250, 50, 1, 'media/dish/1782793566172733.jpg', '<p>мука ржаная<br>растительное масло<br>соль<br></p>', '2023-11-17 02:00:35', '2023-11-17 02:00:35', NULL),
(17, 1, 'solyanka-myasnaya', 'Солянка мясная', 300, 330, 1, 'media/dish/1782802007016294.jpg', '<p>оливки<br>говядина<br>бульон говяжий<br>томатная паста<br>маслины<br>каперсы<br>лимон<br>лук<br></p>', '2023-11-17 04:14:45', '2023-11-17 04:14:45', NULL),
(18, 1, 'gorohovyy-sup', 'Гороховый суп', 300, 240, 1, 'media/dish/1782802159382423.jpg', '<p>бекон<br>горох<br>рулька<br>бульон говяжий<br>картофель<br>морковь<br>перец лук<br></p>', '2023-11-17 04:17:10', '2023-11-17 04:17:10', NULL),
(19, 1, 'rassolnik', 'Рассольник', 300, 240, 1, 'media/dish/1782806161472134.jpg', '<p>говядина<br>бульон говяжий<br>огурцы соленые<br>картофель<br>морковь<br>лук<br></p>', '2023-11-17 04:18:44', '2023-11-17 05:20:47', NULL),
(20, 1, 'sup-harcho', 'Суп Харчо', 300, 250, 1, 'media/dish/1782802447099902.jpg', '<p>рис<br>говядина<br>перец болгарский<br>томатная паста<br>хмели-сунели<br>аджика<br>чеснок<br>кинза<br>лук<br></p>', '2023-11-17 04:21:45', '2023-11-17 04:21:45', NULL),
(21, 1, 'kurinaya-lapsha', 'Куриная лапша', 300, 250, 1, 'media/dish/1782802553112992.jpg', '<p>куриный бульон<br>куриное филе<br>яичная лапша<br>морковь<br>базилик<br>укроп<br>лук<br></p>', '2023-11-17 04:23:26', '2023-11-17 04:23:26', NULL),
(22, 1, 'udon-s-kuricey-i-krevetkami', 'Удон с курицей и креветками', 300, 350, 1, 'media/dish/1782802713200926.jpg', '<p>бульон куриный<br>перец болгарский<br>куриное филе<br>паста Карри<br>соевый соус<br>шампиньены<br>креветки<br>яйца<br>лук<br></p>', '2023-11-17 04:25:58', '2023-11-17 04:25:58', NULL),
(23, 1, 'tomatnyy-sup-s-indeykoy', 'Томатный суп с индейкой', 300, 260, 1, 'media/dish/1782802789354450.jpg', '<p>филе индейки<br>бульон куриный<br>помидоры<br>базилик<br>лук<br></p>', '2023-11-17 04:27:11', '2023-11-17 04:27:11', NULL),
(24, 1, 'meksikanskiy-sup-chili', 'Мексиканский суп Чили', 300, 350, 1, 'media/dish/1782802915416254.jpg', '<p>говядина<br>бульон куриный<br>фасоль красная<br>перец болгарский<br>перец Чили<br>помидоры<br>горошек<br>базилик<br>лук<br></p>', '2023-11-17 04:29:11', '2023-11-17 04:29:11', NULL),
(25, 1, 'borshch-myasnoy', 'Борщ мясной', 300, 280, 1, 'media/dish/1782806123285635.jpg', '<p>говядина<br>томатная паста<br>картофель<br>капуста<br>морковь<br>свекла<br>специи<br>лук<br></p>', '2023-11-17 05:20:11', '2023-11-17 05:20:11', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_15_184221_create_roles_table', 1),
(6, '2023_11_15_192222_create_categories_table', 2),
(7, '2023_11_16_044216_create_dishes_table', 3),
(9, '2023_11_16_051621_add_field_soft_to_users_table', 4),
(10, '2023_11_18_155813_create_order_items_table', 5),
(11, '2023_11_18_155912_create_orders_table', 5),
(13, '2023_11_18_163241_create_places_table', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` int NOT NULL DEFAULT '0',
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `slug`, `user_id`, `user_name`, `order_delivery`, `order_email`, `order_phone`, `order_status`, `order_total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, NULL, NULL, 'Михаил', 'Челябинская обл. Аша, Ленина', NULL, '89043000734', 1, '220', '2023-11-19 14:51:22', '2023-11-19 15:08:59', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dish_id` int UNSIGNED DEFAULT NULL,
  `dish_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dish_weight` int UNSIGNED DEFAULT NULL,
  `dish_price` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `slug`, `dish_id`, `dish_title`, `dish_weight`, `dish_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 4, NULL, 1, 'Салат с моцарелой и томатами', 200, 220, '2023-11-19 14:51:22', '2023-11-19 14:51:22', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `places` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Author', 'author', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL DEFAULT '2',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 1, NULL, '$2y$10$Upmkr/g2nYH5qHBFwqQNKedNwHxTeD1.7KOpsl.E2wPsitj46eeBa', 'yBXrSBkxqDdY07D8AYMmHBNQsVB4w3tHIGdMjmVtdZ6vOLGF14vjqnscy84m', '2023-11-15 13:52:20', NULL, NULL),
(2, 'Author', 'author@gmail.com', 2, NULL, '$2y$10$1JhdC1HsidgnNz79NPTb/OSq24AM9SI6JRf/ODe2T/m8J.WWezRSS', NULL, '2023-11-15 13:52:20', '2023-11-16 00:33:09', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
