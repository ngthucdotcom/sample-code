create database import_exceldata;

CREATE TABLE IF NOT EXISTS `mytask` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
`project` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;