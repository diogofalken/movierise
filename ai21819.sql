-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2019 at 05:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ai21819`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_movies`
--

CREATE TABLE `t_movies` (
  `id` varchar(12) NOT NULL,
  `nome` text,
  `descricao` text NOT NULL,
  `poster` varchar(2000) DEFAULT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_movies`
--

INSERT INTO `t_movies` (`id`, `nome`, `descricao`, `poster`, `data`, `type`) VALUES
('tt0167260', 'The Lord of the Rings: The Return of the King', 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.', 'https://m.media-amazon.com/images/M/MV5BNzA5ZDNlZWMtM2NhNS00NDJjLTk4NDItYTRmY2EwMWZlMTY3XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg', '2019-04-05 00:00:00', 'movie'),
('tt0167261', 'The Lord of the Rings: The Two Towers', 'While Frodo and Sam edge closer to Mordor with the help of the shifty Gollum, the divided fellowship makes a stand against Sauron\'s new ally, Saruman, and his hordes of Isengard.', 'https://m.media-amazon.com/images/M/MV5BNGE5MzIyNTAtNWFlMC00NDA2LWJiMjItMjc4Yjg1OWM5NzhhXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg', '2019-04-05 00:00:00', 'movie'),
('tt0468569', 'The Dark Knight', 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SX300.jpg', '2019-04-05 00:00:00', 'movie'),
('tt1596343', 'Fast Five', 'Dominic Toretto and his crew of street racers plan a massive heist to buy their freedom while in the sights of a powerful Brazilian drug lord and a dangerous federal agent.', 'https://m.media-amazon.com/images/M/MV5BMTUxNTk5MTE0OF5BMl5BanBnXkFtZTcwMjA2NzY3NA@@._V1_SX300.jpg', '2019-04-05 00:00:00', 'movie'),
('tt3296884', 'Tonari no Seki-kun: The Master of Killing Time', 'In the middle of class at a certain school, a diligent student, has her in-class life turned upside-down when her next-door desk mate \"Seki\" creates intricate activities to play at his desk during class.', 'https://m.media-amazon.com/images/M/MV5BOTgxYzUxODQtMzczMC00ZjIzLTg1NWMtOTYzZjJiYzMwZGQ1XkEyXkFqcGdeQXVyMjI5MjU5OTI@._V1_SX300.jpg', '2019-04-05 00:00:00', 'series');

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `nome` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `atualizacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`nome`, `email`, `password`, `data`, `atualizacao`) VALUES
('Breno', 'breno@breno.com', '4b4070bf857ce36407f2d14f016d8279', '2019-03-21 11:21:19', 'Alterar password'),
('Cepo', 'cepo@cepo.com', '202cb962ac59075b964b07152d234b70', '2019-04-03 23:00:00', 'Novo utilizador'),
('Jose', 'jose@jose.com', '662eaa47199461d01a623884080934ab', '2019-03-21 11:50:10', 'Novo utilizador'),
('root', 'root@root.com', '63a9f0ea7bb98050796b649e85481845', '2019-03-21 11:24:07', 'Alterar password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_movies`
--
ALTER TABLE `t_movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
