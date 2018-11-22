<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['system_date'] = (ENVIRONMENT == 'testing' || ENVIRONMENT == 'development') && isset($_REQUEST['test_date']) ? $_REQUEST['test_date'] : date('Y-m-d');
$config['urbanzone_state'] = FALSE;

$config['show_registration_captcha'] = 0;
$config['recaptcha_site_key'] = '6Lf6V2cUAAAAAFnogOwyl9RT28i3SOoWTzennFW0';
$config['recaptcha_secret_key'] = '6Lf6V2cUAAAAAOWIoXbqa2zCP70te27_FAu-WvIx';


// transaction types
$config['funds_deposit'] = 1;
$config['funds_withdrawal'] = 2;
$config['investment_purchase'] = 3;
$config['investment_sold'] = 4;
$config['rental_income'] = 5;

// trust cash accounts types
$config['property_income'] = 1;
$config['property_expense'] = 2;


// notification types
$config['n_fulfillment'] = 1;
$config['n_for_approval'] = 8;
$config['n_deposit_coming'] = 9;
$config['n_withdrawal_coming'] = 10;
$config['n_cancel_order'] = 11;

