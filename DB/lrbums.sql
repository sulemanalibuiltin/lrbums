-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2017 at 06:40 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quetta_domicile`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `title_ur` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `title_ur`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pakistan', NULL, 1, '2017-05-13 11:39:45', '2017-05-13 16:39:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL,
  `district_id` int(10) unsigned NOT NULL,
  `department_type_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `department_level` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `district_id`, `department_type_id`, `title`, `short_name`, `logo`, `description`, `department_level`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'United States of Developers', NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL),
(2, 1, 2, 'DC Office Quetta', NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department_types`
--

CREATE TABLE IF NOT EXISTS `department_types` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department_types`
--

INSERT INTO `department_types` (`id`, `title`, `description`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Developer', NULL, 1, 1, NULL, '2017-03-25 20:48:37', '2017-03-25 20:48:37'),
(2, 'DC Officer', 'Office of the Deputy Commissioner', 1, 1, NULL, '2017-03-25 20:48:37', '2017-03-25 20:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE IF NOT EXISTS `designations` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `description`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Developer', NULL, 1, 1, NULL, '2017-03-25 21:20:28', '2017-03-25 21:20:28'),
(2, 'Deputy Commissioner', NULL, 1, 1, NULL, '2017-04-01 14:00:00', '2017-05-13 12:40:14'),
(3, 'Test designation', NULL, 2, 1, '2017-04-06 06:38:14', '2017-04-05 20:31:38', '2017-04-05 20:38:14'),
(4, 'Additional Deputy Commissioner', NULL, 1, 1, NULL, '2017-05-14 10:38:56', '2017-05-14 10:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `title_ur` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `title`, `title_ur`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Quetta', NULL, 1, '2017-05-13 17:32:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(10) unsigned NOT NULL,
  `province_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `province_id`, `title`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quetta Division', 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_03_24_104437_create_countries_table', 1),
(2, '2017_03_24_104910_create_provinces_table', 1),
(3, '2017_03_24_104935_create_department_types_table', 1),
(4, '2017_03_24_104948_create_departments_table', 1),
(5, '2017_03_24_115817_create_divisions_table', 1),
(6, '2017_03_24_115827_create_districts_table', 1),
(7, '2017_03_24_115837_create_tehsils_table', 1),
(8, '2017_03_24_122844_create_modules_table', 1),
(9, '2017_03_25_140748_create_roles_table', 1),
(10, '2017_03_25_141850_create_designations_table', 1),
(11, '2017_03_25_141900_create_users_table', 1),
(12, '2017_03_25_141944_create_module_role_table', 1),
(13, '2017_03_26_111626_create_relationships', 1),
(14, '2017_04_04_104807_create_logs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_status` tinyint(4) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `parent_id`, `type`, `title`, `description`, `route`, `menu_status`, `icon`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'controller', 'Dashboard', NULL, 'dashboard', 1, 'icon-home4', 1, 1, NULL, '2017-03-25 22:16:38', '2017-03-25 22:16:38'),
(2, 1, 'action', 'Home', NULL, 'dashboard.home', 1, 'icon-dash', 1, 0, NULL, '2017-03-25 14:00:00', '2017-03-25 14:00:00'),
(3, 0, 'controller', 'Modules', 'Manage module', 'modules', 1, 'icon-stack2', 1, 1, NULL, '2017-03-25 14:00:00', '2017-03-25 14:00:00'),
(4, 3, 'action', 'Controllers', 'List of controllers', 'modules.controllers', 1, 'icon-dash', 1, 1, NULL, '2017-03-26 14:00:00', '2017-03-26 14:00:00'),
(5, 3, 'action', 'Add Controller', 'Add new controller', 'modules.create', 1, NULL, 1, 1, NULL, '2017-03-28 14:00:00', '2017-03-31 00:28:10'),
(7, 0, 'controller', 'Roles', 'Role module', 'roles', 1, 'icon-users2', 1, 1, NULL, '2017-03-29 05:15:23', '2017-04-02 04:15:14'),
(10, 7, 'action', 'All Roles', 'List of all roles', 'roles.index', 1, NULL, 1, 1, NULL, '2017-04-01 01:24:14', '2017-04-01 01:31:05'),
(11, 3, 'action', 'Trashed Controllers', 'List of trashed controllers', 'modules.trashed', 1, NULL, 1, 1, NULL, '2017-04-01 03:04:29', '2017-04-05 22:27:09'),
(12, 7, 'action', 'Add Role', 'Add new role', 'roles.create', 1, NULL, 1, 1, NULL, '2017-04-01 19:27:40', '2017-04-01 20:00:30'),
(13, 3, 'action', 'Trash Controller', NULL, 'modules.trash', 0, NULL, 1, 1, NULL, '2017-04-02 00:54:21', '2017-04-02 00:54:21'),
(14, 3, 'action', 'Edit Controller', NULL, 'modules.edit', 0, NULL, 1, 1, NULL, '2017-04-02 00:57:06', '2017-04-02 00:57:06'),
(15, 3, 'action', 'Delete Controller', NULL, 'modules.destroy', 0, NULL, 1, 1, NULL, '2017-04-02 00:57:28', '2017-04-02 00:57:28'),
(16, 3, 'action', 'Restore Controller', NULL, 'modules.restore', 0, NULL, 1, 1, NULL, '2017-04-02 00:57:54', '2017-04-02 00:57:54'),
(17, 3, 'action', 'Actions', NULL, 'modules.actions', 0, NULL, 1, 1, NULL, '2017-04-02 00:59:33', '2017-04-02 00:59:33'),
(18, 3, 'action', 'Add Action', NULL, 'actions.create', 0, NULL, 1, 1, NULL, '2017-04-02 01:00:44', '2017-04-02 01:00:44'),
(19, 3, 'action', 'Edit Action', NULL, 'actions.edit', 0, NULL, 1, 1, NULL, '2017-04-02 01:01:06', '2017-04-02 01:01:06'),
(20, 3, 'action', 'Delete Action', NULL, 'actions.destroy', 0, NULL, 1, 1, NULL, '2017-04-02 01:01:39', '2017-04-02 01:01:39'),
(21, 3, 'action', 'Trash Action', NULL, 'actions.trash', 0, NULL, 1, 1, NULL, '2017-04-02 01:02:10', '2017-04-02 01:02:10'),
(22, 3, 'action', 'Trashed Actions', NULL, 'actions.trashed', 0, NULL, 1, 1, NULL, '2017-04-02 01:02:29', '2017-04-02 01:02:29'),
(23, 7, 'action', 'Edit Role', NULL, 'roles.edit', 0, NULL, 1, 1, NULL, '2017-04-02 01:03:50', '2017-04-02 01:03:50'),
(24, 7, 'action', 'Delete Role', NULL, 'roles.destroy', 0, NULL, 1, 1, NULL, '2017-04-02 01:05:57', '2017-04-02 01:05:57'),
(25, 7, 'action', 'Trash Role', NULL, 'roles.trash', 0, NULL, 1, 1, NULL, '2017-04-02 01:06:17', '2017-04-02 01:06:17'),
(26, 7, 'action', 'Trashed Roles', NULL, 'roles.trashed', 0, NULL, 1, 1, NULL, '2017-04-02 01:06:44', '2017-04-02 01:06:44'),
(27, 7, 'action', 'Restore Role', NULL, 'roles.restore', 0, NULL, 1, 1, NULL, '2017-04-02 01:07:32', '2017-04-02 01:07:32'),
(29, 0, 'controller', 'Users', 'User module', 'users', 1, 'icon-user', 1, 1, NULL, '2017-04-02 04:17:54', '2017-04-02 04:23:06'),
(30, 29, 'action', 'All Users', NULL, 'users.index', 1, NULL, 1, 1, NULL, '2017-04-02 04:20:22', '2017-04-02 04:20:22'),
(31, 29, 'action', 'Add User', 'Add new user', 'users.create', 1, NULL, 1, 1, NULL, '2017-04-02 04:29:20', '2017-04-02 04:29:20'),
(32, 29, 'action', 'Edit User', NULL, 'users.edit', 0, NULL, 1, 1, NULL, '2017-04-02 21:29:53', '2017-04-02 21:29:53'),
(33, 29, 'action', 'Trashed Users', NULL, 'users.trashed', 1, NULL, 1, 1, NULL, '2017-04-02 21:40:17', '2017-04-02 21:42:09'),
(34, 0, 'controller', 'Departments', 'Department module', 'departments', 1, 'icon-office', 1, 1, NULL, '2017-04-03 19:19:40', '2017-04-03 19:19:40'),
(35, 34, 'action', 'All Departments', 'List of all departments', 'departments.index', 1, NULL, 1, 1, NULL, '2017-04-04 21:26:44', '2017-04-04 21:26:44'),
(36, 34, 'action', 'Add Department', NULL, 'departments.create', 1, NULL, 1, 1, NULL, '2017-04-04 23:52:02', '2017-04-04 23:52:16'),
(37, 0, 'controller', 'Designations', 'Designation module', 'designations', 1, 'icon-user-tie', 1, 1, NULL, '2017-04-05 06:38:00', '2017-04-05 06:38:00'),
(39, 37, 'action', 'All Designations', NULL, 'designations.index', 1, NULL, 1, 1, NULL, '2017-04-05 06:55:14', '2017-04-05 06:55:14'),
(40, 37, 'action', 'Add Designation', NULL, 'designations.create', 1, NULL, 1, 1, NULL, '2017-04-05 06:56:27', '2017-04-05 06:56:27'),
(41, 29, 'action', 'Trash User', NULL, 'users.trash', 0, NULL, 1, 1, NULL, '2017-04-05 21:32:52', '2017-04-05 21:32:52'),
(42, 29, 'action', 'Restore User', NULL, 'users.restore', 0, NULL, 1, 1, NULL, '2017-04-05 21:33:15', '2017-04-05 21:33:15'),
(43, 29, 'action', 'Delete User', NULL, 'users.destroy', 0, NULL, 1, 1, NULL, '2017-04-05 21:33:43', '2017-04-05 21:33:43'),
(44, 7, 'action', 'Store Role', NULL, 'roles.store', 0, NULL, 1, 1, NULL, '2017-04-05 23:40:13', '2017-04-05 23:40:13'),
(45, 7, 'action', 'Update Role', NULL, 'roles.update', 0, NULL, 1, 1, NULL, '2017-04-05 23:40:29', '2017-04-05 23:40:29'),
(46, 3, 'action', 'Store Controller', NULL, 'modules.store', 0, NULL, 1, 1, NULL, '2017-04-05 23:48:32', '2017-04-05 23:49:20'),
(48, 3, 'action', 'Update Controller', NULL, 'modules.update', 0, NULL, 1, 1, NULL, '2017-04-06 00:21:58', '2017-04-06 00:21:58'),
(49, 3, 'action', 'Store Action', NULL, 'actions.store', 0, NULL, 1, 1, NULL, '2017-04-06 00:23:22', '2017-04-06 00:23:22'),
(50, 3, 'action', 'Update Action', NULL, 'actions.update', 0, NULL, 1, 1, NULL, '2017-04-06 00:30:31', '2017-04-06 00:30:31'),
(51, 29, 'action', 'Store User', NULL, 'user.store', 0, NULL, 1, 1, NULL, '2017-04-06 00:31:46', '2017-04-06 00:31:46'),
(52, 29, 'action', 'Update User', NULL, 'users.update', 0, NULL, 1, 1, NULL, '2017-04-06 00:31:59', '2017-04-06 00:31:59'),
(53, 34, 'action', 'Store Department', NULL, 'departments.store', 0, NULL, 1, 1, NULL, '2017-04-06 00:33:18', '2017-04-06 00:33:18'),
(54, 34, 'action', 'Edit Department', NULL, 'departments.edit', 0, NULL, 1, 1, NULL, '2017-04-06 00:36:56', '2017-04-06 00:36:56'),
(55, 34, 'action', 'Update Department', NULL, 'departments.update', 0, NULL, 1, 1, NULL, '2017-04-06 00:37:18', '2017-04-06 00:37:18'),
(56, 34, 'action', 'Delete Department', NULL, 'departments.destroy', 0, NULL, 1, 1, NULL, '2017-04-06 00:37:51', '2017-04-06 00:37:51'),
(57, 34, 'action', 'Trash Department', NULL, 'departments.trash', 0, NULL, 1, 1, NULL, '2017-04-06 00:38:19', '2017-04-06 00:38:19'),
(58, 34, 'action', 'Trashed Departments', NULL, 'departments.trashed', 0, NULL, 1, 1, NULL, '2017-04-06 00:38:45', '2017-04-06 00:38:45'),
(59, 34, 'action', 'Restore Department', NULL, 'departments.restore', 0, NULL, 1, 1, NULL, '2017-04-06 00:39:03', '2017-04-06 00:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `module_role`
--

CREATE TABLE IF NOT EXISTS `module_role` (
  `id` int(10) unsigned NOT NULL,
  `module_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1214 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_role`
--

INSERT INTO `module_role` (`id`, `module_id`, `role_id`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(522, 1, 4, 1, 1, '2017-04-03 23:49:09', '2017-04-03 23:49:09'),
(523, 2, 4, 1, 1, '2017-04-03 23:49:09', '2017-04-03 23:49:09'),
(906, 1, 5, 1, 1, '2017-04-05 23:43:05', '2017-04-05 23:43:05'),
(907, 2, 5, 1, 1, '2017-04-05 23:43:05', '2017-04-05 23:43:05'),
(1158, 1, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1159, 2, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1160, 3, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1161, 4, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1162, 5, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1163, 11, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1164, 13, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1165, 14, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1166, 15, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1167, 16, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1168, 17, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1169, 18, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1170, 19, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1171, 20, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1172, 21, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1173, 22, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1174, 46, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1175, 48, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1176, 49, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1177, 50, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1178, 7, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1179, 10, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1180, 12, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1181, 23, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1182, 24, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1183, 25, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1184, 26, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1185, 27, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1186, 44, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1187, 45, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1188, 29, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1189, 30, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1190, 31, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1191, 32, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1192, 33, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1193, 41, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1194, 42, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1195, 43, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1196, 51, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1197, 52, 1, 1, 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(1198, 34, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1199, 35, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1200, 36, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1201, 53, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1202, 54, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1203, 55, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1204, 56, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1205, 57, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1206, 58, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1207, 59, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1208, 37, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1209, 39, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1210, 40, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1211, 60, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1212, 61, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(1213, 62, 1, 1, 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `title_ur` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `country_id`, `title`, `title_ur`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Baluchistan', NULL, 1, '2017-05-13 17:31:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `homepage_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `level` int(11) NOT NULL DEFAULT '0',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `homepage_id`, `title`, `description`, `level`, `created_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Developer', NULL, 0, 1, 1, NULL, '2017-03-25 22:20:12', '2017-05-13 12:38:09'),
(4, 2, 'Deputy Commissioner', NULL, 0, 1, 1, NULL, '2017-04-01 22:07:18', '2017-04-03 23:49:09'),
(5, 2, 'ADC', NULL, 0, 1, 1, NULL, '2017-05-14 10:39:40', '2017-05-14 10:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `tehsils`
--

CREATE TABLE IF NOT EXISTS `tehsils` (
  `id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `title_ur` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `union_councils`
--

CREATE TABLE IF NOT EXISTS `union_councils` (
  `id` int(11) NOT NULL,
  `tehsil_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `title_ur` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `designation_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `department_id`, `designation_id`, `title`, `email`, `contact`, `username`, `password`, `last_login`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Waqar Akbar', 'waqarakbar89@gmail.com', '+923459153835', 'waqarakbar89', '10470c3b4b1fed12c3baac014be15fac67c6e815', '2017-05-15 04:35:57', 1, 1, NULL, '2017-03-25 22:27:05', '2017-05-14 23:35:57'),
(6, 4, 2, 2, 'DC Quetta', 'dcquetta@gmail.com', '', 'dcquetta', '10470c3b4b1fed12c3baac014be15fac67c6e815', '2017-05-14 15:40:15', 1, 1, NULL, '2017-04-03 23:22:11', '2017-05-14 10:40:15'),
(7, 5, 2, 4, 'ADC Quetta', 'adcquetta@gmail.com', NULL, 'adcquetta', '10470c3b4b1fed12c3baac014be15fac67c6e815', '2017-05-14 15:43:33', 1, 1, NULL, '2017-05-14 10:41:51', '2017-05-14 10:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE IF NOT EXISTS `user_logs` (
  `id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `url`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '/quetta_domicile/adp', 1, '2017-05-13 12:16:58', '2017-05-13 12:16:58'),
(2, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 12:16:58', '2017-05-13 12:16:58'),
(3, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 12:27:49', '2017-05-13 12:27:49'),
(4, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 12:34:45', '2017-05-13 12:34:45'),
(5, '/quetta_domicile/adp', 1, '2017-05-13 12:35:44', '2017-05-13 12:35:44'),
(6, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 12:35:44', '2017-05-13 12:35:44'),
(7, '/quetta_domicile/adp', 1, '2017-05-13 12:36:27', '2017-05-13 12:36:27'),
(8, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 12:36:27', '2017-05-13 12:36:27'),
(9, '/quetta_domicile/adp/modules/controllers', 1, '2017-05-13 12:36:45', '2017-05-13 12:36:45'),
(10, '/quetta_domicile/adp/roles', 1, '2017-05-13 12:36:52', '2017-05-13 12:36:52'),
(11, '/quetta_domicile/adp/roles/1/edit', 1, '2017-05-13 12:37:02', '2017-05-13 12:37:02'),
(12, '/quetta_domicile/adp/roles', 1, '2017-05-13 12:37:47', '2017-05-13 12:37:47'),
(13, '/quetta_domicile/adp/roles/1/edit', 1, '2017-05-13 12:37:51', '2017-05-13 12:37:51'),
(14, '/quetta_domicile/adp/roles/1', 1, '2017-05-13 12:38:09', '2017-05-13 12:38:09'),
(15, '/quetta_domicile/adp/roles', 1, '2017-05-13 12:38:10', '2017-05-13 12:38:10'),
(16, '/quetta_domicile/adp/roles/1/edit', 1, '2017-05-13 12:38:13', '2017-05-13 12:38:13'),
(17, '/quetta_domicile/adp/roles', 1, '2017-05-13 12:38:21', '2017-05-13 12:38:21'),
(18, '/quetta_domicile/adp/budgets/release', 1, '2017-05-13 12:38:25', '2017-05-13 12:38:25'),
(19, '/quetta_domicile/adp/modules/controllers', 1, '2017-05-13 12:38:36', '2017-05-13 12:38:36'),
(20, '/quetta_domicile/adp/modules/60/trash', 1, '2017-05-13 12:38:44', '2017-05-13 12:38:44'),
(21, '/quetta_domicile/adp/modules/controllers', 1, '2017-05-13 12:38:44', '2017-05-13 12:38:44'),
(22, '/quetta_domicile/adp/modules/trashed_controllers', 1, '2017-05-13 12:38:48', '2017-05-13 12:38:48'),
(23, '/quetta_domicile/adp/modules/60', 1, '2017-05-13 12:38:51', '2017-05-13 12:38:51'),
(24, '/quetta_domicile/adp/modules/trashed_controllers', 1, '2017-05-13 12:38:52', '2017-05-13 12:38:52'),
(25, '/quetta_domicile/adp/modules/trashed_controllers', 1, '2017-05-13 12:39:52', '2017-05-13 12:39:52'),
(26, '/quetta_domicile/adp/designations', 1, '2017-05-13 12:39:57', '2017-05-13 12:39:57'),
(27, '/quetta_domicile/adp/designations/2/edit', 1, '2017-05-13 12:40:01', '2017-05-13 12:40:01'),
(28, '/quetta_domicile/adp/designations/2', 1, '2017-05-13 12:40:14', '2017-05-13 12:40:14'),
(29, '/quetta_domicile/adp/designations/2/edit', 1, '2017-05-13 12:40:14', '2017-05-13 12:40:14'),
(30, '/quetta_domicile/adp/designations', 1, '2017-05-13 12:40:16', '2017-05-13 12:40:16'),
(31, '/quetta_domicile/adp/users', 1, '2017-05-13 12:40:20', '2017-05-13 12:40:20'),
(32, '/quetta_domicile/adp/users/6/edit', 1, '2017-05-13 12:40:24', '2017-05-13 12:40:24'),
(33, '/quetta_domicile/adp/users/6', 1, '2017-05-13 12:41:08', '2017-05-13 12:41:08'),
(34, '/quetta_domicile/adp/users/6/edit', 1, '2017-05-13 12:41:08', '2017-05-13 12:41:08'),
(35, '/quetta_domicile/adp/users', 1, '2017-05-13 12:41:10', '2017-05-13 12:41:10'),
(36, '/quetta_domicile/adp/modules/controllers', 1, '2017-05-13 12:41:17', '2017-05-13 12:41:17'),
(37, '/quetta_domicile/adp/modules/1/actions', 1, '2017-05-13 12:41:21', '2017-05-13 12:41:21'),
(38, '/quetta_domicile/adp/modules/controllers', 1, '2017-05-13 12:41:23', '2017-05-13 12:41:23'),
(39, '/quetta_domicile/adp/users/profile', 1, '2017-05-13 12:41:32', '2017-05-13 12:41:32'),
(40, '/quetta_domicile/adp/users/change_password', 1, '2017-05-13 12:41:43', '2017-05-13 12:41:43'),
(41, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 12:42:00', '2017-05-13 12:42:00'),
(42, '/quetta_domicile/adp', 1, '2017-05-13 15:19:53', '2017-05-13 15:19:53'),
(43, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:19:54', '2017-05-13 15:19:54'),
(44, '/quetta_domicile/adp/modules/controllers', 1, '2017-05-13 15:19:57', '2017-05-13 15:19:57'),
(45, '/quetta_domicile/adp/modules/create', 1, '2017-05-13 15:19:59', '2017-05-13 15:19:59'),
(46, '/quetta_domicile/adp/modules/trashed_controllers', 1, '2017-05-13 15:20:03', '2017-05-13 15:20:03'),
(47, '/quetta_domicile/adp/modules/controllers', 1, '2017-05-13 15:20:06', '2017-05-13 15:20:06'),
(48, '/quetta_domicile/adp/roles', 1, '2017-05-13 15:20:15', '2017-05-13 15:20:15'),
(49, '/quetta_domicile/adp/roles', 1, '2017-05-13 15:21:33', '2017-05-13 15:21:33'),
(50, '/quetta_domicile/adp/roles', 1, '2017-05-13 15:25:18', '2017-05-13 15:25:18'),
(51, '/quetta_domicile/adp/roles', 1, '2017-05-13 15:26:14', '2017-05-13 15:26:14'),
(52, '/quetta_domicile/adp/roles', 1, '2017-05-13 15:26:40', '2017-05-13 15:26:40'),
(53, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:32:44', '2017-05-13 15:32:44'),
(54, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:33:39', '2017-05-13 15:33:39'),
(55, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:34:20', '2017-05-13 15:34:20'),
(56, '/adp', 1, '2017-05-13 15:35:34', '2017-05-13 15:35:34'),
(57, '/adp/dashboard', 1, '2017-05-13 15:35:34', '2017-05-13 15:35:34'),
(58, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:38:38', '2017-05-13 15:38:38'),
(59, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:38:54', '2017-05-13 15:38:54'),
(60, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:40:10', '2017-05-13 15:40:10'),
(61, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:42:28', '2017-05-13 15:42:28'),
(62, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:48:17', '2017-05-13 15:48:17'),
(63, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:48:58', '2017-05-13 15:48:58'),
(64, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:50:03', '2017-05-13 15:50:03'),
(65, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:51:13', '2017-05-13 15:51:13'),
(66, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 15:51:30', '2017-05-13 15:51:30'),
(67, '/quetta_domicile/adp/modules/controllers', 1, '2017-05-13 15:51:36', '2017-05-13 15:51:36'),
(68, '/quetta_domicile/adp/modules/controllers', 1, '2017-05-13 15:52:05', '2017-05-13 15:52:05'),
(69, '/quetta_domicile/adp/modules/1/actions', 1, '2017-05-13 15:52:35', '2017-05-13 15:52:35'),
(70, '/quetta_domicile/adp/modules/1/actions', 1, '2017-05-13 15:53:52', '2017-05-13 15:53:52'),
(71, '/quetta_domicile/adp/modules/1/actions/create', 1, '2017-05-13 15:54:56', '2017-05-13 15:54:56'),
(72, '/quetta_domicile/adp/modules/controllers', 1, '2017-05-13 15:55:28', '2017-05-13 15:55:28'),
(73, '/quetta_domicile/adp/modules/trashed_controllers', 1, '2017-05-13 15:55:30', '2017-05-13 15:55:30'),
(74, '/quetta_domicile/adp/modules/create', 1, '2017-05-13 15:55:32', '2017-05-13 15:55:32'),
(75, '/quetta_domicile/adp/modules/trashed_controllers', 1, '2017-05-13 15:56:58', '2017-05-13 15:56:58'),
(76, '/quetta_domicile/adp/modules/create', 1, '2017-05-13 15:57:00', '2017-05-13 15:57:00'),
(77, '/quetta_domicile/adp/roles', 1, '2017-05-13 15:57:08', '2017-05-13 15:57:08'),
(78, '/quetta_domicile/adp/roles/create', 1, '2017-05-13 15:57:10', '2017-05-13 15:57:10'),
(79, '/quetta_domicile/adp/roles/create', 1, '2017-05-13 16:02:27', '2017-05-13 16:02:27'),
(80, '/quetta_domicile/adp/users', 1, '2017-05-13 16:02:41', '2017-05-13 16:02:41'),
(81, '/quetta_domicile/adp/users/1/edit', 1, '2017-05-13 16:02:47', '2017-05-13 16:02:47'),
(82, '/quetta_domicile/adp/users', 1, '2017-05-13 16:02:51', '2017-05-13 16:02:51'),
(83, '/quetta_domicile/adp/departments', 1, '2017-05-13 16:02:55', '2017-05-13 16:02:55'),
(84, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 16:03:09', '2017-05-13 16:03:09'),
(85, '/quetta_domicile/adp/users/profile', 1, '2017-05-13 16:04:04', '2017-05-13 16:04:04'),
(86, '/quetta_domicile/adp/users/1/profile_update', 1, '2017-05-13 16:04:28', '2017-05-13 16:04:28'),
(87, '/quetta_domicile/adp/users/profile', 1, '2017-05-13 16:04:28', '2017-05-13 16:04:28'),
(88, '/quetta_domicile/adp/dashboard', 1, '2017-05-13 16:05:25', '2017-05-13 16:05:25'),
(89, '/quetta_domicile/adp', 1, '2017-05-14 10:32:18', '2017-05-14 10:32:18'),
(90, '/quetta_domicile/adp/dashboard', 1, '2017-05-14 10:32:18', '2017-05-14 10:32:18'),
(91, '/quetta_domicile/bdms', 1, '2017-05-14 10:37:57', '2017-05-14 10:37:57'),
(92, '/quetta_domicile/bdms', 1, '2017-05-14 10:37:57', '2017-05-14 10:37:57'),
(93, '/quetta_domicile/bdms/dashboard', 1, '2017-05-14 10:37:57', '2017-05-14 10:37:57'),
(94, '/quetta_domicile/bdms/modules/controllers', 1, '2017-05-14 10:38:02', '2017-05-14 10:38:02'),
(95, '/quetta_domicile/bdms/roles', 1, '2017-05-14 10:38:15', '2017-05-14 10:38:15'),
(96, '/quetta_domicile/bdms/designations', 1, '2017-05-14 10:38:28', '2017-05-14 10:38:28'),
(97, '/quetta_domicile/bdms/designations/create', 1, '2017-05-14 10:38:47', '2017-05-14 10:38:47'),
(98, '/quetta_domicile/bdms/designations', 1, '2017-05-14 10:38:56', '2017-05-14 10:38:56'),
(99, '/quetta_domicile/bdms/designations/create', 1, '2017-05-14 10:38:56', '2017-05-14 10:38:56'),
(100, '/quetta_domicile/bdms/designations', 1, '2017-05-14 10:38:59', '2017-05-14 10:38:59'),
(101, '/quetta_domicile/bdms/roles', 1, '2017-05-14 10:39:14', '2017-05-14 10:39:14'),
(102, '/quetta_domicile/bdms/roles/create', 1, '2017-05-14 10:39:23', '2017-05-14 10:39:23'),
(103, '/quetta_domicile/bdms/roles', 1, '2017-05-14 10:39:40', '2017-05-14 10:39:40'),
(104, '/quetta_domicile/bdms/roles/create', 1, '2017-05-14 10:39:40', '2017-05-14 10:39:40'),
(105, '/quetta_domicile/bdms/roles', 1, '2017-05-14 10:39:45', '2017-05-14 10:39:45'),
(106, '/quetta_domicile/bdms/roles/4/edit', 1, '2017-05-14 10:39:48', '2017-05-14 10:39:48'),
(107, '/quetta_domicile/bdms/users', 1, '2017-05-14 10:39:54', '2017-05-14 10:39:54'),
(108, '/quetta_domicile/bdms/users/6/edit', 1, '2017-05-14 10:39:59', '2017-05-14 10:39:59'),
(109, '/quetta_domicile/bdms', 6, '2017-05-14 10:40:15', '2017-05-14 10:40:15'),
(110, '/quetta_domicile/bdms/dashboard', 6, '2017-05-14 10:40:15', '2017-05-14 10:40:15'),
(111, '/quetta_domicile/bdms/dashboard', 6, '2017-05-14 10:40:33', '2017-05-14 10:40:33'),
(112, '/quetta_domicile/bdms/users', 6, '2017-05-14 10:40:47', '2017-05-14 10:40:47'),
(113, '/quetta_domicile/bdms/dashboard', 6, '2017-05-14 10:40:47', '2017-05-14 10:40:47'),
(114, '/quetta_domicile/bdms/modules', 6, '2017-05-14 10:40:54', '2017-05-14 10:40:54'),
(115, '/quetta_domicile/bdms/dashboard', 6, '2017-05-14 10:40:54', '2017-05-14 10:40:54'),
(116, '/quetta_domicile/bdms', 1, '2017-05-14 10:41:01', '2017-05-14 10:41:01'),
(117, '/quetta_domicile/bdms/dashboard', 1, '2017-05-14 10:41:01', '2017-05-14 10:41:01'),
(118, '/quetta_domicile/bdms/users', 1, '2017-05-14 10:41:05', '2017-05-14 10:41:05'),
(119, '/quetta_domicile/bdms/users/create', 1, '2017-05-14 10:41:07', '2017-05-14 10:41:07'),
(120, '/quetta_domicile/bdms/users', 1, '2017-05-14 10:41:51', '2017-05-14 10:41:51'),
(121, '/quetta_domicile/bdms/users/create', 1, '2017-05-14 10:41:52', '2017-05-14 10:41:52'),
(122, '/quetta_domicile/bdms', 7, '2017-05-14 10:42:03', '2017-05-14 10:42:03'),
(123, '/quetta_domicile/bdms/dashboard', 7, '2017-05-14 10:42:03', '2017-05-14 10:42:03'),
(124, '/quetta_domicile/bdms/dashboard', 7, '2017-05-14 10:42:10', '2017-05-14 10:42:10'),
(125, '/quetta_domicile/bdms', 1, '2017-05-14 10:42:25', '2017-05-14 10:42:25'),
(126, '/quetta_domicile/bdms/dashboard', 1, '2017-05-14 10:42:25', '2017-05-14 10:42:25'),
(127, '/quetta_domicile/bdms/roles', 1, '2017-05-14 10:42:31', '2017-05-14 10:42:31'),
(128, '/quetta_domicile/bdms/roles/5/edit', 1, '2017-05-14 10:42:33', '2017-05-14 10:42:33'),
(129, '/quetta_domicile/bdms/roles/5/edit', 1, '2017-05-14 10:43:22', '2017-05-14 10:43:22'),
(130, '/quetta_domicile/bdms/roles/5/edit', 1, '2017-05-14 10:43:25', '2017-05-14 10:43:25'),
(131, '/quetta_domicile/bdms', 7, '2017-05-14 10:43:33', '2017-05-14 10:43:33'),
(132, '/quetta_domicile/bdms/dashboard', 7, '2017-05-14 10:43:33', '2017-05-14 10:43:33'),
(133, '/quetta_domicile/bdms', 1, '2017-05-14 23:35:58', '2017-05-14 23:35:58'),
(134, '/quetta_domicile/bdms/dashboard', 1, '2017-05-14 23:35:58', '2017-05-14 23:35:58'),
(135, '/quetta_domicile/bdms/modules/controllers', 1, '2017-05-14 23:37:29', '2017-05-14 23:37:29'),
(136, '/quetta_domicile/bdms/departments', 1, '2017-05-14 23:39:09', '2017-05-14 23:39:09'),
(137, '/quetta_domicile/bdms/designations', 1, '2017-05-14 23:39:16', '2017-05-14 23:39:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_district_id_foreign` (`district_id`),
  ADD KEY `departments_department_type_id_foreign` (`department_type_id`);

--
-- Indexes for table `department_types`
--
ALTER TABLE `department_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divisions_province_id_foreign` (`province_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_role`
--
ALTER TABLE `module_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tehsils`
--
ALTER TABLE `tehsils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `union_councils`
--
ALTER TABLE `union_councils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `department_types`
--
ALTER TABLE `department_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `module_role`
--
ALTER TABLE `module_role`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1214;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tehsils`
--
ALTER TABLE `tehsils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `union_councils`
--
ALTER TABLE `union_councils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=138;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
