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

/*Table structure for table `applicant_answers` */

DROP TABLE IF EXISTS `applicant_answers`;

CREATE TABLE `applicant_answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `job_application_id` bigint(20) unsigned NOT NULL,
  `department_question_id` bigint(20) unsigned NOT NULL,
  `selected_answer` char(1) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_application_id` (`job_application_id`),
  KEY `department_question_id` (`department_question_id`),
  CONSTRAINT `applicant_answers_ibfk_1` FOREIGN KEY (`job_application_id`) REFERENCES `job_applications` (`id`) ON DELETE CASCADE,
  CONSTRAINT `applicant_answers_ibfk_2` FOREIGN KEY (`department_question_id`) REFERENCES `department_questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `applicant_answers` */

insert  into `applicant_answers`(`id`,`job_application_id`,`department_question_id`,`selected_answer`,`is_correct`,`created_at`,`updated_at`) values 
(1,1,21,'A',0,'2024-10-09 04:55:18','2024-10-09 04:55:18'),
(2,1,22,'B',0,'2024-10-09 04:55:18','2024-10-09 04:55:18'),
(3,1,23,'B',1,'2024-10-09 04:55:18','2024-10-09 04:55:18'),
(4,1,24,'B',1,'2024-10-09 04:55:18','2024-10-09 04:55:18'),
(5,1,25,'A',0,'2024-10-09 04:55:18','2024-10-09 04:55:18'),
(6,1,26,'C',0,'2024-10-09 04:55:18','2024-10-09 04:55:18'),
(7,1,27,'A',0,'2024-10-09 04:55:18','2024-10-09 04:55:18'),
(8,1,28,'C',0,'2024-10-09 04:55:18','2024-10-09 04:55:18'),
(9,1,29,'B',1,'2024-10-09 04:55:18','2024-10-09 04:55:18'),
(10,1,30,'A',1,'2024-10-09 04:55:18','2024-10-09 04:55:18'),
(11,2,31,'B',1,'2024-10-09 05:43:43','2024-10-09 05:43:43'),
(12,2,32,'B',0,'2024-10-09 05:43:43','2024-10-09 05:43:43'),
(13,2,33,'A',1,'2024-10-09 05:43:43','2024-10-09 05:43:43'),
(14,2,34,'C',1,'2024-10-09 05:43:43','2024-10-09 05:43:43'),
(15,2,35,'C',0,'2024-10-09 05:43:43','2024-10-09 05:43:43'),
(16,2,36,'C',0,'2024-10-09 05:43:43','2024-10-09 05:43:43'),
(17,2,37,'C',1,'2024-10-09 05:43:43','2024-10-09 05:43:43'),
(18,2,38,'A',0,'2024-10-09 05:43:43','2024-10-09 05:43:43'),
(19,2,39,'C',1,'2024-10-09 05:43:43','2024-10-09 05:43:43'),
(20,2,40,'B',0,'2024-10-09 05:43:43','2024-10-09 05:43:43');

/*Table structure for table `department_questions` */

DROP TABLE IF EXISTS `department_questions`;

CREATE TABLE `department_questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `department_id` bigint(20) unsigned NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_answer` char(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `department_questions_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `department_questions` */

