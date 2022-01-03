-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 07:31 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beta_solution`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL,
  `role` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`, `role`, `status`) VALUES
(1, 'Admin', 'admin@mail.com', '0e7517141fb53f21ee439b355b5a1d0a', 'user-image.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image`, `status`, `added_on`) VALUES
(1, '243157096-Resene+Logo-1920w.png', 1, '2021-12-31 05:57:13'),
(2, '853954235-Ravensdown-1920w.jpg', 1, '2021-12-31 05:58:05'),
(3, '819917471-Quantifi+Photonics-1920w.png', 1, '2021-12-31 05:58:20'),
(4, '693369581-Thermoplastic-Engineering-1920w.jpg', 1, '2021-12-31 05:58:34'),
(5, '964848271-Integration-Technologies-Limited-67f512f4-1920w.png', 1, '2021-12-31 05:58:53'),
(6, '859759708-Massey-University-6a4f9db7-1920w.jpg', 1, '2021-12-31 05:59:19'),
(7, '296506415-Spidertracks-1920w.jpg', 1, '2021-12-31 05:59:39'),
(8, '775849009-PNCC-1920w.jpg', 1, '2021-12-31 05:59:48'),
(9, '741665292-BioLumic-1920w.jpg', 1, '2021-12-31 06:00:07'),
(10, '892807938-Ascot-Pumps-1920w.jpg', 1, '2021-12-31 06:00:13'),
(11, '709587342-Wellington-Univentures-1920w.jpg', 1, '2021-12-31 06:00:35'),
(12, '553643672-Levno-1920w.jpg', 1, '2021-12-31 06:00:42'),
(13, '850029080-Broken-Compass-1920w.jpg', 1, '2021-12-31 06:01:00'),
(14, '317406148-Flight-Sounds-1920w.jpg', 1, '2021-12-31 06:01:06'),
(15, '173060560-Frog-Parking-1920w.jpg', 1, '2021-12-31 06:01:22'),
(16, '447517904-Cacophony-1920w.jpg', 1, '2021-12-31 06:01:28'),
(17, '711214614-Goodnature-1920w.jpg', 1, '2021-12-31 06:01:46'),
(18, '937924565-OMEO-Technology-1920w.jpg', 1, '2021-12-31 06:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `engineering_consultancy`
--

CREATE TABLE `engineering_consultancy` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `engineering_consultancy`
--

INSERT INTO `engineering_consultancy` (`id`, `title`, `description`, `image`, `status`, `added_on`) VALUES
(1, 'Concept to Commercialisation', 'From product conceptualisation through to a ready-to-manufacture electronic product, we translate market needs into technical specs and provide researched based solutions to your problems.', '472421417_Concept-to-Commercialisation-92129363-1920w.png', 1, '2021-12-31 06:23:49'),
(2, 'Specialised and Validated Capabilities', 'With experience in private sector product development as well as Universities and Crown Research Institutes, we have the proven in-house resources required to bring your project to life.', '388522221_Specialised-and-Validated-Capabilities-1920w.png', 1, '2021-12-31 06:24:21'),
(3, 'Electronic Research and Development', 'We assist your company to achieve and maintain a competitive advantage in the marketplace by designing your product with the latest emerging technology in mind.', '343169082_Electronic-Research-and-Development-1920w.png', 1, '2021-12-31 06:24:49'),
(4, 'Rapid Product Development', 'As the development partner for your project, we know how to get your product to the market in the shortest time possible with minimal impact on your day to day business.', '923672461_Rapid-Product-Development-1920w.png', 1, '2021-12-31 06:25:25'),
(5, 'Product Development Consulting', 'Our experienced team of engineers can provide you with specialist consulting services ranging from reliability analysis to more advanced architecture development, product testing, user trials, design reviews, process consulting, architecture assessments as well as cost reduction without compromising quality.', '618722575_Product-Development-Consulting-1920w.png', 1, '2021-12-31 06:25:58'),
(6, 'Product Manufacturing', 'As part of our end to end services we offer our clients low volume in-house production as well as high volume production via our trusted network of local and international suppliers, ensuring on time delivery and quality management.', '920140152_Product-Manufacturing-1920w.png', 1, '2021-12-31 11:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `title`, `description`, `image`, `status`, `added_on`) VALUES
(1, 'Agritech', 'Agritech is the use of technology in agriculture for the purposes of improving economic, environmental or social factors.\r\n\r\nWe have designed IoT Fuel Monitoring Devices which intelligently sense and communicate the fuel volume within a storage tank. This data can be supplied to the fuel delivery companies who can (i) optimise their delivery routes and (ii) ensure the user never runs out of fuel.\r\n\r\nSmart LED lighting arrays for horticulture; electric fence monitoring systems; and health &amp; safety monitoring devices are just some of the other Agritech products we have developed for our clients.\r\n\r\nHow can AgriTech benefit your business? Get in touch with us today to find out how Beta Solutions can turn your idea into a reality.', '588976482_Agritech-1920w.png', 1, '2021-12-31 06:35:50'),
(2, 'Assistive Device', 'Assistive technology is a term that includes assistive, adaptive, and rehabilitative devices used for improving people\'s lives.\r\n\r\nBeta Solutions is committed to harnessing the benefits of the latest technology and utilising it for developing tools for the purposes of improving people&rsquo;s lives. We have developed a number of assistive devices over the years, including miniaturized motor controllers for prosthetic hands.\r\n\r\nPlease contact a member of our development team to discuss how we can help unlock technological solutions for your Assistive Device needs.', '532084441_Assistive+Devices-1920w.png', 1, '2021-12-31 06:36:22'),
(3, 'Consumer', 'Many of our clients choose to work with us because we have extensive experience developing products and working with technologies from a wide range of market segments that can apply to consumer products.\r\n\r\nFor example, we have applied our Scientific Instrumentation skills and expertise in developing a fully certified consumer smart wall-switch product. While the product uses advanced behind-the-scenes complex signal processing, from the consumers&rsquo; perspective the product seamlessly connects to their Smartphone App to effortlessly control their household lighting.\r\n\r\nWe can work with you to develop concepts, working prototypes and fully fledged consumer products that are ready for production.', '578097808_Consumer-1920w.png', 1, '2021-12-31 06:36:46'),
(4, 'Industrial', 'Products intended for Industrial applications generally demand a higher level of robustness compared to consumer grade devices.\r\n\r\nBeta Solutions has experience in developing leading electronics products including specialist Industrial Fume Cupboard Controllers. Despite the harsh operating environments - these controllers have proven to work uninterrupted for several years.\r\n\r\nWhether your requirement is for industrial hardware or firmware or both, our engineering team have the specialist know-how and experience to deliver almost any solution.', '446239639_Industrial-1920w.png', 1, '2021-12-31 06:37:12'),
(5, 'Instrumentation', 'Scientific Instrumentation is required to help people better understand the world we live in. As technology continues to rapidly advance, Scientific Instrumentation is becoming smaller, cheaper and more powerful - enabling/empowering users to unlock possibilities that were otherwise impossible in the past.\r\n\r\nWe have developed a High Speed Digital Transceiver for Nuclear Magnetic Resonance applications - which harnesses the power of advanced FPGA technology and signal-processing techniques.\r\n\r\nBeta Solutions has the experience and is passionate about developing Instrumentation with the latest up-to-date technology in mind - thereby giving our customer&rsquo;s products a competitive edge.', '172762360_Instrumentation-1920w.png', 1, '2021-12-31 06:37:44'),
(6, 'IoT', 'Due to an increasing demand for an &ldquo;interconnected world&rdquo;, by the year 2030 it is predicted that 130,000,000,000 devices will be connected to the internet. This is often referred to as the &ldquo;Internet of Things&rdquo; or IoT.\r\n\r\nOur team of developers have developed many IoT based products including GPS tracking systems where the device&rsquo;s location can be determined and then communicated back to the internet via LoRa (LP-WAN) based wireless technology. This technology has been used to improve asset management.\r\n\r\nWe would love to talk to you about your IoT product idea and how we can help.', '760843791_IoT-1920w.png', 1, '2021-12-31 06:38:10'),
(7, 'Transport', 'Innovative technology continues to be of tremendous value to transportation businesses - including saving time, money, and the environment while often simultaneously improving safety.\r\n\r\nWe have developed a wide range of electronic products for the transport sector including Aviation Tracking systems. The device receives the aircraft&rsquo;s GPS location coordinates, processes the information and then transmits the data back to land via the Iridium Satellite network.\r\n\r\nIf you have a product idea that relates to the Transportation industry, do get in touch with Beta Solutions. We&rsquo;d love to share with you how we can help.', '193260390_Transport-1920w.png', 1, '2021-12-31 06:38:38'),
(8, 'Research', 'Research is at the heart of innovation and innovation is at the heart of progress.\r\n\r\nSince the company&rsquo;s inception, Beta Solutions has been involved with Research oriented projects. We regularly undertake Feasibility Studies and Proof-of-concept Prototypes to help our clients efficiently and effectively assess new product ideas. As a result of our Research and Development, several of our clients have gone on to successfully patent the novel technology which has been designed.\r\n\r\nIf you have a novel product idea involving electronics but don&rsquo;t know where to start, talk to our experienced team who will be happy to help.', '266936740_Research-1920w.png', 1, '2021-12-31 06:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `image`, `tag`, `status`, `added_on`) VALUES
(1, 'Smart Paint Switch', '517568899_Smart+Paint+Switch-1920w.jpg', 'Case Study', 1, '2021-12-31 07:09:01'),
(2, 'Aviation Audio USB Adapter', '393419873_Aviation+Audio+USB+Adapter-1920w.jpg', 'Case Study', 1, '2021-12-31 07:09:25'),
(3, 'UV Lighting Control System', '832479260_UV+Lighting+Control+System-1920w.jpg', 'Case Study', 1, '2021-12-31 07:09:46'),
(4, 'Fume Cupboard Industrial Controllers', '390190496_Fume+Cupboard+Industrial+Controllers-1920w.jpg', 'Case Study', 1, '2021-12-31 07:10:18'),
(5, 'Low Noise USB Audio Device', '361940206_Low+Noise+USB+Audio+Device-1920w.jpg', 'Case Study', 1, '2021-12-31 07:10:42'),
(6, 'Smartphone Electric Fence Detector', '231490802_Smartphone+Electric+Fence+Detector-1920w.jpg', 'Case Study', 1, '2021-12-31 07:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `title`, `rating`, `duration`, `description`, `status`, `added_on`) VALUES
(1, 'Pete Nelis', 5, '1 year ago', 'I had a circuit board that needed a 676 ball FPGA chip replaced. After some cost analysis, swapping the chip out was considerably cheaper than buying a new board. So I...', 1, '2021-12-31 08:22:02'),
(2, 'Ian Barker', 5, '1 year ago', 'This team will tell you what you can do rather than what you cant. With the right expertise and equipment to get the right results. Competitively priced and able to deliver...', 1, '2021-12-31 08:22:51'),
(3, 'Jonathan Higgs', 5, '1 year ago', 'A massive thanks to Terry and the team at Beta who were able to resurrect an old device of mine I did not want to get rid of. I reached out...', 1, '2021-12-31 08:23:56'),
(4, 'Benoit Guieysse', 5, '1 year ago', 'I need some urgent help and Beta Solutions Team was very responsive, helpful, and delivered in a very short time. Thanks again.', 1, '2021-12-31 08:24:47'),
(5, 'Mike Redman', 5, '2 year ago', 'We have worked with Beta Solutions for some years now. They have been responsible for the electronic firmware development of the Omeo. It has been a challenging task but they...', 1, '2021-12-31 08:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `image`, `status`, `added_on`) VALUES
(1, '836055540-Terry-Southern-1f5f3a6c-1920w.jpeg', 1, '2021-12-31 08:31:20'),
(2, '581624570-Matt_1_SquareLow+Res-1920w.JPG', 1, '2021-12-31 08:31:26'),
(3, '973039409-Jason_1_SquareLow+Res-1920w.JPG', 1, '2021-12-31 08:31:31'),
(4, '247443516-Aaron-Fulton-5d5226d6-1920w.jpeg', 1, '2021-12-31 08:31:36'),
(5, '653761704-Jonathan-Kapene-2364f19b-1920w.jpeg', 1, '2021-12-31 08:32:25'),
(6, '976818221-Nathan_2_SquareLow+Res-1920w.JPG', 1, '2021-12-31 08:32:35'),
(7, '417682057-Morten_SquareLow+Res-1920w.JPG', 1, '2021-12-31 08:32:46'),
(8, '424128272-Daniel_SquareLow+Res-1920w.JPG', 1, '2021-12-31 08:32:55'),
(9, '930613932-Kim+Best+260x260-626ff8b9-1920w.jpg', 1, '2021-12-31 08:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pr` varchar(255) NOT NULL,
  `ct` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `hear_about_us` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engineering_consultancy`
--
ALTER TABLE `engineering_consultancy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `engineering_consultancy`
--
ALTER TABLE `engineering_consultancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
