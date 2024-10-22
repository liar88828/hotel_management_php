-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 10:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'balaidiklat', '12345'),
(2, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'booked',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `pn1` varchar(30) NOT NULL,
  `pn2` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `iframe` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `insta`, `tw`, `iframe`) VALUES
(1, 'Jl. Fatmawati No.73a, Kedungmundu, Kec. Tembalang,', 'https://maps.app.goo.gl/mDqiiucQ4CHxt7XNA', '024-3586680', '024-3513366', 'bdk_semarang@kemenag.go.id', 'facebook.com', 'instagram.com', 'twitter.com', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15839.29954239087!2d110.467378!3d-7.029859!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c53a1fbd12f%3A0x764f3182cbd088d9!2sBalai%20Diklat%20BKPP%20Kota%20Semarang!5e0!3m2!1sid!2sid!4v1729311276527!5m2!1sid!2sid\"                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`) VALUES
(1, 'Jmplbdmosulscgf', 'Geynpvkmwqhxyl', 'te@tigoaba.zm', '5804652041', 'Vbhezhsp'),
(2, 'Jmplbdmosulscgf', 'Geynpvkmwqhxyl', 'te@tigoaba.zm', '5804652041', 'Vbhezhsp'),
(3, 'Xnjyjfjoud', 'Xpdxln', 'nuze@fefunpoc.ba', '8406896636', 'Jdelmfiedqqtp'),
(4, 'Mtx', 'Clsklezao', 'lazamuco@gisam.cy', '4895052717', 'Sipik oge fothos peni ekkiag riojoic bordazbok omide vuze fifegbe te du fi. Wojfuwhab lacagim dagoceof bi pofu enieji pefuer ako uglu ehezamme ze dipi jo edhusbiv. Defuuwo mejitmu wow bavagu vijajun eset ofofopu ej nahuep ku he toas pa ite ujdevpen cat za');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `wifi` tinyint(4) NOT NULL DEFAULT 0,
  `television` tinyint(4) NOT NULL DEFAULT 0,
  `ac` tinyint(4) NOT NULL DEFAULT 0,
  `cctv` tinyint(4) NOT NULL DEFAULT 0,
  `dining_room` tinyint(4) NOT NULL DEFAULT 0,
  `parking_area` tinyint(4) NOT NULL DEFAULT 0,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `wardrobe` int(11) NOT NULL,
  `security` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `wifi`, `television`, `ac`, `cctv`, `dining_room`, `parking_area`, `bedrooms`, `bathrooms`, `wardrobe`, `security`) VALUES
(1, 'Plbsktyyhkb', 80, 161, 162, 49, 327, 'Pedel mewir edcuwit opawose tukopeb se valluje isoeza licniloz mala gimid amosibgef melavhi reec cap gabrobjaz anize. Ot pavuv jijodi juwawbi ruwupaap gabkuwuj wow zuf abdip kafac ojsud eborilej usanuwoz. Tir roturne bisov favef mibpi naemuna nezu cokgensa lohoj usara cojlam vorowin. Refeleci cije goigabe osu ebi gib paseco pi iknuw cuakuaf lulo ik', 1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0),
(2, 'Uatyhsg', 0, 303, 127, 129, 158, 'Oneuzab di liir nig tiwichu pazdukbot norcempak vuvudu sadi gebo tespormaf jaarunis zodlum jid ak wizbeih pihot. Saripvir udopo kuvkiaf ulhoho afimo liczah gucvabop luvzo teav vam bummeke titowmat zubano. Vewe zursavloz tisew howerap disho cu lif le uzza gureki eho co', 1, 1, 0, 0, 1, 1, 1, 199, 457, 334, 0),
(3, 'Uatyhsg', 0, 303, 127, 129, 158, 'Oneuzab di liir nig tiwichu pazdukbot norcempak vuvudu sadi gebo tespormaf jaarunis zodlum jid ak wizbeih pihot. Saripvir udopo kuvkiaf ulhoho afimo liczah gucvabop luvzo teav vam bummeke titowmat zubano. Vewe zursavloz tisew howerap disho cu lif le uzza gureki eho co', 1, 1, 0, 0, 1, 1, 1, 199, 457, 334, 0),
(4, 'Scvdurm', 64, 337, 84, 237, 494, 'Howijlak nig rejuc fowid tu ate tuspikone muwiri eho ruzhu zibili vitco fo mobe iwuca vopli jafuresat idamo. Rewhavit owdug pebga oforap pej mac ico kowkin wuj ismogamu zohoj munvuug. Ivzitja ac vub vacmuico aheigi il fogav ciurepi red bev sizsabuv sopa op', 1, 1, 1, 0, 0, 0, 0, 247, 167, 303, 0),
(5, 'Ldpu', 472, 362, 163, 332, 219, 'Ca vuwlegug il dojcori nokaov cikdez sur vu vemi iweuvu uga vegom tuze citaupi deluw hov. Pimiome ruulet jusvavhot adiwaoju teiglov ewdenne hu nebronej agda zo gefe mufo rarimwat zo zavunog uninu acodugs', 1, 1, 1, 0, 1, 1, 1, 389, 26, 216, 0),
(6, 'Ywigdfzvrw', 248, 452, 317, 280, 102, 'Owfezag gobnotiza wen pibo puho wor cotuhzid vow je tafsod arespe sek nuce pen odumeiku gado osasu. Vaczies dirahkis wevcas ijudemus heupoko ceje lis jecnad nazavju poudoco takozfim ga roki ude zekhedno utimi usci oczarbe. Nonogzog ahaanco veggodiva ozzu zuw nirafi cursac d', 1, 1, 0, 0, 0, 0, 1, 227, 219, 387, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'BALAI DIKLAT', 'Balai Diklat Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi saepe quod magnam voluptate  \r\nupdate ix 2xssssdassdasd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`sr_no`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
