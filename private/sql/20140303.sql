CREATE TABLE `navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext,
  `url` tinytext,
  `ord` int(11) DEFAULT NULL,
  `target` varchar(45) DEFAULT NULL,
  `flags` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
