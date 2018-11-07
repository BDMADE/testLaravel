Use excelessay;

--
-- Table structure for table `academiclevels`
--

DROP TABLE IF EXISTS `academiclevels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academiclevels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academiclevels`
--
/*!40000 ALTER TABLE `academiclevels` DISABLE KEYS */;
INSERT INTO `academiclevels` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,'College/High School','2018-01-05 15:33:09','2018-01-21 20:41:31',NULL),(2,'Undergraduate','2018-01-05 15:33:09','2018-01-04 23:00:00',NULL),(3,'Post-Graduate','2018-01-05 15:33:09','2018-01-04 23:00:00',NULL),(6,'OTHER','2018-02-28 00:41:19','2018-02-28 00:41:19',NULL);
/*!40000 ALTER TABLE `academiclevels` ENABLE KEYS */;
--
-- Table structure for table `bonreductions`
--

DROP TABLE IF EXISTS `bonreductions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bonreductions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT 'Discount',
  `code` varchar(30) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `prix_fixe` double NOT NULL DEFAULT '0',
  `prix_percent` double NOT NULL DEFAULT '0',
  `max_discount` float NOT NULL DEFAULT '0',
  `min_spent` float NOT NULL DEFAULT '0',
  `applique_prixfixe` tinyint(1) NOT NULL DEFAULT '1',
  `nb_user_max` int(11) NOT NULL DEFAULT '0',
  `nb_user_utiliser` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bonreductions`
--

/*!40000 ALTER TABLE `bonreductions` DISABLE KEYS */;
INSERT INTO `bonreductions` (`id`, `nom`, `code`, `date_debut`, `date_fin`, `prix_fixe`, `prix_percent`, `max_discount`, `min_spent`, `applique_prixfixe`, `nb_user_max`, `nb_user_utiliser`, `created_at`, `updated_at`, `deleted_at`) VALUES (15,'welcome','welcome','2018-03-06','2018-03-06',10,0,0,50,1,30,0,'2018-03-07 04:13:02','2018-03-07 04:13:02',NULL),(14,'test','5A94146F7','2018-02-01','2018-03-31',0,5,10,0,0,5,1,'2018-02-26 13:06:39','2018-03-08 05:04:59',NULL),(16,NULL,'5AA07E133','2018-03-01','2018-03-15',0,1,5,0,0,5,1,'2018-03-08 05:04:35','2018-03-10 20:56:41',NULL);
/*!40000 ALTER TABLE `bonreductions` ENABLE KEYS */;

--
-- Table structure for table `deadlines`
--

DROP TABLE IF EXISTS `deadlines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deadlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academiclevel_id` int(11) NOT NULL,
  `standarddeadline_id` int(11) NOT NULL,
  `prix_standard` double NOT NULL DEFAULT '0',
  `prix_premium` double NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deadlines`
--

/*!40000 ALTER TABLE `deadlines` DISABLE KEYS */;
INSERT INTO `deadlines` (`id`, `academiclevel_id`, `standarddeadline_id`, `prix_standard`, `prix_premium`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,1,1,10.45,13.45,'2018-01-05 16:22:14','2018-01-21 22:55:31',NULL),(2,1,2,10.99,13.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(3,1,3,11.99,14.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(4,1,4,12.99,15.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(5,1,5,13.99,17.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(6,1,6,15.99,18.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(7,1,7,19.99,21.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(9,2,1,13.45,16.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(10,2,2,13.99,18.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(11,2,3,14.99,20.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(12,2,4,15.99,22.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(13,2,5,17.99,24.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(14,2,6,18.99,26.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(15,2,7,21.99,28.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(17,3,1,16.99,18.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(18,3,2,18.99,20.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(19,3,3,20.99,24.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(20,3,4,22.99,26.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(21,3,5,24.99,28.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(22,3,6,26.99,20.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(23,3,7,28.99,34.99,'2018-01-05 16:22:14','2018-01-04 23:00:00',NULL),(35,6,2,0,0,'2018-02-28 00:41:19','2018-02-28 01:52:41',NULL),(34,6,1,0,0,'2018-02-28 00:41:19','2018-02-28 00:41:19',NULL),(39,6,6,0,0,'2018-02-28 00:41:19','2018-02-28 00:41:19',NULL),(38,6,5,0,0,'2018-02-28 00:41:19','2018-02-28 00:41:19',NULL),(37,6,4,0,0,'2018-02-28 00:41:19','2018-02-28 00:41:19',NULL),(40,6,7,0,0,'2018-02-28 00:41:19','2018-02-28 00:41:19',NULL),(36,6,3,0,0,'2018-02-28 00:41:19','2018-02-28 00:41:19',NULL);
/*!40000 ALTER TABLE `deadlines` ENABLE KEYS */;


--
-- Table structure for table `etats`
--

DROP TABLE IF EXISTS `etats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `bg_color` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etats`
--

--
-- Table structure for table `extratservices`
--

DROP TABLE IF EXISTS `extratservices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extratservices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prix_percent` double NOT NULL DEFAULT '0',
  `prix_fixe` double NOT NULL DEFAULT '0',
  `appliquer_prixfixe` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extratservices`
--
--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `admin_id` int(11) DEFAULT NULL,
  `is_user_sender` tinyint(1) NOT NULL DEFAULT '1',
  `nom` varchar(255) NOT NULL,
  `physical_name` varchar(255) NOT NULL,
  `type` varchar(5) NOT NULL,
  `emplacement` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--


