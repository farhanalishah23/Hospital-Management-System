/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - hms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hms` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `hms`;

/*Table structure for table `book_appointments` */

DROP TABLE IF EXISTS `book_appointments`;

CREATE TABLE `book_appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `book_appointments` */

/*Table structure for table `doctor_awards` */

DROP TABLE IF EXISTS `doctor_awards`;

CREATE TABLE `doctor_awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `award_year` varchar(255) DEFAULT NULL,
  `award_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `doctor_awards` */

/*Table structure for table `doctor_educations` */

DROP TABLE IF EXISTS `doctor_educations`;

CREATE TABLE `doctor_educations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `collage` varchar(255) DEFAULT NULL,
  `year` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `doctor_educations` */

/*Table structure for table `doctor_experiences` */

DROP TABLE IF EXISTS `doctor_experiences`;

CREATE TABLE `doctor_experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `hospital_name` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `doctor_experiences` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `specialities` */

DROP TABLE IF EXISTS `specialities`;

CREATE TABLE `specialities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `specialities` */

insert  into `specialities`(`id`,`name`,`image`,`status`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Urology','Specialities/6hSo8Gj4l4SloCPIBwC9fW4KPT5gc8FebTQyUaJ7.png','active','2024-05-02 21:58:44','2024-05-02 23:48:41',NULL),
(3,'Dentist','Specialities/PLDDg8D80DBJi5Tl4q4vxKqlFQkDg1ncktvCmEHV.png','active','2024-05-03 00:25:30','2024-05-03 00:25:30',NULL),
(4,'Neurology','Specialities/lzRF3jPjTPTvTwxCIISDpv9MRmhdOIlzOXH8Ku0T.png','active','2024-05-03 00:25:48','2024-05-03 00:25:48',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `speciality_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `bio` longtext DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `fees` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`speciality_id`,`appointment_id`,`name`,`email`,`address`,`bio`,`age`,`phone`,`fees`,`role`,`image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,NULL,NULL,'Admin','adminhms@yopmail.com','Nazimabad Karachi','I am Admin of HMS.\r\nHi!',23,'+1 (549) 582-9188',NULL,'admin','Users/dfOTN3e07QrbbiXo12t2IofxctQELWn5nTEzjipX.jpg','active',NULL,'$2y$10$4NkIozSaQiC86KKYaqs0JO3ijkIRW0NtgTVH53I0W16Q/1zFwmQea',NULL,'2024-05-02 19:53:00','2024-05-03 16:10:33'),
(11,3,NULL,' Ahmed','ahmed@yopmail.com','Excepturi laboriosam','Iste inventore molli',53,'+1 (539) 921-7752','Vel anim quo et aliq','doctor','Users/JQGb47nFx7GGujf8134tCTsA831yfbNoIkHjf7z3.jpg','active',NULL,'$2y$10$uQt.hOaEtgbFcNoex1BCdOac05VCOCNJwKFXe1.ZLBlqxRC.nsDwa',NULL,'2024-05-03 00:26:20','2024-05-03 22:20:37'),
(12,NULL,NULL,'Farhan Ali Shah','Farhan.ali200@gmail.com',NULL,NULL,NULL,NULL,NULL,'patient','Users/dpq3t0tC8rSs9NbXb6hUHDINmslpnPDv1VRn5TNM.png','active',NULL,'$2y$10$/E0qwl2xgzBTojo3KL/Jnu9RcAGV6t30oJIOPgzCRH3yiwXtqG0qK',NULL,'2024-05-03 00:31:30','2024-05-03 00:44:55'),
(13,NULL,NULL,'Shahid','Shahid@yopmail.com',NULL,NULL,NULL,NULL,NULL,'patient','Users/0TgUHOw7sqw50C2Xk7a0ApVAR2dVVycz1BFIT5VF.png','active',NULL,'$2y$10$/438DeMsHplHOiicz.wNSuQACqFxonkEMYIM6Lnie1PX21Tq2yxmm',NULL,'2024-05-03 00:32:23','2024-05-03 00:32:23');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
