-- Database: `toletlagos`
--
CREATE DATABASE `toletlagos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `toletlagos`;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `ad_id` int(10) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) NOT NULL,
  `image_id` int(10) NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ads`
--


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'Self Contain'),
(2, '2 Bedroom'),
(3, '3 Bedroom'),
(4, 'Office Space'),
(5, 'Shop'),
(6, 'Hotel'),
(7, 'Duplex'),
(8, 'Property');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE IF NOT EXISTS `houses` (
  `house_id` int(10) NOT NULL AUTO_INCREMENT,
  `houseType` varchar(100) NOT NULL,
  `houseDescription` text NOT NULL,
  `price` int(20) NOT NULL,
  `totalPrice` int(20) NOT NULL,
  `houseAddress` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `location` int(10) NOT NULL,
  `category` int(10) NOT NULL,
  `priceRange` int(10) NOT NULL,
  PRIMARY KEY (`house_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `houses`
--


-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `user_id` varchar(10) DEFAULT 'ad',
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `images`
--


-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(10) NOT NULL AUTO_INCREMENT,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location`) VALUES
(1, 'Ikeja'),
(2, 'Iyana Ipaja'),
(3, 'Ojodu'),
(4, 'Akute'),
(5, 'Surulere'),
(6, 'Ikotun'),
(7, 'Egbeda'),
(8, 'Ketu'),
(9, 'Onipanu');

-- --------------------------------------------------------

--
-- Table structure for table `pricerange`
--

CREATE TABLE IF NOT EXISTS `pricerange` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `priceRange` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pricerange`
--

INSERT INTO `pricerange` (`id`, `priceRange`) VALUES
(1, '10000 - 50000'),
(2, '50001 - 100000'),
(3, '100001 - 1000000'),
(4, '1000001 and above');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(10) NOT NULL,
  `reportingUser` varchar(255) NOT NULL,
  `reportedUser` varchar(255) NOT NULL,
  `Reason` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `companyName` varchar(30) NOT NULL,
  `companyAddress` text NOT NULL,
  `phoneNumber` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verificationStatus` int(2) NOT NULL DEFAULT '0',
  `userType` int(2) NOT NULL DEFAULT '0',
  `vip` int(2) NOT NULL,
  `vipTTL` int(255) NOT NULL,
  `secretCode` varchar(255) NOT NULL,
  `emailVerificationCode` varchar(255) NOT NULL,
  `emailVerificationStatus` varchar(255) NOT NULL,
  `signUpDate` int(255) NOT NULL,
  `report` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `companyName`, `companyAddress`, `phoneNumber`, `email`, `verificationStatus`, `userType`, `vip`, `vipTTL`, `secretCode`, `emailVerificationCode`, `emailVerificationStatus`, `signUpDate`, `report`) VALUES
(0, '', '', '', '', 0, '', 0, 0, 0, 0, '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `usertype_id` int(10) NOT NULL AUTO_INCREMENT,
  `usertype` varchar(50) NOT NULL,
  PRIMARY KEY (`usertype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertype_id`, `usertype`) VALUES
(1, 'Regular'),
(2, 'Administrator');