/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_dummy_mtf_3
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_dummy_mtf_3` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_dummy_mtf_3`;

/*Table structure for table `tb_agreement` */

DROP TABLE IF EXISTS `tb_agreement`;

CREATE TABLE `tb_agreement` (
  `no_aplikasi` int(15) NOT NULL AUTO_INCREMENT,
  `id_so` int(11) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `nama_debitur` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `tgl_appin` datetime NOT NULL,
  `tgl_golive` datetime NOT NULL,
  `lending_amt` decimal(15,0) NOT NULL,
  PRIMARY KEY (`no_aplikasi`),
  KEY `fk_id_so` (`id_so`),
  KEY `fk_id_dealer4` (`id_dealer`),
  CONSTRAINT `fk_id_dealer4` FOREIGN KEY (`id_dealer`) REFERENCES `tb_dealer` (`id_dealer`),
  CONSTRAINT `fk_id_so` FOREIGN KEY (`id_so`) REFERENCES `tb_so` (`id_so`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_agreement` */

insert  into `tb_agreement`(`no_aplikasi`,`id_so`,`id_dealer`,`nama_debitur`,`jenis_kendaraan`,`tgl_appin`,`tgl_golive`,`lending_amt`) values 
(1,1,1,'Dian Hariyah','Mobil','2022-01-03 14:56:41','2022-01-05 14:56:41',400000000),
(3,1,2,'Eko Dongoran','Mobil','2022-01-03 15:59:50','2022-01-06 14:59:50',400000000),
(4,1,3,'Novi Usamah','Mobil','2022-01-03 16:01:50','2022-01-04 11:03:50',500000000),
(5,1,5,'Cayadi Saragih','Motor','2022-01-03 16:10:50','2022-01-03 14:59:50',20000000),
(6,1,3,'Cahyo Hidayanto','Motor','2022-01-03 16:15:50','2022-01-06 14:00:50',26000000),
(7,1,4,'Hari Ramadan','Motor','2022-01-03 16:23:50','2022-01-05 14:59:50',38000000),
(8,1,3,'Gambira Pangestu','Motor','2022-01-03 16:23:50','2022-01-03 14:59:50',10000000),
(9,2,2,'Lulut Wahyudin','Bus','2022-01-03 09:06:40','2022-01-05 13:06:40',1300000000),
(10,2,2,'Agnes Mayasari','Mobil','2022-01-03 10:06:40','2022-01-04 13:06:40',8000000000),
(11,2,4,'Warta Adriansyah','Mobil','2022-01-03 10:46:40','2022-01-04 15:06:40',650000000),
(12,2,3,'Zahra Uyainah','Mobil','2022-01-03 11:06:40','2022-01-08 13:06:40',745000000),
(13,2,5,'Radit Irawan','Motor','2022-01-03 12:06:40','2022-01-06 15:06:40',360000000),
(14,2,2,'Victoria Sudiati','Mobil','2022-01-03 10:06:40','2022-01-04 13:06:40',6580000000),
(15,3,3,'Hana Mulyani','Motor','2022-01-03 10:15:22','2022-01-06 15:15:22',20000000),
(16,3,3,'Ida Mayasari','Motor','2022-01-03 10:50:22','2022-01-05 15:20:22',48000000),
(17,3,4,'Budi Siregar','Mobil','2022-01-03 11:50:22','2022-01-07 15:20:22',450000000),
(18,3,5,'Chishiya Siregar','Mobil','2022-01-03 10:50:22','2022-01-05 15:20:22',3200000000),
(19,3,1,'Shakila Mulyani','Motor','2022-01-03 13:50:22','2022-01-05 09:20:22',26000000),
(20,3,3,'Ellis Usamah','Motor','2022-01-03 14:50:22','2022-01-05 14:20:22',36000000),
(21,4,4,'Damu Ramadan','Motor','2022-01-03 09:23:15','2022-01-07 15:23:15',48000000),
(22,4,4,'Lidya Kusmawati','Motor','2022-01-03 10:23:15','2022-01-07 10:23:15',36000000),
(23,4,1,'Rudi Suryono','Motor','2022-01-03 11:23:15','2022-01-05 14:23:15',20000000),
(24,4,2,'Yuliana Wahyuni','Motor','2022-01-03 09:23:15','2022-01-07 15:23:15',34000000),
(25,4,3,'Zizi Suryatmi','Mobil','2022-01-03 09:23:15','2022-01-07 15:23:15',360000000),
(26,4,4,'Ganep Zulkarnain','Motor','2022-01-03 09:23:15','2022-01-07 15:23:15',26000000),
(27,4,5,'Prakosa Manullag','Motor','2022-01-03 09:23:15','2022-01-07 15:23:15',50000000),
(28,5,1,'Ikin Prasetyo','Mobil','2022-01-03 15:30:30','2022-01-06 15:30:30',1200000000),
(29,5,1,'Emas Natsir','Mobil','2022-01-03 15:30:30','2022-01-06 15:30:30',1100000000),
(30,5,1,'Jessica Widiastuti','Mobil','2022-01-03 15:30:30','2022-01-06 15:30:30',1100000000),
(31,5,1,'Salimah Nasyiah','Motor','2022-01-03 15:30:30','2022-01-06 15:30:30',20000000),
(32,5,5,'Halima Susanti','Motor','2022-01-03 15:30:30','2022-01-06 15:30:30',20000000),
(33,5,5,'Mila Mulyani','Motor','2022-01-03 15:30:30','2022-01-06 15:30:30',20000000),
(34,5,4,'Karta Widodo','Motor','2022-01-03 15:30:30','2022-01-06 15:30:30',20000000),
(35,5,5,'Arsipatra Santoso','Motor','2022-01-03 15:30:30','2022-01-06 15:30:30',20000000);

/*Table structure for table `tb_cabang` */

DROP TABLE IF EXISTS `tb_cabang`;

CREATE TABLE `tb_cabang` (
  `id_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_cabang` */

insert  into `tb_cabang`(`id_cabang`,`nama`,`lokasi`) values 
(1,'Fatmawati','Jakarta Selatan'),
(2,'Imam Bonjol','Jakarta Pusat'),
(3,'Thamrin','Jakarta Pusat'),
(4,'Tanah Abang','Jakarta Pusat'),
(5,'Cibinong','Bogor');

/*Table structure for table `tb_dealer` */

DROP TABLE IF EXISTS `tb_dealer`;

CREATE TABLE `tb_dealer` (
  `id_dealer` int(11) NOT NULL,
  `nama_dealer` varchar(255) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `id_PIC` int(11) NOT NULL,
  PRIMARY KEY (`id_dealer`),
  KEY `fk_id_cabang2` (`id_cabang`),
  KEY `fk_id_pic` (`id_PIC`),
  CONSTRAINT `fk_id_cabang2` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_pic` FOREIGN KEY (`id_PIC`) REFERENCES `tb_pic` (`id_PIC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_dealer` */

insert  into `tb_dealer`(`id_dealer`,`nama_dealer`,`id_cabang`,`id_PIC`) values 
(1,'Jeje Respati',1,1),
(2,'Luna Septha',1,1),
(3,'Hari Widodo',1,1),
(4,'Wahyu Raharja',1,1),
(5,'Uul Madana',1,1),
(6,'Hendi Mahatma',2,2),
(7,'Ita Nala',2,2),
(8,'Meri Jayanti',2,2),
(9,'Jojo Hanafi',2,2),
(10,'Tata Bulan',2,2),
(11,'Ale Darsa',3,3),
(12,'Bunga Jelita',3,3),
(13,'Jihan Lelana',3,3),
(14,'Geri Lingga',3,3),
(15,'Rafti Ayu',3,3),
(16,'Naufal Kala',4,4),
(17,'Terry Madaharsa',4,4),
(18,'Erin Nirmala',4,4),
(19,'Haikal Panca',4,4),
(20,'Ceri Rezvan',4,4),
(21,'Risma Mirta',5,5),
(22,'Raka Tama',5,5),
(23,'Tayo Ulung',5,5),
(24,'Desi Utami',5,5),
(25,'Wulan Widya',5,5);

/*Table structure for table `tb_pfm_dealer` */

DROP TABLE IF EXISTS `tb_pfm_dealer`;

CREATE TABLE `tb_pfm_dealer` (
  `id_pfm_dealer` int(11) NOT NULL AUTO_INCREMENT,
  `id_cabang` int(11) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `id_pic` int(11) NOT NULL,
  `pencapaian` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `periode` datetime NOT NULL,
  PRIMARY KEY (`id_pfm_dealer`),
  KEY `fk_id_cabang3` (`id_cabang`),
  KEY `fk_id_dealer` (`id_dealer`),
  KEY `fk_id_pic2` (`id_pic`),
  CONSTRAINT `fk_id_cabang3` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`),
  CONSTRAINT `fk_id_dealer` FOREIGN KEY (`id_dealer`) REFERENCES `tb_dealer` (`id_dealer`),
  CONSTRAINT `fk_id_pic2` FOREIGN KEY (`id_pic`) REFERENCES `tb_pic` (`id_PIC`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pfm_dealer` */

insert  into `tb_pfm_dealer`(`id_pfm_dealer`,`id_cabang`,`id_dealer`,`id_pic`,`pencapaian`,`target`,`periode`) values 
(1,1,1,1,7,7,'2023-01-19 09:35:32'),
(2,1,2,2,5,7,'2022-01-03 23:35:32'),
(3,1,3,3,8,7,'2022-01-03 23:35:32'),
(4,1,4,4,7,7,'2022-01-03 23:35:32'),
(5,1,5,5,7,7,'2022-01-03 23:35:32');

/*Table structure for table `tb_pfm_lending` */

DROP TABLE IF EXISTS `tb_pfm_lending`;

CREATE TABLE `tb_pfm_lending` (
  `id_pfm_lending` int(11) NOT NULL AUTO_INCREMENT,
  `id_cabang` int(11) NOT NULL,
  `periode` datetime NOT NULL,
  `komitment` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `aktual` varchar(255) NOT NULL,
  `achv` decimal(10,1) NOT NULL,
  `gap` int(11) NOT NULL,
  `app_in` varchar(11) NOT NULL,
  `approved` varchar(11) NOT NULL,
  `purchase_order` varchar(11) NOT NULL,
  `golive` varchar(11) NOT NULL,
  `lending` decimal(11,0) NOT NULL,
  `totalepd` decimal(11,0) NOT NULL,
  `totaloverdue` decimal(11,0) NOT NULL,
  `totalnpl` decimal(11,0) NOT NULL,
  `totalcwo` decimal(11,0) NOT NULL,
  PRIMARY KEY (`id_pfm_lending`),
  KEY `fk_id_cabang5` (`id_cabang`),
  CONSTRAINT `fk_id_cabang5` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pfm_lending` */

insert  into `tb_pfm_lending`(`id_pfm_lending`,`id_cabang`,`periode`,`komitment`,`target`,`aktual`,`achv`,`gap`,`app_in`,`approved`,`purchase_order`,`golive`,`lending`,`totalepd`,`totaloverdue`,`totalnpl`,`totalcwo`) values 
(1,1,'2023-01-23 00:00:00','20','19','10',65.6,57,'34','5','99','99',100,5,3,3,3),
(2,1,'2023-01-25 00:00:00','23','19','12',68.3,54,'36','7','97','97',117,4,6,5,4),
(3,1,'2023-01-24 22:47:00','25','22','20',55.5,53,'63','5','98','98',121,5,3,6,5),
(5,1,'2023-01-22 22:47:53','20','19','10',65.5,57,'35','2','98','95',111,4,5,6,5),
(7,1,'2023-01-26 22:51:20','21','15','14',80.0,60,'68','6','88','88',103,6,9,6,3),
(9,1,'2023-01-27 22:52:31','30','25','20',80.3,52,'56','5','88','92',101,5,6,5,4);

/*Table structure for table `tb_pfm_profit` */

DROP TABLE IF EXISTS `tb_pfm_profit`;

CREATE TABLE `tb_pfm_profit` (
  `id_pfm_profit` int(11) NOT NULL AUTO_INCREMENT,
  `id_cabang` int(11) NOT NULL,
  `komponen_profit` varchar(255) NOT NULL,
  `profit` decimal(11,0) NOT NULL,
  `profit_V2` decimal(11,0) NOT NULL,
  `sim_profit` decimal(11,0) NOT NULL,
  `periode` datetime NOT NULL,
  PRIMARY KEY (`id_pfm_profit`),
  KEY `fk_id_cabang6` (`id_cabang`),
  CONSTRAINT `fk_id_cabang6` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pfm_profit` */

/*Table structure for table `tb_pfm_so` */

DROP TABLE IF EXISTS `tb_pfm_so`;

CREATE TABLE `tb_pfm_so` (
  `id_pfm_so` int(11) NOT NULL AUTO_INCREMENT,
  `id_so` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `id_spv` int(11) NOT NULL,
  `pencapaian` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `periode` datetime NOT NULL,
  PRIMARY KEY (`id_pfm_so`),
  KEY `fk_id_cabang4` (`id_cabang`),
  KEY `fk_id_spv2` (`id_spv`),
  KEY `fk_id_so2` (`id_so`),
  CONSTRAINT `fk_id_cabang4` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_so2` FOREIGN KEY (`id_so`) REFERENCES `tb_so` (`id_so`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_spv2` FOREIGN KEY (`id_spv`) REFERENCES `tb_supervisor` (`id_spv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pfm_so` */

insert  into `tb_pfm_so`(`id_pfm_so`,`id_so`,`id_cabang`,`id_spv`,`pencapaian`,`target`,`periode`) values 
(5,1,1,1,7,5,'2022-01-03 23:38:45'),
(6,2,1,2,6,5,'2022-01-03 23:38:45'),
(7,3,1,3,6,5,'2022-01-03 23:38:45'),
(8,4,1,4,7,5,'2022-01-03 23:38:45'),
(9,5,1,5,8,5,'2022-01-03 23:38:45');

/*Table structure for table `tb_pic` */

DROP TABLE IF EXISTS `tb_pic`;

CREATE TABLE `tb_pic` (
  `id_PIC` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id_PIC`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pic` */

insert  into `tb_pic`(`id_PIC`,`nama`) values 
(1,'Nadiatus Salam'),
(2,'Ilma Dzakiah'),
(3,'Anisatul Marifah'),
(4,'Sasqia Puteri'),
(5,'Rama Rama');

/*Table structure for table `tb_so` */

DROP TABLE IF EXISTS `tb_so`;

CREATE TABLE `tb_so` (
  `id_so` int(11) NOT NULL,
  `nama_so` varchar(255) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `id_spv` int(11) NOT NULL,
  PRIMARY KEY (`id_so`),
  KEY `fk_id_cabang` (`id_cabang`),
  KEY `fk_id_spv` (`id_spv`),
  CONSTRAINT `fk_id_cabang` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_spv` FOREIGN KEY (`id_spv`) REFERENCES `tb_supervisor` (`id_spv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_so` */

insert  into `tb_so`(`id_so`,`nama_so`,`id_cabang`,`id_spv`) values 
(1,'Sarah Andri',1,1),
(2,'Aji Adika',1,1),
(3,'Lili Bisma',1,1),
(4,'Abyan Estu',1,1),
(5,'Cinta Daniswara',1,1),
(6,'Marni Ganendra',2,2),
(7,'Hanum Dianti',2,2),
(8,'Rara Hayu',2,2),
(9,'Anna Lestari',2,2),
(10,'Zaidan Pramana',2,2),
(11,'Yupi Wardana',3,3),
(12,'Budi Yoga',3,3),
(13,'Noni Tantri',3,3),
(14,'Tompi Praba',3,3),
(15,'Oti Satria',3,3),
(16,'Reza Swasti',4,4),
(17,'Dewi Tyas',4,4),
(18,'Tantri Naresh',4,4),
(19,'Sandra Karina',4,4),
(20,'Ira Kemala',4,4),
(21,'Maya Paramita',5,5),
(22,'Wega Edi',5,5),
(23,'Dedo Batari',5,5),
(24,'Anggun Ina',5,5),
(25,'Intan Jelita',5,5);

/*Table structure for table `tb_supervisor` */

DROP TABLE IF EXISTS `tb_supervisor`;

CREATE TABLE `tb_supervisor` (
  `id_spv` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id_spv`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_supervisor` */

insert  into `tb_supervisor`(`id_spv`,`nama`) values 
(1,'Mega Nanda'),
(2,'Cinta Ida'),
(3,'Jason Hilal'),
(4,'Abby Rizky'),
(5,'Gerry Putra');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_cabang` int(10) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_manager_cabang` (`id_cabang`),
  CONSTRAINT `user_manager_cabang` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`username`,`password`,`id_cabang`,`jenis_kelamin`,`fullname`,`email`,`created_at`,`last_login`) values 
(1,'Johan','$2y$10$3EXGj29b3meTcLg.SUvXR.1tfFBPYVh217.GVKaTHaZQzB3vEtPHq',1,'0','Johanes Salim','johannes@gmail.com','2023-01-19 16:44:02','2023-01-24 07:48:16'),
(2,'Teuku','$2y$10$JZb1g.Az95kE9tKWmt.I7.jsOgsObmPuoYpNo4WSioVcvWHS2/LPG',2,'0','Teuku Rangga','','2023-01-19 16:44:02',NULL),
(3,'Bella','$2y$10$p9juz3wOave.b2kCh4kDEuHdtp1D8t5zSPNBvu2esOJh6L3ZAAarm',3,'1','Bella Hadid','','2023-01-19 16:44:02',NULL),
(4,'Fatah','$2y$10$kj7XmiZJeax4DCLiH4jRCelzT4s9k0uvaR4GiVrXwNZ8dpRK9F1Uy',4,'0','Fatah Morgan','','2023-01-19 16:44:02',NULL),
(5,'Helen','$2y$10$PXgmzAaa5XQwwgG.ECvoueqflqTPosTLQQUVke.BbwIIpX0TgcQZS',5,'1','Helen Wuri','','2023-01-19 16:44:02',NULL),
(6,'Diyuyut','$2y$10$O/OymT71yfIWJEFScv9lc.PT3vAvHIq8dlrk0snZ2vFUskOfCKEeu',3,'1','Diyuyut Jaktim','','2023-01-19 16:44:02','2023-01-23 16:44:36');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
