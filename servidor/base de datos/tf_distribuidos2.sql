-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2018 a las 22:21:06
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tf_distribuidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(6, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(7, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(8, '2016_06_01_000004_create_oauth_clients_table', 2),
(9, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0b19e31473507522cf8018aceec31b87640d4666828c461f9d947897e1d98573d9bf8b064276971d', 2, 1, 'MyApp', '[]', 0, '2018-07-17 09:39:24', '2018-07-17 09:39:24', '2019-07-17 05:39:24'),
('2536da7162df897f7a84b56c7f67edf158df2893a2cbfb1566e1929a8b3c3201a71f2b8b7249e5b3', 2, 1, 'MyApp', '[]', 0, '2018-07-17 10:02:55', '2018-07-17 10:02:55', '2019-07-17 06:02:55'),
('2a17516d7f6ab3e0deb7f2349166451d8d3206cd552f4ae695e669a68aeca1365791c3f689a75311', 2, 6, NULL, '[]', 0, '2018-07-17 23:23:51', '2018-07-17 23:23:51', '2019-07-17 19:23:51'),
('30727ac936d3f3e8711af6c6c3447d061b0001791c13830072af33a10747c05d0a27b5d960e35dad', 2, 1, 'MyApp', '[]', 0, '2018-07-17 09:19:20', '2018-07-17 09:19:20', '2019-07-17 05:19:20'),
('39db6435e2d1328d5b2bb83cf799dca702d05b5f08cd867c482d9eacf029a52d9a296534c0b8889e', 2, 1, 'MyApp', '[]', 0, '2018-07-17 10:13:08', '2018-07-17 10:13:08', '2019-07-17 06:13:08'),
('3f047e6b080d17675cdeb0b59fed15342340560850c1cb7efce72d68712718e2d0a450c9e17fb8a6', 2, 6, NULL, '[]', 0, '2018-07-17 23:46:47', '2018-07-17 23:46:47', '2019-07-17 19:46:47'),
('47fcb8389d85e6671e9970704c35adc30b27d5d0be23ad83236eab8b92d92b24f6babdf7d540364f', 2, 1, 'MyApp', '[]', 0, '2018-07-17 09:40:29', '2018-07-17 09:40:29', '2019-07-17 05:40:29'),
('507eb45fa229b22327452152f0dbbd708c6bcfbcb86b580cee68e17298e34b14e9b0e2941a27694c', 2, 1, 'MyApp', '[]', 0, '2018-07-17 09:11:52', '2018-07-17 09:11:52', '2019-07-17 05:11:52'),
('59339a8eee6f3498bab5dd5cb94b7879ebcdb16c8f37f7ed815d45b20cd8512a9f5af647f6f30173', 2, 6, NULL, '[]', 0, '2018-07-17 23:22:06', '2018-07-17 23:22:06', '2019-07-17 19:22:06'),
('6ba4cf35b03da264d51aa8e15567c3dc7d42b5b5d5ce1194784313093f9c41e602d26bd0004ffb48', 2, 1, 'MyApp', '[]', 0, '2018-07-17 09:00:24', '2018-07-17 09:00:24', '2019-07-17 05:00:24'),
('7104a374a176e82a58d3a37dccb902cd8cc52e1785da5a9ae0a5ea4a979963a4ff92df632f9dd592', 2, 6, NULL, '[]', 0, '2018-07-17 23:44:06', '2018-07-17 23:44:06', '2019-07-17 19:44:06'),
('76f9519920267a0130710c31fc014758c9438adb35c1b3353d280bfbc3780b95afe358276c06a062', 2, 1, 'MyApp', '[]', 0, '2018-07-17 09:57:49', '2018-07-17 09:57:49', '2019-07-17 05:57:49'),
('7bb0056e14d074bc74b6b3a824b4732972e286999c6ebede5f450cc4c38926ba13db9177585a1e4c', 2, 1, 'MyApp', '[]', 0, '2018-07-17 10:02:35', '2018-07-17 10:02:35', '2019-07-17 06:02:35'),
('9aa79fddf6508d3f562ce4c96210638694fcd597b84bfc3a99c16984786d8b439589463684df4c59', 2, 1, 'MyApp', '[]', 0, '2018-07-17 09:23:04', '2018-07-17 09:23:04', '2019-07-17 05:23:04'),
('a458809bff10df89c3b8e8b58348eeff9dc65566d5bfc38b4ded572bd4e61a6c0d849f813055db64', 2, 1, 'MyApp', '[]', 0, '2018-07-17 09:10:14', '2018-07-17 09:10:14', '2019-07-17 05:10:14'),
('a54242e0a0c41345952bd540eaf2626c54a53b08936b35945652ba647419dfec71b0d08e7d495783', 2, 1, 'MyApp', '[]', 0, '2018-07-17 10:25:43', '2018-07-17 10:25:43', '2019-07-17 06:25:43'),
('af9c7bf33c07803a8b477d11404562ba4f577b6c75d5fc72ca117ce40f159e9d1986b6a232744c78', 2, 1, 'MyApp', '[]', 0, '2018-07-17 09:55:59', '2018-07-17 09:55:59', '2019-07-17 05:55:59'),
('b99b01154b56ba8977824c1f5bc43e83410b542a407086682010958ade546fd2d04e0f2a4f0fac34', 2, 6, NULL, '[]', 0, '2018-07-17 23:43:17', '2018-07-17 23:43:17', '2019-07-17 19:43:17'),
('bac5617907e6d47212962741c3f9a2083bfca9c4237397f9b30610c54796b4266d2aeca850b84c68', 2, 1, 'MyApp', '[]', 0, '2018-07-17 09:27:00', '2018-07-17 09:27:00', '2019-07-17 05:27:00'),
('bd4e6d2a52833defb6af364606f7893ad7fd9c8a7240144a93d7791fb61631179d3ed31519b28859', 2, 1, 'MyApp', '[]', 0, '2018-07-17 10:03:16', '2018-07-17 10:03:16', '2019-07-17 06:03:16'),
('bd6f44876839c7043a6db8268aa37739739c1d5f9395eaa833d7eea623aaaa86f8962ddae36d2b9a', 2, 1, 'MyApp', '[]', 0, '2018-07-17 09:36:51', '2018-07-17 09:36:51', '2019-07-17 05:36:51'),
('d300985467dfa4ead5dbf1077a9b8c1e5f174cf60b82570dfe8f54bb70c65e039a38f964b27cbe09', 2, 6, NULL, '[]', 0, '2018-07-17 23:20:54', '2018-07-17 23:20:54', '2019-07-17 19:20:54'),
('f39220d1d845533af28bf1bfdee0c91f017dc7ef8aa716ca441530e17d665c668cccd1ad981636fa', 2, 1, 'MyApp', '[]', 0, '2018-07-17 10:17:42', '2018-07-17 10:17:42', '2019-07-17 06:17:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(6, NULL, 'AuthApp', 'NqJYLx6oOGdRFhoDP50zU57jW4u9L0JkElE4QsqE', 'http://localhost', 0, 1, 0, '2018-07-17 22:26:59', '2018-07-17 22:26:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-07-17 08:27:41', '2018-07-17 08:27:41'),
(2, 3, '2018-07-17 21:22:13', '2018-07-17 21:22:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('025e8f79a6cf4e139345f02373ad2739c8bf00dca04ac01f3878ebac5f35b4a098b9477822918dd6', '7104a374a176e82a58d3a37dccb902cd8cc52e1785da5a9ae0a5ea4a979963a4ff92df632f9dd592', 0, '2019-07-17 19:44:06'),
('29ad8e3625d997e9b73bc8ff22648bbf9d260a0a957670a2dc06e7b687e1d147c616e3dc613522ec', '2a17516d7f6ab3e0deb7f2349166451d8d3206cd552f4ae695e669a68aeca1365791c3f689a75311', 0, '2019-07-17 19:23:51'),
('33470016628f7d0f70ec22aff5bd016f43f0f409f20e754dae0103e1b138b1e0b1ca194e21c976ad', '59339a8eee6f3498bab5dd5cb94b7879ebcdb16c8f37f7ed815d45b20cd8512a9f5af647f6f30173', 0, '2019-07-17 19:22:06'),
('9c0fb9a57f67d476f2dca60e9a3ad47a62c260c399c0940fc73cecdbcc9db781e9d7322671ba05fc', '3f047e6b080d17675cdeb0b59fed15342340560850c1cb7efce72d68712718e2d0a450c9e17fb8a6', 0, '2019-07-17 19:46:47'),
('df6a3b22bfcb173e213c7345eb6481974c652f745e64ce37af069f0d2701d2447f57977435c30a3a', 'd300985467dfa4ead5dbf1077a9b8c1e5f174cf60b82570dfe8f54bb70c65e039a38f964b27cbe09', 0, '2019-07-17 19:20:54'),
('ef4a6ea2e4cc69dfcc7ef9cdf2e3fa5cd0267041884e26f3bb3bf36c4f289985264b57e7fedafbd6', 'b99b01154b56ba8977824c1f5bc43e83410b542a407086682010958ade546fd2d04e0f2a4f0fac34', 0, '2019-07-17 19:43:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `contenido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`id`, `contenido`) VALUES
(1, 'bla bla bla'),
(2, 'hola vieeeja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `tipo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nicolas', 'nikho_1@hotmail.com', '$2y$10$9MxVJCB1wQm30eZ4ZzKq9um1mVWNOc7Ub.J6Q33/joxQHYGeg/t9m', 'user', 'mrKXV5AcqqDRkrq4qMcTAwcQs9I2aoU7x0iplZCqA2v8mzIVPRhxWiYVXOS5', NULL, NULL),
(2, 'boris', 'pegajoso@ucm.cl', '$2y$10$hgyrFz5oB6MEN41GgAQX6.v7KZHynwi7DQ2Yd89GeNQMaUJbmEsW2', 'user', '7GGZilVLq2cMax0XejiXs2ckmxsq2awNx3EImLkl64FRZ5Cl49tU7k8QpYhi', '2018-07-17 02:36:38', '2018-07-17 02:36:38'),
(3, 'rodrigo', 'flaco@hotmail.com', '$2y$10$TsMh57FNG2jp8.ST8cwQgO.mZYUgi.6WvRTh9.cvCL0xwZcbXN/9G', 'user', '06udaw9FGAUzeW7qSWHtQXw6uY6LO4MrypDWzoQrRQ48rBws2rj9lWtpn8Kx', '2018-07-17 02:37:13', '2018-07-17 02:37:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
