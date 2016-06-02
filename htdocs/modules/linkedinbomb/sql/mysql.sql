CREATE TABLE `lib_addresses` (
  `address_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0', 
  `street1` varchar(128) DEFAULT NULL,
  `street2` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `postal-code` varchar(20) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_aspr` (
  `aspr_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `request_person_id` bigint(14) unsigned DEFAULT '0',
  `request_profile_id` bigint(14) unsigned DEFAULT '0',
  `url` varchar(500) DEFAULT NULL,
  `http_headers_ids` mediumtext,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`aspr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_aspr_http_headers` (
  `http_headers_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `aspr_id` bigint(14) unsigned DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `value` varchar(64) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`http_headers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_authorities` (
  `authority_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `id` varchar(32) DEFAULT NULL,
  `name` varchar(198) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`authority_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_causes` (
  `cause_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `id` varchar(32) DEFAULT NULL,
  `name` varchar(198) DEFAULT NULL,
  `profile_ids` mediumtext,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`cause_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_companies` (
  `company_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `id` varchar(32) DEFAULT NULL,
  `universal-name` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `ticker` varchar(10) DEFAULT NULL,
  `logo-url` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `company-type_id` bigint(14) DEFAULT NULL,
  `industry` varchar(128) DEFAULT NULL,
  `size` varchar(128) DEFAULT NULL,
  `specialties_ids` mediumtext,
  `blog-rss-url` varchar(500) DEFAULT NULL,
  `twitter-id` varchar(64) DEFAULT NULL,
  `square-logo-url` varchar(500) DEFAULT NULL,
  `location_ids` mediumtext,
  `founded-year` varchar(4) DEFAULT NULL,
  `email-domain_ids` mediumtext,
  `website-url` varchar(500) DEFAULT NULL,
  `status_id` bigint(14) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_companies_type` (
  `company-type_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(4) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`company-type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_connections` (
  `connections_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `request_profile_id` bigint(14) unsigned DEFAULT '0',
  `request_person_id` bigint(14) unsigned DEFAULT '0',
  `connection_profile_id` bigint(14) unsigned DEFAULT '0',
  `connection_person_id` bigint(14) unsigned DEFAULT '0',
  `connection_aspr_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `aspr_id` bigint(14) unsigned DEFAULT '0',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`connections_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_contact_info` (
  `contact-info_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(32) DEFAULT NULL,
  `value` varchar(128) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`contact-info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_countries` (
  `country_id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(6) DEFAULT NULL,
  `name` varchar(198) NOT NULL,
  `year` year(4) DEFAULT '1978',
  `tld` varchar(6) NOT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8;

insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (1,'AD','Andorra',1974,'.ad',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (2,'AE','United Arab Emirates',1974,'.ae',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (3,'AF','Afghanistan',1974,'.af',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (4,'AG','Antigua and Barbuda',1974,'.ag',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (5,'AI','Anguilla',1983,'.ai',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (6,'AL','Albania',1974,'.al',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (7,'AM','Armenia',1992,'.am',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (8,'AO','Angola',1974,'.ao',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (9,'AQ','Antarctica',1974,'.aq',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (10,'AR','Argentina',1974,'.ar',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (11,'AS','American Samoa',1974,'.as',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (12,'AT','Austria',1974,'.at',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (13,'AU','Australia',1974,'.au',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (14,'AW','Aruba',1986,'.aw',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (15,'AX','Åland Islands',2004,'.ax',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (16,'AZ','Azerbaijan',1992,'.az',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (17,'BA','Bosnia and Herzegovina',1992,'.ba',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (18,'BB','Barbados',1974,'.bb',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (19,'BD','Bangladesh',1974,'.bd',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (20,'BE','Belgium',1974,'.be',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (21,'BF','Burkina Faso',1984,'.bf',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (22,'BG','Bulgaria',1974,'.bg',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (23,'BH','Bahrain',1974,'.bh',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (24,'BI','Burundi',1974,'.bi',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (25,'BJ','Benin',1977,'.bj',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (26,'BL','Saint Barthélemy',2007,'.bl',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (27,'BM','Bermuda',1974,'.bm',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (28,'BN','Brunei Darussalam',1974,'.bn',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (29,'BO','Bolivia, Plurinational State of',1974,'.bo',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (30,'BQ','Bonaire, Sint Eustatius and Saba',2010,'.bq',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (31,'BR','Brazil',1974,'.br',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (32,'BS','Bahamas',1974,'.bs',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (33,'BT','Bhutan',1974,'.bt',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (34,'BV','Bouvet Island',1974,'.bv',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (35,'BW','Botswana',1974,'.bw',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (36,'BY','Belarus',1974,'.by',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (37,'BZ','Belize',1974,'.bz',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (38,'CA','Canada',1974,'.ca',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (39,'CC','Cocos (Keeling) Islands',1974,'.cc',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (40,'CD','Congo, the Democratic Republic of the',1997,'.cd',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (41,'CF','Central African Republic',1974,'.cf',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (42,'CG','Congo',1974,'.cg',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (43,'CH','Switzerland',1974,'.ch',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (44,'CI','Côte d\'Ivoire',1974,'.ci',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (45,'CK','Cook Islands',1974,'.ck',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (46,'CL','Chile',1974,'.cl',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (47,'CM','Cameroon',1974,'.cm',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (48,'CN','China',1974,'.cn',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (49,'CO','Colombia',1974,'.co',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (50,'CR','Costa Rica',1974,'.cr',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (51,'CU','Cuba',1974,'.cu',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (52,'CV','Cape Verde',1974,'.cv',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (53,'CW','Curaçao',2010,'.cw',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (54,'CX','Christmas Island',1974,'.cx',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (55,'CY','Cyprus',1974,'.cy',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (56,'CZ','Czech Republic',1993,'.cz',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (57,'DE','Germany',1974,'.de',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (58,'DJ','Djibouti',1977,'.dj',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (59,'DK','Denmark',1974,'.dk',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (60,'DM','Dominica',1974,'.dm',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (61,'DO','Dominican Republic',1974,'.do',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (62,'DZ','Algeria',1974,'.dz',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (63,'EC','Ecuador',1974,'.ec',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (64,'EE','Estonia',1992,'.ee',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (65,'EG','Egypt',1974,'.eg',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (66,'EH','Western Sahara',1974,'.eh',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (67,'ER','Eritrea',1993,'.er',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (68,'ES','Spain',1974,'.es',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (69,'ET','Ethiopia',1974,'.et',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (70,'FI','Finland',1974,'.fi',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (71,'FJ','Fiji',1974,'.fj',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (72,'FK','Falkland Islands (Malvinas)',1974,'.fk',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (73,'FM','Micronesia, Federated States of',1986,'.fm',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (74,'FO','Faroe Islands',1974,'.fo',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (75,'FR','France',1974,'.fr',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (76,'GA','Gabon',1974,'.ga',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (77,'GB','United Kingdom',1974,'.uk',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (78,'GD','Grenada',1974,'.gd',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (79,'GE','Georgia',1992,'.ge',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (80,'GF','French Guiana',1974,'.gf',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (81,'GG','Guernsey',2006,'.gg',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (82,'GH','Ghana',1974,'.gh',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (83,'GI','Gibraltar',1974,'.gi',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (84,'GL','Greenland',1974,'.gl',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (85,'GM','Gambia',1974,'.gm',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (86,'GN','Guinea',1974,'.gn',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (87,'GP','Guadeloupe',1974,'.gp',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (88,'GQ','Equatorial Guinea',1974,'.gq',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (89,'GR','Greece',1974,'.gr',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (90,'GS','South Georgia and the South Sandwich Islands',1993,'.gs',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (91,'GT','Guatemala',1974,'.gt',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (92,'GU','Guam',1974,'.gu',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (93,'GW','Guinea-Bissau',1974,'.gw',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (94,'GY','Guyana',1974,'.gy',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (95,'HK','Hong Kong',1974,'.hk',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (96,'HM','Heard Island and McDonald Islands',1974,'.hm',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (97,'HN','Honduras',1974,'.hn',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (98,'HR','Croatia',1992,'.hr',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (99,'HT','Haiti',1974,'.ht',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (100,'HU','Hungary',1974,'.hu',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (101,'ID','Indonesia',1974,'.id',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (102,'IE','Ireland',1974,'.ie',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (103,'IL','Israel',1974,'.il',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (104,'IM','Isle of Man',2006,'.im',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (105,'IN','India',1974,'.in',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (106,'IO','British Indian Ocean Territory',1974,'.io',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (107,'IQ','Iraq',1974,'.iq',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (108,'IR','Iran, Islamic Republic of',1974,'.ir',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (109,'IS','Iceland',1974,'.is',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (110,'IT','Italy',1974,'.it',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (111,'JE','Jersey',2006,'.je',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (112,'JM','Jamaica',1974,'.jm',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (113,'JO','Jordan',1974,'.jo',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (114,'JP','Japan',1974,'.jp',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (115,'KE','Kenya',1974,'.ke',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (116,'KG','Kyrgyzstan',1992,'.kg',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (117,'KH','Cambodia',1974,'.kh',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (118,'KI','Kiribati',1979,'.ki',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (119,'KM','Comoros',1974,'.km',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (120,'KN','Saint Kitts and Nevis',1974,'.kn',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (121,'KP','Korea, Democratic People\'s Republic of',1974,'.kp',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (122,'KR','Korea, Republic of',1974,'.kr',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (123,'KW','Kuwait',1974,'.kw',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (124,'KY','Cayman Islands',1974,'.ky',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (125,'KZ','Kazakhstan',1992,'.kz',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (126,'LA','Lao People\'s Democratic Republic',1974,'.la',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (127,'LB','Lebanon',1974,'.lb',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (128,'LC','Saint Lucia',1974,'.lc',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (129,'LI','Liechtenstein',1974,'.li',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (130,'LK','Sri Lanka',1974,'.lk',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (131,'LR','Liberia',1974,'.lr',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (132,'LS','Lesotho',1974,'.ls',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (133,'LT','Lithuania',1992,'.lt',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (134,'LU','Luxembourg',1974,'.lu',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (135,'LV','Latvia',1992,'.lv',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (136,'LY','Libya',1974,'.ly',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (137,'MA','Morocco',1974,'.ma',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (138,'MC','Monaco',1974,'.mc',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (139,'MD','Moldova, Republic of',1992,'.md',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (140,'ME','Montenegro',2006,'.me',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (141,'MF','Saint Martin (French part)',2007,'.mf',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (142,'MG','Madagascar',1974,'.mg',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (143,'MH','Marshall Islands',1986,'.mh',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (144,'MK','Macedonia, the former Yugoslav Republic of',1993,'.mk',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (145,'ML','Mali',1974,'.ml',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (146,'MM','Myanmar',1989,'.mm',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (147,'MN','Mongolia',1974,'.mn',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (148,'MO','Macao',1974,'.mo',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (149,'MP','Northern Mariana Islands',1986,'.mp',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (150,'MQ','Martinique',1974,'.mq',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (151,'MR','Mauritania',1974,'.mr',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (152,'MS','Montserrat',1974,'.ms',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (153,'MT','Malta',1974,'.mt',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (154,'MU','Mauritius',1974,'.mu',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (155,'MV','Maldives',1974,'.mv',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (156,'MW','Malawi',1974,'.mw',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (157,'MX','Mexico',1974,'.mx',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (158,'MY','Malaysia',1974,'.my',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (159,'MZ','Mozambique',1974,'.mz',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (160,'NA','Namibia',1974,'.na',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (161,'NC','New Caledonia',1974,'.nc',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (162,'NE','Niger',1974,'.ne',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (163,'NF','Norfolk Island',1974,'.nf',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (164,'NG','Nigeria',1974,'.ng',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (165,'NI','Nicaragua',1974,'.ni',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (166,'NL','Netherlands',1974,'.nl',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (167,'NO','Norway',1974,'.no',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (168,'NP','Nepal',1974,'.np',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (169,'NR','Nauru',1974,'.nr',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (170,'NU','Niue',1974,'.nu',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (171,'NZ','New Zealand',1974,'.nz',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (172,'OM','Oman',1974,'.om',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (173,'PA','Panama',1974,'.pa',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (174,'PE','Peru',1974,'.pe',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (175,'PF','French Polynesia',1974,'.pf',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (176,'PG','Papua New Guinea',1974,'.pg',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (177,'PH','Philippines',1974,'.ph',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (178,'PK','Pakistan',1974,'.pk',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (179,'PL','Poland',1974,'.pl',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (180,'PM','Saint Pierre and Miquelon',1974,'.pm',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (181,'PN','Pitcairn',1974,'.pn',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (182,'PR','Puerto Rico',1974,'.pr',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (183,'PS','Palestinian Territory, Occupied',1999,'.ps',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (184,'PT','Portugal',1974,'.pt',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (185,'PW','Palau',1986,'.pw',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (186,'PY','Paraguay',1974,'.py',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (187,'QA','Qatar',1974,'.qa',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (188,'RE','Réunion',1974,'.re',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (189,'RO','Romania',1974,'.ro',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (190,'RS','Serbia',2006,'.rs',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (191,'RU','Russian Federation',1992,'.ru',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (192,'RW','Rwanda',1974,'.rw',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (193,'SA','Saudi Arabia',1974,'.sa',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (194,'SB','Solomon Islands',1974,'.sb',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (195,'SC','Seychelles',1974,'.sc',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (196,'SD','Sudan',1974,'.sd',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (197,'SE','Sweden',1974,'.se',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (198,'SG','Singapore',1974,'.sg',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (199,'SH','Saint Helena, Ascension and Tristan da Cunha',1974,'.sh',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (200,'SI','Slovenia',1992,'.si',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (201,'SJ','Svalbard and Jan Mayen',1974,'.sj',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (202,'SK','Slovakia',1993,'.sk',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (203,'SL','Sierra Leone',1974,'.sl',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (204,'SM','San Marino',1974,'.sm',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (205,'SN','Senegal',1974,'.sn',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (206,'SO','Somalia',1974,'.so',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (207,'SR','Suriname',1974,'.sr',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (208,'SS','South Sudan',2011,'.ss',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (209,'ST','Sao Tome and Principe',1974,'.st',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (210,'SV','El Salvador',1974,'.sv',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (211,'SX','Sint Maarten (Dutch part)',2010,'.sx',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (212,'SY','Syrian Arab Republic',1974,'.sy',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (213,'SZ','Swaziland',1974,'.sz',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (214,'TC','Turks and Caicos Islands',1974,'.tc',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (215,'TD','Chad',1974,'.td',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (216,'TF','French Southern Territories',1979,'.tf',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (217,'TG','Togo',1974,'.tg',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (218,'TH','Thailand',1974,'.th',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (219,'TJ','Tajikistan',1992,'.tj',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (220,'TK','Tokelau',1974,'.tk',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (221,'TL','Timor-Leste',2002,'.tl',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (222,'TM','Turkmenistan',1992,'.tm',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (223,'TN','Tunisia',1974,'.tn',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (224,'TO','Tonga',1974,'.to',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (225,'TR','Turkey',1974,'.tr',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (226,'TT','Trinidad and Tobago',1974,'.tt',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (227,'TV','Tuvalu',1979,'.tv',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (228,'TW','Taiwan, Province of China',1974,'.tw',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (229,'TZ','Tanzania, United Republic of',1974,'.tz',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (230,'UA','Ukraine',1974,'.ua',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (231,'Code a','',0000,'',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (232,'UG','Uganda',1974,'.ug',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (233,'UM','United States Minor Outlying Islands',1986,'.um',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (234,'US','United States',1974,'.us',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (235,'UY','Uruguay',1974,'.uy',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (236,'UZ','Uzbekistan',1992,'.uz',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (237,'VA','Holy See (Vatican City State)',1974,'.va',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (238,'VC','Saint Vincent and the Grenadines',1974,'.vc',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (239,'VE','Venezuela, Bolivarian Republic of',1974,'.ve',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (240,'VG','Virgin Islands, British',1974,'.vg',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (241,'VI','Virgin Islands, U.S.',1974,'.vi',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (242,'VN','Viet Nam',1974,'.vn',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (243,'VU','Vanuatu',1980,'.vu',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (244,'WF','Wallis and Futuna',1974,'.wf',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (245,'WS','Samoa',1974,'.ws',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (246,'YE','Yemen',1974,'.ye',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (247,'YT','Mayotte',1993,'.yt',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (248,'ZA','South Africa',1974,'.za',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (249,'ZM','Zambia',1974,'.zm',UNIX_TIMESTAMP(),0);
insert  into `lib_countries` (`country_id`,`code`,`name`,`year`,`tld`,`created`,`updated`) values (250,'ZW','Zimbabwe',1980,'.zw',UNIX_TIMESTAMP(),0);

CREATE TABLE `lib_following_companies` (
  `cf_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `company_id` bigint(14) unsigned DEFAULT '0',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`cf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_industry` (
  `industry_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(5) unsigned DEFAULT '0',
  `group` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` int(12) unsigned DEFAULT '0',
  `updated` int(12) unsigned DEFAULT '0',
  PRIMARY KEY (`industry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=latin1;

insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (1,47,'corp fin','Accounting',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (2,94,'man tech tran','Airlines/Aviation',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (3,120,'leg org','Alternative Dispute Resolution',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (4,125,'hlth','Alternative Medicine',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (5,127,'art med','Animation',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (6,19,'good','Apparel & Fashion',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (7,50,'cons','Architecture & Planning',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (8,111,'art med rec','Arts and Crafts',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (9,53,'man','Automotive',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (10,52,'gov man','Aviation & Aerospace',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (11,41,'fin','Banking',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (12,12,'gov hlth tech','Biotechnology',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (13,36,'med rec','Broadcast Media',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (14,49,'cons','Building Materials',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (15,138,'corp man','Business Supplies and Equipment',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (16,129,'fin','Capital Markets',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (17,54,'man','Chemicals',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (18,90,'org serv','Civic & Social Organization',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (19,51,'cons gov','Civil Engineering',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (20,128,'cons corp fin','Commercial Real Estate',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (21,118,'tech','Computer & Network Security',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (22,109,'med rec','Computer Games',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (23,3,'tech','Computer Hardware',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (24,5,'tech','Computer Networking',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (25,4,'tech','Computer Software',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (26,48,'cons','Construction',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (27,24,'good man','Consumer Electronics',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (28,25,'good man','Consumer Goods',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (29,91,'org serv','Consumer Services',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (30,18,'good','Cosmetics',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (31,65,'agr','Dairy',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (32,1,'gov tech','Defense & Space',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (33,99,'art med','Design',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (34,69,'edu','Education Management',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (35,132,'edu org','E-Learning',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (36,112,'good man','Electrical/Electronic Manufacturing',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (37,28,'med rec','Entertainment',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (38,86,'org serv','Environmental Services',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (39,110,'corp rec serv','Events Services',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (40,76,'gov','Executive Office',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (41,122,'corp serv','Facilities Services',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (42,63,'agr','Farming',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (43,43,'fin','Financial Services',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (44,38,'art med rec','Fine Art',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (45,66,'agr','Fishery',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (46,34,'rec serv','Food & Beverages',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (47,23,'good man serv','Food Production',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (48,101,'org','Fund-Raising',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (49,26,'good man','Furniture',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (50,29,'rec','Gambling & Casinos',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (51,145,'cons man','Glass, Ceramics & Concrete',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (52,75,'gov','Government Administration',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (53,148,'gov','Government Relations',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (54,140,'art med','Graphic Design',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (55,124,'hlth rec','Health, Wellness and Fitness',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (56,68,'edu','Higher Education',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (57,14,'hlth','Hospital & Health Care',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (58,31,'rec serv tran','Hospitality',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (59,137,'corp','Human Resources',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (60,134,'corp good tran','Import and Export',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (61,88,'org serv','Individual & Family Services',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (62,147,'cons man','Industrial Automation',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (63,84,'med serv','Information Services',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (64,96,'tech','Information Technology and Services',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (65,42,'fin','Insurance',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (66,74,'gov','International Affairs',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (67,141,'gov org tran','International Trade and Development',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (68,6,'tech','Internet',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (69,45,'fin','Investment Banking',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (70,46,'fin','Investment Management',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (71,73,'gov leg','Judiciary',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (72,77,'gov leg','Law Enforcement',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (73,9,'leg','Law Practice',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (74,10,'leg','Legal Services',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (75,72,'gov leg','Legislative Office',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (76,30,'rec serv tran','Leisure, Travel & Tourism',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (77,85,'med rec serv','Libraries',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (78,116,'corp tran','Logistics and Supply Chain',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (79,143,'good','Luxury Goods & Jewelry',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (80,55,'man','Machinery',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (81,11,'corp','Management Consulting',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (82,95,'tran','Maritime',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (83,97,'corp','Market Research',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (84,80,'corp med','Marketing and Advertising',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (85,135,'cons gov man','Mechanical or Industrial Engineering',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (86,126,'med rec','Media Production',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (87,17,'hlth','Medical Devices',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (88,13,'hlth','Medical Practice',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (89,139,'hlth','Mental Health Care',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (90,71,'gov','Military',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (91,56,'man','Mining & Metals',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (92,35,'art med rec','Motion Pictures and Film',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (93,37,'art med rec','Museums and Institutions',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (94,115,'art rec','Music',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (95,114,'gov man tech','Nanotechnology',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (96,81,'med rec','Newspapers',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (97,100,'org','Non-Profit Organization Management',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (98,57,'man','Oil & Energy',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (99,113,'med','Online Media',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (100,123,'corp','Outsourcing/Offshoring',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (101,87,'serv tran','Package/Freight Delivery',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (102,146,'good man','Packaging and Containers',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (103,61,'man','Paper & Forest Products',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (104,39,'art med rec','Performing Arts',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (105,15,'hlth tech','Pharmaceuticals',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (106,131,'org','Philanthropy',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (107,136,'art med rec','Photography',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (108,117,'man','Plastics',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (109,107,'gov org','Political Organization',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (110,67,'edu','Primary/Secondary Education',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (111,83,'med rec','Printing',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (112,105,'corp','Professional Training & Coaching',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (113,102,'corp org','Program Development',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (114,79,'gov','Public Policy',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (115,98,'corp','Public Relations and Communications',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (116,78,'gov','Public Safety',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (117,82,'med rec','Publishing',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (118,62,'man','Railroad Manufacture',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (119,64,'agr','Ranching',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (120,44,'cons fin good','Real Estate',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (121,40,'rec serv','Recreational Facilities and Services',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (122,89,'org serv','Religious Institutions',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (123,144,'gov man org','Renewables & Environment',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (124,70,'edu gov','Research',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (125,32,'rec serv','Restaurants',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (126,27,'good man','Retail',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (127,121,'corp org serv','Security and Investigations',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (128,7,'tech','Semiconductors',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (129,58,'man','Shipbuilding',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (130,20,'good rec','Sporting Goods',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (131,33,'rec','Sports',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (132,104,'corp','Staffing and Recruiting',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (133,22,'good','Supermarkets',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (134,8,'gov tech','Telecommunications',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (135,60,'man','Textiles',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (136,130,'gov org','Think Tanks',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (137,21,'good','Tobacco',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (138,108,'corp gov serv','Translation and Localization',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (139,92,'tran','Transportation/Trucking/Railroad',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (140,59,'man','Utilities',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (141,106,'fin tech','Venture Capital & Private Equity',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (142,16,'hlth','Veterinary',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (143,93,'tran','Warehousing',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (144,133,'good','Wholesale',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (145,142,'good man rec','Wine and Spirits',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (146,119,'tech','Wireless',UNIX_TIMESTAMP(),0);
insert  into `lib_industry` (`industry_id`,`code`,`group`,`description`,`created`,`updated`) values (147,103,'art med rec','\"Writing and Editing',UNIX_TIMESTAMP(),0);

CREATE TABLE `lib_languages` (
  `language_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(198) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_locations` (
  `location_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `id` varchar(32) DEFAULT NULL,
  `name` varchar(198) DEFAULT NULL,
  `address_id` bigint(14) unsigned DEFAULT '0',
  `contact-info_ids` mediumtext,
  `country_id` int(12) unsigned DEFAULT '0',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_oauth` (
  `oauth_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` bigint(14) DEFAULT '0',
  `profile_id` bigint(14) DEFAULT '0',
  `mode` enum('valid','invalid','expired','disabled','other') DEFAULT NULL,
  `access_oauth_token` varchar(255) DEFAULT NULL,
  `access_oauth_token_secret` varchar(255) DEFAULT NULL,
  `access_oauth_expires_in` int(13) DEFAULT '0',
  `request_oauth_token` varchar(255) DEFAULT NULL,
  `request_oauth_token_secret` varchar(255) DEFAULT NULL,
  `request_oauth_expires_in` int(13) DEFAULT '0',
  `username` varchar(64) DEFAULT NULL,
  `ip` varchar(64) DEFAULT NULL,
  `netbios` varchar(255) DEFAULT NULL,
  `uid` int(13) unsigned DEFAULT '0',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`oauth_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_organization` (
  `organization_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `id` varchar(32) DEFAULT NULL,
  `name` varchar(198) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_persons` (
  `person_id` bigint(28) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT NULL,
  `aspr_id` bigint(14) unsigned DEFAULT NULL,
  `publication_ids` mediumtext,
  `authors_ids` mediumtext,
  `inventors_ids` mediumtext,
  `id` varchar(32) DEFAULT NULL,
  `first-name` varchar(128) DEFAULT NULL,
  `last-name` varchar(128) DEFAULT NULL,
  `headline` varchar(198) DEFAULT NULL,
  `picture-url` varchar(500) DEFAULT NULL,
  `site-standard-profile-request` varchar(500) DEFAULT NULL,
  `industry` varchar(198) DEFAULT NULL,
  `location_id` bigint(14) unsigned DEFAULT '0',
  `uid` int(12) unsigned DEFAULT '0',
  `oauth_id` bigint(14) unsigned DEFAULT '0',
  `searched` int(12) DEFAULT '0',
  `polled` int(12) DEFAULT '0',
  `crawled` int(12) DEFAULT '0',
  `updated` int(12) DEFAULT '0',
  `created` int(12) DEFAULT '0',
  `emailed` int(12) DEFAULT '0',
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_proficiencies` (
  `proficiency_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`proficiency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles` (
  `profile_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` bigint(14) unsigned DEFAULT '0',
  `maiden-name` varchar(128) DEFAULT NULL,
  `formatted-name` varchar(198) DEFAULT NULL,
  `phonetic-first-name` varchar(198) DEFAULT NULL,
  `phonetic-last-name` varchar(198) DEFAULT NULL,
  `formatted-phonetic-name` varchar(198) DEFAULT NULL,
  `headline` varchar(500) DEFAULT NULL,
  `location_id` bigint(14) unsigned DEFAULT '0',
  `industry` varchar(198) DEFAULT NULL,
  `distance` varchar(64) DEFAULT NULL,
  `relation-to-viewer` varchar(64) DEFAULT NULL,
  `current-status` varchar(140) DEFAULT NULL,
  `last-modified-timestamp` int(35) unsigned DEFAULT '0',
  `current-share` varchar(255) DEFAULT NULL,
  `network` varchar(128) DEFAULT NULL,
  `connections` varchar(32) DEFAULT NULL,
  `num-connections` varchar(32) DEFAULT NULL,
  `num-connections-capped` varchar(32) DEFAULT NULL,
  `connections_ids` mediumtext,
  `positions_ids` mediumtext,
  `publications_ids` mediumtext,
  `patents_ids` mediumtext,
  `languages_ids` mediumtext,
  `skills_ids` mediumtext,
  `certifications_ids` mediumtext,
  `educations_ids` mediumtext,
  `courses_ids` mediumtext,
  `volunteer_ids` mediumtext,
  `three-current-positions_ids` mediumtext,
  `three-past-positions_ids` mediumtext,
  `summary` mediumtext,
  `specialties` mediumtext,
  `proposal-comments` mediumtext,
  `associations` mediumtext,
  `honors` mediumtext,
  `interests` mediumtext,
  `num-recommenders` int(10) unsigned DEFAULT '0',
  `phone_ids` mediumtext,
  `im_ids` mediumtext,
  `twitter_ids` mediumtext,
  `primary_twitter_id` bigint(14) DEFAULT NULL,
  `date-of-birth` varchar(10) DEFAULT NULL,
  `main-address` varchar(255) DEFAULT NULL,
  `picture-url` varchar(500) DEFAULT NULL,
  `site-standard-profile-request` varchar(500) DEFAULT NULL,
  `api-standard-profile-request_ids` mediumtext,
  `public-profile-url` varchar(500) DEFAULT NULL,
  `searched` int(12) DEFAULT '0',
  `emailed` int(12) DEFAULT '0',
  `sms` int(12) DEFAULT '0',
  `updated` int(12) DEFAULT '0',
  `created` int(12) DEFAULT '0',
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_certifications` (
  `certifications_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `id` varchar(32) DEFAULT NULL,
  `name` varchar(198) DEFAULT NULL,
  `authority_id` bigint(14) unsigned DEFAULT '0',
  `number` varchar(64) DEFAULT NULL,
  `start-date` varchar(16) DEFAULT '01-01-1978',
  `end-date` varchar(16) DEFAULT '01-01-1978',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`certifications_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_companies` (
  `companies_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `position_id` bigint(14) unsigned DEFAULT '0',
  `company_id` bigint(14) unsigned DEFAULT '0',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`companies_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_courses` (
  `courses_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT NULL,
  `person_id` bigint(14) unsigned DEFAULT NULL,
  `id` varchar(32) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `number` varchar(64) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`courses_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_educations` (
  `educations_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `id` varchar(32) DEFAULT NULL,
  `school-name` varchar(128) DEFAULT NULL,
  `field-of-study` varchar(128) DEFAULT NULL,
  `start-date` varchar(4) DEFAULT '1978',
  `end-date` varchar(4) DEFAULT '1978',
  `degree` varchar(128) DEFAULT NULL,
  `activities` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`educations_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_ims` (
  `ims_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `im-account-type` varchar(32) DEFAULT NULL,
  `im-account-name` varchar(255) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`ims_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_patents` (
  `patents_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `id` varchar(32) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `summary` mediumtext,
  `number` varchar(64) DEFAULT NULL,
  `status_id` bigint(14) unsigned DEFAULT NULL,
  `office_id` bigint(14) unsigned DEFAULT NULL,
  `inventors_id` bigint(14) unsigned DEFAULT NULL,
  `date` varchar(16) DEFAULT '01-01-1978',
  `url` varchar(500) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`patents_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_patents_inventors` (
  `inventors_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `patent_id` bigint(14) unsigned DEFAULT NULL,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `id` varchar(32) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `inventor_person_id` bigint(14) unsigned DEFAULT '0',  
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`inventors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_languages` (
  `languages_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `patent_id` bigint(14) unsigned DEFAULT NULL,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `language_id` bigint(14) unsigned DEFAULT '0',
  `proficiency_id` bigint(14) unsigned DEFAULT '0',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`languages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_patents_office` (
  `office_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `patent_id` bigint(14) unsigned DEFAULT NULL,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `id` tinyint(2) DEFAULT '0',
  `name` varchar(128) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_patents_status` (
  `status_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `patent_id` bigint(14) unsigned DEFAULT '0',
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `id` tinyint(2) DEFAULT '0',
  `name` enum('Application','Patent') DEFAULT 'Application',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_phones` (
  `phone_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `phone-type` enum('home','work','mobile') DEFAULT 'mobile',
  `phone-number` varchar(64) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`phone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_positions` (
  `position_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `company_id` bigint(14) unsigned DEFAULT '0',
  `id` varchar(32) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `summary` mediumtext,
  `start-date` varchar(10) DEFAULT NULL,
  `end-date` varchar(10) DEFAULT NULL,
  `is-current` enum('true','false') DEFAULT 'false',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_providers` (
  `provider_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `provider-account-id` varchar(32) DEFAULT NULL,
  `provider-account-name` varchar(64) DEFAULT NULL,
  `primary` tinyint(2) unsigned DEFAULT '0',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_publications` (
  `publications_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `id` varchar(32) DEFAULT NULL,
  `title` varchar(198) DEFAULT NULL,
  `publisher` varchar(128) DEFAULT NULL,
  `authors_ids` mediumtext,
  `date` varchar(14) DEFAULT '01-01-1978',
  `url` varchar(500) DEFAULT NULL,
  `summary` mediumtext,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`publications_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_publications_authors` (
  `authors_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `publication_id` bigint(14) unsigned DEFAULT '0',
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `id` varchar(32) DEFAULT NULL,
  `name` varchar(198) DEFAULT NULL,
  `author_person_id` mediumtext,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`authors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_recommendations` (
  `recommendations_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `id` varchar(32) DEFAULT NULL,
  `recommendation-type` varchar(64) DEFAULT NULL,
  `recommendation-text` varchar(255) DEFAULT NULL,
  `recommender_person_id` bigint(14) unsigned DEFAULT '0',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`recommendations_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_skills` (
  `skills_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(28) unsigned DEFAULT '0',
  `skill_id` bigint(14) unsigned DEFAULT '0',
  `proficiency_id` bigint(14) unsigned DEFAULT '0',
  `years_id` bigint(14) unsigned DEFAULT '0',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`skills_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_profiles_volunteer` (
  `volunteer_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(14) unsigned DEFAULT '0',
  `person_id` bigint(14) unsigned DEFAULT '0',
  `id` varchar(32) DEFAULT NULL,
  `role` varchar(128) DEFAULT NULL,
  `organization_id` bigint(14) unsigned DEFAULT '0',
  `cause_id` bigint(14) unsigned DEFAULT '0',
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`volunteer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_skills` (
  `skill_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(198) DEFAULT NULL,
  `profile_ids` mediumtext,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_specialties` (
  `specialties_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `specialty` varchar(128) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`specialties_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_status` (
  `status_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(32) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lib_years` (
  `years_id` bigint(14) unsigned NOT NULL AUTO_INCREMENT,
  `id` varchar(32) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `created` int(13) unsigned DEFAULT '0',
  `updated` int(13) unsigned DEFAULT '0',
  PRIMARY KEY (`years_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
