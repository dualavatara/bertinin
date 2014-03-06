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
  `parent_id` int(11) DEFAULT NULL,
  `ord` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
