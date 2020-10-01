-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2020 at 10:07 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stationeryshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `ADDID` int(5) NOT NULL,
  `UID` int(5) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `pincode` varchar(8) NOT NULL,
  `address` varchar(40) NOT NULL,
  `landmark` varchar(20) NOT NULL,
  PRIMARY KEY (`ADDID`),
  KEY `UID` (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`ADDID`, `UID`, `city`, `state`, `pincode`, `address`, `landmark`) VALUES
(1, 4, 'valsad', 'gujarat', '396001', '7b marine villa jawahar nagar soc.', 'near city palace'),
(2, 4, 'valsad', 'Gujarat', '396001', '7/B jawahar nagar soc.', 'ojhol vo;wefhe ioub'),
(3, 5, 'valsad', 'GujarÄt', '396001', '7/B jawahar nagar soc.', 'ljlhjhj'),
(4, 5, 'valsad', 'gujrat', '396001', '404 rajhans', 'near college'),
(5, 12, 'valsad', 'gujarat', '396001', 'valsad', 'near city palace'),
(6, 13, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `AID` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`AID`, `name`, `email`, `password`, `dob`, `image`) VALUES
(1, 'priyank', 'pancholipriyank33@gmail.com', 'priyank', '2000-06-10', 'img/priyank.jpg'),
(2, 'mr.priyank', 'priyank@gmail.com', 'priyank', '2000-06-10', 'img/priyank.jpg'),
(3, 'pratik', 'pratikmulle@gmail.com', 'pratik', '2000-03-20', 'img/pratik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `nmae` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`ID`, `nmae`, `image`) VALUES
(1, 'apsara', 'apsara-stationery-brand-logo.jpg'),
(3, 'archies', 'archies-stationery-brand-logo.jpg'),
(4, 'camlin', 'camlin-stationery-brand-logo.jpg'),
(5, 'cello', 'cello-stationery-brand-logo.jpg'),
(6, 'claro', 'claro-stationery-brand-logo.jpg'),
(7, 'classmate', 'classmate-stationery-brand-logo.png'),
(8, 'kangaro', 'kangaro-stationery-brand-logo.jpg'),
(9, 'kores', 'kores-stationery-brand-logo.jpg'),
(10, 'krux', 'krux-stationery-brand-logo.jpg'),
(11, 'linc', 'linc-stationery-brand-logo.jpg'),
(12, 'montex', 'montex-stationery-brand-logo.jpg'),
(13, 'nataraj', 'nataraj-stationery-brand-logo.png'),
(14, 'navneet', 'navneet-stationery-brand-logo.jpg'),
(15, 'neelgagan', 'neelgagan-stationery-brand-logo.jpg'),
(16, 'parker', 'parker-stationery-brand-logo.jpg'),
(17, 'pilot', 'pilot-stationery-brand-logo.png'),
(18, 'UNI-Mitsubishi', 'UNI-Mitsubishi-stationery-brand-logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE IF NOT EXISTS `cart_details` (
  `CTID` int(5) NOT NULL,
  `PID` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  KEY `CTID` (`CTID`,`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`CTID`, `PID`, `quantity`) VALUES
(2, 7, 1),
(2, 8, 2),
(2, 6, 1),
(2, 5, 2),
(2, 10, 1),
(1, 4, 1),
(1, 18, 1),
(1, 19, 1),
(4, 8, 1),
(4, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_master`
--

CREATE TABLE IF NOT EXISTS `cart_master` (
  `CTID` int(5) NOT NULL,
  `UID` int(5) NOT NULL,
  `total_cost` int(5) NOT NULL,
  PRIMARY KEY (`CTID`),
  KEY `UID` (`UID`),
  KEY `UID_2` (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_master`
--

INSERT INTO `cart_master` (`CTID`, `UID`, `total_cost`) VALUES
(1, 4, 1840),
(2, 5, 2334),
(3, 12, 0),
(4, 13, 748);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `CID` int(5) NOT NULL AUTO_INCREMENT,
  `cname` varchar(30) NOT NULL,
  `scname` varchar(100) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CID`, `cname`, `scname`) VALUES
(1, 'ballpoint pen', 'college office school pen ballpen'),
(2, 'stapler', 'office '),
(3, 'eraser', 'school art drawing'),
(4, 'push-pin', 'office'),
(5, 'paper clip', 'office'),
(6, 'rubber stamp', 'office'),
(7, 'highlighter', 'office college schools'),
(8, 'fountain pen', 'office pen college'),
(9, 'pencil', 'office school drawing pen'),
(10, 'marker', 'office`'),
(11, 'bulldog clip', 'office'),
(12, 'tape dispenser', 'office'),
(13, 'pencil sharpner', 'office'),
(14, 'label', 'office'),
(15, 'calculater', 'office'),
(16, 'glue', 'office college school art craft'),
(17, 'scissors', 'office art craft '),
(18, 'sticky notes', 'office'),
(19, 'paper', 'office'),
(20, 'notebook', 'school college office book'),
(21, 'envelop', 'office'),
(22, 'clipboard', 'office'),
(23, 'files', 'office'),
(24, 'color pencil', 'school drawing art craft pen'),
(25, 'keyboard', 'office'),
(26, 'folder', 'office'),
(27, 'drawing book', 'office art craft drawing school book'),
(28, 'mouse', 'office');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `ID` int(5) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`ID`, `fname`, `lname`, `email`, `subject`, `message`) VALUES
(1, 'priyank', 'pancholi', 'priyankv.pancholi@gmail.com', 'profile page error', 'my profile page is not access by me help me to fix');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `OID` int(5) NOT NULL,
  `UID` int(5) NOT NULL,
  `PID` int(5) NOT NULL,
  `ADDID` int(5) NOT NULL,
  `quantity` varchar(3) NOT NULL,
  `price` int(5) NOT NULL,
  `date` varchar(10) NOT NULL,
  `pay_method` varchar(20) NOT NULL,
  PRIMARY KEY (`OID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`OID`, `UID`, `PID`, `ADDID`, `quantity`, `price`, `date`, `pay_method`) VALUES
(1, 5, 7, 3, '1', 800, '2020-04-11', 'COD'),
(2, 5, 8, 3, '2', 1000, '2020-04-11', 'COD'),
(3, 5, 5, 3, '1', 68, '2020-04-11', 'COD'),
(11, 4, 6, 0, '2', 496, '2020-06-13', 'COD'),
(12, 4, 8, 0, '1', 500, '2020-06-13', 'COD'),
(22, 13, 8, 6, '1', 500, '2020-07-25', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `ID` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`ID`, `email`) VALUES
(1, 'priyank@gmail.com'),
(2, 'pratik@gmail.com'),
(3, 'alpik@gmail.com'),
(4, 'pratikmulle904@gmail.com'),
(5, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `OID` int(5) NOT NULL,
  `UID` int(5) NOT NULL,
  `PID` int(5) NOT NULL,
  `ADDID` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(5) NOT NULL,
  `order_date` datetime NOT NULL,
  `pay_method` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`OID`),
  KEY `UID` (`UID`,`PID`),
  KEY `ADDID` (`ADDID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OID`, `UID`, `PID`, `ADDID`, `quantity`, `price`, `order_date`, `pay_method`, `status`) VALUES
(4, 5, 5, 0, 2, 136, '2020-05-02 09:45:59', 'COD', 'pending'),
(5, 5, 6, 0, 1, 248, '2020-05-02 09:45:59', 'COD', 'pending'),
(6, 5, 7, 0, 1, 800, '2020-05-02 09:45:59', 'COD', 'pending'),
(7, 5, 8, 0, 2, 1000, '2020-05-02 09:45:59', 'COD', 'pending'),
(8, 5, 10, 0, 1, 150, '2020-05-02 09:45:59', 'COD', 'pending'),
(9, 4, 1, 0, 1, 580, '2020-06-13 15:34:07', 'COD', 'pending'),
(10, 4, 5, 0, 1, 68, '2020-06-13 15:34:07', 'COD', 'pending'),
(11, 1, 1, 0, 1, 580, '2020-06-14 18:24:35', 'COD', 'pending'),
(12, 1, 5, 0, 1, 68, '2020-06-14 18:24:36', 'COD', 'pending'),
(13, 1, 6, 0, 2, 496, '2020-06-14 18:24:36', 'COD', 'pending'),
(14, 1, 8, 0, 1, 500, '2020-06-14 18:24:36', 'COD', 'pending'),
(15, 4, 4, 1, 1, 400, '2020-06-26 20:05:18', 'COD', 'pending'),
(16, 4, 18, 1, 1, 500, '2020-06-26 20:05:18', 'COD', 'pending'),
(17, 4, 19, 1, 1, 940, '2020-06-26 20:05:18', 'COD', 'pending'),
(18, 12, 10, 0, 1, 150, '2020-06-27 12:01:10', 'COD', 'pending'),
(19, 12, 10, 5, 1, 150, '2020-06-27 12:02:38', 'COD', 'pending'),
(20, 12, 10, 5, 1, 150, '2020-06-27 12:03:44', 'COD', 'pending'),
(21, 13, 6, 6, 3, 744, '2020-06-27 14:22:04', 'COD', 'calcelled'),
(22, 13, 6, 6, 1, 248, '2020-07-28 16:59:17', 'COD', 'pending'),
(23, 13, 8, 6, 1, 500, '2020-07-28 16:59:17', 'COD', 'pending'),
(24, 13, 6, 6, 1, 248, '2020-07-28 17:41:47', 'COD', 'pending'),
(25, 13, 8, 6, 1, 500, '2020-07-28 17:41:47', 'COD', 'pending'),
(26, 13, 6, 6, 1, 248, '2020-07-28 17:42:10', 'COD', 'pending'),
(27, 13, 8, 6, 1, 500, '2020-07-28 17:42:10', 'COD', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `PID` int(5) NOT NULL AUTO_INCREMENT,
  `pname` varchar(45) NOT NULL,
  `pdesc` varchar(500) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `quantity` int(5) NOT NULL,
  `pprice` int(5) NOT NULL,
  `pimage` varchar(30) NOT NULL,
  `pdiscount` varchar(2) NOT NULL,
  `ptag` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `CID` int(5) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PID`, `pname`, `pdesc`, `brand`, `quantity`, `pprice`, `pimage`, `pdiscount`, `ptag`, `date`, `CID`) VALUES
(1, 'Solo File & Magazine', 'Solo File & Magazine Rack (SET OF 2) FS201 XL', 'cello', 50, 580, 'img/file1.jpg', '5', 'file plasticfile', '2020-03-08', 0),
(3, 'Solo Lever Arch File', 'Solo Lever Arch File XC515 F/C', 'cello', 50, 296, 'img/file2.jpg', '5', 'file plasticfile', '2020-03-08', 0),
(4, 'Solo Document Envelo', 'Solo Document Envelope (Button, L/Scape) CH118 L/S', 'camlin', 50, 400, 'img/file3.jpg', '5', 'envelope documentenvelope', '2020-03-08', 0),
(5, 'Solo Business File B', 'Solo Business File BF101 A4', 'camlin', 50, 68, 'img/file5.jpg', '5', 'file schoolfile collegefile bu', '2020-03-08', 0),
(6, 'Solo Ring Binder-2-D-40 mm Ring', 'Solo Ring Binder-2-D-Ring (40 mm Ring, Rado Lock) ', 'robut', 50, 248, 'img/file4.jpg', '5', 'file hardfile cardboardfile', '2020-03-08', 0),
(8, 'Laknock Broad - SN101 Red', 'Pack of 10', 'apsara', 50, 500, 'img/pen2.jpg', '5', 'bluepen ballpen', '2020-03-08', 1),
(9, 'Uni SA-R Red(pack of 10)', 'pack of 10', 'apsara', 50, 150, 'img/pen3.jpg', '5', 'red pen', '2020-03-08', 1),
(10, 'Uni SA-R Black(pack of 10)', 'Pack of 10', 'natraj', 50, 150, 'img/pen4.jpg', '5', 'blackpen ballpen black', '2020-03-08', 1),
(11, 'Cello Butterflow Metallic Ball Pen Set of 5', 'Smooth Writing Bold Writing Elasto Grip', 'cello', 50, 90, 'img/pen5.jpg', '5', 'pen bluepen ballpen cello', '2020-04-11', 1),
(12, 'Unomax Ultron Fusion Grip 3x Ballpoint Refill', 'Liquid Ballpoint Refill 3 Times Writing Length Jet', 'unomax', 50, 72, 'img/pen6.jpg', '5', 'pen bluepen ballpen unomax', '2020-04-11', 1),
(13, 'Pilot Lizard Fountain Pen', 'Pen Barrel Color : Bronze Pen Point Type : Medium Packaging Type : Black Color Gift Box Packaging Re', 'pilot', 50, 1, 'img/pen7.jpg', '5', 'pen bluepen funtain pen pilot', '2020-04-11', 1),
(14, 'Maped Roller Erasable pen', 'Brand:-Maped Maped Roller Erasable Freewriter Pen 1 Fluid Gel Pen', 'maped', 0, 55, 'img/pen8.jpg', '5', 'pen bluepen ballpen maped', '2020-04-11', 1),
(15, 'C3 Tri-On Dust Free Eraser (Pack of 20)', 'Premium Quality for Superior Erasing Performance Slide Sleeve for Convenient Handling Tear Strip for Easy Removal Phthalate & Latex free,Hence Safe for Children & Environment Wrapped Which Protects Yo', 'C3', 0, 50, 'img/eraser1.jpg', '5', 'eraser', '2020-04-11', 0),
(16, 'Casio WJ-120D Plus Calculator', 'Review up to 300 Calculation Steps. Auto Review by Pressing One Single Button! Jump to a Particular Calculation Step by Pressing One Single Button Automatic Totalization of the Results of Different Calculations Recheck with Sound Assist 12 Digits Regular Percentage Calculations Solar Powered when Light is Sufficient, Battery Powered when Light is Insufficient. A Symbol (+, -, ×, ÷) on the Display ', 'casio', 0, 560, 'img/calculator1.jpg', '5', 'office college calculator casi', '2020-04-11', 0),
(17, 'Kores Clear Glue Stik 15GM', 'Kores Clear Glue Stik 15GM (Pack of 20 pcs)', 'kores', 0, 800, 'img/gluestick1.jpg', '5', 'glue gluestick gum office art kores', '2020-04-11', 0),
(18, 'Kores Glue Stick 15Gms (Pack of 20 pcs)', 'Kores Glue Stick 15Gms (Pack of 20 pcs)', 'kores', 0, 500, 'img/gluestick2.jpg', '5', 'glue gluestick art craft kores', '2020-04-11', 0),
(19, 'Smily Kiddos Fancy Bliss Pencil Case', 'Fancy Strap Pencil Case is the side panels on either side that can be used to keep pencils. Features 2 zipped compartments with elastic pen/pencil holders. Comes with an attractive silicone badge.', 'smily kiddos', 0, 940, 'img/case1.jpg', '5', 'pouch case compass box school', '2020-04-11', 0),
(20, 'Smily Kiddos round pencil pouch', 'One main compartment. Zip closure. Attractive colour and print.', 'Smily Kiddos', 0, 750, 'img/case2.jpg', '5', 'round pouch case compass box school', '2020-04-11', 0),
(21, 'MTG Mathematics WorkBook', 'International Mathematics Olympiad (IMO) Workbooks are designed to familiarize students with the type of questions coming in Olympiad exams. The Workbook contains chapter-wise multiple choice question bank divided in the section of Logical Reasoning, Mathematical Reasoning, Everyday Mathematics and Achievers Section, followed by Hints and explanation in the end of the book. The IMO Olympiad workbo', 'MTG', 0, 48, 'img/book1.jpg', '5', 'maths mthematics school book', '2020-04-11', 20),
(22, 'Shopkooky Princess Complete Coloring Box Set ', 'Package Content: 16 Paints, 6 Color Pens, 1 Tube of Glue, 1 Paint Brush, 12 Color Pencils, 12 Crayons, 1 Eraser, 1 Sharpner - to let you get creative in style. You will be able to find a color match for almost all color schemes. Approximate Size: Size(L x B x H): 18 x 16 x 9 cm. The box can also be used as a pencil case. Care Instruction: Keep away from chemicals and fire. The design of the produc', 'shopkooky', 0, 449, 'img/colorbox1.jpg', '5', 'colorbox color crayons crayon school colour colleg', '0000-00-00', 0),
(23, 'Kores Sapphire Carbon', 'Marketed by : Kores India Limited, 202, Ashford Chambers, Lady Jamshedji Road, Mahim (W), Mumbai 400 016, Maharashtra, INDIA. In case of any complaints please call 1800 22 9777 or email at opdkores@gmail.com.', 'kores', 0, 200, 'img/carbonpaper1.jpg', '5', 'carbonpaper carbon bluepaper ', '0000-00-00', 0),
(24, 'Kores Multi Copy 210*330MM Carbon Paper', 'Marketed by : Kores India Limited, 202, Ashford Chambers, Lady Jamshedji Road, Mahim (W), Mumbai 400 016, Maharashtra, INDIA. In case of any complaints please call 1800 22 9777 or email at opdkores@gmail.com.', 'kores', 0, 175, 'img/carbonpaper2.jpg', '5', 'carbonpaper carbon bluepaper', '0000-00-00', 0),
(25, 'Hotshot Waterproof Outdoor Sport Camp Hiking ', 'This lightweight & voluminous backpack comes with multiple organized compartments that make it perfect for your college/office/School or as a carry-on for that weekend trip.  Made of durable double dot polyester fabric, this backpack is equipped with 4 compartments to hold enough notebooks, textbooks & journals for your school/college or clothes & additional supplies for a day or two of travel.  It has an internal organizer that provides easy access to your wallet, phone, charger, stationery, ke', 'hotshot', 0, 664, 'img/bag1.jpg', '5', 'bag schoolbag collegebag 15 litre bag', '0000-00-00', 0),
(26, 'Hotshot FASHION Polyester 20 Liters Waterproo', 'This lightweight & voluminous backpack comes with multiple organized compartments that make it perfect for your college/office/School or as a carry-on for that weekend trip.  Made of durable double dot polyester fabric, this backpack is equipped with 2 compartments and 5 pocket to hold enough notebooks, textbooks & journals for your school/college or clothes & additional supplies for a day or two of travel.  It has an internal organizer that provides easy access to your wallet, phone, charger, s', 'hotshot', 0, 634, 'img/bag2.jpg', '5', 'bag schoolbag collegebag 15 litre bag', '0000-00-00', 0),
(27, 'Hotshot Polyester 30 Liters Waterproof 15.6 i', 'This lightweight & voluminous backpack comes with multiple organized compartments that make it perfect for your college/office/School or as a carry-on for that weekend trip.  Made of durable double dot polyester fabric, this backpack is equipped with 5 compartments to hold enough notebooks, textbooks & journals for your school/college or clothes & additional supplies for a day or two of travel.  It has an internal organizer that provides easy access to your wallet, phone, charger, stationery, ke', 'hotshot', 0, 911, 'img/bag3.jpg', '5', 'bag schoolbag collegebag 15 litre bag', '0000-00-00', 0),
(28, 'Hotshot Synthetic Polyester 15.6 inch Laptop ', 'Protect your bag from rainy weather or dust with a lightweight, packable rain cover that''s made with an adjustable elastic closure for a secure fit around your backpack. Each backpack passes a series of rigorous global quality tests by Hot Shot Bags tourister. Hammonds Flycatchers is Designed for the discerning and incorporates richness in design, material and metal. Material: Outer- 100% Polyester Fabric, Inner-Yarn Dyed Cotton Gucci Fabric Compartments: ? 2 Main Compartments- With a dedicated ', 'hotshot', 0, 1040, 'img/bag4.jpg', '5', 'bag schoolbag collegebag 15.6 litre bag synthetic ', '0000-00-00', 0),
(29, 'Breeze White/Blue OSG Fresh n Lock Lunchbox -', 'Light weight and friendly look • Leak resistance • Useful for all age group • Easy to wash', 'breeze', 0, 150, 'img/lunchbox1.jpg', '5', 'lunchbox tiffinbox school office box lunch', '0000-00-00', 0),
(30, 'Cello Red Fcbarcelona Club 2 Container Lunch ', 'Official FCB licensed product. BPA free, Microwave safe containers (without lid), Airtight seal that locks in the temperature, freshness, and flavor of the food for long hours Leak proof containers. Superior quality jacket and zip which makes the lunch box ideal for carrying in school, offices or while traveling Ideal for office going people. Compact lunch box to carry your meal Ideal for dry and semi-dry liquid food, Material: Plastic Package Contents: 2 Piece Container (375ml) With 1 Piece Bag', 'cello', 0, 439, 'img/lunchbox2.jpg', '5', 'lunchbox tiffinbox school office box lunch', '0000-00-00', 0),
(31, 'Cello Blue Fcbarcelona Club 2 Container Lunch', 'Official FCB licensed product. BPA free, Microwave safe containers (without lid), Airtight seal that locks in the temperature, freshness, and flavor of the food for long hours Leak proof containers. Superior quality jacket and zip which makes the lunch box ideal for carrying in school, offices or while traveling Ideal for office going people. Compact lunch box to carry your meal Ideal for dry and semi-dry liquid food, Material: Plastic Package Contents: 2 Piece Container (375ml) With 1 Piece Bag', 'cello', 0, 439, 'img/lunchbox3.jpg', '5', 'lunchbox tiffinbox school office box lunch', '0000-00-00', 0),
(32, 'Cello Green Max Fresh Click Polypropylene Lun', 'Air tight container that keep food fresh for long Microwave safe (without lid) Compact lunch box to carry meal Freezer and dishwasher safe Easy to open and close and clean Available in attractive colours Liquid tight silicon seal on the lid that makes the containers ideal for office, school and travelling Ideal for dry and semi-dry items Ideal for office going people Easy to carry Dishwasher safe Color: Green, Material: Polypropylene Package Contents: 2-Pieces Container (300ml/23.8cm).', 'cello', 0, 369, 'img/lunchbox4.jpg', '5', 'lunchbox tiffinbox school office box lunch', '0000-00-00', 0),
(33, 'Cello Assorted Puro Plastic Sports Insulated ', '- BPA free - Leak proof flip top bottle for delightful drinking experience - Special wrist belt on the bottle for easy carrying - Break proof Insulated water bottle, it keeps the content cold for longer - Not suitable for hot beverages. - The water bottle has a wide mouth that makes cleaning and filling the bottle hassle free - Color: Assorted, Material: Plastic - Package Contents: 4-Pieces Bottle (900ml)', 'cello', 54, 549, 'img/waterbottle2.jpg', '5', 'bottle waterbottle plastic bottle', '0000-00-00', 0),
(34, 'Breeze Cool Star Bottle - 900 ml', ' Leak Resistance • Hygiene and food Grade • Leak-proof • Ideal for cold liquids • Ideal to wash', 'breeze', 65, 155, 'img/waterbottle1.jpg', '5', 'bottle waterbottle plastic bottle', '0000-00-00', 0),
(35, 'Jayco Bingo Water Bottle With Dora Ben 10 Spo', 'Key Features Lunch Box • 1 Lunch Box, 1 tray, 1 fork and a spoon • 1 Small container Compact size Press lock Handle for portability Key Features For Water Bottle • Made from plastic material • Perfect for school, car journeys and trips • The adjustable strap provides easy carrying for on the go fun', 'jayco', 87, 259, 'img/waterbottle3.jpg', '5', 'bottle waterbottle plastic bottle lunchbox box', '0000-00-00', 0),
(36, 'Jayco Bingo Water Bottle With Dora Ben 10 Spo', 'Key Features Lunch Box • 1 Lunch Box, 1 tray, 1 fork and a spoon • 1 Small container Compact size Press lock Handle for portability Key Features For Water Bottle • Made from plastic material • Perfect for school, car journeys and trips • The adjustable strap provides easy carrying for on the go fun', 'jayco', 98, 259, 'img/waterbottle3.jpg', '5', 'bottle waterbottle plastic bottle lunchbox box', '0000-00-00', 0),
(37, 'Shopkooky Cartoon Printed Exam Boards / Writi', 'Product prints vary depending on the availability. Available designs: Chota Bheem, Ben 10, Barbie, Princess, Minions, Froen etc. These are the perfect Birthday Gifts, Return Gifts Online to buy.', 'shopkooky', 0, 129, 'img/pad1.jpg', '54', 'pad exampad board examboard printed board', '0000-00-00', 0),
(38, 'Youva Exam Board - 24 cm x 34.5 cm', 'Marketed by :Vastu Trading ,G13 A,Aggarwal Plaza,Sec 12 Pocket 7,Dwarka, New Delhi-110078. In case of any complaints please call 011 42342308 or email at vastutrading@gmail.com', 'youva', 87, 80, 'img/pad2.jpg', '5', 'pad exampad board examboard printed board', '0000-00-00', 0),
(39, 'Shopkooky Lego Diary Big for Kid Boys & Girls', 'The silicon cover on the Lego Notebook makes it tough and durable to survive your briefcase, purse, school bag or pocket. It''s also easy to clean in case they do get a bit dirty in your bag. Simple use a damp cloth to wipe off the dirt and it''ll look good again. The brightly colored latch contrasts with the cover nicely, along with an addition piece of detachable silicon ''block'' that allows you to create a different look for your notebook everyday. The covers are fully removable so can be put on', 'shopkooky', 87, 579, 'img/diary1.jpg', '5', 'diary small diary diaries', '0000-00-00', 0),
(40, 'Shopkooky Cartoon Character Printed Small Loc', 'Cute New Animated Cartoon Character Lock Diary for Kids, Girls, Boys, Children / Secret Diary / New Girl Secret Diary Let your kids write ball their secrets and also be ensured that their secrets remains a secret with this amazing cartoon lock diary which has a click lock with two keys. A very unique gift item/ for any occasion.', 'shopkooky', 25, 129, 'img/diary2.jpg', '5', 'diary small diary diaries', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `ID` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `review` varchar(50) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `PID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `name`, `email`, `review`, `rating`, `date`, `PID`) VALUES
(2, 'priyank pancholi', 'priyank@gmail.com', 'verygood products', '5', '2020-05-06', 5),
(3, 'priyank pancholi', 'priyank@gmail.com', 'verygood products', '5', '2020-05-06', 5),
(4, 'priyank pancholi', 'priyank1@gmail.com', 'original good quality products happy with shop', '3', '2020-05-06', 5),
(5, 'alpik bhandari', 'alpik1@gmail.com', 'good ', '2', '2020-05-06', 5),
(6, 'priyank pancholi', 'priyank1@gmail.com', 'good product', '4', '2020-05-14', 1),
(7, 'alpik bhandari', 'alpik1@gmail.com', 'good quality in price', '5', '2020-05-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `UID` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sec_ques` varchar(30) NOT NULL,
  `sec_ans` varchar(30) NOT NULL,
  `vemail` int(10) NOT NULL,
  KEY `uid` (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`UID`, `email`, `password`, `sec_ques`, `sec_ans`, `vemail`) VALUES
(4, 'pratik2@gmail.com', 'pratik2', 'pet name', 'bruno', 1),
(5, 'priyank@gmail.com', 'priyank', 'best friend', 'pratik', 0),
(7, 'alpik@gmail.com', 'alpik', '', '', 0),
(8, 'alpik1@gmail.com', '123', '', '', 0),
(9, 'priyank1@gmail.com', '123', 'best friend', 'pratik', 0),
(10, 'priyankv.pancholi@gmail.com', 'priyank', '', '', 0),
(11, 'ankit@gmail.com', '447d2c8dc25efbc49378', '', '', 0),
(12, 'pratik@gmail.com', '0cb2b62754dfd12b6ed0161d4b447df7', '', '', 1),
(13, 'pratik2@gmail.com', '0cb2b62754dfd12b6ed0161d4b447df7', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `UID` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `uimage` varchar(50) NOT NULL,
  `vmobile` varchar(20) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`UID`, `fname`, `lname`, `mobile`, `email`, `uimage`, `vmobile`) VALUES
(4, 'Pratik', 'Mulle', '9662500814', 'pratikmulle904@gmail.com', 'uimage/Koala.jpg', '1'),
(5, 'priyank', 'pancholi', '8153003188', 'priyank@gmail.com', 'uimage/priyank.JPG', ''),
(7, 'alpik', 'bhandari', '1234567890', 'alpik@gmail.com', '', ''),
(8, 'alpik', 'bhandari', '1234567890', 'alpik1@gmail.com', '', ''),
(9, 'priyank', 'pancholi', '1234567890', 'priyank1@gmail.com', '', ''),
(10, 'priyank', 'pancholi', '8153003188', 'priyankv.pancholi@gmail.com', '', ''),
(11, 'ankit', 'yadav', '2154875421', 'ankit@gmail.com', '', ''),
(12, 'pratik', 'mulle', '5421875498', 'pratik@gmail.com', '', ''),
(13, 'Pratik', 'Mulle', '8200250675', 'pratikmulle904@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `WID` int(5) NOT NULL,
  `UID` int(5) NOT NULL,
  `PID` int(5) NOT NULL,
  PRIMARY KEY (`WID`),
  KEY `UID` (`UID`,`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`WID`, `UID`, `PID`) VALUES
(5, 4, 4),
(9, 4, 18),
(8, 4, 19),
(1, 5, 1),
(7, 5, 3),
(6, 5, 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_master`
--
ALTER TABLE `cart_master`
  ADD CONSTRAINT `cart_master_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user_login` (`UID`);
