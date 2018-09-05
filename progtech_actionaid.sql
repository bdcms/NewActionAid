-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2018 at 07:31 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progtech_actionaid`
--

-- --------------------------------------------------------

--
-- Table structure for table `ai_activities`
--

CREATE TABLE `ai_activities` (
  `id` int(11) NOT NULL,
  `act_name` text NOT NULL,
  `act_number` varchar(255) NOT NULL,
  `act_baseline` varchar(255) DEFAULT NULL,
  `act_target2022` varchar(255) NOT NULL,
  `act_target2018` varchar(255) DEFAULT NULL,
  `act_mov` tinytext,
  `act_frequency` varchar(255) DEFAULT NULL,
  `act_dataCollection` varchar(255) DEFAULT NULL,
  `act_assumption` tinytext,
  `ind_id` int(11) NOT NULL,
  `foc_id` int(11) NOT NULL,
  `pri_id` int(11) NOT NULL,
  `act_status` int(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ai_activities`
--

INSERT INTO `ai_activities` (`id`, `act_name`, `act_number`, `act_baseline`, `act_target2022`, `act_target2018`, `act_mov`, `act_frequency`, `act_dataCollection`, `act_assumption`, `ind_id`, `foc_id`, `pri_id`, `act_status`) VALUES
(1, 'Conscientize women, girls and their organizations on policy and legal framework promoting their economic rights of adequate access and control of productive resources, reduction of unpaid care work and decent work environments', 'A1.1', NULL, '7,000 women and 2,000 girls', NULL, 'Attendance registers, Activity reports, Pictures', NULL, 'AAZ and Partners', 'Targeted groups willingness to participate in trainings', 1, 1, 1, 1),
(2, 'Support and link women, young people, their organizations and movements to advocate for effective implementation of laws and policies that promote CRSA, access to markets and adaptation to climate change.', 'A: 1.1', 'TBA', '126 advocacy initiatives', '19 initiatives', 'Activity reports; Attendance registers;', 'Null', 'Null', 'Women, young people, their organizations and movements are willing engage in  advocacy initiatives', 3, 3, 4, 1),
(3, 'Name of the Activity...', 'A: 1.1', 'TBA', '126 advocacy initiatives', '19 initiatives', NULL, NULL, NULL, NULL, 4, 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ai_activity_report`
--

CREATE TABLE `ai_activity_report` (
  `id` int(11) NOT NULL,
  `pri_id` int(4) NOT NULL,
  `foc_id` int(4) NOT NULL,
  `ind_id` int(4) NOT NULL,
  `act_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `ar_date` varchar(255) NOT NULL,
  `ar_venue` varchar(255) NOT NULL,
  `ar_implementingUnit` varchar(255) NOT NULL,
  `ar_ap_female` int(8) NOT NULL,
  `ar_ap_male` int(8) NOT NULL,
  `ar_ap_child_m` int(8) NOT NULL,
  `ar_ap_youth_m` int(8) NOT NULL,
  `ar_ap_adult_m` int(8) NOT NULL,
  `ar_ap_child_f` int(8) DEFAULT NULL,
  `ar_ap_youth_f` int(8) DEFAULT NULL,
  `ar_ap_adult_f` int(8) DEFAULT NULL,
  `ar_ap_total` int(32) NOT NULL,
  `ar_comments` varchar(255) DEFAULT NULL,
  `ar_ac_aims` tinytext NOT NULL,
  `ar_ac_follow` tinytext NOT NULL,
  `ar_ac_process` tinytext NOT NULL,
  `ar_ac_challenges` tinytext NOT NULL,
  `ar_ac_improve` tinytext NOT NULL,
  `ar_ac_ies` tinytext NOT NULL,
  `ar_ac_comments` tinytext NOT NULL,
  `ar_at_attendence` varchar(255) NOT NULL,
  `ar_at_minute` varchar(255) NOT NULL,
  `ar_at_pic1` varchar(255) DEFAULT NULL,
  `ar_at_pic2` varchar(255) DEFAULT NULL,
  `ar_at_pic3` varchar(255) DEFAULT NULL,
  `ar_at_pic4` varchar(255) DEFAULT NULL,
  `ar_at_pic5` varchar(255) DEFAULT NULL,
  `ar_at_link` varchar(255) DEFAULT NULL,
  `ar_at_actionPlan` varchar(255) DEFAULT NULL,
  `ar_at_others` varchar(255) DEFAULT NULL,
  `flow_id` int(8) NOT NULL,
  `ar_status` int(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ai_activity_report`
--

INSERT INTO `ai_activity_report` (`id`, `pri_id`, `foc_id`, `ind_id`, `act_id`, `user_id`, `ar_date`, `ar_venue`, `ar_implementingUnit`, `ar_ap_female`, `ar_ap_male`, `ar_ap_child_m`, `ar_ap_youth_m`, `ar_ap_adult_m`, `ar_ap_child_f`, `ar_ap_youth_f`, `ar_ap_adult_f`, `ar_ap_total`, `ar_comments`, `ar_ac_aims`, `ar_ac_follow`, `ar_ac_process`, `ar_ac_challenges`, `ar_ac_improve`, `ar_ac_ies`, `ar_ac_comments`, `ar_at_attendence`, `ar_at_minute`, `ar_at_pic1`, `ar_at_pic2`, `ar_at_pic3`, `ar_at_pic4`, `ar_at_pic5`, `ar_at_link`, `ar_at_actionPlan`, `ar_at_others`, `flow_id`, `ar_status`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 3, 2, 1, '2018-09-17', 'Lukasa', 'Azz', 20, 15, 15, 18, 35, NULL, NULL, NULL, 100, 'this good', 'Activities Aims', 'Activities Follow', 'Activities Process', 'Activities Challenge', 'ctivities Improva sfdasdf asd', 'ctivities Improvs dfasdf', 'ctivities Improvdsaf asdf', '', '', 'uploads/1/2018-09/screenshot_1.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, '2018-09-03 14:18:04', '2018-09-03 20:18:04'),
(2, 5, 5, 4, 3, 1, '2018-09-03', 'Khulna', 'Azz', 20, 30, 3, 20, 40, NULL, NULL, NULL, 100, 'dfgsdfgsdfg', 'dfgsd', 'sdgfs', 'sdfgsdfgsdf', 'dfgsdfgsfdg', 'sdfgsdfg', 'sdfgsdfgsdfg', 'dfgsdfgsdfg', '', '', 'uploads/1/2018-09/hydrangeas.jpg', 'uploads/1/2018-09/tulips.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, '2018-09-03 15:01:15', '2018-09-03 21:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `ai_department`
--

CREATE TABLE `ai_department` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ai_department`
--

INSERT INTO `ai_department` (`id`, `dep_name`) VALUES
(1, 'Computer Science'),
(2, 'Electrical Site'),
(3, 'New Department'),
(4, 'CIvil eng.');

-- --------------------------------------------------------

--
-- Table structure for table `ai_focusarea`
--

CREATE TABLE `ai_focusarea` (
  `id` int(11) NOT NULL,
  `foc_name` varchar(255) NOT NULL,
  `pri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ai_focusarea`
--

INSERT INTO `ai_focusarea` (`id`, `foc_name`, `pri_id`) VALUES
(1, ' Women\'s Access to and Control over productive Resources;', 1),
(2, 'Women\'s Decent Work and Unpaid Carework', 2),
(3, 'Food sovereignty and Argo-ecology', 4),
(4, 'new foucs', 4),
(5, 'Focus Area for Five', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ai_indicators`
--

CREATE TABLE `ai_indicators` (
  `id` int(11) NOT NULL,
  `ind_name` text NOT NULL,
  `ind_definations` tinytext,
  `pri_id` int(11) NOT NULL,
  `foc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ai_indicators`
--

INSERT INTO `ai_indicators` (`id`, `ind_name`, `ind_definations`, `pri_id`, `foc_id`) VALUES
(1, 'Number of women and girls reporting adequate non-descriminatory access to economic opportunities and social services', NULL, 1, 1),
(2, 'Number of people reporting improvements in quality, gender and age responsiveness of public services being accesssed', NULL, 2, 1),
(3, 'Number of women and young people experiencing less livelihood chanllenges as a result of climate and social shocks', 'Enhanced resilience: increased capacity to recover quickly from difficulties or challenges', 4, 3),
(4, 'New Indicator for five', 'definitions here....', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ai_location`
--

CREATE TABLE `ai_location` (
  `id` int(11) NOT NULL,
  `loc_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ai_location`
--

INSERT INTO `ai_location` (`id`, `loc_name`) VALUES
(1, 'Khulna'),
(2, 'Dhaka'),
(3, 'Comilla');

-- --------------------------------------------------------

--
-- Table structure for table `ai_priorityarea`
--

CREATE TABLE `ai_priorityarea` (
  `id` int(11) NOT NULL,
  `pri_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ai_priorityarea`
--

INSERT INTO `ai_priorityarea` (`id`, `pri_name`) VALUES
(1, 'Priority One'),
(2, 'Priority Two'),
(3, 'Priority Three'),
(4, 'Priority Four'),
(5, 'Priority Five');

-- --------------------------------------------------------

--
-- Table structure for table `cms_apicustom`
--

CREATE TABLE `cms_apicustom` (
  `id` int(10) UNSIGNED NOT NULL,
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_query_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sql_where` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` longtext COLLATE utf8mb4_unicode_ci,
  `responses` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_apikey`
--

CREATE TABLE `cms_apikey` (
  `id` int(10) UNSIGNED NOT NULL,
  `screetkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_dashboard`
--

CREATE TABLE `cms_dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_queues`
--

CREATE TABLE `cms_email_queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `email_attachments` text COLLATE utf8mb4_unicode_ci,
  `is_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_templates`
--

CREATE TABLE `cms_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2018-08-29 13:00:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_logs`
--

CREATE TABLE `cms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipaddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `id_cms_users` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@crudbooster.com login with IP Address ::1', '', 1, '2018-08-29 13:05:05', NULL),
(2, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@crudbooster.com login with IP Address ::1', '', 1, '2018-08-30 07:04:14', NULL),
(3, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data Some Title at Demo Test', '', 1, '2018-08-30 07:29:23', NULL),
(4, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data Add More title at Demo Test', '', 1, '2018-08-30 07:36:23', NULL),
(5, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/logout', 'admin@crudbooster.com logout', '', 1, '2018-08-30 07:39:44', NULL),
(6, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-08-30 07:40:50', NULL),
(7, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/users/add-save', 'Add New Data Max at Users Management', '', 1, '2018-08-30 07:42:42', NULL),
(8, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 2, '2018-08-30 07:43:22', NULL),
(9, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'max@gmail.com logout', '', 2, '2018-08-30 07:43:41', NULL),
(10, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/users/delete/2', 'Delete data Max at Users Management', '', 1, '2018-08-30 07:43:54', NULL),
(11, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/logout', 'admin@gmail.com logout', '', 1, '2018-08-30 07:46:43', NULL),
(12, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-08-30 07:49:54', NULL),
(13, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data Someting at Demo Test', '', 1, '2018-08-30 07:51:15', NULL),
(14, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/users/add-save', 'Add New Data max at Users Management', '', 1, '2018-08-30 07:53:06', NULL),
(15, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-30 07:53:29', NULL),
(16, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/users/edit-save/3', 'Update data Max at Users Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>name</td><td>max</td><td>Max</td></tr><tr><td>password</td><td>$2y$10$f2htpplIZZLyhFewtu.6wurGaifHcykC6sOI55FXQNCgwcV4ucK.y</td><td>$2y$10$BNVbtNauaQAZO9rH28h.i.FUw4lq6vYSNYvCAg8JK6he0P4uydwpq</td></tr><tr><td>id_cms_privileges</td><td>3</td><td></td></tr><tr><td>status</td><td></td><td></td></tr></tbody></table>', 3, '2018-08-30 07:53:46', NULL),
(17, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/users/delete-image', 'Try delete the image of Max data at Users Management', '', 3, '2018-08-30 07:53:50', NULL),
(18, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/1', 'Update data Demo Test at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr></tbody></table>', 1, '2018-08-30 07:54:38', NULL),
(19, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data Max Demo at Demo Test', '', 3, '2018-08-30 07:55:54', NULL),
(20, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-08-31 07:52:15', NULL),
(21, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/statistic_builder/add-save', 'Add New Data Graph Chart at Statistic Builder', '', 1, '2018-08-31 07:55:48', NULL),
(22, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/add-save', 'Add New Data static at Menu Management', '', 1, '2018-08-31 08:44:15', NULL),
(23, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/2', 'Update data static at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>sorting</td><td></td><td></td></tr></tbody></table>', 1, '2018-08-31 08:44:34', NULL),
(24, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/2', 'Update data static at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>is_dashboard</td><td>0</td><td>1</td></tr><tr><td>sorting</td><td></td><td></td></tr></tbody></table>', 1, '2018-08-31 09:42:20', NULL),
(25, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/users/add-save', 'Add New Data Jyan at Users Management', '', 1, '2018-08-31 10:27:08', NULL),
(26, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/users/edit-save/1', 'Update data Super Admin at Users Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>mobile</td><td></td><td>8801969516500</td></tr><tr><td>man_number</td><td></td><td>adfsasdfasdf</td></tr><tr><td>location</td><td></td><td>Pupka</td></tr><tr><td>department</td><td></td><td>Electrical & Electronic Engineering</td></tr><tr><td>date_engeged</td><td></td><td>2018-03-01</td></tr><tr><td>date_beging</td><td></td><td>2018-08-01</td></tr><tr><td>date_expaire</td><td></td><td>2018-08-31</td></tr><tr><td>photo</td><td></td><td>uploads/1/2018-08/shariful.jpg</td></tr><tr><td>password</td><td>$2y$10$M81hvVVRH0..ufYigDNJ6eABr3lMGhxwhE88Drtt6tPVlUGlp6srW</td><td></td></tr><tr><td>id_cms_privileges</td><td>1</td><td></td></tr><tr><td>status</td><td>Active</td><td></td></tr></tbody></table>', 1, '2018-08-31 10:32:57', NULL),
(27, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:02:54', NULL),
(28, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'max@gmail.com logout', '', 3, '2018-08-31 11:03:32', NULL),
(29, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:03:50', NULL),
(30, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/2', 'Update data static at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>sorting</td><td></td><td></td></tr></tbody></table>', 1, '2018-08-31 11:04:43', NULL),
(31, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/2', 'Update data static at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>is_dashboard</td><td>0</td><td>1</td></tr><tr><td>sorting</td><td></td><td></td></tr></tbody></table>', 1, '2018-08-31 11:05:12', NULL),
(32, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'max@gmail.com logout', '', 3, '2018-08-31 11:25:34', NULL),
(33, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:25:46', NULL),
(34, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:28:46', NULL),
(35, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:29:07', NULL),
(36, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:30:40', NULL),
(37, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:31:20', NULL),
(38, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:32:05', NULL),
(39, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:32:21', NULL),
(40, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:38:07', NULL),
(41, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:41:03', NULL),
(42, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:41:25', NULL),
(43, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:43:20', NULL),
(44, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:44:39', NULL),
(45, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 11:56:53', NULL),
(46, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'max@gmail.com logout', '', 3, '2018-08-31 11:57:49', NULL),
(47, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 12:01:41', NULL),
(48, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/statistic_builder/add-save', 'Add New Data Expire Date at Statistic Builder', '', 1, '2018-08-31 12:04:02', NULL),
(49, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/statistic_builder/edit-save/2', 'Update data Contract Expire at Statistic Builder', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>name</td><td>Expire Date</td><td>Contract Expire</td></tr><tr><td>slug</td><td>expire-date</td><td></td></tr></tbody></table>', 1, '2018-08-31 12:04:18', NULL),
(50, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/statistic_builder/delete/2', 'Delete data Contract Expire at Statistic Builder', '', 1, '2018-08-31 12:23:43', NULL),
(51, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/users/edit-save/3', 'Update data Max at Users Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>mobile</td><td></td><td>01931039338</td></tr><tr><td>man_number</td><td></td><td>asdf2</td></tr><tr><td>location</td><td></td><td>fa3</td></tr><tr><td>department</td><td></td><td>cse</td></tr><tr><td>password</td><td>$2y$10$BNVbtNauaQAZO9rH28h.i.FUw4lq6vYSNYvCAg8JK6he0P4uydwpq</td><td></td></tr><tr><td>contract_remaining</td><td>31</td><td></td></tr><tr><td>id_cms_privileges</td><td>3</td><td></td></tr><tr><td>status</td><td>Active</td><td></td></tr></tbody></table>', 3, '2018-08-31 12:31:48', NULL),
(52, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/users/add-save', 'Add New Data Pob at Users Management', '', 1, '2018-08-31 12:50:23', NULL),
(53, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/users/add-save', 'Add New Data Richard at Users Management', '', 1, '2018-08-31 12:52:59', NULL),
(54, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/users/add-save', 'Add New Data Sad at Users Management', '', 1, '2018-08-31 12:54:08', NULL),
(55, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/users/add-save', 'Add New Data Joya at Users Management', '', 1, '2018-08-31 12:56:59', NULL),
(56, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'max@gmail.com logout', '', 3, '2018-08-31 13:00:38', NULL),
(57, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-08-31 13:01:16', NULL),
(58, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'max@gmail.com logout', '', 3, '2018-08-31 13:13:42', NULL),
(59, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'sad@gmail.com login with IP Address ::1', '', 7, '2018-08-31 13:13:55', NULL),
(60, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'sad@gmail.com logout', '', 7, '2018-08-31 13:15:34', NULL),
(61, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'sad@gmail.com login with IP Address ::1', '', 7, '2018-08-31 13:15:45', NULL),
(62, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'sad@gmail.com logout', '', 7, '2018-08-31 13:16:18', NULL),
(63, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'sad@gmail.com login with IP Address ::1', '', 7, '2018-08-31 13:16:23', NULL),
(64, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'sad@gmail.com logout', '', 7, '2018-08-31 13:16:32', NULL),
(65, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'richard@gmail.com login with IP Address ::1', '', 6, '2018-08-31 13:28:22', NULL),
(66, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/1', 'Update data Demo Test at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2018-08-31 13:28:58', NULL),
(67, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/logout', 'admin@gmail.com logout', '', 1, '2018-08-31 13:36:33', NULL),
(68, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-08-31 13:38:24', NULL),
(69, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'richard@gmail.com logout', '', 6, '2018-08-31 13:54:33', NULL),
(70, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'sad@gmail.com login with IP Address ::1', '', 7, '2018-08-31 13:55:40', NULL),
(71, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/users/add-save', 'Add New Data Kalyndo at Users Management', '', 1, '2018-08-31 14:01:01', NULL),
(72, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'sad@gmail.com logout', '', 7, '2018-08-31 14:01:33', NULL),
(73, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'kalyndo@gmail.com login with IP Address ::1', '', 9, '2018-08-31 14:01:58', NULL),
(74, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/1', 'Update data Demo Test at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2018-08-31 14:04:52', NULL),
(75, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data Your Title at Demo Test', '', 9, '2018-08-31 14:05:56', NULL),
(76, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'kalyndo@gmail.com logout', '', 9, '2018-08-31 14:07:15', NULL),
(77, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'kalyndo@gmail.com login with IP Address ::1', '', 9, '2018-08-31 14:07:20', NULL),
(78, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'kalyndo@gmail.com logout', '', 9, '2018-08-31 14:09:02', NULL),
(79, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'kalyndo@gmail.com login with IP Address ::1', '', 9, '2018-08-31 14:09:07', NULL),
(80, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'kalyndo@gmail.com logout', '', 9, '2018-08-31 14:10:14', NULL),
(81, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'richard@gmail.com login with IP Address ::1', '', 6, '2018-08-31 14:14:12', NULL),
(82, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-01 08:53:36', NULL),
(83, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/3', 'Update data Department at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>icon</td><td>fa fa-glass</td><td>fa fa-th-list</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2018-09-01 08:57:35', NULL),
(84, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_department/add-save', 'Add New Data New Department at Department', '', 1, '2018-09-01 08:58:24', NULL),
(85, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_location/add-save', 'Add New Data Comilla at Location', '', 1, '2018-09-01 09:00:52', NULL),
(86, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/users/add-save', 'Add New Data Khatun at Users Management', '', 1, '2018-09-01 09:05:09', NULL),
(87, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'sad@gmail.com login with IP Address ::1', '', 7, '2018-09-01 09:09:55', NULL),
(88, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data Pob Message at Demo Test', '', 7, '2018-09-01 09:18:18', NULL),
(89, '::1', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2)', 'http://localhost/actionaid/public/admin/login', 'pob@gmail.com login with IP Address ::1', '', 5, '2018-09-01 09:20:16', NULL),
(90, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', ' logout', '', NULL, '2018-09-01 09:20:50', NULL),
(91, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'richard@gmail.com login with IP Address ::1', '', 6, '2018-09-01 09:20:57', NULL),
(92, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'richard@gmail.com login with IP Address ::1', '', 6, '2018-09-01 09:21:14', NULL),
(93, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'richard@gmail.com login with IP Address ::1', '', 6, '2018-09-01 09:21:32', NULL),
(94, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-01 09:41:22', NULL),
(95, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'richard@gmail.com login with IP Address ::1', '', 6, '2018-09-01 09:52:17', NULL),
(96, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'richard@gmail.com logout', '', 6, '2018-09-01 09:57:22', NULL),
(97, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'richard@gmail.com login with IP Address ::1', '', 6, '2018-09-01 09:57:26', NULL),
(98, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'richard@gmail.com logout', '', 6, '2018-09-01 10:02:26', NULL),
(99, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'pob@gmail.com login with IP Address ::1', '', 5, '2018-09-01 10:02:40', NULL),
(100, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'pob@gmail.com logout', '', 5, '2018-09-01 10:06:45', NULL),
(101, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'kalyndo@gmail.com login with IP Address ::1', '', 9, '2018-09-01 10:06:53', NULL),
(102, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data Pob Message1 at Demo Test', '', 9, '2018-09-01 10:07:09', NULL),
(103, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'kalyndo@gmail.com logout', '', 9, '2018-09-01 10:07:16', NULL),
(104, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'pob@gmail.com login with IP Address ::1', '', 5, '2018-09-01 10:07:21', NULL),
(105, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data Add More title at Demo Test', '', 1, '2018-09-01 10:31:12', NULL),
(106, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data Some Title at Demo Test', '', 1, '2018-09-01 10:31:54', NULL),
(107, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/edit-save/2', 'Update data Add More title at Demo Test', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>description</td><td><h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard Lorem Ipsum passage, used since the 1500s</h3><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p></td><td><h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC<br></h3><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><img src=\"http://localhost/actionaid/public/uploads/1/2018-09/0018e27258c34217795dbeb142cd58d7.jpg\" style=\"float: none;\"></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.<img src=\"http://localhost/actionaid/public/uploads/1/2018-09/a10d253115c05634fbc1624c5c89b1ca.jpg\"></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.<br></p></td></tr><tr><td>user_id</td><td>1</td><td></td></tr><tr><td>flow_id</td><td></td><td></td></tr><tr><td>comments</td><td></td><td></td></tr><tr><td>comment_by</td><td></td><td></td></tr></tbody></table>', 1, '2018-09-01 11:46:43', NULL),
(108, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'pob@gmail.com logout', '', 5, '2018-09-01 12:13:16', NULL),
(109, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'sad@gmail.com login with IP Address ::1', '', 7, '2018-09-01 12:14:02', NULL),
(110, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data Add More title at Demo Test', '', 1, '2018-09-01 12:25:18', NULL),
(111, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'sad@gmail.com logout', '', 7, '2018-09-01 13:44:26', NULL),
(112, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'pob@gmail.com login with IP Address ::1', '', 5, '2018-09-01 13:44:55', NULL),
(113, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'pob@gmail.com logout', '', 5, '2018-09-01 13:49:32', NULL),
(114, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'sad@gmail.com login with IP Address ::1', '', 7, '2018-09-01 13:49:36', NULL),
(115, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'sad@gmail.com logout', '', 7, '2018-09-01 14:19:29', NULL),
(116, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'pob@gmail.com login with IP Address ::1', '', 5, '2018-09-01 14:19:35', NULL),
(117, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'pob@gmail.com logout', '', 5, '2018-09-01 14:21:29', NULL),
(118, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'sad@gmail.com login with IP Address ::1', '', 7, '2018-09-01 14:21:33', NULL),
(119, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_department/add-save', 'Add New Data CIvil eng. at Department', '', 1, '2018-09-01 14:34:33', NULL),
(120, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data Richard got this activities at Demo Test', '', 7, '2018-09-01 14:39:47', NULL),
(121, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'sad@gmail.com logout', '', 7, '2018-09-01 14:40:05', NULL),
(122, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'richard@gmail.com login with IP Address ::1', '', 6, '2018-09-01 14:40:11', NULL),
(123, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'richard@gmail.com logout', '', 6, '2018-09-01 14:42:51', NULL),
(124, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'pob@gmail.com login with IP Address ::1', '', 5, '2018-09-01 14:42:56', NULL),
(125, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'pob@gmail.com logout', '', 5, '2018-09-01 14:43:08', NULL),
(126, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'sad@gmail.com login with IP Address ::1', '', 7, '2018-09-01 14:43:13', NULL),
(127, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/demo_test/edit-save/11', 'Update data Richard got this activities at Demo Test', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>user_id</td><td>7</td><td></td></tr><tr><td>rejected_comment</td><td>Some Comments by Richard.</td><td></td></tr><tr><td>rejected_date</td><td>2018-09-01 20:09:04</td><td></td></tr></tbody></table>', 7, '2018-09-01 14:46:27', NULL),
(128, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-02 06:55:41', NULL),
(129, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'kalyndo@gmail.com login with IP Address ::1', '', 9, '2018-09-02 07:04:49', NULL),
(130, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/logout', 'admin@gmail.com logout', '', 1, '2018-09-02 07:45:35', NULL),
(131, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'pob@gmail.com login with IP Address ::1', '', 5, '2018-09-02 07:45:58', NULL),
(132, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/logout', 'pob@gmail.com logout', '', 5, '2018-09-02 07:47:00', NULL),
(133, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-02 07:47:24', NULL),
(134, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-03 07:27:30', NULL),
(135, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'sad@gmail.com login with IP Address ::1', '', 7, '2018-09-03 07:38:49', NULL),
(136, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'sad@gmail.com logout', '', 7, '2018-09-03 07:45:59', NULL),
(137, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'pob@gmail.com login with IP Address ::1', '', 5, '2018-09-03 07:46:04', NULL),
(138, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/logout', 'pob@gmail.com logout', '', 5, '2018-09-03 07:46:37', NULL),
(139, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'joya@gmail.com login with IP Address ::1', '', 8, '2018-09-03 07:46:45', NULL),
(140, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/1', 'Update data Demo Test at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>sorting</td><td>2</td><td></td></tr></tbody></table>', 1, '2018-09-03 07:47:25', NULL),
(141, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/add-save', 'Add New Data Activities at Menu Management', '', 1, '2018-09-03 08:24:45', NULL),
(142, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/5', 'Update data Priority Area at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>icon</td><td>fa fa-glass</td><td>fa fa-tasks</td></tr><tr><td>parent_id</td><td>6</td><td></td></tr></tbody></table>', 1, '2018-09-03 08:25:38', NULL),
(143, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/6', 'Update data Activities at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2018-09-03 08:26:00', NULL),
(144, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_priorityarea/add-save', 'Add New Data Priority Three at Priority Area', '', 1, '2018-09-03 08:27:56', NULL),
(145, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_focusarea/add-save', 'Add New Data Food sovereignty and Argo-ecology at Focus Areas', '', 1, '2018-09-03 08:36:52', NULL),
(146, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/7', 'Update data Focus Areas at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>icon</td><td>fa fa-heart</td><td>fa fa-tasks</td></tr><tr><td>sorting</td><td>6</td><td></td></tr></tbody></table>', 1, '2018-09-03 08:37:35', NULL),
(147, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/5', 'Update data Priority Areas at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>name</td><td>Priority Area</td><td>Priority Areas</td></tr><tr><td>parent_id</td><td>6</td><td></td></tr></tbody></table>', 1, '2018-09-03 08:38:12', NULL),
(148, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/module_generator/delete/15', 'Delete data Priority Area at Module Generator', '', 1, '2018-09-03 09:22:47', NULL),
(149, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/module_generator/delete/16', 'Delete data Focus Areas at Module Generator', '', 1, '2018-09-03 09:22:56', NULL),
(150, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/module_generator/delete/17', 'Delete data Indicators at Module Generator', '', 1, '2018-09-03 09:23:06', NULL),
(151, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_priorityarea/add-save', 'Add New Data Priority Four at Priority Area', '', 1, '2018-09-03 09:25:10', NULL),
(152, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_focusarea/add-save', 'Add New Data new foucs at Focus Areas', '', 1, '2018-09-03 09:28:39', NULL),
(153, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_focusarea/edit-save/3', 'Update data Food sovereignty and Argo-ecology at Focus Areas', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>pri_id</td><td>3</td><td>4</td></tr></tbody></table>', 1, '2018-09-03 09:28:54', NULL),
(154, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/logout', 'admin@gmail.com logout', '', 1, '2018-09-03 09:37:24', NULL),
(155, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-03 09:37:31', NULL),
(156, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-03 09:37:40', NULL),
(157, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-03 09:37:53', NULL);
INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(158, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-03 09:38:55', NULL),
(159, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-03 09:40:05', NULL),
(160, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-03 09:49:41', NULL),
(161, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'kalyndo@gmail.com login with IP Address ::1', '', 9, '2018-09-03 09:50:17', NULL),
(162, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'max@gmail.com login with IP Address ::1', '', 3, '2018-09-03 09:50:24', NULL),
(163, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'sad@gmail.com login with IP Address ::1', '', 7, '2018-09-03 09:51:46', NULL),
(164, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-03 09:56:43', NULL),
(165, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-03 09:57:37', NULL),
(166, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 'http://localhost/actionaid/public/admin/login', 'pob@gmail.com login with IP Address ::1', '', 5, '2018-09-03 09:57:55', NULL),
(167, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/logout', 'admin@gmail.com logout', '', 1, '2018-09-03 10:19:49', NULL),
(168, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-03 10:19:57', NULL),
(169, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_priorityarea/add-save', 'Add New Data Priority Five at Priority Area', '', 1, '2018-09-03 10:23:10', NULL),
(170, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_indicators/add-save', 'Add New Data Number of women and young people experiencing less livelihood chanllenges as a result of climate and social shocks at Indicators', '', 1, '2018-09-03 10:34:11', NULL),
(171, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_activities/add-save', 'Add New Data Support and link women, young people, their organizations and movements to advocate for effective implementation of laws and policies that promote CRSA, access to markets and adaptation to climate change. at Activities', '', 1, '2018-09-03 10:54:52', NULL),
(172, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/13', 'Update data Activities Lists at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>name</td><td>Activities</td><td>Activities Lists</td></tr><tr><td>color</td><td></td><td>normal</td></tr><tr><td>parent_id</td><td>6</td><td></td></tr></tbody></table>', 1, '2018-09-03 11:04:20', NULL),
(173, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-03 11:46:12', NULL),
(174, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-03 12:04:28', NULL),
(175, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_priorityarea/add-save', 'Add New Data  at Priority Area', '', 1, '2018-09-03 12:05:03', NULL),
(176, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_priorityarea/delete/6', 'Delete data  at Priority Area', '', 1, '2018-09-03 12:06:43', NULL),
(177, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data uploads/1/2018-09/koala.jpg at Demo Test', '', 1, '2018-09-03 12:12:58', NULL),
(178, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data uploads/1/me.docx at Demo Test', '', 1, '2018-09-03 12:16:19', NULL),
(179, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data asdfasdf|asfdasdf|asfasdfasdf at Demo Test', '', 1, '2018-09-03 12:31:51', NULL),
(180, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data  at Demo Test', '', 1, '2018-09-03 12:38:26', NULL),
(181, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data  at Demo Test', '', 1, '2018-09-03 12:44:21', NULL),
(182, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/demo_test/add-save', 'Add New Data fasd|asdfasdf|asdfasdf at Demo Test', '', 1, '2018-09-03 12:54:11', NULL),
(183, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/module_generator/delete/22', 'Delete data Activity Reports at Module Generator', '', 1, '2018-09-03 13:16:51', NULL),
(184, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_activity_report/add-save', 'Add New Data  at Activities Reports', '', 1, '2018-09-03 14:18:04', NULL),
(185, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_focusarea/add-save', 'Add New Data Focus Area for Five at Focus Areas', '', 1, '2018-09-03 14:34:15', NULL),
(186, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_indicators/add-save', 'Add New Data New Indicator for five at Indicators', '', 1, '2018-09-03 14:36:44', NULL),
(187, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_activities/add-save', 'Add New Data Name of the Activity... at Activities', '', 1, '2018-09-03 14:37:36', NULL),
(188, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_activity_report/add-save', 'Add New Data  at Activities Reports', '', 1, '2018-09-03 15:01:18', NULL),
(189, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/menu_management/edit-save/15', 'Update data Activities Reports at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>icon</td><td>fa fa-trash-o</td><td>fa fa-bar-chart-o</td></tr><tr><td>sorting</td><td>6</td><td></td></tr></tbody></table>', 1, '2018-09-03 15:05:09', NULL),
(190, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/login', 'admin@gmail.com login with IP Address ::1', '', 1, '2018-09-04 08:16:30', NULL),
(191, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_activity_report/add-save', 'Add New Data  at Activities Reports', '', 1, '2018-09-04 12:04:10', NULL),
(192, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_activity_report/add-save', 'Add New Data  at Activities Reports', '', 1, '2018-09-04 14:47:48', NULL),
(193, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_activity_report/delete/3', 'Delete data 3 at Activities Reports', '', 1, '2018-09-04 15:05:09', NULL),
(194, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'http://localhost/actionaid/public/admin/ai_activity_report/delete/4', 'Delete data 4 at Activities Reports', '', 1, '2018-09-04 15:05:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus`
--

CREATE TABLE `cms_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'Demo Test', 'Route', 'AdminDemoTestControllerGetIndex', 'normal', 'fa fa-th-large', 0, 1, 0, 1, 3, '2018-08-30 07:24:01', '2018-09-03 07:47:25'),
(2, 'static', 'Statistic', 'statistic_builder/show/graph-chart', 'normal', 'fa fa-heart', 0, 1, 1, 1, 2, '2018-08-31 08:44:14', '2018-08-31 11:05:12'),
(3, 'Department', 'Route', 'AdminAiDepartmentControllerGetIndex', 'normal', 'fa fa-th-list', 0, 1, 0, 1, 4, '2018-09-01 08:56:36', '2018-09-01 08:57:35'),
(4, 'Location', 'Route', 'AdminAiLocationControllerGetIndex', NULL, 'fa fa-search', 0, 1, 0, 1, 5, '2018-09-01 09:00:14', NULL),
(6, 'Activities', 'URL', '#', 'green', 'fa fa-external-link', 0, 1, 0, 1, 1, '2018-09-03 08:24:44', '2018-09-03 08:26:00'),
(9, 'Priority Areas', 'Route', 'AdminAiPriorityareaControllerGetIndex', NULL, 'fa fa-tasks', 6, 1, 0, 1, 2, '2018-09-03 09:24:06', NULL),
(10, 'Focus Areas', 'Route', 'AdminAiFocusareaControllerGetIndex', NULL, 'fa fa-tasks', 6, 1, 0, 1, 3, '2018-09-03 09:25:42', NULL),
(12, 'Indicators', 'Route', 'AdminAiIndicatorsControllerGetIndex', NULL, 'fa fa-tasks', 6, 1, 0, 1, 4, '2018-09-03 10:24:23', NULL),
(13, 'Activities Lists', 'Route', 'AdminAiActivitiesControllerGetIndex', 'normal', 'fa fa-tasks', 6, 1, 0, 1, 1, '2018-09-03 10:37:13', '2018-09-03 11:04:19'),
(15, 'Activities Reports', 'Route', 'AdminAiActivityReportControllerGetIndex', 'normal', 'fa fa-bar-chart-o', 0, 1, 0, 1, 6, '2018-09-03 13:20:50', '2018-09-03 15:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus_privileges`
--

CREATE TABLE `cms_menus_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_menus` int(11) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_menus_privileges`
--

INSERT INTO `cms_menus_privileges` (`id`, `id_cms_menus`, `id_cms_privileges`) VALUES
(8, 2, 1),
(17, 3, 1),
(18, 4, 1),
(19, 1, 3),
(20, 1, 5),
(21, 1, 10),
(22, 1, 11),
(23, 1, 1),
(25, NULL, 1),
(27, 6, 1),
(29, 7, 1),
(30, 5, 1),
(31, 8, 1),
(32, 9, 1),
(33, 10, 1),
(34, 11, 1),
(35, 12, 1),
(37, 13, 1),
(38, 14, 1),
(40, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_moduls`
--

CREATE TABLE `cms_moduls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Notifications', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1, '2018-08-29 13:00:40', NULL, NULL),
(2, 'Privileges', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1, '2018-08-29 13:00:40', NULL, NULL),
(3, 'Privileges Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1, '2018-08-29 13:00:40', NULL, NULL),
(4, 'Users Management', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1, '2018-08-29 13:00:40', NULL, NULL),
(5, 'Settings', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1, '2018-08-29 13:00:40', NULL, NULL),
(6, 'Module Generator', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1, '2018-08-29 13:00:40', NULL, NULL),
(7, 'Menu Management', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1, '2018-08-29 13:00:40', NULL, NULL),
(8, 'Email Templates', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1, '2018-08-29 13:00:40', NULL, NULL),
(9, 'Statistic Builder', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1, '2018-08-29 13:00:40', NULL, NULL),
(10, 'API Generator', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1, '2018-08-29 13:00:40', NULL, NULL),
(11, 'Log User Access', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1, '2018-08-29 13:00:40', NULL, NULL),
(12, 'Demo Test', 'fa fa-th-large', 'demo_test', 'demo_test', 'AdminDemoTestController', 0, 0, '2018-08-30 07:24:01', NULL, NULL),
(13, 'Department', 'fa fa-glass', 'ai_department', 'ai_department', 'AdminAiDepartmentController', 0, 0, '2018-09-01 08:56:35', NULL, NULL),
(14, 'Location', 'fa fa-search', 'ai_location', 'ai_location', 'AdminAiLocationController', 0, 0, '2018-09-01 09:00:14', NULL, NULL),
(15, 'Priority Area', 'fa fa-glass', 'ai_priorityarea', 'ai_priorityarea', 'AdminAiPriorityareaController', 0, 0, '2018-09-03 08:19:55', NULL, '2018-09-03 09:22:47'),
(16, 'Focus Areas', 'fa fa-heart', 'ai_focusarea', 'ai_focusarea', 'AdminAiFocusareaController', 0, 0, '2018-09-03 08:29:30', NULL, '2018-09-03 09:22:57'),
(17, 'Indicators', 'fa fa-heart', 'ai_indicators', 'ai_indicators', 'AdminAiIndicatorsController', 0, 0, '2018-09-03 08:39:07', NULL, '2018-09-03 09:23:06'),
(18, 'Priority Areas', 'fa fa-tasks', 'ai_priorityarea', 'ai_priorityarea', 'AdminAiPriorityareaController', 0, 0, '2018-09-03 09:24:06', NULL, NULL),
(19, 'Focus Areas', 'fa fa-tasks', 'ai_focusarea', 'ai_focusarea', 'AdminAiFocusareaController', 0, 0, '2018-09-03 09:25:42', NULL, NULL),
(20, 'Indicators', 'fa fa-tasks', 'ai_indicators', 'ai_indicators', 'AdminAiIndicatorsController', 0, 0, '2018-09-03 10:24:23', NULL, NULL),
(21, 'Activities', 'fa fa-tasks', 'ai_activities', 'ai_activities', 'AdminAiActivitiesController', 0, 0, '2018-09-03 10:37:12', NULL, NULL),
(22, 'Activities Reports', 'fa fa-trash-o', 'ai_activity_report', 'ai_activity_report', 'AdminAiActivityReportController', 0, 0, '2018-09-03 13:20:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_notifications`
--

INSERT INTO `cms_notifications` (`id`, `id_cms_users`, `content`, `url`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 4, 'Sad\'s contract will be expaire today.', 'http://localhost/actionaid/public/admin/users/detail/7', 0, '2018-08-31 19:16:32', '2018-08-31 19:16:32'),
(2, 1, 'Sad\'s contract will be expaire today.', 'http://localhost/actionaid/public/admin/users/detail/7', 1, '2018-08-31 19:16:32', '2018-08-31 19:16:32'),
(3, 4, 'Sad\'s contract will be expaire today.', 'http://localhost/actionaid/public/admin/users/edit/7', 0, '2018-08-31 20:01:32', '2018-08-31 20:01:32'),
(4, 1, 'Sad\'s contract will be expaire today.', 'http://localhost/actionaid/public/admin/users/edit/7', 1, '2018-08-31 20:01:32', '2018-08-31 20:01:32'),
(5, 4, 'Kalyndo\'s contract will be expaire today.', 'http://localhost/actionaid/public/admin/users/edit/9', 0, '2018-08-31 20:10:14', '2018-08-31 20:10:14'),
(6, 1, 'Kalyndo\'s contract will be expaire today.', 'http://localhost/actionaid/public/admin/users/edit/9', 1, '2018-08-31 20:10:14', '2018-08-31 20:10:14'),
(7, 4, 'Kalyndo\'s contract will be expaire today.', 'http://localhost/actionaid/public/admin/users/edit/9', 0, '2018-09-01 16:07:16', '2018-09-01 16:07:16'),
(8, 1, 'Kalyndo\'s contract will be expaire today.', 'http://localhost/actionaid/public/admin/users/edit/9', 1, '2018-09-01 16:07:16', '2018-09-01 16:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges`
--

CREATE TABLE `cms_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_role` int(8) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `name`, `is_superadmin`, `theme_color`, `parent_role`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 1, 'skin-red', 0, '2018-08-29 13:00:40', NULL),
(2, 'Country Director', 0, 'skin-blue-light', 1, NULL, NULL),
(3, 'HOFSP', 0, 'skin-green-light', 2, '2018-08-30 13:52:29', '2018-08-30 13:52:29'),
(5, 'HOPP', 0, 'skin-black-light', 2, '2018-08-30 15:14:19', '2018-08-30 15:14:19'),
(6, 'HORD', 0, 'skin-blue', 2, '2018-08-31 18:40:28', '2018-08-31 18:40:28'),
(7, 'Finance Officer', 0, 'skin-purple', 2, '2018-08-31 18:42:02', '2018-08-31 18:42:02'),
(8, 'Regional Mel', 0, 'skin-purple', 3, '2018-08-31 18:43:40', '2018-08-31 18:43:40'),
(9, 'Program Officer', 0, 'skin-purple', 8, '2018-08-31 18:44:30', '2018-08-31 18:44:30'),
(10, 'Line Manager', 0, 'skin-red', 5, '2018-08-31 18:45:28', '2018-08-31 18:45:28'),
(11, 'Project Coordinitor', 0, 'skin-red', 10, '2018-08-31 18:45:58', '2018-08-31 18:45:58'),
(12, 'MEL Manager', 0, 'skin-green', 5, '2018-08-31 18:46:48', '2018-08-31 18:46:48'),
(13, 'M&E Officer', 0, 'skin-black-light', 12, '2018-08-31 18:47:18', '2018-08-31 18:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges_roles`
--

CREATE TABLE `cms_privileges_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 1, 1, '2018-08-29 13:00:40', NULL),
(2, 1, 1, 1, 1, 1, 1, 2, '2018-08-29 13:00:40', NULL),
(3, 0, 1, 1, 1, 1, 1, 3, '2018-08-29 13:00:40', NULL),
(4, 1, 1, 1, 1, 1, 1, 4, '2018-08-29 13:00:40', NULL),
(5, 1, 1, 1, 1, 1, 1, 5, '2018-08-29 13:00:40', NULL),
(6, 1, 1, 1, 1, 1, 1, 6, '2018-08-29 13:00:40', NULL),
(7, 1, 1, 1, 1, 1, 1, 7, '2018-08-29 13:00:40', NULL),
(8, 1, 1, 1, 1, 1, 1, 8, '2018-08-29 13:00:41', NULL),
(9, 1, 1, 1, 1, 1, 1, 9, '2018-08-29 13:00:41', NULL),
(10, 1, 1, 1, 1, 1, 1, 10, '2018-08-29 13:00:41', NULL),
(11, 1, 0, 1, 0, 1, 1, 11, '2018-08-29 13:00:41', NULL),
(12, 1, 1, 1, 1, 0, 2, 4, NULL, NULL),
(13, 1, 1, 1, 1, 1, 1, 12, NULL, NULL),
(18, 1, 1, 1, 1, 1, 6, 12, NULL, NULL),
(19, 1, 1, 1, 1, 1, 6, 4, NULL, NULL),
(20, 1, 1, 1, 1, 0, 5, 12, NULL, NULL),
(21, 1, 1, 1, 1, 1, 5, 4, NULL, NULL),
(22, 1, 1, 1, 1, 0, 3, 12, NULL, NULL),
(23, 1, 1, 1, 1, 1, 3, 4, NULL, NULL),
(24, 1, 1, 1, 1, 0, 7, 12, NULL, NULL),
(25, 1, 1, 1, 1, 1, 7, 4, NULL, NULL),
(26, 1, 1, 1, 1, 0, 8, 12, NULL, NULL),
(27, 1, 1, 1, 1, 1, 8, 4, NULL, NULL),
(28, 1, 1, 1, 1, 0, 9, 12, NULL, NULL),
(29, 1, 1, 1, 1, 1, 9, 4, NULL, NULL),
(34, 1, 1, 1, 1, 0, 12, 12, NULL, NULL),
(35, 1, 1, 1, 1, 1, 12, 4, NULL, NULL),
(36, 1, 1, 1, 1, 0, 13, 12, NULL, NULL),
(37, 1, 1, 1, 1, 1, 13, 4, NULL, NULL),
(38, 1, 1, 1, 1, 1, 11, 12, NULL, NULL),
(39, 1, 1, 1, 1, 1, 11, 4, NULL, NULL),
(40, 1, 1, 1, 1, 1, 1, 13, NULL, NULL),
(41, 1, 1, 1, 1, 1, 1, 14, NULL, NULL),
(42, 1, 0, 1, 0, 0, 10, 12, NULL, NULL),
(43, 1, 1, 1, 1, 1, 10, 4, NULL, NULL),
(44, 1, 1, 1, 1, 1, 1, 15, NULL, NULL),
(45, 1, 1, 1, 1, 1, 1, 16, NULL, NULL),
(46, 1, 1, 1, 1, 1, 1, 17, NULL, NULL),
(47, 1, 1, 1, 1, 1, 1, 18, NULL, NULL),
(48, 1, 1, 1, 1, 1, 1, 19, NULL, NULL),
(49, 1, 1, 1, 1, 1, 1, 20, NULL, NULL),
(50, 1, 1, 1, 1, 1, 1, 20, NULL, NULL),
(51, 1, 1, 1, 1, 1, 1, 21, NULL, NULL),
(52, 1, 1, 1, 1, 1, 1, 22, NULL, NULL),
(53, 1, 1, 1, 1, 1, 1, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_input_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `created_at`, `updated_at`, `group_setting`, `label`) VALUES
(1, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', '2018-08-29 13:00:41', NULL, 'Login Register Style', 'Login Background Color'),
(2, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', '2018-08-29 13:00:41', NULL, 'Login Register Style', 'Login Font Color'),
(3, 'login_background_image', NULL, 'upload_image', NULL, NULL, '2018-08-29 13:00:41', NULL, 'Login Register Style', 'Login Background Image'),
(4, 'email_sender', 'support@crudbooster.com', 'text', NULL, NULL, '2018-08-29 13:00:41', NULL, 'Email Setting', 'Email Sender'),
(5, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, '2018-08-29 13:00:41', NULL, 'Email Setting', 'Mail Driver'),
(6, 'smtp_host', '', 'text', NULL, NULL, '2018-08-29 13:00:41', NULL, 'Email Setting', 'SMTP Host'),
(7, 'smtp_port', '25', 'text', NULL, 'default 25', '2018-08-29 13:00:41', NULL, 'Email Setting', 'SMTP Port'),
(8, 'smtp_username', '', 'text', NULL, NULL, '2018-08-29 13:00:41', NULL, 'Email Setting', 'SMTP Username'),
(9, 'smtp_password', '', 'text', NULL, NULL, '2018-08-29 13:00:41', NULL, 'Email Setting', 'SMTP Password'),
(10, 'appname', 'ActionAid', 'text', NULL, NULL, '2018-08-29 13:00:41', NULL, 'Application Setting', 'Application Name'),
(11, 'default_paper_size', 'Legal', 'text', NULL, 'Paper size, ex : A4, Legal, etc', '2018-08-29 13:00:41', NULL, 'Application Setting', 'Default Paper Print Size'),
(12, 'logo', 'uploads/2018-08/19ac86ca9bcbf1fd407b7fad893813c6.jpg', 'upload_image', NULL, NULL, '2018-08-29 13:00:41', NULL, 'Application Setting', 'Logo'),
(13, 'favicon', 'uploads/2018-08/ee5ea96dee428c927f718238b5781717.png', 'upload_image', NULL, NULL, '2018-08-29 13:00:41', NULL, 'Application Setting', 'Favicon'),
(14, 'api_debug_mode', 'true', 'select', 'true,false', NULL, '2018-08-29 13:00:41', NULL, 'Application Setting', 'API Debug Mode'),
(15, 'google_api_key', NULL, 'text', NULL, NULL, '2018-08-29 13:00:41', NULL, 'Application Setting', 'Google API Key'),
(16, 'google_fcm_key', NULL, 'text', NULL, NULL, '2018-08-29 13:00:41', NULL, 'Application Setting', 'Google FCM Key');

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistics`
--

CREATE TABLE `cms_statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_statistics`
--

INSERT INTO `cms_statistics` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Graph Chart', 'graph-chart', '2018-08-31 07:55:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistic_components`
--

CREATE TABLE `cms_statistic_components` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_statistic_components`
--

INSERT INTO `cms_statistic_components` (`id`, `id_cms_statistics`, `componentID`, `component_name`, `area_name`, `sorting`, `name`, `config`, `created_at`, `updated_at`) VALUES
(5, 1, '9b83038a3a0fbd94b0d789df80186754', 'chartbar', 'area5', 0, NULL, '{\"name\":\"Check\",\"sql\":\"select MAX(level) as value, level as label from sss group by level order by id asc\",\"area_name\":\"value\",\"goals\":\"10\"}', '2018-08-31 08:29:09', NULL),
(6, 1, 'da2fb6fa983bf0e1a30ff5bf7e640485', 'chartarea', 'area5', 1, NULL, '{\"name\":\"users\",\"sql\":\"select MAX(value) as value, value as label from sss group by value order by id asc\",\"area_name\":\"amin;jamin;kamin;lakman;five;six;seven;eight\",\"goals\":\"800\"}', '2018-08-31 09:25:26', NULL),
(7, 2, 'f9a4c4eeae643b566cf59bf2596a7b6d', 'smallbox', 'area1', 0, NULL, '{\"name\":\"Days remaining on your contract.\",\"icon\":\"ion-calendar\",\"color\":\"bg-green\",\"link\":\"#\",\"sql\":\"select contract_remaining from cms_users where id = [admin_id]\"}', '2018-08-31 12:04:30', NULL),
(8, 1, 'd49f04e4f8cfdaccfde86889d0790d8b', 'smallbox', 'area1', 0, NULL, '{\"name\":\"Days remaining on your contract....\",\"icon\":\"ion-clander\",\"color\":\"bg-green\",\"link\":\"#\",\"sql\":\"select contract_remaining from cms_users where id = [admin_id]\"}', '2018-08-31 12:21:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `man_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_engeged` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_beging` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_expaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_remaining` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `name`, `email`, `mobile`, `man_number`, `location`, `department`, `date_engeged`, `date_beging`, `date_expaire`, `photo`, `password`, `contract_remaining`, `id_cms_privileges`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Admin', 'admin@gmail.com', '8801969516500', 'adfsasdfasdf', 'Pupka', 'Electrical & Electronic Engineering', '2018-03-01', '2018-08-01', '2022-08-31', 'uploads/1/2018-08/shariful.jpg', '$2y$10$NFM1qAYEdwkSf.zxgxUOZ.6e3DrI0VIpY6Hab5OvM4l9xZJTT0DDC', '1458', 1, '2018-08-29 13:00:40', '2018-08-31 10:32:57', 'Active'),
(3, 'Max', 'max@gmail.com', '01931039338', 'asdf2', 'fa3', 'cse', '2018-03-01', '2018-08-01', '2018-09-31', 'uploads/1/2018-08/koala.jpg', '$2y$10$BNVbtNauaQAZO9rH28h.i.FUw4lq6vYSNYvCAg8JK6he0P4uydwpq', '28', 3, '2018-09-30 07:53:06', '2018-08-31 12:31:48', 'Active'),
(4, 'Jyan', 'jyan@gmail.com', '01969516500', 'asdf_315', 'Pupka', 'English Department', '2018-06-04', '2018-08-01', '2018-09-30', 'uploads/1/2018-08/shariful.jpg', '$2y$10$pSi55sEjvJjsnRxlpesK5uQ//6aKgov7ngHLWojoZza/BNP/y2CKW', '471 Days', 6, '2018-08-31 10:27:08', NULL, 'Active'),
(5, 'Pob', 'pob@gmail.com', '1351543513515', 'asdf_315', 'Pupka', 'English Department', '2018-04-10', '2018-08-13', '2018-11-30', 'uploads/1/2018-08/penguins.jpg', '$2y$10$PC/2bWOM0T1OTEryCTgaDeV7oriVC.jB.Nz9YSXxvpDLex4fP6E3q', '88', 10, '2018-08-31 12:50:23', NULL, 'Active'),
(6, 'Richard', 'richard@gmail.com', '353483135483', 'asdf_315', 'Pupka', 'English Department', '2018-09-17', '2018-09-10', '2018-12-13', 'uploads/1/2018-08/chrysanthemum.jpg', '$2y$10$PC/2bWOM0T1OTEryCTgaDeV7oriVC.jB.Nz9YSXxvpDLex4fP6E3q', '103', 10, '2018-08-31 12:52:59', NULL, 'Active'),
(7, 'Sad', 'sad@gmail.com', '31534836541384', 'asdf_315', 'Pupka', 'English Department', '2018-08-06', '2018-08-20', '2020-09-01', 'uploads/1/2018-08/hydrangeas.jpg', '$2y$10$iXEsEBQOj2OBLgwRv4lg4.2kQoAPmDAs/K8RqY0KMtWPjUZo75bFW', '729', 11, '2018-08-31 12:54:08', NULL, 'Active'),
(8, 'Joya', 'joya@gmail.com', '1351345131354', 'asdf_315', 'Pupka', 'English Department', '2018-09-24', '2018-09-19', '2020-01-01', 'uploads/1/2018-08/tulips.jpg', '$2y$10$sFUcjH7sYbHcx/pSWTixVOj3YwOBqvM/zYiw6LQAbFjNGi32.gbQu', '485', 5, '2018-08-31 12:56:59', NULL, 'Active'),
(9, 'Kalyndo', 'kalyndo@gmail.com', '31353135131', 'khaf353', 'Zambia', 'Computer Science & Engineering', '2018-02-13', '2010-06-28', '2018-08-31', 'uploads/1/2018-08/lighthouse.jpg', '$2y$10$GAI6ccA4804DJjlQSxVFqeJT/154h52aYXbtnzpDxM0Cg7knCeHRu', '3', 11, '2018-08-31 14:01:00', NULL, 'Active'),
(10, 'Khatun', 'kahtun@gmail.com', '313513513.15', 'asfwea', '3', '1', '2018-09-10', '2018-09-18', '2018-09-19', 'uploads/1/2018-09/koala.jpg', '$2y$10$kbu9iVm6Oua2WcUewMsXse49NrZQtTOKdtjdW5Hq/NfBs9iXs4FBG', NULL, 9, '2018-09-01 09:05:09', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `demo_test`
--

CREATE TABLE `demo_test` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1',
  `user_id` int(4) DEFAULT NULL,
  `flow_id` int(4) DEFAULT NULL,
  `rejected_comment` text,
  `rejected_by` varchar(255) DEFAULT NULL,
  `rejected_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo_test`
--

INSERT INTO `demo_test` (`id`, `title`, `description`, `status`, `user_id`, `flow_id`, `rejected_comment`, `rejected_by`, `rejected_date`) VALUES
(1, 'Some Title', '<p>afsd asdf asdf adsf asdf asdf asfd</p>', 1, 9, 6, NULL, NULL, ''),
(2, 'Add More title', '<h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC<br></h3><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><img src=\"http://localhost/actionaid/public/uploads/1/2018-09/0018e27258c34217795dbeb142cd58d7.jpg\" style=\"float: none;\"></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.<img src=\"http://localhost/actionaid/public/uploads/1/2018-09/a10d253115c05634fbc1624c5c89b1ca.jpg\"></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.<br></p>', 1, 9, 5, NULL, '', ''),
(3, 'Someting', '<h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p>', 99, 7, 6, NULL, '', ''),
(4, 'Max Demo', '<p><br></p><h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; text-align: left; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p><br></p><p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><p><br></p>', 1, 9, 5, NULL, '', ''),
(5, 'Your Title', '<p>afsd asdf adsf afdslkjh fa</p><p><br></p><p>asdflk hasdf</p><p>asdf lkahsdf lkhasdf</p><p>a sdfasdf<br></p>', 100, 7, 6, NULL, '', ''),
(6, 'Pob Message', '<p>fasd fasdf asdf asdf<br></p>', 99, 7, 5, 'Something is wrong!', '5', '2018-09-01 20:09:41'),
(7, 'Pob Message1', '<p>adsf asdf asdf asd<br></p>', 1, 9, 5, '1', '', ''),
(8, 'Add More title', '<p>asdf aa sdfasdf asd</p>', 99, 7, 5, 'Not right!', '5', '2018-08-31 20:09:41'),
(9, 'Some Title', '<p>asdf asdf asd</p>', 1, 7, 6, NULL, '', ''),
(10, 'Add More title', '<p>asdf asdf asdf&nbsp;</p>', 100, 7, 6, NULL, '', ''),
(11, 'Richard got this activities', '<p>asdf asdf asdfa sfd<br></p>', 99, 7, 6, 'Some Comments by Richard.', '6', '2018-09-01 20:09:04'),
(12, 'uploads/1/2018-09/koala.jpg', '<p>dfgdfg sdfg sdfg sfdg</p>', 100, 1, 5, NULL, NULL, NULL),
(13, 'uploads/1/me.docx', '<p>dsf asdf asdf asd</p>', 100, 1, 5, NULL, NULL, NULL),
(14, 'asdfasdf|asfdasdf|asfasdfasdf', '<p>&nbsp;fasdf asdf asdf asd</p>', 100, 1, 5, NULL, NULL, NULL),
(15, '0', '<p>adgdfg dfs gsdf gsdfg s</p>', 100, 1, 5, NULL, NULL, NULL),
(16, '0', 'uploads/1/2018-09/penguins.jpg', 100, 1, 5, NULL, NULL, NULL),
(17, 'fasd|asdfasdf|asdfasdf', 'uploads/1/2018-09/koala.jpg', 100, 1, 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_08_07_145904_add_table_cms_apicustom', 1),
(2, '2016_08_07_150834_add_table_cms_dashboard', 1),
(3, '2016_08_07_151210_add_table_cms_logs', 1),
(4, '2016_08_07_151211_add_details_cms_logs', 1),
(5, '2016_08_07_152014_add_table_cms_privileges', 1),
(6, '2016_08_07_152214_add_table_cms_privileges_roles', 1),
(7, '2016_08_07_152320_add_table_cms_settings', 1),
(8, '2016_08_07_152421_add_table_cms_users', 1),
(9, '2016_08_07_154624_add_table_cms_menus_privileges', 1),
(10, '2016_08_07_154624_add_table_cms_moduls', 1),
(11, '2016_08_17_225409_add_status_cms_users', 1),
(12, '2016_08_20_125418_add_table_cms_notifications', 1),
(13, '2016_09_04_033706_add_table_cms_email_queues', 1),
(14, '2016_09_16_035347_add_group_setting', 1),
(15, '2016_09_16_045425_add_label_setting', 1),
(16, '2016_09_17_104728_create_nullable_cms_apicustom', 1),
(17, '2016_10_01_141740_add_method_type_apicustom', 1),
(18, '2016_10_01_141846_add_parameters_apicustom', 1),
(19, '2016_10_01_141934_add_responses_apicustom', 1),
(20, '2016_10_01_144826_add_table_apikey', 1),
(21, '2016_11_14_141657_create_cms_menus', 1),
(22, '2016_11_15_132350_create_cms_email_templates', 1),
(23, '2016_11_15_190410_create_cms_statistics', 1),
(24, '2016_11_17_102740_create_cms_statistic_components', 1),
(25, '2017_06_06_164501_add_deleted_at_cms_moduls', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sss`
--

CREATE TABLE `sss` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `value` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sss`
--

INSERT INTO `sss` (`id`, `level`, `value`) VALUES
(1, '1', '500'),
(2, '2', '300'),
(3, '5', '200'),
(4, '9', '800'),
(5, '8', '360'),
(6, '4', '450'),
(7, '3', '950'),
(8, '2', '335');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ai_activities`
--
ALTER TABLE `ai_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ai_activity_report`
--
ALTER TABLE `ai_activity_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ai_department`
--
ALTER TABLE `ai_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ai_focusarea`
--
ALTER TABLE `ai_focusarea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ai_indicators`
--
ALTER TABLE `ai_indicators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ai_location`
--
ALTER TABLE `ai_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ai_priorityarea`
--
ALTER TABLE `ai_priorityarea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_test`
--
ALTER TABLE `demo_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss`
--
ALTER TABLE `sss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ai_activities`
--
ALTER TABLE `ai_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ai_activity_report`
--
ALTER TABLE `ai_activity_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ai_department`
--
ALTER TABLE `ai_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ai_focusarea`
--
ALTER TABLE `ai_focusarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ai_indicators`
--
ALTER TABLE `ai_indicators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ai_location`
--
ALTER TABLE `ai_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ai_priorityarea`
--
ALTER TABLE `ai_priorityarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `demo_test`
--
ALTER TABLE `demo_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sss`
--
ALTER TABLE `sss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
