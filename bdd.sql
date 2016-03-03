-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 01 Mars 2016 à 11:48
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `ticket_tac`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(31) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_tickets` int(11) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `etat_tickets`
--

CREATE TABLE IF NOT EXISTS `etat_tickets` (
  `id_etat_tickets` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_etat_tickets` varchar(255) NOT NULL,
  PRIMARY KEY (`id_etat_tickets`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `priorite`
--

CREATE TABLE IF NOT EXISTS `priorite` (
  `id_priorite` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_priorite` varchar(31) NOT NULL,
  PRIMARY KEY (`id_priorite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id_tickets` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_priorite` int(11) NOT NULL,
  `id_etat_tickets` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `deadline_tickets` date NOT NULL,
  `date_cloture_tickets` date NOT NULL,
  `date_creation_tickets` date NOT NULL,
  `titre_tickets` varchar(255) NOT NULL,
  `content_tickets` varchar(2047) NOT NULL,
  `pj_tickets` varchar(255) NOT NULL,
  `auteur_tickets` varchar(31) NOT NULL,
  `temps_passe_tickets` time NOT NULL,
  `assigne_tickets` varchar(31) NOT NULL,
  `id_type` int(11) NOT NULL,
  PRIMARY KEY (`id_tickets`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_tickets` int(11) NOT NULL,
  `nom_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_users` varchar(31) NOT NULL,
  `nom_users` varchar(31) NOT NULL,
  `prenom_users` varchar(31) NOT NULL,
  `posteoccupe_users` varchar(31) NOT NULL,
  `password_users` varchar(255) NOT NULL,
  `email_users` varchar(255) NOT NULL,
  `is_admin_users` tinyint(1) NOT NULL DEFAULT '0',
  `date_creation_users` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
