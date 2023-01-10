-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2023 at 04:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prometheusai`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_id` int(200) NOT NULL,
  `asset_category_id` int(200) NOT NULL,
  `asset_name` varchar(200) NOT NULL,
  `asset_details` longtext NOT NULL,
  `asset_cost` varchar(200) NOT NULL,
  `asset_date_purchased` varchar(200) NOT NULL,
  `asset_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_id`, `asset_category_id`, `asset_name`, `asset_details`, `asset_cost`, `asset_date_purchased`, `asset_status`) VALUES
(1, 6, 'Tagwood 3.1Ch Multimedia System', 'value=\"Tagwood 3.1 Channel multimedia system, with 1500Watts PMPO.\"', '3000', '2021-07-05', 'Operational'),
(2, 6, 'Semtoni Tweeters', 'value=\"Semtoni Tweters  with 150 Watts twitters.\"', '300', '2022-11-04', 'Operational'),
(3, 6, 'HP Deskjet Printer', 'value=\"value=\"HP Deskjet Printer D1560 Printer, its working but its lacking black cartridge number 21.\"\"', '4500', '2009-08-12', 'Faulty'),
(4, 6, 'Jertech Keyboard & Mouse', 'value=\"Wireless keyboard and mouse, all from Jertech. They are fully functional.\"', '1500', '2022-05-04', 'Operational'),
(12, 6, 'Royal LED TV', 'Royal 24 Inch Flatscreen TV, Which I use as my monitor.', '5000', '2021-11-05', 'Operational'),
(13, 6, 'HP Elite Book 8460P ', 'HP Ex UK EliteBook 8460p Refurbished Laptop.', '24000', '2018-10-08', 'Operational'),
(14, 6, 'Dell CPU & Monitor', 'Core I3, 4 GB RAM, 500 HDD Tower & 14 Inch Square Aspect Ratio Monitor.', '24000', '2021-11-11', 'Operational'),
(15, 7, 'Custom Mug - Freak In Sheets', 'Custom Freak In Sheets Mug.', '600', '2022-04-06', 'Operational'),
(16, 7, 'Custom Mug - Devlan Merch', 'Custom Devlan Solutions LTD Mug', '600', '2021-12-15', 'Operational'),
(17, 7, 'Clear Glass', 'Clear whiskey glass.', '100', '2021-10-28', 'Operational'),
(18, 1, 'Knife', 'Chopping 9 Inch knife.', '70', '2019-09-03', 'Operational'),
(19, 1, 'Thermos Flask', 'Sundabest thermos flask. Broke its vacuum tip point, but operational.', '600', '2020-05-13', 'Faulty'),
(20, 1, 'Salt Shaker', 'Small yellow top salt shaker, responsibly for delivering exquisite salt amounts.', '50', '2022-01-20', 'Operational'),
(21, 1, 'Sufuria - Light Weight', 'Small size normal sufuria, its Kaluworks but light weight.', '350', '2022-10-26', 'Operational'),
(22, 1, 'Frying Pan', 'Non sticky frying pan, responsible for delivering exquisite fries.', '650', '2019-08-07', 'Operational'),
(23, 6, 'Cubot J5', '5 Inches screen size cubot j5 android 9 smart phone.', '5400', '2019-07-13', 'Operational'),
(24, 6, 'Hitachi HDD', '120 GB HDD Hitachi external hard disk.', '4500', '2018-04-05', 'Operational'),
(25, 1, 'Travel Flask', 'A gift from an old friend - 500ml travelling flask with strainer.', '1500', '2020-02-05', 'Operational'),
(26, 6, 'Smart watch', 'Fake ass smart watch, lost its charger but its worth wearing.', '800', '2022-05-05', 'Faulty'),
(27, 6, 'Power Amplifer', 'A light weight 12v power amplifier, its the one responsible for firing up my high freq tweeters. ', '900', '2022-09-01', 'Operational');

-- --------------------------------------------------------

--
-- Table structure for table `assets_category`
--

CREATE TABLE `assets_category` (
  `category_id` int(200) NOT NULL,
  `category_code` varchar(200) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets_category`
--

INSERT INTO `assets_category` (`category_id`, `category_code`, `category_name`) VALUES
(1, 'PLK001', 'Culterely'),
(6, 'EYAV2', 'Electronics'),
(7, '31PG7', 'Ceramics'),
(9, 'CX406', 'Beddings'),
(10, 'SMEQ2', 'Misc');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(200) NOT NULL,
  `purchase_item` varchar(200) NOT NULL,
  `purchase_quantity` varchar(200) NOT NULL,
  `purchase_amount` varchar(200) NOT NULL,
  `purchase_date_made` varchar(200) NOT NULL,
  `purchase_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `purchase_item`, `purchase_quantity`, `purchase_amount`, `purchase_date_made`, `purchase_details`) VALUES
