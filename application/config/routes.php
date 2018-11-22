<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Page';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

//frontend
$route['testmail']					= 'Page/testmail/';

/* START USER PROCESS */
$route['register']					= 'Users/register';
$route['login']						= 'Users/login';
$route['forgot-password']			= 'Users/forgot_password';
$route['logout']					= 'Users/logout';
$route['my-profile']				= 'Users/settings';
$route['user/ajax/(.*)']			= 'Users/ajax/$1';
$route['notifications']             = 'Users/notifications';
/* END USER BACKEND PROCESS */

/* Account */
$route['activate/(.*)']				= 'Account/activate/$1';
$route['activate-account']			= 'Account/activate_account/';


/* START PROPERTY PROCESS */
$route['properties']				= 'PropertyListing/index/';
$route['property-details/(.*)']		= 'PropertyListing/property_details/$1';
$route['property-listing/ajax/(.*)']= 'PropertyListing/ajax/$1';
/* END PROPERTY PROCESS */


//$route['activate/(.*)']				= 'Page/activate/$1';
//$route['activate-account']			= 'Page/activate_account/';

//$route['activate/(.*)']				= 'Page/activate/$1';
//$route['activate-account']			= 'Page/activate_account/';


//$route['register']					= 'Page/register/';
//$route['login']						= 'Page/login/';



$route['checkout']					= 'Transaction/checkout'; //newly added
$route['faq']						= 'Page/faq/';
$route['ajax/(.*)']					= 'Page/ajax/$1';
$route['form/(.*)']					= 'Page/form/$1';
$route['about']                     = 'Page/about';

// credit
$route['credit-balance']				= 'Credit';
$route['credit-balance/action/(.*)']	= 'Credit/action/$1';

// transaction
$route['transactions']				= 'Transaction'; //newly added

/*
 * Action caller
 * route : {controller}/action/{action_fn}/[{parameters}]
 */
 
$route['([A-z]+)/action/(.*)'] 	= '$1/action/$2';

$route['orders']				= 'Transaction/investments/'; //newly added
$route['completed-investments']     = 'Transaction/completed_investments/'; //newly added
$route['messages']					= 'Page/messages/'; //newly added
$route['order-summary']				= 'Transaction/order_summary/'; //newly added
$route['portfolio']					= 'Page/portfolio/'; //newly added
$route['terms-of-use']				= 'Page/terms_of_use/'; //newly added
$route['watch-list']				= 'Watchlist'; //newly added

/* START ADMIN ROUTES */

$route['admin']						= 'admin/Admin/index/';
$route['admin/login']				= 'admin/Admin/login/';
$route['admin/admins']				= 'admin/Admins/index/';
$route['admin/admins/ajax/(.*)']	= 'admin/Admins/ajax/$1';
$route['admin/admins/form/(.*)']	= 'admin/Admins/form/$1';
$route['admin/users']					= 'admin/Users/index/';
$route['admin/users/ajax/(.*)']			= 'admin/Users/ajax/$1';
$route['admin/users/form/(.*)']			= 'admin/Users/form/$1';
// subscribers
$route['admin/subscribers'] = 'admin/Users/subscribers';
$route['admin/users/bank/details/(.*)']	= 'admin/Bank/details/$1';
$route['admin/users/bank/form/(.*)']	= 'admin/Bank/form/$1';
$route['admin/users/portfolio/details/(.*)'] = 'admin/Users/portfolio/$1';
//$route['admin/users/portfolio/form/(.*)']	= 'admin/Portfolio/form/$1';
$route['admin/users/deposit/history/(.*)']	= 'admin/Bank/deposit_history/$1';
$route['admin/account-managers']			= 'admin/AccountManagers/index/';
$route['admin/account-managers/ajax/(.*)']	= 'admin/AccountManagers/ajax/$1';
$route['admin/account-managers/form/(.*)']	= 'admin/AccountManagers/form/$1';
$route['admin/property/listings']			= 'admin/property/listings';
$route['admin/property/distribution-table'] = 'admin/Property/distribution_table';
$route['admin/Property/ajax/(.*)'] = 'admin/Property/ajax/$1';
$route['admin/property/form/(:num)'] = 'admin/property/form/$1';
$route['admin/property/rental-collections'] = 'admin/Property/rental_collections';
$route['admin/property/investment/(:num)'] = 'admin/property/property_investment_details/$1';
$route['admin/property-managers']			= 'admin/PropertyManagers/index/';
$route['admin/property-managers/ajax/(.*)']	= 'admin/PropertyManagers/ajax/$1';
$route['admin/property-managers/form/(.*)']	= 'admin/PropertyManagers/form/$1';
$route['admin/content-managers']			= 'admin/ContentManagers/index/';
$route['admin/content-managers/ajax/(.*)']	= 'admin/ContentManagers/ajax/$1';
$route['admin/content-managers/form/(.*)']	= 'admin/ContentManagers/form/$1';
$route['admin/real-estate-agents']          = 'admin/RealEstateAgents/index/';
$route['admin/real-estate-agents/ajax/(.*)'] = 'admin/RealEstateAgents/ajax/$1';
$route['admin/real-estate-agents/form/(.*)'] = 'admin/RealEstateAgents/form/$1';
$route['admin/escrow-managers']          = 'admin/EscrowManagers/index/';
$route['admin/escrow-managers/ajax/(.*)'] = 'admin/EscrowManagers/ajax/$1';
$route['admin/escrow-managers/form/(.*)'] = 'admin/EscrowManagers/form/$1';
$route['admin/promoters']          = 'admin/Promoters/index/';
$route['admin/promoters/ajax/(.*)'] = 'admin/Promoters/ajax/$1';
$route['admin/promoters/form/(.*)'] = 'admin/Promoters/form/$1';
$route['admin/property/valuation/(.*)']  = 'admin/Property/valuation/$1';
$route['admin/transactions']          	= 'admin/Transactions/index/';
$route['admin/transactions/ajax/(.*)'] 	= 'admin/Transactions/ajax/$1';
$route['admin/know-your-client'] = 'admin/KnowYourClient/index';
$route['admin/know-your-client/form/(.*)'] = 'admin/KnowYourClient/form/$1';
$route['admin/know-your-client/ajax/(.*)'] = 'admin/KnowYourClient/ajax/$1';
//$route['admin/kyc'] = 'admin/forApproval';
// $route['admin/kyc-managers/ajax/(.*)'] = 'admin/KnowYourClient/ajax/$1';
// $route['admin/kyc-managers'] = 'admin/KYCManagers/index';
// $route['admin/kyc-managers/form/(.*)'] = 'admin/KYCManagers/form/$1';


 
/*
 * Action caller
 * route : admin/{controller}/action/{action_fn}/[{parameters}]
 */
$route['admin/([A-z]+)/action/(.*)'] 	= 'admin/$1/action/$2';

$route['admin/transactions/orders']		= 'admin/Transactions/orders/';
$route['admin/transactions/trades']		= 'admin/Transactions/trades/';
$route['admin/transactions/deposit/approve/(:num)'] 	= 'admin/Transactions/approve/$1';
$route['admin/transactions/form/(.*)'] 	= 'admin/Transactions/form/$1';
/* END ADMIN ROUTES */

