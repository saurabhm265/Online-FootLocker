-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2016 at 06:51 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go4shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Farhana', '94572084d092c5cdf020963f368bcd8a36125bc0'),
(2, 'Noman', 'fa47d8e02ad16e728a1fd36733ecc915987ce8ac');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Flowers'),
(2, 'Plants'),
(3, 'Gourmet'),
(4, 'Ocassion'),
(5, 'Special'),
(6, 'Sale');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `forname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `add3` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `registered` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `forname`, `surname`, `add1`, `add2`, `add3`, `postcode`, `phone`, `email`, `registered`) VALUES
(1, 'Farhana', 'Khan', '520, Dowlen Road', 'Beaumont', '', '77706', '5048649212', 'fkhan1@lamar.edu', 1),
(2, 'Siham', 'Haque', '4237, Maddox', 'Beaumont', '', '77705', '4096003426', 'shoque@lamar.edu', 1),
(3, 'A H M', 'Noman', '4237, Maddox', 'Beaumont', '', '77705', '4092039441', 'anoman@lamar.edu', 1),
(4, 'Rakiba', 'Haque', '1290, Oregon Ave', 'Beaumont', '', '77705', '8324343008', 'rsabah@lamar.edu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` int(11) NOT NULL,
  `forname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `add3` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `customer_id`, `username`, `password`) VALUES
(15, 3, 'Farhana', 'a0cb73117b45c213b60e2c80faae2e27167d6daa'),
(16, 3, 'Siham', '7b4e3c0edf6dd33156a6848945f01b89dea4e117'),
(18, 3, 'Noman', 'fa47d8e02ad16e728a1fd36733ecc915987ce8ac');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(2, 1, 1, 10),
(3, 8, 2, 1),
(4, 8, 2, 10),
(6, 10, 2, 10),
(8, 9, 1, 43),
(9, 9, 2, 41),
(10, 11, 1, 8),
(11, 12, 2, 11),
(16, 13, 2, 35),
(17, 13, 2, 13),
(18, 14, 2, 9),
(19, 15, 2, 10),
(20, 16, 1, 12),
(21, 16, 1, 16),
(22, 17, 2, 14),
(23, 18, 2, 17),
(24, 18, 2, 38),
(25, 18, 2, 15),
(28, 20, 1, 60),
(29, 20, 1, 46),
(31, 19, 1, 20),
(32, 21, 2, 11),
(33, 22, 2, 15),
(34, 22, 2, 18),
(35, 23, 1, 17),
(36, 23, 2, 13),
(37, 23, 2, 17),
(38, 24, 2, 19),
(39, 24, 2, 18),
(40, 25, 2, 1),
(41, 26, 1, 1),
(42, 26, 1, 1),
(43, 26, 1, 1),
(44, 26, 1, 1),
(45, 26, 1, 1),
(46, 26, 21, 1),
(47, 27, 1, 1),
(48, 28, 1, 1),
(49, 28, 21, 1),
(50, 28, 1, 1),
(51, 29, 1, 1),
(52, 29, 21, 1),
(53, 29, 1, 1),
(54, 29, 1, 1),
(55, 29, 21, 1),
(56, 30, 21, 1),
(57, 30, 1, 1),
(58, 31, 1, 1),
(59, 31, 21, 1),
(60, 32, 1, 1),
(61, 33, 1, 1),
(62, 34, 21, 1),
(63, 34, 1, 1),
(64, 35, 1, 1),
(65, 36, 1, 4),
(68, 38, 21, 1),
(69, 39, 23, 2),
(70, 39, 4, 1),
(71, 39, 2, 1),
(72, 40, 21, 2),
(73, 40, 4, 1),
(74, 40, 21, 2),
(75, 40, 4, 1),
(76, 40, 21, 2),
(79, 41, 2, 1),
(80, 42, 21, 2),
(81, 43, 4, 1),
(82, 44, 1, 1),
(83, 44, 21, 2),
(84, 44, 21, 1),
(85, 44, 3, 1),
(86, 44, 22, 1),
(87, 45, 1, 2),
(88, 45, 23, 1),
(89, 45, 24, 1),
(90, 46, 21, 1),
(92, 46, 1, 1),
(93, 46, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `registered` int(11) NOT NULL,
  `delivery_add_id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `session` varchar(100) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `registered`, `delivery_add_id`, `payment_type`, `date`, `status`, `session`, `total`) VALUES
