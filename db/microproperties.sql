-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 03:37 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `microproperties`
--
CREATE DATABASE IF NOT EXISTS `microproperties` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `microproperties`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('2c0cce733beb14eb5c350b6f749c78b1fe2c1a16', '::1', 1523431364, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333433313330313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d30352031343a34343a3037223b6c6173745f636865636b7c693a313532333432383134383b),
('d1a5776746985ad917d95df2ed9bfaaea52eba51', '::1', 1523430803, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333433303634333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d30352031343a34343a3037223b6c6173745f636865636b7c693a313532333432383134383b),
('91a721355fb5a8c3d4723caef081e6acbd7ede9a', '::1', 1523430249, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333433303234363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d30352031343a34343a3037223b6c6173745f636865636b7c693a313532333432383134383b),
('293639763d2a26c1066f2c2e86c26fb4a82c6e97', '::1', 1523429777, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333432393438373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d30352031343a34343a3037223b6c6173745f636865636b7c693a313532333432383134383b),
('3f7b281ee79fbf3ce0a59db3aca75d2f53259fd1', '::1', 1523429801, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333432393739323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d30352031343a34343a3037223b6c6173745f636865636b7c693a313532333432383134383b),
('372a641fc441396791f1f9730276a8bd139e8298', '::1', 1523428149, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333432383133383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d30352031343a34343a3037223b6c6173745f636865636b7c693a313532333432383134383b6d6573736167657c733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('7751e69bde5ab8d936d2a7542c7593949488ac31', '::1', 1523428702, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333432383530323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d30352031343a34343a3037223b6c6173745f636865636b7c693a313532333432383134383b),
('e0a826a1375cd76a742f30d320d79cff5887e25e', '::1', 1523433164, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333433333135393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d30352031343a34343a3037223b6c6173745f636865636b7c693a313532333432383134383b),
('0a2000b3f162ee22ddc6e24f7332f1d940624838', '::1', 1523512741, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333531323733313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b6d6573736167657c733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('7d7cf5b1da96648b26b85b4cdd4c76b382f870ce', '::1', 1523513774, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333531333535303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('6781f228d4b17ba680c35c29093c8a9fbfef084d', '::1', 1523513931, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333531333839313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('658b59b652fd7068f0cb1d7f245bc72ec3bacdf4', '::1', 1523514733, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333531343433393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('3e0933cebc023e0def7760417c16bc5026e2ef5e', '::1', 1523516568, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333531363338363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('4cfcfb5e793bcad059c83a45e1de2bd1b3f4eed9', '::1', 1523517154, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333531373134383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('b5facf618e0fc3b9bb20a4649fd98a337d37803c', '::1', 1523518532, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333531383330313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('cefb72c43fe80d7983928f4073f1599055dabb0a', '::1', 1523519434, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333531393133353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('52d7f3be59090ff6c3be70ebdf17fdec8976b2da', '::1', 1523519660, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333531393433363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('604d90253b9f6d6eeb3bd867707db999ceae9c71', '::1', 1523520076, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333531393738343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('9d7420c436e375129aa4282dadbe978b9e14c967', '::1', 1523520939, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333532303732343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('994327382802a2faf69fb71ebc73cc04077c9501', '::1', 1523523554, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333532333239353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('31b98e4d6c83523e4b5b7e1cb3c339625e8ae6f2', '::1', 1523523766, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333532333633333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('c44ec040acfe8b14be21e5fa29f025ac23a778ed', '::1', 1523524426, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333532343138303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('16817caf9af95691233ae051232e1abce0a5355e', '::1', 1523524591, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333532343438353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('1cfe4122920e50faf0189b84f1468cae3063e989', '::1', 1523524895, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333532343839333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('1485f6b29daed6aa9e05365841a605a136e43bd5', '::1', 1523525258, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333532353232323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('e6bfb932fa90b9b3c55a8a249cdcf091139895ae', '::1', 1523525599, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333532353532353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('97b89c13c15c0c23e2d3cf83b68a144b9d80b928', '::1', 1523526457, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333532363336333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('fd43c91f7a102522cb80b6b8bf43dad19a15f643', '::1', 1523526710, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333532363637333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31312031343a32393a3038223b6c6173745f636865636b7c693a313532333531323734303b),
('07c4181fca7810cdfbe927bcd995126de8fd8661', '::1', 1524134976, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343133343632303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031382d30342d31322031333a35393a3030223b6c6173745f636865636b7c693a313532343133343633313b),
('ad131f09e0dac0fcc0c8afb6aaa5a67b9b7dfee8', '::1', 1524466523, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343436363234323b),
('e2a9c68b44fe5f1ebf609be58fa831a31d3f982d', '::1', 1524466589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343436363534353b);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `content`) VALUES
(1, 'request-new-topic.html no agenda', '[uberABM] - request for a new topic', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n<html xmlns="http://www.w3.org/1999/xhtml">\n<head>\n<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n<title>UberABM</title>\n<meta name="viewport" content="width=device-width, initial-scale=1.0"/>\n</head>\n<body style="margin: 0; padding: 0;">\n	<table  align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;border:1px solid #c4c4c4;">	\n		<tr>\n			<td>\n				<table align="center" border="0" cellpadding="0" cellspacing="0" style=" border-collapse: collapse;">\n					<td style="padding:0 15px;" width="290" align="left">\n						<img src="{url}assets/edm/logo.png" alt="" width="230" height="76" style="display: block;padding:0;margin:0;">\n					</td>\n					<td style="padding:0 15px;" width="290" align="right">\n						<img src="{url}assets/edm/juniper-logo.jpg" alt="" width="143" height="48" style="display: block;padding:0;margin:0;">\n					</td>\n				</table>\n			</td>\n		</tr>\n		<tr>\n			<td>\n				<table align="center" border="0" cellpadding="0" cellspacing="0" width="560" style=" border-collapse: collapse;background: #13222f;">\n					<td align="left" style="padding-left: 20px;">\n						<h2 style="font-size: 24px;color:#d4c440;text-transform: uppercase;font-family:  Helvetica,sans-serif;font-weight: 200;">\n							Time to tap into your expertise!\n						</h2>\n					</td>\n					<td align="right">\n						<img src="{url}assets/edm/header-right.jpg" alt="IOT" width="186" height="150" style="display: block;" />\n					</td>\n				</table>\n			</td>\n		</tr>\n		<tr>\n			<td style="padding:0;">\n				<table align="center" border="0" cellpadding="0" cellspacing="0" width="560" style=" border-collapse: collapse;">\n					\n					<tr>\n						<td bgcolor="#EFEFEF" style="padding: 50px 30px 0px 30px;">\n							<table border="0" cellpadding="0" cellspacing="0" width="100%">\n								<tr>\n									<td align="center" style="padding: 0 0 20px 0; color: #13222F; font-family:  Helvetica,sans-serif;font-weight: 200; font-size: 12px; line-height: 20px;">\n										Dear {speaker_name},\n\n									</td>\n								</tr>\n								<tr>\n									\n									<td  align="center" style="padding:0 0 50px 0;color: #13222F; font-family:  Helvetica,sans-serif;font-weight: 200; font-size: 12px; line-height: 20px;">\n										{requestor_name} has requested for a new topic under {category_name} and we would need your advice in creating such a content. Please help with the following::\n\n									</td>\n								</tr>\n								<tr>\n									<td align="center" style="border-bottom: 2px solid #13222F;">\n										<img src="{url}assets/edm/req.png" alt="Requirements" width="132" height="14" style="display: block;" />\n									</td>\n								</tr>\n								<tr>\n										<td align="center" style="padding:10px 0 0 0;color: #13222F; font-family:  Helvetica,sans-serif;font-weight: 200; font-size: 12px; line-height: 20px;">\n											<span style="font-weight: bold;">Category</span>: {category_name} <br>\n											<span style="font-weight: bold;">About the new topic</span>:{about} <br>\n											<span style="font-weight: bold;">Reason(s) for the new topic</span>: {why}\n										</td>\n								</tr>\n								<tr>\n									<td style="padding:50px 0;">\n										<table align="center" border="0" cellpadding="0" cellspacing="0" width="221">\n												<td align="center" style="font-family:  Helvetica,sans-serif;font-weight: normal; font-size: 12px;text-transform: uppercase;border:1px solid #13222F;height: 30px;">\n												<a href="{url}" style="text-decoration: none;color: #13222F; display: block;margin-top: 2px;">VIEW DETAILS </a>\n												</td>\n										</table>\n									</td>\n								</tr>\n								<tr>\n									<td style="padding:0 0 30px 0;">\n										<table align="center" border="0" cellpadding="0" cellspacing="0">\n												<td align="center" style="font-family:  Helvetica,sans-serif;font-weight: normal; font-size: 12px;color:#13222F;">\n													<b>Brought to you by:</b><br><br>\n													APAC Rolling Thunder Team\n												</td>\n										</table>\n									</td>\n								</tr>\n							</table>\n						</td>\n					</tr>\n					<tr>\n						<td>&nbsp;</td>\n					</tr>\n					<tr>\n						<td bgcolor="#00587b" style="padding: 20px 0px 0 20px;">\n							<table border="0" cellpadding="0" cellspacing="0" width="100%">\n								<tr>\n									<td width="220" valign="top" style="padding-top: 20px;">\n										<table border="0" cellpadding="0" cellspacing="0" width="100%">\n											<tr>\n												\n													<td style="color:#fff;font-family:Helvetica,sans-serif;font-size: 14px;padding-bottom: 10px;">Get SOCIAL with us</td>\n												\n											</tr>\n											<tr>\n												<td>\n													<table border="0" cellpadding="0" cellspacing="0" width="150">\n														<tr>\n															<td>\n																<table>\n																	<tr>\n																 		<td width="35">\n																 			<a style="text-decoration:none;" href="https://www.facebook.com/JuniperNetworks/" target="_blank">\n																	 		<img src="http://apacjuniper.net/assets/frontend/img/fb.png" alt="Creating Email Magic" width="32" height="32" style="display: block;padding:0;margin:0;" />\n																	 		</a>\n																 		</td>\n																 		<td width="35">\n																 			 <a style="text-decoration:none;" href="https://twitter.com/JuniperNetworks/" target="_blank"><img src="http://apacjuniper.net/assets/frontend/img/tw.png" style="display:block; margin:0; padding:0; line-height:0;border: 0" width="32" height="32"></a>\n																 		</td>\n																 		<td width="35">\n																	 			 <a style="text-decoration:none;" href="https://www.youtube.com/user/JuniperNetworks" target="_blank"><img src="http://apacjuniper.net/assets/frontend/img/youtub.png" style="display:block; margin:0; padding:0; line-height:0;border: 0" width="32" height="32"></a>\n																	 		</td>\n																	 		<td width="35">\n																	 			<a style="text-decoration:none;" href="https://www.linkedin.com/company/juniper-networks" target="_blank"><img src="http://apacjuniper.net/assets/frontend/img/linkin.png" style="display:block; margin:0; padding:0; line-height:0;border: 0" width="32" height="32"></a>\n																	 		</td>\n																	 	</tr>\n																</table>\n															</td>\n														</tr>\n													</table>\n												</td>\n											</tr>\n										</table>\n									</td>\n									<td align="right" width="350">\n\n										<img src="{url}assets/edm/footer-tips.png" alt="Creating Email Magic" width="320" height="85" style="display: block;padding:0;margin:0;" />\n									</td>\n								</tr>\n							</table>\n						</td>\n					</tr>\n					<tr>						\n                        <td bgcolor="#00587b" style="padding:20px 0">\n                         	<table align="right" border="0" cellpadding="0" cellspacing="0" width="84">\n                         		<tr>\n                         			 <td align="right" style="color:#fff;font-family:Helvetica,sans-serif;font-weight: normal; font-size: 12px;padding-right: 20px;"><a href="http://www.juniper.net/us/en/" style="color:#ffffff;text-decoration: none;"\n                                  target="_blank">www.juniper.net</a>\n                                  </td>\n                         		</tr>\n                         	</table>\n                     	</td>\n					</tr>\n					<tr>\n						<td>&nbsp;</td>\n					</tr>\n				</table>\n			</td>\n		</tr>\n	</table>\n\n<!--analytics-->\n<!-- <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>\n<script src="http://tutsplus.github.io/github-analytics/ga-tracking.min.js"></script> -->\n\n</body>\n</html>');

-- --------------------------------------------------------

--
-- Table structure for table `fund_transaction`
--

CREATE TABLE IF NOT EXISTS `fund_transaction` (
  `fund_transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_account_id` int(11) NOT NULL,
  `fund_transaction_type` int(2) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `dtstamp` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fund_transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Super Administrator'),
(2, 'account manager', 'Account Manager'),
(3, 'property manager', 'Property Manager'),
(4, 'content manager', 'Content Manager'),
(5, 'user', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(55, '116.197.188.14', 'bhuston@mailinator.com', 1507783932),
(57, '116.197.188.14', 'bhutson', 1507790753),
(58, '124.66.158.146', 'organizer@organizer.com', 1507804032),
(59, '124.66.158.146', 'abletan@juniper.net', 1507806420),
(60, '124.66.158.146', 'abletan@juniper.net', 1507806434),
(61, '124.66.158.146', 'abletan@juniper.net', 1507806447),
(62, '116.86.2.248', 'organizer@organizer.com', 1507849830),
(65, '116.86.2.248', 'organizer@organizer.com', 1507852107);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `dtstamp` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `developer` varchar(100) NOT NULL,
  `property_size` decimal(15,2) NOT NULL,
  `property_price` decimal(15,2) NOT NULL,
  `property_description` text NOT NULL,
  `dtstamp` datetime NOT NULL,
  `status` int(2) DEFAULT '0',
  PRIMARY KEY (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `property_name`, `address`, `developer`, `property_size`, `property_price`, `property_description`, `dtstamp`, `status`) VALUES
(1, 'SAN JOSE', 'Quezon City, Philippines', 'SMDC', '1000.00', '2000000.00', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2018-04-12 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_transaction`
--

CREATE TABLE IF NOT EXISTS `property_transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE IF NOT EXISTS `shares` (
  `share_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_portfolio_id` int(11) NOT NULL,
  `rental` varchar(100) NOT NULL,
  `equity` varchar(100) NOT NULL,
  `dtstamp` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`share_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trust_account`
--

CREATE TABLE IF NOT EXISTS `trust_account` (
  `trust_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(15,2) NOT NULL,
  `dtstamp` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`trust_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userkey` varchar(100) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `race` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `billing_scan` varchar(100) NOT NULL,
  `id_scan` varchar(100) NOT NULL,
  `profile_photo` text NOT NULL,
  `is_complete` int(2) NOT NULL DEFAULT '0',
  `status` enum('registered','verified','disabled') NOT NULL DEFAULT 'registered',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userkey`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `dob`, `address`, `nationality`, `race`, `religion`, `billing_scan`, `id_scan`, `profile_photo`, `is_complete`, `status`) VALUES
(1, '', '127.0.0.1', 'admin@admin.com', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, '0000-00-00 00:00:00', '2018-04-19 18:43:51', 1, 'Admin', 'Administrator', '0', '0000-00-00', '', '', '', '', '', '', '', 0, 'registered'),
(2, '', '::1', 'dino@unicomi.com', '$2y$08$09a0WqM1e0pV3mXgPUtawOMcEJvUHIJ9TUnTm01ny0sy2adhDqmCW', NULL, 'dino@unicomi.com', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1, 'Dino', 'Test', NULL, '0000-00-00', '', '', '', '', '', '', '339e5772.jpg', 0, 'registered'),
(3, '', '::1', 'rhea@test.com', '$2y$08$6L939nb0PFB3LRs2oTB3H.oHITB2tzOMpwpedEIsWI5jndZfD4U2W', NULL, 'rhea@test.com', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1, 'Rhea D', 'Test', NULL, '0000-00-00', '', '', '', '', '', '', '8d966e6e.jpg', 0, 'registered'),
(4, '', '::1', 'dinouser@mail.com', '$2y$08$0TxBfAcdvBiqnWzJtImcfOeTxICx1KizpLMD1jGRzzxznpLvM7o92', NULL, 'dinouser@mail.com', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1, 'Dino', 'Carino', NULL, '0000-00-00', '', '', '', '', '', '', '26460861.jpg', 0, 'registered'),
(5, '', '::1', 'accountmanager@dino.com', '$2y$08$VA9IbUKH0I/Y9aXfzQVYGOfc0.FX2Ho2t9B.TuTwRS6z/kOCeEa9W', NULL, 'accountmanager@dino.com', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1, 'Account Manager', 'Dino', NULL, '0000-00-00', '', '', '', '', '', '', '1c831980.jpg', 0, 'registered'),
(6, '', '::1', 'contentmanager@mail.com', '$2y$08$zauyrTKM8i2bXQ/mPBTtZeTNYy9RDnhIlFHrAaqAZIBKGqtxEH0EG', NULL, 'contentmanager@mail.com', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1, 'Content', 'Manager', NULL, '0000-00-00', '', '', '', '', '', '', '21126283_1933068833600223_7861039776709738496_n.gif', 0, 'registered'),
(7, '', '::1', 'propertymanager@mail.com', '$2y$08$uVlkv34peXRkgq8TtOwhbOQGtxjx8GnrtbQS5Z2A4RrnMK7OpyrKm', NULL, 'propertymanager@mail.com', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1, 'Property', 'Manager', NULL, '0000-00-00', '', '', '', '', '', '', '69e83619.png', 0, 'registered');

-- --------------------------------------------------------

--
-- Table structure for table `users_bank_details`
--

CREATE TABLE IF NOT EXISTS `users_bank_details` (
  `bank_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `swift_code` varchar(25) NOT NULL,
  `account_no` varchar(15) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `dtstamp` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bank_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_bank_details`
--

INSERT INTO `users_bank_details` (`bank_account_id`, `user_id`, `bank_name`, `swift_code`, `account_no`, `account_name`, `dtstamp`, `status`) VALUES
(1, 4, 'AUB', '87465132', '87465132', 'DINO PAOLO S CARINO', '2018-04-12 00:00:00', 0),
(2, 4, 'BDO', '1234567', '1234567', 'DINO PAOLO S CARINO', '0000-00-00 00:00:00', 0),
(3, 4, 'BPI', '987654321', '987654321', 'RHEA CARINO', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 5),
(5, 5, 2),
(6, 6, 4),
(7, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_portfolio`
--

CREATE TABLE IF NOT EXISTS `users_portfolio` (
  `user_portfolio_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `unit_holdings` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `investment_value` int(11) NOT NULL,
  `property_value` int(11) NOT NULL,
  `psf` int(11) NOT NULL,
  `tax_amortisation` int(11) NOT NULL,
  `dtstamp` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_portfolio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
