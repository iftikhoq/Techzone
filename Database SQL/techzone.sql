-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 07:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `Password`, `email`, `phone`, `address`, `website`) VALUES
('ove', '1122', 'rohedove23@gmail.com', '01812856123', 'Hospital Gate', 'https://rohed23.000webhostapp.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `pid` varchar(255) NOT NULL,
  `P_name` varchar(50) DEFAULT NULL,
  `Price` int(30) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `P_img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `Phone` varchar(30) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `password`, `email`, `Phone`, `Address`) VALUES
('eraz', '2285', 'eraz@gmail.com', '01690009276', 'wasa'),
('ove', '2296', 'rohedove23@gmail.com', '01812856123', 'Hospital Gate'),
('siam', '2312', 'siam@gmail.com', '01859976438', 'Halishohor');

-- --------------------------------------------------------

--
-- Table structure for table `customerorder`
--

CREATE TABLE `customerorder` (
  `username` varchar(50) NOT NULL,
  `O_id` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `P_name` varchar(255) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `approval` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerorder`
--

INSERT INTO `customerorder` (`username`, `O_id`, `p_id`, `P_name`, `quantity`, `price`, `approval`) VALUES
('ove', '4kxCP', 'G-1', 'PS4 Dualshock 3', 2, 6500, '1'),
('ove', '4kxCP', 'H-1', 'boAt Rockerz 450', 2, 2999, '1'),
('ove', '0FOqg', 'G-1', 'PS4 Dualshock 3', 1, 6500, '0'),
('ove', '0FOqg', 'H-1', 'boAt Rockerz 450', 1, 2999, '0');

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `username` varchar(50) NOT NULL,
  `O_id` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `P_name` varchar(255) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderline`
--

INSERT INTO `orderline` (`username`, `O_id`, `p_id`, `P_name`, `quantity`, `price`) VALUES
('siam', 'YDwsX', 'N-1', 'Yison E17', 1, 1150),
('siam', 'NTMgF', 'P-6', 'Xiaomi 11T Pro', 1, 64999),
('eraz', 'ONY9K', 'M-4', 'Fantech WGC2', 1, 1700),
('eraz', 'oBTxt', 'S-3', 'HP Probook 440', 1, 83500);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `P_id` varchar(30) NOT NULL,
  `P_name` varchar(50) DEFAULT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `Price` int(30) DEFAULT NULL,
  `P_brand` varchar(30) DEFAULT NULL,
  `Category` varchar(30) DEFAULT NULL,
  `P_img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_id`, `P_name`, `Description`, `Price`, `P_brand`, `Category`, `P_img`) VALUES
('G-1', 'PS4 Dualshock 3', 'Wireless Controller Steel<br>Glacier Black (Original)<br>SHARE button,Touch pad<br>Built-in speaker<br>Refined analog triggers<br>Motion sensors,Stereo headset', 6500, 'PS4', 'Gaming Console', 'ccf1dd53aeb6a36c91fa1e1b89c64a32.jpg'),
('G-2', 'PS4 Dualshock 4', 'Wireless Controller Steel<br>Glacier Blue (Original)<br>SHARE button,Touch pad<br>Built-in speaker<br>Refined analog triggers<br>Motion sensors,Stereo headset', 6700, 'PS4', 'Gaming Console', '7f004c954a0cc6bb4727383e79803439.jpg'),
('G-3', 'Microsoft Xbox 2', 'Wireless Controller<br>Daystrike Special Edition<br>Textured Triggers<br>Bluetooth Technology<br>Button Mapping,Hybrid D-Pad', 8250, 'Xbox', 'Gaming Console', 'ca19b8fb1793d23f772c39aae08c1013.jpg'),
('G-4', 'Microsoft Xbox 3', 'Wireless Controller<br>Night Ops Special Edition<br>Textured Triggers<br>Bluetooth Technology<br>Button Mapping,Hybrid D-Pad', 8350, 'Xbox', 'Gaming Console', 'abdc2cd7b5536d137197dd3ce6393b7d.jpg'),
('H-1', 'boAt Rockerz 450', 'Over-Ear Bluetooth Headphone<br>Driver: 50mm<br>Battery life:Up to 180 hrs<br>Battery Capacity:500 mAh<br>Type-C Charging,Built-in Mic', 2999, 'boAT', 'Headphone', 'f96b7aac207a856f575bbee66a0c0b93.jpg'),
('H-2', 'boAt Rockerz 550', 'Over-Ear Bluetooth Headphone<br>Driver: 50mm<br>Battery life:Up to 180 hrs<br>Battery Capacity:500 mAh<br>Type-C Charging,Built-in Mic', 3499, 'boAT', 'Headphone', '216b8adc3577d369c02e770a3c4622b4.jpg'),
('H-3', 'Baseus Encok Pro', 'Wireless Headphone<br>40mm Diameter audio unit<br>Up to 45dB noise reduction<br>800mAh battery<br>Up to 70 Hours of Playback', 2500, 'Baseus', 'Headphone', '76f2937083449e7f5d7b3dd6e2b1d56f.jpg'),
('H-4', 'Baseus Bowie H1', 'Wireless Headphone<br>40mm Diameter audio unit<br>Up to 45dB noise reduction<br>800mAh battery<br>Up to 70 Hours of Playback', 5950, 'Baseus', 'Headphone', '6f2de8a90b4b749688661a930ff7203a.jpg'),
('K-1', 'Havit HV-KB862L', 'RGB Mechanical Keyboard<br>Number of keys: 104<br>Interface: USB 1.0<br>RGB LED Backlit<br>Key Life:50,000,000 times', 3500, 'Havit', 'Keyboard', '977646f70085c460d36fa2a155d92066.jpg'),
('K-2', 'Havit KB488L', '19 anti-ghosting keys<br>Enable free control<br>Key number 108<br>Interface type: USB 4<br>Standard multimedia keys', 1050, 'Havit', 'Keyboard', 'a1fc079323a0ba08ba2ba29cfaf46c75.jpg'),
('K-3', 'A4TECH S510N', 'Mechanical Blue Switch<br>1000 Hz Report Rate<br>1ms button response<br>100% Anti-ghosting<br>Screw Enhanced Space-Bar', 3299, 'A4TECH', 'Keyboard', 'dd3c290bb9d9128525f7f72dc565150c.jpg'),
('K-4', 'A4TECH B135N', 'Neon Backlight Keyboard<br>1000 Hz Report Rate<br>Multimedia Hot-Keys<br>1ms ultra-fast response<br>Screw Enhanced Space-Bar', 1550, 'A4TECH', 'Keyboard', '1098e4dccebd29d7d424a3e0a2f317f3.jpg'),
('M-1', 'Logitech G502', 'RGB Gaming Mouse<br>Resolution:200 up to 16,000<br>Max. acceleration: > 40 G<br>Max. speed: > 400 IPS<br>Buttons: 50 million click', 4700, 'Logitech', 'Mouse', '2168e6f19770df89ccb97cff430f6791.jpg'),
('M-2', 'Logitech G502 X', 'Gaming Mouse White<br>25K Optical Sensor<br>Lightforce Optical Switches<br>5 onboard memory profiles<br>13 Programmable Controls', 8200, 'Logitech', 'Mouse', '9220d200bad3fdece2e98791d347e084.jpg'),
('M-3', 'Fantech X4S', 'RGB Gaming Mouse Black<br>3 buttons+1 scroll wheel<br>Optical sensor 2400<br>Buttons durability: 5m<br>RGB lights,Low friction', 1200, 'Fantech', 'Mouse', '4af4fda5ef480541fba4c59f4c72ecfd.jpg'),
('M-4', 'Fantech WGC2', 'Space Edition Wireless Mouse<br>Pixart 3212 Optical Sensor<br>Adjustable 800-2,400DPI<br>20.000.000 Clicks Lifetime<br>Up to10G Acceleration', 1700, 'Fantech', 'Mouse', '297d0e8c31ac995b91030707b2242e85.jpg'),
('N-1', 'Yison E17', 'Waterproof Wireless Neckband<br>Drive Unit: 10mm<br>Impedance: 32Ω±15%<br>Music Time: Up to 8H<br>Waterproof: IPX5', 1150, 'Yison', 'Neckband', 'abcc13815e24dfb766a99542bd5df552.jpg'),
('N-2', 'Yison Celebrat A19', 'Wireless Bluetooth Neckband<br>Drive Unit: 10mm<br>Impedance: 32Ω±15%<br>Music Time: Up to 8H<br>Waterproof: IPX5', 1200, 'Yison', 'Neckband', 'c923fe2f278d894b306ab1bc10c10a1d.jpg'),
('N-3', 'Realme Buds 2S', 'Neckband Earphone<br>AI Noise Cancellation<br>11.2mm Dynamic Bass<br>20mins Charge 7hrs Playback<br>Dual-device Fast Switching', 2150, 'Realme', 'Neckband', 'ee1b42964374b2f4469080d2c1958fdb.jpg'),
('N-4', 'Realme DIZO', 'Neckband Earphone<br>AI Noise Cancellation<br>11.2mm Dynamic Bass<br>20mins Charge 7hrs Playback<br>Dual-device Fast Switching', 2100, 'Realme', 'Neckband', '73dea12f9651ddf9a1e2e0bfde777b7c.jpg'),
('O-1', 'Havit SK708 2:0', 'RGB USB Gaming Speaker<br>Frequency: 30Hz~15KH<br>Input sensibility: 80dB<br>Power input: DC 5V<br>Output power: 3W x 2', 750, 'Havit', 'Speaker', 'c3883d033c203a76f7030022ca40033d.jpg'),
('O-2', 'Havit SK724', 'RGB USB Gaming Speaker<br>Frequency: 30Hz~15KH<br>Input sensibility: 80dB<br>Power input: DC 5V<br>Output power: 3W x 2', 650, 'Havit', 'Speaker', '606d0e6d744b4326c1e8ea57c19fe235.jpg'),
('O-3', 'Fantech GS205', 'Hellscream Gaming Speaker<br>3.5mm TRRS jack<br>Driver Unit: 45MM<br>Illumination: RGB Lighting<br>360° Surround Sound', 1150, 'Fantech', 'Speaker', 'a862a5f969bd04cae2a4b4b7c9ca4255.jpg'),
('O-4', 'Fantech GS202', 'Sonar USB Gaming Speaker<br>3.5mm TRRS jack<br>Driver Unit: 45MM<br>Illumination: RGB Lighting<br>360° Surround Sound', 1100, 'Fantech', 'Speaker', '0ba2033684901ad6467db15013d749b2.jpg'),
('P-1', 'iPhone 14 Pro', 'Display: 6.1\" Super Retina<br>Processor: A16 Bionic chip<br>Storage: 256GB<br>Dynamic Island & Face ID', 196599, 'APPLE', 'Phone', 'caf2556510f70d0b58b6fd0cfcbeaece.jpg'),
('P-2', 'iPhone 12 Pro', 'Display: 6.1\" Super Retina<br>Processor: A16 Bionic chip<br>Storage: 128 GB<br>Dynamic Island & Face ID', 146999, 'APPLE', 'Phone', '39a382a7b04f9919cc5d807eb78d0190.jpg'),
('P-3', 'Samsung A53', 'Display: 6.5\" Super AMOLED<br>Processor: Octa-Core 2.4GHz<br>Camera:Quad 64+12+5+5<br>Under Display Fingerprint<br>25W Fast Charging', 59999, 'Samsung', 'Phone', 'bdd6aa1d2999615394999edc077d4885.jpg'),
('P-4', 'Samsung S21', '6.4\" Dynamic AMOLED<br>Processor: Octa-Core 2.9 GHz<br>Camera:12MP+12MP+8MP<br>Under Display Fingerprint<br>25W Fast Charging', 82999, 'Samsung', 'Phone', 'd74dc01d87a21bbd832ea3d702d32f60.jpg'),
('R-1', 'Archer C64 AC1200', 'MU-MIMO 2X efficiency<br>Beamforming technology<br>802.11ac Wave2 WiFi<br>4 external antennas', 3150, 'TP-Link', 'Router', 'abc1a9628d8f634831d60cb5f237f9dc.jpg'),
('R-2', 'Archer C24 AC750', 'Supports & Access Point<br>4A-antennas deliver<br>IPv6 Supported<br>Doubling Bandwidth', 1900, 'TP-Link', 'Router', 'f78d8c6e8ea91181849ce1af35ef2a58.jpg'),
('R-3', 'AC10 AC1200', '4*6dBi Dual-Band Antennas<br>5GHz:Up to 867Mbps<br>2.4GHz:Up to 300Mbps<br>Wan+3Lan gigabit ports', 2800, 'Tenda', 'Router', 'e33b2901100099cd9a5fceb72c775f27.jpg'),
('R-4', 'AC5 AC1200', 'Interface:LAN 3x WAN Ports<br>DIM:171.3*171.3 mm<br>Frequency:2.4 GHz<br>Doubling Bandwidth', 1800, 'Tenda', 'Router', 'c7b53adbc40bf7ebffa14b0c0dcddfed.jpg'),
('S-1', 'Dell Vostro 14 3400', 'Intel Core i3-1115G4<br>RAM: 4GB DDR4<br>Storage:1TB SATA<br>Display: 14inch (1366 x 768)<br>Backlit Keyboard & Webcam', 83000, 'Dell', 'Laptop', '06ca7a8051097cf7ecfc042912814676.jpg'),
('S-2', 'Dell Latitude 14 3420', 'Intel Core i3-1115G4<br>RAM: 4 GB 3200MHz<br>Storage: 256GB SSD<br>Display: 14\" (1366 x 768)<br>Backlit Keyboard & Type-C', 85500, 'Dell', 'Laptop', 'be9007c280a009b321a20aecc7fde5bd.jpg'),
('S-3', 'HP Probook 440', 'Intel Core i5-1235U<br>RAM: 8GB DDR4<br>Storage:512 GB SSD<br>Display: 14\" (1920 x 1080)<br>Backlit Keyboard & Fingerprint', 83500, 'HP', 'Laptop', '9f7f6c6533cb8278e7ced4c05e3b61ce.jpg'),
('S-4', 'HP Probook 450', 'Intel Core i5-1235U<br>RAM: 8GB DDR4<br>Storage: 512 GB SSD<br>Display: 15.6\" (1920 x 1080)<br>Backlit Keyboard & Type-C', 91000, 'HP', 'Laptop', 'df891500a790936dbf924eb8474db141.jpg'),
('T-1', 'LG 55NANO75', '4K Ultra(3,840 x 2,160)<br>Quad-Core Processor 4K<br>Active HDR (HDR10,HLG)<br>Output Power: 20W', 84990, 'LG', 'TV', '26df8eaf8731c0319bce6613f822d93f.jpg'),
('T-2', 'LG 65UQ8050', '4K Ultra(3,840 x 2,160)<br>Quad-Core Processor 4K<br>Active HDR (HDR10,HLG)<br>Output Power: 20W', 122000, 'LG', 'TV', 'c3a1c71aa2dc0e5882414bd1bbfdcaf9.jpg'),
('T-3', 'Sony KD-43X75', '43\" 4K UHD (3840 x 2160)<br>4K Processor X1 processor<br>Alexa Compatibility<br>Chromecast built-in', 62000, 'Sony', 'TV', '4cc36af40ee2a97dd659bfd712248045.jpg'),
('T-4', 'Sony KD-50X75', '50\" 4K UHD (3840 x 2160)<br>4K Processor X1 processor<br>Alexa Compatibility<br>Chromecast built-in', 73900, 'Sony', 'TV', '30922c063340f54f1d7faac536d596db.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `Phone` (`Phone`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