/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` (`id`, `order_id`, `user_id`, `admin_id`, `is_user_sender`, `nom`, `physical_name`, `type`, `emplacement`, `created_at`, `updated_at`, `deleted_at`) VALUES (15,15,19,NULL,1,'477D09AA-4448-43D6-86A1-20ECEF560EB1.jpeg','5a86ab5b4b4e6.jpeg','jpeg','filesOrders/dossierOrder15','2018-02-16 14:58:51','2018-02-16 14:58:51',NULL),(14,14,19,NULL,1,'477D09AA-4448-43D6-86A1-20ECEF560EB1.jpeg','5a86ab2431c95.jpeg','jpeg','filesOrders/dossierOrder14','2018-02-16 14:57:56','2018-02-16 14:57:56',NULL),(13,13,19,NULL,1,'spelling.PNG','5a85f9dece48e.PNG','png','filesOrders/dossierOrder13','2018-02-16 02:21:34','2018-02-16 02:21:34',NULL);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;


--
-- Table structure for table `historiques`
--

DROP TABLE IF EXISTS `historiques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `montant` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historiques`
--


/*!40000 ALTER TABLE `historiques` DISABLE KEYS */;
INSERT INTO `historiques` (`id`, `user_id`, `description`, `montant`, `created_at`, `updated_at`, `deleted_at`) VALUES (12,28,'bill payment for your orders ',63.28,'2018-02-19 01:14:00','2018-02-19 01:14:00',NULL),(13,28,'bill payment for your orders ',68.97,'2018-02-19 01:36:14','2018-02-19 01:36:14',NULL),(14,28,'bill payment for your orders ',60.26,'2018-02-19 01:46:51','2018-02-19 01:46:51',NULL),(15,28,'bill payment for your orders ',84.38,'2018-02-19 01:49:25','2018-02-19 01:49:25',NULL),(16,28,'bill payment for your orders ',60.26,'2018-02-19 01:58:21','2018-02-19 01:58:21',NULL),(17,33,'bill payment for your orders ',14.69,'2018-03-06 18:03:50','2018-03-06 18:03:50',NULL),(18,33,'bill payment for your orders ',14.69,'2018-03-06 22:53:43','2018-03-06 22:53:43',NULL),(19,36,'bill payment for your orders ',41.8,'2018-03-08 17:43:01','2018-03-08 17:43:01',NULL);
/*!40000 ALTER TABLE `historiques` ENABLE KEYS */;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `user_is_sender` tinyint(1) NOT NULL DEFAULT '1',
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `user_id`, `admin_id`, `user_is_sender`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES (28,19,6,0,'hello','2018-02-08 04:57:06','2018-02-08 04:57:06',NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;


--
-- Table structure for table `operations`
--

DROP TABLE IF EXISTS `operations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operations`
--
--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `writer` int(11) DEFAULT NULL,
  `ref` varchar(15) DEFAULT NULL,
  `typepapers_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL DEFAULT '1',
  `typeformat_id` int(11) NOT NULL,
  `wordpage_id` int(11) NOT NULL,
  `deadline_id` int(11) NOT NULL,
  `userslevel_id` int(11) DEFAULT NULL,
  `extratservice_id` int(11) DEFAULT NULL,
  `bonreduction_id` int(11) DEFAULT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'BIDDING',
  `typeofwork_id` int(11) NOT NULL,
  `number_of_page` int(11) NOT NULL,
  `montant` double NOT NULL DEFAULT '0',
  `is_premium` tinyint(1) NOT NULL DEFAULT '0',
  `montant_payer` double NOT NULL DEFAULT '0',
  `topic` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `source` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `est_noter` tinyint(1) NOT NULL DEFAULT '0',
  `note` float NOT NULL DEFAULT '0',
  `commentaire_user` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ref` (`ref`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `user_id`, `writer`, `ref`, `typepapers_id`, `subject_id`, `typeformat_id`, `wordpage_id`, `deadline_id`, `userslevel_id`, `extratservice_id`, `bonreduction_id`, `etat`, `typeofwork_id`, `number_of_page`, `montant`, `is_premium`, `montant_payer`, `topic`, `description`, `source`, `active`, `est_noter`, `note`, `commentaire_user`, `created_at`, `updated_at`, `deleted_at`) VALUES (12,19,NULL,'OR00012',1,32,4,1,4,NULL,NULL,NULL,'IN PROGRESS',1,4,63.96,1,0,'test-12345','test-12345',5,0,0,0,NULL,'2018-02-08 00:28:23','2018-02-08 04:56:49',NULL),(13,19,NULL,'OR00013',1,1,4,1,9,NULL,NULL,NULL,'BIDDING',1,1,13.45,0,0,'123456789','1234567890',1,0,0,0,NULL,'2018-02-16 02:21:34','2018-02-16 02:21:34',NULL),(14,19,NULL,'OR00014',1,4,1,1,1,NULL,NULL,NULL,'BIDDING',1,3,31.35,0,0,'123456789','1234567880',2,0,0,0,NULL,'2018-02-16 14:57:56','2018-02-16 14:57:56',NULL),(15,19,NULL,'OR00015',1,4,1,1,1,NULL,NULL,NULL,'BIDDING',1,3,31.35,0,0,'123456789','1234567880',2,0,0,0,NULL,'2018-02-16 14:58:51','2018-02-16 14:58:51',NULL),(18,28,NULL,'OR00018',1,1,3,1,19,NULL,NULL,NULL,'BIDDING',2,3,63.28,0,0,'test admin order for user 3','test admin order for user 3 test admin order for user 3 test admin order for user 3 test admin order for user 3 test admin order for user 3',2,0,0,0,NULL,'2018-02-19 01:12:17','2018-02-19 01:12:17',NULL),(19,28,NULL,'OR00019',1,1,4,1,35,NULL,NULL,NULL,'BIDDING',2,3,0,0,0,'test admin order for user 4','test admin order for user 4 test admin order for user 4 test admin order for user 4 test admin order for user 4 test admin order for user 4',2,0,0,0,NULL,'2018-02-19 01:31:50','2018-02-19 01:31:50',NULL),(20,28,NULL,'OR00020',1,1,4,1,20,NULL,NULL,NULL,'BIDDING',3,3,68.97,0,0,'test admin order for user 5','test admin order for user 5 test admin order for user 5 test admin order for user 5 test admin order for user 5 test admin order for user 5 test admin order for user 5 test admin order for user 5',3,0,0,0,NULL,'2018-02-19 01:34:12','2018-02-19 01:34:12',NULL),(21,28,NULL,'OR00021',1,1,3,1,11,NULL,NULL,NULL,'BIDDING',2,4,60.26,0,0,'test admin order for user 6','test admin order for user 6 test admin order for user 6 test admin order for user 6 test admin order for user 6 test admin order for user 6 test admin order for user 6 test admin order for user 6',3,0,0,0,NULL,'2018-02-19 01:41:03','2018-02-19 01:41:03',NULL),(22,28,NULL,'OR00022',1,1,2,1,19,NULL,NULL,NULL,'BIDDING',2,4,84.38,0,0,'test admin order for user 7','test admin order for user 7 test admin order for user 7 test admin order for user 7 test admin order for user 7 test admin order for user 7 test admin order for user 7 test admin order for user 7 test admin order for user 7',4,0,0,0,NULL,'2018-02-19 01:48:44','2018-02-19 01:48:44',NULL),(23,28,NULL,'OR00023',1,1,3,1,11,NULL,NULL,NULL,'BIDDING',2,4,60.26,0,0,'test admin order for user 8','test admin order for user 8 test admin order for user 8 test admin order for user 8 test admin order for user 8 test admin order for user 8 test admin order for user 8 test admin order for user 8',3,0,0,0,NULL,'2018-02-19 01:56:54','2018-02-19 01:56:54',NULL),(24,19,NULL,'OR00024',5,13,4,1,1,NULL,NULL,NULL,'BIDDING',1,3,31.35,0,0,'123456789','qwertyuiopasdf',2,0,0,0,NULL,'2018-02-20 03:10:53','2018-02-20 03:10:53',NULL),(25,29,NULL,'OR00025',1,1,1,1,1,NULL,NULL,NULL,'BIDDING',1,1,10.45,0,0,'12345654321sdfg','asdfghjhgfdsasdfg',0,0,0,0,NULL,'2018-02-20 03:29:55','2018-02-20 03:29:55',NULL),(26,30,NULL,'OR00026',4,13,4,1,1,NULL,NULL,NULL,'BIDDING',1,4,41.8,0,0,'Wethtyjikp','Qwertyuiopasdfghjk',2,0,0,0,NULL,'2018-03-03 02:57:00','2018-03-03 02:57:00',NULL),(27,31,NULL,'OR00027',1,6,4,1,1,NULL,NULL,NULL,'BIDDING',1,3,31.35,0,0,'Gagaggaha','Agaggagabab',3,0,0,0,NULL,'2018-03-05 03:31:08','2018-03-05 03:31:08',NULL),(28,31,NULL,'OR00028',1,6,4,1,1,NULL,NULL,NULL,'BIDDING',1,3,31.35,0,0,'Gagaggaha','Agaggagabab',3,0,0,0,NULL,'2018-03-05 03:31:09','2018-03-05 03:31:09',NULL),(29,32,NULL,'OR00029',1,5,4,1,1,NULL,NULL,NULL,'BIDDING',1,4,41.8,0,0,'Qwertyuiop','Fhjvfxg',3,0,0,0,NULL,'2018-03-06 00:23:58','2018-03-06 00:23:58',NULL),(30,7,NULL,'OR00030',9,10,4,1,1,NULL,NULL,NULL,'BIDDING',1,3,31.35,0,0,'fghjkjhghjkjhvhjklk','lkjhbvjklkjbvbnjklk',0,0,0,0,NULL,'2018-03-06 05:02:59','2018-03-06 05:02:59',NULL),(31,34,NULL,'OR00031',1,1,4,1,1,NULL,NULL,NULL,'BIDDING',1,5,52.25,0,0,'12345678765','qwertyuytr',2,0,0,0,NULL,'2018-03-06 05:07:08','2018-03-06 05:07:08',NULL),(32,33,NULL,'OR00032',1,1,1,1,10,NULL,NULL,NULL,'BIDDING',1,3,41.97,0,0,'Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Cras at accumsan velit. Nulla viverra, augue eget congue dapibus, elit urna ultricies nibh, vel pulvinar elit dolor dignissim elit. Quisque ut luctus felis.',0,0,0,0,NULL,'2018-03-06 18:02:49','2018-03-06 18:02:49',NULL),(33,33,NULL,'OR00033',1,1,3,1,10,NULL,NULL,NULL,'BIDDING',1,3,41.97,0,0,'In interdum dolor nec tellus consequat sagittis.','Nulla dolor dolor, bibendum sed lobortis nec, tincidunt at orci. Maecenas id lacinia libero. Sed cursus mollis lacus, sit amet fermentum tellus mollis et.',2,0,0,0,NULL,'2018-03-06 22:52:59','2018-03-06 22:52:59',NULL),(34,33,NULL,'OR00034',1,1,4,1,9,NULL,NULL,NULL,'BIDDING',3,4,53.8,0,0,'In interdum dolor nec tellus consequat sagittis.','Nulla dolor dolor, bibendum sed lobortis nec, tincidunt at orci. Maecenas id lacinia libero. Sed cursus mollis lacus, sit amet fermentum tellus mollis et.',2,0,0,0,NULL,'2018-03-06 23:01:23','2018-03-06 23:01:23',NULL),(35,19,NULL,'OR00035',1,1,4,1,1,NULL,NULL,NULL,'BIDDING',1,3,31.35,0,0,'123456789','123456789',2,0,0,0,NULL,'2018-03-07 04:08:39','2018-03-07 04:08:39',NULL),(36,19,NULL,'OR00036',1,1,1,1,1,NULL,NULL,NULL,'BIDDING',1,1,10.45,0,0,'ctyvuhjnio;,','etruipnonuygfyh',0,0,0,0,NULL,'2018-03-07 04:21:50','2018-03-07 04:21:50',NULL),(37,19,NULL,'OR00037',1,1,1,1,1,NULL,NULL,NULL,'BIDDING',1,8,83.6,0,0,'ctyvuhjnio;,','etruipnonuygfyh',0,0,0,0,NULL,'2018-03-07 04:23:28','2018-03-07 04:23:28',NULL),(38,36,NULL,'OR00038',1,1,4,1,1,NULL,NULL,14,'BIDDING',1,1,9.93,0,0,'123456789','1234567890',5,0,0,0,NULL,'2018-03-08 05:04:59','2018-03-08 05:04:59',NULL),(39,36,NULL,'OR00039',1,1,1,1,1,NULL,NULL,NULL,'BIDDING',2,4,41.8,0,0,'Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Lorem ipsum dolor sit amet, consectetur adipiscing elit.',0,0,0,0,NULL,'2018-03-08 17:41:26','2018-03-08 17:41:26',NULL),(40,37,NULL,'OR00040',1,1,4,1,1,NULL,NULL,NULL,'BIDDING',1,6,62.7,0,0,'123454324543','asdfhgfdsafnbgvfcd',4,0,0,0,NULL,'2018-03-09 22:45:22','2018-03-09 22:45:22',NULL),(41,38,NULL,'OR00041',1,1,4,1,1,NULL,NULL,16,'BIDDING',1,5,51.73,0,0,'We go ggbjgvbj','C bc fun fjhfgjgvb',3,0,0,0,NULL,'2018-03-10 20:56:41','2018-03-10 20:56:41',NULL),(42,7,NULL,'OR00042',22,1,1,1,1,NULL,NULL,NULL,'BIDDING',1,3,31.35,0,0,'1111212125','1111111',0,0,0,0,NULL,'2018-09-25 14:45:52','2018-09-25 14:45:52',NULL),(43,7,NULL,'OR00043',22,1,1,1,1,NULL,NULL,NULL,'BIDDING',1,3,31.35,0,0,'1111212125','1111111',0,0,0,0,NULL,'2018-09-25 14:45:59','2018-09-25 14:45:59',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;


--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) NOT NULL,
  `code3` varchar(4) DEFAULT NULL,
  `indicatif_tel` int(10) DEFAULT NULL,
  `nom` varchar(150) NOT NULL,
  `nom_fr` varchar(255) DEFAULT NULL,
  `capital_fr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pays`
--

/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` (`id`, `code`, `code3`, `indicatif_tel`, `nom`, `nom_fr`, `capital_fr`, `deleted_at`, `created_at`, `updated_at`) VALUES (1,'AF','AFG',93,'Afghanistan','Afghanistan','Kabul',NULL,NULL,'2018-01-03 08:48:34'),(2,'AL','ALB',355,'Albania','Albanie','Tirana',NULL,NULL,'2018-01-03 08:48:34'),(3,'DZ','DZA',213,'Algeria','Algérie','Algiers',NULL,NULL,'2018-01-03 08:48:35'),(4,'AS','ASM',1684,'American Samoa','Samoa américaines','Pago Pago',NULL,NULL,'2018-01-03 08:55:27'),(5,'AD','AND',376,'Andorra','Andorre','Andorra la Vella',NULL,NULL,'2018-01-03 08:48:35'),(6,'AO','AGO',244,'Angola','Angola','Luanda',NULL,NULL,'2018-01-03 08:48:35'),(7,'AI','AIA',1264,'Anguilla','Anguilla','The Valley',NULL,NULL,'2018-01-03 08:53:47'),(8,'AQ','ATA',672,'Antarctica','Antarctique','',NULL,NULL,'2018-01-03 08:53:48'),(9,'AG',NULL,1,'Antigua And Barbuda',NULL,'Saint John\'s',NULL,NULL,NULL),(10,'AR','ARG',54,'Argentina','Argentine','Buenos Aires',NULL,NULL,'2018-01-03 08:53:48'),(11,'AM','ARM',374,'Armenia','Arménie','Yerevan',NULL,NULL,'2018-01-03 08:53:48'),(12,'AW','ABW',297,'Aruba','Aruba','Oranjestad',NULL,NULL,'2018-01-03 08:53:48'),(13,'AU','AUS',61,'Australia','Australie','Canberra',NULL,NULL,'2018-01-03 08:53:48'),(14,'AT','AUT',43,'Austria','Autriche','Vienna',NULL,NULL,'2018-01-03 08:53:48'),(15,'AZ','AZE',994,'Azerbaijan','Azerbaïdjan','Baku',NULL,NULL,'2018-01-03 08:53:48'),(16,'BS','BHS',1,'Bahamas The','Bahamas','Nassau',NULL,NULL,'2018-01-03 08:53:48'),(17,'BH','BHR',973,'Bahrain','Bahreïn','Manama',NULL,NULL,'2018-01-03 08:53:48'),(18,'BD','BGD',880,'Bangladesh','Bangladesh','Dhaka',NULL,NULL,'2018-01-03 08:53:48'),(19,'BB','BRB',1,'Barbados','Barbade','Bridgetown',NULL,NULL,'2018-01-03 08:53:48'),(20,'BY','BLR',375,'Belarus','Biélorussie','Minsk',NULL,NULL,'2018-01-03 08:53:48'),(21,'BE','BEL',32,'Belgium','Belgique','Brussels',NULL,NULL,'2018-01-03 08:53:48'),(22,'BZ','BLZ',501,'Belize','Belize','Belmopan',NULL,NULL,'2018-01-03 08:53:48'),(23,'BJ','BEN',229,'Benin','Benin','Porto-Novo',NULL,NULL,'2018-01-03 08:53:48'),(24,'BM','BMU',1,'Bermuda','Bermudes','Hamilton',NULL,NULL,'2018-01-03 08:53:48'),(25,'BT','BTN',975,'Bhutan','Bhoutan','Thimphu',NULL,NULL,'2018-01-03 08:53:48'),(26,'BO','BOL',591,'Bolivia','Bolivie','La Paz',NULL,NULL,'2018-01-03 08:53:48'),(27,'BA','BIH',387,'Bosnia and Herzegovina','Bosnie-Herzégovine','Sarajevo',NULL,NULL,'2018-01-03 08:53:48'),(28,'BW','BWA',267,'Botswana','Botswana','Gaborone',NULL,NULL,'2018-01-03 08:53:48'),(29,'BV',NULL,NULL,'Bouvet Island',NULL,NULL,NULL,NULL,NULL),(30,'BR','BRA',55,'Brazil','Brésil','Brasília',NULL,NULL,'2018-01-03 08:53:49'),(31,'IO',NULL,NULL,'British Indian Ocean Territory',NULL,NULL,NULL,NULL,NULL),(32,'BN','BRN',673,'Brunei','Brunei','Bandar Seri Begawan',NULL,NULL,'2018-01-03 08:53:49'),(33,'BG','BGR',359,'Bulgaria','Bulgarie','Sofia',NULL,NULL,'2018-01-03 08:53:49'),(34,'BF','BFA',226,'Burkina Faso','Burkina Faso','Ouagadougou',NULL,NULL,'2018-01-03 08:53:49'),(35,'BI','BDI',257,'Burundi','Burundi','Bujumbura',NULL,NULL,'2018-01-03 08:53:49'),(36,'KH','KHM',855,'Cambodia','Cambodge','Phnom Penh',NULL,NULL,'2018-01-03 08:53:49'),(37,'CM','CMR',237,'Cameroon','Cameroun','Yaoundé',NULL,NULL,'2018-01-03 08:53:49'),(38,'CA','CAN',1,'Canada','Canada','Ottawa',NULL,NULL,'2018-01-03 08:53:49'),(39,'CV','CPV',238,'Cape Verde','Cap-Vert','Praia',NULL,NULL,'2018-01-03 08:53:49'),(40,'KY','CYM',1345,'Cayman Islands','Îles Caïmanes','George Town',NULL,NULL,'2018-01-03 08:55:25'),(41,'CF','CAF',236,'Central African Republic','Centrafricaine, république','Bangui',NULL,NULL,'2018-01-03 08:53:49'),(42,'TD',NULL,NULL,'Chad',NULL,NULL,NULL,NULL,NULL),(43,'CL','CHL',56,'Chile','Chili','Santiago',NULL,NULL,'2018-01-03 08:53:49'),(44,'CN','CHN',86,'China','Chine','Beijing',NULL,NULL,'2018-01-03 08:53:49'),(45,'CX',NULL,NULL,'Christmas Island',NULL,NULL,NULL,NULL,NULL),(46,'CC',NULL,NULL,'Cocos (Keeling) Islands',NULL,NULL,NULL,NULL,NULL),(47,'CO','COL',57,'Colombia','Colombie','Bogotá',NULL,NULL,'2018-01-03 08:53:50'),(48,'KM','COM',269,'Comoros','Comores','Moroni',NULL,NULL,'2018-01-03 08:53:50'),(49,'CG','COG',242,'Congo','République du Congo','Brazzaville',NULL,NULL,'2018-01-03 08:55:27'),(50,'CD','COD',243,'Congo The Democratic Republic Of The','République démocratique du Congo','Kinshasa',NULL,NULL,'2018-01-03 08:55:27'),(51,'CK','COK',682,'Cook Islands','Îles Cook','Avarua',NULL,NULL,'2018-01-03 08:55:25'),(52,'CR','CRI',506,'Costa Rica','Costa Rica','San José',NULL,NULL,'2018-01-03 08:53:50'),(53,'CI','CIV',225,'Cote D\'Ivoire (Ivory Coast)','Côte d\'Ivoire','Yamoussoukro',NULL,NULL,'2018-01-03 08:53:50'),(54,'HR','HRV',385,'Croatia (Hrvatska)','Croatie','Zagreb',NULL,NULL,'2018-01-03 08:53:50'),(55,'CU','CUB',53,'Cuba','Cuba','Havana',NULL,NULL,'2018-01-03 08:53:50'),(56,'CY','CYP',357,'Cyprus','Chypre','Nicosia',NULL,NULL,'2018-01-03 08:53:49'),(57,'CZ','CZE',420,'Czech Republic','République tchèque','Prague',NULL,NULL,'2018-01-03 08:55:27'),(58,'DK','DNK',45,'Denmark','Danemark','Copenhagen',NULL,NULL,'2018-01-03 08:53:50'),(59,'DJ','DJI',253,'Djibouti','Djibouti','Djibouti',NULL,NULL,'2018-01-03 08:53:50'),(60,'DM','DMA',1,'Dominica','Dominique','Roseau',NULL,NULL,'2018-01-03 08:53:50'),(61,'DO','DOM',1,'Dominican Republic','République Dominicaine','Santo Domingo',NULL,NULL,'2018-01-03 08:55:27'),(62,'TP',NULL,NULL,'East Timor',NULL,NULL,NULL,NULL,NULL),(63,'EC','ECU',593,'Ecuador','Équateur','Quito',NULL,NULL,'2018-01-03 08:53:50'),(64,'EG','EGY',20,'Egypt','Égypte','Cairo',NULL,NULL,'2018-01-03 08:53:50'),(65,'SV','SLV',503,'El Salvador','El Salvador','San Salvador',NULL,NULL,'2018-01-03 08:53:50'),(66,'GQ','GNQ',240,'Equatorial Guinea','Guinée équatoriale','Malabo',NULL,NULL,'2018-01-03 08:54:56'),(67,'ER','ERI',291,'Eritrea','Érythrée','Asmara',NULL,NULL,'2018-01-03 08:53:50'),(68,'EE','EST',372,'Estonia','Estonie','Tallinn',NULL,NULL,'2018-01-03 08:53:50'),(69,'ET','ETH',251,'Ethiopia','Éthiopie','Addis Ababa',NULL,NULL,'2018-01-03 08:53:50'),(70,'XA',NULL,NULL,'External Territories of Australia',NULL,NULL,NULL,NULL,NULL),(71,'FK','FLK',500,'Falkland Islands','Îles Falkland','Stanley',NULL,NULL,'2018-01-03 08:55:25'),(72,'FO','FRO',298,'Faroe Islands','Îles Féroé','Tórshavn',NULL,NULL,'2018-01-03 08:55:25'),(73,'FJ','FJI',679,'Fiji Islands','Fidji','Suva',NULL,NULL,'2018-01-03 08:53:50'),(74,'FI','FIN',358,'Finland','Finlande','Helsinki',NULL,NULL,'2018-01-03 08:53:50'),(75,'FR','FRA',33,'France','France','Paris',NULL,NULL,'2018-01-03 08:53:50'),(76,'GF',NULL,NULL,'French Guiana',NULL,NULL,NULL,NULL,NULL),(77,'PF','PYF',689,'French Polynesia','Polynésie Française','Papeete',NULL,NULL,'2018-01-03 08:55:26'),(78,'TF',NULL,NULL,'French Southern Territories',NULL,NULL,NULL,NULL,NULL),(79,'GA','GAB',241,'Gabon','Gabon','Libreville',NULL,NULL,'2018-01-03 08:53:50'),(80,'GM','GMB',220,'Gambia The','Gambie','Banjul',NULL,NULL,'2018-01-03 08:53:50'),(81,'GE','GEO',995,'Georgia','Géorgie','Tbilisi',NULL,NULL,'2018-01-03 08:53:50'),(82,'DE','DEU',49,'Germany','Allemagne','Berlin',NULL,NULL,'2018-01-03 08:48:35'),(83,'GH','GHA',233,'Ghana','Ghana','Accra',NULL,NULL,'2018-01-03 08:53:50'),(84,'GI','GIB',350,'Gibraltar','Gibraltar','Gibraltar',NULL,NULL,'2018-01-03 08:53:50'),(85,'GR','GRC',30,'Greece','Grèce','Athens',NULL,NULL,'2018-01-03 08:53:50'),(86,'GL','GRL',299,'Greenland','Groenland','Nuuk',NULL,NULL,'2018-01-03 08:53:50'),(87,'GD',NULL,NULL,'Grenada',NULL,NULL,NULL,NULL,NULL),(88,'GP','GLP',590,'Guadeloupe','Guadeloupe','Basse-Terre',NULL,NULL,'2018-01-03 08:53:51'),(89,'GU','GUM',1671,'Guam','Guam','Hagåtña',NULL,NULL,'2018-01-03 08:54:56'),(90,'GT','GTM',502,'Guatemala','Guatemala','Guatemala City',NULL,NULL,'2018-01-03 08:54:56'),(91,'XU',NULL,NULL,'Guernsey and Alderney',NULL,NULL,NULL,NULL,NULL),(92,'GN','GIN',224,'Guinea','Guinée','Conakry',NULL,NULL,'2018-01-03 08:54:56'),(93,'GW','GNB',245,'Guinea-Bissau','Guinée-Bissau','Bissau',NULL,NULL,'2018-01-03 08:54:56'),(94,'GY','GUY',592,'Guyana','Guyana','Georgetown',NULL,NULL,'2018-01-03 08:54:56'),(95,'HT','HTI',509,'Haiti','Haïti','Port-au-Prince',NULL,NULL,'2018-01-03 08:54:56'),(96,'HM',NULL,NULL,'Heard and McDonald Islands',NULL,NULL,NULL,NULL,NULL),(97,'HN','HND',504,'Honduras','Honduras','Tegucigalpa',NULL,NULL,'2018-01-03 08:54:56'),(98,'HK','HKG',852,'Hong Kong S.A.R.','Hong Kong','Hong Kong',NULL,NULL,'2018-01-03 08:54:56'),(99,'HU','HUN',36,'Hungary','Hongrie','Budapest',NULL,NULL,'2018-01-03 08:54:56'),(100,'IS','ISL',354,'Iceland','Islande','Reykjavík',NULL,NULL,'2018-01-03 08:55:25'),(101,'IN','IND',91,'India','Inde','New Delhi',NULL,NULL,'2018-01-03 08:55:25'),(102,'ID','IDN',62,'Indonesia','Indonésie','Jakarta',NULL,NULL,'2018-01-03 08:55:25'),(103,'IR','IRN',98,'Iran','Iran','Tehran',NULL,NULL,'2018-01-03 08:55:25'),(104,'IQ','IRQ',964,'Iraq','Irak','Baghdad',NULL,NULL,'2018-01-03 08:55:25'),(105,'IE','IRL',353,'Ireland','Irlande','Dublin',NULL,NULL,'2018-01-03 08:55:25'),(106,'IL','ISR',972,'Israel','Israël','Jerusalem',NULL,NULL,'2018-01-03 08:55:25'),(107,'IT','ITA',39,'Italy','Italie','Rome',NULL,NULL,'2018-01-03 08:55:25'),(108,'JM','JAM',1,'Jamaica','Jamaïque','Kingston',NULL,NULL,'2018-01-03 08:55:25'),(109,'JP','JPN',81,'Japan','Japon','Tokyo',NULL,NULL,'2018-01-03 08:55:25'),(110,'XJ',NULL,NULL,'Jersey',NULL,NULL,NULL,NULL,NULL),(111,'JO','JOR',962,'Jordan','Jordanie','Amman',NULL,NULL,'2018-01-03 08:55:25'),(112,'KZ','KAZ',7,'Kazakhstan','Kazakhstan','Astana',NULL,NULL,'2018-01-03 08:55:25'),(113,'KE','KEN',254,'Kenya','Kenya','Nairobi',NULL,NULL,'2018-01-03 08:55:25'),(114,'KI','KIR',686,'Kiribati','Kiribati','Tarawa',NULL,NULL,'2018-01-03 08:55:25'),(115,'KP','PRK',850,'Korea North','Corée du Nord','Pyongyang',NULL,NULL,'2018-01-03 08:53:50'),(116,'KR','KOR',82,'Korea South','Corée du Sud','Seoul',NULL,NULL,'2018-01-03 08:53:50'),(117,'KW','KWT',965,'Kuwait','Koweït','Kuwait City',NULL,NULL,'2018-01-03 08:55:25'),(118,'KG','KGZ',996,'Kyrgyzstan','Kirghizistan','Bishkek',NULL,NULL,'2018-01-03 08:55:25'),(119,'LA','LAO',856,'Laos','Laos','Vientiane',NULL,NULL,'2018-01-03 08:55:25'),(120,'LV','LVA',371,'Latvia','Lettonie','Riga',NULL,NULL,'2018-01-03 08:55:25'),(121,'LB','LBN',961,'Lebanon','Liban','Beirut',NULL,NULL,'2018-01-03 08:55:25'),(122,'LS','LSO',266,'Lesotho','Lesotho','Maseru',NULL,NULL,'2018-01-03 08:55:25'),(123,'LR','LBR',231,'Liberia','Liberia','Monrovia',NULL,NULL,'2018-01-03 08:55:25'),(124,'LY','LBY',218,'Libya','Libye','Tripolis',NULL,NULL,'2018-01-03 08:55:25'),(125,'LI','LIE',423,'Liechtenstein','Liechtenstein','Vaduz',NULL,NULL,'2018-01-03 08:55:25'),(126,'LT','LTU',370,'Lithuania','Lituanie','Vilnius',NULL,NULL,'2018-01-03 08:55:25'),(127,'LU','LUX',352,'Luxembourg','Luxembourg','Luxembourg',NULL,NULL,'2018-01-03 08:55:25'),(128,'MO','MAC',853,'Macau S.A.R.','Macao','Macao',NULL,NULL,'2018-01-03 08:55:25'),(129,'MK','MKD',389,'Macedonia','Macédoine','Skopje',NULL,NULL,'2018-01-03 08:55:25'),(130,'MG','MDG',261,'Madagascar','Madagascar','Antananarivo',NULL,NULL,'2018-01-03 08:55:25'),(131,'MW','MWI',265,'Malawi','Malawi','Lilongwe',NULL,NULL,'2018-01-03 08:55:26'),(132,'MY','MYS',60,'Malaysia','Malaisie','Kuala Lumpur',NULL,NULL,'2018-01-03 08:55:26'),(133,'MV','MDV',960,'Maldives','Maldives','Malé',NULL,NULL,'2018-01-03 08:55:26'),(134,'ML','MLI',223,'Mali','Mali','Bamako',NULL,NULL,'2018-01-03 08:55:26'),(135,'MT','MLT',356,'Malta','Malte','Valletta',NULL,NULL,'2018-01-03 08:55:26'),(136,'XM',NULL,NULL,'Man (Isle of)',NULL,NULL,NULL,NULL,NULL),(137,'MH','MHL',692,'Marshall Islands','Îles Marshall','Majuro',NULL,NULL,'2018-01-03 08:55:25'),(138,'MQ',NULL,NULL,'Martinique',NULL,NULL,NULL,NULL,NULL),(139,'MR','MRT',222,'Mauritania','Mauritanie','Nouakchott',NULL,NULL,'2018-01-03 08:55:26'),(140,'MU','MUS',230,'Mauritius','Île Maurice','Port Louis',NULL,NULL,'2018-01-03 08:54:56'),(141,'YT',NULL,NULL,'Mayotte',NULL,NULL,NULL,NULL,NULL),(142,'MX','MEX',52,'Mexico','Mexique','Mexico City',NULL,NULL,'2018-01-03 08:55:26'),(143,'FM','FSM',691,'Micronesia','Micronésie','Palikir',NULL,NULL,'2018-01-03 08:55:26'),(144,'MD','MDA',373,'Moldova','Moldavie','Chişinău',NULL,NULL,'2018-01-03 08:55:26'),(145,'MC','MCO',377,'Monaco','Monaco','Monaco',NULL,NULL,'2018-01-03 08:55:26'),(146,'MN','MNG',976,'Mongolia','Mongolie','Ulan Bator',NULL,NULL,'2018-01-03 08:55:26'),(147,'MS','MSR',1664,'Montserrat','Montserrat','Plymouth',NULL,NULL,'2018-01-03 08:55:26'),(148,'MA','MAR',212,'Morocco','Maroc','Rabat',NULL,NULL,'2018-01-03 08:55:26'),(149,'MZ','MOZ',258,'Mozambique','Mozambique','Maputo',NULL,NULL,'2018-01-03 08:55:26'),(150,'MM','MMR',95,'Myanmar','Myanmar','Nay Pyi Taw',NULL,NULL,'2018-01-03 08:55:26'),(151,'NA','NAM',264,'Namibia','Namibie','Windhoek',NULL,NULL,'2018-01-03 08:55:26'),(152,'NR','NRU',674,'Nauru','Nauru','Yaren',NULL,NULL,'2018-01-03 08:55:26'),(153,'NP','NPL',977,'Nepal','Népal','Kathmandu',NULL,NULL,'2018-01-03 08:55:26'),(154,'AN',NULL,NULL,'Netherlands Antilles',NULL,NULL,NULL,NULL,NULL),(155,'NL','NLD',31,'Netherlands The','Pays-Bas','Amsterdam',NULL,NULL,'2018-01-03 08:55:26'),(156,'NC','NCL',687,'New Caledonia','Nouvelle-Calédonie','Nouméa',NULL,NULL,'2018-01-03 08:55:26'),(157,'NZ','NZL',64,'New Zealand','Nouvelle-Zélande','Wellington',NULL,NULL,'2018-01-03 08:55:26'),(158,'NI','NIC',505,'Nicaragua','Nicaragua','Managua',NULL,NULL,'2018-01-03 08:55:26'),(159,'NE','NER',227,'Niger','Niger','Niamey',NULL,NULL,'2018-01-03 08:55:26'),(160,'NG','NGA',234,'Nigeria','Nigéria','Abuja',NULL,NULL,'2018-01-03 08:55:26'),(161,'NU','NIU',683,'Niue','Nioué','Alofi',NULL,NULL,'2018-01-03 08:55:26'),(162,'NF','NFK',672,'Norfolk Island','Île Norfolk','Kingston',NULL,NULL,'2018-01-03 08:54:56'),(163,'MP','MNP',1670,'Northern Mariana Islands','Îles Mariannes du Nord','Saipan',NULL,NULL,'2018-01-03 08:55:25'),(164,'NO','NOR',47,'Norway','Norvège','Oslo',NULL,NULL,'2018-01-03 08:55:26'),(165,'OM','OMN',968,'Oman','Oman','Muscat',NULL,NULL,'2018-01-03 08:55:26'),(166,'PK','PAK',92,'Pakistan','Pakistan','Islamabad',NULL,NULL,'2018-01-03 08:55:26'),(167,'PW','PLW',680,'Palau','Palaos','Melekeok',NULL,NULL,'2018-01-03 08:55:26'),(168,'PS',NULL,NULL,'Palestinian Territory Occupied',NULL,NULL,NULL,NULL,NULL),(169,'PA','PAN',507,'Panama','Panama','Panama City',NULL,NULL,'2018-01-03 08:55:26'),(170,'PG','PNG',675,'Papua new Guinea','Papouasie-Nouvelle-Guinée','Port Moresby',NULL,NULL,'2018-01-03 08:55:26'),(171,'PY','PRY',595,'Paraguay','Paraguay','Asunción',NULL,NULL,'2018-01-03 08:55:26'),(172,'PE','PER',51,'Peru','Pérou','Lima',NULL,NULL,'2018-01-03 08:55:26'),(173,'PH','PHL',63,'Philippines','Philippines','Manila',NULL,NULL,'2018-01-03 08:55:26'),(174,'PN','PCN',870,'Pitcairn Island','Îles Pitcairn','Adamstown',NULL,NULL,'2018-01-03 08:55:25'),(175,'PL','POL',48,'Poland','Pologne','Warsaw',NULL,NULL,'2018-01-03 08:55:26'),(176,'PT','PRT',351,'Portugal','Portugal','Lisbon',NULL,NULL,'2018-01-03 08:55:27'),(177,'PR','PRI',1,'Puerto Rico','Porto Rico','San Juan',NULL,NULL,'2018-01-03 08:55:27'),(178,'QA','QAT',974,'Qatar','Qatar','Doha',NULL,NULL,'2018-01-03 08:55:27'),(179,'RE','REU',262,'Reunion','La Réunion','Saint-Denis',NULL,NULL,'2018-01-03 08:55:25'),(180,'RO','ROU',40,'Romania','Roumanie','Bucharest',NULL,NULL,'2018-01-03 08:55:27'),(181,'RU','RUS',7,'Russia','Russie','Moscow',NULL,NULL,'2018-01-03 08:55:27'),(182,'RW','RWA',250,'Rwanda','Rwanda','Kigali',NULL,NULL,'2018-01-03 08:55:27'),(183,'SH','SHN',290,'Saint Helena','Sainte-Hélène','Jamestown',NULL,NULL,'2018-01-03 08:55:27'),(184,'KN','KNA',1,'Saint Kitts And Nevis','Saint-Christophe-et-Niévès','Basseterre',NULL,NULL,'2018-01-03 08:55:27'),(185,'LC','LCA',1,'Saint Lucia','Sainte-Lucie','Castries',NULL,NULL,'2018-01-03 08:55:27'),(186,'PM','SPM',508,'Saint Pierre and Miquelon','Saint-Pierre et Miquelon','Saint-Pierre',NULL,NULL,'2018-01-03 08:55:27'),(187,'VC','VCT',1,'Saint Vincent And The Grenadines','Saint-Vincent-et-les Grenadines','Kingstown',NULL,NULL,'2018-01-03 08:55:27'),(188,'WS','WSM',685,'Samoa','Samoa','Apia',NULL,NULL,'2018-01-03 08:55:27'),(189,'SM','SMR',378,'San Marino','Saint-Marin','San Marino',NULL,NULL,'2018-01-03 08:55:27'),(190,'ST','STP',239,'Sao Tome and Principe','Sao Tomé-et-Principe','São Tomé',NULL,NULL,'2018-01-03 08:55:27'),(191,'SA','SAU',966,'Saudi Arabia','Arabie saoudite','Riyadh',NULL,NULL,'2018-01-03 08:53:48'),(192,'SN','SEN',221,'Senegal','Sénégal','Dakar',NULL,NULL,'2018-01-03 08:55:27'),(193,'RS','SRB',381,'Serbia','Serbie','Belgrade',NULL,NULL,'2018-01-03 08:55:27'),(194,'SC','SYC',248,'Seychelles','Seychelles','Victoria',NULL,NULL,'2018-01-03 08:55:27'),(195,'SL','SLE',232,'Sierra Leone','Sierra Leone','Freetown',NULL,NULL,'2018-01-03 08:55:27'),(196,'SG','SGP',65,'Singapore','Singapour','Singapur',NULL,NULL,'2018-01-03 08:55:27'),(197,'SK','SVK',421,'Slovakia','Slovaquie','Bratislava',NULL,NULL,'2018-01-03 08:55:27'),(198,'SI','SVN',386,'Slovenia','Slovénie','Ljubljana',NULL,NULL,'2018-01-03 08:55:27'),(199,'XG',NULL,NULL,'Smaller Territories of the UK',NULL,NULL,NULL,NULL,NULL),(200,'SB','SLB',677,'Solomon Islands','Îles Salomon','Honiara',NULL,NULL,'2018-01-03 08:55:25'),(201,'SO','SOM',252,'Somalia','Somalie','Mogadishu',NULL,NULL,'2018-01-03 08:55:27'),(202,'ZA','ZAF',27,'South Africa','Afrique du Sud','Pretoria',NULL,NULL,'2018-01-03 08:48:34'),(203,'GS',NULL,NULL,'South Georgia',NULL,NULL,NULL,NULL,NULL),(204,'SS','SSD',211,'South Sudan','Soudan du Sud','Juba',NULL,NULL,'2018-01-03 08:55:27'),(205,'ES','ESP',34,'Spain','Espagne','Madrid',NULL,NULL,'2018-01-03 08:53:50'),(206,'LK','LKA',94,'Sri Lanka','Sri Lanka','Colombo',NULL,NULL,'2018-01-03 08:55:27'),(207,'SD','SDN',249,'Sudan','Soudan','Khartoum',NULL,NULL,'2018-01-03 08:55:27'),(208,'SR','SUR',597,'Suriname','Suriname','Paramaribo',NULL,NULL,'2018-01-03 08:55:27'),(209,'SJ',NULL,NULL,'Svalbard And Jan Mayen Islands',NULL,NULL,NULL,NULL,NULL),(210,'SZ','SWZ',268,'Swaziland','Swaziland','Mbabane',NULL,NULL,'2018-01-03 08:55:27'),(211,'SE','SWE',46,'Sweden','Suède','Stockholm',NULL,NULL,'2018-01-03 08:55:27'),(212,'CH','CHE',41,'Switzerland','Suisse','Berne',NULL,NULL,'2018-01-03 08:55:27'),(213,'SY','SYR',963,'Syria','Syrie','Damascus',NULL,NULL,'2018-01-03 08:55:27'),(214,'TW','TWN',886,'Taiwan','Taiwan','Taipei',NULL,NULL,'2018-01-03 08:55:27'),(215,'TJ','TJK',992,'Tajikistan','Tadjikistan','Dushanbe',NULL,NULL,'2018-01-03 08:55:27'),(216,'TZ','TZA',255,'Tanzania','Tanzanie','Dodoma',NULL,NULL,'2018-01-03 08:55:28'),(217,'TH','THA',66,'Thailand','Thaïlande','Bangkok',NULL,NULL,'2018-01-03 08:55:28'),(218,'TG','TGO',228,'Togo','Togo','Lomé',NULL,NULL,'2018-01-03 08:55:28'),(219,'TK','TKL',690,'Tokelau','Tokelau','',NULL,NULL,'2018-01-03 08:55:28'),(220,'TO',NULL,NULL,'Tonga',NULL,NULL,NULL,NULL,NULL),(221,'TT','TTO',1,'Trinidad And Tobago','Trinité-et-Tobago','Port of Spain',NULL,NULL,'2018-01-03 08:55:28'),(222,'TN','TUN',216,'Tunisia','Tunisie','Tunis',NULL,NULL,'2018-01-03 08:55:28'),(223,'TR','TUR',90,'Turkey','Turquie','Ankara',NULL,NULL,'2018-01-03 08:55:28'),(224,'TM','TKM',993,'Turkmenistan','Turkmenistan','Ashgabat',NULL,NULL,'2018-01-03 08:55:28'),(225,'TC',NULL,NULL,'Turks And Caicos Islands',NULL,NULL,NULL,NULL,NULL),(226,'TV','TUV',688,'Tuvalu','Tuvalu','Funafuti',NULL,NULL,'2018-01-03 08:55:28'),(227,'UG','UGA',256,'Uganda','Ouganda','Kampala',NULL,NULL,'2018-01-03 08:55:26'),(228,'UA','UKR',380,'Ukraine','Ukraine','Kiev',NULL,NULL,'2018-01-03 08:55:28'),(229,'AE','ARE',971,'United Arab Emirates','Émirats Arabes Unis','Abu Dhabi',NULL,NULL,'2018-01-03 08:53:50'),(230,'GB','GBR',44,'United Kingdom','Grande-Bretagne','London',NULL,NULL,'2018-01-03 08:53:50'),(231,'US','USA',1,'United States','États-Unis','Washington',NULL,NULL,'2018-01-03 08:53:50'),(232,'UM','USM',1,'United States Minor Outlying Islands',NULL,NULL,NULL,NULL,NULL),(233,'UY','URY',598,'Uruguay','Uruguay','Montevideo',NULL,NULL,'2018-01-03 08:55:28'),(234,'UZ','UZB',998,'Uzbekistan','Ouzbékistan','Tashkent',NULL,NULL,'2018-01-03 08:55:26'),(235,'VU','VUT',678,'Vanuatu','Vanuatu','Port Vila',NULL,NULL,'2018-01-03 08:55:28'),(236,'VA','VAT',39,'Vatican City State (Holy See)','Vatican','Vatican City',NULL,NULL,'2018-01-03 08:55:28'),(237,'VE','VEN',58,'Venezuela','Venezuela','Caracas',NULL,NULL,'2018-01-03 08:55:28'),(238,'VN','VNM',84,'Vietnam','Viêt Nam','Hanoi',NULL,NULL,'2018-01-03 08:55:28'),(239,'VG','VGB',1284,'Virgin Islands (British)','Îles Vierges','Road Town',NULL,NULL,'2018-01-03 08:55:25'),(240,'VI',NULL,NULL,'Virgin Islands (US)',NULL,NULL,NULL,NULL,NULL),(241,'WF',NULL,NULL,'Wallis And Futuna Islands',NULL,NULL,NULL,NULL,NULL),(242,'EH','ESH',212,'Western Sahara','Sahara Occidental','El-Aaiun',NULL,NULL,'2018-01-03 08:55:27'),(243,'YE','YEM',967,'Yemen','Yémen','San‘a’',NULL,NULL,'2018-01-03 08:55:28'),(244,'YU','YUG',891,'Yugoslavia',NULL,NULL,NULL,NULL,NULL),(245,'ZM','ZMB',260,'Zambia','Zambie','Lusaka',NULL,NULL,'2018-01-03 08:55:28'),(246,'ZW','ZWE',263,'Zimbabwe','Zimbabwe','Harare',NULL,NULL,'2018-01-03 08:55:28');
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;


