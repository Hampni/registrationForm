-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июл 21 2022 г., 17:53
-- Версия сервера: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- Версия PHP: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `registrationForm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Countries`
--

CREATE TABLE `Countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `iso` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Countries`
--

INSERT INTO `Countries` (`id`, `name`, `iso`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Albania', 'AL'),
(3, 'Algeria', 'DZ'),
(4, 'American Samoa', 'AS'),
(5, 'Andorra', 'AD'),
(6, 'Angola', 'AO'),
(7, 'Anguilla', 'AI'),
(8, 'Antarctica', 'AQ'),
(9, 'Antigua and Barbuda', 'AG'),
(10, 'Argentina', 'AR'),
(11, 'Armenia', 'AM'),
(12, 'Aruba', 'AW'),
(13, 'Australia', 'AU'),
(14, 'Austria', 'AT'),
(15, 'Azerbaijan', 'AZ'),
(16, 'Bahamas', 'BS'),
(17, 'Bahrain', 'BH'),
(18, 'Bangladesh', 'BD'),
(19, 'Barbados', 'BB'),
(20, 'Belarus', 'BY'),
(21, 'Belgium', 'BE'),
(22, 'Belize', 'BZ'),
(23, 'Benin', 'BJ'),
(24, 'Bermuda', 'BM'),
(25, 'Bhutan', 'BT'),
(26, 'Bosnia and Herzegovina', 'BA'),
(27, 'Botswana', 'BW'),
(28, 'Bouvet Island', 'BV'),
(29, 'Brazil', 'BR'),
(30, 'British Indian Ocean Territory', 'IO'),
(31, 'Brunei Darussalam', 'BN'),
(32, 'Bulgaria', 'BG'),
(33, 'Burkina Faso', 'BF'),
(34, 'Burundi', 'BI'),
(35, 'Cambodia', 'KH'),
(36, 'Cameroon', 'CM'),
(37, 'Canada', 'CA'),
(38, 'Cape Verde', 'CV'),
(39, 'Cayman Islands', 'KY'),
(40, 'Central African Republic', 'CF'),
(41, 'Chad', 'TD'),
(42, 'Chile', 'CL'),
(43, 'China', 'CN'),
(44, 'Christmas Island', 'CX'),
(45, 'Cocos (Keeling) Islands', 'CC'),
(46, 'Colombia', 'CO'),
(47, 'Comoros', 'KM'),
(48, 'Congo', 'CG'),
(49, 'Cook Islands', 'CK'),
(50, 'Costa Rica', 'CR'),
(51, 'Croatia', 'HR'),
(52, 'Cuba', 'CU'),
(53, 'Cyprus', 'CY'),
(54, 'Czech Republic', 'CZ'),
(55, 'Denmark', 'DK'),
(56, 'Djibouti', 'DJ'),
(57, 'Dominica', 'DM'),
(58, 'Dominican Republic', 'DO'),
(59, 'Ecuador', 'EC'),
(60, 'Egypt', 'EG'),
(61, 'El Salvador', 'SV'),
(62, 'Equatorial Guinea', 'GQ'),
(63, 'Eritrea', 'ER'),
(64, 'Estonia', 'EE'),
(65, 'Ethiopia', 'ET'),
(66, 'Falkland Islands (Malvinas)', 'FK'),
(67, 'Faroe Islands', 'FO'),
(68, 'Fiji', 'FJ'),
(69, 'Finland', 'FI'),
(70, 'France', 'FR'),
(71, 'French Guiana', 'GF'),
(72, 'French Polynesia', 'PF'),
(73, 'French Southern Territories', 'TF'),
(74, 'Gabon', 'GA'),
(75, 'Gambia', 'GM'),
(76, 'Georgia', 'GE'),
(77, 'Germany', 'DE'),
(78, 'Ghana', 'GH'),
(79, 'Gibraltar', 'GI'),
(80, 'Greece', 'GR'),
(81, 'Greenland', 'GL'),
(82, 'Grenada', 'GD'),
(83, 'Guadeloupe', 'GP'),
(84, 'Guam', 'GU'),
(85, 'Guatemala', 'GT'),
(86, 'Guernsey', 'GG'),
(87, 'Guinea', 'GN'),
(88, 'Guinea-Bissau', 'GW'),
(89, 'Guyana', 'GY'),
(90, 'Haiti', 'HT'),
(91, 'Heard Island and McDonald Islands', 'HM'),
(92, 'Holy See (Vatican City State)', 'VA'),
(93, 'Honduras', 'HN'),
(94, 'Hong Kong', 'HK'),
(95, 'Hungary', 'HU'),
(96, 'Iceland', 'IS'),
(97, 'India', 'IN'),
(98, 'Indonesia', 'ID'),
(99, 'Iraq', 'IQ'),
(100, 'Ireland', 'IE'),
(101, 'Isle of Man', 'IM'),
(102, 'Israel', 'IL'),
(103, 'Italy', 'IT'),
(104, 'Jamaica', 'JM'),
(105, 'Japan', 'JP'),
(106, 'Jersey', 'JE'),
(107, 'Jordan', 'JO'),
(108, 'Kazakhstan', 'KZ'),
(109, 'Kenya', 'KE'),
(110, 'Kiribati', 'KI'),
(111, 'Kuwait', 'KW'),
(112, 'Kyrgyzstan', 'KG'),
(113, 'Lao Peoples Democratic Republic', 'LA'),
(114, 'Latvia', 'LV'),
(115, 'Lebanon', 'LB'),
(116, 'Lesotho', 'LS'),
(117, 'Liberia', 'LR'),
(118, 'Libya', 'LY'),
(119, 'Liechtenstein', 'LI'),
(120, 'Lithuania', 'LT'),
(121, 'Luxembourg', 'LU'),
(122, 'Macao', 'MO'),
(123, 'Madagascar', 'MG'),
(124, 'Malawi', 'MW'),
(125, 'Malaysia', 'MY'),
(126, 'Maldives', 'MV'),
(127, 'Mali', 'ML'),
(128, 'Malta', 'MT'),
(129, 'Marshall Islands', 'MH'),
(130, 'Martinique', 'MQ'),
(131, 'Mauritania', 'MR'),
(132, 'Mauritius', 'MU'),
(133, 'Mayotte', 'YT'),
(134, 'Mexico', 'MX'),
(135, 'Monaco', 'MC'),
(136, 'Mongolia', 'MN'),
(137, 'Montenegro', 'ME'),
(138, 'Montserrat', 'MS'),
(139, 'Morocco', 'MA'),
(140, 'Mozambique', 'MZ'),
(141, 'Myanmar', 'MM'),
(142, 'Namibia', 'NA'),
(143, 'Nauru', 'NR'),
(144, 'Nepal', 'NP'),
(145, 'Netherlands', 'NL'),
(146, 'New Caledonia', 'NC'),
(147, 'New Zealand', 'NZ'),
(148, 'Nicaragua', 'NI'),
(149, 'Niger', 'NE'),
(150, 'Nigeria', 'NG'),
(151, 'Niue', 'NU'),
(152, 'Norfolk Island', 'NF'),
(153, 'Northern Mariana Islands', 'MP'),
(154, 'Norway', 'NO'),
(155, 'Oman', 'OM'),
(156, 'Pakistan', 'PK'),
(157, 'Palau', 'PW'),
(158, 'Panama', 'PA'),
(159, 'Papua New Guinea', 'PG'),
(160, 'Paraguay', 'PY'),
(161, 'Peru', 'PE'),
(162, 'Philippines', 'PH'),
(163, 'Pitcairn', 'PN'),
(164, 'Poland', 'PL'),
(165, 'Portugal', 'PT'),
(166, 'Puerto Rico', 'PR'),
(167, 'Qatar', 'QA'),
(168, 'Romania', 'RO'),
(169, 'Russian Federation', 'RU'),
(170, 'Rwanda', 'RW'),
(171, 'Saint Kitts and Nevis', 'KN'),
(172, 'Saint Lucia', 'LC'),
(173, 'Saint Martin (French part)', 'MF'),
(174, 'Saint Pierre and Miquelon', 'PM'),
(175, 'Saint Vincent and the Grenadines', 'VC'),
(176, 'Samoa', 'WS'),
(177, 'San Marino', 'SM'),
(178, 'Sao Tome and Principe', 'ST'),
(179, 'Saudi Arabia', 'SA'),
(180, 'Senegal', 'SN'),
(181, 'Serbia', 'RS'),
(182, 'Seychelles', 'SC'),
(183, 'Sierra Leone', 'SL'),
(184, 'Singapore', 'SG'),
(185, 'Sint Maarten (Dutch part)', 'SX'),
(186, 'Slovakia', 'SK'),
(187, 'Slovenia', 'SI'),
(188, 'Solomon Islands', 'SB'),
(189, 'Somalia', 'SO'),
(190, 'South Africa', 'ZA'),
(191, 'South Georgia and the South Sandwich Islands', 'GS'),
(192, 'South Sudan', 'SS'),
(193, 'Spain', 'ES'),
(194, 'Sri Lanka', 'LK'),
(195, 'Sudan', 'SD'),
(196, 'Suriname', 'SR'),
(197, 'Svalbard and Jan Mayen', 'SJ'),
(198, 'Swaziland', 'SZ'),
(199, 'Sweden', 'SE'),
(200, 'Switzerland', 'CH'),
(201, 'Syrian Arab Republic', 'SY'),
(202, 'Tajikistan', 'TJ'),
(203, 'Thailand', 'TH'),
(204, 'Timor-Leste', 'TL'),
(205, 'Togo', 'TG'),
(206, 'Tokelau', 'TK'),
(207, 'Tonga', 'TO'),
(208, 'Trinidad and Tobago', 'TT'),
(209, 'Tunisia', 'TN'),
(210, 'Turkey', 'TR'),
(211, 'Turkmenistan', 'TM'),
(212, 'Turks and Caicos Islands', 'TC'),
(213, 'Tuvalu', 'TV'),
(214, 'Uganda', 'UG'),
(215, 'Ukraine', 'UA'),
(216, 'United Arab Emirates', 'AE'),
(217, 'United Kingdom', 'GB'),
(218, 'United States', 'US'),
(219, 'United States Minor Outlying Islands', 'UM'),
(220, 'Uruguay', 'UY'),
(221, 'Uzbekistan', 'UZ'),
(222, 'Vanuatu', 'VU'),
(223, 'Viet Nam', 'VN'),
(224, 'Wallis and Futuna', 'WF'),
(225, 'Western Sahara', 'EH'),
(226, 'Yemen', 'YE'),
(227, 'Zambia', 'ZM'),
(228, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `report_subject` text NOT NULL,
  `country` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `birthday`, `report_subject`, `country`, `phone`, `email`, `company`, `position`, `about_me`, `photo`) VALUES
(129, 'Illia', 'Prodanets', '2022-07-21', 'Report subject Number 1', 'Bahrain', '+1 (219) 381-2983', 'qweqwe@gmail.com', '', '', '', 'serdechko.jpg'),
(130, 'Nikita', 'Chaus', '2015-07-07', 'Report subject Number 2', 'Aruba', '+1 (908) 098-0980', 'chaus@gmail.com', '', '', '', 'default.png'),
(131, 'Fedor', 'Fedorenko', '2012-07-24', 'Report subject Number 3', 'Antarctica', '+1 (128) 301-2983', 'zarzar@gmail.com', '', '', '', 'Idealnoe-muzhskoe-litso-4.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Countries`
--
ALTER TABLE `Countries`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Countries`
--
ALTER TABLE `Countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
