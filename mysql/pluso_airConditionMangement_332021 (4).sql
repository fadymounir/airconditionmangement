-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2021 at 01:14 AM
-- Server version: 5.7.29
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pluso_airConditionMangement`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL DEFAULT 'test',
  `delated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_ar`, `name_en`, `delated_at`, `created_at`) VALUES
(1, 'test ar', 'test', '2021-02-07 17:46:08', '2021-02-07 17:45:59'),
(2, 'test city', 'test', NULL, '2021-02-07 19:56:16'),
(3, 'محاسن', 'test', NULL, '2021-02-08 15:21:52'),
(4, 'الخالدية', 'test', NULL, '2021-02-08 15:22:04'),
(5, 'السلامانية الشمالية', 'test', '2021-02-08 15:22:18', '2021-02-08 15:22:14'),
(6, 'السلمانية الشمالية', 'test', NULL, '2021-02-08 15:22:31'),
(7, 'السلمانية الجنوبية', 'test', NULL, '2021-02-08 15:23:00'),
(8, 'الطرف', 'test', NULL, '2021-02-08 15:23:11'),
(9, 'الجشة', 'test', NULL, '2021-02-08 15:23:18'),
(10, 'الجفر', 'test', NULL, '2021-02-08 15:23:23'),
(11, 'الفضول', 'test', NULL, '2021-02-08 15:23:32'),
(12, 'المنيزلة', 'test', NULL, '2021-02-08 15:23:39'),
(13, 'القارة', 'test', NULL, '2021-02-08 15:23:44'),
(14, 'بني معن', 'test', NULL, '2021-02-08 15:23:50'),
(15, 'الصالحية', 'test', NULL, '2021-02-08 15:24:03'),
(16, 'الثليثية', 'test', NULL, '2021-02-08 15:24:12'),
(17, 'المثلث', 'test', NULL, '2021-02-08 15:24:20'),
(18, 'المزروع', 'test', NULL, '2021-02-08 15:24:40'),
(19, 'النسيم', 'test', NULL, '2021-02-08 15:24:45'),
(20, 'الواحة', 'test', NULL, '2021-02-08 15:24:52'),
(21, 'الاستاذ الرياضي', 'test', NULL, '2021-02-08 15:25:03'),
(22, 'النايفية', 'test', NULL, '2021-02-08 15:25:09'),
(23, 'حديقة الملك عبدالله', 'test', NULL, '2021-02-08 15:25:25'),
(24, 'المهندسين', 'test', NULL, '2021-02-08 15:25:32'),
(25, 'الغسانية', 'test', NULL, '2021-02-08 15:25:41'),
(26, 'محاسن ارامكو', 'test', NULL, '2021-02-08 15:25:48'),
(27, 'الراشدية', 'test', NULL, '2021-02-08 15:25:58'),
(28, 'النزهه', 'test', NULL, '2021-02-08 15:26:07'),
(29, 'الشقيق', 'alshaqiq', NULL, '2021-02-08 15:26:13'),
(30, 'الجبيل', 'test', NULL, '2021-02-08 15:26:20'),
(31, 'العيون', 'aleuyun', NULL, '2021-02-08 15:26:25'),
(32, 'المراح', 'almarah', NULL, '2021-02-08 15:26:31'),
(33, 'الكلابية', 'alkalabia', NULL, '2021-02-08 15:26:37'),
(34, 'المنقور نادي الفتح', 'test', NULL, '2021-02-08 15:29:49'),
(35, 'المزروعية', 'almazrueia', NULL, '2021-02-08 15:30:53'),
(36, 'الصيهد', 'alsayhad', NULL, '2021-02-08 15:31:00'),
(37, 'شارع الرياض', 'test', NULL, '2021-02-08 15:31:07'),
(38, 'شارع حرض', 'test', NULL, '2021-02-08 15:31:14'),
(39, 'الرقيقة', 'alraqiqa', NULL, '2021-02-08 15:31:20'),
(40, 'شارع اللؤلؤة', 'test', NULL, '2021-02-08 15:31:28'),
(41, 'دوار لولو', 'duwwar lulu', NULL, '2021-02-08 15:31:35'),
(42, 'دوار المراعي', 'dawwar almaraei', NULL, '2021-02-08 15:31:42'),
(43, 'دوار السفينة', 'dawar alsafina', NULL, '2021-02-08 15:31:50'),
(44, 'المعلمين الغربية', 'almuealimin algharbia', NULL, '2021-02-08 15:32:16'),
(45, 'عين علي', 'test', NULL, '2021-02-08 15:32:22'),
(46, 'المحمدية', 'almhmdy', NULL, '2021-02-08 15:32:30'),
(47, 'مستوصف الهدى', 'test', NULL, '2021-02-08 15:32:40'),
(48, 'مستشفى الملك فهد', 'mustashfaa almalik fahd', NULL, '2021-02-08 15:32:49'),
(49, 'مستشفى الموسى', 'mustashfaa almusaa', NULL, '2021-02-08 15:33:04'),
(50, 'اليحيى', 'alyahyaa', NULL, '2021-02-08 15:33:10'),
(51, 'البحيرية', 'albuhayria', NULL, '2021-02-08 15:33:33'),
(52, 'المبرز', 'almubriz', NULL, '2021-02-13 09:29:11'),
(53, 'القادسية', 'alqadisia', NULL, '2021-02-13 09:30:44'),
(54, 'الجليجلة', 'aljalijila', NULL, '2021-02-15 17:10:56'),
(55, 'البندرية', 'albunduria', NULL, '2021-02-16 08:30:30'),
(56, 'الخالدية', 'alkhalidia', NULL, '2021-02-22 04:56:27'),
(57, 'الزهرة', 'alzahra', NULL, '2021-02-22 15:10:06'),
(58, 'الصقور', 'alsqor', NULL, '2021-02-24 12:26:47'),
(59, 'الوزية', 'alwzeyh', NULL, '2021-02-27 17:56:52'),
(60, 'العمران', 'aleumran', NULL, '2021-03-02 05:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `delated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `name_ar`, `name_en`, `delated_at`, `created_at`) VALUES
(1, 'tets aevvvv', 'tert enffff', '2021-02-07 17:46:29', '2021-02-07 17:46:19'),
(2, 'test ar', 'test en', NULL, '2021-02-07 19:55:57'),
(3, 'غسيل مكيف', 'clean ac', NULL, '2021-02-11 05:36:33'),
(4, 'تغيير موبينا', 'mubena', NULL, '2021-02-11 05:37:17'),
(5, 'تعبئة فريون', 'Freon filling', NULL, '2021-02-11 06:06:53'),
(6, 'تعبئة فريون', 'charge freon', '2021-02-11 06:09:26', '2021-02-11 06:09:20'),
(7, 'تغيير كمبروسر', 'Change the compressor', NULL, '2021-02-11 06:10:33'),
(8, 'تغيير كونتكتر', 'Contactor change', NULL, '2021-02-15 05:40:44'),
(9, 'تغيير دينمو الوحدة الخارجية', 'Change the dynamics of the outdoor unit', NULL, '2021-02-15 05:41:30'),
(10, 'تغيير دينمو الوحدة الداخلية', 'Change the dynamism of the indoor unit', NULL, '2021-02-15 05:41:59'),
(11, 'تغيير المروحة', 'Fan change', NULL, '2021-02-15 05:42:29'),
(12, 'صيانة الدينمو', 'Dynamo maintenance', NULL, '2021-02-15 05:42:56'),
(13, 'تغيير ال ice blower', 'Change the ice blower', NULL, '2021-02-15 05:43:30'),
(14, 'صيانة خفيفة', 'Light maintenance', NULL, '2021-02-15 05:44:14'),
(15, 'فحص مكيف', 'chek ac', NULL, '2021-02-15 17:15:55'),
(16, 'تركيب مكيف', 'Air conditioner installation', NULL, '2021-02-23 12:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_problems`
--

CREATE TABLE `maintenance_problems` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `delated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintenance_problems`
--

INSERT INTO `maintenance_problems` (`id`, `name_ar`, `name_en`, `delated_at`, `created_at`) VALUES
(1, 'l,;l,;l,', 'qweqweqwe', '2021-02-16 18:31:41', '2021-02-16 18:31:04'),
(2, 'test', 'test', '2021-02-23 06:21:55', '2021-02-16 18:31:49'),
(3, '0ddddd', 'qweqweqwe', '2021-02-23 06:21:51', '2021-02-16 18:33:30'),
(4, 'test', 'test', '2021-02-23 06:21:48', '2021-02-18 13:20:24'),
(5, 'المكيف يشتغل ويفصل', 'The air conditioner works and turns off', NULL, '2021-02-18 13:20:27'),
(6, 'التبريد ضعيف', 'Poor cooling', NULL, '2021-02-18 13:20:29'),
(7, 'المكيف بارد أحيانا وحار أحيانا', 'The air conditioner is sometimes cold and hot', NULL, '2021-02-18 13:20:31'),
(8, 'المكيف لا يشتغل', 'The air conditioner does not work', NULL, '2021-02-18 13:20:33'),
(9, 'المكيف صوت إزعاج', 'The air conditioner is noisy', NULL, '2021-02-18 13:20:35'),
(10, 'المكيف حار', 'The air conditioner is hot', NULL, '2021-02-18 13:20:36'),
(11, 'غسيل مكيف', 'Conditioner wash', NULL, '2021-02-18 13:20:38'),
(12, 'تركيب مكيف', 'Air conditioner installation', NULL, '2021-02-23 13:01:01'),
(13, 'ضمان', 'Guarantee', NULL, '2021-02-23 14:03:31'),
(14, 'تركيب قطعة', 'Fitting piece', NULL, '2021-02-23 14:42:12'),
(15, 'تمديد بيت', 'House extension', NULL, '2021-02-24 12:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `service_type` enum('order_offer_product','other') NOT NULL,
  `tax` double NOT NULL DEFAULT '0',
  `total_invoice` double NOT NULL,
  `quantity` double NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `desciption` longtext,
  `created_at` datetime NOT NULL,
  `date_action` datetime NOT NULL,
  `closed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `city_id`, `service_type`, `tax`, `total_invoice`, `quantity`, `user_id`, `desciption`, `created_at`, `date_action`, `closed_at`) VALUES
(52, 'خالد الثواب', '0505913239', 'https://maps.app.goo.gl/grxHdDVoTeE8Ntm67', 55, 'other', 104.994, 699.96, 12, 19, 'غسيل 12 مكيف', '2021-02-23 05:12:47', '2021-02-23 09:00:00', NULL),
(54, 'عميل', '0553358593', 'المبرز', 52, 'order_offer_product', 3720, 24800, 8, NULL, NULL, '2021-02-23 06:33:59', '2021-02-23 12:00:00', NULL),
(55, 'عميل', '0553358593', 'المبرز', 52, 'order_offer_product', 3720, 24800, 8, NULL, NULL, '2021-02-23 06:34:26', '2021-02-23 12:00:00', NULL),
(57, 'محمد المغربي', '0508761257', 'https://maps.app.goo.gl/pJdiMSLyA3iHcoZ4A', 56, 'other', 10.5, 70, 1, 19, NULL, '2021-02-23 12:56:01', '2021-02-23 16:00:00', '2021-02-23 13:51:09'),
(58, 'محمد الضيف', '0557033090', 'https://g.co/kgs/aG77kQ', 46, 'other', 0.15, 1, 1, 20, NULL, '2021-02-23 13:03:09', '2021-02-24 18:29:00', '2021-02-24 15:32:52'),
(59, 'انور محمد', '0509555525', 'https://goo.gl/maps/bmEZ1qPo6ekfNzCZA', 27, 'other', 0.15, 1, 1, 19, NULL, '2021-02-23 14:05:43', '2021-02-23 17:05:00', '2021-02-23 14:44:51'),
(60, 'صالح الديري', '0546133412', 'https://goo.gl/maps/aWHJiB1iFKpWGtfN7', 3, 'other', 30, 200, 2, 20, NULL, '2021-02-23 14:37:41', '2021-02-24 18:24:00', '2021-02-24 15:26:02'),
(61, 'ابو يحيى', '0566615554', 'https://goo.gl/maps/t9h8VBvBUoBv97G99', 35, 'other', 0.15, 1, 1, 20, NULL, '2021-02-23 14:43:23', '2021-02-24 18:24:00', '2021-02-24 15:26:30'),
(62, 'صلاح المغلوث', '0555921222', 'https://goo.gl/maps/1NdQYpk6H6MxMpYcA', 52, 'other', 52.5, 350, 5, 20, NULL, '2021-02-23 15:24:43', '2021-02-24 18:33:00', '2021-02-24 15:34:38'),
(63, 'test', '01224267589', 'Unnamed Road, Telah, Minya, Menia Governorate, Egypt', 2, 'other', 0, 0, 0, 21, 'test', '2021-02-23 18:26:34', '2021-02-23 20:26:00', NULL),
(64, 'خليل السميح', '0505920538', 'https://goo.gl/maps/m4ssUL2J4R5QT6ej6', 7, 'other', 105, 700, 6, 20, NULL, '2021-02-23 20:08:36', '2021-02-24 08:30:00', '2021-02-24 15:38:34'),
(65, 'محمد الحنوط', '0556112289', 'https://maps.app.goo.gl/UQVwF6LN5dV58re29', 39, 'other', 101.25, 675, 45, 19, NULL, '2021-02-23 20:13:59', '2021-02-24 09:30:00', '2021-02-24 17:43:49'),
(66, 'محمد العبد اللطيف', '0505929214', 'https://goo.gl/maps/13zAxTeQ6Rn56Q7r7', 56, 'other', 105, 700, 70, 19, NULL, '2021-02-24 08:08:43', '2021-02-24 16:00:00', '2021-02-24 17:44:47'),
(67, 'احمد البجيس', '0570777743', 'https://maps.app.goo.gl/33KeoTWjaD6NqNZ17', 58, 'other', 0.075, 0.5, 1, 20, NULL, '2021-02-24 12:29:18', '2021-02-24 16:01:00', '2021-02-24 13:54:21'),
(68, 'احمد البجيس', '0570777743', 'https://maps.app.goo.gl/33KeoTWjaD6NqNZ17', 58, 'other', 0, 0, 0, 20, NULL, '2021-02-25 04:43:43', '2021-02-27 08:13:00', NULL),
(69, 'صالح الزين', '0597433777', 'https://goo.gl/maps/F7BALrHxaGz2C1vFA', 44, 'other', 73.5, 490, 7, 20, NULL, '2021-02-25 12:48:58', '2021-02-28 18:13:00', '2021-02-28 15:31:32'),
(70, 'عبدالله بوحماد', '0594998999', 'https://goo.gl/maps/pfUoEG3Ar1e9aWGn7', 3, 'other', 45, 300, 1, 20, NULL, '2021-02-25 15:41:53', '2021-02-28 18:02:00', '2021-02-28 15:34:12'),
(71, 'fady', '01224267589', 'Unnamed Road, Telah, Minya, Menia Governorate, Egypt', 2, 'other', 33, 220, 220, 21, 'test', '2021-02-26 22:30:02', '2021-02-26 00:40:29', NULL),
(72, 'جواد التريكي', '0558616026', 'https://maps.app.goo.gl/n7D9eew9ZbaYpLa26', 25, 'other', 45, 300, 1, 19, NULL, '2021-02-27 04:40:04', '2021-02-27 08:45:00', '2021-02-27 10:22:43'),
(73, 'راشد', '0508111799', 'https://goo.gl/maps/bfdnR9ynaQDyYXww9', 7, 'other', 0, 0, 0, 19, NULL, '2021-02-27 13:09:34', '2021-02-28 18:36:00', NULL),
(74, 'فواز الخانم', '0550608321', 'https://goo.gl/maps/NbiSm5Uv9NJWoSMa6', 27, 'other', 22.5, 150, 150, 19, NULL, '2021-02-27 14:21:22', '2021-02-27 17:21:00', '2021-02-27 20:01:08'),
(75, 'خليفة الزغبي', '0559227555', 'https://goo.gl/maps/16rV7VWotdjDgE8C9', 59, 'other', 84, 560, 70, 19, NULL, '2021-02-27 17:59:03', '2021-02-28 18:30:00', '2021-02-28 19:50:45'),
(76, 'عبدالرحمن', '0561315021', 'https://goo.gl/maps/7h4Jcz3xNti5EWRv5', 44, 'other', 42, 280, 4, 20, NULL, '2021-02-28 05:23:55', '2021-02-28 08:23:00', '2021-02-28 15:33:05'),
(77, 'العلي', '0555009621', 'https://maps.app.goo.gl/HShGz4kWwUNqqP4e7', 3, 'other', 105, 700, 70, 19, NULL, '2021-02-28 10:13:26', '2021-02-28 14:02:00', '2021-02-28 19:49:53'),
(78, 'عبدالرحمن', '0508422223', 'https://goo.gl/maps/iKhwT5U2P9fiQADc6', 27, 'other', 52.5, 350, 5, 20, NULL, '2021-02-28 14:00:29', '2021-02-28 17:00:00', '2021-02-28 17:36:18'),
(79, 'teest', 'ggggg', 'fggg', 2, 'other', 78, 520, 3, 19, NULL, '2021-02-28 17:14:15', '2021-02-28 20:01:00', '2021-02-28 17:16:38'),
(80, 'موسى عبدالله', '0541173773', 'https://maps.app.goo.gl/ZoWfZqjfCT2q3YVz8', 28, 'other', 120, 800, 3, 19, NULL, '2021-03-01 12:04:21', '2021-03-01 08:02:00', NULL),
(81, 'ابو خالد مسجد', '0541558782', 'https://maps.app.goo.gl/BuGGxyzcJW5aiYhMA', 41, 'other', 10.5, 70, 1, 19, NULL, '2021-03-01 12:08:18', '2021-03-01 12:06:00', '2021-03-01 14:45:00'),
(82, 'عميل شارع الظهران', '0564114924', 'https://maps.app.goo.gl/BTRbmseYZ6hhriE57', 52, 'other', 21, 140, 2, 19, NULL, '2021-03-01 12:09:43', '2021-03-01 15:01:00', '2021-03-01 14:42:18'),
(83, 'عميل زكي', '0505923287', 'https://maps.app.goo.gl/oWdTSbTh4LPCuUix5', 52, 'other', 81, 540, 4, 19, NULL, '2021-03-02 05:00:52', '2021-03-02 08:00:00', '2021-03-02 13:13:58'),
(84, 'علي القرني', '0504828870', 'https://goo.gl/maps/6uorUYDud87LEJn76', 36, 'other', 0.15, 1, 1, 19, 'فك مكيف', '2021-03-02 05:25:21', '2021-03-02 11:01:00', '2021-03-02 13:15:05'),
(85, 'علاء العمران', '0545956555', 'https://goo.gl/maps/CdyM7bpNqsXFGmre6', 60, 'other', 31.5, 210, 4, 20, NULL, '2021-03-02 05:29:04', '2021-03-02 18:02:00', NULL),
(86, 'نايف السبيعي', '0555888978', 'https://maps.app.goo.gl/QobwthzEqpriodvQ8', 31, 'other', 0, 0, 0, 20, NULL, '2021-03-02 11:43:47', '2021-03-02 14:45:00', NULL),
(87, 'عميل الحزم', '0568179794', 'https://maps.app.goo.gl/uBauRTUh2LTjA1jN6', 52, 'other', 42, 280, 4, 19, NULL, '2021-03-02 11:48:55', '2021-03-02 16:04:00', '2021-03-02 15:00:21'),
(88, 'عبدالعزيز', '0501614500', 'https://maps.google.com/?q=25.368097,49.551102', 6, 'other', 0, 0, 0, 19, NULL, '2021-03-02 16:56:51', '2021-03-03 16:00:00', NULL),
(89, 'راشد العتيبي', '0566571111', 'https://goo.gl/maps/DJDXVpfDtRF7GYVn8', 7, 'other', 0, 0, 0, 20, NULL, '2021-03-02 17:04:13', '2021-03-03 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_Installation`
--

CREATE TABLE `orders_Installation` (
  `id` int(11) NOT NULL,
  `service_type` enum('new_installation','old_installation','reassemble_and_assemble','reassemble') NOT NULL,
  `conditioner_type` enum('window','Split','cupboard','cassette') NOT NULL,
  `quantity` double NOT NULL DEFAULT '0',
  `pipes_meters` double NOT NULL DEFAULT '0',
  `chairs_number` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `payment_type` enum('cash','later','bank') NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_Installation`
--

INSERT INTO `orders_Installation` (`id`, `service_type`, `conditioner_type`, `quantity`, `pipes_meters`, `chairs_number`, `total`, `payment_type`, `order_id`, `created_at`) VALUES
(49, 'reassemble_and_assemble', 'Split', 1, 0, 0, 200, 'cash', 60, '2021-02-24 15:26:02'),
(50, 'old_installation', 'Split', 3, 0, 0, 400, 'cash', 64, '2021-02-24 15:38:34'),
(52, 'new_installation', 'window', 10, 10, 10, 10, 'cash', 71, '2021-02-26 22:42:36'),
(53, 'new_installation', 'window', 0, 0, 0, 10, 'cash', 71, '2021-02-26 22:42:36'),
(54, 'new_installation', 'window', 0, 0, 0, 0, 'cash', 71, '2021-02-26 22:42:36'),
(57, 'reassemble_and_assemble', 'Split', 1, 0, 0, 300, 'cash', 72, '2021-02-27 10:22:43'),
(58, 'new_installation', 'window', 0, 0, 0, 0, 'cash', 76, '2021-02-28 15:33:05'),
(59, 'reassemble_and_assemble', 'Split', 1, 0, 0, 300, 'cash', 70, '2021-02-28 15:34:12'),
(60, 'old_installation', 'Split', 1, 5, 2, 300, 'cash', 79, '2021-02-28 17:16:38'),
(61, 'reassemble_and_assemble', 'Split', 3, 0, 0, 800, 'cash', 80, '2021-03-01 12:05:30'),
(63, 'reassemble_and_assemble', 'Split', 1, 0, 0, 0, 'cash', 85, '2021-03-02 05:29:57'),
(64, 'reassemble_and_assemble', 'Split', 2, 2, 400, 400, 'cash', 83, '2021-03-02 13:13:58'),
(65, 'new_installation', 'Split', 0, 0, 0, 0, 'cash', 83, '2021-03-02 13:13:58'),
(66, 'new_installation', 'window', 0, 0, 0, 0, 'cash', 83, '2021-03-02 13:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders_maintenance`
--

CREATE TABLE `orders_maintenance` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `maintaince_id` int(11) NOT NULL,
  `conditioner_type` enum('window','Split','cupboard','cassette') NOT NULL,
  `service_pirce` double NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `total` double NOT NULL,
  `payment_type` enum('cash','later','bank') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_maintenance`
--

INSERT INTO `orders_maintenance` (`id`, `order_id`, `maintaince_id`, `conditioner_type`, `service_pirce`, `quantity`, `total`, `payment_type`, `created_at`) VALUES
(42, 52, 3, 'Split', 58.33, 12, 699.96, 'cash', '2021-02-23 05:43:07'),
(44, 57, 2, 'Split', 70, 1, 70, 'cash', '2021-02-23 13:51:09'),
(45, 59, 2, 'Split', 1, 1, 1, 'cash', '2021-02-23 14:44:51'),
(48, 67, 15, 'Split', 0.5, 1, 0.5, 'cash', '2021-02-24 13:54:21'),
(49, 60, 15, 'Split', 0, 1, 0, 'cash', '2021-02-24 15:26:02'),
(50, 61, 15, 'Split', 1, 1, 1, 'cash', '2021-02-24 15:26:30'),
(51, 58, 15, 'Split', 1, 1, 1, 'cash', '2021-02-24 15:32:52'),
(52, 62, 3, 'Split', 70, 5, 350, 'bank', '2021-02-24 15:34:38'),
(53, 64, 5, 'Split', 45, 2, 90, 'cash', '2021-02-24 15:38:35'),
(54, 65, 3, 'Split', 15, 45, 675, 'cash', '2021-02-24 17:43:49'),
(55, 66, 3, 'Split', 10, 70, 700, 'cash', '2021-02-24 17:44:47'),
(57, 71, 2, 'window', 10, 10, 100, 'cash', '2021-02-26 22:42:36'),
(59, 74, 4, 'Split', 1, 150, 150, 'cash', '2021-02-27 20:01:08'),
(60, 69, 3, 'Split', 70, 7, 490, 'later', '2021-02-28 15:31:32'),
(61, 76, 3, 'Split', 70, 4, 280, 'cash', '2021-02-28 15:33:05'),
(62, 79, 4, 'window', 150, 1, 150, 'cash', '2021-02-28 17:16:38'),
(63, 79, 3, 'Split', 70, 1, 70, 'cash', '2021-02-28 17:16:38'),
(64, 78, 3, 'Split', 70, 5, 350, 'cash', '2021-02-28 17:36:18'),
(65, 77, 3, 'Split', 10, 70, 700, 'cash', '2021-02-28 19:49:53'),
(66, 77, 5, 'window', 0, 0, 0, 'cash', '2021-02-28 19:49:53'),
(67, 75, 3, 'Split', 8, 70, 560, 'cash', '2021-02-28 19:50:45'),
(69, 82, 3, 'Split', 70, 2, 140, 'cash', '2021-03-01 14:42:18'),
(70, 81, 3, 'Split', 70, 1, 70, 'cash', '2021-03-01 14:45:00'),
(72, 85, 3, 'Split', 70, 3, 210, 'cash', '2021-03-02 05:29:34'),
(73, 83, 3, 'window', 70, 2, 140, 'cash', '2021-03-02 13:13:58'),
(74, 84, 3, 'window', 1, 1, 1, 'cash', '2021-03-02 13:15:05'),
(75, 87, 2, 'Split', 70, 4, 280, 'cash', '2021-03-02 15:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders_maintenance_problems`
--

CREATE TABLE `orders_maintenance_problems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `maintenance_problems` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_maintenance_problems`
--

INSERT INTO `orders_maintenance_problems` (`id`, `order_id`, `maintenance_problems`, `created_at`) VALUES
(54, 52, 2, '2021-02-23 05:12:47'),
(61, 57, 11, '2021-02-23 12:56:01'),
(62, 58, 12, '2021-02-23 13:03:09'),
(63, 59, 13, '2021-02-23 14:05:43'),
(64, 60, 12, '2021-02-23 14:37:41'),
(65, 61, 8, '2021-02-23 14:43:23'),
(88, 63, 5, '2021-02-23 18:30:21'),
(89, 63, 6, '2021-02-23 18:30:21'),
(90, 63, 7, '2021-02-23 18:30:21'),
(91, 63, 8, '2021-02-23 18:30:21'),
(92, 63, 9, '2021-02-23 18:30:21'),
(93, 63, 10, '2021-02-23 18:30:21'),
(94, 63, 11, '2021-02-23 18:30:21'),
(95, 63, 12, '2021-02-23 18:30:21'),
(96, 63, 13, '2021-02-23 18:30:21'),
(97, 63, 14, '2021-02-23 18:30:21'),
(98, 62, 5, '2021-02-23 18:31:38'),
(99, 62, 6, '2021-02-23 18:31:38'),
(100, 62, 7, '2021-02-23 18:31:38'),
(101, 62, 8, '2021-02-23 18:31:38'),
(102, 62, 9, '2021-02-23 18:31:38'),
(103, 62, 10, '2021-02-23 18:31:38'),
(104, 62, 11, '2021-02-23 18:31:38'),
(105, 62, 12, '2021-02-23 18:31:38'),
(106, 62, 13, '2021-02-23 18:31:38'),
(107, 62, 14, '2021-02-23 18:31:38'),
(108, 64, 12, '2021-02-23 20:08:36'),
(109, 65, 11, '2021-02-23 20:13:59'),
(110, 66, 11, '2021-02-24 08:08:43'),
(111, 67, 15, '2021-02-24 12:29:18'),
(112, 68, 15, '2021-02-25 04:43:43'),
(113, 69, 11, '2021-02-25 12:48:58'),
(114, 70, 12, '2021-02-25 15:41:53'),
(115, 71, 5, '2021-02-26 22:30:02'),
(116, 71, 6, '2021-02-26 22:30:02'),
(117, 71, 7, '2021-02-26 22:30:02'),
(118, 71, 8, '2021-02-26 22:30:02'),
(119, 71, 9, '2021-02-26 22:30:02'),
(120, 71, 10, '2021-02-26 22:30:02'),
(121, 71, 11, '2021-02-26 22:30:02'),
(122, 71, 12, '2021-02-26 22:30:02'),
(123, 71, 13, '2021-02-26 22:30:02'),
(124, 71, 14, '2021-02-26 22:30:02'),
(125, 71, 15, '2021-02-26 22:30:02'),
(126, 72, 12, '2021-02-27 04:40:04'),
(127, 73, 12, '2021-02-27 13:09:34'),
(128, 74, 7, '2021-02-27 14:21:22'),
(129, 75, 11, '2021-02-27 17:59:03'),
(130, 76, 12, '2021-02-28 05:23:55'),
(133, 77, 11, '2021-02-28 10:26:39'),
(134, 78, 11, '2021-02-28 14:00:29'),
(135, 79, 12, '2021-02-28 17:14:15'),
(136, 80, 12, '2021-03-01 12:04:21'),
(137, 81, 11, '2021-03-01 12:08:18'),
(138, 82, 11, '2021-03-01 12:09:43'),
(142, 83, 11, '2021-03-02 05:33:40'),
(143, 84, 11, '2021-03-02 05:34:08'),
(144, 85, 11, '2021-03-02 10:03:13'),
(147, 86, 9, '2021-03-02 11:44:45'),
(148, 86, 11, '2021-03-02 11:44:45'),
(149, 87, 11, '2021-03-02 11:48:55'),
(150, 88, 11, '2021-03-02 16:56:51'),
(151, 89, 11, '2021-03-02 17:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pipes_extension`
--

CREATE TABLE `orders_pipes_extension` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `service_type` enum('bidding','actual_extension') NOT NULL,
  `room_number` double NOT NULL DEFAULT '0',
  `meters_number` double NOT NULL DEFAULT '0',
  `conditioners_number` double NOT NULL DEFAULT '0',
  `meter_price` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `payment_type` enum('cash','later','bank') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_pipes_extension`
--

INSERT INTO `orders_pipes_extension` (`id`, `order_id`, `service_type`, `room_number`, `meters_number`, `conditioners_number`, `meter_price`, `total`, `payment_type`, `created_at`) VALUES
(31, 64, 'actual_extension', 0, 3, 1, 0, 210, 'cash', '2021-02-24 15:38:35'),
(34, 71, 'actual_extension', 10, 100, 200, 100, 100, 'cash', '2021-02-26 22:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders_purchases_element`
--

CREATE TABLE `orders_purchases_element` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `purchases_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_purchases_element`
--

INSERT INTO `orders_purchases_element` (`id`, `order_id`, `purchases_id`, `quantity`, `created_at`) VALUES
(12, 71, 3, 10, '2021-02-26 22:42:36'),
(13, 71, 16, 100, '2021-02-26 22:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders_warrenty`
--

CREATE TABLE `orders_warrenty` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_warrenty`
--

INSERT INTO `orders_warrenty` (`id`, `description`, `order_id`, `created_at`) VALUES
(6, 'Test', 64, '2021-02-24 15:21:46'),
(7, 'test test', 71, '2021-02-26 22:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_offer_products`
--

CREATE TABLE `order_offer_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `price` double NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_offer_products`
--

INSERT INTO `order_offer_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`) VALUES
(10, 54, 17, 8, 3100, '2021-02-23 06:33:59'),
(11, 55, 13, 8, 3100, '2021-02-23 06:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created_at` datetime NOT NULL,
  `delated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `created_at`, `delated_at`) VALUES
(1, 'fady', 10, '2021-01-31 16:30:29', '2021-01-31 16:30:34'),
(2, 'test', 150, '2021-02-02 16:34:26', NULL),
(3, 'مكيف 1.5 طن جداري جري ....ألخ', 100, '2021-02-03 14:00:08', NULL),
(4, 'خلاط كهربة', 150, '2021-02-03 14:00:45', NULL),
(5, 'مكيف جري1 طن بارد', 1900, '2021-02-04 08:07:07', NULL),
(6, 'مكيف  جدراي جري 1.5 طن بارد', 2550, '2021-02-04 08:07:52', NULL),
(7, 'مكيف جري 2 طن بارد', 2900, '2021-02-04 08:08:37', '2021-02-04 08:09:54'),
(8, 'مكيف جدراي جري 2 طن بارد', 2950, '2021-02-04 08:09:07', NULL),
(9, 'مكيف جري 2.5 طن بارد', 4150, '2021-02-04 08:09:29', NULL),
(10, 'مكيف جري 3 طن بارد', 4550, '2021-02-04 08:09:47', NULL),
(11, 'مكيف ماندو بلس 1.5طن بارد', 2000, '2021-02-14 14:56:11', NULL),
(12, 'مكيف ماندو بلس2 طن بارد', 2400, '2021-02-14 14:56:37', NULL),
(13, 'مكيف ماندو بلس 2.5طن بارد', 3050, '2021-02-14 15:02:49', NULL),
(14, 'مكيف بيسك 1طن بارد', 1700, '2021-02-16 13:34:44', NULL),
(15, 'مكيف جدراي بيسك 1.5 طن بارد', 2150, '2021-02-16 13:34:59', NULL),
(16, 'مكيف  جدراي بيسك 2طن بارد', 2500, '2021-02-16 13:35:10', NULL),
(17, 'مكيف بيسك 2.5طن بارد', 3200, '2021-02-16 13:35:27', NULL),
(18, 'مكيف فيشر  جدراي 1 طن بارد', 1600, '2021-02-16 13:35:55', NULL),
(19, 'مكيف  جدراي فيشر 1.5طن بارد', 2000, '2021-02-16 13:36:20', NULL),
(20, 'مكيف فيشر   جدراي2 طن بارد', 2400, '2021-02-16 13:36:31', NULL),
(21, 'مكيف فيشر  جدراي 2.5طن بارد', 3050, '2021-02-16 13:36:48', NULL),
(22, 'مكيف  جدراي فيشر 3 طن بارد', 3900, '2021-02-16 13:36:58', NULL),
(23, 'مكيف  جدراي الزامل كونسيرفر 1.5 طن بارد', 1831, '2021-02-16 13:39:15', NULL),
(24, 'مكيف جدراي الزامل كونسيرفر2 طن بارد', 2493, '2021-02-16 13:39:49', NULL),
(25, 'مكيف جداري كرافت 1.5 طن بارد', 1837, '2021-02-16 13:41:00', NULL),
(26, 'مكيف جداري كرافت2 طن بارد', 2604, '2021-02-16 13:41:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `delated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `name_ar`, `name_en`, `delated_at`, `created_at`) VALUES
(1, '1test', '', '2021-01-20 15:30:25', '2021-01-20 15:30:14'),
(2, 'test arr', 'test enn', '2021-01-21 14:17:51', '2021-01-21 14:17:35'),
(3, 'بنزين', 'Petrol', NULL, '2021-01-25 13:48:20'),
(4, 'فريون22', 'Refrigerant 22a', NULL, '2021-01-25 13:56:18'),
(5, 'فريون410', 'Refrigerant 410a', NULL, '2021-01-25 13:56:32'),
(6, 'موبينا', 'Capacitor', NULL, '2021-01-25 13:57:06'),
(7, 'كرسي', 'Stand', NULL, '2021-01-25 13:57:22'),
(8, 'عازل', 'Insulation', NULL, '2021-01-25 13:59:12'),
(9, 'دينمو', 'Fan motor', NULL, '2021-01-25 13:59:41'),
(10, 'مروحة', 'Fan', NULL, '2021-01-25 14:00:02'),
(11, 'غاز لحام', 'Welding gas', NULL, '2021-01-25 14:01:38'),
(12, 'تأجير معدات', 'Rent tools', NULL, '2021-01-25 14:02:02'),
(13, 'كونتكتر', 'Contactor', NULL, '2021-01-25 14:02:24'),
(14, 'مواسير5/8', 'Copper pipe 5/8', NULL, '2021-01-25 14:02:36'),
(15, 'مواسير1/4', 'Copper pipe 1/4', NULL, '2021-01-25 14:02:51'),
(16, 'تيب', 'Tape', NULL, '2021-01-25 14:05:34'),
(17, 'مواسير 3/4', 'Copper pipe 3/4', NULL, '2021-01-25 14:07:47'),
(18, 'أسلاك 10 ملم', '10 Mili wire', NULL, '2021-01-25 14:09:25'),
(19, 'فيشر', 'Fissure', NULL, '2021-01-25 14:11:05'),
(20, '2.5 3 core wire', 'أسلاك 2.5 3', '2021-01-27 14:56:54', '2021-01-25 14:11:55'),
(21, 'ربل', 'Outdoor stand', '2021-01-25 14:15:26', '2021-01-25 14:12:28'),
(22, 'مواسير 3/8', 'Copper pipe 3/8', NULL, '2021-01-25 14:46:22'),
(23, 'ربل', 'Rebil outdor', NULL, '2021-01-27 14:56:16'),
(24, 'مسامير', 'Screws', NULL, '2021-01-27 14:56:26'),
(25, 'أسلاك 2.5 3', '2.5 3 core wire', NULL, '2021-01-27 14:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','employe') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `type`, `password`, `remember_token`, `created_at`, `is_active`) VALUES
(17, '00000000', '00000000', 'admin', '$2y$10$f0MCiwFQKnebz3M76En74e6hHVrC.OsY/TtD3uaNSatR9mUsCRnBe', NULL, '2021-01-20 09:29:54', 1),
(18, 'مازن', '0557377467', 'admin', '$2y$10$sF3ID1RsAGJzSzxSeGA3aeMQx4bTdKZwrNLvZ9IRrezJ9MB4Gf8aG', NULL, '2021-01-20 09:59:55', 1),
(19, 'صهيل', '0591291221', 'employe', '$2y$10$kRYotJrjeztOn7coTS.DgudOdC5rQeTu8638zeyH8pPGNy.Vc22vW', NULL, '2021-01-20 10:01:22', 1),
(20, 'بلال', '0530348310', 'employe', '$2y$10$VxQ/QznP/RuBswrxD73pfumzbfd/87c6vajvN8OSUPD//JemYhg02', NULL, '2021-01-20 10:01:49', 1),
(21, 'fady test', '123456789', 'employe', '$2y$10$llqf7uSeL/0CxlGAHZIKiurUv4TVsbmnv0ufw1MdwgD1D6AVCVvem', NULL, '2021-01-23 11:07:41', 1),
(22, 'fady', '01224267589', 'admin', '$2y$12$exgAeB2wlnKrPfvEAkEeKOpqN0moxMXOJSUyDPLrnkWnhd3slr6Z6', NULL, '2021-02-24 13:58:41', 1),
(24, 'احمد عيد', '01022671585', 'admin', '$2y$10$oJdkaA/0YLTmGtLRVCQ6o.UcnJ/Bo.LCWGwZ036vI3CRBdltKe.PS', NULL, '2021-02-23 10:43:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_purchases`
--

CREATE TABLE `users_purchases` (
  `id` int(11) NOT NULL,
  `purchases_id` int(11) NOT NULL,
  `quantity` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `bill` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_purchases`
--

INSERT INTO `users_purchases` (`id`, `purchases_id`, `quantity`, `total`, `bill`, `user_id`, `created_at`) VALUES
(11, 3, 10, 1200, '/uploads/images/jWbHeIatznX01QjaqJsbdzwGhEs4tk.jpg', 21, '2021-02-22 18:10:28'),
(12, 3, 0, 0, NULL, 19, '2021-02-24 09:36:53'),
(13, 3, 1, 60, '/uploads/images/bl6siTIhKzhR6GGakFkKytKEYHXxvk.jpg', 20, '2021-02-24 13:50:34'),
(14, 3, 1, 60, '/uploads/images/fZZMMULoeHbwUi7nHgmvnHyhdwez9a.jpg', 20, '2021-02-24 13:50:39'),
(15, 19, 3, 33, '/uploads/images/h3KI86xmeFp4YZIRnANZKeVKE98zAE.jpg', 20, '2021-02-24 13:52:17'),
(16, 16, 0, 0, '/uploads/images/vCQ4YHBGXXmPYGiZxddgVY5ysp30cx.jpg', 20, '2021-02-25 05:54:25'),
(17, 14, 8, 2214, '/uploads/images/wib6HFxW1fDBE0xVTPzqY1B6dMmv1O.jpg', 20, '2021-03-02 05:47:36'),
(18, 18, 2, 592.25, '/uploads/images/fuBLQufvu8sZm7UUrCJNCAD9AgHxJs.jpg', 20, '2021-03-02 05:49:30'),
(19, 3, 1, 50, '/uploads/images/GIDGGjvxOU3E1ZM4xPzOUxP8UtIaRH.jpg', 20, '2021-03-02 05:50:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_problems`
--
ALTER TABLE `maintenance_problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `orders_Installation`
--
ALTER TABLE `orders_Installation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders_maintenance`
--
ALTER TABLE `orders_maintenance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `maintaince_id` (`maintaince_id`);

--
-- Indexes for table `orders_maintenance_problems`
--
ALTER TABLE `orders_maintenance_problems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `maintenance_problems` (`maintenance_problems`);

--
-- Indexes for table `orders_pipes_extension`
--
ALTER TABLE `orders_pipes_extension`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders_purchases_element`
--
ALTER TABLE `orders_purchases_element`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `purchases_id` (`purchases_id`);

--
-- Indexes for table `orders_warrenty`
--
ALTER TABLE `orders_warrenty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_offer_products`
--
ALTER TABLE `order_offer_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_purchases`
--
ALTER TABLE `users_purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `purchases_id` (`purchases_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `maintenance_problems`
--
ALTER TABLE `maintenance_problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `orders_Installation`
--
ALTER TABLE `orders_Installation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `orders_maintenance`
--
ALTER TABLE `orders_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `orders_maintenance_problems`
--
ALTER TABLE `orders_maintenance_problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `orders_pipes_extension`
--
ALTER TABLE `orders_pipes_extension`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders_purchases_element`
--
ALTER TABLE `orders_purchases_element`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders_warrenty`
--
ALTER TABLE `orders_warrenty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_offer_products`
--
ALTER TABLE `order_offer_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users_purchases`
--
ALTER TABLE `users_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_Installation`
--
ALTER TABLE `orders_Installation`
  ADD CONSTRAINT `orders_Installation_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_maintenance`
--
ALTER TABLE `orders_maintenance`
  ADD CONSTRAINT `orders_maintenance_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_maintenance_ibfk_2` FOREIGN KEY (`maintaince_id`) REFERENCES `maintenance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_maintenance_problems`
--
ALTER TABLE `orders_maintenance_problems`
  ADD CONSTRAINT `orders_maintenance_problems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_maintenance_problems_ibfk_2` FOREIGN KEY (`maintenance_problems`) REFERENCES `maintenance_problems` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_pipes_extension`
--
ALTER TABLE `orders_pipes_extension`
  ADD CONSTRAINT `orders_pipes_extension_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_purchases_element`
--
ALTER TABLE `orders_purchases_element`
  ADD CONSTRAINT `orders_purchases_element_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_purchases_element_ibfk_2` FOREIGN KEY (`purchases_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_warrenty`
--
ALTER TABLE `orders_warrenty`
  ADD CONSTRAINT `orders_warrenty_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_offer_products`
--
ALTER TABLE `order_offer_products`
  ADD CONSTRAINT `order_offer_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_offer_products_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_purchases`
--
ALTER TABLE `users_purchases`
  ADD CONSTRAINT `users_purchases_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_purchases_ibfk_3` FOREIGN KEY (`purchases_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
