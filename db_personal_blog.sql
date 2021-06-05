-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql104.epizy.com
-- Generation Time: Jun 02, 2021 at 09:16 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28471294_personal_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `imgUrl` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `title`, `author`, `content`, `imgUrl`, `date_created`) VALUES
(1, 'Don’t be afraid', 'userA', 'Sed ut iis bonis erigimur, quae expectamus, sic laetamur iis, quae recordamur. Athoc in eo M. Quid de Platone aut de Democrito loquar. Quae in controversiam veniunt, de iis, si placet, disseramus. Iam quae corporis sunt, ea nec auctoritatem cum animi part', 'https://okiro.fueko.net/content/images/size/w1200/2020/11/photo-1557800636-894a64c1696f.jpeg', '2021-05-28 02:53:34'),
(2, 'You have to fight to reach your dream', 'userB', 'Utilitatis causa amicitia est quaesita. Quae quo sunt excelsiores, eo dant clariora indicia naturae. Sed haec quidem liberius ab eo dicuntur et saepius. Et ille ridens: Video, inquit, quid agas; Tum ille timide vel potius verecunde: Facio, inquit. An hoc ', 'https://okiro.fueko.net/content/images/size/w1200/2020/11/photo-1582020738577-2e7a48043902.jpeg', '2021-05-28 02:53:34'),
(3, 'I always loved aesthetics', 'userA, userB', 'Quasi vero aut concedatur in omnibus stultis aeque magna esse vitia, et eadem inbecillitate et inconstantia L. Levatio igitur vitiorum magna fit in iis, qui habent ad virtutem progressionis aliquantum. Tertium autem omnibus aut maximis rebus iis, quae sec', 'https://okiro.fueko.net/content/images/size/w1200/2020/11/photo-1530653333484-d02d0faff9bf.jpeg', '2021-05-28 02:56:53'),
(4, 'Creating deluxe drink is like playing a sport', 'userC', 'Interiectam non vides nec laetantium nec dolentium? Non igitur bene. Reicietur etiam Carneades, nec ulla de summo bono ratio aut voluptatis non dolendive particeps aut honestatis expers probabitur. Quamquam haec quidem praeposita recte et reiecta dicere l', 'https://okiro.fueko.net/content/images/size/w1200/2020/11/photo-1590374504314-295374f053e4.jpeg', '2021-05-28 02:56:53'),
(5, 'I work best when my space is filled with inspiration', 'admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Erat ut facilisis rutrum donec tristique mauris est ac nunc. Eget nec, lorem mi libero accumsan. Expressa vero in iis aetatibus, quae iam confirmatae sunt. Tum Piso: Atqui, Cicero, inquit, ista stud', 'https://okiro.fueko.net/content/images/size/w1200/2020/11/photo-1560141343-966cb5212777.jpeg', '2021-05-28 03:05:03'),
(6, 'Anyone can hold the helm when the sea is calm', 'userC, userB', 'Audio equidem philosophi vocem, Epicure, sed quid tibi dicendum sit oblitus es. Haec et tu ita posuisti, et verba vestra sunt. Contemnit enim disserendi elegantiam, confuse loquitur. Bona autem corporis huic sunt, quod posterius posui, similiora. Quod cum', 'https://okiro.fueko.net/content/images/size/w1200/2020/11/photo-1533848052694-c716c6530f9c.jpeg', '2021-05-28 03:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `recent_dish`
--

CREATE TABLE `recent_dish` (
  `ID` int(11) NOT NULL,
  `imgUrl` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recent_dish`
--

INSERT INTO `recent_dish` (`ID`, `imgUrl`, `title`, `date_created`) VALUES
(1, 'https://okiro.fueko.net/content/images/2020/11/mae-mu-AX_VWc7ORwY-unsplash.jpg', 'Photo by Mae Mu', '2021-05-28 03:18:24'),
(2, 'https://okiro.fueko.net/content/images/size/w1600/2020/11/mae-mu-s6S8IgEN6-4-unsplash.jpg', 'Photo by Mae Mu', '2021-05-28 03:18:24'),
(3, 'https://okiro.fueko.net/content/images/size/w1600/2020/11/irene-kredenets-AWMWcR3hQUg-unsplash.jpg', 'Photo by Irene Kredenets', '2021-05-28 03:20:26'),
(4, 'https://okiro.fueko.net/content/images/size/w1600/2020/11/gabrielle-henderson-djY0xDWCEUM-unsplash.jpg', 'Photos by Gabrielle Henderson', '2021-05-28 03:20:26'),
(5, 'https://okiro.fueko.net/content/images/size/w1600/2020/11/mae-mu-Rz5o0osnN6Q-unsplash.jpg', 'Photos by Mae Mu', '2021-05-28 03:21:23'),
(6, 'https://okiro.fueko.net/content/images/size/w1600/2020/11/mae-mu-_C5zsV_p-YI-unsplash-1.jpg', 'Photos by Mae Mu', '2021-05-28 03:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@email.com', '123', 1),
(2, 'userA', 'userA@email.com', '456', 2),
(3, 'userB', 'userB@email.com', '456', 2),
(4, 'userC', 'userC@email.com', '456', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `recent_dish`
--
ALTER TABLE `recent_dish`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recent_dish`
--
ALTER TABLE `recent_dish`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
