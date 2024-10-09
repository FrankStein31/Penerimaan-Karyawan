/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - pabrikgula
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pabrikgula` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `pabrikgula`;

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `departments` */

insert  into `departments`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'IT','2024-08-10 11:44:48','2024-08-10 12:25:18'),
(2,'Packing','2024-08-10 11:45:55','2024-08-10 11:45:55'),
(3,'Keuangan','2024-08-11 04:00:20','2024-08-11 04:00:20'),
(4,'Security','2024-08-11 04:26:09','2024-08-11 04:26:09');

/*Table structure for table `job_applications` */

DROP TABLE IF EXISTS `job_applications`;

CREATE TABLE `job_applications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `lokers_id` bigint(20) unsigned NOT NULL,
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `application_file` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_applications_user_id_foreign` (`user_id`),
  KEY `job_applications_lokers_id_foreign` (`lokers_id`),
  CONSTRAINT `job_applications_lokers_id_foreign` FOREIGN KEY (`lokers_id`) REFERENCES `lokers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `job_applications` */

/*Table structure for table `lokers` */

DROP TABLE IF EXISTS `lokers`;

CREATE TABLE `lokers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `department_id` bigint(20) unsigned NOT NULL,
  `position_id` bigint(20) unsigned NOT NULL,
  `max_applicants` int(11) NOT NULL,
  `salary` decimal(10,2) DEFAULT 0.00,
  `description` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `statement_letter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lokers_department_id_foreign` (`department_id`),
  KEY `lokers_position_id_foreign` (`position_id`),
  CONSTRAINT `lokers_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lokers_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `lokers` */

insert  into `lokers`(`id`,`name`,`department_id`,`position_id`,`max_applicants`,`salary`,`description`,`photo`,`statement_letter`,`created_at`,`updated_at`) values 
(1,'Dibutuhkan Kepala Bidang IT Support Segera',1,1,5,2000000.00,'- Mampu mengoperasikan website admin\r\n- Menguasai minimal 2 bahasa pemograman\r\n- Dapat bekerja di luar jam kerja\r\nNB : Dari 5 pengajuan akan diterima 1','photos/ODxFt6tSrvcmO5taeE697E0T52pd66uvBwBBS6YE.jpg','statements/OzS1o4hNsl0VWt7ci4wm1KqlkqgqJFmFaVbaEOLJ.pdf','2024-08-10 11:49:13','2024-08-11 03:55:34'),
(4,'Dibutuhkan Bendahara Keuangan',3,4,10,1500000.00,'- Minimal Lulusan S1 Akuntansi/Keuangan\r\n- Mampu Mengoperasikan Excel\r\n- Akan diterima 3 dari 10 pelamar','photos/HwutL7qDI7hBDib16VDA34SuiaM57CZklQ2dSYPX.jpg','statements/y9PoNWZMiFke3oi7jGxMeo58YDBgobhL0fdf6iYo.pdf','2024-08-11 04:17:48','2024-08-11 04:17:48'),
(5,'coba',2,2,99999,0.00,'coba','photos/8EAGAP7l48S15Ftuh64WNk7IGibamCLjA2ZQpUoP.png','statements/8iKLCtIV4EXcgF2pv4Pmf1ERUVh3lQ76BWf0ZeH7.pdf','2024-10-09 00:37:25','2024-10-09 00:37:25');

/*Table structure for table `positions` */

DROP TABLE IF EXISTS `positions`;

CREATE TABLE `positions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `department_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `positions_department_id_foreign` (`department_id`),
  CONSTRAINT `positions_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `positions` */

insert  into `positions`(`id`,`name`,`department_id`,`created_at`,`updated_at`) values 
(1,'Kepala Bidang',1,'2024-08-10 11:45:00','2024-08-10 12:27:54'),
(2,'Petugas Packing',2,'2024-08-10 11:46:06','2024-08-10 11:46:06'),
(3,'Admin',3,'2024-08-11 04:00:36','2024-08-11 04:00:36'),
(4,'Bendahara',3,'2024-08-11 04:01:17','2024-08-11 04:01:17'),
(5,'Petugas Keamanan',4,'2024-08-11 04:26:22','2024-08-11 04:26:22');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`last_name`,`email`,`email_verified_at`,`password`,`phone`,`birth_date`,`address`,`education`,`is_admin`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin','Pabrik Gula','admin@gmail.com',NULL,'$2y$12$Da4oxuRPhrPyVTV.2.RRtOGpXlvI0T83/aWICnLB1hRcXJWjyMd2.',NULL,NULL,NULL,NULL,1,NULL,'2024-08-09 15:40:38','2024-10-09 02:11:01'),
(2,'HRD','Pabrik Gula','hrd@gmail.com',NULL,'$2y$12$qxB1TpfUaPCfS.8OreBe.uzsn5L6PvEH3nuoNabeGgDVI2MPe77SO',NULL,NULL,NULL,NULL,2,NULL,'2024-08-11 07:20:31','2024-08-11 07:20:31'),
(3,'Cavin','Ardiansyach','cavin@gmail.com',NULL,'$2y$12$wdmAV2iIKkZAXrN//QGL..nW5OhK.7GaUb4Jkftg3HYwEnTi.MEkm',NULL,NULL,NULL,NULL,0,NULL,'2024-10-09 01:55:29','2024-10-09 01:55:29');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
