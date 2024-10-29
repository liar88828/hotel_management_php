-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 01:50 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred`
(
    `sr_no`    int          NOT NULL,
    `email`    varchar(150) NOT NULL,
    `password` varchar(150) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `email`, `password`)
VALUES (1, 'balaidiklat', '12345'),
       (2, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings`
(
    `id`             bigint UNSIGNED NOT NULL,
    `guest_id`       int             NOT NULL,
    `room_id`        int             NOT NULL,
    `booking`        tinyint(1)      NOT NULL DEFAULT '1',
    `confirm`        tinyint(1)      NOT NULL DEFAULT '0',
    `finish`         tinyint(1)               DEFAULT '0',
    `check_in_date`  date            NOT NULL,
    `check_out_date` date            NOT NULL,
    `total_price`    decimal(10, 2)           DEFAULT NULL,
    `create_at`      datetime                 DEFAULT CURRENT_TIMESTAMP,
    `update_at`      datetime        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `guest_id`, `room_id`, `booking`, `confirm`, `finish`, `check_in_date`, `check_out_date`,
                        `total_price`, `create_at`, `update_at`)
VALUES (1, 4, 1, 1, 1, 1, '2024-10-11', '2024-10-31', 0.00, '2024-10-26 16:41:52', '2024-10-26 19:50:48'),
       (2, 4, 1, 0, 0, 0, '2024-10-26', '2024-10-31', 0.00, '2024-10-26 16:45:22', '2024-10-28 14:04:33'),
       (3, 4, 1, 0, 0, 0, '2024-10-05', '2024-10-31', 11952.00, '2024-10-26 16:48:12', '2024-10-28 14:04:33'),
       (4, 4, 1, 0, 0, 0, '2024-10-19', '2024-10-22', 0.00, '2024-10-26 16:48:18', '2024-10-28 14:52:49'),
       (5, 4, 1, 0, 0, 0, '2024-10-30', '2024-10-31', 0.00, '2024-10-26 16:48:30', '2024-10-28 14:04:33'),
       (6, 4, 1, 0, 0, 0, '2024-10-30', '2024-10-31', 0.00, '2024-10-26 16:50:05', '2024-10-28 14:04:33'),
       (7, 4, 12, 0, 0, 0, '2024-10-30', '2024-10-31', 0.00, '2024-10-26 16:50:33', '2024-10-28 14:48:23'),
       (8, 4, 1, 0, 0, 0, '2024-10-03', '2024-10-31', 0.00, '2024-10-26 16:50:39', '2024-10-28 14:04:33'),
       (9, 4, 1, 0, 0, 0, '2024-10-03', '2024-10-31', 0.00, '2024-10-26 16:51:21', '2024-10-28 14:04:33'),
       (10, 4, 1, 0, 0, 0, '2024-10-26', '2024-10-31', 0.00, '2024-10-26 16:51:25', '2024-10-28 14:04:33'),
       (11, 4, 1, 0, 0, 0, '2024-10-03', '2024-10-31', 15272.00, '2024-10-26 17:06:59', '2024-10-28 14:04:33'),
       (12, 4, 2, 0, 0, 0, '2024-10-10', '2024-10-31', 5151.00, '2024-10-26 17:33:03', '2024-10-28 14:04:33'),
       (13, 3, 1, 1, 0, 0, '2024-10-01', '2024-10-30', 19256.00, '2024-10-28 18:57:27', '2024-10-28 18:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel`
(
    `id`    int          NOT NULL,
    `name`  varchar(255) NOT NULL,
    `image` varchar(255) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `name`, `image`)
VALUES (1, 'Dennis Mathews', '-1653727532000.png'),
       (2, 'susi', 'sushi.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details`
(
    `sr_no`   int          NOT NULL,
    `address` varchar(50)  NOT NULL,
    `gmap`    varchar(100) NOT NULL,
    `pn1`     varchar(30)  NOT NULL,
    `pn2`     varchar(30)  NOT NULL,
    `email`   varchar(100) NOT NULL,
    `fb`      varchar(100) NOT NULL,
    `insta`   varchar(100) NOT NULL,
    `tw`      varchar(100) NOT NULL,
    `iframe`  varchar(300) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `insta`, `tw`, `iframe`)
VALUES (1, 'Jl. Fatmawati No.73a, Kedungmundu, Kec. Tembalang,', 'https://maps.app.goo.gl/mDqiiucQ4CHxt7XNA',
        '024-3586680', '024-3513366', 'bdk_semarang@kemenag.go.id', 'facebook.com', 'instagram.com', 'twitter.com',
        'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15839.29954239087!2d110.467378!3d-7.029859!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c53a1fbd12f%3A0x764f3182cbd088d9!2sBalai%20Diklat%20BKPP%20Kota%20Semarang!5e0!3m2!1sid!2sid!4v1729311276527!5m2!1sid!2sid\"                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest`
(
    `id`            int          NOT NULL,
    `name`          varchar(255) NOT NULL,
    `email`         varchar(255) NOT NULL,
    `phone`         varchar(20)  DEFAULT NULL,
    `image`         varchar(255) DEFAULT NULL,
    `address`       text,
    `pin_code`      varchar(20)  DEFAULT NULL,
    `date_of_birth` date         DEFAULT NULL,
    `password`      varchar(255) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `email`, `phone`, `image`, `address`, `pin_code`, `date_of_birth`, `password`)
VALUES (1, 'Price Hutchinson', 'xemynovoku@mailinator.com', '937', 'sushi (1).png', 'Tempore et voluptat', '53',
        '1975-01-16', '$2y$10$.8dXuBMHxGoEHkX.HbjCBeCHT3bo4zkzcf7S9lFqBUHZsRrTl6INi'),
       (2, 'Elaine Cannon', 'zecaq@mailinator.com', '287', 'sushi.png', 'Asperiores nihil aut', '49', '1997-08-22',
        '$2y$10$ZkvK4j3VTljUftoyi0yQWu02LvBqQXxEVZaGznALps148q1uufI9y'),
       (3, 'Hayley Ruiz update 1x', 'user1@gmail.com', '347', 'temaki.png', 'Molestias impedit q', '35', '1987-08-05',
        '$2y$10$G5f2N.S8V.6/EzsxDvQpoe.9mV9Gp9uVJH32WVHsNDW7Tvq9TRBje'),
       (4, 'user2', 'user2@gmail.com', '012312312312', 'Screenshot_20240913_200426_Zoom.jpg', 'user_address',
        '123123123', '2024-10-04', '$2y$10$EGZZjuwxlaEiexftwkxKpeiJv2GAEmrZHi8Rpf7JPBzRd0XE63Rcy');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms`
(
    `id`           int          NOT NULL,
    `name`         varchar(150) NOT NULL,
    `area`         int          NOT NULL,
    `price`        int          NOT NULL,
    `quantity`     int          NOT NULL,
    `adult`        int          NOT NULL,
    `children`     int          NOT NULL,
    `description`  varchar(350) NOT NULL,
    `status`       tinyint      NOT NULL DEFAULT '1',
    `wifi`         tinyint      NOT NULL DEFAULT '0',
    `television`   tinyint      NOT NULL DEFAULT '0',
    `ac`           tinyint      NOT NULL DEFAULT '0',
    `cctv`         tinyint      NOT NULL DEFAULT '0',
    `dining_room`  tinyint      NOT NULL DEFAULT '0',
    `parking_area` tinyint      NOT NULL DEFAULT '0',
    `bedrooms`     int          NOT NULL,
    `bathrooms`    int          NOT NULL,
    `wardrobe`     int          NOT NULL,
    `security`     tinyint      NOT NULL DEFAULT '0',
    `image`        text,
    `update_at`    datetime     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `create_at`    datetime     NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `wifi`,
                     `television`, `ac`, `cctv`, `dining_room`, `parking_area`, `bedrooms`, `bathrooms`, `wardrobe`,
                     `security`, `image`, `update_at`, `create_at`)
VALUES (1, 'Lynn Pierce update', 73, 664, 385, 1, 1, 'Nisi aut fuga Offic', 1, 1, 1, 1, 1, 1, 1, 34, 77, 86, 1,
        'temaki.png', '2024-10-28 13:59:20', '2024-10-26 15:56:16'),
       (2, 'update', 123, 303, 127, 1, 1,
        'Oneuzab di liir nig tiwichu pazdukbot norcempak vuvudu sadi gebo tespormaf jaarunis zodlum jid ak wizbeih pihot. Saripvir udopo kuvkiaf ulhoho afimo liczah gucvabop luvzo teav vam bummeke titowmat zubano. Vewe zursavloz tisew howerap disho cu lif le uzza gureki eho co',
        0, 1, 1, 1, 1, 1, 1, 199, 457, 334, 1, 'pancing_3.jpg', '2024-10-28 18:20:07', '2024-10-26 15:56:16'),
       (3, 'Uatyhsg', 0, 303, 127, 1, 1,
        'Oneuzab di liir nig tiwichu pazdukbot norcempak vuvudu sadi gebo tespormaf jaarunis zodlum jid ak wizbeih pihot. Saripvir udopo kuvkiaf ulhoho afimo liczah gucvabop luvzo teav vam bummeke titowmat zubano. Vewe zursavloz tisew howerap disho cu lif le uzza gureki eho co',
        1, 1, 1, 1, 1, 1, 1, 199, 457, 334, 1, 'danung.jpg', '2024-10-28 18:08:46', '2024-10-26 15:56:16'),
       (4, 'Scvdurm', 64, 337, 84, 1, 1,
        'Howijlak nig rejuc fowid tu ate tuspikone muwiri eho ruzhu zibili vitco fo mobe iwuca vopli jafuresat idamo. Rewhavit owdug pebga oforap pej mac ico kowkin wuj ismogamu zohoj munvuug. Ivzitja ac vub vacmuico aheigi il fogav ciurepi red bev sizsabuv sopa op',
        1, 1, 1, 0, 0, 0, 0, 247, 167, 303, 0, NULL, '2024-10-28 13:59:20', '2024-10-26 15:56:16'),
       (5, 'Ldpu', 472, 362, 163, 1, 1,
        'Ca vuwlegug il dojcori nokaov cikdez sur vu vemi iweuvu uga vegom tuze citaupi deluw hov. Pimiome ruulet jusvavhot adiwaoju teiglov ewdenne hu nebronej agda zo gefe mufo rarimwat zo zavunog uninu acodugs',
        1, 1, 1, 0, 1, 1, 1, 389, 26, 216, 0, NULL, '2024-10-28 13:59:20', '2024-10-26 15:56:16'),
       (6, 'Ywigdfzvrw', 248, 452, 317, 1, 1,
        'Owfezag gobnotiza wen pibo puho wor cotuhzid vow je tafsod arespe sek nuce pen odumeiku gado osasu. Vaczies dirahkis wevcas ijudemus heupoko ceje lis jecnad nazavju poudoco takozfim ga roki ude zekhedno utimi usci oczarbe. Nonogzog ahaanco veggodiva ozzu zuw nirafi cursac d',
        1, 1, 1, 1, 1, 1, 1, 227, 219, 387, 1,
        'png-clipart-computer-icons-fishing-rods-fishing-pole-text-fishing-rods.png', '2024-10-28 18:08:58',
        '2024-10-26 15:56:16'),
       (7, 'Lane Delaney', 50, 141, 661, 1, 1, 'Voluptatem Voluptat', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
        'id-11134207-7ras9-m0r0mnrva893be@resize_w450_nl.webp', '2024-10-28 18:09:38', '2024-10-26 15:56:16'),
       (8, 'Lane Delaney', 50, 141, 661, 1, 1, 'Voluptatem Voluptat', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL,
        '2024-10-28 14:06:01', '2024-10-26 15:56:16'),
       (9, 'Blake Chang', 13, 561, 952, 1, 1, 'Dicta illum ipsa a', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1,
        'images-removebg-preview.png', '2024-10-28 18:09:08', '2024-10-26 15:56:16'),
       (10, 'Evan Acevedo', 16, 978, 209, 1, 1, 'Officia voluptatibus', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        '-1653727532000.png', '2024-10-28 13:59:20', '2024-10-26 15:56:16'),
       (11, 'Alexander Warner', 33, 76, 342, 1, 1, 'Assumenda ullam nisi', 1, 1, 1, 1, 1, 1, 1, 86, 56, 69, 1,
        '-1653727532000.png', '2024-10-28 13:59:20', '2024-10-26 15:56:16'),
       (12, 'target', 12, 57, 573, 1, 1, 'Eiusmod hic a omnis', 1, 1, 1, 1, 1, 1, 1, 59, 98, 43, 1,
        '9a0ae6e4efee3df4ec020d8a3472758d.png', '2024-10-28 14:48:41', '2024-10-26 15:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities`
(
    `sr_no`         int NOT NULL,
    `room_id`       int NOT NULL,
    `facilities_id` int NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features`
(
    `sr_no`       int NOT NULL,
    `room_id`     int NOT NULL,
    `features_id` int NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images`
(
    `id`      int          NOT NULL,
    `room_id` int          NOT NULL,
    `image`   varchar(150) NOT NULL,
    `thumb`   tinyint      NOT NULL DEFAULT '0'
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `room_id`, `image`, `thumb`)
VALUES (4, 1, '1_pancing_3.jpg', 0),
       (5, 1, '1_pancing_4.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings`
(
    `sr_no`      int          NOT NULL,
    `site_title` varchar(50)  NOT NULL,
    `site_about` varchar(250) NOT NULL,
    `shutdown`   tinyint(1)   NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`)
VALUES (1, 'BALAI DIKLAT',
        'Balai Diklat Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi saepe quod magnam voluptate  \r\nupdate ix 2xssssdassdasd',
        0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff`
(
    `id`            int          NOT NULL,
    `name`          varchar(255) NOT NULL,
    `email`         varchar(255) NOT NULL,
    `phone`         varchar(20)  DEFAULT NULL,
    `image`         varchar(255) DEFAULT NULL,
    `address`       text,
    `pin_code`      varchar(20)  DEFAULT NULL,
    `date_of_birth` date         DEFAULT NULL,
    `password`      varchar(255) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `phone`, `image`, `address`, `pin_code`, `date_of_birth`, `password`)
VALUES (1, 'Cyrus Koch', 'wixapyroqa@mailinator.com', '568', NULL, 'Similique nihil odit', '33', '1995-01-23',
        '$2y$10$U3wj8A/wL5x2DzkClQM1euXlcm4ZXeJ9D2ZGJcZ.EPV2oj/IouRMm'),
       (2, 'Dana Collier', 'zurot@mailinator.com', '757', NULL, 'Illo sit minus et a', '26', '1988-04-04',
        '$2y$10$rlZ6Uf2VVHEg/CiocJxnu.qtOher7n2e4eZlBcFC4hetqmv4TWcSW');

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details`
(
    `sr_no`   int NOT NULL,
    `name`    int NOT NULL,
    `picture` int NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial`
(
    `id`     int          NOT NULL,
    `name`   varchar(255) NOT NULL,
    `image`  varchar(255) DEFAULT NULL,
    `text`   text,
    `rating` int          DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `image`, `text`, `rating`)
VALUES (1, 'Zachary Jennings', NULL,
        'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        4),
       (2, 'Thomas Stephens', NULL,
        'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        4),
       (3, 'update nanas', 'fb2ccf5244ec2f95b2903a13d1364509.jpg',
        'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        1),
       (4, 'Hadley Hutchinson', 'Screenshot 2024-06-25 164529.png',
        'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        1),
       (5, 'Darryl Shields', 'Screenshot 2024-05-19 173036.png',
        'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. consectetur',
        3),
       (6, 'Malcolm Carson', 'temaki.png',
        'Eos Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. quaerat eum',
        4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
    ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
    ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
    ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
    ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
    ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
    MODIFY `sr_no` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 14;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
    MODIFY `id` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
    MODIFY `sr_no` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
    MODIFY `id` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
    MODIFY `id` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 13;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
    MODIFY `sr_no` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
    MODIFY `sr_no` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
    MODIFY `id` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
    MODIFY `sr_no` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
    MODIFY `id` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
    MODIFY `id` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
