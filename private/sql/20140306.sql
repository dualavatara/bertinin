CREATE TABLE `compound_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext,
  `description` tinytext,
  `keywords` tinytext,
  `alias` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `compound_lead` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext,
  `url` tinytext,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