insert  into `department_questions`(`id`,`department_id`,`question`,`option_a`,`option_b`,`option_c`,`option_d`,`correct_answer`,`created_at`,`updated_at`) values 
(21,5,'Apa fungsi utama seorang petugas keamanan di area pabrik?','Mengawasi proses produksi','Melindungi aset pabrik dari ancaman','Menyusun laporan keuangan','Menjaga kebersihan lingkungan pabrik','B','2024-10-09 04:38:40','2024-10-09 04:38:40'),
(22,5,'Langkah pertama yang harus dilakukan petugas keamanan saat terjadi kebakaran di pabrik adalah?','Menghubungi manajer produksi','Mematikan semua mesin','Mengaktifkan alarm kebakaran','Mengumpulkan pekerja di ruang rapat','C','2024-10-09 04:38:40','2024-10-09 04:38:40'),
(23,5,'Bagaimana cara terbaik untuk mencegah pencurian di area pabrik?','Mengurangi jumlah karyawan','Meningkatkan pengawasan CCTV','Membatasi akses ke area produksi','Mengurangi jam kerja malam','B','2024-10-09 04:38:40','2024-10-09 04:38:40'),
(24,5,'Apa yang harus dilakukan petugas keamanan jika menemukan seseorang tanpa identifikasi di dalam pabrik?','Mengizinkan masuk setelah ditanya','Membawa ke kantor keamanan untuk verifikasi','Mengusirnya tanpa pertanyaan','Mengabaikannya jika tidak terlihat mencurigakan','B','2024-10-09 04:38:40','2024-10-09 04:38:40'),
(25,5,'Sistem apa yang sering digunakan untuk membatasi akses ke area sensitif di pabrik?','Sistem alarm sederhana','Kunci mekanik','Kartu akses elektronik','Pengawasan manual','C','2024-10-09 04:38:40','2024-10-09 04:38:40'),
(26,5,'Apa yang dimaksud dengan SOP (Standard Operating Procedure) dalam konteks keamanan pabrik?','Langkah-langkah standar dalam produksi','Prosedur keselamatan kerja','Rencana pemasaran produk','Prosedur operasional standar untuk keamanan','D','2024-10-09 04:38:40','2024-10-09 04:38:40'),
(27,5,'Apa peran patroli rutin oleh petugas keamanan di lingkungan pabrik?','Memeriksa mesin produksi','Mengawasi dan mencegah potensi ancaman','Membantu tim manajemen','Menjaga kebersihan lingkungan pabrik','B','2024-10-09 04:38:40','2024-10-09 04:38:40'),
(28,5,'Apa yang harus dilakukan petugas keamanan jika terjadi gangguan listrik di pabrik?','Segera mengevakuasi seluruh karyawan','Menghubungi bagian teknik dan menjaga area sensitif','Menunggu instruksi dari atasan','Menghidupkan cadangan listrik tanpa izin','B','2024-10-09 04:38:40','2024-10-09 04:38:40'),
(29,5,'Tindakan apa yang sebaiknya diambil jika terjadi tindakan mencurigakan di area pabrik pada malam hari?','Mengabaikannya jika tidak ada kerusakan','Melaporkan segera kepada atasan atau polisi','Menegur langsung orang yang mencurigakan','Meminta karyawan untuk memeriksa situasi','B','2024-10-09 04:38:40','2024-10-09 04:38:40'),
(30,5,'Peralatan apa yang biasanya digunakan oleh petugas keamanan untuk menjaga keselamatan di pabrik?','Pemadam api, CCTV, dan radio komunikasi','Alat tulis dan komputer','Mesin produksi cadangan','Software manajemen produksi','A','2024-10-09 04:38:40','2024-10-09 04:38:40'),
(31,6,'Apa tugas utama seorang IT Support di pabrik?','Mengatur jadwal produksi','Memastikan sistem dan jaringan berjalan dengan baik','Mengawasi mesin produksi','Mengelola staf IT lainnya','B','2024-10-09 05:23:17','2024-10-09 05:23:17'),
(32,6,'Apa yang sebaiknya dilakukan pertama kali ketika ada komputer di pabrik yang tidak mau menyala?','Mengganti kabel listrik','Memanggil manajer','Memeriksa koneksi daya dan hardware','Membuka casing komputer','C','2024-10-09 05:23:17','2024-10-09 05:23:17'),
(33,6,'Apa yang dimaksud dengan \'backup data\'?','Mengamankan data di tempat penyimpanan cadangan','Menghapus data yang sudah tidak digunakan','Menyimpan data di hard disk utama','Mengakses data di sistem utama secara langsung','A','2024-10-09 05:23:17','2024-10-09 05:23:17'),
(34,6,'Sistem operasi manakah yang paling sering digunakan di lingkungan pabrik untuk server?','Android','macOS','Windows Server','iOS','C','2024-10-09 05:23:17','2024-10-09 05:23:17'),
(35,6,'Apa fungsi dari jaringan LAN (Local Area Network) di pabrik?','Menghubungkan semua perangkat di pabrik ke internet','Menghubungkan komputer dan perangkat dalam area lokal untuk berbagi sumber daya','Mengatur pembagian tugas pekerja','Menyediakan backup otomatis untuk semua data','B','2024-10-09 05:23:17','2024-10-09 05:23:17'),
(36,6,'Langkah pertama apa yang harus dilakukan ketika ada laporan bahwa koneksi internet di pabrik terputus?','Menyalakan ulang semua komputer','Melakukan pengecekan terhadap router dan modem','Menghubungi penyedia layanan internet','Mengganti semua kabel jaringan','B','2024-10-09 05:23:17','2024-10-09 05:23:17'),
(37,6,'Apa yang dimaksud dengan firewall dalam konteks keamanan jaringan?','Program yang digunakan untuk mempercepat koneksi internet','Alat yang digunakan untuk mematikan sistem yang tidak aktif','Sistem keamanan yang memonitor dan mengontrol lalu lintas jaringan berdasarkan aturan keamanan yang telah ditentukan','Perangkat keras yang digunakan untuk mencadangkan data secara otomatis','C','2024-10-09 05:23:17','2024-10-09 05:23:17'),
(38,6,'Ketika ada masalah pada software yang digunakan di pabrik, langkah troubleshooting pertama yang biasanya dilakukan adalah?','Mengganti hardware komputer','Menghapus program dari sistem','Melakukan restart pada aplikasi atau perangkat','Menghubungi vendor software langsung','C','2024-10-09 05:23:17','2024-10-09 05:23:17'),
(39,6,'Apa itu VPN (Virtual Private Network) dan mengapa penting dalam sistem IT pabrik?','Jaringan yang memungkinkan komunikasi antar mesin produksi','Sistem yang menyimpan data cadangan secara otomatis','Jaringan aman yang memungkinkan pengguna mengakses jaringan internal dari jarak jauh dengan aman','Perangkat lunak untuk mempercepat koneksi internet','C','2024-10-09 05:23:17','2024-10-09 05:23:17'),
(40,6,'Apa yang harus dilakukan jika sistem ERP (Enterprise Resource Planning) di pabrik mengalami downtime?','Mengganti perangkat keras server','Menunggu hingga masalah teratasi sendiri','Segera menghubungi tim IT dan vendor ERP untuk troubleshooting','Menonaktifkan semua komputer di pabrik','C','2024-10-09 05:23:17','2024-10-09 05:23:17');

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `departments` */

