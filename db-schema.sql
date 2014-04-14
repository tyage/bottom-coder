SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- テーブルの構造 `bottom_answers`
--

CREATE TABLE IF NOT EXISTS `bottom_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `language` varchar(32) NOT NULL,
  `code` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `bottom_chats`
--

CREATE TABLE IF NOT EXISTS `bottom_chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` varchar(512) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `bottom_problems`
--

CREATE TABLE IF NOT EXISTS `bottom_problems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `point` int(11) NOT NULL,
  `detail` text NOT NULL,
  `end` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `bottom_systems`
--

CREATE TABLE IF NOT EXISTS `bottom_systems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(1024) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `bottom_tests`
--

CREATE TABLE IF NOT EXISTS `bottom_tests` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `problem_id` int(16) NOT NULL,
  `input1` varchar(1024) NOT NULL,
  `input2` varchar(1024) NOT NULL,
  `input3` varchar(1024) NOT NULL,
  `input4` varchar(1024) NOT NULL,
  `input5` varchar(1024) NOT NULL,
  `answer` text NOT NULL,
  `public` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `bottom_users`
--

CREATE TABLE IF NOT EXISTS `bottom_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` enum('','admin') NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

