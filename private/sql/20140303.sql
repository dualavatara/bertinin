CREATE TABLE `navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext,
  `url` tinytext,
  `ord` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
