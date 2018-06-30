-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-06-30 08:06:02
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loglass`
--

-- --------------------------------------------------------

--
-- 表的结构 `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('管理员', '2', 1527696719);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/ac-route/create', 4, '添加路由', NULL, NULL, 1527524866, 1527557469),
('/ac-route/delete', 4, 'ac route delete', NULL, NULL, 1527697225, 1527697225),
('/ac-route/index', 4, 'ac route index', NULL, NULL, 1527744776, 1527744776),
('/ac-route/update', 4, '更新路由', NULL, NULL, 1527524917, 1527557497),
('/ac-route/view', 4, '查看路由', NULL, NULL, 1527524871, 1527557508),
('/aliyun-log-project/index', 4, 'aliyun log project index', NULL, NULL, 1528286005, 1528286005),
('/aliyun-log-store/index', 4, 'aliyun log store index', NULL, NULL, 1528292389, 1528292389),
('/aliyun-log/index', 4, 'aliyun log index', NULL, NULL, 1528292721, 1528292721),
('/aliyun-log/project', 4, 'aliyun log project', NULL, NULL, 1528299080, 1528299080),
('/aliyun-log/project-log', 4, 'aliyun log project log', NULL, NULL, 1528299142, 1528299142),
('/app-module/create', 4, 'app module create', NULL, NULL, 1527559051, 1527559051),
('/app-module/delete', 4, 'app module delete', NULL, NULL, 1527564141, 1527564141),
('/app-module/index', 4, NULL, NULL, NULL, 1527557745, 1527557745),
('/app-module/update', 4, NULL, NULL, NULL, 1527558182, 1527558182),
('/app-module/view', 4, NULL, NULL, NULL, 1527558177, 1527558177),
('/auth-rule/create', 4, 'auth rule create', NULL, NULL, 1527561309, 1527561309),
('/auth-rule/delete', 4, 'auth rule delete', NULL, NULL, 1527697443, 1527697443),
('/auth-rule/index', 4, 'auth rule index', NULL, NULL, 1527561304, 1527561304),
('/auth-rule/update', 4, 'auth rule update', NULL, NULL, 1527697439, 1527697439),
('/auth-rule/view', 4, 'auth rule view', NULL, NULL, 1527697437, 1527697437),
('/bug-content-done/create', 4, 'bug content done create', NULL, NULL, 1528631049, 1528631049),
('/bug-status/create', 4, 'bug status create', NULL, NULL, 1528608060, 1528608060),
('/bug-status/index', 4, 'bug status index', NULL, NULL, 1528608058, 1528608058),
('/bug-status/update', 4, 'bug status update', NULL, NULL, 1528608432, 1528608432),
('/bug-status/view', 4, 'bug status view', NULL, NULL, 1528608109, 1528608109),
('/bug/create', 4, 'bug create', NULL, NULL, 1528556552, 1528556552),
('/bug/index', 4, 'bug index', NULL, NULL, 1528550180, 1528550180),
('/bug/process-done', 4, 'bug process done', NULL, NULL, 1528796385, 1528796385),
('/bug/process-logs', 4, 'bug process logs', NULL, NULL, 1528796422, 1528796422),
('/bug/project', 4, 'bug project', NULL, NULL, 1528607028, 1528607028),
('/bug/update', 4, 'bug update', NULL, NULL, 1528815073, 1528815073),
('/bug/view', 4, 'bug view', NULL, NULL, 1528799875, 1528799875),
('/db-change/index', 4, 'db change index', NULL, NULL, 1528210138, 1528210138),
('/db-change/modify', 4, 'db change modify', NULL, NULL, 1528211574, 1528211574),
('/db-change/update', 4, 'db change update', NULL, NULL, 1528213153, 1528213153),
('/db-change/view', 4, 'db change view', NULL, NULL, 1528213287, 1528213287),
('/db-name/create', 4, 'db name create', NULL, NULL, 1528212079, 1528212079),
('/db-name/index', 4, 'db name index', NULL, NULL, 1528200915, 1528200915),
('/db-name/update', 4, 'db name update', NULL, NULL, 1528211966, 1528211966),
('/db-name/view', 4, 'db name view', NULL, NULL, 1528211962, 1528211962),
('/im-robot/index', 4, 'im robot index', NULL, NULL, 1528212229, 1528212229),
('/im-robot/update', 4, 'im robot update', NULL, NULL, 1528212232, 1528212232),
('/im-robot/view', 4, 'im robot view', NULL, NULL, 1528212237, 1528212237),
('/integration-rule/create', 4, 'integration rule create', NULL, NULL, 1528506026, 1528506026),
('/integration-rule/details', 4, 'integration rule details', NULL, NULL, 1528518441, 1528518441),
('/integration-rule/rule', 4, 'integration rule rule', NULL, NULL, 1528516946, 1528516946),
('/integration-rule/update', 4, 'integration rule update', NULL, NULL, 1528472802, 1528472802),
('/integration/top', 4, 'integration top', NULL, NULL, 1528271433, 1528271433),
('/job-position/create', 4, 'job position create', NULL, NULL, 1528469795, 1528469795),
('/job-position/index', 4, 'job position index', NULL, NULL, 1528469792, 1528469792),
('/job-position/update', 4, 'job position update', NULL, NULL, 1528470032, 1528470032),
('/job-position/view', 4, 'job position view', NULL, NULL, 1528469841, 1528469841),
('/knowledge-category/create', 4, 'knowledge category create', NULL, NULL, 1527951523, 1527951523),
('/knowledge-category/index', 4, 'knowledge category index', NULL, NULL, 1527951041, 1527951041),
('/knowledge-category/view', 4, 'knowledge category view', NULL, NULL, 1527951550, 1527951550),
('/knowledge/create', 4, 'knowledge create', NULL, NULL, 1527950781, 1527950781),
('/knowledge/index', 4, 'knowledge index', NULL, NULL, 1527950136, 1527950136),
('/meet/create', 4, 'meet create', NULL, NULL, 1527869795, 1527869795),
('/meet/index', 4, 'meet index', NULL, NULL, 1527869793, 1527869793),
('/meet/update', 4, 'meet update', NULL, NULL, 1527869801, 1527869801),
('/meet/view', 4, 'meet view', NULL, NULL, 1527869799, 1527869799),
('/project-version/create-project-version', 4, 'project version create project version', NULL, NULL, 1528546557, 1528546557),
('/project-version/create-release-version', 4, 'project version create release version', NULL, NULL, 1528546456, 1528546456),
('/project-version/project-versions', 4, 'project version project versions', NULL, NULL, 1528548066, 1528548066),
('/project-version/release-versions', 4, 'project version release versions', NULL, NULL, 1528547957, 1528547957),
('/project-version/versions-data', 4, 'project version versions data', NULL, NULL, 1528767682, 1528767682),
('/project/create', 4, 'project create', NULL, NULL, 1527945851, 1527945851),
('/project/index', 4, '項目列表', NULL, NULL, 1527556667, 1527557524),
('/project/update', 4, 'project update', NULL, NULL, 1528120965, 1528120965),
('/project/view', 4, 'project view', NULL, NULL, 1527945894, 1527945894),
('/requirement-content/create', 4, 'requirement content create', NULL, NULL, 1528009097, 1528009097),
('/requirement-content/view', 4, 'requirement content view', NULL, NULL, 1528012007, 1528012007),
('/requirement-version/create', 4, 'requirement version create', NULL, NULL, 1527955891, 1527955891),
('/requirement-version/view', 4, 'requirement version view', NULL, NULL, 1527955944, 1527955944),
('/requirement/create', 4, 'requirement create', NULL, NULL, 1527956907, 1527956907),
('/requirement/create-simple', 4, 'requirement create simple', NULL, NULL, 1528790686, 1528790686),
('/requirement/doc', 4, 'requirement doc', NULL, NULL, 1527956065, 1527956065),
('/requirement/edit', 4, 'requirement edit', NULL, NULL, 1528792280, 1528792280),
('/requirement/index', 4, 'requirement index', NULL, NULL, 1527948622, 1527948622),
('/requirement/project', 4, 'requirement project', NULL, NULL, 1528606540, 1528606540),
('/requirement/update', 4, 'requirement update', NULL, NULL, 1528008973, 1528008973),
('/requirement/view', 4, 'requirement view', NULL, NULL, 1528002621, 1528002621),
('/statistical-target/index', 4, 'statistical target index', NULL, NULL, 1528264025, 1528264025),
('/target-statistics/index', 4, 'target statistics index', NULL, NULL, 1528263504, 1528263504),
('/task-content/view', 4, 'task content view', NULL, NULL, 1528696246, 1528696246),
('/task-done/create', 4, 'task done create', NULL, NULL, 1527667859, 1527667859),
('/task-done/index', 4, 'task done index', NULL, NULL, 1527823189, 1527823189),
('/task-item/create', 4, 'task item create', NULL, NULL, 1527608274, 1527608274),
('/task-item/delete', 4, 'task item delete', NULL, NULL, 1527697141, 1527697141),
('/task-item/history', 4, 'task item history', NULL, NULL, 1528816191, 1528816191),
('/task-item/history-content', 4, 'task item history content', NULL, NULL, 1528696284, 1528696284),
('/task-item/index', 4, 'task item index', NULL, NULL, 1527607847, 1527607847),
('/task-item/process-done', 4, 'task item process done', NULL, NULL, 1528774588, 1528774588),
('/task-item/process-logs', 4, 'task item process logs', NULL, NULL, 1528774590, 1528774590),
('/task-item/update', 4, 'task item update', NULL, NULL, 1527667483, 1527667483),
('/task-item/view', 4, 'task item view', NULL, NULL, 1527666792, 1527666792),
('/task-plan/create', 4, 'task plan create', NULL, NULL, 1527605008, 1527605008),
('/task-plan/delete', 4, 'task plan delete', NULL, NULL, 1527697166, 1527697166),
('/task-plan/index', 4, 'task plan index', NULL, NULL, 1527604392, 1527604392),
('/task-plan/update', 4, 'task plan update', NULL, NULL, 1527697156, 1527697156),
('/task-plan/view', 4, 'task plan view', NULL, NULL, 1527607515, 1527607515),
('/task-status/create', 4, 'task status create', NULL, NULL, 1528717081, 1528717081),
('/task-status/index', 4, 'task status index', NULL, NULL, 1528717078, 1528717078),
('/task-status/update', 4, 'task status update', NULL, NULL, 1528718685, 1528718685),
('/task-type/create', 4, 'task type create', NULL, NULL, 1528716602, 1528716602),
('/task-type/index', 4, 'task type index', NULL, NULL, 1528716600, 1528716600),
('/task-type/update', 4, 'task type update', NULL, NULL, 1528716727, 1528716727),
('/team-user/index', 4, 'team user index', NULL, NULL, 1527780526, 1527780526),
('/team/create', 4, 'team create', NULL, NULL, 1527604362, 1527604362),
('/team/delete', 4, 'team delete', NULL, NULL, 1527606029, 1527606029),
('/team/index', 4, 'team index', NULL, NULL, 1527604187, 1527604187),
('/team/update', 4, 'team update', NULL, NULL, 1527697188, 1527697188),
('/team/view', 4, 'team view', NULL, NULL, 1527605780, 1527605780),
('/test-case/create', 4, 'test case create', NULL, NULL, 1528799428, 1528799428),
('/test-case/index', 4, 'test case index', NULL, NULL, 1528796011, 1528796011),
('/test-case/project', 4, 'test case project', NULL, NULL, 1528793190, 1528793190),
('/user/create', 4, '添加用戶', NULL, NULL, 1527524948, 1527557541),
('/user/delete', 4, 'user delete', NULL, NULL, 1527744750, 1527744750),
('/user/index', 4, '用戶列表', NULL, NULL, 1527524937, 1527557559),
('/user/role', 4, 'user role', NULL, NULL, 1527696702, 1527696702),
('/user/update', 4, '更新用戶', NULL, NULL, 1527524944, 1527557567),
('/user/view', 4, '用户信息', NULL, NULL, 1527434465, 1527434465),
('ac-route', 3, 'ac route', NULL, NULL, 1527744821, 1527744821),
('ac-route-create', 2, 'ac route create', NULL, NULL, 1527744757, 1527744757),
('ac-route-delete', 2, 'ac route delete', NULL, NULL, 1527697225, 1527697225),
('ac-route-index', 2, 'ac route index', NULL, NULL, 1527745430, 1527745430),
('ac-route-update', 2, 'ac route update', NULL, NULL, 1527560894, 1527560894),
('ac-route-view', 2, 'ac route view', NULL, NULL, 1527560889, 1527560889),
('aliyun-log', 3, 'aliyun log', NULL, NULL, 1528292721, 1528292721),
('aliyun-log-index', 2, 'aliyun log index', NULL, NULL, 1528292721, 1528292721),
('aliyun-log-project', 3, 'aliyun log project', NULL, NULL, 1528286005, 1528286005),
('aliyun-log-project-index', 2, 'aliyun log project index', NULL, NULL, 1528286005, 1528286005),
('aliyun-log-project-log', 2, 'aliyun log project log', NULL, NULL, 1528299142, 1528299142),
('aliyun-log-store', 3, 'aliyun log store', NULL, NULL, 1528292389, 1528292389),
('aliyun-log-store-index', 2, 'aliyun log store index', NULL, NULL, 1528292389, 1528292389),
('app-module', 3, '系统模块', NULL, NULL, 1527558874, 1527559107),
('app-module-create', 2, 'app module create', NULL, NULL, 1527569577, 1527569577),
('app-module-delete', 2, 'app module delete', NULL, NULL, 1527564141, 1527564141),
('app-module-index', 2, 'app module index', NULL, NULL, 1527561967, 1527561967),
('app-module-update', 2, 'app module update', NULL, NULL, 1527697321, 1527697321),
('app-module-view', 2, 'app module view', NULL, NULL, 1527697319, 1527697319),
('auth-rule', 3, 'auth rule', NULL, NULL, 1527561304, 1527561304),
('auth-rule-create', 2, 'auth rule create', NULL, NULL, 1527561309, 1527561309),
('auth-rule-delete', 2, 'auth rule delete', NULL, NULL, 1527697443, 1527697443),
('auth-rule-index', 2, 'auth rule index', NULL, NULL, 1527561304, 1527561304),
('auth-rule-update', 2, 'auth rule update', NULL, NULL, 1527697439, 1527697439),
('auth-rule-view', 2, 'auth rule view', NULL, NULL, 1527697437, 1527697437),
('bug', 3, 'bug', NULL, NULL, 1528550180, 1528550180),
('bug-content', 3, 'bug content', NULL, NULL, 1528621694, 1528621694),
('bug-content-done', 3, 'bug content done', NULL, NULL, 1528631049, 1528631049),
('bug-content-done-create', 2, 'bug content done create', NULL, NULL, 1528631049, 1528631049),
('bug-create', 2, 'bug create', NULL, NULL, 1528556552, 1528556552),
('bug-index', 2, 'bug index', NULL, NULL, 1528550180, 1528550180),
('bug-process-done', 2, 'bug process done', NULL, NULL, 1528796385, 1528796385),
('bug-process-logs', 2, 'bug process logs', NULL, NULL, 1528796422, 1528796422),
('bug-project', 2, 'bug project', NULL, NULL, 1528607028, 1528607028),
('bug-status', 3, 'bug status', NULL, NULL, 1528608058, 1528608058),
('bug-status-create', 2, 'bug status create', NULL, NULL, 1528608060, 1528608060),
('bug-status-index', 2, 'bug status index', NULL, NULL, 1528608058, 1528608058),
('bug-status-update', 2, 'bug status update', NULL, NULL, 1528608432, 1528608432),
('bug-status-view', 2, 'bug status view', NULL, NULL, 1528608109, 1528608109),
('bug-update', 2, 'bug update', NULL, NULL, 1528815073, 1528815073),
('bug-view', 2, 'bug view', NULL, NULL, 1528799875, 1528799875),
('db-change', 3, 'db change', NULL, NULL, 1528210138, 1528210138),
('db-change-index', 2, 'db change index', NULL, NULL, 1528210138, 1528210138),
('db-change-modify', 2, 'db change modify', NULL, NULL, 1528211574, 1528211574),
('db-change-update', 2, 'db change update', NULL, NULL, 1528213153, 1528213153),
('db-change-view', 2, 'db change view', NULL, NULL, 1528213287, 1528213287),
('db-name', 3, 'db name', NULL, NULL, 1528200915, 1528200915),
('db-name-create', 2, 'db name create', NULL, NULL, 1528212079, 1528212079),
('db-name-index', 2, 'db name index', NULL, NULL, 1528200915, 1528200915),
('db-name-update', 2, 'db name update', NULL, NULL, 1528211966, 1528211966),
('db-name-view', 2, 'db name view', NULL, NULL, 1528211962, 1528211962),
('im-robot', 3, 'im robot', NULL, NULL, 1528212229, 1528212229),
('im-robot-index', 2, 'im robot index', NULL, NULL, 1528212229, 1528212229),
('im-robot-update', 2, 'im robot update', NULL, NULL, 1528212232, 1528212232),
('im-robot-view', 2, 'im robot view', NULL, NULL, 1528212237, 1528212237),
('integration', 3, 'integration', NULL, NULL, 1528271433, 1528271433),
('integration-rule', 3, 'integration rule', NULL, NULL, 1528272550, 1528272550),
('integration-rule-create', 2, 'integration rule create', NULL, NULL, 1528506026, 1528506026),
('integration-rule-details', 2, 'integration rule details', NULL, NULL, 1528518441, 1528518441),
('integration-rule-rule', 2, 'integration rule rule', NULL, NULL, 1528516946, 1528516946),
('integration-rule-update', 2, 'integration rule update', NULL, NULL, 1528472802, 1528472802),
('integration-top', 2, 'integration top', NULL, NULL, 1528271433, 1528271433),
('job-position', 3, 'job position', NULL, NULL, 1528469792, 1528469792),
('job-position-create', 2, 'job position create', NULL, NULL, 1528469795, 1528469795),
('job-position-index', 2, 'job position index', NULL, NULL, 1528469792, 1528469792),
('job-position-update', 2, 'job position update', NULL, NULL, 1528470032, 1528470032),
('job-position-view', 2, 'job position view', NULL, NULL, 1528469841, 1528469841),
('knowledge', 3, 'knowledge', NULL, NULL, 1527950136, 1527950136),
('knowledge-category', 3, 'knowledge category', NULL, NULL, 1527951041, 1527951041),
('knowledge-category-create', 2, 'knowledge category create', NULL, NULL, 1527951523, 1527951523),
('knowledge-category-index', 2, 'knowledge category index', NULL, NULL, 1527951041, 1527951041),
('knowledge-category-view', 2, 'knowledge category view', NULL, NULL, 1527951550, 1527951550),
('knowledge-create', 2, 'knowledge create', NULL, NULL, 1527950781, 1527950781),
('knowledge-index', 2, 'knowledge index', NULL, NULL, 1527950136, 1527950136),
('meet', 3, 'meet', NULL, NULL, 1527869793, 1527869793),
('meet-create', 2, 'meet create', NULL, NULL, 1527869795, 1527869795),
('meet-index', 2, 'meet index', NULL, NULL, 1527869793, 1527869793),
('meet-update', 2, 'meet update', NULL, NULL, 1527869801, 1527869801),
('meet-view', 2, 'meet view', NULL, NULL, 1527869799, 1527869799),
('project', 3, 'project', NULL, NULL, 1527573698, 1527573698),
('project-create', 2, 'project create', NULL, NULL, 1527945851, 1527945851),
('project-index', 2, 'project index', NULL, NULL, 1527573698, 1527573698),
('project-update', 2, 'project update', NULL, NULL, 1528120965, 1528120965),
('project-version', 3, 'project version', NULL, NULL, 1528546456, 1528546456),
('project-version-create-project-version', 2, 'project version create project version', NULL, NULL, 1528546557, 1528546557),
('project-version-create-release-version', 2, 'project version create release version', NULL, NULL, 1528546456, 1528546456),
('project-version-project-versions', 2, 'project version project versions', NULL, NULL, 1528548066, 1528548066),
('project-version-release-versions', 2, 'project version release versions', NULL, NULL, 1528547957, 1528547957),
('project-version-versions-data', 2, 'project version versions data', NULL, NULL, 1528767682, 1528767682),
('project-view', 2, 'project view', NULL, NULL, 1527945894, 1527945894),
('requirement', 3, 'requirement', NULL, NULL, 1527948622, 1527948622),
('requirement-content', 3, 'requirement content', NULL, NULL, 1528009097, 1528009097),
('requirement-content-create', 2, 'requirement content create', NULL, NULL, 1528009097, 1528009097),
('requirement-content-view', 2, 'requirement content view', NULL, NULL, 1528012007, 1528012007),
('requirement-create', 2, 'requirement create', NULL, NULL, 1527956907, 1527956907),
('requirement-create-simple', 2, 'requirement create simple', NULL, NULL, 1528790686, 1528790686),
('requirement-doc', 2, 'requirement doc', NULL, NULL, 1527956065, 1527956065),
('requirement-edit', 2, 'requirement edit', NULL, NULL, 1528792280, 1528792280),
('requirement-index', 2, 'requirement index', NULL, NULL, 1527948622, 1527948622),
('requirement-project', 2, 'requirement project', NULL, NULL, 1528606540, 1528606540),
('requirement-update', 2, 'requirement update', NULL, NULL, 1528008973, 1528008973),
('requirement-version', 3, 'requirement version', NULL, NULL, 1527955891, 1527955891),
('requirement-version-create', 2, 'requirement version create', NULL, NULL, 1527955891, 1527955891),
('requirement-version-view', 2, 'requirement version view', NULL, NULL, 1527955944, 1527955944),
('requirement-view', 2, 'requirement view', NULL, NULL, 1528002621, 1528002621),
('site', 3, 'site', NULL, NULL, 1527559073, 1527559073),
('site-about', 2, 'site about', NULL, NULL, 1527561197, 1527561197),
('site-contact', 2, 'site contact', NULL, NULL, 1527561198, 1527561198),
('statistical-target', 3, 'statistical target', NULL, NULL, 1528264025, 1528264025),
('statistical-target-index', 2, 'statistical target index', NULL, NULL, 1528264025, 1528264025),
('target-statistics', 3, 'target statistics', NULL, NULL, 1528263504, 1528263504),
('target-statistics-index', 2, 'target statistics index', NULL, NULL, 1528263504, 1528263504),
('task-content', 3, 'task content', NULL, NULL, 1528696246, 1528696246),
('task-content-view', 2, 'task content view', NULL, NULL, 1528696246, 1528696246),
('task-done', 3, 'task done', NULL, NULL, 1527667859, 1527667859),
('task-done-create', 2, 'task done create', NULL, NULL, 1527667859, 1527667859),
('task-done-index', 2, 'task done index', NULL, NULL, 1527668157, 1527668157),
('task-done-update', 2, 'task done update', NULL, NULL, 1527669006, 1527669006),
('task-done-view', 2, 'task done view', NULL, NULL, 1527668995, 1527668995),
('task-item', 3, 'task item', NULL, NULL, 1527607847, 1527607847),
('task-item-create', 2, 'task item create', NULL, NULL, 1527608274, 1527608274),
('task-item-delete', 2, 'task item delete', NULL, NULL, 1527697141, 1527697141),
('task-item-history', 2, 'task item history', NULL, NULL, 1528816191, 1528816191),
('task-item-history-content', 2, 'task item history content', NULL, NULL, 1528696284, 1528696284),
('task-item-index', 2, 'task item index', NULL, NULL, 1527607847, 1527607847),
('task-item-process-done', 2, 'task item process done', NULL, NULL, 1528774588, 1528774588),
('task-item-process-logs', 2, 'task item process logs', NULL, NULL, 1528774590, 1528774590),
('task-item-update', 2, 'task item update', NULL, NULL, 1527667483, 1527667483),
('task-item-view', 2, 'task item view', NULL, NULL, 1527666792, 1527666792),
('task-plan', 3, 'task plan', NULL, NULL, 1527604392, 1527604392),
('task-plan-create', 2, 'task plan create', NULL, NULL, 1527605008, 1527605008),
('task-plan-delete', 2, 'task plan delete', NULL, NULL, 1527697166, 1527697166),
('task-plan-index', 2, 'task plan index', NULL, NULL, 1527604392, 1527604392),
('task-plan-update', 2, 'task plan update', NULL, NULL, 1527697156, 1527697156),
('task-plan-view', 2, 'task plan view', NULL, NULL, 1527607515, 1527607515),
('task-status', 3, 'task status', NULL, NULL, 1528717078, 1528717078),
('task-status-create', 2, 'task status create', NULL, NULL, 1528717081, 1528717081),
('task-status-index', 2, 'task status index', NULL, NULL, 1528717078, 1528717078),
('task-status-update', 2, 'task status update', NULL, NULL, 1528718685, 1528718685),
('task-type', 3, 'task type', NULL, NULL, 1528716600, 1528716600),
('task-type-create', 2, 'task type create', NULL, NULL, 1528716602, 1528716602),
('task-type-index', 2, 'task type index', NULL, NULL, 1528716601, 1528716601),
('task-type-update', 2, 'task type update', NULL, NULL, 1528716727, 1528716727),
('team', 3, 'team', NULL, NULL, 1527697329, 1527697329),
('team-create', 2, 'team create', NULL, NULL, 1527604362, 1527604362),
('team-delete', 2, 'team delete', NULL, NULL, 1527606029, 1527606029),
('team-index', 2, 'team index', NULL, NULL, 1527604187, 1527604187),
('team-update', 2, 'team update', NULL, NULL, 1527697188, 1527697188),
('team-user', 3, 'team user', NULL, NULL, 1527780526, 1527780526),
('team-user-index', 2, 'team user index', NULL, NULL, 1527780526, 1527780526),
('team-view', 2, 'team view', NULL, NULL, 1527605780, 1527605780),
('test-case', 3, 'test case', NULL, NULL, 1528793190, 1528793190),
('test-case-create', 2, 'test case create', NULL, NULL, 1528799428, 1528799428),
('test-case-index', 2, 'test case index', NULL, NULL, 1528796011, 1528796011),
('test-case-project', 2, 'test case project', NULL, NULL, 1528793190, 1528793190),
('tools', 3, 'tools', NULL, NULL, 1527868803, 1527868803),
('user', 3, '用户', NULL, NULL, 1527434067, 1527434067),
('user-create', 2, 'user create', NULL, NULL, 1527744739, 1527744739),
('user-delete', 2, 'user delete', NULL, NULL, 1527744750, 1527744750),
('user-index', 2, 'user index', NULL, NULL, 1527677560, 1527677560),
('user-role', 2, 'user role', NULL, NULL, 1527696702, 1527696702),
('user-update', 2, 'user update', NULL, NULL, 1527736686, 1527736686),
('user-view', 2, 'user view', NULL, NULL, 1527696734, 1527696734),
('产品', 1, '负责需求的生产，确认，及功能的验收', NULL, NULL, 1527696905, 1527696905),
('团队负责人', 1, '负责计划，任务的定制', NULL, NULL, 1527746004, 1527746004),
('开发人员', 1, '负责项目编码和需求沟通', NULL, NULL, 1527696826, 1527696826),
('测试', 1, '负责项目的测试错误检查', NULL, NULL, 1527696873, 1527696873),
('管理员', 1, '所有权限的用户角色', NULL, NULL, 1527678466, 1527678466);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('ac-route', '/ac-route/create'),
('ac-route', '/ac-route/index'),
('ac-route', '/ac-route/update'),
('ac-route', '/ac-route/view'),
('ac-route', 'ac-route-create'),
('ac-route', 'ac-route-index'),
('ac-route', 'ac-route-update'),
('ac-route', 'ac-route-view'),
('ac-route-create', '/ac-route/create'),
('ac-route-delete', '/ac-route/delete'),
('ac-route-index', '/ac-route/index'),
('ac-route-update', '/ac-route/update'),
('ac-route-view', '/ac-route/view'),
('aliyun-log', '/aliyun-log/index'),
('aliyun-log', '/aliyun-log/project-log'),
('aliyun-log', 'aliyun-log-index'),
('aliyun-log', 'aliyun-log-project-log'),
('aliyun-log-index', '/aliyun-log/index'),
('aliyun-log-project', '/aliyun-log-project/index'),
('aliyun-log-project', 'aliyun-log-project-index'),
('aliyun-log-project-index', '/aliyun-log-project/index'),
('aliyun-log-project-log', '/aliyun-log/project-log'),
('aliyun-log-store', '/aliyun-log-store/index'),
('aliyun-log-store', 'aliyun-log-store-index'),
('aliyun-log-store-index', '/aliyun-log-store/index'),
('app-module', '/app-module/create'),
('app-module', '/app-module/delete'),
('app-module', '/app-module/index'),
('app-module', '/app-module/update'),
('app-module', '/app-module/view'),
('app-module', 'app-module-create'),
('app-module', 'app-module-delete'),
('app-module', 'app-module-index'),
('app-module', 'app-module-update'),
('app-module', 'app-module-view'),
('app-module-create', '/app-module/create'),
('app-module-delete', '/app-module/delete'),
('app-module-index', '/app-module/index'),
('app-module-update', '/app-module/update'),
('app-module-view', '/app-module/view'),
('auth-rule', '/auth-rule/create'),
('auth-rule', '/auth-rule/delete'),
('auth-rule', '/auth-rule/index'),
('auth-rule', '/auth-rule/update'),
('auth-rule', '/auth-rule/view'),
('auth-rule', 'auth-rule-create'),
('auth-rule', 'auth-rule-delete'),
('auth-rule', 'auth-rule-index'),
('auth-rule', 'auth-rule-update'),
('auth-rule', 'auth-rule-view'),
('auth-rule-create', '/auth-rule/create'),
('auth-rule-delete', '/auth-rule/delete'),
('auth-rule-index', '/auth-rule/index'),
('auth-rule-update', '/auth-rule/update'),
('auth-rule-view', '/auth-rule/view'),
('bug', '/bug/create'),
('bug', '/bug/index'),
('bug', '/bug/process-done'),
('bug', '/bug/process-logs'),
('bug', '/bug/project'),
('bug', '/bug/update'),
('bug', '/bug/view'),
('bug', 'bug-create'),
('bug', 'bug-index'),
('bug', 'bug-process-done'),
('bug', 'bug-process-logs'),
('bug', 'bug-project'),
('bug', 'bug-update'),
('bug', 'bug-view'),
('bug-content-done', '/bug-content-done/create'),
('bug-content-done', 'bug-content-done-create'),
('bug-content-done-create', '/bug-content-done/create'),
('bug-create', '/bug/create'),
('bug-index', '/bug/index'),
('bug-process-done', '/bug/process-done'),
('bug-process-logs', '/bug/process-logs'),
('bug-project', '/bug/project'),
('bug-status', '/bug-status/create'),
('bug-status', '/bug-status/index'),
('bug-status', '/bug-status/update'),
('bug-status', '/bug-status/view'),
('bug-status', 'bug-status-create'),
('bug-status', 'bug-status-index'),
('bug-status', 'bug-status-update'),
('bug-status', 'bug-status-view'),
('bug-status-create', '/bug-status/create'),
('bug-status-index', '/bug-status/index'),
('bug-status-update', '/bug-status/update'),
('bug-status-view', '/bug-status/view'),
('bug-update', '/bug/update'),
('bug-view', '/bug/view'),
('db-change', '/db-change/index'),
('db-change', '/db-change/modify'),
('db-change', '/db-change/update'),
('db-change', '/db-change/view'),
('db-change', 'db-change-index'),
('db-change', 'db-change-modify'),
('db-change', 'db-change-update'),
('db-change', 'db-change-view'),
('db-change-index', '/db-change/index'),
('db-change-modify', '/db-change/modify'),
('db-change-update', '/db-change/update'),
('db-change-view', '/db-change/view'),
('db-name', '/db-name/create'),
('db-name', '/db-name/index'),
('db-name', '/db-name/update'),
('db-name', '/db-name/view'),
('db-name', 'db-name-create'),
('db-name', 'db-name-index'),
('db-name', 'db-name-update'),
('db-name', 'db-name-view'),
('db-name-create', '/db-name/create'),
('db-name-index', '/db-name/index'),
('db-name-update', '/db-name/update'),
('db-name-view', '/db-name/view'),
('im-robot', '/im-robot/index'),
('im-robot', '/im-robot/update'),
('im-robot', '/im-robot/view'),
('im-robot', 'im-robot-index'),
('im-robot', 'im-robot-update'),
('im-robot', 'im-robot-view'),
('im-robot-index', '/im-robot/index'),
('im-robot-update', '/im-robot/update'),
('im-robot-view', '/im-robot/view'),
('integration', '/integration/top'),
('integration', 'integration-top'),
('integration-rule', '/integration-rule/create'),
('integration-rule', '/integration-rule/details'),
('integration-rule', '/integration-rule/rule'),
('integration-rule', '/integration-rule/update'),
('integration-rule', 'integration-rule-create'),
('integration-rule', 'integration-rule-details'),
('integration-rule', 'integration-rule-rule'),
('integration-rule', 'integration-rule-update'),
('integration-rule-create', '/integration-rule/create'),
('integration-rule-details', '/integration-rule/details'),
('integration-rule-rule', '/integration-rule/rule'),
('integration-rule-update', '/integration-rule/update'),
('integration-top', '/integration/top'),
('job-position', '/job-position/create'),
('job-position', '/job-position/index'),
('job-position', '/job-position/update'),
('job-position', '/job-position/view'),
('job-position', 'job-position-create'),
('job-position', 'job-position-index'),
('job-position', 'job-position-update'),
('job-position', 'job-position-view'),
('job-position-create', '/job-position/create'),
('job-position-index', '/job-position/index'),
('job-position-update', '/job-position/update'),
('job-position-view', '/job-position/view'),
('knowledge', '/knowledge/create'),
('knowledge', '/knowledge/index'),
('knowledge', 'knowledge-create'),
('knowledge', 'knowledge-index'),
('knowledge-category', '/knowledge-category/create'),
('knowledge-category', '/knowledge-category/index'),
('knowledge-category', '/knowledge-category/view'),
('knowledge-category', 'knowledge-category-create'),
('knowledge-category', 'knowledge-category-index'),
('knowledge-category', 'knowledge-category-view'),
('knowledge-category-create', '/knowledge-category/create'),
('knowledge-category-index', '/knowledge-category/index'),
('knowledge-category-view', '/knowledge-category/view'),
('knowledge-create', '/knowledge/create'),
('knowledge-index', '/knowledge/index'),
('meet', '/meet/create'),
('meet', '/meet/index'),
('meet', '/meet/update'),
('meet', '/meet/view'),
('meet', 'meet-create'),
('meet', 'meet-index'),
('meet', 'meet-update'),
('meet', 'meet-view'),
('meet-create', '/meet/create'),
('meet-index', '/meet/index'),
('meet-update', '/meet/update'),
('meet-view', '/meet/view'),
('project', '/project/create'),
('project', '/project/index'),
('project', '/project/update'),
('project', '/project/view'),
('project', 'project-create'),
('project', 'project-index'),
('project', 'project-update'),
('project', 'project-view'),
('project-create', '/project/create'),
('project-index', '/project/index'),
('project-update', '/project/update'),
('project-version', '/project-version/create-project-version'),
('project-version', '/project-version/create-release-version'),
('project-version', '/project-version/project-versions'),
('project-version', '/project-version/release-versions'),
('project-version', '/project-version/versions-data'),
('project-version', 'project-version-create-project-version'),
('project-version', 'project-version-create-release-version'),
('project-version', 'project-version-project-versions'),
('project-version', 'project-version-release-versions'),
('project-version', 'project-version-versions-data'),
('project-version-create-project-version', '/project-version/create-project-version'),
('project-version-create-release-version', '/project-version/create-release-version'),
('project-version-project-versions', '/project-version/project-versions'),
('project-version-release-versions', '/project-version/release-versions'),
('project-version-versions-data', '/project-version/versions-data'),
('project-view', '/project/view'),
('requirement', '/requirement/create'),
('requirement', '/requirement/create-simple'),
('requirement', '/requirement/doc'),
('requirement', '/requirement/edit'),
('requirement', '/requirement/index'),
('requirement', '/requirement/project'),
('requirement', '/requirement/update'),
('requirement', '/requirement/view'),
('requirement', 'requirement-create'),
('requirement', 'requirement-create-simple'),
('requirement', 'requirement-doc'),
('requirement', 'requirement-edit'),
('requirement', 'requirement-index'),
('requirement', 'requirement-project'),
('requirement', 'requirement-update'),
('requirement', 'requirement-view'),
('requirement-content', '/requirement-content/create'),
('requirement-content', '/requirement-content/view'),
('requirement-content', 'requirement-content-create'),
('requirement-content', 'requirement-content-view'),
('requirement-content-create', '/requirement-content/create'),
('requirement-content-view', '/requirement-content/view'),
('requirement-create', '/requirement/create'),
('requirement-create-simple', '/requirement/create-simple'),
('requirement-doc', '/requirement/doc'),
('requirement-edit', '/requirement/edit'),
('requirement-index', '/requirement/index'),
('requirement-project', '/requirement/project'),
('requirement-update', '/requirement/update'),
('requirement-version', '/requirement-version/create'),
('requirement-version', '/requirement-version/view'),
('requirement-version', 'requirement-version-create'),
('requirement-version', 'requirement-version-view'),
('requirement-version-create', '/requirement-version/create'),
('requirement-version-view', '/requirement-version/view'),
('requirement-view', '/requirement/view'),
('site', 'site-about'),
('site', 'site-contact'),
('statistical-target', '/statistical-target/index'),
('statistical-target', 'statistical-target-index'),
('statistical-target-index', '/statistical-target/index'),
('target-statistics', '/target-statistics/index'),
('target-statistics', 'target-statistics-index'),
('target-statistics-index', '/target-statistics/index'),
('task-content', '/task-content/view'),
('task-content', 'task-content-view'),
('task-content-view', '/task-content/view'),
('task-done', '/task-done/create'),
('task-done', '/task-done/index'),
('task-done', 'task-done-create'),
('task-done', 'task-done-index'),
('task-done', 'task-done-update'),
('task-done', 'task-done-view'),
('task-done-create', '/task-done/create'),
('task-done-index', '/task-done/index'),
('task-item', '/task-item/create'),
('task-item', '/task-item/delete'),
('task-item', '/task-item/history'),
('task-item', '/task-item/history-content'),
('task-item', '/task-item/index'),
('task-item', '/task-item/process-done'),
('task-item', '/task-item/process-logs'),
('task-item', '/task-item/update'),
('task-item', '/task-item/view'),
('task-item', 'task-item-create'),
('task-item', 'task-item-delete'),
('task-item', 'task-item-history'),
('task-item', 'task-item-history-content'),
('task-item', 'task-item-index'),
('task-item', 'task-item-process-done'),
('task-item', 'task-item-process-logs'),
('task-item', 'task-item-update'),
('task-item', 'task-item-view'),
('task-item-create', '/task-item/create'),
('task-item-delete', '/task-item/delete'),
('task-item-history', '/task-item/history'),
('task-item-history-content', '/task-item/history-content'),
('task-item-index', '/task-item/index'),
('task-item-process-done', '/task-item/process-done'),
('task-item-process-logs', '/task-item/process-logs'),
('task-item-update', '/task-item/update'),
('task-item-view', '/task-item/view'),
('task-plan', '/task-plan/create'),
('task-plan', '/task-plan/delete'),
('task-plan', '/task-plan/index'),
('task-plan', '/task-plan/update'),
('task-plan', '/task-plan/view'),
('task-plan', 'task-plan-create'),
('task-plan', 'task-plan-delete'),
('task-plan', 'task-plan-index'),
('task-plan', 'task-plan-update'),
('task-plan', 'task-plan-view'),
('task-plan-create', '/task-plan/create'),
('task-plan-delete', '/task-plan/delete'),
('task-plan-index', '/task-plan/index'),
('task-plan-update', '/task-plan/update'),
('task-plan-view', '/task-plan/view'),
('task-status', '/task-status/create'),
('task-status', '/task-status/index'),
('task-status', '/task-status/update'),
('task-status', 'task-status-create'),
('task-status', 'task-status-index'),
('task-status', 'task-status-update'),
('task-status-create', '/task-status/create'),
('task-status-index', '/task-status/index'),
('task-status-update', '/task-status/update'),
('task-type', '/task-type/create'),
('task-type', '/task-type/index'),
('task-type', '/task-type/update'),
('task-type', 'task-type-create'),
('task-type', 'task-type-index'),
('task-type', 'task-type-update'),
('task-type-create', '/task-type/create'),
('task-type-index', '/task-type/index'),
('task-type-update', '/task-type/update'),
('team', '/team/create'),
('team', '/team/delete'),
('team', '/team/index'),
('team', '/team/update'),
('team', '/team/view'),
('team', 'team-create'),
('team', 'team-delete'),
('team', 'team-index'),
('team', 'team-update'),
('team', 'team-view'),
('team-create', '/team/create'),
('team-delete', '/team/delete'),
('team-index', '/team/index'),
('team-update', '/team/update'),
('team-user', '/team-user/index'),
('team-user', 'team-user-index'),
('team-user-index', '/team-user/index'),
('team-view', '/team/view'),
('test-case', '/test-case/create'),
('test-case', '/test-case/index'),
('test-case', '/test-case/project'),
('test-case', 'test-case-create'),
('test-case', 'test-case-index'),
('test-case', 'test-case-project'),
('test-case-create', '/test-case/create'),
('test-case-index', '/test-case/index'),
('test-case-project', '/test-case/project'),
('user', '/user/create'),
('user', '/user/delete'),
('user', '/user/index'),
('user', '/user/role'),
('user', '/user/update'),
('user', '/user/view'),
('user', 'user-create'),
('user', 'user-delete'),
('user', 'user-index'),
('user', 'user-role'),
('user', 'user-update'),
('user', 'user-view'),
('user-create', '/user/create'),
('user-delete', '/user/delete'),
('user-index', '/user/index'),
('user-role', '/user/role'),
('user-update', '/user/update'),
('user-view', '/user/view'),
('产品', 'task-done-create'),
('产品', 'task-item-index'),
('产品', 'task-item-view'),
('产品', 'task-plan-index'),
('产品', 'task-plan-view'),
('产品', 'team-index'),
('产品', 'team-view'),
('产品', 'user-index'),
('产品', 'user-view'),
('团队负责人', 'task-done-create'),
('团队负责人', 'task-item-create'),
('团队负责人', 'task-item-delete'),
('团队负责人', 'task-item-index'),
('团队负责人', 'task-item-update'),
('团队负责人', 'task-item-view'),
('团队负责人', 'task-plan-create'),
('团队负责人', 'task-plan-delete'),
('团队负责人', 'task-plan-index'),
('团队负责人', 'task-plan-update'),
('团队负责人', 'task-plan-view'),
('团队负责人', 'team-index'),
('团队负责人', 'team-view'),
('团队负责人', 'user-index'),
('团队负责人', 'user-view'),
('开发人员', 'task-done-create'),
('开发人员', 'task-item-index'),
('开发人员', 'task-item-view'),
('开发人员', 'task-plan-index'),
('开发人员', 'task-plan-view'),
('开发人员', 'team-index'),
('开发人员', 'team-view'),
('开发人员', 'user-index'),
('开发人员', 'user-view'),
('测试', 'task-done-create'),
('测试', 'task-item-index'),
('测试', 'task-item-view'),
('测试', 'task-plan-index'),
('测试', 'task-plan-view'),
('测试', 'team-index'),
('测试', 'team-view'),
('测试', 'user-index'),
('测试', 'user-view'),
('管理员', 'ac-route-create'),
('管理员', 'ac-route-index'),
('管理员', 'ac-route-update'),
('管理员', 'ac-route-view'),
('管理员', 'app-module-create'),
('管理员', 'app-module-delete'),
('管理员', 'app-module-index'),
('管理员', 'app-module-update'),
('管理员', 'app-module-view'),
('管理员', 'auth-rule-create'),
('管理员', 'auth-rule-delete'),
('管理员', 'auth-rule-index'),
('管理员', 'auth-rule-update'),
('管理员', 'auth-rule-view'),
('管理员', 'project-index'),
('管理员', 'site-about'),
('管理员', 'site-contact'),
('管理员', 'task-done-create'),
('管理员', 'task-done-index'),
('管理员', 'task-done-update'),
('管理员', 'task-done-view'),
('管理员', 'task-item-create'),
('管理员', 'task-item-delete'),
('管理员', 'task-item-index'),
('管理员', 'task-item-update'),
('管理员', 'task-item-view'),
('管理员', 'task-plan-create'),
('管理员', 'task-plan-delete'),
('管理员', 'task-plan-index'),
('管理员', 'task-plan-update'),
('管理员', 'task-plan-view'),
('管理员', 'team-create'),
('管理员', 'team-delete'),
('管理员', 'team-index'),
('管理员', 'team-update'),
('管理员', 'team-view'),
('管理员', 'user-create'),
('管理员', 'user-delete'),
('管理员', 'user-index'),
('管理员', 'user-role'),
('管理员', 'user-update'),
('管理员', 'user-view');

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `db_change`
--

