-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2024 at 12:55 PM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wolglobal_Abhineet`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `image`, `user_id`, `date`) VALUES
(1, 'This is our first Blog', 'Correct these issues and test the form again. If problems persist, the error messages provided by PHP or the browser\'s developer console (for JavaScript-related issues) can offer more specific guidance on what\'s going wrong.', 'DALLÂ·E 2024-01-27 08.14.34 - A detailed image showcasing a variety of batteries, representing the diversity and advancement in battery technology. The image includes small AA and .png', 12345, '2024-02-09 23:14:16'),
(2, 'Test Subh Blog', 'This blog is created by shubham', 'DALLÂ·E 2024-01-27 08.12.30 - A visually captivating and advanced image of the electric sector, showcasing a state-of-the-art electric power station. The station is a masterpiece o.png', 0, '2024-02-09 23:37:45'),
(3, ' Certainly! Below is a sample dummy blog post on a generic topic. If you have a specific topic or th', 'By Alex Johnson\\r\\nIn today\\\'s rapidly evolving world, innovation is not just a buzzword but a necessity to stay ahead. From the realms of technology to the simplicity of daily living, the way we interact, work, and play is continuously transformed by new ideas and inventions. This blog post explores the crucial role of innovation in shaping our future, highlighting its impact across various sectors and the importance of fostering a culture that embraces change.\\r\\n\\r\\nThe Power of Technology\\r\\', 'DALLÂ·E 2024-01-27 08.05.50 - An enhanced, more eye-catching image combining electric vehicles (EVs) and the stock market. The scene is set in a futuristic trading floor, illuminat.png', 12345, '2024-02-10 00:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roll_number`, `name`, `email`, `password`, `date`) VALUES
(28, 'fg1321223', 'Abhineetyadav', 'abhineet123@gmail.com', '$2y$10$CoJ4sKf3oTeqxHVp14LHE.9.QeLGnpGMafivXoCKhCPbWSLLbCLYe', '2024-02-09 18:39:21'),
(29, '12345', 'kishan', 'kishan123@gmail.com', '$2y$10$cy6sy4XduvA4D72A5JshauwovOfAoqwKYdpwy43pGgZIEGSm04cRa', '2024-02-09 19:06:04'),
(30, 'Subh@123', 'Subh', 'subh12345@gmail.com', '$2y$10$60b22UreC753IFmPwN.gne9FvUk.1kFAS6Oz4c9PWBW.B1lMDokC2', '2024-02-09 23:36:14'),
(31, 'Ankit12345', 'Ankit', 'ankit123@gmail.com', '$2y$10$WOdwBLazmC3tY9A4rjBKlOC32g7S7B6ZrFakQ2PzdCsKqB5ddOGYa', '2024-02-10 00:10:09'),
(32, 'karan123', 'Kiran', 'karan123@gmail.com', '$2y$10$Ir.J3O0qpzFHtPwlRYWYPu/JzYi2k31cqAPXfyqpbzHlYEiGL8/ES', '2024-02-10 00:37:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
