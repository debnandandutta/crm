-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2020 at 02:59 AM
-- Server version: 10.3.24-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dynajnbx_crmbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `areaName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regionId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `areaName`, `regionId`, `created_at`, `updated_at`) VALUES
(1, 'Chattogram', 2, '2020-08-11 02:03:11', '2020-08-11 02:08:14'),
(2, 'Dhaka', 5, '2020-08-11 02:03:28', '2020-09-01 10:42:44'),
(3, 'Rangpur', 1, '2020-08-11 09:23:44', '2020-09-01 10:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED DEFAULT NULL,
  `enquiry_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `ticket_id`, `enquiry_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 4, 0, 3, '<p>Sloved</p>', '2020-08-05 11:36:47', '2020-08-05 11:36:47'),
(2, 8, 0, 5, '<p>Done</p>', '2020-08-10 17:41:15', '2020-08-10 17:41:15'),
(3, 8, 0, 5, 'Resolve', '2020-08-10 17:42:03', '2020-08-10 17:42:03'),
(4, 13, 0, 1, '<p>I informed the caller about the JTI careline.&nbsp;<br></p>', '2020-08-10 18:40:04', '2020-08-10 18:40:04'),
(5, 16, 0, 1, '<p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 14px;\">Informed the SO. and today he visited the shop too.</span><br></p>', '2020-08-11 08:31:01', '2020-08-11 08:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 -> unread. 1 > read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'K2', 'Cigarette Brand', NULL, '2020-08-11 08:33:36'),
(2, 'More', 'Cigarette Brand', '2020-08-10 13:46:17', '2020-08-10 13:46:17'),
(3, 'LD', 'Cigarette Brand', NULL, '2020-08-10 18:27:35'),
(4, 'Others', 'Careline related query, Company, Head office address, etc.', '2020-08-10 18:34:39', '2020-08-10 18:35:15'),
(5, 'Demo', 'Demo', NULL, '2020-08-10 18:28:35'),
(6, 'Navy', 'Cigarette Brand', '2020-08-06 10:51:25', '2020-08-10 18:25:49'),
(7, 'Sheikh', 'Cigarette Brand', '2020-08-06 11:14:37', '2020-08-10 18:26:52'),
(10, 'Demo', 'Agent', '2020-09-15 10:57:47', '2020-09-15 10:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `template_type`, `template_subject`, `default_content`, `custom_content`, `created_at`, `updated_at`) VALUES
(1, 'user_invitation', 'You are invited', '<html>\r\n                            <div style=\"max-width: 60%; color: #000000 !important; font-family: Helvetica; margin:auto; padding-bottom: 10px;\">\r\n                                <div style=\"text-align:center; padding-top: 10px; padding-bottom: 10px; background: #e9ecef;box-shadow: 0 5px 5px -6px #777;\">\r\n                                    <h1>{app_name}</h1>\r\n                                </div>\r\n                                <div style=\"padding: 35px;padding-left:20px; font-size:17px; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc;\">Hi,<br>\r\n                {invited_by} invited you to join with the team on {app_name}.<br>\r\n                Please click the link below to accept the invitation!<br>\r\n                {verification_link}        </div>\r\n                            </div>\r\n                        </html>', NULL, NULL, NULL),
(2, 'account_verification', 'Account verification', '<html>\r\n                            <div style=\"max-width: 60%; color: #000000 !important; font-family: Helvetica; margin:auto; padding-bottom: 10px;\">\r\n                                <div style=\"text-align:center; padding-top: 10px; padding-bottom: 10px; background: #e9ecef;box-shadow: 0 5px 5px -6px #777;\">\r\n                                    <h1>{app_name}</h1>\r\n                                </div>\r\n                                <div style=\"padding: 35px;padding-left:20px; font-size:17px; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc;\">Hi {user_name},<br>\r\n                        Your account has been created.<br>\r\n                        Please click the link below to verify your email.<br>\r\n                        {verification_link}        </div>\r\n                            </div>\r\n                        </html>', NULL, NULL, NULL),
(3, 'reset_password', 'Reset password', '<html>\r\n                            <div style=\"max-width: 60%; color: #000000 !important; font-family: Helvetica; margin:auto; padding-bottom: 10px;\">\r\n                                <div style=\"text-align:center; padding-top: 10px; padding-bottom: 10px; background: #e9ecef;box-shadow: 0 5px 5px -6px #777;\">\r\n                                    <h1>{app_name}</h1>\r\n                                </div>\r\n                                <div style=\"padding: 35px;padding-left:20px; font-size:17px; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc;\">Hi,<br>\r\n                        You have requested to change your password.<br>\r\n                        Please click the link below to change your password!<br><br>\r\n                        <center><a href=\"{reset_password_link}\" class=\"button button-primary\" target=\"_blank\" style=\"font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); color: #FFF; display: inline-block; text-decoration: none; -webkit-text-size-adjust: none; background-color: #3097D1; border-top: 10px solid #3097D1; border-right: 18px solid #3097D1; border-bottom: 10px solid #3097D1; border-left: 18px solid #3097D1;\">Reset Password</a><br>\r\n                        <a href=\"{reset_password_link}\">{reset_password_link}</a></center>        </div>\r\n                            </div>\r\n                        </html>', NULL, NULL, NULL),
(4, 'ticket_status', 'Your ticket status changed', '<html>\r\n                            <div style=\"max-width: 60%; color: #000000 !important; font-family: Helvetica; margin:auto; padding-bottom: 10px;\">\r\n                                <div style=\"text-align:center; padding-top: 10px; padding-bottom: 10px; background: #e9ecef;box-shadow: 0 5px 5px -6px #777;\">\r\n                                    <h1>{app_name}</h1>\r\n                                </div>\r\n                                <div style=\"padding: 35px;padding-left:20px; font-size:17px; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc;\">Hello {ticket_owner_name},<br>\r\n                        <p>\r\n                            Your support ticket with ID #{ticket_id} has been marked resolved and closed.\r\n                        </p>\r\n                        <p>You can view the ticket at any time at <a href=\"{ticket_view_url}\">{ticket_view_url}</a></p><br>\r\n                        <p>Thank you</p>        </div>\r\n                            </div>\r\n                        </html>', NULL, NULL, NULL),
(5, 'ticket_comments', 'Replied your ticket {user_name}', '<html>\r\n                            <div style=\"max-width: 60%; color: #000000 !important; font-family: Helvetica; margin:auto; padding-bottom: 10px;\">\r\n                                <div style=\"text-align:center; padding-top: 10px; padding-bottom: 10px; background: #e9ecef;box-shadow: 0 5px 5px -6px #777;\">\r\n                                    <h1>{app_name}</h1>\r\n                                </div>\r\n                                <div style=\"padding: 35px;padding-left:20px; font-size:17px; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc;\"><p>Replied by: {reply_by_name}</p><br>\r\n                        <p>Title: {ticket_title}</p><br>\r\n                        <p>ID: {ticket_id}</p><br>\r\n                        <br>{comment_text},<br><br>\r\n                        <p>Status: {ticket_status}</p><br>\r\n                        <br>\r\n                        <p>You can view the ticket at any time at <a href=\"{ticket_view_url}\">{ticket_view_url}</a></p><br>\r\n                        \r\n                        <p>Thank you</p>        </div>\r\n                            </div>\r\n                        </html>', NULL, NULL, NULL),
(6, 'ticket_info', 'Your Ticket Information', '<html>\r\n                            <div style=\"max-width: 60%; color: #000000 !important; font-family: Helvetica; margin:auto; padding-bottom: 10px;\">\r\n                                <div style=\"text-align:center; padding-top: 10px; padding-bottom: 10px; background: #e9ecef;box-shadow: 0 5px 5px -6px #777;\">\r\n                                    <h1>{app_name}</h1>\r\n                                </div>\r\n                                <div style=\"padding: 35px;padding-left:20px; font-size:17px; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc;\"><p>\r\n        Thank you {user_name} for contacting our support team. A support ticket has been opened for you. You will be notified when a response is made by email. The details of your ticket are shown below:\r\n    </p>\r\n                         <br>\r\n                        <p>Priority: {ticket_priority}</p>\r\n                        <p>Status: {ticket_status}</p><br>\r\n                        <p>You can view the ticket at any time at <a href=\"{ticket_view_url}\">{ticket_view_url}</a></p><br>        </div>\r\n                            </div>\r\n                        </html>', NULL, NULL, NULL),
(7, 'password_changed', 'Password Changed Successfully', '<html>\r\n                            <div style=\"max-width: 60%; color: #000000 !important; font-family: Helvetica; margin:auto; padding-bottom: 10px;\">\r\n                                <div style=\"text-align:center; padding-top: 10px; padding-bottom: 10px; background: #e9ecef;box-shadow: 0 5px 5px -6px #777;\">\r\n                                    <h1>{app_name}</h1>\r\n                                </div>\r\n                                <div style=\"padding: 35px;padding-left:20px; font-size:17px; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc;\"><p>\r\n        Your have successfully changed password.\r\n    </p>\r\n                         <br>\r\n                        <p>Thank for stay with us.</p><br>        </div>\r\n                            </div>\r\n                        </html>', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `enquiry_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileOne` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileTwo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` int(11) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `territory` int(11) DEFAULT 0,
  `town` int(11) DEFAULT 0,
  `expiry` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tm` int(11) DEFAULT 0,
  `callerType` enum('Consumer','Retailer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Retailer',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `callType` int(11) NOT NULL,
  `complainType` int(11) DEFAULT 0,
  `storeType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dsr_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferrence` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('open','reopen','closed','exceeded','escalated') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `user_id`, `department_id`, `enquiry_id`, `title`, `shop`, `mobileOne`, `mobileTwo`, `address`, `region_id`, `area`, `territory`, `town`, `expiry`, `tm`, `callerType`, `description`, `callType`, `complainType`, `storeType`, `dsr_name`, `preferrence`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'RRM2008222133', 'Deb Nandan Dutta', 'JSDkjas', '01860009546', '01532341302', '64, South Nalapara', 2, 1, 1, 2, '2020-08-22', 4, 'Retailer', 'Asasasas', 2, 1, 'retailer', 'asdad', 0, 'open', '2020-08-22 09:34:46', '2020-08-22 09:34:46'),
(2, 1, 2, '2ZU2008222142', 'Deb Nandan Dutta', NULL, '01860009546', NULL, '64, South Nalapara', 2, 1, 1, 2, NULL, 4, 'Retailer', 'hgfghfgfgf', 2, NULL, NULL, NULL, 0, 'open', '2020-08-22 09:44:05', '2020-08-22 09:44:05'),
(3, 1, 2, '7PI2008222214', 'Deb Nandan Dutta', 'JSDkjas', '01860009546', '01532341302', '64, South Nalapara', 2, 1, 1, 1, '2020-08-28', 4, 'Retailer', 'asdad', 2, NULL, NULL, NULL, 0, 'open', '2020-08-22 10:18:06', '2020-08-22 10:18:06'),
(4, 1, 4, 'FI72008222223', 'Deb Nandan Dutta', 'JSDkjas', '01860009546', NULL, '64, South Nalapara', 2, 1, 1, 2, NULL, 4, 'Retailer', 'sdfsdfsf', 2, NULL, NULL, NULL, 0, 'open', '2020-08-22 10:24:32', '2020-08-22 10:24:32'),
(5, 1, 3, 'FQH2008222224', 'Deb Nandan Dutta', 'JSDkjas', '01860009546', NULL, '64, South Nalapara', 1, 3, NULL, NULL, NULL, NULL, 'Retailer', 'dsfsdf', 2, NULL, NULL, NULL, 0, 'closed', '2020-08-22 10:24:56', '2020-08-22 10:24:56'),
(6, 1, 5, 'GFY2008222224', 'Deb Nandan Dutta', NULL, '01860009546', NULL, '64, South Nalapara', 1, 3, NULL, NULL, NULL, NULL, 'Retailer', 'dsfds', 2, NULL, NULL, NULL, 1, 'closed', '2020-08-22 10:25:42', '2020-08-22 10:25:42'),
(7, 1, 2, 'DU42008261107', 'Mr. Kamrul Hasan', NULL, '0168000000', NULL, 'Jatrabari, Dhaka', 1, 3, 4, 3, NULL, NULL, 'Retailer', 'The consumer said that........\r\n\r\nI informed him......', 7, NULL, NULL, 'AA', 0, 'open', '2020-08-26 09:10:26', '2020-08-26 09:10:26'),
(8, 1, 3, 'S7A2008261111', 'Demo X', NULL, '0168000000', NULL, 'Jatrabari, Dhaka', 1, 3, 4, 3, NULL, NULL, 'Retailer', 'Demo', 6, 1, NULL, 'LD', 1, 'closed', '2020-08-26 09:12:50', '2020-08-26 09:12:50'),
(9, 1, 3, '312649', 'Deb Nandan Dutta', 'hhghjg', '01258665', NULL, '64, South Nalapara', 2, 1, 1, 1, NULL, 4, 'Retailer', 'hjhjh jkh kjhkjjkhkj', 5, 1, 'retailer', 'bhjghjghjg', 1, 'open', '2020-08-29 01:17:34', '2020-08-29 01:17:34'),
(10, 1, 2, '938467', 'Md Saidur', 'Raju Srore', '01840096052', NULL, 'plot no 255 block N', 1, 3, 4, 3, '2020-08-28', 0, 'Retailer', 'havi javi', 2, 1, 'pollydut', 'Saidur R Raju', 1, 'closed', '2020-08-29 01:38:55', '2020-08-28 19:41:14'),
(11, 1, 1, '989874', 'Mr. Farum', NULL, '01680000000', NULL, 'Gulshan, Dhaka 1203', 1, 3, NULL, 3, NULL, 0, 'Retailer', 'The consumer wanted to know....\r\n\r\nI informed him....', 2, NULL, NULL, NULL, 0, 'open', '2020-08-29 03:43:11', '2020-08-29 03:43:11'),
(12, 1, 4, '977107', 'Mr. Riyad Islam', NULL, '01680000000', NULL, 'Gulshan 1 gol chattar, Dhaka', 2, 3, 4, 3, NULL, 0, 'Retailer', 'The retailer complaint that', 6, 1, 'retailer', NULL, 1, 'open', '2020-08-29 03:49:18', '2020-08-31 21:07:10'),
(13, 1, 6, '193572', 'Deb Nandan Dutta', 'sfdjsklajf', '012546855', NULL, '64, South Nalapara', 0, 1, 1, NULL, '2020-09-05', 4, 'Retailer', 'jhgsad hjggsagd hjgasd hagsd', 5, 1, 'retailer', 'Ftftftft', 0, 'open', '2020-09-01 02:58:43', '2020-09-01 02:58:43'),
(14, 1, 6, '023519', 'Sabbir Hasan', NULL, '1713193255', NULL, 'Mirpur DOHS', 6, NULL, NULL, NULL, NULL, 0, 'Retailer', 'sadasd', 2, NULL, NULL, NULL, 0, 'open', '2020-09-01 16:22:02', '2020-09-01 16:22:02'),
(15, 1, 2, '210432', 'Mr. Alamin', NULL, '01873782988', NULL, 'Mirpur, Dhaka', 5, NULL, NULL, NULL, NULL, 7, 'Consumer', 'The consumer said that recently he started to smoke More cigarettes but he tasted it so strong and he has been having dizziness, coughing, and sore throat since smoking More cigarettes. He also said it would have been better to switch systems on More cigarettes. He suggested improving the quality of More brand cigarettes.	\r\n\r\nI informed him that I\'ll convey their opinion to the higher authorities.', 8, NULL, NULL, NULL, 0, 'closed', '2020-09-01 17:43:51', '2020-09-01 17:43:51'),
(16, 1, 2, '465446', 'Sabbir Hasan', NULL, '1713193255', NULL, 'Mirpur DOHS', 6, NULL, NULL, NULL, NULL, 0, 'Retailer', 'sdad', 5, NULL, NULL, NULL, 1, 'open', '2020-09-01 18:02:02', '2020-09-01 18:02:02'),
(17, 1, 4, '307109', 'AA', NULL, 'AA', NULL, 'AA', 6, NULL, NULL, NULL, NULL, 0, 'Retailer', 'AA', 6, 12, 'retailer', NULL, 1, 'open', '2020-09-01 20:21:08', '2020-09-01 20:21:08'),
(18, 1, 6, '544951', 'Robin Ahasan', 'zaeem traders', '01978005507', NULL, '55/1 Elephant Road', 5, 2, 5, 2, '2020-09-02', 7, 'Retailer', '2 packs short in 5 carton Navy', 6, 12, 'retailer', 'Riyad Islam', 0, 'closed', '2020-09-02 17:54:22', '2020-09-02 11:55:40'),
(19, 1, 2, '603846', 'Mr. Sohan', NULL, '01981509742', NULL, 'Gazipur', 6, NULL, NULL, NULL, NULL, 0, 'Consumer', 'The consumer wanted to know the retail price of the More cigarettes brand.\r\n\r\nI informed the consumer that he would get call from us and get the information the next 48 working hours.', 2, NULL, NULL, NULL, 0, 'open', '2020-09-06 15:05:42', '2020-09-06 15:05:42'),
(20, 6, 7, '576616', 'Mr. Imdadul', NULL, '01845013533 ', NULL, 'ABC', 5, 2, 5, 2, NULL, 7, 'Retailer', 'The retailer said that the price of 10 packets Sheikh Hundred cigarette brand is 800 takas, where else the Derby cigarette brand of British American Tobacco Ltd is 780 takas for 10 packets. He wanted to know the reason behind the 20 taka differences between these two brands. He suggested that if the price of Sheikh Hundred is equal to Derby brand, then the demand of the brand will increase.\r\n\r\nI informed him that I am registering his feedback, and the right personnel of JTI will take care of this matter and may contact you if needed. I also thank him for providing us his valuable feedback and for staying with us.', 8, NULL, NULL, NULL, 0, 'open', '2020-09-15 20:26:39', '2020-09-15 14:34:21'),
(21, 1, 1, '469791', 'ABC', NULL, 'ABC', NULL, 'ABC', 6, 1, NULL, NULL, NULL, 0, 'Retailer', '<p>The consumer said that</p>\r\n<p>I informed him</p>', 2, NULL, NULL, NULL, 0, 'open', '2020-09-15 20:37:33', '2020-09-20 18:36:05'),
(22, 1, 2, '095419', 'Amanul Haque', NULL, '1713193255', NULL, 'Habib City Tower 49, Sadarghat', 6, NULL, NULL, NULL, '2020-09-20', 0, 'Retailer', '<p>jjj</p>\r\n<p>lll</p>', 2, 1, NULL, 'jhj', 0, 'open', '2020-09-20 19:31:43', '2020-09-20 19:31:43'),
(23, 8, 2, '348512', 'Mr. Parvez Ahmed', NULL, '01796312072', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-09-20', 0, 'Consumer', '<table style=\"width: 972px;\" width=\"316\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 962px;\">\r\n<p>The caller wanted to know the price of the More cigarette\'s.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 944px;\" width=\"203\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 934px;\">I informed him that the United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International group) has officially launched this full flavor brand for the existing adult smoker at only 39 taka for a pack of 10 cigarettes. More, always more.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 7, NULL, NULL, NULL, 0, 'closed', '2020-09-21 17:06:21', '2020-09-21 17:06:21'),
(24, 8, 7, '265273', 'Mr. Shuvo', NULL, '01644191951 ', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-09-19', 0, 'Consumer', '<table style=\"height: 43px;\" width=\"1024\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 1014px;\">The consumer wanted to know the price of the Sheikh 100\'s cigarette\'s price.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 999px;\" width=\"203\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 989px;\">I informed him that for existing smokers United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International Group) is officially launched Sheikh Full Flavor and Sheikh smooth&nbsp; at only 78 taka per a pack of 20 cigarettes, and Sheikh 100\'s 80 taka per a pack of 20 cigarettes.&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 7, NULL, NULL, NULL, 0, 'closed', '2020-09-21 19:03:10', '2020-09-21 19:03:10'),
(25, 8, 2, '428807', 'Mr. Jubayer', NULL, '01893139850', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-09-17', 0, 'Consumer', '<table style=\"height: 41px;\" width=\"1042\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 1032px;\">The consumer said he tried the new More cigarette, and he liked the taste and its flavor. He also added his throat is little bit burning while smoking the More cigarette brand. He suggested to work on it.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 1042px; height: 97px;\" width=\"203\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 1032px;\">I thanked and informed him that I am registering his feedback, and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 5, NULL, NULL, NULL, 0, 'closed', '2020-09-21 19:13:54', '2020-09-21 19:13:54'),
(26, 6, 4, '028228', 'Md. Moktar Hossen', 'N/A', '01837551166 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-09-02', 0, 'Consumer', '<table style=\"height: 134px;\" width=\"525\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 515px;\">\r\n<p>The consumer said that he noticed every cigarette brand is using polyethylene wrapper for packaging nowadays, which is very harmful to the environment. According to him, without using any plastic, the cigarettes can have a good quality too. So, he discourages the cigarette company from using any plastic on any cigarette.</p>\r\n<p>I confirmed him that I will inform the higher authority about it.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 8, NULL, NULL, NULL, 0, 'closed', '2020-09-21 20:40:05', '2020-09-21 20:40:05'),
(27, 8, 7, '980053', 'Mr. Muskan', NULL, '01915803020', NULL, 'Gachra Bazar, Thana: Gachra, District: Gazipur, Division: Dhaka', 6, NULL, NULL, NULL, '2020-09-21', 0, 'Retailer', '<table style=\"height: 73px;\" width=\"1037\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 1027px;\">The retailer wanted to know that Sheikh brand is it the brand of JTI\'s.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 1053px; height: 138px;\" width=\"160\">\r\n<tbody>\r\n<tr style=\"height: 138px;\">\r\n<td style=\"width: 1043px; height: 138px;\">I informed him that Sheikh is a legendary cigarette brand of United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International group). Japan Tobacco International (JTI) purchased tobacco business of Akij group in 2018 and since then it is working to improve the quality of all Akij cigarette brands. For the existing smokers the Sheikh cigarette brand is produced with Japanese quality in international standard factory of Bangladesh and it is available in three varients with different taste, that are Sheikh Full Flavor, Sheikh Smooth and Sheikh 100\'s.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 7, NULL, NULL, NULL, 0, 'closed', '2020-09-22 18:38:45', '2020-09-22 18:38:45'),
(28, 8, 2, '951399', 'Mr. Ismail', NULL, '01942580048', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-09-21', 0, 'Retailer', '<table style=\"width: 946px;\" width=\"170\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 936px;\">The retailer wanted to know the price of the More cigarette\'s.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 1026px; height: 127px;\" width=\"160\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 1016px;\">I informed him that the United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International group) has officially launched this full flavor brand for the existing adult smoker at only 39 taka for a pack of 10 cigarettes. More, always more.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 7, NULL, NULL, NULL, 0, 'closed', '2020-09-22 18:46:06', '2020-09-22 18:46:06'),
(29, 6, 7, '045868', 'Md. Selim Matobbar', 'N/A', '01300892837 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-09-21', 0, 'Consumer', '<p>The consumer wanted to know the price of Sheikh 100\'s cigarette brand.</p>\r\n<p>I informed him that for existing smokers United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International Group) is officially launched Sheikh Full Flavor and Sheikh smooth&nbsp; at only 78 taka per a pack of 20 cigarettes, and Sheikh 100\'s 80 taka per a pack of 20 cigarettes.</p>', 2, NULL, NULL, NULL, 0, 'closed', '2020-09-22 19:23:06', '2020-09-22 19:23:06'),
(30, 6, 4, '208379', 'Md. Selim Matobbar', 'N/A', '01300892837 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-09-21', 0, 'Consumer', '<p>The consumer wanted to know if the smokers below 18 years can call in this careline. He also asked about the company of this careline.</p>\r\n<p>I informed him that this careline is for existing adult cigarette smokers and the company of this careline is of United Dhaka Tobacco Company (wholly owned by Japan Tobacco international group).</p>\r\n<p>&nbsp;</p>', 2, NULL, NULL, NULL, 0, 'closed', '2020-09-22 19:26:05', '2020-09-22 19:26:05'),
(31, 6, 7, '225686', 'Mr. Ashik Sheikh', 'N/A', '01707181557 ', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-09-21', 0, 'Retailer', '<p>The consumer said that the Sheikh 100\'s cigarette brand is good for its size but the taste is not satisfying him. He added that Sheikh Royal has a satisfying taste and Sheikh 100\'s taste should be like that.</p>\r\n<p>I thanked him for his valuable feedback and added that I am registering his feedback. The right personnel of United Dhaka Tobacco Company Ltd (wholly owned by Japan Tobacco International Group) will take care of this matter and may contact him if needed.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-09-22 19:31:20', '2020-09-22 19:31:20'),
(32, 6, 7, '629656', 'Mr. Habibur Rahman', 'Habib Store', '01845024856 ', 'N/A', 'Vill: Ramjan Molla Dangi, Thana: Sadar Board, District: Faridpur, Division: Dhaka', 5, NULL, NULL, NULL, '2020-09-21', 0, 'Retailer', '<p>&nbsp;The consumer wanted to know the price of Sheikh 100\'s cigarette brand\'s price.</p>\r\n<p>I informed him that for existing smokers United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International Group) is officially launched Sheikh Full Flavor and Sheikh smooth&nbsp; at only 78 taka per a pack of 20 cigarettes, and Sheikh 100\'s 80 taka per a pack of 20 cigarettes.</p>', 2, NULL, NULL, NULL, 0, 'closed', '2020-09-22 19:52:27', '2020-09-22 19:52:27'),
(33, 6, 7, '166281', 'Mr. Habibur Rahman', 'Habib Store', '01845024856 ', 'N/A', 'Vill: Ramjan Molla Dangi, Thana: Sadar, District: Faridpur, Division: Dhaka', 6, NULL, NULL, NULL, '2020-09-21', 0, 'Retailer', '<p>The consumer said that the price of Sheikh White and Sheikh Real cigarette brands were 35 taka, but now they are taking 39 taka.&nbsp;</p>\r\n<p>I informed him that I am very sad to hear about his experience and his feedback is extremely valuable for us. I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-09-22 20:10:47', '2020-09-22 20:10:47'),
(34, 6, 7, '838616', 'Mr. Sabbir Hasan', 'N/A', '01773691988 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-09-22', 0, 'Consumer', '<p>The consumer said that the size of Sheikh 100\'s cigarette is too long and it takes too much time to smoke. He suggested to give the Sheikh 100\'s cigarette brand the regular size.</p>\r\n<p>I informed him that I am very sad to hear about his experience and his feedback is extremely valuable for us. I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-09-22 20:14:58', '2020-09-22 20:14:58'),
(35, 7, 7, '958096', 'Mr. Insan Molla', NULL, '01858709387', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-09-20', 0, 'Consumer', '<p>The consumer said that recently he started to smoke Sheikh 100\'s cigarette. He said that this cigarette is not getting any strong feelings by smoking and he was not satisfied by smoking this cigarette.</p>\r\n<p>&nbsp;</p>\r\n<p>I informed him that I am registering his feedback, and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-09-22 20:17:35', '2020-09-22 20:17:35'),
(36, 7, 7, '414851', 'Mr. Insan Molla', NULL, '01858709387', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-09-20', 0, 'Consumer', '<p>The consumer said that he tried the new Sheikh 100\'s cigarette and the taste is good, but the rate of the cigarette brand is high. He wants the rate to be reasonable.</p>\r\n<p>&nbsp;</p>\r\n<p>I informed him that I am registering his feedback, and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-09-22 20:46:39', '2020-09-22 20:46:39'),
(37, 8, 2, '665901', 'Mr. Shuvo', NULL, '01957020294', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-09-25', 0, 'Consumer', '<table style=\"width: 948px;\" width=\"170\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 938px;\">The consumer wanted to know the price of a stick of More cigarettes. He further said that the More cigarette\'s retail price from him was five taka instead of four taka. He suggested looking into this matter so as not to put such a high price. He wanted to know the wholesale rate of the market. He also wanted to know how to get the gifts given by the company.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 1042px; height: 103px;\" width=\"160\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 1032px;\">I informed him that United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International group) has officially launched this full flavor brand for the existing adult smoker at only 39 taka for a pack of 10 cigarettes. More, always more. I also informed him to visit his most often or nearest retailer for the price sold by a stick. I also told him that when he buys our products he buys at the right price and avoids all those stores that put extra value. I also informed him that I have registered his query and one of our representatives will contact him in due time. I also thank him for staying with us.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 7, NULL, NULL, NULL, 0, 'closed', '2020-09-25 19:43:12', '2020-09-25 19:43:12'),
(38, 8, 2, '844295', 'Mr. Shuvo', NULL, '01957020294', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-09-25', 0, 'Consumer', '<table style=\"height: 39px;\" width=\"1038\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 1028px;\">The consumer said that he tried our More brand cigarettes, and he liked the taste.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 941px;\" width=\"160\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 931px;\">I informed him that I am registering his feedback, and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 5, NULL, NULL, NULL, 0, 'closed', '2020-09-25 19:45:29', '2020-09-25 19:45:29'),
(39, 6, 7, '138557', 'MD. Shejan Ahmed', 'N/A', '01753514850 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-09-27', 0, 'Consumer', '<p>The consumer wanted to know the price of Sheikh 100\'s cigarette brand.</p>\r\n<p>I informed him that for existing smokers United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International Group) is officially launched Sheikh Full Flavor and Sheikh smooth&nbsp; at only 78 taka per a pack of 20 cigarettes, and Sheikh 100\'s 80 taka per a pack of 20 cigarettes.</p>', 2, NULL, NULL, NULL, 0, 'closed', '2020-09-27 23:42:11', '2020-09-27 23:42:11'),
(40, 6, 7, '366514', 'Md. Akash Rahaman', 'N/A', '01721563282 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2019-09-28', 0, 'Consumer', '<p>The consumer wanted to know the price of Sheikh 100\'s cigarette brand.</p>\r\n<p>I informed him that for existing smokers United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International Group) is officially launched Sheikh Full Flavor and Sheikh smooth&nbsp; at only 78 taka per a pack of 20 cigarettes, and Sheikh 100\'s 80 taka per a pack of 20 cigarettes.</p>', 2, NULL, NULL, NULL, 0, 'closed', '2020-09-29 03:51:46', '2020-09-29 03:51:46'),
(41, 6, 2, '865599', 'Md. Faruk', 'N/A', '09638294141 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-09-29', 0, 'Consumer', '<p>The consumer said that he noticed some dark signs on the More cigarettes while they are left open for two days. He wanted to know if he can change the cigarettes. He also asked if the More cigarette brand is going to be available in the market always, or it is going to be stopped suddenly like the LD cigarette brand.</p>\r\n<p>I sincerely apologized for his problem and informed that I am registering his query; the right personnel of United Dhaka Tobacco Company Ltd (wholly owned by Japan Tobacco International Group) will take care of this matter and may contact him if needed. About the availability, I informed that for the existing cigarette smokers our cigarette brands are always available in the market, but in case, if he cannot avail our cigarette brands from the shops, he is encouraged to call us and let us know about it.&nbsp;</p>', 7, NULL, NULL, NULL, 0, 'closed', '2020-09-29 19:55:21', '2020-09-29 19:55:21'),
(42, 6, 2, '584239', 'Md. Belal Shena', 'N/A', '01961805349 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-09-30', 0, 'Consumer', '<p>&nbsp;The consumer said that he likes the More cigarette brand and encouraged to increase its supply.</p>\r\n<p>I thanked him for his valuable feedback that is very imortant to us and I will inform the higher authority about it.</p>', 5, NULL, NULL, NULL, 0, 'closed', '2020-09-30 23:58:04', '2020-09-30 23:58:04'),
(43, 8, 2, '139780', 'Md. Ali', NULL, '01408309988', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-10-01', 0, 'Consumer', '<table style=\"height: 56px;\" width=\"943\">\r\n<tbody>\r\n<tr style=\"height: 54px;\">\r\n<td style=\"width: 933px; height: 54px;\">\r\n<p>The consumer wanted to know the price of the More cigarette\'s.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"height: 123px;\" width=\"1040\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 1030px;\">I informed him that the United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International group) has officially launched this full flavor brand for the existing adult smoker at only 39 taka for a pack of 10 cigarettes. More, always more.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 7, NULL, NULL, NULL, 0, 'closed', '2020-10-01 18:19:06', '2020-10-01 18:19:06'),
(44, 8, 2, '419105', 'Md. Sojib', NULL, '01644024854', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-10-01', 0, 'Consumer', '<table style=\"height: 53px;\" width=\"895\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 885px;\">The consumer wanted to know the per stick price of the More cigarettes brand.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"height: 84px;\" width=\"1051\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 1041px;\">I informed him that United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International group) has officially launched this full flavor brand for the existing adult smoker at only 39 taka for a pack of 10 cigarettes. More, always more. I also informed him to visit his most often or nearest retailer for the price sold by stick.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 7, NULL, NULL, NULL, 0, 'closed', '2020-10-01 18:21:58', '2020-10-01 18:21:58'),
(45, 8, 7, '282985', 'Mr. Rajib', NULL, '01943392808', NULL, 'Vill: Kashiani Bus Counter, Thana: Kashiani, District: Gopalgonj, Division: Dhaka', 6, NULL, NULL, NULL, '2020-10-01', 0, 'Retailer', '<table style=\"height: 53px;\" width=\"752\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 742px;\">The retailer said that he tried our Sheikh brand cigarettes, and he liked the taste.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"height: 45px;\" width=\"1038\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 1028px;\">I informed him that I am registering his feedback, and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 5, NULL, NULL, NULL, 0, 'closed', '2020-10-01 18:26:30', '2020-10-01 18:26:30'),
(46, 8, 7, '264069', 'Mr. Rajib', NULL, '01943392808', NULL, 'Vill: Kashiani Bus Counter, Thana: Kashiani, District: Gopalgonj, Division: Dhaka', 6, NULL, NULL, NULL, '2020-10-01', 0, 'Retailer', '<table style=\"height: 46px;\" width=\"859\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 849px;\">The Retailer said that the Sheikh 100\'s cigarette\'s taste is strong. He suggested that to make it light for better taste.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 888px;\" width=\"160\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 878px;\">I informed him that his feedback is extremely valuable for us. I am registering his feedback, and the right personnel of United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International group) will take care of his matter and may contact him if needed.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-01 18:30:07', '2020-10-01 18:30:07'),
(47, 8, 7, '952349', 'Mr. Habibur', NULL, '01795053614', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-10-02', 0, 'Consumer', '<table style=\"height: 46px;\" width=\"917\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 907px;\">The consumer said that Sheikh wrote free on the packet of cigarettes, and I want to know what it will give free?</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"height: 101px;\" width=\"972\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 962px;\">Thank you for your valuable query. I am registering your information, and the right personnel of United Dhaka Tobacco Company Ltd (wholly owned by Japan Tobacco International Group)&nbsp; will take care of this matter and may contact you if needed. Thank you for staying with us.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 7, NULL, NULL, NULL, 0, 'closed', '2020-10-03 02:35:26', '2020-10-03 02:35:26'),
(48, 8, 7, '451598', 'Mr. Habibur', NULL, '01795053614', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-10-02', 0, 'Consumer', '<table style=\"height: 48px;\" width=\"884\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 874px;\">The consumer said that Sheikh 100\'s cigarettes taste was good at first. He also said that the cigarette would work better if it is tested again as before.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"height: 5px;\" width=\"892\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 882px;\">I informed him that his feedback is extremely valuable to us. I am registering his feedback, and the right personnel of United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International group) will take care of his matter and may contact him if needed.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-03 02:38:40', '2020-10-03 02:38:40'),
(49, 8, 7, '107053', 'Mr. Salman', NULL, '01892138014', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-10-02', 0, 'Consumer', '<table style=\"height: 62px;\" width=\"911\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 901px;\">The consumer said that Sheikh\'s temper should be increased. He added that cigarettes become lighter after being kept for a week. He suggested that if Sheikh\'s temper was not increased, it would not run in the market.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"height: 5px;\" width=\"934\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 924px;\">I informed him that his feedback is extremely valuable to us. I am registering his feedback, and the right personnel of United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International group) will take care of his matter and may contact him if needed.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-03 02:42:43', '2020-10-03 02:42:43'),
(50, 6, 2, '378222', 'Md. Rana', 'N/A', '01909506687', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-10-03', 0, 'Consumer', '<p>&nbsp;The consumer wanted to know the price of More cigarette brand.</p>\r\n<p>I informed him that United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International group) has officially launched this full flavor brand for the existing adult smoker at only 39 taka for a pack of 10 cigarettes. More, always more.</p>', 2, NULL, NULL, NULL, 0, 'closed', '2020-10-03 17:15:08', '2020-10-03 17:15:08'),
(51, 6, 6, '837056', 'Mr. Milon', 'N/A', '01970306250 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-10-07', 0, 'Consumer', '<p>The consumer said that the Navy cigarette brand is excellent, but recently he noticed some changes like a red label on the packet and different stick colors, which he does not like. According to him, the cigarette brand was good enough earlier, so there is no need for any changes. Since the earlier version of the brand was good and lasted very long, consumers are losing their interest in the new version. He suggested keeping the Navy cigarette brand unchanged.</p>\r\n<p>I thanked him for his valuable feedback and informed that I am registering his feedback. The right personnel of United Dhaka Tobacco Company Ltd (wholly owned by Japan Tobacco International Group) will take care of this matter and may contact him if needed.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-08 01:36:34', '2020-10-08 01:36:34'),
(52, 6, 7, '026875', 'Mr. Ripon', 'N/A', '01778165505 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-08-10', 0, 'Consumer', '<p>&nbsp;The consumer wanted to know the price of Sheikh 100\'s cigarette brand.</p>\r\n<p>I informed him that for existing smokers United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International Group) is officially launched Sheikh Full Flavor and Sheikh smooth&nbsp; at only 78 taka per a pack of 20 cigarettes, and Sheikh 100\'s 80 taka per a pack of 20 cigarettes.</p>', 2, NULL, NULL, NULL, 0, 'closed', '2020-10-08 21:00:30', '2020-10-08 21:00:30'),
(53, 6, 2, '674383', 'Mr. Anwar', 'N/A', '01401949783 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-10-09', 0, 'Consumer', '<p>&nbsp;The consumer said that he is smoking the More Cigarette brand, and he is enjoying the taste, but the price is not reasonable, so he suggested minimizing the rate.</p>\r\n<p>I thanked him for his valuable feedback, and said that I am registering his feedback. The rights personnel of United Dhaka Tobacco Company Ltd (wholly owned by Japan Tobacco International Group) will take care of this matter and may contact if needed.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-09 15:25:49', '2020-10-09 15:25:49'),
(54, 6, 2, '968870', 'Md. Tonmoy Ahmed', 'Tanvir Store', '01792285992 ', 'N/A', 'Vill: Harishpur, Upozilla: Harinakunda, Dist: Jhenaidah, Division: Khulna', 6, NULL, NULL, NULL, '2020-10-09', 0, 'Retailer', '<p>The retailer wanted to know the wholesale price of the More cigarette brand.</p>\r\n<p>I informed him that United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International group) has officially launched this full flavor brand for the existing adult smoker at only 39 taka for a pack of 10 cigarettes. More, always more.</p>', 2, NULL, NULL, NULL, 0, 'closed', '2020-10-09 15:28:52', '2020-10-09 15:28:52'),
(55, 6, 7, '761452', 'Md. Shohel', 'N/A', '01939487725 ', 'N/A', 'Lakeper, Tepakhola, Dist: Faridpur, Division: Dhaka', 6, NULL, NULL, NULL, '2020-10-09', 0, 'Consumer', '<p>The consumer said that he noticed a banner in the tea stall where a tree sign was given and written: \"Keep searching to get something new.\" He got to know of the shopkeeper that the banner has been given by the JTI Company. The meaning of the given statement in the banner is not clear to the consumer, so he wanted to know the meaning.&nbsp;</p>\r\n<p>I thanked him for his valuable query, and said that I am registering it. The right personnel of United Dhaka Tobacco Company Ltd (wholly owned by Japan Tobacco International Group) will take care of this matter and may contact if needed.</p>', 7, NULL, NULL, NULL, 0, 'closed', '2020-10-09 18:49:29', '2020-10-09 18:49:29'),
(56, 6, 6, '061432', 'Md. Shaheen', 'N/A', '01835622267 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-10-10', 0, 'Consumer', '<p>The consumer said that he called in this careline on 08th October. He disliked the changes in the Navy cigarette brand and said he along with&nbsp;&nbsp; his friends will stop smoking this brand if the company does not bring the earlier taste and package. He added that he did not stop smoking the brand even though the price had been increased, but now, since he does not like the changes, he may stop smoking it.&nbsp;</p>\r\n<p>I sincerely apologized for his experience and informed him that I am registering his feedback. The right personnel of United Dhaka Tobacco Company Ltd (wholly owned by Japan Tobacco International Group) will take care of this matter and may contact him if needed.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-10 20:58:45', '2020-10-10 20:58:45'),
(57, 6, 6, '283994', 'Mr. Miraj', 'Forid Store', '01867074833 ', 'N/A', 'Ispahany Dairy Road, Kalurghat, Chattogram', 6, NULL, NULL, NULL, '2020-10-10', 0, 'Retailer', '<p>The retailer said that the sale of the Navy cigarette brand has decreased because Navy cigarette\'s filter was soft earlier, but now the filter is hard, that the consumers do not like. He suggested fixing the problem.</p>\r\n<p>I sincerely apologized for his experience and informed him that I am registering his feedback. The right personnel of United Dhaka Tobacco Company Ltd (wholly owned by Japan Tobacco International Group) will take care of this matter and may contact him if needed.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-10 21:00:50', '2020-10-10 21:00:50'),
(58, 6, 7, '140321', 'Mr. Rigan', 'Billal General Store', '01908547578 ', 'N/A', 'Lavour Collony Bazar, CEPZ, Chattogram', 6, NULL, NULL, NULL, '2020-10-11', 0, 'Retailer', '<p>The retailer said that the price of Sheikh 100\'s cigarette brand is given 80 taka in the packet, but customers are buying it at less rate. As a result, they are facing loss while selling this cigarette brand.</p>\r\n<p>&nbsp;I informed him that I am very sad to hear about his experience and his feedback is extremely valuable for us. I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-12 04:10:40', '2020-10-12 04:10:40'),
(59, 6, 6, '765229', 'Md. Dishan', 'Rubel Medico', '01938604358 ', 'N/A', 'Lavour Collony Bazar, CEPZ, Chattogram', 6, NULL, NULL, NULL, '2020-10-11', 0, 'Retailer', '<p>The retailer said that the sale of the Navy cigarette brand is decreasing because buyers are complaining that they are facing a cough for smoking it.</p>\r\n<p>&nbsp;I informed him that I am very sad to hear about his experience and his feedback is extremely valuable for us. I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-12 04:19:44', '2020-10-12 04:19:44'),
(60, 6, 2, '750735', 'Mr. Niloy chowdhury', 'N/A', '01818814684 ', 'N/A', 'Zirabo, Ashulia, Upazila: Savar, Dhaka', 6, NULL, NULL, NULL, '2020-10-11', 0, 'Consumer', '<p>The consumer said that the price of More cigarette brands is given 39 taka in the packets but the shopkeepers are keeping 50 taka. He added that almost every shop in his area is keeping this price.</p>\r\n<p>&nbsp;I informed him that I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-12 04:21:16', '2020-10-12 04:21:16'),
(61, 6, 6, '565953', 'Md. Rubel', 'Random shop', '01893052211 ', 'N/A', 'Motirhaat, Thana: Lokkhipur, Upazilla: Komolnagar, Dist: Noakhali, Chattogram', 6, NULL, NULL, NULL, '2020-10-12', 0, 'Retailer', '<p>The retailer said the Navy cigarette brand is not good, and the buyers are complaining about the taste of this brand.&nbsp;</p>\r\n<p>I informed him that I am very sad to hear about his experience and his feedback is extremely valuable for us. I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 6, 11, NULL, NULL, 0, 'closed', '2020-10-12 19:36:36', '2020-10-12 19:36:36'),
(62, 6, 7, '377784', 'Mr. Robiul Islam', 'Random shop', '01949871421 ', 'N/A', 'Lakshmipasha Chourasta, Upazilla: Lohagora, Dist: Narail, Khulna', 6, NULL, NULL, NULL, '2020-10-12', 0, 'Retailer', '<p>The retailer said that he could not find the Sheikh 100\'s cigarette brand in his area. He added that the cigarette brand is good, and the buyers are looking for it.</p>\r\n<p>&nbsp;I informed him that I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-12 19:45:27', '2020-10-12 19:45:27'),
(63, 6, 6, '017411', 'Md. Abul Hossen', 'Hridoy Store', '01825384183 ', 'N/A', 'Ispahany Dairy Road, Kalurghat, Chattogram', 6, NULL, NULL, NULL, '2020-10-12', 0, 'Retailer', '<p>The retailer said that the buyers are disliking the Navy cigarette brand, and this is why they are facing loss.</p>\r\n<p>&nbsp;I informed him that I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-12 19:53:21', '2020-10-12 19:53:21'),
(64, 6, 6, '786936', 'Mr. Abir', 'N/A', '01867634636 ', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-12-10', 0, 'Consumer', '<p>The consumer said that he called in this careline a weak earlier, but the authority did not take any necessary step, now he cannot smoke his regular brand, Navy cigarette brand.&nbsp;He added that the new Navy cigarette brand with the golden grip, does not taste good at all.&nbsp;He&nbsp;thinks&nbsp;it&nbsp;tastes&nbsp;like other local cigarettes.&nbsp;He&nbsp;wants&nbsp;the&nbsp;higher&nbsp;authority to&nbsp;make&nbsp;this brand like it was&nbsp;before.</p>\r\n<p>I informed him that I am very sad to hear about his experience and his feedback is extremely valuable for us. I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 6, 11, NULL, NULL, 0, 'closed', '2020-10-14 22:20:17', '2020-10-14 22:20:17'),
(65, 6, 6, '990761', 'Mr. S. M. Alamin', 'N/A', '01754397461', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-10-15', 0, 'Consumer', '<p>The consumer said that he was a chain smoker, and he used to smoke Navy cigarette always, but now because of the changes in Navy cigarette brand, he was forced to smoke Gold Leaf cigarettes. He added that the new Navy cigarette brand causes cough and it does not have any good taste or scent. He contacted with an SR of Navy cigarette brand, they informed him that the company brought the changes to do an experiment. The consumer thinks it is a very bad decision taken by the authority, because the changes in this brand are effecting its popularity. He wants the authority to take necessary steps as soon as possible.</p>\r\n<p>I informed him that I am very sad to hear about his experience and his feedback is extremely valuable for us. I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-15 21:16:25', '2020-10-15 21:16:25'),
(66, 6, 6, '988717', 'Mr. Iliyas Hossen', 'Billal Store', '01316350794', 'N/A', 'Ramdhuni, Habiganj, Chandpur, Chattogram', 6, NULL, NULL, NULL, '2020-10-15', 0, 'Retailer', '<p>The retailer said that customers are not smoking the Navy Cigarette brand like before, because they say it does not taste well anymore. As a result the sale of Star cigarette brand has raised. The retailer thinks if the Navy cigarette brand is formed into the previous quality, it will be popular again.</p>\r\n<p>I informed him that I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-15 21:18:16', '2020-10-15 21:18:16'),
(67, 6, 2, '471537', 'Mr. Babu', 'N/A', '01911748530', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-10-15', 0, 'Consumer', '<p>The&nbsp;consumer&nbsp;said&nbsp;that he is smoking More cigarette brand very recently.&nbsp;While in&nbsp;shop, an SR of&nbsp;JTI&nbsp;met&nbsp;him and&nbsp;took&nbsp;his&nbsp;name&nbsp;and&nbsp;age, then gave him a&nbsp;packet.&nbsp;Later,&nbsp;he&nbsp;found&nbsp;out that the&nbsp;packet&nbsp;contains only some sticks.&nbsp;He&nbsp;wanted&nbsp;to&nbsp;know&nbsp;if it&nbsp;was&nbsp;a&nbsp;fun&nbsp;or something and the&nbsp;reason&nbsp;behind it.&nbsp;He added that some of his family members once worked in Dhaka United Tobacco Company Ltd, so he did not expect something like this.</p>\r\n<p>I informed him that I am very sad to hear about his experience but I am unable to provide him the information that he requires. I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed.</p>', 7, NULL, NULL, NULL, 0, 'closed', '2020-10-15 22:39:23', '2020-10-15 22:39:23'),
(68, 6, 7, '744130', 'Mr. Aminul', 'Hatem Ali Store', '01768617585', 'N/A', 'Shoilat, Upazilla: Sreepur, Dist: Gazipur, Division: Dhaka', 6, NULL, NULL, NULL, '2020-10-17', 0, 'Retailer', '<p>&nbsp;The Rretailer wanted to know if there is any gift or offer given with Shekh cigarette brand.</p>\r\n<p>I thanked him for his query and requested to contact with any respective SR of JTI about any promtional offer.</p>', 2, NULL, NULL, NULL, 0, 'closed', '2020-10-17 14:20:05', '2020-10-17 14:20:05'),
(69, 6, 2, '194791', 'Mr. Shopon Islam', 'Shopon Tea Stall', '01910925284', 'N/A', 'Shadgiri bazar, Thana: Harinakundu, Dist: Jhenaidah, Division: Khulna', 6, NULL, NULL, NULL, '2020-10-18', 0, 'Retailer', '<p>The retailer said that the SR of JTI offered six plates with 60 packets of More cigarette brands, but now he cannot find the SR. He heard that the SR was supplying lighters with More cigarettes in other shops except for his shop. Besides, he is running out of cigarettes and cannot order anymore because he could not meet any SR. He wants the authority to send an SR to him as soon as possible.</p>\r\n<p>I informed him that I am very sad to hear about his experience and his feedback is extremely valuable for us. I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-22 17:46:56', '2020-10-22 17:46:56'),
(70, 6, 7, '639867', 'Mr. Shohid Islam Shaon', 'Allahor Daan Paan Bitan', '01953997411', 'N/A', 'Rajanigandha Super Market, Thana: Kafrul, Mirpur, Dist: Dhaka, Division: Dhaka', 6, NULL, NULL, NULL, '2020-10-18', 0, 'Retailer', '<p>The retailer said that there&nbsp;were&nbsp;some features given in the packet of Sheikh 100\'s cigarette brand, which is&nbsp;1.&nbsp;Assurance of a strong taste, 2.&nbsp;Extra tobacco and 3.&nbsp;The smoker will be given a symbol of heroism.&nbsp;Anyway,&nbsp;he&nbsp;wants&nbsp;to&nbsp;know&nbsp;the&nbsp;meaning&nbsp;of the&nbsp;last&nbsp;one, and he is&nbsp;quite&nbsp;confused&nbsp;about it.</p>\r\n<p>I thanked him for his valuable query, and said that I am registering it. The right personnel of United Dhaka Tobacco Company Ltd (wholly owned by Japan Tobacco International Group) will take care of this matter and may contact if needed.</p>', 7, NULL, NULL, NULL, 0, 'closed', '2020-10-22 17:50:27', '2020-10-22 17:50:27'),
(71, 6, 7, '429527', 'Mr. Jibon', 'Lima Telecom', '01914107486', NULL, 'P/S: Gomostapur, Dist: Natore, Division: Rajshahi', 6, NULL, NULL, NULL, '2020-10-21', 0, 'Retailer', '<p>The retailer said that the price of Sheikh 100\'s cigarette brand seemed high to him.</p>\r\n<p>I informed him that I am very sad to hear about his experience but I am unable to provide him the information that he requires. I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-22 17:53:52', '2020-10-22 17:53:52'),
(72, 6, 7, '314182', 'Mr. Hamidul Islam Hamid', 'Mayer Dowa', '01929239085', NULL, 'Mohakhali Bus Terminal, Dist: Dhaka, Division: Dhaka', 6, NULL, NULL, NULL, '2020-10-22', 0, 'Retailer', '<p>The&nbsp;retailer&nbsp;said&nbsp;that&nbsp;he is&nbsp;interested&nbsp;to&nbsp;have&nbsp;a&nbsp;dealership&nbsp;with&nbsp;JTI.</p>\r\n<p>I informed him that I am registering his query. The right personnel of United Dhaka Tobacco Ltd. (wholly owned by Japan Tobacco International Group) will take care of this matter and may contact him if needed.</p>', 7, NULL, NULL, NULL, 0, 'closed', '2020-10-22 17:56:10', '2020-10-22 17:56:10'),
(73, 8, 2, '951108', 'Mr. Shishir', NULL, '01792763076', NULL, 'N/A', 6, NULL, NULL, NULL, '2020-10-06', 0, 'Consumer', '<table style=\"height: 44px;\" width=\"840\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 830.667px;\">The consumer said that he is a fan of Navy cigarettes. He added that he tried our More cigarettes and after smoking More cigarettes his throat was burning.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"height: 120px;\" width=\"957\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 947.333px;\">I informed him that his feedback is extremely valuable for us. I am registering his feedback, and the right personnel of United Dhaka Tobacco Company Limited (wholly owned by Japan Tobacco International group) will take care of his matter and may contact him if needed.</td>\r\n</tr>\r\n</tbody>\r\n</table>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-23 16:33:52', '2020-10-23 16:33:52'),
(74, 6, 7, '054449', 'Mr. Roshid', 'N/A', '01793717304', 'N/A', 'N/A', 6, NULL, NULL, NULL, '2020-10-25', 0, 'Consumer', '<p>The consumer said that he has been smoking the Sheikh 100 cigarette brand for 20/25 days, and experiencing a coughing problem caused by this cigarette.</p>\r\n<p>I informed him that I am very sad to hear about his experience and his feedback is extremely valuable for us. I am registering his feedback and the right personnel of JTI will take care of this matter and may contact him if needed. I also thank him for providing us his valuable feedback and for staying with us.</p>', 8, NULL, NULL, NULL, 0, 'closed', '2020-10-25 18:39:52', '2020-10-25 18:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_subtitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutus_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutus_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutus_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_work_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_work_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_notification` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_sent_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_api` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_notification` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `registration_verification` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verification` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sms_verification` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `mail_driver` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mail Driver',
  `smtp_host` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'SMTP Host',
  `smtp_port` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'SMTP Port',
  `smtp_username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'SMTP Username',
  `smtp_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'SMTP Password',
  `smtp_encryption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'SMTP Encryption',
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'From email',
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'From name',
  `ticket_counter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ticket_counter',
  `ticket_solved` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ticket_solved',
  `kb_counter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'kb_counter',
  `client_counter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'client_counter',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `app_name`, `app_description`, `app_keywords`, `app_language`, `logo`, `favicon_icon`, `header_title`, `header_subtitle`, `testimonial_title`, `testimonial_details`, `aboutus_keyword`, `aboutus_title`, `aboutus_details`, `social_title`, `gallery_title`, `gallery_details`, `service_title`, `service_details`, `how_work_title`, `how_work_details`, `footer_text`, `contact_title`, `contact_address`, `contact_phone`, `contact_email`, `email_notification`, `email_sent_from`, `sms_api`, `sms_notification`, `registration_verification`, `email_verification`, `sms_verification`, `mail_driver`, `smtp_host`, `smtp_port`, `smtp_username`, `smtp_password`, `smtp_encryption`, `from_email`, `from_name`, `ticket_counter`, `ticket_solved`, `kb_counter`, `client_counter`, `created_at`, `updated_at`) VALUES
