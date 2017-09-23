DROP TABLE IF EXISTS `weather`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weather` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(45) NOT NULL,
  `last_update` datetime DEFAULT NULL,
  `day0_weekday_short` varchar(45) DEFAULT NULL,
  `day0_icon_url` varchar(45) DEFAULT NULL,
  `day0_high` tinyint(3) DEFAULT NULL,
  `day0_low` tinyint(2) DEFAULT NULL,
  `day1_weekday_short` varchar(45) DEFAULT NULL,
  `day1_icon_url` varchar(45) DEFAULT NULL,
  `day1_high` tinyint(3) DEFAULT NULL,
  `day1_low` tinyint(2) DEFAULT NULL,
  `day2_weekday_short` varchar(45) DEFAULT NULL,
  `day2_icon_url` varchar(45) DEFAULT NULL,
  `day2_high` tinyint(3) DEFAULT NULL,
  `day2_low` tinyint(2) DEFAULT NULL,
  `day3_weekday_short` varchar(45) DEFAULT NULL,
  `day3_icon_url` varchar(45) DEFAULT NULL,
  `day3_high` tinyint(3) DEFAULT NULL,
  `day3_low` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='cache data for weather conditions and forecast';
