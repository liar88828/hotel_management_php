-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 01:47 PM
-- Server version: 10.4.32-MariaDB
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
    `id`       int(11)      NOT NULL,
    `email`    varchar(150) NOT NULL,
    `password` varchar(150) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`id`, `email`, `password`)
VALUES (1, 'balaidiklat', '12345'),
       (2, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings`
(
    `id`             bigint(20) UNSIGNED NOT NULL,
    `guest_id`       int(11)             NOT NULL,
    `room_id`        int(11)             NOT NULL,
    `booking`        tinyint(1)          NOT NULL DEFAULT 1,
    `confirm`        tinyint(1)          NOT NULL DEFAULT 0,
    `finish`         tinyint(1)                   DEFAULT 0,
    `check_in_date`  date                NOT NULL,
    `check_out_date` date                NOT NULL,
    `total_price`    decimal(10, 2)               DEFAULT NULL,
    `create_at`      datetime                     DEFAULT current_timestamp(),
    `update_at`      datetime            NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `guest_id`, `room_id`, `booking`, `confirm`, `finish`, `check_in_date`, `check_out_date`,
                        `total_price`, `create_at`, `update_at`)
VALUES (1, 4, 1, 0, 1, 0, '2024-10-11', '2024-10-31', 0.00, '2024-10-26 16:41:52', '2024-10-31 18:48:13'),
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
       (13, 3, 1, 1, 1, 0, '2024-10-01', '2024-10-30', 19256.00, '2024-10-28 18:57:27', '2024-10-29 19:47:02'),
       (14, 8, 7, 1, 1, 0, '2024-10-01', '2024-10-31', 4230.00, '2024-10-29 19:03:55', '2024-10-29 19:47:06'),
       (15, 8, 4, 1, 1, 0, '2024-10-01', '2024-10-29', 9436.00, '2024-10-29 19:45:56', '2024-10-29 19:46:47'),
       (16, 9, 1, 1, 1, 0, '2024-10-01', '2024-10-31', 19920.00, '2024-10-30 13:10:55', '2024-10-31 18:48:13'),
       (17, 12, 15, 1, 1, 1, '2024-10-01', '2024-10-31', 8460.00, '2024-10-31 18:27:49', '2024-10-31 18:48:59'),
       (18, 12, 14, 1, 0, 0, '2024-10-03', '2024-10-17', 6356.00, '2024-10-31 18:44:49', '2024-10-31 18:54:43'),
       (19, 12, 16, 1, 0, 0, '2024-10-02', '2024-10-31', 22475.00, '2024-10-31 18:53:05', '2024-10-31 18:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel`
(
    `id`    int(11)      NOT NULL,
    `name`  varchar(255) NOT NULL,
    `image` varchar(255) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `name`, `image`)
VALUES (2, 'gedung', 'IMG_55677.png'),
       (6, 'kolam', 'IMG_99736.png'),
       (8, 'ruangan', 'diklat1.jpg'),
       (9, 'pemandangan', 'IMG_40905.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details`
(
    `id`      int(11)      NOT NULL,
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

INSERT INTO `contact_details` (`id`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `insta`, `tw`, `iframe`)
VALUES (1, 'Jl. Fatmawati No.73a, Kedungmundu, Kec. Tembalang,', 'https://maps.app.goo.gl/mDqiiucQ4CHxt7XNA',
        '024-3586680', '024-3513366', 'bdk_semarang@kemenag.go.id', 'facebook.com', 'instagram.com', 'twitter.com',
        'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15839.29954239087!2d110.467378!3d-7.029859!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c53a1fbd12f%3A0x764f3182cbd088d9!2sBalai%20Diklat%20BKPP%20Kota%20Semarang!5e0!3m2!1sid!2sid!4v1729311276527!5m2!1sid!2sid\"                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest`
(
    `id`            int(11)      NOT NULL,
    `name`          varchar(255) NOT NULL,
    `email`         varchar(255) NOT NULL,
    `phone`         varchar(20)           DEFAULT NULL,
    `image`         varchar(255)          DEFAULT NULL,
    `address`       text                  DEFAULT NULL,
    `pin_code`      varchar(20)           DEFAULT NULL,
    `date_of_birth` date                  DEFAULT NULL,
    `password`      varchar(255) NOT NULL,
    `create_at`     datetime     NOT NULL DEFAULT current_timestamp(),
    `update_at`     datetime     NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `email`, `phone`, `image`, `address`, `pin_code`, `date_of_birth`, `password`,
                     `create_at`, `update_at`)
VALUES (3, 'update user1 nanas', 'user1@gmail.com', '347', 'fb2ccf5244ec2f95b2903a13d1364509.jpg',
        'Molestias impedit q', '35', '1987-08-05', '$2y$10$0QU.ILuzP4tEaXUc8mf0XOdviT.c9TT0kzwJl.l5OJSZBZW5.au3S',
        '2024-10-31 15:46:13', '2024-10-31 15:48:25'),
       (4, 'Blossom Downs', 'pokagafil@mailinator.com', '838', 'orang1.jpg', 'Non neque in et anim', '9', '2019-04-12',
        '$2y$10$J4RooADbtY/lXiiPJc2tweVUpnsCqerfyyMygeAldbqPiiYvxY8kW', '2024-10-31 15:46:13', '2024-10-31 15:46:13'),
       (5, 'Ainsley Santiago', 'wogo@mailinator.com', '939', 'person3.jpg', 'Laborum Assumenda a', '90', '2012-01-21',
        '$2y$10$718ne/x1hJFms0JAB1jxqu/1LXVzSAWYbM75l3hXixtO8vkS2Xoea', '2024-10-31 15:46:13', '2024-10-31 15:46:13'),
       (7, 'Susan Carver', 'hyporo@mailinator.com', '89', 'orang1.jpg', 'Dolor beatae nulla d', '94', '2009-09-06',
        '$2y$10$Rg9UH65tSwk8ngsWYM1ezeQ55weoZ7TlZzqjCjYdOc68cDp973tZW', '2024-10-31 15:46:13', '2024-10-31 15:46:13'),
       (8, 'user6', 'user6@gmail.com', '12312312312', 'orang1.jpg', 'asdasda', '123123123', '2024-10-09',
        '$2y$10$kxE/5L3g3OZjTe4d8Am5zOYaSKclXH2xJeZzRM4dqJlJmWB2uLxeC', '2024-10-31 15:46:13', '2024-10-31 15:46:13'),
       (10, 'Merrill Mccullough', 'jymok@mailinator.com', '887', 'temaki.png', 'A mollitia cupidatat', '64',
        '2007-01-13', '$2y$10$HYTYB5ceh8BK3k9hrb83neXXnipu31eHk3m1hfGy/92MSp1H6ttGe', '2024-10-31 15:46:13',
        '2024-10-31 15:46:13'),
       (11, 'Brittany Brown', 'cukyna@mailinator.com', '842', 'temaki.png', 'Ut dolorem repudiand', '44', '1974-02-07',
        '$2y$10$LUnhcbo7di4ccScOT79YveMCLdLsqUH7mzjn4PqXAaLzuUV2HYuui', '2024-10-31 16:03:29', '2024-10-31 16:03:29'),
       (12, 'user8', 'user8@gmail.com', '1231231231', 'Screenshot 2024-05-23 150218.png', 'is user', '1241423',
        '2024-10-08', '$2y$10$EhDaJdY00ACZNHTaE3NjE.ro31i9onlicOL4Wln6x7o.jw5Wjb2sO', '2024-10-31 18:24:20',
        '2024-10-31 18:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms`
(
    `id`           int(11)      NOT NULL,
    `name`         varchar(150) NOT NULL,
    `area`         int(11)      NOT NULL,
    `price`        int(11)      NOT NULL,
    `quantity`     int(11)      NOT NULL,
    `adult`        int(11)      NOT NULL,
    `children`     int(11)      NOT NULL,
    `description`  varchar(350) NOT NULL,
    `status`       tinyint(4)   NOT NULL DEFAULT 1,
    `wifi`         tinyint(4)   NOT NULL DEFAULT 0,
    `television`   tinyint(4)   NOT NULL DEFAULT 0,
    `ac`           tinyint(4)   NOT NULL DEFAULT 0,
    `cctv`         tinyint(4)   NOT NULL DEFAULT 0,
    `dining_room`  tinyint(4)   NOT NULL DEFAULT 0,
    `parking_area` tinyint(4)   NOT NULL DEFAULT 0,
    `bedrooms`     int(11)      NOT NULL,
    `bathrooms`    int(11)      NOT NULL,
    `wardrobe`     int(11)      NOT NULL,
    `security`     tinyint(4)   NOT NULL DEFAULT 0,
    `image`        text                  DEFAULT NULL,
    `update_at`    datetime     NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `create_at`    datetime     NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `wifi`,
                     `television`, `ac`, `cctv`, `dining_room`, `parking_area`, `bedrooms`, `bathrooms`, `wardrobe`,
                     `security`, `image`, `update_at`, `create_at`)
VALUES (14, 'Lucas Burgess udpate', 4, 454, 183, 89, 61, 'Accusamus similique', 1, 1, 1, 1, 1, 1, 1, 70, 62, 13, 1,
        'IMG_15372.png', '2024-10-31 15:30:32', '2024-10-31 15:24:45'),
       (15, 'Quincy Gordon', 14, 282, 830, 65, 9, 'Ut dolores iure proi', 1, 1, 1, 1, 1, 1, 1, 90, 79, 42, 1,
        'diklat8.jpg', '2024-10-31 18:26:30', '2024-10-31 15:30:22'),
       (16, 'Bertha Bush', 29, 775, 727, 70, 44, 'Ex excepteur rerum d', 1, 1, 1, 1, 1, 1, 1, 73, 55, 92, 1,
        'IMG_11892.png', '2024-10-31 18:51:36', '2024-10-31 18:51:36'),
       (17, 'Philip Mckee', 94, 395, 463, 55, 78, 'Occaecat reiciendis', 1, 1, 1, 1, 1, 1, 1, 3, 70, 5, 1,
        'IMG_42663.png', '2024-10-31 18:58:03', '2024-10-31 18:58:03'),
       (18, 'Jordan Good', 90, 972, 72, 33, 81, 'Dolor aut quidem ven', 0, 1, 1, 1, 1, 1, 1, 51, 33, 61, 1,
        'IMG_15372.png', '2024-10-31 19:12:03', '2024-10-31 18:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities`
(
    `id`            int(11) NOT NULL,
    `room_id`       int(11) NOT NULL,
    `facilities_id` int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features`
(
    `id`          int(11) NOT NULL,
    `room_id`     int(11) NOT NULL,
    `features_id` int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images`
(
    `id`      int(11)      NOT NULL,
    `room_id` int(11)      NOT NULL,
    `image`   varchar(150) NOT NULL,
    `thumb`   tinyint(4)   NOT NULL DEFAULT 0
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `room_id`, `image`, `thumb`)
VALUES (6, 13, 'kelas.jpg', 0),
       (7, 13, 'diklat8.jpg', 0),
       (8, 14, 'kelas.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings`
(
    `id`                int(11)     NOT NULL,
    `site_title`        varchar(50) NOT NULL,
    `site_about`        text        NOT NULL,
    `description_about` text        NOT NULL DEFAULT 'is null'
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_about`, `description_about`)
VALUES (1, 'BALAI DIKLAT',
        'Selamat datang di Balai Diklat, tempat di mana kenyamanan, keindahan, dan pelayanan terbaik bertemu untuk menciptakan pengalaman menginap yang tak terlupakan. Berlokasi di jantung kota, hotel kami menawarkan akses mudah ke destinasi-destinasi populer, pusat perbelanjaan, dan tempat wisata terkenal, sekaligus menyajikan suasana tenang dan nyaman untuk Anda beristirahat.',
        'Di Balai Diklat, kami berkomitmen memberikan pelayanan yang hangat dan profesional, memastikan setiap tamu merasa seperti di rumah. Kamar-kamar kami dirancang dengan sentuhan modern dan elegan, dilengkapi dengan fasilitas lengkap untuk memenuhi kebutuhan Anda, mulai dari AC, WiFi cepat, hingga minibar yang menyegarkan.');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff`
(
    `id`            int(11)      NOT NULL,
    `name`          varchar(255) NOT NULL,
    `email`         varchar(255) NOT NULL,
    `phone`         varchar(20)           DEFAULT NULL,
    `image`         varchar(255)          DEFAULT NULL,
    `address`       text                  DEFAULT NULL,
    `pin_code`      varchar(20)           DEFAULT NULL,
    `date_of_birth` date                  DEFAULT NULL,
    `position`      varchar(20)  NOT NULL DEFAULT 'Staff'
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `phone`, `image`, `address`, `pin_code`, `date_of_birth`, `position`)
VALUES (6, 'nanas update', 'wixapyroqa@mailinator.com', '568', 'orang1.jpg', 'Similique nihil odit', '33', '1995-01-23',
        'Staff 1'),
       (80, 'Montana Foley', 'fypesew@mailinator.com', '560', 'person2.jpg', 'A aute modi porro er', '88', '2010-02-03',
        'wakil ketua'),
       (82, 'Scarlett Maddox', 'lyro@mailinator.com', '685', 'person3.jpg', 'Culpa occaecat qui', '41', '1992-12-11',
        'ketua'),
       (83, 'Abra Potter', 'zymubur@mailinator.com', '439', 'person2.jpg', 'Sunt cupidatat conse', '57', '1996-11-04',
        'sekertaris'),
       (84, 'Alden Rosa', 'wenyna@mailinator.com', '390', '1_pancing_3.jpg', 'Veniam nostrud faci', '90', '1973-06-21',
        'pemancing'),
       (85, 'Whilemina Munoz', 'lybirod@mailinator.com', '44', '1_pancing_4.png', 'Ullamco accusamus li', '98',
        '2018-08-28', 'Odit dolor voluptate');

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details`
(
    `id`      int(11) NOT NULL,
    `name`    int(11) NOT NULL,
    `picture` int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial`
(
    `id`     int(11)      NOT NULL,
    `name`   varchar(255) NOT NULL,
    `image`  varchar(255) DEFAULT NULL,
    `text`   text         DEFAULT NULL,
    `rating` int(11)      DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `image`, `text`, `rating`)
VALUES (12, 'iki nanas', 'fb2ccf5244ec2f95b2903a13d1364509.jpg', 'nanas kartun', 3),
       (13, 'Hayley Barlow', 'person3.jpg', 'Quae aut commodi eos', 5),
       (14, 'orang 1', 'person2.jpg', 'apik', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
    ADD PRIMARY KEY (`id`);

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
    ADD PRIMARY KEY (`id`);

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
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
    ADD PRIMARY KEY (`id`),
    ADD KEY `email` (`email`);

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
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 20;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 10;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 13;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 19;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 86;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