(1, 'GBSL', 'Ultimate Knowledge Base Ticket Support System', 'Ticket, Support, System, eticket, laravel, knowledge base ticket', NULL, 'uploads/logo/ceuNM7gFVqfsmwqMQgOreZs0LDrx4TvicDAOEZca.png', 'uploads/logo/G2SubAMDTEtV9tBZZyPcJFNBAQCspHZEzLx2dNIN.png', 'Ultimate Knowledge Base Ticket Support System', 'Its a support application for our product. We normally response within 24 hours', 'WHAT CLIENTS SAY?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'helpy about, helpy ticket support, helpy knowledge base, helpy faq', 'About US', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.', 'FIND US ON SOCIAL MEDIA', NULL, NULL, 'WHAT WE DO ?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s.', 'How we works', 'Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'CONTACT US', 'BD Trade Center, Dhaka, Bangladesh', '+88 051515455', 'xyz@demo.com', '', NULL, NULL, '', '', '', '', 'smtp', 'mail.peace-ca.com', '26', 'admin@peace-ca.com', 'R9ST+?AUB$G', 'tls', 'admin@peace-ca.com', 'GBSL', '2755', '1055', '5755', '755', NULL, '2020-09-03 11:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `how_works`
--

CREATE TABLE `how_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_works`
--

INSERT INTO `how_works` (`id`, `title`, `icon`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Listen From Clients', 'fa fa-question', 'Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut, convallis eros sollicitudin turpis.', '2020-08-05 09:37:13', '2020-08-05 09:37:13'),
(2, 'Find The Problem', 'fa fa-dot-circle-o', 'Faucibus ante, in porttitor tellus blandit et. Phasellus tincidunt metus lectus sollicitudin feugiat pharetra consectetur.', '2020-08-05 09:37:13', '2020-08-05 09:37:13'),
(3, 'Provide Right Solutions', 'fa fa-check', 'Maecenas pulvinar, risus in facilisis dignissim, quam nisi hendrerit nulla, id vestibulum metus nullam viverra porta.', '2020-08-05 09:37:13', '2020-08-05 09:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 => InActive, 1=> Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Irregulari Service (IS)', 2, 1, '2020-08-16 05:27:57', '2020-08-16 06:17:12'),
(2, 'Inquiry', 1, 1, '2020-08-16 05:31:43', '2020-08-16 05:31:43'),
(3, '(ED) Not Reimbursed: Distributor Expired Claim not yet settled', 3, 1, '2020-08-16 05:32:33', '2020-08-16 05:32:33'),
(4, 'Rural Neighborhood Grocer', 4, 1, '2020-08-16 05:33:01', '2020-08-16 05:33:01'),
(5, 'Praises', 1, 1, '2020-08-16 06:09:03', '2020-08-28 21:51:47'),
(6, 'Complaint', 1, 1, '2020-08-16 21:12:25', '2020-08-16 21:12:25'),
(7, 'Queries', 1, 1, '2020-08-16 21:12:32', '2020-08-16 21:12:32'),
(8, 'Suggestions', 1, 1, '2020-08-16 21:12:42', '2020-08-16 21:12:42'),
(9, 'Demo', 2, 1, '2020-08-16 21:13:07', '2020-08-16 21:13:07'),
(10, 'Memo related', 2, 1, '2020-09-01 11:34:49', '2020-09-01 11:34:49'),
(11, 'Product Quality', 2, 1, '2020-09-01 11:35:02', '2020-09-01 11:35:02'),
(12, 'Others', 2, 1, '2020-09-01 11:50:39', '2020-09-01 11:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_bases`
--

CREATE TABLE `knowledge_bases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinned` int(11) NOT NULL DEFAULT 0 COMMENT 'pinned =>1, nonpinned => 0',
  `view_count` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 => draft, 1=> published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knowledge_bases`
--

INSERT INTO `knowledge_bases` (`id`, `department_id`, `title`, `content`, `file`, `pinned`, `view_count`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Beatae quia velit perspiciatis quia unde quibusdam.', '<p>Animi nobis blanditiis fugiat rem esse sint ratione. </p>\n\n<p>Sit quae voluptatibus asperiores quas optio ea qui. </p>\n\n<p>Asperiores ex est qui impedit. Voluptate ab </p>\n\n<p>cumque voluptatem amet voluptatem </p>\n\n<p>non illum ipsam.Animi nobis blanditiis fugiat rem esse sint ratione.</p>\n\n<p>Sit quae voluptatibus asperiores quas optio ea qui.</p>\n\n<p>Asperiores ex est qui impedit. Voluptate ab</p>\n\n<p>cumque voluptatem amet voluptatem</p>\n\n<p>non illum ipsam.</p>', NULL, 0, 4, 1, 1, '2020-08-05 09:37:13', '2020-10-22 21:12:40'),
(2, 1, 'A ex iure qui vero repellendus optio omnis.', 'Vel numquam sed id deleniti laborum. Odio atque aspernatur omnis modi sed. Voluptatem commodi quam voluptatem assumenda non.', NULL, 0, 0, 1, 1, '2020-08-05 09:37:13', '2020-08-05 09:37:13'),
(3, 1, 'Omnis qui et ipsa rerum quasi inventore delectus.', '<p>Non necessitatibus doloremque accusantium est necessitatibus aperiam.</p>\n\n<p> Non et sed dolore veniam molestiae voluptas.</p>\n\n<p> Non aspernatur labore quas tempora blanditiis.</p>', NULL, 0, 3, 1, 1, '2020-08-05 09:37:13', '2020-10-22 21:11:50'),
(4, 1, 'Cupiditate omnis ex quidem ex distinctio commodi velit.', 'Consectetur iste at eveniet soluta. Quaerat esse et impedit labore qui. Nesciunt doloribus eaque sint eos qui amet voluptatem.', NULL, 0, 1, 1, 1, '2020-08-05 09:37:13', '2020-09-10 09:30:42'),
(5, 1, 'Veritatis odio est quis accusamus.', 'Fugiat eaque magni eum aut. Aut facilis inventore assumenda. Quaerat est qui nam. Asperiores ratione nihil non dolores ut. Maxime consequuntur modi et nihil. Quia distinctio aut non voluptatem.', NULL, 0, 0, 1, 1, '2020-08-05 09:37:13', '2020-09-10 09:51:30'),
(8, 2, 'Any release letter available for the labels?', '<p>huu</p>', '1601305954.pdf', 0, 0, 1, 1, '2020-09-28 19:12:34', '2020-09-28 19:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `regionId` int(11) NOT NULL DEFAULT 0,
  `areaId` int(11) NOT NULL DEFAULT 0,
  `territoryId` int(11) NOT NULL DEFAULT 0,
  `townId` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 => InActive, 1=> Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `email`, `mobile`, `type`, `regionId`, `areaId`, `territoryId`, `townId`, `status`, `created_at`, `updated_at`) VALUES
(1, 'John Does', 'jon@gmail.com', '0186545695', 1, 2, 0, 0, 0, 1, '2020-08-11 13:26:11', '2020-09-01 11:30:25'),
(2, 'Deb Nandan Dutta', 'saydur@getco-bst.net', '01860009546', 1, 1, 0, 0, 0, 1, '2020-08-11 09:53:08', '2020-08-11 09:53:08'),
(3, 'Dhaka Area Manager', 'saydur@getco-bst.net', '018654569561', 2, 2, 1, 0, 0, 1, '2020-08-12 10:21:39', '2020-08-12 11:30:38'),
(4, 'romanas', 'rumi@gmail.com', '0187569865', 3, 2, 1, 1, 0, 1, '2020-08-12 12:11:44', '2020-08-12 12:43:24'),
(5, 'high sales man', 'kjhkhkjhhhjhjkhsdsfds@gmail.com', '018687667878', 4, 2, 2, 1, 2, 1, '2020-08-13 02:21:12', '2020-08-13 03:07:30'),
(6, 'Saydur', 'saydur@getco-bst.net', '01843690674', 3, 2, 1, 3, 0, 1, '2020-08-13 08:07:30', '2020-09-01 10:51:33'),
(7, 'Kamrul Hasan', 'kamrulhasan.jti@getco-bsl.net', '0168*****97', 3, 5, 2, 5, 0, 1, '2020-08-16 20:55:58', '2020-09-01 10:49:34'),
(8, 'Rupok', '123@gmail.com', '0168******', 1, 5, 0, 0, 0, 1, '2020-08-16 20:58:26', '2020-09-01 11:10:10'),
(9, 'Mr. Druvo Hasan', '123@gmail.com', '0168*******', 2, 3, 1, 0, 0, 1, '2020-08-16 21:00:08', '2020-08-16 21:00:08'),
(10, 'Robin Ahsan', 'robin@getco-bsl.net', '0190*****00', 3, 5, 2, 4, 0, 1, '2020-09-01 10:50:48', '2020-09-01 10:50:48'),
(11, 'Mr. Sakib', 'Sakib@abc.com', '0190*****00', 4, 5, 2, 4, 6, 1, '2020-09-01 11:19:27', '2020-09-01 11:19:27'),
(12, 'Mr. Sahin', 'Sahin@abc.com', '0190*****00', 4, 5, 2, 5, 2, 1, '2020-09-01 11:24:01', '2020-09-01 11:24:01'),
(13, 'Mr. Faruk', 'Faruk@abc.com', '0190*****00', 4, 2, 1, 2, 5, 1, '2020-09-01 11:25:06', '2020-09-01 11:25:06'),
(14, 'Fahim Masud', 'Fahimmasud@abc.com', '0190*****00', 2, 5, 2, 0, 0, 1, '2020-09-01 11:33:07', '2020-09-01 11:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_28_053348_create_tickets_table', 1),
(4, '2018_05_28_053430_create_departments_table', 1),
(5, '2018_05_28_073406_create_comments_table', 1),
(6, '2018_08_18_104833_create_notifications_table', 1),
(7, '2018_08_18_125516_create_roles_table', 1),
(8, '2019_03_10_082912_create_knowledge_bases_table', 1),
(9, '2019_09_04_170202_create_testimonials_table', 1),
(10, '2019_09_12_194443_create_general_settings_table', 1),
(11, '2019_09_15_162818_create_services_table', 1),
(12, '2019_09_26_170946_create_votes_table', 1),
(13, '2019_10_04_154141_create_socials_table', 1),
(14, '2019_10_25_100743_create_email_templates_table', 1),
(15, '2019_12_06_093152_create_contacts_table', 1),
(16, '2020_03_28_184929_create_how_works_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `ticket_by` int(11) NOT NULL,
  `notify_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_id` int(11) NOT NULL,
  `read_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'North', '2020-08-11 01:59:04', '2020-08-11 01:59:04'),
(2, 'East', '2020-08-11 01:59:14', '2020-08-11 01:59:14'),
(3, 'South', '2020-08-11 01:59:23', '2020-08-11 01:59:23'),
(5, 'Central', '2020-08-16 21:08:59', '2020-08-16 21:08:59'),
(6, 'Any', '2020-09-01 10:21:47', '2020-09-01 10:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `regionId` int(11) NOT NULL,
  `areaId` int(11) NOT NULL,
  `territoryId` int(11) NOT NULL,
  `townId` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 => InActive, 1=> Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`id`, `name`, `email`, `address`, `mobile`, `type`, `regionId`, `areaId`, `territoryId`, `townId`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Deb Nandan', '', '64, South Nalapara', '0186000954', 1, 2, 1, 1, 1, 1, '2020-08-13 08:14:11', '2020-08-15 22:31:32'),
(2, 'Deb Nandan Dutta', 'saydur@getco-bsl.net', '64, South Nalapara', '01860009546', 1, 2, 2, 1, 1, 1, '2020-08-13 08:34:08', '2020-08-13 08:34:08'),
(3, 'Shafique Enterprises', 'q9,asuhdujhasj', 'q9,asuhdujhasj', '239482938', 2, 1, 1, 1, 1, 1, '2020-08-16 01:26:48', '2020-08-16 01:32:20'),
(4, 'Alauddin', 'aa@abc.com', 'Mirpur 2 kachabazar, Mirpur', '0190*****00', 1, 5, 2, 5, 2, 1, '2020-09-01 11:37:58', '2020-09-01 11:37:58'),
(5, 'Sumaiya Corporation', 'aa@abc@gmail.com', 'House # 7–8, Road # 01, Block – E, Section – 06, Mirpur, Dhaka1216', '0190*****00', 2, 5, 2, 5, 2, 1, '2020-09-01 11:40:16', '2020-09-01 11:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `permissions`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'a:1:{i:0;s:15:\"can_manage_null\";}', 1, '2020-08-05 09:37:13', '2020-08-05 09:37:13'),
(2, 'TKI 1', 'a:15:{i:0;s:22:\"can_manage_app_setting\";i:1;s:24:\"can_manage_email_setting\";i:2;s:25:\"can_manage_email_template\";i:3;s:20:\"can_manage_logo_icon\";i:4;s:22:\"can_manage_social_link\";i:5;s:21:\"can_manage_baner_text\";i:6;s:22:\"can_manage_testimonial\";i:7;s:18:\"can_manage_service\";i:8;s:18:\"can_manage_aboutus\";i:9;s:17:\"can_manage_footer\";i:10;s:18:\"can_manage_tickets\";i:11;s:21:\"can_manage_department\";i:12;s:13:\"can_manage_kb\";i:13;s:16:\"can_manage_staff\";i:14;s:15:\"can_manage_user\";}', 1, '2020-08-05 11:26:14', '2020-08-05 11:26:14'),
(3, 'Agent', 'a:4:{i:0;s:18:\"can_manage_tickets\";i:1;s:21:\"can_manage_department\";i:2;s:13:\"can_manage_kb\";i:3;s:15:\"can_manage_item\";}', 1, '2020-08-05 18:45:24', '2020-09-15 10:11:45'),
(4, 'Admin', 'a:7:{i:0;s:22:\"can_manage_app_setting\";i:1;s:24:\"can_manage_email_setting\";i:2;s:25:\"can_manage_email_template\";i:3;s:18:\"can_manage_tickets\";i:4;s:21:\"can_manage_department\";i:5;s:16:\"can_manage_staff\";i:6;s:15:\"can_manage_user\";}', 1, '2020-08-06 11:16:35', '2020-08-06 11:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon`, `details`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem Ipsum?', 'fa fa-bandcamp', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2020-08-05 09:37:13', '2020-08-05 09:37:13'),
(2, 'Why do we use it?', 'fa fa-handshake-o', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary text, making this the first true generator on the Internet.', '2020-08-05 09:37:13', '2020-08-05 09:37:13'),
(3, 'Where does it come from?', 'fa fa-meetup', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore', '2020-08-05 09:37:13', '2020-08-05 09:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `code`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'fa fa-facebook', 'http://facebook.com', '2020-08-05 09:37:13', '2020-08-05 09:37:13'),
(2, 'Youtube', 'fa fa-youtube', 'http://youtube.com', '2020-08-05 09:37:13', '2020-08-05 09:37:13'),
(3, 'Twitter', 'fa fa-twitter', 'http://twitter.com', '2020-08-05 09:37:13', '2020-08-05 09:37:13'),
(4, 'Linkedin', 'fa fa-linkedin-square', 'http://linkedin.com', '2020-08-05 09:37:13', '2020-08-05 09:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `territories`
--

CREATE TABLE `territories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `territoryName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regionId` int(11) NOT NULL,
  `areaId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `territories`
--

INSERT INTO `territories` (`id`, `territoryName`, `regionId`, `areaId`, `created_at`, `updated_at`) VALUES
(1, 'Nasirabad', 2, 1, '2020-08-11 02:45:20', '2020-08-11 02:45:20'),
(2, 'Halishohora', 2, 1, '2020-08-11 02:46:16', '2020-08-11 02:48:35'),
(3, 'Patenga', 2, 1, '2020-08-16 21:07:50', '2020-09-01 10:48:10'),
(4, 'Tongi', 5, 2, '2020-08-16 21:10:21', '2020-09-01 10:47:31'),
(5, 'Mirpur', 5, 2, '2020-09-01 10:46:06', '2020-09-01 10:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `image`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Fazle Lox', 'Bank Manager at xyz', 'uploads/testimonials/team1.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry', '2020-08-05 09:37:13', '2020-08-05 09:37:13'),
(2, 'Mahabub Lio', 'Co-founder at DOT-O', 'uploads/testimonials/team2.jpg', 'Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum.', '2020-08-05 09:37:13', '2020-08-05 09:37:13'),
(3, 'PAULA WILSON', 'Media Analyst at Bo Media', 'uploads/testimonials/team3.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some.', '2020-08-05 09:37:13', '2020-08-05 09:37:13'),
(4, 'MICHAEL HOLZ', 'Seo Analyst at OsCort', 'uploads/testimonials/team4.jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature', '2020-08-05 09:37:13', '2020-08-05 09:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `department_id`, `ticket_id`, `title`, `priority`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'EMFLCEJSUL', 'IT E', 'high', 'klwdnasfndsfn', 'Closed', '2020-08-05 11:14:30', '2020-08-05 11:29:56'),
(2, 1, 1, 'AZ0YCAQN9T', 'Ticket1', 'high', 'as soon as', 'Open', '2020-08-05 11:18:42', '2020-08-05 11:30:26'),
(3, 1, 3, 'LVAGRRHKRV', 'Ticket2', 'high', 'as soonas from gbsl', 'Closed', '2020-08-05 11:20:54', '2020-08-05 11:28:29'),
(4, 3, 1, 'VOUAHIMXRY', 'IT E', 'high', 'goods back', 'Closed', '2020-08-05 11:35:01', '2020-08-25 09:24:48'),
(5, 1, 5, 'I1M4E40UK7', 'Defected Product', 'high', 'The product has defected.', 'Open', '2020-08-05 17:46:43', '2020-08-05 17:46:43'),
(6, 5, 8, 'KPL7KF4YE2', 'Query on More Cigarette Brand', 'medium', 'The consumer wanted to know about the More cigarette brand and brand manufacturers.', 'Open', '2020-08-10 13:47:30', '2020-08-10 13:47:30'),
(7, 5, 1, 'NCEBAVUHJC', 'Demo', 'low', 'Demo', 'Open', '2020-08-10 13:48:11', '2020-08-10 13:48:11'),
(8, 5, 1, '2KF2OYKDR0', '1', 'medium', '1', 'Closed', '2020-08-10 13:49:36', '2020-08-10 17:42:03'),
(9, 5, 8, 'NLFOLJFXTB', '2', 'medium', '2', 'Open', '2020-08-10 13:50:03', '2020-08-10 13:50:03'),
(10, 5, 8, 'KZ3II4STAZ', '1', 'medium', '1', 'Open', '2020-08-10 13:50:59', '2020-08-10 13:50:59'),
(11, 5, 8, 'GHFOGILF61', '3', 'high', '3', 'Open', '2020-08-10 13:52:31', '2020-08-10 13:52:31'),
(12, 5, 8, 'L4MNFPZ0CC', 'Query on brand manufacturers', 'medium', 'The consumer wanted to know about More cigarette brand and brand manufacturers.', 'Open', '2020-08-10 17:59:09', '2020-08-10 17:59:09'),
(13, 5, 9, '3MTHSPVOGL', 'Query on Careline', 'low', 'The caller wanted to know about JTI careline.', 'Open', '2020-08-10 18:37:04', '2020-08-23 11:38:25'),
(14, 1, 8, 'KKWIAITZQR', 'Query on Price', 'high', 'The consumer wanted to know the price of the new More cigarette.', 'Open', '2020-08-11 07:55:18', '2020-08-11 07:55:18'),
(15, 5, 6, 'BWAO8PTKFK', 'Query on Navy - Price', 'medium', 'The consumer wanted to know the price of Navy.', 'Open', '2020-08-11 08:08:33', '2020-08-11 08:08:33'),
(16, 1, 9, 'SISMQFZGUG', 'Complaints on Irregular Service', 'high', 'The retailer said that the sales officer didn\'t come to his shop regularly and he cannot place any order.', 'Open', '2020-08-11 08:27:23', '2020-08-11 08:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `townName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regionId` int(11) NOT NULL,
  `areaId` int(11) NOT NULL,
  `territoryId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`id`, `townName`, `regionId`, `areaId`, `territoryId`, `created_at`, `updated_at`) VALUES
(1, 'Patenga', 2, 1, 3, '2020-08-11 03:43:47', '2020-09-01 11:28:32'),
(2, 'Mirpur', 5, 2, 5, '2020-08-11 03:45:15', '2020-09-01 11:18:01'),
(3, 'Gulshan', 5, 2, 4, '2020-08-16 21:11:38', '2020-09-01 11:17:26'),
(4, 'Halishohora', 2, 1, 2, '2020-08-16 22:09:47', '2020-09-01 11:27:53'),
(5, 'Nasirabad', 2, 1, 1, '2020-08-17 09:17:20', '2020-09-01 11:29:04'),
(6, 'Gazipur', 5, 2, 4, '2020-09-01 11:18:25', '2020-09-01 11:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_type` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `department_id` int(11) DEFAULT NULL,
  `notification_check` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `is_admin`, `user_type`, `role_id`, `department_id`, `notification_check`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'GBSL - Admin', 'saydur@getco-bsl.net', '$2y$10$DBGBPFv0NLtoVxAGrYYum.HFLkKcgdyY8jOAkTuHCaTXK/D2sEWvu', 'profile/a9f7c14c084f58d827072eb36bf3875d.jpeg', 1, 0, 0, NULL, NULL, 1, 'fiQaGTT7GkzUNvmKuQR6l62X4jWf0Y31kC7zqadf5y6KkTRTuLqR2BFYlbf6', '2020-08-05 09:37:13', '2020-08-10 18:23:08'),
(2, 'User Smith', 'user@demo.com', '$2y$10$C3Z659orWQgN425ZCqUnKe3LnchjjCrK8iINz8ucT/90hnTWzKnWi', NULL, 0, 0, 0, NULL, NULL, 1, NULL, NULL, NULL),
(3, 'Md Saidur Rahman', 'saydur.bspi@gmail.com', '$2y$10$DXsJvtCZJFr8xM.cZsn65ugFbc.cfs.hups24bfFXmQYtJE4f5Okq', 'profile/42169fe879e64167893f3f7140754c80.jpeg', 0, 1, 2, 1, NULL, 1, 'Cx2EPvnImjoz6X5fYe2fBj3PWRsscTm0VjfJZ7u48H1edU9gt6ikMlJoEA16', '2020-08-05 11:31:48', '2020-08-06 11:22:34'),
(4, 'Deb Nandan Dutta', 'debnandandutta@gmail.com', '$2y$10$48bK4ayxBB1pUZuO0VQwPOwQyIkho.1wLYyxYxWP4VVUPxWQhTvnW', NULL, 0, 1, 3, 1, NULL, 1, NULL, '2020-08-05 18:43:21', '2020-10-08 13:22:08'),
(5, 'Hasan', 'kamrulhasan.jti@getco-bsl.net', '$2y$10$7j0qgIynmnQs0h5AdlcFxeKMVfXcZkN.aWa/ZHNvP64bmFQ29LPxu', 'profile/75a626b6ccde14a96c0e20330373c329.jpeg', 0, 1, 4, 1, NULL, 1, 'HNDP4twzzgS90hobIA6rAAIDSXWAZeZrIdmOv0dYhvJcXSpqFKdENrpcSM3V', '2020-08-06 11:20:00', '2020-08-10 18:38:52'),
(6, 'Tanjila', 'Agent1@agent.com', '$2y$10$tUbUogaHW26ZandJw7FwlehsUbZ3q95ttiN4G2100S5cqgNBp4jmG', NULL, 0, 1, 3, 1, NULL, 1, 'vbb1G7jbZNHG9HuvB3ydVutzSj7qjfMXTCWnJMK9EuM9Z2ROIuvEGAqM3feK', '2020-09-15 09:59:08', '2020-09-20 12:25:02'),
(7, 'Sharmin', 'Agent3@agent.com', '$2y$10$R3/t8Q/dm7m3gmeAW52Ma./QrqKvJoiJNoAnyQGmwK.48kHR1sa6W', NULL, 0, 1, 3, 1, NULL, 1, NULL, '2020-09-20 12:25:48', '2020-09-20 12:25:48'),
(8, 'Farzana', 'agent2@agent.com', '$2y$10$tnfgiI06gybNjaz8LSVK6eEtxRNh4b/LTHDvsf48TPRL.QPKF3jLG', NULL, 0, 1, 3, 1, NULL, 1, 'WQ70JI5gjndcHxeoVkTfZnWa6QamItRiyPexulq0Oaj0cZmiKLk5dRMmVBQk', '2020-09-20 12:26:18', '2020-09-20 12:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satisfied` int(11) NOT NULL DEFAULT 0,
  `dissatisfied` int(11) NOT NULL DEFAULT 0,
  `voteable_id` int(10) UNSIGNED NOT NULL,
  `voteable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enquiries_enquiry_id_unique` (`enquiry_id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_works`
--
ALTER TABLE `how_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge_bases`
--
ALTER TABLE `knowledge_bases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `territories`
--
ALTER TABLE `territories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ticket_id_unique` (`ticket_id`);

--
-- Indexes for table `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `how_works`
--
ALTER TABLE `how_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `knowledge_bases`
--
ALTER TABLE `knowledge_bases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `territories`
--
ALTER TABLE `territories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `towns`
--
ALTER TABLE `towns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