--
-- Table structure for table `referencements`
--

DROP TABLE IF EXISTS `referencements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referencements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tag` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referencements`
--
--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL,
  `role_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,'Customer','client','all those how make an order in the website','2018-01-09 23:00:00','2018-01-09 23:00:00',NULL),(2,'Admin','admin','can see and manage orders, can list all trasaction, can list all client and admin in the website, but can not modify user or role of this.','2018-01-13 13:27:22','2018-01-13 13:27:22',NULL),(3,'Super Admin','superadmin','can do what admin can do, and can manag user and change her role.','2018-01-13 13:27:22','2018-01-13 13:27:22',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
--
-- Table structure for table `soldes`
--

DROP TABLE IF EXISTS `soldes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soldes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `montant_utile` double NOT NULL DEFAULT '0',
  `montant_reserver` double NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soldes`
--

/*!40000 ALTER TABLE `soldes` DISABLE KEYS */;
INSERT INTO `soldes` (`id`, `user_id`, `montant_utile`, `montant_reserver`, `created_at`, `updated_at`, `deleted_at`) VALUES (7,6,-75.95,0,'2018-02-07 23:41:11','2018-02-19 01:06:25',NULL),(8,19,-156.75,0,'2018-02-08 00:28:23','2018-03-07 04:23:28',NULL),(9,28,0,0,'2018-02-19 00:56:02','2018-02-19 01:58:21',NULL),(10,29,-10.45,0,'2018-02-20 03:21:32','2018-02-20 03:29:55',NULL),(11,30,-41.8,0,'2018-03-03 02:57:00','2018-03-03 02:57:00',NULL),(12,31,-62.7,0,'2018-03-05 03:31:08','2018-03-05 03:31:09',NULL),(13,32,-41.8,0,'2018-03-06 00:23:58','2018-03-06 00:23:58',NULL),(14,33,-108.36,0,'2018-03-06 00:49:56','2018-03-06 23:01:23',NULL),(15,7,-94.05000000000001,0,'2018-03-06 05:02:59','2018-09-25 14:45:59',NULL),(16,34,-52.25,0,'2018-03-06 05:07:08','2018-03-06 05:07:08',NULL),(17,35,0,0,'2018-03-06 23:07:30','2018-03-06 23:07:30',NULL),(18,36,-9.93,0,'2018-03-08 05:04:59','2018-03-08 17:43:01',NULL),(19,37,-62.7,0,'2018-03-09 22:45:22','2018-03-09 22:45:22',NULL),(20,38,-51.73,0,'2018-03-10 20:56:41','2018-03-10 20:56:41',NULL);
/*!40000 ALTER TABLE `soldes` ENABLE KEYS */;


--
-- Table structure for table `standarddeadlines`
--

DROP TABLE IF EXISTS `standarddeadlines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `standarddeadlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `nb_days` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `standarddeadlines`
--

/*!40000 ALTER TABLE `standarddeadlines` DISABLE KEYS */;
INSERT INTO `standarddeadlines` (`id`, `nom`, `nb_days`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,'12 Days or more',12,'2018-01-05 16:18:45','2018-01-04 23:00:00',NULL),(2,'8-12 Days',10,'2018-01-05 16:18:45','2018-01-04 23:00:00',NULL),(3,'6-7 Days',7,'2018-01-05 16:18:45','2018-01-04 23:00:00',NULL),(4,'5 Days',5,'2018-01-05 16:18:45','2018-01-26 06:39:46',NULL),(5,'4 Days',4,'2018-01-05 16:18:45','2018-01-04 23:00:00',NULL),(6,'3 Days',3,'2018-01-05 16:18:45','2018-01-04 23:00:00',NULL),(7,'48 Hours',2,'2018-01-05 16:18:45','2018-01-04 23:00:00',NULL);
/*!40000 ALTER TABLE `standarddeadlines` ENABLE KEYS */;

--
-- Table structure for table `structures`
--

DROP TABLE IF EXISTS `structures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `structures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `activation_order_price` double NOT NULL DEFAULT '35',
  `seo_description` text,
  `seo_tag` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `structures`
--

/*!40000 ALTER TABLE `structures` DISABLE KEYS */;
INSERT INTO `structures` (`id`, `nom`, `logo`, `slogan`, `activation_order_price`, `seo_description`, `seo_tag`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,'PaperWeight','','PaperWeight',100,'small desciption of Excel Essay','orders, documents, writer, best prices,','2018-01-10 15:07:25','2018-03-08 17:11:46',NULL);
/*!40000 ALTER TABLE `structures` ENABLE KEYS */;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,'Other','2018-01-06 09:12:10','2018-01-05 23:00:00',NULL),(2,'Accounting','2018-01-06 09:18:06','2018-01-21 09:59:06',NULL),(3,'Anthropology','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(4,'Art &amp; architecture','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(5,'Astronomy','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(6,'Biology','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(7,'Business','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(8,'Chemistry','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(9,'Classic English literature','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(10,'Communication','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(11,'Criminal Law','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(12,'Culture','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(13,'Computer science','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(14,'Economics','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(15,'Ecology','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(16,'Education','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(17,'Engineering','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(18,'English','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(19,'Environmental studies','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(20,'Family and consumer science','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(21,'Film studies','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(22,'Finance','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(23,'Geology','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(24,'Geography','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(25,'History','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(26,'Human Resource Management','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(27,'Investments','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(28,'Journalism','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(29,'Law','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(30,'Literature','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(31,'Management','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(32,'Marketing','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(33,'Mathematics','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(34,'Medicine','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(35,'Music','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(36,'Nursing','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(37,'Philosophy','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(38,'Physics','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(39,'Political science','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(40,'Poetry','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(41,'Psychology','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(42,'Religious studies','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(43,'Shakespeare studies','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(44,'Sociology','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(45,'Sports','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(46,'Statistics','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(47,'Technology','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(48,'Theater studies','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(49,'Tourism','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(50,'Women and gender studies','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(51,'World affairs','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL),(52,'World literature','2018-01-06 09:18:06','2018-01-05 23:00:00',NULL);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terms`
--

/*!40000 ALTER TABLE `terms` DISABLE KEYS */;
INSERT INTO `terms` (`id`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,'<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p style=\"text-align:justify\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p style=\"text-align:justify\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p style=\"text-align:justify\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where can I get some?</h2>\r\n\r\n<p style=\"text-align:justify\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>','2018-02-06 18:52:09','2018-02-06 19:07:31',NULL);
/*!40000 ALTER TABLE `terms` ENABLE KEYS */;


--
-- Table structure for table `typeformats`
--

DROP TABLE IF EXISTS `typeformats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeformats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeformats`
--

/*!40000 ALTER TABLE `typeformats` DISABLE KEYS */;
INSERT INTO `typeformats` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,'APA','2018-01-06 09:21:51','2018-01-21 11:08:01',NULL),(2,'MLA','2018-01-06 09:21:51','2018-01-05 23:00:00',NULL),(3,'Chicago','2018-01-06 09:21:51','2018-01-05 23:00:00',NULL),(4,'Harvard','2018-01-06 09:21:51','2018-01-05 23:00:00',NULL),(5,'Other','2018-01-06 09:21:51','2018-01-05 23:00:00',NULL);
/*!40000 ALTER TABLE `typeformats` ENABLE KEYS */;
--
-- Table structure for table `typeofworks`
--

DROP TABLE IF EXISTS `typeofworks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeofworks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prix_percent` double NOT NULL DEFAULT '0',
  `prix_fixe` double NOT NULL DEFAULT '0',
  `appliquer_prixfixe` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeofworks`
--

/*!40000 ALTER TABLE `typeofworks` DISABLE KEYS */;
INSERT INTO `typeofworks` (`id`, `nom`, `prix_percent`, `prix_fixe`, `appliquer_prixfixe`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,'Writing from scratch',0,0,0,'2018-01-06 09:50:29','2018-01-06 09:50:29',NULL),(2,'Editing/proofreading',0,5,0,'2018-01-06 09:50:29','2018-02-20 03:32:10',NULL),(3,'Problem solving',0,10,0,'2018-01-06 09:50:29','2018-02-20 03:32:32',NULL);
/*!40000 ALTER TABLE `typeofworks` ENABLE KEYS */;

--
-- Table structure for table `typepapers`
--

DROP TABLE IF EXISTS `typepapers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typepapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typepapers`
--


/*!40000 ALTER TABLE `typepapers` DISABLE KEYS */;
INSERT INTO `typepapers` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,'Admission essay','2018-01-05 15:37:20','2018-01-20 13:18:01',NULL),(2,'Annotated bibliography','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(3,'Application letter','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(4,'Argumentative essay','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(5,'Article','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(6,'Article review','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(7,'Biography','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(8,'Book review','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(9,'Business plan','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(10,'Case study','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(11,'Course work','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(12,'Cover letter','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(13,'Creative writing','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(14,'Critical thinking','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(15,'Curriculum vitae','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(16,'Dissertation','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(17,'Dissertation abstract','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(18,'Dissertation chapter','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(19,'Dissertation conclusion','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(20,'Dissertation hypothesis','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(21,'Dissertation introduction','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(22,'Dissertation methodology','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(23,'Dissertation proposal','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(24,'Dissertation results','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(25,'Essay','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(26,'Literature review','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(27,'Movie review','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(28,'Personal statement','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(29,'Presentation','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(30,'Problem solving','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(31,'Report','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(32,'Research paper','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(33,'Research proposal','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(34,'Resume','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(35,'Speech','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(36,'Term paper','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(37,'Thesis','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(38,'Thesis proposal','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL),(39,'Thesis statement','2018-01-05 15:43:51','2018-01-04 23:00:00',NULL);
/*!40000 ALTER TABLE `typepapers` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(20) NOT NULL DEFAULT '1',
  `pay_id` int(11) DEFAULT NULL,
  `login` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexe` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `pay_id`, `login`, `name`, `email`, `avatar`, `tel1`, `tel2`, `sexe`, `remember_token`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES (6,3,1,'admin','Administrator','admin@admin.com','5a5cb3b6e620f.png',NULL,NULL,NULL,'8TapRA8uKjipUE5n3klg52c3wH0rWPtGzB9XKgg5V4DjF5pCzKbYkYF88I02','$2y$10$jOYowiuRQarnRxjPxipAiOCma3Wotn.WP6Cys38Mb1wwzZLXyc8X6','2018-01-13 12:32:58','2018-01-15 16:21:12',NULL),(7,3,1,'Sreezarman','Sreezarman','Sreezarman@gmail.com',NULL,NULL,NULL,NULL,'v55VXcX9MdH2OajMP0OpFWCVc76uk5OomPxRq9ZuTxu1tvCEpt0zW02Cimhl','$2y$10$WsntAnwXL/tO0K.nwonDuuKVr9LJbCqNkCqc3mLtAD9v/M9mEVBQC','2018-01-11 15:41:15','2018-04-20 23:45:14',NULL),(19,1,NULL,NULL,NULL,'koreamts38@gmail.com',NULL,'1830317094',NULL,NULL,'fgPRMjHicbSwqVilkqDEarhAx1fiGBIfweSf5teqqVnRc4UWH3Opo8rxKC7R','$2y$10$vsm2zda8xAfpArVQu7GCme9mmJt9qmtQVQuAlxpnzbbabScGkNcZ6','2018-02-08 00:28:10','2018-02-08 00:28:10',NULL),(28,1,NULL,NULL,'test','rogerramsses@yahoo.fr',NULL,NULL,NULL,NULL,NULL,'$2y$10$nfsVaaZcO/Qb4j2XJrJMPuYTRSSK9/BQYypIeDJ.W4j1WoFD3iC2i','2018-02-19 00:55:53','2018-02-19 00:55:53',NULL),(29,1,NULL,NULL,'Arman','sreezaarman@gmail.com',NULL,NULL,NULL,NULL,NULL,'$2y$10$MOHQjoeadxw92lnIpwiUHulUPxpa98NVZjnpqzJ/5WhBculhISvXi','2018-02-20 03:21:25','2018-02-20 03:21:25',NULL),(30,1,NULL,NULL,NULL,'rmn_ali@yahoo.com',NULL,'165854488',NULL,NULL,'2vifAtDMVy1oYiLAEncvyvTKqF8fyKEVd5hjBMORVf5QujWDfD82n0dBmCi4','$2y$10$q/rXGTdbL8u/5hmKtYmVbuV5n/C5NRKos3/pqeUVDUFaoeKnGn/NW','2018-03-03 02:56:52','2018-03-03 02:56:52',NULL),(31,1,NULL,NULL,NULL,'ahavavgHa@gmail.com',NULL,NULL,NULL,NULL,'O3nQ2YOpl45YUdfVr3ierg1eXPHIJvJYPx0YjGS8Jol4q9h2FykwlMcD6Q8z','$2y$10$fzGWmPL/x.NMp44pobTcKuQeZ42mFOOXgoqkK/tnFu.E/S5gS5/.e','2018-03-05 03:29:59','2018-03-05 03:29:59',NULL),(32,1,NULL,NULL,NULL,'hshabja@hab.com',NULL,'4649',NULL,NULL,'5tZ1ImEXrfjxDG39Upf22536iGpV8EFW7B3KEzOMsLbwcHDQohIcOEQ8cXyt','$2y$10$xETR.yJdqsUW8CLbbANRSOQmWWOLS/NuRR4EQ3o63/ooXFwKI6xzW','2018-03-06 00:23:42','2018-03-06 00:23:42',NULL),(33,1,NULL,NULL,'Roger Ndouop Choutvet','ncr.roger@gmail.com',NULL,NULL,NULL,NULL,'USkj33GX2BZoi62kWz3vTsYFiven6ufXqT2kOo84faMa2Vwp610XdNZY7WLG','$2y$10$E8kYvyn81ttI5v69y67iwuobCO6yyxZs.pmS7zwjuy.fLAKCPIE0W','2018-03-06 00:49:12','2018-03-06 00:49:12',NULL),(34,1,NULL,NULL,NULL,'wedfuhjkqwe@gak.com',NULL,'282772',NULL,NULL,'a45QHEkRJxYWVgyVZqUCJ0Sy67e0F1IxtcvBH5v6WnPZ8at47Aqac01Bj3fG','$2y$10$HV8kIXc4SOJSTl03piFr7umv2gpTKcXHHZA8RxGJ9ehZ2JUAK4iYG','2018-03-06 05:06:42','2018-03-06 05:06:42',NULL),(35,1,1,NULL,'alice W.','alicelactio@gmail.com',NULL,NULL,NULL,NULL,'MKNjiIrZxw0w8JnVmtGrJJg0nELwF0pZwyGHiIvin8ecyX956FrvsHGrujBF','$2y$10$fRBVdmydPG2qB1YFOVybaO.9pWEFoUCYAKqjqbXyd3pWUfMOmOxGi','2018-03-06 22:50:13','2018-04-20 23:45:33',NULL),(36,1,NULL,NULL,NULL,'test123@test.com',NULL,NULL,NULL,NULL,'tH9r7eR9kh0FU1Bx101DnGW1wG0k969X8Sod09o5Dy6bX5k17yBJYA8fuWYn','$2y$10$mMSf0uuSp60aY8JbLzGSzOl028ltBxtnBTeq02JdIJmRj4A238tVS','2018-03-08 05:03:21','2018-03-08 05:03:21',NULL),(37,1,NULL,NULL,NULL,'test@test.com',NULL,'2345654343',NULL,NULL,'JiJMAwZtiw4CA896HrXdR1sJ54ElGMss7gzztAPNCy99jGBTTLzzcdQ9HU3S','$2y$10$pPaG53dxP0wVIlTUDVPa2eImQ2OyEGVu4m2z0Nph.DkTUt8yxirZe','2018-03-09 22:45:07','2018-03-09 22:45:07',NULL),(38,1,NULL,NULL,NULL,'yhhgh@jhvb.com',NULL,'698999999',NULL,NULL,'Gw9N7Nr0MnvremSU3NepDR8oTGa8M6S3VhQYvInDDbpXScXU4EwW0bLpK64r','$2y$10$E.pBjlDwYKarFZbGrZsdXuhVi4UiAd7r4Ex4mIK/1FOYBj4ufk/b2','2018-03-10 20:56:27','2018-03-10 20:56:27',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Table structure for table `userslevels`
--

DROP TABLE IF EXISTS `userslevels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userslevels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prix_percent` double NOT NULL DEFAULT '0',
  `prix_fixe` double NOT NULL DEFAULT '0',
  `appliquer_prixfixe` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userslevels`
--

/*!40000 ALTER TABLE `userslevels` DISABLE KEYS */;
INSERT INTO `userslevels` (`id`, `nom`, `prix_percent`, `prix_fixe`, `appliquer_prixfixe`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,'Best available',0,0,0,'2018-01-06 09:56:00','2018-01-06 09:56:00',NULL),(2,'PRO writer',25,0,0,'2018-01-06 09:56:00','2018-01-06 09:56:00',NULL);
/*!40000 ALTER TABLE `userslevels` ENABLE KEYS */;
--
-- Table structure for table `wordpages`
--

DROP TABLE IF EXISTS `wordpages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wordpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `nb_word` int(11) NOT NULL,
  `percentage_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wordpages`
--

/*!40000 ALTER TABLE `wordpages` DISABLE KEYS */;
INSERT INTO `wordpages` (`id`, `nom`, `nb_word`, `percentage_price`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,'single',275,0,'2018-01-06 10:01:36','2018-01-21 19:08:05',NULL),(2,'double',550,100,'2018-01-06 10:01:36','2018-01-06 10:01:36',NULL);