(2, 'Bus Ticket', '1', '300', '2023-01-05', 'A bus ticket for safe transit from  vacation back to office.'),
(3, 'Groceries', '1', '25', '2023-01-05', 'Purchased Cabbage worth Ksh 20 and Corriander worth Kes 5'),
(4, 'Beverges ', '1', '270', '2023-01-05', 'Purchased 20 Nescafe coffee satches and 1KG Kabras brown sugar.'),
(6, 'Cooking oil', '1', '240', '2023-01-06', 'Purchased 1L of vegetable cooking oil.'),
(7, 'Groceries ', '2', '190', '2023-01-06', 'Purchased tomatoes for Kes 100 and 1 Kg of onions.'),
(8, 'Grooming', '1', '150', '2023-01-06', 'Paid my personal barber Kes 150 for an exquisite haircut.'),
(9, 'House Rent', '1', '3000', '2022-12-31', 'Paid Jane Mwanzia Holdings Inc January 2023 House Rent.'),
(10, 'Internet Bundles Package', '500', '100', '2023-01-06', 'Purchased 500Mbs No Expiry From Safaricom.'),
(11, 'Airtime', '9', '5', '2023-01-08', 'Purchased a Kes5 airtime.'),
(12, 'Eveready AAA Batteries', '2', '50', '2023-01-08', 'Purchased Eveready AAA Batteries for mouse.'),
(13, 'CMOS Battery', '1', '150', '2023-01-09', 'CMOS Battery'),
(14, 'Toothpaste', '1', '78', '2023-01-09', 'Toothpaste - Pepsinodent.'),
(15, 'Flamigo Soap', '3', '130', '2023-01-09', 'Custom Black Soap - Flamigo'),
(16, 'Shortcake Snacks', '6', '30', '2023-01-09', 'Lunch snacks.');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `saving_id` int(200) NOT NULL,
  `saving_account` varchar(200) NOT NULL,
  `saving_amount` varchar(200) NOT NULL,
  `saving_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`saving_id`, `saving_account`, `saving_amount`, `saving_date`) VALUES
(1, '06001801801944', '2420', '2023-01-08'),
(2, '0740847563', '136.20', '2023-01-07'),
(3, '0600180801944', '3000', '2022-12-31'),
(4, '0740847563', '500', '2023-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Martin Mbithi', 'martinezmbithi@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wishlist_id` int(200) NOT NULL,
  `wishlist_item_category_id` int(200) NOT NULL,
  `wishlist_item_name` varchar(200) NOT NULL,
  `wishlist_item_qty` varchar(200) NOT NULL,
  `wishlist_item_desc` longtext NOT NULL,
  `wishlist_item_cost` varchar(200) NOT NULL,
  `wishlist_item_date_added` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`wishlist_id`, `wishlist_item_category_id`, `wishlist_item_name`, `wishlist_item_qty`, `wishlist_item_desc`, `wishlist_item_cost`, `wishlist_item_date_added`) VALUES
(2, 10, 'BDSM Toys', '10', '10pcs Pack Bondage Restraints BDSM Adult Sex Toys\r\n', '986', '2023-01-08 11:45:33.291910'),
(3, 10, 'Carpet', '1', 'New Classic Thick Carpet For Living Room Plush Rug', '2639', '2023-01-08 11:46:34.521315'),
(4, 9, 'Bedsheets', '1', 'Bedding  sheets with a duvet cover and pillow covers.', '1199', '2023-01-08 11:47:42.934049'),
(5, 1, 'Knive Sets', '1', 'RASHNIK RN-288/RN-289 WDN Chopping Board With Butcher knives.', '559', '2023-01-08 11:48:30.090259'),
(6, 7, 'Plates', '6', '8 Inch ceramic sundabest plates.', '799', '2023-01-08 11:49:18.061637'),
(7, 1, 'Vacuum Flask', '1', 'SUNDABESTS 2.0L Stainless Steel Vacuum Coffee Pot ', '999', '2023-01-08 11:49:54.439360'),
(8, 9, 'Mosquito Net', '1', 'White cone based mosquito net.', '899', '2023-01-08 11:50:34.062418'),
(9, 10, 'Wardrobe', '1', 'DIY 3 Column Wardrobe.', '2099', '2023-01-08 11:51:50.130918'),
(10, 9, 'Bed', '1', '3*6 Bed ', '6000', '2023-01-08'),
(11, 9, 'High Density Mattress', '1', 'High density mattress for a 3*6 bed', '5000', '2023-01-08 11:59:27.459822'),
(12, 9, 'Pillows', '2', 'Fiberglass comfort two pillows.', '800', '2023-01-08 12:01:05.082415'),
(13, 9, 'Duvet', '1', 'Best Ragen Generic Single Woolen Duvet All Season Duvet Bedding Accessories Home and Living Classic Warm Duvet for Winter As Picture 5*6', '1920', '2023-01-08 12:02:32.453732'),
(14, 1, 'Sufurias', '4', 'Classic Kitchenware Set of Stainless Aluminium Sufuria 4 Sufurias and 4 Lids in Kitchen & Dining room appliances Aluminium as picture', '2000', '2023-01-08 12:06:41.787594'),
(15, 1, 'Gas Cooker Double Burner & Regulator', '1', 'Nunix Table Top Gas Cooker SC002 Stainless Steel +Free hose pipe +6kg Gas regulator+Gas tighteners', '2998', '2023-01-08 12:22:13.553536'),
(16, 1, 'Kgas 6kgs Cylinder', '1', 'LPG 6KGS Gas Cooker.', '4000', '2023-01-08 12:18:46.332182'),
(17, 1, 'Hot Pot Dishes', '2', 'I always like to keep my meals warm and getting this dishes will do me that.', '2000', '2023-01-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`),
  ADD KEY `AssetCategoryID` (`asset_category_id`);

--
-- Indexes for table `assets_category`
--
ALTER TABLE `assets_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`saving_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `assets_category`
--
ALTER TABLE `assets_category`
  MODIFY `category_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `saving_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `AssetCategoryID` FOREIGN KEY (`asset_category_id`) REFERENCES `assets_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
