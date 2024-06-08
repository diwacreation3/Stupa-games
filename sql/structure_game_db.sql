-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 01:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gamedetail`
--

CREATE TABLE `gamedetail` (
  `game_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `game_desc` longtext NOT NULL,
  `platform` varchar(255) NOT NULL,
  `uploaded_on` date NOT NULL DEFAULT current_timestamp(),
  `username` varchar(255) NOT NULL,
  `downloads` int(11) NOT NULL,
  `binary_name` varchar(255) NOT NULL,
  `binary_path` varchar(255) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gamedetail`
--

INSERT INTO `gamedetail` (`game_id`, `game_name`, `game_desc`, `platform`, `uploaded_on`, `username`, `downloads`, `binary_name`, `binary_path`, `banner_name`, `banner_path`) VALUES
(43, 'hollow knight', 'fantasy game', 'windows', '2024-06-06', 'diwakar_phuyal123', 0, '', '', 'blender-art3.png', '../Data/diwakar_phuyal123/img/blender-art3.png'),
(46, 'temple run', 'endless runner', 'android', '2024-06-06', 'diwakar_phuyal123', 8, 'app-debug.apk', '../Data/diwakar_phuyal123/binary/app-debug.apk', 'sergei-a--heLWtuAN3c-unsplash.jpg', '../Data/diwakar_phuyal123/img/sergei-a--heLWtuAN3c-unsplash.jpg'),
(53, 'free fire', 'again shitty game with some changes', 'android', '2024-06-08', 'diwacreation3', 0, 'VisualStudioSetup.exe', '../Data/diwacreation3/binary/VisualStudioSetup.exe', 'img.jpg', '../Data/diwacreation3/img/img.jpg'),
(54, 'free fire', 'again same shitty game with js enabled', 'android', '2024-06-08', 'diwacreation3', 0, 'WOMicClientSetup5_2.exe', '../Data/diwacreation3/binary/WOMicClientSetup5_2.exe', 'forest.jpg', '../Data/diwacreation3/img/forest.jpg'),
(55, 'firee fire', 'again same shitty game with some changes on code', 'android', '2024-06-08', 'diwacreation3', 0, 'AnyDesk.exe', '../Data/diwacreation3/binary/AnyDesk.exe', 'different-perspective1.png', '../Data/diwacreation3/img/different-perspective1.png'),
(56, 'free fire', 'again shitty game with some changes in js', 'android', '2024-06-08', 'diwacreation3', 1, 'VisualStudioSetup.exe', '../Data/diwacreation3/binary/VisualStudioSetup.exe', 'oksana-taran-G9yIh7uKEoU-unsplash.jpg', '../Data/diwacreation3/img/oksana-taran-G9yIh7uKEoU-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_on`) VALUES
(1, 'diwakarcreation@gmail.com', 'diwacreation3', '$2y$10$LYsLLmpveJ43fVKvNNWIBugJWJFF6hSsSoZM9NAf2.VXcbl1iZaIy', '2024-06-03 23:17:36'),
(2, 'samariweather@gmail.com', 'diwakar_phuyal123', '$2y$10$Qy3BN1t0G5b4Tza5B1FemO3dFt3AX3/jUB0IQW4K5j6VN467Qq5bW', '2024-06-04 16:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `what`
--

CREATE TABLE `what` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gamedetail`
--
ALTER TABLE `gamedetail`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `what`
--
ALTER TABLE `what`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gamedetail`
--
ALTER TABLE `gamedetail`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `what`
--
ALTER TABLE `what`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
