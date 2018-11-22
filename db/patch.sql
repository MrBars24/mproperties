/* 11-09-2018 */
ALTER TABLE `trust_cash_accounts` ADD `meta` TEXT NULL DEFAULT NULL AFTER `table`;

/* 11-08-2018 */
ALTER TABLE `trust_cash_accounts` ADD `property_id` INT(11) UNSIGNED NULL DEFAULT NULL AFTER `id`;
ALTER TABLE `trust_cash_accounts` ADD `table` VARCHAR(255) DEFAULT NULL AFTER `description`;
ALTER TABLE `property_images` ADD `link` TEXT NULL DEFAULT NULL AFTER `is_360`;

/* 11-07-2018 */
ALTER TABLE `rental_collections` ADD `rental_pct` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `rental_collections` ADD `is_original` INT(3) DEFAULT 0;

ALTER TABLE `trust_accounts` CHANGE `property_value_pct` `property_value_pct` DECIMAL(20,9) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `bsd_pct` `bsd_pct` DECIMAL(20,9) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `absd_pct` `absd_pct` DECIMAL(20,9) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `cash_pct` `cash_pct` DECIMAL(20,9) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `setup_cost_pct` `setup_cost_pct` DECIMAL(20,9) DEFAULT 0;

/* 11-05-2018 */
ALTER TABLE `properties` CHANGE `listing_id` `listing_id` VARCHAR(200) NULL DEFAULT NULL;


/* 10-31-2018 */
ALTER TABLE  `property_valuation` ADD `platform_fee` DECIMAL(15,4) DEFAULT 0 AFTER `price_per_unit`;

/* 10-25-2018 */
ALTER TABLE  `property_investment` CHANGE `units_invested` `units_invested` DECIMAL(15,4) DEFAULT 0;

/* 10-25-2018 */
ALTER TABLE  `distribution` ADD `status` INT(3) DEFAULT 0 AFTER `return_percentage`;
ALTER TABLE  `distribution` ADD `distributed_unit` DECIMAL(15, 4) DEFAULT 0 AFTER `return_percentage`;


/* 10-24-2018 */
DELIMITER $$
 
CREATE FUNCTION first_day(dt DATETIME) RETURNS date
BEGIN
    RETURN DATE_ADD(DATE_ADD(LAST_DAY(dt),
                INTERVAL 1 DAY),
            INTERVAL - 1 MONTH);
END


-- CHANGE DATA TYPES
ALTER TABLE `distribution` CHANGE `amount` `amount` DECIMAL(15,4) DEFAULT 0; 
ALTER TABLE `distribution` CHANGE `return_percentage` `return_percentage` DECIMAL(15,4) DEFAULT 0; 

ALTER TABLE `fund_transactions` CHANGE `amount` `amount` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `fund_transactions` CHANGE `absolute_amount` `absolute_amount` DECIMAL(15,4) DEFAULT 0;

ALTER TABLE `investment_log` CHANGE `invested_amount` `invested_amount` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `investment_log` CHANGE `units_invested` `units_invested` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `investment_log` CHANGE `percent_invested` `percent_invested` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `investment_log` CHANGE `property_value` `property_value` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `investment_log` CHANGE `bsd` `bsd` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `investment_log` CHANGE `absd` `absd` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `investment_log` CHANGE `cash` `cash` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `investment_log` CHANGE `setup_cost` `setup_cost` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `investment_log` CHANGE `return_pct` `return_pct` DECIMAL(15,4) DEFAULT 0;

