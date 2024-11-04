-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2024 at 03:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_glowkare`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminreg`
--

CREATE TABLE `tbl_adminreg` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_contact` varchar(12) NOT NULL,
  `admin_email` varchar(25) NOT NULL,
  `admin_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_adminreg`
--

INSERT INTO `tbl_adminreg` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(1, 'sree', '88888', 'sree4102004@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(30) NOT NULL,
  `booking_amount` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `booking_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_amount`, `booking_status`, `user_id`, `booking_address`) VALUES
(3, '2024-05-20', 2274, 2, 2, ''),
(4, '2024-04-20', 1275, 2, 11, ''),
(5, '2024-05-21', 1998, 2, 11, ''),
(6, '2024-07-22', 2550, 2, 18, ''),
(7, '2024-09-22', 2550, 2, 11, ''),
(8, '2024-09-22', 1275, 2, 18, ''),
(9, '2024-09-24', 1505, 2, 8, ''),
(10, '2024-09-24', 999, 2, 2, ''),
(11, '2024-09-27', 2550, 2, 2, ''),
(12, '2024-10-29', 1299, 1, 2, ''),
(13, '2024-10-29', 1299, 2, 2, ''),
(14, '2024-11-01', 4003, 2, 2, ''),
(15, '2024-10-30', 3697, 1, 18, ''),
(16, '2024-10-30', 1199, 1, 18, ''),
(17, '2024-10-30', 0, 1, 18, ''),
(18, '2024-10-30', 3597, 2, 18, ''),
(19, '2024-11-01', 0, 1, 18, ''),
(20, '2024-11-01', 999, 1, 2, 'Ernakulam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'COSRX'),
(2, 'Axis-Y'),
(4, 'LAGOM'),
(5, 'Beauty of Joseon'),
(6, 'Dear Klairs'),
(7, 'Holika Holika'),
(8, 'ISNTREE'),
(9, 'Dewy Tree'),
(10, 'Gabbit'),
(13, 'The Face Shop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_quantity`, `cart_status`, `product_id`, `booking_id`) VALUES
(3, 0, 0, 17, 2),
(4, 0, 0, 18, 2),
(5, 1, 2, 17, 3),
(6, 1, 2, 18, 3),
(7, 1, 4, 17, 4),
(8, 2, 3, 18, 5),
(9, 2, 1, 17, 6),
(10, 2, 1, 17, 7),
(11, 1, 2, 17, 8),
(12, 1, 1, 29, 9),
(13, 1, 1, 18, 10),
(14, 2, 1, 17, 11),
(15, 1, 2, 28, 12),
(16, 1, 2, 28, 13),
(17, 1, 1, 31, 14),
(18, 1, 1, 29, 14),
(19, 1, 1, 28, 14),
(20, 1, 1, 28, 15),
(21, 2, 1, 31, 15),
(22, 1, 1, 29, 15),
(23, 1, 1, 31, 16),
(24, 1, 1, 29, 16),
(25, 1, 1, 33, 17),
(26, 0, 1, 18, 17),
(27, 1, 1, 18, 18),
(28, 2, 1, 28, 18),
(29, 1, 1, 18, 19),
(30, 1, 1, 18, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `chat_id` int(11) NOT NULL,
  `chat_content` varchar(1200) NOT NULL,
  `chat_datetime` varchar(50) NOT NULL,
  `chat_fromuid` int(11) NOT NULL,
  `chat_touid` int(11) NOT NULL,
  `chat_fromdid` int(11) NOT NULL,
  `chat_todid` int(11) NOT NULL,
  `chat_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`chat_id`, `chat_content`, `chat_datetime`, `chat_fromuid`, `chat_touid`, `chat_fromdid`, `chat_todid`, `chat_status`) VALUES
(1, 'hai', 'August 08 2024, 10:27 PM', 1, 0, 0, 1, 0),
(2, 'How can i help you', 'August 08 2024, 10:51 PM', 0, 1, 1, 0, 0),
(3, 'I have skin rashes. Could u pls help', 'August 09 2024, 11:23 AM', 1, 0, 0, 1, 0),
(4, '', 'August 09 2024, 11:23 AM', 1, 0, 0, 1, 0),
(5, 'I have acne issues', 'August 09 2024, 11:24 AM', 1, 0, 0, 1, 0),
(6, 'I have acne isuues', 'August 09 2024, 11:25 AM', 1, 0, 0, 1, 0),
(7, 'ANyone Here', 'August 09 2024, 11:39 AM', 1, 0, 0, 1, 0),
(8, 'sorry', 'August 09 2024, 11:42 AM', 0, 1, 1, 0, 0),
(9, 'my skin is very oily so what remidies', 'August 09 2024, 11:45 AM', 1, 0, 0, 1, 0),
(10, 'Stay hydrated and keep your skin pH well balanced.Exfoliate regularly', 'August 09 2024, 11:53 AM', 0, 1, 1, 0, 0),
(11, 'hlo', 'September 22 2024, 11:26 AM', 18, 0, 0, 1, 0),
(12, 'hlo', 'September 22 2024, 01:46 PM', 18, 0, 0, 1, 0),
(13, 'hlo', 'September 24 2024, 02:55 PM', 2, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatlist`
--

CREATE TABLE `tbl_chatlist` (
  `chatlist_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `chat_content` varchar(500) NOT NULL,
  `chat_datetime` varchar(50) NOT NULL,
  `chat_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chatlist`
--

INSERT INTO `tbl_chatlist` (`chatlist_id`, `from_id`, `to_id`, `chat_content`, `chat_datetime`, `chat_type`) VALUES
(1, 1, 1, 'Stay hydrated and keep your skin pH well balanced.Exfoliate regularly', '2024-08-09 11:53:48', 'USER'),
(2, 18, 1, 'hlo', '2024-09-22 13:46:10', 'USER'),
(3, 2, 1, 'hlo', '2024-09-24 14:55:01', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_file` varchar(100) NOT NULL,
  `complaint_content` varchar(500) NOT NULL,
  `complaint_date` varchar(10) NOT NULL,
  `complaint_status` int(11) DEFAULT 0,
  `complaint_reply` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_file`, `complaint_content`, `complaint_date`, `complaint_status`, `complaint_reply`, `user_id`, `product_id`) VALUES
(1, 'hjkl;', '0253_1584672177-thumbnail-510x510-70.jpg', 'ff', '2024-07-12', 0, '', 1, 0),
(2, 'hjkl;', '0253_1584672177-thumbnail-510x510-70.jpg', 'ff', '2024-07-12', 0, '', 1, 0),
(3, 'gyuikjk', 'BEAUTY-OF-JOSEON-GINSENG-CLEANSING-OIL-210ML.jpg', 'ug', '2024-07-12', 1, 'sorry', 1, 17),
(4, 'Quality', 'user pic.jpg', '', '2024-09-22', 1, 'sorry', 18, 17),
(5, 'Quality', 'user pic.jpg', 'hhhh', '2024-09-24', 0, '', 8, 29),
(6, 'Quality', 'user pic.jpg', 'dddd', '2024-09-27', 0, '', 2, 17),
(7, 'Quality Issue', 'APJ.jpg', 'Not satisfied with the quality', '2024-10-30', 0, '', 18, 18),
(8, 'Quality Issue', 'prrof.jpg', 'Do not like the quality', '2024-10-31', 0, '', 2, 18),
(9, 'Quality Issue', 'sellerpic.jpg', 'ffffggg', '2024-11-01', 0, '', 2, 18),
(10, 'fffrff', 'sellerpic.jpg', 'tggg', '2024-11-01', 0, '', 2, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_derma`
--

CREATE TABLE `tbl_derma` (
  `derma_id` int(11) NOT NULL,
  `derma_name` varchar(40) NOT NULL,
  `derma_vstatus` int(11) NOT NULL DEFAULT 0,
  `derma_email` varchar(29) NOT NULL,
  `derma_password` varchar(20) NOT NULL,
  `derma_address` varchar(50) NOT NULL,
  `derma_photo` varchar(100) NOT NULL,
  `derma_proof` varchar(100) NOT NULL,
  `derma_doj` varchar(20) NOT NULL,
  `derma_contact` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_derma`
--

INSERT INTO `tbl_derma` (`derma_id`, `derma_name`, `derma_vstatus`, `derma_email`, `derma_password`, `derma_address`, `derma_photo`, `derma_proof`, `derma_doj`, `derma_contact`, `place_id`) VALUES
(1, 'Dr.Bagyashrii', 1, 'hridyarnair04@gmail.com', 'hridya123', 'Ernakulam PO\r\n', 'Derma1.jpeg', 'Derma1.jpeg', '2024-07-06', 2147483647, 2),
(2, 'Dr.Annu', 1, 'anu123@gmail.com', 'anuu', '', 'Derma1.jpeg', 'logo.jpg', '2024-07-11', 2147483647, 1),
(3, 'Navendhu', 0, 'navendunandu@gmail.com', '', '', '', '', '2024-08-31', 2147483647, 0),
(4, 'Navendhu', 0, 'navendunandu@gmail.com', '', '', '', '', '2024-08-31', 2147483647, 0),
(5, 'Navendhu', 0, 'navendunandu@gmail.com', '', '', '', '', '2024-08-31', 2147483647, 0),
(6, 'Navendhu', 0, 'navendunandu@gmail.com', '', '', '', '', '2024-08-31', 2147483647, 0),
(7, '', 0, '', '', '', '', '', '2024-10-04', 0, 0),
(8, '', 0, '', '', '', '', '', '2024-10-04', 0, 0),
(9, '', 0, '', '', '', '', '', '2024-10-25', 0, 0),
(13, 'Dr Sonia', 0, 'sonianh@gmail.com', 'Sonihit@1', 'Ernakulam', 'sellerpic.jpg', 'prrof.jpg', '2024-11-01', 2147483647, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'kottayam'),
(2, 'Kannur'),
(4, 'Ernakulam'),
(9, '	Kannur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallary`
--

CREATE TABLE `tbl_gallary` (
  `gallary_id` int(11) NOT NULL,
  `gallary_image` varchar(300) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallary`
--

INSERT INTO `tbl_gallary` (`gallary_id`, `gallary_image`, `product_id`) VALUES
(2, 'lagom clean gallary.jpg', 16),
(3, 'lagom cleanser gall2.jfif', 16),
(4, 'Screenshot 2024-09-20 120520.png', 0),
(5, 'BEAUTY-OF-JOSEON-GINSENG-CLEANSING-OIL-210ML.jpg', 31);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(20) NOT NULL,
  `district_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(2, 'Kaduthuruthy', 1),
(3, 'Peruva', 1),
(4, 'Pala', 1),
(5, 'Thalayolaparamb', 1),
(7, 'Pala', 1),
(8, 'Ettumanoor', 1),
(9, 'Piravom', 1),
(10, 'Peruva', 1),
(12, 'Piravom', 2),
(15, 'Pala', 1),
(16, 'Pala', 2),
(17, 'Muvattupuzha', 4),
(18, '	Kaduthuruthy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_des` varchar(500) NOT NULL,
  `product_photo` varchar(200) NOT NULL,
  `skintype_id` int(11) NOT NULL,
  `skinconcern_id` int(11) NOT NULL,
  `routine_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_ingred` varchar(900) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_des`, `product_photo`, `skintype_id`, `skinconcern_id`, `routine_id`, `brand_id`, `seller_id`, `product_ingred`, `product_price`) VALUES
(18, 'Cosrx AHA BHA Vitamin C Toner', 'Cosrx AHA BHA Vitamin C Toner is a daily toner for Dull Skin! Specially formulated with Vitamin C patented by COSRX, the GOLDEN-RX COMPLEX™ (comprised of Actinidia Chinensis (Kiwi) Fruit Extract and H', 'COSRX TONER 150 ML.jpg', 7, 8, 7, 1, 2, 'Actinidia Chinensis (Kiwi) Fruit Extract, Hylocereus Undatus Fruit Extract, Salix Alba (Willow) Bark', 999),
(24, '𝐂𝐎𝐒𝐑𝐗 𝐒𝐚𝐥𝐢𝐜𝐲𝐥𝐢𝐜 𝐀𝐜𝐢𝐝 𝐃𝐚𝐢𝐥𝐲 𝐆𝐞𝐧𝐭𝐥𝐞 𝐂𝐥𝐞𝐚𝐧𝐬𝐞𝐫 𝟏𝟓𝟎𝐦𝐥', 'COSRX Salicylic Acid Daily Gentle Cleanser is a gentle foaming cleanser formulated especially for acne-prone skin. It contains 0.5% salicylic acid that gently exfoliates and removes impurities and excess sebum while fighting acne and blemishes, leaving skin soft and smooth without the stripping feeling. Key ingredients like willow bark water and tea tree oil soothe skin and prevent skin from drying out and fights bacterial inflammation.', 'cosrx_salicylic_acid_daily_gentle_cleanser_150ml_1591268001_main.jpg', 7, 9, 6, 1, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬:\r\nWater, Glycerin, Myristic Acid, Stearic Acid, Potassium Hydroxide, Lauric Acid, Butylene Glycol, Glycol Distearate, Polysorbate 80, Sodium Methyl Cocoyl Taurate, Salicylic Acid,PEG-60 Hydrogenated Castor Oil, Fragrance, Sodium Chloride, Melaleuca Alternigolia (Tea Tree) Leaf Oil, Caprylyl Glycol, Salix Alba (Willow) Bark Water, Saccharomyces Ferment, Cryptomeria Japonica Leaf Extract, Nelumbo Nucifera Leaf Extract, Pinus Palustris Leaf Extract, Ulmus Davidiana Root Extract, Oenothera Biennis (Evening Primrose) Flower Extract, Pueraria Lobata Root Extract, 1,2-Hexanediol, Ethyl Hexanediol, Citric Acid, Disodium EDTA\r\n\r\n', 850),
(25, '𝐓𝐡𝐞 𝐅𝐚𝐜𝐞 𝐒𝐡𝐨𝐩 𝐑𝐢𝐜𝐞 𝐖𝐚𝐭𝐞𝐫 𝐁𝐫𝐢𝐠𝐡𝐭 𝐅𝐨𝐚𝐦𝐢𝐧𝐠 𝐂𝐥𝐞𝐚𝐧𝐬𝐞𝐫', 'The Face Shop Rice Water Bright Foaming Cleanser is enriched with rice extracts that offer your skin a clear and even complexion. Enriched with a natural rice water solution with brightening properties, it cleanses skin with its whipped cream-like texture.', 'Face shop cleanser.jpg', 8, 8, 6, 12, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬:\r\nRice Water Extracts, Soapwort and Moringa Oil, Potassium Hydroxide, Stearic Acid, Lauric Acid, Disodium Cocoamphodiacetate, Cocamidopropyl Betaine, Cocamide Mea, Glyceryl Stearate, Peg-100 Stearate, Sodium Lauryl Sulfate, Oryza Sativa (Rice) Extract, Saponaria Officinalis Leaf Extract, Oryza Sativa (Rice) BranOil, Titanium Dioxide, Sodium Chloride, Dimethicone Copolymer, C12-13 Pareth-23, C12-13 Pareth-3,  Blue 1 (Ci 42090), Yellow 5( Ci 19140), Red 4 (Ci 14700), Hydroxypropyl Methylcellulose, Perfume/Fragrance, Hexyl Cinnamal, Hydroxyisohexyl 3-Cyclohexene Carboxaldehyde.', 849),
(27, '𝐈𝐬𝐧𝐭𝐫𝐞𝐞 𝐘𝐚𝐦 𝐑𝐨𝐨𝐭 𝐕𝐞𝐠𝐚𝐧 𝐌𝐢𝐥𝐤 𝐂𝐥𝐞𝐚𝐧𝐬𝐞𝐫 𝟐𝟐𝟎𝐦𝐥', 'A mild vegan milk cleanser with Sandong yam extract gently dissolves makeup and impurities without leaving the skin feeling stripped. It contains 100% of plant-derived ingredients. The vegan milk complex is made with rice, almond, oat, bean, and coconut.', 'Instree Yam Root Cleanser.jpg', 10, 5, 6, 8, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬: Water, Helianthus Annuus (Sunflower) Seed Oil, Dioscorea Japonica Root Extract, 1,2-Hexanediol, Polyglyceryl-10 Myristate, Arachidyl Alcohol, Glycerin, Behenyl Alcohol,Glucose, Coco-glucoside, Glyceryl Stearate, Citric acid, Butylene Glycol, Hibiscus Esculentus Fruit Extract, Nelumbo Nucifera Root Extract, Laminaria Japonica Extract, Cocos Nucifera (Coconut) Fruit Extract, Oryza Sativa (Rice) Extract, Prunus Amygdalus Dulcis (Sweet Almond) Seed Extract, Avena Sativa (Oat) Meal Extract, Xanthan Gum, Sodium Polyacrylate', 1399),
(28, '𝐃𝐞𝐚𝐫 𝐊𝐥𝐚𝐢𝐫𝐬 – 𝐆𝐞𝐧𝐭𝐥𝐞 𝐁𝐥𝐚𝐜𝐤 𝐃𝐞𝐞𝐩 𝐂𝐥𝐞𝐚𝐧𝐬𝐢𝐧𝐠 𝐎𝐢𝐥 𝟏𝟓𝟎𝐦𝐥', 'Infused with the goodness of black bean oil, black sesame oil, black currant seed oil and more luxurious oils, this cleansing oil not only ensures your skin stays moisturized but also enhances its elasticity. It’s a master at controlling excess oil as well as ensuring a balanced and refreshed complexion. Every wash strengthens your skin’s defenses, enriching its protective barrier for a healthier look and feel.', 'Klairs-Gentle-Black-Deep-Cleansing-Oil-150ml.jpg', 10, 8, 6, 6, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬:\r\nCaprylic/Capric Triglyceride, Isononyl Isononanoate, PEG-7 Glyceryl Cocoate, Isopropyl Myristate, Simmondsia Chinensis (Jojoba) Seed Oil, Glycine Soja (Soybean) Oil, Sesamum Indicum (Sesame) Seed Oil, Ribes Nigrum (Black Currant) Seed Oil, Tocopheryl Acetate, PEG-20 Glyceryl Triisostearate, Polysorbate 20, Fragrance, Butyrospermum Parkii (Shea Butter), Carapa Guaianensis Seed Oil, Vaccinium Macrocarpon (Cranberry) Seed Oil', 1299),
(29, '𝐁𝐞𝐚𝐮𝐭𝐲 𝐎𝐟 𝐉𝐨𝐬𝐞𝐨𝐧 𝐆𝐢𝐧𝐬𝐞𝐧𝐠 𝐂𝐥𝐞𝐚𝐧𝐬𝐢𝐧𝐠 𝐎𝐢𝐥 𝟐𝟏𝟎𝐦𝐥', 'Beauty Of Joseon Ginseng Cleansing Oil is a gentle cleansing oil that utilizes micellar cleansing technology to draw impurities, dirt and debris from the skin. Soybean and the age-old ginseng is formulated to nourish the skin barrier as you cleanse, while leaving your face supple, soft and cleansed.Key ingredients', 'BEAUTY-OF-JOSEON-GINSENG-CLEANSING-OIL-210ML.jpg', 5, 6, 6, 5, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬:\r\nGlycine Soja (Soybean) Oil, Cetyl Ethylhexanoate,Olea Europaea (Olive) Fruit Oil, Sorbitan Sesquioleate, Helianthus Annuus (Sunflower) Seed Oil, Tocopherol, Panax Ginseng Seed Oil, Ethylhexylglycerin,Panax Ginseng Root Extract, Melia Azadirachta Flower Extract, Indica Fruit Extract, Amber Powder, Solanum Melongena (Eggplant) Fruit Extract, Moringa Oleifera Seed Oil, Curcuma LongaRoot Extract, Ocimum Sanctum Leaf Extract, Corallina Officinalis Extract, Bixa Orellana Seed Oil, Water, Butylene Glycol, 1,2-Hexanediol, Panax Ginseng Root Extract, Panax Ginseng Berry Extract', 1505),
(30, '𝐂𝐎𝐒𝐑𝐗 𝐋𝐨𝐰 𝐩𝐇 𝐆𝐨𝐨𝐝 𝐌𝐨𝐫𝐧𝐢𝐧𝐠 𝐆𝐞𝐥 𝐂𝐥𝐞𝐚𝐧𝐬𝐞𝐫 𝟏𝟓𝟎𝐦𝐥', 'The  COSRX Low-pH Good Morning Gel Cleanser is a gel-based cleanser formulated to cleanse and balance your skin’s pH level without stripping skin dry. Made with all-natural botanical ingredients to soothe, exfoliate and hydrate the skin, the Cosrx pH good morning gel cleanser is designed to balance the skin’s pH without irritation. Cosrx pH good morning gel cleanser makes the perfect morning cleanser for all skin types, especially for oily, acne-prone skin.', 'Cosrx-Low-pH-Good-Morning-Gel-Cleanser-150ml.jpg', 11, 9, 6, 1, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬:\r\nWater, Cocamidopropyl Betaine, Sodium Lauroyl Methyl Isethionate, Polysorbate 20, Styrax Japonicus Branch/Fruit/Leaf Extract, Butylene Glycol, Saccharomyces Ferment, Cryptomeria Japonica Leaf Extract, Nelumbo Nucifera Leaf Extract, Pinus Palustris Leaf Extract, Oenothera Biennis Flower Extract, Pueraria Lobata Root Extract, Melaleuca Alternifolia (Tea Tree) Leaf Oil, Allantoin, Caprylyl Glycol, Betaine Salicylate, Citric Acid, Ethyl Hexanediol, 1,2-Hexanediol, Trisodium Ethylenediamine Disuccinate, Sodium Benzoate, Disodium EDTA', 699),
(31, '𝐁𝐞𝐚𝐮𝐭𝐲 𝐨𝐟 𝐉𝐨𝐬𝐞𝐨𝐧 𝐆𝐫𝐞𝐞𝐧 𝐏𝐥𝐮𝐦 𝐑𝐞𝐟𝐫𝐞𝐬𝐡𝐢𝐧𝐠 𝐂𝐥𝐞𝐚𝐧𝐬𝐞𝐫 𝟏𝟎𝟎𝐦𝐥', 'A low pH facial cleanser, which maintains the delicate balance of moisture and nutrition for your skin to give it a healthy and glowing look. The presence of natural herbal ingredients help remove dead skin cells and sebum in a gentle way. Green Plum Refreshing Cleanser keeps the skin smooth and supple without any allergic reactions. This cleanser emphasizes skin balance and enhances skin health in its place of origin. This pH-balanced cleanser is perfect for everyday use. It is suitable for sen', 'Green_Plum_Refreshing_Cleanser_100ml_thumbnail.jpg', 9, 4, 6, 5, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬: \r\nWater, Prunus Mume Fruit Water, Phaseolus Radiatus Seed Extract, Sodium Cocoyl Isethionate, Glycerin, Sodium Chloride, Camellia Sinensis Leaf Extract, Houttuynia Cordata Extract, Nelumbo Nucifera Flower Extract, Oryza Sativa (Rice) Extract, Prunus Mume Fruit Extract, Vaccinium Angustifolium (Blueberry) Fruit Extract, Coconut Acid, Ethylhexylglycerin, Caprylyl Glycol, Sodium Isethionate, Citric Acid, Butylene Glycol, 1,2-Hexanediol, Clitoria Ternatea Flower Extract, Garcinia Mangostana Peel Extract, Propylene Glycol Laurate, Sodium Citrate, Disodium EDTA', 1199),
(33, '𝐂𝐎𝐒𝐑𝐗 𝐂𝐞𝐧𝐭𝐞𝐥𝐥𝐚 𝐖𝐚𝐭𝐞𝐫 𝐀𝐥𝐜𝐨𝐡𝐨𝐥-𝐅𝐫𝐞𝐞 𝐓𝐨𝐧𝐞𝐫 𝟏𝟓𝟎𝐦𝐥', 'The Cosrx Centella Water Alcohol-Free Toner is a toner to recover and rejuvenate weakened and tired skin. Free of irritants such as parabens and artificial colours, it consists of centella asiatica leaf water to increase elasticity and hydration.\r\nRestore, repair, and rejuvenate with the Centella Water Alcohol-Free Toner! With the Centella Asiatica leaf water as its key ingredient, the Centella Water Alcohol-Free Toner restores the skin to a healthier state with increased elasticity and hydratio', 'Cosrx-centella-water-alcohol-free-toner-150ml.jpg', 8, 9, 7, 1, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬: \r\nMineral water, bottles grass, Butylene Glycol, 1,2-hexanediol, betaine, D-panthenol, allantoin, echil hexanediol, sodium carbonate hyaluronidase in Water, Centella Asiatica Leaf Water, Butylene Glycol, 1,2-Hexanediol , Betaine, Panthenol, Allantoin, Ethyl Hexanediol, Sodium Hyaluronate.', 999),
(34, '𝐈𝐬𝐧𝐭𝐫𝐞𝐞 𝐆𝐫𝐞𝐞𝐧 𝐓𝐞𝐚 𝐅𝐫𝐞𝐬𝐡 𝐓𝐨𝐧𝐞𝐫 (𝟐𝟎𝐦𝐥)', 'The Isntree Green Tea Fresh Toner is designed to rejuvenate and hydrate the skin, with the potent antioxidant properties of green tea. Sourced from the lush island of Jeju, the green tea extract helps to revitalize tired and stressed skin. By incorporating this toner into your daily skincare routine, you can enjoy the numerous benefits of green tea, from antioxidant protection to enhanced hydration and improved skin texture. Ideal for those seeking a natural, effective solution to maintain healt', 'Green-Tea-Fresh-Toner-Mini.jpg', 5, 5, 7, 8, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬:\r\nCamellia Sinensis (Green Tea) Leaf Extract (80%), Water, Ginkgo Biloba (Maidenhair Tree) Leaf Extract, Centella Asiatica (Gotu Kola) Extract, Salix Alba (Willow) Bark Extract, Vaccinium Angustifolium (Blueberry) Fruit Extract, Pinus Palustris Leaf Extract, Oenothera Biennis (Evening Primrose) Flower Extract, Pueraria Lobata (Kudzu) Root Extract, Hydrolyzed Hyaluronic Acid, Ammonium Acryloyldimethyltaurate/VP Copolymer, Allantoin, Dipotassium Glycyrrhizate, Hydroxyacetophenone', 199),
(35, '𝐃𝐞𝐚𝐫 𝐊𝐥𝐚𝐢𝐫𝐬 𝐒𝐮𝐩𝐩𝐥𝐞 𝐏𝐫𝐞𝐩𝐚𝐫𝐚𝐭𝐢𝐨𝐧 𝐅𝐚𝐜𝐢𝐚𝐥 𝐓𝐨𝐧𝐞𝐫 𝟏𝟖𝟎𝐦𝐥', 'The Klairs Supple Preparation Toner helps balance the skin’s pH level and also improves the effectiveness of your entire skincare regime. It enhances the skin’s absorption ability and allows serums and creams to penetrate the skin better, making them more effective. This lightweight toner is quickly absorbed into the skin and helps balance the skin’s moisture levels, which makes the skin glow brighter.', 'Klairs-Supple-Preparation-Facial-Toner-180ml.jpg', 9, 4, 7, 6, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬: \r\nWater, Butylene Glycol, Dimethyl Sulfone, Betaine, Caprylic/Capric Triglyceride, Natto Gum, Sodium Hyaluronate, Disodium EDTA, Centella Asiatica Extract, Glycyrrhiza Glabra (Licorice) Root Extract, Polyquaternium-51, Carbomer, Panthenol, Arginine, Luffa Cylindrica Fruit/Leaf/Stem Extract, Beta-Glucan, Althaea Rosea Flower Extract, Aloe Barbadensis Leaf Extract,Theanine, Lavandula Angustifolia (Lavender) Oil, Eucalyptus Globulus Leaf Oil, Pelargonium Graveolens Flower Oil, Citrus Limon (Lemon) Peel Oil, Citrus Aurantium Dulcis (Orange) Peel Oil, Cananga Odorata Flower Oil, Copper Tripeptide-1', 999),
(37, '𝐈’𝐦 𝐅𝐫𝐨𝐦 𝐁𝐫𝐢𝐠𝐡𝐭𝐞𝐧 & 𝐠𝐥𝐨𝐰 𝐃𝐮𝐨', 'I’m from vitamin Duo is specially formulated for those with combination and sensitive skin, this lightweight moisturizer will be your skin’s new best friend. Its unique blend works wonders on skin that’s getting drier with age and climate, providing an all-day moisture that will leave your skin glistening without any greasy residue. It’s so gentle, it doesn’t cause breakouts, making it a perfect choice for those with sensitive skin.', 'im from essence.jpg', 11, 7, 8, 11, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬:\r\nCitrus Limon (Lemon) Fruit Extract (86.7%), Pyrus Malus (Apple) Fruit Extract (3%), Citrus Aurantium Dulcis (Orange) Fruit Extract (3%), Carica Papaya (Papaya) Fruit Extract (3%), Tricholoma Matsutake Extract (1%), Vaccinium Myrtillus (Bilberry) Fruit Extract (1%), Saccharum Officinarum (Sugarcane) Extract (1%), Acer Saccharum (Sugar Maple) Extract (1%), Glycerin, Water, Butylene Glycol, Glyceryl Polymethacrylate, 1,2-Hexanediol', 2925),
(38, '𝐑𝐞𝐩𝐚𝐢𝐫 & 𝐆𝐥𝐨𝐰 𝐒𝐧𝐚𝐢𝐥 𝐃𝐮𝐨 (𝐒𝐧𝐚𝐢𝐥 𝟗𝟔 & 𝐒𝐧𝐚𝐢𝐥 𝟗𝟐)', 'Enriched with high concentrations of snail mucin, these products replenish, repair, and boost skin elasticity. Perfect for all skin types, they effectively tackle dry patches, acne, and hyperpigmentation, promoting healthier, youthful skin. The Advanced Snail 92 All In One Cream is formulated with 92% snail mucin and hyaluronic acid, strengthening, restoring, and repairing damaged skin. ', 'snail96 and 92 essence.jpg', 10, 7, 8, 1, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬: \r\nSnail Secretion Filtrate, Betaine, Caprylic/Capric Triglyceride, Cetearyl Olivate, Sorbitan Olivate, Sodium Hyaluronate, Cetearyl Alcohol, stearic acid, Arginine, Dimethicone, Carbomer, Panthenol, Allantoin, Sodium Polyacrylate, Xanthan Gum, Ethyl Hexanediol, Adenosine, Phenoxyethanol.', 2480),
(40, '𝐈𝐌 𝐅𝐑𝐎𝐌 𝐁𝐫𝐢𝐠𝐡𝐭𝐞𝐫 𝐒𝐨𝐟𝐭𝐞𝐫 𝐑𝐈𝐂𝐄 𝐓𝐑𝐈𝐎', 'IM FROM Rice Toner, everyday brightening toner to nourish Dry, Dehydrated & Fine lines prone skin, soften Rough & Uneven skin texture, lighten DARK SPOTS & uneven skin tone. IM FROM RICE SERUM, an AM and PM brightening serum, pumps out like a gel, but leaves your skin with a deep moisture finish without the tacky nor the unappealing greasiness.IM FROM RICE CREAM, is one of those balm-like-creams without the pore clogging feeling. ', 'im from essence trio.jpg', 9, 4, 8, 11, 4, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬:\r\nRice extract, Methylpropanediol, Triethylhexanoin, Hydrogenated poly (C6-14 olefin), Niacinamide, Pentylene glycol, Common Purslane extract, Rice bran extract, Japanese elm bark extract, Amaranthus caudatus seed extract, Hydrogenated lecithin, Distilled water, Polyglyceryl-10-myristate, Butylene glycol', 4999),
(41, '𝐈𝐬𝐧𝐭𝐫𝐞𝐞 𝐎𝐧𝐢𝐨𝐧 𝐍𝐞𝐰𝐩𝐚𝐢𝐫 𝐄𝐬𝐬𝐞𝐧𝐜𝐞 𝐓𝐨𝐧𝐞𝐫 𝟐𝟎𝟎𝐦𝐥', 'Isntree Onion Newpair Essence Toner is a spot care essence toner that helps treat blemishes and spots at one time. Enriched with 75% Muan Red Onion Extract to tackle blemishes. Formulated with NoSCalm Complex (Sodium heparin, Allantoin, Panthenol, and Heartleaf Houttuynia) to soothe sensitive, irritated skin. Contains Tranexamic Acid and Vitamin C derivatives to even skin tone and tackle pigmentation, as well as betaine to moisturize skin.', 'Onion-Newpair-Essence-Toner-200ml.jpg', 5, 7, 8, 8, 2, '𝐈𝐧𝐠𝐫𝐞𝐝𝐢𝐞𝐧𝐭𝐬: \r\nAllium Cepa (Onion) Bulb Extract, Propanediol, Glycerin, Methylpropanediol, Niacinamide, 1,2-Hexanediol, Butylene Glycol, Water Hydroxyacetophenone, Ethylhexylglycerin, Carbomer, Adenosine, Disodium EDTA, Biosaccharide Gum-1, Tromethamine, Melia Azadirachta Leaf Extract, Hyaluronic Acid, Hydrolyzed Hyaluronic Acid, Sodium Hyaluronate, Glycereth-26, Ocimum Sanctum Leaf Extract, Curcuma Longa (Turmeric) Root Extract, Sodium Heparin, Ammonium Polyacryloyldimethyl Taurate, Sodium Ascorbyl Phosphate, Tranexamic Acid', 1350),
(42, '𝐂𝐎𝐒𝐑𝐗 𝐒𝐚𝐥𝐢𝐜𝐲𝐥𝐢𝐜 𝐀𝐜𝐢𝐝 𝐃𝐚𝐢𝐥𝐲 𝐆𝐞𝐧𝐭𝐥𝐞 𝐂𝐥𝐞𝐚𝐧𝐬𝐞𝐫 𝟏𝟓𝟎𝐦𝐥', 'jjj', '', 8, 0, 0, 0, 4, '', 90);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `rating_value` int(11) NOT NULL,
  `rating_content` varchar(500) NOT NULL,
  `rating_datetime` varchar(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `rating_value`, `rating_content`, `rating_datetime`, `product_id`, `user_id`) VALUES
(1, 4, 'Haiii', '2024-08-02', 18, 1),
(2, 0, 'bad', '2024-08-09', 0, 1),
(3, 2, 'Kollula', '2024-08-09', 18, 1),
(4, 3, 'BAD', '2024-08-12', 0, 1),
(5, 5, 'Nice one', '2024-09-22', 17, 18),
(6, 4, 'fff', '2024-09-27', 17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_routine`
--

CREATE TABLE `tbl_routine` (
  `routine_id` int(11) NOT NULL,
  `routine_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_routine`
--

INSERT INTO `tbl_routine` (`routine_id`, `routine_name`) VALUES
(6, 'Cleanser'),
(7, 'Toner'),
(8, 'Essences'),
(9, 'Sheet Mask'),
(10, 'Moisturiser'),
(11, 'Sunscreen'),
(14, 'Toner'),
(16, 'Serum');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `sale_id` int(11) NOT NULL,
  `sale_title` varchar(500) NOT NULL,
  `sale_startdate` varchar(500) NOT NULL,
  `sale_enddate` varchar(500) NOT NULL,
  `sale_date` varchar(500) NOT NULL,
  `sale_status` int(11) NOT NULL DEFAULT 0,
  `sale_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sale`
--

INSERT INTO `tbl_sale` (`sale_id`, `sale_title`, `sale_startdate`, `sale_enddate`, `sale_date`, `sale_status`, `sale_image`) VALUES
(1, 'Clearance Sale', '05/10/2025', '06/10/2025', '2024-07-27', 0, 'sale.jfif'),
(2, 'Pink Friday', '09/1/2025', '10/11/2025', '2024-07-27', 0, 'sale.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saleproducts`
--

CREATE TABLE `tbl_saleproducts` (
  `saleproduct_id` int(11) NOT NULL,
  `saleproduct_percentage` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_saleproducts`
--

INSERT INTO `tbl_saleproducts` (`saleproduct_id`, `saleproduct_percentage`, `product_id`, `sale_id`) VALUES
(1, 10, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `seller_vstatus` int(11) NOT NULL DEFAULT 0,
  `seller_name` varchar(30) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `seller_email` varchar(25) NOT NULL,
  `seller_password` varchar(20) NOT NULL,
  `seller_address` varchar(20) NOT NULL,
  `place_id` int(11) NOT NULL,
  `seller_logo` varchar(500) NOT NULL,
  `seller_proof` varchar(20) NOT NULL,
  `seller_doj` varchar(20) NOT NULL,
  `seller_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seller`
--

INSERT INTO `tbl_seller` (`seller_vstatus`, `seller_name`, `seller_id`, `seller_email`, `seller_password`, `seller_address`, `place_id`, `seller_logo`, `seller_proof`, `seller_doj`, `seller_contact`) VALUES
(1, 'Hradya ', 1, 'hradyaeldhose23@gmail.com', 'Hradya14*', 'Kothamangalam', 17, 'sellerpic.jpg', 'prrof.jpg', '2024-10-31', 2147483647),
(2, 'Sreeshna', 2, 'aaa@gmail.com', 'Anus34@1', 'hhhhh', 2, 'bpctop.jpg', 'logo.jpg', '2024-05-23', 5555),
(1, 'Hradya ', 4, 'hradyaeldhose23@gmail.com', 'Hradhya3*', 'Kothamangalam', 17, 'sellerpic.jpg', 'prrof.jpg', '2024-10-31', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skinconcern`
--

CREATE TABLE `tbl_skinconcern` (
  `skinconcern_id` int(11) NOT NULL,
  `skinconcern_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_skinconcern`
--

INSERT INTO `tbl_skinconcern` (`skinconcern_id`, `skinconcern_name`) VALUES
(4, 'Dryness'),
(5, 'Normal'),
(6, 'Anti ageing'),
(7, 'Pigmentation'),
(8, 'Oil Control'),
(9, 'Acne');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skintype`
--

CREATE TABLE `tbl_skintype` (
  `skintype_id` int(11) NOT NULL,
  `skintype_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_skintype`
--

INSERT INTO `tbl_skintype` (`skintype_id`, `skintype_name`) VALUES
(5, 'Normal'),
(7, 'Oily'),
(8, 'Combination'),
(9, 'Dry'),
(10, 'All'),
(11, 'Sensitive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `stock_date` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_quantity`, `stock_date`, `product_id`) VALUES
(1, 10, '2004-05-12', 0),
(3, 10, '2024-05-27', 5),
(4, 20, '2024-05-27', 5),
(7, 20, '2024-05-27', 5),
(8, 2, '2024-07-08', 16),
(9, 3, '2024-07-16', 16),
(10, 20, '2024-07-16', 17),
(11, 4, '2024-07-16', 18),
(12, 4, '2024-09-20', 0),
(13, 3, '2024-09-21', 0),
(14, 5, '2024-09-21', 0),
(15, 5, '2024-09-21', 25),
(16, 6, '2024-09-21', 28),
(17, 5, '2024-09-21', 29),
(18, 6, '2024-09-21', 31),
(19, 5, '2024-09-22', 17),
(20, 4, '2024-10-30', 18),
(21, 5, '2024-10-30', 28),
(22, 6, '2024-10-30', 33),
(23, 5, '2024-10-30', 38),
(24, 8, '2024-10-30', 41);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_address`, `place_id`, `user_photo`, `user_password`) VALUES
(1, 'Harini', 'hari@gmail.com', '8281247897', 'Kottayam', 2, 'APJ.jpg', '123456'),
(2, 'Gouri', 'gourinandanam11@gmail.com', '8848982724', 'Kottayam', 2, 'Screenshot 2024-08-11 210723.png', 'Anjana34@'),
(8, 'Aleen', 'aleenareji002@gmail.com', '9865112009', 'ddd', 5, 'Screenshot 2024-08-11 210723.png', 'Aleena34@'),
(11, 'Navendhu', 'navendunandu@gmail.com', '9835667210', 'Muvattupuzha', 1, 'Screenshot 2024-08-11 210840.png', 'Nandhu@2'),
(18, 'Smitha', 'smitha4433@gmail.com', '7907377629', 'Kaduthuruthy', 2, 'user pic.jpg', 'SMitha@2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminreg`
--
ALTER TABLE `tbl_adminreg`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `tbl_chatlist`
--
ALTER TABLE `tbl_chatlist`
  ADD PRIMARY KEY (`chatlist_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_derma`
--
ALTER TABLE `tbl_derma`
  ADD PRIMARY KEY (`derma_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_gallary`
--
ALTER TABLE `tbl_gallary`
  ADD PRIMARY KEY (`gallary_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_routine`
--
ALTER TABLE `tbl_routine`
  ADD PRIMARY KEY (`routine_id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `tbl_saleproducts`
--
ALTER TABLE `tbl_saleproducts`
  ADD PRIMARY KEY (`saleproduct_id`);

--
-- Indexes for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `tbl_skinconcern`
--
ALTER TABLE `tbl_skinconcern`
  ADD PRIMARY KEY (`skinconcern_id`);

--
-- Indexes for table `tbl_skintype`
--
ALTER TABLE `tbl_skintype`
  ADD PRIMARY KEY (`skintype_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminreg`
--
ALTER TABLE `tbl_adminreg`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_chatlist`
--
ALTER TABLE `tbl_chatlist`
  MODIFY `chatlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_derma`
--
ALTER TABLE `tbl_derma`
  MODIFY `derma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_gallary`
--
ALTER TABLE `tbl_gallary`
  MODIFY `gallary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_routine`
--
ALTER TABLE `tbl_routine`
  MODIFY `routine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_saleproducts`
--
ALTER TABLE `tbl_saleproducts`
  MODIFY `saleproduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_skinconcern`
--
ALTER TABLE `tbl_skinconcern`
  MODIFY `skinconcern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_skintype`
--
ALTER TABLE `tbl_skintype`
  MODIFY `skintype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