CREATE TABLE `db_change` (
  `id` int(11) NOT NULL,
  `db_id` int(11) NOT NULL COMMENT '数据库',
  `task_item_id` int(11) NOT NULL COMMENT '任务项',
  `task_plan_id` int(11) NOT NULL COMMENT '计划',
  `creator_id` int(11) NOT NULL COMMENT '创建人',
  `user_id` int(11) DEFAULT NULL COMMENT '用户',
  `content` text COLLATE utf8_unicode_ci COMMENT '内容',
  `created_at` int(11) DEFAULT NULL COMMENT '添加时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='数据库变更内容';

--
-- 转存表中的数据 `db_change`
--

INSERT INTO `db_change` (`id`, `db_id`, `task_item_id`, `task_plan_id`, `creator_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 85, 1, 1, NULL, 'test', 1528211607, 1528211607);

-- --------------------------------------------------------

--
-- 表的结构 `db_name`
--

CREATE TABLE `db_name` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL COMMENT '项目',
  `name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名称',
  `intro` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '说明',
  `created_at` int(11) DEFAULT NULL COMMENT '添加时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='数据库变更';

--
-- 转存表中的数据 `db_name`
--

INSERT INTO `db_name` (`id`, `project_id`, `name`, `intro`, `created_at`, `updated_at`) VALUES
(1, 1, 'geetask', '极任务的数据库名称', 1528200469, 1528200469);

-- --------------------------------------------------------

--
-- 表的结构 `im_robot`
--

CREATE TABLE `im_robot` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '机器人名称',
  `im_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '即时通讯名称',
  `webhook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '通知地址',
  `code_full_class` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '代码类'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='即时通讯机器人';

--
-- 转存表中的数据 `im_robot`
--

INSERT INTO `im_robot` (`id`, `name`, `im_name`, `webhook`, `code_full_class`) VALUES
(1, 'NDA项目秘书', '钉钉', '', '\\app\\components\\DingTalkRobot');

-- --------------------------------------------------------

--
-- 表的结构 `integration`
--

CREATE TABLE `integration` (
  `id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL COMMENT '接受用户',
  `creator_id` int(11) NOT NULL COMMENT '创建用户',
  `rule_id` int(11) NOT NULL COMMENT '规则',
  `target` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '目标对象',
  `target_id` int(11) NOT NULL COMMENT '目标对象id',
  `job_position` varchar(64) COLLATE utf8_unicode_ci DEFAULT 'developer' COMMENT '岗位',
  `expirence_scope` smallint(6) NOT NULL DEFAULT '0' COMMENT '分值',
  `contribution_scope` smallint(6) NOT NULL DEFAULT '0',
  `route` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '路由',
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `repeat_times` smallint(6) NOT NULL DEFAULT '0' COMMENT '可重复',
  `rest_times` smallint(6) NOT NULL DEFAULT '0' COMMENT '剩余',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='贡献';

--
-- 转存表中的数据 `integration`
--

INSERT INTO `integration` (`id`, `reciever_id`, `creator_id`, `rule_id`, `target`, `target_id`, `job_position`, `expirence_scope`, `contribution_scope`, `route`, `name`, `repeat_times`, `rest_times`, `remark`, `created_at`) VALUES
(1, 1, 1, 7, 'requirement_content', 31, 'DevelopmentEngineer', 1, 1, '/requirement-content/create', '添加需求文档', 0, -1, '', 1528270138),
(2, 1, 1, 1, 'task_done', 72, 'DevelopmentEngineer', 6, 3, '/task-done/create', '更新任务状态', 3, 2, '', 1528465760),
(3, 1, 1, 1, 'task_done', 73, 'DevelopmentEngineer', 6, 3, '/task-done/create', '更新任务状态', 3, 2, '', 1528465795),
(4, 1, 1, 1, 'task_done', 74, 'DevelopmentEngineer', 6, 3, '/task-done/create', '更新任务状态', 3, 2, '', 1528466215),
(5, 1, 1, 1, 'task_done', 75, 'DevelopmentEngineer', 6, 3, '/task-done/create', '更新任务状态', 3, 2, '', 1528466236),
(6, 1, 1, 1, 'task_done', 76, 'DevelopmentEngineer', 6, 3, '/task-done/create', '更新任务状态', 3, 2, '', 1528466268),
(7, 1, 1, 1, 'task_done', 77, 'TeamLeader', 6, 3, '/task-done/create', '更新任务状态', 3, 2, '', 1528471649),
(8, 1, 1, 1, 'task_done', 81, 'TeamLeader', 6, 6, '/task-done/create', '更新任务状态', 1, 0, '', 1528518825),
(9, 1, 1, 1, 'task_done', 82, 'TeamLeader', 6, 6, '/task-done/create', '更新任务状态', 1, 0, '', 1528518891),
(10, 1, 1, 1, 'task_done', 83, 'TeamLeader', 6, 6, '/task-done/create', '更新任务状态', 1, 0, '', 1528518911);

-- --------------------------------------------------------

--
-- 表的结构 `integration_rule`
--

CREATE TABLE `integration_rule` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `method` enum('POST','GET') COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '路由',
  `intro` text COLLATE utf8_unicode_ci COMMENT '介绍',
  `created_at` int(11) NOT NULL COMMENT '添加时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='共享规则';

--
-- 转存表中的数据 `integration_rule`
--

INSERT INTO `integration_rule` (`id`, `name`, `method`, `route`, `intro`, `created_at`) VALUES
(1, '更新任务状态', 'POST', '/task-done/create', '更新任务状态，每个任务最多记录三次积分1', 1528264843),
(2, '更新任务', 'POST', '/task-item/update', '计划负责人更新任务的信息可以重复2次获得积分', 1528264971),
(3, '记录数据库变更', 'POST', '/db-change/modify', '记录数据库的变更同一个变更可以重复2次获得积分', 1528265142),
(4, '添加任务', 'POST', '/task-item/create', '添加任务可以获得一次积分', 1528265239),
(5, '会议记录', 'POST', '/meet/create', '记录会议可以获得一次积分', 1528265306),
(6, '添加知识库', 'POST', '/knowledge/create', '添加知识库可以获得一次积分', 1528265359),
(7, '添加需求文档', 'POST', '/requirement-content/create', '编辑需求文档，每编辑文档一次可以获得一次积分', 1528265473);

-- --------------------------------------------------------

--
-- 表的结构 `integration_value`
--

CREATE TABLE `integration_value` (
  `id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL COMMENT '规则',
  `job_position` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '岗位',
  `experience_value` smallint(6) DEFAULT '0' COMMENT '经验值',
  `contribution_value` smallint(6) DEFAULT '0' COMMENT '贡献值',
  `repeat_times` smallint(6) DEFAULT '1' COMMENT '可重复次数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='积分值';

--
-- 转存表中的数据 `integration_value`
--

INSERT INTO `integration_value` (`id`, `rule_id`, `job_position`, `experience_value`, `contribution_value`, `repeat_times`) VALUES
(1, 1, 'DevelopmentEngineer', 6, 6, 1),
(2, 1, 'ProductManager', 6, 6, 1),
(3, 1, 'QualityTestingEngineer', 6, 6, 1),
(4, 1, 'TeamLeader', 6, 6, 1),
(5, 1, 'UIDesigner', 6, 6, 1);

-- --------------------------------------------------------

--
-- 表的结构 `job_position`
--

CREATE TABLE `job_position` (
  `id` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '代号',
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名称',
  `intro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '介绍',
  `sort` smallint(6) DEFAULT '1' COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='工作岗位';

--
-- 转存表中的数据 `job_position`
--

INSERT INTO `job_position` (`id`, `name`, `intro`, `sort`) VALUES
('DevelopmentEngineer', '开发工程师', '负责项目的代码编写，实现需求要求的功能', 1),
('ProductManager', '产品经理', '负责产品需求的定义和创意', 1),
('QualityTestingEngineer', '测试工程师', '负责系统的测试和bug的确认', 1),
('TeamLeader', '团队负责人', '负责项目的计划的定制，技术方案提供者', 1),
('UIDesigner', 'UI设计师', '负责系统的设计', 1);

-- --------------------------------------------------------

--
-- 表的结构 `knowledge`
--

CREATE TABLE `knowledge` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT '作者',
  `title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '标题',
  `tags` text COLLATE utf8_unicode_ci COMMENT '标签',
  `content` text COLLATE utf8_unicode_ci COMMENT '内容',
  `created_at` int(11) DEFAULT NULL COMMENT '添加时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='知识';

-- --------------------------------------------------------

--
-- 表的结构 `knowledge_category`
--

CREATE TABLE `knowledge_category` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='知识分类';

--
-- 转存表中的数据 `knowledge_category`
--

INSERT INTO `knowledge_category` (`id`, `name`, `sort`) VALUES
(1, 'apache', 1);

-- --------------------------------------------------------

--
-- 表的结构 `meet`
--

CREATE TABLE `meet` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '议题',
  `actors` text COLLATE utf8_unicode_ci NOT NULL COMMENT '参会人',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '会议结论',
  `user_id` int(11) NOT NULL COMMENT '记录人',
  `meet_date` date NOT NULL COMMENT '日期',
  `created_at` int(11) NOT NULL COMMENT '添加时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='会议';

--
-- 转存表中的数据 `meet`
--

INSERT INTO `meet` (`id`, `title`, `actors`, `content`, `user_id`, `meet_date`, `created_at`, `updated_at`) VALUES
(1, '酒店需求会议', '顿刚，钱攀，赵金桥', '<p>哈哈得到很多很多很多很多很多和</p>', 1, '2018-05-23', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1527410204),
('m140506_102106_rbac_init', 1527410508),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1527410508),
('m180527_083430_user_table', 1527487364);

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `intro` text COLLATE utf8_unicode_ci COMMENT '介绍',
  `created_at` int(11) DEFAULT NULL COMMENT '添加时间',
  `updated_at` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='项目';

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`id`, `name`, `intro`, `created_at`, `updated_at`) VALUES
(1, 'GeeTask', '极任务，极度简洁的项目管理', 1527945894, '1528121022');

-- --------------------------------------------------------

--
-- 表的结构 `project_version`
--

CREATE TABLE `project_version` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL COMMENT '项目',
  `is_release` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是发布版本',
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='项目版本';

--
-- 转存表中的数据 `project_version`
--

INSERT INTO `project_version` (`id`, `project_id`, `is_release`, `name`, `created_at`) VALUES
(1, 1, 0, '1.0', 1528540416),
(2, 1, 1, '1.0.52', 1528615092);

-- --------------------------------------------------------

--
-- 表的结构 `statistical_dimension`
--

CREATE TABLE `statistical_dimension` (
  `id` int(11) NOT NULL,
  `year` smallint(6) NOT NULL DEFAULT '2018' COMMENT '年',
  `quarter` smallint(6) NOT NULL DEFAULT '0' COMMENT '季',
  `month` smallint(6) NOT NULL DEFAULT '0' COMMENT '月',
  `week` smallint(6) NOT NULL DEFAULT '0' COMMENT '周',
  `day` smallint(6) NOT NULL DEFAULT '0' COMMENT '日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='积分统计';

-- --------------------------------------------------------

--
-- 表的结构 `statistical_target`
--

CREATE TABLE `statistical_target` (
  `id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '目标代号',
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '目标名称',
  `intro` text COLLATE utf8_unicode_ci COMMENT '介绍',
  `created_at` int(11) DEFAULT NULL COMMENT '添加时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='统计的目标对象';

--
-- 转存表中的数据 `statistical_target`
--

INSERT INTO `statistical_target` (`id`, `code`, `name`, `intro`, `created_at`, `updated_at`) VALUES
(1, 'expirence', '经验', '成员在本系统的成长指标', 1528263848, 1528263848),
(2, 'contribution', '贡献', '成员在系统的创造的价格', 1528263922, 1528263922);

-- --------------------------------------------------------

--
-- 表的结构 `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `text` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `target_statistics`
--

CREATE TABLE `target_statistics` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `dimension_id` int(11) NOT NULL,
  `scope` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='目标对象的统计';

-- --------------------------------------------------------

--
-- 表的结构 `task_content`
--

CREATE TABLE `task_content` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL COMMENT '任务项',
  `user_id` int(11) NOT NULL COMMENT '被指派',
  `status_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '状态',
  `creator_id` int(11) NOT NULL COMMENT '编辑者',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `created_at` int(11) NOT NULL COMMENT '添加时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='任务来源内容';

--
-- 转存表中的数据 `task_content`
--

INSERT INTO `task_content` (`id`, `item_id`, `user_id`, `status_code`, `creator_id`, `content`, `created_at`) VALUES
(1, 2, 6, 'done', 1, '<p>顶顶顶顶</p>', 1528691838),
(2, 105, 2, 'bug_create', 1, '<p>打的到</p>', 1528770891),
(3, 106, 2, 'bug_create', 1, '<p>打的到</p>', 1528771074),
(4, 47, 5, 'coded', 1, '<p>ssssss&nbsp;</p>', 1528780728),
(5, 56, 4, 'tested', 1, '<p>ffffffff</p>', 1528780863),
(6, 56, 4, 'tested', 1, '<p>ffffffff3333</p>', 1528782264);

-- --------------------------------------------------------

--
-- 表的结构 `task_done`
--

CREATE TABLE `task_done` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '负责人',
  `creator_id` int(11) NOT NULL COMMENT '创建人',
  `plan_id` int(11) NOT NULL COMMENT '计划',
  `item_id` int(11) NOT NULL COMMENT '任务项',
  `status_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '变更任务状态',
  `remark` text COLLATE utf8_unicode_ci COMMENT '备注',
  `created_at` int(11) NOT NULL COMMENT '添加时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='处理结果';

--
-- 转存表中的数据 `task_done`
--

INSERT INTO `task_done` (`id`, `user_id`, `creator_id`, `plan_id`, `item_id`, `status_code`, `remark`, `created_at`) VALUES
(1, 1, 1, 1, 1, 'confirm', 'ddd', 1527668995),
(2, 1, 1, 1, 1, 'confirm', 'ssss', 1527669398),
(3, 1, 1, 1, 1, 'tested', 'sdsds', 1527669546),
(4, 1, 1, 1, 1, 'tested', 'sdsds', 1527669562),
(5, 1, 1, 1, 1, 'tested', '顶顶顶', 1527672153),
(6, 1, 1, 1, 1, 'tested', '顶顶顶', 1527672168),
(7, 1, 1, 1, 1, 'tested', '对方对方的', 1527672478),
(8, 1, 1, 1, 1, 'check', '呵', 1527689495),
(9, 1, 1, 1, 2, 'coding', 'ffff', 1527743874),
(10, 1, 1, 1, 2, 'coded', '完成了开发工作', 1527744342),
(11, 1, 1, 1, 2, 'testing', '测试任务', 1527786118),
(12, 1, 1, 1, 2, 'testing', '测试任务', 1527786199),
(13, 1, 1, 1, 2, 'testing', '测试任务', 1527786220),
(14, 1, 1, 1, 2, 'testing', '测试任务', 1527786282),
(15, 1, 1, 1, 2, 'testing', '顶顶顶', 1527786338),
(16, 1, 1, 1, 2, 'testing', '顶顶顶', 1527786677),
(17, 1, 1, 1, 2, 'check', '可以验收了', 1527786971),
(18, 1, 1, 1, 2, 'done', '大幅度反对法', 1527787136),
(19, 1, 1, 1, 2, 'coded', '对方对方的', 1527841188),
(20, 1, 1, 1, 2, 'coded', '对方对方的', 1527841211),
(21, 1, 1, 1, 2, 'done', '呃呃', 1527841331),
(22, 1, 1, 1, 2, 'done', '顶顶顶', 1527841391),
(23, 1, 1, 1, 2, 'done', '顶顶顶', 1527841409),
(24, 1, 1, 1, 2, 'done', '顶顶顶', 1527841431),
(25, 1, 1, 1, 2, 'done', '顶顶顶', 1527841441),
(26, 1, 1, 1, 2, 'done', '顶顶顶', 1527841474),
(27, 1, 1, 1, 2, 'done', '顶顶顶', 1527841542),
(28, 1, 1, 1, 2, 'done', '顶顶顶', 1527841611),
(29, 1, 1, 1, 2, 'done', '顶顶顶', 1527841702),
(30, 1, 1, 1, 2, 'done', '顶顶顶', 1527841759),
(31, 1, 1, 1, 2, 'done', '身上的', 1527841792),
(32, 1, 1, 1, 2, 'done', '身上的', 1527841979),
(33, 1, 1, 1, 2, 'done', '身上的', 1527842134),
(34, 1, 1, 1, 2, 'done', '身上的', 1527842261),
(35, 1, 1, 1, 2, 'done', '身上的', 1527842427),
(36, 1, 1, 1, 2, 'done', '身上的', 1527842456),
(37, 1, 1, 1, 2, 'done', '身上的', 1527842659),
(38, 1, 1, 1, 2, 'done', '身上的', 1527843000),
(39, 1, 1, 1, 2, 'done', '身上的', 1527843042),
(40, 1, 1, 1, 2, 'done', '身上的', 1527843112),
(41, 1, 1, 1, 2, 'done', '身上的', 1527843287),
(42, 1, 1, 1, 2, 'done', '身上的', 1527843369),
(43, 1, 1, 1, 2, 'done', '测试一下项目通知的功能', 1527857668),
(44, 1, 1, 1, 2, 'done', '测试一下项目通知的功能', 1527857734),
(45, 1, 1, 1, 2, 'done', '测试一下项目通知的功能', 1527857771),
(46, 1, 1, 1, 2, 'check', '非常不错的功能', 1527857867),
(47, 1, 1, 1, 2, 'check', '好像有错误还需要继续', 1527857966),
(48, 1, 1, 1, 2, 'coded', '和了哦', 1527858004),
(49, 1, 1, 1, 2, 'tested', '的反对发射点', 1527858056),
(50, 1, 1, 1, 2, 'tested', '的反对发射点', 1527858139),
(51, 1, 1, 1, 2, 'coding', '争夺额资源', 1527858204),
(52, 1, 1, 1, 2, 'coded', '', 1527858239),
(53, 1, 1, 1, 2, 'coded', '好的', 1527858339),
(54, 1, 1, 1, 2, 'check', '测试的这么样了', 1527858388),
(55, 1, 1, 1, 2, 'done', '大功告成', 1527858430),
(56, 1, 1, 1, 2, 'done', '哈哈哈', 1527864780),
(57, 1, 1, 1, 2, 'coded', '任务还是没有完成哦', 1528018466),
(58, 1, 1, 1, 2, 'coded', '任务还是没有完成哦', 1528018534),
(59, 1, 1, 1, 2, 'coded', '任务还是没有完成哦', 1528018570),
(60, 1, 1, 1, 2, 'tested', '的方法', 1528018641),
(61, 1, 1, 1, 2, 'done', '顶顶顶顶', 1528018670),
(62, 1, 1, 1, 2, 'done', '顶顶顶顶', 1528018688),
(63, 1, 1, 1, 2, 'done', '顶顶顶顶', 1528018735),
(64, 1, 1, 1, 2, 'done', '顶顶顶顶', 1528018750),
(65, 1, 1, 1, 2, 'done', '顶顶顶顶', 1528018780),
(66, 1, 1, 1, 2, 'testing', '大幅度反对法', 1528018842),
(67, 1, 1, 1, 2, 'testing', '大幅度反对法', 1528019780),
(68, 1, 1, 1, 2, 'testing', '大幅度反对法', 1528019800),
(69, 1, 1, 1, 2, 'check', '回电话还得等', 1528021402),
(70, 1, 1, 6, 83, 'done', 'dfdfd', 1528212265),
(71, 1, 1, 3, 61, 'coded', 'dsdsd', 1528212273),
(72, 1, 1, 6, 82, 'coded', '测试 notify 是否成功', 1528465760),
(73, 1, 1, 6, 82, 'testing', '测试notify通知', 1528465795),
(74, 1, 1, 6, 81, 'coded', '测试notify通知的是否正常', 1528466215),
(75, 1, 1, 1, 85, 'coded', '测试验证结果', 1528466236),
(76, 1, 1, 1, 86, 'coded', '测试功能', 1528466267),
(77, 1, 1, 6, 82, 'testing', '测试结果', 1528471649),
(78, 1, 1, 6, 83, 'coded', 'dfdfdfd', 1528518566),
(79, 1, 1, 6, 83, 'coded', 'dfdfdfd', 1528518636),
(80, 1, 1, 6, 83, 'coded', 'dfdfdfd', 1528518677),
(81, 1, 1, 6, 83, 'coded', 'dfdfdfd', 1528518825),
(82, 1, 1, 6, 83, 'coded', 'dfdfdfd', 1528518891),
(83, 1, 1, 6, 83, 'coded', 'dfdfdfd', 1528518911),
(84, 6, 6, 2, 2, 'done', 'ddd', 1528774754),
(85, 6, 6, 2, 2, 'done', 'ddd', 1528774760),
(86, 6, 6, 2, 2, 'done', 'ddd', 1528774787),
(87, 6, 6, 2, 2, 'done', 'ddd', 1528774839),
(88, 6, 6, 2, 2, 'done', 'ddd', 1528774890),
(89, 6, 1, 2, 2, 'done', 'ssss', 1528774949),
(90, 6, 1, 2, 2, 'done', 'ssss', 1528774972),
(91, 6, 1, 2, 2, 'done', 'ddd', 1528775018),
(92, 6, 1, 2, 2, 'done', 'ssd', 1528775171),
(93, 14, 1, 2, 57, 'coded', 'sdsd', 1528775223),
(94, 7, 1, 2, 54, 'coded', 'ddd', 1528780420),
(95, 7, 1, 2, 54, 'coded', 'ddd', 1528780470),
(96, 14, 1, 2, 56, 'tested', 'fff', 1528780503),
(97, 5, 1, 2, 47, 'coded', '添加任务项', 1528780728),
(98, 4, 1, 2, 56, 'tested', '添加任务项', 1528780863),
(99, 4, 1, 2, 56, 'tested', '添加任务项', 1528782264),
(100, 2, 1, 3, 106, 'bug_create', '添加任务项', 1528786502),
(101, 2, 1, 3, 106, 'bug_create', '添加任务项', 1528786548),
(102, 1, 1, 4, 108, 'none', '添加任务项', 1528791256),
(103, 1, 1, 4, 109, 'none', '添加任务项', 1528791425),
(104, 2, 1, 3, 105, 'bug_confirm', '顶顶顶顶', 1528796444),
(105, 2, 1, 3, 105, 'bug_confirm', '顶顶顶顶', 1528796470),
(106, 2, 1, 3, 105, 'bug_confirm', '帆帆帆帆', 1528796507),
(107, 2, 1, 3, 105, 'bug_confirm', '日日日', 1528796538),
(108, 2, 1, 3, 105, 'bug_fixing', '哈哈', 1528796588),
(109, 1, 1, 3, 110, 'none', '添加任务项', 1528799863);

-- --------------------------------------------------------

--
-- 表的结构 `task_item`
--

CREATE TABLE `task_item` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父节点',
  `plan_id` int(11) NOT NULL COMMENT '计划',
  `task_type_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'bug' COMMENT '类型',
  `status_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '状态',
  `user_id` int(11) NOT NULL COMMENT '被指派',
  `creator_id` int(11) NOT NULL COMMENT '创建者',
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名称',
  `project_id` int(11) DEFAULT NULL COMMENT '项目',
  `project_version_id` int(11) DEFAULT NULL COMMENT '版本',
  `code` int(11) DEFAULT NULL COMMENT '编号',
  `target_date` date DEFAULT NULL COMMENT '目标日期',
  `last_user_id` int(11) DEFAULT NULL COMMENT '更新者',
  `created_at` int(11) DEFAULT NULL COMMENT '添加时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='任务项';

--
-- 转存表中的数据 `task_item`
--

INSERT INTO `task_item` (`id`, `pid`, `plan_id`, `task_type_code`, `status_code`, `user_id`, `creator_id`, `name`, `project_id`, `project_version_id`, `code`, `target_date`, `last_user_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'task', 'testing', 5, 0, '酒店浏览后没记录到历史记录没有记录', NULL, NULL, 1337, NULL, 9, 1527735321, 1527842936),
(2, 0, 2, 'task', 'done', 6, 0, '【平台端】测试账号的权限没有生效', 1, NULL, 1334, NULL, 1, 1527735441, 1528774754),
(3, 0, 2, 'task', 'coded', 14, 0, '渠道类型编辑填写排序异常', NULL, NULL, 1333, NULL, 14, 1527735526, 1527840029),
(4, 0, 1, 'task', 'tested', 7, 0, '房价无效【预定按钮】未变灰', NULL, NULL, 1330, NULL, 9, 1527735633, 1528094888),
(5, 0, 1, 'task', 'tested', 9, 0, '酒店与分销显示的政策不一致', NULL, NULL, 1327, NULL, 9, 1527736106, 1527836262),
(6, 0, 3, 'bug', 'bug_create', 5, 0, '修改晚数后预定政策没有变化', NULL, NULL, 1326, NULL, NULL, 1527736265, 1527839482),
(7, 0, 3, 'bug', 'bug_create', 3, 0, '订单待处理通知提示的数量不正确', NULL, NULL, 1325, NULL, 9, 1527736443, 1528088859),
(8, 0, 1, 'task', 'tested', 4, 0, '酒店端集团帐号下仍切换关联状态为无效的酒店', NULL, NULL, 1237, NULL, 9, 1527747672, 1527848363),
(9, 0, 4, 'requirement', 'done', 6, 0, '酒店端集团帐号下库存管理中应隐藏房型修改功能', NULL, NULL, 1238, NULL, 9, 1527747695, 1528081656),
(10, 0, 4, 'requirement', 'tested', 5, 0, '酒店集团帐号首次登录没有提示绑定手机号', NULL, NULL, 1240, NULL, 9, 1527747714, 1527847679),
(11, 0, 1, 'task', 'tested', 3, 0, '集团房型售出佣金结算在单体酒店中', NULL, NULL, 1241, NULL, 9, 1527747737, 1527847592),
(12, 0, 1, 'task', 'tested', 3, 0, 'api对接订单出现空指针', NULL, NULL, 1247, NULL, 9, 1527747760, 1528081744),
(13, 0, 1, 'task', 'tested', 5, 0, '供应商管理中搜索框名称错误', NULL, NULL, 1256, NULL, 9, 1527747790, 1527846894),
(14, 0, 1, 'task', 'tested', 3, 0, ' api对接使用支付宝支付出现空指针', NULL, NULL, 1255, NULL, 9, 1527747809, 1527847022),
(15, 0, 1, 'task', 'tested', 3, 0, ' 分销取消订单后，支付宝支付退款显示错误', NULL, NULL, 1263, NULL, 9, 1527747828, 1527846237),
(16, 0, 1, 'task', 'tested', 3, 0, 'api对接预付订单使用支付宝支付后取消未退款', NULL, NULL, 1267, NULL, 9, 1527747846, 1527845677),
(17, 0, 1, 'task', 'tested', 3, 0, ' 分销商预定免担保订单提交成功后订单状态未改变', NULL, NULL, 1266, NULL, 9, 1527747871, 1527846067),
(18, 0, 1, 'task', 'tested', 3, 0, 'api对接提交现付订单出现空指针', NULL, NULL, 1258, NULL, 9, 1527747895, 1527846536),
(19, 0, 1, 'task', 'done', 3, 0, ' api对接使用支付宝支付出现空指针', NULL, NULL, 1255, NULL, 9, 1527747915, 1528081726),
(20, 0, 1, 'task', 'tested', 3, 0, ' 分销商取消订单后，供应商后台没有相应确认取消单动作', NULL, NULL, 1254, NULL, 9, 1527747931, 1527847283),
(21, 0, 1, 'task', 'tested', 3, 0, 'api对接，接口确认后。酒店端锁定允许取消修改按钮未消失', NULL, NULL, 1253, NULL, 9, 1527747962, 1528094691),
(22, 0, 1, 'task', 'tested', 3, 0, ' api对接过取消时间，取消按钮未消失', NULL, NULL, 1252, NULL, 9, 1527747980, 1528094535),
(23, 0, 1, 'task', 'tested', 5, 0, '集团酒店帐号下全部订单中需要增加酒店名称一栏', NULL, NULL, 1251, NULL, 9, 1527748007, 1527847385),
(24, 0, 1, 'task', 'tested', 5, 0, '酒店端集团帐号下应隐藏酒店维护导航页', NULL, NULL, 1239, NULL, 9, 1527748028, 1527847892),
(25, 0, 1, 'task', 'coded', 8, 0, '拆分对接hotelswitch的数据项目nda-switch', NULL, NULL, 137, NULL, 8, 1527748049, 1528165953),
(26, 0, 1, 'task', 'tested', 4, 0, '分销端接收的供应商发送的账单，酒店名称显示错误', NULL, NULL, 1264, NULL, 9, 1527748066, 1527846136),
(27, 0, 1, 'task', 'tested', 5, 0, '单体酒店的级别管理中出现了供应商提供的房型', NULL, NULL, 1285, NULL, 9, 1527748087, 1527843565),
(28, 0, 1, 'task', 'tested', 3, 0, 'api预付下单后页面报错', NULL, NULL, 1283, NULL, 9, 1527748110, 1528095614),
(29, 0, 2, 'task', 'coded', 4, 0, '房型宽带信息展示问题', NULL, NULL, 1272, NULL, NULL, 1527749258, 1527749258),
(30, 0, 2, 'task', 'coded', 7, 0, '关闭对话框刷新页面', NULL, NULL, 1302, NULL, NULL, 1527749520, 1527749520),
(31, 0, 2, 'task', 'coded', 4, 0, '增加支付类型', NULL, NULL, 1301, NULL, NULL, 1527749538, 1527749538),
(32, 0, 2, 'task', 'coded', 7, 0, '新增酒店点击两次添加，出现重复酒店', NULL, NULL, 1300, NULL, NULL, 1527749565, 1527749565),
(33, 0, 2, 'task', 'coded', 14, 0, '酒店ID和酒店名称位置不统一', NULL, NULL, 1298, NULL, NULL, 1527749586, 1527749586),
(34, 0, 2, 'task', 'coded', 6, 0, '将酒店信息管理页的“提交审核”剔除', NULL, NULL, 1297, NULL, NULL, 1527749603, 1527749603),
(35, 0, 2, 'task', 'coded', 14, 0, '房型默认项改为“有效”', NULL, NULL, 1296, NULL, NULL, 1527749618, 1527749622),
(36, 0, 2, 'task', 'coded', 13, 0, '酒店信息提交后页面未跳转', NULL, NULL, 1294, NULL, NULL, 1527749640, 1527749640),
(37, 0, 2, 'task', 'coded', 5, 0, '可点击的按钮不明显', NULL, NULL, 1293, NULL, 5, 1527749656, 1528102249),
(38, 0, 2, 'task', 'coded', 5, 0, '提交审核”按钮更改为“确认修改”', NULL, NULL, 1292, NULL, 5, 1527749680, 1528099086),
(39, 0, 2, 'task', 'coded', 5, 0, '房型信息展示不完整', NULL, NULL, 1291, NULL, 5, 1527749695, 1528099967),
(40, 0, 2, 'task', 'coded', 14, 0, '星级显示有问题', NULL, NULL, 1290, NULL, NULL, 1527749711, 1527749711),
(41, 0, 2, 'task', 'coded', 14, 0, '更改类目', NULL, NULL, 1289, NULL, NULL, 1527749726, 1527749726),
(42, 0, 2, 'task', 'coded', 7, 0, '没选床型，提交后增加提醒框', NULL, NULL, 1286, NULL, NULL, 1527749745, 1527749745),
(43, 0, 2, 'task', 'coded', 5, 0, '酒店在修改证明图片时，刷新后不知道是否上传成功，优化加个文字提示', NULL, NULL, 1282, NULL, NULL, 1527749784, 1527749784),
(44, 0, 2, 'task', 'coded', 14, 0, '务板块中编辑按钮会有歧义', NULL, NULL, 1280, NULL, NULL, 1527749804, 1527749804),
(45, 0, 2, 'task', 'coded', 5, 0, '英文名称输入英文和空格，保存时提示应为名称只能输入英文和特殊符号', NULL, NULL, 1279, NULL, 5, 1527749823, 1527752295),
(46, 0, 2, 'task', 'coded', 3, 0, '最少起订间数提示不具体', NULL, NULL, 1278, NULL, 3, 1527749855, 1528184858),
(47, 0, 2, 'task', 'coded', 5, 1, '返佣设置未填保存，原有数据被覆盖', 1, 2, 1306, NULL, 1, 1527749871, 1528780728),
(48, 0, 2, 'task', 'coded', 7, 0, '平台端维护酒店图片时无法批量上传', NULL, NULL, 1288, NULL, NULL, 1527749887, 1527749887),
(49, 0, 2, 'task', 'coded', 14, 0, '平台端维护酒店图片时无法批量上传', NULL, NULL, 1288, NULL, NULL, 1527749915, 1527749915),
(50, 0, 2, 'task', 'coded', 5, 0, ' 管理后台酒店基础信息维护模块文字错误', NULL, NULL, 1270, NULL, NULL, 1527749938, 1527749938),
(51, 0, 2, 'task', 'coded', 14, 0, ' 文字不统一，且缺少内容', NULL, NULL, 1319, NULL, 14, 1527749962, 1527763896),
(52, 0, 2, 'task', 'coded', 14, 0, ' 系统设置中字典管理导航标签展示内容错误', NULL, NULL, 1318, NULL, 14, 1527749982, 1527820753),
(53, 0, 2, 'task', 'coded', 14, 0, ' 异常订单查看', NULL, NULL, 1316, NULL, 14, 1527749999, 1527764151),
(54, 0, 2, 'task', 'coded', 7, 0, '订单接受后未消失', NULL, NULL, 1315, NULL, 1, 1527750014, 1528780420),
(55, 0, 2, 'task', 'coded', 14, 0, '添加默认主图', NULL, NULL, 1313, NULL, 14, 1527750033, 1528106901),
(56, 0, 2, 'task', 'tested', 4, 1, ' 按区域搜索酒店后，分页标签摆放位置问题', 1, 2, 1312, NULL, 1, 1527750045, 1528782264),
(57, 0, 2, 'task', 'coded', 14, 0, '点击营业执照加载不出', NULL, NULL, 1308, NULL, 1, 1527750063, 1528775223),
(58, 0, 3, 'task', 'coded', 13, 0, 'API-酒店绑定API类型', NULL, NULL, 118, NULL, NULL, 1527750143, 1527750143),
(59, 0, 3, 'task', 'coded', 13, 0, 'API-酒店开启同步或者停止', NULL, NULL, 119, NULL, NULL, 1527750158, 1527750158),
(60, 0, 3, 'task', 'coded', 13, 0, 'API-根据酒店编码+API类型，查询物理房型', NULL, NULL, 120, NULL, NULL, 1527750174, 1527750174),
(61, 0, 3, 'task', 'coded', 13, 0, 'API-根据物理房型的Id+API类型，查询销售房型', NULL, NULL, 121, NULL, 1, 1527750189, 1528212273),
(62, 0, 3, 'task', 'coded', 13, 0, 'API-查询支持的所有API类型+API提供额介绍', NULL, NULL, 117, NULL, NULL, 1527750212, 1527750212),
(63, 0, 3, 'task', 'open', 3, 0, '设计酒店API的映射（多对多），是否绑定，是否同步', NULL, NULL, 122, NULL, NULL, 1527750228, 1527750228),
(64, 0, 3, 'task', 'open', 3, 0, '设计酒店物理房型和API对应的物理房型的关系（多对多）', NULL, NULL, 123, NULL, NULL, 1527750240, 1527750240),
(65, 0, 3, 'task', 'open', 5, 0, '通过API接口来更新APIType的值', NULL, NULL, 124, NULL, NULL, 1527750259, 1528083090),
(66, 0, 3, 'task', 'coded', 5, 0, '供应商数据同步管理', NULL, NULL, 125, NULL, 5, 1527750273, 1528195656),
(67, 0, 3, 'task', 'open', 2, 0, '根据API类型列出注册的酒店（管理绑定，同步开启）排除集团账号', NULL, NULL, 126, NULL, NULL, 1527750288, 1527750288),
(68, 0, 3, 'task', 'open', 5, 0, '物理房型新增匹配', NULL, NULL, 127, NULL, NULL, 1527750315, 1528116381),
(69, 0, 3, 'task', 'open', 3, 0, '销售房型新增匹配', NULL, NULL, 128, NULL, NULL, 1527750336, 1528082999),
(70, 0, 3, 'task', 'coding', 14, 0, '屏蔽（酒店屏蔽分销商）', NULL, NULL, 129, '2018-06-04', 14, 1527750352, 1528189343),
(71, 0, 3, 'task', 'open', 6, 0, '酒店端基础信息中增加撤销星级功能按钮', NULL, NULL, 1262, NULL, 6, 1527750366, 1527817173),
(72, 0, 5, 'task', 'coded', 4, 0, '设计数据模型', NULL, NULL, 130, NULL, 1, 1527752481, 1528020966),
(73, 0, 5, 'task', 'coded', 4, 0, '系统管理员登录功能（管理后台）', NULL, NULL, 131, NULL, 4, 1527752501, 1527846043),
(74, 0, 5, 'task', 'coded', 4, 0, '抓取携程酒店静态数据（管理后台）', NULL, NULL, 132, NULL, 4, 1527752519, 1527846062),
(75, 0, 5, 'task', 'coded', 4, 0, '外网酒店静态数据转化成NDA格式的数据（管理后台）', NULL, NULL, 133, NULL, 4, 1527752533, 1527846091),
(76, 0, 5, 'task', 'coded', 4, 0, '查询酒店的静态信息API（json）', NULL, NULL, 134, NULL, 4, 1527752547, 1527846108),
(77, 0, 5, 'task', 'coded', 4, 0, '根据数据来源分页搜索列表（管理后台）', NULL, NULL, 135, NULL, 4, 1527752562, 1527846124),
(78, 0, 5, 'task', 'coded', 4, 0, '查看和编辑酒店信息（管理后台）', NULL, NULL, 136, NULL, 4, 1527752574, 1528177458),
(79, 0, 1, 'task', 'coded', 3, 0, '现付担保下单入住完成后，订单界面未显示授信支付退款金额。', NULL, NULL, 1314, NULL, 3, 1527758408, 1528099282),
(80, 0, 1, 'task', 'tested', 5, 0, '无删除员工账号权限，未提示权限不足', NULL, NULL, 1331, NULL, 9, 1527763891, 1528079955),
(81, 0, 6, 'task', 'coded', 8, 0, 'docker 容器互联 研究', NULL, NULL, 7001, NULL, 1, 1527815821, 1528466215),
(82, 0, 6, 'task', 'testing', 8, 0, 'ndaswitch更新价格库存时，碰到找不到的产品跳过，处理之后的数据', NULL, NULL, 7002, '2018-06-01', 1, 1527844718, 1528465795),
(83, 0, 6, 'task', 'coded', 13, 0, 'ndaswitch,hotelswitch 正式环境搭建', NULL, NULL, 7003, NULL, 1, 1527844972, 1528518566),
(84, 0, 6, 'task', 'coding', 13, 0, 'api对接，小议渠道增加每天自动登录一次功能', NULL, NULL, 7004, NULL, 13, 1528074055, 1528079722),
(85, 0, 1, 'task', 'coded', 5, 0, ' 登录后出现重复导航栏', NULL, NULL, 1351, NULL, 1, 1528163955, 1528466236),
(86, 0, 1, 'task', 'coded', 5, 0, '未展示取消政策的时间限制', NULL, NULL, 1353, NULL, 1, 1528178366, 1528466267),
(87, 0, 1, 'task', 'coded', 5, 0, '页面出现了多次嵌套', NULL, NULL, 1349, NULL, 5, 1528178475, 1528187001),
(88, 0, 1, 'task', 'open', 5, 0, '重新预定出现异常', NULL, NULL, 1352, NULL, NULL, 1528178528, 1528178528),
(89, 0, 7, 'task', 'open', 10, 0, '酒店基础信息设计', NULL, NULL, NULL, NULL, NULL, 1528182463, 1528182463),
(90, 0, 7, 'task', 'open', 10, 0, '酒店设施一键编辑页面设计', NULL, NULL, NULL, NULL, NULL, 1528182503, 1528182503),
(91, 0, 7, 'task', 'open', 10, 0, '酒店房型信息操作按钮排版设计', NULL, NULL, NULL, NULL, NULL, 1528182601, 1528182601),
(92, 0, 7, 'task', 'open', 10, 0, '酒店图片管理页面设计', NULL, NULL, NULL, NULL, NULL, 1528182684, 1528182684),
(93, 0, 7, 'task', 'open', 10, 0, '待处理订单页面设计', NULL, NULL, NULL, NULL, NULL, 1528182847, 1528182847),
(94, 0, 7, 'task', 'open', 10, 0, '打印页面设计', NULL, NULL, NULL, NULL, NULL, 1528182860, 1528182860),
(95, 0, 7, 'task', 'open', 7, 0, '首页内容布局的排版', NULL, NULL, NULL, NULL, NULL, 1528183050, 1528183050),
(96, 0, 7, 'task', 'open', 7, 0, '酒店基础信息交互开发', NULL, NULL, NULL, NULL, NULL, 1528183104, 1528183104),
(97, 0, 7, 'task', 'open', 7, 0, '酒店设施的交互', NULL, NULL, NULL, NULL, NULL, 1528183363, 1528183363),
(98, 0, 7, 'task', 'open', 7, 0, '酒店房型补充交互', NULL, NULL, NULL, NULL, NULL, 1528183401, 1528183401),
(99, 0, 7, 'task', 'open', 7, 0, '酒店图片补充交互', NULL, NULL, NULL, NULL, NULL, 1528183449, 1528183449),
(100, 0, 7, 'task', 'open', 7, 0, '酒店联系方式交互', NULL, NULL, NULL, NULL, NULL, 1528183570, 1528183570),
(101, 0, 7, 'task', 'open', 12, 0, '全部订单列表项目展示的信息清单', NULL, NULL, NULL, NULL, NULL, 1528183684, 1528183684),
(102, 0, 7, 'task', 'open', 12, 0, '待解锁订单条目展示清单', NULL, NULL, NULL, NULL, NULL, 1528183816, 1528183816),
(103, 0, 5, 'task', 'open', 4, 0, '图片去水印', NULL, NULL, NULL, NULL, NULL, 1528184638, 1528184638),
(104, 0, 5, 'task', 'open', 4, 0, '上传图片到oss', NULL, NULL, NULL, NULL, NULL, 1528184674, 1528184674),
(105, 0, 3, 'bug', 'bug_fixing', 2, 0, '测试一次是不够的', 1, 2, 112211, '2018-05-23', 1, 1528770891, 1528796588),
(106, 0, 3, 'bug', 'bug_create', 2, 1, '测试一次是不够的', 1, 2, 112211, '2018-05-23', 1, 1528771074, 1528786548),
(108, 0, 4, 'requirement', 'none', 1, 1, '测试', 1, 1, NULL, NULL, 1, 1528791256, 1528791256),
(109, 0, 4, 'requirement', 'none', 1, 1, '测试', 1, 1, NULL, NULL, 1, 1528791425, 1528791425),
(110, 0, 3, 'bug', 'none', 1, 1, '呃呃呃', 1, 2, NULL, NULL, 1, 1528799863, 1528799863);

-- --------------------------------------------------------

--
-- 表的结构 `task_plan`
--

CREATE TABLE `task_plan` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `task_type` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '类型',
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名称',
  `target_version` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '目标版本',
  `plan_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `target_date` date DEFAULT NULL COMMENT '目标日期',
  `test_date` date DEFAULT NULL COMMENT '测试发布日期',
  `prod_date` date DEFAULT NULL COMMENT '生产发布日期',
  `created_at` int(11) DEFAULT NULL COMMENT '添加时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='任务计划';

--
-- 转存表中的数据 `task_plan`
--

INSERT INTO `task_plan` (`id`, `team_id`, `task_type`, `name`, `target_version`, `plan_status`, `target_date`, `test_date`, `prod_date`, `created_at`, `updated_at`) VALUES
(2, 2, 'task', 'fixbug20180528', '1.0.51', 1, NULL, NULL, NULL, 1528195470, 1528718490),
(3, 2, 'bug', 'BUG计划', '1.0.89', 1, NULL, NULL, NULL, 1528719702, 1528719702),
(4, 2, 'requirement', '需求计划', '1.0', 1, NULL, NULL, NULL, 1528719739, 1528719746);

-- --------------------------------------------------------

--
-- 表的结构 `task_status`
--

CREATE TABLE `task_status` (
  `id` int(11) NOT NULL COMMENT 'id',
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '编码',
  `name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名称',
  `status_type` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '状态类型',
  `intro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '状态描述',
  `sort` smallint(6) DEFAULT NULL COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='任务状态';

--
-- 转存表中的数据 `task_status`
--

INSERT INTO `task_status` (`id`, `code`, `name`, `status_type`, `intro`, `sort`) VALUES
(1, 'bug_confirm', '确认', 'bug', '发布者更技术确认bug', 2),
(2, 'bug_create', '新建', 'bug', '产品和测试发现新的bug而录入', 1),
(3, 'bug_fixed', '已修复', 'bug', 'bug的修改任务完成验收', 5),
(4, 'bug_fixing', '修复中', 'bug', 'bug安排分解任务', 4),
(5, 'bug_waiting', '等待', 'bug', 'bug已经确认等待处理', 3),
(6, 'check', '验收', 'task', NULL, 7),
(7, 'coded', '开发完', 'task', '', 4),
(8, 'coding', '开发中', 'task', NULL, 3),
(9, 'confirm', '确认', 'task', '', 2),
(10, 'done', '完成', 'task', NULL, 8),
(11, 'open', '启动', 'task', NULL, 1),
(12, 'tested', '测试完', 'task', '', 6),
(13, 'testing', '测试中', 'task', NULL, 5);

-- --------------------------------------------------------

--
-- 表的结构 `task_type`
--

CREATE TABLE `task_type` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `type_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '编码',
  `intro` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '介绍',
  `created_at` int(11) NOT NULL COMMENT '添加时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='任务类型（需求，bug，测试用例，开发任务)';

--
-- 转存表中的数据 `task_type`
--

INSERT INTO `task_type` (`id`, `name`, `type_code`, `intro`, `created_at`, `updated_at`) VALUES
(1, '任务', 'task', '要处理的工作最小单位', 1528716473, 1528716473),
(2, '需求', 'requirement', '需求文档，产生【测试用例】和【任务】', 1528716637, 1528716782),
(3, 'BUG', 'bug', '系统的问题，产生【任务】', 1528716670, 1528716766),
(4, '测试用例', 'testcase', '测试用例，产生【bug】', 1528716699, 1528716793);

-- --------------------------------------------------------

--
-- 表的结构 `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(11) DEFAULT NULL COMMENT '项目',
  `im_robot_id` int(11) DEFAULT NULL COMMENT 'IM机器人',
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `team`
--

INSERT INTO `team` (`id`, `name`, `project_id`, `im_robot_id`, `created_at`) VALUES
(2, '酒店', 1, 1, 1527607023);

-- --------------------------------------------------------

--
-- 表的结构 `team_user`
--

CREATE TABLE `team_user` (
  `team_id` int(11) NOT NULL COMMENT '团队',
  `user_id` int(11) NOT NULL COMMENT '成员'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='团队成员';

--
-- 转存表中的数据 `team_user`
--

INSERT INTO `team_user` (`team_id`, `user_id`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nick_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '姓名',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机',
  `job_position` varchar(64) COLLATE utf8_unicode_ci DEFAULT 'developer' COMMENT '岗位',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `is_admin` tinyint(1) DEFAULT NULL,
  `experience_scope` bigint(20) NOT NULL DEFAULT '0' COMMENT '经验值',
  `contribution_scope` bigint(20) NOT NULL DEFAULT '0' COMMENT '贡献值',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `nick_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `mobile`, `job_position`, `status`, `is_admin`, `experience_scope`, `contribution_scope`, `created_at`, `updated_at`) VALUES
(1, 'admin', '管理员', 'wC7HcFcM_gXdJc_7iR3bGVYhnA4cIEhg', '$2y$13$8zngK45a/W060/ZrXJxdyOHYV9Io6aQl8tBU9.7.fqBgEdqspYPSS', NULL, 'admin@loglass.com', '15355498106', 'TeamLeader', 10, 1, 43, 25, 1527487768, 1528471195),
(2, '610004', '顿刚', '_wG1B_mUJosqiQK4lL6SXHWDfSe68N6G', '$2y$13$E85Cz8UnXIJFcjfHmNpDveLAF5etWaH6hGmAVjyjpMibZrFfEmB7e', NULL, 'dungang@126.com', '15355498106', 'TeamLeader', 10, NULL, 0, 0, 1527487851, 1528471215),
(3, '610012', '钱攀', 'BcSjuF9Ab3JYXaUb89tWCLDt_1Y4Zb67', '$2y$13$5pCRX9nz1YYLl2lI/FH89ewuO/5qNaPHgLZZkjTKc.IVGrcgH5HSm', NULL, 'pan.qian@ndabooking.com', '', 'DevelopmentEngineer', 10, NULL, 0, 0, 1527734840, 1527740788),
(4, '610006', '陈政', 't6EnSjGi4bKdQZ_JqqjrcYqRMbwO86YQ', '$2y$13$N6F30j9aVqaBBiOVisVDNudM0Rlx3U1DLwg40dTLlzzBVQ9G3bc/m', NULL, 'zheng.chen@ndabooking.com', '', 'DevelopmentEngineer', 10, NULL, 0, 0, 1527734883, 1527740824),
(5, '610008', '俞栋炜', 'AYe3JqfTbfi419UoVbMgoA8MJngUorxu', '$2y$13$B3/5Jipsg5c5KhBIqOuEQezi5hwkYWMcWcdsoahTIo1lKkJH3D3JW', NULL, 'dongwei.yu@ndabooking.com', '', 'DevelopmentEngineer', 10, NULL, 0, 0, 1527734920, 1527740836),
(6, '610005', '缪灵健', 'SthEtoBhkBgCSkYW6oP7_KmKplWXkvkd', '$2y$13$N.OxI0CHXhku3yojPzymo.ic4Csx5Jv3DY5UAT3YMseAZ2JUvO63u', NULL, 'linjian.miao@ndabooking.com', '', 'DevelopmentEngineer', 10, NULL, 0, 0, 1527734971, 1527740848),
(7, '610010', '赵金桥', 'JRYT4jczqOe77IPYUg5ATfJjyKDrW0Wn', '$2y$13$5hYcAo0XggNtzPFZSL8CAuyOHMUkMunAYrS0vC14P0n6zrtGxKKYO', NULL, 'jingqiao.zhao@ndabooking.com', '', 'DevelopmentEngineer', 10, NULL, 0, 0, 1527735099, 1527740860),
(8, '610014', '管志伟', 'FPNUHAKtCRhFg1YheVxCOsu2P73N6KvV', '$2y$13$z4le5107ouKNR4gXB.ZXNOybpBv0ohptx1jerNyax/U05feHj9Dvu', NULL, 'zhiwei.guan@ndabooking.com', '', 'DevelopmentEngineer', 10, NULL, 0, 0, 1527737255, 1527740873),
(9, '610015', '陈铭', 'nneJApsJMPBh1K2fJvtbK3dmpF1t6Z_T', '$2y$13$K5Srw92KGBXkZQ1DlbhFv.MFcBCINsmGp3a4Hcbu47WqrJPjiVhhO', NULL, 'ming.chen@ndabooking.com', '', 'DevelopmentEngineer', 10, NULL, 0, 0, 1527737291, 1527740884),
(10, '610016', '刘丽苹', 'G7_n8zJ1igGLFJmeI_cDwhsLpNzgmJsi', '$2y$13$RKipNgHKC9p7BQlwylEiROMaR4ed16VnzITSijTgrKOvNyK0wnty2', NULL, 'liping.liu@ndabooking.com', '', 'DevelopmentEngineer', 10, NULL, 0, 0, 1527737325, 1527740899),
(11, '610013', '章秀蓉', 'wFiXPnxA6zFCg1y6_B6Crq-SEpWgwXu2', '$2y$13$06vauO8sw2zGgnKQJ3FdsegTkyCjEx/HRakTWTjvvIFsWCV3ObVym', NULL, 'xiurong.zhang@ndabooking.com', '', 'DevelopmentEngineer', 10, NULL, 0, 0, 1527737361, 1527740914),
(12, '610009', '施振国', 'ZOOsgGUWR69UaV4pbhLw9TFXlteI9w-6', '$2y$13$GkMn1nQLUVw9/IA2c/9ozuQyR6KZLbVyRRO9DA9l3QgQxNt9ctIS.', NULL, 'zheng.guo@ndabooking.com', '', 'DevelopmentEngineer', 10, NULL, 0, 0, 1527737472, 1527740926),
(13, '610018', '陈波涛', 'S8o3giGrEyjBF_THay0kpCNDNNDx_8aA', '$2y$13$FEJH/786uT6kqDQfAniZxOr7Rkq3Fi6pW6V7MBpQHxbvAH/cH.K/6', NULL, 'botao.chen@ndabooking.com', '', 'DevelopmentEngineer', 10, NULL, 0, 0, 1527737509, 1527740938),
(14, '610020', '章宇飞', 'mN7bBEzshhLeoXLYOV5VusHENe8S3rOP', '$2y$13$2Wxl7BSydXskBtMmT23uZOco0GMx7RaCZ.IsYGdjZZVRz0BG/UyQG', NULL, 'yufei.zhang@ndabooking.com', '', 'DevelopmentEngineer', 10, NULL, 0, 0, 1527737547, 1527740948);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `db_change`
--
ALTER TABLE `db_change`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_name`
--
ALTER TABLE `db_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `im_robot`
--
ALTER TABLE `im_robot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integration`
--
ALTER TABLE `integration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_scope_user1_idx` (`reciever_id`),
  ADD KEY `fk_contribution_contribution_rule1_idx` (`rule_id`),
  ADD KEY `receiver_id` (`reciever_id`,`creator_id`,`rule_id`,`target`,`target_id`,`job_position`) USING BTREE,
  ADD KEY `job_position` (`job_position`);

--
-- Indexes for table `integration_rule`
--
ALTER TABLE `integration_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integration_value`
--
ALTER TABLE `integration_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_integration_scope_integration_rule1_idx` (`rule_id`),
  ADD KEY `fk_integration_value_job_position1_idx` (`job_position`);

--
-- Indexes for table `job_position`
--
ALTER TABLE `job_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge`
--
ALTER TABLE `knowledge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge_category`
--
ALTER TABLE `knowledge_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meet`
--
ALTER TABLE `meet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_version`
--
ALTER TABLE `project_version`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistical_dimension`
--
ALTER TABLE `statistical_dimension`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dimension_index` (`year`,`quarter`,`month`,`week`,`day`);

--
-- Indexes for table `statistical_target`
--
ALTER TABLE `statistical_target`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_statistics`
--
ALTER TABLE `target_statistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_target_statistics_statistical_dimension1_idx` (`dimension_id`),
  ADD KEY `fk_target_statistics_user1_idx` (`user_id`),
  ADD KEY `fk_target_statistics_statistical_target1_idx` (`target_id`);

--
-- Indexes for table `task_content`
--
ALTER TABLE `task_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_done`
--
ALTER TABLE `task_done`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_item`
--
ALTER TABLE `task_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_item_status` (`status_code`);

--
-- Indexes for table `task_plan`
--
ALTER TABLE `task_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_type`
--
ALTER TABLE `task_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_type_code` (`type_code`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`team_id`,`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `db_change`
--
ALTER TABLE `db_change`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `db_name`
--
ALTER TABLE `db_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `im_robot`
--
ALTER TABLE `im_robot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `integration`
--
ALTER TABLE `integration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `integration_rule`
--
ALTER TABLE `integration_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `integration_value`
--
ALTER TABLE `integration_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `knowledge`
--
ALTER TABLE `knowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `knowledge_category`
--
ALTER TABLE `knowledge_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `meet`
--
ALTER TABLE `meet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `project_version`
--
ALTER TABLE `project_version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `statistical_dimension`
--
ALTER TABLE `statistical_dimension`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `statistical_target`
--
ALTER TABLE `statistical_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `target_statistics`
--
ALTER TABLE `target_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `task_content`
--
ALTER TABLE `task_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `task_done`
--
ALTER TABLE `task_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- 使用表AUTO_INCREMENT `task_item`
--
ALTER TABLE `task_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- 使用表AUTO_INCREMENT `task_plan`
--
ALTER TABLE `task_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `task_status`
--
ALTER TABLE `task_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `task_type`
--
ALTER TABLE `task_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 限制导出的表
--

--
-- 限制表 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