ALTER TABLE `property_investment` CHANGE `invested_amount` `invested_amount` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_investment` CHANGE `percent_invested` `percent_invested` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_investment` CHANGE `property_value` `property_value` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_investment` CHANGE `bsd` `bsd` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_investment` CHANGE `absd` `absd` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_investment` CHANGE `cash` `cash` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_investment` CHANGE `setup_cost` `setup_cost` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_investment` CHANGE `return_pct` `return_pct` DECIMAL(15,4) DEFAULT 0;

ALTER TABLE `property_valuation` CHANGE `property_value` `property_value` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_valuation` CHANGE `property_value_tax` `property_value_tax` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_valuation` CHANGE `property_value_cash` `property_value_cash` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_valuation` CHANGE `nav` `nav` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_valuation` CHANGE `total_units` `total_units` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_valuation` CHANGE `price_per_unit` `price_per_unit` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_valuation` CHANGE `return` `return` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `property_valuation` CHANGE `setup_cost` `setup_cost` DECIMAL(15,4) DEFAULT 0;

ALTER TABLE `trust_accounts` CHANGE `property_value` `property_value` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `price_per_unit` `price_per_unit` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `ammortised_tax_months` `ammortised_tax_months` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `cash_buffer` `cash_buffer` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `cash_buffer_percentage` `cash_buffer_percentage` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `platform_fee_percentage` `platform_fee_percentage` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `nav` `nav` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `initial_nav` `initial_nav` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `tax_percentage_use` `tax_percentage_use` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `tax` `tax` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `setup_cost` `setup_cost` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `setup_cost_percentage` `setup_cost_percentage` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `cost_amortization` `cost_amortization` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `cost_amortization_per_month` `cost_amortization_per_month` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `property_value_pct` `property_value_pct` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `bsd_pct` `bsd_pct` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `absd_pct` `absd_pct` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `cash_pct` `cash_pct` DECIMAL(15,4) DEFAULT 0;
ALTER TABLE `trust_accounts` CHANGE `setup_cost_pct` `setup_cost_pct` DECIMAL(15,4) DEFAULT 0;

/* 10-23-2018 */
ALTER TABLE  `properties` ADD `is_completed` INT(3) DEFAULT 0 AFTER `is_fulfilled`;
ALTER TABLE  `properties` ADD `fulfilled_at` TIMESTAMP NULL DEFAULT NULL AFTER `is_featured`;

/* 10-18-2018 */
ALTER TABLE  `property_valuation` CHANGE  `total_units` `total_units` DECIMAL(11, 6) DEFAULT 0 AFTER `nav`;

ALTER TABLE  `investment_log` CHANGE `units_invested` `units_invested` DECIMAL(11, 6) DEFAULT 0 AFTER `invested_amount`;
ALTER TABLE  `investment_log` ADD `is_distribution` INT(3) DEFAULT 0;

ALTER TABLE  `distribution` CHANGE `return_percentage` DECIMAL(11,6) DEFAULT 0;

/* 10-16-2018 */
ALTER TABLE `properties` ADD `rental` DECIMAL(11, 2) NOT NULL AFTER `property_price`;

/* 10-15-2018 */
ALTER TABLE `property_images` ADD `is_360` INT(2) NOT NULL DEFAULT '0' AFTER `is_default`;
ALTER TABLE  `property_investment` ADD `return_pct` DECIMAL(11, 2) DEFAULT 0.00 AFTER `setup_cost`;

/* 10-12-2018 */
ALTER TABLE  `trust_accounts` ADD  `property_value` DECIMAL(11, 2) DEFAULT 0 AFTER `property_id`;

ALTER TABLE  `property_valuation` ADD  `return` DECIMAL(11, 6) DEFAULT 0 AFTER `price_per_unit`;
ALTER TABLE  `property_valuation` ADD  `setup_cost` DECIMAL(11, 2) DEFAULT 0 AFTER `price_per_unit`;
ALTER TABLE  `property_valuation` ADD  `is_distribution` INT(3) DEFAULT 0 AFTER `price_per_unit`;

/* 10-11-2018 */
ALTER TABLE  `property_investment` ADD  `setup_cost` DECIMAL(11, 2) DEFAULT NULL AFTER `percent_invested`;
ALTER TABLE  `property_investment` ADD  `cash` DECIMAL(11, 2) DEFAULT NULL AFTER `percent_invested`;
ALTER TABLE  `property_investment` ADD  `absd` DECIMAL(11, 2) DEFAULT NULL AFTER `percent_invested`;
ALTER TABLE  `property_investment` ADD  `bsd` DECIMAL(11, 2) DEFAULT NULL AFTER `percent_invested`;
ALTER TABLE  `property_investment` ADD  `property_value` DECIMAL(11, 2) DEFAULT NULL AFTER `percent_invested`;

ALTER TABLE  `properties` ADD  `last_distribution` TIMESTAMP NULL DEFAULT NULL AFTER `completed_at`;
ALTER TABLE  `properties` ADD  `last_valuation` TIMESTAMP NULL DEFAULT NULL AFTER `completed_at`;

-- PCT for Investment components computation
ALTER TABLE  `trust_accounts` ADD  `setup_cost_pct` DECIMAL(11, 6) DEFAULT NULL AFTER `cost_amortization_per_month`;
ALTER TABLE  `trust_accounts` ADD  `cash_pct` DECIMAL(11, 6) DEFAULT NULL AFTER `cost_amortization_per_month`;
ALTER TABLE  `trust_accounts` ADD  `absd_pct` DECIMAL(11, 6) DEFAULT NULL AFTER `cost_amortization_per_month`;
ALTER TABLE  `trust_accounts` ADD  `bsd_pct` DECIMAL(11, 6) DEFAULT NULL AFTER `cost_amortization_per_month`;
ALTER TABLE  `trust_accounts` ADD  `property_value_pct` DECIMAL(11, 6) DEFAULT NULL AFTER `cost_amortization_per_month`;

/* 10-10-2018 */
ALTER TABLE  `trust_accounts` ADD  `initial_nav` DECIMAL(11, 2) DEFAULT NULL AFTER `nav`;
ALTER TABLE  `trust_accounts` ADD  `cost_amortization` DECIMAL(11, 2) DEFAULT NULL;
ALTER TABLE  `trust_accounts` ADD  `cost_amortization_per_month` DECIMAL(11, 2) DEFAULT NULL;
ALTER TABLE  `trust_accounts` ADD  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE  `trust_accounts` ADD  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

/* 10-09-2018 */
ALTER TABLE  `trust_accounts` ADD  `setup_cost` DECIMAL(11, 2) DEFAULT NULL;
ALTER TABLE  `trust_accounts` ADD  `setup_cost_percentage` DECIMAL(3, 2) DEFAULT NULL;
ALTER TABLE  `trust_cash_accounts` ADD  `description` TEXT AFTER `type`;
ALTER TABLE  `trust_cash_accounts` ADD `added_at` TIMESTAMP;
ALTER TABLE  `users` ADD `rejected_fields` TEXT DEFAULT NULL;

/* 10-08-2018 */
ALTER TABLE  `properties` ADD  `postalcode` INT(3) DEFAULT 0 AFTER `address`;

/* 10-02-2018 */
ALTER TABLE  `properties` ADD  `is_featured` INT(3) DEFAULT 0 AFTER `is_fulfilled`;

/* 09-28-2018 */
ALTER TABLE  `fund_transactions` ADD  `opened` INT(3) DEFAULT 0;
ALTER TABLE  `fund_transactions` ADD  `opened_at` TIMESTAMP NULL;
ALTER TABLE  `fund_transactions` ADD  `expired_at` TIMESTAMP NULL;

/* 09-27-2018 */
ALTER TABLE  `properties` ADD  `completed_at` TIMESTAMP NULL AFTER `is_fulfilled`;
ALTER TABLE  `properties` ADD  `lat` DECIMAL(10, 8) NOT NULL AFTER `tags`;
ALTER TABLE  `properties` ADD  `lng` DECIMAL(11, 8) NOT NULL AFTER  `tags`;

/* 09-26-2018 */
ALTER TABLE  `properties` ADD  `listing_id` INT(11) UNSIGNED AFTER `status`;
ALTER TABLE  `properties` ADD  `listed_at` TIMESTAMP NULL AFTER  `status`;
ALTER TABLE  `properties` ADD  `strata_fee` DECIMAL(11, 2) NULL AFTER `status`;
ALTER TABLE users ALTER COLUMN kyc_status SET DEFAULT NULL;

/* 09-20-2018 */
ALTER TABLE `users` ADD `approve_at` TIMESTAMP DEFAULT NULL;
ALTER TABLE `users` ADD `approve_by` INT(11) UNSIGNED DEFAULT 0 NULL;

/* 09-20-2018 */
ALTER TABLE `users` CHANGE `first_time_login` `first_time_deposit` INT(11) DEFAULT 0 NULL; 

/* 09-20-2018 */
ALTER TABLE `users` ADD `first_time_login` INT(11) DEFAULT 0 AFTER `created_on`;

/* 08-02-2018 */
INSERT INTO `groups` (`id`, `name`, `description`) VALUES(8, 'kyc_manager', 'KYC Manager');

ALTER TABLE  `users` ADD  `for_approval` INT( 2 ) NOT NULL DEFAULT  '0' AFTER  `is_complete`;
ALTER TABLE  `users` ADD  `reason_for_rejection` VARCHAR( 255 ) NOT NULL AFTER `for_approval`;


/*07-31-2018*/
ALTER TABLE  `users` ADD `id_scan_back` VARCHAR( 50 ) NULL AFTER `id_scan`;

ALTER TABLE `users` CHANGE `is_complete` `is_complete` INT(2)  NOT NULL  DEFAULT '0'  COMMENT '0=waiting for KYC; 1=complete; 2=pending for approval; 3=rejected';


ALTER TABLE  `users` ADD  `newsletter` INT( 2 ) NOT NULL DEFAULT  '0' AFTER  `is_complete`;


/* 05-03-2018 */
INSERT INTO `groups` (`id`, `name`, `description`) VALUES(6, 'real estate agent', 'Real Estate Agent');

CREATE TABLE `real_estate_agents` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;


/* 05-08-2018 */

ALTER TABLE  `users` ADD `identification_number` INT( 11 ) NOT NULL AFTER `last_name`;
ALTER TABLE  `users` ADD `postal_code` INT( 11 ) NOT NULL AFTER `phone`;
ALTER TABLE  `users` ADD `unit_number` INT( 11 ) NOT NULL AFTER `address`;


/* 05-09-2018 */
ALTER TABLE  `properties` ADD `sqft` INT( 11 ) NOT NULL AFTER `property_description`;
ALTER TABLE  `properties` ADD `bedrooms` INT( 11 ) NOT NULL AFTER `sqft`;
ALTER TABLE  `properties` ADD `baths` INT( 11 ) NOT NULL AFTER `bedrooms`;
ALTER TABLE  `properties` ADD `floor_level` VARCHAR( 100 ) NOT NULL AFTER `baths`;
ALTER TABLE  `properties` ADD `furnishing` VARCHAR( 100 ) NOT NULL AFTER `floor_level`;
ALTER TABLE  `properties` ADD `tenure` INT( 11 ) NOT NULL AFTER `furnishing`;
ALTER TABLE  `properties` ADD `top` INT( 11 ) NOT NULL AFTER `tenure`;
ALTER TABLE  `properties` ADD `years` INT( 11 ) NOT NULL AFTER `top`;


/* 06-18-2018 */

ALTER TABLE  `properties` ADD  `tags` TEXT NOT NULL AFTER  `images` ;

/*7-17-2018*/

ALTER TABLE `users` MODIFY `userkey` VARCHAR(100) NULL;
ALTER TABLE `users` MODIFY `identification_number` INT(11) NULL;
ALTER TABLE `users` MODIFY `phone` VARCHAR(20) NULL;
ALTER TABLE `users` MODIFY `postal_code` INT(11) NULL;
ALTER TABLE `users` MODIFY `dob` DATE NULL;
ALTER TABLE `users` MODIFY `address` TEXT NULL;
ALTER TABLE `users` MODIFY `unit_number` INT(11) NULL;
ALTER TABLE `users` MODIFY `nationality` VARCHAR(100) NULL;
ALTER TABLE `users` MODIFY `race` VARCHAR(100) NULL;
ALTER TABLE `users` MODIFY `religion` VARCHAR(100) NULL;
ALTER TABLE `users` MODIFY `billing_scan` VARCHAR(100) NULL;
ALTER TABLE `users` MODIFY `id_scan` VARCHAR(100) NULL;
ALTER TABLE `users` MODIFY `profile_photo` TEXT NULL;


