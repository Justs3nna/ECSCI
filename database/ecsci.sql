-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2025 at 10:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecsci`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(6, 'admin', '$2y$10$5wDo0ls6ocI/DZk.5Rz.AuylNWMdcoisiub2KAjIdvbPvTbFfKkTS');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date_posted` datetime NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `date_posted`, `body`, `image`, `link`) VALUES
(6, 'ECSCI declares winners of CSG election', 'Rych B. Beluan and Maria Ioanna Naive', '2025-04-29 08:07:32', 'The Cherians voted in a new set of student government officers through remote online voting on the morning of Sept. 9. The election results were announced through a live broadcast on Facebook in the afternoon of the same day. The live feed hosted by the COMELEC chairperson, Ms. Camelle Labalan, showed the responses of the voters in the Google forms application used in the casting of votes.\r\n\r\nAlyssa Gabrielle M. Canoy, the newly-elected Cherian Student Government (CSG) president, was especially thrilled with the results.\r\n\r\n“I’d like to express my sincere gratitude to those who trusted me and the rest of the elected officers to serve the Cherian community,” said Canoy. “Even if the pandemic got in the way of what we usually do every day, this will not stop us from making this school year a productive and a fruitful one. Together, let us move forward, Cherians!”\r\n\r\nTogether with Canoy in leading the Cherians are the elected core officers, namely Audrey Zarina R. Faberes, Vice President (High-school); Xhahara D. Gomez, Vice President (Grade-school); Chelsea A. Sanchez, Secretary; Sam B. Dy, Treasurer; Althea Jozel B. Barquero, Auditor; Maria Ioanna Naïve, Public Information Officer (High-school); and Trisha Faye Arenas, Public Information Officer (Grade-school).\r\n\r\nThe elected senators are the following: Kirviel Jay Lusdoc (Gr. 10), Aicelle Pateres (Gr. 9) Lestle C. Ga (Gr. 8), and Kate L. Azura (Gr. 7).\r\n\r\nThe following grade-schoolers also won as representatives: Dillan M. Foley (Gr. 6), Aeon C. Tampil (Gr. 5), Alfonso G. Causon (Gr. 4), Lejohn Diamond M. Piencenaves (Gr. 3), and Gabby M. Abadiano (Gr. 2).\r\n\r\nExcitement rose throughout the weeks preceding Sept. 9 as Cherians participated in different election-related activities such as the presentation of candidates on Sept. 1, the room-to-room campaign on Sept. 2-4, and the Miting de Avance on Sept. 8.  Engaged in the online distance learning, the students of Enfant Cheri participated in these activities through videoconferencing via Zoom.\r\n\r\nThe declaration of winners in the CSG election was the culmination of the campaign activities. The newly-elected student government officers will be sworn into office during the induction program on Sept. 25.', 'abby.png', ''),
(7, 'Cherians celebrate Buwan ng Wika', 'Rych B. Beluan', '2025-04-29 08:08:18', '“Wikang Katutubo, Tungo sa sa Isang Bansang Filipino”, was the theme for the Buwan ng Wika Celebration 2019 held last August 30, 2019 in Enfant Cheri Study Centre, Inc. (ECSCI) Social Hall.\r\n\r\nEach grade level put up a month-long display that showcased the beautiful spots, historical places, products,  dialects, known personalities and other relevant information about an assigned region in the country. All the 17 regions were represented in the said display. This was done to promote domestic tourism among Cherians.\r\n\r\nDifferent competitions were also contested by the students during the said program. Each level participated in the following contests:  Kantahang Pinoy, Pagkukwento, Malikhaing Pagbabasa, Sabayang Pagbigkas, Pagsulat ng Sanaysay, Paggawa ng Poster-Slogan and Sayawit.\r\n\r\nThe winners in the different contests were proclaimed in the awarding ceremonies.\r\n\r\nThe said event was sponsored by the Filipino Club and the Gr. 2-Brillinace class headed by the adviser, Ms. Honney Grace N. Senabre.', 'buwan.png', ''),
(8, 'Cherians bag awards in RSPC', 'Rych B. Bluan', '2025-04-29 08:09:23', 'Biddy Jo Hansh T. Gaspar, a Grade 6 – Fortitude pupil, paved his way to the National Press Conference (NSPC) after bagging the championship in Copyreading and Headline Writing (English) in the Regional Schools Press Conference (RSPC) held on November 18-22, 2019 in Tandag City.\r\n\r\nKiara J. Briones, a Gr. 10 – Justice student, and Sam B. Dy, a Grade 9 – Integrity student, also brought home awards. Briones, together with\r\n\r\nButuan City’s radio broadcasting team in English, grabbed the 1st place in radio broadcast and script writing, 2nd place in technical application, and 3rd place in infomercial. Dy, an editorial writer in English ranked 6th in the competition.\r\n\r\nThe Cherian Scribes participated in the regional level after winning in the Division Schools Press Conference held on October 16-18, 2019 at Libertad National High School.\r\n\r\nThe wining journalists were coached by Ms. Jinky G. Resabal, Ms. Rogine Casidsid, and Mrs. Lerah E. Sendrijas, respectively.', 'awards.png', ''),
(9, 'ECSCI holds fire safety and prevention seminar', 'Elizabeth Fernandez', '2025-04-29 08:16:27', 'The Bureau of Fire Protection (BFP), headed by INSP. Particio C. Vasquez, conducted a fire safety seminar in Enfant Cheri Study Centre, Inc. on August 1, 2019. This is one of the school’s key strategies in maintaining a safe workplace and preventing fire incidents.\r\n\r\nThe assigned BFP Personnel discussed the different causes of fire and the ways of fire prevention. He further talked about the different stages of fire. He said that a fire can start in an insipient stage where there is no sign of smoke or flame. The second stage is  the smoldering stage where smoke is visible.\r\n\r\nThe last stage is the heat stage where the fire gets bigger and temperature rises to 300 degrees Celsius which can cause damage to the lungs when inhaled.\r\n\r\nThe personnel also discussed how fire can be controlled or eliminated with the use of fire extinguisher. He shared that in using a fire extinguisher, one must remember PASS.\r\n\r\nPull the pin that is placed on the lever.\r\n\r\nAim the nozzle at the base of the fire.\r\n\r\nSqueeze the lever.\r\n\r\nSweep from side to side.\r\n\r\nThe Cherians were given a chance to simulate a fire drill on  Sept. 24 and 27.\r\n\r\nOn August 23, 2019, a first-aid seminar was also conducted in school by the BFP. The participants were taught how to handle injuries in case of fire or earthquake incidents. The faculty was also trained on administering burn treatment and transferring injured people or casualties.', 'firesafety.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
