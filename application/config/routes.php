<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboardcontroller';
$route['404_override'] = 'dashboardcontroller/error_page';
$route['translate_uri_dashes'] = FALSE;

//  ###############################   Register Here    ###############################
$route['register'] = 'dashboardcontroller/register';
$route['register/check'] = 'dashboardcontroller/register_check';
$route['logout'] = 'dashboardcontroller/logout';

//  ###############################   Verify-Account Here   ###############################
$route['verify-account/(:any)'] = 'dashboardcontroller/verify_account';

//  ###############################   forgate-password Here   ###############################
$route['reset-password'] = 'registercontroller/forget_password';
$route['check-account'] = 'registercontroller/check_account';
$route['new-password/(:any)'] = 'registercontroller/new_password';
$route['update-password'] = 'registercontroller/update_password';

//  ###############################   Login Here   ###############################
$route['login'] = 'registercontroller/login';
$route['login/check'] = 'registercontroller/login_check';

//  ###############################   Api Here   ###############################
$route['api/email-check'] = 'apicontroller/checkEmail';
$route['api/product-check'] = 'apicontroller/checkProduct';
$route['api/product-price'] = 'apicontroller/checkPrice';
$route['api/add-row'] = 'apicontroller/addRow';
$route['api/customer/due/amount'] = 'apicontroller/customer_due';
$route['api/customer/pay/amount'] = 'apicontroller/pay_amount';

//  ###############################   Customer Route Here   ###############################
$route['customer'] = 'customercontroller/index';
$route['customer/add'] = 'customercontroller/create';
$route['customer/store'] = 'customercontroller/store';
$route['customer/edit/(:any)'] = 'customercontroller/edit';
$route['customer/update/(:any)'] = 'customercontroller/update';
$route['customer/delete/(:any)'] = 'customercontroller/destroy';
$route['customer/ledger/(:any)'] = 'customercontroller/ledger';
$route['customer/ledger/details/(:any)'] = 'customercontroller/ledger_details';

//  ###############################   Supplier Route Here   ###############################
$route['supplier'] = 'suppliercontroller/index';
$route['supplier/add'] = 'suppliercontroller/create';
$route['supplier/store'] = 'suppliercontroller/store';
$route['supplier/edit/(:any)'] = 'suppliercontroller/edit';
$route['supplier/update/(:any)'] = 'suppliercontroller/update';
$route['supplier/delete/(:any)'] = 'suppliercontroller/destroy';

//  ###############################   Category Route Here   ###############################
$route['category'] = 'dashboardcontroller/category';

//  ###############################   Product Route Here   ###############################
$route['product'] = 'productcontroller/index';
$route['product/add'] = 'productcontroller/create';
$route['product/store'] = 'productcontroller/store';
$route['product/edit/(:any)'] = 'productcontroller/edit';
$route['product/update/(:any)'] = 'productcontroller/update';
$route['product/delete/(:any)'] = 'productcontroller/destroy';

//  ###############################   Purchase Route Here   ###############################
// $route['purchase'] = 'purchasecontroller/index';
$route['purchase/add'] = 'purchasecontroller/create';
// $route['purchase/store'] = 'purchasecontroller/store';
// $route['purchase/edit/(:any)'] = 'purchasecontroller/edit';
// $route['purchase/update/(:any)'] = 'purchasecontroller/update';
// $route['purchase/delete/(:any)'] = 'purchasecontroller/destroy';

//  ###############################   Sell Route Here   ###############################
$route['sell'] = 'sellcontroller/index';
$route['sell/add'] = 'sellcontroller/create';
$route['sell/store'] = 'sellcontroller/store';
// $route['sell/edit/(:any)'] = 'sellcontroller/edit';
// $route['sell/update/(:any)'] = 'sellcontroller/update';
// $route['sell/delete/(:any)'] = 'sellcontroller/destroy';

//  ###############################   Transaction Route Here   ###############################
$route['transaction'] = 'transactioncontroller/receipt';
$route['transaction/store'] = 'transactioncontroller/store';
$route['transaction/custmer/(:num)'] = 'transactioncontroller/custmer_report';
