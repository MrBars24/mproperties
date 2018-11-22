-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 06:10 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_micro`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL DEFAULT '',
  `printable_name` varchar(80) NOT NULL DEFAULT '',
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `priority` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `printable_name`, `iso3`, `numcode`, `priority`) VALUES
(1, 'AF', 'Afghanistan', 'AFG', 4, 0),
(2, 'AL', 'Albania', 'ALB', 8, 0),
(3, 'DZ', 'Algeria', 'DZA', 12, 0),
(4, 'AS', 'American Samoa', 'ASM', 16, 0),
(5, 'AD', 'Andorra', 'AND', 20, 0),
(6, 'AO', 'Angola', 'AGO', 24, 0),
(7, 'AI', 'Anguilla', 'AIA', 660, 0),
(8, 'AQ', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'Antigua and Barbuda', 'ATG', 28, 0),
(10, 'AR', 'Argentina', 'ARG', 32, 0),
(11, 'AM', 'Armenia', 'ARM', 51, 0),
(12, 'AW', 'Aruba', 'ABW', 533, 0),
(13, 'AU', 'Australia', 'AUS', 36, 0),
(14, 'AT', 'Austria', 'AUT', 40, 0),
(15, 'AZ', 'Azerbaijan', 'AZE', 31, 0),
(16, 'BS', 'Bahamas', 'BHS', 44, 0),
(17, 'BH', 'Bahrain', 'BHR', 48, 0),
(18, 'BD', 'Bangladesh', 'BGD', 50, 0),
(19, 'BB', 'Barbados', 'BRB', 52, 0),
(20, 'BY', 'Belarus', 'BLR', 112, 0),
(21, 'BE', 'Belgium', 'BEL', 56, 0),
(22, 'BZ', 'Belize', 'BLZ', 84, 0),
(23, 'BJ', 'Benin', 'BEN', 204, 0),
(24, 'BM', 'Bermuda', 'BMU', 60, 0),
(25, 'BT', 'Bhutan', 'BTN', 64, 0),
(26, 'BO', 'Bolivia', 'BOL', 68, 0),
(27, 'BA', 'Bosnia and Herzegovina', 'BIH', 70, 0),
(28, 'BW', 'Botswana', 'BWA', 72, 0),
(29, 'BV', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'Brazil', 'BRA', 76, 0),
(31, 'IO', 'British Indian Ocean Territory', NULL, NULL, 0),
(32, 'BN', 'Brunei Darussalam', 'BRN', 96, 0),
(33, 'BG', 'Bulgaria', 'BGR', 100, 0),
(34, 'BF', 'Burkina Faso', 'BFA', 854, 0),
(35, 'BI', 'Burundi', 'BDI', 108, 0),
(36, 'KH', 'Cambodia', 'KHM', 116, 0),
(37, 'CM', 'Cameroon', 'CMR', 120, 0),
(38, 'CA', 'Canada', 'CAN', 124, 0),
(39, 'CV', 'Cape Verde', 'CPV', 132, 0),
(40, 'KY', 'Cayman Islands', 'CYM', 136, 0),
(41, 'CF', 'Central African Republic', 'CAF', 140, 0),
(42, 'TD', 'Chad', 'TCD', 148, 0),
(43, 'CL', 'Chile', 'CHL', 152, 0),
(44, 'CN', 'China', 'CHN', 156, 0),
(45, 'CX', 'Christmas Island', NULL, NULL, 0),
(46, 'CC', 'Cocos (Keeling) Islands', NULL, NULL, 0),
(47, 'CO', 'Colombia', 'COL', 170, 0),
(48, 'KM', 'Comoros', 'COM', 174, 0),
(49, 'CG', 'Congo', 'COG', 178, 0),
(50, 'CD', 'Congo, the Democratic Republic of the', 'COD', 180, 0),
(51, 'CK', 'Cook Islands', 'COK', 184, 0),
(52, 'CR', 'Costa Rica', 'CRI', 188, 0),
(53, 'CI', 'Cote D\'Ivoire', 'CIV', 384, 0),
(54, 'HR', 'Croatia', 'HRV', 191, 0),
(55, 'CU', 'Cuba', 'CUB', 192, 0),
(56, 'CY', 'Cyprus', 'CYP', 196, 0),
(57, 'CZ', 'Czech Republic', 'CZE', 203, 0),
(58, 'DK', 'Denmark', 'DNK', 208, 0),
(59, 'DJ', 'Djibouti', 'DJI', 262, 0),
(60, 'DM', 'Dominica', 'DMA', 212, 0),
(61, 'DO', 'Dominican Republic', 'DOM', 214, 0),
(62, 'EC', 'Ecuador', 'ECU', 218, 0),
(63, 'EG', 'Egypt', 'EGY', 818, 0),
(64, 'SV', 'El Salvador', 'SLV', 222, 0),
(65, 'GQ', 'Equatorial Guinea', 'GNQ', 226, 0),
(66, 'ER', 'Eritrea', 'ERI', 232, 0),
(67, 'EE', 'Estonia', 'EST', 233, 0),
(68, 'ET', 'Ethiopia', 'ETH', 231, 0),
(69, 'FK', 'Falkland Islands (Malvinas)', 'FLK', 238, 0),
(70, 'FO', 'Faroe Islands', 'FRO', 234, 0),
(71, 'FJ', 'Fiji', 'FJI', 242, 0),
(72, 'FI', 'Finland', 'FIN', 246, 0),
(73, 'FR', 'France', 'FRA', 250, 0),
(74, 'GF', 'French Guiana', 'GUF', 254, 0),
(75, 'PF', 'French Polynesia', 'PYF', 258, 0),
(76, 'TF', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'Gabon', 'GAB', 266, 0),
(78, 'GM', 'Gambia', 'GMB', 270, 0),
(79, 'GE', 'Georgia', 'GEO', 268, 0),
(80, 'DE', 'Germany', 'DEU', 276, 0),
(81, 'GH', 'Ghana', 'GHA', 288, 0),
(82, 'GI', 'Gibraltar', 'GIB', 292, 0),
(83, 'GR', 'Greece', 'GRC', 300, 0),
(84, 'GL', 'Greenland', 'GRL', 304, 0),
(85, 'GD', 'Grenada', 'GRD', 308, 0),
(86, 'GP', 'Guadeloupe', 'GLP', 312, 0),
(87, 'GU', 'Guam', 'GUM', 316, 0),
(88, 'GT', 'Guatemala', 'GTM', 320, 0),
(89, 'GN', 'Guinea', 'GIN', 324, 0),
(90, 'GW', 'Guinea-Bissau', 'GNB', 624, 0),
(91, 'GY', 'Guyana', 'GUY', 328, 0),
(92, 'HT', 'Haiti', 'HTI', 332, 0),
(93, 'HM', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'Holy See (Vatican City State)', 'VAT', 336, 0),
(95, 'HN', 'Honduras', 'HND', 340, 0),
(96, 'HK', 'Hong Kong', 'HKG', 344, 0),
(97, 'HU', 'Hungary', 'HUN', 348, 0),
(98, 'IS', 'Iceland', 'ISL', 352, 0),
(99, 'IN', 'India', 'IND', 356, 0),
(100, 'ID', 'Indonesia', 'IDN', 360, 0),
(101, 'IR', 'Iran, Islamic Republic of', 'IRN', 364, 0),
(102, 'IQ', 'Iraq', 'IRQ', 368, 0),
(103, 'IE', 'Ireland', 'IRL', 372, 0),
(104, 'IL', 'Israel', 'ISR', 376, 0),
(105, 'IT', 'Italy', 'ITA', 380, 0),
(106, 'JM', 'Jamaica', 'JAM', 388, 0),
(107, 'JP', 'Japan', 'JPN', 392, 0),
(108, 'JO', 'Jordan', 'JOR', 400, 0),
(109, 'KZ', 'Kazakhstan', 'KAZ', 398, 0),
(110, 'KE', 'Kenya', 'KEN', 404, 0),
(111, 'KI', 'Kiribati', 'KIR', 296, 0),
(112, 'KP', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 0),
(113, 'KR', 'Korea, Republic of', 'KOR', 410, 0),
(114, 'KW', 'Kuwait', 'KWT', 414, 0),
(115, 'KG', 'Kyrgyzstan', 'KGZ', 417, 0),
(116, 'LA', 'Lao People\'s Democratic Republic', 'LAO', 418, 0),
(117, 'LV', 'Latvia', 'LVA', 428, 0),
(118, 'LB', 'Lebanon', 'LBN', 422, 0),
(119, 'LS', 'Lesotho', 'LSO', 426, 0),
(120, 'LR', 'Liberia', 'LBR', 430, 0),
(121, 'LY', 'Libyan Arab Jamahiriya', 'LBY', 434, 0),
(122, 'LI', 'Liechtenstein', 'LIE', 438, 0),
(123, 'LT', 'Lithuania', 'LTU', 440, 0),
(124, 'LU', 'Luxembourg', 'LUX', 442, 0),
(125, 'MO', 'Macao', 'MAC', 446, 0),
(126, 'MK', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 0),
(127, 'MG', 'Madagascar', 'MDG', 450, 0),
(128, 'MW', 'Malawi', 'MWI', 454, 0),
(129, 'MY', 'Malaysia', 'MYS', 458, 0),
(130, 'MV', 'Maldives', 'MDV', 462, 0),
(131, 'ML', 'Mali', 'MLI', 466, 0),
(132, 'MT', 'Malta', 'MLT', 470, 0),
(133, 'MH', 'Marshall Islands', 'MHL', 584, 0),
(134, 'MQ', 'Martinique', 'MTQ', 474, 0),
(135, 'MR', 'Mauritania', 'MRT', 478, 0),
(136, 'MU', 'Mauritius', 'MUS', 480, 0),
(137, 'YT', 'Mayotte', NULL, NULL, 0),
(138, 'MX', 'Mexico', 'MEX', 484, 0),
(139, 'FM', 'Micronesia, Federated States of', 'FSM', 583, 0),
(140, 'MD', 'Moldova, Republic of', 'MDA', 498, 0),
(141, 'MC', 'Monaco', 'MCO', 492, 0),
(142, 'MN', 'Mongolia', 'MNG', 496, 0),
(143, 'MS', 'Montserrat', 'MSR', 500, 0),
(144, 'MA', 'Morocco', 'MAR', 504, 0),
(145, 'MZ', 'Mozambique', 'MOZ', 508, 0),
(146, 'MM', 'Myanmar', 'MMR', 104, 0),
(147, 'NA', 'Namibia', 'NAM', 516, 0),
(148, 'NR', 'Nauru', 'NRU', 520, 0),
(149, 'NP', 'Nepal', 'NPL', 524, 0),
(150, 'NL', 'Netherlands', 'NLD', 528, 0),
(151, 'AN', 'Netherlands Antilles', 'ANT', 530, 0),
(152, 'NC', 'New Caledonia', 'NCL', 540, 0),
(153, 'NZ', 'New Zealand', 'NZL', 554, 0),
(154, 'NI', 'Nicaragua', 'NIC', 558, 0),
(155, 'NE', 'Niger', 'NER', 562, 0),
(156, 'NG', 'Nigeria', 'NGA', 566, 0),
(157, 'NU', 'Niue', 'NIU', 570, 0),
(158, 'NF', 'Norfolk Island', 'NFK', 574, 0),
(159, 'MP', 'Northern Mariana Islands', 'MNP', 580, 0),
(160, 'NO', 'Norway', 'NOR', 578, 0),
(161, 'OM', 'Oman', 'OMN', 512, 0),
(162, 'PK', 'Pakistan', 'PAK', 586, 0),
(163, 'PW', 'Palau', 'PLW', 585, 0),
(164, 'PS', 'Palestinian Territory, Occupied', NULL, NULL, 0),
(165, 'PA', 'Panama', 'PAN', 591, 0),
(166, 'PG', 'Papua New Guinea', 'PNG', 598, 0),
(167, 'PY', 'Paraguay', 'PRY', 600, 0),
(168, 'PE', 'Peru', 'PER', 604, 0),
(169, 'PH', 'Philippines', 'PHL', 608, 0),
(170, 'PN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'Poland', 'POL', 616, 0),
(172, 'PT', 'Portugal', 'PRT', 620, 0),
(173, 'PR', 'Puerto Rico', 'PRI', 630, 0),
(174, 'QA', 'Qatar', 'QAT', 634, 0),
(175, 'RE', 'Reunion', 'REU', 638, 0),
(176, 'RO', 'Romania', 'ROM', 642, 0),
(177, 'RU', 'Russian Federation', 'RUS', 643, 0),
(178, 'RW', 'Rwanda', 'RWA', 646, 0),
(179, 'SH', 'Saint Helena', 'SHN', 654, 0),
(180, 'KN', 'Saint Kitts and Nevis', 'KNA', 659, 0),
(181, 'LC', 'Saint Lucia', 'LCA', 662, 0),
(182, 'PM', 'Saint Pierre and Miquelon', 'SPM', 666, 0),
(183, 'VC', 'Saint Vincent and the Grenadines', 'VCT', 670, 0),
(184, 'WS', 'Samoa', 'WSM', 882, 0),
(185, 'SM', 'San Marino', 'SMR', 674, 0),
(186, 'ST', 'Sao Tome and Principe', 'STP', 678, 0),
(187, 'SA', 'Saudi Arabia', 'SAU', 682, 0),
(188, 'SN', 'Senegal', 'SEN', 686, 0),
(189, 'CS', 'Serbia and Montenegro', NULL, NULL, 0),
(190, 'SC', 'Seychelles', 'SYC', 690, 0),
(191, 'SL', 'Sierra Leone', 'SLE', 694, 0),
(192, 'SG', 'Singapore', 'SGP', 702, 1),
(193, 'SK', 'Slovakia', 'SVK', 703, 0),
(194, 'SI', 'Slovenia', 'SVN', 705, 0),
(195, 'SB', 'Solomon Islands', 'SLB', 90, 0),
(196, 'SO', 'Somalia', 'SOM', 706, 0),
(197, 'ZA', 'South Africa', 'ZAF', 710, 0),
(198, 'GS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'Spain', 'ESP', 724, 0),
(200, 'LK', 'Sri Lanka', 'LKA', 144, 0),
(201, 'SD', 'Sudan', 'SDN', 736, 0),
(202, 'SR', 'Suriname', 'SUR', 740, 0),
(203, 'SJ', 'Svalbard and Jan Mayen', 'SJM', 744, 0),
(204, 'SZ', 'Swaziland', 'SWZ', 748, 0),
(205, 'SE', 'Sweden', 'SWE', 752, 0),
(206, 'CH', 'Switzerland', 'CHE', 756, 0),
(207, 'SY', 'Syrian Arab Republic', 'SYR', 760, 0),
(208, 'TW', 'Taiwan, Province of China', 'TWN', 158, 0),
(209, 'TJ', 'Tajikistan', 'TJK', 762, 0),
(210, 'TZ', 'Tanzania, United Republic of', 'TZA', 834, 0),
(211, 'TH', 'Thailand', 'THA', 764, 0),
(212, 'TL', 'Timor-Leste', NULL, NULL, 0),
(213, 'TG', 'Togo', 'TGO', 768, 0),
(214, 'TK', 'Tokelau', 'TKL', 772, 0),
(215, 'TO', 'Tonga', 'TON', 776, 0),
(216, 'TT', 'Trinidad and Tobago', 'TTO', 780, 0),
(217, 'TN', 'Tunisia', 'TUN', 788, 0),
(218, 'TR', 'Turkey', 'TUR', 792, 0),
(219, 'TM', 'Turkmenistan', 'TKM', 795, 0),
(220, 'TC', 'Turks and Caicos Islands', 'TCA', 796, 0),
(221, 'TV', 'Tuvalu', 'TUV', 798, 0),
(222, 'UG', 'Uganda', 'UGA', 800, 0),
(223, 'UA', 'Ukraine', 'UKR', 804, 0),
(224, 'AE', 'United Arab Emirates', 'ARE', 784, 0),
(225, 'GB', 'United Kingdom', 'GBR', 826, 0),
(226, 'US', 'United States', 'USA', 840, 0),
(227, 'UM', 'United States Minor Outlying Islands', NULL, NULL, 0),
(228, 'UY', 'Uruguay', 'URY', 858, 0),
(229, 'UZ', 'Uzbekistan', 'UZB', 860, 0),
(230, 'VU', 'Vanuatu', 'VUT', 548, 0),
(231, 'VE', 'Venezuela', 'VEN', 862, 0),
(232, 'VN', 'Viet Nam', 'VNM', 704, 0),
(233, 'VG', 'Virgin Islands, British', 'VGB', 92, 0),
(234, 'VI', 'Virgin Islands, U.s.', 'VIR', 850, 0),
(235, 'WF', 'Wallis and Futuna', 'WLF', 876, 0),
(236, 'EH', 'Western Sahara', 'ESH', 732, 0),
(237, 'YE', 'Yemen', 'YEM', 887, 0),
(238, 'ZM', 'Zambia', 'ZMB', 894, 0),
(239, 'ZW', 'Zimbabwe', 'ZWE', 716, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`iso`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