(44, 16, 1, 0, 1, '2016-05-02 20:23:23', 2, '', 20.99),
(45, 15, 1, 0, 1, '2016-05-02 20:41:32', 2, '', 168),
(46, 16, 1, 0, 1, '2016-05-02 20:43:17', 2, '', 97),
(47, 0, 0, 0, 0, '2016-05-02 21:09:20', 0, 'e2m0fcpdtjubvhj5vvva5nk925', 27);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `image`, `price`) VALUES
(1, 1, 'Orchid', 'What''s more soothing than a lovely bulb garden of lavender beauties like tulips,<br>hyacinth and crocus? Remind someone special of the refreshing springtime days<br>ahead with this delightful garden in various hues of vibrant purple. They''ll love to<br>watch this pretty spring garden sprout before their eyes.\r\n', '1.jpg', 42),
(2, 1, 'Carnation', 'Send our exclusively designed, You Are My Sunshine reusable tin with magnet.<br>Its planted full of the best Jonquil bulbs available and give a living gift that will<br>keep giving. Makes a perfect gift for a mother, a youngster, or friend. Bulbs arrived<br> planted, just starting to show, and ready to bloom in 2-4 weeks. \r\n', '7.jpg', 20.99),
(3, 1, 'Rose', 'Our double-stemmed kaleidoscope phalaenopsis orchid is breathtaking to behold.<br>This variety is known for its mesmerizing creamy blooms with purple variegation.<br> Orchids are always a great gift for a woman or man who appreciates the finer things in life.\r\n', '9.jpg', 12.99),
(4, 1, 'Daffodil', 'Our deluxe peace lily is the perfect gift, even for those that do not have a green thumb.<br>This handsome plant has white sail-like flowers that stand out between the shiny,<br>ark green paddle-shaped leaves. The Spathiphyllum is a natural air<br>purifier and does well indoors even in areas with little light. \r\n\r\n', '5.jpg', 27.99),
(21, 2, 'Bonsai', 'Another member of our ''potted'' plant family, these potted Hydrangeas offer a remarkable amount<br> of color in showy balls that crown their large, broad leaves. Gift can be up to 18inch tall and arrives<br>blooming in a standard natural woven 6inch diameter basket a premium square woven basket<br>with green bow is available for an additional charge. ', '21.jpg', 25),
(22, 2, 'Cherry', 'Looking for a once-in-a-lifetime gift or surprising a loved one, just because? This Peach <br>Pinwheel Bulb Garden with its florescent tangerine colored petals looks amazing Exclusively<br> designed and potted in a scalloped pinwheel tin, it arrives with budding peony-like flowering<br>tulip bulbs that will fully bloom in 2to 3 weeks, just in time for that perfect occasion.', '22.jpg', 27),
(23, 2, 'Moneyplant', 'What is more adorable than a mini orchid? This special, miniature phalaenopsis in pinks and purples<br>is a wonderful gift for all occasions. To ensure highest quality, orchids are hand selected for<br>delivery and will be an assortment of colors. Orchid stands 12 to 15" tall. Blooms last approximately<br> 8 to 12 weeks.\r\n', '23.jpg', 30),
(24, 2, 'Daisy', 'Very popular plants, gardenias emit a delicate fragrance that captures the attention of<br> all who pass. A fine addition to any decor and a thoughtful way to say, "Thank You", our potted<br> Gardenia will not go unnoticed. Gift can be up to 12 to 14" tall and arrives ready to bloom. This plant<br> can be kept indoors in plenty of sunlight, or planted outdoors in mild climates. ', '24.jpg', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
