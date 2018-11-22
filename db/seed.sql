-- ;

SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE fund_transactions;
TRUNCATE properties;
TRUNCATE property_investment;
TRUNCATE trust_accounts;

INSERT INTO `properties` (`property_id`, `agent_id`, `property_name`, `address`, `postalcode`, `district_id`, `developer`, `property_size`, `property_price`, `rental`, `property_description`, `sqft`, `bedrooms`, `baths`, `floor_level`, `furnishing`, `tenure`, `top`, `years`, `images`, `tags`, `lng`, `lat`, `dtstamp`, `status`, `strata_fee`, `listed_at`, `listing_id`, `no_of_units`, `is_fulfilled`, `is_completed`, `is_featured`, `fulfilled_at`, `completed_at`, `last_valuation`, `last_distribution`, `added_at`, `updated_at`) VALUES
(1, NULL, 'The Snail @ Marina Bay', 'Marina Boulevard', 0, 1, 'City Development Ltd', '2000.00', '1300000.00', '3.00', 'The Sail @ Marina Bay is a luxury mixed apartment located at the prestigious Marina Boulevard in District 1. It is an architectural marvel which is touted to be the country\'s tallest residential building. It was built to set a very high standard for an integrated lifestyle for its residents. The lavish facilities and the strategical location of The Sail @ Marina Bay also provide a vast number of amenities. Due to the high demand for the area, this is a profitable investment.', 650000, 2, 1, '70', 'Partial Furnished', '3', 2018, 99, 'null', 'Income,Growth', '103.85412090', '1.28080240', '0000-00-00 00:00:00', 0, '1.00', '2018-10-01 00:34:41', 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2018-10-25 00:36:02', '2018-10-25 00:36:02'),
(2, NULL, 'Urban Suite', '1 Hullet Rd', 229157, 9, 'Augite Pte. Ltd.', '1600.00', '500000.00', '0.00', 'Urban Suites is a freehold condominium development located at 1 Hullet Road, Singapore 229157, in District 09, minutes walk to Orchard MRT Station. To be completed in 2013, it stands 20 storeys tall and comprises of 165 units. Urban Suites is close to Mount Elizabeth Hospital and Far East Plaza.\r\n\r\nCondo Facilities at Urban Suites\r\n\r\nFacilities at Urban Suites include swimming pool, gymnasium, basement car park, and 24-hours security.\r\n\r\nCondo Amenities near Urban Suites\r\n\r\nUrban Suites is right in the heart of Orchard Road shopping belt. It is within walking distance to the biggest shopping malls like Takashimaya, ION Orchard, Wisma Atria and more. Supermarkets like Cold Storage can be found at Centerpoint shopping mall.\r\n\r\nUrban Suites is also close to many international and reputable local schools like Overseas Family School, ISS International School, Chatsworth International School and Raffles Girls\' Secondary School.\r\n\r\nFor vehicle owners, driving from Urban Suites to the business hub takes 5 - 10 minutes, via Clemenceau Avenue and Havelock Road.', 500000, 3, 4, 'High Floor ', 'Fully Furnished ', '99-year Leasehold', 2013, 6, 'null', 'Income,Growth', '103.83845540', '1.30340240', '0000-00-00 00:00:00', 0, '100.00', '2018-10-02 00:36:38', 2, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2018-10-25 00:37:36', '2018-10-25 00:37:36'),
(3, NULL, 'Goodwood Residence', 'Bukit Timah Road', 0, 21, 'HDB', '1000.00', '1000000.00', '0.00', 'This project comprises 210 units of luxurious apartment living on Bukit Timah Road facing the lush greenery of Goodwood Hill.\r\n\r\nTwo 12-storey interlocked L-shaped buildings enclose a series of three green squares. The first square incorporates a long, tree-lined driveway evocative of large landed estates and provides a buffer from Bukit Timah Road. The second square is an entrance courtyard with large forest trees. The third square is a vast tree-planted lawn opening up directly to Goodwood Hill itself, affording all apartment units excellent views of the greenery. A central walkway encloses the central lawn like a cloister and connects the various buildings.', 1000000, 3, 2, 'High Floor ', 'Partial Furnished', '2017', 2007, 99, 'null', 'Income', '103.79883680', '1.33040640', '0000-00-00 00:00:00', 0, '1.00', '2018-10-04 00:38:19', 3, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '2018-10-25 00:39:15', '2018-10-25 00:39:15'),
(4, NULL, 'Marina One Residence', '21 Marina Way', 0, 1, 'M+S Pte Ltd', '885.00', '1000000.00', '0.00', 'Marina One Residences is a 99-year award-winning leasehold condominium located at 21, 23 Marina Way, Singapore and is developed by MS Residential 1 Pte Ltd, MS Residential 2 Pte Ltd, and MS Commercial Pte Ltd. It consists of 1,024 units of a mixture of 1-4 bedrooms and penthouses. \r\n\r\nThe “City in a Garden” is a Marina Bay residential development designed by a famous Supergreen architecture, Christoph Ingenhoven.', 1130, 2, 1, '60', 'Fully Furnished ', '99', 2014, 4, 'null', '', '103.85370680', '1.27688930', '0000-00-00 00:00:00', 0, '100.00', '2018-10-05 00:39:55', 4, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '2018-10-25 00:40:40', '2018-10-25 00:40:40'),
(5, NULL, 'AMK Hub', 'Ang Mo Kio', 0, 6, 'CapitaLand', '1000.00', '700000.00', '0.00', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 700000, 3, 2, '23', '32', '0', 1, 0, 'null', 'Income,Growth', '103.84543420', '1.36911490', '0000-00-00 00:00:00', 0, '400.00', '2018-10-07 00:40:47', 5, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '2018-10-25 00:41:44', '2018-10-25 00:41:44'),
(6, NULL, 'River Place Condominium', '60 Havelock Rd', 169658, 9, 'Far East Organisation', '768.00', '1200000.00', '4.27', 'Unit is currently tenanted tlll X month X year. Enjoy the ease of convenience with just 5 minutes drive to Orchard & Cityhall \r\n\r\n', 1563, 1, 1, '08', 'Renovated', '99', 2000, 2, 'null', 'Income', '103.84081870', '1.28972970', '0000-00-00 00:00:00', 0, '330.00', '2018-10-10 07:17:17', 6, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '2018-10-25 07:18:39', '2018-10-25 07:25:56'),
(8, NULL, 'Las Casas', 'One Raffles Place Tower 2', 48616, 14, 'M+S Pte Ltd', '232332.00', '1000000.00', '4.00', 'Urban Suites is a freehold condominium development located at 1 Hullet Road, Singapore 229157, in District 09, minutes walk to Orchard MRT Station. To be completed in 2013, it stands 20 storeys tall and comprises of 165 units. Urban Suites is close to Mount Elizabeth Hospital and Far East Plaza. Condo Facilities at Urban Suites Facilities at Urban Suites include swimming pool, gymnasium, basement car park, and 24-hours security. Condo Amenities near Urban Suites Urban Suites is right in the heart of Orchard Road shopping belt. It is within walking distance to the biggest shopping malls like Takashimaya, ION Orchard, Wisma Atria and more. Supermarkets like Cold Storage can be found at Centerpoint shopping mall. Urban Suites is also close to many international and reputable local schools like Overseas Family School, ISS International School, Chatsworth International School and Raffles Girls\' Secondary School. For vehicle owners, driving from Urban Suites to the business hub takes 5 - 10 minutes, via Clemenceau Avenue and Havelock Road.', 4310, 3, 1, '02', '32', '99', 2007, 81, 'null', '', '103.85067190', '1.28469430', '0000-00-00 00:00:00', 0, '400.00', '2018-10-19 07:21:33', 7, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2018-10-25 07:24:56', '2018-10-25 07:25:17');

INSERT INTO `trust_accounts` (`trust_id`, `property_id`, `property_value`, `units_issued`, `price_per_unit`, `ammortised_tax_months`, `cash_buffer`, `cash_buffer_percentage`, `platform_fee_percentage`, `nav`, `initial_nav`, `tax_percentage_use`, `tax`, `setup_cost`, `setup_cost_percentage`, `cost_amortization`, `cost_amortization_per_month`, `property_value_pct`, `bsd_pct`, `absd_pct`, `cash_pct`, `setup_cost_pct`, `created_at`, `updated_at`) VALUES
(1, 1, 1300000, 800, 2142.0000, 0, 26000, 2, 0, 1713600, 1700600, NULL, 361600, 26000, 2, 374600, 2081.11, 0.764436, 0.0215218, 0.191109, 0.0152887, 0.00764436, '2018-10-25 00:36:02', '2018-10-25 00:36:02'),
(2, 2, 500000, 100, 6654.0000, 0, 10000, 2, 0, 665400, 660400, NULL, 145400, 10000, 2, 150400, 835.556, 0.757117, 0.0308904, 0.189279, 0.0151423, 0.00757117, '2018-10-25 00:37:36', '2018-10-25 00:37:36'),
(3, 3, 1000000, 262, 4979.3893, 0, 20000, 2, 0, 1304600, 1304600, NULL, 274600, 10000, 1, 284600, 1581.11, 0.766518, 0.0188564, 0.19163, 0.0153304, 0.00766518, '2018-10-25 00:39:15', '2018-10-25 00:39:15'),
(4, 4, 1000000, 260, 5017.6923, 0, 20000, 2, 0, 1304600, 1304600, NULL, 274600, 10000, 1, 284600, 1581.11, 0.766518, 0.0188564, 0.19163, 0.0153304, 0.00766518, '2018-10-25 00:40:40', '2018-10-25 00:40:40'),
(5, 5, 700000, 100, 9975.3000, 0, 28000, 4, 0, 997530, 920600, NULL, 199600, 69930, 9.99, 206600, 1147.78, 0.760374, 0.0267217, 0.190093, 0.0152075, 0.00760374, '2018-10-25 00:41:44', '2018-10-25 00:41:44'),
(6, 6, '1200000.0000', 300, '5294.0400', '0.0000', '24000.0000', '2.0000', '0.0000', '1588212.0000', '1568600.0000', NULL, '332600.0000', '31612.0000', '2.0000', '344600.0000', '1914.4444', '0.7650', '0.0208', '0.1913', '0.0153', '0.0077', '2018-10-25 07:18:39', '2018-10-25 07:18:39'),
(8, 8, '1000000.0000', 100, '13046.0000', '0.0000', '20000.0000', '2.0000', '0.0000', '1304600.0000', '1304600.0000', NULL, '274600.0000', '10000.0000', '1.0000', '284600.0000', '1581.1111', '0.7665', '0.0189', '0.1916', '0.0153', '0.0077', '2018-10-25 07:24:56', '2018-10-25 07:25:23');


INSERT INTO `users` (`id`, `userkey`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `first_time_deposit`, `last_login`, `active`, `first_name`, `last_name`, `identification_number`, `phone`, `postal_code`, `dob`, `address`, `unit_number`, `nationality`, `race`, `religion`, `billing_scan`, `id_scan`, `id_scan_back`, `profile_photo`, `agency`, `is_complete`, `for_approval`, `reason_for_rejection`, `kyc_status`, `is_password_updated`, `newsletter`, `status`, `country`, `us_resident`, `residence_country`, `unit_no`, `employment_status`, `occupation`, `annual_income`, `is_accredited_investor`, `is_holding_public_office`, `account_fund_source`, `approve_by`, `approve_at`) VALUES
(99, NULL, '::1', 'johndoe@test.com', '$2y$08$w84JYGMC37qsnLNERK3KAeiuyDRdVwKDjOTdum5L4BQ.mpNlFqko.', NULL, 'johndoe@test.com', '', NULL, NULL, NULL, '2018-10-03 02:25:24', 1, '2018-10-03 14:46:33', 1, 'John', 'Doe', NULL, '123123123', '550502', '0000-00-00', '12 - A FIlt', '52', 'singaporean', NULL, NULL, 'afa7c0562.png', 'afa7c056.png', 'afa7c0561.png', NULL, NULL, 2, 0, '', 1, 0, 0, 'verified', 'Singapore', 0, 'Singapore', 52, 'employee', 'traders', 2, 1, 1, 'Employment', 1, '2018-10-03 06:40:19'),
(100, NULL, '::1', 'janedoe@test.com', '$2y$08$5KM75J9Z9bLJ46rgsvOohOUoSb8vs9eeJN9t13i/f3YhtfA.i5WXm', NULL, 'janedoe@test.com', '', NULL, NULL, NULL, '2018-10-03 02:33:52', 1, '2018-10-03 15:11:40', 1, 'Jane', 'Doe', NULL, '345345345', '550502', '1991-10-26', '14', '24', 'singaporean', NULL, NULL, '387d54342.png', '387d5434.png', '387d54341.png', NULL, NULL, 2, 0, '', 1, 0, 0, 'verified', 'Singapore', 0, 'Singapore', 24, 'employee', 'it staff', 2, 1, 1, 'Employment', 1, '2018-10-03 06:40:11'),
(101, NULL, '::1', 'joedoe@test.com', '$2y$08$X/hwaMb8tyFdQtBIZ8sP3OY8sOqc6i5WfbM3JskT9vA93YeCGMq4i', NULL, 'joedoe@test.com', '', NULL, NULL, NULL, '2018-10-03 02:37:19', 0, '2018-10-03 15:15:58', 1, 'Joe', 'Doe', NULL, '789789789', '550502', '1989-10-17', '656', '564', 'singaporean', NULL, NULL, 'fb2e17e52.png', 'fb2e17e5.png', 'fb2e17e51.png', NULL, NULL, 2, 0, '', 1, 0, 0, 'verified', 'Singapore', 0, 'Singapore', 564, 'employee', 'traders', 5, 1, 1, 'Inheritance', 1, '2018-10-03 06:40:03'),
(102, NULL, '::1', 'geralddoe@test.com', '$2y$08$X4I.BIEwwX30QGWQWLnBnudvbHJOCpnQHz31nqms0sHs.wpn6vn0m', NULL, 'geralddoe@test.com', '', NULL, NULL, NULL, '2018-10-30 11:59:32', 1, '2018-10-30 12:01:16', 1, 'Gerald', 'Doe', NULL, '09090909', '2200', '1997-10-25', '12 - A FIlt', '123', 'Philippines', NULL, NULL, '68e05e7d2.jpg', '68e05e7d.jpg', '68e05e7d1.jpg', NULL, NULL, 1, 0, '', 1, 0, 0, 'verified', 'Philippines', 0, 'Philippines', 123, 'employee', 'account_finance', 30, 1, 1, 'Employment', 17, '2018-10-30 04:04:42')
ON DUPLICATE KEY UPDATE
    `id` = VALUES(id),
    `userkey` = VALUES(userkey),
    `ip_address` = VALUES(ip_address),
    `username` = VALUES(username),
    `password` = VALUES(password),
    `salt` = VALUES(salt),
    `email` = VALUES(email),
    `activation_code` = VALUES(activation_code),
    `forgotten_password_code` = VALUES(forgotten_password_code),
    `forgotten_password_time` = VALUES(forgotten_password_time),
    `remember_code` = VALUES(remember_code),
    `created_on` = VALUES(created_on),
    `first_time_deposit` = VALUES(first_time_deposit),
    `last_login` = VALUES(last_login),
    `active` = VALUES(active),
    `first_name` = VALUES(first_name),
    `last_name` = VALUES(last_name),
    `identification_number` = VALUES(identification_number),
    `phone` = VALUES(phone),
     `postal_code` = VALUES(postal_code),
     `dob` = VALUES(dob),
     `address` = VALUES(address),
     `unit_number` = VALUES(unit_number),
     `nationality` = VALUES(nationality),
     `race` = VALUES(race),
     `religion` = VALUES(religion),
     `billing_scan` = VALUES(billing_scan),
     `id_scan` = VALUES(id_scan),
     `id_scan_back` = VALUES(id_scan_back),
     `profile_photo` = VALUES(profile_photo),
     `agency` = VALUES(agency),
     `is_complete` = VALUES(is_complete),
     `for_approval` = VALUES(for_approval),
     `reason_for_rejection` = VALUES(reason_for_rejection),
     `kyc_status` = VALUES(kyc_status),
     `is_password_updated` = VALUES(is_password_updated),
      `newsletter` = VALUES(newsletter),
      `status` = VALUES(status),
      `country` = VALUES(country),
      `us_resident` = VALUES(us_resident),
      `residence_country` = VALUES(residence_country),
      `unit_no` = VALUES(unit_no),
      `employment_status` = VALUES(employment_status),
      `occupation` = VALUES(occupation),
      `annual_income` = VALUES(annual_income),
      `is_accredited_investor` = VALUES(is_accredited_investor),
      `is_holding_public_office` = VALUES(is_holding_public_office),
      `account_fund_source` = VALUES(account_fund_source),
      `approve_by` = VALUES(approve_by),
      `approve_at` = VALUES(approve_at);


INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(98, 99, 5),
(99, 100, 5),
(100, 101, 5),
(101, 102, 5)
ON DUPLICATE KEY UPDATE
    `id` = VALUES(id),
    `user_id` = VALUES(user_id),
    `group_id` = VALUES(group_id);

INSERT INTO `fund_transactions` (`id`, `user_id`, `bank_account_id`, `transaction_type`, `amount`, `absolute_amount`, `ref_number`, `status`, `approved_at`, `created_at`, `updated_at`, `table`, `table_id`, `opened`, `opened_at`, `expired_at`) VALUES
(1, 101, NULL, 1, '2000000.00', '2000000.00', 'BQFZVQUHCB7OO2', 1, '2018-10-03 06:48:03', '2018-10-03 06:42:41', '2018-10-03 06:48:03', NULL, NULL, 1, '2018-10-03 06:47:29', NULL),
(2, 100, NULL, 1, '2000000.00', '2000000.00', '8VC26XCWP73O2J', 1, '2018-10-03 06:47:58', '2018-10-03 06:43:22', '2018-10-03 06:47:58', NULL, NULL, 1, '2018-10-03 06:47:29', NULL),
(3, 99, NULL, 1, '2000000.00', '2000000.00', 'RNZB2S1G3W6QX8', 1, '2018-10-03 06:47:52', '2018-10-03 06:46:53', '2018-10-03 06:47:52', NULL, NULL, 1, '2018-10-03 06:47:29', NULL),
(4, 103, NULL, 1, '5000000.0000', '5000000.0000', 'D0BY8MNDIWV7K8', 1, '2018-10-30 04:05:37', '2018-10-30 04:05:17', '2018-10-30 04:05:37', NULL, NULL, 0, NULL, NULL);