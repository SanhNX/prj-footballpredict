-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 50.63.226.134
-- Generation Time: Apr 14, 2013 at 03:48 AM
-- Server version: 5.0.96
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `footballpredict2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_club`
--

CREATE TABLE `tbl_club` (
  `Id` bigint(20) NOT NULL auto_increment,
  `Name` varchar(50) NOT NULL,
  `Logo` varchar(50) NOT NULL,
	`Type` bit(1) default NULL,
  `Played` bigint(20) default NULL,
  `Points` bigint(20) default NULL,
  `Won` bigint(20) default NULL,
  `Lost` bigint(20) default NULL,
`Description` varchar(500) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_club`
--

INSERT INTO `tbl_club` VALUES(4, 'CSKA', 'images/resources/team-logo/CSKA.jpg', 23, 55, 18, 4);
INSERT INTO `tbl_club` VALUES(16, 'Zenit', 'images/resources/team-logo/Zenit.jpg', 23, 47, 14, 4);
INSERT INTO `tbl_club` VALUES(3, 'Anzhi', 'images/resources/team-logo/Anzhi.jpg', 23, 43, 12, 4);
INSERT INTO `tbl_club` VALUES(12, 'Rubin', 'images/resources/team-logo/Rubin.jpg', 23, 39, 12, 8);
INSERT INTO `tbl_club` VALUES(5, 'Dinamo', 'images/resources/team-logo/Dinamo.jpg', 23, 38, 12, 9);
INSERT INTO `tbl_club` VALUES(8, 'Kuban', 'images/resources/team-logo/Kuban.jpg', 23, 38, 11, 7);
INSERT INTO `tbl_club` VALUES(14, 'Terek', 'images/resources/team-logo/Terek.jpg', 23, 34, 10, 9);
INSERT INTO `tbl_club` VALUES(13, 'Spartak', 'images/resources/team-logo/Spartak.jpg', 23, 37, 11, 8);
INSERT INTO `tbl_club` VALUES(9, 'Lokomotiv', 'images/resources/team-logo/Lokomotiv.jpg', 23, 33, 9, 8);
INSERT INTO `tbl_club` VALUES(6, 'Krasnodar', 'images/resources/team-logo/Krasnodar.jpg', 23, 35, 10, 8);
INSERT INTO `tbl_club` VALUES(11, 'Rostov', 'images/resources/team-logo/Rostov.jpg', 23, 24, 6, 11);
INSERT INTO `tbl_club` VALUES(7, 'KrylyaSovetov', 'images/resources/team-logo/KryliaSovetov.jpg', 23, 17, 4, 14);
INSERT INTO `tbl_club` VALUES(10, 'Mordovia', 'images/resources/team-logo/Mordovia.jpg', 23, 16, 4, 15);
INSERT INTO `tbl_club` VALUES(1, 'Alania', 'images/resources/team-logo/Alania.jpg', 23, 13, 2, 14);
INSERT INTO `tbl_club` VALUES(2, 'Amkar', 'images/resources/team-logo/Amkar.jpg', 23, 24, 6, 11);
INSERT INTO `tbl_club` VALUES(15, 'Volga', 'images/resources/team-logo/Volga.jpg', 23, 21, 5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clublistofleagues`
--

CREATE TABLE `tbl_clublistofleagues` (
  `Id` bigint(20) NOT NULL auto_increment,
  `TypeLeaguesId` bigint(20) NOT NULL,
  `ClubId` bigint(20) NOT NULL,
  PRIMARY KEY  (`Id`),
  KEY `TypeLeaguesId` (`TypeLeaguesId`),
  KEY `ClubId` (`ClubId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_clublistofleagues`
--

INSERT INTO `tbl_clublistofleagues` VALUES(1, 1, 1);
INSERT INTO `tbl_clublistofleagues` VALUES(2, 1, 2);
INSERT INTO `tbl_clublistofleagues` VALUES(3, 1, 3);
INSERT INTO `tbl_clublistofleagues` VALUES(4, 1, 4);
INSERT INTO `tbl_clublistofleagues` VALUES(5, 1, 5);
INSERT INTO `tbl_clublistofleagues` VALUES(6, 1, 6);
INSERT INTO `tbl_clublistofleagues` VALUES(7, 1, 7);
INSERT INTO `tbl_clublistofleagues` VALUES(8, 1, 8);
INSERT INTO `tbl_clublistofleagues` VALUES(9, 1, 9);
INSERT INTO `tbl_clublistofleagues` VALUES(10, 1, 10);
INSERT INTO `tbl_clublistofleagues` VALUES(11, 2, 11);
INSERT INTO `tbl_clublistofleagues` VALUES(12, 2, 12);
INSERT INTO `tbl_clublistofleagues` VALUES(13, 2, 13);
INSERT INTO `tbl_clublistofleagues` VALUES(14, 2, 14);
INSERT INTO `tbl_clublistofleagues` VALUES(15, 2, 15);
INSERT INTO `tbl_clublistofleagues` VALUES(16, 2, 1);
INSERT INTO `tbl_clublistofleagues` VALUES(17, 2, 2);
INSERT INTO `tbl_clublistofleagues` VALUES(18, 2, 3);
INSERT INTO `tbl_clublistofleagues` VALUES(19, 2, 4);
INSERT INTO `tbl_clublistofleagues` VALUES(20, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clublistoftable`
--

CREATE TABLE `tbl_clublistoftable` (
  `Id` bigint(20) NOT NULL auto_increment,
  `TableListOfLeaguesId` bigint(20) NOT NULL,
  `ClubId` bigint(20) NOT NULL,
  PRIMARY KEY  (`Id`,`TableListOfLeaguesId`),
  KEY `TableListOfLeaguesId` (`TableListOfLeaguesId`),
  KEY `ClubId` (`ClubId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_clublistoftable`
--

INSERT INTO `tbl_clublistoftable` VALUES(1, 1, 1);
INSERT INTO `tbl_clublistoftable` VALUES(2, 1, 2);
INSERT INTO `tbl_clublistoftable` VALUES(3, 1, 3);
INSERT INTO `tbl_clublistoftable` VALUES(4, 1, 4);
INSERT INTO `tbl_clublistoftable` VALUES(5, 1, 5);
INSERT INTO `tbl_clublistoftable` VALUES(6, 2, 11);
INSERT INTO `tbl_clublistoftable` VALUES(7, 2, 12);
INSERT INTO `tbl_clublistoftable` VALUES(8, 2, 13);
INSERT INTO `tbl_clublistoftable` VALUES(9, 2, 14);
INSERT INTO `tbl_clublistoftable` VALUES(10, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facebook`
--

CREATE TABLE `tbl_facebook` (
  `Id` bigint(20) NOT NULL auto_increment,
  `idFacebook` varchar(30) NOT NULL,
  `FullName` varchar(100) default NULL,
  `Avatar` varchar(100) default NULL,
  `FavoriteTeam` bigint(20) default NULL,
  `Scores` bigint(20) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_facebook`
--

INSERT INTO `tbl_facebook` VALUES(1, '100005637453059', 'Thanh Thanh', 'https://graph.facebook.com/100005637453059/picture', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_friend`
--

CREATE TABLE `tbl_friend` (
  `Id` bigint(20) NOT NULL auto_increment,
  `idFace1` varchar(30) NOT NULL,
  `idFace2` varchar(30) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_friend`
--

INSERT INTO `tbl_friend` VALUES(1, '100005637453059', '1475691425');
INSERT INTO `tbl_friend` VALUES(2, '100005637453059', '100001618582848');
INSERT INTO `tbl_friend` VALUES(3, '100005637453059', '100001980161277');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

CREATE TABLE `tbl_groups` (
  `Id` bigint(20) NOT NULL auto_increment,
  `ClubId` bigint(20) NOT NULL,
  `MemberId` bigint(20) default NULL,
  PRIMARY KEY  (`Id`),
  KEY `ClubId` (`ClubId`),
  KEY `MemberId` (`MemberId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_groups`
--

INSERT INTO `tbl_groups` VALUES(2, 12, 1);
INSERT INTO `tbl_groups` VALUES(3, 4, 100005637453059);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matchlist`
--

CREATE TABLE `tbl_matchlist` (
  `Id` bigint(20) NOT NULL auto_increment,
  `TypeLeaguesId` bigint(20) NOT NULL,
  `TourId` bigint(20) default NULL,
  `ClubA` bigint(20) NOT NULL,
  `ClubB` bigint(20) NOT NULL,
  `StartTime` datetime default NULL,
  `Result` varchar(10) default NULL,
  PRIMARY KEY  (`Id`),
  KEY `TypeLeaguesId` (`TypeLeaguesId`),
  KEY `ClubA` (`ClubA`),
  KEY `ClubB` (`ClubB`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `tbl_matchlist`
--

INSERT INTO `tbl_matchlist` VALUES(1, 1, 23, 2, 5, '2013-04-05 17:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(2, 1, 23, 4, 15, '2013-04-06 14:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(3, 1, 23, 11, 13, '2013-04-06 16:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(4, 1, 23, 9, 14, '2013-04-06 19:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(5, 1, 23, 16, 7, '2013-04-07 13:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(6, 1, 23, 3, 1, '2013-04-07 16:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(7, 1, 23, 8, 12, '2013-04-07 18:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(8, 1, 23, 10, 6, '2013-04-08 19:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(9, 1, 24, 5, 4, '2013-04-12 17:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(10, 1, 24, 9, 16, '2013-04-13 14:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(11, 1, 24, 6, 7, '2013-04-13 16:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(12, 1, 24, 13, 2, '2013-04-13 18:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(13, 1, 24, 14, 8, '2013-04-13 19:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(14, 1, 24, 15, 3, '2013-04-14 13:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(15, 1, 24, 12, 11, '2013-04-14 16:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(16, 1, 24, 1, 10, '2013-04-15 19:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(17, 1, 25, 2, 12, '2013-04-19 17:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(18, 1, 25, 10, 15, '2013-04-20 14:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(19, 1, 25, 7, 1, '2013-04-20 16:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(20, 1, 25, 8, 9, '2013-04-20 19:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(21, 1, 25, 16, 6, '2013-04-21 13:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(22, 1, 25, 4, 13, '2013-04-21 16:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(23, 1, 25, 3, 5, '2013-04-21 18:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(24, 1, 25, 11, 14, '2013-04-22 19:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(25, 1, 26, 15, 7, '2013-04-26 17:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(26, 1, 26, 5, 10, '2013-04-27 14:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(27, 1, 26, 14, 2, '2013-04-27 16:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(28, 1, 26, 9, 11, '2013-04-27 19:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(29, 1, 26, 8, 16, '2013-04-28 13:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(30, 1, 26, 12, 4, '2013-04-28 16:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(31, 1, 26, 13, 3, '2013-04-28 18:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(32, 1, 26, 1, 6, '2013-04-29 19:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(33, 1, 27, 10, 13, '2013-05-03 17:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(34, 1, 27, 16, 1, '2013-05-05 01:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(35, 1, 27, 4, 14, '2013-05-05 02:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(36, 1, 27, 3, 12, '2013-05-05 05:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(37, 1, 27, 7, 5, '2013-05-05 13:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(38, 1, 27, 6, 15, '2013-05-05 16:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(39, 1, 27, 2, 9, '2013-05-05 18:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(40, 1, 27, 11, 8, '2013-05-05 20:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(41, 1, 28, 12, 10, '2013-05-10 17:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(42, 1, 28, 13, 7, '2013-05-10 19:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(43, 1, 28, 5, 6, '2013-05-11 14:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(44, 1, 28, 15, 1, '2013-05-11 16:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(45, 1, 28, 8, 2, '2013-05-11 19:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(46, 1, 28, 11, 16, '2013-05-12 13:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(47, 1, 28, 9, 4, '2013-05-12 16:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(48, 1, 28, 14, 3, '2013-05-12 18:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(49, 1, 29, 2, 11, '2013-05-17 17:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(50, 1, 29, 4, 8, '2013-05-18 14:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(51, 1, 29, 10, 14, '2013-05-18 16:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(52, 1, 29, 6, 13, '2013-05-18 19:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(53, 1, 29, 16, 15, '2013-05-19 13:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(54, 1, 29, 7, 12, '2013-05-19 16:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(55, 1, 29, 1, 5, '2013-05-19 18:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(56, 1, 29, 3, 9, '2013-05-20 20:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(57, 1, 30, 2, 16, '2013-05-26 17:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(58, 1, 30, 5, 15, '2013-05-26 14:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(59, 1, 30, 13, 1, '2013-05-26 16:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(60, 1, 30, 9, 10, '2013-05-26 19:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(61, 1, 30, 11, 4, '2013-05-26 13:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(62, 1, 30, 8, 3, '2013-05-26 16:00:00', '');
INSERT INTO `tbl_matchlist` VALUES(63, 1, 30, 14, 7, '2013-05-26 18:30:00', '');
INSERT INTO `tbl_matchlist` VALUES(64, 1, 30, 12, 6, '2013-05-26 19:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_predict`
--

CREATE TABLE `tbl_predict` (
  `Id` bigint(20) NOT NULL auto_increment,
  `UserId` bigint(20) NOT NULL,
  `MatchId` bigint(20) NOT NULL,
  `predictResult` varchar(10) NOT NULL,
  PRIMARY KEY  (`Id`),
  KEY `UserId` (`UserId`),
  KEY `MatchId` (`MatchId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_predict`
--

INSERT INTO `tbl_predict` VALUES(1, 1, 3, '1-2');
INSERT INTO `tbl_predict` VALUES(2, 1, 2, '3-3');
INSERT INTO `tbl_predict` VALUES(3, 100005637453059, 1, '1-2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tablelistofleagues`
--

CREATE TABLE `tbl_tablelistofleagues` (
  `Id` bigint(20) NOT NULL auto_increment,
  `TypeLeaguesId` bigint(20) NOT NULL,
  `TableName` varchar(50) NOT NULL,
  PRIMARY KEY  (`Id`,`TypeLeaguesId`),
  KEY `TypeLeaguesId` (`TypeLeaguesId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_tablelistofleagues`
--

INSERT INTO `tbl_tablelistofleagues` VALUES(1, 2, 'A');
INSERT INTO `tbl_tablelistofleagues` VALUES(2, 2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_typeleagues`
--

CREATE TABLE `tbl_typeleagues` (
  `Id` bigint(20) NOT NULL auto_increment,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_typeleagues`
--

INSERT INTO `tbl_typeleagues` VALUES(1, 'Eredivisie');
INSERT INTO `tbl_typeleagues` VALUES(2, 'Champions League');
INSERT INTO `tbl_typeleagues` VALUES(3, 'Top League');
INSERT INTO `tbl_typeleagues` VALUES(4, 'Jupiler League');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `Id` bigint(20) NOT NULL auto_increment,
  `IdFaceBook` varchar(50) default NULL,
  `Email` varchar(50) default NULL,
  `Password` varchar(50) default NULL,
  `FullName` varchar(50) default NULL,
  `Avatar` varchar(50) default NULL,
  `DOB` datetime default NULL,
  `Gender` bit(1) default NULL,
  `FavoriteTeam` bigint(20) default NULL,
  `Scores` bigint(20) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` VALUES(1, NULL, 'justin@gmail.com', '123', 'Justin Nguyen', 'images/resources/team-logo/Alania.jpg', '1987-02-23 20:20:20', '', 1, 20);
INSERT INTO `tbl_user` VALUES(2, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 1', 'images/resources/team-logo/Amkar.jpg', '1987-03-23 20:20:20', '', 1, 120);
INSERT INTO `tbl_user` VALUES(3, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 2', 'images/resources/team-logo/Anzhi.jpg', '1987-04-23 20:20:20', '', 1, 220);
INSERT INTO `tbl_user` VALUES(4, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 3', 'images/resources/team-logo/CSKA.jpg', '1987-05-23 20:20:20', '', 1, 320);
INSERT INTO `tbl_user` VALUES(5, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 4', 'images/resources/team-logo/Dinamo.jpg', '1987-06-23 20:20:20', '', 1, 1120);
INSERT INTO `tbl_user` VALUES(6, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 5', 'images/resources/team-logo/Krasnodar.jpg', '1987-07-23 20:20:20', '', 1, 230);
INSERT INTO `tbl_user` VALUES(7, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 6', 'images/resources/team-logo/KryliaSovetov.jpg', '1987-08-23 20:20:20', '', 1, 520);
INSERT INTO `tbl_user` VALUES(8, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 7', 'images/resources/team-logo/Kuban.jpg', '1987-09-23 20:20:20', '', 1, 720);
INSERT INTO `tbl_user` VALUES(9, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 8', 'images/resources/team-logo/Lokomotiv.jpg', '1987-10-23 20:20:20', '', 1, 520);
INSERT INTO `tbl_user` VALUES(10, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 9', 'images/resources/team-logo/Mordovia.jpg', '1987-11-23 20:20:20', '', 1, 320);
INSERT INTO `tbl_user` VALUES(11, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 10', 'images/resources/team-logo/Rostov.jpg', '1987-12-23 20:20:20', '', 1, 220);
INSERT INTO `tbl_user` VALUES(12, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 11', 'images/resources/team-logo/Rubin.jpg', '1987-01-24 20:20:20', '', 1, 120);
INSERT INTO `tbl_user` VALUES(13, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 12', 'images/resources/team-logo/Spartak.jpg', '1987-02-24 20:20:20', '', 1, 120);
INSERT INTO `tbl_user` VALUES(14, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 13', 'images/resources/team-logo/Terek.jpg', '1987-03-24 20:20:20', '', 1, 520);
INSERT INTO `tbl_user` VALUES(15, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 14', 'images/resources/team-logo/Volga.jpg', '1987-04-24 20:20:20', '', 1, 920);
INSERT INTO `tbl_user` VALUES(16, NULL, 'justin@gmail.com', '123', 'Justin Nguyen 15', 'images/resources/team-logo/Zenit.jpg', '1987-05-24 20:20:20', '', 1, 820);