insert  into `departments`(`id`,`name`,`description`,`created_at`,`updated_at`) values 
(5,'Security','Security Pabrik','2024-10-09 04:36:47','2024-10-09 04:38:40'),
(6,'IT','IT Support Pabrik','2024-10-09 05:23:17','2024-10-09 05:23:17');

/*Table structure for table `job_applications` */

DROP TABLE IF EXISTS `job_applications`;

CREATE TABLE `job_applications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `lokers_id` bigint(20) unsigned NOT NULL,
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `application_file` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `score` int(10) unsigned DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_applications_user_id_foreign` (`user_id`),
  KEY `job_applications_lokers_id_foreign` (`lokers_id`),
  CONSTRAINT `job_applications_lokers_id_foreign` FOREIGN KEY (`lokers_id`) REFERENCES `lokers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `job_applications` */

insert  into `job_applications`(`id`,`user_id`,`lokers_id`,`applied_at`,`application_file`,`status`,`score`,`created_at`,`updated_at`) values 
(1,3,6,'2024-10-09 04:55:18','applications/1728449718_Nilai Toeic.pdf','pending',4,'2024-10-09 04:55:18','2024-10-09 04:55:18'),
(2,3,7,'2024-10-09 05:43:43','applications/1728452623_Nilai Toeic.pdf','pending',5,'2024-10-09 05:43:43','2024-10-09 05:43:43');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `lokers` */

insert  into `lokers`(`id`,`name`,`department_id`,`position_id`,`max_applicants`,`salary`,`description`,`photo`,`statement_letter`,`created_at`,`updated_at`) values 
(6,'Security Gerbang Depan',5,6,99999,0.00,'- Bebas jam malam\r\n- Bersedia lembur\r\n- Menguasai dasar bela diri','photos/knMRixER96Vb14o2EdUUXwxfNwHTFtTodmsce8A3.png','statements/cQSJ18E3ipl0FoYn7Fl4HdC1fRpd2frtnPZczUlu.pdf','2024-10-09 04:41:50','2024-10-09 04:41:50'),
(7,'Staff IT',6,7,99999,0.00,'- Mampu mengoperasikan komputer\r\n- Memahami tentang jaringan lokal','photos/MOcqz1MCyKPPKyPEtpfoai4pJvWsnoaRWlYeOik9.png','statements/bDW2IHJu97PgOzmqMiqgpTkP8iYtZgp3XaQ9F1RZ.pdf','2024-10-09 05:24:21','2024-10-09 05:24:21');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `positions` */

insert  into `positions`(`id`,`name`,`department_id`,`created_at`,`updated_at`) values 
(6,'Penjaga Pos',5,'2024-10-09 04:41:02','2024-10-09 04:41:02'),
(7,'Staff IT',6,'2024-10-09 05:23:31','2024-10-09 05:23:31');

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
(3,'Cavin','Ardiansyach','cavin@gmail.com',NULL,'$2y$12$wdmAV2iIKkZAXrN//QGL..nW5OhK.7GaUb4Jkftg3HYwEnTi.MEkm','08881234567','2003-07-31','Kediri','D3 - Manajemen Informatika, PSDKU Kediri',0,NULL,'2024-10-09 01:55:29','2024-10-09 04:54:44');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
