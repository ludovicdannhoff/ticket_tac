-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 01 Mars 2016 à 16:58
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `ticket_tac`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_user` varchar(31) NOT NULL,
  `last_name_user` varchar(31) NOT NULL,
  `first_name_user` varchar(31) NOT NULL,
  `employment_user` varchar(31) NOT NULL,
  `password_user` varchar(1024) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `phone_user` varchar(15) DEFAULT NULL,
  `role_user` varchar(15) NOT NULL DEFAULT 'user',
  `date_creation_user` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `login_user`, `last_name_user`, `first_name_user`, `employment_user`, `password_user`, `email_user`, `phone_user`, `role_user`, `date_creation_user`) VALUES
(1, 'bubu01', '', '', '', 'bubu01', '', NULL, 'user', '2016-03-01 11:48:57'),
(2, 'bubu02', '', '', '', '$2y$12$37uawfITIkMizp6ghf6TT.pgOuRgeTJh3bZ1ESI6X2VTYk6Wktg26', '', '', 'user', '2016-03-01 13:22:28'),
(3, 'clark gaybeul', '', '', '', '$2y$12$mjo1eakfbSjQCDB1p7D3HeBEhKKvUNTgc7sKUkRO8Fi6Re6NLyO8K', '', '', 'user', '2016-03-01 14:23:13');
